<?php
require_once 'controllers/parcoursController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcours</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/timeline.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Frise Chronologique du Parcours</h1>
        <form id="result-form" method="GET" action="parcours.php">
            <div>
                <label for="annee">Sélectionnez une année :</label>
            </div>
            <div>
                <select name="annee" id="annee" onchange="this.form.submit()">
                    <?php
                    for ($annee = 2020; $annee <= 2025; $annee++) {
                        $selected = (isset($_GET['annee']) && $_GET['annee'] == $annee) ? 'selected' : '';
                        echo "<option value=\"$annee\" $selected>$annee</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <div class="timeline">
        <?php
        foreach ($participants as $etape) {
            $date = new DateTime($etape['date']);
            $date_formatee = $date->format('d F Y'); 

            echo '<div class="timeline-event">';
            echo '<div class="line"></div>';
            echo '<div class="circle" onclick="toggleContent(this)"></div>'; 
            echo '<div class="content hidden">'; 
            echo "<h3>Étape {$etape['numero_etape']} - {$date_formatee}</h3>";
            echo "<p><strong>Départ :</strong> {$etape['depart']}</p>";
            echo "<p><strong>Arrivée :</strong> {$etape['arrivee']}</p>";
            echo "<p><strong>Distance :</strong> {$etape['distance']} km</p>";
            echo "<p><strong>Type :</strong> {$etape['type']}</p>";
            echo "<p><strong>Dénivelé :</strong> {$etape['denivele']} m</p>";
            echo "<p><strong>Difficulté :</strong> {$etape['difficulte']}</p>";
            echo "<p><strong>Gagnant :</strong> {$etape['nom_gagnant']}</p>";
            echo "<p><strong>Description :</strong> {$etape['description']}</p>";
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
    <script src="assets/js/timeline.js"></script>
</body>
</html>