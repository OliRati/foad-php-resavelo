<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_velo.php';

$idVelos = $_GET['id'] ?? null;

if (is_numeric($idVelos)) {
    $state = deleteVelo($pdo, $idVelos);
}

redirect("/velos/list-velos.php");
