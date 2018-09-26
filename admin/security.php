<?php
require_once __DIR__ . '/../model/database.php';

session_start();

$user = null;

if (isset($_POST['email']) && isset($_POST['password'])) {
    // L'utilisateur vient du formulaire de login
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getUtilisateurByEmailPassword($email, $password);
    if(isset($user['id'])) {
        // On enregistre dans la session l'id de l'utilisateur
        $_SESSION['id'] = $user['id'];
    }
} else if (isset($_SESSION['id'])) {
    // L'utilisateur est déjà connecté
    $user = getEntity("utilisateur", $_SESSION['id']);
}


if(!$user) {
    header('Location: login.php');
} else if (!$user['admin']) {
    header('Location: ../');
}