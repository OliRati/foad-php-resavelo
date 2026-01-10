<?php

function getAllUsers($pdo)
{
    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute();
    if ($state) {
        $users = $stmt->fetchAll();
        return $users;
    }

    return [];
}

function getUser($pdo, $id)
{
    $sql = "SELECT * FROM users WHERE id_users = :id";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([':id' => $id]);

    if ($state) {
        $user = $stmt->fetch();
        return $user;
    }

    return [];
}

function addUser($pdo, $user)
{
    // Hash password
    // $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
    $user['password'] = md5($user['password']);

    $sql = "INSERT INTO users (name, login, password, role)
            VALUES (:name, :login, :password, :role )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($user);

    return $state;
}

function updateUser($pdo, $user)
{
    if (isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['role'] === 'admin') {
        $sql = "UPDATE users SET name = :name, login = :login, password = :password, role = :role WHERE id_users = :id_users";
    } else {
        $sql = "UPDATE users SET name = :name, login = :login WHERE id_users = :id_users";
    }

    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($user);

    return $state;
}
function deleteUser($pdo, $id)
{
    $sql = "DELETE FROM users WHERE id_users = :id";

    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':id' => $id
        ]
    );

    return $state;
}
