<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        
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
        <form method="post" action=<?php echo "login_back.php" ?> >
            <input type="text" name="login" placeholder="Login" /><br />
            <input type="password" name="pass" placeholder="Mot de passe" /><br />
            <input type="submit" />
        </form>

    </body>
</html> 