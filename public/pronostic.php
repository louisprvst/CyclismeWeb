<?php
require_once __DIR__ . '/controllers/pronosticController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronostic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <?php include 'assets/inc/header.inc.php'; ?>
        <h1>Pronostic du Tour de France</h1>

        <!-- Menu déroulant pour sélectionner une étape -->
        <form id="result-form" method="GET" action="pronostic.php">
            <div>
                <label for="etape">Sélectionnez une étape :</label>
            </div>
            <div>
                <select name="etape" id="etape" onchange="this.form.submit()">
                    <?php
                    foreach ($etapes as $etape) {
                        $selected = ($numero_etape == $etape['numero_etape']) ? 'selected' : '';
                        echo "<option value=\"{$etape['numero_etape']}\" $selected>";
                        echo "Étape {$etape['numero_etape']} : {$etape['depart']} → {$etape['arrivee']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <!-- Affichage des résultats -->
        <?php if ($numero_etape): ?>
            <h2>Pronostic pour l'étape <?= htmlspecialchars($numero_etape) ?></h2>
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
                    <?php foreach ($resultats as $resultat): ?>
                        <tr>
                            <td><?= htmlspecialchars($resultat['position']) ?></td>
                            <td><?= htmlspecialchars($resultat['nom']) ?></td>
                            <td><?= htmlspecialchars($resultat['nationalité']) ?></td>
                            <td><?= htmlspecialchars($resultat['equipe']) ?></td>
                            <td><?= htmlspecialchars($resultat['temps']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>