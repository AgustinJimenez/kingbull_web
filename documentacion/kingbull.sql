CREATE DATABASE  IF NOT EXISTS `kingbull` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kingbull`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: kingbull
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'Jg6gOAUdj40AtLJEhbhvEnXw6kfhztfn',1,'2016-10-26 17:50:14','2016-10-26 17:50:14','2016-10-26 17:50:14'),(37,21,'lXl7Wv9h0P7voNviNLL5J75kRxp8KaaV',1,NULL,'2017-08-03 14:02:20','2017-08-03 14:02:20'),(38,21,'ssvbQaOjknxfXwdQZyvDJcOAitpz97KH',1,'2017-08-03 14:02:20','2017-08-03 14:02:20','2017-08-03 14:02:20'),(39,22,'80ElyFWISAshsxAFxDXEEJUZ0nm3m1vR',1,NULL,'2017-08-03 14:23:11','2017-08-03 14:23:11'),(40,22,'qgl8hgekohRR7z2U8D85j2cgSdp1380I',1,'2017-08-03 14:23:11','2017-08-03 14:23:11','2017-08-03 14:23:11'),(41,23,'0hx2VhMwh62AvF5cpI45NK5Hy0bhvOtQ',1,NULL,'2017-08-03 14:23:36','2017-08-03 14:23:36'),(42,23,'vnKeqkJuNhOOiMkcQSWZOfxAJpRDoQhS',1,'2017-08-03 14:23:36','2017-08-03 14:23:36','2017-08-03 14:23:36'),(43,24,'BzJ3rKZ0No6RBWWQ2b5eeGTlpCf1Zeiq',1,NULL,'2017-08-03 14:24:07','2017-08-03 14:24:08'),(44,24,'SUY8dB2837CjlxQTnoQMpaLqbZA19m8K',1,'2017-08-03 14:24:08','2017-08-03 14:24:08','2017-08-03 14:24:08'),(45,25,'o17YxxaELH63vqJnSLwHogI6N1hRDB63',1,NULL,'2017-08-03 14:24:34','2017-08-03 14:24:34'),(46,25,'0DiZznuu3I5r6fLn4Iy6QScmvA71fSp1',1,'2017-08-03 14:24:34','2017-08-03 14:24:34','2017-08-03 14:24:34');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto__contactos`
--

DROP TABLE IF EXISTS `contacto__contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto__contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto__contactos`
--

