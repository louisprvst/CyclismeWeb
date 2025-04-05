<?php

require_once __DIR__ . '/../../config/init.conf.php';

// Récupérer l'année sélectionnée dans le formulaire (par défaut : 2020)
$annee = isset($_GET['annee']) ? intval($_GET['annee']) : 2020;

// Construire l'URL pour l'API
$url = "http://62.72.18.63:11048/etapes/$annee";

// Initialiser cURL pour récupérer les données des étapes
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

// Exécuter la requête
$response = curl_exec($ch);

// Vérifier les erreurs
if (curl_errno($ch)) {
    $participants = [];
} else {
    // Décoder la réponse JSON
    $participants = json_decode($response, true);
}

// Fermer la session cURL
curl_close($ch);