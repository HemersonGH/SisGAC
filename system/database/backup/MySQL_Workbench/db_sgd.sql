-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `cpf` VARCHAR(20) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `senha` VARCHAR(150) NOT NULL,
  `tipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disciplina` (
  `idDisciplina` INT NOT NULL,
  `idProfessor` INT NOT NULL,
  `nome_disciplina` VARCHAR(80) NOT NULL,
  `codigo_disciplina` VARCHAR(20) NOT NULL,
  `descricao_disciplina` VARCHAR(200) NOT NULL,
  `status_disciplina` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDisciplina`),
  INDEX `fk_disciplina_Usuario_idx` (`idProfessor` ASC),
  CONSTRAINT `fk_disciplina_Usuario`
    FOREIGN KEY (`idProfessor`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `participa_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `participa_disciplina` (
  `idAluno` INT NOT NULL,
  `idDisciplina` INT NOT NULL,
  `status_participacao` INT NOT NULL,
  `idProfessor` INT NOT NULL,
  PRIMARY KEY (`idAluno`, `idDisciplina`),
  INDEX `fk_Usuario_has_disciplina_disciplina1_idx` (`idDisciplina` ASC),
  INDEX `fk_Usuario_has_disciplina_Usuario1_idx` (`idAluno` ASC),
  CONSTRAINT `fk_Usuario_has_disciplina_Usuario1`
    FOREIGN KEY (`idAluno`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_Usuario_has_disciplina_disciplina1`
    FOREIGN KEY (`idDisciplina`)
    REFERENCES `disciplina` (`idDisciplina`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conjunto_atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conjunto_atividade` (
  `idConjuntoAtividade` INT NOT NULL,
  `nome_conjunto` VARCHAR(45) NOT NULL,
  `idProfessor` INT NOT NULL,
  `idDisciplina` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idConjuntoAtividade`),
  INDEX `fk_conjunto_atividade_Usuario1_idx` (`idProfessor` ASC),
  INDEX `fk_conjunto_atividade_disciplina1_idx` (`idDisciplina` ASC),
  CONSTRAINT `fk_conjunto_atividade_Usuario1`
    FOREIGN KEY (`idProfessor`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conjunto_atividade_disciplina1`
    FOREIGN KEY (`idDisciplina`)
    REFERENCES `disciplina` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `atividade` (
  `idAtividade` INT NOT NULL,
  `nome_atividade` VARCHAR(100) NOT NULL,
  `descricao_atividade` VARCHAR(200) NOT NULL,
  `prazo_entrega` DATE NOT NULL,
  `idConjuntoAtividade` INT NOT NULL,
  PRIMARY KEY (`idAtividade`),
  INDEX `fk_atividade_conjunto_atividade1_idx` (`idConjuntoAtividade` ASC),
  CONSTRAINT `fk_atividade_conjunto_atividade1`
    FOREIGN KEY (`idConjuntoAtividade`)
    REFERENCES `conjunto_atividade` (`idConjuntoAtividade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `realiza_atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `realiza_atividade` (
  `idAluno` INT NOT NULL,
  `idAtividade` INT NOT NULL,
  `idDisciplina` VARCHAR(45) NULL,
  `idProfessor` VARCHAR(45) NULL,
  PRIMARY KEY (`idAluno`, `idAtividade`),
  INDEX `fk_Usuario_has_atividade_atividade1_idx` (`idAtividade` ASC),
  INDEX `fk_Usuario_has_atividade_Usuario1_idx` (`idAluno` ASC),
  CONSTRAINT `fk_Usuario_has_atividade_Usuario1`
    FOREIGN KEY (`idAluno`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_atividade_atividade1`
    FOREIGN KEY (`idAtividade`)
    REFERENCES `atividade` (`idAtividade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solicitacao_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `solicitacao_disciplina` (
  `idAluno` INT NOT NULL,
  `idDisciplina` INT NOT NULL,
  `idProfessor` INT NOT NULL,
  `status_solicitacao` INT NOT NULL,
  `justificativa_aluno` VARCHAR(250) NOT NULL,
  `justificativa_professor` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idAluno`, `idDisciplina`),
  INDEX `fk_Usuario_has_disciplina_disciplina2_idx` (`idDisciplina` ASC),
  INDEX `fk_Usuario_has_disciplina_Usuario2_idx` (`idAluno` ASC),
  CONSTRAINT `fk_Usuario_has_disciplina_Usuario2`
    FOREIGN KEY (`idAluno`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_disciplina_disciplina2`
    FOREIGN KEY (`idDisciplina`)
    REFERENCES `disciplina` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
