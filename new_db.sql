/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.19-MariaDB : Database - lara
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lara` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `lara`;

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_price` double NOT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `expenses` */

insert  into `expenses`(`id`,`expense_name`,`expense_price`,`partner_id`,`status`,`created_at`,`updated_at`,`deleted`) values 
(1,'Building rental Cost',1050,NULL,0,'2022-09-16 00:10:24','2022-09-17 01:03:17',0),
(2,'Internet Cost',50,NULL,0,'2022-09-16 00:11:20','2022-09-17 01:03:18',0),
(3,'Transfer Cost',100,NULL,0,'2022-09-16 00:11:49','2022-09-17 01:03:18',0),
(4,'Door fix Cost',130,NULL,0,'2022-09-16 08:14:54','2022-09-17 01:03:22',0),
(6,'Pay to jelina rasb',2250,3,1,'2022-09-17 01:04:43','2022-09-17 01:04:43',0),
(7,'Pay to jelina rasb',2900,3,1,'2022-09-17 01:35:46','2022-09-17 01:35:46',0),
(8,'build website',700,NULL,0,'2022-09-17 01:39:45','2022-09-17 23:33:40',1),
(9,'test',10,NULL,0,'2022-09-17 22:26:47','2022-09-17 22:44:34',1),
(10,'test',123,NULL,0,'2022-09-17 22:45:22','2022-09-17 22:45:25',1),
(11,'test',123,NULL,0,'2022-09-17 22:45:57','2022-09-17 22:45:59',1),
(12,'test1',123,NULL,0,'2022-09-19 02:19:27','2022-09-19 02:19:33',1);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `invoice_no` decimal(30,0) NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_tel` decimal(15,0) DEFAULT 0,
  `product_id` bigint(20) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_amount` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `paid_price` double DEFAULT 0,
  `unpaid_price` double DEFAULT NULL,
  `inv_status` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `invoices` */

