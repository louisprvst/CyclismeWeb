<?php

require_once '../../vendor/autoload.php'; 
require_once '../../config/init.conf.php';

// Vérifier si les données POST sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Construire l'URL pour l'API de login
    $urlLogin = URL_API . '/login';

    // Préparer les données à envoyer
    $postData = [
        'username' => $username,
        'password' => $password
    ];

    // Initialiser cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlLogin);
    curl_setopt($ch, CURLOPT_POST, true); // Indiquer qu'il s'agit d'une requête POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData)); // Ajouter les données POST
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retourner la réponse sous forme de chaîne

    // Exécuter la requête
    $response = curl_exec($ch);

    // Vérifier les erreurs
    if (curl_errno($ch)) {
        echo 'Une erreur est survenue : ' . curl_error($ch);
        curl_close($ch);
        exit();
    }

    // Fermer la session cURL
    curl_close($ch);

    // Traiter la réponse
    $responseData = json_decode($response, true); // Décoder la réponse JSON

    if (isset($responseData['token'])) {
        // Succès : un token a été retourné
        echo 'Connexion réussie. Token : ' . $responseData['token'];
    } else {
        // Échec : afficher le message d'erreur
        echo 'Erreur : ' . ($responseData['message'] ?? 'Une erreur inconnue est survenue.');
    }
} else {
    echo 'Veuillez fournir un nom d\'utilisateur et un mot de passe.';
}