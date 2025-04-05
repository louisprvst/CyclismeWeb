<?php

require_once '../config/init.conf.php';

if (!isset($_SESSION['user']['login']) || ($_SESSION['user']['login'] !== true)) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}


$etapes = []; // Initialisation des étapes
$top3_etape = []; // Initialisation des résultats de top3_etape
$top3_par_specialite = []; // Initialisation des résultats de top3_par_specialite

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

// Si une étape est sélectionnée, appeler les fonctions PostgreSQL
if (isset($_GET['etape'])) {
    $numero_etape = intval($_GET['etape']);

    // Appeler la fonction top3_etape(id)
    $stmt = $bdd->prepare("SELECT * FROM top3_etape(:id)");
    $stmt->execute(['id' => $numero_etape]);
    $top3_etape = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Appeler la fonction top3_par_specialite
    $stmt = $bdd->prepare("SELECT * FROM top3_par_specialite()");
    $stmt->execute();
    $top3_par_specialite = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>