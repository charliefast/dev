CREATE DATABASE  IF NOT EXISTS `160593-bytarna` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `160593-bytarna`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: 160593-bytarna
-- ------------------------------------------------------
-- Server version	5.5.16-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'klader-accessoarer','Kläder & Accessoarer'),(2,'hem-design-inredning','Hem, Design & Inredning'),(3,'sport-fritid-biljetter','Sport, Fritid & Biljetter'),(4,'hobby-samlarsaker','Hobby & Samlarsaker'),(5,'hemelektronik','Hemelektronik'),(6,'musik-bocker-spel-film','Musik, Böcker, Spel & Film'),(7,'motor','Motor'),(8,'ovrigt','Övrigt');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `hem-design-inredning`
--

DROP TABLE IF EXISTS `hem-design-inredning`;
/*!50001 DROP VIEW IF EXISTS `hem-design-inredning`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `hem-design-inredning` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `hemelektronik`
--

DROP TABLE IF EXISTS `hemelektronik`;
/*!50001 DROP VIEW IF EXISTS `hemelektronik`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `hemelektronik` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `hobby-samlarsaker`
--

DROP TABLE IF EXISTS `hobby-samlarsaker`;
/*!50001 DROP VIEW IF EXISTS `hobby-samlarsaker`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `hobby-samlarsaker` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'/tmp/phpOz6lxD','uploads/431354616665-431354616462-happy-panda',43,0),(2,'skissbild-forstasidan.png','uploads/431354617092-skissbild-forstasidan.pn',43,0),(3,'happy-panda.jpg','uploads/431354617167-happy-panda.jpg',43,0),(4,'sprflogga.gif','uploads/431354619216-sprflogga.gif',43,0),(5,'sprflogga.gif','uploads/431354619763-sprflogga.gif',43,0),(6,'efftel-logo.gif','uploads/431354623253-efftel-logo.gif',43,0),(7,'sprflogga.gif','uploads/431354623254-sprflogga.gif',43,0),(8,'efftel-logo.gif','uploads/431354623503-efftel-logo.gif',43,0),(9,'sprflogga.gif','uploads/431354623504-sprflogga.gif',43,0),(10,'sprflogga.gif','uploads/431354623563-sprflogga.gif',43,0),(11,'efftel-logo.gif','uploads/431354623565-efftel-logo.gif',43,0),(12,'sprflogga.gif','uploads/431354623763-sprflogga.gif',43,0),(13,'efftel-logo.gif','uploads/431354623764-efftel-logo.gif',43,0),(14,'sprflogga.gif','uploads/431354623794-sprflogga.gif',43,0),(15,'sprflogga.gif','uploads/431354623822-sprflogga.gif',43,0),(16,'efftel-logo.gif','uploads/431354623827-efftel-logo.gif',43,0),(17,'sprflogga.gif','uploads/431354623896-sprflogga.gif',43,0),(18,'sprflogga.gif','uploads/431354623978-sprflogga.gif',43,0),(19,'sprflogga.gif','uploads/431354624066-sprflogga.gif',43,0),(20,'sprflogga.gif','uploads/431354624258-sprflogga.gif',43,0),(21,'efftel-logo.gif','uploads/431354624266-efftel-logo.gif',43,0),(22,'darth-vader-face.jpg','uploads/431354802581-darth-vader-face.jpg',43,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'gula Converse','Helt nya, oanvända Converse. Lila. Storlek 39, men är ju stora i storlekarna så passar bättre till en 40. Jag har normalt stl 39, de är för stora till mej.','2012-09-13 09:49:37','0000-00-00 00:00:00',1,23,1),(2,'5 st gamla virkade grytlappar','hel och fin\r\nbet till mitt konto i swedbank\r\njag samfraktar\r\nskickar även med schenker vid vikt över 1 kg','2012-09-05 09:45:00','0000-00-00 00:00:00',2,23,1),(3,'FORD AEROSTAR','Något för den händiga eller som reservdelsbil!\r\nBilen funkar bra i motorn och växellåda !\r\nBilen är avställd , ej skattad eller besiktad!','2012-09-12 16:32:49','2012-10-12 16:32:49',7,25,1),(4,'En svart kofta med päls till tjej stl 146-164 ','En fin varm och skön kofta med fuskpäls som kan användas inomhus nu och vid varmare väder som en jacka. Storlekslappen 158-164 stämmer bra, men den kan användas från 146 om man viker upp ärmresåren.','2012-12-03 16:28:01','0000-00-00 00:00:00',1,41,1),(5,'Thåström-Som Jordgubbarna Smakade BluRay+CD Inplastad ','Med Fyra utsålda spelningar på Cirkus i Stockholm kickstartade en av årets mest bejublade och sedda Svenska turnéer 2012. Skivan Beväpna Dig Med Vingar har hyllats unisont, bland annat med Jan Gradvalls ord i DI - \"En av Sveriges största artister genom tiderna på den absoluta toppen av sin förmåga\". För att summera detta fantastiska år släpps delar av de två konsertkvällarna, dels från Cirkus i Stockholm och även från Sentrum Scene i Oslo.\nEn enkel CD med 13 live spår medföljer gratis. \n\n \n\n1. Beväpna dig med vingar2. Kärlek är för dom3. Miss Huddinge ´724. Dansbandssångaren5. Aldrig nånsin komma ner6. Nere på Maskinisten7. Ingen neråtsång8. Smaken av dig9. Kriget med mej själv10. Främling överallt11. Axel Landquists Park12. Låt dom regna13. Kort biografi med litet testamente14. Vacker död stad15. St Ana katedral16. Samarkanda17. Ingen sjunger blues som Jeffrey Lee Pierce18. Rock´n´Roll e död19. Du ska va president20. Fanfanfan21. Sönder BoulevardBonus:22. St Ana Katedral23. Du ska va president ','2012-12-04 19:02:09',NULL,6,43,1),(6,'Sony Walkman DD II ORGINAL MED VÄSKA','Sony Walkman DD II ORGINAL MED VÄSKA RETRO ....','2012-12-04 22:02:09','0000-00-00 00:00:00',5,32,1),(8,'50 st AKTAS Emballage Etiketter','50 Självhäftande och fluorescerande Etiketter.','2012-12-05 08:45:09',NULL,8,50,1),(10,'30 st STIGA Emballage Etiketter','50 Självhäftande och fluorescerande Etiketter.','2012-12-05 08:45:09',NULL,8,50,1),(13,'Chokladmaskinen på göteborgsoperan','Har köpt biljetter till den redan slutsålda chokladmaskinen, byt den med mig!','2012-12-09 09:36:17','0000-00-00 00:00:00',3,57,1),(14,'Chokladmaskinen på göteborgsoperan','Har köpt biljetter till den redan slutsålda chokladmaskinen, byt den med mig!','2012-12-09 09:36:28','0000-00-00 00:00:00',3,57,0),(17,'Fotbollskor','Mitt andra par som jag inte vill har kvar längre.','2012-12-09 10:35:57','0000-00-00 00:00:00',1,57,1),(18,'Fotbollskor','Mitt andra par som jag inte vill har kvar längre.','2012-12-09 10:36:01','0000-00-00 00:00:00',1,57,0),(19,'Mazda 626 -00','En nästan ny mazda 626 som fungerar utmärkt. Bytes gärna mot en massa roliga saker.','2012-12-09 10:36:38','0000-00-00 00:00:00',7,57,1),(20,'Mazda 626 -00','En nästan ny mazda 626 som fungerar utmärkt. Bytes gärna mot en massa roliga saker.','2012-12-09 10:36:41','0000-00-00 00:00:00',7,57,0),(21,'Ikea bord','Vill byta bort mitt ikea bord mot en massa krimskrams. Bordet är i väldigt bra skick och har inga repor.','2012-12-09 10:37:25','0000-00-00 00:00:00',2,57,1),(22,'Ikea bord','Vill byta bort mitt ikea bord mot en massa krimskrams. Bordet är i väldigt bra skick och har inga repor.','2012-12-09 10:37:32','0000-00-00 00:00:00',2,57,0),(23,'Mobil iphone','Vill byta bort min iphone 5 mot en lite nyare mobil. Det får gärna vara en nokia 5210.','2012-12-09 10:38:23','0000-00-00 00:00:00',5,57,1),(24,'Mobil iphone','Vill byta bort min iphone 5 mot en lite nyare mobil. Det får gärna vara en nokia 5210.','2012-12-09 10:38:25','0000-00-00 00:00:00',5,57,0),(25,'Liten Kross','Vill bli av med sonens fina kross som köptes in förra året. Den fungerar som den ska, du får en hjälm på köpet!','2012-12-09 10:39:14','0000-00-00 00:00:00',7,57,1),(26,'Liten Kross','Vill bli av med sonens fina kross som köptes in förra året. Den fungerar som den ska, du får en hjälm på köpet!','2012-12-09 10:39:17','0000-00-00 00:00:00',7,57,0),(27,'Sagan om ringen biobiljett','Har köpt en biobiljett som är väldigt speciell. Man behöver inte köa för att gå och kolla. Det är en VIP bio biljett!','2012-12-09 10:40:13','0000-00-00 00:00:00',6,57,1),(28,'Sagan om ringen biobiljett','Har köpt en biobiljett som är väldigt speciell. Man behöver inte köa för att gå och kolla. Det är en VIP bio biljett!','2012-12-09 10:40:17','0000-00-00 00:00:00',6,57,0),(29,'Schampoflaskor från 50-talet','Något för en samlare, 20 olika schampoflaskor från 50-talet med olika slags motiv. Mycket fina','2012-12-09 10:41:00','0000-00-00 00:00:00',8,57,1),(30,'Schampoflaskor från 50-talet','Något för en samlare, 20 olika schampoflaskor från 50-talet med olika slags motiv. Mycket fina','2012-12-09 10:41:03','0000-00-00 00:00:00',8,57,0),(31,'Walkman','Vill bli av med min walkman från 2007, den fungerar utmärkt och konkurrerar ut smartphones med sin snygga design!','2012-12-09 10:41:57','0000-00-00 00:00:00',5,57,1),(32,'Walkman','Vill bli av med min walkman från 2007, den fungerar utmärkt och konkurrerar ut smartphones med sin snygga design!','2012-12-09 10:42:00','0000-00-00 00:00:00',5,57,0),(33,'Segeltorp matta','Vill byta bort min fina matta som jag köpte i segeltorp, där man har som tradition att göra vackra mattor sedan 300 år tillbaka.','2012-12-09 10:42:55','0000-00-00 00:00:00',2,57,1),(34,'Segeltorp matta','Vill byta bort min fina matta som jag köpte i segeltorp, där man har som tradition att göra vackra mattor sedan 300 år tillbaka.','2012-12-09 10:43:00','0000-00-00 00:00:00',2,57,0),(35,'HM tröja','En alldeles ny hm tröja, dam. Har inte använt den en enda gång. Vill byta den för att jag inte gillar motivet på framsidan.\nBytes gärna mot något annat plagg från HM.','2012-12-09 10:44:26','0000-00-00 00:00:00',1,57,1),(36,'HM tröja','En alldeles ny hm tröja, dam. Har inte använt den en enda gång. Vill byta den för att jag inte gillar motivet på framsidan.\nBytes gärna mot något annat plagg från HM.','2012-12-09 10:44:30','0000-00-00 00:00:00',1,57,0),(37,'Göteborg-sthlm','Har en tågbiljett som går mellan gbg och sthlm. Den är väldigt bra när det gäller placering.','2012-12-09 10:45:05','0000-00-00 00:00:00',3,57,1),(38,'Göteborg-sthlm','Har en tågbiljett som går mellan gbg och sthlm. Den är väldigt bra när det gäller placering.','2012-12-09 10:45:07','0000-00-00 00:00:00',3,57,0),(39,'Kapsyl samling','Vill du byta något mot världens största kapsylsamling? Det kan vara ditt största kap!','2012-12-09 10:45:57','0000-00-00 00:00:00',4,57,1),(40,'Kapsyl samling','Vill du byta något mot världens största kapsylsamling? Det kan vara ditt största kap!','2012-12-09 10:46:01','0000-00-00 00:00:00',4,57,0),(42,'Markus green konsert','Har en biljett till en grym konsert till artisten Markus green!\nHan spelar gitarr som en gud!','2012-12-09 10:46:53','0000-00-00 00:00:00',3,57,0),(43,'Markus green konsert','Har en biljett till en grym konsert till artisten Markus green!\nHan spelar gitarr som en gud!','2012-12-10 12:04:10','0000-00-00 00:00:00',3,57,0),(44,'Kapsyl samling','Vill du byta något mot världens största kapsylsamling? Det kan vara ditt största kap!','2012-12-10 12:04:11','0000-00-00 00:00:00',4,57,0),(45,'Göteborg-sthlm','Har en tågbiljett som går mellan gbg och sthlm. Den är väldigt bra när det gäller placering.','2012-12-10 12:04:13','0000-00-00 00:00:00',3,57,0),(46,'Fotbollsmatch','tre biljetter till säsongspremiär på gamla ullevi. Det kommer bli en spännande match mellan råsunda if - ifk','2012-12-10 12:07:50','0000-00-00 00:00:00',3,57,1),(47,'Fotbollsmatch','tre biljetter till säsongspremiär på gamla ullevi. Det kommer bli en spännande match mellan råsunda if - ifk','2012-12-10 12:07:54','0000-00-00 00:00:00',3,57,0),(48,'Flygplan','Testa att bygga dina egna samlar flygplan, det blir mycket snyggare än att köpa de som finns i affären.','2012-12-10 12:08:31','0000-00-00 00:00:00',4,57,1),(49,'Flygplan','Testa att bygga dina egna samlar flygplan, det blir mycket snyggare än att köpa de som finns i affären.','2012-12-10 12:08:34','0000-00-00 00:00:00',4,57,0),(51,'asdf','asdf','2012-12-10 01:46:32','0000-00-00 00:00:00',2,57,0),(52,'asdf','asdf','2012-12-10 01:46:42','0000-00-00 00:00:00',2,57,0),(53,'asdf','asdf','2012-12-10 01:46:57','0000-00-00 00:00:00',2,57,1),(54,'asdf','asdf','2012-12-10 01:47:08','0000-00-00 00:00:00',2,57,0),(59,'asdfsdf','asdfsdf','2012-12-10 11:36:13','0000-00-00 00:00:00',2,57,0),(60,'asdfsdf','asdfsdf','2012-12-10 11:36:26','0000-00-00 00:00:00',2,57,0),(62,'asdfsd','asdfas','2012-12-10 11:37:48','0000-00-00 00:00:00',2,57,0),(63,'asdfsd','asdfas','2012-12-10 11:37:50','0000-00-00 00:00:00',2,57,0),(64,'asdfsd','asdfas','2012-12-10 11:37:50','0000-00-00 00:00:00',2,57,0),(65,'asdfs','asdfasdf','2012-12-10 11:38:08','0000-00-00 00:00:00',1,57,0),(66,'asdfs','asdfasdf','2012-12-10 11:38:08','0000-00-00 00:00:00',1,57,0),(67,'asdfs','asdfasdf','2012-12-10 11:38:08','0000-00-00 00:00:00',1,57,0),(68,'asdfs','asdfasdf','2012-12-10 11:38:09','0000-00-00 00:00:00',1,57,0),(69,'asdfs','asdfasdf','2012-12-10 11:38:09','0000-00-00 00:00:00',1,57,0),(70,'asdfasfd','sdafsdf','2012-12-10 11:38:20','0000-00-00 00:00:00',3,57,0),(71,'asdfasfd','sdafsdf','2012-12-10 11:38:21','0000-00-00 00:00:00',3,57,0),(72,'asdfsdf','öjknkjl','2012-12-10 11:41:56','0000-00-00 00:00:00',2,57,0),(73,'asdfsdf','öjknkjl','2012-12-10 11:41:57','0000-00-00 00:00:00',2,57,0),(74,'asdfsdf','öjknkjl','2012-12-10 11:41:57','0000-00-00 00:00:00',2,57,0),(75,'asdfsdf','öjknkjl','2012-12-10 11:41:57','0000-00-00 00:00:00',2,57,0),(76,'asdfsdf','öjknkjl','2012-12-10 11:41:58','0000-00-00 00:00:00',2,57,0),(77,'asdfsdf','öjknkjl','2012-12-10 11:41:58','0000-00-00 00:00:00',2,57,0),(78,'asdf','asdfasdf','2012-12-10 07:15:47','0000-00-00 00:00:00',1,57,0),(79,'asdf','asdfasdf','2012-12-10 07:42:50','0000-00-00 00:00:00',1,57,0),(80,'dfdf','asdfsdf','2012-12-10 07:48:48','0000-00-00 00:00:00',1,57,0),(81,'dfdf','asdfsdf','2012-12-10 07:48:50','0000-00-00 00:00:00',1,57,0),(82,'dfdf','asdfsdf','2012-12-10 07:48:51','0000-00-00 00:00:00',1,57,0),(83,'dfdf','asdfsdf','2012-12-10 07:48:52','0000-00-00 00:00:00',1,57,0),(84,'dfdf','asdfsdf','2012-12-10 07:48:53','0000-00-00 00:00:00',1,57,0),(85,'dfdf','asdfsdf','2012-12-10 07:49:04','0000-00-00 00:00:00',1,57,0),(86,'dfdf','asdfsdf','2012-12-10 07:49:05','0000-00-00 00:00:00',1,57,0),(87,'dfdf','asdfsdf','2012-12-10 07:49:05','0000-00-00 00:00:00',1,57,0),(88,'dfdf','asdfsdf','2012-12-10 07:49:06','0000-00-00 00:00:00',1,57,0),(89,'dfdf','asdfsdf','2012-12-10 07:49:06','0000-00-00 00:00:00',1,57,0),(90,'dfdsf','asdfasdf','2012-12-10 07:49:49','0000-00-00 00:00:00',3,57,0),(91,'dfdsf','asdfasdf','2012-12-10 07:49:49','0000-00-00 00:00:00',3,57,0),(92,'dfdsf','asdfasdf','2012-12-10 07:49:49','0000-00-00 00:00:00',3,57,0),(93,'dfdsf','asdfasdf','2012-12-10 07:49:49','0000-00-00 00:00:00',3,57,0),(94,'dfdsf','asdfasdf','2012-12-10 07:49:50','0000-00-00 00:00:00',3,57,0),(95,'sadfdf','asdfdf','2012-12-10 07:50:03','0000-00-00 00:00:00',3,57,0),(96,'sadfdf','asdfdf','2012-12-10 07:50:03','0000-00-00 00:00:00',3,57,0),(97,'sadfdf','asdfdf','2012-12-10 07:50:04','0000-00-00 00:00:00',3,57,0),(98,'sadfdf','asdfdf','2012-12-10 07:50:04','0000-00-00 00:00:00',3,57,0),(99,'sadfdf','asdfdf','2012-12-10 07:50:07','0000-00-00 00:00:00',3,57,0),(100,'sadfdf','asdfdf','2012-12-10 07:50:07','0000-00-00 00:00:00',3,57,0),(101,'sadfdf','asdfdf','2012-12-10 07:50:07','0000-00-00 00:00:00',3,57,0),(102,'sadfdf','asdfdf','2012-12-10 07:50:08','0000-00-00 00:00:00',3,57,0),(103,'dfsaf','asdfasdf','2012-12-10 07:50:51','0000-00-00 00:00:00',3,57,0),(104,'dfsaf','asdfasdf','2012-12-10 07:50:52','0000-00-00 00:00:00',3,57,0),(105,'dfsaf','asdfasdf','2012-12-10 07:50:53','0000-00-00 00:00:00',3,57,0),(106,'dfsaf','asdfasdf','2012-12-10 07:50:54','0000-00-00 00:00:00',3,57,0),(107,'dfsaf','asdfasdf','2012-12-10 07:50:55','0000-00-00 00:00:00',3,57,0),(108,'dfsaf','asdfasdf','2012-12-10 07:50:55','0000-00-00 00:00:00',3,57,0),(109,'dfsaf','asdfasdf','2012-12-10 07:50:56','0000-00-00 00:00:00',3,57,0),(110,'dfsaf','asdfasdf','2012-12-10 07:50:57','0000-00-00 00:00:00',3,57,0),(111,'dfsaf','asdfasdf','2012-12-10 07:50:59','0000-00-00 00:00:00',3,57,0),(112,'dfsaf','asdfasdf','2012-12-10 07:50:59','0000-00-00 00:00:00',3,57,0),(113,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:25','0000-00-00 00:00:00',1,57,0),(114,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:25','0000-00-00 00:00:00',1,57,0),(115,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:26','0000-00-00 00:00:00',1,57,0),(116,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:26','0000-00-00 00:00:00',1,57,0),(117,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:26','0000-00-00 00:00:00',1,57,0),(118,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:26','0000-00-00 00:00:00',1,57,0),(119,'sadfasdfsd','asdfasdfasdf','2012-12-10 07:51:27','0000-00-00 00:00:00',1,57,0),(120,'sdfa','asdfasdf','2012-12-10 07:51:38','0000-00-00 00:00:00',2,57,0),(121,'sdfa','asdfasdf','2012-12-10 07:51:38','0000-00-00 00:00:00',2,57,0),(122,'sdfa','asdfasdf','2012-12-10 07:51:39','0000-00-00 00:00:00',2,57,0),(123,'sdfa','asdfasdf','2012-12-10 07:51:39','0000-00-00 00:00:00',2,57,0),(124,'dfsadf','asdfasdfd','2012-12-10 07:51:46','0000-00-00 00:00:00',3,57,0),(125,'dfsadf','asdfasdfd','2012-12-10 07:51:47','0000-00-00 00:00:00',3,57,0),(126,'asdf','asdfasdf','2012-12-10 07:51:57','0000-00-00 00:00:00',3,57,0),(127,'asdf','asdfasdf','2012-12-10 07:52:12','0000-00-00 00:00:00',3,57,0),(128,'asdfd','asdfdsf','2012-12-10 07:52:20','0000-00-00 00:00:00',2,57,0),(129,'asdfd','asdfdsf','2012-12-10 07:52:21','0000-00-00 00:00:00',2,57,0),(130,'asdfd','asdfdsf','2012-12-10 07:52:21','0000-00-00 00:00:00',2,57,0),(131,'asdfd','asdfdsf','2012-12-10 07:52:21','0000-00-00 00:00:00',2,57,0),(132,'asdfd','asdfdsf','2012-12-10 07:52:21','0000-00-00 00:00:00',2,57,0),(133,'asdfd','asdfdsf','2012-12-10 07:52:22','0000-00-00 00:00:00',2,57,0),(134,'asdfd','asdfdsf','2012-12-10 07:52:22','0000-00-00 00:00:00',2,57,0),(135,'asdfd','asdfdsf','2012-12-10 07:52:22','0000-00-00 00:00:00',2,57,0),(136,'dsfa','asdfdsf','2012-12-10 07:52:36','0000-00-00 00:00:00',2,57,0),(137,'asdfdsaf','asdfsdf','2012-12-10 07:53:06','0000-00-00 00:00:00',3,57,0),(138,'dfdd','sadfdf','2012-12-10 07:53:32','0000-00-00 00:00:00',5,57,0),(142,'','','2012-12-10 09:30:48',NULL,NULL,43,0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `klader-accessoarer`
--

DROP TABLE IF EXISTS `klader-accessoarer`;
/*!50001 DROP VIEW IF EXISTS `klader-accessoarer`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `klader-accessoarer` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_liked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,43,1,'2012-12-05 16:06:21'),(2,43,2,'2012-12-05 16:08:56'),(3,43,1,'2012-12-05 16:09:04'),(4,57,48,'2012-12-10 18:58:07'),(5,57,33,'2012-12-10 19:06:21'),(6,57,48,'2012-12-10 20:32:43'),(7,57,48,'2012-12-10 20:33:05'),(8,57,48,'2012-12-10 20:33:08');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,0,43,'0','0000-00-00 00:00:00',0,NULL),(2,43,43,'test','2012-12-03 09:57:20',0,NULL),(3,43,43,'0','0000-00-00 00:00:00',2,NULL),(4,0,43,'0','0000-00-00 00:00:00',2,NULL),(5,0,43,'0','0000-00-00 00:00:00',2,NULL),(6,43,43,'hejehje','2012-12-03 10:21:10',0,NULL),(7,0,43,'0','0000-00-00 00:00:00',2,NULL),(8,0,43,'0','0000-00-00 00:00:00',2,NULL),(9,43,41,'ett meddelande','2012-12-03 10:37:24',0,NULL),(10,43,43,'ett svar till message med id 6','2012-12-03 11:27:12',0,NULL),(11,43,43,'ett svar till message med id 3','2012-12-03 11:29:45',2,NULL),(12,43,43,'svar till 11','2012-12-03 11:31:26',11,NULL),(13,43,43,'svar till id 6','2012-12-03 11:34:59',6,NULL),(14,43,43,'ett till svar till 6','2012-12-03 11:42:53',6,NULL),(15,43,43,'','2012-12-04 13:52:42',0,NULL),(16,0,0,'0','0000-00-00 00:00:00',0,1),(17,0,0,'0','0000-00-00 00:00:00',0,1),(18,0,0,'0','0000-00-00 00:00:00',0,1),(19,0,0,'0','0000-00-00 00:00:00',0,1),(20,0,0,'0','0000-00-00 00:00:00',0,3),(21,0,0,'0','0000-00-00 00:00:00',0,1),(22,0,0,'0','0000-00-00 00:00:00',0,1),(23,0,0,'0','0000-00-00 00:00:00',0,1),(24,0,0,'0','0000-00-00 00:00:00',0,1),(25,0,0,'0','0000-00-00 00:00:00',0,1),(26,0,0,'0','0000-00-00 00:00:00',0,1),(27,0,0,'0','0000-00-00 00:00:00',0,1),(28,0,0,'0','0000-00-00 00:00:00',0,1),(29,0,0,'0','0000-00-00 00:00:00',0,0),(30,0,0,'0','0000-00-00 00:00:00',0,1),(31,0,0,'0','0000-00-00 00:00:00',0,1),(32,0,0,'0','0000-00-00 00:00:00',0,1),(33,43,0,'ett meddelande','2012-12-05 11:27:50',0,1),(34,43,43,'test','2012-12-05 11:53:51',6,0),(35,43,0,'jag är intresserad av item med id 3','2012-12-05 11:54:21',0,3),(36,57,57,'','2012-12-07 20:11:00',0,0),(37,57,57,'klml','2012-12-07 20:11:36',36,0),(38,57,57,'ölmölm','2012-12-07 20:11:43',37,0),(39,57,10,'Hm, undrar om du fortfarande har kvar item 10?\n','2012-12-09 12:35:24',0,0),(40,57,50,'Undrar om du har kvar den där ena saken?','2012-12-09 12:35:58',0,0),(41,57,50,'','2012-12-09 12:36:16',0,0),(42,57,50,'sadfsdf','2012-12-09 14:31:18',40,0),(43,57,57,'jahajah','2012-12-09 15:44:12',37,0),(44,57,57,'          ','2012-12-09 18:17:48',0,0),(45,57,4,'föaosdjhfapsodjghpwaorugihjaepråigjaerg\n','2012-12-09 20:56:55',0,0),(46,0,0,'0','0000-00-00 00:00:00',0,3),(47,0,0,'0','0000-00-00 00:00:00',0,1),(48,57,57,'','2012-12-10 20:53:35',NULL,48),(49,57,0,'Det här är ett test\n','2012-12-10 21:15:46',NULL,10),(50,57,0,'          Det här är ett annat test!','2012-12-10 21:16:06',NULL,17),(51,57,0,'          Det här är ett annat test!','2012-12-10 21:16:06',NULL,17),(52,57,57,'Det här är ett test\n','2012-12-10 21:16:36',NULL,46),(53,57,0,'Det här var spännande!','2012-12-10 21:17:22',NULL,33),(54,57,0,'          Det här barasdofnsadäf','2012-12-10 21:32:13',NULL,6),(55,57,0,'          ','2012-12-10 21:33:34',NULL,6),(56,57,57,'asdfdf','2012-12-10 21:37:43',NULL,48),(57,57,57,'sdaf','2012-12-10 21:39:13',NULL,48),(58,43,57,'till hm tröja','2012-12-10 21:59:55',0,35),(59,43,57,'fotbollskor','2012-12-10 22:07:00',0,17),(60,43,43,'jordgubbar','2012-12-10 22:10:48',0,5);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `motor`
--

DROP TABLE IF EXISTS `motor`;
/*!50001 DROP VIEW IF EXISTS `motor`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `motor` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `musik-bocker-spel-film`
--

DROP TABLE IF EXISTS `musik-bocker-spel-film`;
/*!50001 DROP VIEW IF EXISTS `musik-bocker-spel-film`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `musik-bocker-spel-film` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ovrigt`
--

DROP TABLE IF EXISTS `ovrigt`;
/*!50001 DROP VIEW IF EXISTS `ovrigt`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ovrigt` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sport-fritid-biljetter`
--

DROP TABLE IF EXISTS `sport-fritid-biljetter`;
/*!50001 DROP VIEW IF EXISTS `sport-fritid-biljetter`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sport-fritid-biljetter` (
  `id` int(11) unsigned,
  `headline` varchar(255),
  `description` text,
  `date_added` datetime,
  `end_date` datetime,
  `user_id` int(11),
  `firstname` varchar(255),
  `lastname` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sign_up_date` date DEFAULT NULL,
  `last_active` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` int(11) DEFAULT '0',
  `activation_key` varchar(255) NOT NULL,
  `email_activated` enum('0','1') DEFAULT '0',
  `presentation` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (23,'Albino','alf','olofsson','','','','','albin@hotmail.com','ead6c09483683d7f0e9d77331e379424bbb50073',NULL,'2012-09-14 13:01:25',0,'2BULpMlfkWIxrSUQjDtNbav7LMHpXF4MnEIJnIkOxUdz00CTni','0',NULL),(25,'assdasdasda','sdaasdsadsad','sdadsasaddsadsa','','','','','adsadassa@dfdfs.sad','58b0b3b8860156c19848de4495d0a53916987fba',NULL,'2012-09-14 13:10:54',0,'JWtX3kMN8UAaXZ5f8PacCpy9MeWpBlRCWnAea4SfaU4WM5EtKW','0',NULL),(26,'fsggfsdas','hjgdhdj','sgfhdjhjd','','','','','hjgdhdj@haj.se','bb910d1e6d22999144057c490de5863d43006316',NULL,'2012-09-14 13:13:29',0,'fBgsPMtUk3xlACiYX2OVTNzzhFNtxqV0lSR1dakdyY136qQ9x8','0',NULL),(27,'sdfhgffdg','sdfhgdh','safghjghgdf','','','','','sdfhgffdg@hej.se','9a7f85bad42824e069e8c0c1647bae1fc5b08fab',NULL,'2012-09-14 13:16:38',0,'36yLwBC3ZaFwrbo2eFcWk0c2l2UjYLzNW59C8XP55Xwo8Ek4ZI','0',NULL),(28,'sdasfddsf','sdfdsffdsdfs','dsffdsfsdfds','','','','','fdsdfssdfdsfdsf@le.se','2c3330c288dfad9a1a742e7168b114b5dc80afea',NULL,'2012-09-14 13:22:19',0,'2NnIbSRXDWVtVUbQTqBD4FoS8fJ4fm2RHhlYexKsehE9GSlQLO','0',NULL),(29,'sdffds','sdffsd','sdffdsdsfsdf','','','','','sdfhgfssfdg@hej.se','a4081bf6de43c8cf7be5b6bff73db3213a9fbd83',NULL,'2012-09-14 13:28:10',0,'8G4AQu2AZeQtIUfZwjEHbSaOrwBl0IGGAEdFKcQQENQWNmzz9v','0',NULL),(30,'fdghdfsfgsddefsa','fhdgfgffgr','dsadsadefasfesdsadsae','','','','','dsasdadsadsads2@hej.se','525ffb6f039cedeb1fd72590c2f36848f580e90e',NULL,'2012-09-14 13:48:51',0,'37QM1tIcBHzDqDpVjQ0e7RF7s0KqYdEibbkkA9oIdeedeJbFXf','0',NULL),(31,'fdsgfsg','fdgfdgdsff','fdsgfhjghgf','','','','','asdfghjkhgfds@gfl.com','d6d890645a9bedfc1714fdcf80d363329eedf24f',NULL,'2012-09-20 07:55:36',0,'VjsJsrMcMIXsrTiRiwLOGAXl7v0Q7dTelyyP2CvurWDXOXkg5K','1',NULL),(32,'dsgfdgf','dfgfdddddghgf','sdffffffffffgf','','','','','fdsfdsfsdds@hghg.sed','2e74e916c993c7a4aeb1c14b7cbf4ae7984b651a',NULL,'2012-09-17 08:13:51',0,'0QIQdP1Mj07QCTC95QOSm9NbeSGaJMCqymLHpbMD0rJbciYCMX','0',NULL),(33,'erghtrjh','dgjhgjg','erghtrjh','','','','','erghtrjh@hotmail.com','b29f13dc51b9a7c9cadd626432f112a1664fe957',NULL,'2012-09-17 08:15:26',0,'1gbdlz4Ya22sBgywLBIEpUcdeaPm8Ms3yGXElERzH6Ldx4t38U','0',NULL),(34,'dfghfjj','hgggjkjh','fghjgjkjh','','fdhgjkjjh','','','fghjgjkjh@jhgkfh.se','aedeb9f49245c900ccc7365a82daf35673543876',NULL,'2012-09-17 08:16:14',0,'ncgnInDUaQJbBlHSNTw2URVd3KbrEWBhhmXrJJmLsKr6wUcg4E','0',NULL),(35,'carinas','DFASD','DSGFD','','','','','afds@hfjs.se','d54fec2f9170862070da5a9c0447870be8905451',NULL,'2012-09-18 07:54:12',0,'4XDnzwZIrChrv7Aw8ZNp1B4DJvnikl53FeC3bt6Tgxe4KQYl7p','0',NULL),(37,'','fdsfds','sdfsfd','','','','','bla@email.se','c62d8081e53b9f9ddc26e14a34555630068e1451',NULL,'2012-09-20 07:27:29',0,'hYPMh6q8pyLA76d28GhJ8lUYl4yNwmyQRiOqqLuof5RneGLXui','1',NULL),(39,NULL,'fgdf','sfdghgf','','','','','gfafd@hf.se','c62d8081e53b9f9ddc26e14a34555630068e1451',NULL,'2012-09-20 08:09:55',0,'c8mS6LtgPRBHJafbGbk6w0ln1nlwp54apSGc8WZ6ieRdW5AHkf','0',NULL),(40,NULL,'dsffds','ghdfd','','','','','asdgffhj@jh.se','c62d8081e53b9f9ddc26e14a34555630068e1451',NULL,'2012-09-20 08:12:31',0,'QbaOznq4kEW7JZqvVbSobFbnEXwXlI77TqfwEsMdD1335qK7Wn','1',NULL),(41,NULL,'carina','möllbrink',NULL,NULL,NULL,NULL,'carina@raccoon.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-11-07 11:16:34',0,'0QiDa9dvbbgcCbQGeqmwlZZJBimGwTrBJXiEY6UMhb8PJLFqnB','1',NULL),(42,NULL,'hej','hejsson',NULL,NULL,NULL,NULL,'hej@hej.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-11-07 11:19:51',0,'jBQRmMFBj5OhBWy0N4Sce01DIO1MmISd4vSe5i6UVChW4QVlDy','1',NULL),(43,NULL,'Darth','Vader','','','','','vader@deathstar.com','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 15:23:43',0,'bC1lIaxZN9LK09D0DSzRQ4O1bGgG8wwuM9TEWBMCef5g64ha5e','1','Your destiny lies with me Skywalker. Obi-Wan knew this to be true.'),(44,NULL,'','',NULL,NULL,NULL,NULL,'','0ba361e1bb3219c0628b92e0cdbdf85939275667',NULL,'2012-12-06 09:19:53',0,'z6hYJE9yyoyqdzFT5FyY4CaTtjuT5PkQJSwPWWVjQ3kP5Ff2pj','0',NULL),(46,NULL,'Berit','Bengtsson',NULL,NULL,NULL,NULL,'bettan@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:32:00',0,'tKyQ2QOxz92vFJre63WW89CrVBWkYgN6MVIu4ndYiLLMH9YC2I','0',NULL),(47,NULL,'Inger','Arvidsdsson',NULL,NULL,NULL,NULL,'inger@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:36:54',0,'bFrUbTKFtRtew4L7nfQzz2y0DR92P0SiVWucWsf3fByXc9y683','0',NULL),(48,NULL,'Albin','Albino',NULL,NULL,NULL,NULL,'albin@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:38:20',0,'GoplI7Yg8dsnQ20QsBy1A4oCtc90BlbLN4rXZ8swcuv2uIiWkf','0',NULL),(49,NULL,'Sara','Johansson',NULL,NULL,NULL,NULL,'sara@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:39:18',0,'3nIKgXXb4QA2s7j3elRKB65SBwQ7fLIjPjL7Kcp1ouzrMxxtOe','0',NULL),(50,NULL,'Ludvig','Vinge',NULL,NULL,NULL,NULL,'vinge@hej.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:40:23',0,'wb1zZdRlOfYTswl4qL3u4rU5OkVyuyLyIoN3igI5BMb2ZLfIRm','0',NULL),(51,NULL,'Börje','Salming',NULL,NULL,NULL,NULL,'borje@mail.se','d54fec2f9170862070da5a9c0447870be8905451',NULL,'2012-12-06 09:41:35',0,'8k8OtSHRBnpsV6iyQrWi1Mraiz8MgsJ23ReMNapbRc1COodIF6','0',NULL),(52,NULL,'Johan','Ahlen',NULL,NULL,NULL,NULL,'ahlen@mail.se','d54fec2f9170862070da5a9c0447870be8905451',NULL,'2012-12-06 09:44:27',0,'pDnugYWqUPgI50gmbm5T2UUVB9G54ALEvr3SkYO4G3E8pUeW6f','0',NULL),(53,NULL,'Lisa','Lee',NULL,NULL,NULL,NULL,'lisa@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 09:52:47',0,'vEWxX5KLEuJWeiJPl35foVmdkvagC140IFjWQ43lih5OVQD6Ly','0',NULL),(54,NULL,'Josef','Josefsson',NULL,NULL,NULL,NULL,'josef@hej.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 10:01:38',0,'BhsJAAriYlc7pVUU4wXEpwSvnT3WpXEOCLmuPe5JOspJsat6Z0','0',NULL),(55,NULL,'Jonas','Johanson',NULL,NULL,NULL,NULL,'jonas@mail.se','8eb1735618091f34d64c834ea97160a6e279d672',NULL,'2012-12-06 10:08:31',0,'aynt05svfOmZD72Mj70ndQHVg4TQrsrBhOWNkdpeGRFEf01Vnq','0',NULL),(56,NULL,'Arvid','Oskarsson',NULL,NULL,NULL,NULL,'arvid@donet.se','cdf2e326c0257ab3443500e32617b02a2700d0d6','2012-12-07','2012-12-07 16:43:47',0,'c8Gx50cEXzEbIwCJ0egVqCjOWJ9Co5b0zuWmjXO5kG9weYPA4n','0',NULL),(57,NULL,'Hector','Romo','Sverige','Stockholm3d','','','hector.romo@circuit.se','f4c58077ae7a9c172ed9383241edfd8966a22b6b','2012-12-07','2012-12-10 19:14:39',0,'NG4Q9r7ahV7zgpKgczDp95rgEuqbBBUSVZAQGLUOimDgqg4Hdf','0',''),(58,NULL,'asdf','asdf','','','','','asdf@asdf.se','cdf2e326c0257ab3443500e32617b02a2700d0d6','2012-12-07','2012-12-07 19:48:21',0,'oxty9iW3vLSblRtKvpZvx6Qt7p1MRQWWdFGoM1aMw3H4S2uBUf','0','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `hem-design-inredning`
--

/*!50001 DROP TABLE IF EXISTS `hem-design-inredning`*/;
/*!50001 DROP VIEW IF EXISTS `hem-design-inredning`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `hem-design-inredning` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'hem-design-inredning') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `hemelektronik`
--

/*!50001 DROP TABLE IF EXISTS `hemelektronik`*/;
/*!50001 DROP VIEW IF EXISTS `hemelektronik`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `hemelektronik` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'hemelektronik') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `hobby-samlarsaker`
--

/*!50001 DROP TABLE IF EXISTS `hobby-samlarsaker`*/;
/*!50001 DROP VIEW IF EXISTS `hobby-samlarsaker`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `hobby-samlarsaker` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'hobby-samlarsaker') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `klader-accessoarer`
--

/*!50001 DROP TABLE IF EXISTS `klader-accessoarer`*/;
/*!50001 DROP VIEW IF EXISTS `klader-accessoarer`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `klader-accessoarer` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'klader-accessoarer') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `motor`
--

/*!50001 DROP TABLE IF EXISTS `motor`*/;
/*!50001 DROP VIEW IF EXISTS `motor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `motor` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'motor') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `musik-bocker-spel-film`
--

/*!50001 DROP TABLE IF EXISTS `musik-bocker-spel-film`*/;
/*!50001 DROP VIEW IF EXISTS `musik-bocker-spel-film`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `musik-bocker-spel-film` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'musik-bocker-spel-film') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ovrigt`
--

/*!50001 DROP TABLE IF EXISTS `ovrigt`*/;
/*!50001 DROP VIEW IF EXISTS `ovrigt`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ovrigt` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'ovrigt') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sport-fritid-biljetter`
--

/*!50001 DROP TABLE IF EXISTS `sport-fritid-biljetter`*/;
/*!50001 DROP VIEW IF EXISTS `sport-fritid-biljetter`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sport-fritid-biljetter` AS select `items`.`id` AS `id`,`items`.`headline` AS `headline`,`items`.`description` AS `description`,`items`.`date_added` AS `date_added`,`items`.`end_date` AS `end_date`,`items`.`user_id` AS `user_id`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname` from ((`items` join `categories`) join `users` on(((`categories`.`id` = `items`.`category_id`) and (`categories`.`slug` = 'sport-fritid-biljetter') and (`items`.`user_id` = `users`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-10 23:15:14
