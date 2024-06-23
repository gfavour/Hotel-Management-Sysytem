-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bighms
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `addbar`
--

DROP TABLE IF EXISTS `addbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addbar` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `instock` varchar(45) DEFAULT '0',
  `itemleft` int(45) DEFAULT '0',
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT '0',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT '0',
  `oldremstock` int(45) DEFAULT '0',
  `laststockadd` int(45) DEFAULT '0',
  `datelaststockadd` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addbar`
--

LOCK TABLES `addbar` WRITE;
/*!40000 ALTER TABLE `addbar` DISABLE KEYS */;
INSERT INTO `addbar` VALUES (12,'BLACK LABEL','8','479',90,'Bottle','1',6350,'14000','','',90,82,8,'1613827706','1'),(13,'CARLO ROSSI','8','680',59,'Bottle','1',2000,'8000','','085000001882',66,60,6,'1606137094','1'),(14,'ANDRE ROSE','8','1737',187,'Bottle','1',1950,'9000','','085000007495',189,183,6,'1612181260','2'),(16,'BAILEYS (BIG)','8','105',16,'Bottle','1',4350,'10000','','5011013100156',16,10,6,'1613398591','1'),(17,'METUS ROSE','8','547',66,'Bottle','1',0,'5000','','5601012011500',66,63,3,'1613136945','1'),(18,'DROSTDY HOF (SMALL)','8','23',0,'Bottle','1',0,'2000','','6001495200146',0,0,0,NULL,'1'),(21,'CAN STAR','8','72',9,'Bottle','1',0,'1000','','5025866000129',54,0,54,NULL,'1'),(22,'CAN GULDER','8','24',9,'Bottle','1',0,'1000','','5025866000259',15,0,15,NULL,'1'),(23,'CAN MONSTER','8','628',99,'Bottle','1',0,'1000','','5060337502702',127,103,24,'1607347261','1'),(24,'MOET ROSE','8','130',24,'Bottle','1',0,'45000','','3185370377369',24,12,12,'1613828216','1'),(25,'MOET ROSE (SMALL)','8','0',0,'Bottle','1',0,'15000','','3185370489437',0,0,0,NULL,'1'),(26,'CAMPARI (BIG)','8','352',58,'Bottle','1',0,'10000','','8000040000802',58,52,6,'1613828190','1'),(27,'AMERICAN HONEY','8','128',28,'Bottle','1',0,'7000','','721059817509',29,17,12,'1612016419','2'),(28,'BEST CREAM (BIG)','8','267',30,'Bottle','1',0,'6000','','6009675692484',30,24,6,'1613398569','1'),(29,'HENESSY XO','8','22',12,'Bottle','1',80000,'150000','','3245990001218',12,9,3,'1612014976','1'),(30,'HENNESSY VSOP','8','141',18,'Bottle','1',21250,'50000','','3245990969402',18,12,6,'1613828165','1'),(31,'HENNESSY VS','8','207',39,'Bottle','1',13750,'35000','','3245990250203',39,33,6,'1613828141','1'),(32,'HENNESSY VS (SMALL)','8','77',8,'Bottle','1',7000,'18000','','3245990250302',8,2,6,'1613398617','1'),(33,'RAZON (RED WINE VIN ROUGE)','8','176',68,'Bottle','1',0,'4000','','8437008052519',68,56,12,'1613827662','1'),(34,'GOTAS DE PLATA','8','365',88,'Bottle','1',1200,'6000','','8429309001020',97,67,30,'1606299916','1'),(35,'CAN MALTINA','3','1',0,'Bottle','1',0,'500','','5025866000181',0,0,0,NULL,'1'),(36,'CAN SMIRNOFF ICE ','8','88',10,'Bottle','1',0,'1000','','5410316946131',24,0,24,'1578739085','1'),(37,'CAN AMSTEL MALTA','3','20',13,'Bottle','1',0,'500','','5025866000082',13,0,13,NULL,'1'),(46,'JACK DANIELS','8','174',20,'Bottle','1',6100,'15000','','082184090466',31,26,5,'1603711278','1'),(48,'WATER','8','6132',1235,'Bottle','1',0,'200','','',1235,1175,60,'1613827929','1'),(49,'ABSOLUTE VODKA','8','3',0,'Bottle','1',0,'8000','','7312040017034',0,0,0,NULL,'1'),(50,'SMIRNOFF ORANGE 1 LITRE','8','1',0,'Bottle','1',0,'8000','','5410316982382',1,0,1,NULL,'1'),(51,'MAGIC MOMENTS','8','254',30,'Bottle','1',1600,'5000','','8902147000511',30,25,5,'1613827728','1'),(52,'SMIRNOFF  CHOCOLATE VODKA 75CL','8','165',47,'Bottle','1',1350,'6000','','5410316948791',47,43,4,'1613827751','1'),(53,'SMIRNOFF GREEN APPLE ','8','2',0,'Bottle','2',0,'8000','','5410316984775',1,0,1,NULL,'1'),(54,'RED LABEL','8','1485',140,'Bottle','1',3500,'7000','','5000267014203',140,128,12,'1613827680','1'),(55,'CAN POWER HORSE','8','2013',307,'Bottle','1',0,'500','','9008442000320',307,259,48,'1613827140','1'),(56,'CAN CLIMAX','8','983',127,'Bottle','1',0,'500','','5025866000952',127,103,24,'1613828012','1'),(57,' PLASTIC COCA COLA','8','2418',537,'Bottle','1',0,'500','','5449000000996',548,524,24,'1613827953','2'),(58,'CAN HEINEKEN ','8','402',69,'Bottle','1',0,'1000','','5025866000099',69,45,24,'1611582993','1'),(59,'CAN STAR RADLER','8','24',2,'Bottle','1',0,'1000','','5025866001027',19,0,19,NULL,'1'),(60,'CAN ORIGIN','8','24',4,'Bottle','1',0,'1000','','5010103935630',12,0,12,NULL,'1'),(61,'VEUVE CLICQUET','8','2',0,'Bottle','1',0,'25000','','3049610004104',0,0,0,NULL,'1'),(62,'CAN 33','8','192',50,'Bottle','1',0,'1000','','5025866001195',88,40,48,'1562571078','1'),(63,'ORIS','8','391',112,'Bottle','1',0,'500','','4260093460877',112,102,10,'1613827852','1'),(64,'BENSON','8','683',183,'Bottle','1',0,'500','','6156000056388',183,173,10,'1613827829','1'),(65,'DORCHESTER','8','260',51,'Bottle','1',0,'500','','5010175801574',51,41,10,'1613827804','1'),(66,'ROTHMANS','8','30',1,'Bottle','1',0,'500','','6156000056364',3,0,3,NULL,'1'),(67,'CAN GUINESS','8','166',41,'Bottle','1',0,'1000','','5000213010952',106,10,96,'1560155090','1'),(68,'CAN MALTA GUINNESS','8','2',1,'Bottle','1',0,'500','','5010162000164',1,0,1,NULL,'1'),(69,'Dunhill','8','622',94,'Bottle','1',0,'600','','7612400026189',94,84,10,'1613137204','1'),(70,'chamdor','3','148',25,'Bottle','1',0,'3000','','6001495080106',25,19,6,'1612613107','1'),(71,'SHISHA','8','595',192,'Bottle','2',0,'2000','','',192,177,15,'1613136860','1'),(72,'Extra Chacoal shisha','8','1',1,'Bottle','1',0,'1000','','',1,0,1,NULL,'1'),(126,' LA MONDENSE LAMBRUSCO','8','66',0,'Bottle','1',0,'4000','','8008920850080',6,0,6,'1575884245','2'),(127,'REUNITE LAMBRUSCO','8','363',121,'Bottle','1',0,'5000','','080516135144',121,109,12,'1613828084','1'),(133,'MARTELL BLUE SWIFT','8','51',10,'Bottle','1',18350,'32000','','3219820005608',11,6,5,'1599572550','1'),(134,'DUSSE VSOP','8','6',3,'Bottle','1',0,'20000','','080480002923',4,0,4,NULL,'1'),(135,'GLENFIDDICH WHISKY 12 YEARS','8','83',13,'Bottle','1',9100,'25000','','5010327000176',13,8,5,'1613137002','1'),(136,'CIROC','8','115',41,'Bottle','1',0,'30000','','5010103912976',41,40,1,'1613730866','1'),(139,'REMY MARTINS VSOP','8','61',2,'Bottle','1',14600,'30000','',' ',11,5,6,'1600515115','1'),(141,' PET COKE SMALL','3','130',25,'Bottle','1',0,'300','','',27,0,27,NULL,'2'),(146,'GLENFFIDISH 15 YRS OLD','8','34',15,'Bottle','1',15450,'35000','','',15,11,4,'1612613085','1'),(147,'BOTTLE COKE','8','261',252,'Bottle','1',0,'200','','',252,204,48,'1560153388','1'),(150,'DROSTDY HOF (BIG)','8','32',0,'Bottle','1',0,'4000','','6001495201501',12,0,12,'1560621087','1'),(154,'CRANBERRY JUICE','8','423',77,'Bottle','1',0,'2000','','1',77,69,8,'1613828237','1'),(158,'JAMESON','8','208',68,'Bottle','1',5000,'10000','','5011007003005',68,62,6,'1613828110','1'),(163,'SMALL BLACK LABEL ','8','24',4,'Bottle','1',0,'7000','','5000267024608',7,6,1,'1602929718','1'),(168,'NECTAR ROSE','8','60',15,'Bottle','1',0,'5000','','',32,26,6,'1563474580','1'),(169,' BULLET ','3','744',174,'Bottle','1',0,'500','','',176,128,48,'1613827085','2'),(174,'CLIMAX PET','8','48',12,'Bottle','1',167,'500','','',12,0,12,'1611583142','1'),(175,'GLENFIDDCH (18YRS)','8','49',15,'Bottle','1',20000,'70000','','',15,12,3,'1611581998','1'),(176,'CELLA LAMBRUSCO','8','36',7,'Bottle','1',0,'5000','','',7,1,6,'1610806054','1'),(177,'BOTTLE AMSTEL MALT','8','48',48,'Bottle','1',0,'200','','',48,0,48,'1562571166','1'),(178,'JAMESON BLACK BARREL','8','84',28,'Bottle','1',6300,'15000','','',28,22,6,'1612016557','1'),(179,'MARTINI ROSE','8','12',0,'Bottle','1',0,'6000','','',6,0,6,'1581097052','1'),(180,'TERRAZAC MELBEC','8','3',2,'Bottle','1',7000,'15000','','',3,0,3,'1569836480','1'),(181,'CLOUDY BAY','8','9',5,'Bottle','1',10500,'20000','','',5,2,3,'1580998014','1'),(182,'VEUVE CLICQOUT RICH','8','3',1,'Bottle','1',35500,'60000','','',2,1,1,'1569848238','1'),(183,'MOET IMPERIAL BRUT','8','0',0,'Bottle','1',20850,'40000','','',0,0,0,'1569612447','1'),(184,'MOET NECTAR IMPERIAL','8','0',0,'Bottle','1',25000,'45000','','',0,0,0,'1569612476','1'),(185,'MOET IMPERIAL ROSE','8','0',0,'Bottle','1',0,'40000','','',0,0,0,'1569612498','1'),(186,'MOET NECTAR IMPERIAL ROSE','8','2',2,'Bottle','1',26700,'50000','','',2,0,2,'1569836330','1'),(187,'MOET ICE IMPERIAL','8','15',7,'Bottle','1',29200,'60000','','6',7,4,3,'1611582642','1'),(188,'VEUVE CLICQUOT BRUT','8','2',2,'Bottle','1',23350,'50000','','',2,0,2,'1569854708','1'),(189,'VEUVE CLICQUOT  ROSE','8','2',1,'Bottle','1',30500,'55000','','',2,0,2,'1569848390','1'),(190,'DOM PENIGNOM LUMINOUS','8','5',4,'Bottle','1',85000,'150000','','',4,1,3,'1577042553','1'),(191,'GLENMORANGIE EXTREMELY RARE','8','2',2,'Bottle','1',43500,'80000','','',2,0,2,'1569847616','1'),(192,'GLENMORANGIE ORIGINAL','8','9',6,'Bottle','1',14200,'25000','','',6,2,4,'1599637620','1'),(193,'GLENMORANGIE LASANTA','8','3',1,'Bottle','1',17000,'30000','','',1,0,1,'1583152310','1'),(194,'GLENMORANGIE QVINTA RUBAN','8','3',2,'Bottle','1',17000,'35000','','',2,1,1,'1583152276','1'),(195,'GLENMORANGIE  SIGNET','8','2',2,'Bottle','1',52000,'99900','','',2,0,2,'1569847239','1'),(196,'BELEVEDERE PINK GRAPE FRUIT','8','2',2,'Bottle','1',17500,'35000','','',2,0,2,'1569854745','1'),(197,'BELEVEDERE VODKA INTENSE','8','3',3,'Bottle','1',18500,'35000','','',3,2,1,'1598886932','1'),(198,'BELEVEDERE VODKA','8','2',1,'Bottle','1',0,'26000','','',2,0,2,'1569854770','1'),(199,'BELEVEDERE CITRUS','8','0',0,'Bottle','1',17500,'40000','','',0,0,0,'1569612866','1'),(200,'BELEVEDERE BLACK RASPBERRY','8','0',0,'Bottle','1',17500,'35000','','',0,0,0,'1569612884','1'),(201,'GLENFIDDICH 21YRS','8','3',3,'Bottle','1',80000,'160000','','',3,2,1,'1598886488','1'),(202,'DOM P. VINTAGE BRUT','8','0',0,'Bottle','1',85000,'150000','','',0,0,0,'1569848040','1'),(203,'GLENMORANGIE NECTAR\'DOR','8','2',0,'Bottle','1',18750,'30000','','0',2,0,2,'1570006365','1'),(204,'SANGRIA RED WINE','8','0',0,'Bottle','1',0,'4000','','',0,0,0,'1572248031','1'),(205,'WHITE WALKER','8','24',8,'Bottle','1',9760,'20000','','',15,3,12,'1574432545','1'),(206,'VEGA CEDRON WINE','8','12',0,'Bottle','1',0,'5500','','',6,0,6,'1582316303','1'),(207,'FRAGOLINO ROSE','8','24',15,'Bottle','1',0,'8000','','',17,5,12,'1601291633','1'),(208,'MARLANGO RED WINE','8','12',2,'Bottle','1',0,'5500','','',9,3,6,'1576486114','1'),(209,'CARUSSO','8','41',26,'Bottle','1',0,'8000','','',26,14,12,'1612612918','1'),(210,'BLANC CUVEE','8','66',59,'Bottle','1',0,'8000','','',59,35,24,'1611582671','1'),(211,'FOUR LOKO','8','48',22,'Bottle','1',0,'4000','','',31,19,12,'1601974150','1'),(212,'DOUBLE BLACK','8','72',72,'Bottle','1',0,'500','','',72,48,24,'1613224185','1'),(213,'SMALL CAMPARI','8','0',0,'Bottle','1',1800,'5000','','',0,0,0,'1581692411','1'),(214,'SMALL CAAMPARI','8','0',0,'Bottle','1',1800,'4500','','',0,0,0,'1581692451','1'),(215,'BAILEYS DELIGHT','8','0',0,'Bottle','1',1700,'6000','','',0,0,0,'1597996756','1'),(216,' BLACK BULLET ','8','360',249,'Bottle','1',0,'1000','','',249,201,48,'1613827112','1'),(217,'BAILEYS DELIGHT','8','6',6,'Bottle','1',0,'6000','','',6,0,6,'1599312057','1'),(218,'AKWA FRESH','3','12',11,'Bottle','1',0,'200','','',12,0,12,'1607603620','2'),(219,'CAN BUDWISER ','8','24',24,'Bottle','1',0,'500','','',24,0,24,'1611583049','1'),(220,'GRAN DESSERT','8','12',12,'Bottle','1',0,'0','','',12,0,12,'1613827907','1'),(221,'BLUE MALT','8','20',20,'Bottle','1',0,'0','','',20,0,20,'1613925983','1');
/*!40000 ALTER TABLE `addbar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addbar2`
--

DROP TABLE IF EXISTS `addbar2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addbar2` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `instock` varchar(45) DEFAULT '0',
  `itemleft` int(45) DEFAULT '0',
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT '0',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT '0',
  `oldremstock` int(45) DEFAULT '0',
  `laststockadd` int(45) DEFAULT '0',
  `datelaststockadd` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addbar2`
