<?php
require '../config/db_connect.php';
require '../includes/functions_velo.php';

$velos = getAllVelos($pdo);

require PHP_ROOT . '/views/velos/list-velos-view.php';
