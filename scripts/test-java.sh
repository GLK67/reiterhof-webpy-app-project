#!/usr/bin/env bash
set -euo pipefail

shopt -s nullglob
java_sources=(src/volleyball/*.java)
shopt -u nullglob

if [[ ${#java_sources[@]} -eq 0 ]]; then
  echo "[java] Kein Java-Quellcode vorhanden. Java-Smoke-Test wird übersprungen."
  exit 0
fi

mkdir -p build/java
javac -d build/java "${java_sources[@]}"

echo "[java] Kompilierung erfolgreich"

echo "[java] Starte Headless-Modell-Smoke-Tests..."
java -cp build/java volleyball.ModelSmokeTest

echo "[java] Modell-Tests erfolgreich"