--

LOCK TABLES `addbar2` WRITE;
/*!40000 ALTER TABLE `addbar2` DISABLE KEYS */;
INSERT INTO `addbar2` VALUES (1,'STAR','8','554',0,'Bottle','1',179,'400','','0',12,0,12,'1581177562','1'),(2,'GULDER','8','1181',263,'Bottle','1',208,'400','','',263,251,12,'1613656424','1'),(3,'MEDIUM STOUT','8','4269',955,'Bottle','1',211,'500','','',955,937,18,'1613827299','1'),(4,'SMALL STOUT','8','3012',590,'Bottle','1',183,'400','','',590,542,48,'1613827274','1'),(5,'TIGER','8','1067',280,'Bottle','1',160,'300','','',280,220,60,'1612611538','1'),(6,'HOLLANDIA','8','791',245,'Bottle','1',450,'1000','','',245,235,10,'1613656585','1'),(7,'SATZENBRAU','8','1113',49,'Bottle','1',100,'300','','',49,31,18,'1607166090','1'),(8,'CHAMPION','8','9441',2264,'Bottle','1',170,'300','','',2264,2144,120,'1613827336','1'),(9,'BENSON','8','132',17,'Bottle','1',208,'500','','',23,3,20,'1602241269','1'),(10,'CARLO ROSSI','8','270',67,'Bottle','1',1500,'3500','','',67,64,3,'1611582204','1'),(11,'DUNHILL','8','58',0,'Bottle','1',240,'600','','',10,0,10,'1595672969','1'),(12,'MATUES ROSE','8','60',24,'Bottle','1',1285,'4000','','',24,21,3,'1612612620','1'),(13,'ANDRE ROSE ','8','215',55,'Bottle','1',1875,'6000','','',55,53,2,'1613224488','1'),(14,'RED LABEL','8','184',35,'Bottle','1',3500,'6000','','',35,33,2,'1612869456','1'),(15,'BEST CREAM','8','77',13,'Bottle','1',1500,'5000','','',13,11,2,'1612016989','1'),(16,'POWER HORSE','8','747',194,'Bottle','1',350,'800','','',194,146,48,'1613224330','1'),(17,'BIG BLACK LABEL','8','83',9,'Bottle','1',6800,'13000','','',9,7,2,'1612016908','1'),(18,'MC DOWEL ','8','29',0,'Bottle','1',1170,'3500','','',29,0,29,'1560087598','1'),(19,'PLASTIC COKE','8','7072',2132,'Bottle','1',117,'200','','',2132,2072,60,'1613827638','1'),(20,'LIFE','8','2120',723,'Bottle','1',158,'300','','',723,687,36,'1613827570','1'),(21,'HERO','8','2974',826,'Bottle','1',160,'300','','',826,790,36,'1613827358','1'),(22,'MAGIC MOMENT','8','101',42,'Bottle','1',1375,'4000','','',42,39,3,'1613826998','1'),(23,'BUDWISER ','8','5565',756,'Bottle','1',229,'500','','',756,696,60,'1613225319','1'),(24,'CLIMAX','8','504',73,'Bottle','1',200,'500','','',73,49,24,'1613136257','1'),(25,'HEINEKEN (BOTTLE)','8','10999',2860,'Bottle','1',240,'500','','',2860,2740,120,'1613827231','1'),(26,'STAR RADLER','8','8282',2047,'Bottle','1',150,'300','','',2047,1947,100,'1613827317','1'),(27,'AMSTEL MALT','8','3668',467,'Bottle','1',0,'250','','',467,443,24,'1613225722','1'),(28,'EXOTIC JUICE ','8','1165',408,'Bottle','1',0,'700','','',408,388,20,'1613827613','1'),(29,'VITA MILK','8','476',0,'Bottle','1',0,'400','','',24,0,24,'1588241941','1'),(30,'EVA WATER','8','9762',2552,'Bottle','1',63,'200','','',2552,2504,48,'1613475076','1'),(31,'DORCHESTER','8','126',4,'Bottle','1',240,'500','','',10,0,10,'1602241327','1'),(32,'ORIS','8','98',9,'Bottle','1',250,'500','','',10,0,10,'1602241301','1'),(33,'ROYAL CHALLENGE','8','27',14,'Bottle','1',0,'3500','','',14,10,4,'1605187096','1'),(34,'CHAMDOR','8','76',32,'Bottle','1',0,'3000','','',32,30,2,'1613827520','1'),(35,'FAYROUZ','8','5014',1407,'Bottle','1',94,'200','','',1407,1311,96,'1613827407','1'),(36,'SMALL RED LABEL','8','53',22,'Bottle','1',0,'2500','','',22,17,5,'1613224550','1'),(37,'SMALL BLACK LABEL','8','23',7,'Bottle','1',0,'5000','','',7,2,5,'1602764096','1'),(38,'SMALL FIVE ALIVE','8','0',0,'Bottle','1',0,'250','','',0,0,0,'1560099412','1'),(39,'AMSTEL MALT CAN','8','14',0,'Bottle','1',0,'200','','',14,0,14,'1560696728','1'),(40,'SMIRNOFF ICE CAN','8','0',0,'Bottle','1',0,'300','','',0,0,0,'1560099509','1'),(41,'MALTINA','8','3172',811,'Bottle','1',0,'250','','',811,763,48,'1613225686','1'),(42,'LAMBRUSCO REUNITE','8','311',50,'Bottle','1',0,'3500','','',50,48,2,'1612355860','1'),(43,'PEANUT BIG','8','5',0,'Bottle','1',0,'1000','','',5,0,5,'1566916130','1'),(44,'PEANUT SMALL','8','332',0,'Bottle','1',85,'250','','',68,8,60,'1583768079','1'),(45,'GRAND MALT CAN','8','0',0,'Bottle','1',0,'500','','',0,0,0,'1563534515','1'),(46,'CHIVITA JUICE','8','1016',403,'Bottle','1',300,'700','','',403,383,20,'1613827378','1'),(47,'SNAPP','8','245',0,'Bottle','1',0,'300','','',54,31,23,'1566574985','1'),(48,'DUBIC MALT ','8','3000',1440,'Bottle','1',100,'200','','',1440,1368,72,'1613827254','1'),(49,'SMALL SMIRNOFF ICE ','8','5470',678,'Bottle','1',0,'400','','',678,606,72,'1606909303','1'),(50,'HENNESSY VS','8','29',9,'Bottle','1',14800,'23000','','',9,4,5,'1610807539','1'),(51,'ORIGIN MEDIUM','8','20',0,'Bottle','1',0,'300','','',20,0,20,'1560696137','1'),(52,'CHAMPION MALT ','8','917',66,'Bottle','1',0,'200','','',66,42,24,'1605523310','1'),(53,'BAILEYS ','8','22',2,'Bottle','1',4350,'8000','','',2,1,1,'1606907052','1'),(54,'HENNESSY VS 35CL','8','27',6,'Bottle','1',7000,'14000','','',8,3,5,'1600699318','1'),(55,'CAMPARI ','8','81',28,'Bottle','1',0,'9000','','',28,26,2,'1613827553','1'),(57,'CLIMAX ','8','24',0,'Bottle','1',200,'500','','',24,0,24,'1564590841','1'),(58,'GRAND MALT','8','904',24,'Bottle','1',75,'200','','',24,0,24,'1611235753','1'),(59,'TROPHY','8','818',226,'Bottle','1',155,'300','','',226,214,12,'1611235682','1'),(60,'EAGLE STOUT','8','500',183,'Bottle','1',175,'300','','',183,171,12,'1611235727','1'),(61,'MONSTER ','8','642',126,'Bottle','1',321,'700','','',126,102,24,'1606738493','1'),(62,'CLIMAX PET','8','76',72,'Bottle','1',167,'500','','',72,48,24,'1613827443','1'),(63,'33 EXPORT','8','21644',4448,'Bottle','1',158,'300','','',4448,4328,120,'1613827193','1'),(64,'BIG LEGEND','8','1844',490,'Bottle','1',225,'500','','',490,466,24,'1613657836','1'),(65,'AFRICAN SPECIAL LEGEND','8','447',0,'Bottle','1',200,'400','','',33,0,33,'1568998513','1'),(66,'BIG ORIGIN','8','2018',353,'Bottle','1',210,'400','','',353,341,12,'1613731132','1'),(67,'GUINESS MALT','8','137',0,'Bottle','1',110,'200','','',13,18,0,'1563629782','1'),(68,'ORIGIN BITTERS PLASTIC','8','516',2,'Bottle','1',216,'500','','',25,13,12,'1597152769','1'),(69,'1960','8','144',0,'Bottle','1',270,'700','','',13,1,12,'1581347896','1'),(70,'RAZON WINE','8','6',0,'Bottle','1',0,'3000','','',1,0,1,'1576755604','1'),(71,'DOUBLE BLACK','8','311',72,'Bottle','1',175,'500','','',72,48,24,'1613827595','1'),(72,'FOUR LOKO','8','24',0,'Bottle','1',1670,'3000','','',12,0,12,'1579884448','1'),(73,'LA MONDENSE LAMBRUSCO','8','6',0,'Bottle','1',0,'3500','','',5,2,3,'1576674770','1'),(74,'VEGA CENTRON RED WINE','8','11',0,'Bottle','1',0,'4500','','',2,0,2,'1583740367','1'),(75,'MARLANGO RED WINE','8','6',0,'Bottle','1',0,'4500','','',6,3,3,'1577033852','1'),(76,'FEARLESS ENERGY DRINK','8','264',58,'Bottle','1',191,'500','','',58,34,24,'1611062873','1'),(77,'SMALL LEGEND','8','120',0,'Bottle','1',125,'300','','',27,3,24,'1582561379','1'),(78,'SMIRNOFF VODKA','8','50',29,'Bottle','1',1350,'4000','','',29,26,3,'1613827024','1'),(79,'CRUNCHES GROUNDNUT SMALL','8','12',0,'Bottle','1',200,'400','','',12,0,12,'1579190303','1'),(80,'CRUNCHES GROUNDNUT MEDIUM','8','3',0,'Bottle','1',300,'600','','',3,0,3,'1579190336','1'),(81,'CRUNCHES GROUNDNUT BIG','8','2',0,'Bottle','1',650,'1000','','',2,0,2,'1579190364','1'),(82,'FRIUTA JUICE','8','30',0,'Bottle','1',290,'700','','',11,1,10,'1582557534','1'),(83,'PLASTIC FAYROUZ','8','72',0,'Bottle','1',0,'200','','',55,31,24,'1582186601','1'),(84,'CAN ORIGIN','8','48',0,'Bottle','1',167,'400','','',25,1,24,'1583741720','1'),(85,'SMALL ROYAL CHALLENGE','8','110',36,'Bottle','1',480,'1000','','',36,31,5,'1607347963','1'),(86,'HAPPY HOUR JUICE','8','30',20,'Bottle','1',230,'700','','',20,0,20,'1613223851','1'),(87,'1960 BEER','8','12',0,'Bottle','1',225,'500','','',12,0,12,'1581580311','1'),(88,'EXTRA SMOOTH STOUT','8','1067',587,'Bottle','1',205,'500','','',587,551,36,'1613225500','1'),(89,'SMALL CAMPARI','8','87',40,'Bottle','1',1062,'3000','','',40,36,4,'1611581773','1'),(90,'BOTTLE ORIGIN BITTERS','8','3',0,'Bottle','1',917,'3000','','',3,0,3,'1590240044','1'),(91,'SHISHA','8','75',49,'Bottle','1',0,'2000','','',49,39,10,'1613475011','1'),(92,'JAMESON BLACK BARREL','8','15',9,'Bottle','1',7000,'15000','','',9,5,4,'1604066190','1'),(93,'JAMESON','8','36',21,'Bottle','1',4800,'9000','','',21,19,2,'1613730696','1'),(94,'BLANC CUVEE','8','7',5,'Bottle','1',0,'8000','','',5,3,2,'1612182977','1'),(95,'CRANBERRY JUICE','8','16',8,'Bottle','1',0,'1500','','',8,0,8,'1604143729','1'),(96,'CAN STAR RADLER','8','48',0,'Bottle','1',0,'300','','',48,0,48,'1591180883','1'),(97,'BLUE BULLET','8','530',335,'Bottle','1',250,'500','','',335,311,24,'1613827469','1'),(98,' BLACK BULLET ','8','408',233,'Bottle','1',350,'700','','',233,209,24,'1613224617','1'),(99,'LA SIEN BOTTLE WATER 75CL','3','476',193,'Bottle','1',55,'200','','',193,133,60,'1613827497','1'),(100,'TROPHY STOUT','8','444',281,'Bottle','1',208,'500','','',281,269,12,'1613225836','1'),(101,'SHISHA FLAVOR','8','4',4,'Bottle','1',0,'0','','',4,2,2,'1596532620','1'),(102,'JACK DANIELS','8','1',1,'Bottle','1',0,'0','','',1,0,1,'1604066350','1'),(103,'AKWA FRESH','3','108',108,'Bottle','1',0,'0','','',108,96,12,'1607603798','1'),(104,'BIG SMIRNOFF ICE','8','528',528,'Bottle','1',0,'0','','',528,468,60,'1613827174','1');
/*!40000 ALTER TABLE `addbar2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addcab`
--

DROP TABLE IF EXISTS `addcab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addcab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carno` varchar(20) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `email` varchar(50) NOT NULL,
  `phone` varchar(32) DEFAULT '',
  `address` varchar(100) DEFAULT '',
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addcab`
--

LOCK TABLES `addcab` WRITE;
/*!40000 ALTER TABLE `addcab` DISABLE KEYS */;
/*!40000 ALTER TABLE `addcab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addclient`
--

DROP TABLE IF EXISTS `addclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `email` varchar(50) NOT NULL,
  `password` varchar(45) DEFAULT 'password',
  `phone` varchar(32) DEFAULT '',
  `city` varchar(45) DEFAULT '',
  `state` varchar(45) DEFAULT '',
  `country` varchar(45) DEFAULT '',
  `isin` varchar(10) DEFAULT '0',
  `company` varchar(50) DEFAULT '',
  `amount` int(50) DEFAULT '0',
  `lastdeposit` int(50) DEFAULT '0',
  `lastddate` date DEFAULT NULL,
  `lastwithdraw` int(50) DEFAULT '0',
  `lastwdate` date DEFAULT NULL,
  `pic` varchar(65) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addclient`
--

LOCK TABLES `addclient` WRITE;
/*!40000 ALTER TABLE `addclient` DISABLE KEYS */;
INSERT INTO `addclient` VALUES (1,'Mr','Anonymous','Guest','info@guest.com','password','07070000000','Ikeja','Lagos','Nigeria','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(2,'Mrs','Aliyu','Tope','aliyu@gmail.com','password','08077766565','Igando','Lagos','Nigeria','0','1',36200,40000,'2021-05-22',900,'2021-04-01','','2'),(3,'Mr','Ganiu','Alexandra','alexy@yahoo.com','password','09070088452','Idimu','Lagos','Nigeria','0','1',6450,450,'2021-04-01',NULL,NULL,'','1'),(4,'Mr','Seun','Akin','seun@gmail.com','password','08033344333','','','Nigeria','0','2',4850,20000,'2021-05-22',50,'2021-04-01','','2'),(5,'Mr','Segun','Aje','segun.aje@gmail.com','password','08099988787','Ikotun','Lagos','Nigeria','0','',10000,28000,'2021-05-23',0,NULL,'','2'),(6,'Mr','Tunde','Oyejesu','jesus@gmail.com','password','08077788788','Ikotun Egbe','Lagos','Nigeria','0','2',29955000,30000000,'2021-04-23',0,NULL,'','2');
/*!40000 ALTER TABLE `addclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addlaundary`
--

DROP TABLE IF EXISTS `addlaundary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addlaundary` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `description` varchar(100) DEFAULT '',
  `price` varchar(80) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addlaundary`
--

LOCK TABLES `addlaundary` WRITE;
/*!40000 ALTER TABLE `addlaundary` DISABLE KEYS */;
INSERT INTO `addlaundary` VALUES (1,'shirt and jean','','','1500','1'),(2,'Complete Agbada washing ','','','3000','1');
/*!40000 ALTER TABLE `addlaundary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addresturant`
--

DROP TABLE IF EXISTS `addresturant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresturant` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `categoryid` varchar(65) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Plate',
  `quantity` varchar(45) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `ingredients` text,
  `issync` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresturant`
--

LOCK TABLES `addresturant` WRITE;
/*!40000 ALTER TABLE `addresturant` DISABLE KEYS */;
INSERT INTO `addresturant` VALUES (2,'SEA FOOD PIZZA REGULAR','10','Plate','1','4000','','',NULL),(4,'SEA FOOD PIZZA FAMILY','10','Plate','1','5000','','',NULL),(5,'PEPPERONI PIZZA REGULAR','10','Plate','1','3200','','',NULL),(6,'PEPPERONI PIZZA FAMILY','10','Plate','1','4500','',NULL,NULL),(9,'MEMOSA BOLOGNES PIZZA Regular','10','Plate','1','4000','','',NULL),(10,'MEMOSA BOLOGNES PIZZA LARGE','10','Plate','1','5000','','',NULL),(13,'VEGETARIAN PIZZA Regular','10','Plate','1','3000','','',NULL),(14,'VEGETARIAN PIZZA LARGE','10','Plate','1','3500','',NULL,NULL),(17,'MEAT FACE PIZZA MEDIUM','10','Plate','1','3500','','',NULL),(18,'MEAT FACE PIZZA LARGE','10','Plate','1','5000','','',NULL),(19,'BOVEERI PAVILION SPECIAL PIZZA ','10','Plate','1','5000','','',NULL),(20,'BOVEERI PAVILION SPECIAL PIZZA LARGE','10','Plate','1','5000','',NULL,NULL),(25,'TUNA SANDWICHES ','11','Plate','1','2500','','',NULL),(26,'CHICKEN SANDWICHES','11','Plate','1','2500','',NULL,NULL),(27,'STEAK SANDWICHES','10','Plate','1','2000','',NULL,NULL),(28,'CHICKEN / HOTDOG SHARWAMA (MINI)','11','Unit','1','1000','','',NULL),(29,'BEEF w HOTDOG SHARWARMA','11','Plate','1','1000','',NULL,NULL),(30,'CHICKEN/BEEF w HOTDOG SHAWARMA','11','Plate','1','1500','',NULL,NULL),(31,'CLUB SANDWICHES ','11','Plate','1','3000','',NULL,NULL),(32,'BEEF BURGERS (BIG) WITH CHIPS','11','Unit','1','2500','','',NULL),(33,'CHEESE BURGER','11','Plate','1','2500','',NULL,NULL),(34,'CEASAR SALAD','13','Plate','1','2500','',NULL,NULL),(36,'VEGETABLE SALAD','13','Plate','1','1500','',NULL,NULL),(37,'CHICKEN SALAD','13','Plate','1','2000','',NULL,NULL),(39,'COLESLAW SALAD ','13','Plate','1','1000','',NULL,NULL),(40,'MEDITERRENIAN SALAD','13','Plate','1','2000','',NULL,NULL),(42,'PEPPERED SNAILS ','14','Plate','1','2500','',NULL,NULL),(43,'PEPPERED FRIED CHICKEN WINGS','14','Plate','1','2000','',NULL,NULL),(44,'PEPPERED GIZZARD','14','Plate','1','1500','',NULL,NULL),(45,'PEPPERED PRAWN ','14','Plate','3','3000','',NULL,NULL),(46,'STIR FRY NOODLES w  SHREDDED CHICKEN','15','Plate','1','2500','',NULL,NULL),(47,'STIR FRY NOODLES w  MIXED VEGETABLE','15','Plate','1','2500','',NULL,NULL),(48,'STIR FRY NOODLES w  SHRIMPS','15','Plate','1','2500','',NULL,NULL),(49,'CRIPSY NODDLES w MIXED VEGETABLES','15','Plate','1','2500','',NULL,NULL),(53,'WHITE RICE (THAI JASMINE RICE)','16','Plate','1','700','',NULL,NULL),(54,'CHINESE FRIED RICE WITH SHRIMPS','16','Plate','1','3000','',NULL,NULL),(55,'CHINESE FRIED RICE WITH BEEF ','16','Plate','1','2500','',NULL,NULL),(56,'CHINESE FRIED RICE WITH SHREDDED CHICKEN','16','Plate','1','2500','',NULL,NULL),(60,'PRAWN IN w VEGETABLES','17','Plate','1','4500','',NULL,NULL),(62,'GRILL LAMB CHOP','18','Plate','1','3000','',NULL,NULL),(66,'CHICKEN SPRING ROLL','19','Plate','4','2000','',NULL,NULL),(67,'VEGETABLE SPRING ROLL','19','Plate','4','2000','',NULL,NULL),(70,'STIR FRY BITTER GOURD/ BEEF','20','Plate','1','2000','',NULL,NULL),(71,'DEEP FRIED CRISPY CHICKEN','21','Plate','1','2000','',NULL,NULL),(72,'FRIED CHICKEN w CASHEW NUT','21','Plate','1','2000','',NULL,NULL),(73,'PRAWN w MIXED VEGETABLES','22','Plate','1','4500','',NULL,NULL),(74,'CRAB w OYSTER SAUCE','22','Plate','1','3500','',NULL,NULL),(75,'SHRIMPS w CASHEW NUTS','22','Plate','1','3500','',NULL,NULL),(76,'FISH FILLET w SWEET AND SOUR SAUCE','23','Plate','1','2500','',NULL,NULL),(77,'FISH FILLET w BEAN CURD IN HOT POT','23','Plate','1','2500','',NULL,NULL),(78,'SWEET AND SOUP PORK ','24','Plate','1','2500','',NULL,NULL),(79,'CRISPY PORK SHANGHAI STYLE','24','Plate','1','2500','',NULL,NULL),(80,'BRAISED MIXED VEGETABLE / CHOPSUEY','25','Plate','1','1500','',NULL,NULL),(81,'SAUTEED STRING BEANS w SHRIMPS','25','Plate','1','1500','',NULL,NULL),(82,'SHREDDED CHICKEN IN VEGETABLE SAUCE ','26','Plate','1','3500','',NULL,NULL),(83,'SHREDDED CHICKEN IN GREEN PEPPER SAUCE','26','Plate','1','3500','',NULL,NULL),(84,'GRILLED CHICKEN SERVED w TOMATO SAUCES','25','Plate','1','4000','',NULL,NULL),(85,'GRILLED STEAK SERVED w BLACK PEPPER SAUCES','26','Plate','1','4000','',NULL,NULL),(86,'GRILLED PRAWN ','26','Plate','1','8000','',NULL,NULL),(87,'GRILL CHICKEN ','26','Plate','1','8000','',NULL,NULL),(88,'GRILLED STEAK ','26','Plate','1','8000','',NULL,NULL),(89,'GRILLED FISH SERVED w VEGETABLE RICE ','26','Plate','1','4000','',NULL,NULL),(90,'GRILLED PRAWN IN TOMATO SAUCE','26','Plate','1','4000','',NULL,NULL),(91,'GRILLED FISH BONELESS CHICKEN SERVED w LEMON SAUCE','26','Plate','1','4000','',NULL,NULL),(92,'GRILLED BONELESS CHICKEN SERVED w BLACK PEPPER SAU','26','Plate','1','4000','',NULL,NULL),(93,'MIXED FRUITS','27','Plate','1','1500','',NULL,NULL),(94,'ICE CREAM','27','Cup','1','2000','',NULL,NULL),(95,'SHRIMPS COCKTAIL','22','Plate','1','2000','',NULL,NULL),(96,'MUSHROOM SOUP ','19','Plate','1','1500','',NULL,NULL),(97,'CHICKEN SOUP','19','Plate','1','2000','',NULL,NULL),(98,'SEA FOOD PEPPER SOUP','19','Plate','1','2500','',NULL,NULL),(99,'CHICKEN AND CHIPS','5','Plate','1','2000','',NULL,NULL),(100,'HOT SPICY SHRIMPS ','17','Plate','1','3500','',NULL,NULL),(101,'GAUNTUNUS SHRIMPS','17','Plate','1','3500','',NULL,NULL),(102,'FISH AND CHIPS','19','Plate','1','2500','',NULL,NULL),(103,'CHICKEN WINGS AND CHIPS','19','Plate','1','2000','',NULL,NULL),(104,'WHITE RICE ','16','Plate','1','500','',NULL,NULL),(105,'COCONUT RICE/GOAT MEAT/CHICKEN','16','Plate','1','3000','','',NULL),(106,'JOLLOF RICE WITH CHICKEN/GOAT MEAT','16','Plate','1','3000','','',NULL),(107,'FRIED RICE','16','Plate','1','1000','',NULL,NULL),(108,'CHINESE FRIED RICE','16','Plate','1','1000','',NULL,NULL),(109,'SAVIER RICE','16','Plate','1','1000','',NULL,NULL),(110,'SPAGHETTI SEA FOOD','30','Plate','1','3500','',NULL,NULL),(111,'SPAGHETTI BOLOGNOISE','30','Plate','1','2500','',NULL,NULL),(124,'GOAT MEAT PEPPER SOUP','32','Plate','1','1500','',NULL,NULL),(125,'FRESH FISH PEPPER SOUP','32','Plate','1','2000','',NULL,NULL),(126,'DRY FISH PEPPER SOUP','32','Plate','1','3500','','',NULL),(127,'FRIED GOAT MEAT SAUCE','33','Plate','1','1000','',NULL,NULL),(128,'FRIED CHICKEN PEPPER SAUCE','33','Plate','1','2500','',NULL,NULL),(131,'STOCKFISH SAUCE or VEGETABLE SAUCE','33','Plate','1','2000','',NULL,NULL),(132,'ISI EWU w PLANTAIN','33','Plate','1','3000','',NULL,NULL),(133,'ISI EWU (GOAT HEAD)','33','Plate','1','3000','','',NULL),(140,'COFFE TEA (NIGERIAN)','31','Plate','1','2000','',NULL,NULL),(141,'FRIED / BOILED PLANTAIN','31','Plate','1','500','',NULL,NULL),(142,'FRUIT SALAD','34','Plate','1','1500','',NULL,NULL),(143,'FRUIT PLATTER','34','Plate','1','1500','',NULL,NULL),(144,'VEGETABLE SALAD ','5','Plate','1','2000','',NULL,NULL),(145,'MEDITERRENIAN SALAD ','5','Plate','1','2000','',NULL,NULL),(146,'CHICKEN SALAD ','5','Plate','1','2000','',NULL,NULL),(147,'CEASAR SALAD ','5','Plate','1','2000','',NULL,NULL),(149,'RUSSIAN SALAD','5','Plate','1','2000','',NULL,NULL),(150,'SARDINE SALAD ','5','Plate','1','2000','',NULL,NULL),(151,'TUNA SALAD','5','Plate','1','2000','',NULL,NULL),(152,'TUNA SANDWICHES with CHIPS','11','Plate','1','2500','','',NULL),(153,'TRADITIONAL CLUB SANDWICHES','11','Plate','1','2500','',NULL,NULL),(155,'STEAK SANDWICHES ','11','Plate','1','2000','',NULL,NULL),(159,'VEGETABLE','31','Plate','1','700','',NULL,NULL),(160,'AFANG SOUP','31','Plate','1','700','',NULL,NULL),(161,'EGUSI SOUP &FISH','31','Plate','1','2500','',NULL,NULL),(162,'OGBONO SOUP/GOAT/CHICKEN/BEEF','31','Plate','1','2000','',NULL,NULL),(163,'OKRO','31','Plate','1','700','',NULL,NULL),(164,'EWEDU & GBEGIRI','31','Plate','1','700','',NULL,NULL),(165,'BANGA','31','Plate','1','700','',NULL,NULL),(166,'BITTERLEAF SOUP/GOAT/CHICKEN/BEEF','31','Plate','1','2000','',NULL,NULL),(167,'OHA','31','Plate','1','700','',NULL,NULL),(168,'NATIVE RICE WITH FISH','31','Plate','1','3000','',NULL,NULL),(169,'FISHERMAN Cat Fish','31','Plate','1','3000','','',NULL),(170,'GARRI','31','Plate','1','300','',NULL,NULL),(171,'STARCH','31','Plate','1','300','',NULL,NULL),(172,'AMALA','31','Plate','1','300','',NULL,NULL),(173,'SEMOVITA','31','Plate','1','300','',NULL,NULL),(174,'WHEAT','31','Plate','1','500','',NULL,NULL),(175,'PLANTAIN FLOUR','31','Plate','1','500','',NULL,NULL),(176,'POUNDED YAM','31','Plate','1','500','',NULL,NULL),(177,'ASSORTED','31','Plate','1','800','',NULL,NULL),(178,'GOAT MEAT','31','Plate','1','800','',NULL,NULL),(179,'COW HEAD','31','Plate','1','1000','',NULL,NULL),(180,'COW TAIL','31','Plate','1','1000','',NULL,NULL),(181,'COW LEG','31','Plate','1','1000','',NULL,NULL),(182,'BEEF','31','Plate','1','700','',NULL,NULL),(183,'CHICKEN','31','Plate','1','1000','',NULL,NULL),(184,'SNAIL','31','Plate','1','1500','',NULL,NULL),(185,'CATFISH (fresh)','31','Plate','1','800','',NULL,NULL),(186,'TILAPIA (whole)','31','Plate','1','1500','',NULL,NULL),(187,'RED SNAPPER','31','Plate','1','1500','',NULL,NULL),(188,'BARRACUDA','31','Plate','1','1500','',NULL,NULL),(189,'SHINE NOSE ','31','Plate','1','1500','',NULL,NULL),(190,'CROAKER','31','Plate','1','1500','',NULL,NULL),(191,'DRIED CATFISH','31','Plate','1','1300','',NULL,NULL),(193,'STOCK FISH','31','Plate','1','1300','',NULL,NULL),(194,'BREAKFAST','28','Plate','1','1500','',NULL,NULL),(195,'FULL ENGLISH BREAKFAST','28','Plate','1','2500','',NULL,NULL),(196,'PEPPER GOATMEAT SAUCE','14','Plate','1','1000','',NULL,NULL),(197,'CHIPS','11','Plate','1','500','',NULL,NULL),(198,'CHIPS','11','Plate','1','500','',NULL,NULL),(199,'take way','35','','1','100','',NULL,NULL),(200,'FRIED RICE WITH CHICKEN/GOAT MEAT','5','Plate','1','3000','RICE AND CHICKEN','',NULL),(201,'EGG OMLETE','5','Unit','1','500','',NULL,NULL),(202,'FRIED/BOILED YAM','6','Plate','1','500','',NULL,NULL),(203,'VEGETARIAN SAUCE','5','','1','500','',NULL,NULL),(204,' FISHERMAN SPECIAL POT FOR 2','6','Bowl','1','6000','',NULL,NULL),(205,'CHICKEN PEPPER SOUP','32','Plate','1','1500','',NULL,NULL),(206,'FISH PEPPER SOUP','6','Plate','1','1000','',NULL,NULL),(207,'INDOMINE AND EGG','7','Plate','1','1000','',NULL,NULL),(208,'INDOMINE AND CHICKEN','7','Plate','1','1500','',NULL,NULL),(209,'FISHERMAN SPECIAL POT EXTRA','6','','1','4500','',NULL,NULL),(210,'FRIED PLANTIAN','7','','1','500','',NULL,NULL),(211,'BARBIQUIE CROCKA FISH AND CHIPS (MEDIUM)','7','Unit','1','2500','',NULL,NULL),(212,'BARBIQUIE CROCKA FISH AND CHIPS (SMALL)','5','','1','2000','',NULL,NULL),(213,'WHITE SOUP/GARRI/PANDO','7','Plate','1','2500','',NULL,NULL),(214,'FISH PEPPER SOUP WITH WHITE RICE','7','Plate','1','2500','','2,3,4',NULL),(215,'BARBIQUIE CROCKA FISH AND CHIPS (LARGE)','7','Bowl','1','3000','',NULL,NULL),(216,'BARBIQUIE CROCKA FISH AND CHIPS (XLARGE)','7','Unit','1','3500','',NULL,NULL),(217,'GBAGA SOUP/GOAT MEAT','6','Plate','1','2000','',NULL,NULL),(218,'AFHAN SOUP/GOAT MEAT','6','','1','2000','',NULL,NULL),(219,'OKORO SOUP/GOAT/BEEF/CHICKEN','6','Plate','1','2000','',NULL,NULL),(220,'VEGETABLE SOUP/GOAT MEAT','6','','1','2000','',NULL,NULL),(221,'CHICKEN PEPPER SAUCE','7','Plate','1','1500','',NULL,NULL),(222,'EXTRE FISHERMAN SOUP','6','','1','500','',NULL,NULL),(223,'TEA/COFFEE,BREAD AND EGG','7','','1','1200','',NULL,NULL),(224,'EGUSI SOUP/GOAT/CHICKEN/BEEF','6','Plate','1','2000','',NULL,NULL),(226,'BARBIQUIE CROCKA FISH AND  CHIPS(XX LARGE)','31','Plate','1','4000','',NULL,NULL),(227,'AFHAN SOUP/FISH','6','Plate','1','2500','',NULL,NULL),(228,'GBAGA SOUP& FISH','6','','1','2500','',NULL,NULL),(229,'VEGETABLE SOUP/FISH','6','Plate','1','2500','',NULL,NULL),(230,'OKORO SOUP/FISH','6','','1','2500','',NULL,NULL),(232,'Shrimps','7','Unit','1','500','',NULL,NULL),(233,'BARBIQUIE CROCKA FISH AND  CHIPS(XXX LARGE)','7','Unit','1','4500','',NULL,NULL),(234,'BARBIQUIE CROCKA FISH AND  CHIPS(XV LARGE)','7','Unit','1','5000','',NULL,NULL),(235,'RICE/CHICKEN PEPPER SOUP','6','Plate','1','2000','',NULL,NULL),(236,'BARBIQUIE CROCKA FISH AND CHIPS (SMALL)','6','Unit','1','1000','',NULL,NULL),(237,'FISHERMAN SOUP Red Snapper','7','Plate','1','3000','',NULL,NULL),(238,'VEGETABLE SOUP/CHICKEN/GOAT/BEEF','5','Plate','1','2000','',NULL,NULL),(239,'AFANG/GOAT/CHICKEN','5','Plate','1','2500','','',NULL),(240,'QUAKER OATH/EGG','5','Plate','1','1500','',NULL,NULL),(241,'WHITE SOUP/SEMO','5','Plate','1','3000','',NULL,NULL),(242,'WHITE RICE/PLAINTAIN/GOAT MEAT','7','Plate','1','2500','',NULL,NULL),(243,'PAN CAKE','6','Plate','1','1000','',NULL,NULL),(244,'GIZZARD','29','Plate','1','1500','',NULL,NULL),(245,'ROOM SERVICE','6','Plate','1','300','',NULL,NULL),(246,'BEEF BURGER MINI','5','Unit','1','500','','',NULL),(247,'CHICKEN BURGER MINI','29','Unit','1','600','',NULL,NULL),(248,'CHICKEN BURGER BIG','29','Unit','1','2500','',NULL,NULL),(249,'BEEF SHARWARMA MINI','29','Unit','1','1000','',NULL,NULL),(250,'BEEF SHAWARMA BIG','29','Unit','1','1500','',NULL,NULL),(251,'COCONUT RICE /FISH','7','Plate','1','3500','','',NULL),(252,'JELLOF RICE/GOAT/CHICKEN','5','Plate','1','2500','',NULL,NULL),(253,'JELLOF RICE/FISH','5','Plate','1','3000','',NULL,NULL),(254,'AVOCADO SALAD','5','Plate','1','2500','',NULL,NULL),(255,'MINESTRONE SOUP','5','Plate','1','1500','',NULL,NULL),(256,'CREAM OF CHICKEN SOUP','7','Plate','1','1500','',NULL,NULL),(257,'AFANG SOUP/FISH','5','Plate','1','2500','','',NULL),(258,'OGBONO SOUP/FISH','7','Plate','1','2500','',NULL,NULL),(259,'BITTERLEAF SOUP/FISH','5','Plate','1','2500','','',NULL),(260,'BANGA SOUP/GOAT/CHICKEN/BEEF','5','Plate','1','2000','',NULL,NULL),(261,'BANGA SOUP/FISH','7','Plate','1','2500','',NULL,NULL),(262,'EXTRA SWALLOW','6','Unit','1','500','',NULL,NULL),(263,'GOAT MEAT BARBEQUE','6','Plate','1','2000','',NULL,NULL),(264,'LAMB CHOP BARBEQUE','6','Plate','1','2000','',NULL,NULL),(265,'CHICKEN BARBEQUE','6','Plate','1','2000','',NULL,NULL),(266,'FULL ROASTED CHICKEN /CHIP/SALAD LARGE','6','Plate','1','10000','',NULL,NULL),(267,'FULL ROASTED CHICKEN /CHIP/SALAD LARGE','6','Plate','1','8000','',NULL,NULL),(268,'ASU','6','Plate','1','1500','',NULL,NULL),(269,'ISHI-EWU','6','Plate','1','2500','',NULL,NULL),(270,'PEPPERED SNAIL','6','Plate','1','2000','',NULL,NULL),(271,'PEPPERED GIZZARD','6','Plate','1','1500','',NULL,NULL),(272,'CHICKEN SAUSAGE REGULAR','6','Plate','1','3000','',NULL,NULL),(273,'CHICKEN SAUSAGE FAMILY','7','Plate','1','4500','',NULL,NULL),(274,'BOVEERI SPECIAL REGULAR','5','Plate','1','4000','',NULL,NULL),(275,'BOVEERI SPECIAL FAMILY','6','Plate','1','5000','',NULL,NULL),(276,'MEMOSA BOLOGNES REGULAR','5','Plate','1','3000','',NULL,NULL),(277,'MEMOSA BOLOGNES FAMILY','5','Plate','1','4500','',NULL,NULL),(278,'MEAT FACE REGULAR','7','Plate','1','3000','',NULL,NULL),(279,'MEAT FACE FAMILY','6','Plate','1','4500','',NULL,NULL),(280,'EXTRA TOPPINGS SWEET CORN/OLIVE/AVOCADO/SHRIMPS/TU','6','Plate','1','700','','',NULL),(281,'ICE CREAM','5','Cup','1','500','',NULL,NULL),(282,'CAKE','5','Unit','1','500','',NULL,NULL),(283,'PLANTAIN PORRAGE WITH FISH','6','Plate','1','3000','',NULL,NULL),(284,'PLANTAIN PORRAGE WITH GOAT MEAT/CHICKEN','6','Plate','1','2500','',NULL,NULL),(285,'YAM PORRAGE WITH FRESH FISH','6','Plate','1','3000','',NULL,NULL),(286,'YAM PORRAGE WITH GOAT MEAT/CHICKEN ','6','Plate','1','2500','',NULL,NULL),(287,'Dry Fish n Sauce','6','','1','2000','',NULL,NULL),(288,'Fried Plantain','6','Plate','1','500','',NULL,NULL),(289,'Boiled Potato','6','Plate','1','500','',NULL,NULL),(290,'FRESH FISH PEPPER SAUCE','6','Plate','1','2000','',NULL,NULL),(291,'BOIL YAM AND EGG SAUCE','6','Plate','1','1500','',NULL,NULL),(292,'BOIL PLANTAIN AND EGG SAUCE','6','Plate','1','1500','',NULL,NULL),(293,'FRIE PLANTAIN AND EGG SAUCE','6','Plate','1','1500','',NULL,NULL),(294,'CHICKEN PEPPER SAUCE ','6','Plate','1','1000','',NULL,NULL),(295,'WHITE RICE PEPPER SAUCE WITH GOAT MEAT/CHICKEN','6','Plate','1','2000','',NULL,NULL),(296,'WHITE RICE AND SNAIL PEPPER SAUCE','31','Plate','1','2500','',NULL,NULL),(297,'SNAIL PEPPER SAUCE','31','Plate','1','1500','',NULL,NULL),(298,'SOUP&PROTEIN ONLY(FOR STAFF)','6','Plate','1','1500','',NULL,NULL),(299,'GIZARD PEPPER SAUCE','6','Plate','1','1000','',NULL,NULL),(300,'AFANG SOUP WITH DRY FISH AND ANY SWALLOW','6','Plate','1','3500','','2,3,4,5',NULL),(301,'VEGETABLE SOUP WITH DRY FISH','6','Plate','1','3500','','2,3,4,5',NULL),(302,'FISHERMAN SOUP/SEMO/POUNDO/GARRI','6','Plate','1','3500','','2,3,4,5',NULL),(303,'AFANG SOUP WITH FRESH FISH/SEMO/POUNDP/GARI','6','Plate','1','3000','','2,3,4,5',NULL),(304,'FRIED RICE WITH FRIED FISH AND SALAD','6','Plate','1','3500','','',NULL),(305,'JELLOF RICE WITH FRIED FISH AND SALAD','6','Plate','1','3000','','',NULL),(306,'NATIVE RICE WITH GOAT MEAT OR CHICKEN','6','Plate','1','2500','','',NULL),(307,'VEGETABLE WITH FRESH FISH','6','Plate','1','3000','','',NULL),(308,'CHICKEN SAUSAGE PIZZA REGULAR','10','Unit','1','4000','','',NULL),(309,'CHICKEN SAUSAGE PIZZA FAMILY','10','Unit','1','5000','','',NULL),(310,'BEEF SHARWAMA (BIG)','11','Unit','1','1500','','',NULL),(311,'CHICKEN/HOT-DOG SHARWAMA (BIG)','11','Unit','1','1500','','',NULL),(312,'JOLLOF RICE WITH FISH','16','Plate','1','3500','','',NULL),(313,'GRILL STEAK IN MUSHROOM SAUCE','5','Plate','1','4000','','',NULL),(314,'yamarita','29','Plate','1','1500','','1,3,4,6',NULL);
/*!40000 ALTER TABLE `addresturant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addroom`
--

DROP TABLE IF EXISTS `addroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addroom` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `roomType` varchar(50) NOT NULL,
  `categoryid` varchar(45) DEFAULT NULL,
  `roomrate` varchar(50) DEFAULT '0',
  `roomDescription` varchar(300) DEFAULT '',
  `pic` varchar(80) DEFAULT '',
  `roomQuantity` varchar(50) DEFAULT '',
  `roomleft` int(45) DEFAULT '0',
  `facilities` varchar(200) DEFAULT '',
  `noofadult` varchar(45) DEFAULT '0',
  `noofchildren` varchar(45) DEFAULT '0',
  `currentinv` varchar(65) DEFAULT '',
  `rcardno` varchar(45) DEFAULT NULL,
  `rlockno` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addroom`
--

LOCK TABLES `addroom` WRITE;
/*!40000 ALTER TABLE `addroom` DISABLE KEYS */;
INSERT INTO `addroom` VALUES (1,'Room 001','2','15000','','1617294101tnk.jpg','1',1,'2,1','1','1','','001','07000199','2'),(2,'Room 002','1','10000','','','1',0,'2,1','1','1','16656867','002','07000299','2'),(3,'Room 003','1','10000','','','1',1,'2,1','1','1','','003','07000399','2'),(4,'Room 204','38','12000','','','1',0,'2,3,4,1,5','1','1','16577471','204','02020499','2'),(5,'Room 206','36','30000','','','1',1,'2,3,4,1,5','1','1','','206','02020699','2'),(6,'Room 207','2','15000','','','1',1,'2,1','1','1','','207','02020799','2'),(7,'Room 202','40','16000','','','1',1,'2,1,5','2','1','','202','02020299','2'),(8,'Room 205','2','15000','','','1',1,'2,3,4,1,5','2','1','','205','02020599','2'),(9,'Room 201','39','18000','','','1',1,'2,3,4,1,5','1','1','','201','02020199','2'),(10,'Room 203','40','16000','','','1',1,'2,1','1','1','','203','02020399','2'),(11,'Room 208','2','15000','','','1',1,'2,3,4,5','2','1','','208','02020899','2'),(12,'Room 209','2','15000','','','1',0,'2,3,4,1,5','2','1','16639618','209','02020999','2'),(13,'Room 210','2','15000','','','1',1,'2,3,4,1,5','2','1','','210','02021099','1'),(14,'Room 211','2','15000','','','1',1,'2,3,4,1,5','2','1','','211','02021199','1'),(15,'Room 212','1','10000','','','1',0,'2,3,4,1,5','2','0','8802071','212','07010199','1'),(16,'Room 213','1','10000','','','1',1,'2,3,4,1,5','2','0','','213','07010299','1'),(17,'Room 214','2','15000','','','1',1,'2,3,4,1,5','2','1','','214','07010399','1'),(18,'Room 215','2','15000','','','1',0,'2,3,4,1,5','2','1','8785711','215','07010499','1'),(19,'Room 216','9','20000','','','1',1,'2,3,4,1,5','2','2','','216','07010599','1'),(20,'Room 101','39','18000','','','1',1,'2,3,4,1,5','2','1','','101','02010199','1'),(21,'Room 102','40','16000','','','1',1,'2,3,4,1,5','2','1','','102','02010299','1'),(22,'Room 103','40','16000','','','1',1,'2,3,4,1,5','2','1','','103','02010399','1'),(23,'Room 104','38','12000','','','1',0,'2,3,4,1,5','2','1','8762448','104','02010499','1'),(24,'Room 105','2','15000','','','1',1,'2,3,4,1,5','2','1','','105','02010599','1'),(25,'Room 106','36','30000','','','1',1,'2,3,4,1,5','2','2','','106','02010699','1'),(26,'Room 107','2','15000','','','1',1,'2,3,4,1,5','2','1','','107','02010799','1'),(27,'Room 108','2','15000','','','1',1,'2,3,4,1,5','2','1','','108','02010899','1'),(28,'Room 109','2','15000','','','1',1,'2,3,4,1,5','2','1','','109','02010999','1'),(29,'Room 110','2','15000','','','1',1,'2,3,4,1,5','2','1','','110','02011099','1'),(30,'Room 217','2','15000','','','1',0,'2,3,4,1,5','2','1','8788337','217','07010699','1'),(31,'Room 218','9','20000','','','1',0,'2,3,4,1,5','2','2','8798131','218','07010799','1'),(32,'Room 231','9','15000','','','1',1,'2,3,6','2','2','','231','125412','1'),(33,'Room 301','1','10000','','','1',1,'2,3,7,5','1','1','','301','0980800','2');
/*!40000 ALTER TABLE `addroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addroomfacility`
--

DROP TABLE IF EXISTS `addroomfacility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addroomfacility` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addroomfacility`
--

LOCK TABLES `addroomfacility` WRITE;
/*!40000 ALTER TABLE `addroomfacility` DISABLE KEYS */;
INSERT INTO `addroomfacility` VALUES (1,'TV','','1'),(2,'Air condition','','1'),(3,'Intercom','','1'),(4,'Table Fridge','','1'),(5,'Wall Frame','','1'),(6,'Internet','','1'),(7,'Radio','','1');
/*!40000 ALTER TABLE `addroomfacility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addspa`
--

DROP TABLE IF EXISTS `addspa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addspa` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Sale',
  `duration` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addspa`
--

LOCK TABLES `addspa` WRITE;
/*!40000 ALTER TABLE `addspa` DISABLE KEYS */;
/*!40000 ALTER TABLE `addspa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addsport`
--

DROP TABLE IF EXISTS `addsport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addsport` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `status` varchar(50) DEFAULT 'Sale',
  `quantity` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addsport`
--

LOCK TABLES `addsport` WRITE;
/*!40000 ALTER TABLE `addsport` DISABLE KEYS */;
/*!40000 ALTER TABLE `addsport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addswimpool`
--

DROP TABLE IF EXISTS `addswimpool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addswimpool` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Sale',
  `duration` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addswimpool`
--

LOCK TABLES `addswimpool` WRITE;
/*!40000 ALTER TABLE `addswimpool` DISABLE KEYS */;
INSERT INTO `addswimpool` VALUES (1,'ADULT','','Hour','6','1000','','1'),(2,'KIDS','','Hour','6','500','','1'),(3,'Water Slide For ADULT','','Hour','6','2500','ADULT','1'),(4,'Water Slide For KIDS','','Hour','6','1500','Kids','1');
/*!40000 ALTER TABLE `addswimpool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barrequest`
--

DROP TABLE IF EXISTS `barrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barrequest` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `bartype` varchar(80) DEFAULT NULL,
  `itemname` varchar(80) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT NULL,
  `qty` int(45) DEFAULT '0',
  `staffid` varchar(45) DEFAULT NULL,
  `approveby` varchar(35) DEFAULT '',
  `approvedate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barrequest`
--

LOCK TABLES `barrequest` WRITE;
/*!40000 ALTER TABLE `barrequest` DISABLE KEYS */;
/*!40000 ALTER TABLE `barrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(62) NOT NULL,
  `department_budget` varchar(62) NOT NULL,
  `issync` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ewallet`
--

DROP TABLE IF EXISTS `ewallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ewallet` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) NOT NULL,
  `lastdeposit` int(50) DEFAULT '0',
  `lastddate` date DEFAULT NULL,
  `lastwithdraw` int(45) DEFAULT '0',
  `lastwdate` date DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ewallet`
--

LOCK TABLES `ewallet` WRITE;
/*!40000 ALTER TABLE `ewallet` DISABLE KEYS */;
/*!40000 ALTER TABLE `ewallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenditure`
--

DROP TABLE IF EXISTS `expenditure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenditure` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `amount` int(45) DEFAULT '0',
  `description` varchar(100) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `approveby` varchar(35) DEFAULT '',
  `dept` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenditure`
--

LOCK TABLES `expenditure` WRITE;
/*!40000 ALTER TABLE `expenditure` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenditure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym`
--

DROP TABLE IF EXISTS `gym`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `address` varchar(80) DEFAULT '',
  `dob` varchar(45) DEFAULT '',
  `email` varchar(65) DEFAULT '',
  `phone` varchar(45) DEFAULT '',
  `gender` varchar(35) DEFAULT '',
  `nationality` varchar(45) DEFAULT '',
  `origin` varchar(45) DEFAULT '',
  `lga` varchar(45) DEFAULT '',
  `enametel` varchar(100) DEFAULT '',
  `nokname` varchar(65) DEFAULT '',
  `nokphone` varchar(45) DEFAULT '',
  `nokaddress` varchar(80) DEFAULT '',
  `how2contact` varchar(65) DEFAULT '',
  `howuhear` varchar(45) DEFAULT '',
  `regdate` varchar(45) DEFAULT '',
  `pix` varchar(65) DEFAULT '',
  `currentinv` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym`
--

LOCK TABLES `gym` WRITE;
/*!40000 ALTER TABLE `gym` DISABLE KEYS */;
/*!40000 ALTER TABLE `gym` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym1`
--

DROP TABLE IF EXISTS `gym1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym1` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `regno` varchar(45) DEFAULT '',
  `userid` varchar(45) DEFAULT '',
  `goals` varchar(100) DEFAULT '',
  `smoker` varchar(35) DEFAULT '',
  `alcoholperwk` varchar(45) DEFAULT '',
  `ghealth` varchar(80) DEFAULT '',
  `details` varchar(100) DEFAULT '',
  `mednotes` varchar(35) DEFAULT '',
  `waterdaily` varchar(35) DEFAULT '',
  `healthdiet` varchar(35) DEFAULT '',
  `mmeal` varchar(50) DEFAULT '',
  `emeal` varchar(50) DEFAULT '',
  `foodweak` varchar(35) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym1`
--

LOCK TABLES `gym1` WRITE;
/*!40000 ALTER TABLE `gym1` DISABLE KEYS */;
/*!40000 ALTER TABLE `gym1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gymdurations`
--

DROP TABLE IF EXISTS `gymdurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gymdurations` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT '',
  `duration` varchar(35) DEFAULT '1',
  `price` varchar(45) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gymdurations`
--

LOCK TABLES `gymdurations` WRITE;
/*!40000 ALTER TABLE `gymdurations` DISABLE KEYS */;
INSERT INTO `gymdurations` VALUES (1,'1 Month','1','10000','1'),(2,'3 Months','3','27000','1'),(3,'6 Months','6','50000','1'),(4,'1 Year','12','100000','1');
/*!40000 ALTER TABLE `gymdurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gympayments`
--

DROP TABLE IF EXISTS `gympayments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gympayments` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT '',
  `invoiceid` varchar(50) DEFAULT '',
  `duration` varchar(35) DEFAULT '',
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `membertype` varchar(45) DEFAULT '',
  `regfee` varchar(45) DEFAULT '0',
  `debittype` varchar(45) DEFAULT '',
  `paymenttype` varchar(50) DEFAULT '',
  `amount` varchar(50) DEFAULT '0',
  `ddamount` varchar(50) DEFAULT '0',
  `total` varchar(50) DEFAULT '0',
  `amountpaid` varchar(50) DEFAULT '0',
  `balance` varchar(45) DEFAULT '0',
  `ispaid` varchar(30) DEFAULT '1',
  `status` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gympayments`
--

LOCK TABLES `gympayments` WRITE;
/*!40000 ALTER TABLE `gympayments` DISABLE KEYS */;
/*!40000 ALTER TABLE `gympayments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onlineorders`
--

DROP TABLE IF EXISTS `onlineorders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onlineorders` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `hotelid` varchar(65) DEFAULT '',
  `invoiceid` varchar(80) DEFAULT '',
  `customerid` varchar(65) DEFAULT '',
  `customerlname` varchar(50) DEFAULT NULL,
  `customerfname` varchar(45) DEFAULT '',
  `customeremail` varchar(85) DEFAULT '',
  `customerphone` varchar(65) DEFAULT '',
  `roomid` varchar(50) DEFAULT '',
  `roomname` varchar(80) DEFAULT '',
  `bookingsite` varchar(100) DEFAULT '',
  `adult` varchar(50) DEFAULT '0',
  `children` varchar(50) DEFAULT '0',
  `noofroom` varchar(45) DEFAULT '0',
  `amount` varchar(45) DEFAULT '0',
  `paymenttype` varchar(60) DEFAULT '',
  `ispaid` varchar(10) DEFAULT '0',
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `orderdate` varchar(10) DEFAULT '',
  `status` int(15) DEFAULT '0' COMMENT '0-New, 1-Viewed, 2-Processed, 3-Cancelled',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onlineorders`
--

LOCK TABLES `onlineorders` WRITE;
/*!40000 ALTER TABLE `onlineorders` DISABLE KEYS */;
/*!40000 ALTER TABLE `onlineorders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_bar`
--

DROP TABLE IF EXISTS `order_bar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_bar` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemdescr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT '0',
  `roomitemcat` varchar(45) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT '',
  `isflag` varchar(20) DEFAULT '1',
  `issync` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_bar`
--

LOCK TABLES `order_bar` WRITE;
/*!40000 ALTER TABLE `order_bar` DISABLE KEYS */;
INSERT INTO `order_bar` VALUES (1,'1621776819','5','9','126','','1','0',0,'4000','4000',0,'Beverage','2021-05-23','14:33:00','0','5','Waiter 1 (Salt)','1',''),(2,'1621776837','5','9','218','','1','0',0,'200','200',0,'Beverage','2021-05-23','14:33:00','0','5','Waiter 1 (Salt)','1',''),(3,'1621776837','5','9','27','','1','0',0,'7000','7000',0,'Beverage','2021-05-23','14:33:00','0','5','Waiter 1 (Salt)','1',''),(4,'1621790319','2','2','141','','1','0',0,'300','300',0,'Non-Alcoholic Drink','2021-05-23','18:18:00','1','5','Waiter 3 (Ime)','1','2'),(5,'1621790319','2','2','57','','1','0',0,'500','500',0,'Non-Alcoholic Drink','2021-05-23','18:18:00','1','5','Waiter 3 (Ime)','1','2'),(6,'1621790324','2','2','14','','1','0',0,'9000','9000',0,'Non-Alcoholic Drink','2021-05-23','18:18:00','1','5','Waiter 3 (Ime)','1',''),(7,'1621795983','2','2','126','','1','0',0,'4000','4000',0,'Alcoholic Drink','2021-05-23','19:53:00','0','5','','1',''),(8,'1621796474','1','','57','','1','0',0,'500','500',0,'Alcoholic Drink','2021-05-23','20:01:00','0','5','','1','');
/*!40000 ALTER TABLE `order_bar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_bar2`
--

DROP TABLE IF EXISTS `order_bar2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_bar2` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemdescr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT '0',
  `roomitemcat` varchar(45) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT '',
  `isflag` varchar(20) DEFAULT '1',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_bar2`
--

LOCK TABLES `order_bar2` WRITE;
/*!40000 ALTER TABLE `order_bar2` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_bar2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_laundary`
--

DROP TABLE IF EXISTS `order_laundary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_laundary` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) NOT NULL DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_laundary`
--

LOCK TABLES `order_laundary` WRITE;
/*!40000 ALTER TABLE `order_laundary` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_laundary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_restaurant`
--

DROP TABLE IF EXISTS `order_restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_restaurant` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(50) DEFAULT '0',
  `roomfoodcat` varchar(45) DEFAULT NULL,
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `tableno` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_restaurant`
--

LOCK TABLES `order_restaurant` WRITE;
/*!40000 ALTER TABLE `order_restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_room`
--

DROP TABLE IF EXISTS `order_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_room` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(50) DEFAULT '',
  `noofroom` varchar(50) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `duration` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '',
  `vat` varchar(45) DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `checkstatus` varchar(20) DEFAULT 'in' COMMENT 'in/out',
  `ispaid` varchar(20) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_room`
--

LOCK TABLES `order_room` WRITE;
/*!40000 ALTER TABLE `order_room` DISABLE KEYS */;
INSERT INTO `order_room` VALUES (1,'16643536','5','9','1','1','2021-05-23','2021-05-23',NULL,NULL,'2021-05-23','14:29:00','0','0','0','18000','0','out','1','5','2'),(2,'16656867','2','2','1','1','2021-05-23','2021-05-25',NULL,NULL,'2021-05-23','18:11:00','2','0','0','10000','20000','in','0','5','0');
/*!40000 ALTER TABLE `order_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_spa`
--

DROP TABLE IF EXISTS `order_spa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_spa` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_spa`
--

LOCK TABLES `order_spa` WRITE;
/*!40000 ALTER TABLE `order_spa` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_spa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_sportitem`
--

DROP TABLE IF EXISTS `order_sportitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_sportitem` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(65) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `tranxtype` varchar(45) DEFAULT NULL COMMENT 'Sale or Rent',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_sportitem`
--

LOCK TABLES `order_sportitem` WRITE;
/*!40000 ALTER TABLE `order_sportitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_sportitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_swimpool`
--

DROP TABLE IF EXISTS `order_swimpool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_swimpool` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `duration` varchar(45) DEFAULT '1',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_swimpool`
--

LOCK TABLES `order_swimpool` WRITE;
/*!40000 ALTER TABLE `order_swimpool` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_swimpool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `isroom` varchar(10) DEFAULT '',
  `isbar` varchar(10) DEFAULT '',
  `isbar2` varchar(35) DEFAULT '0',
  `issport` varchar(10) DEFAULT '',
  `isspa` varchar(10) DEFAULT NULL,
  `islaundary` varchar(10) DEFAULT NULL,
  `isrestaurant` varchar(10) DEFAULT '0',
  `isswimpool` varchar(10) DEFAULT '0',
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `checkouttime` time DEFAULT NULL,
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT '0',
  `roomfoodcat` varchar(45) DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `iswallet` varchar(20) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  `paystatus` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,'16643536','5','9','1','0','0','0','0','0','0','0','2021-05-23','14:29:00',NULL,'0',0,NULL,'1','0','2','dw'),(3,'1621776819','5','9','0','1','0','0','0','0','0','0','2021-05-23','14:33:00',NULL,'4000',0,NULL,'0','0','0',''),(4,'1621776837','5','9','0','1','0','0','0','0','0','0','2021-05-23','14:33:00',NULL,'7200',0,NULL,'0','0','0',''),(5,'16656867','2','2','1','0','0','0','0','0','0','0','2021-05-23','18:11:00',NULL,'20000',0,NULL,'0','0','0',''),(6,'1621790319','2','2','0','1','0','0','0','0','0','0','2021-05-23','18:18:00',NULL,'800',0,NULL,'1','0','2','dw'),(7,'1621790324','2','2','0','1','0','0','0','0','0','0','2021-05-23','18:18:00',NULL,'9000',0,NULL,'1','0','0',''),(8,'1621795983','2','2','0','1','0','0','0','0','0','0','2021-05-23','19:53:00',NULL,'4000',0,NULL,'0','0','0',''),(9,'1621796474','1','','0','1','0','0','0','0','0','0','2021-05-23','20:01:00',NULL,'500',0,NULL,'0','0','0','');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otherpictures`
--

DROP TABLE IF EXISTS `otherpictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otherpictures` (
  `id` int(65) NOT NULL AUTO_INCREMENT,
  `pictype` varchar(50) DEFAULT '',
  `pic` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otherpictures`
--

LOCK TABLES `otherpictures` WRITE;
/*!40000 ALTER TABLE `otherpictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `otherpictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paycab`
--

DROP TABLE IF EXISTS `paycab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paycab` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `cabid` varchar(45) NOT NULL,
  `amount` double DEFAULT '0',
  `paydate` varchar(45) DEFAULT NULL,
  `payrealdate` date DEFAULT NULL,
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paycab`
--

LOCK TABLES `paycab` WRITE;
/*!40000 ALTER TABLE `paycab` DISABLE KEYS */;
/*!40000 ALTER TABLE `paycab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roompictures`
--

DROP TABLE IF EXISTS `roompictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roompictures` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `roomid` varchar(50) DEFAULT '',
  `pic1` varchar(80) DEFAULT '',
  `pic2` varchar(80) DEFAULT '',
  `pic3` varchar(80) DEFAULT '',
  `pic4` varchar(80) DEFAULT '',
  `pic5` varchar(80) DEFAULT '',
  `pic6` varchar(80) DEFAULT '',
  `pic7` varchar(80) DEFAULT '',
  `pic8` varchar(80) DEFAULT '',
  `pic9` varchar(80) DEFAULT '',
  `pic10` varchar(80) DEFAULT '',
  `pic11` varchar(80) DEFAULT '',
  `pic12` varchar(80) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roompictures`
--

LOCK TABLES `roompictures` WRITE;
/*!40000 ALTER TABLE `roompictures` DISABLE KEYS */;
INSERT INTO `roompictures` VALUES (1,'1','1617294101tnk.jpg','1617294211ems-1.png','','','','','','','','','','','1'),(2,'2','','','','','','','','','','','','','1'),(3,'3','','','','','','','','','','','','','1'),(4,'4','','','','','','','','','','','','','1'),(5,'5','','','','','','','','','','','','','1'),(6,'1','1617294101tnk.jpg','1617294211ems-1.png','','','','','','','','','','','1'),(7,'2','','','','','','','','','','','','','1'),(8,'3','','','','','','','','','','','','','1'),(9,'4','','','','','','','','','','','','','1'),(10,'1','1617294101tnk.jpg','1617294211ems-1.png','','','','','','','','','','','1'),(11,'2','','','','','','','','','','','','','1'),(12,'3','','','','','','','','','','','','','1'),(13,'4','','','','','','','','','','','','','1'),(14,'5','','','','','','','','','','','','','1'),(15,'6','','','','','','','','','','','','','1'),(16,'7','','','','','','','','','','','','','1'),(17,'8','','','','','','','','','','','','','1'),(18,'9','','','','','','','','','','','','','1'),(19,'10','','','','','','','','','','','','','1'),(20,'11','','','','','','','','','','','','','1'),(21,'12','','','','','','','','','','','','','1'),(22,'13','','','','','','','','','','','','','1'),(23,'14','','','','','','','','','','','','','1'),(24,'15','','','','','','','','','','','','','1'),(25,'16','','','','','','','','','','','','','1'),(26,'17','','','','','','','','','','','','','1'),(27,'18','','','','','','','','','','','','','1'),(28,'19','','','','','','','','','','','','','1'),(29,'20','','','','','','','','','','','','','1'),(30,'21','','','','','','','','','','','','','1'),(31,'22','','','','','','','','','','','','','1'),(32,'23','','','','','','','','','','','','','1'),(33,'24','','','','','','','','','','','','','1'),(34,'25','','','','','','','','','','','','','1'),(35,'26','','','','','','','','','','','','','1'),(36,'27','','','','','','','','','','','','','1'),(37,'28','','','','','','','','','','','','','1'),(38,'29','','','','','','','','','','','','','1'),(39,'30','','','','','','','','','','','','','1'),(40,'31','','','','','','','','','','','','','1'),(41,'32','','','','','','','','','','','','','1'),(42,'33','','','','','','','','','','','','','1');
/*!40000 ALTER TABLE `roompictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `hotelid` varchar(65) DEFAULT '',
  `bookingsite` varchar(80) DEFAULT '',
  `hotelname` varchar(65) DEFAULT '',
  `address` varchar(100) DEFAULT '',
  `state` varchar(45) DEFAULT '',
  `country` varchar(65) DEFAULT '',
  `phone` varchar(65) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `website` varchar(50) DEFAULT '',
  `promodiscount` varchar(50) DEFAULT '',
  `minnoofroom` varchar(50) DEFAULT '1',
  `vat` varchar(50) DEFAULT '0',
  `facebook` varchar(50) DEFAULT '',
  `twitter` varchar(50) DEFAULT '',
  `youtube` varchar(50) DEFAULT '',
  `googlemap` varchar(50) DEFAULT '',
  `logo` varchar(100) DEFAULT '',
  `loginbgpic` varchar(100) DEFAULT '',
  `baritemlimit` varchar(35) DEFAULT '5',
  `servicecharge` int(45) DEFAULT '500',
  `showguestcatlist` varchar(25) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'','','Cornerpiece Crib Hotel','Benin, Nigeria','Benin','Nigeria','07060000000','cornerpiececrib@gmail.com','www.cornerpiececrib.com','0','1','0','www.facebook.com/cornerpiececrib','www.twitter.com/cornerpiececrib','www.youtube.com/cornerpiececrib','www.gmap.com/cornerpiececrib','1544506158logo.png','1544506226lbg.jpg','5',0,'1','2');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tablenos`
--

DROP TABLE IF EXISTS `tablenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tablenos` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tablenos`
--

LOCK TABLES `tablenos` WRITE;
/*!40000 ALTER TABLE `tablenos` DISABLE KEYS */;
INSERT INTO `tablenos` VALUES (1,'Table 001','5','1'),(2,'Table 002','5','1'),(3,'Table 003','5','1'),(4,'Table 004','5','1'),(5,'Table 005','5','1');
/*!40000 ALTER TABLE `tablenos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cattype` varchar(50) DEFAULT '',
  `catname` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategory`
--

LOCK TABLES `tblcategory` WRITE;
/*!40000 ALTER TABLE `tblcategory` DISABLE KEYS */;
INSERT INTO `tblcategory` VALUES (1,'room','Classic','1'),(2,'room','Deluxe','1'),(3,'bar','Non Alcoholic','1'),(5,'restaurant','Continental Dishes','1'),(6,'restaurant','African Dishes','1'),(7,'restaurant','Conventionary','1'),(8,'bar','Alcoholic','1'),(9,'room','Junior Suite','1'),(10,'restaurant','ITALIAN PIZZA MENU','1'),(11,'restaurant','SANDWICHES','1'),(12,'restaurant','BURGER','1'),(13,'restaurant','SALAD','1'),(14,'restaurant','FINGER FOODS','1'),(15,'restaurant','NOODLES','1'),(16,'restaurant','RICE','1'),(17,'restaurant','CHIEF FAVOURITE DISH ','1'),(18,'restaurant','GRILL CORNER','1'),(19,'restaurant','STARTER','1'),(20,'restaurant','BEEF','1'),(21,'restaurant','CHICKEN','1'),(22,'restaurant','SEA FOOD','1'),(23,'restaurant','FISH ','1'),(24,'restaurant','PORK','1'),(25,'restaurant','VEGETABLES','1'),(26,'restaurant','SAUCES','1'),(27,'restaurant','DESERT','1'),(28,'restaurant','BREAKFAST','1'),(29,'restaurant','AMERICAN','1'),(30,'restaurant','PASTA DISHES','1'),(31,'restaurant','NIGERIAN DISHES','1'),(32,'restaurant','NIGERIAN DISHES (PEPPER SOUP)','1'),(33,'restaurant','PEPPER SAUCE','1'),(34,'restaurant','FRUIT','1'),(35,'restaurant','pack','1'),(36,'room','1 Bedroom Suite','1'),(37,'room','Premium Deluxe','1'),(38,'room','Premium Classic','1'),(39,'room','Premium Deluxe Pool','1'),(40,'room','Deluxe Pool','1');
/*!40000 ALTER TABLE `tblcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcompany`
--

DROP TABLE IF EXISTS `tblcompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcompany` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `contactperson` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcompany`
--

LOCK TABLES `tblcompany` WRITE;
/*!40000 ALTER TABLE `tblcompany` DISABLE KEYS */;
INSERT INTO `tblcompany` VALUES (1,'frontier','Mary','','08065097644','1613753471','1'),(2,'Boveeri Suites','Inyang Ini','','08065057644','1613838661','1');
/*!40000 ALTER TABLE `tblcompany` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcountry`
--

DROP TABLE IF EXISTS `tblcountry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcountry` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcountry`
--

LOCK TABLES `tblcountry` WRITE;
/*!40000 ALTER TABLE `tblcountry` DISABLE KEYS */;
INSERT INTO `tblcountry` VALUES (1,'Nigeria','0'),(2,'United States of America','0'),(3,'Afghanistan','0'),(4,'Albania','0'),(5,'Algeria','0'),(6,'American Samoa','0'),(7,'Andorra','0'),(8,'Angola','0'),(9,'Anguilla','0');
/*!40000 ALTER TABLE `tblcountry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblingredients`
--

DROP TABLE IF EXISTS `tblingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblingredients` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblingredients`
--

LOCK TABLES `tblingredients` WRITE;
/*!40000 ALTER TABLE `tblingredients` DISABLE KEYS */;
INSERT INTO `tblingredients` VALUES (1,'Goat Meat','0'),(2,'Maggi','0'),(3,'Pepper','0'),(4,'Salt','0'),(5,'Cray Fish','0'),(6,'CHICKEN','0'),(7,'CHICKEN','0');
/*!40000 ALTER TABLE `tblingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstruct`
--

DROP TABLE IF EXISTS `tblinstruct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstruct` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(45) DEFAULT '',
  `overallstock` varchar(50) DEFAULT '0',
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regtime` varchar(45) DEFAULT NULL,
  `elapsedate` date DEFAULT NULL,
  `qty2restock` int(45) DEFAULT '0',
  `qtyrestocked` int(45) DEFAULT '0',
  `message` varchar(500) DEFAULT '',
  `servicetype` varchar(45) DEFAULT 'bar',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstruct`
--

LOCK TABLES `tblinstruct` WRITE;
/*!40000 ALTER TABLE `tblinstruct` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinstruct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmcardreason`
--

DROP TABLE IF EXISTS `tblmcardreason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmcardreason` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `reason` varchar(200) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmcardreason`
--

LOCK TABLES `tblmcardreason` WRITE;
/*!40000 ALTER TABLE `tblmcardreason` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmcardreason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrestock`
--

DROP TABLE IF EXISTS `tblrestock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrestock` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT '0',
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT '0',
  `price` int(50) DEFAULT '0',
  `newstock` int(45) DEFAULT '0',
  `oldremstock` int(45) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrestock`
--

LOCK TABLES `tblrestock` WRITE;
/*!40000 ALTER TABLE `tblrestock` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblrestock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschedule`
--

DROP TABLE IF EXISTS `tblschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschedule` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `checkindate` date DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `roomid` varchar(40) NOT NULL,
  `paystatus` varchar(45) DEFAULT NULL,
  `orderdate` varchar(50) DEFAULT NULL,
  `invoiceid` varchar(50) DEFAULT NULL,
  `amount` varchar(45) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschedule`
--

LOCK TABLES `tblschedule` WRITE;
/*!40000 ALTER TABLE `tblschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblshifts`
--

DROP TABLE IF EXISTS `tblshifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblshifts` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `openshift` varchar(45) DEFAULT NULL,
  `closeshift` varchar(45) DEFAULT NULL,
  `servicetype` varchar(50) DEFAULT NULL,
  `xlsurl` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblshifts`
--

LOCK TABLES `tblshifts` WRITE;
/*!40000 ALTER TABLE `tblshifts` DISABLE KEYS */;
INSERT INTO `tblshifts` VALUES (1,'40','2021-03-26 07:54 AM','2021-03-26 07:56 AM','bar1','2021-03-26-07-54-24-AM-bar1.xls','1');
/*!40000 ALTER TABLE `tblshifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstate`
--

DROP TABLE IF EXISTS `tblstate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstate` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `cid` varchar(50) DEFAULT '1',
  `state` varchar(50) NOT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstate`
--

LOCK TABLES `tblstate` WRITE;
/*!40000 ALTER TABLE `tblstate` DISABLE KEYS */;
INSERT INTO `tblstate` VALUES (1,'1','Abia','0'),(2,'1','Abuja','0'),(3,'1','Adamawa','0'),(4,'1','Akwa Ibom','0'),(5,'1','Anambra','0'),(6,'1','Bauchi','0'),(7,'1','Bayelsa','0'),(8,'1','Benue','0'),(9,'1','Borno','0'),(10,'1','Cross River','0'),(11,'1','Delta','0'),(12,'1','Ebonyi','0'),(13,'1','Edo','0'),(14,'1','Ekiti','0'),(15,'1','Enugu','0'),(16,'1','Gombe','0'),(17,'1','Imo','0'),(18,'1','Jigawa','0'),(19,'1','Kaduna','0'),(20,'1','Kano','0'),(21,'1','Katsina','0'),(22,'1','Kebbi','0'),(23,'1','Kogi','0'),(24,'1','Kwara','0'),(25,'1','Lagos','0'),(26,'1','Nassarawa','0'),(27,'1','Niger','0'),(28,'1','Ogun','0'),(29,'1','Ondo','0'),(30,'1','Osun','0'),(31,'1','Oyo','0'),(32,'1','Plateau','0'),(33,'1','Rivers','0'),(34,'1','Sokoto','0'),(35,'1','Taraba','0'),(36,'1','Yobe','0'),(37,'1','Zamfara','0');
/*!40000 ALTER TABLE `tblstate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstore`
--

DROP TABLE IF EXISTS `tblstore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstore` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `qtyinstore` int(45) DEFAULT '0',
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT '0',
  `price` varchar(50) DEFAULT '0',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT '0',
  `oldremstock` int(45) DEFAULT '0',
  `regdate` varchar(45) DEFAULT NULL,
  `lastupdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstore`
--

LOCK TABLES `tblstore` WRITE;
/*!40000 ALTER TABLE `tblstore` DISABLE KEYS */;
INSERT INTO `tblstore` VALUES (1,' BLACK BULLET ','8',48,'Bottle','1',0,'0','',48,48,'1565716159','1565716159','1'),(2,' LA MONDENSE LAMBRUSCO','8',0,'Bottle','1',0,'0','',12,0,'1565716183','1565716183','1'),(3,'CAN CLIMAX ','8',24,'Bottle','1',0,'0','',24,24,'1565716207','1565716207','1'),(4,'ORIS','8',0,'Bottle','1',0,'0','',10,0,'1565716226','1565716226','1'),(5,'SMALL SMIRNOFF ICE ','8',0,'Bottle','1',0,'0','',72,0,'1565716242','1565716242','1'),(6,'DOTCHESTER','8',20,'Bottle','1',0,'0','',30,0,'1565716325','1565716325','1'),(7,'AMSTEL MALT','8',0,'Bottle','1',0,'0','',120,0,'1565716386','1565716386','1'),(8,'AMSTEL MALT CAN','8',0,'Bottle','1',0,'0','',0,0,'1565716408','1565716408','1'),(9,'RED LABEL','8',25,'Bottle','1',0,'0','',12,25,'1565716533','1565716533','1'),(10,'CARLO ROSSI','8',8,'Bottle','1',0,'0','',19,0,'1565716547','1565716547','1'),(11,'SMIRNOFF GREEN APPLE ','8',0,'Bottle','1',0,'0','',0,0,'1565716567','1565716567','1'),(12,'CAN POWER HORSE','8',0,'Bottle','1',0,'0','',48,0,'1565716616','1565716616','1'),(13,'BIG LEGEND','8',96,'Bottle','1',0,'0','',36,60,'1565716677','1565716677','1'),(14,'BENSON','8',0,'Bottle','1',0,'0','',40,0,'1565716687','1565716687','1'),(15,'BEST CREAM','8',2,'Bottle','1',0,'0','',12,2,'1565716698','1565716698','1'),(16,'EXOTIC JUICE ','3',30,'Bottle','1',0,'0','',50,0,'1565716721','1565716721','1'),(17,'METUS ROSE','8',1,'Bottle','1',0,'0','',12,1,'1565716751','1565716751','1'),(18,'ROTHMANS','8',0,'Bottle','1',0,'0','',0,0,'1565716801','1565716801','1'),(19,'BOTTLE AMSTEL MALT','8',0,'Bottle','1',0,'0','',96,0,'1565717638','1565717638','1'),(20,'CAN MONSTER','8',0,'Bottle','1',0,'0','',24,0,'1565717717','1565717717','1'),(21,'BOTTLE STAR RADLER','8',100,'Bottle','1',0,'0','',80,120,'1565717842','1565717842','1'),(22,'CLIMAX PET','8',0,'Bottle','1',0,'0','',24,0,'1565717880','1565717880','1'),(23,'SMALL BLACK LABEL','8',0,'Bottle','1',0,'0','',5,1,'1565717921','1565717921','1'),(24,'BOTTLE GUINESS MALT','8',0,'Bottle','1',0,'0','',0,0,'1565717958','1565717958','1'),(25,'MAGIC MOMENT','8',0,'Bottle','1',0,'0','',24,0,'1565718022','1565718022','1'),(26,'GRAND MALT','8',0,'Bottle','1',0,'0','0',24,0,'1565718049','1565718049','1'),(27,'CAN MALTA GUINNESS','8',0,'Bottle','1',0,'0','',0,0,'1565718065','1565718065','1'),(28,'FAYROUZ','8',120,'Bottle','1',0,'0','',72,144,'1565718079','1565718079','1'),(29,'EAGLE STOUT','8',84,'Bottle','1',0,'0','',12,84,'1565718102','1565718102','1'),(30,'SMALL RED LABEL','8',4,'Bottle','1',0,'0','',24,0,'1565718117','1565718117','1'),(31,'HERO','8',0,'Bottle','1',0,'0','',60,60,'1565718141','1565718141','1'),(32,'TROPHY','8',216,'Bottle','1',0,'0','',120,96,'1565718158','1565718158','1'),(33,'CELLA LAMBRUSCO','8',0,'Bottle','1',0,'0','',12,0,'1565718207','1565718207','1'),(34,'CHAMDOR','8',15,'Bottle','1',0,'0','',12,5,'1565718229','1565718229','1'),(35,'GOTAS DE PLATA','8',0,'Bottle','1',0,'0','',60,0,'1565718248','1565718248','1'),(36,'CHAMPION','8',144,'Bottle','1',0,'0','',60,204,'1565718285','1565718285','1'),(37,'SMIRNOFF  CHOCOLATE VODKA 75CL','8',12,'Bottle','1',0,'0','',12,7,'1565718368','1565718368','1'),(38,'JACK DANIELS','8',0,'Bottle','1',0,'0','',4,0,'1565718387','1565718387','1'),(39,'CIROC','8',50,'Bottle','1',0,'0','',1,50,'1565718400','1565718400','1'),(40,'MOET ROSE','8',0,'Bottle','1',0,'0','',12,0,'1565718413','1565718413','1'),(41,'CRANBERRY JUICE','8',8,'Bottle','1',0,'0','',16,0,'1565718432','1565718432','1'),(42,'HENNESSY VS','8',3,'Bottle','1',0,'0','',6,3,'1565718457','1565718457','1'),(43,'DROSTDY HOF (BIG)','8',0,'Bottle','1',0,'0','',0,0,'1565718475','1565718475','1'),(44,'MC DOWEL ','8',0,'Bottle','1',0,'0','',0,0,'1565718489','1565718489','1'),(45,'WATER','3',0,'Bottle','1',0,'0','',0,0,'1565718531','1565718531','1'),(46,'DUNHILL','8',0,'Bottle','1',0,'0','',10,0,'1565718555','1565718555','1'),(47,'DUSSE VSOP','8',0,'Bottle','1',0,'0','',0,0,'1565718571','1565718571','1'),(48,'HENNESSY VSOP','8',0,'Bottle','1',0,'0','54334767774534',6,0,'1565718592','1565718592','1'),(49,'EXTRA CHACOAL SHISHA','8',0,'Bottle','1',0,'0','',0,0,'1565718609','1565718609','1'),(50,'GLENFFIDISH 15 YRS OLD','8',2,'Bottle','1',0,'0','',6,0,'1565718624','1565718624','1'),(51,'GLENFIDDCH (18YRS)','8',1,'Bottle','1',0,'0','',6,1,'1565718639','1565718639','1'),(52,'GLENFIDDICH WHISKY 12 YEARS','8',3,'Bottle','1',0,'0','',6,11,'1565718751','1565718751','1'),(53,'GRAND MALT CAN','8',0,'Bottle','1',0,'0','',0,0,'1565718770','1565718770','1'),(54,'GULDER','8',60,'Bottle','1',0,'0','',72,48,'1565718810','1565718810','1'),(55,'MOET ROSE (SMALL)','8',0,'Bottle','1',0,'0','',0,0,'1565718826','1565718826','1'),(56,'VITA MILK','3',0,'Bottle','1',0,'0','',120,0,'1565718840','1565718840','1'),(57,'SMIRNOFF ORANGE 1 LITRE','8',0,'Bottle','1',0,'0','',0,0,'1565718858','1565718858','1'),(58,'HOLLANDIA','3',50,'Bottle','1',0,'0','',20,50,'1565718950','1565718950','1'),(59,'JAMESON','8',12,'Bottle','1',0,'0','',12,6,'1565718963','1565718963','1'),(60,'LAMBRUSCO REUNITE','8',12,'Bottle','1',0,'0','',24,0,'1565718980','1565718980','1'),(61,'LIFE','8',102,'Bottle','1',0,'0','',180,66,'1565719033','1565719033','1'),(62,'ORIGIN BIG','8',72,'Bottle','1',0,'0','',180,0,'1565719045','1565719045','1'),(63,'MALTINA','3',312,'Bottle','1',0,'0','',360,120,'1565719066','1565719066','1'),(64,'MARTELL BLUE SWIFT','8',4,'Bottle','1',0,'0','',12,0,'1565719141','1565719141','1'),(65,'MEDIUM STOUT','8',90,'Bottle','1',0,'0','',54,54,'1565719199','1565719199','1'),(66,'VEUVE CLICQUET','8',0,'Bottle','1',0,'0','',0,0,'1565719229','1565719229','1'),(67,'NECTAR ROSE','8',0,'Bottle','1',0,'0','',0,0,'1565719242','1565719242','1'),(68,'PEANUT BIG','3',0,'Bottle','1',0,'0','',5,0,'1565719257','1565719257','1'),(69,'PEANUT SMALL','3',0,'Bottle','1',0,'0','',60,0,'1565719269','1565719269','1'),(70,'ROYAL CHALLENGE','8',30,'Bottle','1',0,'0','',21,7,'1565719328','1565719328','1'),(71,'REMY MARTINS VSOP','8',0,'Bottle','1',0,'0','',6,0,'1565719339','1565719339','1'),(72,'SATZENBRAU','8',72,'Bottle','1',0,'0','',72,0,'1565719372','1565719372','1'),(73,'SHISHA','8',35,'Bottle','1',0,'0','',50,10,'1565719390','1565719390','1'),(74,'SMALL FIVE ALIVE','8',0,'Bottle','1',0,'0','',0,0,'1565719423','1565719423','1'),(75,'SNAPP','8',0,'Bottle','1',0,'0','',24,0,'1565719440','1565719440','1'),(76,'STAR','8',72,'Bottle','1',0,'0','',120,180,'1565719479','1565719479','1'),(77,'TIGER','8',60,'Bottle','1',0,'0','',60,0,'1565719503','1565719503','1'),(78,'CHIVITA JUICE','3',70,'Bottle','1',0,'0','',30,60,'1565719931','1565719931','1'),(79,'33 EXPORT','8',216,'Bottle','1',0,'0','0',180,156,'1565720054','1565720054','1'),(80,'BUDWISER ','8',0,'Bottle','1',0,'0','0',60,0,'1565720561','1565720561','1'),(81,'HEINEKEN (BOTTLE)','8',120,'Bottle','1',0,'0','',120,120,'1565795976','1565795976','1'),(82,'ANDRE ROSE','8',1,'Bottle','1',0,'0','',25,0,'1565796026','1565796026','1'),(83,'BAILEYS','3',6,'Bottle','1',0,'0','',12,0,'1565796317','1565796317','1'),(84,'HENESSY XO','8',0,'Bottle','1',0,'0','',3,0,'1565796516','1565796516','1'),(85,'HENNESSY VS (SMALL)','8',5,'Bottle','1',0,'0','',9,2,'1565796620','1565796620','1'),(86,'PLASTIC COKE','3',720,'Bottle','1',0,'0','',228,576,'1565798297','1565798297','1'),(87,'EVA WATER','3',24,'Bottle','1',0,'0','',300,96,'1565798929','1565798929','1'),(88,'SMALL STOUT','8',72,'Bottle','1',0,'0','',144,24,'1565867356','1565867356','1'),(89,'AFRICAN SPECIAL LEGEND','8',0,'Bottle','1',0,'0','',36,0,'1565969125','1565969125','1'),(90,'CAMPARI','8',4,'Bottle','1',0,'0','',12,0,'1565977351','1565977351','1'),(91,'AMERICAN HONEY','8',0,'Bottle','1',0,'0','',12,0,'1566031350','1566031350','1'),(92,'BLACK LABEL','8',28,'Bottle','1',0,'0','',24,12,'1566145684','1566145684','1'),(93,'CAN HEINEKEN','8',0,'Bottle','1',0,'0','',24,0,'1567235021','1567235021','1'),(94,'BLUE BULLET','8',100,'Bottle','1',0,'0','',100,0,'1567235183','1567235183','1'),(95,'DORCHESTER','8',0,'Bottle','1',0,'0','',20,0,'1567360507','1567360507','1'),(96,'JAMESON BLACK BARREL','8',18,'Bottle','1',0,'0','',24,0,'1567532084','1567532084','1'),(97,'1960','8',0,'Bottle','1',0,'0','',36,0,'1569001324','1569001324','1'),(98,'ORIGIN BITTERS PLASTIC','8',0,'Bottle','1',0,'0','',12,0,'1569001352','1569001352','1'),(99,'MARTINI ROSE','8',0,'Bottle','1',0,'0','',12,0,'1569055672','1569055672','1'),(100,'MOET NECTAR IMPERIAL ROSE','8',0,'Bottle','1',0,'0','',6,0,'1569685905','1569685905','1'),(101,'MOET ICE IMPERIAL','8',0,'Bottle','1',0,'0','',1,2,'1569686005','1569686005','1'),(102,'GLENMORANGIE EXTREMELY RARE','8',0,'Bottle','1',0,'0','',2,0,'1569686060','1569686060','1'),(103,'GLENMORANGIE ORIGINAL','8',0,'Bottle','1',0,'0','',6,0,'1569686090','1569686090','1'),(104,'GLENMORANGIE LASANTA','8',0,'Bottle','1',0,'0','N',3,0,'1569686114','1569686114','1'),(105,'GLENMORANGIE QVINTA RUBAN','8',0,'Bottle','1',0,'0','',3,0,'1569686138','1569686138','1'),(106,'GLENMORANGIE  SIGNET','8',1,'Bottle','1',0,'0','',3,0,'1569686157','1569686157','1'),(107,'VEUVE CLICQOWT RICH','8',0,'Bottle','1',0,'0','',3,0,'1569686182','1569686182','1'),(108,'VEUVE CLICQUOT  ROSE','8',1,'Bottle','1',0,'0','',3,0,'1569686194','1569686194','1'),(109,'TERRAZAC MELBEC','8',0,'Bottle','1',0,'0','',0,0,'1569686217','1569686217','1'),(110,'BELEVEDERE PINK GRAPEFRUIT','8',1,'Bottle','1',0,'0','',3,0,'1569686242','1569686242','1'),(111,'BELEVEDERE VODKA INTENSE','8',0,'Bottle','1',0,'0','',3,0,'1569686257','1569686257','1'),(112,'BELEVEDERE VODKA','8',1,'Bottle','1',0,'0','',3,0,'1569686282','1569686282','1'),(113,'BELEVEDERE BLACK RASPBERRY','8',3,'Bottle','1',0,'0','',3,0,'1569686311','1569686311','1'),(114,'CLOUDY BAY','8',15,'Bottle','1',0,'0','',12,3,'1569686341','1569686341','1'),(115,'GLENFIDDICH 21YRS','8',0,'Bottle','1',0,'0','',0,0,'1569847831','1569847831','1'),(116,'DON PERIGNON','8',4,'Bottle','1',0,'0','',3,4,'1569848065','1569848065','1'),(117,'VEUVE CLICQUOT BRUT','8',1,'Bottle','1',0,'0','',3,0,'1569854678','1569854678','1'),(118,'GLENMORANGIE NECTAR\'DOR','8',1,'Bottle','1',0,'0','',3,0,'1570006315','1570006315','1'),(119,'RAZON (RED WINE VIN ROUGE)','8',0,'Bottle','1',0,'0','',60,0,'1572247870','1572247870','1'),(120,'SANGRIA RED WINE','8',0,'Bottle','1',0,'0','',0,0,'1572248057','1572248057','1'),(121,'WHITE WALKER','8',12,'Bottle','1',0,'0','',12,0,'1572509559','1572509559','1'),(122,'CHAMPION MALT','8',144,'Bottle','1',0,'0','',72,72,'1574070342','1574070342','1'),(123,'BLANC CUVEE','8',80,'Bottle','1',0,'0','',72,8,'1574082044','1574082044','1'),(124,'VEGA CEDRON WINE','8',0,'Bottle','1',0,'0','',2,6,'1574082070','1574082070','1'),(125,'FRAGOLINO ROSE','8',6,'Bottle','1',0,'0','',30,0,'1574082098','1574082098','1'),(126,'MARLANGO RED WINE','8',66,'Bottle','1',0,'0','',60,6,'1574082145','1574082145','1'),(127,'CARUSSO','8',18,'Bottle','1',0,'0','',30,0,'1574082171','1574082171','1'),(128,'DOUBLE BLACK','8',0,'Bottle','1',0,'0','',24,0,'1574351215','1574351215','1'),(129,'FOUR LOKO','8',8,'Bottle','1',0,'0','',20,0,'1574458327','1574458327','1'),(130,'FEARLESS ENERGY DRINK','8',36,'Bottle','1',0,'0','',24,12,'1578048333','1578048333','1'),(131,'SMALL LEGEND','8',0,'Bottle','1',0,'0','',120,0,'1578051247','1578051247','1'),(132,'DUBIC MALT','8',48,'Bottle','1',0,'0','',360,0,'1578663150','1578663150','1'),(133,'CRUNCHES GROUNDNUT SMALL','8',0,'Bottle','1',0,'0','',12,0,'1579190226','1579190226','1'),(134,'CRUNCHES GROUNDNUT MEDIUM','8',0,'Bottle','1',0,'0','',3,0,'1579190248','1579190248','1'),(135,'CRUNCHES GROUNDNUT BIG','8',0,'Bottle','1',0,'0','',2,0,'1579190263','1579190263','1'),(136,'FRIUTA JUICE','8',0,'Bottle','1',0,'0','',10,0,'1579263143','1579263143','1'),(137,'PLASTIC FAYROUZ','8',0,'Bottle','1',0,'0','',72,0,'1581516832','1581516832','1'),(138,'CAN ORIGIN','8',0,'Bottle','1',0,'0','',48,0,'1581516972','1581516972','1'),(139,'SMALL ROYAL CHALLENGE','8',0,'Bottle','1',0,'0','',0,0,'1581517357','1581517357','1'),(140,'HAPPY HOUR JUICE','8',80,'Bottle','1',0,'0','',40,50,'1581521418','1581521418','1'),(141,'1960 BEER','8',0,'Bottle','1',0,'0','',12,0,'1581580215','1581580215','1'),(142,'EXTRA SMOOTH STOUT','8',90,'Bottle','1',0,'0','',90,0,'1581587964','1581587964','1'),(143,'SMALL CAAMPARI','8',20,'Bottle','1',0,'0','',24,0,'1581692480','1581692480','1'),(144,'CAN STAR RADLER','8',0,'Bottle','1',0,'0','',48,0,'1583136917','1583136917','1'),(145,'BOTTLE ORIGIN BITTERS','8',9,'Bottle','1',0,'0','',0,0,'1584100780','1584100780','1'),(146,'LA SIEN BOTTLE WATER 75CL','3',216,'Bottle','1',0,'0','54334767774534',564,0,'1591431430','1591431430','1'),(147,'TROPHY STOUT','8',132,'Bottle','1',0,'0','',120,48,'1595336845','1595336845','1'),(148,'SHISHA FLAVOR','8',16,'Bottle','1',0,'0','',20,0,'1595669095','1595669095','1'),(149,'BAILEYS DELIGHT','8',0,'Bottle','1',0,'0','',6,0,'1597996672','1597996672','1'),(150,'AKWA FRESH','3',12,'Bottle','1',0,'0','',132,0,'1607603373','1607603373','1'),(151,'BIG SMIRNOFF ICE','8',36,'Bottle','1',0,'0','',120,0,'1610531691','1610531691','1'),(152,'CAN BUDWISER ','8',0,'Bottle','1',0,'0','',24,0,'1611580899','1611580899','1'),(153,'EXTRA ROSE FRANATINA','8',12,'Bottle','1',0,'0','',12,0,'1612352739','1612352739','1'),(154,'GRAN DESSERT','8',6,'Bottle','1',0,'0','',18,0,'1612352774','1612352774','1'),(155,'TROY','8',150,'Bottle','1',0,'0','',100,50,'1613813832','1613813832','1'),(156,'BLUE MALT','8',80,'Bottle','1',0,'0','',100,0,'1613925849','1613925849','1');
/*!40000 ALTER TABLE `tblstore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstorehistory`
--

DROP TABLE IF EXISTS `tblstorehistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstorehistory` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT '0',
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT '0',
  `price` int(50) DEFAULT '0',
  `newstockadded` int(45) DEFAULT '0',
  `stockremove` int(45) DEFAULT '0',
  `status` varchar(45) DEFAULT '' COMMENT 'r-restock, t-transfer',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstorehistory`
--

LOCK TABLES `tblstorehistory` WRITE;
/*!40000 ALTER TABLE `tblstorehistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstorehistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstoretransfer`
--

DROP TABLE IF EXISTS `tblstoretransfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstoretransfer` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT '0',
  `price` int(50) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstoretransfer`
--

LOCK TABLES `tblstoretransfer` WRITE;
/*!40000 ALTER TABLE `tblstoretransfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblstoretransfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `companyname` varchar(72) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `users_role` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `staff_salary` varchar(32) NOT NULL,
  `staff_hiring_date` varchar(32) NOT NULL,
  `photo` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'admin','Francis','Oyeyemi','Elhassan Hotel','698d51a19d8a121ce581499d7b701668','admin@elhassanhotels.com','admin','2016-02-14 18:53:11','','','14555380121454709879+234 818 138 6937Ã¢â‚¬Â¬ 20150427_061539.jpg','1'),(11,'accountant','accountant','Opeyemi','','698d51a19d8a121ce581499d7b701668','manager@elhassanhotels.com','manager','2016-08-28 09:55:19','','','1560167069IMG_20190610_070158[1].jpg','1'),(20,'restaurant','thomas','miriam','','698d51a19d8a121ce581499d7b701668','','restaurant','2018-12-24 00:52:28','','','','1'),(21,'receptionist','QUEEN ','LATIFA','','698d51a19d8a121ce581499d7b701668','','receptionist','2018-12-24 00:52:58','','','','1'),(31,'manager','Onyenjoro','Steve','','698d51a19d8a121ce581499d7b701668','','manager','2019-07-03 14:10:27','','','','1'),(40,'bar','Akpan','Henry','','698d51a19d8a121ce581499d7b701668','','bar','2021-02-12 13:49:26','','','','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waiters`
--

DROP TABLE IF EXISTS `waiters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waiters` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) DEFAULT '',
  `staffid` varchar(45) DEFAULT '',
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usagepermit` varchar(30) DEFAULT '0' COMMENT '0-no access, 1-bar1 only, 2-bar2 only, 3-both bar1 and bar2',
  `issync` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waiters`
--

LOCK TABLES `waiters` WRITE;
/*!40000 ALTER TABLE `waiters` DISABLE KEYS */;
INSERT INTO `waiters` VALUES (1,'Waiter 1 (Salt)','5','salt','2005fba07412ca49fb9090610c3c564a','3','1'),(2,'Waiter 2 (patience)','5','patience','109912e467a62dcd1c3b648cb70f3438','3','1'),(3,'Waiter 3 (Ime)','5','ime','eb38a6e8c9ee996a0e96f11e5d4f19d6','3','1'),(4,'Waiter 4 (maxwell)','5','maxwell','0d35ea79b22e17e6e345899f607fd3c2','3','1'),(5,'waiter 5 (iberedem)','5','iberedem','7807492884744ce1036370a616105604','3','1'),(9,'waiter7(ras)','5','ras','76a59f1a350af1cfd9166594b4f13f05','3','1'),(10,'Emanuela Ulo','11','ella65','a44b32e7d885929f4bc7fe5b2767489a','2','1');
/*!40000 ALTER TABLE `waiters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-23 20:13:12
