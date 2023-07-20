<?php

$options = [
    'cost' => 10,
];

echo "<p>" ;
$mdp = password_hash("", PASSWORD_BCRYPT, $options);
echo $mdp;
echo "</p>";

$sql ="insert into user(nom,prenom,login,mdp,tel_pro,eamil,id_emploi,role,numero_agrement) values(:nom, :prenom, :login, :mdp, :tel_pro, :email, :id_emploi, :role, :numero_agrement 'user')";
$stmt = $pdo->prepare($sql);
$infos = $stmt->execute([
    "nom" => "nom",
    "prenom" => "prenom",
    "login" => "test@test.fr",
    "mdp" => $mdp,
    "eamil" => "test@gmail.com",
    "id_emploi" =>"",
    "role" =>"",
    "numero_agrement" =>""
]);
