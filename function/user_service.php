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
    //si pas trouvé users return null
    return null;
}
