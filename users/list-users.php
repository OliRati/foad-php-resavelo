<?php
require '../config/db_connect.php';
require PHP_ROOT . '/includes/functions_user.php';

$users = getAllUsers($pdo);

require PHP_ROOT . '/views/users/list-users-view.php';