LOCK TABLES `contacto__contactos` WRITE;
/*!40000 ALTER TABLE `contacto__contactos` DISABLE KEYS */;
INSERT INTO `contacto__contactos` VALUES (2,'Macl Lopez','123456','gym@kingbull.com','2016-10-27 15:44:16','2016-10-27 15:44:16'),(3,'Avda. San Martin','123456','gym@kingbull.com','2016-10-27 15:44:47','2016-10-27 15:45:02');
/*!40000 ALTER TABLE `contacto__contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard__widgets`
--

DROP TABLE IF EXISTS `dashboard__widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard__widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `widgets` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `dashboard__widgets_user_id_foreign` (`user_id`),
  CONSTRAINT `dashboard__widgets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard__widgets`
--

LOCK TABLES `dashboard__widgets` WRITE;
/*!40000 ALTER TABLE `dashboard__widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard__widgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__file_translations`
--

DROP TABLE IF EXISTS `media__file_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__file_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media__file_translations_file_id_locale_unique` (`file_id`,`locale`),
  KEY `media__file_translations_locale_index` (`locale`),
  CONSTRAINT `media__file_translations_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `media__files` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__file_translations`
--

LOCK TABLES `media__file_translations` WRITE;
/*!40000 ALTER TABLE `media__file_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `media__file_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__files`
--

DROP TABLE IF EXISTS `media__files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__files`
--

LOCK TABLES `media__files` WRITE;
/*!40000 ALTER TABLE `media__files` DISABLE KEYS */;
INSERT INTO `media__files` VALUES (1,'1-menu.png','/assets/media/1-menu.png','png','image/png','150134',0,'2016-10-27 21:43:59','2016-10-27 21:43:59'),(2,'1-menu_1.png','/assets/media/1-menu_1.png','png','image/png','150134',0,'2016-10-27 22:10:31','2016-10-27 22:10:31'),(3,'captura-de-pantalla-de-2015-04-09-085106.png','/assets/media/captura-de-pantalla-de-2015-04-09-085106.png','png','image/png','306883',0,'2016-10-27 22:22:20','2016-10-27 22:22:20'),(4,'pp.jpg','/assets/media/pp.jpg','jpg','image/jpeg','21814',0,'2017-08-03 18:27:04','2017-08-03 18:27:04'),(5,'20476094-1634862419888641-8929216168661325258-n.jpg','/assets/media/20476094-1634862419888641-8929216168661325258-n.jpg','jpg','image/jpeg','23185',0,'2017-08-03 18:30:11','2017-08-03 18:30:11'),(6,'20245679-1228470223943082-1912506989325703748-n.jpg','/assets/media/20245679-1228470223943082-1912506989325703748-n.jpg','jpg','image/jpeg','13796',0,'2017-08-03 18:33:00','2017-08-03 18:33:00');
/*!40000 ALTER TABLE `media__files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__imageables`
--

DROP TABLE IF EXISTS `media__imageables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__imageables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__imageables`
--

LOCK TABLES `media__imageables` WRITE;
/*!40000 ALTER TABLE `media__imageables` DISABLE KEYS */;
INSERT INTO `media__imageables` VALUES (1,4,1,'Modules\\Noticias\\Entities\\Noticia','imagen',NULL,'2017-08-03 18:27:10','2017-08-03 18:27:10'),(2,5,2,'Modules\\Noticias\\Entities\\Noticia','imagen',NULL,'2017-08-03 18:30:16','2017-08-03 18:30:16'),(3,6,2,'Modules\\Wod\\Entities\\Wod','imagen',NULL,'2017-08-03 18:33:14','2017-08-03 18:33:14');
/*!40000 ALTER TABLE `media__imageables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu__menu_translations`
--

DROP TABLE IF EXISTS `menu__menu_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu__menu_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menu_translations_menu_id_locale_unique` (`menu_id`,`locale`),
  KEY `menu__menu_translations_locale_index` (`locale`),
  CONSTRAINT `menu__menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu__menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu__menu_translations`
--

LOCK TABLES `menu__menu_translations` WRITE;
/*!40000 ALTER TABLE `menu__menu_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu__menu_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu__menuitem_translations`
--

DROP TABLE IF EXISTS `menu__menuitem_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu__menuitem_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menuitem_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menuitem_translations_menuitem_id_locale_unique` (`menuitem_id`,`locale`),
  KEY `menu__menuitem_translations_locale_index` (`locale`),
  CONSTRAINT `menu__menuitem_translations_menuitem_id_foreign` FOREIGN KEY (`menuitem_id`) REFERENCES `menu__menuitems` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu__menuitem_translations`
--

LOCK TABLES `menu__menuitem_translations` WRITE;
/*!40000 ALTER TABLE `menu__menuitem_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu__menuitem_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu__menuitems`
--

DROP TABLE IF EXISTS `menu__menuitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu__menuitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu__menuitems_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu__menuitems_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu__menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu__menuitems`
--

LOCK TABLES `menu__menuitems` WRITE;
/*!40000 ALTER TABLE `menu__menuitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu__menuitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu__menus`
--

DROP TABLE IF EXISTS `menu__menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu__menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu__menus`
--

LOCK TABLES `menu__menus` WRITE;
/*!40000 ALTER TABLE `menu__menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu__menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_07_02_230147_migration_cartalyst_sentinel',1),('2014_10_14_200250_create_settings_table',2),('2014_10_15_191204_create_setting_translations_table',2),('2015_06_18_170048_make_settings_value_text_field',2),('2015_10_22_130947_make_settings_name_unique',2),('2014_11_03_160015_create_menus_table',3),('2014_11_03_160138_create_menu-translations_table',3),('2014_11_03_160753_create_menuitems_table',3),('2014_11_03_160804_create_menuitem_translation_table',3),('2014_12_17_185301_add_root_column_to_menus_table',3),('2015_09_05_100142_add_icon_column_to_menuitems_table',3),('2016_01_26_102307_update_icon_column_on_menuitems_table',3),('2014_10_26_162751_create_files_table',4),('2014_10_26_162811_create_file_translations_table',4),('2015_02_27_105241_create_image_links_table',4),('2015_12_19_143643_add_sortable',4),('2014_11_30_191858_create_pages_tables',5),('2015_04_02_184200_create_widgets_table',6),('2013_04_09_062329_create_revisions_table',7),('2015_11_20_184604486385_create_translation_translations_table',7),('2015_11_20_184604743083_create_translation_translation_translations_table',7),('2015_12_01_094031_update_translation_translations_table_with_index',7),('2016_10_20_155921695868_create_wod_wods_table',8),('2016_10_20_155921951483_create_wod_wod_translations_table',8),('2016_10_24_103610638639_create_publicaciones_publicaciones_table',9),('2016_10_24_200224_add_column_to_publicaciones',9),('2016_10_25_135354_add_column_imagen_publicaciones',9),('2016_10_20_192212691838_create_profile_profiles_table',10),('2016_10_20_192212946911_create_profile_profile_translations_table',10),('2016_10_18_112343333894_create_noticias_noticias_table',11),('2016_10_18_112343595238_create_noticias_noticia_translations_table',11),('2016_10_26_174828634287_create_payment_payments_table',12),('2016_10_26_174828885063_create_payment_payment_translations_table',12),('2016_10_27_121509066751_create_contacto_contactos_table',14),('2016_10_27_121509317822_create_contacto_contacto_translations_table',14),('2016_10_26_202246972716_create_reservas_reservas_table',15),('2016_10_24_134448_add_column_to_profile',16),('2016_10_26_205431_add_cuenta_to_profile_profiles',16),('2017_08_02_204453_create_profile_tipo_usuario_table',16),('2017_08_05_135356722261_create_reservas_dias_table',17),('2017_08_05_135357231218_create_reservas_horarios_table',17),('2017_08_05_135357736844_create_reservas_reservas_table',17),('2017_08_10_115119_create_reservas__config_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias__noticias`
--

DROP TABLE IF EXISTS `noticias__noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias__noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias__noticias`
--

LOCK TABLES `noticias__noticias` WRITE;
/*!40000 ALTER TABLE `noticias__noticias` DISABLE KEYS */;
INSERT INTO `noticias__noticias` VALUES (1,'Primera noticia','','<p>Officia dolor aute aliquip eu voluptate ut ut laboris dolor et aute et pariatur cupidatat eu occaecat commodo pariatur adipisicing veniam excepteur ex amet ut eiusmod ex labore deserunt magna non tempor sed est duis ea labore consectetur reprehenderit ','','','2017-08-03 18:27:10','2017-08-03 18:27:10'),(2,'Segunda noticia','','<p>Eu incididunt deserunt sunt in ut et minim exercitation in deserunt eiusmod dolor amet nostrud sunt nulla et sit et aliquip aliquip sunt sunt laboris enim non aute velit do magna reprehenderit deserunt qui eiusmod ex dolore reprehenderit elit consectet','','','2017-08-03 18:30:16','2017-08-03 18:30:16');
/*!40000 ALTER TABLE `noticias__noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page__page_translations`
--

DROP TABLE IF EXISTS `page__page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page__page_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page__page_translations_page_id_locale_unique` (`page_id`,`locale`),
  KEY `page__page_translations_locale_index` (`locale`),
  CONSTRAINT `page__page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `page__pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page__page_translations`
--

LOCK TABLES `page__page_translations` WRITE;
/*!40000 ALTER TABLE `page__page_translations` DISABLE KEYS */;
INSERT INTO `page__page_translations` VALUES (1,1,'en','Home page','home',1,'<p><strong>You made it!</strong></p>\n<p>You&#39;ve installed AsgardCMS and are ready to proceed to the <a href=\"/en/backend\">administration area</a>.</p>\n<h2>What&#39;s next ?</h2>\n<p>Learn how you can develop modules for AsgardCMS by reading our <a href=\"https://github.com/AsgardCms/Documentation\">documentation</a>.</p>\n','Home page',NULL,NULL,NULL,NULL,NULL,'2016-10-26 17:50:22','2016-10-26 17:50:22');
/*!40000 ALTER TABLE `page__page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page__pages`
--

DROP TABLE IF EXISTS `page__pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page__pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_home` tinyint(1) NOT NULL DEFAULT '0',
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page__pages`
--

LOCK TABLES `page__pages` WRITE;
/*!40000 ALTER TABLE `page__pages` DISABLE KEYS */;
INSERT INTO `page__pages` VALUES (1,1,'home','2016-10-26 17:50:21','2016-10-26 17:50:21');
/*!40000 ALTER TABLE `page__pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment__payment_translations`
--

DROP TABLE IF EXISTS `payment__payment_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment__payment_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment__payment_translations_payment_id_locale_unique` (`payment_id`,`locale`),
  KEY `payment__payment_translations_locale_index` (`locale`),
  CONSTRAINT `payment__payment_translations_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment__payments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment__payment_translations`
--

LOCK TABLES `payment__payment_translations` WRITE;
/*!40000 ALTER TABLE `payment__payment_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment__payment_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment__payments`
--

DROP TABLE IF EXISTS `payment__payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment__payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `payment__payments_user_id_foreign` (`user_id`),
  CONSTRAINT `payment__payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment__payments`
--

LOCK TABLES `payment__payments` WRITE;
/*!40000 ALTER TABLE `payment__payments` DISABLE KEYS */;
INSERT INTO `payment__payments` VALUES (9,'','0000-00-00',1,'2016-10-26 23:11:31','2016-10-26 23:11:31');
/*!40000 ALTER TABLE `payment__payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persistences`
--

LOCK TABLES `persistences` WRITE;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` VALUES (1,1,'0XkYlF22AKuu6d36v0rEpKpvWS7OSwrE','2016-10-26 17:51:38','2016-10-26 17:51:38'),(2,1,'ShQGC6Vt915Zmcyn4tw7rpbklIFj1Tca','2016-10-26 18:16:04','2016-10-26 18:16:04'),(3,1,'8jrikb6n1IHMJo4pnPeWvjoPBKCRwhvs','2016-10-27 15:33:03','2016-10-27 15:33:03'),(4,1,'8CLlWNVdipdmLn0TkCPku0ouXaNvpH3o','2016-10-27 21:43:26','2016-10-27 21:43:26'),(5,1,'Pzt4N2Bvv5lPhoRn7eDwyVxFxr2Kx3X3','2016-10-27 22:10:17','2016-10-27 22:10:17'),(6,1,'qTIKtsOCrOGLMbBnQJ7ZMBtbcreVafju','2016-10-28 02:18:43','2016-10-28 02:18:43'),(8,1,'g5cM1ATPnYDDinJa8v4rMB6lHK7lBa24','2017-08-02 21:10:02','2017-08-02 21:10:02'),(11,1,'XgomQGjd0vuXBbvsakWHvSH2Wj3IxP5P','2017-08-02 23:11:24','2017-08-02 23:11:24'),(12,1,'c3zvemVeRRencygN3lmJTsDuBFXLFcQH','2017-08-03 01:48:23','2017-08-03 01:48:23'),(13,1,'epFFFqQixwzw6WWDi9N3DJo4xAsYuOKs','2017-08-03 16:21:14','2017-08-03 16:21:14'),(16,1,'YghV3opo6EFCEPVEk7ymSgsZU85hbrGN','2017-08-03 17:20:19','2017-08-03 17:20:19'),(17,1,'00gt2gQxlj1bOtjjlyNExlL1C1FhsMTv','2017-08-03 17:52:54','2017-08-03 17:52:54'),(18,1,'SgZIUDynNeWq3CnVZ0AUY2AJq8wMdKQ9','2017-08-03 17:53:10','2017-08-03 17:53:10'),(19,1,'ztQUxPrz7Kk8JNx7kxTtAgowBuSKHfOJ','2017-08-03 17:53:38','2017-08-03 17:53:38'),(20,1,'xfAKdpslEo4BCGXZotfBYjRSjyztB4KU','2017-08-03 17:53:59','2017-08-03 17:53:59'),(21,1,'c5Z7B1mUk8sfmPJb1uNh7ZFDtSYqkW3I','2017-08-03 17:54:58','2017-08-03 17:54:58'),(22,1,'ZxaUfVRpbNFFhfwLEq7jfppKvtjiX6Md','2017-08-03 17:55:48','2017-08-03 17:55:48'),(23,1,'39mJXtBzrKr2PJHvUBD3xEOz80RlFZMI','2017-08-03 18:06:33','2017-08-03 18:06:33'),(24,1,'CbjcGvjnnHjoSuNpb5oX3dkOEhVR1KDj','2017-08-03 18:08:13','2017-08-03 18:08:13'),(25,1,'iJ4rax5xYEgoLxhfrnRyPWVOPhIlcQLW','2017-08-03 18:10:41','2017-08-03 18:10:41'),(26,1,'8VGfdGELrT3nzZdQvCX8K77IlJeuXoaQ','2017-08-03 18:12:01','2017-08-03 18:12:01'),(27,1,'8ZijMccvfJSasyyyAYSqya1NAk7svUtF','2017-08-03 18:13:11','2017-08-03 18:13:11'),(28,1,'P1wLK9yMfi9FXCSTqr86NJDiwvoQJC5e','2017-08-03 18:13:50','2017-08-03 18:13:50'),(29,1,'quECFRZIi0uDY7OjGz4yUppb7k5PAqNJ','2017-08-03 18:14:52','2017-08-03 18:14:52'),(30,1,'jypAUE2MfmHU9boLQ5U8DRAfuZJrqFz6','2017-08-03 18:15:45','2017-08-03 18:15:45'),(31,1,'c4xM2Jkc4s5hh7vXBOR7Id07UKsaPDYg','2017-08-03 18:16:33','2017-08-03 18:16:33'),(32,1,'P1GTMgg5PctveXOPD4LMdpUrmcYoMhXO','2017-08-04 16:52:28','2017-08-04 16:52:28'),(33,1,'Uhl8GtZl96GKab6FRbOTzYuhxE0SOarL','2017-08-04 17:03:15','2017-08-04 17:03:15'),(34,1,'Telk6P0niAtO0oCzfZqSBtjRWkemLc4f','2017-08-04 18:23:57','2017-08-04 18:23:57'),(35,1,'6Rf2JcTj23t8APWHgtaFLA1Hpay6dIEF','2017-08-04 21:08:54','2017-08-04 21:08:54'),(37,21,'9Ztvzp0U6vvOKtNStZEzOBPz9CNrdgGE','2017-08-04 22:22:45','2017-08-04 22:22:45'),(38,22,'PPU33ia7jEJmEIYpMgDVUqrIrhcu1g8g','2017-08-04 22:27:48','2017-08-04 22:27:48'),(39,1,'atWV7gsqNFP7YmYdYGDN49fVUZjurVLd','2017-08-04 22:31:18','2017-08-04 22:31:18'),(40,1,'aQiIfSxBTHHa6sCOSAK0FNSJsOzwqWh8','2017-08-05 17:05:45','2017-08-05 17:05:45'),(41,1,'j0wWNExlrLGElLBkfBHzIcoOiFtiNPcY','2017-08-06 05:06:41','2017-08-06 05:06:41'),(42,1,'CTCVOTr7lzn9wwiCGZsCeS0PL7da4jn4','2017-08-06 14:22:07','2017-08-06 14:22:07'),(43,1,'UVAxPYgHXYdHI5Gj9rPBMDTiJFHYhTl8','2017-08-06 18:19:16','2017-08-06 18:19:16'),(44,1,'AiJe8meZPYcnfyKorjTr0RGe67Q8XlLF','2017-08-06 22:02:39','2017-08-06 22:02:39'),(45,1,'lIjykEHJocDG8vhc2DXfOM27endiv6xl','2017-08-07 13:43:26','2017-08-07 13:43:26'),(46,1,'h2IYt6PrxYvEynOvHZZ3v1h1HDdO9hDS','2017-08-09 11:39:16','2017-08-09 11:39:16'),(47,1,'yodXVmumGnpx6JO4oiBYKiYF3k7xVKlP','2017-08-09 11:59:19','2017-08-09 11:59:19'),(48,1,'TjcKCn672eMKliIoohUhxTvJmxUoTgIc','2017-08-09 07:58:19','2017-08-09 07:58:19'),(49,1,'S3raIttjIWzO3cqm4Qa3enDoqDjx4n2b','2017-08-10 14:40:58','2017-08-10 14:40:58'),(50,1,'TJQiL2d8ndkSFcqFVqaYxDs9ksOsu2Rl','2017-08-10 21:58:05','2017-08-10 21:58:05'),(51,1,'fMs15CKJGiCISUFNKlSTqZbS8P32bQ3F','2017-08-12 22:07:14','2017-08-12 22:07:14'),(55,22,'VXjJhBRS4LCQeM9WJOSdPF3xATNVdD3J','2017-08-12 22:14:35','2017-08-12 22:14:35');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile__profiles`
--

DROP TABLE IF EXISTS `profile__profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile__profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id` int(10) unsigned NOT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `altura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `helen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filthy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fight_gone_bad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sprint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `run` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clean_jerk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `snatch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadlift` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `back_squat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_pull_ups` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile__profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profile__profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile__profiles`
--

LOCK TABLES `profile__profiles` WRITE;
/*!40000 ALTER TABLE `profile__profiles` DISABLE KEYS */;
INSERT INTO `profile__profiles` VALUES (11,3,'masculino11111111111111111111','21111111','1,70111','6011111','a111','b','c','d','e','f','g','h','i','j','k','l',1,'2016-10-27 00:25:54','2017-08-09 08:13:29','1qqzIxQkN4Ir0hTswckxq1QMF7BAl86PSS5zwEJlhJaesIqIqxiNkSW0q4LY','http://192.168.0.7:8000/assets/media/2017-08-04 16__IMG_20170804_161819.jpg','','0000-00-00'),(33,2,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p',21,'2017-08-03 14:02:20','2017-08-04 22:23:14','LQVklmT2WUkQKQqY0wThGHPJTyRWBnUvJNBjnjaOJcEKkfEyx81Fp4KzifIW',NULL,'','0000-00-00'),(34,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,22,'2017-08-03 14:23:11','2017-08-03 14:23:11','FhZUUSNZsGYoZjQn9YtusGUoIgZcebri2PHXKAJ9XkCNDWgHnChYgi1Gcndr',NULL,'','0000-00-00'),(35,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,'2017-08-03 14:23:36','2017-08-03 14:23:36','XxsxNJw0h1aB9IqeOVWTwe3qTBeqSqri8k4JTELySX4lyGGHJLzoD872ffp2',NULL,'','0000-00-00'),(36,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,'2017-08-03 14:24:08','2017-08-03 14:24:08','D2kfrL5elNR3MAMG0wbinVxcKZZL0zURO42MTX3Q2qvkm2AS7YCeOX7I7SMu',NULL,'','0000-00-00'),(37,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,'2017-08-03 14:24:34','2017-08-03 14:24:34','kAPhEHwMSPXPvh27KRVblXqwIkLuVjYRVxJKY5DQRxrqUlevIqdf1ENgSgZH',NULL,'','0000-00-00');
/*!40000 ALTER TABLE `profile__profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_tipo_usuario`
--

DROP TABLE IF EXISTS `profile_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_tipo_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_tipo_usuario`
--

LOCK TABLES `profile_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `profile_tipo_usuario` DISABLE KEYS */;
INSERT INTO `profile_tipo_usuario` VALUES (1,'prueba 1',3,'2017-08-03 09:22:01','2017-08-03 09:22:01'),(2,'prueba 2',4,'2017-08-03 09:22:10','2017-08-03 09:22:10'),(3,'Tipo A',3,'2017-08-03 14:18:25','2017-08-10 14:48:06'),(4,'Tipo NS',2,'2017-08-03 14:18:37','2017-08-12 22:23:49'),(5,'Tipo Js',5,'2017-08-03 14:18:46','2017-08-03 14:18:46'),(6,'Tipo Unico',1,'2017-08-03 14:18:56','2017-08-03 14:19:07');
/*!40000 ALTER TABLE `profile_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones__publicaciones`
--

DROP TABLE IF EXISTS `publicaciones__publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones__publicaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resumen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `publi_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicaciones__publicaciones_user_id_foreign` (`user_id`),
  CONSTRAINT `publicaciones__publicaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones__publicaciones`
--

LOCK TABLES `publicaciones__publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones__publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones__publicaciones` VALUES (1,'dolor et ut eiusmod ei','consequat dolore aliquip qui sit adipisicing aliquip sed pariatur mollit aliqui','<p>Irure consequat dolore aliquip qui sit adipisicing aliquip sed pariatur mollit aliquip laboris occaecat sed laboris nisi officia pariatur commodo laboris aliquip in eiusmod nostrud laboris pariatur laboris eu aliquip qui exercitation nulla anim et exce','2017-08-10 14:50:46','2017-08-10 14:50:46',1,NULL);
/*!40000 ALTER TABLE `publicaciones__publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas__config`
--

DROP TABLE IF EXISTS `reservas__config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas__config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `default_horario_cantidad_limite` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas__config`
--

LOCK TABLES `reservas__config` WRITE;
/*!40000 ALTER TABLE `reservas__config` DISABLE KEYS */;
INSERT INTO `reservas__config` VALUES (1,3,'2017-08-10 16:57:20','2017-08-10 20:17:34');
/*!40000 ALTER TABLE `reservas__config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas__dias`
--

DROP TABLE IF EXISTS `reservas__dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas__dias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas__dias`
--

LOCK TABLES `reservas__dias` WRITE;
/*!40000 ALTER TABLE `reservas__dias` DISABLE KEYS */;
INSERT INTO `reservas__dias` VALUES (1,'lunes',1,'2017-08-10 17:04:07','2017-08-10 17:04:07'),(2,'martes',2,'2017-08-10 17:04:17','2017-08-10 17:04:17'),(3,'miercoles',3,'2017-08-10 17:08:37','2017-08-10 17:08:37'),(4,'jueves ',4,'2017-08-10 17:08:48','2017-08-10 17:08:48'),(5,'viernes',5,'2017-08-10 17:08:55','2017-08-10 17:08:55'),(6,'sabado',6,'2017-08-10 17:09:05','2017-08-10 17:09:05');
/*!40000 ALTER TABLE `reservas__dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas__horarios`
--

DROP TABLE IF EXISTS `reservas__horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas__horarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `cantidad_maxima_usuarios` int(11) NOT NULL DEFAULT '0',
  `dia_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `reservas__horarios_dia_id_index` (`dia_id`),
  CONSTRAINT `reservas__horarios_dia_id_foreign` FOREIGN KEY (`dia_id`) REFERENCES `reservas__dias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas__horarios`
--

LOCK TABLES `reservas__horarios` WRITE;
/*!40000 ALTER TABLE `reservas__horarios` DISABLE KEYS */;
INSERT INTO `reservas__horarios` VALUES (1,'06:35:00','08:35:00',3,1,'2017-08-10 19:38:03','2017-08-10 19:38:03'),(2,'09:00:00','11:30:00',4,1,'2017-08-10 19:51:48','2017-08-10 19:51:48'),(3,'13:00:00','14:00:00',3,1,'2017-08-10 19:55:13','2017-08-10 19:55:13'),(5,'07:00:00','08:00:00',4,2,'2017-08-10 20:00:34','2017-08-10 20:00:34'),(6,'08:00:00','09:00:00',1,3,'2017-08-10 20:04:23','2017-08-10 20:04:23'),(7,'09:00:00','10:00:00',10,2,'2017-08-10 20:06:32','2017-08-10 20:06:32'),(9,'09:10:00','10:40:00',8,3,'2017-08-10 20:14:54','2017-08-10 20:14:54'),(10,'11:00:00','12:00:00',8,3,'2017-08-10 20:15:28','2017-08-10 20:15:28'),(11,'06:15:00','08:15:00',13,4,'2017-08-10 20:16:56','2017-08-10 20:16:56'),(12,'05:15:00','08:15:00',3,5,'2017-08-10 20:17:29','2017-08-10 20:17:29'),(13,'07:15:00','09:15:00',3,4,'2017-08-10 20:17:53','2017-08-10 20:17:53'),(14,'09:00:00','11:30:00',3,5,'2017-08-10 20:18:31','2017-08-10 20:18:31'),(15,'13:00:00','15:30:00',3,5,'2017-08-10 20:18:44','2017-08-10 20:18:44'),(16,'07:00:00','08:30:00',3,6,'2017-08-10 20:18:59','2017-08-10 20:18:59'),(17,'09:00:00','11:30:00',3,6,'2017-08-10 20:19:09','2017-08-10 20:19:09'),(18,'14:00:00','15:30:00',3,6,'2017-08-10 20:19:28','2017-08-10 20:19:28'),(19,'10:00:00','11:00:00',3,2,'2017-08-12 22:32:10','2017-08-12 22:32:10'),(20,'09:15:00','11:00:00',3,4,'2017-08-12 22:34:02','2017-08-12 22:34:02'),(21,'15:35:00','16:35:00',3,6,'2017-08-12 22:35:22','2017-08-12 22:35:22'),(22,'15:35:00','16:35:00',3,5,'2017-08-12 22:36:20','2017-08-12 22:36:20'),(23,'14:10:00','15:35:00',3,1,'2017-08-12 22:37:23','2017-08-12 22:37:23'),(24,'16:10:00','17:35:00',5,1,'2017-08-12 22:37:40','2017-08-12 22:37:40');
/*!40000 ALTER TABLE `reservas__horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas__reservas`
--

DROP TABLE IF EXISTS `reservas__reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas__reservas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `horario_id` int(10) unsigned NOT NULL,
  `estado` enum('reservado','eliminado') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `reservas__reservas_profile_id_index` (`profile_id`),
  KEY `reservas__reservas_horario_id_index` (`horario_id`),
  CONSTRAINT `reservas__reservas_horario_id_foreign` FOREIGN KEY (`horario_id`) REFERENCES `reservas__horarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservas__reservas_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile__profiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas__reservas`
--

LOCK TABLES `reservas__reservas` WRITE;
/*!40000 ALTER TABLE `reservas__reservas` DISABLE KEYS */;
INSERT INTO `reservas__reservas` VALUES (2,11,'2017-08-10',13,'eliminado','2017-08-10 22:00:10','2017-08-10 22:00:27'),(3,11,'2017-08-10',11,'eliminado','2017-08-10 22:05:44','2017-08-10 22:06:29'),(4,11,'2017-08-11',14,'eliminado','2017-08-10 22:06:02','2017-08-10 22:06:35'),(5,11,'2017-08-12',17,'eliminado','2017-08-10 22:06:09','2017-08-10 22:06:44'),(6,11,'2017-08-14',2,'eliminado','2017-08-12 22:07:42','2017-08-12 22:25:59'),(7,11,'2017-08-15',7,'eliminado','2017-08-12 22:07:48','2017-08-12 22:29:04'),(8,11,'2017-08-16',9,'eliminado','2017-08-12 22:07:59','2017-08-12 22:29:06'),(9,37,'2017-08-14',2,'reservado','2017-08-12 22:12:28','2017-08-12 22:12:28'),(10,36,'2017-08-14',2,'reservado','2017-08-12 22:13:05','2017-08-12 22:13:05'),(11,35,'2017-08-14',2,'reservado','2017-08-12 22:13:36','2017-08-12 22:13:36'),(12,34,'2017-08-14',1,'eliminado','2017-08-12 22:23:55','2017-08-12 22:24:39'),(13,34,'2017-08-15',7,'reservado','2017-08-12 22:24:00','2017-08-12 22:24:00'),(14,34,'2017-08-12',17,'reservado','2017-08-12 22:24:17','2017-08-12 22:24:17'),(15,34,'2017-08-16',9,'eliminado','2017-08-12 22:24:43','2017-08-12 22:27:08'),(16,11,'2017-08-14',2,'eliminado','2017-08-12 22:26:48','2017-08-12 22:26:59'),(17,34,'2017-08-14',2,'eliminado','2017-08-12 22:27:12','2017-08-12 22:27:21'),(18,11,'2017-08-14',2,'eliminado','2017-08-12 22:27:23','2017-08-12 22:27:48');
/*!40000 ALTER TABLE `reservas__reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revisions`
--

DROP TABLE IF EXISTS `revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisions`
--

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,1,'2016-10-26 17:50:14','2016-10-26 17:50:14'),(21,1,'2017-08-03 14:02:20','2017-08-03 14:02:20');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','{\"contacto.contactos.index\":true,\"contacto.contactos.create\":true,\"contacto.contactos.store\":true,\"contacto.contactos.edit\":true,\"contacto.contactos.update\":true,\"contacto.contactos.destroy\":true,\"dashboard.grid.save\":true,\"dashboard.grid.reset\":true,\"dashboard.index\":true,\"media.media.index\":true,\"media.media.create\":true,\"media.media.store\":true,\"media.media.edit\":true,\"media.media.update\":true,\"media.media.destroy\":true,\"media.media-grid.index\":true,\"media.media-grid.ckIndex\":true,\"menu.menus.index\":true,\"menu.menus.create\":true,\"menu.menus.store\":true,\"menu.menus.edit\":true,\"menu.menus.update\":true,\"menu.menus.destroy\":true,\"menu.menuitem.index\":true,\"menu.menuitem.create\":true,\"menu.menuitem.store\":true,\"menu.menuitem.edit\":true,\"menu.menuitem.update\":true,\"menu.menuitem.destroy\":true,\"noticias.noticias.index\":true,\"noticias.noticias.create\":true,\"noticias.noticias.store\":true,\"noticias.noticias.edit\":true,\"noticias.noticias.update\":true,\"noticias.noticias.destroy\":true,\"page.pages.index\":true,\"page.pages.create\":true,\"page.pages.store\":true,\"page.pages.edit\":true,\"page.pages.update\":true,\"page.pages.destroy\":true,\"profile.profiles.index\":true,\"profile.profiles.create\":true,\"profile.profiles.store\":true,\"profile.profiles.edit\":true,\"profile.profiles.update\":true,\"profile.profiles.destroy\":true,\"profile.profiles.tipos_usuarios.create\":true,\"profile.tipos_usuarios.index\":true,\"profile.tipos_usuarios.create\":true,\"profile.tipos_usuarios.store\":true,\"profile.tipos_usuarios.edit\":true,\"profile.tipos_usuarios.update\":true,\"profile.tipos_usuarios.destroy\":true,\"publicaciones.publicaciones.index\":true,\"publicaciones.publicaciones.create\":true,\"publicaciones.publicaciones.store\":true,\"publicaciones.publicaciones.edit\":true,\"publicaciones.publicaciones.update\":true,\"publicaciones.publicaciones.destroy\":true,\"reservas.dias.index\":true,\"reservas.dias.create\":true,\"reservas.dias.store\":true,\"reservas.dias.edit\":true,\"reservas.dias.update\":true,\"reservas.dias.destroy\":true,\"reservas.horarios.index\":true,\"reservas.horarios.create\":true,\"reservas.horarios.store\":true,\"reservas.horarios.edit\":true,\"reservas.horarios.update\":true,\"reservas.horarios.destroy\":true,\"reservas.horarios.index_ajax\":true,\"reservas.horarios.update_cantidad_maxima_usuarios_horario\":true,\"reservas.horarios.get_cantidad_usuarios_default\":true,\"reservas.reservas.index\":true,\"reservas.reservas.create\":true,\"reservas.reservas.store\":true,\"reservas.reservas.edit\":true,\"reservas.reservas.update\":true,\"reservas.reservas.destroy\":true,\"setting.settings.index\":true,\"setting.settings.getModuleSettings\":true,\"setting.settings.store\":true,\"translation.translations.index\":true,\"translation.translations.update\":true,\"translation.translations.export\":true,\"translation.translations.import\":true,\"user.users.index\":true,\"user.users.create\":true,\"user.users.store\":true,\"user.users.edit\":true,\"user.users.update\":true,\"user.users.destroy\":true,\"user.roles.index\":true,\"user.roles.create\":true,\"user.roles.store\":true,\"user.roles.edit\":true,\"user.roles.update\":true,\"user.roles.destroy\":true,\"wod.wods.index\":true,\"wod.wods.create\":true,\"wod.wods.store\":true,\"wod.wods.edit\":true,\"wod.wods.update\":true,\"wod.wods.destroy\":true,\"workshop.modules.index\":true,\"workshop.modules.show\":true,\"workshop.modules.disable\":true,\"workshop.modules.enable\":true,\"workshop.themes.index\":true,\"workshop.themes.show\":true}','2016-10-26 17:49:52','2017-08-10 18:38:21'),(2,'user','User','{\"dashboard.index\":true}','2016-10-26 17:49:52','2016-10-26 17:49:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting__setting_translations`
--

DROP TABLE IF EXISTS `setting__setting_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting__setting_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting__setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting__setting_translations_locale_index` (`locale`),
  CONSTRAINT `setting__setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `setting__settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting__setting_translations`
--

LOCK TABLES `setting__setting_translations` WRITE;
/*!40000 ALTER TABLE `setting__setting_translations` DISABLE KEYS */;
INSERT INTO `setting__setting_translations` VALUES (1,2,'0','en',NULL);
/*!40000 ALTER TABLE `setting__setting_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting__settings`
--

DROP TABLE IF EXISTS `setting__settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting__settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plainValue` text COLLATE utf8_unicode_ci,
  `isTranslatable` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting__settings_name_unique` (`name`),
  KEY `setting__settings_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting__settings`
--

LOCK TABLES `setting__settings` WRITE;
/*!40000 ALTER TABLE `setting__settings` DISABLE KEYS */;
INSERT INTO `setting__settings` VALUES (1,'core::template','Flatly',0,'2016-10-26 17:50:21','2016-10-26 17:50:21'),(2,'core::locales','[\"en\"]',1,'2016-10-26 17:50:21','2016-10-26 17:50:21');
/*!40000 ALTER TABLE `setting__settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (1,NULL,'global',NULL,'2017-08-02 20:51:10','2017-08-02 20:51:10'),(2,NULL,'ip','127.0.0.1','2017-08-02 20:51:10','2017-08-02 20:51:10'),(3,NULL,'global',NULL,'2017-08-02 20:51:18','2017-08-02 20:51:18'),(4,NULL,'ip','127.0.0.1','2017-08-02 20:51:18','2017-08-02 20:51:18'),(5,NULL,'global',NULL,'2017-08-02 20:52:35','2017-08-02 20:52:35'),(6,NULL,'ip','127.0.0.1','2017-08-02 20:52:35','2017-08-02 20:52:35'),(7,1,'user',NULL,'2017-08-02 20:52:35','2017-08-02 20:52:35'),(8,NULL,'global',NULL,'2017-08-02 20:52:43','2017-08-02 20:52:43'),(9,NULL,'ip','127.0.0.1','2017-08-02 20:52:43','2017-08-02 20:52:43'),(10,1,'user',NULL,'2017-08-02 20:52:43','2017-08-02 20:52:43'),(11,NULL,'global',NULL,'2017-08-02 20:53:25','2017-08-02 20:53:25'),(12,NULL,'ip','127.0.0.1','2017-08-02 20:53:25','2017-08-02 20:53:25'),(13,1,'user',NULL,'2017-08-02 20:53:25','2017-08-02 20:53:25'),(14,NULL,'global',NULL,'2017-08-02 20:53:31','2017-08-02 20:53:31'),(15,NULL,'ip','127.0.0.1','2017-08-02 20:53:31','2017-08-02 20:53:31'),(16,1,'user',NULL,'2017-08-02 20:53:31','2017-08-02 20:53:31'),(17,NULL,'global',NULL,'2017-08-02 21:06:12','2017-08-02 21:06:12'),(18,NULL,'ip','127.0.0.1','2017-08-02 21:06:12','2017-08-02 21:06:12'),(19,1,'user',NULL,'2017-08-02 21:06:12','2017-08-02 21:06:12'),(20,NULL,'global',NULL,'2017-08-02 21:06:28','2017-08-02 21:06:28'),(21,NULL,'ip','127.0.0.1','2017-08-02 21:06:28','2017-08-02 21:06:28'),(22,1,'user',NULL,'2017-08-02 21:06:29','2017-08-02 21:06:29'),(23,NULL,'global',NULL,'2017-08-03 17:12:55','2017-08-03 17:12:55'),(24,NULL,'ip','192.168.0.7','2017-08-03 17:12:55','2017-08-03 17:12:55'),(25,NULL,'global',NULL,'2017-08-03 17:13:38','2017-08-03 17:13:38'),(26,NULL,'ip','192.168.0.7','2017-08-03 17:13:38','2017-08-03 17:13:38'),(27,NULL,'global',NULL,'2017-08-03 17:14:20','2017-08-03 17:14:20'),(28,NULL,'ip','192.168.0.7','2017-08-03 17:14:20','2017-08-03 17:14:20'),(29,NULL,'global',NULL,'2017-08-03 17:14:54','2017-08-03 17:14:54'),(30,NULL,'ip','192.168.0.7','2017-08-03 17:14:54','2017-08-03 17:14:54'),(31,NULL,'global',NULL,'2017-08-03 17:15:35','2017-08-03 17:15:35'),(32,NULL,'ip','192.168.0.7','2017-08-03 17:15:35','2017-08-03 17:15:35');
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translation__translation_translations`
--

DROP TABLE IF EXISTS `translation__translation_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translation__translation_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `translation_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_trans_id_locale_unique` (`translation_id`,`locale`),
  KEY `translation__translation_translations_locale_index` (`locale`),
  CONSTRAINT `translation__translation_translations_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translation__translations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translation__translation_translations`
--

LOCK TABLES `translation__translation_translations` WRITE;
/*!40000 ALTER TABLE `translation__translation_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translation__translation_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translation__translations`
--

DROP TABLE IF EXISTS `translation__translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translation__translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translation__translations_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translation__translations`
--

LOCK TABLES `translation__translations` WRITE;
/*!40000 ALTER TABLE `translation__translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translation__translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zentcode@zentcode.com','$2y$10$2dqEhZ49G1X2qaxpbljd2.wJSa03yc5a1.pdQjkrxDmz35a/Lu8.2','','2017-08-12 22:07:14','zentcode','zentcode','2016-10-26 17:50:14','2017-08-12 22:07:14'),(21,'prueba1@prueba1.com','$2y$10$VwzV.4iCIR4EI52I2GTD6eWUuXgA7UyMAZnisoAje.jAAP3EUk0/q','','2017-08-04 22:22:45','prueba1','prueba1','2017-08-03 14:02:20','2017-08-04 22:22:45'),(22,'prueba2@prueba2.com','$2y$10$eKSi6qAzVTV9PV/P8tYUo.0z05RrNxdLHc2S5aQXs46FooPwVobfO','','2017-08-12 22:14:35','prueba2','prueba2','2017-08-03 14:23:11','2017-08-12 22:14:35'),(23,'prueba3@prueba3.com','$2y$10$mNnAbu.k5Nv4J81rG0JTKe5HKtPEdGvSsl3vLFV8Q/TqGY/HFcGAy','','2017-08-12 22:13:25','prueba3','prueba3','2017-08-03 14:23:36','2017-08-12 22:13:25'),(24,'prueba4@prueba4.com','$2y$10$/LqFx8oMFcAc6ym4DoeIVOdG4SMYL5oWu64BFKLS5OMjiygp88lM2','','2017-08-12 22:12:56','prueba4','prueba4','2017-08-03 14:24:07','2017-08-12 22:12:56'),(25,'prueba5@prueba5.com','$2y$10$4l7CUanIF/dPjLa6811WX.iT6eF/W8VH6Ti2lmiF.7AeD03PUMG92','','2017-08-12 22:12:17','prueba5','prueba5','2017-08-03 14:24:34','2017-08-12 22:12:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wod__wods`
--

DROP TABLE IF EXISTS `wod__wods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wod__wods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wod__wods`
--

LOCK TABLES `wod__wods` WRITE;
/*!40000 ALTER TABLE `wod__wods` DISABLE KEYS */;
INSERT INTO `wod__wods` VALUES (1,'hjkl','n,.m','<p>duis nulla in sed irure irure nulla qui id excepteur quis ut amet dolor tempor in aliquip occaecat voluptate labore veniam dolore cillum nostrud magna dolore non officia nostrud ad eu quis in incididunt culpa proident elit incididunt culpa tempor dolor','','','2016-10-27 21:44:58','2017-08-04 17:29:48'),(2,'work 1','','<p>Lorem ipsum elit est quis culpa exercitation est dolore labore excepteur adipisicing aute eiusmod voluptate exercitation do in sed tempor officia in esse irure in in pariatur proident irure nisi reprehenderit aute in tempor amet anim ut non esse elit c','','','2017-08-03 18:33:14','2017-08-03 18:33:14'),(3,'adfafd','','<p>&nbsp;non officia nostrud ad eu quis in incididunt culpa proident elit incididunt culpa tempor dolore incididunt elit sint tempor ut consectetur nulla mollit amet laboris reprehenderit laborum reprehenderit ut ad consequat esse sed consectetur duis ali','','','2017-08-04 17:28:50','2017-08-04 17:29:35'),(4,'adfasdf','','<p>&nbsp;incididunt culpa proident elit incididunt culpa tempor dolore incididunt elit sint tempor ut consectetur nulla mollit amet laboris reprehenderit laborum reprehenderit ut ad consequat esse sed consectetur duis aliqua ut ea ea in dolor tempor aute ','','','2017-08-04 17:28:55','2017-08-04 17:29:58'),(5,'adfafasdfasdfadsf','','<p>adfadfasdfasdf</p>\r\n','','','2017-08-04 17:29:01','2017-08-04 17:29:01'),(6,'Laboris mollit reprehenderit sit id cillum anim dolore non incididunt ut incididunt magna quis mollit ex qui duis culpa sint anim qui proident tempor aliqua commodo veniam duis et officia duis nulla in sed irure irure nulla qui id excepteur quis ut amet d','','<p>Duis nulla in sed irure irure nulla qui id excepteur quis ut amet dolor tempor in aliquip occaecat voluptate labore veniam dolore cillum nostrud magna dolore non officia nostrud ad eu quis in incididunt culpa proident elit incididunt culpa tempor dolor','','','2017-08-04 17:30:26','2017-08-04 17:30:26');
/*!40000 ALTER TABLE `wod__wods` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-12 18:39:04
