<?php
require "../function/database.php";
//utiliser le __DIR__

$id = $_GET["user"];

try{
    connexion_bdd();
    $data = [
        "id"=>$id
    ];
    $sql = "SELECT * FROM user where id= :id";
    $stmt =$db->prepare($sql);
    $stmt->execute($data);
    $users = $stmt->fetchAll();

    foreach($users as $user)
    {
        echo "<p>";
        echo $user["id"] ." -- ". $user["nom"] . " ". $user["prenom"];
        echo $user[0] ." -- ". $user[1] . " ". $user[2];
        echo "</p>";
    }

    
}
catch(Exception $exception)
{
    die('Erreur:'.$exception->getMessage());
}