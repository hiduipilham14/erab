-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: erab
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_diameters`
--

DROP TABLE IF EXISTS `data_diameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_diameters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_diameters`
--

LOCK TABLES `data_diameters` WRITE;
/*!40000 ALTER TABLE `data_diameters` DISABLE KEYS */;
INSERT INTO `data_diameters` VALUES (6,'2\"','inchi','2025-07-20 00:28:42','2025-07-20 00:28:42'),(7,'4\"','inchi','2025-07-20 00:28:52','2025-07-20 00:28:52'),(8,'6\"','inchi','2025-07-20 00:29:03','2025-07-20 00:29:03'),(9,'8\"','inchi','2025-07-20 00:29:15','2025-07-20 00:29:15'),(10,'3\"','inchi','2025-07-27 19:24:31','2025-07-27 19:33:12'),(11,'1\"','inchi','2025-07-27 19:24:55','2025-07-27 19:34:50'),(12,'1,5\"','inchi','2025-07-27 19:25:08','2025-07-27 19:34:40'),(13,'10\"','inchi','2025-07-27 19:25:30','2025-07-27 19:34:32'),(14,'12\"','inchi','2025-07-27 19:26:22','2025-07-27 19:34:24'),(15,'16\"','inchi','2025-07-27 19:26:40','2025-07-27 19:34:15'),(16,'14\"','inchi','2025-07-27 19:28:05','2025-07-27 19:34:04'),(17,'1/2\"','inchi','2025-07-27 19:28:33','2025-07-27 19:33:28'),(18,'3/4\"','inchi','2025-07-27 19:28:50','2025-07-27 19:33:20'),(19,'0','-','2025-08-05 19:09:42','2025-08-05 19:09:42');
/*!40000 ALTER TABLE `data_diameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_divisis`
--

DROP TABLE IF EXISTS `data_divisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_divisis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_divisis`
--

LOCK TABLES `data_divisis` WRITE;
/*!40000 ALTER TABLE `data_divisis` DISABLE KEYS */;
INSERT INTO `data_divisis` VALUES (9,'Area Petarukan','-','2025-07-20 00:25:56','2025-07-27 19:40:09'),(10,'Area Taman','-','2025-07-20 00:26:19','2025-07-27 19:40:01'),(11,'Area Pemalang Kota','-','2025-07-20 00:26:39','2025-07-27 19:39:53'),(12,'Area Warungpring','-','2025-07-20 00:26:54','2025-07-27 19:39:46'),(13,'Area Randudongkal','-','2025-07-20 00:27:26','2025-07-27 19:39:33'),(14,'Area Moga','-','2025-07-20 00:27:41','2025-07-27 19:39:25'),(15,'Area Pulosari','-','2025-07-20 00:28:13','2025-07-27 19:39:15');
/*!40000 ALTER TABLE `data_divisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_jaringan_barus`
--

DROP TABLE IF EXISTS `data_jaringan_barus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_jaringan_barus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` bigint unsigned NOT NULL,
  `vol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pipa` bigint unsigned NOT NULL,
  `diameter` bigint unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_jaringan_barus_divisi_foreign` (`divisi`),
  KEY `data_jaringan_barus_jenis_pipa_foreign` (`jenis_pipa`),
  KEY `data_jaringan_barus_diameter_foreign` (`diameter`),
  CONSTRAINT `data_jaringan_barus_diameter_foreign` FOREIGN KEY (`diameter`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_jaringan_barus_divisi_foreign` FOREIGN KEY (`divisi`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_jaringan_barus_jenis_pipa_foreign` FOREIGN KEY (`jenis_pipa`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_jaringan_barus`
--

LOCK TABLES `data_jaringan_barus` WRITE;
/*!40000 ALTER TABLE `data_jaringan_barus` DISABLE KEYS */;
INSERT INTO `data_jaringan_barus` VALUES (16,'2025-09-03','Pemasangan Jaringan Pipa',11,'1296','','Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810',4,8,'Sesuai RAB','2025-09-03 18:55:05','2025-09-03 18:55:05'),(18,'2025-09-03','Pemasangan Jaringan Pipa',11,'10','','Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810',6,8,'Sesuai RAB','2025-09-03 18:56:59','2025-09-03 18:56:59'),(19,'2025-09-03','Pemasangan Jaringan Pipa',11,'7','','Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810',4,7,'Sesuai RAB','2025-09-03 18:58:35','2025-09-03 18:58:35');
/*!40000 ALTER TABLE `data_jaringan_barus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_penggantian_pipas`
--

DROP TABLE IF EXISTS `data_penggantian_pipas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_penggantian_pipas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `divisi` bigint unsigned NOT NULL,
  `pipa_lama` bigint unsigned NOT NULL,
  `pipa_baru` bigint unsigned NOT NULL,
  `dn_lama` bigint unsigned NOT NULL,
  `dn_baru` bigint unsigned NOT NULL,
  `th_pemasangan_lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `th_pemasangan_baru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol_lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol_baru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_penggantian_pipas_divisi_foreign` (`divisi`),
  KEY `data_penggantian_pipas_pipa_lama_foreign` (`pipa_lama`),
  KEY `data_penggantian_pipas_pipa_baru_foreign` (`pipa_baru`),
  KEY `data_penggantian_pipas_dn_lama_foreign` (`dn_lama`),
  KEY `data_penggantian_pipas_dn_baru_foreign` (`dn_baru`),
  CONSTRAINT `data_penggantian_pipas_divisi_foreign` FOREIGN KEY (`divisi`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_penggantian_pipas_dn_baru_foreign` FOREIGN KEY (`dn_baru`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_penggantian_pipas_dn_lama_foreign` FOREIGN KEY (`dn_lama`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_penggantian_pipas_pipa_baru_foreign` FOREIGN KEY (`pipa_baru`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_penggantian_pipas_pipa_lama_foreign` FOREIGN KEY (`pipa_lama`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_penggantian_pipas`
--

LOCK TABLES `data_penggantian_pipas` WRITE;
/*!40000 ALTER TABLE `data_penggantian_pipas` DISABLE KEYS */;
INSERT INTO `data_penggantian_pipas` VALUES (8,'2025-09-23',12,5,5,12,16,'sdfdsfdsf','sdfdsfsdf','sdfdsfsd','sdfdsf','sdfdsf','sdfsdfds','fdsfdsvdsf','2025-09-07 20:13:04','2025-09-07 20:13:04');
/*!40000 ALTER TABLE `data_penggantian_pipas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pipas`
--

DROP TABLE IF EXISTS `data_pipas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_pipas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pipas`
--

LOCK TABLES `data_pipas` WRITE;
/*!40000 ALTER TABLE `data_pipas` DISABLE KEYS */;
INSERT INTO `data_pipas` VALUES (4,'HDPE','-','2025-07-20 00:29:42','2025-07-20 00:29:42'),(5,'PVC','-','2025-07-20 00:29:51','2025-07-20 00:29:51'),(6,'GI','-','2025-07-20 00:29:59','2025-07-20 00:29:59'),(7,'Tidak Ada','-','2025-08-05 19:09:23','2025-08-05 19:09:23');
/*!40000 ALTER TABLE `data_pipas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rabs`
--

DROP TABLE IF EXISTS `data_rabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rabs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `tanggal_pelaksana` date NOT NULL,
  `no_spk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_pemeliharaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `honor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rabs`
--

LOCK TABLES `data_rabs` WRITE;
/*!40000 ALTER TABLE `data_rabs` DISABLE KEYS */;
INSERT INTO `data_rabs` VALUES (115,'2025-01-24','2025-09-05','690/003/SPK/IV/2025','Perbaikan Aliran, Pemasangan Special Crosing Pipa GI DN 6 Inch, l = 73 M, Jembatan Kali Elon Beji','','','73','Jembatan Kali Elon Beji Kecamatan Taman, Kabupaten Pemalang','204405000','Belum Ada Pencairan S/D Bulan Juni 2025','','0','193800000','200550000','Belum',NULL,NULL,NULL,'2025-07-28 00:49:09','2025-09-04 23:53:51'),(117,'2025-09-05','2025-09-05','0','yyyy','yyyyy','yyyyy','0','rrrrrrrrrr','0','ttttttttt','0','0','0','0','0',NULL,NULL,NULL,'2025-09-05 01:09:00','2025-09-05 01:09:00');
/*!40000 ALTER TABLE `data_rabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_update_gis`
--

DROP TABLE IF EXISTS `data_update_gis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_update_gis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `divisi_id` bigint unsigned NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate_valve_gis` bigint unsigned NOT NULL,
  `gate_valve_lap` bigint unsigned NOT NULL,
  `pipa_gis` bigint unsigned NOT NULL,
  `pipa_lap` bigint unsigned NOT NULL,
  `air_valve_gis` bigint unsigned NOT NULL,
  `air_valve_lap` bigint unsigned NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_update_gis_divisi_id_foreign` (`divisi_id`),
  KEY `data_update_gis_gate_valve_gis_foreign` (`gate_valve_gis`),
  KEY `data_update_gis_gate_valve_lap_foreign` (`gate_valve_lap`),
  KEY `data_update_gis_pipa_gis_foreign` (`pipa_gis`),
  KEY `data_update_gis_pipa_lap_foreign` (`pipa_lap`),
  KEY `data_update_gis_air_valve_gis_foreign` (`air_valve_gis`),
  KEY `data_update_gis_air_valve_lap_foreign` (`air_valve_lap`),
  CONSTRAINT `data_update_gis_air_valve_gis_foreign` FOREIGN KEY (`air_valve_gis`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_air_valve_lap_foreign` FOREIGN KEY (`air_valve_lap`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_gate_valve_gis_foreign` FOREIGN KEY (`gate_valve_gis`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_gate_valve_lap_foreign` FOREIGN KEY (`gate_valve_lap`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_pipa_gis_foreign` FOREIGN KEY (`pipa_gis`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `data_update_gis_pipa_lap_foreign` FOREIGN KEY (`pipa_lap`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_update_gis`
--

LOCK TABLES `data_update_gis` WRITE;
/*!40000 ALTER TABLE `data_update_gis` DISABLE KEYS */;
INSERT INTO `data_update_gis` VALUES (8,'2025-09-03',11,'Update Gate Valve','-6.932155,109.386174','-',6,6,4,4,19,19,'Sewaka','Jumlah Data Gate Valve\r\nGate Valve DN 2\" WO : 1 Buah\r\nSudah Terupdate','2025-09-02 19:38:28','2025-09-03 00:12:17'),(9,'2025-09-03',11,'Update Gate Valve','-6.932282,109.388045','-',10,10,4,4,19,19,'Sewaka','Jumlaj Data Gate Valve :\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate','2025-09-02 19:49:31','2025-09-03 00:12:36'),(10,'2025-08-18',11,'Update Gate Valve','-6.933256,109.383939','-',10,10,4,4,19,19,'Sewaka','Jumlah Data Gate Valve\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate','2025-09-02 20:56:52','2025-09-04 01:34:42'),(11,'2025-08-12',11,'Update Gate Valve','-6.904766,109.362826','-',8,8,4,4,19,19,'Bojongnangka','Jumlah Data Gate Valve:\r\nGate Valve DN 6\" : 2 Buah\r\nSudah Terupdate','2025-09-02 23:39:01','2025-09-04 01:34:25'),(12,'2025-08-08',11,'Update Gate Valve','-6.894006,109.358516','-',8,8,4,4,19,19,'Bojongnangka','Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 2 Buah\r\nSudah Terupdate','2025-09-02 23:41:36','2025-09-04 01:34:09'),(14,'2025-08-04',10,'Update Gate Valve','-6.894106,109.417655','-',8,8,4,4,19,19,'Beji','Jumlah Data Gate Valve :\r\nGate Valve 6\" : 2 Buah\r\nSudah Terupdate','2025-09-02 23:46:55','2025-09-04 01:33:55'),(15,'2025-08-04',10,'Update Gate Valve','-6.894123,109.417696','-',8,8,4,4,19,19,'Beji','Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 1 Buah\r\nSudah Terupdate','2025-09-02 23:50:19','2025-09-04 01:33:17'),(16,'2025-08-04',10,'Update Air Valve','-6.894106,109.418254','-',19,19,6,6,6,6,'Beji','Jumlah Data Air Valve :\r\nAir Valve DN 2\" : 1 Buah\r\nSudah Terupdate','2025-09-02 23:53:27','2025-09-04 01:32:59'),(17,'2025-08-04',10,'Update Gate Valve','-6.894029,109.418189','-',10,8,5,5,19,19,'Beji','Jumlaj Data Gate Valve :\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate','2025-09-02 23:57:30','2025-09-04 01:32:41'),(19,'2025-08-04',10,'Update Gate Valve','-6.894123,109.417696','-',7,7,4,4,19,19,'Beji','Jumlah Data Gate Valve :\r\nGate Valve DN 4\" WO : 1 Buah\r\nSudah Terupdate','2025-09-03 00:05:33','2025-09-04 01:32:27'),(20,'2025-08-04',10,'Update Gate Valve','-6.894029,109.418189','-',8,8,5,5,19,19,'Beji','Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 1 Buah\r\nSudah Terupdate','2025-09-03 00:07:39','2025-09-04 01:32:07'),(23,'2025-08-04',11,'Update Gate Valve','-6.920239,109.384379','-',7,7,4,4,19,19,'Bojongbata','Jumlah Data Gate Valve :\r\nGate Valve DN 4\" : 1 Buah\r\nSudah Terupdate','2025-09-03 00:22:20','2025-09-04 01:31:50'),(24,'2025-09-11',10,'3534','34534','3454',15,16,5,5,16,18,'3454334','edfsdsd','2025-09-05 16:44:15','2025-09-05 16:44:24');
/*!40000 ALTER TABLE `data_update_gis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diameter_jaringan`
--

DROP TABLE IF EXISTS `diameter_jaringan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diameter_jaringan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `diameter` bigint unsigned NOT NULL,
  `data_jaringan_barus_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diameter_jaringan_diameter_foreign` (`diameter`),
  KEY `diameter_jaringan_data_jaringan_barus_id_foreign` (`data_jaringan_barus_id`),
  CONSTRAINT `diameter_jaringan_data_jaringan_barus_id_foreign` FOREIGN KEY (`data_jaringan_barus_id`) REFERENCES `data_jaringan_barus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `diameter_jaringan_diameter_foreign` FOREIGN KEY (`diameter`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diameter_jaringan`
--

LOCK TABLES `diameter_jaringan` WRITE;
/*!40000 ALTER TABLE `diameter_jaringan` DISABLE KEYS */;
/*!40000 ALTER TABLE `diameter_jaringan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenispipa_jaringan`
--

DROP TABLE IF EXISTS `jenispipa_jaringan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenispipa_jaringan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_pipa` bigint unsigned NOT NULL,
  `data_jaringan_barus_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenispipa_jaringan_jenis_pipa_foreign` (`jenis_pipa`),
  KEY `jenispipa_jaringan_data_jaringan_barus_id_foreign` (`data_jaringan_barus_id`),
  CONSTRAINT `jenispipa_jaringan_data_jaringan_barus_id_foreign` FOREIGN KEY (`data_jaringan_barus_id`) REFERENCES `data_jaringan_barus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jenispipa_jaringan_jenis_pipa_foreign` FOREIGN KEY (`jenis_pipa`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenispipa_jaringan`
--

LOCK TABLES `jenispipa_jaringan` WRITE;
/*!40000 ALTER TABLE `jenispipa_jaringan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenispipa_jaringan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporangis`
--

DROP TABLE IF EXISTS `laporangis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporangis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporangis`
--

LOCK TABLES `laporangis` WRITE;
/*!40000 ALTER TABLE `laporangis` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporangis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (52,'2014_10_12_000000_create_users_table',1),(53,'2014_10_12_100000_create_password_reset_tokens_table',1),(54,'2019_08_19_000000_create_failed_jobs_table',1),(55,'2019_12_14_000001_create_personal_access_tokens_table',1),(56,'2025_06_24_144111_create_data_divisis_table',1),(57,'2025_06_24_144121_create_data_diameters_table',1),(58,'2025_06_24_144127_create_data_pipas_table',1),(59,'2025_06_25_001431_create_data_rabs_table',1),(60,'2025_06_25_011130_create_data_update_gis_table',1),(61,'2025_06_25_011143_create_data_jaringan_barus_table',1),(62,'2025_06_25_011154_create_data_penggantian_pipas_table',1),(63,'2025_06_30_021523_create_laporangis_table',2),(64,'2025_06_30_021845_create_permission_tables',2),(65,'2025_06_30_024309_add_group_to_permissions_table',3),(66,'2025_06_30_182948_add_role_to_user',4),(67,'2025_06_30_183718_add_role_to_users',5),(68,'2025_06_30_201645_add_image_and_statust_to_users',6),(69,'2025_06_30_205250_add_username_to_users',7),(70,'2025_09_08_080310_create_tahun_table',8),(71,'2025_09_08_082500_create_volume_jaringan_table',9),(72,'2025_09_08_082510_create_jenispipa_jaringan_table',9),(73,'2025_09_08_082517_create_diameter_jaringan_table',9),(74,'2025_09_08_143545_create_spam_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (4,'App\\Models\\User',3),(12,'App\\Models\\User',6),(11,'App\\Models\\User',7),(6,'App\\Models\\User',9);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (119,'lihat-akses','web','2025-06-30 14:37:19','2025-06-30 14:37:19','akses'),(120,'edit-akses','web','2025-06-30 14:37:19','2025-06-30 14:37:19','akses'),(121,'lihat-diameter','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-diameter'),(122,'tambah-diameter','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-diameter'),(123,'hapus-diameter','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-diameter'),(124,'edit-diameter','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-diameter'),(125,'lihat-divisi','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-divisi'),(126,'tambah-divisi','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-divisi'),(127,'edit-divisi','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-divisi'),(128,'hapus-divisi','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-divisi'),(129,'lihat-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-pipa'),(130,'tambah-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-pipa'),(131,'edit-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-pipa'),(132,'hapus-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-pipa'),(133,'lihat-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-rab'),(134,'tambah-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-rab'),(135,'edit-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-rab'),(136,'hapus-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','data-rab'),(137,'lihat-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','update-gis'),(138,'tambah-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','update-gis'),(139,'edit-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','update-gis'),(140,'hapus-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','update-gis'),(141,'lihat-jaringan-baru','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jaringan-baru'),(142,'tambah-jaringan-baru','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jaringan-baru'),(143,'edit-jaringan-baru','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jaringan-baru'),(144,'hapus-jaringan-baru','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jaringan-baru'),(145,'buat-penggantian-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','penggantian-pipa'),(146,'lihat-penggantian-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','penggantian-pipa'),(147,'edit-penggantian-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','penggantian-pipa'),(148,'hapus-penggantian-pipa','web','2025-06-30 14:37:19','2025-06-30 14:37:19','penggantian-pipa'),(149,'buat-laporan-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-rab'),(150,'lihat-laporan-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-rab'),(151,'edit-laporan-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-rab'),(152,'hapus-laporan-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-rab'),(153,'ekspor-laporan-rab','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-rab'),(154,'buat-laporan-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-gis'),(155,'lihat-laporan-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-gis'),(156,'edit-laporan-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-gis'),(157,'hapus-laporan-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-gis'),(158,'ekspor-laporan-gis','web','2025-06-30 14:37:19','2025-06-30 14:37:19','laporan-gis'),(159,'lihat-pengguna','web','2025-06-30 14:37:19','2025-06-30 14:37:19','pengguna'),(160,'tambah-pengguna','web','2025-06-30 14:37:19','2025-06-30 14:37:19','pengguna'),(161,'edit-pengguna','web','2025-06-30 14:37:19','2025-06-30 14:37:19','pengguna'),(162,'hapus-pengguna','web','2025-06-30 14:37:19','2025-06-30 14:37:19','pengguna'),(163,'tambah-profile','web','2025-06-30 14:37:19','2025-06-30 14:37:19','profile'),(164,'edit-profile','web','2025-06-30 14:37:19','2025-06-30 14:37:19','profile'),(165,'hapus-profile','web','2025-06-30 14:37:19','2025-06-30 14:37:19','profile'),(166,'lihat-profile','web','2025-06-30 14:37:19','2025-06-30 14:37:19','profile'),(167,'tambah-jabatan','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jabatan'),(168,'edit-jabatan','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jabatan'),(169,'hapus-jabatan','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jabatan'),(170,'lihat-jabatan','web','2025-06-30 14:37:19','2025-06-30 14:37:19','jabatan');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (119,4),(120,4),(121,4),(122,4),(123,4),(124,4),(125,4),(126,4),(127,4),(128,4),(129,4),(130,4),(131,4),(132,4),(133,4),(134,4),(135,4),(136,4),(137,4),(138,4),(139,4),(140,4),(141,4),(142,4),(143,4),(144,4),(145,4),(146,4),(147,4),(148,4),(149,4),(150,4),(151,4),(152,4),(153,4),(154,4),(155,4),(156,4),(157,4),(158,4),(159,4),(160,4),(161,4),(162,4),(163,4),(164,4),(165,4),(166,4),(167,4),(168,4),(169,4),(170,4),(121,5),(122,5),(123,5),(124,5),(125,5),(126,5),(127,5),(128,5),(129,5),(130,5),(131,5),(132,5),(133,5),(134,5),(135,5),(136,5),(137,5),(138,5),(139,5),(140,5),(141,5),(142,5),(143,5),(144,5),(145,5),(146,5),(147,5),(148,5),(149,5),(150,5),(151,5),(152,5),(153,5),(154,5),(155,5),(156,5),(157,5),(158,5),(166,5),(167,5),(121,6),(125,6),(129,6),(133,6),(137,6),(141,6),(146,6),(150,6),(155,6),(159,6),(166,6),(170,6),(121,11),(122,11),(123,11),(124,11),(125,11),(126,11),(127,11),(128,11),(129,11),(130,11),(131,11),(132,11),(133,11),(134,11),(135,11),(136,11),(137,11),(138,11),(139,11),(140,11),(141,11),(142,11),(143,11),(144,11),(145,11),(146,11),(147,11),(148,11),(149,11),(150,11),(151,11),(152,11),(153,11),(154,11),(155,11),(156,11),(157,11),(158,11),(133,12),(134,12),(135,12),(136,12),(149,12),(150,12),(151,12),(152,12),(153,12),(154,12),(155,12),(156,12),(157,12),(158,12);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'Super Admin',NULL,'web','2025-06-29 11:21:05','2025-06-29 11:21:05'),(5,'Admin',NULL,'web','2025-06-29 11:21:05','2025-06-29 11:21:05'),(6,'User',NULL,'web','2025-06-29 11:21:05','2025-06-29 11:21:05'),(11,'Admin GIS',NULL,'web','2025-07-27 18:41:21','2025-08-24 20:56:24'),(12,'Admin Perencanaan',NULL,'web','2025-07-27 18:41:44','2025-08-24 20:56:51');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spam`
--

DROP TABLE IF EXISTS `spam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spam` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_existing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permasalahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindak_lanjut` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_existing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_permasalahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tindak_lanjut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_spam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spam`
--

LOCK TABLES `spam` WRITE;
/*!40000 ALTER TABLE `spam` DISABLE KEYS */;
INSERT INTO `spam` VALUES (7,'2025-09-12','sdfdfsd','dfsdsfdsf','sdfdsf','sdf sdfdfsd','uploads/1757377350_2516edbf-fb4c-4588-9416-0cf299558353_Go-Biz_20230111_011227.jpeg','uploads/1757377350_4514759.png','uploads/1757377350_Borussia_Dortmund_logo.svg.png','uploads/1757377350_images.jpg','2025-09-08 17:22:30','2025-09-08 17:22:30','sdfsd dsf');
/*!40000 ALTER TABLE `spam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun`
--

DROP TABLE IF EXISTS `tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tahun` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun`
--

LOCK TABLES `tahun` WRITE;
/*!40000 ALTER TABLE `tahun` DISABLE KEYS */;
/*!40000 ALTER TABLE `tahun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'super admin','administrator','$2y$12$XwugayWOB.LjhYH.ITVpBuFu7LGTbcwmePP8/2VjA9fn8UTxeSfzG',4,NULL,1,'2025-06-30 14:49:00','2025-07-11 21:12:13'),(6,'Perencanaan','admin01','$2y$12$ZU14p0l2BfiaT0PA4SCW2.mrhPCwyqTBm3GVzrT42sBRgJMwiGUhu',12,NULL,1,'2025-07-20 03:19:14','2025-07-27 18:44:40'),(7,'GIS','admin02','$2y$12$qesT.LWOkT10bxVppPp.4.iZVVaRHs7IkbeyJXpLrztNauGYjKMkG',11,NULL,1,'2025-07-20 03:21:12','2025-07-27 18:44:48'),(9,'user01','admin','$2y$12$ZlxskYdzcX2l96T5CYjkgOwKNbqwcyyf0nBOFlNROP9PCNBYs0Cqa',6,NULL,1,'2025-07-27 06:38:28','2025-07-27 06:38:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volume_jaringan`
--

DROP TABLE IF EXISTS `volume_jaringan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `volume_jaringan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_jaringan_barus_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `volume_jaringan_data_jaringan_barus_id_foreign` (`data_jaringan_barus_id`),
  CONSTRAINT `volume_jaringan_data_jaringan_barus_id_foreign` FOREIGN KEY (`data_jaringan_barus_id`) REFERENCES `data_jaringan_barus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volume_jaringan`
--

LOCK TABLES `volume_jaringan` WRITE;
/*!40000 ALTER TABLE `volume_jaringan` DISABLE KEYS */;
/*!40000 ALTER TABLE `volume_jaringan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'erab'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-09  7:35:50
