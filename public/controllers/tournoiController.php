<?php
require_once __DIR__ . '/../../config/init.conf.php';
require_once __DIR__ . '/../../classes/gestionTournoi.php';

if (!isset($_SESSION['user']['login']) || ($_SESSION['user']['login'] !== true)) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}

// Instanciation de la classe GestionTournoi
$tournoi = new GestionTournoi($bdd);

// Gestion de l'ajout d'un membre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['date_naissance'], $_POST['etape_id'], $_POST['temps'])) {
    $name = htmlspecialchars($_POST['name']);
    $date_naissance = $_POST['date_naissance'];
    $etape_id = (int)$_POST['etape_id'];
    $temps = $_POST['temps'];

    // Ajouter le membre
    $tournoi->addMember($name, $date_naissance);

    // Récupérer l'ID du membre ajouté
    $member_id = $bdd->lastInsertId();

    // Ajouter le résultat
    $tournoi->addResult($etape_id, $member_id, $temps);

    // Redirection pour éviter la soumission multiple
    header('Location: tournoi.php');
    exit();
}

// Récupérer le classement pour une étape donnée (par défaut étape 1)
$etape_id = isset($_GET['etape_id']) ? (int)$_GET['etape_id'] : 1;
$ranking = $tournoi->getRanking($etape_id);