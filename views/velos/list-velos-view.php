<?php
require PHP_ROOT . '/views/partials/head.php';

if (!empty($velos)) {
?>
    <h1 class="title">Liste des velos</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Image URL</th>
                <th>Creation time</th>
                <th>Update time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($velos as $velo) { ?>
                <tr>
                    <td><?= $velo['id_velos'] ?></td>
                    <td><?= $velo['name'] ?></td>
                    <td><?= $velo['price'] ?></td>
                    <td><?= $velo['quantity'] ?></td>
                    <td><?= $velo['description'] ?></td>
                    <td><?= $velo['image_url'] ?></td>
                    <td><?= $velo['created_at'] ?></td>
                    <td><?= $velo['updated_at'] ?></td>
                    <td>
                        <a href="<?= WEB_ROOT . "/velos/del-velos.php?id=" . $velo['id_velos'] ?>"  onclick="return confirm('Etes vous certain de vouloir supprimer ce vélo ?');">Remove</a>
                        <a href="<?= WEB_ROOT . "/velos/edit-velos.php?id=" . $velo['id_velos'] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}

?>
<div class="button">
    <a href="<?= WEB_ROOT . "/velos/add-velos.php" ?>">Ajouter un vélo</a>
</div>
<?php
require PHP_ROOT . '/views/partials/tail.php';
