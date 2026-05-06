<?php 
// === views/RechnerView.php ===
// HEADER EINBINDEN
include 'layouts/header.php'; 
?>

<div class="container">
    <h2 class="section-title">Preiskalkulator mit Zimmerwahl</h2>
    <p class="subtitle">Berechne hier deine Kosten und frage direkt an.</p>

    <form method="POST" action="rechner.php">
        <div class="form-group">
            <label>Wähle dein Zimmer:</label>
            <select name="zimmer_preis">
                <option value="45" <?php echo (isset($_POST['zimmer_preis']) && $_POST['zimmer_preis'] == '45') ? 'selected' : ''; ?>>Einzelzimmer (45€ / Nacht)</option>
                <option value="70" <?php echo (isset($_POST['zimmer_preis']) && $_POST['zimmer_preis'] == '70') ? 'selected' : ''; ?>>Doppelzimmer (70€ / Nacht)</option>
                <option value="100" <?php echo (isset($_POST['zimmer_preis']) && $_POST['zimmer_preis'] == '100') ? 'selected' : ''; ?>>Familienzimmer (100€ / Nacht)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Anzahl der Nächte:</label>
            <input type="number" name="naechte" min="1" value="<?php echo $_POST['naechte'] ?? '1'; ?>" required>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="reiten" value="25" class="checkbox-input" <?php echo isset($_POST['reiten']) ? 'checked' : ''; ?>> 
                <span>Täglich Reitunterricht (+25€ / Nacht)</span>
            </label>
        </div>
        
        <div class="button-group">
            <button type="submit" name="submit_rechner" class="btn-primary">Jetzt berechnen</button>
            <a href="rechner.php" class="btn-secondary">Leeren</a>
        </div>
    </form>

    <?php
    // Wir prüfen einfach nur: Hat der Controller ein Ergebnis geliefert?
    // Die fiesen "echo" Befehle für HTML sind weg, wir nutzen sauberes HTML mit kurzen PHP-Tags.
    if ($ergebnis !== null): 
    ?>
        <div class='ergebnis-box'>
            <h3 class='ergebnis-titel'>Dein Gesamtpreis: <?php echo number_format($ergebnis, 2, ',', '.'); ?> €</h3>
            <p>Details: <?php echo $naechte; ?> Nächte à <?php echo ($preisNacht + $reitAufschlag); ?> €</p>
            
            <a href='reservierung.php?preis=<?php echo $ergebnis; ?>&zimmer=<?php echo $gewaehltesZimmer . $reitenParam; ?>&naechte=<?php echo $naechte; ?>' class='btn-primary ergebnis-link'>
                Diesen Preis direkt anfragen →
            </a>
        </div>
    <?php endif; ?>
</div>

<?php 
// FOOTER EINBINDEN
include 'layouts/footer.php'; 
?>