<?php
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
                        <a href="<?= WEB_ROOT . "/velos/del-velos.php" ?>">Remove</a>
                        <a href="<?= WEB_ROOT . "/velos/edit-velos.php" ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
