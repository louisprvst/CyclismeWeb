<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../public/assets/styles/styles.css">
</head>
<body>
    <div class="content">
        <?php include 'assets/inc/header.inc.php'; ?>
        <h1>Contactez-nous</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $nom = htmlspecialchars($_POST['nom']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Validation des champs
            if (!empty($nom) && !empty($email) && !empty($message)) {
                $mail = new PHPMailer(true);

                try {
                    // Configuration du serveur SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ethan.capon2@gmail.com';
                    $mail->Password = 'votre-mot-de-passe-d-application';
                    $mail->Port = 587;

                    // Destinataires
                    $mail->setFrom('ethan.capon2@gmail.com', 'Nom de l\'expéditeur');
                    $mail->addAddress('matheis.fardel@orange.fr'); // Adresse du destinataire

                    // Contenu de l'email
                    $mail->isHTML(false); // Email en texte brut
                    $mail->Subject = "Nouveau message de contact de $nom";
                    $mail->Body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";

                    // Envoi de l'email
                    $mail->send();
                    echo "<p style='color: green;'>Votre message a été envoyé avec succès.</p>";
                } catch (Exception $e) {
                    echo "<p style='color: red;'>Une erreur est survenue : {$mail->ErrorInfo}</p>";
                }
            } else {
                echo "<p style='color: red;'>Veuillez remplir tous les champs.</p>";
            }
        }
        ?>

        <form method="POST" action="">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
            </div>
            <div>
                <label for="message">Message :</label>
                <textarea id="message" name="message" placeholder="Votre message" rows="5" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>