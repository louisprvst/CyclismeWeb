<?php

require_once '../../config/init.conf.php';

if (isset($_COOKIE['token'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../index.php');
    exit();
}

// Vérifier si les données POST sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Construire l'URL pour l'API de register
    $urlRegister = URL_API . 'user/login';

    // Préparer les données à envoyer
    $postData = [
        'username' => $username,
        'password' => $password
    ];

    $postDataJson = json_encode($postData); 

    // Initialiser cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlRegister);
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postDataJson)
    ]);

    // Exécuter la requête
    $response = curl_exec($ch);

    // Vérifier les erreurs
    if (curl_errno($ch)) {
        $_SESSION['error'] = 'Une erreur est survenue : ' . curl_error($ch);
        curl_close($ch);
        header('Location: ../register.php');
        exit();
    }

    // Fermer la session cURL
    curl_close($ch);

     // Décoder la réponse JSON
    $responseData = json_decode($response, true);

    if ($responseData['success'] === true) {
        // Succès : rediriger vers la page de connexion
        setcookie(
            'token', 
            $responseData['token'], 
            [
                'expires' => time() + (3600), // Cookie valide 1 heure
                'path' => '/', // Disponible sur tout le site
                'domain' => '', // Par défaut, le domaine actuel
                'httponly' => true, // Inaccessible via JavaScript
                'samesite' => 'Strict' // Empêche les requêtes intersites
            ]
        );
        header('Location: ../index.php');
        exit();
    } else {
        // Échec : stocker le message d'erreur dans la session
        $_SESSION['error'] = $response;
        header('Location: ../login.php');
        exit();
    }
} else {
    $_SESSION['error'] = 'Veuillez fournir un nom d\'utilisateur et un mot de passe.';
    header('Location: ../login.php');
    exit();
}