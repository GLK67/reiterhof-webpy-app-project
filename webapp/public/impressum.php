<?php 
// HEADER EINBINDEN
include 'layouts/header.php'; 
?>

<div class="container">
    <h2 class="section-title">Impressum</h2>

    <div class="impressum-content">
        <h3 class="impressum-subtitle">Angaben gemäß § 5 TMG</h3>
        <p>
            Reiterhof Hufeisen<br>
            Hufeisen-Straße 67<br>
            88167 Röthenbach (Allgäu)
        </p>

        <h3 class="impressum-subtitle">Vertreten durch:</h3>
        
        <div class="owner">
            <p>Dominik Häberle (Inhaber)</p>
            <img src="Bilder/Impressum/Domi.jpg" alt="Dominik Häberle" class="owner-photo">
            <p>Louis Beermann (Vertreter)</p>
            <img src="Bilder/Impressum/Louis.jpg" alt="Louis Beermann" class="coowner-photo">
            <p>Fynn Kegel (CTO)</p>
            <img src="Bilder/Impressum/Fym.jpg" alt="Fynn Kegel" class="cto-photo">
        </div>

        <h3 class="impressum-subtitle">Kontakt:</h3>
        <p>
            Telefon: +49 (0) 123 44 55 66<br>
            E-Mail: info@reiterhof-hufeisen.de<br>
            Standort: <a href="https://maps.app.goo.gl/iDVtcknB4ismrQT18" target="_blank" class="text-link">Auf Google Maps öffnen</a>
        </p>

        <h3 class="impressum-subtitle">Hier findest du uns:</h3>
        <div class="map-container">
            <iframe 
                src="https://maps.google.com/maps?q=Vordere+Burgauffahrt,+87527+Sonthofen&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                allowfullscreen="" 
                loading="lazy"
                class="map-iframe">
            </iframe>
        </div>

        <h3 class="impressum-subtitle">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:</h3>
        <p>
            Dominik Häberle<br>
            Hufeisen-Straße 67<br>
            88167 Röthenbach (Allgäu)
        </p>

        <h3 class="impressum-subtitle">Haftungsausschluss (Disclaimer)</h3>
        <p><strong>Haftung für Inhalte</strong><br>
        Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
        
        <p><strong>Urheberrecht</strong><br>
        Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.</p>
    </div>
        <h3 class="impressum-subtitle">Datenschutzerklärung</h3>
        <p><strong>Umgang mit Kontaktdaten & Reservierungen</strong><br>
        Wir nehmen den Schutz deiner persönlichen Daten sehr ernst. Wenn du unser Reservierungsformular oder den Preiskalkulator nutzt, erheben wir Daten wie deinen Namen, deine E-Mail-Adresse und den gewünschten Reisezeitraum. Diese Daten werden ausschließlich zur Bearbeitung deiner Anfrage auf unserem Server (in einer lokalen JSON-Datei) gespeichert und nicht an Dritte weitergegeben.</p>
        
        <p><strong>Cookies & Tracking</strong><br>
        Diese Website verwendet den lokalen Speicher deines Browsers (Local Storage), um deine Einstellung für den Hell-/Dunkelmodus (Dark Mode) zu speichern. Es werden keine Tracking-Cookies für Werbezwecke oder Ähnliches verwendet.</p>

        <h3 class="impressum-subtitle">Transparenz & KI-Einsatz (Zitation)</h3>
        <p>Dieses Webprojekt wurde im Rahmen einer schulischen Leistung erstellt. Um modernen Entwicklungsstandards gerecht zu werden, wurden bei der Erstellung folgende Hilfsmittel und Quellen verwendet:</p>
        
        <ul class="impressum-list">
            <li><strong>Programmierung & Code-Struktur:</strong> Bei der Erstellung und Optimierung des Codes (HTML, CSS, PHP) sowie bei der Fehlersuche kam unterstützend Künstliche Intelligenz (Google Gemini) als "Pair-Programming-Partner" zum Einsatz. Der Code wurde eigenständig strukturiert (MVC-Muster) und angepasst.</li>
            <li><strong>Texte:</strong> Einige Platzhalter-Texte und Strukturierungshilfen wurden ebenfalls mit Unterstützung von KI generiert und anschließend manuell überarbeitet.</li>
        </ul>
</div>

<?php 
// FOOTER EINBINDEN
include 'layouts/footer.php'; 
?>