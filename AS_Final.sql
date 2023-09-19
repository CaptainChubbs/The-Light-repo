-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Abahlengi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Abahlengi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Abahlengi` DEFAULT CHARACTER SET utf8 ;
USE `Abahlengi` ;

-- -----------------------------------------------------
-- Table `Abahlengi`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Admin` (
  `adminID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `phone_number` VARCHAR(255) NULL DEFAULT NULL,
  `createdAt` DATETIME NULL DEFAULT NULL,
  `deletedAt` DATETIME NOT NULL,
  PRIMARY KEY (`adminID`));


-- -----------------------------------------------------
-- Table `Abahlengi`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Client` (
  `clientID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `phone_number` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `createdAt` DATETIME NULL DEFAULT NULL,
  `deletedAt` DATETIME NULL,
  PRIMARY KEY (`clientID`));


-- -----------------------------------------------------
-- Table `Abahlengi`.`Event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Event` (
  `eventID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_date` DATETIME NULL DEFAULT NULL,
  `event_location` VARCHAR(255) NULL DEFAULT NULL,
  `requirements` VARCHAR(255) NULL DEFAULT NULL,
  `createdAt` DATETIME NULL DEFAULT NULL,
  `Client_clientID` INT UNSIGNED NOT NULL,
  `Admin_adminID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`eventID`, `Client_clientID`, `Admin_adminID`),
  INDEX `fk_Event_Client1_idx` (`Client_clientID` ASC) VISIBLE,
  INDEX `fk_Event_Admin1_idx` (`Admin_adminID` ASC) VISIBLE,
  CONSTRAINT `fk_Event_Client1`
    FOREIGN KEY (`Client_clientID`)
    REFERENCES `Abahlengi`.`Client` (`clientID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Event_Admin1`
    FOREIGN KEY (`Admin_adminID`)
    REFERENCES `Abahlengi`.`Admin` (`adminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `Abahlengi`.`Nurse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Nurse` (
  `nurseID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone_number` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `province` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `qualifications` VARCHAR(255) NOT NULL,
  `experience` VARCHAR(255) NOT NULL,
  `transport` TINYINT(1) NOT NULL,
  `computer_skills` TINYINT(1) NOT NULL,
  `own_practice` TINYINT(1) NOT NULL,
  `practice_number` VARCHAR(255) NOT NULL,
  `dispensing_number` VARCHAR(255) NOT NULL,
  `createdAt` DATETIME NULL,
  `deletedAt` DATETIME NULL,
  `Admin_adminID` INT UNSIGNED NOT NULL,
  `Event_eventID` INT UNSIGNED NOT NULL,
  `Event_Client_clientID` INT UNSIGNED NOT NULL,
  `Event_Admin_adminID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`nurseID`, `Admin_adminID`, `Event_eventID`, `Event_Client_clientID`, `Event_Admin_adminID`),
  UNIQUE INDEX `nurseID_UNIQUE` (`nurseID` ASC) VISIBLE,
  INDEX `fk_Nurse_Admin1_idx` (`Admin_adminID` ASC) VISIBLE,
  INDEX `fk_Nurse_Event1_idx` (`Event_eventID` ASC, `Event_Client_clientID` ASC, `Event_Admin_adminID` ASC) VISIBLE,
  CONSTRAINT `fk_Nurse_Admin1`
    FOREIGN KEY (`Admin_adminID`)
    REFERENCES `Abahlengi`.`Admin` (`adminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Nurse_Event1`
    FOREIGN KEY (`Event_eventID` , `Event_Client_clientID` , `Event_Admin_adminID`)
    REFERENCES `Abahlengi`.`Event` (`eventID` , `Client_clientID` , `Admin_adminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `Abahlengi`.`Attendee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Attendee` (
  `attendeeID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `gender` VARCHAR(255) NOT NULL,
  `id_number` INT NOT NULL,
  `medical_aid_client` TINYINT(1) NOT NULL,
  `medical_aid` VARCHAR(255) NOT NULL,
  `medical_aid_number` VARCHAR(255) NOT NULL,
  `dep_code` VARCHAR(255) NOT NULL,
  `screening_date` DATETIME NOT NULL,
  `height` DOUBLE NOT NULL,
  `weight` DOUBLE NOT NULL,
  `bmi` DOUBLE NULL DEFAULT NULL,
  `waist` DOUBLE NOT NULL,
  `blood_pressure` DOUBLE NOT NULL,
  `cholesterol` DOUBLE NOT NULL,
  `blood_sugar` DOUBLE NOT NULL,
  `hypertension` TINYINT(1) NOT NULL,
  `diabetes_mellitus` TINYINT(1) NOT NULL,
  `hyperlipaemia` TINYINT(1) NOT NULL,
  `heart_failure` TINYINT(1) NOT NULL,
  `kidney_disease` TINYINT NOT NULL,
  `Nurse_nurseID` INT UNSIGNED NOT NULL,
  `Event_eventID` INT UNSIGNED NOT NULL,
  `Event_Client_clientID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`attendeeID`, `Nurse_nurseID`, `Event_eventID`, `Event_Client_clientID`),
  UNIQUE INDEX `attendeeID_UNIQUE` (`attendeeID` ASC) VISIBLE,
  INDEX `fk_Attendee_Nurse1_idx` (`Nurse_nurseID` ASC) VISIBLE,
  INDEX `fk_Attendee_Event1_idx` (`Event_eventID` ASC, `Event_Client_clientID` ASC) VISIBLE,
  CONSTRAINT `fk_Attendee_Nurse1`
    FOREIGN KEY (`Nurse_nurseID`)
    REFERENCES `Abahlengi`.`Nurse` (`nurseID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attendee_Event1`
    FOREIGN KEY (`Event_eventID` , `Event_Client_clientID`)
    REFERENCES `Abahlengi`.`Event` (`eventID` , `Client_clientID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `Abahlengi`.`Event_has_Nurse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Abahlengi`.`Event_has_Nurse` (
  `Event_eventID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Event_eventID`),
  INDEX `fk_Event_has_Nurse_Event1_idx` (`Event_eventID` ASC) VISIBLE,
  CONSTRAINT `fk_Event_has_Nurse_Event`
    FOREIGN KEY (`Event_eventID`)
    REFERENCES `Abahlengi`.`Event` (`eventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
