<?php

require_once '../../config/init.conf.php';

if (!isset($_SESSION['user']['login']) || ($_SESSION['user']['login'] !== true)) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}

// Supprimer le cookie d'authentification
setcookie('token', '', time() - 3600, '/', '', false, true); // Expire immédiatement

unset($_SESSION['user']);

// Rediriger vers la page d'accueil
header('Location: ../index.php');
exit();