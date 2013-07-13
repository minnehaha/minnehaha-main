-- MySQL dump 10.13  Distrib 5.5.28, for osx10.7 (i386)
--
-- Host: localhost    Database: minnehaha_view_drupal
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `url_alias`
--

DROP TABLE IF EXISTS `url_alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url_alias` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'A unique path alias identifier.',
  `source` varchar(255) NOT NULL DEFAULT '' COMMENT 'The Drupal path this alias is for; e.g. node/12.',
  `alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'The alias for this path; e.g. title-of-the-story.',
  `language` varchar(12) NOT NULL DEFAULT '' COMMENT 'The language this alias is for; if ’und’, the alias will be used for unknown languages. Each Drupal path can have an alias for each supported language.',
  PRIMARY KEY (`pid`),
  KEY `alias_language_pid` (`alias`,`language`,`pid`),
  KEY `source_language_pid` (`source`,`language`,`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COMMENT='A list of URL aliases for Drupal paths; a user may visit...';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_alias`
--

LOCK TABLES `url_alias` WRITE;
/*!40000 ALTER TABLE `url_alias` DISABLE KEYS */;
INSERT INTO `url_alias` VALUES (1,'node/1','About-Extended-Stay-Furnished-Rental-Minneapolis-MN','und'),(5,'node/5','Furnished-Apartments-Minneapolis-Contact-Us','und'),(6,'node/6','furnished-apartment-minneapolis','und'),(7,'node/7','content/apartment-rental-rates','und'),(8,'node/9','extended-stay-furnished-apartment-minneapolis','und'),(9,'node/10','furnished-apartments-minneapolis-mn','und'),(10,'node/11','furnished-home-extended-stay-minnesota','und'),(11,'node/12','executive-extended-stay-minnesota','und'),(12,'node/13','extended-stay-minnesota','und'),(13,'node/14','vrbo-minneapolis','und'),(14,'node/15','vrbo-minneapolis-mn','und'),(15,'node/16','vacation-rental-by-owner-minneapolis','und'),(16,'node/17','furnished-extended-stay-minnesota-hosts','und'),(17,'node/18','content/how-do-i-make-reservation','und'),(18,'node/19','content/there-damage-deposit','und'),(19,'node/20','content/there-cleaning-fee','und'),(20,'node/21','vacation-rental-by-owner-minneapolis-faq','und'),(21,'node/22','content/minnehaha-lofts-offers','und'),(22,'node/23','about-us-extended-stay-minnesota-furnished-apartments-minneapolis','und'),(23,'node/24','furnished-apartments-minneapolis','und'),(24,'node/25','vacation-rental-by-owner-minneapolis-mn','und'),(25,'node/26','furnished-extended-stay-minnesota','und'),(26,'node/27','guests-share-extended-stay-minnesota','und'),(27,'node/28','content/Three-Places-To-Bring-Your-Grandchildren-While-Visiting-Minnesota','und'),(28,'node/29','content/exploring-minneapolis-without-car','und'),(29,'node/30','vrbo-minneapolis-extended-stay-minnesota','und'),(30,'node/31','short-term-furnished-apartments-minneapolis-mn','und'),(31,'user/3','users/awinquist','und'),(32,'node/32','content/interface-configurations','und'),(33,'node/33','extended-stay-furnished-apartments-minneapolis','und'),(34,'node/34','extended-stay-minnesota-vacation-rental-by-owner-minneapolis','und'),(35,'user/4','users/wang911aa','und'),(36,'user/5','users/adaiya-admin25343','und'),(37,'user/6','users/sunny49sz','und'),(38,'user/7','users/iyhzo1230','und'),(39,'user/8','users/mixfyoxr5','und'),(40,'user/9','users/miwmrkgk0','und'),(41,'user/10','users/mirymfim6','und'),(42,'user/11','users/fqaw4sfw3p2e','und'),(43,'user/12','users/cjla5ecaa63e','und'),(44,'user/13','users/e2cll36bvhjh','und'),(45,'user/14','users/84nsydf7w','und'),(46,'user/15','users/bocidopbj','und'),(47,'user/16','users/v0asr65bvhjh','und'),(48,'user/17','users/hrghi3hz1ad','und'),(49,'user/18','users/ernestorthpnhbgfbejv','und'),(50,'user/19','users/efh8d2ea74dj','und'),(51,'user/20','users/yoli2yr7h5','und'),(52,'user/21','users/ez3q59avp','und'),(53,'user/22','users/bocdpopbf','und'),(54,'user/23','users/sxcud7ya','und'),(55,'user/24','users/pwty8385','und'),(56,'user/25','users/fjkksa31','und'),(57,'user/26','users/fnpcbxt53','und'),(58,'user/27','users/melissae9','und'),(59,'user/28','users/weq05fer939','und'),(60,'user/29','users/emiwh0k21u','und'),(61,'user/30','users/niyw2ot7mn0','und'),(62,'user/31','users/y5q3xcgmp','und'),(63,'user/32','users/mnjhbuyyghv','und'),(64,'user/33','users/ipvgjx575g','und'),(65,'user/34','users/haj6fky718rf','und'),(66,'user/35','users/jfdshwi9310i','und'),(67,'user/36','users/kjniuhbgytv','und'),(68,'user/37','users/pq4u3bxyp','und'),(69,'user/38','users/osaclt0o','und'),(70,'user/39','users/expgr11cx2','und'),(71,'user/40','users/w63wlm2ghfdj','und'),(72,'user/41','users/kjnhuyikmkn','und'),(73,'user/42','users/851fja642oqu','und'),(74,'user/43','users/ifef12179868','und'),(75,'user/44','users/oxle5110474m','und'),(76,'user/45','users/xfe094sf6h1','und'),(77,'user/46','users/weetlb45oc2','und'),(78,'user/47','users/upikkgd11','und'),(79,'user/48','users/klk651l7','und'),(80,'user/49','users/ewilyw3a8ia','und'),(81,'user/50','users/cb2l3mbgb','und'),(82,'user/51','users/elizabeth073','und'),(83,'user/52','users/niketn2013','und'),(84,'user/53','users/mxiec036ai','und'),(85,'user/54','users/xvwdfscz75k','und'),(86,'user/55','users/xood6o6p85','und'),(87,'user/56','users/xfezko095s','und'),(88,'user/57','users/nx7z3bhbb','und'),(89,'user/58','users/obrex4g2575','und'),(90,'user/59','users/austra130601','und'),(91,'user/60','users/mnjhbgvykjn','und'),(92,'user/61','users/1h26yd0l2','und'),(93,'user/62','users/fg4i3ywob','und'),(94,'user/63','users/shopryi256','und'),(95,'user/64','users/kh6c3xsab','und'),(96,'user/65','users/jeannkps','und'),(97,'user/66','users/kn4a3lygm','und'),(98,'user/67','users/rdqvtmfpbp','und'),(99,'user/68','users/ckoorecfm','und'),(100,'user/69','users/juznzs8236','und'),(101,'user/70','users/h5461nbka','und'),(102,'user/71','users/ru8y6cqom','und'),(103,'user/72','users/keriamxl902','und'),(104,'user/73','users/hekouvvtest','und'),(105,'user/74','users/noemiub8c','und'),(106,'user/75','users/hvtn93fy6','und'),(107,'user/76','users/hbidfvhtfd','und'),(108,'user/77','users/rgcanga2013','und'),(109,'user/78','users/hyoseh7vf9','und'),(110,'user/79','users/bocxoopbu','und'),(111,'user/80','users/cisonenkaqi5','und'),(112,'user/81','users/vyrk3k7k','und'),(113,'user/82','users/lvblcolzw','und'),(114,'user/83','users/ubuugkt28','und'),(115,'user/84','users/nordinneraway','und'),(116,'user/85','users/z09xh8h3','und'),(117,'user/86','users/edwinamaplerzdjbdrh','und'),(118,'user/87','users/ramongoldbergyduhg','und'),(119,'user/88','users/0i0i3m2u0','und'),(120,'user/89','users/zoeyrexi','und'),(121,'user/90','users/jiuoouafq','und'),(122,'user/91','users/lvlqcollw','und'),(123,'user/92','users/dpokkkodps','und'),(124,'user/93','users/dayafeterbfeore','und'),(125,'user/94','users/aillt386','und'),(126,'user/95','users/raincex9','und'),(127,'user/96','users/mxw1s9n0oxf','und'),(128,'user/97','users/uekljkyz9','und'),(129,'user/98','users/yeoadagvg','und'),(130,'user/99','users/6s6n367n','und'),(131,'user/100','users/barbaral7s','und'),(132,'user/101','users/jakeso166','und'),(133,'user/102','users/tagherf6s','und'),(134,'user/103','users/elizabethx3f','und'),(135,'user/104','users/susunday260','und'),(136,'user/105','users/susunday560','und'),(137,'user/106','users/ymhtihgmxo','und'),(138,'user/107','users/nicyeknsr','und'),(139,'user/108','users/blanomsylnews1970','und'),(140,'user/109','users/gfddju14','und'),(141,'user/110','users/christinaz3l','und'),(142,'user/111','users/christinae8f','und'),(143,'user/112','users/nendon57w61','und'),(144,'user/113','users/xiger745us','und'),(145,'user/114','users/cartism3l','und'),(146,'user/115','users/cgfdap96d63','und'),(147,'user/116','users/ujkzo67z38','und'),(148,'user/117','users/tracy55qb45','und'),(149,'user/118','users/oeogr7yd796','und'),(150,'user/119','users/2862notw95','und'),(151,'user/120','users/catherinef6z','und'),(152,'user/121','users/jamie90jg91','und'),(153,'user/122','users/christinaf2e','und'),(154,'user/123','users/8419xfds52','und'),(155,'user/124','users/z7pj6g3bq0','und'),(156,'user/125','users/chelseai1g','und'),(157,'user/126','users/7174hquq25','und'),(158,'user/127','users/francesl8j','und'),(159,'user/128','users/wjfh9lw1cb01','und'),(160,'user/129','users/elizabethr7w','und'),(161,'user/130','users/44dwfps41','und'),(162,'user/131','users/kpadaws991','und'),(163,'user/132','users/90nqauv17','und'),(164,'user/133','users/71rjbvw06','und'),(165,'user/134','users/37cvbmo38','und'),(166,'user/135','users/7445guwa','und'),(167,'user/136','users/zwdks479xu','und'),(168,'user/137','users/mark65u60x','und'),(169,'user/138','users/nslwsa44','und'),(170,'user/139','users/xcvlzvg969','und'),(171,'user/140','users/jtciixyk42','und'),(172,'user/141','users/gemjchzdiu','und'),(173,'user/142','users/15tsiwi59','und'),(174,'user/143','users/gen278jc','und'),(175,'user/144','users/lodpooiui','und'),(176,'user/145','users/gen881no','und'),(177,'user/146','users/nikrblazer','und'),(178,'user/147','users/oq22vn2072','und'),(179,'user/148','users/tpbgh2cb','und'),(180,'user/149','users/mbnuyriicc','und'),(181,'user/150','users/fbc3s4n0dfg','und'),(182,'user/151','users/ruquyumjdwo','und'),(183,'user/152','users/tva7v3r6vxm','und'),(184,'user/153','users/i334ffs8p','und'),(185,'user/154','users/hssxiqmm24','und'),(186,'user/155','users/ivyivy790','und'),(187,'user/156','users/elizabethi0e','und'),(188,'user/157','users/hrplwzoban','und'),(189,'user/158','users/ehnff1n1uyoa','und'),(190,'user/159','users/5tqd7z7onfj','und'),(191,'user/160','users/catherinel6s','und'),(192,'user/161','users/tagherj9t','und'),(193,'user/162','users/dtmhszgajc','und'),(194,'user/163','users/zkejkkgc5en','und'),(195,'user/164','users/cococose','und'),(196,'user/165','users/hgmvrlgdr43','und'),(197,'user/166','users/dnpig1282','und'),(198,'user/167','users/admin5j4w','und'),(199,'user/168','users/t5l742sgn','und'),(200,'user/169','users/d7h207xbp','und'),(201,'user/170','users/sxzy1292','und'),(202,'user/171','users/guanfdds','und'),(203,'user/172','users/ofxcy9g6','und'),(204,'user/173','users/t4672cdinkk','und'),(205,'user/174','users/easy638zufo','und'),(206,'user/175','users/hangsn581ic','und'),(207,'user/176','users/henry6s3','und'),(208,'user/177','users/d5c335rfn','und'),(209,'user/178','users/yuyicc86','und'),(210,'user/179','users/thexwk3611','und'),(211,'user/180','users/wedto07566','und'),(212,'user/181','users/melywm652lg','und'),(213,'user/182','users/itwhq961a','und'),(214,'user/183','users/hatafc9g88','und'),(215,'user/184','users/aolkioddf','und'),(216,'user/185','users/gubz01pc','und'),(217,'user/186','users/kap9qrfgg8c','und'),(218,'user/187','users/fvgp673lo1','und'),(219,'user/188','users/fekgkeo5m9','und'),(220,'user/189','users/uliveynvj2','und'),(221,'user/190','users/qkcjkjtd0q','und'),(222,'user/191','users/christinat7o','und'),(223,'user/192','users/syklbbar','und'),(224,'user/193','users/aolkioddo','und'),(225,'user/194','users/tvxxzh8772','und'),(226,'user/195','users/sghd4pdgvg','und'),(227,'user/196','users/vivianloius','und'),(228,'user/197','users/admin5g7f','und'),(229,'user/198','users/virginiaq7r','und'),(230,'user/199','users/constancex4g','und'),(231,'user/200','users/cartism6i','und'),(232,'user/201','users/constancew1u','und'),(233,'user/202','users/georgek0l','und'),(234,'user/203','users/jenniferu4r','und'),(235,'user/204','users/suntor91ehi','und'),(236,'user/205','users/jenniferg9i','und'),(237,'user/206','users/pzk4u59cj1i','und'),(238,'user/207','users/josephinet0u','und'),(239,'user/208','users/bretilief5y','und'),(240,'user/209','users/eddycraddockstoha','und'),(241,'user/210','users/pktiku6698','und'),(242,'user/211','users/hhghjfrkht','und'),(243,'user/212','users/bhjnuj038','und'),(244,'user/213','users/cococogn','und'),(245,'user/214','users/fssftasdf','und'),(246,'user/215','users/leiod6o2','und'),(247,'user/216','users/suzannehz','und'),(248,'user/217','users/francess8v','und'),(249,'node/35','content/riga-seo','und'),(250,'node/36','content/sydney-seo','und'),(251,'node/37','content/minnehaha-seo','und'),(252,'node/38','content/general-seo-text','und'),(253,'node/39','content/testimonial-seo','und'),(255,'node/41','content/contact-us-seo','und'),(256,'node/42','content/about-hosts-seo','und'),(257,'node/43','content/about-minnehahlofts-seo','und'),(258,'node/44','furnished-apartments-homes-extended-stay-minnesota','und'),(259,'node/45','content/minnehaha-address','und'),(260,'node/46','content/sydney-address','und'),(261,'node/47','content/riga-address','und'),(262,'node/48','content/vrbo-minneapolis','und'),(263,'node/49','content/furnished-apt-minneapolis','und'),(264,'node/50','content/ext-stay-minnesota','und'),(265,'node/51','content/minnehaha-lofts','und');
/*!40000 ALTER TABLE `url_alias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-13 14:15:01
