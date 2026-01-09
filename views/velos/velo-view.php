<?php require '../views/partials/head.php'; ?>
<h1 class="title"><?= $title_text ?></h1>

<form method="post">
    <?php if (array_key_exists("id_velos", $velo)) { ?>
        <input type="hidden" name="id_velos" value="<?= $velo['id_velos'] ?>">
    <?php } ?>
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?= $velo['name'] ?>">
    </div>
    <div>
        <label for="price">Prix</label>
        <input type="number" name="price" id="price" value="<?= $velo['price'] ?>">
    </div>
    <div>
        <label for="quantity">Quantité</label>
        <input type="number" name="quantity" id="quantity" value="<?= $velo['quantity'] ?>">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?= $velo['description'] ?>">
    </div>
    <div>
        <label for="image_url">Image URL</label>
        <input type="text" name="image_url" id="image_url" value="<?= $velo['image_url'] ?>">
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">
</form>

<?php require '../views/partials/tail.php'; ?>