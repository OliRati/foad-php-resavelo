<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_user.php';

$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $user['id_users'] = nettoyer(($_POST['id_users']));
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
            $state = updateUser($pdo, $user);
            if ($state) {
                if ($_SESSION['id_users'] === intval($user['id_users'])) {
                    $_SESSION['name'] = $user['name'];
                }

                redirect("/users/list-users.php");
                die();
            }
        }
    }
}

$idUsers = $_GET['id'] ?? null;

if (!is_numeric($idUsers)) {
    die();
}

$user = getUser($pdo, $idUsers);

if ($user) {
    $title_text = "Editer un utilisateur";
    $submit_text = "Modifier";
    require PHP_ROOT . "/views/users/user-view.php";
    die();
}
