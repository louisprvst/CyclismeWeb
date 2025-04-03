<?php
require_once '../config/init.conf.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/styles/login-register.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="container">
            <img src="assets/img/logo.png" alt="Carte tdf" style="width: 100%; height: auto;">
        </div>
        <h1>Connexion</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?= htmlspecialchars($_SESSION['error']); ?>
            </div>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>

        <form id="registerForm" method="POST" action="controllers/loginController.php">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>
        <div class="redirect-login">
            <p>Vous n'avez pas de compte ?</p>
            <a href="register.php" class="btn-login">Inscrivez-vous</a>
        </div>
    </div>
    <script src="assets/js/login-register.js"></script>
</body>
</html>