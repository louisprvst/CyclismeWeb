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
    <h1>Liste des participants</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom dy Cycliste</th>
                <th>Prénom du cycliste</th>
                <th>Nationalité</th>
                <th>Équipe</th>
                <th>Date de naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tableau des résultats
            $resultats = [
                ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
            ];

            // Boucle pour afficher les données dans le tableau
            foreach ($resultats as $resultat) {
                echo "<tr>";
                    echo "<td>{$resultat['nom']}</td>";
                    echo "<td>{$resultat['prenom']}</td>";
                    echo "<td>{$resultat['nationalité']}</td>";
                    echo "<td>{$resultat['equipe']}</td>";
                    echo "<td>{$resultat['dateNaissance']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>