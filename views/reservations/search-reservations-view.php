<?php require PHP_ROOT . '/views/partials/head.php'; ?>

<div class="action-container">
    <h1 class="title">Recherchez un velos sur ResaVelo</h1>
    <form method="post">
        <div>
            <label for="start_date">Date de départ</label>
            <input type="datetime-local" name="start_date" id="start_date" value="<?= $start_date ?>">
        </div>
        <div>
            <label for="end_date">Date de fin</label>
            <input type="datetime-local" name="end_date" id="end_date" value="<?= $end_date ?>">
        </div>
        <input type="submit" name="submit" value="Voir disponibilités">
        <?php if (!empty($errors)) { ?>
            <div class="error"><?= $errors ?></div>
        <?php } ?>
    </form>
</div>

<p class="subtitle"><?= $title_text ?></p>

<div class="velos-cards-container">
    <?php foreach ($velos as $velo) { ?>
        <div class="velos-card">
            <div class="velos-card-title"><?= $velo['name'] ?></div>
            <div class="velos-card-image">
                <img src="<?= WEB_ROOT . '/assets/img/velos/' . $velo['image_url'] ?>" alt="<?= $velo['description'] ?>">
            </div>
            <div class="velos-card-description"><?= $velo['description'] ?></div>
            <div class="velos-card-price"><?= $velo['price'] ?>€ / jour</div>
            <?php if (isset($velo['booked'])) {
                echo "<p>Quantité : " . $velo['quantity'] . " - Réservés : " . $velo['booked'] . " - Disponibles : " . $velo['available'] . "</p>";
            } ?>
            <div class="button">
                <a href="<?= WEB_ROOT . "/reservations/register-reservations.php?id=" . $velo['id_velos'] ?>">
                    Réserver
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php require PHP_ROOT . '/views/partials/tail.php'; ?>