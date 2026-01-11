<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_reservation.php';
require PHP_ROOT . '/includes/functions_velo.php';

$start_date = '';
$end_date = '';
$errors = '';
$title_text = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $start_date = nettoyer($_POST['start_date']);
    $end_date = nettoyer($_POST['end_date']);

    if (empty($start_date) || empty($end_date))
        $errors = 'Les champs ne peuvent pas être vide.';
    else {
        $velos = getAvailableVelos($pdo, $start_date, $end_date);
        $title_text = "Types de velos disponibles à ces dates.";
    }
}

if (empty($title_text)) {
    $velos = getAllVelos($pdo);
    $title_text = "Présentation de notre pannel de vélos à votre disposition.";
}

require PHP_ROOT . '/views/reservations/search-reservations-view.php';
