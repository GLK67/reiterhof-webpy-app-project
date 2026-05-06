<?php 
// 1. Session starten (wichtig für den Login-Check)
session_start();

// HIER DEIN PASSWORT FESTLEGEN
$geheimesPasswort = "Hufeisen2026"; 

// Logout Funktion
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

// Login prüfen
$fehler = "";
if (isset($_POST['passwort_eingabe'])) {
    if ($_POST['passwort_eingabe'] === $geheimesPasswort) {
        $_SESSION['eingeloggt'] = true;
    } else {
        $fehler = "Falsches Passwort!";
    }
}

// === BEREICH 1: DAS LOGIN-FORMULAR ===
// Wenn nicht eingeloggt, zeige NUR das Login-Formular
if (!isset($_SESSION['eingeloggt']) || $_SESSION['eingeloggt'] !== true) {
    include 'layouts/header.php';
    ?>
    
    <div class="container login-box">
        <h2 class="section-title">Admin-Login</h2>
        <p>Bitte gib das Passwort ein, um die Reservierungen zu sehen.</p>
        
        <?php if ($fehler) echo "<p class='msg-error'>$fehler</p>"; ?>
        
        <form method="POST" action="admin.php">
            <div class="form-group">
                <input type="password" name="passwort_eingabe" placeholder="Passwort" required>
            </div>
            <button type="submit" class="btn-login">Einloggen</button>
        </form>
    </div>
    
    <?php
    include 'layouts/footer.php';
    exit; // Beendet das Skript hier, damit die Tabelle nicht geladen wird!
}

// === BEREICH 2: DER GESCHÜTZTE ADMIN-BEREICH ===
include 'layouts/header.php'; 
?>

<div class="container">
    <h2 class="section-title">Eingegangene Reservierungen</h2>
    
    <a href="?logout=1" class="logout-link">Ausloggen (X)</a>
    
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Zimmer</th>
                    <th>Anreise</th>
                    <th>Abreise</th>
                    <th class="text-center">Nächte</th>
                    <th>Reiten</th>
                    <th>Preis (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datei = 'anfragen.json';
                if (file_exists($datei)) {
                    $anfragen = json_decode(file_get_contents($datei), true);
                    
                    if (!empty($anfragen)) {
                        // Array umdrehen, damit die neuesten Anfragen oben stehen!
                        foreach (array_reverse($anfragen) as $anfrage) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($anfrage['name'] ?? '-') . "</td>";
                            echo "<td>" . htmlspecialchars($anfrage['zimmer'] ?? '-') . "</td>";
                            echo "<td>" . htmlspecialchars($anfrage['datum_von'] ?? '-') . "</td>";
                            echo "<td>" . htmlspecialchars($anfrage['datum_bis'] ?? '-') . "</td>";
                            echo "<td class='text-center font-bold'>" . htmlspecialchars($anfrage['naechte'] ?? '-') . "</td>";
                            echo "<td>" . htmlspecialchars($anfrage['reitunterricht'] ?? '-') . "</td>";
                            
                            // Spezielle Klasse für den Preis
                            echo "<td class='price-col'>" . htmlspecialchars($anfrage['preis'] ?? '-') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='empty-msg'>Bisher keine Anfragen vorhanden.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='empty-msg'>Noch keine Speicherdatei angelegt.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>