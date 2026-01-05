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

function getVeloById($pdo, $id)
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

function addVelo($pdo, $data)
{
    $sql = "INSERT INTO velos (modele, image) VALUES (:modele, :image)";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':modele' => $data['modele'],
            ':image' => $data['image']
        ]
    );

    return $state;
}

function updateVelo($pdo, $id, $data)
{
    $sql = "UPDATE velos SET modele = :modele, image = :image WHERE id_velos = :id";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute(
        [
            ':modele' => $data['modele'],
            ':image' => $data['image'],
            ':id' => $id
        ]
    );

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
