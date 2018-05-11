/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 10.1.31-MariaDB : Database - alcidesmaya_tech
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alcidesmaya_tech` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alcidesmaya_tech`;

/*Table structure for table `adm` */

DROP TABLE IF EXISTS `adm`;

CREATE TABLE `adm` (
  `codigo` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `adm` */

insert  into `adm`(`codigo`,`username`,`senha`) values 
(1,'admDefault','adm');

/*Table structure for table `aluno` */

DROP TABLE IF EXISTS `aluno`;

CREATE TABLE `aluno` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefoneCelular` char(11) NOT NULL,
  `telefoneFixo` char(10) NOT NULL,
  `rg` char(10) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluno` */

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cargaHoraria` int(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

/*Table structure for table `nome_turma` */

DROP TABLE IF EXISTS `nome_turma`;

CREATE TABLE `nome_turma` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nome_turma` */

/*Table structure for table `nota` */

DROP TABLE IF EXISTS `nota`;

CREATE TABLE `nota` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `atividadeNome` varchar(30) NOT NULL,
  `nota` float NOT NULL,
  `codAluno` int(10) NOT NULL,
  `codNomeTurma` int(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `nCodAluno` (`codAluno`),
  KEY `nCodNomeTurma` (`codNomeTurma`),
  CONSTRAINT `nCodAluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nCodNomeTurma` FOREIGN KEY (`codNomeTurma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nota` */

/*Table structure for table `presenca` */

DROP TABLE IF EXISTS `presenca`;

CREATE TABLE `presenca` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `dia` char(10) NOT NULL,
  `codAluno` int(10) NOT NULL,
  `codNomeTurma` int(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `pCodAluno` (`codAluno`),
  KEY `pCodNomeTurma` (`codNomeTurma`),
  CONSTRAINT `pCodAluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pCodNomeTurma` FOREIGN KEY (`codNomeTurma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `presenca` */

/*Table structure for table `professor` */

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `professor` */

/*Table structure for table `turma` */

DROP TABLE IF EXISTS `turma`;

CREATE TABLE `turma` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `codNomeTurma` int(10) NOT NULL,
  `codAluno` int(10) NOT NULL,
  `codProfessor` int(10) NOT NULL,
  `codCurso` int(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codAluno` (`codAluno`),
  KEY `codCurso` (`codCurso`),
  KEY `codNomeTurma` (`codNomeTurma`),
  KEY `codProfessor` (`codProfessor`),
  CONSTRAINT `codAluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `codCurso` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `codNomeTurma` FOREIGN KEY (`codNomeTurma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `codProfessor` FOREIGN KEY (`codProfessor`) REFERENCES `professor` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `turma` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
