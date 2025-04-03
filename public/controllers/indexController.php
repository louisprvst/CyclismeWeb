<?php
require_once __DIR__ . '/../../config/init.conf.php';

// if (!isset($_COOKIE['token'])) {
//     // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
//     header('Location: ../login.php');
//     exit();
// }

// // Vérifier si l'utilisateur est connecté
// if (myAuthClass::is_auth($_SESSION)) {
//     $user = $_SESSION['user']; // Récupérer les informations de l'utilisateur connecté
// } else {
//     $user = null; // Pas d'utilisateur connecté
// }