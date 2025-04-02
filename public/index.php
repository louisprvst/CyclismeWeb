<?php
//require_once __DIR__ . '/../controllers/indexController.php';
require_once __DIR__ . '/assets/inc/header.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclisme Web</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
    <div id="header-container">
    </div>
    <main>
        <div class="timeline-container">
        <div class="timeline">
            <?php
            for ($day = 5; $day <= 27; $day++) {
                echo '
                <div class="timeline-item">
                    <span class="dot"></span>
                    <span class="date">' . $day . ' Juil.</span>
                </div>';
            }
            ?>
        </div>
    </div>
        <div class="container">
            <img src="assets\inc\img\tdf25-affiche-parcours-1.jpg" alt="Carte tdf" style="width: 100%;">
        </div>
    </main>
    <div id="footer-container">
        <?php
        require_once __DIR__ . '/assets/inc/footer.inc.php';
        ?>
    </div>
</body>
</html>