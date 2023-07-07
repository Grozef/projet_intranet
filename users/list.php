<?php

require_once "../connect.php";

$pdo = connect();
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);

$stmt->execute();

$users = $stmt->fetchAll();

foreach($users as $user)
{
    
    echo    "<tr>";
            echo "<td> ". $user["id"] ." </td>";
            echo "<td> ". $user["nom"] ." </td>";
            echo "<td> ". $user["prenom"] . "</td>";
        echo "</tr>";
    
    echo "<a href=update.php?id=". $user["id"].">modifier</a>";
    echo "<a href=delete.php?id=". $user["id"] .">supprimer</a>";
}

