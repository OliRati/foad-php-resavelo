<?php
if (!empty($velos)) {
?>
    <h1 style="text-align: center; margin-bottom: 2rem;">Liste des velos</h1>
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
