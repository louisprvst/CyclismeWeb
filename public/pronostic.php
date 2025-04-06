<?php
require_once __DIR__ . '/controllers/pronosticController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronostics</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/pronostic.css">
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
            <p class="pronostic-info">Nos pronostics sont établis en fonction des performances des coureurs sur des étapes similaires (niveau de difficulté, dénivelé, etc.).</p>
            <h2>Top 3 pour l'étape <?= htmlspecialchars($numero_etape) ?></h2>
            <div class="podium">
                <?php foreach ($top3_etape as $coureur): ?>
                    <div class="podium-card position-<?= htmlspecialchars($coureur['position']) ?>">
                        <div class="podium-rank">#<?= htmlspecialchars($coureur['position']) ?></div>
                        <div class="podium-name"><?= htmlspecialchars($coureur['nom']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2>Podium par spécialité</h2>
            <?php
            // Regrouper les coureurs par spécialité
            $specialities = [];
            foreach ($top3_par_specialite as $specialite) {
                $specialities[$specialite['specialite']][] = $specialite;
            }
            ?>

            <?php foreach ($specialities as $speciality => $coureurs): ?>
                <h3><?= ucfirst(htmlspecialchars($speciality)) ?></h3>
                <div class="podium">
                    <?php foreach ($coureurs as $coureur): ?>
                        <div class="podium-card position-<?= htmlspecialchars($coureur['position']) ?>">
                            <div class="podium-rank">#<?= htmlspecialchars($coureur['position']) ?></div>
                            <div class="podium-name"><?= htmlspecialchars($coureur['nom']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>