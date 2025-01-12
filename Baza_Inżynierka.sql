-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: baza_gym
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pdf_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (4,'documents/rejestr_dobowy_2024-12-18.pdf','2024-12-18 13:16:16','2024-12-18 13:16:16','rejestr_dobowy_2024-12-18.pdf'),(5,'documents/rejestr_dobowy_2024-12-28.pdf','2024-12-28 23:18:16','2024-12-28 23:18:16','rejestr_dobowy_2024-12-28.pdf'),(6,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:15:15','2024-12-29 14:15:15','rejestr_dobowy_2024-12-29.pdf'),(7,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:15:52','2024-12-29 14:15:52','rejestr_dobowy_2024-12-29.pdf'),(8,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:16:00','2024-12-29 14:16:00','rejestr_dobowy_2024-12-29.pdf'),(9,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:32:38','2024-12-29 14:32:38','rejestr_dobowy_2024-12-29.pdf'),(10,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:34:16','2024-12-29 14:34:16','rejestr_dobowy_2024-12-29.pdf'),(11,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:37:51','2024-12-29 14:37:51','rejestr_dobowy_2024-12-29.pdf'),(12,'documents/rejestr_dobowy_2024-12-29.pdf','2024-12-29 14:38:21','2024-12-29 14:38:21','rejestr_dobowy_2024-12-29.pdf'),(13,'documents/rejestr_dobowy_2025-01-02.pdf','2025-01-02 00:25:12','2025-01-02 00:25:12','rejestr_dobowy_2025-01-02.pdf'),(14,'documents/rejestr_dobowy_2025-01-02.pdf','2025-01-02 00:25:12','2025-01-02 00:25:12','rejestr_dobowy_2025-01-02.pdf'),(15,'documents/rejestr_dobowy_2025-01-06.pdf','2025-01-06 01:39:11','2025-01-06 01:39:11','rejestr_dobowy_2025-01-06.pdf');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_klienci`
--

DROP TABLE IF EXISTS `liste_klienci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liste_klienci` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waga` decimal(5,2) DEFAULT NULL,
  `wzrost` decimal(5,2) DEFAULT NULL,
  `plec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_zapisania` date NOT NULL,
  `aktywny` tinyint(1) NOT NULL DEFAULT '1',
  `notatki` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profilowe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_urodzenia` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `liste_klienci_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_klienci`
--

LOCK TABLES `liste_klienci` WRITE;
/*!40000 ALTER TABLE `liste_klienci` DISABLE KEYS */;
INSERT INTO `liste_klienci` VALUES (1,'Jan','Kowalski','jan.kowalski@example.com','987654321',100.50,180.00,'M','2025-01-02',1,'No ołrajd',NULL,'2025-01-01 23:24:12','profile/1.jpg','2018-06-20'),(2,'Anna','Nowak','anna.nowak@example.com','098765432',65.00,170.00,'K','2024-10-23',0,'Ona',NULL,'2024-12-28 22:33:45',NULL,'1994-07-31'),(3,'Marek','Zieliński','marek.zielinski@example.com','102938475',90.00,185.00,'M','2024-11-13',0,'Zainteresowany treningiem z trenerem',NULL,'2024-12-28 22:33:45',NULL,'1997-06-18'),(4,'Ewa','Kwiatkowska','ewa.kwiatkowska@example.com','564738291',60.00,165.00,'K','2024-10-23',0,'Trenuje głównie cardio.',NULL,'2024-12-28 22:33:45',NULL,'1983-08-09'),(5,'Piotr','Nowicki','piotr.nowicki@example.com','019283746',85.00,178.00,'M','2024-11-13',0,'Nowy w siłowni.',NULL,'2024-12-28 22:33:45',NULL,'2005-08-06'),(6,'Karolina','Lis','karolina.lis@example.com','817263548',55.00,160.00,'K','2024-10-23',0,'Preferuje trening siłowy.',NULL,'2024-12-28 22:33:45',NULL,'2007-03-30'),(7,'On','Inniejszy','mail@mail.pl','606606606',100.00,162.00,'M','2024-10-29',0,NULL,'2024-10-29 01:03:02','2024-12-28 22:33:45',NULL,'1999-06-16'),(8,'Ludmiła','Koc','ludmi.koc@example.com','765983456',97.00,206.00,'K','2024-11-12',0,'','2024-10-29 16:27:46','2024-12-28 22:33:45',NULL,'2005-07-18'),(19,'Patrick','Batemna','przykladowymail@com.pl','789765345',75.00,181.00,'M','2025-01-01',1,'Aktor Hollywood','2025-01-05 16:44:37','2025-01-05 17:02:45','profile/1736099077.jpg','1999-01-10');
/*!40000 ALTER TABLE `liste_klienci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_produkty`
--

DROP TABLE IF EXISTS `liste_produkty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liste_produkty` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stock` int NOT NULL,
  `zdjecie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_produkty`
--

