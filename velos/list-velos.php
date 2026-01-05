<?php

require '../config/db_connect.php';
require '../includes/functions_velo.php';

require '../views/partials/head.php';

$velos = getAllVelos($pdo);
require '../views/velos/list-velos-view.php';

require '../views/partials/tail.php';
