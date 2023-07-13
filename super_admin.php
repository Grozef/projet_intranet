<?php

//connexion à la base de données intranet
function connexion_bdd(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=intranet;charset=utf8','root','');
        echo "connexion réussie à la base de données<br>"; 
    }
    catch (Exception $e) {
       'Erreur : ' . $e->getMessage();
    } 
    return $db;
};


// recuperer l'id et le mdp via la  methode POST depuis le formulaire

$nom = $_POST["identifiant"];
$pass = $_POST["Mot De Passe"];

//afficher les infos user et user infos 

"SELECT * FROM user where nom = :nom, mot_de_passe = :mot_de_passe";

// faire un inner join avec user infos pour afficher toutes les infos


