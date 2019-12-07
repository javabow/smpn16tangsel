-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_iparkir
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ip_categories`
--

DROP TABLE IF EXISTS `ip_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) unsigned NOT NULL DEFAULT 0,
  `parent` int(10) unsigned DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_categories`
--

LOCK TABLES `ip_categories` WRITE;
/*!40000 ALTER TABLE `ip_categories` DISABLE KEYS */;
INSERT INTO `ip_categories` VALUES (1,'lorem','lorem',0,NULL,NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(2,'ipsum','ipsum',1,1,NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(3,'dolor','dolor',2,2,NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(4,'ipsum','ipsum',0,NULL,NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(5,'dolor','dolor',0,NULL,NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20');
/*!40000 ALTER TABLE `ip_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_categories_posts`
--

DROP TABLE IF EXISTS `ip_categories_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_categories_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_posts` int(10) unsigned NOT NULL,
  `id_categories` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_categories_posts_id_posts_foreign` (`id_posts`),
  KEY `ip_categories_posts_id_categories_foreign` (`id_categories`),
  CONSTRAINT `ip_categories_posts_id_categories_foreign` FOREIGN KEY (`id_categories`) REFERENCES `ip_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ip_categories_posts_id_posts_foreign` FOREIGN KEY (`id_posts`) REFERENCES `ip_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_categories_posts`
--

