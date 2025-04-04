<?php
    require_once __DIR__ . '/controllers/resultatsController.php';
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
    <div class="content">
        <?php include 'assets/inc/header.inc.php'; ?>
        <h1>Résultats du Tour de France</h1>

        <form id="result-form" method="GET" action="resultats.php">
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

<?php
// Vérifie si une année est sélectionnée et si elle est égale à 2025
if (isset($_GET['annee']) && $_GET['annee'] == 2025) {
    echo '<div style="text-align: center; margin-top: 20px;">';
    echo '<button id="propose-pronostic-btn" style="padding: 10px 20px; background-color: #f7c948; color: #333; border: none; border-radius: 4px; cursor: pointer;">Proposer un pronostic</button>';
    echo '</div>';
}
?>

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
                $resultats = [
                    ['position' => 1, 'nom' => 'Tadej Pogačar', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'temps' => '85h 42m 12s'],
                    ['position' => 2, 'nom' => 'Jonas Vingegaard', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 45m 30s'],
                    ['position' => 3, 'nom' => 'Primož Roglič', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 50m 05s'],
                ];

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
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>