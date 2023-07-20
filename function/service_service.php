<?php

function getServices(){
    $pdo = connexion_bdd();
    // requete récuperer les services
    $sql = "SELECT * FROM service";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    //receper tout les services
    $services = $stmt->fetchAll();
    return $services;
}