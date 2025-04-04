<?php
// Récupérer l'année sélectionnée depuis le formulaire GET
$annee = isset($_GET['annee']) ? intval($_GET['annee']) : 2025;

// Construire l'URL de l'API
$url = "http://62.72.18.63:11048/etapes";

// Initialiser cURL pour effectuer la requête
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

// Exécuter la requête et récupérer la réponse
$response = curl_exec($ch);
curl_close($ch);

// Décoder la réponse JSON
$resultats = json_decode($response, true);

// Vérifier si les données sont valides
if (json_last_error() !== JSON_ERROR_NONE || !is_array($resultats)) {
    $resultats = []; // Définit une liste vide si une erreur survient
}

// Filtrer les étapes pour ne garder que celles de l'année sélectionnée
$resultats = array_filter($resultats, function ($etape) use ($annee) {
    return isset($etape['date']) && strpos($etape['date'], (string)$annee) === 0;
});
?>