<?php
require_once __DIR__ . '/controllers/profilController.php'; // Inclure le contrôleur
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Profil de l'utilisateur</h1>
        <div class="profile-card">
            <img src="assets/img/default-avatar.png" alt="Avatar" class="profile-avatar">
            <h2><?= htmlspecialchars($user['nom']) ?> <?= htmlspecialchars($user['prenom']) ?></h2>
            <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Date d'inscription :</strong> <?= htmlspecialchars($user['date_inscription']) ?></p>
            <p><strong>Rôle :</strong> <?= htmlspecialchars($user['role']) ?></p>
        </div>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>