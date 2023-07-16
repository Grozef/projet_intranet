<?php

if (isset($_POST["login"]) && isset($_POST["password"])) {
    echo "cest ok!";

    require_once "./function/page_connecte.php";
    require_once "./function/user_service.php";
    // connexion 
    $pdo = connexion_bdd();
    $user = getUser($pdo, $_POST["login"]);
    var_dump($user);
    
}