insert  into `invoices`(`id`,`user_id`,`invoice_no`,`customer`,`customer_tel`,`product_id`,`product_price`,`product_amount`,`total_price`,`status`,`paid_price`,`unpaid_price`,`inv_status`,`created_at`,`updated_at`,`deleted`) values 
(10,2,1000000000,'jap',NULL,7,2,5,10,1,2785,0,1,'2022-09-14 11:41:35','2022-09-16 07:39:09',0),
(17,2,1000000000,'jap',NULL,6,75,7,525,1,2785,0,1,'2022-09-14 11:57:46','2022-09-16 07:39:09',0),
(20,2,1000000000,'jap',NULL,3,450,3,1350,1,2785,0,1,'2022-09-14 12:46:12','2022-09-16 07:39:09',0),
(21,2,1000000000,'jap',NULL,4,300,3,900,1,2785,0,1,'2022-09-14 12:47:43','2022-09-16 07:39:09',0),
(23,2,1000000001,'bai',NULL,3,450,3,1350,1,5600,0,1,'2022-09-14 14:44:18','2022-09-18 22:12:06',1),
(24,2,1000000001,'bai',NULL,2,800,4,3200,1,5600,0,1,'2022-09-14 14:44:29','2022-09-18 22:12:06',1),
(25,2,1000000001,'bai',NULL,6,75,14,1050,1,5600,0,1,'2022-09-14 14:44:50','2022-09-18 22:12:06',1),
(27,2,1000000002,'bodong',NULL,2,800,5,4000,1,5345,5,0,'2022-09-14 14:45:36','2022-09-16 07:39:21',0),
(28,2,1000000002,'bodong',NULL,3,450,3,1350,1,5345,5,0,'2022-09-14 14:45:51','2022-09-16 07:39:21',0),
(30,2,1000000003,'Jeli Nav',NULL,6,70,25,1750,1,6650,0,1,'2022-09-14 16:07:49','2022-09-16 07:38:52',0),
(31,2,1000000003,'Jeli Nav',NULL,7,2,53,100,1,6650,0,1,'2022-09-14 16:08:14','2022-09-16 07:38:52',0),
(32,2,1000000003,'Jeli Nav',NULL,3,450,2,900,1,6650,0,1,'2022-09-14 16:08:28','2022-09-16 07:38:52',0),
(33,2,1000000003,'Jeli Nav',NULL,4,300,1,300,1,6650,0,1,'2022-09-14 16:08:48','2022-09-16 07:38:52',0),
(34,2,1000000003,'Jeli Nav',NULL,5,400,3,1200,1,6650,0,1,'2022-09-14 16:09:12','2022-09-16 07:38:52',0),
(35,2,1000000003,'Jeli Nav',NULL,2,800,3,2400,1,6650,0,1,'2022-09-14 16:09:25','2022-09-16 07:38:52',0),
(37,2,1000000004,'Harry Done',NULL,3,450,2,900,1,3700,0,1,'2022-09-14 16:18:30','2022-09-16 07:38:38',0),
(38,2,1000000004,'Harry Done',NULL,5,400,7,2800,1,3700,0,1,'2022-09-14 16:18:37','2022-09-16 07:38:38',0),
(40,2,1000000005,'Harry Done',NULL,5,400,5,2000,1,3200,1200,127,'2022-09-14 16:19:08','2022-09-18 00:50:57',1),
(42,2,1000000005,'Harry Done',NULL,2,800,3,2400,1,3200,1200,127,'2022-09-14 16:19:29','2022-09-18 00:51:03',1),
(45,2,1000000006,'jelina volov',NULL,9,6,10,60,1,2500,2245,0,'2022-09-14 20:56:08','2022-09-16 07:39:47',0),
(46,2,1000000006,'jelina volov',NULL,3,500,3,1500,1,2500,2245,0,'2022-09-14 20:56:26','2022-09-16 07:39:47',0),
(47,2,1000000006,'jelina volov',NULL,2,800,2,1600,1,2500,2245,0,'2022-09-14 20:56:40','2022-09-16 07:39:47',0),
(48,2,1000000006,'jelina volov',NULL,6,75,4,300,1,2500,2245,0,'2022-09-14 20:56:50','2022-09-16 07:39:47',0),
(49,2,1000000006,'jelina volov',NULL,7,2.5,10,25,1,2500,2245,0,'2022-09-14 20:57:06','2022-09-16 07:39:47',0),
(51,2,1000000006,'jelina volov',NULL,5,420,3,1260,1,2500,2245,0,'2022-09-14 20:57:36','2022-09-16 07:39:47',0),
(53,2,1000000007,'jelina volov',NULL,9,5,5,25,1,925,0,1,'2022-09-14 22:15:35','2022-09-16 07:32:27',0),
(54,2,1000000007,'jelina volov',NULL,6,75,12,900,1,925,0,1,'2022-09-14 22:15:44','2022-09-16 07:32:27',0),
(56,2,1000000008,'alvert zeni',NULL,5,400,5,2000,1,3000,800,0,'2022-09-15 04:02:29','2022-09-16 07:32:18',0),
(57,2,1000000008,'alvert zeni',NULL,3,450,4,1800,1,3000,800,0,'2022-09-15 04:02:48','2022-09-16 07:32:18',0),
(61,3,1000000010,'Jeli Nav',NULL,3,450,10,4500,1,5600,4100,0,'2022-09-15 07:15:08','2022-09-16 07:31:56',0),
(62,3,1000000010,'Jeli Nav',NULL,2,800,3,2400,1,5600,4100,0,'2022-09-15 07:15:22','2022-09-16 07:31:56',0),
(63,3,1000000010,'Jeli Nav',NULL,5,400,7,2800,1,5600,4100,0,'2022-09-15 07:15:47','2022-09-16 07:52:28',0),
(67,2,1000000011,'Soro Nal',NULL,3,450,5,2250,1,3290,0,1,'2022-09-16 04:15:03','2022-09-16 05:08:22',0),
(68,2,1000000011,'Soro Nal',NULL,5,400,2,800,1,3290,0,1,'2022-09-16 04:15:36','2022-09-16 05:08:22',0),
(69,2,1000000011,'Soro Nal',NULL,10,23,10,230,1,3290,0,1,'2022-09-16 04:31:22','2022-09-16 05:08:22',0),
(70,2,1000000011,'Soro Nal',NULL,7,2,5,10,1,3290,0,1,'2022-09-16 04:38:02','2022-09-16 05:08:22',0),
(77,2,1000000012,'jelina volov',NULL,3,450,5,2250,1,1500,1950,0,'2022-09-16 05:09:56','2022-09-16 05:10:14',0),
(78,2,1000000012,'jelina volov',NULL,5,400,3,1200,1,1500,1950,0,'2022-09-16 05:10:02','2022-09-16 05:10:14',0),
(81,2,1000000013,'Tela Vin',NULL,5,500,3,1500,1,3700,0,1,'2022-09-17 01:37:56','2022-09-17 01:38:56',0),
(82,2,1000000013,'Tela Vin',NULL,2,1000,2,2000,1,3700,0,1,'2022-09-17 01:38:14','2022-09-17 01:38:56',0),
(84,2,1000000013,'Tela Vin',NULL,9,10,20,200,1,3700,0,1,'2022-09-17 01:38:43','2022-09-17 01:38:56',0),
(87,2,1000000014,'alvert zeni',NULL,5,400,5,2000,1,1100,2000,0,'2022-09-17 21:37:47','2022-09-18 00:47:33',0),
(92,2,1000000014,'alvert zeni',NULL,6,75,2,150,1,1100,2000,0,'2022-09-17 21:46:10','2022-09-18 00:47:33',0),
(94,2,1000000014,'alvert zeni',NULL,3,450,2,900,1,1100,2000,0,'2022-09-18 00:46:17','2022-09-18 00:47:33',0),
(95,2,1000000014,'alvert zeni',NULL,14,1,5,5,1,1100,2000,0,'2022-09-18 00:47:17','2022-09-18 00:47:33',0),
(96,2,1000000014,'alvert zeni',NULL,15,1,45,45,1,1100,2000,0,'2022-09-18 00:47:25','2022-09-18 00:47:33',0),
(98,2,1000000015,'alvert zeni',NULL,5,400,2,800,1,805,0,1,'2022-09-18 01:04:49','2022-09-18 01:05:02',0),
(99,2,1000000015,'alvert zeni',NULL,16,1,5,5,1,805,0,1,'2022-09-18 01:04:56','2022-09-18 01:05:02',0),
(101,2,1000000016,'jelina volov',3801234567890,11,25,6,150,1,100,51,0,'2022-09-19 01:47:57','2022-09-19 02:37:30',0),
(102,2,1000000016,'jelina volov',3801234567890,23,1,1,1,1,100,51,0,'2022-09-19 01:49:15','2022-09-19 02:37:30',0),
(113,2,1000000017,'alvert zeni',1234567890,3,450,2,900,1,916,0,1,'2022-09-19 02:37:57','2022-09-19 02:38:36',0),
(114,2,1000000017,'alvert zeni',1234567890,7,2,2,4,1,916,0,1,'2022-09-19 02:38:04','2022-09-19 02:38:36',0),
(115,2,1000000017,'alvert zeni',1234567890,9,5,2,10,1,916,0,1,'2022-09-19 02:38:10','2022-09-19 02:38:36',0),
(116,2,1000000017,'alvert zeni',1234567890,23,1,2,2,1,916,0,1,'2022-09-19 02:38:27','2022-09-19 02:38:36',0),
(118,2,1000000018,'jap',123123123,10,23,15,345,1,360,0,1,'2022-09-19 02:53:23','2022-09-19 02:53:49',0),
(119,2,1000000018,'jap',123123123,9,5,3,15,1,360,0,1,'2022-09-19 02:53:44','2022-09-19 02:53:49',0),
(120,2,1000000019,NULL,0,NULL,NULL,NULL,NULL,0,0,NULL,0,'2022-09-19 03:05:56','2022-09-19 03:05:56',0);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_history` */

DROP TABLE IF EXISTS `product_history`;

CREATE TABLE `product_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_amount` double DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invoice_no` decimal(10,0) DEFAULT NULL,
  `paid_price` double DEFAULT NULL,
  `remain_price` double DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_history` */

insert  into `product_history`(`id`,`product_id`,`product_amount`,`product_price`,`total_price`,`user_id`,`invoice_no`,`paid_price`,`remain_price`,`status`,`deleted`,`created_at`) values 
(2,23,1,1,1,2,NULL,NULL,NULL,2,0,'2022-09-19 01:03:53'),
(3,23,10,1,10,2,NULL,NULL,NULL,0,0,'2022-09-19 01:16:58'),
(4,11,6,25,150,2,1000000016,NULL,NULL,1,0,'2022-09-19 01:47:57'),
(5,23,1,1,1,2,1000000016,NULL,NULL,1,0,'2022-09-19 01:49:15'),
(15,3,2,450,900,2,1000000017,NULL,NULL,1,0,'2022-09-19 02:37:57'),
(16,7,2,2,4,2,1000000017,NULL,NULL,1,0,'2022-09-19 02:38:04'),
(17,9,2,5,10,2,1000000017,NULL,NULL,1,0,'2022-09-19 02:38:10'),
(18,23,2,1,2,2,1000000017,NULL,NULL,1,0,'2022-09-19 02:38:27'),
(19,10,15,23,345,2,1000000018,NULL,NULL,1,0,'2022-09-19 02:53:23'),
(20,9,3,5,15,2,1000000018,NULL,NULL,1,0,'2022-09-19 02:53:44');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_num` decimal(10,0) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`product_num`,`product_price`,`image`,`created_at`,`updated_at`,`deleted`) values 
(1,'baymax',30,123,'uploads/baymax.png','2022-09-13 02:50:19','2022-09-14 12:29:17',0),
(2,'iphone',38,800,'uploads/iphone.jpg','2022-09-13 02:50:19','2022-09-17 14:24:24',0),
(3,'laptop',176,450,'uploads/laptop.jpg','2022-09-13 02:50:19','2022-09-19 02:38:36',0),
(4,'android phone',32,300,'uploads/android phone.jpg','2022-09-13 02:50:19','2022-09-17 14:24:51',0),
(5,'TV',5,400,'uploads/TV.jpg','2022-09-13 02:50:19','2022-09-18 01:05:02',0),
(6,'bluetooth earphone',16,75,'uploads/bluetooth earphone.jpg','2022-09-13 02:50:19','2022-09-18 00:47:33',0),
(7,'earphone',25,2,'uploads/earphone.jpg','2022-09-13 03:03:13','2022-09-19 02:38:36',0),
(9,'mouse',110,5,'uploads/mouse.jpg','2022-09-14 20:55:09','2022-09-19 02:53:49',0),
(10,'keyboard',120,23,'uploads/keyboard.jpg','2022-09-14 22:17:10','2022-09-19 02:53:49',0),
(11,'router',114,25,'uploads/router.jpg','2022-09-17 01:36:40','2022-09-19 02:37:30',0),
(16,'imagee',118,2,'uploads/imagee.jpg','2022-09-18 01:04:36','2022-09-19 00:40:49',1),
(23,'image5',18,1,'uploads/image5.jpg','2022-09-19 01:03:53','2022-09-19 02:38:36',0);

