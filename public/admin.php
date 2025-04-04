<?php
// Inclure le contrôleur pour récupérer les données des utilisateurs
require_once 'controllers/adminController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Liste des utilisateurs</h1>
        
        <?php if (!empty($users)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Numéro d'utilisateur</th>
                        <th>Nom</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td style="text-align: center;">
                                <input type="checkbox" <?= $user['admin'] ? 'checked' : '' ?> disabled>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php endif; ?>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>