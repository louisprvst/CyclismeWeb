<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Détail du Parcours</h1>
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

        <table border="1">
            <thead>
                <tr>
                    <th>Numéro de l'étape</th>
                    <th>Départ</th>
                    <th>Arrivé</th>
                    <th>Distance</th>
                    <th>Dénivelé</th>
                    <th>Difficulté</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Tableau des résultats
                $resultats = [
                    ['num_etape' => '1', 'depart' => 'Calais', 'arrive' => 'Boulogne', 'distance' => '1cm', 'denivele' => '800/', 'difficulte' => 'Facile', 'type' => 'Plat'],
                    ['num_etape' => '2', 'depart' => 'Lille', 'arrive' => 'Arras', 'distance' => '1cm', 'denivele' => '800/', 'difficulte' => 'Facile', 'type' => 'Plat'],
                    ['num_etape' => '3', 'depart' => 'Lille', 'arrive' => 'Arras', 'distance' => '1cm', 'denivele' => '800/', 'difficulte' => 'Facile', 'type' => 'Plat'],
                    ['num_etape' => '4', 'depart' => 'Lille', 'arrive' => 'Arras', 'distance' => '1cm', 'denivele' => '800/', 'difficulte' => 'Facile', 'type' => 'Plat'],
                    
                ];

                // Boucle pour afficher les données dans le tableau
                foreach ($resultats as $resultat) {
                    echo "<tr>";
                        echo "<td>{$resultat['num_etape']}</td>";
                        echo "<td>{$resultat['depart']}</td>";
                        echo "<td>{$resultat['arrive']}</td>";
                        echo "<td>{$resultat['distance']}</td>";
                        echo "<td>{$resultat['denivele']}</td>";
                        echo "<td>{$resultat['difficulte']}</td>";
                        echo "<td>{$resultat['type']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>