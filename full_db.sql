/*
SQLyog Professional
MySQL - 5.7.24 : Database - sikepa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `agencies` */

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `agencies` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `section_id` mediumint(9) NOT NULL,
  `category_id` mediumint(9) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_key` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `publish` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `article` */

/*Table structure for table `category_article` */

DROP TABLE IF EXISTS `category_article`;

CREATE TABLE `category_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `section_id` mediumint(9) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_article` */

/*Table structure for table `category_page` */

DROP TABLE IF EXISTS `category_page`;

CREATE TABLE `category_page` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `section_id` mediumint(9) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_page` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faq` */

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answere` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faq` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(78,'2014_10_12_000000_create_users_table',1),
(79,'2014_10_12_100000_create_password_resets_table',1),
(80,'2019_08_19_000000_create_failed_jobs_table',1),
(81,'2019_09_14_120620_create_permission_tables',1),
(82,'2019_09_14_120740_create_section_article_tables',1),
(83,'2019_09_14_121327_create_category_articles_table',1),
(84,'2019_09_14_121356_create_articles_table',1),
(85,'2019_09_17_013647_create_faq_tables',1),
(86,'2019_09_17_030731_create_category_page_tables',1),
(87,'2019_09_17_030903_create_page_tables',1),
(88,'2019_09_18_122411_create_agencies_tables',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

insert  into `model_has_permissions`(`permission_id`,`model_type`,`model_id`) values 
(1,'App\\User',1),
(2,'App\\User',1),
(3,'App\\User',1),
(4,'App\\User',1),
(5,'App\\User',1),
(6,'App\\User',1),
(7,'App\\User',1),
(8,'App\\User',1),
(9,'App\\User',1);

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\User',2),
(2,'App\\User',3),
(3,'App\\User',4),
(4,'App\\User',5),
(5,'App\\User',6),
(6,'App\\User',7),
(7,'App\\User',8);

/*Table structure for table `page` */

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `section_id` mediumint(9) NOT NULL,
  `category_id` mediumint(9) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `page` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Create User','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(2,'Read User','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(3,'Update User','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(4,'Delete User','web','2019-10-04 13:59:41','2019-10-04 13:59:41'),
(5,'Create Article','web','2019-10-04 13:59:41','2019-10-04 13:59:41'),
(6,'Read Article','web','2019-10-04 13:59:41','2019-10-04 13:59:41'),
(7,'Update Article','web','2019-10-04 13:59:41','2019-10-04 13:59:41'),
(8,'Delete Article','web','2019-10-04 13:59:41','2019-10-04 13:59:41'),
(9,'Publish / Draft Article','web','2019-10-04 13:59:41','2019-10-04 13:59:41');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Bagian Kerja Sama','web','2019-10-04 13:59:39','2019-10-04 13:59:39'),
(2,'SESMEN','web','2019-10-04 13:59:39','2019-10-04 13:59:39'),
(3,'Menteri','web','2019-10-04 13:59:39','2019-10-04 13:59:39'),
(4,'Bagian Hukum','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(5,'Kepala Biro Perencanaan dan Data','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(6,'Deputi','web','2019-10-04 13:59:40','2019-10-04 13:59:40'),
(7,'Bagian Ortala','web','2019-10-04 13:59:40','2019-10-04 13:59:40');

/*Table structure for table `section_article` */

DROP TABLE IF EXISTS `section_article`;

CREATE TABLE `section_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `section_article` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`jabatan`,`photo`,`signature`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin','admin@gmail.com',NULL,'$2y$10$RfPkgr76koSYZvnyvNCzoefktfBxygSakEK3sfc/2IBQWYrpdv5Di','Admin',NULL,NULL,NULL,'2019-10-04 13:59:42','2019-10-04 13:59:42'),
(2,'Bagian Kerja Sama','bagiankerjasama','bagiankerjasama@gmail.com',NULL,'$2y$10$qGgv8jMwgduip9pd4kYGou0/TY7xn3xnaHjNvsb7l0hje5C57Ffle','Bagian Kerja Sama',NULL,NULL,NULL,'2019-10-04 13:59:43','2019-10-04 13:59:43'),
(3,'SESMEN','sesmen','sesmen@gmail.com',NULL,'$2y$10$BIaHuM3t2eEsQ7OigcRxQ.bKDlfgNuxxKkWFZksg2EzV/NTqQ2ptK','SESMEN',NULL,NULL,NULL,'2019-10-04 13:59:43','2019-10-04 13:59:43'),
(4,'Menteri','menteri','menteri@gmail.com',NULL,'$2y$10$kz57mFrh93fegQoZkOtOWe7kvvy/wo2ih9V2GIl4/f7VH5LoSx2ay','Menteri',NULL,NULL,NULL,'2019-10-04 13:59:43','2019-10-04 13:59:43'),
(5,'Bagian Hukum','bagianhukum','bagianhukum@gmail.com',NULL,'$2y$10$x2o9FXEomcQyvJfHajcCeucUFmbPFbTvj1691LTQeWTIFsYychtc6','Bagian Hukum',NULL,NULL,NULL,'2019-10-04 13:59:44','2019-10-04 13:59:44'),
(6,'Kepala Biro Perencanaan dan Data','kepalabiro','kepalabiro@gmail.com',NULL,'$2y$10$oGTGXtd/PAgiiRHsh5OdMuPFjZ/qoAnlBxqOBHxcgqPrhqR6PHoAG','Kepala Biro Perencanaan dan Data',NULL,NULL,NULL,'2019-10-04 13:59:44','2019-10-04 13:59:44'),
(7,'Deputi','deputi','deputi@gmail.com',NULL,'$2y$10$Gn3ik8HtrP1kKpueasICsuqWI1jiA9ucRwuHKtfreM00KQUQ4x3rK','Deputi',NULL,NULL,NULL,'2019-10-04 13:59:44','2019-10-04 13:59:44'),
(8,'Bagian Ortala','bagianortala','bagianortala@gmail.com',NULL,'$2y$10$uHci3yNAbrBRWRKsKWcwI.lRpZozpinK0WB18MEANspUu5paQqsBy','Bagian Ortala',NULL,NULL,NULL,'2019-10-04 13:59:44','2019-10-04 13:59:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
