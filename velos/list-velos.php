<?php

require '../config/db_connect.php';
require '../includes/functions_velo.php';

require '../views/partials/head.php';

$velos = getAllVelos($pdo);
require '../views/velos/list-velos-view.php';
?>
<h1>Velo avec ID=1</h1>
<?php
$velo = getVeloById($pdo, 1);
var_dump($velo);

require '../views/partials/tail.php';
