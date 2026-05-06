<?php
// === PHP LOGIK (Das Gehirn im Hintergrund) ===
$erfolgsmeldung = "";
$fehlermeldung = "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    $anreise = new DateTime($_POST["datum_von"]);
    
    if (!empty($_POST["vorgegebene_naechte"])) {
        $naechte = intval($_POST["vorgegebene_naechte"]);
        $abreise = clone $anreise;
        $abreise->modify("+$naechte days");
        $datum_bis_string = $abreise->format('Y-m-d');
    } else {
        $datum_bis_string = $_POST["datum_bis"];
        $abreise = new DateTime($datum_bis_string);
        $naechte = $anreise->diff($abreise)->days;
        
        if ($abreise <= $anreise) {
            $fehlermeldung = "Fehler: Das Abreisedatum muss nach dem Anreisedatum liegen!";
        }
    }

    if (empty($fehlermeldung)) {
        $neueAnfrage = [
            "name" => $_POST["name"] ?? "",
            "email" => $_POST["email"] ?? "",
            "zimmer" => $_POST["zimmer"] ?? "",
            "datum_von" => $_POST["datum_von"] ?? "",
            "datum_bis" => $datum_bis_string, 
            "naechte" => $naechte,
            "reitunterricht" => isset($_POST["reitunterricht"]) ? "Ja" : "Nein",
            "preis" => $_POST["preis"] ?? "Wird individuell berechnet"
        ];
        
        $datei = 'anfragen.json';
        $alleAnfragen = file_exists($datei) ? json_decode(file_get_contents($datei), true) : [];
        $alleAnfragen[] = $neueAnfrage;
        file_put_contents($datei, json_encode($alleAnfragen, JSON_PRETTY_PRINT));
        
        $erfolgsmeldung = "Danke! Deine Anfrage wurde erfolgreich gespeichert.";
    }
}

// 1. HEADER EINBINDEN
include 'layouts/header.php'; 
?>

<div class="container">
    <h2 class="section-title">Wähle dein Zimmer</h2>
    
    <div class="room-list">
        <div class="room">
            <img src="Bilder/zimmer/Einzelzimmer.jpg" alt="Einzelzimmer">
            <h3>Einzelzimmer</h3>
            <p>Gemütlich & Ruhig<br>ab 45€ / Nacht</p>
        </div>
        <div class="room">
            <img src="Bilder/zimmer/Doppelzimmer.jpg" alt="Doppelzimmer">
            <h3>Doppelzimmer</h3>
            <p>Viel Platz für Zwei<br>ab 70€ / Nacht</p>
        </div>
        <div class="room">
            <img src="Bilder/zimmer/Familienzimmer.jpg" alt="Familienzimmer">
            <h3>Familienzimmer</h3>
            <p>Für bis zu 4 Personen<br>ab 100€ / Nacht</p>
        </div>
    </div>
</div> 

<?php
// Vorauswahlen abfangen (Parameter aus der URL)
$gewaehltesZimmer = isset($_GET['zimmer']) ? $_GET['zimmer'] : '';
$kalkulierterPreis = isset($_GET['preis']) ? $_GET['preis'] : '';
$vorgegebeneNaechte = isset($_GET['naechte']) ? intval($_GET['naechte']) : 0;
$reitenChecked = isset($_GET['reiten']) ? 'checked' : '';

// === DIE NEUE SPERR-LOGIK ===
// Wir prüfen, ob ein Preis übergeben wurde. Wenn ja, sperren wir die Felder!
$isKalkuliert = !empty($kalkulierterPreis);

// CSS-Tricks zum Sperren der Felder vorbereiten
$sperreDropdown = $isKalkuliert ? 'style="pointer-events: none; background-color: #f5f5f5;"' : '';
$sperreCheckbox = $isKalkuliert ? 'onclick="return false;" style="opacity: 0.7;"' : '';

$heute = date('Y-m-d');
$morgen = date('Y-m-d', strtotime('+1 day'));
?>

<div class="container">
    <h2 class="section-title">Unverbindliche Anfrage</h2>
    
    <?php if($isKalkuliert): ?>
        <div style="background-color: #e3f2fd; padding: 15px; border-left: 5px solid #1d4e89; margin-bottom: 20px; border-radius: 4px;">
            <strong>💡 Hinweis:</strong> Du übermittelst eine vorkalkulierte Anfrage. Zimmer und Reitoptionen sind daher gesperrt. <br>
            <a href="rechner.php" style="color: #1d4e89;">Zurück zum Rechner</a>, falls du etwas ändern möchtest.
        </div>
    <?php endif; ?>

    <?php 
    if(!empty($erfolgsmeldung)) echo "<p class='msg-success'>$erfolgsmeldung</p>"; 
    if(!empty($fehlermeldung)) echo "<p class='msg-error'>$fehlermeldung</p>"; 
    ?>

    <form method="POST" action="reservierung.php">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Dein Name" required>
        </div>
        
        <div class="form-group">
            <label>E-Mail</label>
            <input type="email" name="email" placeholder="deine@email.de" required>
        </div>
        
        <div class="form-group">
            <label>Gewünschtes Zimmer</label>
            <select name="zimmer" <?php echo $sperreDropdown; ?>>
                <option value="Einzelzimmer" <?php if($gewaehltesZimmer == 'Einzelzimmer') echo 'selected'; ?>>Einzelzimmer</option>
                <option value="Doppelzimmer" <?php if($gewaehltesZimmer == 'Doppelzimmer') echo 'selected'; ?>>Doppelzimmer</option>
                <option value="Familienzimmer" <?php if($gewaehltesZimmer == 'Familienzimmer') echo 'selected'; ?>>Familienzimmer</option>
            </select>
        </div>
        
        <div class="form-group form-row">
            <div class="form-col">
                <label>Anreise</label>
                <input type="date" name="datum_von" min="<?php echo $heute; ?>" required>
            </div>
            
            <div class="form-col">
                <label>Abreise</label>
                <?php if ($vorgegebeneNaechte > 0): ?>
                    <input type="text" value="Automatisch (<?php echo $vorgegebeneNaechte; ?> Nächte)" readonly>
                    <input type="hidden" name="vorgegebene_naechte" value="<?php echo $vorgegebeneNaechte; ?>">
                <?php else: ?>
                    <input type="date" name="datum_bis" min="<?php echo $morgen; ?>" required>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="reitunterricht" value="Ja" <?php echo $reitenChecked; ?> <?php echo $sperreCheckbox; ?> class="checkbox-input">
                <span>Täglicher Reitunterricht gewünscht</span>
            </label>
        </div>

        <div class="form-group">
            <label>Berechneter Preis (€)</label>
            <input type="text" name="preis" value="<?php echo htmlspecialchars($kalkulierterPreis); ?>" readonly placeholder="Wird individuell berechnet">
        </div>

        <button type="submit" class="submit-btn">Jetzt anfragen</button>
    </form>
</div> 

<?php 
// 3. FOOTER EINBINDEN
include 'layouts/footer.php'; 
?>