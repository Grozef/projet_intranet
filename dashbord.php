<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<body>
    <h2>
        <?php
            session_start();
            $nom = $_SESSION["prenom_nom"];
            echo "bienvenue $nom";
        ?>
    </h2>

    [ <a href="./function/deconnexion.php">Se déconnecter</a> ]
</body>
</html>

