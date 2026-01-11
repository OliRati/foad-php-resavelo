<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_reservation.php';

$reservations = getAllReservations($pdo);

require PHP_ROOT . '/views/reservations/list-reservations-view.php';
