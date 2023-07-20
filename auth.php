<?php

if (isset($_POST["login"]) && isset($_POST["password"])) {
    echo "cest ok!";

    require_once "./function/page_connecte.php";
    require_once "./function/user_service.php";
    // connexion 
    $pdo = connexion_bdd();
    $user = getUser($pdo, $_POST["login"]);
    var_dump($user);

    if(count($user)>0 && password_verify($_POST["password"], $user[0]["password"])){
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["prenom_nom"]=ucfirst(strtolower($user[0]["prenom"])).
        " ".strtoupper($user[0]["nom"]);
        $_SESSION["nom"] = strtoupper($user[0]["nom"]);
        $_SESSION["prenom"] = strtolower($user[0]["prenom"]);
        $_SESSION["role"] = $user[0]["role"];
        //var_dump($_SESSION) ;
        // redirection vers le fichier 
        header("location:dashbord.php");
    }
    else
    {
        session_start();
        $erreur="Mauvais login ou mot de passe!";
        $_SESSION["flash"] = $erreur;
        header("location:page_connecte.php");
    }
    
}