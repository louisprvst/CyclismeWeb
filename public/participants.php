<?php
    require_once __DIR__ . '/controllers/participantsController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link rel="stylesheet" href="style.css">
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
        <table border="1">
            <thead>
                <tr>
                    <th>N° du coureur</th>
                    <th>Coureur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($participants)) {
                    // Boucle pour afficher les données dans le tableau
                    foreach ($participants as $participant) {
                        echo "<tr>";
                        echo "<td>{$participant['num_coureur']}</td>";
                        echo "<td>{$participant['coureur']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun participant trouvé pour l'année $annee.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>