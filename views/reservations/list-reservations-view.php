<?php
require PHP_ROOT . '/views/partials/head.php';

if (!empty($reservations)) {
?>
    <h1 class="title">Liste des réservations</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Id Utilisateur</th>
                <th>Id Vélo</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Prix total</th>
                <th>Creation time</th>
                <th>Updated time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr>
                    <td><?= $reservation['id_reservations'] ?></td>
                    <td><?= $reservation['id_users'] ?></td>
                    <td><?= $reservation['id_velos'] ?></td>
                    <td><?= $reservation['start_date'] ?></td>
                    <td><?= $reservation['end_date'] ?></td>
                    <td><?= $reservation['total_price'] ?></td>
                    <td><?= $reservation['created_at'] ?></td>
                    <td><?= $reservation['updated_at'] ?></td>
                    <td>
                        <a href="<?= WEB_ROOT . "/reservations/del-reservations.php?id=" . $reservation['id_reservations'] ?>">Remove</a>
                        <a href="<?= WEB_ROOT . "/reservations/edit-reservations.php?id=" . $reservation['id_reservations'] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}

?>
<div class="button">
    <a href="<?= WEB_ROOT . "/reservations/add-reservations.php" ?>">Ajouter une réservation</a>
</div>
<?php
require PHP_ROOT . '/views/partials/tail.php';
