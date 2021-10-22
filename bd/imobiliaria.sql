-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2021 às 16:37
-- Versão do servidor: 5.7.31
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Cidade_Endereco` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `descricao`, `created_at`, `updated_at`, `id_cidade`) VALUES
(1, 'Morada do sol 4', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Castro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(8) COLLATE utf8_bin NOT NULL,
  `rua` varchar(30) COLLATE utf8_bin NOT NULL,
  `numero` varchar(30) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cidade` int(11) NOT NULL,
  `id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Bairro` (`id_bairro`),
  KEY `Cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `cep`, `rua`, `numero`, `created_at`, `updated_at`, `id_cidade`, `id_bairro`) VALUES
(15, '845050', 'rua percy bannach lopes', '558', '2021-10-22 01:56:48', '2021-10-22 01:56:48', 1, 1),
(16, '845050', 'rua percy bannach lopes', '556', '2021-10-22 02:34:41', '2021-10-22 02:34:41', 1, 1),
(17, '10000', 'aquela rua', '123', '2021-10-22 17:05:00', '2021-10-22 17:05:00', 1, 1),
(18, '10000', 'aquela rua', '123', '2021-10-22 17:05:10', '2021-10-22 17:05:10', 1, 1),
(19, '10000', 'aquela rua', '123', '2021-10-22 17:12:26', '2021-10-22 17:12:26', 1, 1),
(20, '10000', 'aquela rua', '123', '2021-10-22 17:12:59', '2021-10-22 17:12:59', 1, 1),
(21, '10000', 'aquela rua', '123', '2021-10-22 19:13:36', '2021-10-22 19:13:36', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias`
--

DROP TABLE IF EXISTS `galerias`;
CREATE TABLE IF NOT EXISTS `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) COLLATE utf8_bin NOT NULL,
  `mes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_imovel` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Galeria` (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(10) COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `venda` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Tipo` (`id_tipo`),
  KEY `Endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `referencia`, `descricao`, `venda`, `created_at`, `updated_at`, `id_tipo`, `id_endereco`) VALUES
(25, '1234', '4545', 30000, '2021-10-22 17:12:26', '2021-10-22 19:13:46', 1, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'casa', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `usuario`, `senha`, `email`, `created_at`, `updated_at`) VALUES
(5, 'Conta', 'Admin', 'admin', '$2y$10$qEDNXchV2ucmnjrNO0/oRueniQZW7M4wD/TF5VfuJBMFujn2TkMNi', 'admin@hotmail.com', '2021-10-22 19:14:20', '2021-10-22 19:35:54');

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
