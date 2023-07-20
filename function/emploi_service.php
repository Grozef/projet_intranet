<?php

function getEmplois(){
    $pdo = connexion_bdd();
    // requete pour récuperer les emplois
    $sql = "SELECT * FROM emploi";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    //receper tout les emplois
    $emplois = $stmt->fetchAll();
    return $emplois;
}