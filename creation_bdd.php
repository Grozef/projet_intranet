<!DOCTYPE html>
<?php
//creation_bdd.php

//require pour connecter creation_bdd.php à connexion.php
//require "connexion.php";

//connexion première
function connexion_bdd_mysql()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=mysql;charset=utf8', 'root', '');
        echo "connexion réussie à la base de données mysql<br>";
    } catch (Exception $e) {
        'Erreur : ' . $e->getMessage();
    }
    // finaly
    return $db;
};

//connexion à la base de données intranet
function connexion_bdd()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=projet_intranet_php;charset=utf8', 'root', '');
        echo "connexion réussie à la base de données<br>";
    } catch (Exception $e) {
        'Erreur : ' . $e->getMessage();
    }
    return $db;
};
//fermeture de la connexion à la bdd
function close_connexion($db)
{

    $db = null;
}
//fonction pour créer la Base De Données
function creation_bdd()
{
    try {
        //utilisation de la fonction connexion_bdd_mysql pour initialiser la connexion à la bdd
        $db = connexion_bdd_mysql();
        $sql = "CREATE DATABASE IF NOT EXISTS projet_intranet_php";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //message de confirmation
        echo "creation bdd intranet ok ou bdd déja existante</p> ";
    } catch (Exception $e) {
        'Erreur : ' . $e->getMessage();
    } finally {
        //utilisation de la fonction pour fermer la connexion à la bdd
        close_connexion($db);
    }
}

//fonction pour créer les tables de la bdd projet_intranet_php
function creation_table()
{
    try {
        // Utilisation de la fonction de connexion à la base de données intranet
        $db = connexion_bdd();

        // Création de la table `User`
        $user = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`User` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `login` VARCHAR(60) NOT NULL,
            `mdp` VARCHAR(70) NOT NULL,
            `tel_pro` VARCHAR(60) NOT NULL,
            `email` VARCHAR(60) NOT NULL,
            `id_emploi` INT NOT NULL,
            `role` VARCHAR(45) NOT NULL,
            `numero_agrement` INT NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC),
            UNIQUE INDEX `login_UNIQUE` (`login` ASC))";

        $stmt = $db->prepare($user);
        $stmt->execute();
        // Message de confirmation
        echo "Table user créée ou déjà existante<br>";

        // Création de la table `Info_user`
        $info_user = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Info_user` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nom` VARCHAR(60) NOT NULL,
            `prenom` VARCHAR(60) NOT NULL,
            `Tel_perso` VARCHAR(45) NOT NULL,
            `id_user` INT NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC),
            INDEX `id_user_idx` (`id_user` ASC),
            CONSTRAINT `id_user`
                FOREIGN KEY (`id_user`)
                REFERENCES `Projet_intranet_php`.`User` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)";

        $stmt = $db->prepare($info_user);
        $stmt->execute();
        // Message de confirmation
        echo "Table info_user créée ou déjà existante<br>";

        // Création de la table `Emploi`
        $emploi = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Emploi` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `id_user` INT NOT NULL,
            `label` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC),
            INDEX `numero_agrement_idx` (`id_user` ASC),
            CONSTRAINT `numero_agrement`
                FOREIGN KEY (`id_user`)
                REFERENCES `Projet_intranet_php`.`User` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)";

        $stmt = $db->prepare($emploi);
        $stmt->execute();
        // Message de confirmation
        echo "Table emploi créée ou déjà existante<br>";

        // Création de la table `Agence`
        $agence = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Agence` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `ville` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC))";

        $stmt = $db->prepare($agence);
        $stmt->execute();
        // Message de confirmation
        echo "Table agence créée ou déjà existante<br>";

        // Création de la table `Service`
        $service = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Service` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `label` VARCHAR(45) NOT NULL,
            `description` VARCHAR(200) NOT NULL,
            `id_agence` INT NOT NULL,
            `id_user` INT NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC),
            INDEX `id_agence_idx` (`id_agence` ASC),
            INDEX `id_user_idx` (`id_user` ASC),
            CONSTRAINT `id_agence`
                FOREIGN KEY (`id_agence`)
                REFERENCES `Projet_intranet_php`.`Agence` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
            CONSTRAINT `fk_id_user`
                FOREIGN KEY (`id_user`)
                REFERENCES `Projet_intranet_php`.`User` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)";

        $stmt = $db->prepare($service);
        $stmt->execute();
        // Message de confirmation
        echo "Table service créée ou déjà existante<br>";

        // Création de la table `Status`
        $status = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Status` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `status` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC))";

        $stmt = $db->prepare($status);
        $stmt->execute();
        // Message de confirmation
        echo "Table status créée ou déjà existante<br>";

        // Création de la table `Categorie`
        $categorie = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Categorie` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `nom_categorie` VARCHAR(100) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC))";

        $stmt = $db->prepare($categorie);
        $stmt->execute();
        // Message de confirmation
        echo "Table categorie créée ou déjà existante<br>";

        // Création de la table `Projet`
        $projet = "CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Projet` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `id_status` INT NOT NULL,
            `id_categorie` INT NOT NULL,
            `id_service` INT NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `id_UNIQUE` (`id` ASC),
            INDEX `id_status_idx` (`id_status` ASC),
            INDEX `id_categorie_idx` (`id_categorie` ASC),
            INDEX `id_service_idx` (`id_service` ASC),
            CONSTRAINT `id_status`
                FOREIGN KEY (`id_status`)
                REFERENCES `Projet_intranet_php`.`Status` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
            CONSTRAINT `id_categorie`
                FOREIGN KEY (`id_categorie`)
                REFERENCES `Projet_intranet_php`.`Categorie` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
            CONSTRAINT `fk_id_service`
                FOREIGN KEY (`id_service`)
                REFERENCES `Projet_intranet_php`.`Service` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)";

        $stmt = $db->prepare($projet);
        $stmt->execute();
        // Message de confirmation
        echo "Table projet créée ou déjà existante<br>";
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    } finally {
        // Utilisation de la fonction de fermeture de connexion à la base de données
        close_connexion($db);
    }
}

