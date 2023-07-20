<?php
require_once "../function/user_service.php";

// recuper toute la liste de users
try{
    connexion_bdd();
    $sql = "SELECT * FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach($users as $user){
        echo "<p>";
        echo $user["id"] ." -- ". $user["nom"] ." ". $user["prenom"];
        echo "<a href=detail.php?user=". $user["id"]. "> voir detail </a>";
        echo "</p>";
    }
}
catch(Exception $exception)
{
    die('Erreur : ' . $exception->getMessage());
}
finally{
    $db=null;
}