<h1 class="title">Acceuil ResaVelo</h1>

<p class="subtitle">Présentation de notre pannel de vélos à votre disposition.</p>

<div class="velos-cards-container">
    <?php foreach ($velos as $velo) { ?>
        <div class="velos-card">
            <div class="velos-card-title"><?=  $velo['name'] ?></div>
            <div class="velos-card-image">
                <img src="<?= WEB_ROOT . '/assets/img/velos/' . $velo['image_url'] ?>" alt="<?= $velo['description'] ?>">
            </div>
            <div class="velos-card-description"><?= $velo['description'] ?></div>
            <div class="velos-card-price"><?=  $velo['price'] ?>€ / jour</div>
            <div class="button">Réserver</div>
        </div>
    <?php } ?>
</div>