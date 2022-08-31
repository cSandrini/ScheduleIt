<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2022 às 15:23
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scheduleit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--
=======
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
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `horario` time NOT NULL,
  `data` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `cargo` (
  `idSala` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `idAgenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `carrinho` (
  `idSala` int(11) NOT NULL,
  `idRecurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `cidade` (
  `endereco` int(11) NOT NULL,
  `idEstado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `estado` (
  `idEstado` char(2) NOT NULL,
  `nomeEstado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `localizacao` (
  `idSala` int(11) NOT NULL,
  `endereço` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `profissional` (
  `idProfissional` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `recurso`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
CREATE TABLE `recurso` (
  `idRecurso` int(11) NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
=======
CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `idProprietario` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `numero` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(20) NOT NULL,
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
  `imgBanner` blob DEFAULT NULL,
  `imgLogo` blob DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `classificacao` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
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

<<<<<<< HEAD
--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `cpf`, `numero`, `email`, `senha`, `imagem`, `permissao`) VALUES
(1, 'Admin', NULL, NULL, NULL, 'admin', '123', NULL, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `fk_Agenda_Cargo1_idx` (`idSala`,`idProfissional`),
  ADD KEY `fk_Agenda_Usuario1_idx` (`id`);

<<<<<<< HEAD
--
-- Índices para tabela `cargo`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idSala`,`idProfissional`),
  ADD KEY `fk_table1_Sala Virtual1_idx` (`idSala`),
  ADD KEY `fk_table1_Funcionario1_idx` (`idProfissional`),
  ADD KEY `idAgenda` (`idAgenda`);

<<<<<<< HEAD
--
-- Índices para tabela `carrinho`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idSala`,`idRecurso`),
  ADD KEY `fk_Carrinho_Servicos1_idx` (`idRecurso`);

<<<<<<< HEAD
--
-- Índices para tabela `cidade`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`endereco`),
  ADD KEY `fk_Cidade_Estado1_idx` (`idEstado`);

<<<<<<< HEAD
--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Índices para tabela `localizacao`
--
=======
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `localizacao`
  ADD KEY `fk_table1_Sala Virtual2_idx` (`idSala`),
  ADD KEY `fk_table1_Cidade1_idx` (`endereço`);

<<<<<<< HEAD
--
-- Índices para tabela `profissional`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`idProfissional`),
  ADD KEY `id` (`id`);

<<<<<<< HEAD
--
-- Índices para tabela `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`idRecurso`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

--
-- Índices para tabela `usuario`
--
=======
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`idRecurso`);

ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

<<<<<<< HEAD
--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
=======
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_Agenda_Cargo1` FOREIGN KEY (`idSala`,`idProfissional`) REFERENCES `cargo` (`idSala`, `idProfissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agenda_Usuario1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

<<<<<<< HEAD
--
-- Limitadores para a tabela `cargo`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_table1_Funcionario1` FOREIGN KEY (`idProfissional`) REFERENCES `profissional` (`idProfissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_Sala Virtual1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idAgenda` FOREIGN KEY (`idAgenda`) REFERENCES `agenda` (`idAgenda`);

<<<<<<< HEAD
--
-- Limitadores para a tabela `carrinho`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_Carrinho_Sala Virtual1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Carrinho_Servicos1` FOREIGN KEY (`idRecurso`) REFERENCES `recurso` (`idRecurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

<<<<<<< HEAD
--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_Cidade_Estado1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `localizacao`
--
=======
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_Cidade_Estado1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `localizacao`
  ADD CONSTRAINT `fk_table1_Cidade1` FOREIGN KEY (`endereço`) REFERENCES `cidade` (`endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_Sala Virtual2` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

<<<<<<< HEAD
--
-- Limitadores para a tabela `profissional`
--
=======
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
ALTER TABLE `profissional`
  ADD CONSTRAINT `fk_Funcionario_Usuario1` FOREIGN KEY (`idProfissional`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`);
COMMIT;

<<<<<<< HEAD
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
-- INSERE O LOGIN DO ADMIN NO SISTEMA
INSERT INTO scheduleit.usuario (id, nome, sobrenome, cpf, numero, email, senha, imagem, permissao) VALUES (1, 'Admin', NULL, NULL, NULL, 'admin', '123', NULL, 9);

-- CONFIGS
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
>>>>>>> a2fa552e3be27e719899f8f034db5c093dbe8f34
