-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2018 às 06:27
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
-- Database: `db_sgd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `idAtividade` int(11) NOT NULL,
  `nome_atividade` varchar(100) NOT NULL,
  `descricao_atividade` varchar(200) NOT NULL,
  `prazo_entrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idConjuntoAtividade` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `pontos` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome_atividade`, `descricao_atividade`, `prazo_entrega`, `idConjuntoAtividade`, `id_professor`, `pontos`) VALUES
(4, 'Nome da Atividade:', '1212', '2018-05-27 03:00:00', 3, 3, '212'),
(7, '423', '3434', '2018-06-28 03:00:00', 1, 3, '243'),
(9, '23', '23', '2018-05-28 03:00:00', 1, 3, '1'),
(10, '22', '232', '2018-05-28 03:00:00', 1, 3, '12'),
(11, '232', '32', '2018-05-28 03:00:00', 3, 3, '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conjunto_atividade`
--

CREATE TABLE `conjunto_atividade` (
  `idConjuntoAtividade` int(11) NOT NULL,
  `nome_conjunto` varchar(80) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina_conjunto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conjunto_atividade`
--

INSERT INTO `conjunto_atividade` (`idConjuntoAtividade`, `nome_conjunto`, `id_professor`, `id_disciplina_conjunto`) VALUES
(7, 'rrr', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `nome_disciplina` varchar(80) NOT NULL,
  `codigo_disciplina` varchar(10) NOT NULL,
  `descricao_disciplina` varchar(200) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `id_professor`, `nome_disciplina`, `codigo_disciplina`, `descricao_disciplina`, `status`) VALUES
(1, 3, 'Banco de Dados', 'GCC-192', 'Essa disciplina deverá propiciar conhecimento na área de banco de dados com o professor.', NULL),
(2, 4, 'renata', 'renata', 'renatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatarenatare', NULL),
(3, 4, 'renata2', 'renata2', 'renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2renata2', NULL),
(4, 3, 'wqewqe', 'wqeqwe', 'wqeqweq', NULL),
(5, 3, '343', '343', '4343', 1),
(6, 3, 'er', 'er', 'ere', 0),
(7, 3, 'qwqwqwq', 'wqwq', 'wqwq', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trofeus`
--

CREATE TABLE `trofeus` (
  `idTrofeu` int(11) NOT NULL,
  `nome_trofeu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trofeus`
--

INSERT INTO `trofeus` (`idTrofeu`, `nome_trofeu`) VALUES
(1, 'Ouro'),
(2, 'Prata'),
(3, 'Bronze');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trofeus_atividades`
--

CREATE TABLE `trofeus_atividades` (
  `idAtividade` int(11) NOT NULL,
  `idTrofeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(80) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `data`, `email`, `senha`, `tipoUsuario`) VALUES
(1, 'aluno', 'aluno', '2018-05-26 23:49:29', 'aluno@aluno', 'ca0cd09a12abade3bf0777574d9f987f', 1),
(3, 'Hemerson', 'Professor', '2018-05-26 03:00:00', 'professor@professor', 'd450c5dbcc10db0749277efc32f15f9f', 2),
(4, 'Renata', 'Renata', '1998-04-12 03:00:00', 'renata@renata', '1b67d3053dc8facc72e0238bc8640c7a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`idAtividade`,`idConjuntoAtividade`);

--
-- Indexes for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  ADD PRIMARY KEY (`idConjuntoAtividade`,`id_disciplina_conjunto`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`,`id_professor`) USING BTREE;

--
-- Indexes for table `trofeus`
--
ALTER TABLE `trofeus`
  ADD PRIMARY KEY (`idTrofeu`);

--
-- Indexes for table `trofeus_atividades`
--
ALTER TABLE `trofeus_atividades`
  ADD PRIMARY KEY (`idAtividade`,`idTrofeu`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  MODIFY `idConjuntoAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trofeus`
--
ALTER TABLE `trofeus`
  MODIFY `idTrofeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
