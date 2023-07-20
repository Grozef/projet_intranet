<?php
require_once "../function/user_service.php";
$users = Find_users();
// recuper toute la liste de users
try{
    

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