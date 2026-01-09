<?php
require PHP_ROOT . '/views/partials/head.php';

if (!empty($users)) {
?>
    <h1 class="title">Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>login</th>
                <th>role</th>
                <th>Creation time</th>
                <th>Updated time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['id_users'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['login'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['updated_at'] ?></td>
                    <td>
                        <a href="<?= WEB_ROOT . "/users/del-users.php?id=" . $user['id_users'] ?>">Remove</a>
                        <a href="<?= WEB_ROOT . "/users/edit-users.php?id=" . $user['id_users'] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}

?>
<div class="button">
    <a href="<?= WEB_ROOT . "/users/add-users.php" ?>">Ajouter un utilisateur</a>
</div>
<?php
require PHP_ROOT . '/views/partials/tail.php';
