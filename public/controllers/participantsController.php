<?php
require_once __DIR__ . '/../../config/init.conf.php';

if (!isset($_COOKIE['token'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}