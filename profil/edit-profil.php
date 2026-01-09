<?php
require '../config/db_connect.php';
require '../includes/functions_user.php';

$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $user['id_users'] = nettoyer(($_POST['id_users']));
    $user['name'] = nettoyer($_POST['name']);
    $user['login'] = nettoyer($_POST['login']);

    $state = updateUser($pdo, $user);
    if ($state) {
        $_SESSION['name'] = $user['name'];
        redirect("/velos/list-velos.php");
        die();
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
    require PHP_ROOT . "/views/profil/profil-view.php";
    die();
}
