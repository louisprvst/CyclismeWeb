<?php
    require_once __DIR__ . '/controllers/participantsController.php';
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
        <h1>Liste des Participants</h1>
        <form id="result-form" method="GET" action="participants.php">
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
                    ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Capon', 'prenom' => 'Ethan', 'nationalité' => 'Français', 'equipe' => 'UAE Team Emirates', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Vingegaard', 'prenom' => 'Jonas', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
                    ['nom' => 'Roglič', 'prenom' => 'Primož', 'nationalité' => 'Français', 'equipe' => 'Jumbo-Visma', 'dateNaissance' => '28-10-2005'],
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
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>