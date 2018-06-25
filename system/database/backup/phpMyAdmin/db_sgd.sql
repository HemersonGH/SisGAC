-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jun-2018 às 05:37
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
  `prazo_entrega` date NOT NULL,
  `idConjuntoAtividade` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `trofeu_ouro` int(11) DEFAULT '0',
  `trofeu_prata` int(11) DEFAULT '0',
  `trofeu_bronze` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='																																																																																																																																																																																								';

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `nome_atividade`, `descricao_atividade`, `prazo_entrega`, `idConjuntoAtividade`, `idProfessor`, `trofeu_ouro`, `trofeu_prata`, `trofeu_bronze`) VALUES
(1, 'Modelar Banco de Dados', 'Modelar o banco de dados relaciona a partir do modelo ER.', '2018-06-16', 1, 1, 1, 1, 1),
(2, 'asd', 'as', '2018-06-15', 2, 1, 1, 1, 0);

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
(1, 'SQL', 1, 1),
(2, 'Consultas SQL', 1, 1);

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
  `status_disciplina` int(11) NOT NULL DEFAULT '1' COMMENT 'O status da disciplina podera assumir os seguintes valores:\n1 => Em Planejamento\n2 => Disponivel\n3 => Finalizada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `idProfessor`, `nome_disciplina`, `codigo_disciplina`, `descricao_disciplina`, `status_disciplina`) VALUES
(1, 1, 'Banco de Dados', 'GCC-117', 'Bancos de dados ou bases de dados são um conjunto de arquivos relacionados entre si com registros sobre pessoas, lugares ou coisas.', 2),
(2, 1, 'teste', 'testes', 'teste', 2),
(3, 1, 'teste2', 'teste2', 'teste2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participa_disciplina`
--

CREATE TABLE `participa_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `status_participacao` int(11) NOT NULL COMMENT 'O status da participação podera assumir os seguintes valores:\n1 => Aceito, pelo professor\n0 => Recusado, pelo professor',
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `participa_disciplina`
--

INSERT INTO `participa_disciplina` (`idAluno`, `idDisciplina`, `status_participacao`, `idProfessor`) VALUES
(2, 1, 1, 1),
(2, 2, 1, 1),
(2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza_atividade`
--

CREATE TABLE `realiza_atividade` (
  `idAluno` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL,
  `anexo` varchar(200) NOT NULL,
  `resposta_aluno` varchar(200) NOT NULL,
  `resposta_professor` varchar(200) NOT NULL,
  `status_avaliacao` int(11) NOT NULL DEFAULT '1' COMMENT 'O status da avaliação podera assumir os seguintes valores:\n1 => Pendente, aguardando avaliação do professor(Não Avaliada)\n2 => Aceita, confirmada pelo professor(Aceita)\n3 => Recusada, não aceita pelo professor(Recusada)',
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `realiza_atividade`
--

INSERT INTO `realiza_atividade` (`idAluno`, `idAtividade`, `anexo`, `resposta_aluno`, `resposta_professor`, `status_avaliacao`, `idProfessor`, `idDisciplina`) VALUES
(2, 1, 'Daniel_Ferrera_Carlos_2_1.pdf', 'Respondido no anexo', 'ok', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_disciplina`
--

CREATE TABLE `solicitacao_disciplina` (
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `status_solicitacao` int(11) NOT NULL DEFAULT '1' COMMENT 'O status da solicitacao podera assumir os seguintes valores:\n1 => Pendente, aguardando confirmação do professor\n2 => Aceita, pelo professor\n3 => Recusada, pelo professor',
  `justificativa_aluno` varchar(250) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacao_disciplina`
--

INSERT INTO `solicitacao_disciplina` (`idAluno`, `idDisciplina`, `status_solicitacao`, `justificativa_aluno`, `idProfessor`) VALUES
(2, 1, 2, 'dasda', 1),
(2, 2, 2, 'dsgds', 1),
(2, 3, 2, 'jfkj', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trofeu_ganho`
--

CREATE TABLE `trofeu_ganho` (
  `tipo_trofeu` int(11) NOT NULL COMMENT 'O tipo de trofeu pode assumir os seguintes valores:\n1 => Ouro\n2 => Prata\n3 => Bronze',
  `idAluno` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `trofeu_ganho`
--

INSERT INTO `trofeu_ganho` (`tipo_trofeu`, `idAluno`, `idAtividade`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `tipo_usuario` int(11) NOT NULL COMMENT 'O tipo de usuario podera assumir os seguintes valores:\n1 => Aluno\n2 => Professor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `data`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'Antônio Carlos Garcia', '560.062.435-20', '1985-04-12', 'professor@professor', 'd450c5dbcc10db0749277efc32f15f9f', 2),
(2, 'Daniel Ferrera Carlos', '213.123.123-12', '2000-04-12', 'aluno@aluno', 'ca0cd09a12abade3bf0777574d9f987f', 1);

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
  ADD PRIMARY KEY (`idAluno`,`idDisciplina`),
  ADD KEY `fk_Usuario_has_disciplina_disciplina2_idx` (`idDisciplina`),
  ADD KEY `fk_Usuario_has_disciplina_Usuario2_idx` (`idAluno`);

--
-- Indexes for table `trofeu_ganho`
--
ALTER TABLE `trofeu_ganho`
  ADD PRIMARY KEY (`idAluno`,`idAtividade`),
  ADD KEY `fk_trofeu_ganho_usuario1_idx` (`idAluno`),
  ADD KEY `fk_trofeu_ganho_atividade1_idx` (`idAtividade`);

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
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conjunto_atividade`
--
ALTER TABLE `conjunto_atividade`
  MODIFY `idConjuntoAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_conjunto_atividade_da_disciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_conjunto_atividade_professor` FOREIGN KEY (`idProfessor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_professor` FOREIGN KEY (`idProfessor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `participa_disciplina`
--
ALTER TABLE `participa_disciplina`
  ADD CONSTRAINT `fk_Usuario_participa` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_disciplina_participa` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `realiza_atividade`
--
ALTER TABLE `realiza_atividade`
  ADD CONSTRAINT `fk_aluno_realiza_atividade` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_realizada` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao_disciplina`
--
ALTER TABLE `solicitacao_disciplina`
  ADD CONSTRAINT `fk_disciplina_solicitada` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitao_disciplina` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `trofeu_ganho`
--
ALTER TABLE `trofeu_ganho`
  ADD CONSTRAINT `fk_trofeu_ganho_atividade1` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trofeu_ganho_usuario1` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
