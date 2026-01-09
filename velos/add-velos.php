<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_velo.php';

$velo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $velo['name'] = nettoyer($_POST['name']);
    $velo['price'] = nettoyer($_POST['price']);
    $velo['quantity']  = nettoyer($_POST['quantity']);
    $velo['description']  = nettoyer($_POST['description']);
    $velo['image_url'] = nettoyer($_POST['image_url']);

    $state = addVelo($pdo, $velo);
    if ($state) {
        redirect("/velos/list-velos.php");
        die();
    }
} else {
    $velo = [
        'name' => '',
        'price' => '',
        'quantity' => '',
        'description' => '',
        'image_url' => ''
    ];
}

$title_text = "Ajouter un vélo";
$submit_text = "Ajouter";
require PHP_ROOT . "/views/velos/velos.php";
