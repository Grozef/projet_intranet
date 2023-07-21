<?php

require_once "../function/database.php";
require_once "../function/user_service.php";
require_once "../function/service_service.php";
require_once "../function/emploi_service.php";
$emplois = getEmplois();
$services = getServices();
$users = Find_users();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users list</title>
</head>
<body>
    <form action="create.php" method="POST">
        <input type="text" name="login" placeholder="Identifiant">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="text" name="tel_pro" placeholder="Telephone">
        <input type="email" name="eamil" placeholder="Email">
        <select name="emploi" placeholder="Select an emploi">
            <?php 
                foreach ($emplois as $emploi) {
                    echo '<option>' . $emploi['label'] . '</option>';
                }
            ?>
        </select>
        <select name="service" placeholder="Select a service">
            <?php
                foreach($services as $service) {
                    echo '<option>' .$service['label'] . '</option>';
                }
            ?>
        </select>
        <input type="number" name="numero_agrement" placeholder="numero_agrement">
    </form>
    


        <?php
       // var_dump($users);
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
        ?>
</body>
</html>