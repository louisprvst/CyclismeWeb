<?php
// Démarrage de la session
session_start();

// Gestion des erreurs
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Chargement des variables d'environnement
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Vérification de l'authentification
require_once __DIR__ . '/../classes/myAuthClass.php';
$authorized = myAuthClass::is_auth($_SESSION);
if (!$authorized) {
    include __DIR__ . '/../login.php';
    exit(1);
}

// Initialisation de la base de données
require_once __DIR__ . '/bdd.conf.php';