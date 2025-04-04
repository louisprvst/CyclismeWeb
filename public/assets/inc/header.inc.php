<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclisme Web</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../js/site.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li><a href="../parcours.php">PARCOURS</a></li>
                <li><a href="../participants.php">PARTICIPANTS</a></li>
                <li><a href="../pronostic.php">PRONOSTICS</a></li>
                <li><a href="../contact.php">CONTACTS</a></li>
                <?php if (isset($admin) && $admin === true): ?>
                    <li><a href="listUsers.php">GESTION ADMIN</a></li>
                <?php endif; ?>
                <!-- Boutons de connexion/déconnexion -->
                <?php if (isset($_COOKIE['token'])): ?>
                    <!-- Bouton "Se déconnecter" -->
                    <li>
                        <a href="" class="btn-icon">
                            <i class="fas fa-user"></i> <!-- Icône de profil -->
                            <?php echo $_SESSION['user']['username']; ?>
                        </a>
                        <a href="../controllers/logoutController.php" class="btn-icon">
                            <i class="fas fa-sign-out-alt"></i> <!-- Icône de déconnexion -->                        
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Bouton "Se connecter" -->
                    <li>
                        <a href="login.php" class="btn-icon">
                            <i class="fas fa-sign-in-alt"></i> <!-- Icône de connexion -->
                            Se connecter
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>