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
    <h1>Résultats du Tour de France</h1>

    <form method="GET" action="resultats.php">
        <label for="annee">Sélectionnez une année :</label>
        <select name="annee" id="annee">
            <?php
            for ($annee = 2025; $annee >= 2020; $annee--) {
                $selected = (isset($_GET['annee']) && $_GET['annee'] == $annee) ? 'selected' : '';
                echo "<option value=\"$annee\" $selected>$annee</option>";
            }
            ?>
        </select>
        <button type="submit">Afficher</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Position</th>
                <th>Nom du Cycliste</th>
                <th>Nationalité</th>
                <th>Équipe</th>
                <th>Temps</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tableau des résultats
            $resultats = [
                ['position' => 1, 'nom' => 'Tadej Pogačar', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'temps' => '85h 42m 12s'],
                ['position' => 2, 'nom' => 'Jonas Vingegaard', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 45m 30s'],
                ['position' => 3, 'nom' => 'Primož Roglič', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 50m 05s'],
            ];

            // Boucle pour afficher les données dans le tableau
            foreach ($resultats as $resultat) {
                echo "<tr>";
                    echo "<td>{$resultat['position']}</td>";
                    echo "<td>{$resultat['nom']}</td>";
                    echo "<td>{$resultat['nationalité']}</td>";
                    echo "<td>{$resultat['equipe']}</td>";
                    echo "<td>{$resultat['temps']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>