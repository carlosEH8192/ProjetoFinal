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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `adm` */

insert  into `adm`(`codigo`,`username`,`senha`) values 
(1,'carloseh','cachacada'),
(2,'brunovgs','globalismo');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `aluno` */

insert  into `aluno`(`codigo`,`nomeCompleto`,`sexo`,`telefoneCelular`,`telefoneFixo`,`rg`,`cpf`,`email`,`senha`) values 
(1,'Bruno Vargas','M','51999999999','5130417425','2020202020','22222222222','bruno_coleira@oba.com.br','vidaDeColeira'),
(2,'Napolitano Silva','F','51998989898','Napolitano','3030303030','33333333333','napo_triplo@gmail.com','cabecaDeMorango'),
(3,'Carlos Hendges','M','51992030655','5130417425','4040404040','44444444444','carloseh.355@gmail.com','queMaravilha');

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cargaHoraria` int(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

insert  into `curso`(`codigo`,`nome`,`cargaHoraria`) values 
(1,'PSHOP',78),
(2,'CDRAW',56),
(3,'INF-BSC',56);

/*Table structure for table `nome_turma` */

DROP TABLE IF EXISTS `nome_turma`;

CREATE TABLE `nome_turma` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `nome_turma` */

insert  into `nome_turma`(`codigo`,`nome`) values 
(1,'1T1'),
(2,'1T2'),
(3,'1T3'),
(4,'1T4'),
(5,'1T5');

/*Table structure for table `professor` */

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `professor` */

insert  into `professor`(`codigo`,`nomeCompleto`,`sexo`,`rg`,`cpf`,`disciplina`) values 
(1,'Xuxa','M','0123456789','01234567890','Redes;Sistemas'),
(2,'Bile','M','0123456789','01234567890','PHP'),
(3,'Skinhead','M','0123456789','01234567890','.NET'),
(4,'Romeu','M','0123456789','01234567890','Design'),
(5,'Faustao','M','0123456789','0123456789','Sistemas;Redes');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `turma` */

insert  into `turma`(`codigo`,`codNomeTurma`,`codAluno`,`codProfessor`,`codCurso`) values 
(1,1,1,1,1),
(2,2,2,2,2),
(3,2,3,3,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
