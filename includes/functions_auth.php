<?php
function is_logged_in()
{
    return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
}

function is_admin()
{
    return is_logged_in() && $_SESSION['role'] === 'admin';
}

function logout_user()
{
    $_SESSION = [];
    session_destroy();
    session_unset();
}

function login_user($pdo, $login, $password)
{
    if (empty($login) || empty($password)) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();

    if (!$user) {
        return [
            'success' => false,
            'message' => 'Identifiant incorrect !'
        ];
    }

    if (md5($password) !== $user['password']) {
        // if (!password_verify($password, $user['password'])) {
        return [
            'success' => false,
            'message' => 'Identifiant incorrect !'
        ];
    }

    $_SESSION['logged'] = true;
    $_SESSION['id_users'] = $user['id_users'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    return [
        'success' => true,
        'message' => 'Connexion réussie.'
    ];
}

/*
 * $user['name']
 * $user['login']
 * $user['password']
 * $user['role']
 */
function register_user($pdo, $user)
{
    if (empty($user['name']) || empty($user['login']) || empty($user['password']) || empty($user['role'])) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }
    /*
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return [
            'success' => false,
            'message' => 'Email invalide.'
        ];
    }
*/
    if (strlen($user['password']) < 6) {
        return [
            'success' => false,
            'message' => 'Le mot de passe doit contenir au moins 6 caractères.'
        ];
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$user['login']]);

    if ($stmt->fetch()) {
        return [
            'success' => false,
            'message' => 'Nom d\'utilisateur déja utilisé.'
        ];
    }

    if (addUser($pdo, $user)) {
        return [
            'success' => true,
            'message' => 'Inscription réussie.'
        ];
    }

    return [
        'success' => false,
        'message' => 'Erreur lors de l\'inscription.'
    ];
}

/*
function update_user($pdo, $username, $email)
{
    if (empty($username) || empty($email)) {
        return [
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        ];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return [
            'success' => false,
            'message' => 'Email invalide.'
        ];
    }

    $stmt = $pdo->prepare("UPDATE users SET username=?, email=? WHERE id = ?");
    if ($stmt->execute([$username, $email, $_SESSION['user_id']])) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        return [
            'success' => true,
            'message' => 'Mise à jour effectuée'
        ];
    }

    return [
        'success' => false,
        'message' => 'Erreur lors de la mise à jour'
    ];
}
*/