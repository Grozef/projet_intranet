<?php

require_once "../connect.php";

$pdo = connect();
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('id', $_GET['id']);

$stmt->execute();

$user = $stmt->fetch();

?>

<a href="list.php"><- Retour à la liste</a>

<h1>Create de l'utilisateur n°<?id= ".$user['id'] .></h1>

<form action="update.php?id=". $user['id'] ."> method="POST">
    <input type="text" name="nom" value=". $user['nom'] .">
    <input type="text" name="prenom" value=". $user['prenom'] .">
    <button type="submit">Valider</button>
</form>