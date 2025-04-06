<?php
// Démarrage de la session
session_start();

// Gestion des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définir l'URL de base de l'API
define('URL_API', 'http://62.72.18.63:11048/');

// Chargement des variables d'environnement
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialisation de la base de données
require_once __DIR__ . '/bdd.conf.php';