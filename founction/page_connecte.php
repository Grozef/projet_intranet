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

        function page_connecte(){
         
            "SELECT * FROM user where nom = :nom, mot_de_passe = :mot_de_passe";
            $nom =["nom"];
            $pass = ["mot_de_passe"];

        if (($nom = $_POST["identifiant"] && !empty($_POST["identifiant"])) && ($pass = $_POST["Mot De Passe"] && !empty($_POST["Mot De Passe"])))
        {
            // renvoyer  vers la page adequate
            header("location:index.html");

        if($role = "ROLE_ADMIN"){

            //renvoyer vers la page html admin
            header("location:index.html");
        } 
        }else{
            header("location:index.html");
        }
    }

//fermeture de la connexion à la bdd
function close_connexion($db){
    
    $db = null;
     
}
        ?>


