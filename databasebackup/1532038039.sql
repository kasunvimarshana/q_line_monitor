-- MySQL dump 10.10
--
-- Host: localhost    Database: db_brandix
-- ------------------------------------------------------
-- Server version	5.0.18-nt

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
-- Table structure for table `defect`
--

DROP TABLE IF EXISTS `defect`;
CREATE TABLE `defect` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `defect_type` int(10) unsigned NOT NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_defect_1` (`code`),
  KEY `FK_deffect_1` USING BTREE (`defect_type`),
  CONSTRAINT `FK_deffect_1` FOREIGN KEY (`defect_type`) REFERENCES `defect_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defect`
--


/*!40000 ALTER TABLE `defect` DISABLE KEYS */;
LOCK TABLES `defect` WRITE;
INSERT INTO `defect` VALUES (1,'Missing','SED001',1,NULL,'2018-05-29 00:00:00',NULL),(2,'Twisted','SED002',1,NULL,'2018-05-29 00:00:00',NULL),(3,'Wrong','SED003',1,NULL,'2018-05-29 00:00:00',NULL),(4,'Non - inclision','SED004',1,NULL,'2018-05-29 00:00:00',NULL),(5,'Row - Edge','SED005',1,NULL,'2018-05-29 00:00:00',NULL),(6,'Cracking','SED006',1,NULL,'2018-05-29 00:00:00',NULL),(7,'Broken','SED007',1,NULL,'2018-05-29 00:00:00',NULL),(8,'Measurment out','SED008',1,NULL,'2018-05-29 00:00:00',NULL),(9,'Slip stirches','SED009',1,NULL,'2018-05-29 00:00:00',NULL),(10,'Uneven','SED010',1,NULL,'2018-05-29 00:00:00',NULL),(11,'Puckering','SED011',1,NULL,'2018-05-29 00:00:00',NULL),(12,'Out of shape','SED012',1,NULL,'2018-05-29 00:00:00',NULL),(13,'Pleat','SED013',1,NULL,'2018-05-29 00:00:00',NULL),(14,'Stepping','SED014',1,NULL,'2018-05-29 00:00:00',NULL),(15,'Bible','SED015',1,NULL,'2018-05-29 00:00:00',NULL),(16,'Wrinkles','SED016',2,NULL,'2018-05-29 00:00:00',NULL),(17,'Wire Play','SED017',2,NULL,'2018-05-29 00:00:00',NULL),(18,'Needle Holes','SED018',2,NULL,'2018-05-29 00:00:00',NULL),(19,'Looseness','SED019',2,NULL,'2018-05-29 00:00:00',NULL),(20,'Roping','SED020',2,NULL,'2018-05-29 00:00:00',NULL),(21,'Thread Ends','SED021',2,NULL,'2018-05-29 00:00:00',NULL),(22,'Cut Damage','SED022',2,NULL,'2018-05-29 00:00:00',NULL),(23,'Pressing Defect','SED023',2,NULL,'2018-05-29 00:00:00',NULL),(24,'Run Off','SED024',2,NULL,'2018-05-29 00:00:00',NULL),(25,'Fullness','SED025',2,NULL,'2018-05-29 00:00:00',NULL),(26,'Stain / Oil Mark','SED026',2,NULL,'2018-05-29 00:00:00',NULL),(27,'Mis-match Embroder','SED027',2,NULL,'2018-05-29 00:00:00',NULL),(28,'Snagging','SED028',2,NULL,'2018-05-29 00:00:00',NULL),(29,'Insecure','SED029',2,NULL,'2018-05-29 00:00:00',NULL),(30,'Flipping','SED030',3,NULL,'2018-05-29 00:00:00',NULL),(31,'Dimple','SED031',3,NULL,'2018-05-29 00:00:00',NULL),(32,'Open Seam','SED032',3,NULL,'2018-05-29 00:00:00',NULL),(33,'Cut Toght','SED033',3,NULL,'2018-05-29 00:00:00',NULL),(34,'Crushing','SED034',3,NULL,'2018-05-29 00:00:00',NULL),(35,'Wire Come Out','SED035',3,NULL,'2018-05-29 00:00:00',NULL),(36,'Fraying','SED036',3,NULL,'2018-05-29 00:00:00',NULL),(37,'Poor Tacking','SED037',3,NULL,'2018-05-29 00:00:00',NULL),(38,'Born Play','SED038',3,NULL,'2018-05-29 00:00:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `defect` ENABLE KEYS */;

--
-- Table structure for table `defect_type`
--

DROP TABLE IF EXISTS `defect_type`;
CREATE TABLE `defect_type` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_defect_type_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defect_type`
--


