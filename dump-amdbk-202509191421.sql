-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: amdbk
-- ------------------------------------------------------
-- Server version	8.4.3

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
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `driver` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES (7,'dfsdfs','dfsdfddddd','2025-07-28 21:36:51','2025-07-28 21:37:00');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
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
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Superadmin','-','2025-09-01 22:31:27','2025-09-01 22:31:27'),(2,'Manager','-','2025-09-01 22:31:39','2025-09-01 22:31:39'),(3,'Kadiv','-','2025-09-17 23:45:08','2025-09-17 23:45:08'),(4,'Produksi','-','2025-09-17 23:45:26','2025-09-17 23:45:26'),(5,'Penjualan','-','2025-09-17 23:45:39','2025-09-17 23:45:39'),(6,'User','-','2025-09-17 23:45:46','2025-09-17 23:45:46');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan_permissions`
--

DROP TABLE IF EXISTS `jabatan_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jabatan_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jabatan_permissions_jabatan_id_permission_id_unique` (`jabatan_id`,`permission_id`),
  KEY `jabatan_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `jabatan_permissions_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jabatan_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan_permissions`
--

LOCK TABLES `jabatan_permissions` WRITE;
/*!40000 ALTER TABLE `jabatan_permissions` DISABLE KEYS */;
INSERT INTO `jabatan_permissions` VALUES (427,1,54,NULL,NULL),(428,1,57,NULL,NULL),(429,1,58,NULL,NULL),(430,1,59,NULL,NULL),(431,1,60,NULL,NULL),(432,1,61,NULL,NULL),(433,1,62,NULL,NULL),(434,1,63,NULL,NULL),(435,1,64,NULL,NULL),(436,1,65,NULL,NULL),(437,1,66,NULL,NULL),(438,1,67,NULL,NULL),(439,1,68,NULL,NULL),(440,1,69,NULL,NULL),(441,1,70,NULL,NULL),(442,1,71,NULL,NULL),(443,1,72,NULL,NULL),(444,1,73,NULL,NULL),(445,1,74,NULL,NULL),(446,1,75,NULL,NULL),(447,1,76,NULL,NULL),(448,1,77,NULL,NULL),(449,1,78,NULL,NULL),(450,1,79,NULL,NULL),(451,1,80,NULL,NULL),(452,1,81,NULL,NULL),(453,1,82,NULL,NULL),(454,1,83,NULL,NULL),(455,1,84,NULL,NULL),(457,1,86,NULL,NULL),(459,1,88,NULL,NULL),(460,1,89,NULL,NULL),(461,1,90,NULL,NULL),(462,1,91,NULL,NULL),(463,1,92,NULL,NULL),(464,1,93,NULL,NULL),(465,1,94,NULL,NULL),(466,1,95,NULL,NULL),(467,1,96,NULL,NULL),(468,1,97,NULL,NULL),(469,1,98,NULL,NULL),(470,1,99,NULL,NULL),(471,1,100,NULL,NULL),(472,1,101,NULL,NULL),(473,1,102,NULL,NULL),(474,1,103,NULL,NULL),(475,1,104,NULL,NULL),(476,1,105,NULL,NULL),(477,1,106,NULL,NULL),(478,1,107,NULL,NULL),(479,1,108,NULL,NULL),(481,1,110,NULL,NULL),(483,1,112,NULL,NULL),(485,1,114,NULL,NULL),(488,1,117,NULL,NULL),(489,1,118,NULL,NULL),(490,1,119,NULL,NULL),(491,1,120,NULL,NULL),(492,1,121,NULL,NULL),(493,1,122,NULL,NULL),(494,1,123,NULL,NULL),(495,1,124,NULL,NULL),(496,1,125,NULL,NULL),(497,1,126,NULL,NULL),(498,1,127,NULL,NULL),(499,1,128,NULL,NULL),(500,1,129,NULL,NULL),(501,1,130,NULL,NULL),(502,1,131,NULL,NULL),(503,1,132,NULL,NULL),(504,1,133,NULL,NULL),(505,1,134,NULL,NULL),(506,1,135,NULL,NULL),(507,1,136,NULL,NULL),(508,1,137,NULL,NULL),(509,1,138,NULL,NULL),(510,1,139,NULL,NULL),(511,1,140,NULL,NULL);
/*!40000 ALTER TABLE `jabatan_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategoripelanggan`
--

DROP TABLE IF EXISTS `kategoripelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategoripelanggan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoripelanggan`
--

LOCK TABLES `kategoripelanggan` WRITE;
/*!40000 ALTER TABLE `kategoripelanggan` DISABLE KEYS */;
INSERT INTO `kategoripelanggan` VALUES (1,'2025-07-28 23:00:55','2025-08-03 18:55:35','INSTANSI','-'),(3,'2025-08-03 18:55:44','2025-08-03 18:55:44','UMUM','-');
/*!40000 ALTER TABLE `kategoripelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategoriproduk`
--

DROP TABLE IF EXISTS `kategoriproduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategoriproduk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoriproduk`
--

LOCK TABLES `kategoriproduk` WRITE;
/*!40000 ALTER TABLE `kategoriproduk` DISABLE KEYS */;
INSERT INTO `kategoriproduk` VALUES (1,'BAHAN PENOLONG','-','2025-07-29 00:09:03','2025-08-03 18:58:40'),(2,'PRODUKSI','-','2025-08-03 18:58:52','2025-08-03 18:58:52');
/*!40000 ALTER TABLE `kategoriproduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kendaraan`
--

DROP TABLE IF EXISTS `kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kendaraan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kendaraan`
--

LOCK TABLES `kendaraan` WRITE;
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` VALUES (1,'Mobil Pickup','test','2025-08-06 21:00:41','2025-08-06 21:00:41'),(2,'Mobil Sepanjang','-','2025-08-06 21:00:54','2025-08-06 21:00:54');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2025_07_28_095405_create_supplier_table',2),(7,'2025_07_29_041146_create_driver_table',3),(8,'2025_07_29_041237_create_kendaraan',3),(9,'2025_07_29_091005_create_kategoripelanggan_table',4),(10,'2025_07_29_061920_create_satuanproduk_table',5),(11,'2025_07_29_065625_create_kategoriproduk_table',6),(12,'2025_07_29_074937_create_statusproduk_table',7),(13,'2025_07_29_081623_create_pelanggan_table',8),(14,'2025_07_30_020948_create_produk_table',9),(16,'2025_07_30_061119_create_stokmasukheader_table',10),(17,'2025_07_30_063459_create_stokmasukdetail_table',10),(18,'2025_07_31_042020_create_stokkeluarheader_table',11),(19,'2025_07_31_042419_create_stokkeluardetail_table',11),(23,'2025_08_04_021806_create_produksidetail_table',12),(25,'2025_08_04_021751_create_produksiheader_table',13),(26,'2025_08_04_095109_create_transaksiheader_table',14),(27,'2025_08_04_095525_create_transaksidetail_table',14),(28,'2025_07_30_081623_create_pelanggan_table',1),(29,'2025_08_05_095123_create_pengiriman_table',15),(30,'2025_08_05_095134_create_pengirimandetail_table',15),(31,'2025_08_07_134747_create_stokretur_table',16),(32,'2025_08_07_134759_create_stokreturdetail_table',16),(33,'2025_08_20_065610_create_typeharga_table',17),(34,'2025_08_23_050015_add_ppn_to_produk_table',18),(35,'2025_08_24_144310_create_jabatan_table',18),(36,'2025_08_24_145603_alter_table_users',19),(37,'2025_09_18_022019_create_modules_table',19),(38,'2025_09_18_022334_create_permissions_table',19),(39,'2025_09_18_022501_create_jabatan_permissions_table',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (15,'Supplier','supplier','Modul Supplier untuk sistem manajemen',1,1,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(16,'Driver','driver','Modul Driver untuk sistem manajemen',1,2,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(17,'Kendaraan','kendaraan','Modul Kendaraan untuk sistem manajemen',1,3,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(18,'Kategori Pelanggan','kategori_pelanggan','Modul Kategori Pelanggan untuk sistem manajemen',1,4,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(19,'Pelanggan','pelanggan','Modul Pelanggan untuk sistem manajemen',1,5,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(20,'Satuan Produk','satuan_produk','Modul Satuan Produk untuk sistem manajemen',1,6,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(21,'Kategori Produk','kategori_produk','Modul Kategori Produk untuk sistem manajemen',1,7,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(22,'Status Produk','status_produk','Modul Status Produk untuk sistem manajemen',1,8,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(23,'Type Harga Produk','typeharga','Modul Type Harga Produk untuk sistem manajemen',1,9,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(24,'Produk','produk','Modul Produk untuk sistem manajemen',1,10,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(25,'Stok Masuk','stokmasuk','Modul Stok Masuk untuk sistem manajemen',1,11,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(26,'Stok Keluar','stokkeluar','Modul Stok Keluar untuk sistem manajemen',1,12,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(27,'Stok Retur','stokretur','Modul Stok Retur untuk sistem manajemen',1,13,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(28,'Produksi','produksi','Modul Produksi untuk sistem manajemen',1,14,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(29,'Transaksi','transaksi','Modul Transaksi untuk sistem manajemen',1,15,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(30,'Piutang','piutang','Modul Piutang untuk sistem manajemen',1,16,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(31,'Pengiriman','pengiriman','Modul Pengiriman untuk sistem manajemen',1,17,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(32,'Laporan Stok Masuk','laporan_stok_masuk','Modul Laporan Stok Masuk untuk sistem manajemen',1,18,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(33,'Laporan Stok Keluar','laporan_stok_keluar','Modul Laporan Stok Keluar untuk sistem manajemen',1,19,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(34,'Laporan Stok Retur','laporan_stok_retur','Modul Laporan Stok Retur untuk sistem manajemen',1,20,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(35,'Laporan Produksi','laporan_produksi','Modul Laporan Produksi untuk sistem manajemen',1,21,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(36,'Laporan Transaksi','laporan_transaksi','Modul Laporan Transaksi untuk sistem manajemen',1,22,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(37,'Laporan Piutang','laporan_piutang','Modul Laporan Piutang untuk sistem manajemen',1,23,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(38,'Laporan Pengiriman','laporan_pengiriman','Modul Laporan Pengiriman untuk sistem manajemen',1,24,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(39,'Laporan PPN','laporan_ppn','Modul Laporan PPN untuk sistem manajemen',1,25,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(40,'Jabatan','jabatan','Modul Jabatan untuk sistem manajemen',1,26,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(41,'Pengguna','users','Modul Pengguna untuk sistem manajemen',1,27,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(42,'Level Akses','akses','Modul Level Akses untuk sistem manajemen',1,28,'2025-09-18 01:46:41','2025-09-18 01:46:41');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pelanggan_no_pelanggan_unique` (`no_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,'P29072025000001','rtyrthrth',1,'fgfghfghfghfgh','546345345345','3463456345','2025-07-29 03:32:01','2025-07-29 03:32:01','Laki-laki');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengiriman`
--

