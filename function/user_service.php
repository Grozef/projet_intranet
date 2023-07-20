<?php

require_once "./objects/User.php";

function getUser($pdo, $login) {
    // define user s'il y est ou pas
    $sql = "SELECT * FROM user WHERE login = :login LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "login" => $login
    ]);
    //recuper les infos de user
    $infos = $stmt->fetch();
    if ($infos){
        $user = new User();
        $user->setLogin($infos["login"]);
        $user->setPassword($infos["mdp"]);
        return $user;
    }
    else {
        //si pas trouvé users return null
        return null;
    }
}

function Users_login($pdo, $login) {
    // define user s'il y est ou pas
    $sql = "SELECT * FROM user WHERE login = :login LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "login" => $login
    ]);
    //recuper les infos de user
    $infos = $stmt->fetchAll();
    return $infos;
}

function Find_users(){
    try{
        $pdo = connexion_bdd();
    $sql = "SELECT * FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
    }
    catch(Exception $ex){
        
    }
    finally{
        $pdo = null;
    }
    
}


