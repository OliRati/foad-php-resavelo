<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_reservation.php';

$idReservations = $_GET['id'] ?? null;

if (is_numeric($idReservations)) {
    $state = deleteReservation($pdo, $idReservations);
}

redirect("/reservations/list-reservations.php");
