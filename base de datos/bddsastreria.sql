-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bddsastreria
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `sexo` char(1) NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  `pago` smallint DEFAULT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Jhonathan','ramos jimenez','77448360','M',0,0,'2023-10-20 04:00:00',NULL),(2,'richad','ramos','65741137','M',0,500,'2023-10-20 04:00:00','2023-10-20 04:00:00'),(3,'David','ramoss','77448360','M',0,0,'2023-10-22 04:00:00',NULL),(4,'ippo','ramos jimenez','77448360','M',0,100,'2023-10-22 04:00:00',NULL),(5,'juan','ramos jimenez','75455464','M',0,0,'2023-10-22 04:00:00',NULL),(6,'david','ramos jimenez','77448360','M',0,0,'2023-10-22 04:00:00',NULL),(7,'david','ramos jimenez','77448360','M',0,0,'2023-10-22 04:00:00',NULL),(8,'juan','ramos','101010141','M',0,5000,'2023-10-23 04:00:00','2023-10-23 04:00:00'),(9,'DAVID','ramos jimenez','77448360','M',1,10,'2023-10-24 04:00:00',NULL),(10,'DAVID','ramos','77448360','M',1,10,'2023-10-24 04:00:00',NULL),(11,'DAVID','ramos jimenez','77448360','M',1,0,'2023-10-24 04:00:00',NULL),(12,'david','ramos','77448360','M',1,0,'2023-10-24 04:00:00',NULL),(13,'juan','ramos jimenez','77448360','M',0,0,'2023-10-24 04:00:00',NULL),(14,'adasdasda','adadasdas','77448360','M',1,0,'2023-10-24 04:00:00',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `falda`
--

DROP TABLE IF EXISTS `falda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `falda` (
  `largo` tinyint NOT NULL,
  `cintura` tinyint NOT NULL,
  `cadera` tinyint NOT NULL,
  `cliente_id` smallint NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `falda`
--

LOCK TABLES `falda` WRITE;
/*!40000 ALTER TABLE `falda` DISABLE KEYS */;
INSERT INTO `falda` VALUES (14,10,12,9),(10,127,14,10),(10,10,10,12),(14,10,10,14);
/*!40000 ALTER TABLE `falda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantalon`
--

DROP TABLE IF EXISTS `pantalon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pantalon` (
  `largo` tinyint NOT NULL,
  `entrepierna` tinyint NOT NULL,
  `cintura` tinyint NOT NULL,
  `cadera` tinyint NOT NULL,
  `pierna` tinyint NOT NULL,
  `rodilla` tinyint NOT NULL,
  `bota` tinyint NOT NULL,
  `cliente_id` smallint NOT NULL,
  PRIMARY KEY (`cliente_id`),
  CONSTRAINT `fk_pantalon_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantalon`
--

LOCK TABLES `pantalon` WRITE;
/*!40000 ALTER TABLE `pantalon` DISABLE KEYS */;
INSERT INTO `pantalon` VALUES (10,10,10,10,10,10,10,2),(10,10,10,10,10,10,10,5);
/*!40000 ALTER TABLE `pantalon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(70) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  `carrito` tinyint DEFAULT '0',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Saco Oscuro','tela: Oscuro  ,  Resitente: al agua , arrugas',700.00,'1697664202_3864bd4f5821dc3c9b05.png',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(2,'pantalo','color negro , facil de usar ',200.00,'1697664240_c9bcad156bf00adfd38c.jpeg',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(3,'dadada','dadadad',100.00,'1697664347_b7cb5b96f96753701ff2.png',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(4,'saco verde','Estilos CSS: Asegúrate de que las clases de CSS aplicadas a los cuadros de productos no generen diferencias de tamaño. Puedes utilizar propiedades como min-height y min-width para establecer un tamaño mínimo para los cuadros y evitar que sean más pequeños',100.00,'1697665174_beb8aee8ba673f21f823.png',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(5,'prueba','Tamaño de contenedor: Verifica que el tamaño del contenedor que contiene los cuadros de productos sea consistente en todas las filas',600.00,'1697665246_09a63391fcae3558b1bc.png',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(6,'Tamaño de contenedor','Verifica que el tamaño del contenedor que contiene los cuadros de productos sea consistente en todas las filas',455.00,'1697665285_5c526bc567193b5ec416.png',1,1,'2023-10-18 04:00:00','2023-10-18 04:00:00'),(7,'saco verde ','asfdsafasdf',100.00,'1697813651_6a012cb8aedd089e481a.png',1,1,'2023-10-20 04:00:00','2023-10-20 04:00:00'),(8,'tarata','unvia<je de 2 , akihgfujioahfi0psdajfksp',100.00,'1697819660_33ae8fbc55eb807b2796.jpg',1,1,'2023-10-20 04:00:00','2023-10-20 04:00:00'),(9,'Traje Negro','lana Merina',150.00,'1697859400_16023020ff720fbf6b15.jpeg',1,0,'2023-10-21 04:00:00','2023-10-21 04:00:00');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traje_femenino`
--

DROP TABLE IF EXISTS `traje_femenino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traje_femenino` (
  `talle` tinyint NOT NULL,
  `largo` tinyint NOT NULL,
  `hombro` tinyint NOT NULL,
  `ancho` tinyint NOT NULL,
  `pecho` tinyint NOT NULL,
  `cintura` tinyint NOT NULL,
  `cadera` tinyint NOT NULL,
  `largoManga` tinyint NOT NULL,
  `cliente_id` smallint NOT NULL,
  PRIMARY KEY (`cliente_id`),
  CONSTRAINT `fk_traje_femenino_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traje_femenino`
--

LOCK TABLES `traje_femenino` WRITE;
/*!40000 ALTER TABLE `traje_femenino` DISABLE KEYS */;
INSERT INTO `traje_femenino` VALUES (10,10,10,10,10,10,10,10,1),(10,10,10,10,10,10,10,10,2);
/*!40000 ALTER TABLE `traje_femenino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traje_masculino`
--

DROP TABLE IF EXISTS `traje_masculino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traje_masculino` (
  `talle` tinyint NOT NULL,
  `largo` tinyint NOT NULL,
  `hombro` tinyint NOT NULL,
  `ancho` tinyint NOT NULL,
  `pecho` tinyint NOT NULL,
  `estomago` tinyint NOT NULL,
  `largoManga` tinyint NOT NULL,
  `cliente_id` smallint NOT NULL,
  PRIMARY KEY (`cliente_id`),
  CONSTRAINT `fk_traje_masculino_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traje_masculino`
--

LOCK TABLES `traje_masculino` WRITE;
/*!40000 ALTER TABLE `traje_masculino` DISABLE KEYS */;
INSERT INTO `traje_masculino` VALUES (10,10,10,10,10,10,10,2);
/*!40000 ALTER TABLE `traje_masculino` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-24 18:22:34
