-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 03:58 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

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
-- Table structure for table `atividade`
--

CREATE TABLE `atividade` (
  `idAtividade` int(11) NOT NULL,
  `nome_atividade` varchar(100) NOT NULL,
  `descricao_atividade` varchar(200) NOT NULL,
  `prazo_entrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idConjuntoAtividade` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `pontos` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome_atividade`, `descricao_atividade`, `prazo_entrega`, `idConjuntoAtividade`, `idProfessor`, `pontos`) VALUES
(16, 'Descrever modelo de ciclo de vida', 'Descreva o modelo de ciclo de vida adotado para o desenvolvimento do software', '2018-07-25 03:00:00', 18, 7, '7'),
(17, 'Definir a o escopo do projeto', 'Definir a o escopo do projeto (objetivo, principais funcionalidades e restrições)', '2018-06-10 03:00:00', 18, 7, '5'),
(18, 'Selecionar ferramenta de Gerência', 'Selecione e adote uma ferramenta para gerenciar as atividades de desenvolvimento e defina o backlog do produto nesta ferramenta', '2018-07-25 03:00:00', 18, 7, '5'),
(19, 'Criar projeto no Git-Hub', 'Criar projeto no Git-Hub e adicionar todos os envolvidos', '2018-04-19 03:00:00', 19, 7, '3'),
(20, 'Definir e seguir políticas de uso do Git', 'Definir e seguir políticas de uso do Git no leia-me do projeto (mínimo: estrutura de diretórios e quais tipos de produtos de trabalho serão armazenados em cada\r\ndiretório).', '2018-07-19 03:00:00', 19, 7, '7'),
(21, 'sdgewrwer', '5235ewrwrewrewrewrew', '2018-06-05 03:00:00', 24, 7, '3');

-- --------------------------------------------------------

--
-- Table structure for table `conjunto_atividade`
--

CREATE TABLE `conjunto_atividade` (
  `idConjuntoAtividade` int(11) NOT NULL,
  `nome_conjunto` varchar(80) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conjunto_atividade`
--

INSERT INTO `conjunto_atividade` (`idConjuntoAtividade`, `nome_conjunto`, `idProfessor`, `idDisciplina`) VALUES
(18, 'Gerência de Projetos', 7, 10),
(19, 'Gerência de Configuração', 7, 10),
(22, 'link park', 7, 13),
(24, 'cabrititinha', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `nome_disciplina` varchar(80) NOT NULL,
  `codigo_disciplina` varchar(10) NOT NULL,
  `descricao_disciplina` varchar(200) NOT NULL,
  `status_disciplina` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `idProfessor`, `nome_disciplina`, `codigo_disciplina`, `descricao_disciplina`, `status_disciplina`) VALUES
(10, 7, 'Engenharia de Software', 'GCC-112', 'Engenharia de software é uma área da computação voltada à especificação, desenvolvimento, manutenção e criação de software, com a aplicação de tecnologias e práticas de gerência de projetos.', 2),
(11, 7, 'Banco de Dados', 'GCC-143', 'Bancos de dados ou bases de dados são um conjunto de arquivos relacionados entre si com registros sobre pessoas, lugares ou coisas.', 1),
(12, 7, 'Algoritmos em Grafos', 'GCC-172', 'Grafos', 3),
(13, 7, 'dsfdfdsf457', 'dsfsd', 'sdf547547', 1),
(15, 7, 'fjgfj', 'gfj', 'gfjgfj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participa_disciplina`
--

CREATE TABLE `participa_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `status_participacao` tinyint(1) NOT NULL,
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participa_disciplina`
--

INSERT INTO `participa_disciplina` (`idAluno`, `idDisciplina`, `status_participacao`, `idProfessor`) VALUES
(6, 10, 1, 7),
(6, 12, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `realiza_atividade`
--

CREATE TABLE `realiza_atividade` (
  `idAtividade` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `resposta_aluno` varchar(300) DEFAULT NULL,
  `anexo` varchar(200) NOT NULL,
  `status_avaliacao` int(11) NOT NULL DEFAULT '1',
  `resposta_professor` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realiza_atividade`
--

INSERT INTO `realiza_atividade` (`idAtividade`, `idAluno`, `idDisciplina`, `idProfessor`, `resposta_aluno`, `anexo`, `status_avaliacao`, `resposta_professor`) VALUES
(16, 6, 10, 7, 'ff', 'Hemerson_Batista_Filho_6_16.docx', 3, 'dsfdsfdsf'),
(17, 6, 10, 7, 'kjsdfksdn sdfdskfjdsf sdfksdjfkds fdskfjsdkfsd', 'Hemerson_Batista_Filho_6_17.pdf', 3, 'fdgfdg'),
(18, 6, 10, 7, 'sfdsfdsf', 'Hemerson_Batista_Filho_6_18.docx', 2, NULL),
(19, 6, 10, 7, 'hjgfhjfg', 'Hemerson_Batista_Filho_6_19.docx', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `solicitacoes_disciplinas`
--

CREATE TABLE `solicitacoes_disciplinas` (
  `idSolicitacao` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `justificativa_aluno` varchar(250) NOT NULL,
  `status_solicitacao` int(11) NOT NULL DEFAULT '1',
  `idProfessor` int(11) NOT NULL,
  `justificativa_professor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solicitacoes_disciplinas`
--

INSERT INTO `solicitacoes_disciplinas` (`idSolicitacao`, `idAluno`, `idDisciplina`, `justificativa_aluno`, `status_solicitacao`, `idProfessor`, `justificativa_professor`) VALUES
(7, 6, 10, 'Desejo me matrícular nessa disciplna afim de realizar as demais atividades oferecidas pela mesma.', 2, 7, 'Aceito sua solicitação.'),
(8, 6, 12, 'Desejo me matrícular nessa disciplna afim de realizar as demais atividades oferecidas pela mesma.', 2, 7, 'Aceito'),
(9, 6, 10, 'dgsgsdgs', 2, 7, 'cfhdfhdfhd'),
(10, 6, 10, 'fsdfdsfsdfsd', 1, 7, ''),
(11, 6, 10, 't', 1, 7, ''),
(12, 6, 10, 'retret', 1, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `trofeus`
--

CREATE TABLE `trofeus` (
  `idTrofeu` int(11) NOT NULL,
  `nome_trofeu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trofeus`
--

INSERT INTO `trofeus` (`idTrofeu`, `nome_trofeu`) VALUES
(1, 'Ouro'),
(2, 'Prata'),
(3, 'Bronze');

-- --------------------------------------------------------

--
-- Table structure for table `trofeus_atividades`
--

CREATE TABLE `trofeus_atividades` (
  `idAtividade` int(11) NOT NULL,
  `idTrofeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `data`, `email`, `senha`, `tipoUsuario`) VALUES
(6, 'Hemerson Batista Filho', 'XXX.XXX.XXX-XX', '2018-06-05 13:41:57', 'aluno@aluno', 'ca0cd09a12abade3bf0777574d9f987f', 1),
(7, 'Antônio Carlos Silva', 'XXX.XXX.XXX-XX', '1988-09-21 03:00:00', 'professor@professor', 'd450c5dbcc10db0749277efc32f15f9f', 2),
(8, 'e456346', '346346', '2018-06-05 03:00:00', '34634@dsgds', 'c0a62e133894cdce435bcb4a5df1db2d', 2);

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
  ADD PRIMARY KEY (`idConjuntoAtividade`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`,`idProfessor`) USING BTREE;

--
-- Indexes for table `participa_disciplina`
--
ALTER TABLE `participa_disciplina`
  ADD PRIMARY KEY (`idAluno`,`idDisciplina`);

--
-- Indexes for table `realiza_atividade`
--
ALTER TABLE `realiza_atividade`
  ADD PRIMARY KEY (`idAtividade`,`idAluno`) USING BTREE;

--
-- Indexes for table `solicitacoes_disciplinas`
--
ALTER TABLE `solicitacoes_disciplinas`
  ADD PRIMARY KEY (`idSolicitacao`);

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
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  MODIFY `idConjuntoAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `solicitacoes_disciplinas`
--
ALTER TABLE `solicitacoes_disciplinas`
  MODIFY `idSolicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trofeus`
--
ALTER TABLE `trofeus`
  MODIFY `idTrofeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
