<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclisme Web</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    </head>
<header>
    <div class="logo">
        <a href="index.php">
            <img src="assets/img/logo.png" alt="Logo_tdf">
        </a>
    </div>
    <div class="navbar" id="navbar">
        <nav>
            <ul>
                <li><a href="..\public\parcours.php">PARCOURS</a></li>
                <li><a href="..\public\participants.php">PARTICIPANTS</a></li>
                <li><a href="..\public\resultats.php">RÉSULTATS</a></li>
                <li><a href="..\public\contact.php">CONTACTS</a></li>
                <?php if (isset($admin) && $admin === true): ?>
                    <li><a href="..\public\listUsers.php">GESTION ADMIN</a></li>
                <?php endif; ?>
            </ul>
            <div class="auth-button">
                <?php if (isset($_COOKIE['token'])): ?>
                    <!-- Bouton "Se déconnecter" si le cookie 'token' existe -->
                    <form action="../controllers/logoutController.php" method="POST">
                        <button type="submit" class="btn-login">Se déconnecter</button>
                    </form>
                <?php else: ?>
                    <!-- Bouton "Se connecter" si le cookie 'token' n'existe pas -->
                    <a href="login.php" class="btn-login">Se connecter</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    
</header>