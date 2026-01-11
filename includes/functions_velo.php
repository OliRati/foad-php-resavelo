<?php

function getAllVelos($pdo)
{
    $sql = "SELECT * FROM velos";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute();
    if ($state) {
        $velos = $stmt->fetchAll();
        return $velos;
    }

    return [];
}

function getVelo($pdo, $id)
{
    $sql = "SELECT * FROM velos WHERE id_velos = :id";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([':id' => $id]);

    if ($state) {
        $velo = $stmt->fetch();
        return $velo;
    }

    return [];
}

function addVelo($pdo, $velo)
{
    $sql = "INSERT INTO velos (name, price, quantity, description, image_url) VALUES (:name, :price, :quantity, :description, :image_url )";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($velo);

    return $state;
}

function updateVelo($pdo, $velo)
{
    $sql = "UPDATE velos SET name = :name, price = :price, quantity = :quantity, description = :description, image_url = :image_url
            WHERE id_velos = :id_velos";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute($velo);

    return $state;
}

function deleteVelo($pdo, $id)
{
    $sql = "DELETE FROM velos WHERE id_velos = :id";

    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':id' => $id
        ]
    );

    return $state;
}

// Liste l'ensemble des velos disponibles à la location
// en tenant compte du nombre de velos disponibles par modèle
// et des reservations en cours
function getAvailableVelos($pdo, $start_date, $end_date)
{
    $sql = "SELECT
              v.id_velos,
              v.name,
              v.price,
              v.quantity,
              v.description,
              v.image_url,
              COALESCE(r.booked, 0) AS booked,
              (v.quantity - COALESCE(r.booked, 0)) AS available
            FROM velos v
            LEFT JOIN (
              SELECT id_velos, COUNT(*) AS booked
              FROM reservations
              WHERE start_date <= :end_date
                AND end_date   >= :start_date
              GROUP BY id_velos
            ) r ON v.id_velos = r.id_velos
            WHERE (v.quantity - COALESCE(r.booked, 0)) > 0
            ORDER BY v.name;";

    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':start_date' => $start_date,
            ':end_date' => $end_date
        ]
    );

    if ($state) {
        $velosAvail = $stmt->fetchAll();
        return $velosAvail;
    }
}
