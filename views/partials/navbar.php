<header>
    <div class="menu-frame">
        <div class="menu">
            <div class="logo">
                <a href="<?= WEB_ROOT . "/public/index.php" ?>"
                    style="text-decoration: none; color: #b0dcb0;">
                    <h1 style="margin-bottom: 0; color: #b0dcb0; font-size: 2rem; letter-spacing: 0.2rem;">ResaVelo</h1>
                </a>
            </div>
            <div class="menu-item">
                <a href="<?= WEB_ROOT . "/velos/list-velos.php" ?>">
                    Velos
                </a>
            </div>
            <div class="menu-item">
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'admin') { ?>
                <a href="<?= WEB_ROOT . "/users/list-users.php" ?>">
                    Utilisateurs
                </a>
            <?php } elseif (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                <a href="<?= WEB_ROOT . "/profil/edit-profil.php?id=".$_SESSION['id_users'] ?>">
                    Profil
                </a>
            <?php } ?>
            </div>
            <div class="menu-item">
                <a href="<?= WEB_ROOT . "/reservations/list-reservations.php" ?>">
                    Reservations
                </a>
            </div>
        </div>
        <div class="status">
            <div class="avatar">
                <a href="<?= WEB_ROOT . '/login/login.php' ?>">
                    <img src="<?= isset($_SESSION['logged']) && $_SESSION['logged'] === true ?
                                    WEB_ROOT . '/assets/img/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg' :
                                    WEB_ROOT . '/assets/img/no_accounts_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg' ?>" alt="">
                </a>
            </div>
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                <div><?= $_SESSION['name'] ?></div>
            <?php } ?>
            <?php if (isset($_SESSION['logged']) && $_SESSION['role'] === 'admin') { ?>
                <div class="admin">Administration</div>
            <?php } ?>
        </div>
    </div>
</header>