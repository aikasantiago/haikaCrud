-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Jun-2024 às 18:52
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moveis_crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `usuario`, `senha`) VALUES
(28, 'haika', '321'),
(29, 'haika', '321');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `relatorio`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `relatorio`;
CREATE TABLE IF NOT EXISTS `relatorio` (
`contIDcat` bigint
,`categoria` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_categoria`
--

DROP TABLE IF EXISTS `table_categoria`;
CREATE TABLE IF NOT EXISTS `table_categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `table_categoria`
--

INSERT INTO `table_categoria` (`id_categoria`, `nome_categoria`) VALUES
(19, 'Sofá'),
(20, 'Cama');

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_estoque`
--

DROP TABLE IF EXISTS `table_estoque`;
CREATE TABLE IF NOT EXISTS `table_estoque` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(45) NOT NULL,
  `valor` decimal(45,0) NOT NULL,
  `quantidade` decimal(45,0) NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `categoria_fk` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `table_estoque`
--

INSERT INTO `table_estoque` (`id_produto`, `nome_produto`, `valor`, `quantidade`, `id_categoria`) VALUES
(24, 'Sofá Tailândia', 2612, 5, 19),
(25, 'Cama Box Casal Sonho de Luxo', 2980, 3, 20);

-- --------------------------------------------------------

--
-- Estrutura para vista `relatorio`
--
DROP TABLE IF EXISTS `relatorio`;

DROP VIEW IF EXISTS `relatorio`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio`  AS SELECT count(`c`.`id_categoria`) AS `contIDcat`, `c`.`nome_categoria` AS `categoria` FROM (`table_estoque` `p` join `table_categoria` `c` on((`p`.`id_categoria` = `c`.`id_categoria`))) GROUP BY `c`.`id_categoria` ORDER BY `contIDcat` DESC ;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `table_estoque`
--
ALTER TABLE `table_estoque`
  ADD CONSTRAINT `categoria_fk` FOREIGN KEY (`id_categoria`) REFERENCES `table_categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
