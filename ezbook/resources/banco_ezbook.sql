-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ezbook
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ezbook` ;

-- -----------------------------------------------------
-- Schema ezbook
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ezbook` DEFAULT CHARACTER SET utf8 ;
USE `ezbook` ;

-- -----------------------------------------------------
-- Table `ezbook`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ezbook`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NULL,
  `sobrenome` VARCHAR(20) NULL,
  `cpf` VARCHAR(11) NULL,
  `numero` VARCHAR(11) NULL,
  `email` VARCHAR(100) NULL,
  `senha` VARCHAR(50) NULL,
  PRIMARY KEY (`id`)
  )
ENGINE = InnoDB;

INSERT INTO ezbook.usuarios (id, nome, sobrenome, cpf, numero, email, senha) VALUES (1, 'Admin', NULL, NULL, NULL, 'admin', '123');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
