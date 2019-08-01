# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: trw
# Generation Time: 2019-08-01 14:49:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table crontab
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crontab`;

CREATE TABLE `crontab` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '任务名称',
  `rule` text COMMENT '规则 可以是crontab规则也可以是json类型的精确时间任务',
  `unique` tinyint(5) DEFAULT NULL COMMENT '0 唯一任务 大于0表示同时可并行的任务进程个数',
  `job` varchar(32) DEFAULT NULL COMMENT '运行这个任务的类',
  `data` text COMMENT '任务参数',
  `data_md5` varchar(32) DEFAULT NULL COMMENT '任务参数md5值，用于去重',
  `status` enum('0','1','2') DEFAULT NULL COMMENT '任务参数md5值，用于去重',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '数据创建时间',
  `last_time` int(10) unsigned DEFAULT NULL COMMENT '最后执行时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '数据更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `crontab` WRITE;
/*!40000 ALTER TABLE `crontab` DISABLE KEYS */;

INSERT INTO `crontab` (`id`, `name`, `rule`, `unique`, `job`, `data`, `data_md5`, `status`, `create_time`, `last_time`, `update_time`)
VALUES
	(1,'测试','*/2 * * * * *',2,'Demo',NULL,NULL,'0',1564481904,NULL,NULL);

/*!40000 ALTER TABLE `crontab` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(32) DEFAULT NULL COMMENT '类型',
  `payload` longtext COMMENT '参数',
  `attempts` varchar(40) DEFAULT NULL COMMENT '运行次数',
  `reserved` enum('0','1') DEFAULT NULL COMMENT '执行状态',
  `reserved_time` datetime DEFAULT NULL COMMENT '开始执行时间',
  `available_time` int(10) unsigned DEFAULT NULL COMMENT '可以执行时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '数据创建时间',
  `sort` int(11) DEFAULT NULL COMMENT '权重',
  `thread_id` int(11) DEFAULT NULL COMMENT '线程ID',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '数据更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
