<?php
// Findet heraus, welche Datei gerade offen ist (z.B. index.php)
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reiterhof Hufeisen</title>
    <link rel="shortcut icon" href="./Logo.jpg" type="image/png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css">
    
    <?php 
    // Lädt zusätzlich die passende CSS-Datei für die jeweilige Seite (Conditional Loading)
    if ($currentPage == 'index.php') {
        echo '<link rel="stylesheet" href="CSS/start.css">';
        echo '<link rel="stylesheet" href="CSS/lightbox.css">';
    }
    if ($currentPage == 'aktivitaeten.php') echo '<link rel="stylesheet" href="CSS/aktivitaeten.css">';
    if ($currentPage == 'pferde.php') {
        echo '<link rel="stylesheet" href="CSS/pferde.css">';
        echo '<link rel="stylesheet" href="CSS/lightbox.css">';
    }
    if ($currentPage == 'reservierung.php') echo '<link rel="stylesheet" href="CSS/reservierung.css">';
    if ($currentPage == 'rechner.php') echo '<link rel="stylesheet" href="CSS/rechner.css">';
    if ($currentPage == 'admin.php') echo '<link rel="stylesheet" href="CSS/admin.css">';
    if ($currentPage == 'impressum.php') echo '<link rel="stylesheet" href="CSS/impressum.css">';
    ?>

    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark-mode');
        }
    </script>
</head>

<body>

<header>
    <div class="nav-container">
        <a href="index.php" class="logo"><img src="Logo.jpg" alt="Logo Reiterhof Hufeisen"></a>
        <nav>
            <ul>
                <li><a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Startseite</a></li>
                <li><a href="aktivitaeten.php" class="<?php echo ($currentPage == 'aktivitaeten.php') ? 'active' : ''; ?>">Aktivitäten</a></li>
                <li><a href="pferde.php" class="<?php echo ($currentPage == 'pferde.php') ? 'active' : ''; ?>">Unsere Pferde</a></li>
                <li><a href="reservierung.php" class="<?php echo ($currentPage == 'reservierung.php') ? 'active' : ''; ?>">Reservierung</a></li>
                <li><a href="rechner.php" class="<?php echo ($currentPage == 'rechner.php') ? 'active' : ''; ?>">Rechner</a></li>
                <li><a href="admin.php" class="<?php echo ($currentPage == 'admin.php') ? 'active' : ''; ?>">ADMIN🔐</a></li>
                
                <li><button id="theme-toggle">🌙 Dark Mode</button></li>
            </ul>
        </nav>
    </div>
</header>

<script>
    // Wir suchen uns den Button aus dem HTML
    const toggleBtn = document.getElementById('theme-toggle');
    
    // Wir prüfen beim ersten Laden: Ist der Dark Mode gerade an?
    if (document.documentElement.classList.contains('dark-mode')) {
        toggleBtn.innerText = '☀️ Light Mode';           // Knopf-Text ändern
        document.body.classList.add('dark-mode');        // CSS Klasse vergeben
    }

    // Was passiert, wenn jemand auf den Knopf klickt?
    toggleBtn.addEventListener('click', () => {
        // 'toggle' schaltet die Klasse ein, wenn sie aus ist, und aus, wenn sie an ist!
        document.body.classList.toggle('dark-mode');
        document.documentElement.classList.toggle('dark-mode');
        
        // Prüfen, was wir gerade eingestellt haben, um es für die nächste Seite zu speichern
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');       // Im Browser merken!
            toggleBtn.innerText = '☀️ Light Mode';
        } else {
            localStorage.setItem('theme', 'light');      // Im Browser merken!
            toggleBtn.innerText = '🌙 Dark Mode';
        }
    });
</script>