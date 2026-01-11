<?php require PHP_ROOT . '/views/partials/head.php'; ?>
<h1 class="title">Identifiez-vous</h1>

<form method="post">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" name="submit" value="Valider">
</form>

<?php require PHP_ROOT . '/views/partials/tail.php'; ?>