
        
        <?php
        function form_login(){

        // cette ouverte donne accés au information de la session
        session_start();
        // verifie si on a bien une valeur dans session->infos
        
        if(isset($_SESSION["info"]))
        {
            // Si on a une info alors on l affiche
            echo $_SESSION["info"];
            // destruction de la session
            session_destroy();

        }
        if(isset($_SESSION["nom"]))
        {
            
            header("location:page_connecte.php");
        }
        else{
            // Sinon destruction de la session ouverte en haut
            session_destroy();
        }
    }
        // verifie si on a bien une valeur dans session->infos
        


        ?>
