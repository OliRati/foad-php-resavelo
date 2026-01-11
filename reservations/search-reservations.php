<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_reservation.php';
require PHP_ROOT . '/includes/functions_velo.php';

$velos = getAllVelos($pdo);

require PHP_ROOT . '/views/reservations/search-reservations-view.php';
