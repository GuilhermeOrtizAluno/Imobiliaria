-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Nov-2021 às 22:00
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cidade` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Cidade_Endereco` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `descricao`, `created_at`, `updated_at`, `id_cidade`) VALUES
(12, 'Centro', '2021-11-20 01:00:06', '2021-11-20 01:00:06', 1),
(13, 'Centro', '2021-11-20 01:00:12', '2021-11-20 01:00:12', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Castro', '2021-11-08 23:17:49', '2021-11-08 23:17:52'),
(7, 'Ponta Grossa', '2021-11-18 04:20:04', '2021-11-18 04:20:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cep` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rua` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numero` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cidade` int NOT NULL,
  `id_bairro` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Bairro` (`id_bairro`),
  KEY `Cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias`
--

DROP TABLE IF EXISTS `galerias`;
CREATE TABLE IF NOT EXISTS `galerias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mes` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_imovel` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Galeria` (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `venda` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tipo` int NOT NULL,
  `id_endereco` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Tipo` (`id_tipo`),
  KEY `Endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(14, 'Casa', '2021-11-18 04:03:09', '2021-11-18 04:03:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `usuario`, `senha`, `email`, `created_at`, `updated_at`) VALUES
(9, 'Admin', 'admin', 'Admin', '$2y$10$qGtVhUIiRuJGyq6sM/ylvOKzETLFWr5z50Q5nxyC5/fpSA3/Vp.mq', 'admin@hotmail.com', '2021-11-20 00:56:43', '2021-11-20 00:56:43');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
  ADD CONSTRAINT `Cidade_Endereco` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `Bairro` FOREIGN KEY (`id_bairro`) REFERENCES `bairros` (`id`),
  ADD CONSTRAINT `Cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `galerias`
--
ALTER TABLE `galerias`
  ADD CONSTRAINT `Galeria` FOREIGN KEY (`id_imovel`) REFERENCES `imoveis` (`id`);

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `Endereco` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
