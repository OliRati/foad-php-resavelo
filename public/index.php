<?php

require '../config/db_connect.php';
require '../includes/functions_velo.php';

require '../views/partials/head.php';

$velos = getAllVelos($pdo);
if (!empty($velos)) {
?>
    <h1>Liste des velos</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>modele</th>
                <th>picture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($velos as $velo) { ?>
                <tr>
                    <td><?= $velo['id_velos'] ?></td>
                    <td><?= $velo['modele'] ?></td>
                    <td><?= $velo['image'] ?></td>
                    <td>
                        <a href="">Remove</a>
                        <a href="">Modify</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}

?>
<h1>Velo avec ID=1</h1>
<?php
$velo = getVeloById($pdo, 1);
var_dump($velo);

require '../views/partials/taill.php';
