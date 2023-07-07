<?php 
function login_back(){

// On verifie si le formulaire est acceptable
if( (isset($_POST["login"]) && !empty($_POST["login"])) && (isset($_POST["pass"]) && !empty($_POST["pass"])) ){

    $login = $_POST["login"];
    $pass = $_POST["pass"];
    require_once "connect.php";
    $pdo = connect();
    // Savoir si l'utilisateur existe
    $sql = "SELECT * from utilisateur where login=:login LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "login" => $login
    ]);

    $resultat = $stmt->fetchAll();
    // S'assurer qu'il y est bien un utilisateur avec le login 
    if(count($resultat) == 1){
        // Test du mdp
        if(password_verify($pass, $resultat[0]["pass"])){
            // Création de la session et infos dedans
            $nom = $resultat[0]["nom"];
            $prenom = $resultat[0]["prenom"];
            $login = $resultat[0]["login"];
            $role = $resultat[0]["role"];
            session_start();
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["nom_complet"] = $prenom . " " . $nom;
            // recupération du role dans la session
            $_SESSION["role"] = $role;
            header("location:page_connecte.php");
        }
        else {
            // Info sur le mot de passe erroné
            session_start();
            $_SESSION["info"] = "Mauvais mot de passe";
            header("location:form_login.php");
        }
    }
    else {
        session_start();
        $_SESSION["info"] = "Probléme avec votre login";
        // Renvoi quand erreur avec login sur page login
        header("location:form_login.php");
    }
}
else{
    session_start();
    $_SESSION["info"] = "Le formulaire n'est pas bon";
    // Renvoi quand erreur formulaire sur page login
    header("location:form_login.php");
}
}