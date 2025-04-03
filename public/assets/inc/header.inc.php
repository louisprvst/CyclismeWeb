<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyclisme Web</title>
    <link rel="stylesheet" href="CyclismeWeb\public\assets\styles\styles.css">
</head>
<header>
    <div class="logo">
        <a href="..\public\index.php">
            <img src="..\public\assets\inc\img\Tour_de_France_logo.svg.png" alt="Logo_tdf">
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
        </nav>
    </div>
</header>