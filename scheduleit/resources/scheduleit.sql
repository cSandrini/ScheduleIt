-- CONFIGS
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- SCHEMA SCHEDULEIT
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `scheduleit` ;

CREATE SCHEMA IF NOT EXISTS `scheduleit` DEFAULT CHARACTER SET utf8 ;
USE `scheduleit` ;

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `horario` time NOT NULL,
  `data` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cargo` (
  `idSala` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `idAgenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `carrinho` (
  `idSala` int(11) NOT NULL,
  `idRecurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cidade` (
  `endereco` int(11) NOT NULL,
  `idEstado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estado` (
  `idEstado` char(2) NOT NULL,
  `nomeEstado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `localizacao` (
  `idSala` int(11) NOT NULL,
  `endereço` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `profissional` (
  `idProfissional` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `recurso` (
  `idRecurso` int(11) NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `idProprietario` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `numero` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(20) NOT NULL,
  `imgBanner` blob DEFAULT NULL,
  `imgLogo` blob DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `classificacao` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `sobrenome` varchar(20) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `numero` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `imagem` blob DEFAULT NULL,
  `permissao` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `fk_Agenda_Cargo1_idx` (`idSala`,`idProfissional`),
  ADD KEY `fk_Agenda_Usuario1_idx` (`id`);

ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idSala`,`idProfissional`),
  ADD KEY `fk_table1_Sala Virtual1_idx` (`idSala`),
  ADD KEY `fk_table1_Funcionario1_idx` (`idProfissional`),
  ADD KEY `idAgenda` (`idAgenda`);

ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idSala`,`idRecurso`),
  ADD KEY `fk_Carrinho_Servicos1_idx` (`idRecurso`);

ALTER TABLE `cidade`
  ADD PRIMARY KEY (`endereco`),
  ADD KEY `fk_Cidade_Estado1_idx` (`idEstado`);

ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

ALTER TABLE `localizacao`
  ADD KEY `fk_table1_Sala Virtual2_idx` (`idSala`),
  ADD KEY `fk_table1_Cidade1_idx` (`endereço`);

ALTER TABLE `profissional`
  ADD PRIMARY KEY (`idProfissional`),
  ADD KEY `id` (`id`);

ALTER TABLE `recurso`
  ADD PRIMARY KEY (`idRecurso`);

ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_Agenda_Cargo1` FOREIGN KEY (`idSala`,`idProfissional`) REFERENCES `cargo` (`idSala`, `idProfissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agenda_Usuario1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_table1_Funcionario1` FOREIGN KEY (`idProfissional`) REFERENCES `profissional` (`idProfissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_Sala Virtual1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAgenda` FOREIGN KEY (`idAgenda`) REFERENCES `agenda` (`idAgenda`);

ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_Carrinho_Sala Virtual1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Carrinho_Servicos1` FOREIGN KEY (`idRecurso`) REFERENCES `recurso` (`idRecurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_Cidade_Estado1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `localizacao`
  ADD CONSTRAINT `fk_table1_Cidade1` FOREIGN KEY (`endereço`) REFERENCES `cidade` (`endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_Sala Virtual2` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `profissional`
  ADD CONSTRAINT `fk_Funcionario_Usuario1` FOREIGN KEY (`idProfissional`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`);
COMMIT;

-- INSERE O LOGIN DO ADMIN NO SISTEMA
INSERT INTO scheduleit.usuario (id, nome, sobrenome, cpf, numero, email, senha, imagem, permissao) VALUES (1, 'Admin', NULL, NULL, NULL, 'admin', '123', NULL, 9);

-- CONFIGS
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
