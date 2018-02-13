/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.29-MariaDB : Database - promethee_ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`promethee_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `promethee_ci`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`) values ('admin','admin');

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `lf` double DEFAULT NULL,
  `ef` double DEFAULT NULL,
  `nf` double DEFAULT NULL,
  KEY `id_alternatif` (`id_alternatif`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`id_alternatif`,`kode_alternatif`,`nama_alternatif`,`keterangan`,`lf`,`ef`,`nf`) values (1,'G','Galaxy','',0.25833333333333,0.225,0.033333333333333),(2,'IP','iPhone','',0.34166666666667,0.19166666666667,0.15),(3,'BB','Blackberry','',0.31666666666667,0.14166666666667,0.175),(4,'L','Lumia','',0.1,0.45833333333333,-0.35833333333333);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `minmax` varchar(16) NOT NULL,
  `tipe` varchar(16) NOT NULL,
  `par_q` double NOT NULL,
  `par_p` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id_kriteria`,`kode_kriteria`,`nama_kriteria`,`bobot`,`minmax`,`tipe`,`par_q`,`par_p`) values (1,'C01','Harga',0.2,'Minimasi','4',500,1000),(2,'C02','Kualitas',0.25,'Maksimasi','3',0,20),(3,'C03','Fitur',0.2,'Maksimasi','3',0,2),(4,'C04','Populer',0.125,'Maksimasi','2',20,0),(5,'C05','Pelayanan Garansi',0.125,'Minimasi','5',1,2),(8,'C06','Keawetan',0.1,'Maksimasi','1',0,0);

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`id_alternatif`,`id_kriteria`,`nilai`,`kode_alternatif`,`kode_kriteria`) values (1,1,1,3500,'G','C01'),(2,1,2,70,'G','C02'),(3,1,3,10,'G','C03'),(4,1,4,80,'G','C04'),(5,1,5,2,'G','C05'),(6,2,1,4500,'IP','C01'),(7,2,2,90,'IP','C02'),(8,2,3,10,'IP','C03'),(9,2,4,60,'IP','C04'),(10,2,5,5,'IP','C05'),(11,3,1,4000,'BB','C01'),(12,3,2,80,'BB','C02'),(13,3,3,9,'BB','C03'),(14,3,4,90,'BB','C04'),(15,3,5,3,'BB','C05'),(29,4,3,8,'L','C03'),(28,4,2,70,'L','C02'),(27,4,1,4000,'L','C01'),(30,4,4,50,'L','C04'),(31,4,5,4,'L','C05'),(33,1,8,36,'G','C06'),(34,2,8,48,'IP','C06'),(35,3,8,48,'BB','C06'),(36,4,8,60,'L','C06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
