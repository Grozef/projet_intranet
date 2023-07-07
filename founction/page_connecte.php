        <?php

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

        ?>


