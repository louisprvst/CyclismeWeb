<?php
// Définir l'année par défaut (par exemple, 2025)
$annee = isset($_GET['annee']) ? intval($_GET['annee']) : 2025;

// Construire l'URL dynamique en fonction de l'année sélectionnée
$url = "http://62.72.18.63:11048/etapes/$annee";

// Initialiser cURL pour récupérer les étapes
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

$response = curl_exec($ch);
curl_close($ch);

// Décoder la réponse JSON
$resultats = json_decode($response, true);

// Vérifier si les données sont valides
if (json_last_error() !== JSON_ERROR_NONE || !is_array($resultats)) {
    $resultats = []; // Définit une liste vide si une erreur survient
}
?>