<?php
    require_once __DIR__ . '/controllers/participantsController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/participant.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Liste des Participants</h1>
        <form id="result-form" method="GET" action="participants.php">
            <div>
                <label for="annee">Sélectionnez une année :</label>
            </div>
            <div>
                <select name="annee" id="annee" onchange="this.form.submit()">
                    <?php
                    for ($anneeOption = 2020; $anneeOption <= 2025; $anneeOption++) {
                        $selected = ($anneeOption == $annee) ? 'selected' : '';
                        echo "<option value=\"$anneeOption\" $selected>$anneeOption</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <div class="participants-grid">
            <?php
            if (!empty($participants)) {
                // Boucle pour afficher les participants sous forme de cartes
                foreach ($participants as $participant) {
                    echo '<div class="participant-card">';
                    echo '<div class="profile-picture"></div>'; // Image grise anonyme
                    echo '<div class="participant-info">';
                    echo "<p class='participant-name'><strong>{$participant['coureur']}</strong></p>";
                    echo "<p class='participant-number'>N° du coureur : {$participant['num_coureur']}</p>";
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Aucun participant trouvé pour l'année $annee.</p>";
            }
            ?>
        </div>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>