<?php

require_once "config.php";
//connexion à la base de données intranet
function connexion_bdd(){
    try {
        $db = new PDO('mysql:host=localhost;dbname='. DB_NAME .';charset=utf8', DB_USERNAME, DB_PASSWORD);
       // echo "connexion réussie à la base de données<br>"; 
    }
    catch (Exception $e) {
       'Erreur : ' . $e->getMessage();
    } 
    return $db;
};


//fermere de la connexion à la bdd
function close_connexion($db){
     
    $db = null;
     
}
