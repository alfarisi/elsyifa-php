/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE=''*/;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `_config` */
CREATE TABLE `_config` (
  `conf_name` varchar(255) NOT NULL,
  `conf_value` text,
  PRIMARY KEY  (`conf_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*Data for the table `_config` */
insert  into `_config`(`conf_name`,`conf_value`) values ('app_name','elSyifa Example'),('app_version','1.1'),('framework_edition','Community'),('framework_version','2.0');

/*Table structure for table `example` */
CREATE TABLE `example` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `city` varchar(100) default NULL,
  `postcode` char(6) default NULL,
  `dob` date default NULL,
  `phone` varchar(50) default NULL,
  `email` varchar(100) default NULL,
  `other_info` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*Data for the table `example` */
insert  into `example`(`id`,`name`,`address`,`city`,`postcode`,`dob`,`phone`,`email`,`other_info`) values (1,'Indokreatif Teknologi','Sleman','Yogyakarta','55284','2009-01-13','-','-','www.indokreatif.net - Information and Communication Technology'),(2,'elSyifa','Sleman','Yogyakarta','55284','2009-01-13','-','-','www.elsyifa.com - Cloudify your business');
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;