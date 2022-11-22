-- -----------------------------------------------------
-- Schema scheduleit
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `scheduleit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `scheduleit` ;

-- AUMENTAR NÚMERO DE PACOTES
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000; 

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
  `foto` MEDIUMBLOB NULL,
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
  `visibilidade` BOOLEAN NOT NULL, 
  `imgLogo` BLOB NULL,
  PRIMARY KEY (`idSala`),
  INDEX `fk_Sala_Usuario1_idx` (`idProprietario` ASC),
  CONSTRAINT `fk_Sala_Usuario1`
    FOREIGN KEY (`idProprietario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scheduleit`.`Funcionario`
-- -----------------------------------------------------
/*
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
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionario_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
*/

-- -----------------------------------------------------
-- Table `scheduleit`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleit`.`Horario` (
  `idSala` INT NULL,
  `idFuncionario` INT NULL,
  `idUsuario` INT NULL,
  `dataDMA` DATE NOT NULL,
  `idHorario` INT NOT NULL,
  INDEX `fk_Horario_idFuncionario` (`idFuncionario` ASC),
  INDEX `fk_Horario_idUsuario` (`idUsuario` ASC),
  CONSTRAINT `fk_Horario_idFuncionario`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Horario_idUsuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `scheduleit`.`Usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scheduleit`.`Recurso`
-- -----------------------------------------------------
/*
CREATE TABLE IF NOT EXISTS `scheduleit`.`Recurso` (
  `idRecurso` VARCHAR(45) NOT NULL,
  `valor` FLOAT NOT NULL,
  
  PRIMARY KEY (`idRecurso`))
ENGINE = InnoDB;
*/

-- -----------------------------------------------------
-- Table `scheduleit`.`Carrinho`
-- -----------------------------------------------------
/*
CREATE TABLE IF NOT EXISTS `scheduleit`.`Carrinho` (
  `idRecurso` VARCHAR(45) NOT NULL,
  `idSala` INT NOT NULL,
  PRIMARY KEY (`idRecurso`, `idSala`),
  INDEX `fk_Carrinho_Sala1_idx` (`idSala` ASC),
  CONSTRAINT `fk_Carrinho_Recurso`
    FOREIGN KEY (`idRecurso`)
    REFERENCES `scheduleit`.`Recurso` (`idRecurso`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Carrinho_Sala1`
    FOREIGN KEY (`idSala`)
    REFERENCES `scheduleit`.`Sala` (`idSala`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
*/


INSERT INTO `Usuario` (`id`, `nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`, `foto`, `permissao`) VALUES
(1, 'Admin', 'Admin', "0", "0", 'admin', '06e260af20654ea97d229dc9cab79fb0a76ce11b', NULL, 9);

INSERT INTO `Usuario` (`id`, `nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`, `foto`, `permissao`) VALUES 
(NULL, 'Walter', 'White', '13560366780', '27999791601', 'walter@gmail.com', '06e260af20654ea97d229dc9cab79fb0a76ce11b', NULL, NULL);

INSERT INTO `Usuario` (`id`, `nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`, `foto`, `permissao`) VALUES 
(NULL, 'Jesse', 'Pinkman', '13560366781', '27999791602', 'jesse@gmail.com', '06e260af20654ea97d229dc9cab79fb0a76ce11b', NULL, NULL);

INSERT INTO `Sala` (`idSala`, `idProprietario`, `email`, `cnpj`, `nomeFantasia`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `classificacao`, `descricao`, `imgLogo`) 
VALUES (NULL, '2', 'vamonos@gmail.com', '12345678912345', 'VamonosPest', '29705092', 'ES', 'Colatina', 'Maria das Graças', 'Rua Antônio Pagani', '42', 'apt. 403', '27999588556', '5', "Dedetização de qualidade!", NULL);

INSERT INTO `Sala` (`idSala`, `idProprietario`, `email`, `cnpj`, `nomeFantasia`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `classificacao`, `descricao`, `imgLogo`) 
VALUES (NULL, '1', 'pollos@gmail.com', '12345678912346', 'Los Pollos Hermanos', '29705099', 'ES', 'Colatina', 'Carlos Germano Naumman', 'Rod. Gether Lopes de Faria', '80', '', '27999588557', '4.5', "Comida Mexicana!", NULL);

/*
INSERT INTO `Funcionario` (`idFuncionario`, `idSala`, `idUsuario`) VALUES (NULL, '1', '2');
INSERT INTO `Funcionario` (`idFuncionario`, `idSala`, `idUsuario`) VALUES (NULL, '1', '3');
INSERT INTO `Funcionario` (`idFuncionario`, `idSala`, `idUsuario`) VALUES (NULL, '2', '2');

INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('1Sala', '0');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('5Sala', '15');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('ilimitadoSala', '30');

INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('1Funcionario', '0');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('5Funcionario', '15');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('ilimitadoFuncionario', '30');

INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('mensal', '20');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('trimestral', '55');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('semestral', '100');
INSERT INTO `Recurso` (`idRecurso`, `valor`) VALUES ('anual', '180');
*/
