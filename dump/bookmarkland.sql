-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: bookmarkzer_application
-- ------------------------------------------------------
-- Server version	8.0.26

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
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `bookmark` VALUES (1,'072e6a8b-d5d7-4f93-8add-d4ed7985a70a','bookmark_1','Adah','2018-06-01 00:00:00','www.flickr.com/1',15,19,358,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(2,'b98059e1-95d2-4f65-867a-64b58f4ff4dd','bookmark_2','Maude','2018-06-01 00:00:00','www.flickr.com/2',20,17,274,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(3,'4632b608-6fc3-4f14-aaea-7f6a66ca5fea','bookmark_3','Lily','2018-06-01 00:00:00','www.flickr.com/3',3,12,235,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(4,'dadfa411-c778-4f60-a3b0-817c0645a9a8','bookmark_4','Gordon','2018-06-01 00:00:00','www.flickr.com/4',19,9,305,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(5,'7ef243ff-dc19-4f05-97dd-6eb1b4049858','bookmark_5','Emory','2018-06-01 00:00:00','www.flickr.com/5',6,11,73,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(6,'47f0d009-5f0d-4f6f-80f0-ba32989637d5','bookmark_6','Shaina','2018-06-01 00:00:00','www.flickr.com/6',16,20,166,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(7,'0761b808-51cd-4ff3-834d-5511c633e8c8','bookmark_7','Terry','2018-06-01 00:00:00','www.flickr.com/7',8,11,160,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(8,'aceb48ca-594e-4f5d-a1bb-45b70f5d40e4','bookmark_8','Samanta','2018-06-01 00:00:00','www.flickr.com/8',19,16,81,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(9,'5a237d22-ebcd-4f9d-b918-28b3f2760244','bookmark_9','Mohammed','2018-06-01 00:00:00','www.flickr.com/9',20,4,246,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(10,'8420d87a-2abb-4f87-b910-2471e4061d2a','bookmark_10','Maximillian','2018-06-01 00:00:00','www.flickr.com/10',10,18,312,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(11,'5ebf6452-3cf5-4fac-a4fb-bcff729ced02','bookmark_11','Reta','2018-06-01 00:00:00','www.flickr.com/11',19,3,348,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(12,'b4d54f3c-8118-4fa4-8a93-1352b3d86d0a','bookmark_12','Clifford','2018-06-01 00:00:00','www.flickr.com/12',1,2,242,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(13,'9da8eb0b-7df5-4f27-8a48-4598c8febe85','bookmark_13','Heath','2018-06-01 00:00:00','www.flickr.com/13',12,7,345,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(14,'fa59759d-d9fb-4fb4-8426-b327ee571d35','bookmark_14','Jaquelin','2018-06-01 00:00:00','www.flickr.com/14',16,6,104,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(15,'2fe99e7a-6d25-4f07-9124-75ef9f9c9393','bookmark_15','Betty','2018-06-01 00:00:00','www.flickr.com/15',6,4,60,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(16,'aa9bed06-eb50-4fcc-b21b-fb42591bf6f2','bookmark_16','Wilber','2018-06-01 00:00:00','www.flickr.com/16',0,5,225,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(17,'ffe85a0d-fdff-4f29-8bdc-bd39bda4df5c','bookmark_17','Estella','2018-06-01 00:00:00','www.flickr.com/17',15,14,261,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(18,'de012477-37ad-4f05-8c47-5696796ea005','bookmark_18','Pierce','2018-06-01 00:00:00','www.flickr.com/18',4,18,26,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(19,'11c64da9-4f60-4f4e-916c-a30c555c554c','bookmark_19','Kathleen','2018-06-01 00:00:00','www.flickr.com/19',1,18,105,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(20,'d0a7265d-4ce9-4ff3-913c-017eb9801964','bookmark_20','Mohammed','2018-06-01 00:00:00','www.flickr.com/20',2,2,189,'video','a:2:{i:0;s:3:\"fun\";i:1;s:5:\"sport\";}'),(21,'43318763-9ad8-4f1a-8b70-e4a811836545','bookmark_21','Bennett','2018-06-01 00:00:00','www.flickr.com/21',6,19,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(22,'10367085-bab2-4fc4-adb3-db046d664889','bookmark_22','Ted','2018-06-01 00:00:00','www.flickr.com/22',5,14,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(23,'163f74ad-5cd6-4f8a-a47b-f7583b85c569','bookmark_23','Kennedy','2018-06-01 00:00:00','www.flickr.com/23',1,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(24,'a95fd121-b4c5-4f8b-8e23-0730f7332119','bookmark_24','Lambert','2018-06-01 00:00:00','www.flickr.com/24',17,20,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(25,'8d375845-a287-4ffc-bb77-ed3094719f1e','bookmark_25','Mittie','2018-06-01 00:00:00','www.flickr.com/25',6,4,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(26,'a2d056d3-423e-4f2a-b33d-85b1c9645ad7','bookmark_26','Kaya','2018-06-01 00:00:00','www.flickr.com/26',8,19,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(27,'9c57cc5e-93d2-4f40-8920-39ba36c5db2b','bookmark_27','Joyce','2018-06-01 00:00:00','www.flickr.com/27',12,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(28,'5eefa11c-83af-4f88-b465-73f8b1992830','bookmark_28','Oran','2018-06-01 00:00:00','www.flickr.com/28',11,20,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(29,'847fa0e2-5989-4f91-8fd7-ff94adfde628','bookmark_29','Salma','2018-06-01 00:00:00','www.flickr.com/29',10,16,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(30,'6183f1bd-1b79-4ff4-bb8e-0c5adef6092d','bookmark_30','Weldon','2018-06-01 00:00:00','www.flickr.com/30',12,2,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(31,'49e7401a-e48f-4fdb-a897-81fad492ba80','bookmark_31','Isidro','2018-06-01 00:00:00','www.flickr.com/31',18,9,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(32,'39192aad-b789-4f4f-90a5-c0a26ad1d798','bookmark_32','Brandt','2018-06-01 00:00:00','www.flickr.com/32',3,12,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(33,'c20049cb-eec7-4f27-a933-7fe6610cfee1','bookmark_33','Kaylin','2018-06-01 00:00:00','www.flickr.com/33',17,7,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(34,'32f40c17-546b-4f88-a060-462cb0656b7f','bookmark_34','Lydia','2018-06-01 00:00:00','www.flickr.com/34',7,11,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(35,'8e097a9f-1eec-4f53-bdf3-8d53f4db1142','bookmark_35','Lincoln','2018-06-01 00:00:00','www.flickr.com/35',15,18,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(36,'327abb25-ed8a-4fa4-8bf8-f03e9c7178d4','bookmark_36','Elise','2018-06-01 00:00:00','www.flickr.com/36',13,13,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(37,'071bbf48-58a0-4f49-80d5-de27a6d85cfc','bookmark_37','Maci','2018-06-01 00:00:00','www.flickr.com/37',7,5,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(38,'ef6a4c6a-4f3e-4f92-8938-a3bbb7c07702','bookmark_38','Freddie','2018-06-01 00:00:00','www.flickr.com/38',18,15,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(39,'75c88157-ea8d-4f15-805b-a3355158ba9e','bookmark_39','Aurore','2018-06-01 00:00:00','www.flickr.com/39',20,0,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(40,'e5fadf2b-f245-4f2f-b529-7a8ac505abda','bookmark_40','Julianne','2018-06-01 00:00:00','www.flickr.com/40',8,1,NULL,'photo','a:2:{i:0;s:7:\"hobbies\";i:1;s:6:\"travel\";}'),(41,'a179e430-6356-4fb5-91b2-ead2e166fa77','such a title for video','smaone','2020-06-01 00:00:00','www.vimeo.com/4242',420,240,60,'video','a:1:{i:0;s:5:\"sport\";}'),(42,'1e797d8b-d5e0-4f45-b1a1-4c2515bb93a2','such a title for photo','joey','2021-06-01 00:00:00','www.vimeo.com/9090',18,24,NULL,'photo','a:1:{i:0;s:6:\"travel\";}');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210312224954','2021-08-15 15:34:20',85);
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

-- Dump completed on 2021-08-15 15:34:21
