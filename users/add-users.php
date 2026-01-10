<?php
require '../config/db_connect.php';
require '../includes/functions_user.php';

$errors = [];
$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $user['name'] = nettoyer($_POST['name']);
    $user['login'] = nettoyer($_POST['login']);
    $user['password'] = trim($_POST['password']);
    $user['role'] = nettoyer($_POST['role']);

    $password_confirm = trim($_POST['password_confirm']);

    if (empty($user['name']) || empty($user['login']) || empty($user['password']) || empty($user['role'])) {
        $errors[] = 'Tous les champs doivent être renseignés';
    } else {
        if ($user['password'] !== $password_confirm)
            $errors[] = 'Les mots de passe ne correspondent pas !';
        else {
            $state = addUser($pdo, $user);
            if ($state) {
                redirect("/users/list-users.php");
                die();
            }
        }
    }
} else {
    $user = [
        'name' => '',
        'login' => '',
        'password' => '',
        'role' => ''
    ];
}

$title_text = "Ajouter un utilisateur";
$submit_text = "Ajouter";
require PHP_ROOT . "/views/users/user-view.php";
