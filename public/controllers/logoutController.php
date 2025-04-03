<?php

require_once '../../config/init.conf.php';

if (!isset($_COOKIE['token'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}

// Supprimer le cookie d'authentification
setcookie('token', '', time() - 3600, '/', '', false, true); // Expire immédiatement

// Rediriger vers la page de connexion
header('Location: ../index.php');
exit();