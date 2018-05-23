-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Maio-2018 às 05:25
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codeigniter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `idCidade` int(11) NOT NULL,
  `nome_cid` varchar(80) NOT NULL,
  `uf` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`idCidade`, `nome_cid`, `uf`) VALUES
(1, 'Belo Horizonte', 'MG'),
(2, 'Campo Belo', 'MG'),
(3, 'Rio de Janeiro', 'RJ'),
(4, 'Lavras', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `status` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cidade_idCidade` int(11) DEFAULT NULL,
  `dataNasc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `email`, `senha`, `status`, `nivel`, `endereco`, `cidade_idCidade`, `dataNasc`) VALUES
(22, 'teste', 'teste', 'teste@teste', 'e358efa489f58062f10dd7316b65649e', 1, 2, 'teste', 1, '2018-05-23 02:54:02'),
(27, 'lavras@lavras', 'lavras@lavras', 'lavras@lavras', 'd6e7f172d4e125a5d701046764f627b3', 1, 1, 'lavras@lavras', 3, '2018-05-23 02:54:02'),
(28, 'deu certo sim mi', '43242423432423', 'demo@gmail.com', 'e358efa489f58062f10dd7316b65649e', 1, 1, '4', 1, '2018-04-29 03:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idCidade`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `id_cidade_fk` (`idUsuario`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
