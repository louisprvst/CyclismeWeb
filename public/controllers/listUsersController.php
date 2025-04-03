<?php

require_once '../config/init.conf.php';

// Construire l'URL pour l'API de récupération des utilisateurs
$urlListUsers = URL_API . 'user/list';

// Initialiser cURL pour récupérer les utilisateurs
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlListUsers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

// Exécuter la requête
$response = curl_exec($ch);

// Vérifier les erreurs
if (curl_errno($ch)) {
    $_SESSION['error'] = 'Une erreur est survenue : ' . curl_error($ch);
    curl_close($ch);
    header('Location: ../dashboard.php');
    exit();
}

// Fermer la session cURL
curl_close($ch);

// Décoder la réponse JSON
$users = json_decode($response, true);

// Vérifier si la réponse est valide
if (json_last_error() !== JSON_ERROR_NONE || !is_array($users)) {
    $_SESSION['error'] = 'Impossible de récupérer les utilisateurs.';
    $users = []; // Définit une liste vide si une erreur survient
}