function inser_user()
{
    try {
        // Utilisation de la fonction de connexion à la base de données intranet
        $db = connexion_bdd();

    /*

        // Insertion des données dans la table user
        $user = "INSERT INTO projet_intranet_php.user (`id`,`login`, `mdp`, `tel_pro`, `email`, `id_emploi`, `role`, `numero_agrement`)
         VALUES 
         ('1','Dupont', 'mot_de_passe', '0123456789', 'gabi@youpimail.com', 1, 'superadmin', 1),
         ('2','Martin', 'mot_de_passe', '0123456789', 'emma@youpimail.com', 1, 'admin', 2),
         ('3','Leroy', 'mot_de_passe', '0123452259', 'hugo@youpimail.com', 1, 'admin', 3),
         ('4','Dubois', 'mot_de_passe', '0123456789', 'lea@youpimail.com', 1, 'admin', 4),
         ('5','Roussel', 'mot_de_passe', '0123456789', 'nat@youpimail.com', 1, 'admin', 5),
         ('6','Moreau', 'mot_de_passe', '0123456789', 'zoe@youpimail.com', 1, 'admin', 6),
         ('7','Laurent', 'mot_de_passe', '0123456789', 'loulou@youpimail.com', 1, 'employe', 7),
         ('8','Chevalier', 'mot_de_passe', '0123456789', 'clara@youpimail.com', 1, 'employe', 8),
         ('9','Lefèvre', 'mot_de_passe', '0123456789', 'arthur@youpimail.com', 1, 'employe', 9),
         ('10','Mercier', 'mot_de_passe', '0123456789', 'cam@youpimail.com', 1, 'employe', 10),
         ('11','Girard', 'mot_de_passe', '0123456789', 'lucas@youpimail.com', 1, 'employe', 11),
         ('12','André', 'mot_de_passe', '0123456789', 'manon@youpimail.com', 1, 'employe', 12),
         ('13','Lambert', 'mot_de_passe', '0123456789', 'ethan@youpimail.com', 1, 'employe', 13),
         ('14','Rousseau', 'mot_de_passe', '0123456789', 'cloclo@youpimail.com', 1, 'employe', 14),
         ('15','Leclerc', 'mot_de_passe', '0123456789', 'mathis@youpimail.com', 1, 'employe', 15),
         ('16','Bernard', 'mot_de_passe', '0123456789', 'jade@youpimail.com', 1, 'employe', 16),
         ('17','Roux', 'mot_de_passe', '0123456789', 'timtim@youpimail.com', 1, 'employe', 17),
         ('18','Gauthier', 'mot_de_passe', '0123456789', 'noa@youpimail.com', 1, 'employe', 18),
         ('19','Perrin', 'mot_de_passe', '0123456789', 'anna@youpimail.com', 1, 'employe', 19),
         ('20','Michel', 'mot_de_passe', '0123456789', 'ethan@youpimail.com', 1, 'employe', 20),
         ('21','Guérin', 'mot_de_passe', '0123456789', 'lena@youpimail.com', 1, 'employe', 21),
         ('22','Poirier', 'mot_de_passe', '0123456789', 'adam@youpimail.com', 1, 'employe', 22),
         ('23','Simon', 'mot_de_passe', '0123456789', 'lenai@youpimail.com', 1, 'employe', 23),
         ('24','Thierry', 'mot_de_passe', '0123456789', 'lili@youpimail.com', 1, 'employe', 24),
         ('25','Marchand', 'mot_de_passe', '0123456789', 'ines@youpimail.com', 1, 'employe', 25)";

        $stmt = $db->prepare($user);
        $stmt->execute();

        // Affichage du message de confirmation
        echo "Données insérées avec succès<br>";

            // Insertion des données dans la table info_user
            $info_pers = "INSERT INTO projet_intranet_php.info_user (`nom`, `prenom`, `tel_perso`, `id_user`)
            VALUES 
            ('Dupont', 'Gabriel', '0123456789', 1),
            ('Martin', 'Emma', '0123456789', 2),
            ('Leroy', 'Hugo', '0123452259', 3),
            ('Dubois', 'Léa', '0123456789', 4),
            ('Roussel', 'Nathan', '0123456789', 5),
            ('Moreau', 'Zoé', '0123456789', 6),
            ('Laurent', 'Louis', '0123456789', 7),
            ('Chevalier', 'Clara', '0123456789', 8),
            ('Lefèvre', 'Arthur', '0123456789', 9),
            ('Mercier', 'Camille', '0123456789', 10),
            ('Girard', 'Lucas', '0123456789', 11),
            ('André', 'Manon', '0123456789', 12),
            ('Lambert', 'Éthan', '0123456789', 13),
            ('Rousseau', 'Chloé', '0123456789', 14),
            ('Leclerc', 'Mathis', '0123456789', 15),
            ('Bernard', 'Jade', '0123456789', 16),
            ('Roux', 'Timéo', '0123456789', 17),
            ('Gauthier', 'Noah', '0123456789', 18),
            ('Perrin', 'Anna', '0123456789', 19),
            ('Michel', 'Ethan', '0123456789', 20),
            ('Guérin', 'Léna', '0123456789', 21),
            ('Poirier', 'Adam', '0123456789', 22),
            ('Simon', 'Lénaïc', '0123456789', 23),
            ('Thierry', 'Lily', '0123456789', 24),
            ('Marchand', 'Inès', '0123456789', 25)";


         //   Attention à bien préparer les tables avec les foreign keys afin de permettre les insertions, cf schéma

   $stmt = $db->prepare($info_pers);
   $stmt->execute();

      // Insertion des données dans la table agence
               $agence = "INSERT INTO projet_intranet_php.agence (`ville`)
               VALUES 
               ('Lyon'),
               ('Paris'),
               ('Lille'),
               ('Marseille'),
               ('Toulouse')";
   
      $stmt = $db->prepare($agence);
      $stmt->execute();
*/
      // Insertion des données dans la table emploi
                     $emploi = "INSERT INTO projet_intranet_php.emploi (`id_user`,`label`)
                     VALUES 
                     (1,'ceo'),
                     (2,'sup'),
                     (3,'sup'),
                     (4,'sup'),
                     (5,'sup'),
                     (6,'employé'),
                     (7,'employé'),
                     (8,'employé'),
                     (9,'employé'),
                     (10,'employé'),
                     (11,'employé'),
                     (12,'employé'),
                     (13,'employé'),
                     (14,'employé'),
                     (15,'employé'),
                     (16,'employé'),
                     (17,'employé'),
                     (18,'employé'),
                     (19,'employé'),
                     (20,'employé'),
                     (21,'employé'),
                     (22,'employé'),
                     (23,'employé'),
                     (24,'employé'),
                     (25,'employé')";

            $stmt = $db->prepare($emploi);
            $stmt->execute();




    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    } finally {
        // Utilisation de la fonction de fermeture de connexion à la base de données
        close_connexion($db);
    }
}


creation_bdd();
creation_table();
inser_user()

?>