--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES (1,'VirtualMeter','solarlog'),(2,'VirtualSwitch',''),(3, 'ISCdriver', '');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_parameters`
--

DROP TABLE IF EXISTS `driver_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver_parameters` (
  `id_driver` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_parameters`
--

LOCK TABLES `driver_parameters` WRITE;
/*!40000 ALTER TABLE `driver_parameters` DISABLE KEYS */;
INSERT INTO `driver_parameters` VALUES (1,'polling'),(1,'url'),(1,'trialid'),(3, 'fifo');
/*!40000 ALTER TABLE `driver_parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feed_10`
--

DROP TABLE IF EXISTS `feed_10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feed_10` (
  `time` int(10) unsigned DEFAULT NULL,
  `data` float DEFAULT NULL,
  `data2` float DEFAULT NULL,
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feed_10`
--

LOCK TABLES `feed_10` WRITE;
/*!40000 ALTER TABLE `feed_10` DISABLE KEYS */;
INSERT INTO `feed_10` VALUES (1391468400,0.000953881,250),(1391468400,0.000631384,150),(1391468400,0.000289615,50),(1391468400,0.000109766,0),(1391468400,0.000319613,100),(1391468400,0.000400983,300),(1391468400,0.00126301,450),(1391468400,0.00182321,500),(1391468400,0.00374415,600),(1391468400,0.000913531,350),(1391468400,0,200),(1391641200,0.00302761,400),(1391641200,0.00291794,250),(1391641200,0.00108877,150),(1391641200,0.00312864,100),(1391641200,0.000170071,0),(1391641200,0.000494998,50),(1391641200,0.00267699,350),(1391641200,0.00875257,500),(1391641200,0.0183567,600),(1391641200,0.00477102,450),(1391641200,0.00274532,300),(1391641200,0.00146946,200),(1391727600,0.000771631,150),(1391727600,0.000921309,100),(1391727600,0.000542171,50),(1391727600,0.000120511,0),(1391727600,0.00127705,200),(1391727600,0.000741758,250),(1391727600,0.00123024,300),(1391727600,0.00123346,350),(1391727600,0.00141371,400),(1391727600,0.0018504,450),(1391727600,0.00699088,500),(1391727600,0.00958798,600);
/*!40000 ALTER TABLE `feed_10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node_driver`
--

DROP TABLE IF EXISTS `node_driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node_driver` (
  `node` int(11) NOT NULL,
  `driver_id` varchar(11) NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_driver_par`
--

DROP TABLE IF EXISTS `user_driver_par`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_driver_par` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_driver_par`
--

LOCK TABLES `user_driver_par` WRITE;
/*!40000 ALTER TABLE `user_driver_par` DISABLE KEYS */;
INSERT INTO `user_driver_par` VALUES (1,1,'url','http://localhost/~cossmic/meanpower/powerjson'),(2,1,'polling','10'),(3,1,'trialid','10318'),(4,2,'node','2'),(5,2,'url','http://localhost/~salvatore/cossmic/trials/deviceControl/jsoncmd.php'),(6,2,'device','bulb1'),(7,3,'fifo','/var/ISCdriver/command.fifo');
/*!40000 ALTER TABLE `user_driver_par` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_drivers`
--

DROP TABLE IF EXISTS `user_drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
