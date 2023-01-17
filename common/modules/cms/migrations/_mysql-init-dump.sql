-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: app-basic_1
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1-log

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
-- Table structure for table `cms_component_settings`
--

DROP TABLE IF EXISTS `cms_component_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_component_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `value` longtext,
  `user_id` int(11) DEFAULT NULL,
  `namespace` varchar(50) DEFAULT NULL,
  `cms_site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `component` (`component`),
  KEY `user_id` (`user_id`),
  KEY `namespace` (`namespace`),
  KEY `cms_site_id` (`cms_site_id`),
  CONSTRAINT `cms_component_settings_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_component_settings__cms_site_id` FOREIGN KEY (`cms_site_id`) REFERENCES `cms_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_settings_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_settings_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_component_settings`
--

/*!40000 ALTER TABLE `cms_component_settings` DISABLE KEYS */;
INSERT INTO `cms_component_settings` VALUES (1,1,1,1439039222,1439039222,'skeeks\\cms\\cmsWidgets\\treeMenu\\TreeMenuCmsWidget','{\"treePid\":\"4\",\"active\":\"Y\",\"level\":\"\",\"label\":\"\",\"site_codes\":[],\"orderBy\":\"priority\",\"order\":\"3\",\"enabledCurrentSite\":\"Y\",\"enabledRunCache\":\"N\",\"runCacheDuration\":\"0\",\"activeQuery\":null,\"text\":\"\",\"viewFile\":\"@template/widgets/TreeMenuCmsWidget/sub-catalog\",\"defaultAttributes\":{\"treePid\":null,\"active\":\"Y\",\"level\":null,\"label\":null,\"site_codes\":[],\"orderBy\":\"priority\",\"order\":3,\"enabledCurrentSite\":\"Y\",\"enabledRunCache\":\"Y\",\"runCacheDuration\":0,\"activeQuery\":null,\"text\":\"\",\"viewFile\":\"default\",\"defaultAttributes\":[],\"namespace\":\"TreeMenuCmsWidget-sub-catalog-main\"},\"namespace\":\"TreeMenuCmsWidget-sub-catalog-main\"}',NULL,'TreeMenuCmsWidget-sub-catalog-main',NULL),(4,1,1,1443696591,1443697282,'skeeks\\cms\\cmsWidgets\\contentElements\\ContentElementsCmsWidget','{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":\"10\",\"pageSizeLimitMin\":\"1\",\"pageSizeLimitMax\":\"50\",\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":\"3\",\"label\":\"\",\"enabledSearchParams\":\"N\",\"enabledCurrentTree\":\"N\",\"enabledCurrentTreeChild\":\"N\",\"enabledCurrentTreeChildAll\":\"N\",\"tree_ids\":\"\",\"limit\":\"0\",\"active\":\"Y\",\"createdBy\":[],\"content_ids\":[\"2\"],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"@app/views/widgets/ContentElementsCmsWidget/slides\",\"defaultAttributes\":{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":10,\"pageSizeLimitMin\":1,\"pageSizeLimitMax\":50,\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":3,\"label\":null,\"enabledSearchParams\":\"Y\",\"enabledCurrentTree\":\"Y\",\"enabledCurrentTreeChild\":\"Y\",\"enabledCurrentTreeChildAll\":\"Y\",\"tree_ids\":[],\"limit\":0,\"active\":\"\",\"createdBy\":[],\"content_ids\":[],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"default\",\"defaultAttributes\":[],\"namespace\":\"ContentElementsCmsWidget-slides\"},\"namespace\":\"ContentElementsCmsWidget-slides\"}',NULL,'ContentElementsCmsWidget-slides',NULL),(5,1,1,1443698727,1455882445,'skeeks\\cms\\modules\\admin\\widgets\\gridView\\GridViewSettings','{\"enabledPjaxPagination\":\"Y\",\"pageSize\":\"10\",\"pageParamName\":\"page\",\"visibleColumns\":[\"5aa37184\",\"1cce4459\",\"6738afae\",\"e04112b1\",\"6f4cf3ff\",\"9d505500\",\"ab768f41\",\"c68056fd\",\"4369038e\",\"c79b45e9\",\"b77921d4\",\"7276e0e4\",\"4663e865\",\"2564e302\"],\"grid\":null,\"orderBy\":\"priority\",\"order\":\"4\",\"defaultAttributes\":{\"enabledPjaxPagination\":\"Y\",\"pageSize\":10,\"pageParamName\":\"page\",\"visibleColumns\":[],\"grid\":null,\"orderBy\":\"id\",\"order\":3,\"defaultAttributes\":[],\"namespace\":\"cms/admin-cms-content-element/index2\"},\"namespace\":\"cms/admin-cms-content-element/index2\"}',NULL,'cms/admin-cms-content-element/index2',NULL),(6,1,1,1443699012,1445808988,'skeeks\\cms\\cmsWidgets\\contentElements\\ContentElementsCmsWidget','{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":\"10\",\"pageSizeLimitMin\":\"1\",\"pageSizeLimitMax\":\"50\",\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":\"3\",\"label\":\"Услуги\",\"enabledSearchParams\":\"Y\",\"enabledCurrentTree\":\"N\",\"enabledCurrentTreeChild\":\"Y\",\"enabledCurrentTreeChildAll\":\"Y\",\"tree_ids\":\"\",\"limit\":\"4\",\"active\":\"\",\"createdBy\":[],\"content_ids\":[\"3\"],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"@template/widgets/ContentElementsCmsWidget/articles-footer\",\"defaultAttributes\":{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":10,\"pageSizeLimitMin\":1,\"pageSizeLimitMax\":50,\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":3,\"label\":null,\"enabledSearchParams\":\"Y\",\"enabledCurrentTree\":\"Y\",\"enabledCurrentTreeChild\":\"Y\",\"enabledCurrentTreeChildAll\":\"Y\",\"tree_ids\":[],\"limit\":0,\"active\":\"\",\"createdBy\":[],\"content_ids\":[],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"default\",\"defaultAttributes\":[],\"namespace\":\"ContentElementsCmsWidget-footer\"},\"namespace\":\"ContentElementsCmsWidget-footer\"}',NULL,'ContentElementsCmsWidget-footer',NULL),(7,1,1,1445809130,1445809161,'skeeks\\cms\\cmsWidgets\\contentElements\\ContentElementsCmsWidget','{\"enabledPaging\":\"N\",\"enabledPjaxPagination\":\"N\",\"pageSize\":\"10\",\"pageSizeLimitMin\":\"1\",\"pageSizeLimitMax\":\"50\",\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":\"3\",\"label\":\"Услуги\",\"enabledSearchParams\":\"N\",\"enabledCurrentTree\":\"N\",\"enabledCurrentTreeChild\":\"N\",\"enabledCurrentTreeChildAll\":\"N\",\"tree_ids\":\"\",\"limit\":\"4\",\"active\":\"Y\",\"createdBy\":[],\"content_ids\":[\"3\"],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"@app/views/widgets/ContentElementsCmsWidget/publications\",\"defaultAttributes\":{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":10,\"pageSizeLimitMin\":1,\"pageSizeLimitMax\":50,\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":3,\"label\":null,\"enabledSearchParams\":\"Y\",\"enabledCurrentTree\":\"Y\",\"enabledCurrentTreeChild\":\"Y\",\"enabledCurrentTreeChildAll\":\"Y\",\"tree_ids\":[],\"limit\":0,\"active\":\"\",\"createdBy\":[],\"content_ids\":[],\"enabledActiveTime\":\"Y\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"dataProvider\":null,\"search\":null,\"viewFile\":\"default\",\"defaultAttributes\":[],\"namespace\":\"ContentElementsCmsWidget-home\"},\"namespace\":\"ContentElementsCmsWidget-home\"}',NULL,'ContentElementsCmsWidget-home',NULL),(10,1,1,1446145239,1455884222,'skeeks\\cms\\modules\\admin\\components\\settings\\AdminSettings','{\"languageCode\":\"ru\"}',1,NULL,NULL),(11,1,1,1446246127,1446246542,'skeeks\\cms\\components\\Cms','{\"adminEmail\":\"admin@skeeks.com\",\"notifyAdminEmailsHidden\":\"\",\"notifyAdminEmails\":\"\",\"appName\":\"SkeekS CMS\",\"noImageUrl\":\"http://vk.com/images/deactivated_100.gif\",\"userPropertyTypes\":[],\"registerRoles\":[\"user\"],\"languageCode\":\"ru\",\"passwordResetTokenExpire\":\"3600\",\"enabledHitAgents\":\"Y\",\"hitAgentsInterval\":\"60\",\"enabledHttpAuth\":\"N\",\"enabledHttpAuthAdmin\":\"N\",\"httpAuthLogin\":\"\",\"httpAuthPassword\":\"\",\"debugEnabled\":\"N\",\"debugAllowedIPs\":\"*\",\"giiEnabled\":\"N\",\"giiAllowedIPs\":\"*\",\"licenseKey\":\"\",\"templatesDefault\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/views\":[\"@app/templates/default\"]}}},\"templates\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/views\":[\"@app/templates/default\"]}}},\"template\":\"default\",\"emailTemplatesDefault\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/mail\":[\"@app/mail\",\"@skeeks/cms/mail\"]}}},\"emailTemplates\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/mail\":[\"@app/mail\",\"@skeeks/cms/mail\"]}}},\"emailTemplate\":\"default\",\"defaultAttributes\":{\"adminEmail\":\"admin@skeeks.com\",\"notifyAdminEmailsHidden\":\"\",\"notifyAdminEmails\":\"\",\"appName\":null,\"noImageUrl\":\"http://vk.com/images/deactivated_100.gif\",\"userPropertyTypes\":[],\"registerRoles\":[\"user\"],\"languageCode\":\"ru\",\"passwordResetTokenExpire\":3600,\"enabledHitAgents\":\"Y\",\"hitAgentsInterval\":60,\"enabledHttpAuth\":\"N\",\"enabledHttpAuthAdmin\":\"N\",\"httpAuthLogin\":\"\",\"httpAuthPassword\":\"\",\"debugEnabled\":\"N\",\"debugAllowedIPs\":\"*\",\"giiEnabled\":\"N\",\"giiAllowedIPs\":\"*\",\"licenseKey\":\"demo\",\"templatesDefault\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/views\":[\"@app/templates/default\"]}}},\"templates\":[],\"template\":\"default\",\"emailTemplatesDefault\":{\"default\":{\"name\":\"Базовый шаблон (по умолчанию)\",\"pathMap\":{\"@app/mail\":[\"@app/mail\",\"@skeeks/cms/mail\"]}}},\"emailTemplates\":[],\"emailTemplate\":\"default\",\"defaultAttributes\":[],\"namespace\":null},\"namespace\":null}',NULL,NULL,NULL),(12,1,1,1446291154,1510344967,'skeeks\\cms\\components\\CmsToolbar','{\"allowedIPs\":[\"*\"],\"infoblocks\":[],\"editWidgets\":\"N\",\"editViewFiles\":\"N\",\"isOpen\":\"N\",\"enabled\":1,\"enableFancyboxWindow\":0,\"infoblockEditBorderColor\":\"red\",\"viewFiles\":[],\"inited\":false,\"editUrl\":\"\"}',1,NULL,NULL),(13,1,1,1455882391,1455882420,'skeeks\\cms\\cmsWidgets\\contentElements\\ContentElementsCmsWidget','{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":\"10\",\"pageSizeLimitMin\":\"1\",\"pageSizeLimitMax\":\"50\",\"pageParamName\":\"page\",\"orderBy\":\"priority\",\"order\":\"4\",\"label\":\"\",\"enabledSearchParams\":\"N\",\"enabledCurrentTree\":\"N\",\"enabledCurrentTreeChild\":\"N\",\"enabledCurrentTreeChildAll\":\"N\",\"tree_ids\":\"\",\"limit\":\"0\",\"active\":\"Y\",\"createdBy\":[],\"content_ids\":[\"2\"],\"enabledActiveTime\":\"Y\",\"enabledRunCache\":\"N\",\"runCacheDuration\":\"0\",\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"with\":[\"image\",\"cmsTree\"],\"dataProvider\":null,\"search\":null,\"viewFile\":\"@app/views/widgets/ContentElementsCmsWidget/slides\",\"defaultAttributes\":{\"enabledPaging\":\"Y\",\"enabledPjaxPagination\":\"Y\",\"pageSize\":10,\"pageSizeLimitMin\":1,\"pageSizeLimitMax\":50,\"pageParamName\":\"page\",\"orderBy\":\"published_at\",\"order\":3,\"label\":null,\"enabledSearchParams\":\"Y\",\"enabledCurrentTree\":\"Y\",\"enabledCurrentTreeChild\":\"Y\",\"enabledCurrentTreeChildAll\":\"Y\",\"tree_ids\":[],\"limit\":0,\"active\":\"\",\"createdBy\":[],\"content_ids\":[],\"enabledActiveTime\":\"Y\",\"enabledRunCache\":\"N\",\"runCacheDuration\":0,\"activeQueryCallback\":null,\"dataProviderCallback\":null,\"with\":[\"image\",\"cmsTree\"],\"dataProvider\":null,\"search\":null,\"viewFile\":\"default\",\"defaultAttributes\":[],\"namespace\":\"ContentElementsCmsWidget-home-slides\"},\"namespace\":\"ContentElementsCmsWidget-home-slides\"}',NULL,'ContentElementsCmsWidget-home-slides',NULL),(14,1,1,1510952550,1510952550,'skeeks\\cms\\toolbar\\CmsToolbar','{\"allowedIPs\":[\"*\"],\"infoblocks\":[],\"editWidgets\":\"N\",\"editViewFiles\":\"N\",\"isOpen\":\"Y\",\"enabled\":1,\"enableFancyboxWindow\":0,\"infoblockEditBorderColor\":\"red\",\"viewFiles\":[],\"inited\":false,\"editUrl\":\"\"}',1,NULL,NULL);
/*!40000 ALTER TABLE `cms_component_settings` ENABLE KEYS */;

