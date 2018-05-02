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

/*Table structure for table `aluno` */

DROP TABLE IF EXISTS `aluno`;

CREATE TABLE `aluno` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `telefoneCelular` char(11) NOT NULL,
  `telefoneFixo` char(10) NOT NULL,
  `rg` char(10) NOT NULL,
  `cpf` char(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `aluno` */

insert  into `aluno`(`codigo`,`nomeCompleto`,`sexo`,`email`,`senha`,`telefoneCelular`,`telefoneFixo`,`rg`,`cpf`) values 
(1,'Billy do Maxixe','M','bile@am.com.br','mestreGambiarreiro','51992030655','5130417425','1010101010','11111111111'),
(2,'Bruno Cuzao','M','brunovargas@webdesign.com.br','senhorGlobal','51999999999','5130417425','2020202020','22222222222'),
(3,'Napolitano Silva','F','napo_triplo@gmail.com','cabecaDeMorango','51998989898','5130417425','3030303030','33333333333');

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cargaHoraria` int(2) NOT NULL,
  `turma` int(10) NOT NULL COMMENT 'FK (codigo da turma)',
  PRIMARY KEY (`codigo`,`turma`),
  KEY `codTurma` (`turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

/*Table structure for table `nome_turma` */

DROP TABLE IF EXISTS `nome_turma`;

CREATE TABLE `nome_turma` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `nome_turma` */

insert  into `nome_turma`(`codigo`,`nome`) values 
(1,'TEC.INF-1T1'),
(2,'TEC.INF-2T1'),
(3,'TEC.INF-3T1'),
(4,'TEC.INF-4T1'),
(5,'TEC.INF-5T1');

/*Table structure for table `professor` */

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `professor` */

insert  into `professor`(`codigo`,`nome`,`sexo`,`rg`,`cpf`,`disciplina`) values 
(1,'Xuxa','M','0123456789','01234567890','Redes'),
(2,'Bile','M','0123456789','01234567890','PHP'),
(3,'Skinhead','M','0123456789','01234567890','.NET'),
(4,'Romeu','M','0123456789','01234567890','Design'),
(5,'Faustao','M','0123456789','0123456789','Sistemas;Redes');

/*Table structure for table `turma` */

DROP TABLE IF EXISTS `turma`;

CREATE TABLE `turma` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `codTurma` int(10) NOT NULL,
  `codAluno` int(10) NOT NULL,
  `codProfessor` int(10) NOT NULL,
  PRIMARY KEY (`codigo`,`codTurma`,`codAluno`,`codProfessor`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `codTurma` (`codTurma`),
  KEY `codAluno` (`codAluno`),
  KEY `codProfessor` (`codProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `turma` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;