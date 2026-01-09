<?php
require '../config/db_connect.php';
require '../includes/functions_user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = nettoyer($_POST['name']);
    $password = trim($_POST('password'));

    // This is for testing of an admin profile
    $_SESSION['logged'] = true;
    $_SESSION['role'] = 'admin';

    redirect('/admin/index.php');
    exit;
}

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    // You are logged in => do log out
    $_SESSION = [];
    session_destroy();
    session_unset();

    redirect("/public/index.php");
    exit;
}

// You are logged out do Log in
require PHP_ROOT . '/views/login/login-view.php';
