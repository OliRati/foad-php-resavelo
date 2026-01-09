<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_reservation.php';

$reservation = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $reservation['id_users'] = nettoyer($_POST['id_users']);
    $reservation['id_velos'] = nettoyer($_POST['id_velos']);
    $reservation['start_date']  = nettoyer($_POST['start_date']);
    $reservation['end_date']  = nettoyer($_POST['end_date']);
    $reservation['total_price'] = nettoyer($_POST['total_price']);

    $state = addReservation($pdo, $reservation);
    if ($state) {
        redirect("/reservations/list-reservations.php");
        die();
    }
} else {
    $reservation = [
        'id_users' => '',
        'id_velos' => '',
        'start_date' => '',
        'end_date' => '',
        'total_price' => ''
    ];
}

$title_text = "Ajouter une réservation";
$submit_text = "Ajouter";
require PHP_ROOT . "/views/reservations/reservation-view.php";
