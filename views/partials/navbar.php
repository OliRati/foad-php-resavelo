<header style="width: 100%; background-color: #333; padding: 1rem; margin-bottom: 2rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <div style="border: 2px solid chocolate; border-radius: 0.5rem; padding: 0.5rem 1rem; margin-right: 2rem;">
            <a href="<?= WEB_ROOT . "/public/index.php" ?>"
                style="text-decoration: none; color: chocolate;">
                <h1 style="margin-bottom: 0; color: bisque; font-size: 2rem; letter-spacing: 0.2rem;">ResaVelo</h1>
            </a>
        </div>
        <div><a href="<?= WEB_ROOT . "/vehicule/list-vehicule.php" ?>"
                style="font-size: 1.2rem; font-weight: 700; letter-spacing: 0.2rem; text-decoration: none; color: burlywood; margin-right: 1rem;">Velos</a></div>
        <div><a href="<?= WEB_ROOT . "/driver/list-driver.php" ?>"
                style="font-size: 1.2rem; font-weight: 700; letter-spacing: 0.2rem; text-decoration: none; color: burlywood; margin-right: 1rem;">Utilisateurs</a></div>
        <div><a href="<?= WEB_ROOT . "/association/list-association.php" ?>"
                style="font-size: 1.2rem; font-weight: 700; letter-spacing: 0.2rem; text-decoration: none; color: burlywood">Reservations</a></div>
    </div>
</header>
<?php
echo WEB_ROOT;