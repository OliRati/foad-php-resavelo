<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_velo.php';

$velo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $velo['id_velos'] = nettoyer(($_POST['id_velos']));
    $velo['name'] = nettoyer($_POST['name']);
    $velo['price'] = nettoyer($_POST['price']);
    $velo['quantity']  = nettoyer($_POST['quantity']);
    $velo['description']  = nettoyer($_POST['description']);
    $velo['image_url'] = nettoyer($_POST['image_url']);

    $state = updateVelo($pdo, $velo);
    if ($state) {
        redirect("/velos/list-velos.php");
        die();
    }
}

$idVelos = $_GET['id'] ?? null;

if (!is_numeric($idVelos)) {
    die();
}

$velo = getVelo($pdo, $idVelos);

if ($velo) {
    $title_text = "Editer un vélo";
    $submit_text = "Modifier";
    require PHP_ROOT . "/views/velos/velo-view.php";
    die();
}
