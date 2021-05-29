-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: zona27
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artista`
--

DROP TABLE IF EXISTS `artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(2048) NOT NULL,
  `img` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artista`
--

LOCK TABLES `artista` WRITE;
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_piercings`
--

DROP TABLE IF EXISTS `categoria_piercings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_piercings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_piercings`
--

LOCK TABLES `categoria_piercings` WRITE;
/*!40000 ALTER TABLE `categoria_piercings` DISABLE KEYS */;
INSERT INTO `categoria_piercings` VALUES (1,'Piercings de oreja'),(2,'oreja');
/*!40000 ALTER TABLE `categoria_piercings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_redes`
--

DROP TABLE IF EXISTS `categoria_redes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_redes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `img` mediumblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_redes`
--

LOCK TABLES `categoria_redes` WRITE;
/*!40000 ALTER TABLE `categoria_redes` DISABLE KEYS */;
INSERT INTO `categoria_redes` VALUES (1,'Instagram',NULL);
/*!40000 ALTER TABLE `categoria_redes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_tattoos`
--

DROP TABLE IF EXISTS `categoria_tattoos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_tattoos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_tattoos`
--

LOCK TABLES `categoria_tattoos` WRITE;
/*!40000 ALTER TABLE `categoria_tattoos` DISABLE KEYS */;
INSERT INTO `categoria_tattoos` VALUES (1,'Realismo');
/*!40000 ALTER TABLE `categoria_tattoos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piercings`
--

DROP TABLE IF EXISTS `piercings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `piercings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(128) DEFAULT NULL,
  `titulo` varchar(128) NOT NULL,
  `etiqueta` varchar(128) DEFAULT NULL,
  `descripcion` varchar(2048) DEFAULT NULL,
  `activo` int DEFAULT '1',
  `id_categoria` int NOT NULL,
  `id_artista` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artista` (`id_artista`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `piercings_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`),
  CONSTRAINT `piercings_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_piercings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piercings`
--

LOCK TABLES `piercings` WRITE;
/*!40000 ALTER TABLE `piercings` DISABLE KEYS */;
/*!40000 ALTER TABLE `piercings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redes`
--

DROP TABLE IF EXISTS `redes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_red` int NOT NULL,
  `id_artista` int NOT NULL,
  `url_red` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artista` (`id_artista`),
  KEY `id_red` (`id_red`),
  CONSTRAINT `redes_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`),
  CONSTRAINT `redes_ibfk_2` FOREIGN KEY (`id_red`) REFERENCES `categoria_redes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redes`
--

LOCK TABLES `redes` WRITE;
/*!40000 ALTER TABLE `redes` DISABLE KEYS */;
/*!40000 ALTER TABLE `redes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tattoos`
--

DROP TABLE IF EXISTS `tattoos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tattoos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(128) DEFAULT NULL,
  `titulo` varchar(128) NOT NULL,
  `etiqueta` varchar(128) DEFAULT NULL,
  `activo` int DEFAULT '1',
  `id_categoria` int NOT NULL,
  `id_artista` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artista` (`id_artista`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tattoos_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`),
  CONSTRAINT `tattoos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_tattoos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tattoos`
--

LOCK TABLES `tattoos` WRITE;
/*!40000 ALTER TABLE `tattoos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tattoos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `passw` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin'),(5,'xavi','$2y$10$53h6HhZEKlcIBCY6N26U3OXPww.sdMWZFeXhfMUWtNC08CS7HrsjG');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-29 10:12:44