DROP TABLE IF EXISTS `pengiriman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengiriman` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tgl_kirim` date NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_loading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan_id` bigint unsigned NOT NULL,
  `driver_id` bigint unsigned NOT NULL,
  `bbm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pembayaran` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pengiriman_no_pengiriman_unique` (`no_pengiriman`),
  KEY `pengiriman_kendaraan_id_foreign` (`kendaraan_id`),
  KEY `pengiriman_driver_id_foreign` (`driver_id`),
  CONSTRAINT `pengiriman_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengiriman_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengiriman`
--

LOCK TABLES `pengiriman` WRITE;
/*!40000 ALTER TABLE `pengiriman` DISABLE KEYS */;
INSERT INTO `pengiriman` VALUES (3,'2025-08-08','sdfsdfsd','fsdfdsfds','SM07082025000001','sdfsdf',2,7,'sdfdsf','sdfsdfsd','2025-08-06 23:20:11','2025-08-06 23:20:11',1),(4,'2025-08-07','ertertert','erterter','SM07082025000002','tertert',1,7,'rgertert','ertgerterte','2025-08-06 23:34:47','2025-08-06 23:34:47',1);
/*!40000 ALTER TABLE `pengiriman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengirimandetail`
--

DROP TABLE IF EXISTS `pengirimandetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengirimandetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengiriman_id` bigint unsigned NOT NULL,
  `transaksiheader_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengirimandetail_pengiriman_id_foreign` (`pengiriman_id`),
  KEY `pengirimandetail_transaksiheader_id_foreign` (`transaksiheader_id`),
  CONSTRAINT `pengirimandetail_pengiriman_id_foreign` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengirimandetail_transaksiheader_id_foreign` FOREIGN KEY (`transaksiheader_id`) REFERENCES `transaksiheader` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengirimandetail`
--

LOCK TABLES `pengirimandetail` WRITE;
/*!40000 ALTER TABLE `pengirimandetail` DISABLE KEYS */;
INSERT INTO `pengirimandetail` VALUES (5,3,7,'2025-08-06 23:20:11','2025-08-06 23:20:11'),(6,4,8,'2025-08-06 23:34:47','2025-08-06 23:34:47'),(7,4,9,'2025-08-06 23:34:47','2025-08-06 23:34:47');
/*!40000 ALTER TABLE `pengirimandetail` ENABLE KEYS */;
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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  KEY `permissions_module_id_foreign` (`module_id`),
  CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (53,'edit_supplier','Edit Supplier','edit',15,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(54,'lihat_supplier','Lihat Supplier','lihat',15,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(55,'hapus_supplier','Hapus Supplier','hapus',15,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(56,'tambah_supplier','Tambah Supplier','tambah',15,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(57,'edit_driver','Edit Driver','edit',16,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(58,'lihat_driver','Lihat Driver','lihat',16,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(59,'hapus_driver','Hapus Driver','hapus',16,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(60,'tambah_driver','Tambah Driver','tambah',16,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(61,'edit_kendaraan','Edit Kendaraan','edit',17,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(62,'lihat_kendaraan','Lihat Kendaraan','lihat',17,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(63,'hapus_kendaraan','Hapus Kendaraan','hapus',17,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(64,'tambah_kendaraan','Tambah Kendaraan','tambah',17,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(65,'edit_kategori_pelanggan','Edit Kategori Pelanggan','edit',18,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(66,'lihat_kategori_pelanggan','Lihat Kategori Pelanggan','lihat',18,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(67,'hapus_kategori_pelanggan','Hapus Kategori Pelanggan','hapus',18,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(68,'tambah_kategori_pelanggan','Tambah Kategori Pelanggan','tambah',18,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(69,'edit_pelanggan','Edit Pelanggan','edit',19,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(70,'lihat_pelanggan','Lihat Pelanggan','lihat',19,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(71,'hapus_pelanggan','Hapus Pelanggan','hapus',19,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(72,'tambah_pelanggan','Tambah Pelanggan','tambah',19,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(73,'edit_satuan_produk','Edit Satuan Produk','edit',20,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(74,'lihat_satuan_produk','Lihat Satuan Produk','lihat',20,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(75,'hapus_satuan_produk','Hapus Satuan Produk','hapus',20,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(76,'tambah_satuan_produk','Tambah Satuan Produk','tambah',20,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(77,'edit_kategori_produk','Edit Kategori Produk','edit',21,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(78,'lihat_kategori_produk','Lihat Kategori Produk','lihat',21,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(79,'hapus_kategori_produk','Hapus Kategori Produk','hapus',21,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(80,'tambah_kategori_produk','Tambah Kategori Produk','tambah',21,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(81,'edit_status_produk','Edit Status Produk','edit',22,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(82,'lihat_status_produk','Lihat Status Produk','lihat',22,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(83,'hapus_status_produk','Hapus Status Produk','hapus',22,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(84,'tambah_status_produk','Tambah Status Produk','tambah',22,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(86,'lihat_typeharga','Lihat Type Harga Produk','lihat',23,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(88,'tambah_typeharga','Tambah Type Harga Produk','tambah',23,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(89,'edit_produk','Edit Produk','edit',24,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(90,'lihat_produk','Lihat Produk','lihat',24,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(91,'hapus_produk','Hapus Produk','hapus',24,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(92,'tambah_produk','Tambah Produk','tambah',24,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(93,'edit_stokmasuk','Edit Stok Masuk','edit',25,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(94,'lihat_stokmasuk','Lihat Stok Masuk','lihat',25,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(95,'hapus_stokmasuk','Hapus Stok Masuk','hapus',25,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(96,'tambah_stokmasuk','Tambah Stok Masuk','tambah',25,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(97,'edit_stokkeluar','Edit Stok Keluar','edit',26,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(98,'lihat_stokkeluar','Lihat Stok Keluar','lihat',26,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(99,'hapus_stokkeluar','Hapus Stok Keluar','hapus',26,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(100,'tambah_stokkeluar','Tambah Stok Keluar','tambah',26,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(101,'edit_stokretur','Edit Stok Retur','edit',27,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(102,'lihat_stokretur','Lihat Stok Retur','lihat',27,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(103,'hapus_stokretur','Hapus Stok Retur','hapus',27,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(104,'tambah_stokretur','Tambah Stok Retur','tambah',27,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(105,'edit_produksi','Edit Produksi','edit',28,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(106,'lihat_produksi','Lihat Produksi','lihat',28,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(107,'hapus_produksi','Hapus Produksi','hapus',28,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(108,'tambah_produksi','Tambah Produksi','tambah',28,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(110,'lihat_transaksi','Lihat Transaksi','lihat',29,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(112,'tambah_transaksi','Tambah Transaksi','tambah',29,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(114,'lihat_piutang','Lihat Piutang','lihat',30,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(117,'edit_pengiriman','Edit Pengiriman','edit',31,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(118,'lihat_pengiriman','Lihat Pengiriman','lihat',31,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(119,'hapus_pengiriman','Hapus Pengiriman','hapus',31,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(120,'tambah_pengiriman','Tambah Pengiriman','tambah',31,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(121,'lihat_laporan_stok_masuk','Lihat Laporan Stok Masuk','lihat',32,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(122,'lihat_laporan_stok_keluar','Lihat Laporan Stok Keluar','lihat',33,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(123,'lihat_laporan_stok_retur','Lihat Laporan Stok Retur','lihat',34,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(124,'lihat_laporan_produksi','Lihat Laporan Produksi','lihat',35,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(125,'lihat_laporan_transaksi','Lihat Laporan Transaksi','lihat',36,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(126,'lihat_laporan_piutang','Lihat Laporan Piutang','lihat',37,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(127,'lihat_laporan_pengiriman','Lihat Laporan Pengiriman','lihat',38,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(128,'lihat_laporan_ppn','Lihat Laporan PPN','lihat',39,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(129,'edit_jabatan','Edit Jabatan','edit',40,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(130,'lihat_jabatan','Lihat Jabatan','lihat',40,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(131,'hapus_jabatan','Hapus Jabatan','hapus',40,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(132,'tambah_jabatan','Tambah Jabatan','tambah',40,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(133,'edit_users','Edit Pengguna','edit',41,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(134,'lihat_users','Lihat Pengguna','lihat',41,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(135,'hapus_users','Hapus Pengguna','hapus',41,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(136,'tambah_users','Tambah Pengguna','tambah',41,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(137,'edit_akses','Edit Level Akses','edit',42,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(138,'lihat_akses','Lihat Level Akses','lihat',42,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(139,'hapus_akses','Hapus Level Akses','hapus',42,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41'),(140,'tambah_akses','Tambah Level Akses','tambah',42,NULL,'2025-09-18 01:46:41','2025-09-18 01:46:41');
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
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoriproduk_id` bigint unsigned NOT NULL,
  `satuanproduk_id` bigint unsigned NOT NULL,
  `statusproduk_id` bigint unsigned NOT NULL,
  `harga_produk` bigint NOT NULL DEFAULT '0',
  `stok_produk` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ppn` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `produk_kode_produk_unique` (`kode_produk`),
  KEY `produk_kategoriproduk_id_foreign` (`kategoriproduk_id`),
  KEY `produk_satuanproduk_id_foreign` (`satuanproduk_id`),
  KEY `produk_statusproduk_id_foreign` (`statusproduk_id`),
  CONSTRAINT `produk_kategoriproduk_id_foreign` FOREIGN KEY (`kategoriproduk_id`) REFERENCES `kategoriproduk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produk_satuanproduk_id_foreign` FOREIGN KEY (`satuanproduk_id`) REFERENCES `satuanproduk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produk_statusproduk_id_foreign` FOREIGN KEY (`statusproduk_id`) REFERENCES `statusproduk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (5,'345345','tutup botol',1,1,1,1199999,100,'2025-07-30 21:12:45','2025-08-20 22:18:19','0'),(6,'234234weew23','fsdfsdfsd',2,1,2,100000,40,'2025-08-03 22:13:26','2025-09-15 01:16:20','0'),(7,'23545345345','dfgdfgdfgdfg',1,1,1,43545454,13,'2025-08-03 22:13:46','2025-08-20 22:18:44','0'),(8,'3453454351','erterter',2,1,1,300000,30,'2025-08-03 22:14:23','2025-09-15 01:16:20','0');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produksidetail`
--

DROP TABLE IF EXISTS `produksidetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produksidetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `produksiheader_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produksidetail_produksiheader_id_foreign` (`produksiheader_id`),
  KEY `produksidetail_produk_id_foreign` (`produk_id`),
  CONSTRAINT `produksidetail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produksidetail_produksiheader_id_foreign` FOREIGN KEY (`produksiheader_id`) REFERENCES `produksiheader` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produksidetail`
--

LOCK TABLES `produksidetail` WRITE;
/*!40000 ALTER TABLE `produksidetail` DISABLE KEYS */;
INSERT INTO `produksidetail` VALUES (16,5,5,10,'2025-08-04 19:52:09','2025-08-04 19:52:09'),(17,5,7,2,'2025-08-04 19:52:09','2025-08-04 19:52:09'),(18,6,7,10,'2025-08-04 19:52:43','2025-08-04 19:52:43'),(19,7,5,50,'2025-08-20 22:18:19','2025-08-20 22:18:19'),(20,8,7,30,'2025-08-20 22:18:44','2025-08-20 22:18:44');
/*!40000 ALTER TABLE `produksidetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produksiheader`
--

DROP TABLE IF EXISTS `produksiheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produksiheader` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_produksi` date NOT NULL,
  `no_produksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `produksiheader_no_produksi_unique` (`no_produksi`),
  KEY `produksiheader_produk_id_foreign` (`produk_id`),
  CONSTRAINT `produksiheader_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produksiheader`
--

LOCK TABLES `produksiheader` WRITE;
/*!40000 ALTER TABLE `produksiheader` DISABLE KEYS */;
INSERT INTO `produksiheader` VALUES (5,'2025-08-05','PR05082025000001',6,12,'2025-08-04 19:52:09','2025-08-04 19:52:09'),(6,'2025-08-05','PR05082025000002',8,10,'2025-08-04 19:52:43','2025-08-04 19:52:43'),(7,'2025-08-21','PRO-210820250001',6,50,'2025-08-20 22:18:19','2025-08-20 22:18:19'),(8,'2025-08-21','PRO-210820250002',8,28,'2025-08-20 22:18:44','2025-08-20 22:18:44');
/*!40000 ALTER TABLE `produksiheader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuanproduk`
--

DROP TABLE IF EXISTS `satuanproduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuanproduk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuanproduk`
--

LOCK TABLES `satuanproduk` WRITE;
/*!40000 ALTER TABLE `satuanproduk` DISABLE KEYS */;
INSERT INTO `satuanproduk` VALUES (1,'PCS','-','2025-07-29 00:09:11','2025-08-03 18:56:01'),(3,'DUS','-','2025-08-03 18:56:31','2025-08-03 18:56:31');
/*!40000 ALTER TABLE `satuanproduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusproduk`
--

DROP TABLE IF EXISTS `statusproduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statusproduk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusproduk`
--

LOCK TABLES `statusproduk` WRITE;
/*!40000 ALTER TABLE `statusproduk` DISABLE KEYS */;
INSERT INTO `statusproduk` VALUES (1,'PRODUKSI','-','2025-07-29 01:08:17','2025-08-03 18:59:16'),(2,'PENJUALAN','-','2025-08-03 18:59:28','2025-08-03 18:59:28');
/*!40000 ALTER TABLE `statusproduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokkeluardetail`
--

DROP TABLE IF EXISTS `stokkeluardetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokkeluardetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stokkeluarheader_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stokkeluardetail_stokkeluarheader_id_foreign` (`stokkeluarheader_id`),
  KEY `stokkeluardetail_produk_id_foreign` (`produk_id`),
  CONSTRAINT `stokkeluardetail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stokkeluardetail_stokkeluarheader_id_foreign` FOREIGN KEY (`stokkeluarheader_id`) REFERENCES `stokkeluarheader` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokkeluardetail`
