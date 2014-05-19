-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: booking
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `language` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `subject` varchar(250) NOT NULL,
  `treatment` varchar(250) NOT NULL,
  `ps` varchar(250) NOT NULL,
  UNIQUE KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` (`language`, `text`, `subject`, `treatment`, `ps`) VALUES ('en','We\'re informing you that you\'ves succesfully reserved table(s) number <tables> for <number> guests. <author>.','REDTable reservation.','Dear <title> <name>,','<start>-<end>'),('ge','','','','');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `outlet_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_settings` (
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings`
--

LOCK TABLES `general_settings` WRITE;
/*!40000 ALTER TABLE `general_settings` DISABLE KEYS */;
INSERT INTO `general_settings` (`logo`) VALUES ('1468025.jpg');
/*!40000 ALTER TABLE `general_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holidays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `message` text NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` (`id`, `name`, `start`, `end`, `message`, `outlet_id`) VALUES (28,'Hellowin','2014-05-23','2014-05-25','Happy Hellowin!',112),(31,'New Year','2014-05-31','2014-05-28','Happy New Year!',0),(32,'qwe','0000-00-00','0000-00-00','',113),(33,'New Year','2014-05-01','2014-05-03','Happy New Year!',0);
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `concert_name` varchar(50) DEFAULT NULL,
  `concert_start` time DEFAULT NULL,
  `concert_end` time DEFAULT NULL,
  `not_bookable_table_lunch` int(10) NOT NULL,
  `not_bookable_table_dinner` int(10) NOT NULL,
  `not_bookable_table_pre_concert` int(10) NOT NULL,
  `not_bookable_table_concert` int(10) NOT NULL,
  `not_bookable_table_post_concert` int(10) NOT NULL,
  `outlet_id` int(10) NOT NULL,
  `concert_date` date DEFAULT NULL,
  `concert_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` (`id`, `concert_name`, `concert_start`, `concert_end`, `not_bookable_table_lunch`, `not_bookable_table_dinner`, `not_bookable_table_pre_concert`, `not_bookable_table_concert`, `not_bookable_table_post_concert`, `outlet_id`, `concert_date`, `concert_description`) VALUES (2,'Test','18:00:00','20:00:00',4,0,2,2,0,113,'2014-05-13','fsafgadsfa'),(3,'qwe','16:00:00','19:00:00',2,0,3,0,0,113,'2014-05-15','testtesttest'),(4,'','16:00:00','22:00:00',0,0,0,0,0,113,'2014-05-16',''),(5,'Test','19:00:00','20:00:00',0,0,0,0,0,113,'2014-05-19','Test,test ');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outlets`
--

DROP TABLE IF EXISTS `outlets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outlets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  `seats_number` int(20) NOT NULL,
  `tables_number` int(20) NOT NULL,
  `default_not_bookable_table_lunch` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_dinner` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_pre_concert` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_concert` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_post_concert` int(5) NOT NULL DEFAULT '0',
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `break_start_time` time NOT NULL DEFAULT '00:00:00',
  `break_end_time` time NOT NULL DEFAULT '00:00:00',
  `day_off` int(5) NOT NULL,
  `no_show_limit` int(20) NOT NULL DEFAULT '0',
  `staying_time_lunch` time NOT NULL DEFAULT '00:00:00',
  `staying_time_dinner` time NOT NULL DEFAULT '00:00:00',
  `staying_time_pre_concert` time NOT NULL DEFAULT '00:00:00',
  `staying_time_concert` time NOT NULL DEFAULT '00:00:00',
  `staying_time_post_concert` time NOT NULL DEFAULT '00:00:00',
  `open_time_1` time NOT NULL DEFAULT '00:00:00',
  `close_time_1` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_1` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_1` time NOT NULL DEFAULT '00:00:00',
  `open_time_2` time NOT NULL DEFAULT '00:00:00',
  `close_time_2` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_2` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_2` time NOT NULL DEFAULT '00:00:00',
  `open_time_3` time NOT NULL DEFAULT '00:00:00',
  `close_time_3` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_3` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_3` time NOT NULL DEFAULT '00:00:00',
  `open_time_4` time NOT NULL DEFAULT '00:00:00',
  `close_time_4` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_4` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_4` time NOT NULL DEFAULT '00:00:00',
  `open_time_5` time NOT NULL DEFAULT '00:00:00',
  `close_time_5` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_5` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_5` time NOT NULL DEFAULT '00:00:00',
  `open_time_6` time NOT NULL DEFAULT '00:00:00',
  `close_time_6` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_6` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_6` time NOT NULL DEFAULT '00:00:00',
  `open_time_0` time NOT NULL DEFAULT '00:00:00',
  `close_time_0` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_0` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_0` time NOT NULL DEFAULT '00:00:00',
  `online_bookable` tinyint(2) NOT NULL DEFAULT '1',
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  `active` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outlets`
--

LOCK TABLES `outlets` WRITE;
/*!40000 ALTER TABLE `outlets` DISABLE KEYS */;
INSERT INTO `outlets` (`id`, `name`, `email`, `description`, `seats_number`, `tables_number`, `default_not_bookable_table_lunch`, `default_not_bookable_table_dinner`, `default_not_bookable_table_pre_concert`, `default_not_bookable_table_concert`, `default_not_bookable_table_post_concert`, `open_time`, `close_time`, `break_start_time`, `break_end_time`, `day_off`, `no_show_limit`, `staying_time_lunch`, `staying_time_dinner`, `staying_time_pre_concert`, `staying_time_concert`, `staying_time_post_concert`, `open_time_1`, `close_time_1`, `break_start_time_1`, `break_end_time_1`, `open_time_2`, `close_time_2`, `break_start_time_2`, `break_end_time_2`, `open_time_3`, `close_time_3`, `break_start_time_3`, `break_end_time_3`, `open_time_4`, `close_time_4`, `break_start_time_4`, `break_end_time_4`, `open_time_5`, `close_time_5`, `break_start_time_5`, `break_end_time_5`, `open_time_6`, `close_time_6`, `break_start_time_6`, `break_end_time_6`, `open_time_0`, `close_time_0`, `break_start_time_0`, `break_end_time_0`, `online_bookable`, `deleted`, `active`) VALUES (113,'Standart12','qwe@qwe.qwe','wasrfwaset',4,4,1,1,4,1,1,'10:00:00','22:00:00','13:00:00','14:00:00',0,45,'01:00:00','03:00:00','01:00:00','01:00:00','01:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00',1,0,1);
/*!40000 ALTER TABLE `outlets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(50) NOT NULL,
  `guest_last_name` varchar(50) NOT NULL,
  `guest_type` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `guest_number` int(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `confirm_via_email` tinyint(2) NOT NULL,
  `resource` varchar(30) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `outlet_id` int(5) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `provisional` tinyint(5) NOT NULL DEFAULT '0',
  `expiery_date` date NOT NULL,
  `WB` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` (`id`, `guest_name`, `guest_last_name`, `guest_type`, `title`, `guest_number`, `phone`, `email`, `language`, `author`, `status`, `confirm_via_email`, `resource`, `start`, `end`, `outlet_id`, `comment`, `provisional`, `expiery_date`, `WB`) VALUES (128,'гшгшгш','','internet','Mr.',6,'465','ara.gyodakyan@gmail.com','English','','not_show',0,'74,75','2014-05-01 19:00:00','2014-05-01 20:00:00',112,'',0,'0000-00-00',''),(130,'','','internet','Mr.',0,'','','English','','not_show',0,'75','2014-05-01 17:00:00','2014-05-01 18:00:00',112,'',0,'0000-00-00',''),(131,'','','internet','Prof.',0,'','','English','','not_show',0,'72','2014-05-01 15:00:00','2014-05-01 18:00:00',112,'',0,'0000-00-00',''),(132,'','','internet','Mr.',0,'','','English','','cancelled',0,'74','2014-05-01 18:00:00','2014-05-01 19:15:00',112,'',0,'0000-00-00',''),(133,'','','internet','Mr.',0,'','','English','','cancelled',0,'74,75','2014-05-01 18:00:00','2014-05-01 18:45:00',112,'',0,'0000-00-00',''),(134,'','','internet','Mr.',0,'','','English','','cancelled',0,'73','2014-05-01 18:30:00','2014-05-01 19:45:00',112,'',0,'0000-00-00',''),(135,'','','internet','Mr.',0,'','','English','','not_show',0,'72','2014-05-01 18:15:00','2014-05-01 19:15:00',112,'',0,'0000-00-00',''),(136,'','','internet','Mr.',0,'','','English','','cancelled',0,'76','2014-05-01 18:15:00','2014-05-01 19:30:00',112,'',0,'0000-00-00',''),(137,'adasd','','internet','Mr.',2,'','','English','','cancelled',0,'73','2014-05-01 18:00:00','2014-05-01 18:15:00',112,'',0,'0000-00-00',''),(138,'','','internet','Mr.',0,'','','English','','cancelled',0,'74','2014-05-01 18:30:00','2014-05-01 19:00:00',112,'',0,'0000-00-00',''),(139,'','','internet','Mr.',0,'','','English','','not_show',0,'74','2014-05-01 18:00:00','2014-05-01 18:45:00',112,'',0,'0000-00-00',''),(140,'fsa','','internet','Mr.',4,'031651','ara.gyodakyan@gmail.com','English','','',0,'72,73,75','2014-05-01 21:00:00','2014-05-01 21:45:00',112,'',0,'0000-00-00',''),(141,'','','internet','Mr.',0,'','','English','','late',0,'74,75','2014-05-01 20:15:00','2014-05-01 20:30:00',112,'',0,'0000-00-00',''),(142,'','','internet','Mr.',0,'','','English','','cancelled',0,'73,74,75','2014-05-01 20:30:00','2014-05-01 21:00:00',112,'',0,'0000-00-00',''),(143,'','','internet','Mr.',0,'','','English','','cancelled',0,'73,74,75','2014-05-01 20:30:00','2014-05-01 20:45:00',112,'',0,'0000-00-00',''),(144,'','','internet','Mr.',0,'','','English','','cancelled',0,'72,76','2014-05-01 20:30:00','2014-05-01 21:00:00',112,'',0,'0000-00-00',''),(145,'','','internet','Mr.',0,'','','English','','cancelled',0,'75,76','2014-05-01 20:30:00','2014-05-01 20:45:00',112,'',0,'0000-00-00',''),(146,'','','internet','Mr.',0,'','','English','','cancelled',0,'73,74','2014-05-01 20:30:00','2014-05-01 20:45:00',112,'',0,'0000-00-00',''),(147,'','','internet','Mr.',0,'','','English','','cancelled',0,'74,76','2014-05-01 20:45:00','2014-05-01 21:00:00',112,'',0,'0000-00-00',''),(148,'','','internet','Mr.',0,'','','English','','cancelled',0,'75,76','2014-05-01 20:30:00','2014-05-01 20:45:00',112,'',0,'0000-00-00',''),(149,'','','internet','Mr.',0,'','','English','','not_show',0,'74','2014-05-01 21:00:00','2014-05-01 21:15:00',113,'',0,'0000-00-00',''),(150,'','','internet','Mr.',0,'','','English','','not_show',0,'76','2014-05-02 11:30:00','2014-05-02 11:45:00',113,'',0,'0000-00-00',''),(151,'','','internet','Mr.',0,'','','English','','not_show',0,'75','2014-05-02 12:00:00','2014-05-02 12:15:00',113,'',0,'0000-00-00',''),(152,'','','internet','Mr.',0,'','','English','','not_show',0,'74','2014-05-02 11:30:00','2014-05-02 11:45:00',113,'',0,'0000-00-00',''),(153,'','','internet','Mr.',0,'','','English','','not_show',0,'0','2014-05-02 11:30:00','2014-05-02 11:45:00',113,'',0,'0000-00-00',''),(154,'','','internet','Mr.',0,'','','English','','not_show',0,'72','2014-05-02 11:30:00','2014-05-02 11:45:00',112,'',0,'0000-00-00',''),(155,'','','internet','Mr.',0,'','','English','','not_show',0,'76','2014-05-02 11:45:00','2014-05-02 12:00:00',112,'',0,'0000-00-00',''),(156,'','','internet','Mr.',0,'','','English','','not_show',0,'72','2014-05-02 11:45:00','2014-05-02 12:00:00',112,'',0,'0000-00-00',''),(157,'','','internet','Mr.',0,'','','English','','not_show',0,'72','2014-05-02 14:15:00','2014-05-02 15:15:00',112,'',0,'0000-00-00',''),(158,'','','internet','Mr.',0,'','','English','','not_show',0,'74','2014-05-02 11:45:00','2014-05-02 12:00:00',112,'',0,'0000-00-00',''),(159,'','','internet','Mr.',0,'','','English','','not_show',0,'74','2014-05-02 12:00:00','2014-05-02 12:15:00',112,'',0,'0000-00-00',''),(160,'','','internet','Mr.',0,'','','English','','not_show',0,'76','2014-05-02 12:00:00','2014-05-02 12:15:00',112,'',0,'0000-00-00',''),(161,'qwe','','internet','Mr.',6,'','hovik.geodakyan@gmail.com','English','','cancelled',1,'74','2014-05-02 14:30:00','2014-05-02 17:30:00',112,'',0,'0000-00-00',''),(162,'adasd','','internet','Mr.',5,'','','English','','cancelled',1,'73','2014-05-02 15:45:00','2014-05-02 17:00:00',112,'',0,'0000-00-00',''),(163,'','','internet','Mr.',0,'','','English','','cancelled',0,'75','2014-05-02 15:30:00','2014-05-02 17:00:00',112,'',0,'0000-00-00',''),(164,'','','internet','Mr.',0,'','','English','','cancelled',0,'74','2014-05-02 17:45:00','2014-05-02 19:00:00',112,'',0,'0000-00-00',''),(165,'','','internet','Mr.',0,'','','English','','cancelled',0,'73','2014-05-02 17:45:00','2014-05-02 19:00:00',112,'',0,'0000-00-00',''),(166,'jk','','internet','Mr.',0,'','','English','','cancelled',0,'73','2014-05-02 18:15:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(167,'fsa','','internet','Mr.',6,'+37477564477','hovik.geodakyan@gmail.com','English','cvb','not_show',1,'72','2014-05-02 16:45:00','2014-05-02 18:00:00',112,'',0,'0000-00-00',''),(168,'adasd','','internet','Mr.',5,'0012165','ara.gyodakyan@mail.ru','English','','cancelled',1,'76','2014-05-02 17:00:00','2014-05-02 18:15:00',112,'',0,'0000-00-00',''),(169,'fsa','','internet','Mr.',2,'031651','hovik.geodakyan@gmail.com','English','','not_show',1,'75','2014-05-02 15:15:00','2014-05-02 17:00:00',112,'',0,'0000-00-00',''),(170,'adasd','','internet','Mr.',3,'0012165','hovik.geodakyan@gmail.com','English','qwe','not_show',0,'74','2014-05-02 14:30:00','2014-05-02 16:00:00',112,'',0,'0000-00-00',''),(171,'adasd','','internet','Mr.',3,'0012165','hovik.geodakyan@gmail.com','English','','not_show',0,'73','2014-05-02 15:30:00','2014-05-02 16:15:00',112,'',0,'0000-00-00',''),(172,'fsa','','internet','Mr.',6,'031651','ara.gyodakyan@gmail.com','English','zxc','cancelled',1,'75','2014-05-02 17:15:00','2014-05-02 19:00:00',112,'',0,'0000-00-00',''),(173,'adasd','','internet','Mr.',1,'0012165','hovik.geodakyan@gmail.com','English','','cancelled',1,'72','2014-05-02 18:15:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(174,'fsa','','internet','Mr.',6,'+37477564477','hovik.geodakyan@gmail.com','English','','not_show',1,'76','2014-05-02 16:15:00','2014-05-02 17:45:00',112,'',0,'0000-00-00',''),(175,'fsa','','internet','Mr.',6,'+37477564477','hovik.geodakyan@gmail.com','English','','cancelled',1,'76','2014-05-02 16:15:00','2014-05-02 17:45:00',112,'',0,'0000-00-00',''),(176,'adasd','','internet','Mr.',5,'0012165','hovik.geodakyan@gmail.com','English','','cancelled',1,'76','2014-05-02 18:00:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(177,'adasd','','internet','Mr.',5,'0012165','hovik.geodakyan@gmail.com','English','','cancelled',1,'76','2014-05-02 18:00:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(178,'adasd','','internet','Mr.',5,'+37477564477','hovik.geodakyan@gmail.com','English','','cancelled',1,'75','2014-05-02 18:00:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(179,'qwer','','internet','Mr.',3,'+37477564477','hovik.geodakyan@gmail.com','English','','not_show',1,'74','2014-05-02 17:30:00','2014-05-02 18:45:00',112,'',0,'0000-00-00',''),(180,'adasd','','internet','Mr.',4,'+37477564477','hovik.geodakyan@gmail.com','English','','not_show',0,'73','2014-05-02 17:15:00','2014-05-02 18:15:00',112,'',0,'0000-00-00',''),(181,'fsa','','internet','Mr.',4,'0012165','hovik.geodakyan@gmail.com','English','qwe','cancelled',1,'76','2014-05-02 17:45:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(182,'fsa','','internet','Mr.',4,'0012165','hovik.geodakyan@gmail.com','English','qwe','cancelled',1,'76','2014-05-02 17:45:00','2014-05-02 19:30:00',112,'',0,'0000-00-00',''),(183,'adasd','','internet','Mr.',7,'+37477564477','hovik.geodakyan@gmail.com','English','','not_show',1,'76','2014-05-02 18:00:00','2014-05-02 20:00:00',112,'',0,'0000-00-00',''),(184,'qwe','','internet','Mr.',8,'978','a@a.a','en','aaa','not_show',1,'74','2014-05-06 16:30:00','2014-05-06 18:15:00',112,'',0,'0000-00-00',''),(185,'adasd','','internet','Mr.',3,'031651','hovik.geodakyan@gmail.com','en','ыфа','not_show',1,'78','2014-05-12 16:15:00','2014-05-12 17:45:00',113,'',0,'0000-00-00',''),(186,'sdag','','internet','Mr.',5,'465','hovik.geodakyan@gmail.com','en','asd','cancelled',0,'80','2014-05-12 21:15:00','2014-05-12 21:30:00',113,'',0,'0000-00-00',''),(187,'fsa','','internet','Mr.',5,'465','hovik.geodakyan@gmail.com','en','','cancelled',0,'78','2014-05-12 21:15:00','2014-05-12 22:15:00',113,'',0,'0000-00-00',''),(188,'fsa','','internet','Mr.',4,'123','hovik.geodakyan@gmail.com','en','ыфа','not_show',0,'79','2014-05-12 21:00:00','2014-05-12 22:00:00',113,'',0,'0000-00-00',''),(189,'adasd','','internet','Mr.',5,'+37477564477','ara.gyodakyan@gmail.com','en','','not_show',0,'78','2014-05-13 18:45:00','2014-05-13 21:45:00',113,'',0,'0000-00-00',''),(190,'sdaf','','internet','Mr.',4,'0012165','','en','','arrived',0,'78','2014-05-15 14:45:00','2014-05-15 16:00:00',113,'',0,'0000-00-00',''),(191,'adasd','','internet','Mr.',4,'','','en','','arrived',0,'77,80','2014-05-15 15:15:00','2014-05-15 16:45:00',113,'',0,'0000-00-00',''),(192,'qwer','','internet','Mr.',3,'','','en','','not_show',0,'79','2014-05-15 14:45:00','2014-05-15 16:00:00',113,'',0,'0000-00-00',''),(193,'Hovik','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',1,'78','2014-05-15 11:15:00','2014-05-15 12:15:00',113,'',0,'0000-00-00',''),(194,'qwe','','internet','Mr.',4,'','','en','','not_show',0,'78','2014-05-15 16:45:00','2014-05-15 18:45:00',113,'',0,'0000-00-00',''),(195,'cvb','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',0,'77','2014-05-15 20:00:00','2014-05-15 21:00:00',113,'',0,'0000-00-00',''),(196,'adasd','','internet','Mr.',2,'','hovik.geodakyan@gmail.com','en','','not_show',1,'79','2014-05-15 20:30:00','2014-05-15 21:30:00',113,'',0,'0000-00-00',''),(197,'adasd','','internet','Mr.',4,'465','hovik.geodakyan@gmail.com','en','','not_show',1,'80','2014-05-15 20:15:00','2014-05-15 21:15:00',113,'',0,'0000-00-00',''),(198,'adasd','','internet','Mr.',2,'','hovik.geodakyan@gmail.com','en','','not_show',1,'79','2014-05-16 11:00:00','2014-05-16 12:00:00',113,'',0,'0000-00-00',''),(199,'fsa','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',1,'77','2014-05-16 12:00:00','2014-05-16 13:00:00',113,'',0,'0000-00-00',''),(200,'cvb','','internet','Mr.',2,'','hovik.geodakyan@gmail.com','en','','not_show',1,'79','2014-05-16 14:00:00','2014-05-16 15:00:00',113,'',0,'0000-00-00',''),(201,'qwe','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',1,'78','2014-05-16 15:30:00','2014-05-16 16:30:00',113,'',0,'0000-00-00',''),(202,'qwe','','internet','Mr.',2,'','hovik.geodakyan@gmail.com','en','','not_show',0,'79','2014-05-16 16:15:00','2014-05-16 17:15:00',113,'',1,'0000-00-00',''),(203,'qwe','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','qwe','not_show',1,'77','2014-05-16 14:45:00','2014-05-16 15:45:00',113,'',0,'0000-00-00',''),(204,'adasd','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',1,'80','2014-05-16 14:15:00','2014-05-16 15:15:00',113,'',0,'0000-00-00',''),(205,'fsa','','internet','Mr.',4,'','hovik.geodakyan@gmail.com','en','','not_show',1,'80','2014-05-16 15:45:00','2014-05-16 16:45:00',113,'',0,'0000-00-00',''),(206,'adasd','','internet','Mr.',2,'+37477564477','hovik.geodakyan@gmail.com','en','qwe','not_show',0,'78','2014-05-16 17:45:00','2014-05-16 18:45:00',113,'asdsafsdafsdfsadf',0,'2014-05-16','qwe'),(207,'Allen','','internet','Mr.',6,'','ara.gyodakyan@gmail.com','en','','not_show',1,'78','2014-05-16 21:30:00','2014-05-16 22:00:00',113,'',0,'0000-00-00',''),(208,'Allen','','internet','Mr.',6,'','ara.gyodakyan@gmail.com','en','','not_show',1,'78','2014-05-16 21:30:00','2014-05-16 22:00:00',113,'',0,'0000-00-00',''),(209,'Allen','','internet','Mr.',2,'+37498257','hovik.geodakyan@gmail.com','en','Test','not_show',1,'79','2014-05-18 17:00:00','2014-05-18 20:00:00',113,'',0,'0000-00-00',''),(210,'Allen','','internet','Mrs.',4,'+3744858','hovik.geodakyan@gmail.com','en','test','not_show',1,'78','2014-05-18 17:00:00','2014-05-18 20:00:00',113,'',0,'0000-00-00',''),(211,'Test','','internet','Prof.',4,'','hovik.geodakyan@gmail.com','en','Test','not_show',1,'77','2014-05-18 17:45:00','2014-05-18 20:45:00',113,'',1,'0000-00-00',''),(212,'Test','','internet','Dr.',4,'357864','hovik.geodakyan@gmail.com','en','Test','not_show',1,'80','2014-05-18 17:15:00','2014-05-18 20:15:00',113,'',0,'0000-00-00',''),(213,'Test','','internet','Mr.',4,'4546887','hovik.geodakyan@gmail.com','en','Test','',1,'77,78','2014-05-20 10:00:00','2014-05-20 11:00:00',113,'',0,'0000-00-00',''),(214,'Test','','internet','Mr.',4,'674545','hovik.geodakyan@gmail.com','en','','',1,'77,78','2014-05-20 11:15:00','2014-05-20 12:15:00',113,'',0,'0000-00-00',''),(215,'Test','Testovich','internet','Mr.',2,'6847987489','hovik.geodakyan@gmail.com','en','','',0,'79','2014-05-20 14:30:00','2014-05-20 17:30:00',113,'',0,'0000-00-00',''),(216,'Hovik','','internet','Mr.',4,'64654564','hovik.geodakyan@gmail.com','en','Test','',1,'78','2014-05-20 14:15:00','2014-05-20 17:45:00',113,'',0,'0000-00-00',''),(217,'','','internet','Mr.',0,'','','en','Api','',0,'0','0000-00-00 00:00:00','0000-00-00 00:00:00',113,'',0,'0000-00-00','');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` int(20) NOT NULL,
  `seats_standart_number` int(20) NOT NULL,
  `seats_max_number` int(20) NOT NULL,
  `combinable` tinyint(2) NOT NULL,
  `location` int(5) NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` (`id`, `name`, `seats_standart_number`, `seats_max_number`, `combinable`, `location`, `outlet_id`) VALUES (72,0,4,5,1,1,112),(73,0,2,6,1,1,112),(74,0,2,6,0,3,112),(75,0,4,6,0,1,112),(76,0,4,6,0,2,112),(77,1,4,6,1,1,113),(78,2,4,6,1,1,113),(79,3,2,6,0,1,113),(80,5,4,6,0,1,113);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` int(10) NOT NULL,
  `active` int(2) NOT NULL,
  `last-login` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `autofill` int(2) NOT NULL,
  `deleted` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `confirmation_code` varchar(255) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `language` varchar(50) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `realname`, `password`, `email`, `role`, `active`, `last-login`, `modified`, `autofill`, `deleted`, `created`, `confirmation_code`, `last_ip`, `language`, `avatar`) VALUES (11,'hovik','Hovik','76d80224611fc919a5d54f0ff9fba446','hovik.geodakyan@gmail.com',1,1,'0000-00-00 00:00:00','2014-05-07 14:06:45',0,0,'2014-05-07 14:06:45','','','en','Napoleon_portret1.jpg'),(12,'valod88','Qwe','76d80224611fc919a5d54f0ff9fba446','qw@qwe.qwe',2,1,'0000-00-00 00:00:00','2014-05-15 15:45:37',0,0,'2014-05-15 15:45:37','','','en','a0.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-19 19:39:34
