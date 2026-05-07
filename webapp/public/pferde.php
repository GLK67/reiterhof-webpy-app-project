<?php 
// Bindet den Kopf der Seite (Navigation und CSS-Dateien) ein
include 'layouts/header.php'; 
?>

<?php
// Das Array mit unseren Pferden
$pferde = [
    ["name" => "Bella", "text" => "Sanfte Stute für Anfänger", "bild" => "bilder/Pferde/Bella.jpg"],
    ["name" => "Max", "text" => "Kleiner Frechdachs", "bild" => "bilder/Pferde/Max.jpg"],
    ["name" => "Luna", "text" => "Dressurtalent", "bild" => "bilder/Pferde/Luna.jpg"],
    ["name" => "Spirit", "text" => "Schnell wie der Wind", "bild" => "bilder/Pferde/Spirit.jpg"],
    ["name" => "Charly K.", "text" => "Der Kuschelbär", "bild" => "bilder/Pferde/Charly.jpg"],
    ["name" => "Fiona", "text" => "Springprofi", "bild" => "bilder/Pferde/Fiona.jpg"],
    ["name" => "Rocky", "text" => "Fels in der Brandung", "bild" => "bilder/Pferde/Rocky.jpg"],
    ["name" => "Sissi", "text" => "Unsere Haflinger-Dame", "bild" => "bilder/Pferde/Sissi.jpg"],
    ["name" => "Blu", "text" => "Chilliger Beschützer", "bild" => "bilder/Pferde/Blu.jpg"]
];

// Eigene Bubble-Sort Implementierung (aufsteigend nach Name)
function bubbleSort(&$array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if (strcmp($array[$j]['name'], $array[$j + 1]['name']) > 0) {
                // Tausche
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
}

// Eigene lineare Suche Implementierung
function linearSearch($array, $searchTerm) {
    foreach ($array as $index => $item) {
        if (stripos($item['name'], $searchTerm) !== false || stripos($item['text'], $searchTerm) !== false) {
            return $index;
        }
    }
    return -1;
}

// Sortiere das Array mit eigener Bubble-Sort und messe Zeit
$unsorted = $pferde; // Kopie für Vergleich
$start = microtime(true);
bubbleSort($pferde);
$end = microtime(true);
$bubbleTime = $end - $start;

// Vergleich mit PHP's usort
$pferdeUsort = $unsorted;
$start = microtime(true);
usort($pferdeUsort, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});
$end = microtime(true);
$usortTime = $end - $start;

// Ausgabe der Laufzeiten (für Debugging, später entfernen oder in Kommentar)
echo "<!-- Bubble-Sort Zeit: " . number_format($bubbleTime, 6) . " Sekunden -->\n";
echo "<!-- usort Zeit: " . number_format($usortTime, 6) . " Sekunden -->\n";

// Suche, falls Parameter gesetzt
$searchResult = -1;
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResult = linearSearch($pferde, $searchTerm);
}
?>

<div class="container">
    <h2 class="section-title">Unsere vierbeinigen Freunde</h2>
    
    <!-- Suchformular -->
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Suche nach Pferd..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Suchen</button>
    </form>
    
    <?php if ($searchResult !== -1): ?>
        <p>Gefunden: <?php echo $pferde[$searchResult]['name']; ?> - <?php echo $pferde[$searchResult]['text']; ?></p>
    <?php elseif (isset($_GET['search']) && $_GET['search'] !== ''): ?>
        <p>Kein Pferd gefunden.</p>
    <?php endif; ?>
    
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