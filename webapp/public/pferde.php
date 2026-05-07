<?php 
// Bindet den Kopf der Seite (Navigation und CSS-Dateien) ein
include 'layouts/header.php'; 
?>

<?php
// Das Array mit unseren Pferden
$pferde = [
    ["name" => "Bella", "text" => "Sanfte Stute für Anfänger", "bild" => "Bilder/Pferde/Bella.jpg"],
    ["name" => "Max", "text" => "Kleiner Frechdachs", "bild" => "Bilder/Pferde/Max.jpg"],
    ["name" => "Luna", "text" => "Dressurtalent", "bild" => "Bilder/Pferde/Luna.jpg"],
    ["name" => "Spirit", "text" => "Schnell wie der Wind", "bild" => "Bilder/Pferde/Spirit.jpg"],
    ["name" => "Charly K.", "text" => "Der Kuschelbär", "bild" => "Bilder/Pferde/Charly.jpg"],
    ["name" => "Fiona", "text" => "Springprofi", "bild" => "Bilder/Pferde/Fiona.jpg"],
    ["name" => "Rocky", "text" => "Fels in der Brandung", "bild" => "Bilder/Pferde/Rocky.jpg"],
    ["name" => "Sissi", "text" => "Unsere Haflinger-Dame", "bild" => "Bilder/Pferde/Sissi.jpg"],
    ["name" => "Blu", "text" => "Chilliger Beschützer", "bild" => "Bilder/Pferde/Blu.jpg"]
];
?>

<div class="container">
    <h2 class="section-title">Unsere vierbeinigen Freunde</h2>
    
    <div class="horse-grid">
        <?php foreach ($pferde as $index => $pferd): ?>
            
            <div class="horse-card">
                <a href="#pferd-<?php echo $index; ?>">
                    <img src="<?php echo $pferd['bild']; ?>" alt="<?php echo $pferd['name']; ?>" class="horse-img">
                </a>
                
                <div class="info">
                    <h3><?php echo $pferd['name']; ?></h3>
                    <p><?php echo $pferd['text']; ?></p>
                </div>
            </div>

            <div id="pferd-<?php echo $index; ?>" class="lightbox">
                <a href="#!" class="lightbox-close"></a>
                
                <div class="lightbox-content">
                    <img src="<?php echo $pferd['bild']; ?>" alt="<?php echo $pferd['name']; ?>">
                    <h2 class="section-title"><?php echo $pferd['name']; ?></h2>
                    <p><?php echo $pferd['text']; ?></p>
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