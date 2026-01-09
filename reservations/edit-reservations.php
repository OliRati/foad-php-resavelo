<?php
require '../config/db_connect.php';
require '../includes/functions_reservation.php';

$reservation = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $reservation['id_reservations'] = nettoyer($_POST['id_reservations']);
    $reservation['id_users'] = nettoyer($_POST['id_users']);
    $reservation['id_velos'] = nettoyer($_POST['id_velos']);
    $reservation['start_date']  = nettoyer($_POST['start_date']);
    $reservation['end_date']  = nettoyer($_POST['end_date']);
    $reservation['total_price'] = nettoyer($_POST['total_price']);

    $state = updateReservation($pdo, $reservation);
    if ($state) {
        redirect("/reservations/list-reservations.php");
        die();
    }
}

$idReservation = $_GET['id'] ?? null;

if (!is_numeric($idReservation)) {
    die();
}

$reservation = getReservation($pdo, $idReservation);

if ($reservation) {
    $title_text = "Editer une réservation";
    $submit_text = "Modifier";
    require PHP_ROOT . "/views/reservations/reservation-view.php";
    die();
}
