#!/usr/bin/env bash
set -euo pipefail

# .env laden falls vorhanden, damit alle Variablen gesetzt sind
if [[ -f .env ]]; then
  set -a
  # shellcheck source=.env
  source .env
  set +a
fi

python_port="${PYTHON_API_PORT:-8000}"
php_port="${PHP_WEB_PORT:-8080}"

function require_cmd() {
  if ! command -v "$1" >/dev/null 2>&1; then
    echo "[test] Fehler: Kommando '$1' fehlt"
    exit 1
  fi
}

require_cmd curl
require_cmd docker

echo "[test] Pruefe Python-Health..."
curl -fsS "http://localhost:${python_port}/health" >/tmp/python_health.json
cat /tmp/python_health.json

echo "[test] Pruefe Python-JSON..."
curl -fsS "http://localhost:${python_port}/json-items" >/tmp/python_json.json
cat /tmp/python_json.json

echo "[test] Pruefe PHP-Webseite..."
curl -fsS "http://localhost:${php_port}" >/tmp/php_index.html
head -n 5 /tmp/php_index.html

echo "[test] Pruefe MySQL in Container..."
docker compose exec -T mysql mysql -u"${MYSQL_USER:-appuser}" -p"${MYSQL_PASSWORD:-apppassword}" "${MYSQL_DATABASE:-appdb}" -e "SELECT COUNT(*) AS demo_items_count FROM demo_items;"

# Java-Test nur ausführen, wenn Java-Quellcode vorhanden ist
shopt -s nullglob
java_sources=(src/volleyball/*.java)
shopt -u nullglob
if [[ ${#java_sources[@]} -gt 0 ]]; then
  echo "[test] Starte Java-Smoke-Test..."
  ./scripts/test-java.sh
else
  echo "[test] Kein Java-Quellcode gefunden, überspringe Java-Smoke-Test."
fi

echo "[test] Alle Checks erfolgreich"
