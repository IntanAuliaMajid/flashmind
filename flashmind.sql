-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: flashmind
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin_super','hash_admin_123'),(2,'budi_p','hash_budi_456'),(3,'siti_a','hash_siti_789'),(4,'guru_ipa','hash_ipa_000'),(5,'guru_inggris_1','hash_ing1_111'),(6,'guru_inggris_2','hash_ing2_222'),(7,'admin_server','hash_srv_333'),(8,'developer_app','hash_dev_444'),(9,'eko_r','hash_eko_555'),(10,'rita_z','hash_rita_666');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hasil_quiz`
--

DROP TABLE IF EXISTS `hasil_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hasil_quiz` (
  `id_hasil` int NOT NULL AUTO_INCREMENT,
  `siswa_id` int DEFAULT NULL,
  `quiz_id` int DEFAULT NULL,
  `skor_akhir` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_hasil`),
  UNIQUE KEY `siswa_id` (`siswa_id`,`quiz_id`),
  KEY `quiz_id` (`quiz_id`),
  CONSTRAINT `hasil_quiz_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`),
  CONSTRAINT `hasil_quiz_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id_quiz`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil_quiz`
--

LOCK TABLES `hasil_quiz` WRITE;
/*!40000 ALTER TABLE `hasil_quiz` DISABLE KEYS */;
INSERT INTO `hasil_quiz` VALUES (1,1,1,86.23),(2,2,1,96.03),(3,3,1,81.45),(4,4,1,99.17),(5,5,1,71.49),(6,6,1,79.96),(7,7,1,85.33),(8,8,1,86.77),(9,9,1,77.85),(10,10,1,68.94),(11,11,1,91.16),(12,12,1,68.97),(13,13,1,91.36),(14,14,1,69.90),(15,15,1,95.40),(16,16,1,87.31),(17,17,1,90.35),(18,18,1,89.82),(19,19,1,78.05),(20,20,1,60.78),(21,21,1,89.74),(22,22,1,86.37),(23,23,1,62.61),(24,24,1,73.96),(25,25,1,81.98),(26,26,1,88.02),(27,27,1,94.16),(28,28,1,66.73),(29,29,1,71.19),(30,30,1,95.75),(31,31,1,85.18),(32,32,1,78.63),(33,33,1,77.63),(34,34,1,92.26),(35,35,1,88.42),(36,36,1,65.29),(37,37,1,81.21),(38,38,1,70.16),(39,39,1,87.18),(40,40,1,85.44),(41,41,1,65.65),(42,42,1,91.92),(43,43,1,82.64),(44,44,1,77.46),(45,45,1,79.39),(46,46,1,64.57),(47,47,1,64.65),(48,48,1,69.56),(49,49,1,93.84),(50,50,1,80.52),(51,51,1,61.06),(52,52,1,83.77),(53,53,1,95.65),(54,54,1,86.96),(55,55,1,87.84),(56,56,1,78.32),(57,57,1,68.08),(58,58,1,85.44),(59,59,1,82.97),(60,60,1,98.51),(61,61,1,63.63),(62,62,1,82.65),(63,63,1,82.36),(64,64,1,63.86),(65,65,1,92.20),(66,66,1,89.43),(67,67,1,70.56),(68,68,1,64.49),(69,69,1,90.76),(70,70,1,80.34),(71,71,1,69.41),(72,72,1,86.04),(73,73,1,81.98),(74,74,1,91.76),(75,75,1,72.87),(76,76,1,69.07),(77,77,1,66.76),(78,78,1,66.55),(79,79,1,72.51),(80,80,1,62.86),(81,81,1,76.80),(82,82,1,95.42),(83,83,1,66.68),(84,84,1,67.16),(85,85,1,75.77),(86,86,1,77.36),(87,87,1,99.48),(88,88,1,85.32),(89,89,1,68.15),(90,90,1,64.80),(91,91,1,99.54),(92,92,1,83.29),(93,93,1,97.86),(94,94,1,99.42),(95,95,1,63.53),(96,96,1,79.39),(97,97,1,66.35),(98,98,1,73.60),(99,99,1,68.93),(100,100,1,63.86),(101,121,100,33.00);
/*!40000 ALTER TABLE `hasil_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jawaban`
--

DROP TABLE IF EXISTS `jawaban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jawaban` (
  `id_jawaban` int NOT NULL AUTO_INCREMENT,
  `teks_jawaban` text NOT NULL,
  `adalah_benar` tinyint(1) NOT NULL,
  `pertanyaan_id` int DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id_pertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=413 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jawaban`
--

LOCK TABLES `jawaban` WRITE;
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
INSERT INTO `jawaban` VALUES (1,'Pilihan A untuk Pertanyaan 1',1,1),(2,'Pilihan B untuk Pertanyaan 1',0,1),(3,'Pilihan C untuk Pertanyaan 1',0,1),(4,'Pilihan D untuk Pertanyaan 1',0,1),(5,'Pilihan A untuk Pertanyaan 2',1,2),(6,'Pilihan B untuk Pertanyaan 2',0,2),(7,'Pilihan C untuk Pertanyaan 2',0,2),(8,'Pilihan D untuk Pertanyaan 2',0,2),(9,'Pilihan A untuk Pertanyaan 3',1,3),(10,'Pilihan B untuk Pertanyaan 3',0,3),(11,'Pilihan C untuk Pertanyaan 3',0,3),(12,'Pilihan D untuk Pertanyaan 3',0,3),(13,'Pilihan A untuk Pertanyaan 4',1,4),(14,'Pilihan B untuk Pertanyaan 4',0,4),(15,'Pilihan C untuk Pertanyaan 4',0,4),(16,'Pilihan D untuk Pertanyaan 4',0,4),(17,'Pilihan A untuk Pertanyaan 5',1,5),(18,'Pilihan B untuk Pertanyaan 5',0,5),(19,'Pilihan C untuk Pertanyaan 5',0,5),(20,'Pilihan D untuk Pertanyaan 5',0,5),(21,'Pilihan A untuk Pertanyaan 6',1,6),(22,'Pilihan B untuk Pertanyaan 6',0,6),(23,'Pilihan C untuk Pertanyaan 6',0,6),(24,'Pilihan D untuk Pertanyaan 6',0,6),(25,'Pilihan A untuk Pertanyaan 7',1,7),(26,'Pilihan B untuk Pertanyaan 7',0,7),(27,'Pilihan C untuk Pertanyaan 7',0,7),(28,'Pilihan D untuk Pertanyaan 7',0,7),(29,'Pilihan A untuk Pertanyaan 8',1,8),(30,'Pilihan B untuk Pertanyaan 8',0,8),(31,'Pilihan C untuk Pertanyaan 8',0,8),(32,'Pilihan D untuk Pertanyaan 8',0,8),(33,'Pilihan A untuk Pertanyaan 9',1,9),(34,'Pilihan B untuk Pertanyaan 9',0,9),(35,'Pilihan C untuk Pertanyaan 9',0,9),(36,'Pilihan D untuk Pertanyaan 9',0,9),(37,'Pilihan A untuk Pertanyaan 10',1,10),(38,'Pilihan B untuk Pertanyaan 10',0,10),(39,'Pilihan C untuk Pertanyaan 10',0,10),(40,'Pilihan D untuk Pertanyaan 10',0,10),(41,'Pilihan A untuk Pertanyaan 11',1,11),(42,'Pilihan B untuk Pertanyaan 11',0,11),(43,'Pilihan C untuk Pertanyaan 11',0,11),(44,'Pilihan D untuk Pertanyaan 11',0,11),(45,'Pilihan A untuk Pertanyaan 12',1,12),(46,'Pilihan B untuk Pertanyaan 12',0,12),(47,'Pilihan C untuk Pertanyaan 12',0,12),(48,'Pilihan D untuk Pertanyaan 12',0,12),(49,'Pilihan A untuk Pertanyaan 13',1,13),(50,'Pilihan B untuk Pertanyaan 13',0,13),(51,'Pilihan C untuk Pertanyaan 13',0,13),(52,'Pilihan D untuk Pertanyaan 13',0,13),(53,'Pilihan A untuk Pertanyaan 14',1,14),(54,'Pilihan B untuk Pertanyaan 14',0,14),(55,'Pilihan C untuk Pertanyaan 14',0,14),(56,'Pilihan D untuk Pertanyaan 14',0,14),(57,'Pilihan A untuk Pertanyaan 15',1,15),(58,'Pilihan B untuk Pertanyaan 15',0,15),(59,'Pilihan C untuk Pertanyaan 15',0,15),(60,'Pilihan D untuk Pertanyaan 15',0,15),(61,'Pilihan A untuk Pertanyaan 16',1,16),(62,'Pilihan B untuk Pertanyaan 16',0,16),(63,'Pilihan C untuk Pertanyaan 16',0,16),(64,'Pilihan D untuk Pertanyaan 16',0,16),(65,'Pilihan A untuk Pertanyaan 17',1,17),(66,'Pilihan B untuk Pertanyaan 17',0,17),(67,'Pilihan C untuk Pertanyaan 17',0,17),(68,'Pilihan D untuk Pertanyaan 17',0,17),(69,'Pilihan A untuk Pertanyaan 18',1,18),(70,'Pilihan B untuk Pertanyaan 18',0,18),(71,'Pilihan C untuk Pertanyaan 18',0,18),(72,'Pilihan D untuk Pertanyaan 18',0,18),(73,'Pilihan A untuk Pertanyaan 19',1,19),(74,'Pilihan B untuk Pertanyaan 19',0,19),(75,'Pilihan C untuk Pertanyaan 19',0,19),(76,'Pilihan D untuk Pertanyaan 19',0,19),(77,'Pilihan A untuk Pertanyaan 20',1,20),(78,'Pilihan B untuk Pertanyaan 20',0,20),(79,'Pilihan C untuk Pertanyaan 20',0,20),(80,'Pilihan D untuk Pertanyaan 20',0,20),(81,'Pilihan A untuk Pertanyaan 21',1,21),(82,'Pilihan B untuk Pertanyaan 21',0,21),(83,'Pilihan C untuk Pertanyaan 21',0,21),(84,'Pilihan D untuk Pertanyaan 21',0,21),(85,'Pilihan A untuk Pertanyaan 22',1,22),(86,'Pilihan B untuk Pertanyaan 22',0,22),(87,'Pilihan C untuk Pertanyaan 22',0,22),(88,'Pilihan D untuk Pertanyaan 22',0,22),(89,'Pilihan A untuk Pertanyaan 23',1,23),(90,'Pilihan B untuk Pertanyaan 23',0,23),(91,'Pilihan C untuk Pertanyaan 23',0,23),(92,'Pilihan D untuk Pertanyaan 23',0,23),(93,'Pilihan A untuk Pertanyaan 24',1,24),(94,'Pilihan B untuk Pertanyaan 24',0,24),(95,'Pilihan C untuk Pertanyaan 24',0,24),(96,'Pilihan D untuk Pertanyaan 24',0,24),(97,'Pilihan A untuk Pertanyaan 25',1,25),(98,'Pilihan B untuk Pertanyaan 25',0,25),(99,'Pilihan C untuk Pertanyaan 25',0,25),(100,'Pilihan D untuk Pertanyaan 25',0,25),(101,'Pilihan A untuk Pertanyaan 26',1,26),(102,'Pilihan B untuk Pertanyaan 26',0,26),(103,'Pilihan C untuk Pertanyaan 26',0,26),(104,'Pilihan D untuk Pertanyaan 26',0,26),(105,'Pilihan A untuk Pertanyaan 27',1,27),(106,'Pilihan B untuk Pertanyaan 27',0,27),(107,'Pilihan C untuk Pertanyaan 27',0,27),(108,'Pilihan D untuk Pertanyaan 27',0,27),(109,'Pilihan A untuk Pertanyaan 28',1,28),(110,'Pilihan B untuk Pertanyaan 28',0,28),(111,'Pilihan C untuk Pertanyaan 28',0,28),(112,'Pilihan D untuk Pertanyaan 28',0,28),(113,'Pilihan A untuk Pertanyaan 29',1,29),(114,'Pilihan B untuk Pertanyaan 29',0,29),(115,'Pilihan C untuk Pertanyaan 29',0,29),(116,'Pilihan D untuk Pertanyaan 29',0,29),(117,'Pilihan A untuk Pertanyaan 30',1,30),(118,'Pilihan B untuk Pertanyaan 30',0,30),(119,'Pilihan C untuk Pertanyaan 30',0,30),(120,'Pilihan D untuk Pertanyaan 30',0,30),(121,'Pilihan A untuk Pertanyaan 31',1,31),(122,'Pilihan B untuk Pertanyaan 31',0,31),(123,'Pilihan C untuk Pertanyaan 31',0,31),(124,'Pilihan D untuk Pertanyaan 31',0,31),(125,'Pilihan A untuk Pertanyaan 32',1,32),(126,'Pilihan B untuk Pertanyaan 32',0,32),(127,'Pilihan C untuk Pertanyaan 32',0,32),(128,'Pilihan D untuk Pertanyaan 32',0,32),(129,'Pilihan A untuk Pertanyaan 33',1,33),(130,'Pilihan B untuk Pertanyaan 33',0,33),(131,'Pilihan C untuk Pertanyaan 33',0,33),(132,'Pilihan D untuk Pertanyaan 33',0,33),(133,'Pilihan A untuk Pertanyaan 34',1,34),(134,'Pilihan B untuk Pertanyaan 34',0,34),(135,'Pilihan C untuk Pertanyaan 34',0,34),(136,'Pilihan D untuk Pertanyaan 34',0,34),(137,'Pilihan A untuk Pertanyaan 35',1,35),(138,'Pilihan B untuk Pertanyaan 35',0,35),(139,'Pilihan C untuk Pertanyaan 35',0,35),(140,'Pilihan D untuk Pertanyaan 35',0,35),(141,'Pilihan A untuk Pertanyaan 36',1,36),(142,'Pilihan B untuk Pertanyaan 36',0,36),(143,'Pilihan C untuk Pertanyaan 36',0,36),(144,'Pilihan D untuk Pertanyaan 36',0,36),(145,'Pilihan A untuk Pertanyaan 37',1,37),(146,'Pilihan B untuk Pertanyaan 37',0,37),(147,'Pilihan C untuk Pertanyaan 37',0,37),(148,'Pilihan D untuk Pertanyaan 37',0,37),(149,'Pilihan A untuk Pertanyaan 38',1,38),(150,'Pilihan B untuk Pertanyaan 38',0,38),(151,'Pilihan C untuk Pertanyaan 38',0,38),(152,'Pilihan D untuk Pertanyaan 38',0,38),(153,'Pilihan A untuk Pertanyaan 39',1,39),(154,'Pilihan B untuk Pertanyaan 39',0,39),(155,'Pilihan C untuk Pertanyaan 39',0,39),(156,'Pilihan D untuk Pertanyaan 39',0,39),(157,'Pilihan A untuk Pertanyaan 40',1,40),(158,'Pilihan B untuk Pertanyaan 40',0,40),(159,'Pilihan C untuk Pertanyaan 40',0,40),(160,'Pilihan D untuk Pertanyaan 40',0,40),(161,'Pilihan A untuk Pertanyaan 41',1,41),(162,'Pilihan B untuk Pertanyaan 41',0,41),(163,'Pilihan C untuk Pertanyaan 41',0,41),(164,'Pilihan D untuk Pertanyaan 41',0,41),(165,'Pilihan A untuk Pertanyaan 42',1,42),(166,'Pilihan B untuk Pertanyaan 42',0,42),(167,'Pilihan C untuk Pertanyaan 42',0,42),(168,'Pilihan D untuk Pertanyaan 42',0,42),(169,'Pilihan A untuk Pertanyaan 43',1,43),(170,'Pilihan B untuk Pertanyaan 43',0,43),(171,'Pilihan C untuk Pertanyaan 43',0,43),(172,'Pilihan D untuk Pertanyaan 43',0,43),(173,'Pilihan A untuk Pertanyaan 44',1,44),(174,'Pilihan B untuk Pertanyaan 44',0,44),(175,'Pilihan C untuk Pertanyaan 44',0,44),(176,'Pilihan D untuk Pertanyaan 44',0,44),(177,'Pilihan A untuk Pertanyaan 45',1,45),(178,'Pilihan B untuk Pertanyaan 45',0,45),(179,'Pilihan C untuk Pertanyaan 45',0,45),(180,'Pilihan D untuk Pertanyaan 45',0,45),(181,'Pilihan A untuk Pertanyaan 46',1,46),(182,'Pilihan B untuk Pertanyaan 46',0,46),(183,'Pilihan C untuk Pertanyaan 46',0,46),(184,'Pilihan D untuk Pertanyaan 46',0,46),(185,'Pilihan A untuk Pertanyaan 47',1,47),(186,'Pilihan B untuk Pertanyaan 47',0,47),(187,'Pilihan C untuk Pertanyaan 47',0,47),(188,'Pilihan D untuk Pertanyaan 47',0,47),(189,'Pilihan A untuk Pertanyaan 48',1,48),(190,'Pilihan B untuk Pertanyaan 48',0,48),(191,'Pilihan C untuk Pertanyaan 48',0,48),(192,'Pilihan D untuk Pertanyaan 48',0,48),(193,'Pilihan A untuk Pertanyaan 49',1,49),(194,'Pilihan B untuk Pertanyaan 49',0,49),(195,'Pilihan C untuk Pertanyaan 49',0,49),(196,'Pilihan D untuk Pertanyaan 49',0,49),(197,'Pilihan A untuk Pertanyaan 50',1,50),(198,'Pilihan B untuk Pertanyaan 50',0,50),(199,'Pilihan C untuk Pertanyaan 50',0,50),(200,'Pilihan D untuk Pertanyaan 50',0,50),(201,'Pilihan A untuk Pertanyaan 51',1,51),(202,'Pilihan B untuk Pertanyaan 51',0,51),(203,'Pilihan C untuk Pertanyaan 51',0,51),(204,'Pilihan D untuk Pertanyaan 51',0,51),(205,'Pilihan A untuk Pertanyaan 52',1,52),(206,'Pilihan B untuk Pertanyaan 52',0,52),(207,'Pilihan C untuk Pertanyaan 52',0,52),(208,'Pilihan D untuk Pertanyaan 52',0,52),(209,'Pilihan A untuk Pertanyaan 53',1,53),(210,'Pilihan B untuk Pertanyaan 53',0,53),(211,'Pilihan C untuk Pertanyaan 53',0,53),(212,'Pilihan D untuk Pertanyaan 53',0,53),(213,'Pilihan A untuk Pertanyaan 54',1,54),(214,'Pilihan B untuk Pertanyaan 54',0,54),(215,'Pilihan C untuk Pertanyaan 54',0,54),(216,'Pilihan D untuk Pertanyaan 54',0,54),(217,'Pilihan A untuk Pertanyaan 55',1,55),(218,'Pilihan B untuk Pertanyaan 55',0,55),(219,'Pilihan C untuk Pertanyaan 55',0,55),(220,'Pilihan D untuk Pertanyaan 55',0,55),(221,'Pilihan A untuk Pertanyaan 56',1,56),(222,'Pilihan B untuk Pertanyaan 56',0,56),(223,'Pilihan C untuk Pertanyaan 56',0,56),(224,'Pilihan D untuk Pertanyaan 56',0,56),(225,'Pilihan A untuk Pertanyaan 57',1,57),(226,'Pilihan B untuk Pertanyaan 57',0,57),(227,'Pilihan C untuk Pertanyaan 57',0,57),(228,'Pilihan D untuk Pertanyaan 57',0,57),(229,'Pilihan A untuk Pertanyaan 58',1,58),(230,'Pilihan B untuk Pertanyaan 58',0,58),(231,'Pilihan C untuk Pertanyaan 58',0,58),(232,'Pilihan D untuk Pertanyaan 58',0,58),(233,'Pilihan A untuk Pertanyaan 59',1,59),(234,'Pilihan B untuk Pertanyaan 59',0,59),(235,'Pilihan C untuk Pertanyaan 59',0,59),(236,'Pilihan D untuk Pertanyaan 59',0,59),(237,'Pilihan A untuk Pertanyaan 60',1,60),(238,'Pilihan B untuk Pertanyaan 60',0,60),(239,'Pilihan C untuk Pertanyaan 60',0,60),(240,'Pilihan D untuk Pertanyaan 60',0,60),(241,'Pilihan A untuk Pertanyaan 61',1,61),(242,'Pilihan B untuk Pertanyaan 61',0,61),(243,'Pilihan C untuk Pertanyaan 61',0,61),(244,'Pilihan D untuk Pertanyaan 61',0,61),(245,'Pilihan A untuk Pertanyaan 62',1,62),(246,'Pilihan B untuk Pertanyaan 62',0,62),(247,'Pilihan C untuk Pertanyaan 62',0,62),(248,'Pilihan D untuk Pertanyaan 62',0,62),(249,'Pilihan A untuk Pertanyaan 63',1,63),(250,'Pilihan B untuk Pertanyaan 63',0,63),(251,'Pilihan C untuk Pertanyaan 63',0,63),(252,'Pilihan D untuk Pertanyaan 63',0,63),(253,'Pilihan A untuk Pertanyaan 64',1,64),(254,'Pilihan B untuk Pertanyaan 64',0,64),(255,'Pilihan C untuk Pertanyaan 64',0,64),(256,'Pilihan D untuk Pertanyaan 64',0,64),(257,'Pilihan A untuk Pertanyaan 65',1,65),(258,'Pilihan B untuk Pertanyaan 65',0,65),(259,'Pilihan C untuk Pertanyaan 65',0,65),(260,'Pilihan D untuk Pertanyaan 65',0,65),(261,'Pilihan A untuk Pertanyaan 66',1,66),(262,'Pilihan B untuk Pertanyaan 66',0,66),(263,'Pilihan C untuk Pertanyaan 66',0,66),(264,'Pilihan D untuk Pertanyaan 66',0,66),(265,'Pilihan A untuk Pertanyaan 67',1,67),(266,'Pilihan B untuk Pertanyaan 67',0,67),(267,'Pilihan C untuk Pertanyaan 67',0,67),(268,'Pilihan D untuk Pertanyaan 67',0,67),(269,'Pilihan A untuk Pertanyaan 68',1,68),(270,'Pilihan B untuk Pertanyaan 68',0,68),(271,'Pilihan C untuk Pertanyaan 68',0,68),(272,'Pilihan D untuk Pertanyaan 68',0,68),(273,'Pilihan A untuk Pertanyaan 69',1,69),(274,'Pilihan B untuk Pertanyaan 69',0,69),(275,'Pilihan C untuk Pertanyaan 69',0,69),(276,'Pilihan D untuk Pertanyaan 69',0,69),(277,'Pilihan A untuk Pertanyaan 70',1,70),(278,'Pilihan B untuk Pertanyaan 70',0,70),(279,'Pilihan C untuk Pertanyaan 70',0,70),(280,'Pilihan D untuk Pertanyaan 70',0,70),(281,'Pilihan A untuk Pertanyaan 71',1,71),(282,'Pilihan B untuk Pertanyaan 71',0,71),(283,'Pilihan C untuk Pertanyaan 71',0,71),(284,'Pilihan D untuk Pertanyaan 71',0,71),(285,'Pilihan A untuk Pertanyaan 72',1,72),(286,'Pilihan B untuk Pertanyaan 72',0,72),(287,'Pilihan C untuk Pertanyaan 72',0,72),(288,'Pilihan D untuk Pertanyaan 72',0,72),(289,'Pilihan A untuk Pertanyaan 73',1,73),(290,'Pilihan B untuk Pertanyaan 73',0,73),(291,'Pilihan C untuk Pertanyaan 73',0,73),(292,'Pilihan D untuk Pertanyaan 73',0,73),(293,'Pilihan A untuk Pertanyaan 74',1,74),(294,'Pilihan B untuk Pertanyaan 74',0,74),(295,'Pilihan C untuk Pertanyaan 74',0,74),(296,'Pilihan D untuk Pertanyaan 74',0,74),(297,'Pilihan A untuk Pertanyaan 75',1,75),(298,'Pilihan B untuk Pertanyaan 75',0,75),(299,'Pilihan C untuk Pertanyaan 75',0,75),(300,'Pilihan D untuk Pertanyaan 75',0,75),(301,'Pilihan A untuk Pertanyaan 76',1,76),(302,'Pilihan B untuk Pertanyaan 76',0,76),(303,'Pilihan C untuk Pertanyaan 76',0,76),(304,'Pilihan D untuk Pertanyaan 76',0,76),(305,'Pilihan A untuk Pertanyaan 77',1,77),(306,'Pilihan B untuk Pertanyaan 77',0,77),(307,'Pilihan C untuk Pertanyaan 77',0,77),(308,'Pilihan D untuk Pertanyaan 77',0,77),(309,'Pilihan A untuk Pertanyaan 78',1,78),(310,'Pilihan B untuk Pertanyaan 78',0,78),(311,'Pilihan C untuk Pertanyaan 78',0,78),(312,'Pilihan D untuk Pertanyaan 78',0,78),(313,'Pilihan A untuk Pertanyaan 79',1,79),(314,'Pilihan B untuk Pertanyaan 79',0,79),(315,'Pilihan C untuk Pertanyaan 79',0,79),(316,'Pilihan D untuk Pertanyaan 79',0,79),(317,'Pilihan A untuk Pertanyaan 80',1,80),(318,'Pilihan B untuk Pertanyaan 80',0,80),(319,'Pilihan C untuk Pertanyaan 80',0,80),(320,'Pilihan D untuk Pertanyaan 80',0,80),(321,'Pilihan A untuk Pertanyaan 81',1,81),(322,'Pilihan B untuk Pertanyaan 81',0,81),(323,'Pilihan C untuk Pertanyaan 81',0,81),(324,'Pilihan D untuk Pertanyaan 81',0,81),(325,'Pilihan A untuk Pertanyaan 82',1,82),(326,'Pilihan B untuk Pertanyaan 82',0,82),(327,'Pilihan C untuk Pertanyaan 82',0,82),(328,'Pilihan D untuk Pertanyaan 82',0,82),(329,'Pilihan A untuk Pertanyaan 83',1,83),(330,'Pilihan B untuk Pertanyaan 83',0,83),(331,'Pilihan C untuk Pertanyaan 83',0,83),(332,'Pilihan D untuk Pertanyaan 83',0,83),(333,'Pilihan A untuk Pertanyaan 84',1,84),(334,'Pilihan B untuk Pertanyaan 84',0,84),(335,'Pilihan C untuk Pertanyaan 84',0,84),(336,'Pilihan D untuk Pertanyaan 84',0,84),(337,'Pilihan A untuk Pertanyaan 85',1,85),(338,'Pilihan B untuk Pertanyaan 85',0,85),(339,'Pilihan C untuk Pertanyaan 85',0,85),(340,'Pilihan D untuk Pertanyaan 85',0,85),(341,'Pilihan A untuk Pertanyaan 86',1,86),(342,'Pilihan B untuk Pertanyaan 86',0,86),(343,'Pilihan C untuk Pertanyaan 86',0,86),(344,'Pilihan D untuk Pertanyaan 86',0,86),(345,'Pilihan A untuk Pertanyaan 87',1,87),(346,'Pilihan B untuk Pertanyaan 87',0,87),(347,'Pilihan C untuk Pertanyaan 87',0,87),(348,'Pilihan D untuk Pertanyaan 87',0,87),(349,'Pilihan A untuk Pertanyaan 88',1,88),(350,'Pilihan B untuk Pertanyaan 88',0,88),(351,'Pilihan C untuk Pertanyaan 88',0,88),(352,'Pilihan D untuk Pertanyaan 88',0,88),(353,'Pilihan A untuk Pertanyaan 89',1,89),(354,'Pilihan B untuk Pertanyaan 89',0,89),(355,'Pilihan C untuk Pertanyaan 89',0,89),(356,'Pilihan D untuk Pertanyaan 89',0,89),(357,'Pilihan A untuk Pertanyaan 90',1,90),(358,'Pilihan B untuk Pertanyaan 90',0,90),(359,'Pilihan C untuk Pertanyaan 90',0,90),(360,'Pilihan D untuk Pertanyaan 90',0,90),(361,'Pilihan A untuk Pertanyaan 91',1,91),(362,'Pilihan B untuk Pertanyaan 91',0,91),(363,'Pilihan C untuk Pertanyaan 91',0,91),(364,'Pilihan D untuk Pertanyaan 91',0,91),(365,'Pilihan A untuk Pertanyaan 92',1,92),(366,'Pilihan B untuk Pertanyaan 92',0,92),(367,'Pilihan C untuk Pertanyaan 92',0,92),(368,'Pilihan D untuk Pertanyaan 92',0,92),(369,'Pilihan A untuk Pertanyaan 93',1,93),(370,'Pilihan B untuk Pertanyaan 93',0,93),(371,'Pilihan C untuk Pertanyaan 93',0,93),(372,'Pilihan D untuk Pertanyaan 93',0,93),(373,'Pilihan A untuk Pertanyaan 94',1,94),(374,'Pilihan B untuk Pertanyaan 94',0,94),(375,'Pilihan C untuk Pertanyaan 94',0,94),(376,'Pilihan D untuk Pertanyaan 94',0,94),(377,'Pilihan A untuk Pertanyaan 95',1,95),(378,'Pilihan B untuk Pertanyaan 95',0,95),(379,'Pilihan C untuk Pertanyaan 95',0,95),(380,'Pilihan D untuk Pertanyaan 95',0,95),(381,'Pilihan A untuk Pertanyaan 96',1,96),(382,'Pilihan B untuk Pertanyaan 96',0,96),(383,'Pilihan C untuk Pertanyaan 96',0,96),(384,'Pilihan D untuk Pertanyaan 96',0,96),(385,'Pilihan A untuk Pertanyaan 97',1,97),(386,'Pilihan B untuk Pertanyaan 97',0,97),(387,'Pilihan C untuk Pertanyaan 97',0,97),(388,'Pilihan D untuk Pertanyaan 97',0,97),(389,'Pilihan A untuk Pertanyaan 98',1,98),(390,'Pilihan B untuk Pertanyaan 98',0,98),(391,'Pilihan C untuk Pertanyaan 98',0,98),(392,'Pilihan D untuk Pertanyaan 98',0,98),(393,'Pilihan A untuk Pertanyaan 99',1,99),(394,'Pilihan B untuk Pertanyaan 99',0,99),(395,'Pilihan C untuk Pertanyaan 99',0,99),(396,'Pilihan D untuk Pertanyaan 99',0,99),(397,'Pilihan A untuk Pertanyaan 100',1,100),(398,'Pilihan B untuk Pertanyaan 100',0,100),(399,'Pilihan C untuk Pertanyaan 100',0,100),(400,'Pilihan D untuk Pertanyaan 100',0,100),(401,'HyperText Markup Language',1,201),(402,'Home Tool Markup Language',0,201),(403,'Hyperlinks and Text Markup Language',0,201),(404,'HighText Machine Language',0,201),(405,'//',1,202),(406,'<!-- -->',0,202),(407,'#',0,202),(408,'/* */',0,202),(409,'JavaScript',1,203),(410,'Python',0,203),(411,'C++',0,203),(412,'Java',0,203);
/*!40000 ALTER TABLE `jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jawaban_siswa`
--

DROP TABLE IF EXISTS `jawaban_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jawaban_siswa` (
  `id_jawaban_siswa` int NOT NULL AUTO_INCREMENT,
  `siswa_id` int DEFAULT NULL,
  `pertanyaan_id` int DEFAULT NULL,
  `jawaban_dipilih` text,
  `salah_benar` tinyint(1) DEFAULT NULL,
  `waktu_menjawab` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jawaban_siswa`),
  KEY `siswa_id` (`siswa_id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  CONSTRAINT `jawaban_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`),
  CONSTRAINT `jawaban_siswa_ibfk_2` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id_pertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jawaban_siswa`
--

LOCK TABLES `jawaban_siswa` WRITE;
/*!40000 ALTER TABLE `jawaban_siswa` DISABLE KEYS */;
INSERT INTO `jawaban_siswa` VALUES (1,1,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:01:00'),(2,2,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:02:00'),(3,3,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:03:00'),(4,4,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:04:00'),(5,5,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:05:00'),(6,6,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:06:00'),(7,7,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:07:00'),(8,8,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:08:00'),(9,9,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:09:00'),(10,10,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:10:00'),(11,11,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:11:00'),(12,12,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:12:00'),(13,13,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:13:00'),(14,14,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:14:00'),(15,15,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:15:00'),(16,16,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:16:00'),(17,17,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:17:00'),(18,18,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:18:00'),(19,19,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:19:00'),(20,20,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:20:00'),(21,21,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:21:00'),(22,22,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:22:00'),(23,23,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:23:00'),(24,24,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:24:00'),(25,25,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:25:00'),(26,26,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:26:00'),(27,27,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:27:00'),(28,28,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:28:00'),(29,29,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:29:00'),(30,30,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:30:00'),(31,31,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:31:00'),(32,32,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:32:00'),(33,33,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:33:00'),(34,34,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:34:00'),(35,35,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:35:00'),(36,36,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:36:00'),(37,37,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:37:00'),(38,38,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:38:00'),(39,39,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:39:00'),(40,40,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:40:00'),(41,41,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:41:00'),(42,42,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:42:00'),(43,43,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:43:00'),(44,44,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:44:00'),(45,45,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:45:00'),(46,46,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:46:00'),(47,47,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:47:00'),(48,48,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:48:00'),(49,49,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:49:00'),(50,50,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:50:00'),(51,51,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:51:00'),(52,52,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:52:00'),(53,53,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:53:00'),(54,54,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:54:00'),(55,55,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:55:00'),(56,56,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 10:56:00'),(57,57,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:57:00'),(58,58,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:58:00'),(59,59,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 10:59:00'),(60,60,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:00:00'),(61,61,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:01:00'),(62,62,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:02:00'),(63,63,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:03:00'),(64,64,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:04:00'),(65,65,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:05:00'),(66,66,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:06:00'),(67,67,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:07:00'),(68,68,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:08:00'),(69,69,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:09:00'),(70,70,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:10:00'),(71,71,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:11:00'),(72,72,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:12:00'),(73,73,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:13:00'),(74,74,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:14:00'),(75,75,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:15:00'),(76,76,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:16:00'),(77,77,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:17:00'),(78,78,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:18:00'),(79,79,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:19:00'),(80,80,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:20:00'),(81,81,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:21:00'),(82,82,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:22:00'),(83,83,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:23:00'),(84,84,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:24:00'),(85,85,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:25:00'),(86,86,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:26:00'),(87,87,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:27:00'),(88,88,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:28:00'),(89,89,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:29:00'),(90,90,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:30:00'),(91,91,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:31:00'),(92,92,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:32:00'),(93,93,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:33:00'),(94,94,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:34:00'),(95,95,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:35:00'),(96,96,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:36:00'),(97,97,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:37:00'),(98,98,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:38:00'),(99,99,1,'Pilihan B untuk Pertanyaan 1',0,'2025-11-20 11:39:00'),(100,100,1,'Pilihan A untuk Pertanyaan 1',1,'2025-11-20 11:40:00');
/*!40000 ALTER TABLE `jawaban_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kata`
--

DROP TABLE IF EXISTS `kata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kata` (
  `id_kata` int NOT NULL AUTO_INCREMENT,
  `kata` varchar(100) NOT NULL,
  `arti` text,
  `contoh` varchar(255) NOT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `kelompok_id` int NOT NULL,
  PRIMARY KEY (`id_kata`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kata`
--

LOCK TABLES `kata` WRITE;
/*!40000 ALTER TABLE `kata` DISABLE KEYS */;
INSERT INTO `kata` VALUES (1,'Vocabulary_001','Definisi untuk kata ke-1','tes','2025-10-03',0),(2,'Vocabulary_002','Definisi untuk kata ke-2','tes','2025-10-29',0),(3,'Vocabulary_003','Definisi untuk kata ke-3','','2025-10-25',0),(4,'Vocabulary_004','Definisi untuk kata ke-4','','2025-10-07',0),(5,'Vocabulary_005','Definisi untuk kata ke-5','','2025-10-12',0),(6,'Vocabulary_006','Definisi untuk kata ke-6','','2025-11-18',0),(7,'Vocabulary_007','Definisi untuk kata ke-7','','2025-10-18',0),(8,'Vocabulary_008','Definisi untuk kata ke-8','','2025-11-18',0),(9,'Vocabulary_009','Definisi untuk kata ke-9','','2025-10-18',0),(10,'Vocabulary_010','Definisi untuk kata ke-10','','2025-11-09',0),(11,'Vocabulary_011','Definisi untuk kata ke-11','','2025-11-13',0),(12,'Vocabulary_012','Definisi untuk kata ke-12','','2025-10-15',0),(13,'Vocabulary_013','Definisi untuk kata ke-13','','2025-10-31',0),(14,'Vocabulary_014','Definisi untuk kata ke-14','','2025-10-11',0),(15,'Vocabulary_015','Definisi untuk kata ke-15','','2025-10-13',0),(16,'Vocabulary_016','Definisi untuk kata ke-16','','2025-11-11',0),(17,'Vocabulary_017','Definisi untuk kata ke-17','','2025-11-07',0),(18,'Vocabulary_018','Definisi untuk kata ke-18','','2025-11-10',0),(19,'Vocabulary_019','Definisi untuk kata ke-19','','2025-10-27',0),(20,'Vocabulary_020','Definisi untuk kata ke-20','','2025-11-08',0),(21,'Vocabulary_021','Definisi untuk kata ke-21','','2025-10-02',0),(22,'Vocabulary_022','Definisi untuk kata ke-22','','2025-10-20',0),(23,'Vocabulary_023','Definisi untuk kata ke-23','','2025-10-04',0),(24,'Vocabulary_024','Definisi untuk kata ke-24','','2025-10-03',0),(25,'Vocabulary_025','Definisi untuk kata ke-25','','2025-10-09',0),(26,'Vocabulary_026','Definisi untuk kata ke-26','','2025-11-08',0),(27,'Vocabulary_027','Definisi untuk kata ke-27','','2025-10-11',0),(28,'Vocabulary_028','Definisi untuk kata ke-28','','2025-10-03',0),(29,'Vocabulary_029','Definisi untuk kata ke-29','','2025-10-11',0),(30,'Vocabulary_030','Definisi untuk kata ke-30','','2025-10-16',0),(31,'Vocabulary_031','Definisi untuk kata ke-31','','2025-10-10',0),(32,'Vocabulary_032','Definisi untuk kata ke-32','','2025-11-10',0),(33,'Vocabulary_033','Definisi untuk kata ke-33','','2025-11-09',0),(34,'Vocabulary_034','Definisi untuk kata ke-34','','2025-11-06',0),(35,'Vocabulary_035','Definisi untuk kata ke-35','','2025-11-09',0),(36,'Vocabulary_036','Definisi untuk kata ke-36','','2025-10-28',0),(37,'Vocabulary_037','Definisi untuk kata ke-37','','2025-10-14',0),(38,'Vocabulary_038','Definisi untuk kata ke-38','','2025-10-11',0),(39,'Vocabulary_039','Definisi untuk kata ke-39','','2025-11-02',0),(40,'Vocabulary_040','Definisi untuk kata ke-40','','2025-10-23',0),(41,'Vocabulary_041','Definisi untuk kata ke-41','','2025-11-12',0),(42,'Vocabulary_042','Definisi untuk kata ke-42','','2025-11-18',0),(43,'Vocabulary_043','Definisi untuk kata ke-43','','2025-11-16',0),(44,'Vocabulary_044','Definisi untuk kata ke-44','','2025-11-09',0),(45,'Vocabulary_045','Definisi untuk kata ke-45','','2025-11-01',0),(46,'Vocabulary_046','Definisi untuk kata ke-46','','2025-11-05',0),(47,'Vocabulary_047','Definisi untuk kata ke-47','','2025-11-07',0),(48,'Vocabulary_048','Definisi untuk kata ke-48','','2025-10-05',0),(49,'Vocabulary_049','Definisi untuk kata ke-49','','2025-11-19',0),(50,'Vocabulary_050','Definisi untuk kata ke-50','','2025-10-07',0),(51,'Vocabulary_051','Definisi untuk kata ke-51','','2025-10-18',0),(52,'Vocabulary_052','Definisi untuk kata ke-52','','2025-10-22',0),(53,'Vocabulary_053','Definisi untuk kata ke-53','','2025-10-09',0),(54,'Vocabulary_054','Definisi untuk kata ke-54','','2025-10-16',0),(55,'Vocabulary_055','Definisi untuk kata ke-55','','2025-10-19',0),(56,'Vocabulary_056','Definisi untuk kata ke-56','','2025-10-08',0),(57,'Vocabulary_057','Definisi untuk kata ke-57','','2025-10-25',0),(58,'Vocabulary_058','Definisi untuk kata ke-58','','2025-11-11',0),(59,'Vocabulary_059','Definisi untuk kata ke-59','','2025-10-13',0),(60,'Vocabulary_060','Definisi untuk kata ke-60','','2025-10-27',0),(61,'Vocabulary_061','Definisi untuk kata ke-61','','2025-11-12',0),(62,'Vocabulary_062','Definisi untuk kata ke-62','','2025-10-17',0),(63,'Vocabulary_063','Definisi untuk kata ke-63','','2025-10-28',0),(64,'Vocabulary_064','Definisi untuk kata ke-64','','2025-10-27',0),(65,'Vocabulary_065','Definisi untuk kata ke-65','','2025-10-11',0),(66,'Vocabulary_066','Definisi untuk kata ke-66','','2025-10-07',0),(67,'Vocabulary_067','Definisi untuk kata ke-67','','2025-10-27',0),(68,'Vocabulary_068','Definisi untuk kata ke-68','','2025-11-13',0),(69,'Vocabulary_069','Definisi untuk kata ke-69','','2025-11-11',0),(70,'Vocabulary_070','Definisi untuk kata ke-70','','2025-11-15',0),(71,'Vocabulary_071','Definisi untuk kata ke-71','','2025-11-02',0),(72,'Vocabulary_072','Definisi untuk kata ke-72','','2025-10-13',0),(73,'Vocabulary_073','Definisi untuk kata ke-73','','2025-11-09',0),(74,'Vocabulary_074','Definisi untuk kata ke-74','','2025-11-04',0),(75,'Vocabulary_075','Definisi untuk kata ke-75','','2025-10-11',0),(76,'Vocabulary_076','Definisi untuk kata ke-76','','2025-11-14',0),(77,'Vocabulary_077','Definisi untuk kata ke-77','','2025-11-15',0),(78,'Vocabulary_078','Definisi untuk kata ke-78','','2025-10-14',0),(79,'Vocabulary_079','Definisi untuk kata ke-79','','2025-11-19',0),(80,'Vocabulary_080','Definisi untuk kata ke-80','','2025-10-19',0),(81,'Vocabulary_081','Definisi untuk kata ke-81','','2025-10-02',0),(82,'Vocabulary_082','Definisi untuk kata ke-82','','2025-10-06',0),(83,'Vocabulary_083','Definisi untuk kata ke-83','','2025-11-10',0),(84,'Vocabulary_084','Definisi untuk kata ke-84','','2025-10-24',0),(85,'Vocabulary_085','Definisi untuk kata ke-85','','2025-10-28',0),(86,'Vocabulary_086','Definisi untuk kata ke-86','','2025-10-18',0),(87,'Vocabulary_087','Definisi untuk kata ke-87','','2025-10-28',0),(88,'Vocabulary_088','Definisi untuk kata ke-88','','2025-10-23',0),(89,'Vocabulary_089','Definisi untuk kata ke-89','','2025-10-26',0),(90,'Vocabulary_090','Definisi untuk kata ke-90','','2025-11-05',0),(91,'Vocabulary_091','Definisi untuk kata ke-91','','2025-11-16',0),(92,'Vocabulary_092','Definisi untuk kata ke-92','','2025-10-09',0),(93,'Vocabulary_093','Definisi untuk kata ke-93','','2025-11-16',0),(94,'Vocabulary_094','Definisi untuk kata ke-94','','2025-10-04',0),(95,'Vocabulary_095','Definisi untuk kata ke-95','','2025-10-01',0),(96,'Vocabulary_096','Definisi untuk kata ke-96','','2025-10-24',0),(97,'Vocabulary_097','Definisi untuk kata ke-97','','2025-10-02',0),(98,'Vocabulary_098','Definisi untuk kata ke-98','','2025-10-09',0),(99,'Vocabulary_099','Definisi untuk kata ke-99','','2025-11-17',0),(100,'Vocabulary_100','Definisi untuk kata ke-100','','2025-10-24',0),(102,'cook','masak','tes','2025-12-07',100),(103,'tesq','dufb','oidjon','2025-12-09',1),(104,'nndfkjn','knlksdnfl','qlknlkadfn','2025-12-09',1),(105,'huhuhah','huhuhaha','huhuhaha','2025-12-09',8);
/*!40000 ALTER TABLE `kata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelompok_kata`
--

DROP TABLE IF EXISTS `kelompok_kata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelompok_kata` (
  `id_kelompok_kata` int NOT NULL AUTO_INCREMENT,
  `nama_kelompok_kata` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_kelompok_kata`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelompok_kata`
--

LOCK TABLES `kelompok_kata` WRITE;
/*!40000 ALTER TABLE `kelompok_kata` DISABLE KEYS */;
INSERT INTO `kelompok_kata` VALUES (1,'Vocabulary Level A1',121),(2,'Kata Kerja Dasar',0),(3,'Vocabulary Harian',0),(4,'Istilah Komputer & Tech',0),(5,'Hewan dan Tumbuhan',0),(8,'huhuhaha',121);
/*!40000 ALTER TABLE `kelompok_kata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertanyaan`
--

DROP TABLE IF EXISTS `pertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int NOT NULL AUTO_INCREMENT,
  `teks_pertanyaan` text NOT NULL,
  `quiz_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `quiz_id` (`quiz_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id_quiz`),
  CONSTRAINT `pertanyaan_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertanyaan`
--

LOCK TABLES `pertanyaan` WRITE;
/*!40000 ALTER TABLE `pertanyaan` DISABLE KEYS */;
INSERT INTO `pertanyaan` VALUES (1,'Apa arti kata \"Vocabulary_001\"?',3,10),(2,'Apa arti kata \"Vocabulary_002\"?',4,1),(3,'Apa arti kata \"Vocabulary_003\"?',4,10),(4,'Apa arti kata \"Vocabulary_004\"?',5,3),(5,'Apa arti kata \"Vocabulary_005\"?',5,1),(6,'Apa arti kata \"Vocabulary_006\"?',1,7),(7,'Apa arti kata \"Vocabulary_007\"?',5,6),(8,'Apa arti kata \"Vocabulary_008\"?',5,8),(9,'Apa arti kata \"Vocabulary_009\"?',1,4),(10,'Apa arti kata \"Vocabulary_010\"?',2,6),(11,'Apa arti kata \"Vocabulary_011\"?',5,7),(12,'Apa arti kata \"Vocabulary_012\"?',3,5),(13,'Apa arti kata \"Vocabulary_013\"?',1,8),(14,'Apa arti kata \"Vocabulary_014\"?',3,6),(15,'Apa arti kata \"Vocabulary_015\"?',1,6),(16,'Apa arti kata \"Vocabulary_016\"?',5,6),(17,'Apa arti kata \"Vocabulary_017\"?',1,1),(18,'Apa arti kata \"Vocabulary_018\"?',5,5),(19,'Apa arti kata \"Vocabulary_019\"?',3,10),(20,'Apa arti kata \"Vocabulary_020\"?',2,10),(21,'Apa arti kata \"Vocabulary_021\"?',5,2),(22,'Apa arti kata \"Vocabulary_022\"?',1,4),(23,'Apa arti kata \"Vocabulary_023\"?',3,5),(24,'Apa arti kata \"Vocabulary_024\"?',5,8),(25,'Apa arti kata \"Vocabulary_025\"?',3,7),(26,'Apa arti kata \"Vocabulary_026\"?',1,9),(27,'Apa arti kata \"Vocabulary_027\"?',5,8),(28,'Apa arti kata \"Vocabulary_028\"?',1,10),(29,'Apa arti kata \"Vocabulary_029\"?',3,9),(30,'Apa arti kata \"Vocabulary_030\"?',3,3),(31,'Apa arti kata \"Vocabulary_031\"?',3,1),(32,'Apa arti kata \"Vocabulary_032\"?',3,4),(33,'Apa arti kata \"Vocabulary_033\"?',2,2),(34,'Apa arti kata \"Vocabulary_034\"?',5,1),(35,'Apa arti kata \"Vocabulary_035\"?',4,7),(36,'Apa arti kata \"Vocabulary_036\"?',4,8),(37,'Apa arti kata \"Vocabulary_037\"?',4,1),(38,'Apa arti kata \"Vocabulary_038\"?',2,5),(39,'Apa arti kata \"Vocabulary_039\"?',3,8),(40,'Apa arti kata \"Vocabulary_040\"?',2,3),(41,'Apa arti kata \"Vocabulary_041\"?',2,7),(42,'Apa arti kata \"Vocabulary_042\"?',3,10),(43,'Apa arti kata \"Vocabulary_043\"?',4,2),(44,'Apa arti kata \"Vocabulary_044\"?',3,7),(45,'Apa arti kata \"Vocabulary_045\"?',1,1),(46,'Apa arti kata \"Vocabulary_046\"?',2,4),(47,'Apa arti kata \"Vocabulary_047\"?',4,9),(48,'Apa arti kata \"Vocabulary_048\"?',5,7),(49,'Apa arti kata \"Vocabulary_049\"?',5,1),(50,'Apa arti kata \"Vocabulary_050\"?',5,5),(51,'Apa arti kata \"Vocabulary_051\"?',3,6),(52,'Apa arti kata \"Vocabulary_052\"?',5,9),(53,'Apa arti kata \"Vocabulary_053\"?',3,2),(54,'Apa arti kata \"Vocabulary_054\"?',2,6),(55,'Apa arti kata \"Vocabulary_055\"?',2,6),(56,'Apa arti kata \"Vocabulary_056\"?',1,5),(57,'Apa arti kata \"Vocabulary_057\"?',1,1),(58,'Apa arti kata \"Vocabulary_058\"?',1,2),(59,'Apa arti kata \"Vocabulary_059\"?',3,9),(60,'Apa arti kata \"Vocabulary_060\"?',5,8),(61,'Apa arti kata \"Vocabulary_061\"?',1,6),(62,'Apa arti kata \"Vocabulary_062\"?',3,4),(63,'Apa arti kata \"Vocabulary_063\"?',2,7),(64,'Apa arti kata \"Vocabulary_064\"?',1,9),(65,'Apa arti kata \"Vocabulary_065\"?',5,6),(66,'Apa arti kata \"Vocabulary_066\"?',3,5),(67,'Apa arti kata \"Vocabulary_067\"?',1,7),(68,'Apa arti kata \"Vocabulary_068\"?',1,10),(69,'Apa arti kata \"Vocabulary_069\"?',2,5),(70,'Apa arti kata \"Vocabulary_070\"?',3,10),(71,'Apa arti kata \"Vocabulary_071\"?',3,10),(72,'Apa arti kata \"Vocabulary_072\"?',4,3),(73,'Apa arti kata \"Vocabulary_073\"?',4,3),(74,'Apa arti kata \"Vocabulary_074\"?',5,4),(75,'Apa arti kata \"Vocabulary_075\"?',2,4),(76,'Apa arti kata \"Vocabulary_076\"?',5,8),(77,'Apa arti kata \"Vocabulary_077\"?',4,6),(78,'Apa arti kata \"Vocabulary_078\"?',3,8),(79,'Apa arti kata \"Vocabulary_079\"?',3,1),(80,'Apa arti kata \"Vocabulary_080\"?',4,7),(81,'Apa arti kata \"Vocabulary_081\"?',1,8),(82,'Apa arti kata \"Vocabulary_082\"?',2,10),(83,'Apa arti kata \"Vocabulary_083\"?',5,5),(84,'Apa arti kata \"Vocabulary_084\"?',4,9),(85,'Apa arti kata \"Vocabulary_085\"?',3,8),(86,'Apa arti kata \"Vocabulary_086\"?',2,9),(87,'Apa arti kata \"Vocabulary_087\"?',4,1),(88,'Apa arti kata \"Vocabulary_088\"?',1,5),(89,'Apa arti kata \"Vocabulary_089\"?',1,8),(90,'Apa arti kata \"Vocabulary_090\"?',4,10),(91,'Apa arti kata \"Vocabulary_091\"?',5,4),(92,'Apa arti kata \"Vocabulary_092\"?',2,8),(93,'Apa arti kata \"Vocabulary_093\"?',5,7),(94,'Apa arti kata \"Vocabulary_094\"?',5,7),(95,'Apa arti kata \"Vocabulary_095\"?',2,4),(96,'Apa arti kata \"Vocabulary_096\"?',2,1),(97,'Apa arti kata \"Vocabulary_097\"?',3,10),(98,'Apa arti kata \"Vocabulary_098\"?',3,1),(99,'Apa arti kata \"Vocabulary_099\"?',2,9),(100,'Apa arti kata \"Vocabulary_100\"?',1,10),(201,'Apa kepanjangan dari HTML?',100,NULL),(202,'Simbol komentar untuk JavaScript adalah?',100,NULL),(203,'Bahasa pemrograman mana yang berjalan di browser?',100,NULL);
/*!40000 ALTER TABLE `pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `id_quiz` int NOT NULL AUTO_INCREMENT,
  `nama_quiz` varchar(100) NOT NULL,
  `durasi` time DEFAULT NULL,
  `waktu_pelaksanaan` datetime DEFAULT NULL,
  `waktu_berakhir` datetime DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  PRIMARY KEY (`id_quiz`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Daily Vocab Test #1','00:15:00','2025-12-09 03:11:00','2025-12-09 03:21:00',5),(2,'Level A1 Review','00:30:00','2025-11-16 10:00:00','2025-11-16 12:00:00',6),(3,'Quiz Kata Kerja','00:20:00','2025-11-17 14:00:00','2025-11-17 15:00:00',5),(4,'Tech Terminology Quiz','00:10:00','2025-11-18 09:00:00','2025-11-18 11:00:00',8),(5,'Pop Quiz A1-2','00:15:00','2025-11-19 11:00:00','2025-11-19 13:00:00',6),(10,'Quiz Dasar Pemrograman','00:10:00','2025-12-09 03:11:00','2025-12-09 03:21:00',1),(11,'Quiz Dasar Pemrograman','00:10:00','2025-12-09 03:20:00','2025-12-09 03:30:00',1),(100,'Quiz Dasar Pemrograman','00:10:00','2025-12-09 03:00:00','2025-12-09 06:00:00',1);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relasi_siswa_kelompok_kata`
--

DROP TABLE IF EXISTS `relasi_siswa_kelompok_kata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relasi_siswa_kelompok_kata` (
  `id_siswa` int NOT NULL,
  `id_kelompok_kata` int NOT NULL,
  `peringkat` int DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`id_kelompok_kata`),
  KEY `id_kelompok_kata` (`id_kelompok_kata`),
  CONSTRAINT `relasi_siswa_kelompok_kata_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  CONSTRAINT `relasi_siswa_kelompok_kata_ibfk_2` FOREIGN KEY (`id_kelompok_kata`) REFERENCES `kelompok_kata` (`id_kelompok_kata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relasi_siswa_kelompok_kata`
--

LOCK TABLES `relasi_siswa_kelompok_kata` WRITE;
/*!40000 ALTER TABLE `relasi_siswa_kelompok_kata` DISABLE KEYS */;
INSERT INTO `relasi_siswa_kelompok_kata` VALUES (1,5,8),(2,1,7),(3,2,19),(4,3,19),(5,1,5),(6,1,4),(7,2,4),(8,5,1),(9,3,1),(10,5,9),(11,2,13),(12,1,4),(13,5,18),(14,4,12),(15,5,20),(16,1,18),(17,5,11),(18,2,11),(19,5,4),(20,1,18),(21,2,7),(22,1,7),(23,2,1),(24,5,9),(25,3,4),(26,2,6),(27,2,14),(28,3,8),(29,3,9),(30,3,10),(31,4,6),(32,1,19),(33,2,8),(34,1,6),(35,2,7),(36,5,6),(37,5,16),(38,1,4),(39,3,9),(40,2,13),(41,1,9),(42,5,20),(43,2,19),(44,3,2),(45,4,18),(46,3,12),(47,3,1),(48,3,3),(49,2,19),(50,5,2),(51,2,15),(52,3,13),(53,3,5),(54,4,5),(55,4,20),(56,4,17),(57,5,2),(58,3,14),(59,4,4),(60,1,13),(61,1,11),(62,2,15),(63,5,4),(64,1,8),(65,3,2),(66,1,17),(67,1,3),(68,2,15),(69,5,15),(70,4,3),(71,3,10),(72,4,16),(73,5,5),(74,2,2),(75,2,11),(76,4,9),(77,2,4),(78,5,9),(79,2,16),(80,2,5),(81,1,16),(82,4,3),(83,3,9),(84,3,18),(85,1,6),(86,4,15),(87,3,16),(88,1,18),(89,2,18),(90,3,14),(91,5,14),(92,4,20),(93,1,12),(94,4,9),(95,1,11),(96,1,20),(97,3,20),(98,1,9),(99,5,6),(100,4,16);
/*!40000 ALTER TABLE `relasi_siswa_kelompok_kata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sekolah`
--

DROP TABLE IF EXISTS `sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sekolah` (
  `id_sekolah` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sekolah`
--

LOCK TABLES `sekolah` WRITE;
/*!40000 ALTER TABLE `sekolah` DISABLE KEYS */;
INSERT INTO `sekolah` VALUES (1,'SMAN 1 Jakarta'),(2,'SMK TI Bandung'),(3,'SMPN 5 Surabaya'),(4,'SD IT Al-Hikmah'),(5,'SMA Taruna Mandiri');
/*!40000 ALTER TABLE `sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sekolah_id` int DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `username` (`username`),
  KEY `sekolah_id` (`sekolah_id`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,'siswa_001','Siswa Lengkap 001','hash_p1',5,'1764823187_profileF.png'),(2,'siswa_002','Siswa Lengkap 002','hash_p2',5,''),(3,'siswa_003','siswa_003','hash_p3',2,''),(4,'siswa_004','Siswa Lengkap 004','hash_p4',2,''),(5,'siswa_005','Siswa Lengkap 005','hash_p5',2,''),(6,'siswa_006','siswa_006','hash_p6',2,''),(7,'siswa_007','Siswa Lengkap 007','hash_p7',5,''),(8,'siswa_008','Siswa Lengkap 008','hash_p8',4,''),(9,'siswa_009','Siswa Lengkap 009','hash_p9',3,''),(10,'siswa_010','Siswa Lengkap 010','hash_p10',4,''),(11,'siswa_011','Siswa Lengkap 011','hash_p11',4,''),(12,'siswa_012','Siswa Lengkap 012','hash_p12',5,''),(13,'siswa_013','Siswa Lengkap 013','hash_p13',2,''),(14,'siswa_014','Siswa Lengkap 014','hash_p14',5,''),(15,'siswa_015','Siswa Lengkap 015','hash_p15',2,''),(16,'siswa_016','Siswa Lengkap 016','hash_p16',5,''),(17,'siswa_017','Siswa Lengkap 017','hash_p17',4,''),(18,'siswa_018','Siswa Lengkap 018','hash_p18',4,''),(19,'siswa_019','Siswa Lengkap 019','hash_p19',2,''),(20,'siswa_020','Siswa Lengkap 020','hash_p20',3,''),(21,'siswa_021','Siswa Lengkap 021','hash_p21',3,''),(22,'siswa_022','Siswa Lengkap 022','hash_p22',5,''),(23,'siswa_023','Siswa Lengkap 023','hash_p23',3,''),(24,'siswa_024','Siswa Lengkap 024','hash_p24',4,''),(25,'siswa_025','Siswa Lengkap 025','hash_p25',4,''),(26,'siswa_026','siswa_026','hash_p26',2,''),(27,'siswa_027','siswa_027','hash_p27',3,''),(28,'siswa_028','Siswa Lengkap 028','hash_p28',5,''),(29,'siswa_029','Siswa Lengkap 029','hash_p29',5,''),(30,'intan','intan','hash_p30',2,''),(31,'siswa_031','Siswa Lengkap 031','hash_p31',3,''),(32,'siswa_032','Siswa Lengkap 032','hash_p32',4,''),(33,'tuhu','Siswa Lengkap 033','hash_p33',1,''),(34,'siswa_034','Siswa Lengkap 034','hash_p34',1,''),(35,'siswa_035','Siswa Lengkap 035','hash_p35',5,''),(36,'siswa_036','Siswa Lengkap 036','hash_p36',3,''),(37,'siswa_037','Siswa Lengkap 037','hash_p37',2,''),(38,'siswa_038','Siswa Lengkap 038','hash_p38',4,''),(39,'siswa_039','Siswa Lengkap 039','hash_p39',1,''),(40,'siswa_040','Siswa Lengkap 040','hash_p40',2,''),(41,'siswa_041','Siswa Lengkap 041','hash_p41',4,''),(42,'siswa_042','Siswa Lengkap 042','hash_p42',1,''),(43,'siswa_043','Siswa Lengkap 043','hash_p43',4,''),(44,'siswa_044','Siswa Lengkap 044','hash_p44',3,''),(45,'siswa_045','Siswa Lengkap 045','hash_p45',5,''),(46,'siswa_046','Siswa Lengkap 046','hash_p46',3,''),(47,'siswa_047','Siswa Lengkap 047','hash_p47',3,''),(48,'siswa_048','Siswa Lengkap 048','hash_p48',5,''),(49,'siswa_049','Siswa Lengkap 049','hash_p49',2,''),(50,'siswa_050','Siswa Lengkap 050','hash_p50',2,''),(51,'siswa_051','Siswa Lengkap 051','hash_p51',1,''),(52,'siswa_052','Siswa Lengkap 052','hash_p52',4,''),(53,'siswa_053','Siswa Lengkap 053','hash_p53',1,''),(54,'siswa_054','Siswa Lengkap 054','hash_p54',5,''),(55,'siswa_055','Siswa Lengkap 055','hash_p55',4,''),(56,'siswa_056','Siswa Lengkap 056','hash_p56',2,''),(57,'siswa_057','Siswa Lengkap 057','hash_p57',1,''),(58,'siswa_058','Siswa Lengkap 058','hash_p58',1,''),(59,'siswa_059','Siswa Lengkap 059','hash_p59',3,''),(60,'siswa_060','Siswa Lengkap 060','hash_p60',4,''),(61,'siswa_061','Siswa Lengkap 061','hash_p61',3,''),(62,'siswa_062','Siswa Lengkap 062','hash_p62',5,''),(63,'siswa_063','Siswa Lengkap 063','hash_p63',4,''),(64,'siswa_064','Siswa Lengkap 064','hash_p64',2,''),(65,'siswa_065','Siswa Lengkap 065','hash_p65',1,''),(66,'siswa_066','Siswa Lengkap 066','hash_p66',2,''),(67,'siswa_067','Siswa Lengkap 067','hash_p67',5,''),(68,'siswa_068','Siswa Lengkap 068','hash_p68',3,''),(69,'siswa_069','Siswa Lengkap 069','hash_p69',5,''),(70,'siswa_070','Siswa Lengkap 070','hash_p70',4,''),(71,'siswa_071','Siswa Lengkap 071','hash_p71',1,''),(72,'siswa_072','Siswa Lengkap 072','hash_p72',4,''),(73,'siswa_073','Siswa Lengkap 073','hash_p73',1,''),(74,'siswa_074','Siswa Lengkap 074','hash_p74',4,''),(75,'siswa_075','Siswa Lengkap 075','hash_p75',5,''),(76,'siswa_076','Siswa Lengkap 076','hash_p76',3,''),(77,'siswa_077','Siswa Lengkap 077','hash_p77',3,''),(78,'siswa_078','Siswa Lengkap 078','hash_p78',1,''),(79,'siswa_079','Siswa Lengkap 079','hash_p79',4,''),(80,'siswa_080','Siswa Lengkap 080','hash_p80',3,''),(81,'siswa_081','Siswa Lengkap 081','hash_p81',1,''),(82,'siswa_082','Siswa Lengkap 082','hash_p82',4,''),(83,'siswa_083','Siswa Lengkap 083','hash_p83',5,''),(84,'siswa_084','Siswa Lengkap 084','hash_p84',5,''),(85,'siswa_085','Siswa Lengkap 085','hash_p85',3,''),(86,'siswa_086','Siswa Lengkap 086','hash_p86',3,''),(87,'siswa_087','Siswa Lengkap 087','hash_p87',3,''),(88,'siswa_088','Siswa Lengkap 088','hash_p88',1,''),(89,'siswa_089','Siswa Lengkap 089','hash_p89',3,''),(90,'siswa_090','Siswa Lengkap 090','hash_p90',3,''),(91,'siswa_091','Siswa Lengkap 091','hash_p91',2,''),(92,'siswa_092','Siswa Lengkap 092','hash_p92',4,''),(93,'siswa_093','Siswa Lengkap 093','hash_p93',1,''),(94,'siswa_094','Siswa Lengkap 094','hash_p94',4,''),(95,'siswa_095','Siswa Lengkap 095','hash_p95',3,''),(96,'siswa_096','Siswa Lengkap 096','hash_p96',2,''),(97,'siswa_097','Siswa Lengkap 097','hash_p97',2,''),(98,'siswa_098','Siswa Lengkap 098','hash_p98',3,''),(99,'siswa_099','Siswa Lengkap 099','hash_p99',4,''),(100,'siswa_100','Siswa Lengkap 100','hash_p100',4,''),(104,'diana_kusuma','','hash_dian_4',3,''),(106,'fani_rahma','','hash_fani_6',5,''),(110,'jihan_azka','','hash_jihan_10',4,''),(111,'tuhuIntan','laravel','',1,''),(113,'intanTuhu','tuhu','tuhu.tuhu',3,''),(116,'intana','intan','intan.intan',1,''),(118,'intanab','intan','sjbdhvhsvg',2,''),(119,'INTANAN','hjxbh','xbhcat',2,''),(120,'asddsa','asdas','asdas',2,''),(121,'tuhu01','Tuhu Pangestu','tuhu.tuhu',1,'1765222460_Pasted image.png');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wod`
--

DROP TABLE IF EXISTS `wod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wod` (
  `id` varchar(50) NOT NULL,
  `kata` varchar(50) NOT NULL,
  `arti` varchar(100) NOT NULL,
  `contoh` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wod`
--

LOCK TABLES `wod` WRITE;
/*!40000 ALTER TABLE `wod` DISABLE KEYS */;
INSERT INTO `wod` VALUES ('wod_001','Ubiquitous','Ada di mana-mana; meresap.','Smartphone has become a ubiquitous device in modern life.','1'),('wod_002','Ephemeral','Berumur pendek; singkat.','The beauty of the cherry blossoms is ephemeral.','0'),('wod_003','Mellifluous','Merdu; enak didengar (suara).','Her mellifluous voice captivated the entire audience.','0'),('wod_004','Lethargy','Kelesuan; kekurangan energi.','The heat often induces a feeling of lethargy.','0'),('wod_005','Nefarious','Jahat; tidak bermoral.','The nefarious plot was foiled by the clever detective.','0'),('wod_006','Juxtapose','Menempatkan berdampingan untuk perbandingan.','The artist chose to juxtapose bright colors with dark shadows.','0'),('wod_007','Capricious','Berubah-ubah; mudah berubah pikiran.','The weather in the mountains can be quite capricious.','0'),('wod_008','Esoteric','Dimengerti hanya oleh sekelompok kecil orang.','Quantum physics remains an esoteric subject for most.','0'),('wod_009','Perfunctory','Dilakukan dengan asal-asalan; tanpa usaha.','He gave a perfunctory nod before quickly leaving the room.','0'),('wod_0010','Gregarious','Suka bergaul; sosial.','A gregarious person always enjoys a large gathering.','0'),('wod_011','Serendipity','Penemuan yang menyenangkan secara kebetulan.','It was pure serendipity that I found the perfect book at the thrift store.','0'),('wod_012','Pensive','Sedang dalam pikiran yang mendalam atau serius.','She looked pensive, staring out at the rain.','0'),('wod_0013','Placid','Tenang; damai.','The lake was placid in the early morning light.','0'),('wod_0014','Meticulous','Sangat teliti; cermat terhadap detail.','The jeweler was meticulous in setting the small diamonds.','0'),('wod_0015','Ostracize','Mengucilkan; menjauhi.','The group decided to ostracize him after his betrayal.','0'),('wod_0016','Exacerbate','Memperburuk; memperparah.','Lack of sleep will only exacerbate your stress.','0'),('wod_0017','Alacrity','Keriangan dan kesiapan yang cepat.','He accepted the new project with alacrity.','0'),('wod_0018','Cacophony','Campuran suara yang tidak harmonis.','The busy market was filled with a cacophony of noises.','0'),('wod_0019','Intrepid','Tak kenal takut; berani.','The intrepid explorer ventured deep into the jungle.','0'),('wod_0020','Vacillate','Bimbang; ragu-ragu antara pilihan.','He would vacillate between staying and leaving.','0'),('wod_0021','Miasma','Aura atau suasana yang tidak menyenangkan.','The room was heavy with a miasma of depression.','0'),('wod_0022','Cogent','Meyakinkan; beralasan kuat.','She presented a cogent argument against the new policy.','0'),('wod_0023','Inexorable','Tidak dapat dihentikan atau diubah.','The inexorable march of time affects us all.','0'),('wod_0024','Pulchritude','Kecantikan fisik.','The model was praised for her striking pulchritude.','0'),('wod_0025','Zephyr','Angin sepoi-sepoi yang lembut dan ringan.','A gentle zephyr cooled the summer afternoon.','0'),('wod_0026','Quixotic','Terlalu idealis; tidak praktis.','His quixotic quest to save every stray cat was admirable but difficult.','0'),('wod_0027','Sanctimonious','Sok suci; berpura-pura saleh.','The sanctimonious politician lectured others on morality.','0'),('wod_0028','Talisman','Jimat; benda yang dipercaya membawa keberuntungan.','He kept the small stone as a talisman for good luck.','0'),('wod_0029','Venerate','Menghormati atau memuja dengan sangat.','Many cultures venerate their ancestors.','0'),('wod_0030','Wistful','Penuh kerinduan yang melankolis.','She cast a wistful glance at the old photograph.','0'),('wod_0031','Abstruse','Sulit dimengerti; membingungkan.','The professor lectured on an abstruse philosophical concept.','0'),('wod_0032','Blandish','Membujuk dengan sanjungan; merayu.','The politician tried to blandish the voters with empty promises.','0'),('wod_0033','Conflate','Menggabungkan dua atau lebih ide menjadi satu.','People often conflate correlation with causation.','0'),('wod_0034','Diatribe','Kritik lisan atau tulisan yang keras.','The editor published a lengthy diatribe against the government.','0'),('wod_0035','Ebullient','Penuh energi dan kegembiraan.','The crowd was ebullient after the team scored the winning goal.','0'),('wod_0036','Fatuous','Konyol; bodoh.','His fatuous comments annoyed everyone at the meeting.','0'),('wod_0037','Garrulous','Sangat banyak bicara; cerewet.','The garrulous passenger kept talking for the entire flight.','0'),('wod_0038','Hegemony','Dominasi atau kontrol oleh satu kelompok atau negara.','The cultural hegemony of Hollywood is evident worldwide.','0'),('wod_0039','Impecunious','Tidak punya uang; miskin.','He was born into an impecunious family but worked hard to succeed.','0'),('wod_0040','Jubilant','Merasa sangat gembira atau kemenangan.','The marathon runners were jubilant crossing the finish line.','0'),('wod_0041','Kismet','Takdir; nasib.','It must have been kismet that we met on that random day.','0'),('wod_0042','Lackadaisical','Kurang antusias; malas-malasan.','His lackadaisical approach to his studies worried his parents.','0'),('wod_0043','Malaise','Perasaan tidak nyaman yang tidak jelas.','The country was suffering from a general economic malaise.','0'),('wod_0044','Nadir','Titik terendah; titik terburuk.','Losing his job was the nadir of his career.','0'),('wod_0045','Obfuscate','Mengaburkan; membuat bingung.','The politician tried to obfuscate the issue with vague language.','0'),('wod_0046','Palpable','Jelas terasa; nyata.','The tension in the room was palpable before the announcement.','0'),('wod_0047','Querulous','Mengeluh; rewel.','The querulous child would not stop whining about the toy.','0'),('wod_0048','Rancor','Kebencian yang mendalam dan berkepanjangan.','The feud between the families was marked by years of rancor.','0'),('wod_0049','Salient','Paling menonjol; paling penting.','The salient feature of the design was its simplicity.','0'),('wod_0050','Taciturn','Sedikit bicara; pendiam.','The taciturn man rarely contributed to the conversation.','0'),('wod_0051','Undulate','Bergerak dalam gerakan seperti gelombang.','The tall grass began to undulate in the strong wind.','0'),('wod_0052','Vapid','Hambar; tidak menarik.','The conversation quickly turned vapid and boring.','0'),('wod_0053','Wane','Berangsur-angsur berkurang atau melemah.','The moon begins to wane after the full moon phase.','0'),('wod_0054','Xenophobia','Ketakutan atau kebencian terhadap orang asing.','The rise of nationalism often fuels xenophobia.','0'),('wod_0055','Yawn','Menguap; membuka mulut karena kantuk.','A big yawn escaped him as the lecture dragged on.','0'),('wod_0056','Zenith','Titik tertinggi; puncak.','He reached the zenith of his career at the age of forty.','0'),('wod_0057','Acuity','Ketajaman (penglihatan, pikiran).','His mental acuity allowed him to solve complex problems quickly.','0'),('wod_0058','Bolster','Mendukung; memperkuat.','They raised funds to bolster the failing charity.','0'),('wod_0059','Candor','Keterusterangan; kejujuran.','I appreciate your candor in admitting your mistake.','0'),('wod_0060','Delineate','Menggambarkan atau menjelaskan secara tepat.','The map clearly delineates the border between the two countries.','0'),('wod_0061','Elicit','Menimbulkan atau mendapatkan respons.','The interviewer tried to elicit a strong reaction from the politician.','0'),('wod_0062','Furtive','Tersembunyi; dilakukan secara diam-diam.','He cast a furtive glance at his watch during the long meeting.','0'),('wod_0063','Gaudy','Terlalu mencolok; norak.','She wore a gaudy necklace that was too big for her.','0'),('wod_0064','Harbinger','Pertanda; pendahulu.','The robin is considered a harbinger of spring.','0'),('wod_0065','Impassive','Tidak menunjukkan emosi; datar.','The judge remained impassive throughout the emotional testimony.','0'),('wod_0066','Jocund','Ceria; gembira.','The children were jocund during the birthday party.','0'),('wod_0067','Kinetic','Berkaitan dengan gerakan.','The kinetic energy of the car increased as it sped up.','0'),('wod_0068','Languid','Bergerak lambat atau malas-malasan.','A languid wave of his hand dismissed the servant.','0'),('wod_0069','Malediction','Kutukan; sumpah serapah.','The ancient scroll contained a dire malediction.','0'),('wod_0070','Nonchalant','Santai; tidak peduli.','He was nonchalant about the exam, even though he hadn\'t studied.','0'),('wod_0071','Obdurate','Keras kepala; tidak mau berubah.','The obdurate criminal refused to confess his crime.','0'),('wod_0072','Paragon','Contoh sempurna; model.','She is considered a paragon of virtue in the community.','0'),('wod_0073','Quell','Meredakan; menekan.','The police were called to quell the riot.','0'),('wod_0074','Rambunctious','Penuh energi dan sulit dikendalikan.','The rambunctious puppies chased each other around the yard.','0'),('wod_0075','Sanguine','Optimis atau positif, terutama dalam situasi buruk.','Despite the setback, she remained sanguine about her future.','0'),('wod_0076','Trepidation','Perasaan takut atau cemas.','He approached the job interview with trepidation.','0'),('wod_0077','Ubiquity','Kehadiran di mana-mana.','The ubiquity of social media has changed communication.','0'),('wod_0078','Vilify','Menjelek-jelekkan; memfitnah.','The media tried to vilify the celebrity after the scandal.','0'),('wod_0079','Warrant','Membenarkan; menjamin.','His excellent track record warrants a promotion.','0'),('wod_0080','Yearn','Merindukan; mendambakan.','She began to yearn for the comfort of her home.','0'),('wod_0081','Zest','Semangat; antusiasme.','He tackled the new project with great zest.','0'),('wod_0082','Ameliorate','Memperbaiki; membuat lebih baik.','Efforts were made to ameliorate the living conditions of the poor.','0'),('wod_0083','Beguile','Menipu atau memikat dengan cara yang menawan.','The charming salesman managed to beguile the customers.','0'),('wod_0084','Chicanery','Tipu muslihat; kecurangan.','The investigation revealed the chicanery used to hide the profits.','0'),('wod_0085','Decry','Mengecam keras; mengutuk.','The human rights group continued to decry the violence.','0'),('wod_0086','Efface','Menghapus; menghilangkan jejak.','He tried to efface the memory of the mistake.','0'),('wod_0087','Fecund','Subur; mampu menghasilkan banyak.','The scientist hypothesized that the planet was fecund with life.','0'),('wod_0088','Glib','Lancarnya bicara tetapi kurang ketulusan.','His glib response made her suspect he was hiding something.','0'),('wod_0089','Hapless','Tidak beruntung; sial.','The hapless traveler lost his passport and wallet.','0'),('wod_0090','Imbue','Memasukkan atau mengilhami (perasaan, kualitas).','The speech was intended to imbue the soldiers with courage.','0'),('wod_0091','Jejune','Naif; membosankan.','The critic dismissed the novel as jejune and predictable.','0'),('wod_0092','Knell','Bunyi lonceng kematian; pertanda akhir.','The new law sounded the death knell for the small businesses.','0'),('wod_0093','Liturgy','Tata cara ibadah.','The priest followed the ancient liturgy for the ceremony.','0'),('wod_0094','Maxim','Peribahasa; prinsip moral.','Live and let live is a popular maxim.','0'),('wod_0095','Noxious','Beracun; berbahaya.','They had to evacuate due to the noxious fumes.','0'),('wod_0096','Orthodox','Sesuai dengan apa yang diterima atau tradisional.','He followed the orthodox methods of teaching.','0'),('wod_0097','Prattle','Mengoceh tanpa arti; bicara kekanak-kanakan.','The children prattled on about their day at school.','0'),('wod_0098','Redolent','Berbau harum; mengingatkan pada sesuatu.','The kitchen was redolent of freshly baked bread.','0'),('wod_0099','Stolid','Tenang; tidak menunjukkan emosi atau gairah.','The stolid old man showed no reaction to the shocking news.','0'),('wod_100','Truculent','Agresif; suka berkelahi.','The truculent customer demanded to see the manager.','0');
/*!40000 ALTER TABLE `wod` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-09 23:14:32