/*!40000 ALTER TABLE `defect_type` DISABLE KEYS */;
LOCK TABLES `defect_type` WRITE;
INSERT INTO `defect_type` VALUES (1,'Sewing Defect','Sewing Defect','Sewing Defect','2018-05-29 00:00:00',NULL),(2,'Material Defects','Material Defects','Material Defects','2018-05-29 00:00:00',NULL),(3,'Construction Defect','Construction Defect','Construction Defect','2018-05-29 00:00:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `defect_type` ENABLE KEYS */;

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device_id` varchar(45) NOT NULL,
  `var_ip` varchar(45) default NULL,
  `var_state` int(10) unsigned default NULL,
  `description` text,
  `var_line` int(10) unsigned default NULL,
  `sys_date` date default NULL,
  `sys_time` time default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  USING BTREE (`id`),
  UNIQUE KEY `CON_device_1` (`device_id`),
  UNIQUE KEY `CON_device_2` (`id`),
  KEY `FK_device_1` (`var_line`),
  KEY `FK_device_2` (`var_state`),
  CONSTRAINT `FK_device_1` FOREIGN KEY (`var_line`) REFERENCES `var_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_2` FOREIGN KEY (`var_state`) REFERENCES `var_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--


/*!40000 ALTER TABLE `device` DISABLE KEYS */;
LOCK TABLES `device` WRITE;
INSERT INTO `device` VALUES (1,'DEVICE01','::1',NULL,NULL,1,'2018-07-19','22:29:00',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `device` ENABLE KEYS */;

--
-- Table structure for table `device_data`
--

DROP TABLE IF EXISTS `device_data`;
CREATE TABLE `device_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device` int(10) unsigned NOT NULL,
  `var_line` int(10) unsigned NOT NULL,
  `var_ip` varchar(45) default NULL,
  `var_value` varchar(45) NOT NULL default '0',
  `sys_date` date default NULL,
  `sys_time` time default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  `var_state` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_device_data_2` (`var_line`),
  KEY `FK_device_data_3` (`var_state`),
  KEY `FK_device_data_1` (`device`),
  CONSTRAINT `FK_device_data_1` FOREIGN KEY (`device`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_2` FOREIGN KEY (`var_line`) REFERENCES `var_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_3` FOREIGN KEY (`var_state`) REFERENCES `var_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data`
--


/*!40000 ALTER TABLE `device_data` DISABLE KEYS */;
LOCK TABLES `device_data` WRITE;
INSERT INTO `device_data` VALUES (20,1,1,'::1','1','2018-07-17','13:55:29','2018-07-17 13:55:29',NULL,NULL),(21,1,1,'::1','2','2018-07-17','14:36:30','2018-07-17 14:36:30',NULL,NULL),(40,1,1,'::1','3','2018-07-18','00:31:47','2018-07-18 00:31:47',NULL,NULL),(43,1,1,'192.168.1.5','1','2018-07-18','17:57:29','2018-07-18 17:57:29',NULL,NULL),(44,1,1,'192.168.1.5','2','2018-07-18','17:58:15','2018-07-18 17:58:15',NULL,NULL),(45,1,1,'192.168.1.5','4','2018-07-18','17:58:45','2018-07-18 17:58:45',NULL,NULL),(49,1,1,'::1','1','2018-07-19','22:29:00','2018-07-19 22:29:00',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_data` ENABLE KEYS */;

--
-- Table structure for table `device_data_defect`
--

DROP TABLE IF EXISTS `device_data_defect`;
CREATE TABLE `device_data_defect` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device_data_description` int(10) unsigned NOT NULL,
  `defect` int(10) unsigned NOT NULL,
  `sys_user` int(10) unsigned default NULL,
  `description` text,
  `sys_date` datetime default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  `var_qty` int(10) unsigned default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_device_data_defect_1` (`device_data_description`,`defect`),
  KEY `FK_device_data_deffect_3` (`sys_user`),
  KEY `FK_device_data_deffect_2` USING BTREE (`defect`),
  KEY `FK_device_data_deffect_1` USING BTREE (`device_data_description`),
  CONSTRAINT `FK_device_data_deffect_1` FOREIGN KEY (`device_data_description`) REFERENCES `device_data_description` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_deffect_2` FOREIGN KEY (`defect`) REFERENCES `defect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_deffect_3` FOREIGN KEY (`sys_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data_defect`
--


/*!40000 ALTER TABLE `device_data_defect` DISABLE KEYS */;
LOCK TABLES `device_data_defect` WRITE;
INSERT INTO `device_data_defect` VALUES (7,5,36,1,NULL,'2018-07-17 00:00:00','2018-07-17 13:55:54',NULL,NULL),(8,5,34,1,NULL,'2018-07-17 00:00:00','2018-07-17 13:55:54',NULL,NULL),(9,6,37,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(10,6,33,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(11,6,35,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(12,6,36,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(13,6,29,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(14,6,19,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(15,6,13,1,NULL,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(16,7,27,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(17,7,24,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(18,7,16,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(19,7,26,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(20,7,28,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(21,7,29,1,NULL,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(22,8,28,1,NULL,'2018-07-18 00:00:00','2018-07-18 17:57:58',NULL,NULL),(23,8,25,1,NULL,'2018-07-18 00:00:00','2018-07-18 17:57:58',NULL,NULL),(24,9,26,1,NULL,'2018-07-18 00:00:00','2018-07-18 17:58:39',NULL,NULL),(25,10,36,1,NULL,'2018-07-18 00:00:00','2018-07-18 17:59:10',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_data_defect` ENABLE KEYS */;

--
-- Table structure for table `device_data_description`
--

DROP TABLE IF EXISTS `device_data_description`;
CREATE TABLE `device_data_description` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device_data` int(10) unsigned NOT NULL,
  `device_data_scan` int(10) unsigned default NULL,
  `var_qty` int(10) unsigned NOT NULL default '1',
  `sys_user` int(10) unsigned NOT NULL,
  `sys_date` datetime default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  `description` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_device_data_description_1` (`device_data`),
  KEY `FK_device_data_description_2` (`device_data_scan`),
  KEY `FK_device_data_description_3` (`sys_user`),
  CONSTRAINT `FK_device_data_description_1` FOREIGN KEY (`device_data`) REFERENCES `device_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_description_2` FOREIGN KEY (`device_data_scan`) REFERENCES `device_data_scan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_description_3` FOREIGN KEY (`sys_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data_description`
--


/*!40000 ALTER TABLE `device_data_description` DISABLE KEYS */;
LOCK TABLES `device_data_description` WRITE;
INSERT INTO `device_data_description` VALUES (5,20,8,1,1,'2018-07-17 00:00:00','2018-07-17 13:55:54',NULL,NULL),(6,21,7,1,1,'2018-07-17 00:00:00','2018-07-17 14:37:29',NULL,NULL),(7,40,8,1,1,'2018-07-18 00:00:00','2018-07-18 00:32:46',NULL,NULL),(8,43,8,1,1,'2018-07-18 00:00:00','2018-07-18 17:57:58',NULL,NULL),(9,44,6,1,1,'2018-07-18 00:00:00','2018-07-18 17:58:39',NULL,NULL),(10,45,6,1,1,'2018-07-18 00:00:00','2018-07-18 17:59:10',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_data_description` ENABLE KEYS */;

--
-- Table structure for table `device_data_meta`
--

DROP TABLE IF EXISTS `device_data_meta`;
CREATE TABLE `device_data_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device_data` int(10) unsigned NOT NULL,
  `meta_key` varchar(45) default NULL,
  `meta_value` varchar(45) default NULL,
  `sys_date` date default NULL,
  `sys_time` time default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_device_data_meta_1` (`device_data`),
  CONSTRAINT `FK_device_data_meta_1` FOREIGN KEY (`device_data`) REFERENCES `device_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data_meta`
--


/*!40000 ALTER TABLE `device_data_meta` DISABLE KEYS */;
LOCK TABLES `device_data_meta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_data_meta` ENABLE KEYS */;

--
-- Table structure for table `device_data_scan`
--

DROP TABLE IF EXISTS `device_data_scan`;
CREATE TABLE `device_data_scan` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(45) NOT NULL,
  `var_qty` double default '0',
  `var_line` int(10) unsigned NOT NULL,
  `sys_user` int(10) unsigned NOT NULL,
  `description` text,
  `sys_date` date default NULL,
  `sys_time` time default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  `var_state` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_device_data_scan_3` (`var_state`),
  KEY `FK_device_data_scan_1` (`var_line`),
  KEY `FK_device_data_scan_2` (`sys_user`),
  CONSTRAINT `FK_device_data_scan_1` FOREIGN KEY (`var_line`) REFERENCES `var_line` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_scan_2` FOREIGN KEY (`sys_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_device_data_scan_3` FOREIGN KEY (`var_state`) REFERENCES `var_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_data_scan`
--


/*!40000 ALTER TABLE `device_data_scan` DISABLE KEYS */;
LOCK TABLES `device_data_scan` WRITE;
INSERT INTO `device_data_scan` VALUES (6,'10050',50,1,1,NULL,'2018-07-17','13:52:14','2018-07-17 13:52:14',NULL,NULL),(7,'10060',60,1,1,NULL,'2018-07-17','13:52:21','2018-07-17 13:52:21',NULL,5),(8,'10010',10,1,1,'quality pass','2018-07-17','13:55:02','2018-07-17 13:55:02',NULL,4),(9,'10080',80,1,1,NULL,'2018-07-19','12:09:32','2018-07-19 12:09:32',NULL,4),(10,'10070',70,1,1,NULL,'2018-07-19','17:31:34','2018-07-19 17:31:34',NULL,NULL),(13,'10020',20,1,1,NULL,'2018-07-20','00:45:00','2018-07-20 00:44:55',NULL,NULL),(14,'10030',30,1,1,NULL,'2018-07-20','00:56:18','2018-07-20 00:56:14',NULL,NULL),(15,'10010',10,1,1,NULL,'2018-07-20','00:56:50','2018-07-20 00:56:46',NULL,NULL),(16,'10040',40,1,1,NULL,'2018-07-20','01:01:21','2018-07-20 01:01:17',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_data_scan` ENABLE KEYS */;

--
-- Table structure for table `device_meta`
--

DROP TABLE IF EXISTS `device_meta`;
CREATE TABLE `device_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `device` int(10) unsigned NOT NULL,
  `meta_key` varchar(45) default NULL,
  `meta_value` varchar(45) default NULL,
  `sys_date` date default NULL,
  `sys_time` time default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_device_meta_1` (`device`),
  CONSTRAINT `FK_device_meta_1` FOREIGN KEY (`device`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 6144 kB; (`device`) REFER `db_brandix/device`(`';

--
-- Dumping data for table `device_meta`
--


/*!40000 ALTER TABLE `device_meta` DISABLE KEYS */;
LOCK TABLES `device_meta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `device_meta` ENABLE KEYS */;

--
-- Table structure for table `sys_activity`
--

DROP TABLE IF EXISTS `sys_activity`;
CREATE TABLE `sys_activity` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `var_key` varchar(45) default NULL,
  `var_value` varchar(45) default NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_sys_activity_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_activity`
--


/*!40000 ALTER TABLE `sys_activity` DISABLE KEYS */;
LOCK TABLES `sys_activity` WRITE;
INSERT INTO `sys_activity` VALUES (1,'activity1',NULL,NULL,NULL,NULL,NULL),(2,'activity2',NULL,NULL,NULL,NULL,NULL),(3,'activity3',NULL,NULL,NULL,NULL,NULL),(4,'activity4',NULL,NULL,NULL,NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_activity` ENABLE KEYS */;

--
-- Table structure for table `sys_meta`
--

DROP TABLE IF EXISTS `sys_meta`;
CREATE TABLE `sys_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `meta_key` varchar(45) NOT NULL,
  `meta_value` varchar(45) default NULL,
  `description` varchar(45) default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_meta`
--


/*!40000 ALTER TABLE `sys_meta` DISABLE KEYS */;
LOCK TABLES `sys_meta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_meta` ENABLE KEYS */;

--
-- Table structure for table `sys_user`
--

DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` text,
  `nic` varchar(45) default NULL,
  `phone_1` varchar(45) default NULL,
  `var_image` text,
  `user_name` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_role` int(10) unsigned default NULL,
  `description` text,
  `display_name` varchar(45) default NULL,
  `sys_user` int(10) unsigned default NULL,
  `sys_date` date default NULL,
  `dev_date` datetime default NULL,
  `is_active` tinyint(1) default '0',
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_sys_user_1` (`user_name`),
  KEY `FK_sys_user_1` (`user_role`),
  KEY `FK_sys_user_2` (`sys_user`),
  CONSTRAINT `FK_sys_user_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sys_user_2` FOREIGN KEY (`sys_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user`
--


/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;
LOCK TABLES `sys_user` WRITE;
INSERT INTO `sys_user` VALUES (1,'USER01','user name','user address','000000000v','0000000000','C:\\xampp\\htdocs\\site\\commons\\img\\sysUser\\bd23caaa89800624a1c1014a901784c6.jpg','admin','admin',1,'description','display name',NULL,'2018-05-29','2018-05-29 00:00:00',1,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;

--
-- Table structure for table `sys_user_meta`
--

DROP TABLE IF EXISTS `sys_user_meta`;
CREATE TABLE `sys_user_meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sys_user` int(10) unsigned NOT NULL,
  `meta_key` varchar(45) default NULL,
  `meta_value` varchar(45) default NULL,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_sys_user_meta_1` (`sys_user`),
  CONSTRAINT `FK_sys_user_meta_1` FOREIGN KEY (`sys_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_meta`
--


/*!40000 ALTER TABLE `sys_user_meta` DISABLE KEYS */;
LOCK TABLES `sys_user_meta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_user_meta` ENABLE KEYS */;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_user_role_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--


/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
LOCK TABLES `user_role` WRITE;
INSERT INTO `user_role` VALUES (1,'SUPER_ADMIN','SUPER_ADMIN','2018-07-09 10:11:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

--
-- Table structure for table `user_role_sys_activity`
--

DROP TABLE IF EXISTS `user_role_sys_activity`;
CREATE TABLE `user_role_sys_activity` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_role` int(10) unsigned NOT NULL,
  `sys_activity` int(10) unsigned NOT NULL,
  `var_key` varchar(45) default NULL,
  `var_value` varchar(45) default NULL,
  `is_active` tinyint(1) default '0',
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_user_role_sys_activity_1` (`user_role`),
  KEY `FK_user_role_sys_activity_2` (`sys_activity`),
  CONSTRAINT `FK_user_role_sys_activity_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_role_sys_activity_2` FOREIGN KEY (`sys_activity`) REFERENCES `sys_activity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_sys_activity`
--


/*!40000 ALTER TABLE `user_role_sys_activity` DISABLE KEYS */;
LOCK TABLES `user_role_sys_activity` WRITE;
INSERT INTO `user_role_sys_activity` VALUES (1,1,1,NULL,NULL,0,NULL,NULL),(2,1,2,NULL,NULL,0,NULL,NULL),(3,1,3,NULL,NULL,0,NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `user_role_sys_activity` ENABLE KEYS */;

--
-- Table structure for table `var_line`
--

DROP TABLE IF EXISTS `var_line`;
CREATE TABLE `var_line` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) default NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  `var_plant` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_var_line_1` (`code`),
  KEY `FK_var_line_1` (`var_plant`),
  CONSTRAINT `FK_var_line_1` FOREIGN KEY (`var_plant`) REFERENCES `var_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `var_line`
--


/*!40000 ALTER TABLE `var_line` DISABLE KEYS */;
LOCK TABLES `var_line` WRITE;
INSERT INTO `var_line` VALUES (1,'LINE_1','Line 1',NULL,NULL,NULL,1),(2,'LINE_2','Line 2',NULL,NULL,NULL,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `var_line` ENABLE KEYS */;

--
-- Table structure for table `var_plant`
--

DROP TABLE IF EXISTS `var_plant`;
CREATE TABLE `var_plant` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) default NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `CON_var_plant_1` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `var_plant`
--


/*!40000 ALTER TABLE `var_plant` DISABLE KEYS */;
LOCK TABLES `var_plant` WRITE;
INSERT INTO `var_plant` VALUES (1,'PLANT1','plant1',NULL,NULL,NULL),(2,'PLANT2','plant2',NULL,NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `var_plant` ENABLE KEYS */;

--
-- Table structure for table `var_state`
--

DROP TABLE IF EXISTS `var_state`;
CREATE TABLE `var_state` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `var_value` varchar(45) default '0',
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `var_state`
--


/*!40000 ALTER TABLE `var_state` DISABLE KEYS */;
LOCK TABLES `var_state` WRITE;
INSERT INTO `var_state` VALUES (1,'ACTIVE','ACTIVE','device, device_data, sys_user','2018-07-09 10:11:00',NULL),(2,'DEACTIVE','DEACTIVE','device, device_data, sys_user','2018-07-09 10:11:00',NULL),(3,'PROCESS','PROCESS','device_data_scan','2018-07-09 10:11:00',NULL),(4,'PASS','PASS','device_data_scan','2018-07-09 10:11:00',NULL),(5,'REJECT','REJECT','device_data_scan','2018-07-09 10:11:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `var_state` ENABLE KEYS */;

--
-- Table structure for table `work_time`
--

DROP TABLE IF EXISTS `work_time`;
CREATE TABLE `work_time` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `var_plant` int(10) unsigned default NULL,
  `sys_time_start` time default NULL,
  `sys_time_end` time default NULL,
  `description` text,
  `dev_date` datetime default NULL,
  `sys_meta` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_work_time_1` USING BTREE (`var_plant`),
  CONSTRAINT `FK_work_time_1` FOREIGN KEY (`var_plant`) REFERENCES `var_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_time`
--


/*!40000 ALTER TABLE `work_time` DISABLE KEYS */;
LOCK TABLES `work_time` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `work_time` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