/*Table structure for table `store_history` */

DROP TABLE IF EXISTS `store_history`;

CREATE TABLE `store_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `sproduct_price` double DEFAULT NULL,
  `b_quantity` decimal(10,0) DEFAULT NULL,
  `btotal_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `store_history` */

insert  into `store_history`(`id`,`user_id`,`product_id`,`sproduct_price`,`b_quantity`,`btotal_price`,`created_at`,`updated_at`) values 
(1,NULL,9,4,100,400,'2022-09-14 20:55:24','2022-09-14 20:55:24'),
(2,NULL,3,450,50,22500,'2022-09-15 04:12:41','2022-09-15 04:12:41'),
(3,NULL,11,25,20,500,'2022-09-17 01:37:12','2022-09-17 01:37:12'),
(4,NULL,2,800,20,16000,'2022-09-17 14:24:24','2022-09-17 14:24:24'),
(5,NULL,4,300,26,7800,'2022-09-17 14:24:51','2022-09-17 14:24:51'),
(6,NULL,12,2,50,100,'2022-09-18 00:23:05','2022-09-18 00:23:05'),
(7,NULL,23,1,10,10,'2022-09-19 01:16:39','2022-09-19 01:16:39'),
(8,NULL,23,1,10,10,'2022-09-19 01:16:58','2022-09-19 01:16:58');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `unhashing_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`f_name`,`l_name`,`percentage`,`avatar`,`email`,`email_verified_at`,`unhashing_password`,`password`,`remember_token`,`created_at`,`updated_at`,`owner`,`deleted`) values 
(2,'jena','bee',75,'avatars/jena_bee.jpg','jenabee@gmail.com',NULL,'ASDdsa@12','$2y$10$cQVZ/SlARsRxx9./RIbYjeMskcRskkYFNC7LX5A4v/.eFQjwkbkAu','iU2Wl84wciKL78OcEI5MZrnxv6Up8fOJY05EPO7e9XRlWSMTdksH4NiDIl7L','2022-09-14 18:34:06','2022-09-14 18:34:06',1,0),
(3,'jelina','rasb',25,'avatars/jelina_rasb.jpg','jelinarasb@gmail.com',NULL,'ASDdsa@12','$2y$10$Ndyx6D1Tz8IYoZ4G48NQlOLUWaPsCqkLFozzUNHwcm9VlDSdL3.xe','RXsyOg88cc81kL4UhabkHKDahRC7nFszhFfk1GgreW2vSb8cwbRVxUj27cjN','2022-09-14 21:06:32','2022-09-14 21:06:32',0,0),
(5,'sveta','zetu',25,'avatars/sveta_zetu.jpg','svetzetu@gmail.com',NULL,'ASDdsa@12','$2y$10$BHqHUBZVW7pZLHl7Xx2jE.Bevb4QMPURg9OJSJYm.ixNlC1KC.lma',NULL,'2022-09-15 07:58:12','2022-09-15 07:58:12',0,1),
(6,'valeriya','kremov',20,'avatars/valeriya_kremov.jpg','valeriyakre@gmail.com',NULL,'asdasdasd','$2y$10$GzkzgPkaMZv3keLYb4G6M./UM8123yWIv09Wq5AiSFXlRBC/Dn/4u',NULL,'2022-09-15 10:42:56','2022-09-15 10:42:56',0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
