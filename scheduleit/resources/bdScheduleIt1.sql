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
  `nome` VARCHAR(20) NULL,
  `sobrenome` VARCHAR(20) NULL,
  `cpf` VARCHAR(11) NULL,
  `numero` VARCHAR(11) NULL,
  `email` VARCHAR(100) NULL,
  `senha` VARCHAR(50) NULL,
  `imagem` BLOB NULL,
  `permissao` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Estado` (
  `siglaEstado` CHAR(2) NOT NULL,
  `nomeEstado` VARCHAR(45) NULL,
  PRIMARY KEY (`siglaEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Sala Virtual`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Sala Virtual` (
  `idSala` INT NOT NULL AUTO_INCREMENT,
  `imgBanner` BLOB NULL,
  `imgLogo` BLOB NULL,
  `descricao` VARCHAR(200) NULL,
  `classificacao` FLOAT NULL,
  PRIMARY KEY (`idSala`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Profissional` (
  `idProfissional` INT NOT NULL,
  PRIMARY KEY (`idProfissional`),
  CONSTRAINT `fk_Funcionario_Usuario1`
    FOREIGN KEY (`idProfissional`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Cargo` (
  `idSala` INT NOT NULL,
  `idFuncionario` INT NOT NULL,
  `cargo` INT NOT NULL,
  PRIMARY KEY (`idSala`, `idFuncionario`),
  INDEX `fk_table1_Sala Virtual1_idx` (`idSala` ASC),
  INDEX `fk_table1_Funcionario1_idx` (`idFuncionario` ASC),
  CONSTRAINT `fk_table1_Sala Virtual1`
    FOREIGN KEY (`idSala`)
    REFERENCES `scheduleit`.`Sala Virtual` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Funcionario1`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `scheduleit`.`Profissional` (`idProfissional`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Agenda` (
  `idAgenda` INT NOT NULL,
  `idFuncionario` INT NOT NULL,
  `idSala` INT NOT NULL,
  `horario` TIME NOT NULL,
  `data` DATE NOT NULL,
  `Status` TINYINT(1) NOT NULL,
  `idUsuario` INT NULL,
  PRIMARY KEY (`idAgenda`),
  INDEX `fk_Agenda_Cargo1_idx` (`idSala` ASC, `idFuncionario` ASC),
  INDEX `fk_Agenda_Usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Agenda_Cargo1`
    FOREIGN KEY (`idSala` , `idFuncionario`)
    REFERENCES `scheduleit`.`Cargo` (`idSala` , `idFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agenda_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Recurso` (
  `idServicos` INT NOT NULL,
  `valor` FLOAT NULL,
  PRIMARY KEY (`idServicos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Carrinho` (
  `Sala Virtual_idSala` INT NOT NULL,
  `Servicos_idServicos` INT NOT NULL,
  PRIMARY KEY (`Sala Virtual_idSala`, `Servicos_idServicos`),
  INDEX `fk_Carrinho_Servicos1_idx` (`Servicos_idServicos` ASC),
  CONSTRAINT `fk_Carrinho_Sala Virtual1`
    FOREIGN KEY (`Sala Virtual_idSala`)
    REFERENCES `scheduleit`.`Sala Virtual` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Carrinho_Servicos1`
    FOREIGN KEY (`Servicos_idServicos`)
    REFERENCES `scheduleit`.`Recurso` (`idServicos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Cidade` (
  `endereço` INT NOT NULL,
  `Estado_siglaEstado` CHAR(2) NOT NULL,
  PRIMARY KEY (`endereço`),
  INDEX `fk_Cidade_Estado1_idx` (`Estado_siglaEstado` ASC),
  CONSTRAINT `fk_Cidade_Estado1`
    FOREIGN KEY (`Estado_siglaEstado`)
    REFERENCES `scheduleit`.`Estado` (`siglaEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scheduleit`.`Localizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Localizacao` (
  `Sala Virtual_idSala` INT NOT NULL,
  `Cidade_endereço` INT NOT NULL,
  INDEX `fk_table1_Sala Virtual2_idx` (`Sala Virtual_idSala` ASC),
  INDEX `fk_table1_Cidade1_idx` (`Cidade_endereço` ASC),
  CONSTRAINT `fk_table1_Sala Virtual2`
    FOREIGN KEY (`Sala Virtual_idSala`)
    REFERENCES `scheduleit`.`Sala Virtual` (`idSala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Cidade1`
    FOREIGN KEY (`Cidade_endereço`)
    REFERENCES `scheduleit`.`Cidade` (`endereço`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO scheduleit.usuario (id, nome, sobrenome, cpf, numero, email, senha, imagem, permissao) VALUES (1, 'Admin', NULL, NULL, NULL, 'admin', '123', NULL, 9);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
