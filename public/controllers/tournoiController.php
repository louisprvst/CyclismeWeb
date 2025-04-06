<?php
require_once __DIR__ . '/../../config/init.conf.php';
require_once __DIR__ . '/../../classes/gestionTournoi.php';

if (!isset($_SESSION['user']['login']) || ($_SESSION['user']['login'] !== true)) {
    header('Location: ../login.php');
    exit();
}

$tournoi = new GestionTournoi($bdd);

// Récupérer les étapes depuis l'API
$url = "http://62.72.18.63:11048/etapes/2025";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);
$etapes = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE || !is_array($etapes)) {
    $etapes = [];
}

// Récupérer les membres existants
$members = $bdd->query("SELECT id, name FROM tournois_members")->fetchAll(PDO::FETCH_ASSOC);

// Gestion de l'ajout d'un membre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['etape_id'], $_POST['temps'])) {
    $etape_id = (int)$_POST['etape_id'];
    $temps = $_POST['temps'];

    if (!empty($_POST['existing_member_id'])) {
        $member_id = (int)$_POST['existing_member_id'];
    } elseif (!empty($_POST['name']) && !empty($_POST['date_naissance'])) {
        $name = htmlspecialchars($_POST['name']);
        $date_naissance = $_POST['date_naissance'];
        $tournoi->addMember($name, $date_naissance);
        $member_id = $bdd->lastInsertId();
    } else {
        $_SESSION['error'] = 'Veuillez sélectionner un membre existant ou entrer les informations d\'un nouveau membre.';
        header('Location: ../tournoi.php');
        exit();
    }

    $tournoi->addResult($etape_id, $member_id, $temps);
    header('Location: ../tournoi.php');
    exit();
}

// Récupérer l'étape sélectionnée ou la première étape par défaut
$etape_id = isset($_GET['etape_id']) ? (int)$_GET['etape_id'] : (isset($etapes[0]['id']) ? $etapes[0]['id'] : null);

// Récupérer le classement pour l'étape sélectionnée
if ($etape_id) {
    $ranking = $tournoi->getRanking($etape_id);
} else {
    $ranking = [];
}