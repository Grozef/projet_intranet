<?php 
// Fixture => créé un utilisateur admin prédéfinis
function fixture(){


$pdo = connect();
$mdp = password_hash('admin', PASSWORD_BCRYPT);
$sql = "INSERT INTO utilisateur(nom, prenom, login, pass, role) VALUES ('admin', 'user', 'admin.user', :pass ,'ROLE_ADMIN')";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "pass" => $mdp
]);
}


