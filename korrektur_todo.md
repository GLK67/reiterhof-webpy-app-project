# To-Do-Liste für Korrekturen und Optimierungen

Basierend auf der Analyse der Korrekturhilfedatei und dem Marschplan.

## Fehlende Punkte aus Kriterien

### A1: Formales – Syntax, MVC, kein Rechner/Automat, Abgabe (3.00/4.00)
- **Problem:** PHP-CLI nicht verfügbar, Syntaxcheck nicht ausführbar.
- **Lösung:** PHP-CLI installieren oder Syntaxcheck ermöglichen. Da PHP im Container verfügbar ist, teste Syntaxcheck.
- **Aufwand:** Niedrig.

### B1: Projektstruktur und Quellcode-Qualität (0.00/4.00)
- **Problem:** Keine CSS-Dateien in 'css/*.css', 'styles/*.css', '*.css' gefunden. Ordner ist 'CSS/' statt 'css/'.
- **Lösung:** Ordner von 'CSS/' zu 'css/' umbenennen oder Pfade anpassen.
- **Aufwand:** Niedrig.

### D1: Bilder und Galerie (0.00/4.00)
- **Problem:** Keine Bilder in 'images/*', 'img/*', 'bilder/*' gefunden. Ordner ist 'Bilder/' (uppercase).
- **Lösung:** Ordner zu 'bilder/' umbenennen (case-sensitive).
- **Aufwand:** Niedrig.

## Erweiterungen aus Marschplan

### Erweiterung 1: Versionsverwaltung mit Git und GitHub
- **Schritte:**
  1. GitHub-Repository ist bereits vorhanden.
  2. Feature-Branch erstellen (z.B. 'feature/corrections').
  3. Regelmäßige Commits mit Erklärungen.
  4. README.md erweitern mit Beschreibung, Screenshot, Laufzeitanleitung.
- **Aufwand:** 3 Abende.

### Erweiterung 2: Algorithmen und Datenstrukturen in PHP: Suchen und Sortieren
- **Schritte:**
  1. Anwendungsfall identifizieren (z.B. Sortieren von Pferden oder Aktivitäten).
  2. Lineare Suche und Bubble-Sort implementieren.
  3. Mit realen Daten testen.
  4. Laufzeitvergleich dokumentieren.
- **Aufwand:** 3-4 Abende.

## Allgemeine To-Dos
- Woche 1-2: Git-Repository anlegen (bereits vorhanden), Projekt einpflegen, ersten Feature-Branch erstellen.
- Parallel: A1 nacharbeiten.
- Woche 2-3: Erweiterung 2 recherchieren.
- Woche 3-5: Erweiterung 2 implementieren.
- Woche 5-6: Beide Erweiterungen demonstrieren.
- Woche 6: Verteidigungsskript erstellen.