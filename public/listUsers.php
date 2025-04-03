<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Gestion des utilisateurs</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Numéro d'utilisateur</th>
                    <th>Nom</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Tableau des utilisateurs
                $utilisateurs = [
                    ['numero_user' => '1', 'nom' => 'Jean Dupont', 'admin' => true],
                    ['numero_user' => '2', 'nom' => 'Marie Curie', 'admin' => false],
                    ['numero_user' => '3', 'nom' => 'Albert Einstein', 'admin' => true],
                    ['numero_user' => '4', 'nom' => 'Isaac Newton', 'admin' => false],
                ];

                // Boucle pour afficher les données dans le tableau
                foreach ($utilisateurs as $utilisateur) {
                    echo "<tr>";
                        echo "<td>{$utilisateur['numero_user']}</td>";
                        echo "<td>{$utilisateur['nom']}</td>";
                        echo "<td style='text-align: center;'>";
                        echo "<input type='checkbox' " . ($utilisateur['admin'] ? "checked" : "") . " disabled>";
                        echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>