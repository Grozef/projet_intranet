-- -----------------------------------------------------
-- Schema Projet_intranet_php
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Projet_intranet_php` DEFAULT CHARACTER SET utf8 ;
USE `Projet_intranet_php` ;

-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Agence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Agence` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ville` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  

-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Service` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(45) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `id_agence` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `id_agence_idx` (`id_agence` ASC) VISIBLE,
  CONSTRAINT `id_agence`
    FOREIGN KEY (`id_agence`)
    REFERENCES `Projet_intranet_php`.`Agence` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(60) NOT NULL,
  `mdp` VARCHAR(70) NOT NULL,
  `tel_pro` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `id_service` INT NOT NULL,
  `id_emploi` INT NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `numero_agrement` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) VISIBLE,
  INDEX `id_service_idx` (`id_service` ASC) VISIBLE,
  CONSTRAINT `id_service_user`
    FOREIGN KEY (`id_service`)
    REFERENCES `Projet_intranet_php`.`Service` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Info_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Info_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(60) NOT NULL,
  `prenom` VARCHAR(60) NOT NULL,
  `Tel_perso` VARCHAR(45) NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `id_user_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `Projet_intranet_php`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Emploi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Emploi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `label` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `numero_agrement_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `numero_agrement`
    FOREIGN KEY (`id_user`)
    REFERENCES `Projet_intranet_php`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom_categorie` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Projet_intranet_php`.`Projet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Projet_intranet_php`.`Projet` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_status` INT NOT NULL,
  `id_categorie` INT NOT NULL,
  `id_service` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `id_status_idx` (`id_status` ASC) VISIBLE,
  INDEX `id_categorie_idx` (`id_categorie` ASC) VISIBLE,
  INDEX `id_service_idx` (`id_service` ASC) VISIBLE,
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
  CONSTRAINT `id_service_projet`
    FOREIGN KEY (`id_service`)
    REFERENCES `Projet_intranet_php`.`Service` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;