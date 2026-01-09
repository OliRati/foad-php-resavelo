<?php require '../views/partials/head.php'; ?>
<h1 class="title"><?= $title_text ?></h1>

<form method="post">
    <?php if (array_key_exists("id_users", $user)) { ?>
        <input type="hidden" name="id_users" value="<?= $user['id_users'] ?>">
    <?php } ?>
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>">
    </div>
    <div>
        <label for="login">Login</label>
        <input type="text" name="login" id="login" value="<?= $user['login'] ?>">
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">
</form>

<?php require '../views/partials/tail.php'; ?>