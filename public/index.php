<?php
require_once __DIR__ . '/controllers/indexController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclisme Web</title>
    <link rel="stylesheet" href="assets/styles/map.css">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="body-index">
    <?php include 'assets/inc/header.inc.php'; ?>
    <main>
        <div class="container">
            <!-- Titre de la carte -->
            <h1 class="map-title">Carte interactive des différentes étapes du Tour de France 2025</h1>
            <!-- Carte interactive -->
            <div id="map"></div>
            <p class="map-description">
                <!-- Description de la carte -->
                Découvrez les étapes passionnantes du Tour de France 2025 grâce à cette carte interactive. 
                Explorez les parcours, les points de départ et d'arrivée, et suivez les itinéraires des cyclistes 
                à travers les magnifiques paysages de la France.
            </p>
        </div>
    </main>
    <?php include 'assets/inc/footer.inc.php'; ?>
    <script src="assets/js/map.js"></script>
</body>
</html>