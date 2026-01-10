<?php

function getAllReservations($pdo)
{
    if (is_admin()) {
        $sql = "SELECT * FROM reservations";
        $stmt = $pdo->prepare($sql);
        $state = $stmt->execute();

        if ($state) {
            $reservations = $stmt->fetchAll();
            return $reservations;
        }
    } elseif (is_logged_in()) {
        $sql = "SELECT * FROM reservations WHERE id_users = :id_users";
        $stmt = $pdo->prepare($sql);
        $state = $stmt->execute([':id_users' => $_SESSION['id_users']]);

        if ($state) {
            $reservations = $stmt->fetchAll();
            return $reservations;
        }
    }
    
    return [];
}

function getReservation($pdo, $id)
{
    $sql = "SELECT * FROM reservations WHERE id_reservations = :id";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([':id' => $id]);

    if ($state) {
        $reservation = $stmt->fetch();
        return $reservation;
    }

    return [];
}

function addReservation($pdo, $reservation)
{
    $sql = "INSERT INTO reservations (id_users, id_velos, start_date, end_date, total_price)
            VALUES (:id_users, :id_velos, :start_date, :end_date, :total_price )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($reservation);

    return $state;
}

function updateReservation($pdo, $reservation)
{
    $sql = "UPDATE reservations SET id_users = :id_users, id_velos = :id_velos, start_date =:start_date, end_date = :end_date, total_price = :total_price
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
