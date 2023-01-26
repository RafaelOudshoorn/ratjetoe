-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ratjetoe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ratjetoe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ratjetoe` DEFAULT CHARACTER SET utf8 ;
USE `ratjetoe` ;

-- -----------------------------------------------------
-- Table `ratjetoe`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`country` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ratjetoe`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `premium_member` TINYINT(1) NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customer_country_idx` (`country_id` ASC),
  CONSTRAINT `fk_customer_country`
    FOREIGN KEY (`country_id`)
    REFERENCES `ratjetoe`.`country` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ratjetoe`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password_hash` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ratjetoe`.`platform`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`platform` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ratjetoe`.`game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`game` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `platform_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_game_platform1_idx` (`platform_id` ASC),
  CONSTRAINT `fk_game_platform1`
    FOREIGN KEY (`platform_id`)
    REFERENCES `ratjetoe`.`platform` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ratjetoe`.`customer_game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratjetoe`.`customer_game` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `game_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customer_game_customer1_idx` (`customer_id` ASC),
  INDEX `fk_customer_game_game1_idx` (`game_id` ASC),
  CONSTRAINT `fk_customer_game_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `ratjetoe`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_game_game1`
    FOREIGN KEY (`game_id`)
    REFERENCES `ratjetoe`.`game` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