--

LOCK TABLES `stokkeluardetail` WRITE;
/*!40000 ALTER TABLE `stokkeluardetail` DISABLE KEYS */;
INSERT INTO `stokkeluardetail` VALUES (4,4,5,2,'2025-07-30 23:00:52','2025-07-30 23:00:52');
/*!40000 ALTER TABLE `stokkeluardetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokkeluarheader`
--

DROP TABLE IF EXISTS `stokkeluarheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokkeluarheader` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_stokkeluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_stokkeluar` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stokkeluarheader_no_stokkeluar_unique` (`no_stokkeluar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokkeluarheader`
--

LOCK TABLES `stokkeluarheader` WRITE;
/*!40000 ALTER TABLE `stokkeluarheader` DISABLE KEYS */;
INSERT INTO `stokkeluarheader` VALUES (4,'ST31072025000001','2025-07-31','test','2025-07-30 22:50:12','2025-07-30 22:50:12');
/*!40000 ALTER TABLE `stokkeluarheader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokmasukdetail`
--

DROP TABLE IF EXISTS `stokmasukdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokmasukdetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stokmasukheader_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stokmasukdetail_stokmasukheader_id_foreign` (`stokmasukheader_id`),
  KEY `stokmasukdetail_produk_id_foreign` (`produk_id`),
  CONSTRAINT `stokmasukdetail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stokmasukdetail_stokmasukheader_id_foreign` FOREIGN KEY (`stokmasukheader_id`) REFERENCES `stokmasukheader` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokmasukdetail`
--

LOCK TABLES `stokmasukdetail` WRITE;
/*!40000 ALTER TABLE `stokmasukdetail` DISABLE KEYS */;
INSERT INTO `stokmasukdetail` VALUES (8,8,5,30,'2025-07-30 21:13:29','2025-07-30 21:13:29'),(9,9,5,32,'2025-07-30 21:31:22','2025-07-30 21:31:22'),(11,10,7,32,'2025-08-03 22:22:38','2025-08-03 22:22:38'),(12,11,5,100,'2025-08-20 22:16:48','2025-08-20 22:16:48'),(13,11,7,23,'2025-08-20 22:16:48','2025-08-20 22:16:48');
/*!40000 ALTER TABLE `stokmasukdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokmasukheader`
--

DROP TABLE IF EXISTS `stokmasukheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokmasukheader` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_stokmasuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_stokmasuk` date NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stokmasukheader_no_stokmasuk_unique` (`no_stokmasuk`),
  KEY `stokmasukheader_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `stokmasukheader_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokmasukheader`
--

LOCK TABLES `stokmasukheader` WRITE;
/*!40000 ALTER TABLE `stokmasukheader` DISABLE KEYS */;
INSERT INTO `stokmasukheader` VALUES (8,'P31072025000002','2025-07-31',1,'test','2025-07-30 21:13:29','2025-07-30 21:13:29'),(9,'P31072025000003','2025-07-31',1,'masukkan stok','2025-07-30 21:31:22','2025-07-30 21:31:22'),(10,'SM04082025000001','2025-08-14',2,'test','2025-08-03 22:22:38','2025-08-03 22:22:38'),(11,'SM-210820250001','2025-08-22',1,NULL,'2025-08-20 22:16:48','2025-08-20 22:16:48');
/*!40000 ALTER TABLE `stokmasukheader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokretur`
--

DROP TABLE IF EXISTS `stokretur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokretur` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_stokretur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_stokretur` date NOT NULL,
  `pengiriman_id` bigint unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stokretur_no_stokretur_unique` (`no_stokretur`),
  KEY `stokretur_pengiriman_id_foreign` (`pengiriman_id`),
  CONSTRAINT `stokretur_pengiriman_id_foreign` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokretur`
--

LOCK TABLES `stokretur` WRITE;
/*!40000 ALTER TABLE `stokretur` DISABLE KEYS */;
/*!40000 ALTER TABLE `stokretur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokreturdetail`
--

DROP TABLE IF EXISTS `stokreturdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stokreturdetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stokretur_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stokreturdetail_stokretur_id_foreign` (`stokretur_id`),
  KEY `stokreturdetail_produk_id_foreign` (`produk_id`),
  CONSTRAINT `stokreturdetail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stokreturdetail_stokretur_id_foreign` FOREIGN KEY (`stokretur_id`) REFERENCES `stokretur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokreturdetail`
--

LOCK TABLES `stokreturdetail` WRITE;
/*!40000 ALTER TABLE `stokreturdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `stokreturdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'werwer','werwer','235234','gfergergergtert','2025-07-28 19:52:46','2025-07-28 19:52:46'),(2,'cakradana','kos kosan mak erna','089234224','supplier','2025-07-30 23:15:20','2025-07-30 23:15:20');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksidetail`
--

DROP TABLE IF EXISTS `transaksidetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksidetail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaksiheader_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksidetail_transaksiheader_id_foreign` (`transaksiheader_id`),
  KEY `transaksidetail_produk_id_foreign` (`produk_id`),
  CONSTRAINT `transaksidetail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksidetail_transaksiheader_id_foreign` FOREIGN KEY (`transaksiheader_id`) REFERENCES `transaksiheader` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksidetail`
--

LOCK TABLES `transaksidetail` WRITE;
/*!40000 ALTER TABLE `transaksidetail` DISABLE KEYS */;
INSERT INTO `transaksidetail` VALUES (1,6,6,2,'2025-08-04 22:13:23','2025-08-04 22:13:23'),(2,7,6,5,'2025-08-04 23:04:24','2025-08-04 23:04:24'),(3,8,8,2,'2025-08-04 23:34:55','2025-08-04 23:34:55'),(4,9,6,2,'2025-08-06 23:34:04','2025-08-06 23:34:04'),(5,9,8,2,'2025-08-06 23:34:04','2025-08-06 23:34:04'),(6,10,6,1,'2025-08-20 22:08:28','2025-08-20 22:08:28'),(7,11,6,2,'2025-09-15 00:05:09','2025-09-15 00:05:09'),(8,12,6,10,'2025-09-15 01:16:20','2025-09-15 01:16:20'),(9,12,8,4,'2025-09-15 01:16:20','2025-09-15 01:16:20');
/*!40000 ALTER TABLE `transaksidetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksiheader`
--

DROP TABLE IF EXISTS `transaksiheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksiheader` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `pelanggan_id` bigint unsigned NOT NULL,
  `sub_total` bigint NOT NULL DEFAULT '0',
  `ongkir` bigint DEFAULT '0',
  `ppn` bigint DEFAULT '0',
  `grand_total` bigint NOT NULL DEFAULT '0',
  `no_surat_jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pembayaran` bigint NOT NULL DEFAULT '0',
  `kembalian` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaksiheader_no_transaksi_unique` (`no_transaksi`),
  KEY `transaksiheader_pelanggan_id_foreign` (`pelanggan_id`),
  KEY `transaksiheader_user_id_foreign` (`user_id`),
  CONSTRAINT `transaksiheader_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksiheader_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksiheader`
--

LOCK TABLES `transaksiheader` WRITE;
/*!40000 ALTER TABLE `transaksiheader` DISABLE KEYS */;
INSERT INTO `transaksiheader` VALUES (6,'INV-2025080500001','2025-08-05',1,69069068,10000,7598697,76677765,'63534534','1',NULL,NULL,1,'Lunas',80000000,3322234,'2025-08-04 22:13:23','2025-08-04 22:13:23'),(7,'INV-20250805500002','2025-08-05',1,172672670,10000,18995093,191677763,'5435','2','2025-08-29',NULL,1,'Lunas',200000000,8322236,'2025-08-04 23:04:24','2025-08-04 23:04:24'),(8,'INV-20250805500003','2025-08-05',1,90890906,10000,9999099,100900005,'234234','2','2025-08-30',NULL,1,'Belum Lunas',85100000,0,'2025-08-04 23:34:55','2025-08-05 01:24:44'),(9,'INV-20250807500004','2025-08-07',1,159959974,13121,17597040,177570135,'2342423423','1',NULL,NULL,1,'Lunas',177570138,2,'2025-08-06 23:34:04','2025-08-06 23:34:04'),(10,'INV-20250821500005','2025-08-21',1,34534534,NULL,NULL,34534534,'345345','1',NULL,NULL,1,'Lunas',34534534,0,'2025-08-20 22:08:28','2025-08-20 22:08:28'),(11,'INV-20250915500006','2025-09-15',1,200000,0,0,200000,'423432','1',NULL,NULL,1,'Lunas',324234,124234,'2025-09-15 00:05:09','2025-09-15 00:05:09'),(12,'INV-20250915500007','2025-09-15',1,2200000,0,0,2200000,'5235235','1',NULL,NULL,1,'Lunas',23523535,21323535,'2025-09-15 01:16:20','2025-09-15 01:16:20');
/*!40000 ALTER TABLE `transaksiheader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeharga`
--

DROP TABLE IF EXISTS `typeharga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typeharga` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `typeharga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeharga`
--

LOCK TABLES `typeharga` WRITE;
/*!40000 ALTER TABLE `typeharga` DISABLE KEYS */;
INSERT INTO `typeharga` VALUES (1,'Pelanggan / Agen Type 3',1000,NULL,'2025-08-20 23:50:50'),(2,'Pelanggan / Agen Type 2',2000,NULL,NULL),(3,'Pelanggan / Agen Type 1',3000,NULL,NULL),(4,'Pelanggan / Agen Type 3',1000,NULL,NULL),(5,'Pelanggan / Agen Type 2',2000,NULL,NULL),(6,'Pelanggan / Agen Type 1',3000,NULL,NULL);
/*!40000 ALTER TABLE `typeharga` ENABLE KEYS */;
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan_id` bigint unsigned NOT NULL,
  `aktif` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin123','admin@example.com',NULL,'$2y$10$BPvoPhGlXk1ZErw.G0WbJ.KKasV3wuOd67EJ.N8SZNLq0vtlc4X1a',NULL,NULL,NULL,'2025-09-01 23:07:58',1,'1'),(2,'ghfghfghfgh','fghfghfghfgh','342749649user@gmail.com',NULL,'$2y$10$AkSuwVwIyGUpTOrxVA2WJOkIM780ijrq4CP45V8rD6ZjoR3b5eIYO',NULL,NULL,'2025-09-01 22:58:46','2025-09-18 03:52:08',3,'1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'amdbk'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-19 14:21:46
