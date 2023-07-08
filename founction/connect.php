<?php 
//function connect()

require_once "config.php";

function connect(){
    try{


        $pdo = new PDO("mysql:host=". DB_SERVER. ";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Vérifier la connexion
    }
    catch(Exception $e)
    {
        die("ERREUR : Impossible de se connecter. ");
    }
    return $pdo;
}
