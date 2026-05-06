# Live-Test-Umgebung für PHP, Python und MySQL

Diese Anleitung beschreibt, wie du die vorhandene Webapp im Ordner `webapp/public/projektarbeit` lokal im Repository testen und weiterentwickeln kannst.

## Ziel

- Docker-basierte Entwicklungsumgebung starten
- PHP-Webfrontend im Browser prüfen
- Python-API und MySQL-Datenbank live testen
- Wiederholbare Routine für künftige Tests

## Voraussetzungen

- Docker installiert
- Docker Compose verfügbar
- Zugriff auf den Codespace oder lokale Shell
- `git clone` dieses Repositories bereits ausgeführt

## 1. Vorbereitung

1. Wechsle in das Projektverzeichnis:
   ```bash
   cd /workspaces/reiterhof-webpy-app-project
   ```

2. Falls nicht vorhanden, erstelle die Beispielumgebung:
   ```bash
   bash scripts/bootstrap.sh
   ```

3. Öffne die generierte `.env` und ersetze die Platzhalter:
   - `MYSQL_ROOT_PASSWORD`
   - `MYSQL_PASSWORD`

   Beispiel:
   ```env
   MYSQL_ROOT_PASSWORD=localrootpass
   MYSQL_DATABASE=appdb
   MYSQL_USER=appuser
   MYSQL_PASSWORD=localapppass
   MYSQL_HOST=mysql
   MYSQL_PORT=3306
   PYTHON_API_PORT=8000
   PHP_WEB_PORT=8080
   ```

> Hinweis: Die Datei `.env` ist in `.gitignore` eingetragen und darf nicht ins Repository gelangen.

## 2. Services starten

```bash
bash scripts/start-services.sh
```

Das Script baut die Container, startet sie und gibt die wichtigsten Zugriffe aus:

- PHP-Webapp: `http://localhost:8080`
- Python-API: `http://localhost:8000/health`
- MySQL: `localhost:3306`

## 3. Prüfung im Browser

- Öffne den Browser und rufe `http://localhost:8080` auf.
- Die Seite aus `webapp/public` sollte angezeigt werden.
- Die Python-API ist unter `http://localhost:8000/health` erreichbar.

## 4. Live-Entwicklung

- Änderungen am Code in `webapp/public/` werden bei `php-web` dank Volume-Mount sofort übernommen.
- Für Backend-Änderungen in `services/python-api/` ist ein Neustart notwendig:
  ```bash
  docker compose restart python-api
  ```

## 5. Testroutine für künftige Überprüfungen

Führe diesen Befehl regelmäßig aus, um die Live-Umgebung zu testen:

```bash
bash scripts/test-services.sh
```

Das Script prüft:

- Python-API-Health
- JSON-Endpunkt der Python-API
- PHP-Webseite
- MySQL-Verbindung und `demo_items`
- Java-Smoke-Test

## 6. Stopp der Umgebung

Wenn du fertig bist:

```bash
bash scripts/stop-services.sh
```

## 7. Codespace- oder Browser-Preview-Nutzung

In GitHub Codespaces kannst du die weitergeleiteten Ports aufrufen, ohne VNC einzurichten:

- `http://localhost:8080` für die Webapp
- `http://localhost:8000` für die API

> Für diese Webanwendung ist VNC nicht erforderlich. Die App wird direkt über HTTP geöffnet.

## 8. Erweiterung um Datenbankanbindung

Für die weitere Normalisierung der Datenbank kannst du:

1. SQL-Schema in `docker/mysql/init/` ergänzen
2. Neue Tabellen in `MySQL` hinzufügen
3. PHP- und Python-Code auf die neuen Tabellen umstellen
4. `bash scripts/test-services.sh` nutzen, um die Kette zu prüfen
