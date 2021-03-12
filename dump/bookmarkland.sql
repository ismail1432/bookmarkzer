-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: bookmarkzer_application
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Current Database: `bookmarkzer_application`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bookmarkzer_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `bookmarkzer_application`;

--
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookmark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int NOT NULL,
  `width` int NOT NULL,
  `duration` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` tinytext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DA62921DD17F50A6` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
INSERT INTO `bookmark` VALUES (1,'a179e430-6356-4fb5-91b2-ead2e166fa77','bookmark_1','Adah','2018-06-01 00:00:00','www.such-url-1-awesome.com',15,19,358,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(2,'49939d1f-c3c8-4fa9-8783-4e71ceaecf69','bookmark_2','Maude','2018-06-01 00:00:00','www.such-url-2-awesome.com',20,17,274,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(3,'25426808-3d02-4f8e-be88-ba27fae4fbe2','bookmark_3','Lily','2018-06-01 00:00:00','www.such-url-3-awesome.com',3,12,235,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(4,'dcc5a3cd-bb6f-4f01-9c65-5d55338ba9f9','bookmark_4','Gordon','2018-06-01 00:00:00','www.such-url-4-awesome.com',19,9,305,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(5,'ca6a8469-5d34-4f67-85a5-71c788a65312','bookmark_5','Emory','2018-06-01 00:00:00','www.such-url-5-awesome.com',6,11,73,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(6,'c7de538a-0395-4fb4-94ba-a8fbd5f31da7','bookmark_6','Shaina','2018-06-01 00:00:00','www.such-url-6-awesome.com',16,20,166,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(7,'31391b64-d8af-4f75-a8a8-c13089200b01','bookmark_7','Terry','2018-06-01 00:00:00','www.such-url-7-awesome.com',8,11,160,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(8,'ce22d0cb-bb64-4fc1-b0a6-a72b0788fc16','bookmark_8','Samanta','2018-06-01 00:00:00','www.such-url-8-awesome.com',19,16,81,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(9,'86205dba-3cd9-4f73-b2ca-2ae012e9092f','bookmark_9','Mohammed','2018-06-01 00:00:00','www.such-url-9-awesome.com',20,4,246,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(10,'6defa9f2-b775-4f56-a095-6eccb1756f1e','bookmark_10','Maximillian','2018-06-01 00:00:00','www.such-url-10-awesome.com',10,18,312,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(11,'738bc84d-9e2c-4f05-9606-de7163f8f332','bookmark_11','Reta','2018-06-01 00:00:00','www.such-url-11-awesome.com',19,3,348,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(12,'8a244be8-b7f1-4fe7-aa4e-1c6790e38d04','bookmark_12','Clifford','2018-06-01 00:00:00','www.such-url-12-awesome.com',1,2,242,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(13,'98643127-d320-4fc6-afc8-2fea8ae49b98','bookmark_13','Heath','2018-06-01 00:00:00','www.such-url-13-awesome.com',12,7,345,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(14,'53ae3b81-267b-4f3b-8d08-22a1ad7d22ac','bookmark_14','Jaquelin','2018-06-01 00:00:00','www.such-url-14-awesome.com',16,6,104,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(15,'99a68b81-dfc9-4fe3-b4fa-3e96f6fba3b6','bookmark_15','Betty','2018-06-01 00:00:00','www.such-url-15-awesome.com',6,4,60,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(16,'da114410-14c6-4f91-ba50-9760aa831954','bookmark_16','Wilber','2018-06-01 00:00:00','www.such-url-16-awesome.com',0,5,225,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(17,'a6080f4b-269a-4f7f-8bbc-7e9ed668f850','bookmark_17','Estella','2018-06-01 00:00:00','www.such-url-17-awesome.com',15,14,261,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(18,'ea7c630c-8bc6-4fce-ab7a-aa6a821d0345','bookmark_18','Pierce','2018-06-01 00:00:00','www.such-url-18-awesome.com',4,18,26,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(19,'7da1c652-b423-4f09-a894-cd6ac4a58559','bookmark_19','Kathleen','2018-06-01 00:00:00','www.such-url-19-awesome.com',1,18,105,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(20,'81a5f4b0-e0fe-4f2b-8a6f-289fed6c9fb9','bookmark_20','Mohammed','2018-06-01 00:00:00','www.such-url-20-awesome.com',2,2,189,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(21,'ed88b36d-a13e-4fd5-821f-7dec5db1d771','bookmark_21','Bennett','2018-06-01 00:00:00','www.such-url-21-awesome.com',6,19,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(22,'63518fcf-6bc4-4f53-bcfc-6d8a622bbb63','bookmark_22','Ted','2018-06-01 00:00:00','www.such-url-22-awesome.com',5,14,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(23,'ebf60c89-8326-4fca-98fa-f82f2a242226','bookmark_23','Kennedy','2018-06-01 00:00:00','www.such-url-23-awesome.com',1,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(24,'0054c89c-ec2e-4ff2-89ea-5c27e26f312d','bookmark_24','Lambert','2018-06-01 00:00:00','www.such-url-24-awesome.com',17,20,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(25,'75358682-6181-4f1e-a57c-a68e26d57d4f','bookmark_25','Mittie','2018-06-01 00:00:00','www.such-url-25-awesome.com',6,4,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(26,'6cf42aea-177d-4ff1-9a90-91a883304480','bookmark_26','Kaya','2018-06-01 00:00:00','www.such-url-26-awesome.com',8,19,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(27,'9d606cf5-5a51-4f58-a48a-08feecb9b759','bookmark_27','Joyce','2018-06-01 00:00:00','www.such-url-27-awesome.com',12,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(28,'2f2d6571-c348-4f3e-bdef-c119169a360f','bookmark_28','Oran','2018-06-01 00:00:00','www.such-url-28-awesome.com',11,20,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(29,'c1a1e7d8-821d-4f03-974e-6adff2674dff','bookmark_29','Salma','2018-06-01 00:00:00','www.such-url-29-awesome.com',10,16,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(30,'ded000bd-1a53-4f67-b62d-912a214c41ce','bookmark_30','Weldon','2018-06-01 00:00:00','www.such-url-30-awesome.com',12,2,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(31,'f0e8d4d5-18b5-4ffd-8212-07efbe8fff6d','bookmark_31','Isidro','2018-06-01 00:00:00','www.such-url-31-awesome.com',18,9,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(32,'797d5788-3001-4f53-b417-1f5ed10c612c','bookmark_32','Brandt','2018-06-01 00:00:00','www.such-url-32-awesome.com',3,12,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(33,'ba1f43bf-94ed-4f3b-8dd7-9a894278d0fe','bookmark_33','Kaylin','2018-06-01 00:00:00','www.such-url-33-awesome.com',17,7,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(34,'7985ea5d-f38a-4f82-93cc-f490636e7bba','bookmark_34','Lydia','2018-06-01 00:00:00','www.such-url-34-awesome.com',7,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(35,'b243ee0f-fb22-4f96-a21e-49c9b8ce3484','bookmark_35','Lincoln','2018-06-01 00:00:00','www.such-url-35-awesome.com',15,18,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(36,'c22d32da-64e3-4f49-9fa6-5fcf80ba1c01','bookmark_36','Elise','2018-06-01 00:00:00','www.such-url-36-awesome.com',13,13,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(37,'7b49870c-a837-4f25-aa10-8f45471479a2','bookmark_37','Maci','2018-06-01 00:00:00','www.such-url-37-awesome.com',7,5,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(38,'01da247b-bf87-4fa3-8c19-296cb820b080','bookmark_38','Freddie','2018-06-01 00:00:00','www.such-url-38-awesome.com',18,15,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(39,'ced05eab-9406-4fe9-965d-55728489f221','bookmark_39','Aurore','2018-06-01 00:00:00','www.such-url-39-awesome.com',20,0,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(40,'b84aed2d-d433-4f28-a47a-d0ac3c4771b1','bookmark_40','Julianne','2018-06-01 00:00:00','www.such-url-40-awesome.com',8,1,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(41,'5ef4be34-fecc-4f33-98da-ef6c62b1d85d','such a title for video','smaone','2020-06-01 00:00:00','www.super.fr',420,240,60,'video','a:1:{i:0;s:5:\"sport\";}'),(42,'40692f14-4ecb-4fd0-9d08-e2bf50051370','such a title for photo','joey','2021-06-01 00:00:00','www.genius.fr',18,24,NULL,'photo','a:1:{i:0;s:6:\"travel\";}');
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210312224954','2021-03-12 22:56:43',83);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-12 22:56:45
