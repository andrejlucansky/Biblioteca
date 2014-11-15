-- MySQL Script generated by MySQL Workbench
-- 11/13/14 22:47:55
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema biblioteca_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `biblioteca_db` ;

-- -----------------------------------------------------
-- Schema biblioteca_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `biblioteca_db` ;

-- -----------------------------------------------------
-- Table `biblioteca_db`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `biblioteca_db`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `biblioteca_db`.`USUARIO` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `tipo` ENUM('user','admin') NULL,
  `password` VARCHAR(45) NOT NULL,
  `apodo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca_db`.`LIBRO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `biblioteca_db`.`LIBRO` ;

CREATE TABLE IF NOT EXISTS `biblioteca_db`.`LIBRO` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `autor` VARCHAR(45) NULL,
  `ano` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idLIBRO_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca_db`.`Reservacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `biblioteca_db`.`Reservacion` ;

CREATE TABLE IF NOT EXISTS `biblioteca_db`.`Reservacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_number` INT NOT NULL,
  `LIBRO_id` INT NOT NULL,
  `USUARIO_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idReservacion_UNIQUE` (`id` ASC),
  INDEX `fk_Reservacion_LIBRO1_idx` (`LIBRO_id` ASC),
  INDEX `fk_Reservacion_USUARIO1_idx` (`USUARIO_id` ASC),
  CONSTRAINT `fk_Reservacion_LIBRO1`
    FOREIGN KEY (`LIBRO_id`)
    REFERENCES `biblioteca_db`.`LIBRO` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservacion_USUARIO1`
    FOREIGN KEY (`USUARIO_id`)
    REFERENCES `biblioteca_db`.`USUARIO` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca_db`.`PRESTAMO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `biblioteca_db`.`PRESTAMO` ;

CREATE TABLE IF NOT EXISTS `biblioteca_db`.`PRESTAMO` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `desde` DATETIME NULL,
  `hasta` DATETIME NULL,
  `USUARIO_id` INT NOT NULL,
  `LIBRO_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_PRESTAMO_USUARIO_idx` (`USUARIO_id` ASC),
  INDEX `fk_PRESTAMO_LIBRO1_idx` (`LIBRO_id` ASC),
  CONSTRAINT `fk_PRESTAMO_USUARIO`
    FOREIGN KEY (`USUARIO_id`)
    REFERENCES `biblioteca_db`.`USUARIO` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRESTAMO_LIBRO1`
    FOREIGN KEY (`LIBRO_id`)
    REFERENCES `biblioteca_db`.`LIBRO` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `biblioteca_db`.`usuario` (`nombre`, `apellidos`, `email`, `tipo`, `password`, `apodo`) VALUES ('Andrej', 'Lucansky', 'andrejlucansky@gmail.com', 'admin', 'admin', 'Andrei');
INSERT INTO `biblioteca_db`.`usuario` (`nombre`, `apellidos`, `email`, `tipo`, `password`, `apodo`) VALUES ('Felipe', 'Armijo Garcia', 'felipe@gmail.com', 'user', 'hola', 'Pipe');

INSERT INTO `biblioteca_db`.`libro` (`nombre`, `autor`, `ano`) VALUES ('Harry Potter 5', 'J.K. Rowling', '2006');
INSERT INTO `biblioteca_db`.`libro` (`nombre`, `autor`, `ano`) VALUES ('Lord of the Rings', 'J.R.R. Tolkien', '1988');
INSERT INTO `biblioteca_db`.`libro` (`nombre`, `autor`, `ano`) VALUES ('The Alchymist', 'Paulo Coelho', '2000');
INSERT INTO `biblioteca_db`.`libro` (`nombre`, `autor`, `ano`) VALUES ('Song of Ice and Fire: A Game of Thrones', 'Gorge R. R. Martin', '1996');