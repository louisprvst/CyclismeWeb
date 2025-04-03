<?php

require_once __DIR__ . '/../vendor/autoload.php'; 

use Dotenv\Dotenv;

// Charger les variables d'environnement depuis le fichier .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialiser la connexion à la base de données
try {
    $dsn = "pgsql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'];
    $bdd = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Vous pouvez utiliser $pdo pour vos requêtes SQL
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}