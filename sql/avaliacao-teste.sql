CREATE DATABASE  IF NOT EXISTS `avaliacao-teste` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `avaliacao-teste`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: avaliacao-teste
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE latin1_bin NOT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `cpf` varchar(14) COLLATE latin1_bin DEFAULT NULL,
  `rg` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(150) COLLATE latin1_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `profissao_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Barbara Milena Aline Gonçalves','2000-10-05','Feminino','222.222.222-22','11.111.111','test@example.com','(11) 1111-1111','(11) 11111-1111',2),(2,'Sophia Aurora da Rosa Souza','2005-10-05','Feminino','555.555.555-55','55.555.555','sophia@example.com','(12) 3456-7898','(98) 76543-2123',11),(3,'Guilherme Henrique Santos da Silva','1993-05-12','Masculino','123.456.789-21','12.345.678','guilherme@example.com','(31) 0000-0000','(31) 99090-0000',8),(4,'Rebeca Farias Rosa Pinto Souza','1990-08-10','Feminino','777.777.777-77','77.777.777','rebeca@example.com.br','(00) 0000-0000','(00) 00000-0000',10);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissoes`
--

DROP TABLE IF EXISTS `profissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissoes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissoes`
--

LOCK TABLES `profissoes` WRITE;
/*!40000 ALTER TABLE `profissoes` DISABLE KEYS */;
INSERT INTO `profissoes` VALUES (1,'Programador'),(2,'DevOps'),(3,'Engenheiro de Software'),(4,'Desenvolvedor(a) front-end'),(5,'Desenvolvedor(a) back-end'),(6,'Engenheiro(a) de dados'),(7,'Professor(a)'),(8,'Estudante'),(9,'Médico'),(10,'Auxiliar Administrativo'),(11,'MEI (Micro empreendedor Individual)'),(14,'');
/*!40000 ALTER TABLE `profissoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-13 12:53:19
