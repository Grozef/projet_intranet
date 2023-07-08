<!DOCTYPE html>
<?php
//creation_bd.php

//require pour connecter creation_bdd.php à connexion.php
//require "connexion.php";

//connexion première
function connexion_bdd_mysql(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=mysql;charset=utf8','root','');
        echo "connexion réussie à la base de données mysql<br>"; 
    }
    catch (Exception $e) {
       'Erreur : ' . $e->getMessage();
    } 
    return $db;
    close_connexion($db);
};

//connexion à la base de données intranet
function connexion_bdd(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=intranet;charset=utf8','root','');
        echo "connexion réussie à la base de données<br>"; 
    }
    catch (Exception $e) {
       'Erreur : ' . $e->getMessage();
    } 
    return $db;
};
//fermeture de la connexion à la bdd
function close_connexion($db){
    
    $db = null;
     
}
//fonction pour créer la Base De Données
function creation_bdd(){
    try
    { 
    //utilisation de la fonction connexion_bdd_mysql pour initialiser la connexion à la bdd
    $db = connexion_bdd_mysql();
    $sql = "CREATE DATABASE IF NOT EXISTS intranet";
    $stmt= $db->prepare($sql);
    $stmt->execute();
    //message de confirmation
    echo "creation bdd intranet ok ou bdd déja existante</p> ";

    }
    catch (Exception $e)
    {
        'Erreur : ' . $e->getMessage();
    }
    finally{
        //utilisation de la fonction pour fermer la connexion à la bdd
        close_connexion($db);
    }

       
}

//fonction pour créer la table
function creation_table(){
    try{
        //utilisation de la fonction de connexion à la base de données intranet
        $db = connexion_bdd();
        
        $tablePers = "CREATE TABLE IF NOT EXISTS user (
            id INT NOT NULL AUTO_INCREMENT,
            nom VARCHAR(50) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            numero_agrement INT NOT NULL,
            privilege VARCHAR(50) NOT NULL,
            PRIMARY KEY (id)       
        )";
        $stmt = $db->prepare($tablePers);
        $stmt->execute();
        //message de confirmation   
        echo "Table user créée ou déjà existante<br>";
        }
catch (Exception $e)
        {
            'Erreur : ' . $e->getMessage();        
        }
finally{
        //utilisation de la fonction de fermeture de connexion à la base de données
        close_connexion($db);
        }       
}

creation_bdd();
creation_table();

?>