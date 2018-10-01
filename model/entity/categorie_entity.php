<?php

function insertCategorie(string $libelle) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "INSERT INTO categorie (libelle) VALUES (:libelle)";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->execute();
}

function updateCategorie(int $id, string $libelle) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "UPDATE categorie SET libelle = :libelle WHERE id = :id";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->execute();
}