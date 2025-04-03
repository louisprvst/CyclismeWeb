<?php
require_once '../config/init.conf.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/styles/login-register.css">
</head>
<body>
    <div class="form-container">
        <h1>Inscription</h1>

        <!-- Afficher le message d'erreur s'il existe -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?= htmlspecialchars($_SESSION['error']); ?>
            </div>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>

        <form id="registerForm" method="POST" action="controllers/registerController.php">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>
    <script src="assets/js/login-register.js"></script>
</body>
</html>