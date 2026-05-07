<?php 
// Bindet den Kopf der Seite (inkl. Navigation und globaler CSS) ein
include 'layouts/header.php'; 
?>

<section class="hero">
    <div>
        <h1>Willkommen auf dem Reiterhof Hufeisen</h1>
        <p>Erlebe unvergessliche Ferien im Sattel.</p>
        <a href="reservierung.php" class="btn">Jetzt Urlaub buchen</a>
    </div>
</section>

<div class="container">
    <h2>Über uns</h2>
    <p>Unser Hof liegt inmitten grüner Wiesen und bietet Erholung für die ganze Familie. Seit über 30 Jahren kümmern wir uns mit Herzblut um Pferd und Reiter.</p>
    
    <div class="about-images">
        <img src="Bilder/Startseite/Hofansicht.jpg" alt="Hofansicht">
        <img src="Bilder/Startseite/Reitunterricht.jpg" alt="Reitunterricht">
    </div>
</div>

<?php
// Array für die Hof-Galerie. 
// Die Klassen 'gross', 'hoch' usw. bestimmen später im CSS, wie viele Spalten/Zeilen das Bild im Raster einnimmt.
$galerieBilder = [
    ["src" => "Bilder/Startseite/Pferde_koppel.jpg", "alt" => "Pferde auf der Koppel", "klasse" => "gross"], // Verbraucht 4 Plätze im Grid
    ["src" => "Bilder/Startseite/Kinderreiten.jpg", "alt" => "Kind beim Reiten", "klasse" => ""],          // Verbraucht 1 Platz
    ["src" => "Bilder/Startseite/Waldweg.jpg", "alt" => "Waldweg", "klasse" => "hoch"],                    // Verbraucht 2 Plätze
    ["src" => "Bilder/Startseite/Reitausrüstung.jpg", "alt" => "Reitausrüstung", "klasse" => ""],          // Verbraucht 1 Platz
    ["src" => "Bilder/Startseite/Stall_abend.jpg", "alt" => "Der Stall am Abend", "klasse" => ""]          // Verbraucht 1 Platz
];
?>

<div class="container">
    <h2 class="section-title">Unser Hofleben in Bildern</h2>
    
    <div class="hof-galerie">
        <?php foreach ($galerieBilder as $index => $bild): ?>
            <div class="galerie-item <?php echo $bild['klasse']; ?>">
                <a href="#hofbild-<?php echo $index; ?>">
                    <img src="<?php echo $bild['src']; ?>" alt="<?php echo $bild['alt']; ?>" class="zoom-img">
                </a>
            </div>

            <div id="hofbild-<?php echo $index; ?>" class="lightbox">
                <a href="#!" class="lightbox-close"></a>
                
                <div class="lightbox-content">
                    <img src="<?php echo $bild['src']; ?>" alt="<?php echo $bild['alt']; ?>">
                    <h2 class="lightbox-title"><?php echo $bild['alt']; ?></h2>
                    <a href="#!" class="btn-schliessen">Schließen (X)</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php 
// Bindet den Fuß der Seite ein
include 'layouts/footer.php'; 
?>