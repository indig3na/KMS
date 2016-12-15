-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: wf3.progweb.fr    Database: saliab_sql2
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `act_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_name` varchar(45) NOT NULL,
  `act_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `act_updated` timestamp NULL DEFAULT NULL,
  `act_material` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,'Séance de DA','2016-12-12 22:19:27',NULL,'Vidéoprojecteur'),(2,'Chant','2016-12-12 22:19:27',NULL,'Chaîne HIFI'),(3,'Football','2016-12-12 22:19:27',NULL,'Ballons de foot'),(4,'Basket-Ball','2016-12-12 22:19:27',NULL,'Ballons de basket'),(5,'Natation','2016-12-12 22:19:27',NULL,'Bouet'),(6,'Dessin','2016-12-12 22:19:27',NULL,NULL),(7,'Ecriture','2016-12-12 22:19:27',NULL,NULL),(8,'Travaux Manuels','2016-12-12 22:19:27',NULL,NULL),(9,'Récitation','2016-12-12 22:19:27',NULL,NULL),(10,'Informatique','2016-12-12 22:19:27',NULL,'Ordinateurs');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `adm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adm_firstname` varchar(45) DEFAULT NULL,
  `adm_lastname` varchar(255) DEFAULT NULL,
  `adm_email` varchar(255) DEFAULT NULL,
  `adm_password` varchar(255) DEFAULT NULL,
  `adm_token` varchar(45) DEFAULT NULL,
  `adm_telephone` double DEFAULT NULL,
  `adm_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `adm_updated` varchar(45) DEFAULT NULL,
  `city_cit_id` int(10) unsigned DEFAULT NULL,
  `nursery_nur_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`adm_id`),
  KEY `fk_administrator_city1_idx` (`city_cit_id`),
  KEY `fk_administrator_nursery1_idx` (`nursery_nur_id`),
  CONSTRAINT `fk_administrator_city1` FOREIGN KEY (`city_cit_id`) REFERENCES `city` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_administrator_nursery1` FOREIGN KEY (`nursery_nur_id`) REFERENCES `nursery` (`nur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'Salia','Bodian','sbodian@gmail.com',NULL,NULL,352661554477,'2016-12-12 22:26:56',NULL,1,1),(2,'Flavio','De Melo','fmelo@gmail.com',NULL,NULL,392668555577,'2016-12-12 22:26:56',NULL,4,1),(3,'Hicham','Ahrach','ahrach@gmail.com',NULL,NULL,312691455577,'2016-12-12 22:26:56',NULL,4,1),(4,'Charles','Eilenbecker','ceilenbecker@gmail.com',NULL,NULL,352691459977,'2016-12-12 22:26:56',NULL,5,1);
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `child`
--

DROP TABLE IF EXISTS `child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `child` (
  `chd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chd_firstname` varchar(45) DEFAULT NULL,
  `chd_lastname` varchar(64) DEFAULT NULL,
  `chd_birthday` date DEFAULT NULL,
  `chd_gender` enum('M','F') DEFAULT NULL,
  `chd_hobbies` varchar(255) DEFAULT NULL,
  `chd_comments` varchar(255) DEFAULT NULL,
  `chd_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `chd_updated` timestamp NULL DEFAULT NULL,
  `class_cls_id` int(10) unsigned DEFAULT NULL,
  `parent_par_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`chd_id`),
  KEY `fk_child_class_idx` (`class_cls_id`),
  KEY `fk_child_parent1_idx` (`parent_par_id`),
  CONSTRAINT `fk_child_class` FOREIGN KEY (`class_cls_id`) REFERENCES `class` (`cls_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_child_parent1` FOREIGN KEY (`parent_par_id`) REFERENCES `parent` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `child`
--

LOCK TABLES `child` WRITE;
/*!40000 ALTER TABLE `child` DISABLE KEYS */;
INSERT INTO `child` VALUES (34,'Sidy Malick','Bodian','0000-00-00','M','Basket Ball','RAS','2016-12-13 00:29:28',NULL,1,1),(35,'Cynthia','Mbaye','0000-00-00','F','Natation','RAS','2016-12-13 00:29:28',NULL,1,2),(36,'Alfred','Boilo','0000-00-00','M','Tennis','RAS','2016-12-13 00:29:28',NULL,1,3),(37,'Mirma','Du Chic','0000-00-00','F','Natation','RAS','2016-12-13 00:29:28',NULL,1,4),(38,'Adi','Digo','0000-00-00','F','Natation','RAS','2016-12-13 00:29:28',NULL,1,4),(39,'Annick','Benoit','0000-00-00','F','Tennis','RAS','2016-12-13 00:29:28',NULL,2,5),(40,'Claude','David','0000-00-00','M','Football','RAS','2016-12-13 00:29:28',NULL,2,6),(41,'Madina','Hamler','0000-00-00','F','Tennis','RAS','2016-12-13 00:29:28',NULL,1,7),(42,'Aïcha','Dia','0000-00-00','F','Tennis','RAS','2016-12-13 00:29:28',NULL,2,8),(43,'Annette','Santos','0000-00-00','F','Natation','RAS','2016-12-13 00:29:28',NULL,2,9),(44,'Kadija','Ourouch','0000-00-00','F','Natation','RAS','2016-12-13 00:29:28',NULL,2,10);
/*!40000 ALTER TABLE `child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `cit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cit_name` varchar(45) DEFAULT NULL,
  `cit_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cit_updated` timestamp NULL DEFAULT NULL,
  `country_cou_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cit_id`),
  KEY `fk_city_country1_idx` (`country_cou_id`),
  CONSTRAINT `fk_city_country1` FOREIGN KEY (`country_cou_id`) REFERENCES `country` (`cou_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Esch-sur-Alzette','2016-12-12 22:11:55',NULL,1),(2,'Luxembourg','2016-12-12 22:11:55',NULL,1),(3,'Rodange','2016-12-12 22:11:55',NULL,1),(4,'Differdange','2016-12-12 22:11:55',NULL,1),(5,'Clervaux','2016-12-12 22:11:55',NULL,1),(6,'Trois-vierges','2016-12-12 22:11:55',NULL,1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `cls_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cls_name` varchar(45) DEFAULT NULL,
  `cls_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cls_updated` timestamp NULL DEFAULT NULL,
  `program_prg_id` int(10) unsigned NOT NULL,
  `school_year_scy_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cls_id`),
  KEY `fk_class_program1_idx` (`program_prg_id`),
  KEY `fk_class_school_year1_idx` (`school_year_scy_id`),
  CONSTRAINT `fk_class_program1` FOREIGN KEY (`program_prg_id`) REFERENCES `program` (`prg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_school_year1` FOREIGN KEY (`school_year_scy_id`) REFERENCES `school_year` (`scy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'Les poussins','2016-12-12 23:14:58',NULL,2,1),(2,'Les Louvetaux','2016-12-12 23:14:58',NULL,3,1);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_has_classroom`
--

DROP TABLE IF EXISTS `class_has_classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_has_classroom` (
  `class_cls_id` int(10) unsigned NOT NULL,
  `classroom_clr_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`class_cls_id`,`classroom_clr_id`),
  KEY `fk_class_has_classroom_classroom1_idx` (`classroom_clr_id`),
  KEY `fk_class_has_classroom_class1_idx` (`class_cls_id`),
  CONSTRAINT `fk_class_has_classroom_class1` FOREIGN KEY (`class_cls_id`) REFERENCES `class` (`cls_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_has_classroom_classroom1` FOREIGN KEY (`classroom_clr_id`) REFERENCES `classroom` (`clr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_has_classroom`
--

LOCK TABLES `class_has_classroom` WRITE;
/*!40000 ALTER TABLE `class_has_classroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_has_classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom` (
  `clr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clr_name` varchar(45) DEFAULT NULL,
  `clr_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `clr_updated` timestamp NULL DEFAULT NULL,
  `clr_caracteristics` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom`
--

LOCK TABLES `classroom` WRITE;
/*!40000 ALTER TABLE `classroom` DISABLE KEYS */;
INSERT INTO `classroom` VALUES (1,'Salle foot','2016-12-12 22:30:43',NULL,'55 places'),(2,'Salle Cinéma','2016-12-12 22:30:43',NULL,'80 places'),(3,'Salle de basket','2016-12-12 22:30:43',NULL,'45 places'),(4,'Salle A','2016-12-12 22:30:43',NULL,'10 places'),(5,'Salle A2','2016-12-12 22:30:43',NULL,'15 places'),(6,'Salle B4','2016-12-12 22:30:43',NULL,'12 places');
/*!40000 ALTER TABLE `classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `cou_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(45) DEFAULT NULL,
  `cou_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cou_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Grand-Duché du Luxembourg','2016-12-12 22:01:53',NULL);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_report`
--

DROP TABLE IF EXISTS `daily_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_report` (
  `drp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `drp_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `drp_updated` timestamp NULL DEFAULT NULL,
  `child_chd_id` int(10) unsigned NOT NULL,
  `educator_edu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`drp_id`),
  KEY `fk_daily_report_child1_idx` (`child_chd_id`),
  KEY `fk_daily_report_educator1_idx` (`educator_edu_id`),
  CONSTRAINT `fk_daily_report_child1` FOREIGN KEY (`child_chd_id`) REFERENCES `child` (`chd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_daily_report_educator1` FOREIGN KEY (`educator_edu_id`) REFERENCES `educator` (`edu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_report`
--

LOCK TABLES `daily_report` WRITE;
/*!40000 ALTER TABLE `daily_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educator`
--

DROP TABLE IF EXISTS `educator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educator` (
  `edu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `edu_firstname` varchar(45) DEFAULT NULL,
  `edu_lastname` varchar(255) DEFAULT NULL,
  `edu_email` varchar(255) DEFAULT NULL,
  `edu_password` varchar(255) DEFAULT NULL,
  `edu_token` varchar(45) DEFAULT NULL,
  `edu_telephone` double DEFAULT NULL,
  `edu_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `edu_updated` varchar(45) DEFAULT NULL,
  `class_cls_id` int(10) unsigned DEFAULT NULL,
  `city_cit_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`edu_id`),
  KEY `fk_educator_class1_idx` (`class_cls_id`),
  KEY `fk_educator_city1_idx` (`city_cit_id`),
  CONSTRAINT `fk_educator_city1` FOREIGN KEY (`city_cit_id`) REFERENCES `city` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_educator_class1` FOREIGN KEY (`class_cls_id`) REFERENCES `class` (`cls_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educator`
--

LOCK TABLES `educator` WRITE;
/*!40000 ALTER TABLE `educator` DISABLE KEYS */;
INSERT INTO `educator` VALUES (6,'Anna','Wagner','awagner@gmail.com',NULL,NULL,352691554477,'2016-12-12 23:16:47',NULL,1,1),(7,'Johanna','Brendt','jbrendt@gmail.com',NULL,NULL,3526661554477,'2016-12-12 23:16:47',NULL,1,5),(8,'Albert','Einstein','aeinstein@gmail.com',NULL,NULL,352671884477,'2016-12-12 23:16:47',NULL,2,3),(9,'Jacques','Davenport','jdavenport@gmail.com',NULL,NULL,352691558877,'2016-12-12 23:16:47',NULL,2,4),(10,'Helene','Degeneres','hdegeneres@gmail.com',NULL,NULL,352661554787,'2016-12-12 23:16:47',NULL,1,1);
/*!40000 ALTER TABLE `educator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthly_report`
--

DROP TABLE IF EXISTS `monthly_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthly_report` (
  `mrp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mrp_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mrp_updated` timestamp NULL DEFAULT NULL,
  `child_chd_id` int(10) unsigned NOT NULL,
  `educator_edu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mrp_id`),
  KEY `fk_monthly_report_child1_idx` (`child_chd_id`),
  KEY `fk_monthly_report_educator1_idx` (`educator_edu_id`),
  CONSTRAINT `fk_monthly_report_child1` FOREIGN KEY (`child_chd_id`) REFERENCES `child` (`chd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_monthly_report_educator1` FOREIGN KEY (`educator_edu_id`) REFERENCES `educator` (`edu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthly_report`
--

LOCK TABLES `monthly_report` WRITE;
/*!40000 ALTER TABLE `monthly_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `monthly_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nursery`
--

DROP TABLE IF EXISTS `nursery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nursery` (
  `nur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nur_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nur_updated` timestamp NULL DEFAULT NULL,
  `nur_name` varchar(255) DEFAULT NULL,
  `nur_address` varchar(255) DEFAULT NULL,
  `nur_email` varchar(255) DEFAULT NULL,
  `nur_telephone` double DEFAULT NULL,
  `nur_website` varchar(255) DEFAULT NULL,
  `city_cit_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`nur_id`),
  KEY `fk_nursery_city1_idx` (`city_cit_id`),
  CONSTRAINT `fk_nursery_city1` FOREIGN KEY (`city_cit_id`) REFERENCES `city` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nursery`
--

LOCK TABLES `nursery` WRITE;
/*!40000 ALTER TABLE `nursery` DISABLE KEYS */;
INSERT INTO `nursery` VALUES (1,'2016-12-12 22:54:37',NULL,'La Belle enfance','2, Rue Jos Wagner','la-belle-enfance@gmail.com',3522792255,'www.la-belle-enfance.lu',1);
/*!40000 ALTER TABLE `nursery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `par_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `par_firstname` varchar(45) DEFAULT NULL,
  `par_tel_mobile_1` double DEFAULT NULL,
  `par_lastname` varchar(255) DEFAULT NULL,
  `par_address` varchar(255) DEFAULT NULL,
  `par_tel_mobile_2` double DEFAULT NULL,
  `par_tel_bureau` double DEFAULT NULL,
  `par_tel_domicile` double DEFAULT NULL,
  `par_password` varchar(255) DEFAULT NULL,
  `par_token` varchar(255) DEFAULT NULL,
  `par_email` varchar(255) DEFAULT NULL,
  `par_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `par_updated` timestamp NULL DEFAULT NULL,
  `city_cit_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`par_id`),
  KEY `fk_parent_city1_idx` (`city_cit_id`),
  CONSTRAINT `fk_parent_city1` FOREIGN KEY (`city_cit_id`) REFERENCES `city` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'Mandialy',3526655884477,'Bodian','2 rue Boltgen',3526655884468,352274468,352274468,NULL,NULL,'mbodian@gmail.com','2016-12-12 23:42:35',NULL,1),(2,'Anne Marie',3526654455477,'MBAYE','2 rue Charlemagne',3526658814468,352277768,352277768,NULL,NULL,'ambaye@gmail.com','2016-12-12 23:42:35',NULL,3),(3,'André',3526655845477,'Boilo','10 rue des Rois',3526655884468,352277768,352274758,NULL,NULL,'aboilo@gmail.com','2016-12-12 23:42:35',NULL,4),(4,'Laurent',3526657884477,'Du Chic','12 rue Hammelus',3526655451268,352271468,352277468,NULL,NULL,'duchic@gmail.com','2016-12-12 23:42:35',NULL,1),(5,'Patrick',3526654512477,'Digo','3 rue de Brussele',3526618544468,352277768,352277868,NULL,NULL,'pdiogo@gmail.com','2016-12-12 23:42:35',NULL,6),(6,'Pierre',3526451284477,'Benoit','2 rue de Paris',35266558844515,352782568,352277468,NULL,NULL,'pbenoit@gmail.com','2016-12-12 23:42:35',NULL,1),(7,'Charles',3526655784477,'David','2 rue Hammerville',3526655887868,352274478,352277568,NULL,NULL,'cdavid@gmail.com','2016-12-12 23:42:35',NULL,3),(8,'John',3526655784477,'Hamler','10 rue Richard',3526655888868,352277268,352277568,NULL,NULL,'jhamler@gmail.com','2016-12-12 23:42:35',NULL,1),(9,'Oumar',3526652584477,'Dia','2 rue Boltgen',3526655784468,352277768,352784468,NULL,NULL,'odia@gmail.com','2016-12-12 23:42:35',NULL,1),(10,'Laurent',3526655878257,'Santos','3 rue Charles De Gaule',352665587825468,352274788,352274468,NULL,NULL,'lsantos@gmail.com','2016-12-12 23:42:35',NULL,1),(11,'Abdoul',3526645254477,'Ourouch','88 rue Hamrich',3526655884425,352272568,352277568,NULL,NULL,'aourouch@gmail.com','2016-12-12 23:42:35',NULL,4);
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `prg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prg_name` varchar(45) DEFAULT NULL,
  `prg_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `prg_updated` timestamp NULL DEFAULT NULL,
  `nursery_nur_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`prg_id`),
  KEY `fk_program_nursery1_idx` (`nursery_nur_id`),
  CONSTRAINT `fk_program_nursery1` FOREIGN KEY (`nursery_nur_id`) REFERENCES `nursery` (`nur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (1,'Programme pour enfants de 1 à 2 ans','2016-12-12 22:39:29',NULL,1),(2,'Programme pour enfants de 3 à 4 ans','2016-12-12 22:39:29',NULL,1),(3,'Programme pour enfants de 4 à 5 ans','2016-12-12 22:39:29',NULL,1),(4,'Programme pour enfants de 6 à 7 ans','2016-12-12 22:39:29',NULL,1),(5,'Programme pour enfants de 8 à 9 ans','2016-12-12 22:39:29',NULL,1);
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_has_activity`
--

DROP TABLE IF EXISTS `program_has_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_has_activity` (
  `program_prg_id` int(10) unsigned NOT NULL,
  `activity_act_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`program_prg_id`,`activity_act_id`),
  KEY `fk_program_has_activity_activity1_idx` (`activity_act_id`),
  KEY `fk_program_has_activity_program1_idx` (`program_prg_id`),
  CONSTRAINT `fk_program_has_activity_program1` FOREIGN KEY (`program_prg_id`) REFERENCES `program` (`prg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_program_has_activity_activity1` FOREIGN KEY (`activity_act_id`) REFERENCES `activity` (`act_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_has_activity`
--

LOCK TABLES `program_has_activity` WRITE;
/*!40000 ALTER TABLE `program_has_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `program_has_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_year`
--

DROP TABLE IF EXISTS `school_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_year` (
  `scy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scy_year` varchar(45) DEFAULT NULL,
  `scy_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scy_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`scy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_year`
--

LOCK TABLES `school_year` WRITE;
/*!40000 ALTER TABLE `school_year` DISABLE KEYS */;
INSERT INTO `school_year` VALUES (1,'2015-2016','2016-12-12 22:34:32',NULL),(2,'2016-2017','2016-12-12 22:34:32',NULL),(3,'2017-2018','2016-12-12 22:34:32',NULL);
/*!40000 ALTER TABLE `school_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `user`
--

DROP TABLE IF EXISTS `user`;
/*!50001 DROP VIEW IF EXISTS `user`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `user` AS SELECT 
 1 AS `usr_id`,
 1 AS `usr_lastname`,
 1 AS `usr_firstname`,
 1 AS `usr_email`,
 1 AS `usr_password`,
 1 AS `usr_role`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `user`
--

/*!50001 DROP VIEW IF EXISTS `user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`saliab`@`localhost` SQL SECURITY INVOKER */
/*!50001 VIEW `user` AS select (`administrator`.`adm_id` * 10) AS `usr_id`,`administrator`.`adm_lastname` AS `usr_lastname`,`administrator`.`adm_firstname` AS `usr_firstname`,`administrator`.`adm_email` AS `usr_email`,`administrator`.`adm_password` AS `usr_password`,'admin' AS `usr_role` from `administrator` union select ((`educator`.`edu_id` * 10) + 1) AS ```educator``.``edu_id``*10 +1`,`educator`.`edu_lastname` AS `edu_lastname`,`educator`.`edu_firstname` AS `edu_firstname`,`educator`.`edu_email` AS `edu_email`,`educator`.`edu_password` AS `edu_password`,'educator' AS `educator` from `educator` union select ((`parent`.`par_id` * 10) + 2) AS ```parent``.``par_id``*10 +2`,`parent`.`par_lastname` AS `par_lastname`,`parent`.`par_firstname` AS `par_firstname`,`parent`.`par_email` AS `par_email`,`parent`.`par_password` AS `par_password`,'parent' AS `parent` from `parent` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13 12:26:59
