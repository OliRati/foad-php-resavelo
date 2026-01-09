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
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password_confirm">Password confirm</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>
    <div>
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>Utilisateur</option>
            <option value="vendor" <?= $user['role'] === 'vendor' ? 'selected' : '' ?>>Vendeur</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrateur</option>
        </select>
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">
    <?php if (!empty($errors)) {
        foreach ($errors as $error) {
    ?>
            <p><?= $error ?></p>
    <?php
        }
    }
    ?>
</form>
<?php require '../views/partials/tail.php'; ?>