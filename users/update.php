<?php


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_GET['id'])) {

    require_once "../connect.php";

    $pdo = connect();
    $sql = "UPDATE users SET nom = :nom, prenom = :prenom WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $_GET['id']);
    $stmt->bindParam('nom', $_POST['nom']);
    $stmt->bindParam('prenom', $_POST['prenom']);
    
    $stmt->execute();

    header("location:create.php?id=" . $_GET['id']);

}