-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema scheduleit
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema scheduleit
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `scheduleit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `scheduleit` ;

-- -----------------------------------------------------
-- Table `scheduleit`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  `sobrenome` VARCHAR(20) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `foto` BLOB NULL,
  `permissao` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Sala` (
  `idSala` INT NOT NULL AUTO_INCREMENT,
  `idProprietario` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cnpj` VARCHAR(20) NOT NULL,
  `nomeFantasia` VARCHAR(100) NOT NULL,
  `cep` VARCHAR(10) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `numero` INT NULL,
  `complemento` VARCHAR(100) NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `classificacao` FLOAT NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `imgLogo` BLOB NULL,
  PRIMARY KEY (`idSala`),
  INDEX `fk_Sala_Usuario1_idx` (`idProprietario` ASC),
  CONSTRAINT `fk_Sala_Usuario1`
    FOREIGN KEY (`idProprietario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Funcionario` (
  `idFuncionario` INT NOT NULL AUTO_INCREMENT,
  `idSala` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  INDEX `fk_Funcionario_Sala1_idx` (`idSala` ASC),
  INDEX `fk_Funcionario_Usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Funcionario_Sala1`
    FOREIGN KEY (`idSala`)
    REFERENCES `scheduleit`.`Sala` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionario_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Horario` (
  `idHorario` INT NOT NULL AUTO_INCREMENT,
  `idFuncionario` INT NOT NULL,
  `data` DATE NOT NULL,
  `horario` TIME NOT NULL,
  `Usuario_id` INT NULL,
  PRIMARY KEY (`idHorario`),
  INDEX `fk_Horario_Funcionario1_idx` (`idFuncionario` ASC),
  INDEX `fk_Horario_Usuario1_idx` (`Usuario_id` ASC),
  CONSTRAINT `fk_Horario_Funcionario1`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `scheduleit`.`Funcionario` (`idFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Horario_Usuario1`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Recursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Recursos` (
  `idRecursos` INT NOT NULL AUTO_INCREMENT,
  `valor` FLOAT NOT NULL,
  PRIMARY KEY (`idRecursos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Carrinho` (
  `idRecursos` INT NOT NULL,
  `idSala` INT NOT NULL,
  PRIMARY KEY (`idRecursos`, `idSala`),
  INDEX `fk_Carrinho_Sala1_idx` (`idSala` ASC),
  CONSTRAINT `fk_Carrinho_Recursos`
    FOREIGN KEY (`idRecursos`)
    REFERENCES `scheduleit`.`Recursos` (`idRecursos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Carrinho_Sala1`
    FOREIGN KEY (`idSala`)
    REFERENCES `scheduleit`.`Sala` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`, `foto`, `permissao`) VALUES
(1, 'Admin', 'Admin', "0", "0", 'admin', '123', NULL, 9);