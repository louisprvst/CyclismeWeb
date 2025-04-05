<?php

require_once __DIR__ . '/../../config/init.conf.php'; // Inclure la configuration de la base de données

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user']['id'])) {
    echo "Session utilisateur non définie. Redirection vers la page de connexion.";
    header('Location: ../login.php');
    exit();
}

// Récupérer l'ID de l'utilisateur depuis la session
$userId = $_SESSION['user']['id'];

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=tour_de_france", "root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Utilisateur non trouvé.");
    }
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>