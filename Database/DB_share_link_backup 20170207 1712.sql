-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema digilinker
--

CREATE DATABASE IF NOT EXISTS digilinker;
USE digilinker;

--
-- Definition of table `content_details`
--

DROP TABLE IF EXISTS `content_details`;
CREATE TABLE `content_details` (
  `cid` int(10) unsigned NOT NULL,
  `author` varchar(45) NOT NULL default 'Anonymous',
  `views` varchar(45) NOT NULL default '0',
  `file_size` varchar(45) NOT NULL,
  `ratings` varchar(45) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL,
  PRIMARY KEY  (`cid`),
  CONSTRAINT `FK_content_details_1` FOREIGN KEY (`cid`) REFERENCES `main` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_details`
--

/*!40000 ALTER TABLE `content_details` DISABLE KEYS */;
INSERT INTO `content_details` (`cid`,`author`,`views`,`file_size`,`ratings`,`ip_address`) VALUES 
 (1,'Anonymous','0','','0','::1'),
 (2,'Anonymous','0','','0','::1'),
 (3,'Anonymous','6','0','0','::1');
/*!40000 ALTER TABLE `content_details` ENABLE KEYS */;


--
-- Definition of table `content_status`
--

DROP TABLE IF EXISTS `content_status`;
CREATE TABLE `content_status` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `status` varchar(45) NOT NULL default 'Active',
  PRIMARY KEY  (`cid`),
  CONSTRAINT `FK_New Table_1` FOREIGN KEY (`cid`) REFERENCES `main` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_status`
--

/*!40000 ALTER TABLE `content_status` DISABLE KEYS */;
INSERT INTO `content_status` (`cid`,`status`) VALUES 
 (1,'active'),
 (2,'active'),
 (3,'active');
/*!40000 ALTER TABLE `content_status` ENABLE KEYS */;


--
-- Definition of table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `cid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `saved_file` varchar(100) NOT NULL,
  `extension` varchar(45) NOT NULL,
  PRIMARY KEY  (`cid`),
  CONSTRAINT `FK_file_1` FOREIGN KEY (`cid`) REFERENCES `main` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;


--
-- Definition of table `main`
--

DROP TABLE IF EXISTS `main`;
CREATE TABLE `main` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(45) NOT NULL,
  `short_url` varchar(100) character set latin1 collate latin1_bin default NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `unique_short_url` (`short_url`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

/*!40000 ALTER TABLE `main` DISABLE KEYS */;
INSERT INTO `main` (`cid`,`type`,`short_url`) VALUES 
 (1,'url',0x32),
 (2,'url',0x33),
 (3,'note',0x34);
/*!40000 ALTER TABLE `main` ENABLE KEYS */;


--
-- Definition of table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `saved_file` varchar(100) NOT NULL,
  PRIMARY KEY  (`cid`),
  CONSTRAINT `FK_Note_1` FOREIGN KEY (`cid`) REFERENCES `main` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` (`cid`,`title`,`saved_file`) VALUES 
 (3,'notess','notess_1472914176_865582.txt');
/*!40000 ALTER TABLE `note` ENABLE KEYS */;


--
-- Definition of table `notify`
--

DROP TABLE IF EXISTS `notify`;
CREATE TABLE `notify` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

/*!40000 ALTER TABLE `notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `notify` ENABLE KEYS */;


--
-- Definition of table `reported_content`
--

DROP TABLE IF EXISTS `reported_content`;
CREATE TABLE `reported_content` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `url` varchar(80) NOT NULL,
  `reason` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reported_content`
--

/*!40000 ALTER TABLE `reported_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `reported_content` ENABLE KEYS */;


--
-- Definition of table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `cid` int(10) unsigned NOT NULL,
  `long_url` varchar(200) NOT NULL,
  PRIMARY KEY  (`cid`),
  CONSTRAINT `FK_url_1` FOREIGN KEY (`cid`) REFERENCES `main` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` (`cid`,`long_url`) VALUES 
 (1,'http://a.com'),
 (2,'http://fda.com');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
