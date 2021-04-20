/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.17-MariaDB-log : Database - db_sistem_krs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sistem_krs` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_sistem_krs`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(30) NOT NULL,
  `NIK` int(20) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_dosen` */

insert  into `tb_dosen`(`id`,`nama_dosen`,`NIK`,`jenis_kelamin`,`tanggal_lahir`,`alamat`,`no_telp`,`email`) values (1,'Dadang Ahmad',1313132,'Pria','1978-07-20','Bogor','08132512331','dadangkipas@gmail.com'),(3,'Sutini',183718927,'Wanita','1965-10-06','kklsadjkl','39821931','sutini@gmail.com'),(5,'Nur Janah',1931383198,'Wanita','1980-05-13','Jawa Tengah','081391391839','nurjanah@gmail.com'),(6,'I Gede Purba Wahyu',131321230,'Pria','1978-02-13','Denpasar','0813293179321','wahyugede@gmail.com');

/*Table structure for table `tb_mahasiswa` */

DROP TABLE IF EXISTS `tb_mahasiswa`;

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `NIM` int(10) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `tb_dosen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_mahasiswa` */

insert  into `tb_mahasiswa`(`id`,`nama_mahasiswa`,`NIM`,`jenis_kelamin`,`tanggal_lahir`,`alamat`,`no_telp`,`email`,`dosen_id`) values (4,'Fahri Choirul Anam',1905551106,'Pria','2001-06-16','Jl. Rawajati Timur VII No 8','0895326532512','fahribakker@gmail.com',1),(7,'Didi Sudidi',1905551111,'Pria','2000-03-13','Jakarta Selatan','081313299835','didi@gmail.com',1),(8,'Fahri',1905551106,'Pria','2001-06-16','Jakarta','0895326532512','fahribakker@gmail.com',1);

/*Table structure for table `tb_mata_kuliah` */

DROP TABLE IF EXISTS `tb_mata_kuliah`;

CREATE TABLE `tb_mata_kuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(50) NOT NULL,
  `sks` tinyint(4) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dosen` (`id_dosen`),
  CONSTRAINT `tb_mata_kuliah_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_mata_kuliah` */

insert  into `tb_mata_kuliah`(`id`,`id_dosen`,`nama_mata_kuliah`,`sks`,`hari`,`jam_mulai`,`jam_akhir`) values (1,1,'Pemrograman',3,'Selasa','03:00:00','03:00:00'),(2,3,'Basis Data',3,'Rabu','00:00:04','00:00:05'),(4,1,'Analisis Desain Data A',3,'Senin','11:00:00','01:00:00'),(5,1,'Interpersonal Life Skill A',3,'Senin','14:00:00','16:00:00'),(6,5,'Agama Islam',2,'Jumat','02:00:00','04:00:00'),(8,6,'Agama Hindu',2,'Jumat','02:00:00','04:00:00'),(9,6,'Etika Profesi B',3,'Selasa','13:00:00','15:00:00');

/*Table structure for table `tb_matkul_pilihan_mahasiswa` */

DROP TABLE IF EXISTS `tb_matkul_pilihan_mahasiswa`;

CREATE TABLE `tb_matkul_pilihan_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` int(11) NOT NULL,
  `mata_kuliah_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  KEY `mata_kuliah_id` (`mata_kuliah_id`),
  CONSTRAINT `tb_matkul_pilihan_mahasiswa_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tb_mahasiswa` (`id`),
  CONSTRAINT `tb_matkul_pilihan_mahasiswa_ibfk_2` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `tb_mata_kuliah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_matkul_pilihan_mahasiswa` */

insert  into `tb_matkul_pilihan_mahasiswa`(`id`,`mahasiswa_id`,`mata_kuliah_id`) values (12,4,1),(13,4,2),(14,4,4),(15,4,6),(16,7,1),(17,7,2),(18,7,4),(19,7,5),(20,7,8),(21,8,1),(22,8,2),(23,8,4),(24,8,5),(25,8,6);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
