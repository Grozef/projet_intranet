<?php
//insert_admin.php

// require pour acceder aux fonctions de connexions/deconnexion
require_once "creation_bdd.php";

//fonction pour inserer les données reçues via le formulaire contact du site
function inser() {
    if (isset($_POST["submit"]) && $_POST["submit"] === "Envoyer le message") {
        //utilisation de la fonction pour se connecter à la bdd intranet
        $db = connexion_bdd();
        $nom_table = "contact";
      $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
      $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
      $mot_de_passe = isset($_POST["pass"]) ? $_POST["pass"] : "";
      $mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
      $descript = isset($_POST["descript"]) ? $_POST["descript"] : "";

//ne pas oublier de changer les colonnes de la table ainsi que leurs valeurs

        $sql = "INSERT INTO $nom_table (nom, mail, descript)
                VALUES (:nom, :mail, :descript)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":descript", $descript);
        $stmt->execute();
        //message de confirmation
        echo "Insertion réussie.";
        //utilisation de la fonction pour se déconnecter de la bdd
        close_connexion($db);

    } else {
        $db = connexion_bdd();
        //message de confirmation
        echo "Le formulaire n'a pas été soumis correctement.";
        //utilisation de la fonction de fermeture de connexion à la bdd
        close_connexion($db);
    }
}

//fonction pour insérer manuellement des données dans la table contact
function inser_brut(){

    //utilisation de la fonction de connexion à la bdd portfolio_bdd
    $db = connexion_bdd();
    $nom_table = "contact";
    $nom = "Steve";
    $mail = "steve@youpimail.com";
    $descript = "Salut François";

    $sql = "INSERT INTO $nom_table (nom, mail, descript)
            VALUES (:nom, :mail, :descript)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":mail", $mail);
    $stmt->bindParam(":descript", $descript);
    $stmt->execute();

    //message de confirmation
    echo "Insertion réussie.<br>";
    //utilisation de la fonction pour fermer la connexion à la bdd
    close_connexion($db);
}

/*Lors de l'insertion de données dans une base de données, les contraintes NOT NULL définissent que certaines colonnes ne peuvent pas contenir de valeurs NULL (c'est-à-dire vides). Cependant, dans certains cas, lorsque vous insérez des données à partir d'un formulaire, les champs vides peuvent être interprétés comme des chaînes de caractères vides ("") plutôt que comme des valeurs NULL.

Cela signifie que même si un champ est laissé vide dans le formulaire, lors de la soumission, PHP considérera ce champ comme une chaîne vide et l'insérera dans la base de données. Ainsi, les contraintes NOT NULL ne sont pas violées, car une chaîne vide est une valeur valide pour les colonnes définies comme NOT NULL.

Si vous souhaitez empêcher l'insertion de champs vides dans des colonnes NOT NULL, vous pouvez effectuer une vérification supplémentaire avant d'exécuter la requête d'insertion. Par exemple, vous pouvez ajouter une condition pour vérifier si les champs obligatoires sont vides avant d'exécuter l'instruction d'insertion. Si un champ obligatoire est vide, vous pouvez afficher un message d'erreur ou empêcher l'insertion des données tant que tous les champs obligatoires ne sont pas remplis.

En résumé, lors de l'insertion de données via un formulaire, les champs vides sont généralement interprétés comme des chaînes vides et ne violent pas les contraintes NOT NULL. Pour empêcher l'insertion de champs vides dans des colonnes NOT NULL, vous pouvez effectuer des vérifications supplémentaires avant l'exécution de la requête d'insertion. */

?>