--
-- Table structure for table `cms_content`
--

DROP TABLE IF EXISTS `cms_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `priority` int(11) NOT NULL DEFAULT '500',
  `description` text,
  `index_for_search` char(1) NOT NULL DEFAULT 'Y',
  `name_meny` varchar(100) DEFAULT NULL,
  `name_one` varchar(100) DEFAULT NULL,
  `tree_chooser` char(1) DEFAULT NULL,
  `list_mode` char(1) DEFAULT NULL,
  `content_type` varchar(32) NOT NULL,
  `default_tree_id` int(11) DEFAULT NULL,
  `is_allow_change_tree` varchar(1) NOT NULL DEFAULT 'Y',
  `root_tree_id` int(11) DEFAULT NULL,
  `viewFile` varchar(255) DEFAULT NULL,
  `meta_title_template` varchar(500) DEFAULT NULL,
  `meta_description_template` text,
  `meta_keywords_template` text,
  `access_check_element` varchar(1) NOT NULL DEFAULT 'N',
  `parent_content_id` int(11) DEFAULT NULL,
  `visible` varchar(1) NOT NULL DEFAULT 'Y',
  `parent_content_on_delete` varchar(10) NOT NULL DEFAULT 'CASCADE',
  `parent_content_is_required` varchar(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `priority` (`priority`),
  KEY `name` (`name`),
  KEY `active` (`active`),
  KEY `index_for_search` (`index_for_search`),
  KEY `name_meny` (`name_meny`),
  KEY `name_one` (`name_one`),
  KEY `tree_chooser` (`tree_chooser`),
  KEY `list_mode` (`list_mode`),
  KEY `content_type` (`content_type`),
  KEY `default_tree_id` (`default_tree_id`),
  KEY `is_allow_change_tree` (`is_allow_change_tree`),
  KEY `root_tree_id` (`root_tree_id`),
  KEY `viewFile` (`viewFile`),
  KEY `parent_content_id` (`parent_content_id`),
  KEY `visible` (`visible`),
  KEY `parent_content_on_delete` (`parent_content_on_delete`),
  KEY `parent_content_is_required` (`parent_content_is_required`),
  CONSTRAINT `cms_content_cms_content_type` FOREIGN KEY (`content_type`) REFERENCES `cms_content_type` (`code`),
  CONSTRAINT `cms_content_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content__cms_content` FOREIGN KEY (`parent_content_id`) REFERENCES `cms_content` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content__default_tree_id` FOREIGN KEY (`default_tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content__root_tree_id` FOREIGN KEY (`root_tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content`
--

/*!40000 ALTER TABLE `cms_content` DISABLE KEYS */;
INSERT INTO `cms_content` VALUES (1,1,1,1443696561,1443696561,'Публикации','articles','Y',500,NULL,'','Элементы','Элемент',NULL,NULL,'publication',NULL,'Y',NULL,NULL,NULL,NULL,NULL,'N',NULL,'Y','CASCADE','Y'),(2,1,1,1443696578,1443696578,'Слайды','slide','Y',500,NULL,'','Элементы','Элемент',NULL,NULL,'other',NULL,'Y',NULL,NULL,NULL,NULL,NULL,'N',NULL,'Y','CASCADE','Y'),(3,1,1,1445806941,1445806941,'Услуги','services','Y',500,NULL,'','Элементы','Элемент',NULL,NULL,'clinic',6,'N',6,'default',NULL,NULL,NULL,'N',NULL,'Y','CASCADE','Y');
/*!40000 ALTER TABLE `cms_content` ENABLE KEYS */;

--
-- Table structure for table `cms_content_element`
--

DROP TABLE IF EXISTS `cms_content_element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `published_to` int(11) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '500',
  `active` char(1) NOT NULL DEFAULT 'Y',
  `name` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `image_full_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description_short` longtext,
  `description_full` longtext,
  `content_id` int(11) DEFAULT NULL,
  `tree_id` int(11) DEFAULT NULL,
  `show_counter` int(11) DEFAULT NULL,
  `show_counter_start` int(11) DEFAULT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `description_short_type` varchar(10) NOT NULL DEFAULT 'text',
  `description_full_type` varchar(10) NOT NULL DEFAULT 'text',
  `parent_content_element_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_id_2` (`content_id`,`code`),
  UNIQUE KEY `tree_id_2` (`tree_id`,`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `published_at` (`published_at`),
  KEY `published_to` (`published_to`),
  KEY `priority` (`priority`),
  KEY `name` (`name`),
  KEY `code` (`code`),
  KEY `active` (`active`),
  KEY `content_id` (`content_id`),
  KEY `tree_id` (`tree_id`),
  KEY `show_counter` (`show_counter`),
  KEY `show_counter_start` (`show_counter_start`),
  KEY `meta_title` (`meta_title`(255)),
  KEY `description_short_type` (`description_short_type`),
  KEY `description_full_type` (`description_full_type`),
  KEY `image_id` (`image_id`),
  KEY `image_full_id` (`image_full_id`),
  KEY `parent_content_element_id` (`parent_content_element_id`),
  CONSTRAINT `cms_content_element_content_id` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`),
  CONSTRAINT `cms_content_element_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_tree_id` FOREIGN KEY (`tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element__cms_content_element` FOREIGN KEY (`parent_content_element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element__image_full_id` FOREIGN KEY (`image_full_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element__image_id` FOREIGN KEY (`image_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element`
--

/*!40000 ALTER TABLE `cms_content_element` DISABLE KEYS */;
INSERT INTO `cms_content_element` VALUES (1,1,1,1443697232,1455882577,1443697232,NULL,500,'Y','Слайд 1',7,NULL,'slayd-1','','',2,NULL,NULL,NULL,'','','','text','text',NULL),(2,1,1,1443697447,1455882577,1443697447,NULL,500,'Y','Слайд 2',6,NULL,'slayd-2','','',2,NULL,NULL,NULL,'','','','text','text',NULL),(3,1,1,1443698322,1455882578,1443698322,NULL,500,'Y','Слайд 3',8,NULL,'slayd-3','','',2,NULL,NULL,NULL,'','','','text','text',NULL),(4,1,1,1443698355,1455882578,1443698355,NULL,500,'Y','Слайд 4',9,NULL,'slayd-4','','',2,NULL,NULL,NULL,'','','','text','text',NULL),(5,1,1,1443698742,1455882578,1443698742,NULL,500,'Y','Слайд 5',10,NULL,'slayd-5','','',2,NULL,NULL,NULL,'','','','text','text',NULL),(6,1,1,1443699259,1443700220,1443699259,NULL,500,'Y','Дополнительная упаковка при доставке.',NULL,NULL,'dopolnitelnaya-upakovka-pri-dosta','<p><span style=\"line-height: 20.8px;\">С 1.08.2015 отгрузки через Деловые Линии, содержащие мотор-редукторы и комплектующие,</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">будут упаковываться в дополнительную деревянную обрешетку, оплата Получателем.</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">Чтобы отказаться от услуги, нужно заполнить Отказное письмо.</span></p>\r\n','<p>С 1.08.2015 отгрузки через Деловые Линии, содержащие мотор-редукторы и комплектующие,<br />\r\nбудут упаковываться в дополнительную деревянную обрешетку, оплата Получателем.<br />\r\nЧтобы отказаться от услуги, нужно заполнить Отказное письмо.</p>\r\n',1,NULL,NULL,NULL,'','','','editor','editor',NULL),(7,1,1,1443700182,1443700182,1443700182,NULL,500,'Y','Еще одна тестовая новость компании',NULL,NULL,'esche-odna-testovaya-novost-kompanii','<p><span style=\"line-height: 20.8px;\">С 1.08.2015 отгрузки через Деловые Линии, содержащие мотор-редукторы и комплектующие,</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">будут упаковываться в дополнительную деревянную обрешетку, оплата Получателем.</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">Чтобы отказаться от услуги, нужно заполнить Отказное письмо.</span></p>\r\n','<p><span style=\"line-height: 20.8px;\">С 1.08.2015 отгрузки через Деловые Линии, содержащие мотор-редукторы и комплектующие,</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">будут упаковываться в дополнительную деревянную обрешетку, оплата Получателем.</span><br style=\"line-height: 20.8px;\" />\r\n<span style=\"line-height: 20.8px;\">Чтобы отказаться от услуги, нужно заполнить Отказное письмо.</span></p>\r\n',1,NULL,NULL,NULL,'','','','editor','editor',NULL),(8,1,1,1445806961,1445807895,1445806961,NULL,500,'Y','Терапия',16,NULL,'terapiya','','<h2>Основными направлениями Терапевтической стоматологии в нашей клинике является:</h2>\r\n\r\n<ul>\r\n	<li>Лечение кариозных полостей</li>\r\n	<li>Лечение пульпита и переодантита</li>\r\n	<li>Лечение кисты</li>\r\n	<li>Удаление нерва</li>\r\n	<li>Пломбирование каналов</li>\r\n	<li>Гигиеническая чистка полости рта</li>\r\n</ul>\r\n\r\n<p>Поговорим о нескольких из них:</p>\r\n\r\n<h3>Методы и технологии применяемые нами:</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Наша клиника использует качественные пломбировочные материалы, биологически совместимые с тканями зуба, имеющие&nbsp;особо сильную прочность и имеющие&nbsp;международные сертификаты качества;</p>\r\n	</li>\r\n	<li>\r\n	<p>перед лечением мы проводим диагностику полости рта с использованием современных средств, позволяющих выявить кариес даже в труднодоступных местах;</p>\r\n	</li>\r\n	<li>\r\n	<p>мы используем &laquo;щадящие&raquo; технологи, позволяющие вылечить зуб с максимально возможным сохранением собственных тканей зуба.</p>\r\n	</li>\r\n	<li>\r\n	<p>наши врачи&nbsp;пломбируют зуб&nbsp;так,что следов лечения не заметно,выполняя&nbsp;художественное восстановление анатомической формы и цвета зуба.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Лечение кариозной полости:</h2>\r\n\r\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"//www.youtube.com/embed/OESvR1s-zMg?rel=0\" width=\"640\"></iframe></p>\r\n\r\n<h3>Пломбирование каналов зуба:</h3>\r\n\r\n<p>Способ&nbsp;пломбирования корневых каналов</p>\r\n\r\n<p>Метод &laquo;Латеральной конденсации гуттаперчи&raquo;: при пломбировании каналов этим способом, используют несколько гуттаперчевых штифтов различной конусности и определенной(заданной) длины. Гуттаперчевые штифты в сочетании со специальной пастой, вводят в, предварительно подготовленный канал, до апикального отверстия, далее вводят инструмент, напоминающий иглу, которым прижимают штифт к одной из стенок корневого канала. Инструмент вынимают, а в освободившееся место вводят следующий штифт, более меньшего диаметра и на меньшую глубину. Далее, инструментом прижимают к стенке этот и по очереди все последующие штифты. Таким образом, посредствам поочередного введения гуттаперчевых штифтов и конденсации их, достигается герметичное заполнение корневого канала.</p>\r\n\r\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"//www.youtube.com/embed/UxYNVkRjUHo?rel=0\" width=\"640\"></iframe></p>\r\n\r\n<h3>Гигиеническая чистка зубов:</h3>\r\n\r\n<p>Гигиеническая чистка зубов важна каждому человеку,вне зависимости реагируют зубы на раздражители или нет. Её главная задача удалить твердый зубной налет ( зубной камень ) и удаление мягкого зубного налета,и вот почему:</p>\r\n\r\n<p>Твердый зубной налет скапливается между зубом и десной, в итоге десна не плотно прилегает к зубу и создается карман,в который вместе с едой попадают бактерии. Десны начинают кровоточить,если долго не принемать действий, зубной камень будет скапливаться все глубже под десной что может привести к воспалению десен и расшатыванию зуба.</p>\r\n\r\n<p>Мягкий зубной налет опасен тем,что любой налет это бактерии и продукты их разложений, которые портят ткани зуба, именно из-за налета, образуется кариес.</p>\r\n\r\n<p>Гигиеническая чистка удаляет абсолютно всю негативную микрофлору полости рта,после удаления зубного камня, десенка &quot; вздыхает&quot; с облегчением, принимает здоровый цвет,&nbsp;перестает кровоточить и быстро востанавливается,начиная крепче держать Ваши зубки.</p>\r\n\r\n<p>&nbsp;</p>\r\n',3,6,NULL,NULL,'','','','text','editor',NULL),(9,1,1,1445807959,1445810203,1445807959,NULL,500,'Y','Протезирование зубов',17,NULL,'protezirovanie-zubov','','<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh4aflk\" id=\"ieh4aflk\">\r\n<p>Стоматология Адриа успешно занимается всеми видами протезирования:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Мостовидные протезы</p>\r\n	</li>\r\n	<li>\r\n	<p>Керамические коронки</p>\r\n	</li>\r\n	<li>\r\n	<p>Металлокерамические коронки</p>\r\n	</li>\r\n	<li>\r\n	<p>Коронки на основе диоксида циркония</p>\r\n	</li>\r\n	<li>\r\n	<p>Виниры</p>\r\n	</li>\r\n	<li>\r\n	<p>Съемные протезы</p>\r\n	</li>\r\n	<li>\r\n	<p>Культевые вкладки</p>\r\n	</li>\r\n	<li>\r\n	<p>Восстановление разрушенного зуба</p>\r\n	</li>\r\n	<li>\r\n	<p>Временные коронки</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;&nbsp;Поговорим о нескольких из них:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Мостовидные протезы,что это?</h3>\r\n\r\n<p>Мостовидные протезы &ndash; это универсальные конструкции, которые применяются, даже если в челюсти отсутствует несколько зубов. Показаниями для их использования&nbsp;считается необходимость восстановления 1-2, максимум 3 подряд отсутствующих зубов. В этом случае зубной мост будет надежно зафиксирован и выполнит свои функции в полном объеме.&nbsp;</p>\r\n\r\n<p>Мостовидный протез&nbsp;отличается высокой эстетичностью, прочностью, комфортом и продолжительным сроком службы. В зависимости от используемых материалов и типа конструкции, а также ухода за протезом, зубной мост в среднем прослужит не менее 10 лет.</p>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh62m2d\" id=\"ieh62m2d\">\r\n<p>Керамические коронки, металлокерамические коронки, коронки на основе диоксиа циркония.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Сегодня металлокерамические коронки являются наиболее удачным компромиссом между эстетикой, надежностью и стоимостью.</p>\r\n\r\n<p>Внутренняя часть металлокерамической коронки состоит из сплавов металла . В зависимости от использованных металлов и их сплавов различают металлокерамику на золоте, на кобальто-хромовых сплавах и тому подобное. Благодаря присутствию в сплаве золота удается достичь более естественного оттенка металлокерамических коронок, готовых к установке.&nbsp;Внутри коронки находится литой каркас.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Достоинства и недостатки металлокерамических коронок :</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Функциональность. Вы не будете ощущать никакого различия при приеме пищи. Искусственные зубы пережевывают пищу идентично натуральным зубам.</p>\r\n	</li>\r\n	<li>\r\n	<p>Эстетичность. Хороший специалист изготовит металлокерамические коронки, которые на вид совершенно не будут отличаться от настоящих зубов.</p>\r\n	</li>\r\n	<li>\r\n	<p>Долговечность и прочность. Металлокерамика легко выдерживает серьезные нагрузки, поэтому нет никакого риска образования на ваших коронках растрескиваний, сколов или других повреждений. Срок службы металлокерамических коронок &ndash; более 15 лет при соблюдении элементарной гигиены полости рта.</p>\r\n	</li>\r\n	<li>\r\n	<p>Гигиеничность. В отличие от настоящих зубов металлокерамические коронки не подвержены воздействию микроорганизмов и бактерий. Это огромный плюс для пациентов, в жизни которых имеют место заболевания пародонта.</p>\r\n	</li>\r\n	<li>\r\n	<p>Биологическая совместимость. Качественные, правильно изготовленные и хорошо установленные металлокерамические коронки не вызывают в деснах никаких изменений.</p>\r\n	</li>\r\n	<li>\r\n	<p>Защита зуба под коронкой. Правильно изготовленная коронка прилегает к зубу настолько плотно, что идеально защищает его от воздействия агрессивной среды, присутствующей в ротовой полости человека, тем самым предотвращает его дальнейшее разрушение.</p>\r\n	</li>\r\n	<li>\r\n	<p>Стоимость металлокерамической коронки более доступна в сравнении, например, с неметаллическими протезами или&nbsp;имплантами.</p>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh703ce\" id=\"ieh703ce\">\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh703ce.0\" id=\"ieh703celine\">&nbsp;</div>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh71rpb\" id=\"ieh71rpb\">\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh71rpb.0\" id=\"ieh71rpbvideoFrame\"><iframe allowfullscreen=\"\" data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh71rpb.0.0\" frameborder=\"0\" height=\"100%\" src=\"http://www.youtube.com/embed/uFSb_9kBdW8?wmode=transparent&amp;autoplay=0&amp;theme=dark&amp;controls=1&amp;autohide=0&amp;loop=0&amp;showinfo=0&amp;rel=0&amp;playlist=false&amp;enablejsapi=0\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; outline: 0px; vertical-align: baseline; background: transparent;\" width=\"100%\"></iframe></div>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh780br\" id=\"ieh780br\">\r\n<p>Виниры:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Виниры &ndash; это микропротезы,пластинки, которые позволяют восстановить цвет и форму одного или группы зубов.</p>\r\n\r\n<p>Винировые пластинки устанавливают на переднюю поверхность зуба. Их применяют для реставрации передних зубов, попадающих в линию улыбки.</p>\r\n\r\n<p>Зубы с винирами, ничем не отличаются от настоящих, так как при их изготовлении учитывается цвет зубов пациента.</p>\r\n\r\n<p>Винировые пластинки используются в тех случаях, когда восстановление и отбеливание зубов не дадут желаемого результата. Реставрация зубов винирами позволяет в кратчайшие сроки восстановить зубы, имеющие большие дефекты.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh7r3d7\" id=\"ieh7r3d7\">\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh7r3d7.0\" id=\"ieh7r3d7videoFrame\"><iframe allowfullscreen=\"\" data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1qbb.1.$ieh7r3d7.0.0\" frameborder=\"0\" height=\"100%\" src=\"http://www.youtube.com/embed/Q91izXON3Pc?wmode=transparent&amp;autoplay=0&amp;theme=dark&amp;controls=1&amp;autohide=0&amp;loop=0&amp;showinfo=0&amp;rel=0&amp;playlist=false&amp;enablejsapi=0\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; outline: 0px; vertical-align: baseline; background: transparent;\" width=\"100%\"></iframe></div>\r\n</div>\r\n',3,6,NULL,NULL,'','','','text','editor',NULL),(10,1,1,1445807986,1445810334,1445807986,NULL,500,'Y','Исправление прикуса (брекеты)',18,NULL,'ispravlenie-prikusa-breketyi','','<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$cg92.1.$ieh8p00n\" id=\"ieh8p00n\">\r\n<h3 style=\"text-align: center;\"><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"//www.youtube.com/embed/66iripWSEcM?rel=0\" width=\"640\"></iframe></h3>\r\n\r\n<h3>В каком возрасте возможно проведение ортодонтического лечения?</h3>\r\n\r\n<p>Вопреки распространенному мнению, исправить прикус и положение зубов можно в любом возрасте. При здоровой зубочелюстной системе возраст не является ограничивающим фактором, а в некоторых случаях ортодонтическая подготовка является обязательным этапом общего стоматологического лечения взрослого пациента. Длительность исправления прикуса зависит от скорости перестройки костной ткани, степени нарушения прикуса и в среднем оно занимает от одного года до полутора лет.</p>\r\n\r\n<p>В наше время брекеты наберают всю большую популярность, они компактно и аккуратно выглядят,являются символом ухода за своим здоровьем .</p>\r\n\r\n<p>Наш ортодонт пользуется самой современной брекет системой Damon, которая позволяет сократить срок пользования&nbsp;брекетами, делает их практически невидемыми при общении&nbsp;и удобными.</p>\r\n\r\n<p><strong>Показания к постановке&nbsp;брекетов:</strong></p>\r\n\r\n<p><strong>Функциональные.&nbsp;&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Человеческий организм - это единая система. Если в одном из отделов появился сбой, то он негативно влияет на весь организм. Вкраце - при патологическом&nbsp;прикусе, зубы смыкаются неправильно, и не обеспечивают должного&nbsp;размельчения и пережовывания пищи, в итоге страдает весь пищеварительный тракт</p>\r\n	</li>\r\n	<li>\r\n	<p>При патологическом прикусе, нагрузка на зубы распределяется неправильно, в итоге возникают клиновидные дифекты, уходит десна, за счет чего зубы становятся подвижными.</p>\r\n	</li>\r\n	<li>\r\n	<p>При патологическом расположении зубов, нет хорошего межзубного контакта, в итоге еда застревает на контактах и образуется кариес ( чаще наблюдается при скучености )</p>\r\n	</li>\r\n	<li>\r\n	<p>Дифекты речи</p>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<div data-reactid=\".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$cg92.1.$ieha02or\" id=\"ieha02or\">\r\n<p><strong>Эстетические.</strong></p>\r\n\r\n<p>В наше время красивая улыбка играет далеко не последнюю роль. И если природа вас не наградила красивой улыбкой, то не огорчайтесь, все можно исправить, главное желание и терпение. Исправление положения зубов брекетами это самый гуманный метод придать вам Вашу натуральную и красивую улыбку.&nbsp;Ведь при постановки брекетов, не надо обтачивать абсолютно здоровые зубы,брекеты клеятся&nbsp;&nbsp;к эмали зуба на специальный состав, содержащий фтор. В результате эмаль не только герметично защищена от микроорганизмов&nbsp;, но и укрепляется под постоянным выделением фтора.</p>\r\n</div>\r\n',3,6,NULL,NULL,'','','','text','editor',NULL),(11,1,1,1445808011,1445810091,1445808011,NULL,500,'Y','Отбеливание зубов',19,NULL,'otbelivanie-zubov','','<p>Если Вас не устраивает свой цвет зубов, то вам может помоч профессиональное отбеливание,благодаря которому ваши зубы станут гораздо белее. Эффект от отбеливания держится в среднем до 6 лет ( в зависимости от образа жизни и гигиены), но вся прелесть в том, что после отбеливания, зубы уже никогда не вернуться к своему старому цвету, со временем ( спустя N лет...) зубки потемнеют, но будут гораздо светлее, чем были до отбеливания.</p>\r\n\r\n<p>Перед отбеливанием очень важно заранее провести гигиеническую чистку &ndash; освободить поверхность эмали от зубного камня, налета пищи и пленки бактерий. Данный этап необходим, чтобы отбеливание получилось равномерным и эффективным.</p>\r\n\r\n<p>В начале самой процедуры доктор с помощью тонких латексных пластин и специального состава изолирует от окружающих тканей зубы, подлежащие отбеливанию. Это убережет губы, язык и десны от попадания отбеливающего раствора. Далее на зубы наносится отбеливающий гель, который активируется лазерным лучом. Опытный специалист подбирает необходимую интенсивность и время воздействия лазера в каждом конкретном случае. Как только необходимый результат будет достигнут, лазер направляется на следующий зуб. Под действием лазерного луча активный кислород, содержащийся в геле, высвобождается, проникает в эмаль и нейтрализует темный пигмент. В конце процедуры на зубы наносят фтор-гель, укрепляющий осветленную эмаль. В целом лазерное отбеливание дает возможность осветлить зубы на 8-10 тонов. После отбеливания пациентам назначают &quot; белую диету&quot; на 2 нед, в ходе которой идет закрепление цвета.</p>\r\n\r\n<p><strong>Не вредно ли это ?</strong></p>\r\n\r\n<p>У многих людей существует такой стереотип, что отбеливание вредит здоровым зубам, истончает эмаль и так далее. Безусловно если не иметь базовых профильных знаний и самовольно пытаться отбелить зубы подручными средствами, то шансы не только на белоснежную улыбку,но и на здоровые зубы резко снижаются.&nbsp;</p>\r\n\r\n<p>Не секрет,что все отбеливающие системы содержат в своем составе перекись водорода.Разные системы используют разные концентрации данного ве-ва,но этот элемент присутствует везде без исключений.При нанесении отбеливающего геля на зубы,через дентинные канальца гель проникает внутрь зуба воздействуя на коллаген,который располагается на эмалево-дентинной границе. Зуб насыщен влагой(слюна),при попадании геля на зубы, перекись начинает вытеснять воду из зубов, эта реакция идет с выделением кислорода, за счет чего образуется пузырьки пены ,этих пузырьков очень много, они бьются друг об друга,лопаются и происходит вибрация,которая ощущает пульповая камера зуба,Именно из- за этой реакции ощущаются дискомфортные и болезненные ощущения.&nbsp;<br />\r\nЕщё какое-то время после отбеливания, дентинные канальца остаются открытыми и чувствительность на воздух и др. раздражители сохраняется, но спустя сутки, она полностью пропадает.<br />\r\nЗапомните ! &nbsp;отбеливающие системы воздействуют на коллаген, именно он отвечает за цвет ваших зубов, точно такой же коллаген есть и у глаз отвечающий за цвет глаз.</p>\r\n',3,6,NULL,NULL,'','','','text','editor',NULL);
/*!40000 ALTER TABLE `cms_content_element` ENABLE KEYS */;

--
-- Table structure for table `cms_content_element2cms_user`
--

DROP TABLE IF EXISTS `cms_content_element2cms_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element2cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cms_user_id` int(11) NOT NULL,
  `cms_content_element_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user2elements` (`cms_user_id`,`cms_content_element_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `cms_content_element2cms_user__cms_content_element_id` (`cms_content_element_id`),
  CONSTRAINT `cms_content_element2cms_user__cms_content_element_id` FOREIGN KEY (`cms_content_element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element2cms_user__cms_user_id` FOREIGN KEY (`cms_user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element2cms_user__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element2cms_user__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Favorites content items';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element2cms_user`
--

-- LOCK TABLES `cms_content_element2cms_user` WRITE;
/*!40000 ALTER TABLE `cms_content_element2cms_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_element2cms_user` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_element_file`
--

DROP TABLE IF EXISTS `cms_content_element_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `storage_file_id` int(11) NOT NULL,
  `content_element_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `storage_file_id__content_element_id` (`storage_file_id`,`content_element_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `storage_file_id` (`storage_file_id`),
  KEY `content_element_id` (`content_element_id`),
  KEY `priority` (`priority`),
  CONSTRAINT `cms_content_element_file_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_file_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_file__content_element_id` FOREIGN KEY (`content_element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_file__storage_file_id` FOREIGN KEY (`storage_file_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь элементов и файлов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element_file`
--

-- LOCK TABLES `cms_content_element_file` WRITE;
/*!40000 ALTER TABLE `cms_content_element_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_element_file` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_element_image`
--

DROP TABLE IF EXISTS `cms_content_element_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `storage_file_id` int(11) NOT NULL,
  `content_element_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `storage_file_id__content_element_id` (`storage_file_id`,`content_element_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `storage_file_id` (`storage_file_id`),
  KEY `content_element_id` (`content_element_id`),
  KEY `priority` (`priority`),
  CONSTRAINT `cms_content_element_image_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_image_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_image__content_element_id` FOREIGN KEY (`content_element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_image__storage_file_id` FOREIGN KEY (`storage_file_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь элементов и файлов изображений';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element_image`
--

-- LOCK TABLES `cms_content_element_image` WRITE;
/*!40000 ALTER TABLE `cms_content_element_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_element_image` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_element_property`
--

DROP TABLE IF EXISTS `cms_content_element_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `value` longtext NOT NULL,
  `value_enum` int(11) DEFAULT NULL,
  `value_num` decimal(18,4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value_bool` tinyint(1) DEFAULT NULL,
  `value_num2` decimal(18,4) DEFAULT NULL,
  `value_int2` int(11) DEFAULT NULL,
  `value_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `element_id` (`element_id`),
  KEY `value_enum` (`value_enum`),
  KEY `value_num` (`value_num`),
  KEY `description` (`description`),
  KEY `property2element` (`property_id`,`element_id`),
  KEY `property2element2value_enum` (`property_id`,`element_id`,`value_enum`),
  KEY `property2element2value_num` (`property_id`,`element_id`,`value_num`),
  KEY `value_num2` (`value_num2`),
  KEY `value_int2` (`value_int2`),
  KEY `value_string` (`value_string`),
  KEY `property2element2value_string` (`property_id`,`element_id`,`value_string`),
  CONSTRAINT `cms_content_element_property_element_id` FOREIGN KEY (`element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_content_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_property__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_property__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь товара свойства и значения';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element_property`
--

-- LOCK TABLES `cms_content_element_property` WRITE;
/*!40000 ALTER TABLE `cms_content_element_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_element_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_element_tree`
--

DROP TABLE IF EXISTS `cms_content_element_tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_element_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `element_id` int(11) NOT NULL,
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `element_id_2` (`element_id`,`tree_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `tree_id` (`tree_id`),
  KEY `element_id` (`element_id`),
  CONSTRAINT `cms_content_element_tree__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_element_tree_element_id` FOREIGN KEY (`element_id`) REFERENCES `cms_content_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_tree_tree_id` FOREIGN KEY (`tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_element_tree__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь контента и разделов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_element_tree`
--

-- LOCK TABLES `cms_content_element_tree` WRITE;
/*!40000 ALTER TABLE `cms_content_element_tree` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_element_tree` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_property`
--

DROP TABLE IF EXISTS `cms_content_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `priority` int(11) NOT NULL DEFAULT '500',
  `property_type` char(1) NOT NULL DEFAULT 'S',
  `multiple` char(1) NOT NULL DEFAULT 'N',
  `is_required` char(1) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `component_settings` longtext,
  `hint` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_2` (`code`,`content_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `name` (`name`),
  KEY `content_id` (`content_id`),
  KEY `active` (`active`),
  KEY `priority` (`priority`),
  KEY `property_type` (`property_type`),
  KEY `multiple` (`multiple`),
  KEY `is_required` (`is_required`),
  KEY `component` (`component`),
  KEY `hint` (`hint`),
  KEY `code` (`code`) USING BTREE,
  CONSTRAINT `cms_content_property__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_property_content_id` FOREIGN KEY (`content_id`) REFERENCES `cms_content` (`id`),
  CONSTRAINT `cms_content_property__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Свойства элементов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_property`
--

-- LOCK TABLES `cms_content_property` WRITE;
/*!40000 ALTER TABLE `cms_content_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_property2content`
--

DROP TABLE IF EXISTS `cms_content_property2content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_property2content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cms_content_property_id` int(11) NOT NULL,
  `cms_content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property2content` (`cms_content_property_id`,`cms_content_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `cms_content_property_id` (`cms_content_property_id`),
  KEY `cms_content_id` (`cms_content_id`),
  CONSTRAINT `cms_content_property2content__property_id` FOREIGN KEY (`cms_content_property_id`) REFERENCES `cms_content_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_property2content__content_id` FOREIGN KEY (`cms_content_id`) REFERENCES `cms_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_property2content__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_property2content__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_property2content`
--

-- LOCK TABLES `cms_content_property2content` WRITE;
/*!40000 ALTER TABLE `cms_content_property2content` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_property2content` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_property2tree`
--

DROP TABLE IF EXISTS `cms_content_property2tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_property2tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cms_content_property_id` int(11) NOT NULL,
  `cms_tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property2tree` (`cms_content_property_id`,`cms_tree_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `cms_content_property_id` (`cms_content_property_id`),
  KEY `cms_tree_id` (`cms_tree_id`),
  CONSTRAINT `cms_content_property2tree__property_id` FOREIGN KEY (`cms_content_property_id`) REFERENCES `cms_content_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_property2tree__cms_tree_id` FOREIGN KEY (`cms_tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_property2tree__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_property2tree__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_property2tree`
--

-- LOCK TABLES `cms_content_property2tree` WRITE;
/*!40000 ALTER TABLE `cms_content_property2tree` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_property2tree` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_property_enum`
--

DROP TABLE IF EXISTS `cms_content_property_enum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_property_enum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `def` char(1) NOT NULL DEFAULT 'N',
  `code` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '500',
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `def` (`def`),
  KEY `code` (`code`),
  KEY `priority` (`priority`),
  KEY `value` (`value`),
  CONSTRAINT `cms_content_property_enum__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_property_enum_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_content_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_content_property_enum__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Справочник значений свойств типа список';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_property_enum`
--

-- LOCK TABLES `cms_content_property_enum` WRITE;
/*!40000 ALTER TABLE `cms_content_property_enum` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_content_property_enum` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_content_type`
--

DROP TABLE IF EXISTS `cms_content_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `files` text,
  `priority` int(11) NOT NULL DEFAULT '500',
  `name` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `priority` (`priority`),
  KEY `name` (`name`),
  CONSTRAINT `cms_content_type_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_content_type_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content_type`
--

-- LOCK TABLES `cms_content_type` WRITE;
/*!40000 ALTER TABLE `cms_content_type` DISABLE KEYS */;
INSERT INTO `cms_content_type` VALUES (1,1,1,1443696537,1443696537,NULL,500,'Публикации','publication'),(2,1,1,1443696547,1443696547,NULL,500,'Прочее','other'),(3,1,1,1445806903,1445806903,NULL,500,'Клиника','clinic');
/*!40000 ALTER TABLE `cms_content_type` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_dashboard`
--

DROP TABLE IF EXISTS `cms_dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_dashboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `cms_user_id` int(11) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  `columns` int(11) unsigned NOT NULL DEFAULT '1',
  `columns_settings` text,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `name` (`name`),
  KEY `cms_user_id` (`cms_user_id`),
  KEY `priority` (`priority`),
  KEY `columns` (`columns`),
  CONSTRAINT `cms_dashboard_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_dashboard_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_dashboard__cms_user_id` FOREIGN KEY (`cms_user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Рабочий стол';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_dashboard`
--

-- LOCK TABLES `cms_dashboard` WRITE;
/*!40000 ALTER TABLE `cms_dashboard` DISABLE KEYS */;
INSERT INTO `cms_dashboard` VALUES (1,1,1,1455882076,1455882267,'Стол 1 (общая информация)',NULL,100,2,NULL),(2,1,1,1455882157,1455882166,'Стол 2 (Контент)',NULL,100,3,NULL);
/*!40000 ALTER TABLE `cms_dashboard` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_dashboard_widget`
--

DROP TABLE IF EXISTS `cms_dashboard_widget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_dashboard_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cms_dashboard_id` int(11) NOT NULL,
  `cms_dashboard_column` int(11) NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL DEFAULT '100',
  `component` varchar(255) NOT NULL,
  `component_settings` text,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `priority` (`priority`),
  KEY `component` (`component`),
  KEY `cms_dashboard_id` (`cms_dashboard_id`),
  KEY `cms_dashboard_column` (`cms_dashboard_column`),
  CONSTRAINT `cms_dashboard_widget_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_dashboard_widget_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_dashboard_widget__cms_dashboard_id` FOREIGN KEY (`cms_dashboard_id`) REFERENCES `cms_dashboard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Виджет рабочего стола';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_dashboard_widget`
--

-- LOCK TABLES `cms_dashboard_widget` WRITE;
/*!40000 ALTER TABLE `cms_dashboard_widget` DISABLE KEYS */;
INSERT INTO `cms_dashboard_widget` VALUES (1,1,1,1455882100,1455882319,1,1,100,'skeeks\\cms\\modules\\admin\\dashboards\\AboutCmsDashboard',''),(2,1,1,1455882123,1455882319,1,1,200,'skeeks\\cms\\modules\\admin\\dashboards\\CmsInformDashboard',''),(3,1,1,1455882162,1455882243,2,1,100,'skeeks\\cms\\modules\\admin\\dashboards\\ContentElementListDashboard','a:11:{s:4:\"name\";s:20:\"Публикации\";s:13:\"enabledPaging\";s:1:\"1\";s:8:\"pageSize\";s:2:\"10\";s:16:\"pageSizeLimitMin\";s:1:\"1\";s:16:\"pageSizeLimitMax\";s:2:\"50\";s:17:\"enabledActiveTime\";s:1:\"1\";s:11:\"content_ids\";a:1:{i:0;s:1:\"1\";}s:8:\"tree_ids\";s:0:\"\";s:5:\"limit\";s:1:\"0\";s:7:\"orderBy\";s:12:\"published_at\";s:5:\"order\";s:1:\"3\";}'),(4,1,1,1455882189,1455882243,2,2,100,'skeeks\\cms\\modules\\admin\\dashboards\\ContentElementListDashboard','a:11:{s:4:\"name\";s:12:\"Слайды\";s:13:\"enabledPaging\";s:1:\"1\";s:8:\"pageSize\";s:2:\"10\";s:16:\"pageSizeLimitMin\";s:1:\"1\";s:16:\"pageSizeLimitMax\";s:2:\"50\";s:17:\"enabledActiveTime\";s:1:\"1\";s:11:\"content_ids\";a:1:{i:0;s:1:\"2\";}s:8:\"tree_ids\";s:0:\"\";s:5:\"limit\";s:1:\"0\";s:7:\"orderBy\";s:8:\"priority\";s:5:\"order\";s:1:\"4\";}'),(5,1,1,1455882225,1455882243,2,3,100,'skeeks\\cms\\modules\\admin\\dashboards\\ContentElementListDashboard','a:11:{s:4:\"name\";s:12:\"Услуги\";s:13:\"enabledPaging\";s:1:\"1\";s:8:\"pageSize\";s:2:\"10\";s:16:\"pageSizeLimitMin\";s:1:\"1\";s:16:\"pageSizeLimitMax\";s:2:\"50\";s:17:\"enabledActiveTime\";s:1:\"1\";s:11:\"content_ids\";a:1:{i:0;s:1:\"3\";}s:8:\"tree_ids\";s:0:\"\";s:5:\"limit\";s:1:\"0\";s:7:\"orderBy\";s:12:\"published_at\";s:5:\"order\";s:1:\"3\";}'),(6,1,1,1455882252,1455882319,1,2,100,'skeeks\\cms\\modules\\admin\\dashboards\\DiscSpaceDashboard','');
/*!40000 ALTER TABLE `cms_dashboard_widget` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_event`
--

DROP TABLE IF EXISTS `cms_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `priority` int(11) NOT NULL DEFAULT '150',
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_name` (`event_name`),
  KEY `priority` (`priority`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_event`
--

-- LOCK TABLES `cms_event` WRITE;
/*!40000 ALTER TABLE `cms_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_event` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_lang`
--

DROP TABLE IF EXISTS `cms_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `def` char(1) NOT NULL DEFAULT 'N',
  `priority` int(11) NOT NULL DEFAULT '500',
  `code` char(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_2` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `def` (`def`),
  KEY `code` (`code`),
  KEY `priority` (`priority`),
  KEY `name` (`name`),
  KEY `description` (`description`),
  KEY `cms_lang__image_id` (`image_id`),
  CONSTRAINT `cms_lang_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_lang_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_lang__image_id` FOREIGN KEY (`image_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Доступные языки';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_lang`
--

-- LOCK TABLES `cms_lang` WRITE;
/*!40000 ALTER TABLE `cms_lang` DISABLE KEYS */;
INSERT INTO `cms_lang` VALUES (1,1,1,1432126580,1432130752,'Y','Y',500,'ru','Русский','',NULL),(2,1,1,1432126667,1446071203,'Y','N',600,'en','Английский','',NULL);
/*!40000 ALTER TABLE `cms_lang` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_site`
--

DROP TABLE IF EXISTS `cms_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `def` char(1) NOT NULL DEFAULT 'N',
  `priority` int(11) NOT NULL DEFAULT '500',
  `code` char(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `server_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `active` (`active`),
  KEY `server_name` (`server_name`),
  KEY `def` (`def`),
  KEY `priority` (`priority`),
  KEY `cms_site__image_id` (`image_id`),
  CONSTRAINT `cms_site_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_site_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_site__image_id` FOREIGN KEY (`image_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Сайты';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_site`
--

-- LOCK TABLES `cms_site` WRITE;
/*!40000 ALTER TABLE `cms_site` DISABLE KEYS */;
INSERT INTO `cms_site` VALUES (1,1,1,1432128290,1432130861,'Y','Y',500,'s1','Сайт 1','','',NULL);
/*!40000 ALTER TABLE `cms_site` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_site_domain`
--

DROP TABLE IF EXISTS `cms_site_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_site_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `cms_site_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `cms_site_id` (`cms_site_id`),
  CONSTRAINT `cms_site_domain__cms_site_id` FOREIGN KEY (`cms_site_id`) REFERENCES `cms_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_site_domain_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_site_domain_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Доменные имена сайтов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_site_domain`
--

-- LOCK TABLES `cms_site_domain` WRITE;
/*!40000 ALTER TABLE `cms_site_domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_site_domain` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_storage_file`
--

DROP TABLE IF EXISTS `cms_storage_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_storage_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster_id` varchar(16) DEFAULT NULL,
  `cluster_file` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `size` bigint(32) DEFAULT NULL,
  `mime_type` varchar(16) DEFAULT NULL,
  `extension` varchar(16) DEFAULT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `name_to_save` varchar(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description_short` text,
  `description_full` text,
  `image_height` int(11) DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cluster_id` (`cluster_id`,`cluster_file`),
  KEY `cluster_id_2` (`cluster_id`),
  KEY `cluster_file` (`cluster_file`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `size` (`size`),
  KEY `extension` (`extension`),
  KEY `name_to_save` (`name_to_save`),
  KEY `name` (`name`),
  KEY `mime_type` (`mime_type`),
  KEY `image_height` (`image_height`),
  KEY `image_width` (`image_width`),
  CONSTRAINT `storage_file_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `storage_file_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='Файл';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_storage_file`
--

-- LOCK TABLES `cms_storage_file` WRITE;
/*!40000 ALTER TABLE `cms_storage_file` DISABLE KEYS */;
INSERT INTO `cms_storage_file` VALUES (6,'local','e7/3e/02/e73e0270e75c9f93738bbafefe182923.jpg',1,1,1443698527,1443698527,369564,'image/jpeg','jpg','%C2%A6%D0%AF%C2%A6-%C2%A6-%C2%A6%C2%AC%C2%A6%C2%ACT%D0%9C%C2%A6-%C2%A6-(4).jpg',NULL,'Слайд 2',NULL,NULL,500,1000),(7,'local','22/39/3f/22393fb271d072fd9e80629f56c457be.jpg',1,1,1443698567,1443698567,130519,'image/jpeg','jpg','kqfsv6ixxjjxz3dcs6ms.jpg',NULL,'Слайд 1',NULL,NULL,500,1000),(8,'local','c7/63/df/c763dfcc39d930e23502d088e518f099.jpg&w=1200&h=500&crop-to-fit=y',1,1,1443698642,1443698642,77241,'image/jpeg','jpg&w=1200&h=500','8664_rendering1-copy.jpg&w=1200&h=500&crop-to-fit=y',NULL,'Слайд 3',NULL,NULL,500,1200),(9,'local','6e/d4/c4/6ed4c434e7ec08d7a7489f5458f26b3d.png',1,1,1443698667,1443698667,618627,'image/png','png','444444.png',NULL,'Слайд 4',NULL,NULL,500,1200),(10,'local','a5/11/9e/a5119efa777546c9366e3affd8802571.png',1,1,1443698755,1443698756,477837,'image/png','png','1.png',NULL,'Слайд 5',NULL,NULL,500,1200),(16,'local','89/84/80/8984801767d98d26445c32e15725cb62.jpg',1,1,1445807895,1445807895,105935,'image/jpeg','jpg','image001.jpg',NULL,'Терапия',NULL,NULL,566,948),(17,'local','e3/b2/c7/e3b2c71dcdf5d325c0b73003380a808e.jpg',1,1,1445808804,1445808804,7517,'image/jpeg','jpg','big2owvasdc0ypez6x1fq7ng5ujl9kmht8rbi34.jpg',NULL,'Протезирование зубов',NULL,NULL,200,300),(18,'local','0c/2a/8c/0c2a8c95e88b17e27389d20b164025ba.jpg',1,1,1445808864,1445808864,47405,'image/jpeg','jpg','wsmile.jpg',NULL,'Исправление прикуса (брекеты)',NULL,NULL,335,534),(19,'local','26/a8/db/26a8dbb6439e79022c61e1a5fbcbec97.jpg',1,1,1445808934,1445808934,33713,'image/jpeg','jpg','32321_o420x258.jpg',NULL,'Отбеливание зубов',NULL,NULL,258,420);
/*!40000 ALTER TABLE `cms_storage_file` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree`
--

DROP TABLE IF EXISTS `cms_tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `image_full_id` int(11) DEFAULT NULL,
  `description_short` longtext,
  `description_full` longtext,
  `code` varchar(64) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pids` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `dir` varchar(500) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `published_at` int(11) DEFAULT NULL,
  `redirect` varchar(500) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `tree_type_id` int(11) DEFAULT NULL,
  `description_short_type` varchar(10) NOT NULL DEFAULT 'text',
  `description_full_type` varchar(10) NOT NULL DEFAULT 'text',
  `redirect_tree_id` int(11) DEFAULT NULL,
  `redirect_code` int(11) NOT NULL DEFAULT '301',
  `name_hidden` varchar(255) DEFAULT NULL,
  `view_file` varchar(128) DEFAULT NULL,
  `cms_site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pid_2` (`pid`,`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `name` (`name`),
  KEY `seo_page_name` (`code`),
  KEY `pid` (`pid`),
  KEY `pids` (`pids`),
  KEY `level` (`level`),
  KEY `priority` (`priority`),
  KEY `published_at` (`published_at`),
  KEY `redirect` (`redirect`(255)),
  KEY `meta_title` (`meta_title`(255)),
  KEY `tree_type_id` (`tree_type_id`),
  KEY `description_short_type` (`description_short_type`),
  KEY `description_full_type` (`description_full_type`),
  KEY `image_id` (`image_id`),
  KEY `image_full_id` (`image_full_id`),
  KEY `redirect_tree_id` (`redirect_tree_id`),
  KEY `redirect_code` (`redirect_code`),
  KEY `name_hidden` (`name_hidden`),
  KEY `view_file` (`view_file`),
  KEY `cms_site_id` (`cms_site_id`),
  KEY `cms_tree__site_dir` (`dir`(255),`cms_site_id`),
  CONSTRAINT `cms_tree_pid_cms_tree` FOREIGN KEY (`pid`) REFERENCES `cms_tree` (`id`),
  CONSTRAINT `cms_tree_tree_type_id` FOREIGN KEY (`tree_type_id`) REFERENCES `cms_tree_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree__cms_site_id` FOREIGN KEY (`cms_site_id`) REFERENCES `cms_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree__image_full_id` FOREIGN KEY (`image_full_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree__image_id` FOREIGN KEY (`image_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree__redirect_tree_id` FOREIGN KEY (`redirect_tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Страницы дерево';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree`
--

-- LOCK TABLES `cms_tree` WRITE;
/*!40000 ALTER TABLE `cms_tree` DISABLE KEYS */;
INSERT INTO `cms_tree` VALUES (1,1,1,1416084922,1455882885,'Главная страница',NULL,NULL,'','<p>Текст редактируемый в подробном описании главного раздела сайта.</p>\r\n',NULL,NULL,'1',0,NULL,0,NULL,'','Y','Тестовый проект SkeekS CMS (Yii2)','','',1,'editor','editor',NULL,301,'',NULL,1),(4,1,1,1443695838,1445809375,'Контакты',NULL,NULL,'','','contacts',1,'1/4',1,'contacts',600,NULL,'','Y','','','',5,'text','text',NULL,301,NULL,NULL,1),(6,1,1,1445723753,1445809375,'Услуги',NULL,NULL,NULL,NULL,'uslugi',1,'1/6',1,'uslugi',200,NULL,NULL,'Y',NULL,NULL,NULL,2,'text','text',NULL,301,NULL,NULL,1),(7,1,1,1445723763,1445809375,'Цены',NULL,NULL,NULL,NULL,'tsenyi',1,'1/7',1,'tsenyi',300,NULL,NULL,'Y',NULL,NULL,NULL,2,'text','text',NULL,301,NULL,NULL,1),(8,1,1,1445723768,1445809375,'Специалисты',NULL,NULL,NULL,NULL,'spetsialistyi',1,'1/8',1,'spetsialistyi',400,NULL,NULL,'Y',NULL,NULL,NULL,2,'text','text',NULL,301,NULL,NULL,1),(9,1,1,1445723775,1445809375,'Акции',NULL,NULL,NULL,NULL,'aktsii',1,'1/9',1,'aktsii',500,NULL,NULL,'Y',NULL,NULL,NULL,2,'text','text',NULL,301,NULL,NULL,1),(18,1,1,1445809372,1455882645,'О сайте',NULL,NULL,'','<p>Это демо текст</p>\r\n\r\n<h2>Московская сертифицированная стоматологическая клиника. 1111</h2>\r\n\r\n<p>Клиника доктора Дмитрия Вадимовича Звонарева,одна из ведущих стоматологических клиник Зеленограда, специализируется на оказании комплексной помощи в области стоматологии - лечения зубов и дёсен, как то: терапевтической, хирургической, ортодонтической, ортопедической стоматологии и имплантологии. Клиника укомплектована всем необходимым для качественного лечения зубов: квалифицированным медицинским персоналом, современным&nbsp;оборудованием.</p>\r\n','about',1,'1/18',1,'about',100,NULL,'','Y','','','',2,'text','editor',NULL,301,'',NULL,1);
/*!40000 ALTER TABLE `cms_tree` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_file`
--

DROP TABLE IF EXISTS `cms_tree_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `storage_file_id` int(11) NOT NULL,
  `tree_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `storage_file_id__tree_id` (`storage_file_id`,`tree_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `storage_file_id` (`storage_file_id`),
  KEY `tree_id` (`tree_id`),
  KEY `priority` (`priority`),
  CONSTRAINT `cms_tree_file_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_file_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_file__storage_file_id` FOREIGN KEY (`storage_file_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_file__tree_id` FOREIGN KEY (`tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь разделов и файлов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_file`
--

-- LOCK TABLES `cms_tree_file` WRITE;
/*!40000 ALTER TABLE `cms_tree_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_file` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_image`
--

DROP TABLE IF EXISTS `cms_tree_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `storage_file_id` int(11) NOT NULL,
  `tree_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `storage_file_id__tree_id` (`storage_file_id`,`tree_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `storage_file_id` (`storage_file_id`),
  KEY `tree_id` (`tree_id`),
  KEY `priority` (`priority`),
  CONSTRAINT `cms_tree_image_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_image_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_image__storage_file_id` FOREIGN KEY (`storage_file_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_image__tree_id` FOREIGN KEY (`tree_id`) REFERENCES `cms_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь разделов и файлов изображений';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_image`
--

-- LOCK TABLES `cms_tree_image` WRITE;
/*!40000 ALTER TABLE `cms_tree_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_image` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_property`
--

DROP TABLE IF EXISTS `cms_tree_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `value` longtext NOT NULL,
  `value_enum` int(11) DEFAULT NULL,
  `value_num` decimal(18,4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value_bool` tinyint(1) DEFAULT NULL,
  `value_num2` decimal(18,4) DEFAULT NULL,
  `value_int2` int(11) DEFAULT NULL,
  `value_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `element_id` (`element_id`),
  KEY `value_enum` (`value_enum`),
  KEY `value_num` (`value_num`),
  KEY `description` (`description`),
  KEY `value_num2` (`value_num2`),
  KEY `value_int2` (`value_int2`),
  KEY `value_string` (`value_string`),
  CONSTRAINT `cms_tree_property_element_id` FOREIGN KEY (`element_id`) REFERENCES `cms_tree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_tree_type_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_property__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_property__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь свойства и значения';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_property`
--

-- LOCK TABLES `cms_tree_property` WRITE;
/*!40000 ALTER TABLE `cms_tree_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_type`
--

DROP TABLE IF EXISTS `cms_tree_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `priority` int(11) NOT NULL DEFAULT '500',
  `description` text,
  `index_for_search` char(1) NOT NULL DEFAULT 'Y',
  `name_meny` varchar(100) DEFAULT NULL,
  `name_one` varchar(100) DEFAULT NULL,
  `viewFile` varchar(255) DEFAULT NULL,
  `default_children_tree_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `priority` (`priority`),
  KEY `name` (`name`),
  KEY `active` (`active`),
  KEY `index_for_search` (`index_for_search`),
  KEY `name_meny` (`name_meny`),
  KEY `name_one` (`name_one`),
  KEY `viewFile` (`viewFile`),
  KEY `default_children_tree_type` (`default_children_tree_type`),
  CONSTRAINT `cms_tree_type_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_type_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_type__default_children_tree_type` FOREIGN KEY (`default_children_tree_type`) REFERENCES `cms_tree_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Тип раздела';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_type`
--

-- LOCK TABLES `cms_tree_type` WRITE;
/*!40000 ALTER TABLE `cms_tree_type` DISABLE KEYS */;
INSERT INTO `cms_tree_type` VALUES (1,1,1,1439037415,1445723743,'Главный раздел','home','Y',500,NULL,'','Разделы','Раздел','',2),(2,1,1,1439037424,1439037424,'Текстовый раздел','text','Y',500,NULL,'','Разделы','Раздел',NULL,NULL),(5,1,1,1443703382,1443703382,'Контакты','contacts','Y',500,NULL,'','Разделы','Раздел',NULL,NULL);
/*!40000 ALTER TABLE `cms_tree_type` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_type_property`
--

DROP TABLE IF EXISTS `cms_tree_type_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_type_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `priority` int(11) NOT NULL DEFAULT '500',
  `property_type` char(1) NOT NULL DEFAULT 'S',
  `multiple` char(1) NOT NULL DEFAULT 'N',
  `is_required` char(1) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `component_settings` longtext,
  `hint` varchar(255) DEFAULT NULL,
  `tree_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_2` (`code`,`tree_type_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `name` (`name`),
  KEY `active` (`active`),
  KEY `priority` (`priority`),
  KEY `property_type` (`property_type`),
  KEY `multiple` (`multiple`),
  KEY `is_required` (`is_required`),
  KEY `component` (`component`),
  KEY `hint` (`hint`),
  KEY `tree_type_id` (`tree_type_id`),
  KEY `code` (`code`) USING BTREE,
  CONSTRAINT `cms_tree_type_property__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_type_property_tree_type_id` FOREIGN KEY (`tree_type_id`) REFERENCES `cms_tree_type` (`id`),
  CONSTRAINT `cms_tree_type_property__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Свойство раздела';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_type_property`
--

-- LOCK TABLES `cms_tree_type_property` WRITE;
/*!40000 ALTER TABLE `cms_tree_type_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_type_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_type_property2type`
--

DROP TABLE IF EXISTS `cms_tree_type_property2type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_type_property2type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cms_tree_type_property_id` int(11) NOT NULL,
  `cms_tree_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property2content` (`cms_tree_type_property_id`,`cms_tree_type_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `cms_tree_type_property_id` (`cms_tree_type_property_id`),
  KEY `cms_tree_type_id` (`cms_tree_type_id`),
  CONSTRAINT `cms_tree_type_property2type__property_id` FOREIGN KEY (`cms_tree_type_property_id`) REFERENCES `cms_tree_type_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_type_property2type__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_type_property2type__type_id` FOREIGN KEY (`cms_tree_type_id`) REFERENCES `cms_tree_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_type_property2type__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_type_property2type`
--

-- LOCK TABLES `cms_tree_type_property2type` WRITE;
/*!40000 ALTER TABLE `cms_tree_type_property2type` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_type_property2type` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_tree_type_property_enum`
--

DROP TABLE IF EXISTS `cms_tree_type_property_enum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_tree_type_property_enum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `def` char(1) NOT NULL DEFAULT 'N',
  `code` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '500',
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `def` (`def`),
  KEY `code` (`code`),
  KEY `priority` (`priority`),
  KEY `value` (`value`),
  CONSTRAINT `cms_tree_type_property_enum__updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_tree_type_property_enum_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_tree_type_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_tree_type_property_enum__created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Справочник значений свойств для разделов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_tree_type_property_enum`
--

-- LOCK TABLES `cms_tree_type_property_enum` WRITE;
/*!40000 ALTER TABLE `cms_tree_type_property_enum` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_tree_type_property_enum` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user`
--

DROP TABLE IF EXISTS `cms_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `_to_del_name` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `gender` enum('men','women') NOT NULL DEFAULT 'men',
  `active` char(1) NOT NULL DEFAULT 'Y',
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `logged_at` int(11) DEFAULT NULL,
  `last_activity_at` int(11) DEFAULT NULL,
  `last_admin_activity_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email_is_approved` int(1) unsigned NOT NULL DEFAULT '0',
  `phone_is_approved` int(1) unsigned NOT NULL DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `password_hash` (`password_hash`),
  KEY `password_reset_token` (`password_reset_token`),
  KEY `name` (`_to_del_name`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `logged_at` (`logged_at`),
  KEY `last_activity_at` (`last_activity_at`),
  KEY `last_admin_activity_at` (`last_admin_activity_at`),
  KEY `image_id` (`image_id`),
  KEY `phone_is_approved` (`phone_is_approved`),
  KEY `email_is_approved` (`email_is_approved`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `patronymic` (`patronymic`),
  KEY `full_name_index` (`first_name`,`last_name`,`patronymic`),
  CONSTRAINT `cms_user_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_user_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_user__image_id` FOREIGN KEY (`image_id`) REFERENCES `cms_storage_file` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Пользователь';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user`
--

-- LOCK TABLES `cms_user` WRITE;
/*!40000 ALTER TABLE `cms_user` DISABLE KEYS */;
INSERT INTO `cms_user` VALUES (1,'root','otv60YW-nV6-8GRI4La3vYNhu_-dmp_n','$2y$13$j4ZarxjwBV.eC9q7pbg41OWLuR0Nu2.LLfOzD0rkLqnwkgBvCTIvy','wn49wJLj9OMVjgj8bBzBjND4nFixyJgt_1413297645',NULL,1510989007,'Семенов Александр',NULL,'men','Y',1,NULL,1510327590,1510989007,1510989007,'semenov@skeeks.com',NULL,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cms_user` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_authclient`
--

DROP TABLE IF EXISTS `cms_user_authclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_authclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `provider_identifier` varchar(100) DEFAULT NULL,
  `provider_data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `provider` (`provider`),
  KEY `provider_identifier` (`provider_identifier`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_authclient`
--

-- LOCK TABLES `cms_user_authclient` WRITE;
/*!40000 ALTER TABLE `cms_user_authclient` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_user_authclient` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_email`
--

DROP TABLE IF EXISTS `cms_user_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `approved` char(1) NOT NULL DEFAULT 'N',
  `def` varchar(1) NOT NULL DEFAULT 'N',
  `approved_key` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`),
  KEY `approved_key` (`approved_key`),
  KEY `approved` (`approved`),
  KEY `user_id` (`user_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  CONSTRAINT `cms_user_email_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_email`
--

-- LOCK TABLES `cms_user_email` WRITE;
/*!40000 ALTER TABLE `cms_user_email` DISABLE KEYS */;
INSERT INTO `cms_user_email` VALUES (2,1,'semenov@skeeks.com','Y','Y',NULL,1455882778,1455882803);
/*!40000 ALTER TABLE `cms_user_email` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_phone`
--

DROP TABLE IF EXISTS `cms_user_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `approved` char(1) NOT NULL DEFAULT 'N',
  `def` varchar(1) NOT NULL DEFAULT 'N',
  `approved_key` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`),
  KEY `approved_key` (`approved_key`),
  KEY `approved` (`approved`),
  KEY `user_id` (`user_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  CONSTRAINT `cms_user_phone_user_id` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_phone`
--

-- LOCK TABLES `cms_user_phone` WRITE;
/*!40000 ALTER TABLE `cms_user_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_user_phone` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_property`
--

DROP TABLE IF EXISTS `cms_user_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `value_enum` int(11) DEFAULT NULL,
  `value_num` decimal(18,4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value_bool` tinyint(1) DEFAULT NULL,
  `value_num2` decimal(18,4) DEFAULT NULL,
  `value_int2` int(11) DEFAULT NULL,
  `value_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `element_id` (`element_id`),
  KEY `value` (`value`),
  KEY `value_enum` (`value_enum`),
  KEY `value_num` (`value_num`),
  KEY `description` (`description`),
  KEY `value_num2` (`value_num2`),
  KEY `value_int2` (`value_int2`),
  KEY `value_string` (`value_string`),
  CONSTRAINT `cms_user_property_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_user_property_element_id` FOREIGN KEY (`element_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_user_property_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_user_universal_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_user_property_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь свойства и значения';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_property`
--

-- LOCK TABLES `cms_user_property` WRITE;
/*!40000 ALTER TABLE `cms_user_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_user_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_universal_property`
--

DROP TABLE IF EXISTS `cms_user_universal_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_universal_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `priority` int(11) NOT NULL DEFAULT '500',
  `property_type` char(1) NOT NULL DEFAULT 'S',
  `multiple` char(1) NOT NULL DEFAULT 'N',
  `is_required` char(1) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `component_settings` text,
  `hint` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `name` (`name`),
  KEY `active` (`active`),
  KEY `priority` (`priority`),
  KEY `property_type` (`property_type`),
  KEY `multiple` (`multiple`),
  KEY `is_required` (`is_required`),
  KEY `component` (`component`),
  KEY `hint` (`hint`),
  CONSTRAINT `cms_user_universal_property_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_user_universal_property_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Свойства пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_universal_property`
--

-- LOCK TABLES `cms_user_universal_property` WRITE;
/*!40000 ALTER TABLE `cms_user_universal_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_user_universal_property` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `cms_user_universal_property_enum`
--

DROP TABLE IF EXISTS `cms_user_universal_property_enum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_user_universal_property_enum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `def` char(1) NOT NULL DEFAULT 'N',
  `code` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '500',
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `property_id` (`property_id`),
  KEY `def` (`def`),
  KEY `code` (`code`),
  KEY `priority` (`priority`),
  KEY `value` (`value`),
  CONSTRAINT `cms_user_universal_property_enum_created_by` FOREIGN KEY (`created_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cms_user_universal_property_enum_property_id` FOREIGN KEY (`property_id`) REFERENCES `cms_user_universal_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_user_universal_property_enum_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `cms_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Справочник значений свойств типа список';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_user_universal_property_enum`
--

-- LOCK TABLES `cms_user_universal_property_enum` WRITE;
/*!40000 ALTER TABLE `cms_user_universal_property_enum` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_user_universal_property_enum` ENABLE KEYS */;
-- UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-18 10:16:59