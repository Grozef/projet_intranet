<?php

if (isset($_POST["login"]) && isset($_POST["password"])) {
    echo "cest ok!";

    $login = $_POST["login"];
    require_once "./function/page_connecte.php";
    require_once "./function/user_service.php";
    // connexion 
    $pdo = connexion_bdd();
    $users = Users_login($pdo, $login);
    var_dump($users);
    die;
    if(count($users)>0 && password_verify($_POST["mdp"], $user[0]["mdp"])){
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
        header("location:dashbord.php");
    }
    
}