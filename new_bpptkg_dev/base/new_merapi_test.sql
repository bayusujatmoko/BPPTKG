-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 103.87.160.212    Database: new_merapi
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `cuaca_cerah`
--

DROP TABLE IF EXISTS `cuaca_cerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuaca_cerah` (
  `id_cuaca_cerah` int(11) NOT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_cuaca_cerah`),
  KEY `fk_cuaca_cerah_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_cuaca_cerah_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuaca_cerah`
--

LOCK TABLES `cuaca_cerah` WRITE;
/*!40000 ALTER TABLE `cuaca_cerah` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuaca_cerah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fenomena`
--

DROP TABLE IF EXISTS `fenomena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fenomena` (
  `id_fenomena` varchar(10) NOT NULL,
  `fenomena` varchar(100) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_fenomena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fenomena`
--

LOCK TABLES `fenomena` WRITE;
/*!40000 ALTER TABLE `fenomena` DISABLE KEYS */;
INSERT INTO `fenomena` VALUES ('AD','api diam','visual'),('AP','awan panas','visual/seismisitas'),('Gug','guguran','seismisitas'),('Guglv','guguran lava','visual'),('Hemb','hembusan','visual/seismisitas'),('LF','low frekuensi','seismisitas'),('LHF','LHF','seismisitas'),('MP','multiphase','seismisitas'),('SG','suara guguran','visual'),('T','tektonik','seismisitas'),('TJ','tektonik jauh','seismisitas'),('TOR','tornilo','seismisitas'),('TR','tremor','seismisitas'),('VA','vulkanik dalam','seismisitas'),('VB','vulkanik dangkal','seismisitas');
/*!40000 ALTER TABLE `fenomena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `idlink` int(11) NOT NULL,
  `uplink` int(11) DEFAULT NULL,
  `linknama` varchar(100) DEFAULT NULL,
  `linklevel` int(11) DEFAULT NULL,
  `aktif` varchar(45) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `tipe` varchar(45) DEFAULT NULL,
  `linkdesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,0,'[Umum]',0,'Y',1,'-','-'),(2,0,'[Tata Usaha]',0,'Y',1,'seksi','-'),(3,0,'[Seksi Merapi]',0,'Y',1,'seksi','-'),(4,0,'[Metode dan Teknologi]',0,'Y',1,'seksi','-'),(5,0,'[Pengelola Lab]',0,'Y',1,'seksi','-'),(6,2,'[User Pelanggan Lab]',1,'Y',1,'hiden','-'),(7,3,'Tugas',1,'Y',1,'hiden','-'),(8,4,'Tugas',1,'Y',1,'hiden','-'),(9,5,'Tugas',1,'Y',1,'hiden','-'),(11,3,'Foto',1,'Y',2,'img','-'),(12,11,'Kawah',1,'Y',1,'img','-'),(13,11,'Puncak',1,'Y',2,'img','-'),(14,11,'Lereng Atas',1,'Y',3,'img','-'),(15,11,'Lereng Bawah',1,'Y',4,'img','-'),(16,11,'Pos/Stasiun',1,'Y',0,'img','-'),(17,3,'Laporan',1,'Y',1,'list','-'),(18,17,'Harian',1,'Y',1,'list','-'),(19,17,'Mingguan',1,'Y',2,'list','-'),(20,17,'Tengah Tahun',2,'Y',3,'list','-'),(21,17,'Tahunan',3,'Y',4,'list','-'),(22,17,'Kejadian',4,'Y',5,'list','-'),(23,3,'Log',1,'Y',5,'list','-'),(24,23,'Log Pos',1,'Y',1,'list','-'),(25,23,'Log Stasiun',1,'Y',2,'list','-'),(26,11,'Lain-lain',1,'Y',5,'img','-'),(27,1,'Historis',0,'Y',1,'list','-'),(28,27,'Film',0,'Y',1,'list','-'),(29,27,'Foto',0,'Y',2,'list','-'),(30,27,'Dokumen',0,'Y',4,'list','-'),(31,27,'Audio',0,'Y',3,'list','-'),(32,27,'Perubahan Status',0,'Y',5,'list','-'),(33,17,'Lapangan(SPD)',1,'Y',5,'list','Kumpulan file per laporan kegiatan SPD'),(34,17,'Bulletin',1,'Y',6,'list','-'),(38,3,'Dokumen',1,'Y',1,'list','-'),(39,38,'Historis',1,'Y',1,'list','-'),(40,38,'Perubahan Status',0,'Y',1,'list','-'),(41,38,'Peta',0,'Y',1,'list','-'),(42,38,'KP dan Skripsi',0,'Y',1,'list','-'),(44,3,'Data Monitoring',1,'Y',4,'list','-'),(45,44,'Seismik',1,'Y',1,'list','-'),(46,44,'Tilt',0,'Y',1,'list','-'),(47,44,'EDM',0,'Y',1,'list','-'),(48,44,'GPS',0,'Y',1,'list','-'),(49,44,'Curah Hujan',0,'Y',1,'list','-'),(50,23,'Surat Masuk',0,'Y',1,'list','Scan Surat masuk'),(51,3,'Raw Data Survei',1,'Y',6,'list',''),(52,51,'DEM',1,'Y',1,'list','-'),(54,51,'Grafity',0,'Y',1,'list','-'),(56,51,'SP',0,'Y',1,'list','Self Potential'),(57,51,'Mizon',0,'Y',1,'list','Micro Zonasi'),(58,16,'Pos Babadan',1,'Y',1,'list','Data Foto Pos Babadan'),(59,16,'Pos Jrakah',1,'Y',2,'img','-'),(60,16,'Pos Kaliurang',1,'Y',3,'img','-'),(61,16,'Pos Ngepos',1,'Y',4,'img','-'),(62,16,'Pos Selo',1,'Y',5,'img','-'),(63,16,'Stasiun Pusung London',1,'Y',6,'img','-'),(64,16,'Stasiun Deles',1,'Y',7,'img','-'),(65,16,'Stasiun Klatakan',1,'Y',8,'img','-'),(66,16,'Stasiun Grawah',1,'Y',9,'img','-'),(67,16,'Stasiun Pasar Bubar',1,'Y',10,'img','-'),(68,16,'Stasiun Gunung Ijo',1,'Y',11,'img','-'),(69,0,'Temporer',4,'Y',1,'list','-'),(70,69,'doc',4,'Y',1,'list','-'),(71,69,'mov',4,'Y',2,'list','-'),(72,2,'Gambar',2,'Y',7,'img','-'),(73,72,'Foto BMN',2,'Y',1,'img','-'),(74,2,'Dokumen',2,'Y',6,'list','-'),(75,74,'Umum',2,'Y',1,'list','-'),(76,74,'IT',2,'Y',2,'list','-'),(77,44,'Geo Kimia',1,'Y',6,'list','-'),(78,5,'Akreditasi',1,'Y',7,'list','-'),(79,5,'Foto & Video',1,'Y',3,'list','-'),(80,5,'laporan',1,'Y',2,'list','-'),(81,5,'Manual book & Software al',1,'Y',4,'list','-'),(82,5,'Software lain-lain',1,'Y',5,'list','-'),(83,5,'Lain-lain',1,'Y',6,'list','-'),(84,78,'Dok. lev-1 (panduan mutu)',1,'Y',1,'list','-'),(85,78,'Dok. lev-2 (prosedur mutu)',1,'Y',2,'list','-'),(86,78,'Dok. lev-3 (instruksi kerja)',1,'Y',3,'list','-'),(87,78,'Dok. lev-4 (formulir)',1,'Y',4,'list','-'),(88,78,'Rekaman',1,'Y',5,'list','-'),(89,78,'Dokumen obsolete',1,'Y',6,'list','-'),(90,0,'Dokumen lain-lain',1,'Y',7,'list','-'),(91,86,'Instruksi kerja uji',1,'Y',1,'list','-'),(92,86,'Petunjuk operasional alat',1,'Y',2,'list','-'),(93,86,'Petunjuk perawatan alat',1,'Y',3,'list','-'),(94,86,'Instruksi kerja kusus',1,'Y',4,'list','-'),(95,87,'LHU',2,'Y',1,'list','-'),(96,0,'Archives',1,'Y',1,'list','-'),(97,96,'MONITORING',1,'Y',1,'list','-'),(98,96,'SOSIAL/EKONOMI',1,'Y',3,'list','-'),(99,96,'SURVEY',1,'Y',2,'list','-'),(100,97,'DEFORMASI',2,'Y',1,'list','-'),(101,97,'SEISMIK',2,'Y',2,'list','-'),(102,97,'GEOKIMIA',2,'Y',3,'list','-'),(103,97,'VISUAL',2,'Y',4,'list','-'),(104,97,'GEOFISIKA',2,'Y',5,'list','-'),(105,97,'GEOLOGI',2,'Y',6,'list','-'),(106,97,'Lahar & metrologi',2,'Y',7,'list','-'),(107,99,'GEOFISIKA',2,'Y',1,'list','-'),(108,99,'GEOLOGI',2,'Y',2,'list','-'),(109,99,'GEOKIMIA',2,'Y',3,'list','-'),(110,99,'GIS',2,'Y',4,'list','-'),(111,99,'Sejarah even letusan',2,'Y',5,'list','-'),(112,98,'BUKU DAN JURNAL',2,'Y',1,'list','-'),(113,98,'PRESENTASI',2,'Y',2,'list','-'),(114,98,'SKRIPSI',2,'Y',3,'list','-'),(115,98,'BPS PROP/KAB',2,'Y',4,'list','-'),(116,98,'KERJASAMA',2,'Y',5,'list','-'),(117,98,'INTERNET',2,'Y',6,'list','-'),(118,98,'PENGUATAN KAPASITAS',2,'Y',7,'list','-'),(119,98,'AUDIO VISUAL',2,'Y',8,'list','-'),(120,100,'Tilt',3,'Y',1,'list','-'),(121,100,'EDM',3,'Y',2,'list','-'),(122,100,'GPS',3,'Y',3,'list','-'),(123,109,'PETA SUHU',3,'Y',1,'list','-'),(124,102,'SUHU',3,'Y',1,'list','-'),(125,102,'GAS',3,'Y',2,'list','-'),(126,102,'AIR',3,'Y',3,'list','-'),(127,102,'BATUAN',3,'Y',4,'list','-'),(128,103,'LAPORAN HARIAN',3,'Y',1,'list','-'),(129,103,'FOTO',3,'Y',2,'list','-'),(130,103,'VIDEO',3,'Y',3,'list','-'),(131,103,'ASAP',3,'Y',4,'list','-'),(132,104,'GRAFITY',3,'Y',1,'list','-'),(133,104,'MAGNETIK',3,'Y',2,'list','-'),(134,104,'EKSIENSIO',3,'Y',3,'list','-'),(135,105,'ANALISA MORFOLOGI',3,'Y',1,'list','-'),(136,106,'HUJAN',3,'Y',1,'list','-'),(137,106,'LAHAR',3,'Y',2,'list','-'),(138,107,'GEOLISTRIK',3,'Y',1,'list','-'),(139,107,'GRAFITY',3,'Y',2,'list','-'),(140,107,'AMT',3,'Y',3,'list','-'),(141,107,'SP',3,'Y',4,'list','-'),(142,107,'Lain-lain',3,'Y',5,'list','-'),(143,108,'PETA GEOLOGI',3,'Y',1,'list','-'),(144,108,'GEOKIMIA BATUAN',3,'Y',2,'list','-'),(145,108,'STRATIGAFI',3,'Y',3,'list','-'),(146,108,'HIDROLOGI',3,'Y',4,'list','-'),(147,108,'LAHAR',3,'Y',5,'list','-'),(148,108,'Lain-lain',3,'Y',6,'list','-'),(149,109,'PETA GAS',3,'Y',2,'list','-'),(150,109,'Lain-lain',3,'Y',3,'list','-'),(151,110,'CITRA SATELIT',3,'Y',1,'list','-'),(152,110,'PETA RBI DIGITAL',3,'Y',2,'list','-'),(153,110,'PETA RBI SCAN',3,'Y',3,'list','-'),(154,110,'PETA RESIKO',3,'Y',4,'list','-'),(155,110,'PETA OPRASNAL LAHAR',3,'Y',5,'list','-'),(156,110,'PEMODELAN',3,'Y',6,'list','-'),(157,110,'PETA TEMATIK',3,'Y',7,'list','-'),(158,110,'DEM',3,'Y',8,'list','-'),(159,110,'FOTO UDARA',3,'Y',9,'list','-'),(160,111,'Sejarah',3,'Y',1,'list','-'),(161,101,'Seismik',3,'Y',1,'list','-'),(162,118,'WLPB',3,'Y',1,'list','-'),(163,118,'KUNJUNGAN',3,'Y',2,'list','-'),(164,118,'PELATIHAN',3,'Y',3,'list','-'),(165,118,'SOSIALISASI',3,'Y',4,'list','-'),(166,112,'Journal',3,'Y',1,'list','-'),(167,112,'Scan Buku Lama',3,'Y',2,'list','-'),(168,113,'Presentasi',3,'Y',1,'list','-'),(169,113,'Poster',3,'Y',2,'list','-'),(170,114,'Skripsi',3,'Y',1,'list','-'),(171,114,'KP',3,'Y',2,'list','-'),(172,114,'Thesis',3,'Y',3,'list','-'),(173,115,'Demografi',3,'Y',1,'list','-'),(174,116,'Dalam Negri',3,'Y',1,'list','-'),(175,116,'Luar Negri',3,'Y',2,'list','-'),(176,117,'Dokumen',3,'Y',1,'list','-'),(177,117,'Foto',3,'Y',2,'list','-'),(178,117,'Berita',3,'Y',3,'list','-'),(179,119,'Foto',3,'Y',1,'list','-'),(180,119,'Video',3,'Y',2,'list','-'),(181,2,'Pokja Keuangan',2,'Y',1,'pokja','-'),(183,2,'Pokja BMN',2,'Y',2,'pokja','-'),(185,2,'Pokja Kepegawaian',2,'Y',3,'pokja','-'),(187,2,'Pokja TI dan Perpus',2,'Y',4,'pokja','-'),(191,2,'Pokja PPK',2,'Y',5,'pokja','-'),(192,5,'Pokja Akreditasi',2,'Y',1,'pokja','-');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reflektor`
--

DROP TABLE IF EXISTS `reflektor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reflektor` (
  `kode` varchar(20) NOT NULL,
  `reflector` varchar(45) DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reflektor`
--

LOCK TABLES `reflektor` WRITE;
/*!40000 ALTER TABLE `reflektor` DISABLE KEYS */;
INSERT INTO `reflektor` VALUES ('BAN','Bawah Kendit','2016-11-08'),('BAT0','Reflektor Batu Alien','2017-01-01'),('BBD','Pos Babadan','2016-11-08'),('DEL0','Reflektor Deles','2017-01-01'),('DEL1','Deles 1','2016-11-08'),('DEL2','Deles 1','2016-11-08'),('deles','deles','0000-00-00'),('GEB0','Reflektor Gebyog','2017-01-01'),('GRA','Jurang Grawah','2016-11-08'),('IJO','Gunung Ijo','2016-11-08'),('JRA0','Reflektor Jrakah 0','2017-01-01'),('KLA','Klatakan','2016-11-08'),('KLA - DELG','','2016-11-08'),('L02','Lava Flow 1902','2016-11-08'),('L53','Lava Flow 1953','2016-11-08'),('LAB','Labuhan','2016-11-08'),('MRI0','Reflektor Mriyan','2017-01-01'),('mriyan','mriyan','2014-12-24'),('PASB-BPPTKG','','2016-11-08'),('PASB-DELG','','2016-11-08'),('PASB-KLA','','2016-11-08'),('PASB-MUSEUM','','2016-11-08'),('PASB-PBAB','','2016-11-08'),('PASB-PJRA','','2016-11-08'),('PASB-PLAW','','2016-11-08'),('PASB-PSEL','','0000-00-00'),('PAT','Pathuk','2016-11-08'),('PLA','Pos Plawangan','2016-11-08'),('RB01','Reflektor Babadan 1 tahun 2000','2000-08-22'),('RB02','Reflektor Babadan 2 tahun 2000','2000-08-23'),('RB03','Reflektor Babadan 3 tahun 2000','2000-08-23'),('RB1a','Reflektor Babadan 1 a Tahun 2011','2011-01-01'),('RB1b','Babadan Reflector 1-b','0000-00-00'),('RB2a','Reflektor Babadan 2 Tahun 2011','2011-01-01'),('RB2b','Babadan Reflector 2-b','0000-00-00'),('RB3','Reflektor Babadan 3','2011-01-01'),('RB4','Reflektor Babadan 4','2011-01-01'),('RB71','Reflektor Babadan 1 Tahun 2007','2007-01-14'),('RB72','Reflektor Babadan 2 Tahun 2007','2007-01-11'),('RB73','Reflektor Babadan 3 Tahun 2007','2007-01-11'),('RB74','Reflektor Babadan 4 Tahun 2007','2007-01-11'),('RB75','Reflektor Babadan 5 Tahun 2007','2007-01-11'),('RB76','Reflektor Babadan 6 Tahun 2007','2007-01-11'),('RB77','Reflektor Babadan 7 Tahun 2007','2007-01-11'),('RD1','Reflektor Deles 1','2011-01-01'),('RD2','Reflektor Deles 2','2011-01-01'),('RD71','Reflektor Deles 1 Tahun 2007','2007-01-11'),('RD72','Reflektor Deles 2 Tahun 2007','2007-01-11'),('RD73','Reflektor Deles 3 Tahun 2007','2007-01-11'),('RD92','Reflektor Deles 2 Tahun 2009','2009-08-20'),('RJ1','Jrakah Reflector 1','0000-00-00'),('RJ2','Jrakah Reflector 2','0000-00-00'),('RJ71','Reflektor Jrakah 1 Tahun 2007','2007-01-11'),('RJ72','Reflektor Jrakah 2 Tahun 2007','2007-01-11'),('RK1','Reflektor Kaliurang 1','2011-01-01'),('RK2','Kaliurang Reflector 2','0000-00-00'),('RK3','Kaliurang Reflector 3','0000-00-00'),('RK71','Reflektor Kaliurang 1 Tahun 2007','2007-01-11'),('RK72','Reflektor Kaliurang 2 Tahun 2007','2007-01-11'),('RK73','Reflektor Kaliurang 3 Tahun 2007','2007-01-11'),('RK74','Reflektor Kaliurang 4 Tahun 2007','2007-01-11'),('RM71','Reflektor Mriyan Tahun 2007','2007-01-11'),('RM72','Reflektor Mriyan 2 Tahun 2007','2007-01-11'),('RM73','Reflektor Mriyan 3 Tahun 2007','2007-01-11'),('RS1a','Reflektor Selo 1 a','2011-01-01'),('RS1b','Selo Reflector 1-b','0000-00-00'),('RS2a','Reflektor Selo 2 a','2011-01-01'),('RS2b','Selo Reflector 2-b','0000-00-00'),('RS3a','Selo Reflector 3-a','0000-00-00'),('RS71','Reflektor Selo Tahun 2007','2007-01-11'),('RS72','Reflektor Selo 2 Tahun 2007','2007-01-11'),('SEL0','Reflektor Selo 0','2017-01-01'),('SLK','Selokopo','2016-11-08'),('TRI0','Reflektor Tritis ','2017-01-01');
/*!40000 ALTER TABLE `reflektor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staft`
--

DROP TABLE IF EXISTS `staft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staft` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `usrcode` varchar(255) DEFAULT NULL,
  `usrpass` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `fungsi` int(11) DEFAULT NULL,
  `levelakses` int(11) DEFAULT NULL,
  `stt` varchar(45) DEFAULT NULL,
  `sttdate` datetime DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `stylesnama` text,
  `idi` int(11) DEFAULT NULL,
  `link` int(11) NOT NULL,
  `kodepresensi` int(11) DEFAULT NULL,
  `nik` text,
  `jabatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ids`),
  KEY `fk_pegawai_links1_idx` (`link`),
  CONSTRAINT `fk_pegawai_links1` FOREIGN KEY (`link`) REFERENCES `links` (`idlink`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staft`
--

LOCK TABLES `staft` WRITE;
/*!40000 ALTER TABLE `staft` DISABLE KEYS */;
INSERT INTO `staft` VALUES (2,'pray','$2y$10$m0RnTzU.JeGJTncQd7Qv0ucLXzfvOOMAPorAqmandndPnGg6P9nNu','Prayitno',4,2,'-','2014-10-02 12:06:00','prayitno.bpptkg@gmail.com','text-shadow: 0 0 7px #1E90FF;background:#000000;color: #1E90FF;',1,3,0,'-',''),(3,'ilham','$2y$10$iW3Dn3kAMrRqh0BBi0DQhu2zRF4b0yPwT8.M2cq/.bVXujTCa2Fge','Ilham Nurdien',4,2,'Aktif','2014-10-02 12:06:00','-','font-weight: bold;',1,3,0,'-',''),(4,'naning','$2y$10$nWzqag7j0o5QytpPdGpDlOvad6Jq3sGvdUJkZ9S.FOlT1IOte8.Q6','Nurnaning Aisyah',1,3,'Aktif','2014-10-02 12:06:00','-','font-weight: bold;',1,3,7030192,'19780223 200604 2 001','Penyelidik Bumi Muda'),(5,'agsbudi','$2y$10$34CnctacK9kLF67TChDBQus6kcPxUnr73Mmj2T9vKBRNcUBgKgfb.','Agus Budi Santoso',2,5,'Aktif','2014-10-02 12:06:00','-','font-weight: bold;box-shadow: 10px 10px 2px #888888;',1,3,7030326,'19800827 200502 1 001','Kepala Seksi Gunung Merapi'),(6,'ahmadsopari','$2y$10$RtKzoMIZd6OrlQFh722Z6ODK1MGO/FrvFmGVLPvh0RcduxLCEA0tK','Ahmad Sopari',5,3,'Aktif','2015-04-20 00:00:00','-','font-weight: bold;',1,3,7030176,'19670515 200212 1 002','Pengamat Gunungapi Pelaksana Lanjutan'),(7,'alzwar','$2y$10$6k/1Pd389tzFp/YJl0kBt.JLI2dLEVdUDTkHNMOmuFeNj8xx9dPae','Alzwar Nurmanaji',5,3,'Aktif','2015-04-20 00:00:00','-','font-weight: bold;',1,3,7030402,'19850913 200912 1 001','Pengamat Gunungapi Pelaksana Lanjutan'),(8,'dewi','$2y$10$rpxAMvy3QQacJQ.qpRPE2O/RvQVK0TiE.j7tGAL0xQVXKWoInbwXe','Dewi Sri Sayudi',1,3,'Aktif','2015-04-20 13:58:35','-','font-weight: bold;',1,3,7030122,'19630727 199003 2 001','Perekayasa Madya '),(10,'lasiman','$2y$10$F31jnpZiAVm18qSRtoUFJOiKKrkz.iDD1yHZqNvMUaMANzgCTRZAu','Lasiman Hadi Saputro',5,2,'Aktif','2015-04-20 14:00:05','-','font-weight: bold;',1,3,0,'-',''),(11,'muzani','$2y$10$9F/PrtOthFDC8futwQNzSeqvta1/exB7tctKnJjPOVZly/7si5Ena','Moch. Muzani',1,3,'Aktif','2015-04-20 14:01:25','-','font-weight: bold;',1,3,7030033,'19590609 198103 1 003','Litkayasa Penyelia'),(12,'rozin','$2y$10$XJrENFyUp0/IXFU7mvA1bOAC6aw9Mkv5fwRTDNIoIlMwWWOMMqpGy','Moch. Rozin',1,3,'Aktif','2015-04-20 14:03:00','-','font-weight: bold;',1,3,7030328,'19800826 200502 1 001','Teknisi Laboratorium'),(13,'ngadio','$2y$10$ZHig.uh630CQ2pIWrsfdou/btI91eQNo0KuJmDY8YvNvSFBt5qP46','Ngadio',5,2,'Aktif','2015-04-20 14:03:27','-','font-weight: bold;',1,3,0,'-',''),(14,'cholik','$2y$10$.nh9geyWvZjGzdHYDtE8O.CHQyKRTqAKkkuk4tN6FFYCO8dEe79kW','Noer Cholik',4,2,'Aktif','2015-04-20 14:04:18','-','font-weight: bold;',1,3,0,'-',''),(15,'purwoto','$2y$10$xiV7Lw.eeCkxppat66VVUOH8nZcRVzUYsow2zTcMaOvXq0xs/ynou','Purwoto',5,2,'Aktif','2015-04-20 14:05:20','-','font-weight: bold;',1,3,0,'-',''),(16,'radit','$2y$10$8DMJkwSbnvPX4obsvwWqv.wgvtjdZfPSoRJoG784ynor5JLfj/VP6','Raditya Putra',1,3,'Aktif','2015-04-20 14:05:55','-','font-weight: bold;',1,3,7030452,'19860824 201402 1 003','Penyelidik Bumi '),(17,'rachmat','$2y$10$0B.FRnr16QMunPtTRo1m0OsihuQD2wDRkHypwUP1VlCNqTLQJQXw2','Rahmat Widyo Laksono',4,3,'Aktif','2015-04-20 14:06:32','-','font-weight: bold;',1,3,7030440,'19890327 201012 1 001','Pengamat Gunungapi Pelaksana'),(18,'sunarta','$2y$10$AVPnXzgPD5B8nNCp78r58enO17Gwx6X4FOWgoZj/UQGFsPGYUwADG','Sunarta',4,3,'Aktif','2015-04-20 14:07:01','-','font-weight: bold;',1,3,7030048,'19610504 198303 1 006','Pengamat Gunungapi Penyelia'),(19,'suratno','$2y$10$pGfzFWuFQCdrX2gw59z37uQTWasQ8BUzz00.QlY91NWyKSJqZz8mG','Suratno',5,2,'Aktif','2015-04-20 14:07:32','-','font-weight: bold;',1,3,0,'-',''),(20,'trimujianta','$2y$10$zT/xVC60QaPUr4p76H//b.ZjnqkgN8BFwGPhXw0uEQTdIMn7nXSLq','Trimujianta',5,3,'Aktif','2015-04-20 14:08:06','-','font-weight: bold;',1,3,7030372,'19710904 200701 1 001','Pengamat Gunungapi Pelaksana '),(21,'triyono','$2y$10$6GeyDfNWIoLjLrLJMc.E4eMt9H2luJWEVD2agA8SSq.s3o7IQrA0G','Triyono',5,3,'Aktif','2015-04-20 14:08:31','-','font-weight: bold;',1,3,3050027,'19660213 198903 1 001','Pengamat Gunungapi Penyelia'),(22,'candra','$2y$10$iPdI0pPH8b62Bj5AGPVyReJvGGvbpq307GiVChPE4kC5NfQDw/oku','Wahyu Candra Alam',5,2,'Aktif','2015-04-20 14:08:57','-','font-weight: bold;',1,3,0,'-',''),(23,'yulianto','$2y$10$gO0p2EFImc9iQluiZF0gjuAqqBTUXKF.Pwfooqxu.oiBZpjnQ1lvG','Yulianto',5,3,'Aktif','2015-04-20 14:09:20','-','font-weight: bold;',1,3,7030150,'19720717 199303 1 002','Pengamat Gunungapi Penyelia'),(24,'mawan','$2y$10$qKEembh6BPgkClaR.DUyO.5M6REtt4hBTPBJnOIL0yGsmpEBk/R.u','Hermawan Sapto Purnomo',1,2,'-','2015-04-20 15:01:55','-','font-weight: bold;',1,2,0,'-',''),(25,'bungheru','$2y$10$9aKfLC.AyJ5MGU./KN6bY.O09i1hfYEQFFt2sn1pemdrdg1uNL4MS','Heru Suparwaka',5,3,'Aktif','2015-05-11 10:13:48','-','font-weight: bold;',1,3,7030145,'19640619 199303 1 001','Pengamat Gunungapi Penyelia'),(26,'herpam','$2y$10$kxEGVvmTj4O68RqmqFOHt.jaLT0oMMo6jWNzzVBMKJD.66CU9sePm','Heru Pamungkas',1,3,'Aktif','2015-05-11 10:14:26','-','font-weight: bold;',1,3,7030125,'19580926 199103 1 002','Perekayasa Madya '),(27,'purwono','$2y$10$21wKii9o8Ff.TiU3WSoaHeFHTD4/urqsvGFicBsOELpdJRY0eGmi6','Purwono',5,3,'Aktif','2015-05-26 10:04:04','-','font-weight: bold;',1,3,7030049,'19590701 198303 1 001','Pengamat Gunungapi Penyelia'),(28,'test','$2y$10$I.Bnk4Iw3DH2a0D7xONefOsMH/Jky/GXGZ9ksVsJO2nbXFI.ORVBK','test lab',6,0,'Aktif','2015-06-01 13:52:39','-','font-weight: bold;',2,1,0,'-',''),(29,'hanik','$2y$10$OYLABzF1qI0Kvwg3p11AR.LkuJB1Rf32WNJ1ix7035Kjh3O72m44a','Hanik Humaida',7,5,'Aktif','2015-06-01 13:55:59','-','font-weight: bold;',1,5,7030129,'19650523 199103 2 002','Kepala Seksi Pengelolaan Laboratorium '),(30,'sapa','$2y$10$kwW8JRaRnZNXcSe59Q5h..7TBJog9XpB7pjFj9/obbzWFe7TFtabG','Sapari Dwiyono',1,3,'Aktif','2015-06-23 08:55:35','saparidwiyono@gmail.com','font-weight: bold;',1,4,7030327,'19740318 200502 1 001','Teknisi Laboratorium'),(31,'kusdaryanto','$2y$10$HL8TpGvsP4pkbyy5DW4aMuUZEbovzfoA/0pgA.4pVAZSomk77sNN6','Ir. Kusdaryanto',10,5,'Aktif','2015-06-26 13:25:55','-','font-weight: bold;box-shadow: 10px 10px 2px #888888;',1,2,7030165,' 19630429 199603 1 001','Kepala Sub Bagian Tata Usaha'),(32,'wati','$2y$10$8M7Pf04wsaAoMjxHchVAT.SNv3HyGSLtNOdEzUOBk3Fxyo7BGaqiy','Sri Dharwati',1,3,'Aktif','2015-07-28 11:34:27','-','font-weight: bold;',1,2,8030584,'19800629 200910 2 001','Pengadministrasi Umum'),(33,'igman','$2y$10$.DnYeG.zmU7FxHYvb8qDKeZeCZ5Z5Aq0f/PRa3Xy62lumJpzw9XVu','Ir. I Gusti Made Agung Nandaka',1,7,'Aktif','2015-12-03 10:28:31','igmanandaka@esdm.go.id','font-weight: bold;',1,2,7030014,'19641227 199303 1 005','Kepala BPPTKG'),(34,'harrycahyono','$2y$10$JSxe/oxGu9fjjFKfBuLvXO1iycfnn0wyay0/Fo9Yge0mg6/sj9h/2','Harry Cahyono',9,3,'Aktif','2016-01-18 13:09:18','-','font-weight: bold;',1,5,7030432,'19850708  201012 1 002','Penyelidik Bumi Muda'),(35,'sulistiyani','$2y$10$BfL/sYKIx6u2TPd.3g6DbOgusRI/7.tqarqig5kKB2R03dAcWZbme','Sulistiyani, S. Si.',1,3,'Aktif','2016-02-09 13:45:13','soelistiyani@gmail.com','font-weight: bold;',1,3,9914337,'19871026 201503 2 006','Calon Peneliti'),(36,'nikenangga','$2y$10$mgolPqT1dcGSvbYcHnHQu.JupTeuuzc22FFUCNrJzAQyBsZxwxr96','Niken Angga Rukmini, S.T',1,3,'Aktif','2016-02-09 13:49:27','r.nikenangga@gmail.com','font-weight: bold;',1,5,9914332,'19891127 201503 2 005','CalonPenyelidik Bumi'),(37,'sumartiani','$2y$10$wtucg3tfq8IOVFTDUFi/P.cMKT4rJWVSLqMzk/BlTSe2cJHY5W1mG','Sumartiani, SH',1,3,'Aktif','2016-02-26 14:12:01','-','font-weight: bold;',1,2,7030015,'19681221 199303 2 007','Pengelola Kepegawaian '),(38,'nurudin','$2y$10$8m9KVmUtA6dC2m/FXtj2gOj7W5OxP06fjGfYuAxOz1B703LUYA2um','Nurudin, S.Si.',1,3,'Aktif','2016-03-22 11:18:08','-','font-weight: bold;',1,4,7030275,'19680501 199103 1 004','Kepala Seksi Metode dan Teknologi '),(39,'euis','$2y$10$IHu5nub6uMW.MMx3pZQ26u5.JluPx/j7OrToNbtcns8Lep7zQ5IPa','Ir. N. Euis Sutaningsih, M.Tech.',9,3,'Aktif','2016-03-22 11:19:09','-','font-weight: bold;',1,5,7030128,'19611210 199103 2 001','Penyelidik Bumi Madya'),(40,'sampurag','$2y$10$vKGHSgU4CLx8sDtnQ5DTSeOeuiiIAX/k6brR8froRD8opUa.1xXPm','Ir. Agus Sampurno',1,3,'Aktif','2016-03-22 11:19:53','-','font-weight: bold;',1,4,7030149,'19670810 199303 1 001','Perekayasa Madya'),(41,'isa','isa','Ir. Isa Nurnusanto',1,3,'Aktif','2016-03-22 11:20:22','-','font-weight: bold;',1,4,7030202,'19590803 199403 1 001','Perekayasa Madya'),(42,'sukarnen','sukarnen','Sukarnen',1,3,'Aktif','2016-03-22 11:20:54','-','font-weight: bold;',1,5,7030035,'19590106 198103 1 002','Litkayasa Penyelia'),(43,'suharna','$2y$10$Y0j8.DTaRjrvys/UUZlVyuHS9RohWOMmTAeLviw1CQDSyGRPdrS1u','Suharna',1,3,'Aktif','2016-03-22 11:21:13','-','font-weight: bold;',1,2,7030093,'19610207 198803 1 001','Litkayasa Penyelia'),(44,'sri-h','sri-h','Sri Hartiyatun',1,0,'-','2016-03-22 11:21:45','-','font-weight: bold;',1,5,7030034,'-',''),(45,'mariana','mariana','Siti Mariana',1,0,'-','2016-03-22 11:22:12','-','font-weight: bold;',1,5,0,'-',''),(46,'miswanta','miswanta','Miswanta',1,3,'Aktif','2016-03-22 11:22:33','-','font-weight: bold;',1,4,7030092,'19620516 198803 1 002','Litkayasa Penyelia'),(47,'yustinus','yustinus','Yustinus Sulistyo',1,3,'-','2016-03-22 11:22:58','-','font-weight: bold;',1,5,7030037,'19581101 198103 1 003','Litkayasa Penyelia'),(48,'tannisa','$2y$10$upyBv/inmrKbA9osxYXspef.plCeJEpuVQM4RY1uGCo86M0HEUWBK','Tannisa Apriyanti, A.Md',9,3,'Aktif','2016-03-22 11:23:16','-','font-weight: bold;',1,5,9914379,'19940419 201503 2 001','Calon Teknisi Litkayasa'),(49,'halia','$2y$10$xQQTLwka8ZzbHd.uetdJ6uNRN5rFmury7Rpw/n1VMTB6cwure0Zeu','Halia',1,3,'Aktif','2016-03-22 11:24:28','-','font-weight: bold;',1,2,7030096,'19670605 198803 2 002','Arsiparis Penyelia'),(50,'dhini','$2y$10$fH4tuebRMdPi4zq/EXL2Zu/Zt4y2JfCokblZZQrRt8e4gg7TemEYG','Dhini Novarianayati, A.Md',1,3,'Aktif','2016-03-22 11:24:54','-','font-weight: bold;',1,2,7030205,'19761125 200212 2 001','Analis Kepegawaian Pelaksana Lanjutan'),(51,'tutik','$2y$10$DkTgdBxr/j7qdPdX6o2yHuQHLeem6AjaBo0VjCj2ksfaImyLwJHX2','Tutik Purwanti, S.E.',1,3,'Aktif','2016-03-22 11:25:12','-','font-weight: bold;',1,2,7030227,'19600202 198203 2 002','Pengelola Perbendaharaan'),(52,'kadarilah','$2y$10$meRXdeZkRXFwMz0JOLiz1eIblaumSHa2uGPNIRrxTzBW776.G2yk2','Dra. RR. Sri Kadarilah',1,3,'Aktif','2016-03-22 11:25:37','-','font-weight: bold;',1,2,7030302,'19590317 199303 2 001','Pengelola Kepegawaia'),(54,'slamet','slamet','Slamet Sutrisno, B.Sc.',1,3,'Aktif','2016-03-22 11:26:17','-','font-weight: bold;',1,2,7030266,'19600929 198903 1 013','Pengelola BMN'),(55,'badarudin','badarudin','Badarudin',1,3,'Aktif','2016-03-22 11:26:38','-','font-weight: bold;',1,2,7030296,'19701210 199203 1 001','Bendahara'),(56,'koti','koti','Koti Kittyakara, S.E.',1,3,'Aktif','2016-03-22 11:27:14','-','font-weight: bold;',1,2,7030380,'19810325 200801 2 001','Pengelola Perbendaharaan '),(57,'sigit','$2y$10$ykFcX3qVCaMVfOfwrHeRm.NCJ1kKUKVx1WObUS7X6wjKXYW.QvFJS','Sigit Maryono',1,3,'Aktif','2016-03-22 11:27:28','-','font-weight: bold;',1,2,7030396,'19801002 200811 1 001','Pengelola Rumah Tangga'),(58,'padmadi','padmadi','Drs. Padmadi Heru Wibawa, M.Si',1,3,'Aktif','2016-03-22 11:28:12','-','font-weight: bold;',1,2,2030015,'19621125 199403 1 002','Pengelola Sarana Teknik'),(59,'asman','asman','Asman',1,3,'Aktif','2016-03-22 11:28:27','-','font-weight: bold;',1,4,7030241,'19630808 198603 1 004','Teknisi'),(60,'suryono','suryono','Suryono',1,3,'Aktif','2016-03-22 11:28:40','-','font-weight: bold;',1,2,7030040,'19591102 198103 1 003','Teknisi'),(61,'anton','$2y$10$AcqeocDj7tcRUG1mTyb7MOHI9DGcKWOTLcOWK.HhqYONFOboYsiXG','Anton Sulistio, S.T.',1,3,'Aktif','2016-03-22 11:28:52','-','font-weight: bold;',1,4,7030182,'19730101 200411 1 001','Pengelola Data dan Informasi'),(62,'andika','$2y$10$nOKiXxmg0aCkmDFiLA6U9ePm5Oi6j34a6wCLXb9fVMz6XuCukVYM6','Andika Bayu Aji,ST',1,3,'Aktif','2016-03-22 11:29:04','-','font-weight: bold;',1,5,7030450,'19871010 201402 1 001','Analis Kimia'),(63,'yanti','$2y$10$Q/WSb7p1Kas6wq7t.p.Q7.7WjOi2IwYkuFv4e1MH6nZibXs.LUZmC','Agung Sih Damayanti, A.Md.',1,3,'Aktif','2016-03-22 11:29:25','-','font-weight: bold;',1,5,7030355,'19810525 200604  2 001','Teknisi Laboratorium'),(64,'maji','maji','Suryatmaji',1,0,'-','2016-03-22 11:29:50','-','font-weight: bold;',1,5,7030235,'-',''),(65,'didik','didik','Alusius Didik Sulistyo',1,2,'Aktif','2016-03-22 11:30:33','-','font-weight: bold;',1,4,0,'-',''),(66,'andi','$2y$10$QryJmF0CKCxgxfZ/KjDsG.ecDQ7Q5rLhhmAeDK1HXtNGPLkPg1xsq','Andi Supriyanto',1,2,'Aktif','2016-03-22 11:30:44','-','font-weight: bold;',1,2,0,'-',''),(67,'angga','angga','Angga Riyan Budi Santosa',1,2,'Aktif','2016-03-22 11:30:59','-','font-weight: bold;',1,5,0,'-',''),(68,'rimba','$2y$10$..BevnIPYk.YlWXh543Ip.YIn94Gu6uYWvP5ABWNv6wqNjTzsMjBq','Anis Rimbawanto',1,2,'Aktif','2016-03-22 11:31:11','-','font-weight: bold;',1,2,0,'-',''),(69,'arif','$2y$10$ZDNuqC6fyqNsx9OLccL5A.vkBD2wF5ykFBIVL70yy.NZpfWJDm3bK','Arif  Hidayat',1,2,'Aktif','2016-03-22 11:31:33','-','font-weight: bold;',1,5,0,'-',''),(70,'djono','$2y$10$sbsiCvX.s9V6ggZuYQOapenwKNE6fr17IagsgOY7LnXbv8l1PCR1y','Christian  Sardjono',1,2,'Aktif','2016-03-22 11:31:45','','font-weight: bold;',1,2,0,'-',''),(71,'dwi','$2y$10$KeFoPh3KNPF9NKh2.Zzye.tXNTaYelwj1zLoDER2mq8YFnD0dFK5K','Dwi Setyawan, A.Md',1,2,'Aktif','2016-03-22 11:32:01','-','font-weight: bold;',1,2,0,'-',''),(72,'endri','endri','Endri Setyawan',1,2,'-','2016-03-22 11:32:18','-','font-weight: bold;',1,4,0,'-',''),(73,'febrina','$2y$10$fN/Rjmu.b1b1Nr3CZPK5Gussm7nEwHdNrExf9jULCguMIhDzrZVaK','Febrina Permata Puteri, S.I.Kom',1,2,'Aktif','2016-03-22 11:32:34','-','font-weight: bold;',1,2,0,'-',''),(74,'haryanto','$2y$10$ZoaNxz1ArRAzecS5vVqkH.NPr1qXeyjrfQm9M95PPXAC0nzfkCtvi','Haryanto',1,2,'Aktif','2016-03-22 11:32:48','-','font-weight: bold;',1,2,0,'-',''),(75,'ngadiyo','$2y$10$5KCN.Db1Jefnt.cTO1tmD.1ZlR479grp7PzB8075vxUQKXaUuU7YO','Ngadiyo',5,2,'Aktif','2016-03-22 11:33:23','-','font-weight: bold;',1,3,0,'-',''),(76,'herman','$2y$10$QkKXGHZ2AOGUUuWTo1BBOuqBXE5/Yp.eWpnDjkk2ZQ7KzUs4nV8yG','Nur Suherman',1,2,'Aktif','2016-03-22 11:33:39','-','font-weight: bold;',1,2,0,'-',''),(77,'widi','widi','PC. Widi Prasitawidagda, ST',1,2,'Aktif','2016-03-22 11:33:49','-','font-weight: bold;',1,4,0,'-',''),(78,'dodo','dodo','Sarwo Widodo',1,2,'Aktif','2016-03-22 11:34:09','-','font-weight: bold;',1,5,0,'-',''),(79,'aditya','$2y$10$gDypLH017HdkErQ2YP9LJ.AeS4j3zZ8VkSl4/ySkF5nmXbdtoANAa','Aditya Eka Putra, S.Si',1,2,'Aktif','2016-03-22 11:34:39','-','font-weight: bold;',1,2,0,'-',''),(80,'agust','$2y$10$bdQQ6ajwxjOGkWjCm/5sEO9mFYwW/qHwSd4n6JGBWCfHgy8ttVw/G','Agus Triyono',11,1,'Aktif','2016-03-22 11:35:01','-','font-weight: bold;',1,7,0,'-',''),(81,'galih','$2y$10$5YCW.WYiqCLSpIksg60MHO2DL6P8bd4BPZpkTcE4vaNQ0NxHIpNGy','Galih Aristya Kuswarsono',11,1,'Aktif','2016-03-22 11:35:14','-','font-weight: bold;',1,7,0,'-',''),(82,'henky','$2y$10$g4Id0UbxKRjijl7wJrG1FOixeLnL76ExwThhxlIC2/8mQAyzUtWwW','Henky  Prasetyo',11,1,'Aktif','2016-03-22 11:35:28','-','font-weight: bold;',1,7,0,'-',''),(83,'dion','$2y$10$M8The5SemIAg7T6S4KNNpOSTHbzZLVXYEPOb4ioY6QGEJlrGhOhmi','Isdiyono',11,1,'Aktif','2016-03-22 11:35:44','-','font-weight: bold;',1,7,0,'-',''),(84,'jumali','$2y$10$llqrzEHTR1jlQ4wkMy47.Otp6BRex4oxx6s5PwWd/rJfdwNKYrjGK','Jumali',11,1,'Aktif','2016-03-22 11:35:58','-','font-weight: bold;',1,7,0,'-',''),(85,'sumadi','$2y$10$dY3T6x/pMzr7SR8kJupal.Sqnqer0YNqyNTVlxm6FAmCUFQlYTvrK','Sumadi',11,1,'Aktif','2016-03-22 11:36:17','-','font-weight: bold;',1,7,0,'-',''),(86,'wahyu','$2y$10$yBbHLAbIC40guMPUyfHB.On/SGtTBFf/nL6BptUjP8tsySN2kOyEC','Wahyu Suryadi',11,1,'Aktif','2016-03-22 11:36:29','-','font-weight: bold;',1,7,0,'-',''),(87,'mulyono','mulyono','Mulyono Efendi',1,1,'Aktif','2016-03-22 11:36:50','-','font-weight: bold;',1,2,0,'-',''),(88,'nanang','nanang','Nanang Prajoko',1,1,'Aktif','2016-03-22 11:36:59','-','font-weight: bold;',1,2,0,'-',''),(89,'riyadi','$2y$10$DPikWmaLhGV7NXzgjLQtSujpY97pugg46z546ZaQRpBRxaONV69Ua','Riyadi',1,1,'Aktif','2016-03-22 11:37:06','-','font-weight: bold;',1,2,0,'-',''),(90,'sahyudi','sahyudi','Sahyudi',1,1,'Aktif','2016-03-22 11:37:14','-','font-weight: bold;',1,2,0,'-',''),(91,'santoso','$2y$10$jT7dEv8fwCWPFYSPbDMLnu0UJCYqeS1HFBxDDltBvUyvX4bAUgl..','Santoso',1,1,'Aktif','2016-03-22 11:37:25','-','font-weight: bold;',1,2,0,'-',''),(92,'srisumarti','srisumarti','Sri Sumarti',1,3,'Aktif','2016-04-05 19:04:54','-','font-weight: bold;',1,5,7030009,'19610706 199003 2 003','Perekayasa Muda'),(93,'anas','$2y$10$5wWuDSdfEnHPFzjCXChW1.QVdBMHqhy1811fwRPmE1YQ6UKjzzAru','Anas Setyo Handaru',1,2,'Aktif','2017-03-27 11:20:31','-','font-weight: bold;',1,3,0,'-','');
/*!40000 ALTER TABLE `staft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_asaps`
--

DROP TABLE IF EXISTS `var_asaps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_asaps` (
  `id_asaps` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `warna` char(50) DEFAULT NULL,
  `tekanan_asap` double(4,2) DEFAULT NULL,
  `arah_asap` char(1) DEFAULT NULL,
  `tinggi_asap` double(4,2) DEFAULT NULL,
  `intensitas` char(50) DEFAULT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_asaps`),
  KEY `fk_var_asaps_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_asaps_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_asaps`
--

LOCK TABLES `var_asaps` WRITE;
/*!40000 ALTER TABLE `var_asaps` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_asaps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_edm`
--

DROP TABLE IF EXISTS `var_edm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_edm` (
  `id_edm` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tinggi_alat` double(4,2) DEFAULT NULL,
  `suhu_dalam` double(4,2) DEFAULT NULL,
  `suhu_luar` double(4,2) DEFAULT NULL,
  `ppm` double(4,2) DEFAULT NULL,
  `tekanan_udara` double(8,2) DEFAULT NULL,
  `kelembaban` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_edm`),
  KEY `fk_var_edm_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_edm_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_edm`
--

LOCK TABLES `var_edm` WRITE;
/*!40000 ALTER TABLE `var_edm` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_edm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_foto`
--

DROP TABLE IF EXISTS `var_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` text,
  `keterangan` text,
  `fotografer` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fk_var_foto_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_foto_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_foto`
--

LOCK TABLES `var_foto` WRITE;
/*!40000 ALTER TABLE `var_foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_hujan`
--

DROP TABLE IF EXISTS `var_hujan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_hujan` (
  `id_hujan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_reda` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `curah` double(4,2) DEFAULT NULL,
  `keterangan` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_hujan`),
  KEY `fk_var_hujan_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_hujan_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_hujan`
--

LOCK TABLES `var_hujan` WRITE;
/*!40000 ALTER TABLE `var_hujan` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_hujan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_kesimpulan`
--

DROP TABLE IF EXISTS `var_kesimpulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_kesimpulan` (
  `id_kesimpulan` int(11) NOT NULL AUTO_INCREMENT,
  `narasi` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  `var_status_id_status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kesimpulan`),
  KEY `fk_var_kesimpulan_var_laporan1_idx` (`var_laporan_id_laporan`),
  KEY `fk_var_kesimpulan_var_status1_idx` (`var_status_id_status`),
  CONSTRAINT `fk_var_kesimpulan_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_var_kesimpulan_var_status1` FOREIGN KEY (`var_status_id_status`) REFERENCES `var_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_kesimpulan`
--

LOCK TABLES `var_kesimpulan` WRITE;
/*!40000 ALTER TABLE `var_kesimpulan` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_kesimpulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_klimatologi`
--

DROP TABLE IF EXISTS `var_klimatologi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_klimatologi` (
  `id_klimatologi` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(10) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `suhu` double(4,2) DEFAULT NULL,
  `arah_angin` char(50) DEFAULT NULL,
  `kec_angin` char(50) DEFAULT NULL,
  `kelembaban` double(4,2) DEFAULT NULL,
  `tekanan_udara` double(4,2) DEFAULT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_klimatologi`),
  KEY `fk_var_klimatologi_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_klimatologi_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_klimatologi`
--

LOCK TABLES `var_klimatologi` WRITE;
/*!40000 ALTER TABLE `var_klimatologi` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_klimatologi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_lain_lain`
--

DROP TABLE IF EXISTS `var_lain_lain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_lain_lain` (
  `id_lain_lain` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_lain_lain`),
  KEY `fk_var_lain_lain_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_lain_lain_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_lain_lain`
--

LOCK TABLES `var_lain_lain` WRITE;
/*!40000 ALTER TABLE `var_lain_lain` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_lain_lain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_laporan`
--

DROP TABLE IF EXISTS `var_laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(225) DEFAULT NULL,
  `var_lokasi_lokid` int(11) NOT NULL,
  `staft_ids` int(11) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  UNIQUE KEY `tanggal_UNIQUE` (`tanggal`),
  KEY `fk_var_laporan_var_lokasi1_idx` (`var_lokasi_lokid`),
  KEY `fk_var_laporan_staft1_idx` (`staft_ids`),
  CONSTRAINT `fk_var_laporan_var_lokasi1` FOREIGN KEY (`var_lokasi_lokid`) REFERENCES `var_lokasi` (`lokid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_var_laporan_staft1` FOREIGN KEY (`staft_ids`) REFERENCES `staft` (`ids`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_laporan`
--

LOCK TABLES `var_laporan` WRITE;
/*!40000 ALTER TABLE `var_laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_lokasi`
--

DROP TABLE IF EXISTS `var_lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_lokasi` (
  `lokid` int(11) NOT NULL,
  `loknama` varchar(50) DEFAULT NULL,
  `lokketerangan` text,
  `jenis` varchar(45) DEFAULT NULL,
  `koordinat` text,
  `altitude` text,
  PRIMARY KEY (`lokid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_lokasi`
--

LOCK TABLES `var_lokasi` WRITE;
/*!40000 ALTER TABLE `var_lokasi` DISABLE KEYS */;
INSERT INTO `var_lokasi` VALUES (1,'Ruang Monitoring','Ruang monitoring Kantor BPPTKG','pos',NULL,NULL),(2,'Pos Kaliurang','Pos Kaliurang','pos',NULL,NULL),(3,'Pos Babadan','pos babadan dan sekitarnya','pos',NULL,NULL),(4,'Pos Ngepos','Pos pengamatan Ngepos gunung merapi','pos',NULL,NULL),(5,'pasar bubar','','stasiun',NULL,NULL),(6,'sta labuhan','stasiun','stasiun',NULL,NULL),(7,'sta g.ijo','sta gunung ijo','stasiun',NULL,NULL),(8,'Pos Selo','Pos Selo, salatiga','pos',NULL,NULL),(9,'Pos Jrakah','Pos Jrakah','pos',NULL,NULL),(10,'lainnya','-','umum',NULL,NULL),(11,'Ruang 230','Ruang Server BPPTKG','ruang',NULL,NULL),(12,'woro','Fumarol Sungai Woro','kimia',NULL,NULL),(13,'tradisi','Fumarol Titik Tradisi','kimia',NULL,NULL),(14,'lv.53','Solfatara Lava-53','kimia',NULL,NULL);
/*!40000 ALTER TABLE `var_lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_pengukuran`
--

DROP TABLE IF EXISTS `var_pengukuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_pengukuran` (
  `id_pengukuran` int(11) NOT NULL AUTO_INCREMENT,
  `reflektor` varchar(45) DEFAULT NULL,
  `jarak_miring` double(8,2) DEFAULT NULL,
  `jarak_horizontal` double(8,2) DEFAULT NULL,
  `vertikal1` double(4,2) DEFAULT NULL,
  `vertikal2` double(4,2) DEFAULT NULL,
  `vertikal3` double(4,2) DEFAULT NULL,
  `horizontal1` double(4,2) DEFAULT NULL,
  `horizontal2` double(4,2) DEFAULT NULL,
  `horizontal3` double(4,2) DEFAULT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  `reflektor_kode` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengukuran`),
  KEY `fk_var_pengukuran_var_laporan1_idx` (`var_laporan_id_laporan`),
  KEY `fk_var_pengukuran_reflektor1_idx` (`reflektor_kode`),
  CONSTRAINT `fk_var_pengukuran_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_var_pengukuran_reflektor1` FOREIGN KEY (`reflektor_kode`) REFERENCES `reflektor` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_pengukuran`
--

LOCK TABLES `var_pengukuran` WRITE;
/*!40000 ALTER TABLE `var_pengukuran` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_pengukuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_rekomendasi`
--

DROP TABLE IF EXISTS `var_rekomendasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_rekomendasi`),
  KEY `fk_var_rekomendasi_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_rekomendasi_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_rekomendasi`
--

LOCK TABLES `var_rekomendasi` WRITE;
/*!40000 ALTER TABLE `var_rekomendasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_rekomendasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_seismisitas`
--

DROP TABLE IF EXISTS `var_seismisitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_seismisitas` (
  `id_seismisitas` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `amin` double(8,2) DEFAULT NULL,
  `amax` double(8,2) DEFAULT NULL,
  `dmin` double(8,2) DEFAULT NULL,
  `dmax` double(8,2) DEFAULT NULL,
  `frekuensi` int(11) DEFAULT NULL,
  `fenomena_id_fenomena` varchar(10) NOT NULL,
  PRIMARY KEY (`id_seismisitas`),
  KEY `fk_var_seismisitas_fenomena1_idx` (`fenomena_id_fenomena`),
  CONSTRAINT `fk_var_seismisitas_fenomena1` FOREIGN KEY (`fenomena_id_fenomena`) REFERENCES `fenomena` (`id_fenomena`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_seismisitas`
--

LOCK TABLES `var_seismisitas` WRITE;
/*!40000 ALTER TABLE `var_seismisitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_seismisitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_status`
--

DROP TABLE IF EXISTS `var_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_status` (
  `id_status` varchar(10) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_status`
--

LOCK TABLES `var_status` WRITE;
/*!40000 ALTER TABLE `var_status` DISABLE KEYS */;
INSERT INTO `var_status` VALUES ('A','awas','akan segera meletus, atau sedang meletus, atau keadaan kritis yang dapat menimblkan bencana setiap saat'),('N','normal','Level aktifitas dasar (paling rendah), tidak ada gejala aktifitas tekanan magma'),('S','siaga','keadaan kritis dimana data menunjukkan bahwa aktifitas dapat segera berlanjut ke letusan atau menuju pada keadaan yang dapat menimbulkan bencana'),('W','waspada','ada kenaikan aktifitas di atas level dasar, apapun jenis gejala diperhitungkan');
/*!40000 ALTER TABLE `var_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_visibility`
--

DROP TABLE IF EXISTS `var_visibility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_visibility` (
  `id_visibility` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `visibility` varchar(255) DEFAULT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_visibility`),
  KEY `fk_var_visibility_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_visibility_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_visibility`
--

LOCK TABLES `var_visibility` WRITE;
/*!40000 ALTER TABLE `var_visibility` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_visibility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `var_visual`
--

DROP TABLE IF EXISTS `var_visual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `var_visual` (
  `id_visual` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `durasi` text,
  `intensitas` char(50) DEFAULT NULL,
  `jarak` double(4,2) DEFAULT NULL,
  `arah` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `fenomena_id_fenomena` varchar(10) NOT NULL,
  `var_laporan_id_laporan` int(11) NOT NULL,
  PRIMARY KEY (`id_visual`),
  KEY `fk_var_visual_fenomena1_idx` (`fenomena_id_fenomena`),
  KEY `fk_var_visual_var_laporan1_idx` (`var_laporan_id_laporan`),
  CONSTRAINT `fk_var_visual_fenomena1` FOREIGN KEY (`fenomena_id_fenomena`) REFERENCES `fenomena` (`id_fenomena`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_var_visual_var_laporan1` FOREIGN KEY (`var_laporan_id_laporan`) REFERENCES `var_laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `var_visual`
--

LOCK TABLES `var_visual` WRITE;
/*!40000 ALTER TABLE `var_visual` DISABLE KEYS */;
/*!40000 ALTER TABLE `var_visual` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-13 14:05:07
