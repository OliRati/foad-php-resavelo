<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_velo.php';

$velos = getAllVelos($pdo);

require PHP_ROOT . '/views/partials/head.php';

require PHP_ROOT . '/views/home/home-view.php';

require PHP_ROOT . '/views/partials/tail.php';
