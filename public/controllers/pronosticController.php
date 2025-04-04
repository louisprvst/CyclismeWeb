<?php
// Récupérer les étapes depuis l'API
$url = "http://62.72.18.63:11048/etapes";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

$response = curl_exec($ch);
curl_close($ch);

// Décoder la réponse JSON
$etapes = json_decode($response, true);

// Vérifier si les données sont valides
if (json_last_error() !== JSON_ERROR_NONE || !is_array($etapes)) {
    $etapes = []; // Définit une liste vide si une erreur survient
}

// Filtrer les étapes pour ne garder que celles de 2025 et où nom_gagnant n'est pas nul
$etapes = array_filter($etapes, function ($etape) {
    return isset($etape['date'], $etape['nom_gagnant']) 
        && strpos($etape['date'], '2025') !== false 
        && $etape['nom_gagnant'] !== null;
});

// Récupérer l'étape sélectionnée
$numero_etape = isset($_GET['etape']) ? intval($_GET['etape']) : null;

// Exemple de données statiques pour les résultats (remplacez par une requête API si nécessaire)
$resultats = [
    ['position' => 1, 'nom' => 'Tadej Pogačar', 'nationalité' => 'Slovène', 'equipe' => 'UAE Team Emirates', 'temps' => '85h 42m 12s'],
    ['position' => 2, 'nom' => 'Jonas Vingegaard', 'nationalité' => 'Danois', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 45m 30s'],
    ['position' => 3, 'nom' => 'Primož Roglič', 'nationalité' => 'Slovène', 'equipe' => 'Jumbo-Visma', 'temps' => '85h 50m 05s'],
];
?>