<?php
require_once __DIR__ . '/controllers/parcoursController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcours</title>
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
                    for ($anneeOption = 2020; $anneeOption <= 2025; $anneeOption++) {
                        $selected = (isset($_GET['annee']) && $_GET['annee'] == $anneeOption) ? 'selected' : '';
                        echo "<option value=\"$anneeOption\" $selected>$anneeOption</option>";
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
                    <th>Vainqueur</th> <!-- Nouvelle colonne -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Boucle pour afficher les données filtrées
                foreach ($resultats as $resultat) {
                    echo "<tr>";
                        echo "<td>{$resultat['numero_etape']}</td>";
                        echo "<td>{$resultat['depart']}</td>";
                        echo "<td>{$resultat['arrivee']}</td>";
                        echo "<td>{$resultat['distance']}</td>";
                        echo "<td>{$resultat['denivele']}</td>";
                        echo "<td>{$resultat['difficulte']}</td>";
                        echo "<td>{$resultat['type']}</td>";
                        echo "<td>" . (!empty($resultat['nom_gagnant']) ? $resultat['nom_gagnant'] : 'N/A') . "</td>"; // Affiche le nom du gagnant ou "N/A"
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>