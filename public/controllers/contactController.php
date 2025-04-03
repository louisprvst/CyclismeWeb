<?php
require_once '../vendor/autoload.php'; // Charger PHPMailer via Composer
require_once __DIR__ . '/../../config/init.conf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../config');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    // Vérification des champs
    if (empty($name) || empty($message)) {
        die("Tous les champs sont obligatoires.");
    }

    // Configuration de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST']; // Hôte SMTP depuis .env
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER']; // Nom d'utilisateur SMTP depuis .env
        $mail->Password = $_ENV['MAIL_PASS']; // Mot de passe SMTP depuis .env
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Utiliser SSL/TLS
        $mail->Port = $_ENV['MAIL_PORT']; // Port SMTP depuis .env

        // Destinataire et expéditeur
        $mail->setFrom($_ENV['MAIL_USER'], 'Formulaire de Contact'); // Adresse de l'expéditeur
        $mail->addAddress('matheis.fardel@orange.fr'); // Adresse de destination

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body = "<p><strong>Nom :</strong> {$name}</p><p><strong>Message :</strong><br>{$message}</p>";
        $mail->AltBody = "Nom : {$name}\nMessage : {$message}";

        // Envoi de l'email
        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
}
?>