LOCK TABLES `ip_categories_posts` WRITE;
/*!40000 ALTER TABLE `ip_categories_posts` DISABLE KEYS */;
INSERT INTO `ip_categories_posts` VALUES (1,1,1,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(2,1,2,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(3,1,3,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(4,2,1,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(5,2,2,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(6,2,3,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(7,3,1,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(8,3,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(9,3,3,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(10,4,1,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(11,4,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(12,4,3,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(13,5,1,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(14,5,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(15,5,3,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(16,6,1,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(17,6,2,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(18,6,3,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(19,7,1,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(20,7,2,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(21,7,3,'2019-08-06 11:58:23','2019-08-06 11:58:23');
/*!40000 ALTER TABLE `ip_categories_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_contacts`
--

DROP TABLE IF EXISTS `ip_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_contacts`
--

LOCK TABLES `ip_contacts` WRITE;
/*!40000 ALTER TABLE `ip_contacts` DISABLE KEYS */;
INSERT INTO `ip_contacts` VALUES (1,'Altin Danu Putut Arisa','Founder / Direktur Utama','paltindanu@gmail.com','+62 821-1363-5169','2019-08-06 11:58:23','2019-08-06 11:58:23'),(2,'Holy Sie','Co. Founder / Dir. Keuangan','ihcholy@gmail.com','+62 857-7222-2979','2019-08-06 11:58:23','2019-08-06 12:22:28'),(3,'Bagus T. Prabawa','Co. Founder / Dir. Teknik','bagustp@gmail.com','+62 813-1066-3842','2019-08-06 11:58:24','2019-08-06 11:58:24');
/*!40000 ALTER TABLE `ip_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_menus`
--

DROP TABLE IF EXISTS `ip_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pages` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_menus_id_pages_foreign` (`id_pages`),
  CONSTRAINT `ip_menus_id_pages_foreign` FOREIGN KEY (`id_pages`) REFERENCES `ip_pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_menus`
--

LOCK TABLES `ip_menus` WRITE;
/*!40000 ALTER TABLE `ip_menus` DISABLE KEYS */;
INSERT INTO `ip_menus` VALUES (1,'Beranda',NULL,'Home',NULL,'/#home',1,'2019-08-06 11:58:17','2019-08-06 11:58:17'),(2,'Produk',NULL,'Product',NULL,'/#produk',1,'2019-08-06 11:58:17','2019-08-06 11:58:17'),(3,'Fitur',NULL,'Feature',NULL,'/#fitur',1,'2019-08-06 11:58:17','2019-08-06 11:58:17'),(4,'Kontak',NULL,'Contact',NULL,'/#kontak',1,'2019-08-06 11:58:17','2019-08-06 11:58:17'),(5,'Blog',NULL,'Blog',NULL,'blogs',1,'2019-08-06 11:58:17','2019-08-06 11:58:17');
/*!40000 ALTER TABLE `ip_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_migrations`
--

DROP TABLE IF EXISTS `ip_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_migrations`
--

LOCK TABLES `ip_migrations` WRITE;
/*!40000 ALTER TABLE `ip_migrations` DISABLE KEYS */;
INSERT INTO `ip_migrations` VALUES (1,'2014_10_11_000000_create_user_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2018_07_31_152112_create_tags_table',1),(5,'2018_07_31_152904_create_categories_table',1),(6,'2018_07_31_154206_create_page_status_table',1),(7,'2018_07_31_154207_create_pages_table',1),(8,'2018_07_31_154513_create_website_text_table',1),(9,'2018_07_31_161318_create_post_status_table',1),(10,'2018_07_31_161320_create_posts_table',1),(11,'2018_07_31_161321_create_tags_posts_table',1),(12,'2018_07_31_162323_create_post_comments_table',1),(13,'2018_08_01_094940_create_params_table',1),(14,'2018_08_01_094941_create_param_details_table',1),(15,'2018_08_01_094942_create_upload_files_table',1),(16,'2019_07_30_074028_create_menus_table',1),(17,'2019_07_31_181545_categories_posts_table',1),(18,'2019_07_31_183332_user_defined_pages_table',1),(19,'2019_08_06_082227_create_notifications_table',1),(20,'2019_08_06_185144_create_contacts_table',1);
/*!40000 ALTER TABLE `ip_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_notifications`
--

DROP TABLE IF EXISTS `ip_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_notifications`
--

LOCK TABLES `ip_notifications` WRITE;
/*!40000 ALTER TABLE `ip_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_page_status`
--

DROP TABLE IF EXISTS `ip_page_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_page_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_page_status_name_unique` (`name`),
  UNIQUE KEY `ip_page_status_name_en_unique` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_page_status`
--

LOCK TABLES `ip_page_status` WRITE;
/*!40000 ALTER TABLE `ip_page_status` DISABLE KEYS */;
INSERT INTO `ip_page_status` VALUES (1,'Published','Diterbitkan','2019-08-06 11:58:16','2019-08-06 11:58:16'),(2,'Draft','Draf','2019-08-06 11:58:16','2019-08-06 11:58:16'),(3,'Trash','Dihapus','2019-08-06 11:58:16','2019-08-06 11:58:16');
/*!40000 ALTER TABLE `ip_page_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_pages`
--

DROP TABLE IF EXISTS `ip_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_page_status` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_pages_name_unique` (`name`),
  UNIQUE KEY `ip_pages_name_en_unique` (`name_en`),
  KEY `ip_pages_id_page_status_foreign` (`id_page_status`),
  CONSTRAINT `ip_pages_id_page_status_foreign` FOREIGN KEY (`id_page_status`) REFERENCES `ip_page_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_pages`
--

LOCK TABLES `ip_pages` WRITE;
/*!40000 ALTER TABLE `ip_pages` DISABLE KEYS */;
INSERT INTO `ip_pages` VALUES (1,'Home','Home',1,'2019-08-06 11:58:16','2019-08-06 11:58:16'),(2,'Blog','Blog',1,'2019-08-06 11:58:17','2019-08-06 11:58:17');
/*!40000 ALTER TABLE `ip_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_param_details`
--

DROP TABLE IF EXISTS `ip_param_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_param_details` (
  `id` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_params` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_param_details_id_params_foreign` (`id_params`),
  CONSTRAINT `ip_param_details_id_params_foreign` FOREIGN KEY (`id_params`) REFERENCES `ip_params` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_param_details`
--

LOCK TABLES `ip_param_details` WRITE;
/*!40000 ALTER TABLE `ip_param_details` DISABLE KEYS */;
INSERT INTO `ip_param_details` VALUES ('0010','blogs','001','2019-08-06 11:58:15','2019-08-06 11:58:15'),('0020','Every day may not be good... but there\'s something good in every day.','002','2019-08-06 11:58:15','2019-08-06 11:58:15');
/*!40000 ALTER TABLE `ip_param_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_params`
--

DROP TABLE IF EXISTS `ip_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_params` (
  `id` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_params`
--

LOCK TABLES `ip_params` WRITE;
/*!40000 ALTER TABLE `ip_params` DISABLE KEYS */;
INSERT INTO `ip_params` VALUES ('001','files','2019-08-06 11:58:15','2019-08-06 11:58:15'),('002','sticky note','2019-08-06 11:58:15','2019-08-06 11:58:15');
/*!40000 ALTER TABLE `ip_params` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_password_resets`
--

DROP TABLE IF EXISTS `ip_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `ip_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_password_resets`
--

LOCK TABLES `ip_password_resets` WRITE;
/*!40000 ALTER TABLE `ip_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_post_comments`
--

DROP TABLE IF EXISTS `ip_post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_post_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_on_comment` int(10) unsigned DEFAULT NULL COMMENT 'id_comments untuk mendapatkan id comment untuk reply comments',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_users` int(10) unsigned NOT NULL COMMENT 'id_users untuk mendapatkan data user mana yang mengomentari',
  `id_posts` int(10) unsigned NOT NULL COMMENT 'id_posts untuk mendapatkan data yang mana yang dikomentari',
  PRIMARY KEY (`id`),
  KEY `ip_post_comments_id_users_foreign` (`id_users`),
  KEY `ip_post_comments_id_posts_foreign` (`id_posts`),
  CONSTRAINT `ip_post_comments_id_posts_foreign` FOREIGN KEY (`id_posts`) REFERENCES `ip_posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ip_post_comments_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `ip_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_post_comments`
--

LOCK TABLES `ip_post_comments` WRITE;
/*!40000 ALTER TABLE `ip_post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_post_status`
--

DROP TABLE IF EXISTS `ip_post_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_post_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_post_status`
--

LOCK TABLES `ip_post_status` WRITE;
/*!40000 ALTER TABLE `ip_post_status` DISABLE KEYS */;
INSERT INTO `ip_post_status` VALUES (1,'Published','Diterbitkan','2019-08-06 11:58:19','2019-08-06 11:58:19'),(2,'Draft','Draf','2019-08-06 11:58:19','2019-08-06 11:58:19'),(3,'Trash','Dihapus','2019-08-06 11:58:19','2019-08-06 11:58:19');
/*!40000 ALTER TABLE `ip_post_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_posts`
--

DROP TABLE IF EXISTS `ip_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `id_post_status` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_posts_id_post_status_foreign` (`id_post_status`),
  KEY `ip_posts_created_by_foreign` (`created_by`),
  KEY `ip_posts_updated_by_foreign` (`updated_by`),
  CONSTRAINT `ip_posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `ip_users` (`id`),
  CONSTRAINT `ip_posts_id_post_status_foreign` FOREIGN KEY (`id_post_status`) REFERENCES `ip_post_status` (`id`),
  CONSTRAINT `ip_posts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `ip_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_posts`
--

LOCK TABLES `ip_posts` WRITE;
/*!40000 ALTER TABLE `ip_posts` DISABLE KEYS */;
INSERT INTO `ip_posts` VALUES (1,'Lorem Ipsum Dolor 1','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-1.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 1','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-1.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-1','photos/1/blog-1.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(2,'Lorem Ipsum Dolor 2','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-2.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 2','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-2.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-2','photos/1/blog-2.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(3,'Lorem Ipsum Dolor 3','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-3.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 3','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-3.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-3','photos/1/blog-3.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(4,'Lorem Ipsum Dolor 4','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-4.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 4','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-4.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-4','photos/1/blog-4.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(5,'Lorem Ipsum Dolor 5','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-5.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 5','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-5.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-5','photos/1/blog-5.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(6,'Lorem Ipsum Dolor 6','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-6.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 6','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-6.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-6','photos/1/blog-6.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(7,'Lorem Ipsum Dolor 7','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-7.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 7','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-7.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-7','photos/1/blog-7.jpg',0,0,1,1,1,'2019-08-06 11:58:19','2019-08-06 11:58:19'),(8,'Lorem Ipsum Dolor 8','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-1.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 8','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-1.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-8','photos/1/blog-1.jpg',0,0,1,1,1,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(9,'Lorem Ipsum Dolor 9','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-2.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 9','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-2.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-9','photos/1/blog-2.jpg',0,0,1,1,1,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(10,'Lorem Ipsum Dolor 10','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-3.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem Ipsum Dolor 10','<img class=\"img-fluid first-image\" src=\"http://127.0.0.1:8000/photos/1/blog-3.jpg\" alt=\"\">\n                    <br><br>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','lorem-ipsum-dolor-10','photos/1/blog-3.jpg',0,0,1,1,1,'2019-08-06 11:58:20','2019-08-06 11:58:20');
/*!40000 ALTER TABLE `ip_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_tags`
--

DROP TABLE IF EXISTS `ip_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_tags`
--

LOCK TABLES `ip_tags` WRITE;
/*!40000 ALTER TABLE `ip_tags` DISABLE KEYS */;
INSERT INTO `ip_tags` VALUES (1,'lorem','lorem',NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(2,'ipsum','ipsum',NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20'),(3,'dolor','dolor',NULL,NULL,'2019-08-06 11:58:20','2019-08-06 11:58:20');
/*!40000 ALTER TABLE `ip_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_tags_posts`
--

DROP TABLE IF EXISTS `ip_tags_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_tags_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_posts` int(10) unsigned NOT NULL,
  `id_tags` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_tags_posts_id_posts_foreign` (`id_posts`),
  KEY `ip_tags_posts_id_tags_foreign` (`id_tags`),
  CONSTRAINT `ip_tags_posts_id_posts_foreign` FOREIGN KEY (`id_posts`) REFERENCES `ip_posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ip_tags_posts_id_tags_foreign` FOREIGN KEY (`id_tags`) REFERENCES `ip_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_tags_posts`
--

LOCK TABLES `ip_tags_posts` WRITE;
/*!40000 ALTER TABLE `ip_tags_posts` DISABLE KEYS */;
INSERT INTO `ip_tags_posts` VALUES (1,1,1,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(2,1,2,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(3,1,3,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(4,2,1,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(5,2,2,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(6,2,3,'2019-08-06 11:58:21','2019-08-06 11:58:21'),(7,3,1,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(8,3,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(9,3,3,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(10,4,1,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(11,4,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(12,4,3,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(13,5,1,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(14,5,2,'2019-08-06 11:58:22','2019-08-06 11:58:22'),(15,5,3,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(16,6,1,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(17,6,2,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(18,6,3,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(19,7,1,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(20,7,2,'2019-08-06 11:58:23','2019-08-06 11:58:23'),(21,7,3,'2019-08-06 11:58:23','2019-08-06 11:58:23');
/*!40000 ALTER TABLE `ip_tags_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_upload_files`
--

DROP TABLE IF EXISTS `ip_upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_upload_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) NOT NULL,
  `hash` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_param_details` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_upload_files_create_by_foreign` (`create_by`),
  KEY `ip_upload_files_id_param_details_foreign` (`id_param_details`),
  CONSTRAINT `ip_upload_files_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `ip_users` (`id`),
  CONSTRAINT `ip_upload_files_id_param_details_foreign` FOREIGN KEY (`id_param_details`) REFERENCES `ip_param_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_upload_files`
--

LOCK TABLES `ip_upload_files` WRITE;
/*!40000 ALTER TABLE `ip_upload_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_user_defined_pages`
--

DROP TABLE IF EXISTS `ip_user_defined_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_user_defined_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `id_pages` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_user_defined_pages_id_pages_foreign` (`id_pages`),
  KEY `ip_user_defined_pages_created_by_foreign` (`created_by`),
  KEY `ip_user_defined_pages_updated_by_foreign` (`updated_by`),
  CONSTRAINT `ip_user_defined_pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `ip_users` (`id`),
  CONSTRAINT `ip_user_defined_pages_id_pages_foreign` FOREIGN KEY (`id_pages`) REFERENCES `ip_pages` (`id`),
  CONSTRAINT `ip_user_defined_pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `ip_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_user_defined_pages`
--

LOCK TABLES `ip_user_defined_pages` WRITE;
/*!40000 ALTER TABLE `ip_user_defined_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_user_defined_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_user_roles`
--

DROP TABLE IF EXISTS `ip_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_user_roles`
--

LOCK TABLES `ip_user_roles` WRITE;
/*!40000 ALTER TABLE `ip_user_roles` DISABLE KEYS */;
INSERT INTO `ip_user_roles` VALUES (1,'super admin','2019-08-06 11:58:15','2019-08-06 11:58:15'),(2,'admin','2019-08-06 11:58:16','2019-08-06 11:58:16'),(3,'user','2019-08-06 11:58:16','2019-08-06 11:58:16');
/*!40000 ALTER TABLE `ip_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_users`
--

DROP TABLE IF EXISTS `ip_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/storage/images/dp.jpg',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `id_user_roles` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_users_username_unique` (`username`),
  KEY `ip_users_id_user_roles_foreign` (`id_user_roles`),
  CONSTRAINT `ip_users_id_user_roles_foreign` FOREIGN KEY (`id_user_roles`) REFERENCES `ip_user_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_users`
--

LOCK TABLES `ip_users` WRITE;
/*!40000 ALTER TABLE `ip_users` DISABLE KEYS */;
INSERT INTO `ip_users` VALUES (1,'admin','admin','admin@iparkir.com','$2y$10$ZIkQxQ8RJ99kWhc/vQqVr.4dy7BynRIDn5KAAorB6O3PyK5abn9ju','photos/1/thumbs/dp.jpg','',NULL,'2019-08-06 11:58:16','2019-08-06 11:58:16','','',1),(2,'Ling Ling','lingling','lingling@gmail.com','$2y$10$vWRuZenaJCai12VFGqD0f.ULbP4.F96MitaGz0os0Kuc6c2v3WMWK','photos/1/thumbs/dp.jpg','',NULL,'2019-08-06 11:58:16','2019-08-06 11:58:16','','',2);
/*!40000 ALTER TABLE `ip_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_website_text`
--

DROP TABLE IF EXISTS `ip_website_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_website_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_editor` tinyint(1) NOT NULL DEFAULT 0,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_pages` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_website_text_label_unique` (`label`),
  UNIQUE KEY `ip_website_text_label_en_unique` (`label_en`),
  KEY `ip_website_text_id_pages_foreign` (`id_pages`),
  CONSTRAINT `ip_website_text_id_pages_foreign` FOREIGN KEY (`id_pages`) REFERENCES `ip_pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_website_text`
--

LOCK TABLES `ip_website_text` WRITE;
/*!40000 ALTER TABLE `ip_website_text` DISABLE KEYS */;
INSERT INTO `ip_website_text` VALUES (1,'Teks Header','Header Text','<p class=\"text-center\"><span class=\"title\">iParkir</span> adalah software untuk menyewa tempat parkir berbasis internet. <br> iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p>','<p class=\"text-center\"> <span class=\"title\"> iParkir </span> is software for renting internet-based parking lots. <br> iParkir is real time and multiplatform, available on various electronic devices. </p>',1,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(2,'Produk - Judul iParkir Aplikasi Mobile','Product - iParkir Mobile Application Title','iParkir Aplikasi Mobile','iParkir Application Mobile',0,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(3,'Produk - Teks iParkir Aplikasi Mobile','Product - iParkir Mobile Application Text','<p>iParkir adalah aplikasi mobile yang digunakan untuk memesan tempat parkir. iParkir bersifat real time dan multiplatform, tersedia di berbagai perangkat elektronik.</p>','<p>iParkir is a mobile application used to book a parking space. iParkir is real time and multiplatform, available on various electronic devices.</p>',1,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(4,'Produk - Judul Sangat mudah menggunakan iParkir','Product - It\'s easy to use iParking Title','Sangat mudah menggunakan iParkir','It\'s easy to use iParkir',0,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(5,'Produk - Teks Sangat mudah menggunakan iParkir','Product - It\'s easy to use iParking Text','<ul>\n                    <li><span><i class=\"fas fa-search\"></i></span> 1. Cari lokasi diinginkan</li>\n                    <li><span><i class=\"fab fa-android\"></i></span>2. Memesan tempat parkir melalui iParkir</li>\n                    <li><span><i class=\"fas fa-car\"></i></span>3. Parkir kendaraan anda</li>\n                  </ul>','<ul>\n                     <li> <span> <i class=\"fas fa-search\"> </i> </span> 1. Search for desired location </li>\n                     <li> <span> <i class=\"fab fa-android\"> </i> </span> 2. Book a parking space through iParkir </li>\n                     <li> <span> <i class=\"fa-car fas\"> </i> </span> 3. Park your vehicle </li>\n                   </ul>',1,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(6,'Produk - Judul Metode Pembayaran','Product - Payment method title','Metode Pembayaran','Payment Method',0,'','2019-08-06 11:58:17','2019-08-06 11:58:17',1),(7,'Produk - Teks Metode Pembayaran','Product - Payment method text','<ul><li><span><i class=\"fas fa-calendar-alt\"></i></span> 1. Berlangganan Bulanan</li>\n                  <li><span><i class=\"fas fa-money-check-alt\"></i></span>2. Bayar per transaksi</li></ul>','<ul><li><span><i class=\"fas fa-calendar-alt\"></i></span> 1. Monthly Subscription</li>\n                    <li><span><i class=\"fas fa-money-check-alt\"></i></span>2. Pay per transaction</li></ul>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(8,'Produk - Judul Dapatkan dan gunakan iParkir sekarang juga','Product - Get and use iParkir now title','Dapatkan dan gunakan iParkir sekarang juga','Get and use iParkir now',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(9,'Produk - Judul Mengapa menggunakan iParkir','Product - Why use iParkir title','<p class=\"display-4\">\n                    <strong>Mengapa menggunakan iParkir ?</strong>\n                  </p>\n                  <p class=\"display-4\">\n                    <small>Berikut beberapa alasan mengapa menggunakan iParkir</small>\n                  </p>','<p class=\"display-4\">\n                     <strong> Why use iParkir ? </strong>\n                   </p>\n                   <p class=\"display-4\">\n                     <small> Here are some reasons why to use iParkir </small>\n                   </p>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(10,'Produk - Mengapa menggunakan iParkir teks 1','Product - Why use iParkir text 1','<p>Parkir di mana saja, kapan saja jadi mudah dengan iParkir</p>','<p> Parking anywhere, anytime is easy with iParkir </p>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(11,'Produk - Mengapa menggunakan iParkir teks 2','Product - Why use iParkir text 2','<p>Terpercaya, iParkir menjamin kualitas pelayanan dengan sebaik-baiknya</p>','<p> Trusted, iParkir guarantees the best quality of service </p>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(12,'Produk - Mengapa menggunakan iParkir teks 3','Product - Why use iParkir text 3','<p>Hanya dengan menggunakan smartphone, dapatkan akses parkir di berbagai wilayah Indonesia</p>','<p> Only by using a smartphone, get parking access in various parts of Indonesia </p>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(13,'Fitur - Judul','Fitur - Title','<p class=\"title\">iParkir memiliki fitur-fitur sebagai berikut :</p>','<p class=\"title\"> iParkir has the following features: </p>',1,'','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(14,'Fitur - Detail 1','Fitur - Detail 1','Mencari tempat parkir hanya dengan 1 kali klik','Look for a parking space with just 1 click',0,'detail fitur','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(15,'Fitur - Detail 2','Fitur - Detail 2','Memiliki berbagai promo diskon harga','Have various price discount promos',0,'detail fitur','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(16,'Fitur - Detail 3','Fitur - Detail 3','Memiliki fitur chat langsung dengan juru parkir','Has a live chat feature with a parking interpreter',0,'detail fitur','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(17,'Fitur - Detail 4','Fitur - Detail 4','Keamanan transaksi dapat dilindungi oleh asuransi','Transaction security can be protected by insurance',0,'detail fitur','2019-08-06 11:58:18','2019-08-06 11:58:18',1),(18,'Fitur - Detail 5','Fitur - Detail 5','Fitur saran & kritik, untuk pengguna mengadukan keluhan','Features suggestions & criticism, for users to complain about complaints',0,'detail fitur','2019-08-06 11:58:19','2019-08-06 11:58:19',1),(19,'Subscribe','Subscribe','<p class=\"display-4\"><strong>Tertarik dengan iParkir ?</strong></p>\n                  <p class=\"display-4\">Ayo berlangganan dan dapatkan berita serta berbagai promo terbaru dari <strong>iParkir</strong></p>','<p class=\"display-4\"> <strong> Interested in iParkir? </strong> </p>\n                 <p class=\"display-4\"> Subscribe and get the latest news and various promos from <strong> iParkir </strong> </p>',1,NULL,'2019-08-06 11:58:19','2019-08-06 11:58:19',1);
/*!40000 ALTER TABLE `ip_website_text` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-07  2:35:01
