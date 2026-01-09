<?php

function getAllReservations($pdo)
{
    $sql = "SELECT * FROM reservations";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute();
    if ($state) {
        $reservations = $stmt->fetchAll();
        return $reservations;
    }

    return [];
}

function getReservation($pdo, $id)
{
    $sql = "SELECT * FROM reservations WHERE id_reservations = :id";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([':id' => $id]);

    if ($state) {
        $velo = $stmt->fetch();
        return $velo;
    }

    return [];
}

function addReservation($pdo, $reservation)
{
    $sql = "INSERT INTO reservation (name, login, password, role)
            VALUES (:name, :login, :password, :role )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($reservation);

    return $state;
}

function updateReservation($pdo, $reservation)
{
    $sql = "UPDATE reservations SET name = :name, login = :login, role =:role
            WHERE id_reservations = :id_reservations";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($reservation);

    return $state;
}

function deleteReservation($pdo, $id)
{
    $sql = "DELETE FROM reservations WHERE id_reservations = :id";

    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':id' => $id
        ]
    );

    return $state;
}
