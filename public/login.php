<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/styles/login-register.css">
</head>
<body>
    <div class="form-container">
        <h1>Connexion</h1>
        <form id="loginForm" method="POST" action="controllers/loginController.php">
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
    </div>
    <script src="assets/js/login-register.js"></script>
</body>
</html>