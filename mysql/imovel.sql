-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Jul-2022 às 03:42
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

DROP TABLE IF EXISTS `imovel`;
CREATE TABLE IF NOT EXISTS `imovel` (
  `idImovel` bigint(20) NOT NULL AUTO_INCREMENT,
  `situacao` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `tipo2` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `area_util` double NOT NULL,
  `area_total` double NOT NULL,
  `numero_casa` int(11) NOT NULL,
  `numero_quarto` int(2) NOT NULL,
  `numero_banheiro` int(2) NOT NULL,
  `numero_garagem` int(2) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `FK_UserImovel` (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`idImovel`, `situacao`, `tipo`, `tipo2`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `complemento`, `area_util`, `area_total`, `numero_casa`, `numero_quarto`, `numero_banheiro`, `numero_garagem`, `descricao`, `idUsuario`) VALUES
(2, 'Vender', 'Apartamento', 'Padrão', '89120-000', 'a', '1', '1', 'SC', '1', 1, 1, 1, 1, 1, 1, '1', 21);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
