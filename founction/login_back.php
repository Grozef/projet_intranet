<?php 
function login_back(){

    require_once "connect.php";
    $pdo = connect();
    // Savoir si l'utilisateur existe
    $sql = "SELECT * from user where numero_agrement=:numero_agrement LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "numero_agrement" => $numero_agrement
    ]);

    $resultat = $stmt->fetchAll();

}
