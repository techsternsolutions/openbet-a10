-- MySQL dump 10.14  Distrib 5.5.40-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: openbet
-- ------------------------------------------------------
-- Server version	5.5.40-MariaDB-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Contact`
--

DROP TABLE IF EXISTS `Contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `submitted_to_hubspot` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contact`
--

LOCK TABLES `Contact` WRITE;
/*!40000 ALTER TABLE `Contact` DISABLE KEYS */;
INSERT INTO `Contact` VALUES (1,'ksejf','slekdhng','dsrlkgfnh','sekf@efnes.cjf',NULL,1,'2015-01-29 09:37:41'),(2,'Brooke','test','test','test@test.com','test',1,'2015-01-29 10:24:16'),(3,'sefekf','sdfse','sefsef','sdfes@efsef.fe','sefef',1,'2015-01-29 11:56:57'),(4,'Brooke','Test','Test','brooke@webfit.co.nz','Test',1,'2015-01-29 12:07:29'),(5,'Test','Test job','Super company!','alex@webfit.co.nz','Test form on www.openbet.com/account',1,'2015-02-01 04:52:16'),(6,'Test','Test','Test','Test@sefeeffefsfeenefns.fsefne','Test Message',1,'2015-02-01 22:59:45'),(7,'John Dow','Test','Test','dzhdmitry@gmail.com','Message',1,'2015-02-01 23:35:47'),(8,'adfa','dfadf','adf','adadsfadsf@adf.net','adsfasdfadsf',1,'2015-02-02 02:17:37'),(9,'adfa','dfadf','adf','testadf@adsfadsf.met','adsfasdfadsfadfadsf',1,'2015-02-02 02:46:34'),(10,'adfa','dfadf','adf','testadf@adsfadsf.met','adsfasdfadsfadfadsf',1,'2015-02-02 02:47:52'),(11,'Test test','Test','test','test@test.com','test 2',1,'2015-02-02 07:51:15'),(12,'seg','sge','seg','sege@fsf.efef','sfeef',1,'2015-02-02 08:04:59'),(13,'Mega tester','Test job','Super company!','alex@webfit.co.nz','vdfvfdkjvdf',1,'2015-02-02 08:39:09'),(14,'Test test1','test','test','testtest@test.com','test test 2',1,'2015-02-02 08:40:39'),(15,'test test2','test','test','testtest@test.com',NULL,1,'2015-02-02 08:53:07'),(16,'test','test','test','test@test.coma','test',1,'2015-02-02 08:59:19'),(17,'jhjghf hgjfhj','hgchfhg','hgfg','hfjhf@hgcchg.hhf','hgvh',1,'2015-02-02 08:59:31'),(18,'test test','test','test','test@test.coma','test',1,'2015-02-02 09:00:12'),(19,'Anton','Coder','Webfit','komarov.anton@gmail.com','Testing message',1,'2015-02-02 09:02:13'),(20,'Anton','Coder','Webfit','komarov.anton@gmail.com','testing testing',1,'2015-02-02 09:11:34'),(21,'Olivia','TEST','TEST','olivia.gillibrand@openbet.com','TEST',1,'2015-02-02 09:11:49'),(22,'Roger Roger','test','test test','test@test.com','test',1,'2015-02-02 09:11:59'),(23,'Pete Jimbob','Test Title','Test Company','peter.james@openbet.com','This is a test message',1,'2015-02-02 09:28:31'),(24,'Another Test','Test','Test','test@another.com','Test only',1,'2015-02-02 09:50:27'),(25,'Test User','Test Job','Test Company','testmail@article10.com','test message words',1,'2015-02-02 10:52:16');
/*!40000 ALTER TABLE `Contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `submitted_to_hubspot` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'test contact','test job','test company','test@kopalniapikseli.pl','test',1,'2015-02-02 15:03:31'),(2,'Other test','test job','other test compny','test@kopalniapikseli.pl','test test',1,'2015-02-02 15:04:30'),(3,'test test 5','testing','testing again','testing@efee.fefsegh','sgsgse efnks',1,'2015-02-02 15:08:02'),(4,'iPad tester','Ipad','Ipad','ipad@testinghefifnf.com','Hdhrjdk hfhf Hun fhhf',1,'2015-02-03 11:36:25');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20150126123247');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-03 11:42:38
