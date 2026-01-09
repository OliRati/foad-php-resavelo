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
