<?php

require_once __DIR__ . '/../../config/init.conf.php';

if (!isset($_SESSION['user']['login']) || ($_SESSION['user']['login'] !== true)) {
    header('Location: ../login.php');
    exit();
}

$etapes = [];
$top3_etape = [];
$top3_par_specialite = [];

// Récupérer les étapes depuis l'API
$url = "http://62.72.18.63:11048/etapes/2025";
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
    $etapes = []; 
}

// Si une étape est sélectionnée, appeler les fonctions PostgreSQL
if (isset($_GET['etape'])) {
    $numero_etape = intval($_GET['etape']);

    try {
        // Appelle la fonction top3_etape(id)
        $stmt = $bdd->prepare("SELECT * FROM top3_etape(:id)");
        $stmt->bindParam(':id', $numero_etape, PDO::PARAM_INT);
        $stmt->execute();
        $raw_top3_etape = $stmt->fetchAll(PDO::FETCH_NUM);

        // Transforme les résultats en tableaux associatifs
        foreach ($raw_top3_etape as $row) {
            $top3_etape[] = [
                'position' => $row[0],
                'nom' => $row[1],
            ];
        }

        // Appelle la fonction top3_par_specialite
        $stmt = $bdd->query("SELECT * FROM top3_par_specialite()");
        $raw_top3_par_specialite = $stmt->fetchAll(PDO::FETCH_NUM);

        // Transforme les résultats en tableaux associatifs
        foreach ($raw_top3_par_specialite as $row) {
            $top3_par_specialite[] = [
                'specialite' => $row[0],
                'position' => $row[1],
                'nom' => $row[2],
            ];
        }

    } catch (PDOException $e) {
        die("Erreur lors de la récupération des données : " . $e->getMessage());
    }
}