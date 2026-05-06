<?php
// === models/RechnerModel.php ===
// HIER PASSIERT NUR DIE LOGIK (Kein HTML, kein $_POST)

// 1. Funktion: Finde den Zimmernamen anhand des Preises
function getZimmerName($preisNacht) {
    if ($preisNacht == 45) {
        return "Einzelzimmer";
    } elseif ($preisNacht == 70) {
        return "Doppelzimmer";
    } elseif ($preisNacht == 100) {
        return "Familienzimmer";
    }
    return "Unbekanntes Zimmer";
}

// 2. Funktion: Berechne den finalen Preis
function berechneGesamtpreis($preisNacht, $reitAufschlag, $naechte) {
    return ($preisNacht + $reitAufschlag) * $naechte;
}
?>