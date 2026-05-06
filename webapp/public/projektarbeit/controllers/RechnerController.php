<?php
// === controllers/RechnerController.php ===

// 1. Das Model laden, damit wir die Rechen-Funktionen nutzen können
require_once './models/RechnerModel.php';

// 2. Standard-Werte für die View festlegen (bevor etwas berechnet wurde)
$ergebnis = null;
$gewaehltesZimmer = "";
$reitenParam = "";
$preisNacht = 0;
$reitAufschlag = 0;
$naechte = 1; // Standardmäßig 1 Nacht

// 3. POST-Verarbeitung: Hat der Nutzer auf "Jetzt berechnen" geklickt?
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_rechner'])) {
    
    // Daten aus dem Formular holen und absichern (intval macht echte Zahlen daraus)
    $preisNacht = intval($_POST['zimmer_preis']);
    $naechte = intval($_POST['naechte']);
    $reitAufschlag = isset($_POST['reiten']) ? 25 : 0;
    
    // Parameter für den Weiterleitungs-Link vorbereiten
    $reitenParam = isset($_POST['reiten']) ? "&reiten=Ja" : "";

    // 4. LOGIK AUSFÜHREN: Wir rufen die Funktionen aus unserem Model auf!
    $gewaehltesZimmer = getZimmerName($preisNacht);
    $ergebnis = berechneGesamtpreis($preisNacht, $reitAufschlag, $naechte);
}

// 5. Ganz am Ende: Die View laden! 
// Die View kennt jetzt alle Variablen (wie $ergebnis), die wir hier oben erstellt haben.
require_once './views/RechnerView.php';
?>