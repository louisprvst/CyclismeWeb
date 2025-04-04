<?php
require_once __DIR__ . '/controllers/pronosticController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronostics</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <?php include 'assets/inc/header.inc.php'; ?>
        <h1>Pronostics du Tour de France</h1>

        <!-- Formulaire pour sélectionner une étape -->
        <form id="result-form" method="GET" action="pronostic.php">
            <div>
                <label for="etape">Sélectionnez une étape :</label>
            </div>
            <div>
                <select name="etape" id="etape" onchange="this.form.submit()">
                    <?php
                    foreach ($etapes as $etape) {
                        $selected = (isset($_GET['etape']) && $_GET['etape'] == $etape['numero_etape']) ? 'selected' : '';
                        echo "<option value=\"{$etape['numero_etape']}\" $selected>";
                        echo "Étape {$etape['numero_etape']} : {$etape['depart']} → {$etape['arrivee']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <!-- Affichage des pronostics -->
        <?php if (isset($_GET['etape'])): ?>
            <h2>Top 3 pour l'étape <?= htmlspecialchars($numero_etape) ?></h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top3_etape as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['position']) ?></td>
                            <td><?= htmlspecialchars($row['nom']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Top 3 par spécialité pour l'étape <?= htmlspecialchars($numero_etape) ?></h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Spécialité</th>
                        <th>Nom</th>
                        <th>Équipe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top3_par_specialite as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['specialite']) ?></td>
                            <td><?= htmlspecialchars($row['nom']) ?></td>
                            <td><?= htmlspecialchars($row['equipe']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>