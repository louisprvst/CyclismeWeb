<?php

require_once __DIR__ . '/../../config/init.conf.php';

// Vérifier si l'utilisateur est connecté et est admin
if (!isset($_SESSION['user']) || !$_SESSION['user']['admin']) {
    header('Location: ../login.php');
    exit();
}

// Si le formulaire d'édition est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {
    $id = intval($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $admin = isset($_POST['admin']) ? true : false;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    // Vérifier les critères du mot de passe si un nouveau mot de passe est fourni
    if ($password !== null) {
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/';

        if (!preg_match($passwordRegex, $password)) {
            $_SESSION['error'] = 'Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.';
            header('Location: ../admin.php');
            exit();
        }
    }

    // Construire les données à envoyer
    $data = [
        'username' => $username,
        'admin' => $admin
    ];

    if ($password !== null) {
        $data['password'] = $password;
    }

    // Construire l'URL pour l'API de mise à jour
    $urlUpdateUser = URL_API . "user/update/$id";

    // Préparer les données à envoyer
    $jsonData = json_encode($data);

    // Initialiser cURL pour envoyer la requête PATCH
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlUpdateUser);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Exécuter la requête
    $response = curl_exec($ch);

    // Vérifier les erreurs
    if (curl_errno($ch)) {
        $_SESSION['error'] = 'Une erreur est survenue : ' . curl_error($ch);
    } else {
        $_SESSION['success'] = 'Utilisateur mis à jour avec succès.';
    }

    // Fermer la session cURL
    curl_close($ch);

    // Rediriger vers la page admin
    header('Location: ../admin.php');
    exit();
}

// Récupérer la liste des utilisateurs
$urlListUsers = URL_API . 'user/list';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlListUsers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
$response = curl_exec($ch);
curl_close($ch);

$users = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($users)) {
    $users = [];
}