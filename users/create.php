<?php

require_once "../connect.php";

$pdo = connect();
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('id', $_GET['id']);

$stmt->execute();

$user = $stmt->fetch();

?>

