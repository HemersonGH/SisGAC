-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jun-2018 às 23:13
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
  `idProfessor` int(11) NOT NULL,
  `pontos` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome_atividade`, `descricao_atividade`, `prazo_entrega`, `idConjuntoAtividade`, `idProfessor`, `pontos`) VALUES
(21, 'elicitação de requisitos', 'lorem ipsum', '2018-06-06 03:00:00', 25, 8, '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conjunto_atividade`
--

CREATE TABLE `conjunto_atividade` (
  `idConjuntoAtividade` int(11) NOT NULL,
  `nome_conjunto` varchar(80) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conjunto_atividade`
--

INSERT INTO `conjunto_atividade` (`idConjuntoAtividade`, `nome_conjunto`, `idProfessor`, `idDisciplina`) VALUES
(25, 'gerencia de requisitos', 8, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
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
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `idProfessor`, `nome_disciplina`, `codigo_disciplina`, `descricao_disciplina`, `status_disciplina`) VALUES
(15, 8, 'sw', '123', 'legal', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participa_disciplina`
--

CREATE TABLE `participa_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `status_participacao` tinyint(1) NOT NULL,
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participa_disciplina`
--

INSERT INTO `participa_disciplina` (`idAluno`, `idDisciplina`, `status_participacao`, `idProfessor`) VALUES
(9, 15, 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza_atividade`
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
-- Extraindo dados da tabela `realiza_atividade`
--

INSERT INTO `realiza_atividade` (`idAtividade`, `idAluno`, `idDisciplina`, `idProfessor`, `resposta_aluno`, `anexo`, `status_avaliacao`, `resposta_professor`) VALUES
(21, 9, 15, 8, 'evidencia', 'aluno_9_21.docx', 3, 'errado.. falta tal coisa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_disciplinas`
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
-- Extraindo dados da tabela `solicitacoes_disciplinas`
--

INSERT INTO `solicitacoes_disciplinas` (`idSolicitacao`, `idAluno`, `idDisciplina`, `justificativa_aluno`, `status_solicitacao`, `idProfessor`, `justificativa_professor`) VALUES
(11, 9, 15, 'oi', 2, 8, 'ok');

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
  `data` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `data`, `email`, `senha`, `tipoUsuario`) VALUES
(10, 'dsffsdf', 'dsfsd', '2018-06-06', 'emai@a', 'd4b2758da0205c1e0aa9512cd188002a', 2),
(11, 'aa', 'aa', '2018-06-22', 'aaa@aaa', '4124bc0a9335c27f086f24ba207a4912', 1);

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
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `idSolicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trofeus`
--
ALTER TABLE `trofeus`
  MODIFY `idTrofeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
