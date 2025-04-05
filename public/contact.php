<?php
require_once __DIR__ . '/controllers/contactController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="contact-container">
        <h1>Contactez-nous</h1>
        <form method="POST" action="contact.php">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea name="message" id="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>
</body>
<?php include 'assets/inc/footer.inc.php'; ?>
</html>