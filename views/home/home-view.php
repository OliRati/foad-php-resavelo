<div class="action-container">
    <h1 class="title">Recherchez un velos sur ResaVelo</h1>
    <form method="post">
        <div>
            <label for="start_date">Date de départ</label>
            <input type="datetime-local" name="start_date" id="start_date">
        </div>
        <div>
            <label for="end_date">Date de fin</label>
            <input type="datetime-local" name="end_date" id="end_date">
        </div>
        <input type="submit" name="submit" value="Voir disponibilités">
    </form>
</div>

<p class="subtitle">Présentation de notre pannel de vélos à votre disposition.</p>

<div class="velos-cards-container">
    <?php foreach ($velos as $velo) { ?>
        <div class="velos-card">
            <div class="velos-card-title"><?= $velo['name'] ?></div>
            <div class="velos-card-image">
                <img src="<?= WEB_ROOT . '/assets/img/velos/' . $velo['image_url'] ?>" alt="<?= $velo['description'] ?>">
            </div>
            <div class="velos-card-description"><?= $velo['description'] ?></div>
            <div class="velos-card-price"><?= $velo['price'] ?>€ / jour</div>
            <div class="button">
                <a href="<?= WEB_ROOT . "/public/reservation_form.php?id=" . $velo['id_velos'] ?>">
                    Réserver
                </a>
            </div>
        </div>
    <?php } ?>
</div>