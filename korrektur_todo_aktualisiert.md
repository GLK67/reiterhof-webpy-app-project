# To-Do-Liste für Korrekturen und Optimierungen

Basierend auf der Analyse der Korrekturhilfedatei und dem Marschplan.

## Fehlende Punkte aus Kriterien

### A1: Formales – Syntax, MVC, kein Rechner/Automat, Abgabe (3.00/4.00)
- **Problem:** PHP-CLI nicht verfügbar, Syntaxcheck nicht ausführbar.
- **Lösung:** PHP-CLI installieren oder Syntaxcheck ermöglichen. Da PHP im Container verfügbar ist, teste Syntaxcheck.
- **Aufwand:** Niedrig.
- **Status:** ✅ Erledigt – PHP verfügbar, Syntax geprüft.

### B1: Projektstruktur und Quellcode-Qualität (0.00/4.00)
- **Problem:** Keine CSS-Dateien in 'css/*.css', 'styles/*.css', '*.css' gefunden. Ordner ist 'CSS/' statt 'css/'.
- **Lösung:** Ordner von 'CSS/' zu 'css/' umbenennen oder Pfade anpassen.
- **Aufwand:** Niedrig.
- **Status:** ✅ Erledigt – Ordner umbenannt.

### D1: Bilder und Galerie (0.00/4.00)
- **Problem:** Keine Bilder in 'images/*', 'img/*', 'bilder/*' gefunden. Ordner ist 'Bilder/' (uppercase).
- **Lösung:** Ordner zu 'bilder/' umbenennen (case-sensitive).
- **Aufwand:** Niedrig.
- **Status:** ✅ Erledigt – Ordner umbenannt, Pfade aktualisiert.

## Erweiterungen aus Marschplan

### Erweiterung 1: Versionsverwaltung mit Git und GitHub
- **Schritte:**
  1. GitHub-Repository ist bereits vorhanden.
  2. Feature-Branch erstellen (z.B. 'feature/corrections').
  3. Regelmäßige Commits mit Erklärungen.
  4. README.md mit Projektbeschreibung, Screenshot und Laufzeitanleitung ergaenzen.  
- **Aufwand:** 3 Abende.
- **Status:** ✅ Erledigt – Branch erstellt, Commits gemacht, README erweitert.

### Erweiterung 2: Algorithmen und Datenstrukturen in PHP: Suchen und Sortieren
- **Schritte:**
  1. Anwendungsfall identifizieren (z.B. Sortieren von Pferden oder Aktivitäten).
  2. Lineare Suche und Bubble-Sort in PHP von Hand implementieren (kein usort()).
  3. Beide Algorithmen mit einem realen Datensatz aus dem Projekt testen.
  4. Laufzeitvergleich: einmal sort() und einmal eigener Algorithmus, Ergebnis dokumentieren.  
- **Aufwand:** 3-4 Abende.
- **Status:** ✅ Erledigt – Bubble-Sort und lineare Suche implementiert, Laufzeit gemessen, Suchformular hinzugefügt.

## Allgemeine To-Dos
- Woche 1-2: Git-Repository anlegen (bereits vorhanden), Projekt einpflegen, ersten Feature-Branch erstellen.
- **Status:** ✅ Erledigt.
- Parallel: Kriterium 'Formales – Syntax, MVC, kein Rechner/Automat, Abgabe' gezielt nacharbeiten – das staerkt die Gesamtbewertung.
- **Status:** ✅ Erledigt.
- Woche 2-3: Erweiterungsthema 'Algorithmen und Datenstrukturen in PHP: Suchen und Sortieren' recherchieren und Umsetzungsplan notieren.
- **Status:** ✅ Erledigt.
- Woche 3-5: Erweiterung 'Algorithmen und Datenstrukturen in PHP: Suchen und Sortieren' implementieren und Schritt fuer Schritt dokumentieren.
- **Status:** ✅ Erledigt.
- Woche 5-6: Beide Erweiterungen im Browser demonstrieren und fuer die Verteidigung aufbereiten.
- **Status:** Ausstehend – Für Verteidigung vorbereitet.
- Woche 6: Kurzes Verteidigungsskript erstellen: Was hast du getan, was hast du gelernt, was wuerdest du anders machen?
- **Status:** Ausstehend – Dokumentation erstellt, Skript kann daraus abgeleitet werden.