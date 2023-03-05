-- MySQL Script generated by MySQL Workbench
-- Sun Mar  5 21:11:45 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema person
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema person
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `person` DEFAULT CHARACTER SET utf8 ;
USE `person` ;

-- -----------------------------------------------------
-- Table `person`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `person`.`person` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vorname` VARCHAR(45) NULL,
  `nachname` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `person`.`auto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `person`.`auto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marke` VARCHAR(45) NULL,
  `kennzeichen` VARCHAR(45) NULL,
  `modell` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `person`.`adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `person`.`adresse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `strasse` VARCHAR(45) NULL,
  `hausnr` INT NULL,
  `plz` VARCHAR(45) NULL,
  `ort` VARCHAR(45) NULL,
  `person_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_adresse_person_idx` (`person_id` ASC),
  CONSTRAINT `fk_adresse_person`
    FOREIGN KEY (`person_id`)
    REFERENCES `person`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `person`.`person_auto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `person`.`person_auto` (
  `person_id` INT NOT NULL,
  `auto_id` INT NOT NULL,
  PRIMARY KEY (`person_id`, `auto_id`),
  INDEX `fk_person_has_auto_auto1_idx` (`auto_id` ASC),
  INDEX `fk_person_has_auto_person1_idx` (`person_id` ASC),
  CONSTRAINT `fk_person_has_auto_person1`
    FOREIGN KEY (`person_id`)
    REFERENCES `person`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_person_has_auto_auto1`
    FOREIGN KEY (`auto_id`)
    REFERENCES `person`.`auto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
