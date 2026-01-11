<?php require '../views/partials/head.php'; ?>

<h1 class="title"><?= $title_text ?></h1>

<form method="post">
    <?php if (array_key_exists("id_reservations", $reservation)) { ?>
        <input type="hidden" name="id_reservations" value="<?= $reservation['id_reservations'] ?>">
    <?php } ?>
    <div>
        <label for="id_uses">Id User</label>
        <input type="number" name="id_users" id="id_users" value="<?= $reservation['id_users'] ?>">
    </div>
    <div>
        <label for="id_velos">Id Vélo</label>
        <input type="number" name="id_velos" id="id_velos" value="<?= $reservation['id_velos'] ?>">
    </div>
    <div>
        <label for="start_date">Date départ</label>
        <input type="datetime-local" name="start_date" id="start_date" value="<?= $reservation['start_date'] ?>">
    </div>
    <div>
        <label for="end_date">Date fin</label>
        <input type="datetime-local" name="end_date" id="end_date" value="<?= $reservation['end_date'] ?>">
    </div>
    <div>
        <label for="total_price">Prix total</label>
        <input type="number" name="total_price" id="total_price" value="<?= $reservation['total_price'] ?>">
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">
</form>

<?php require '../views/partials/tail.php'; ?>