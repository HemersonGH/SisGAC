-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2018 às 16:55
-- Versão do servidor: 10.1.31-MariaDB
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
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `idAtividade` int(11) NOT NULL,
  `nome_atividade` varchar(100) NOT NULL,
  `descricao_atividade` varchar(200) NOT NULL,
  `prazo_entrega` date NOT NULL,
  `idConjuntoAtividade` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `pontos` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome_atividade`, `descricao_atividade`, `prazo_entrega`, `idConjuntoAtividade`, `idProfessor`, `pontos`) VALUES
(3, '52', 'dsf', '2018-06-08', 2, 2, '43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conjunto_atividade`
--

CREATE TABLE `conjunto_atividade` (
  `idConjuntoAtividade` int(11) NOT NULL,
  `nome_conjunto` varchar(45) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conjunto_atividade`
--

INSERT INTO `conjunto_atividade` (`idConjuntoAtividade`, `nome_conjunto`, `idProfessor`, `idDisciplina`) VALUES
(2, 'xfx', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `nome_disciplina` varchar(80) NOT NULL,
  `codigo_disciplina` varchar(20) NOT NULL,
  `descricao_disciplina` varchar(200) NOT NULL,
  `status_disciplina` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `idProfessor`, `nome_disciplina`, `codigo_disciplina`, `descricao_disciplina`, `status_disciplina`) VALUES
(1, 2, 'hgfhfg', 'gdfg34', '346redf', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participa_disciplina`
--

CREATE TABLE `participa_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `status_participacao` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza_atividade`
--

CREATE TABLE `realiza_atividade` (
  `idAluno` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL,
  `idDisciplina` varchar(45) NOT NULL,
  `idProfessor` varchar(45) NOT NULL,
  `resposta_aluno` varchar(200) NOT NULL,
  `anexo` varchar(200) NOT NULL,
  `status_avaliacao` int(11) NOT NULL DEFAULT '1',
  `resposta_professor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_disciplina`
--

CREATE TABLE `solicitacao_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `status_solicitacao` int(11) NOT NULL,
  `justificativa_aluno` varchar(250) NOT NULL,
  `justificativa_professor` varchar(250) NOT NULL,
  `idSolicitacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trofeu`
--

CREATE TABLE `trofeu` (
  `idTrofeu` int(11) NOT NULL,
  `tipo_trofeu` varchar(45) NOT NULL COMMENT 'Os tipos de trofeus podera assumir os seguintes valores:\n1 => Ouro\n2 => Prata\n3 => Bronze'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trofeu_atividade`
--

CREATE TABLE `trofeu_atividade` (
  `idTrofeu` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `data`, `email`, `senha`, `tipoUsuario`) VALUES
(1, 'ee', 'ee', '2018-06-08', 'e@e', '08a4415e9d594ff960030b921d42b91e', 1),
(2, 'p', 'p', '2018-06-08', 'po@po', '83878c91171338902e0fe0fb97a8c47a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`idAtividade`),
  ADD KEY `fk_atividade_conjunto_atividade1_idx` (`idConjuntoAtividade`);

--
-- Indexes for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  ADD PRIMARY KEY (`idConjuntoAtividade`),
  ADD KEY `fk_conjunto_atividade_Usuario1_idx` (`idProfessor`),
  ADD KEY `fk_conjunto_atividade_disciplina1_idx` (`idDisciplina`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`),
  ADD KEY `fk_disciplina_Usuario_idx` (`idProfessor`);

--
-- Indexes for table `participa_disciplina`
--
ALTER TABLE `participa_disciplina`
  ADD PRIMARY KEY (`idAluno`,`idDisciplina`),
  ADD KEY `fk_Usuario_has_disciplina_disciplina1_idx` (`idDisciplina`),
  ADD KEY `fk_Usuario_has_disciplina_Usuario1_idx` (`idAluno`);

--
-- Indexes for table `realiza_atividade`
--
ALTER TABLE `realiza_atividade`
  ADD PRIMARY KEY (`idAluno`,`idAtividade`),
  ADD KEY `fk_Usuario_has_atividade_atividade1_idx` (`idAtividade`),
  ADD KEY `fk_Usuario_has_atividade_Usuario1_idx` (`idAluno`);

--
-- Indexes for table `solicitacao_disciplina`
--
ALTER TABLE `solicitacao_disciplina`
  ADD PRIMARY KEY (`idAluno`,`idDisciplina`,`idSolicitacao`),
  ADD KEY `fk_Usuario_has_disciplina_disciplina2_idx` (`idDisciplina`),
  ADD KEY `fk_Usuario_has_disciplina_Usuario2_idx` (`idAluno`);

--
-- Indexes for table `trofeu`
--
ALTER TABLE `trofeu`
  ADD PRIMARY KEY (`idTrofeu`);

--
-- Indexes for table `trofeu_atividade`
--
ALTER TABLE `trofeu_atividade`
  ADD PRIMARY KEY (`idTrofeu`,`idAtividade`),
  ADD KEY `fk_trofeu_has_atividade_atividade1_idx` (`idAtividade`),
  ADD KEY `fk_trofeu_has_atividade_trofeu1_idx` (`idTrofeu`);

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
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  MODIFY `idConjuntoAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_conjunto_atividade` FOREIGN KEY (`idConjuntoAtividade`) REFERENCES `conjunto_atividade` (`idConjuntoAtividade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  ADD CONSTRAINT `fk_conjunto_atividade_da_disciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`),
  ADD CONSTRAINT `fk_conjunto_atividade_professor` FOREIGN KEY (`idProfessor`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_Usuario` FOREIGN KEY (`idProfessor`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `participa_disciplina`
--
ALTER TABLE `participa_disciplina`
  ADD CONSTRAINT `fk_Usuario_participa` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_disciplina_participa` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`);

--
-- Limitadores para a tabela `realiza_atividade`
--
ALTER TABLE `realiza_atividade`
  ADD CONSTRAINT `fk_aluno_realiza_atividade` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_atividade_realizada` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`);

--
-- Limitadores para a tabela `solicitacao_disciplina`
--
ALTER TABLE `solicitacao_disciplina`
  ADD CONSTRAINT `fk_Usuario_disciplina_solicitada` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuario_solicita_disciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `trofeu_atividade`
--
ALTER TABLE `trofeu_atividade`
  ADD CONSTRAINT `fk_trofeu_atividade` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`),
  ADD CONSTRAINT `fk_trofeu_da_atividade` FOREIGN KEY (`idTrofeu`) REFERENCES `trofeu` (`idTrofeu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
