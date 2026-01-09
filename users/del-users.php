<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_user.php';

$idUsers = $_GET['id'] ?? null;

if (is_numeric($idUsers)) {
    $state = deleteUser($pdo, $idUsers);
}

redirect("/users/list-users.php");