LOCK TABLES `liste_produkty` WRITE;
/*!40000 ALTER TABLE `liste_produkty` DISABLE KEYS */;
INSERT INTO `liste_produkty` VALUES (1,'Ręcznik',35.00,23,'produkty/1.jpg'),(2,'Woda niegazowana',5.00,200,'produkty/2.jpg'),(3,'Napój izotoniczny',5.50,299,'produkty/3.jpg'),(4,'Przedtreningówki',7.00,60,'produkty/4.jpg'),(5,'BCAA',4.00,0,'produkty/5.jpg'),(6,'Koszulka klubowa',80.00,100,'produkty/6.jpg'),(7,'Białko',7.00,120,'produkty/7.jpg'),(8,'Baton proteinowy',10.00,150,'produkty/8.jpg');
/*!40000 ALTER TABLE `liste_produkty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7,'2019_12_14_000001_create_personal_access_tokens_table',1),(8,'2024_06_07_094114_create_liste_klienci',1),(9,'2024_10_23_091822_create_uzytkownicy',1),(10,'2024_10_23_103941_create_uzytkownicy',2),(11,'2024_10_23_112233_create_uzytkowniks_table',3),(12,'2024_10_23_112233_create_uzytkownik_table',4),(13,'2024_11_09_104328_create_liste_produkty',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` int NOT NULL,
  `desc1` varchar(255) DEFAULT NULL,
  `desc2` varchar(255) DEFAULT NULL,
  `desc3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,1,'Personel1 6-14','Personel2 14-22','Mariusz 6-14','2024-12-23 14:09:02','2025-01-06 00:52:56'),(2,2,'Personel2 6-14','Personel3 14-22',NULL,'2024-12-23 14:09:02','2024-12-28 22:25:07'),(3,3,'Mariusz 6-14','Personel1 14-22','Personel3 14-22','2024-12-23 14:09:02','2025-01-06 00:52:56'),(4,4,'Mariusz 6-14','Personel2 14-22','Personel3 14-22','2024-12-23 14:09:02','2025-01-06 00:52:56'),(5,5,'Mariusz 6-14','Personel3 14-22',NULL,'2024-12-23 14:09:02','2025-01-06 00:52:56'),(6,6,'Personel3 6-14','Personel1 14-22','Mariusz 6-14','2024-12-23 14:09:02','2025-01-06 00:52:56'),(7,7,'Personel1 6-14','Personel2 14-22',NULL,'2024-12-23 14:09:02','2024-12-28 22:25:07'),(8,8,'Personel2 6-14','Personel3 14-22','Mariusz 18-22','2024-12-23 14:09:02','2025-01-06 00:52:56'),(9,9,'Personel3 6-14','Personel1 14-22','Mariusz 16-22','2024-12-23 14:09:02','2025-01-06 00:52:56'),(10,10,'Personel1 6-14','Personel2 14-22',NULL,'2024-12-23 14:09:02','2024-12-28 22:25:07'),(11,11,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(12,12,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(13,13,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(14,14,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(15,15,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(16,16,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(17,17,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(18,18,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(19,19,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(20,20,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(21,21,NULL,NULL,NULL,'2024-12-23 14:09:02','2024-12-23 14:09:02'),(22,22,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(23,23,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(24,24,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(25,25,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(26,26,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(27,27,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(28,28,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(29,29,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(30,30,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:09:03'),(31,31,NULL,NULL,NULL,'2024-12-23 14:09:03','2024-12-23 14:34:34');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'2x Napój izotoniczny',11.00,'2024-12-29 13:24:51','2024-12-29 13:24:51'),(2,'3x Napój izotoniczny, 3x Przedtreningówki',37.50,'2024-12-29 13:25:14','2024-12-29 13:25:14'),(3,'6x Napój izotoniczny',33.00,'2024-12-29 13:25:46','2024-12-29 13:25:46'),(4,'4x Napój izotoniczny, 2x Białko',36.00,'2025-01-01 23:25:00','2025-01-01 23:25:00'),(5,'10x Ręcznik',300.00,'2025-01-01 23:25:56','2025-01-01 23:25:56'),(6,'5x Ręcznik',175.00,'2025-01-06 00:20:34','2025-01-06 00:20:34'),(7,'5x Ręcznik, 2x Napój izotoniczny',186.00,'2025-01-06 00:23:29','2025-01-06 00:23:29');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzytkownik`
--

DROP TABLE IF EXISTS `uzytkownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uzytkownik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzytkownik`
--

LOCK TABLES `uzytkownik` WRITE;
/*!40000 ALTER TABLE `uzytkownik` DISABLE KEYS */;
INSERT INTO `uzytkownik` VALUES (1,'Niner123','$2y$10$GSvVxN38kH2mqZ4BEGe2se8.SO9THg/TQw2.soDaqdYto8ARYPbV2','2024-10-23 09:40:47','2024-10-23 09:40:47'),(3,'Personel123','$2y$10$BofD8.6oX3kUSEtJpGiif.Zm0A4qUm3eOWqw0ioZjs2oy40aVlZ02','2024-10-28 23:45:33','2024-10-28 23:45:33'),(4,'Julia','$2y$10$KphqVrs6e907ovOUYco4b.px4N/sQ2wvN.yPRDU2QF.NR9AZDCSBa','2024-10-29 16:21:04','2024-10-29 16:21:04'),(6,'Mariusz','$2y$10$bdPVExx6d.qGzWwFof/9yObatjOzrr5zkHIjwfJqi0InI1cTc54aa','2025-01-05 16:18:17','2025-01-05 16:18:17');
/*!40000 ALTER TABLE `uzytkownik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-12 16:46:05
