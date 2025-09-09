-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: shared_db
-- Waktu pembuatan: 05 Sep 2025 pada 08.41
-- Versi server: 10.5.29-MariaDB-ubu2004
-- Versi PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diameters`
--

CREATE TABLE `data_diameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_diameters`
--

INSERT INTO `data_diameters` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(6, '2\"', 'inchi', '2025-07-20 07:28:42', '2025-07-20 07:28:42'),
(7, '4\"', 'inchi', '2025-07-20 07:28:52', '2025-07-20 07:28:52'),
(8, '6\"', 'inchi', '2025-07-20 07:29:03', '2025-07-20 07:29:03'),
(9, '8\"', 'inchi', '2025-07-20 07:29:15', '2025-07-20 07:29:15'),
(10, '3\"', 'inchi', '2025-07-28 02:24:31', '2025-07-28 02:33:12'),
(11, '1\"', 'inchi', '2025-07-28 02:24:55', '2025-07-28 02:34:50'),
(12, '1,5\"', 'inchi', '2025-07-28 02:25:08', '2025-07-28 02:34:40'),
(13, '10\"', 'inchi', '2025-07-28 02:25:30', '2025-07-28 02:34:32'),
(14, '12\"', 'inchi', '2025-07-28 02:26:22', '2025-07-28 02:34:24'),
(15, '16\"', 'inchi', '2025-07-28 02:26:40', '2025-07-28 02:34:15'),
(16, '14\"', 'inchi', '2025-07-28 02:28:05', '2025-07-28 02:34:04'),
(17, '1/2\"', 'inchi', '2025-07-28 02:28:33', '2025-07-28 02:33:28'),
(18, '3/4\"', 'inchi', '2025-07-28 02:28:50', '2025-07-28 02:33:20'),
(19, '0', '-', '2025-08-06 02:09:42', '2025-08-06 02:09:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_divisis`
--

CREATE TABLE `data_divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_divisis`
--

INSERT INTO `data_divisis` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(9, 'Area Petarukan', '-', '2025-07-20 07:25:56', '2025-07-28 02:40:09'),
(10, 'Area Taman', '-', '2025-07-20 07:26:19', '2025-07-28 02:40:01'),
(11, 'Area Pemalang Kota', '-', '2025-07-20 07:26:39', '2025-07-28 02:39:53'),
(12, 'Area Warungpring', '-', '2025-07-20 07:26:54', '2025-07-28 02:39:46'),
(13, 'Area Randudongkal', '-', '2025-07-20 07:27:26', '2025-07-28 02:39:33'),
(14, 'Area Moga', '-', '2025-07-20 07:27:41', '2025-07-28 02:39:25'),
(15, 'Area Pulosari', '-', '2025-07-20 07:28:13', '2025-07-28 02:39:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jaringan_barus`
--

CREATE TABLE `data_jaringan_barus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `divisi` bigint(20) UNSIGNED NOT NULL,
  `vol` varchar(255) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jenis_pipa` bigint(20) UNSIGNED NOT NULL,
  `diameter` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_jaringan_barus`
--

INSERT INTO `data_jaringan_barus` (`id`, `tanggal`, `pekerjaan`, `divisi`, `vol`, `koordinat`, `lokasi`, `jenis_pipa`, `diameter`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, '2025-09-03', 'Pemasangan Jaringan Pipa', 11, '1296', '', 'Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810', 4, 8, 'Sesuai RAB', '2025-09-04 01:55:05', '2025-09-04 01:55:05'),
(18, '2025-09-03', 'Pemasangan Jaringan Pipa', 11, '10', '', 'Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810', 6, 8, 'Sesuai RAB', '2025-09-04 01:56:59', '2025-09-04 01:56:59'),
(19, '2025-09-03', 'Pemasangan Jaringan Pipa', 11, '7', '', 'Jl. Siwalan Bojongnangka, Kecamatan Pemalang, Kabupaten Pemalang. Koord : -6.904740,109.362810', 4, 7, 'Sesuai RAB', '2025-09-04 01:58:35', '2025-09-04 01:58:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penggantian_pipas`
--

CREATE TABLE `data_penggantian_pipas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `divisi` bigint(20) UNSIGNED NOT NULL,
  `pipa_lama` bigint(20) UNSIGNED NOT NULL,
  `pipa_baru` bigint(20) UNSIGNED NOT NULL,
  `dn_lama` bigint(20) UNSIGNED NOT NULL,
  `dn_baru` bigint(20) UNSIGNED NOT NULL,
  `th_pemasangan_lama` varchar(255) NOT NULL,
  `th_pemasangan_baru` varchar(255) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `vol_lama` varchar(255) NOT NULL,
  `vol_baru` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pipas`
--

CREATE TABLE `data_pipas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pipas`
--

INSERT INTO `data_pipas` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'HDPE', '-', '2025-07-20 07:29:42', '2025-07-20 07:29:42'),
(5, 'PVC', '-', '2025-07-20 07:29:51', '2025-07-20 07:29:51'),
(6, 'GI', '-', '2025-07-20 07:29:59', '2025-07-20 07:29:59'),
(7, 'Tidak Ada', '-', '2025-08-06 02:09:23', '2025-08-06 02:09:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rabs`
--

CREATE TABLE `data_rabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_pelaksana` date NOT NULL,
  `no_spk` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `masa_pemeliharaan` varchar(255) NOT NULL,
  `penyedia` varchar(255) NOT NULL,
  `vol` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `rab` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `honor` varchar(255) NOT NULL,
  `bahan` varchar(255) NOT NULL,
  `upah` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `gis` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_rabs`
--

INSERT INTO `data_rabs` (`id`, `tanggal`, `tanggal_pelaksana`, `no_spk`, `pekerjaan`, `masa_pemeliharaan`, `penyedia`, `vol`, `lokasi`, `rab`, `keterangan`, `honor`, `bahan`, `upah`, `jumlah`, `gis`, `file`, `file2`, `file3`, `created_at`, `updated_at`) VALUES
(115, '2025-01-24', '2025-09-05', '690/003/SPK/IV/2025', 'Perbaikan Aliran, Pemasangan Special Crosing Pipa GI DN 6 Inch, l = 73 M, Jembatan Kali Elon Beji', '', '', '73', 'Jembatan Kali Elon Beji Kecamatan Taman, Kabupaten Pemalang', '204405000', 'Belum Ada Pencairan S/D Bulan Juni 2025', '', '0', '193800000', '200550000', 'Belum', NULL, NULL, NULL, '2025-07-28 07:49:09', '2025-09-05 06:53:51'),
(117, '2025-09-05', '2025-09-05', '0', 'yyyy', 'yyyyy', 'yyyyy', '0', 'rrrrrrrrrr', '0', 'ttttttttt', '0', '0', '0', '0', '0', NULL, NULL, NULL, '2025-09-05 08:09:00', '2025-09-05 08:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_update_gis`
--

CREATE TABLE `data_update_gis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `vol` varchar(255) NOT NULL,
  `gate_valve_gis` bigint(20) UNSIGNED NOT NULL,
  `gate_valve_lap` bigint(20) UNSIGNED NOT NULL,
  `pipa_gis` bigint(20) UNSIGNED NOT NULL,
  `pipa_lap` bigint(20) UNSIGNED NOT NULL,
  `air_valve_gis` bigint(20) UNSIGNED NOT NULL,
  `air_valve_lap` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_update_gis`
--

INSERT INTO `data_update_gis` (`id`, `tanggal`, `divisi_id`, `kegiatan`, `koordinat`, `vol`, `gate_valve_gis`, `gate_valve_lap`, `pipa_gis`, `pipa_lap`, `air_valve_gis`, `air_valve_lap`, `lokasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '2025-09-03', 11, 'Update Gate Valve', '-6.932155,109.386174', '-', 6, 6, 4, 4, 19, 19, 'Sewaka', 'Jumlah Data Gate Valve\r\nGate Valve DN 2\" WO : 1 Buah\r\nSudah Terupdate', '2025-09-03 02:38:28', '2025-09-03 07:12:17'),
(9, '2025-09-03', 11, 'Update Gate Valve', '-6.932282,109.388045', '-', 10, 10, 4, 4, 19, 19, 'Sewaka', 'Jumlaj Data Gate Valve :\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 02:49:31', '2025-09-03 07:12:36'),
(10, '2025-08-18', 11, 'Update Gate Valve', '-6.933256,109.383939', '-', 10, 10, 4, 4, 19, 19, 'Sewaka', 'Jumlah Data Gate Valve\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 03:56:52', '2025-09-04 08:34:42'),
(11, '2025-08-12', 11, 'Update Gate Valve', '-6.904766,109.362826', '-', 8, 8, 4, 4, 19, 19, 'Bojongnangka', 'Jumlah Data Gate Valve:\r\nGate Valve DN 6\" : 2 Buah\r\nSudah Terupdate', '2025-09-03 06:39:01', '2025-09-04 08:34:25'),
(12, '2025-08-08', 11, 'Update Gate Valve', '-6.894006,109.358516', '-', 8, 8, 4, 4, 19, 19, 'Bojongnangka', 'Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 2 Buah\r\nSudah Terupdate', '2025-09-03 06:41:36', '2025-09-04 08:34:09'),
(14, '2025-08-04', 10, 'Update Gate Valve', '-6.894106,109.417655', '-', 8, 8, 4, 4, 19, 19, 'Beji', 'Jumlah Data Gate Valve :\r\nGate Valve 6\" : 2 Buah\r\nSudah Terupdate', '2025-09-03 06:46:55', '2025-09-04 08:33:55'),
(15, '2025-08-04', 10, 'Update Gate Valve', '-6.894123,109.417696', '-', 8, 8, 4, 4, 19, 19, 'Beji', 'Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 06:50:19', '2025-09-04 08:33:17'),
(16, '2025-08-04', 10, 'Update Air Valve', '-6.894106,109.418254', '-', 19, 19, 6, 6, 6, 6, 'Beji', 'Jumlah Data Air Valve :\r\nAir Valve DN 2\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 06:53:27', '2025-09-04 08:32:59'),
(17, '2025-08-04', 10, 'Update Gate Valve', '-6.894029,109.418189', '-', 10, 8, 5, 5, 19, 19, 'Beji', 'Jumlaj Data Gate Valve :\r\nGate Valve DN 3\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 06:57:30', '2025-09-04 08:32:41'),
(19, '2025-08-04', 10, 'Update Gate Valve', '-6.894123,109.417696', '-', 7, 7, 4, 4, 19, 19, 'Beji', 'Jumlah Data Gate Valve :\r\nGate Valve DN 4\" WO : 1 Buah\r\nSudah Terupdate', '2025-09-03 07:05:33', '2025-09-04 08:32:27'),
(20, '2025-08-04', 10, 'Update Gate Valve', '-6.894029,109.418189', '-', 8, 8, 5, 5, 19, 19, 'Beji', 'Jumlah Data Gate Valve :\r\nGate Valve DN 6\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 07:07:39', '2025-09-04 08:32:07'),
(23, '2025-08-04', 11, 'Update Gate Valve', '-6.920239,109.384379', '-', 7, 7, 4, 4, 19, 19, 'Bojongbata', 'Jumlah Data Gate Valve :\r\nGate Valve DN 4\" : 1 Buah\r\nSudah Terupdate', '2025-09-03 07:22:20', '2025-09-04 08:31:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporangis`
--

CREATE TABLE `laporangis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(56, '2025_06_24_144111_create_data_divisis_table', 1),
(57, '2025_06_24_144121_create_data_diameters_table', 1),
(58, '2025_06_24_144127_create_data_pipas_table', 1),
(59, '2025_06_25_001431_create_data_rabs_table', 1),
(60, '2025_06_25_011130_create_data_update_gis_table', 1),
(61, '2025_06_25_011143_create_data_jaringan_barus_table', 1),
(62, '2025_06_25_011154_create_data_penggantian_pipas_table', 1),
(63, '2025_06_30_021523_create_laporangis_table', 2),
(64, '2025_06_30_021845_create_permission_tables', 2),
(65, '2025_06_30_024309_add_group_to_permissions_table', 3),
(66, '2025_06_30_182948_add_role_to_user', 4),
(67, '2025_06_30_183718_add_role_to_users', 5),
(68, '2025_06_30_201645_add_image_and_statust_to_users', 6),
(69, '2025_06_30_205250_add_username_to_users', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 9),
(11, 'App\\Models\\User', 7),
(12, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `group`) VALUES
(119, 'lihat-akses', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'akses'),
(120, 'edit-akses', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'akses'),
(121, 'lihat-diameter', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-diameter'),
(122, 'tambah-diameter', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-diameter'),
(123, 'hapus-diameter', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-diameter'),
(124, 'edit-diameter', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-diameter'),
(125, 'lihat-divisi', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-divisi'),
(126, 'tambah-divisi', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-divisi'),
(127, 'edit-divisi', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-divisi'),
(128, 'hapus-divisi', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-divisi'),
(129, 'lihat-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-pipa'),
(130, 'tambah-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-pipa'),
(131, 'edit-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-pipa'),
(132, 'hapus-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-pipa'),
(133, 'lihat-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-rab'),
(134, 'tambah-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-rab'),
(135, 'edit-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-rab'),
(136, 'hapus-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'data-rab'),
(137, 'lihat-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'update-gis'),
(138, 'tambah-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'update-gis'),
(139, 'edit-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'update-gis'),
(140, 'hapus-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'update-gis'),
(141, 'lihat-jaringan-baru', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jaringan-baru'),
(142, 'tambah-jaringan-baru', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jaringan-baru'),
(143, 'edit-jaringan-baru', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jaringan-baru'),
(144, 'hapus-jaringan-baru', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jaringan-baru'),
(145, 'buat-penggantian-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'penggantian-pipa'),
(146, 'lihat-penggantian-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'penggantian-pipa'),
(147, 'edit-penggantian-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'penggantian-pipa'),
(148, 'hapus-penggantian-pipa', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'penggantian-pipa'),
(149, 'buat-laporan-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-rab'),
(150, 'lihat-laporan-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-rab'),
(151, 'edit-laporan-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-rab'),
(152, 'hapus-laporan-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-rab'),
(153, 'ekspor-laporan-rab', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-rab'),
(154, 'buat-laporan-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-gis'),
(155, 'lihat-laporan-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-gis'),
(156, 'edit-laporan-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-gis'),
(157, 'hapus-laporan-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-gis'),
(158, 'ekspor-laporan-gis', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'laporan-gis'),
(159, 'lihat-pengguna', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'pengguna'),
(160, 'tambah-pengguna', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'pengguna'),
(161, 'edit-pengguna', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'pengguna'),
(162, 'hapus-pengguna', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'pengguna'),
(163, 'tambah-profile', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'profile'),
(164, 'edit-profile', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'profile'),
(165, 'hapus-profile', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'profile'),
(166, 'lihat-profile', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'profile'),
(167, 'tambah-jabatan', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jabatan'),
(168, 'edit-jabatan', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jabatan'),
(169, 'hapus-jabatan', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jabatan'),
(170, 'lihat-jabatan', 'web', '2025-06-30 21:37:19', '2025-06-30 21:37:19', 'jabatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `note`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Super Admin', NULL, 'web', '2025-06-29 18:21:05', '2025-06-29 18:21:05'),
(5, 'Admin', NULL, 'web', '2025-06-29 18:21:05', '2025-06-29 18:21:05'),
(6, 'User', NULL, 'web', '2025-06-29 18:21:05', '2025-06-29 18:21:05'),
(11, 'Admin GIS', NULL, 'web', '2025-07-28 01:41:21', '2025-08-25 03:56:24'),
(12, 'Admin Perencanaan', NULL, 'web', '2025-07-28 01:41:44', '2025-08-25 03:56:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(119, 4),
(120, 4),
(121, 4),
(121, 5),
(121, 6),
(121, 11),
(122, 4),
(122, 5),
(122, 11),
(123, 4),
(123, 5),
(123, 11),
(124, 4),
(124, 5),
(124, 11),
(125, 4),
(125, 5),
(125, 6),
(125, 11),
(126, 4),
(126, 5),
(126, 11),
(127, 4),
(127, 5),
(127, 11),
(128, 4),
(128, 5),
(128, 11),
(129, 4),
(129, 5),
(129, 6),
(129, 11),
(130, 4),
(130, 5),
(130, 11),
(131, 4),
(131, 5),
(131, 11),
(132, 4),
(132, 5),
(132, 11),
(133, 4),
(133, 5),
(133, 6),
(133, 11),
(133, 12),
(134, 4),
(134, 5),
(134, 11),
(134, 12),
(135, 4),
(135, 5),
(135, 11),
(135, 12),
(136, 4),
(136, 5),
(136, 11),
(136, 12),
(137, 4),
(137, 5),
(137, 6),
(137, 11),
(138, 4),
(138, 5),
(138, 11),
(139, 4),
(139, 5),
(139, 11),
(140, 4),
(140, 5),
(140, 11),
(141, 4),
(141, 5),
(141, 6),
(141, 11),
(142, 4),
(142, 5),
(142, 11),
(143, 4),
(143, 5),
(143, 11),
(144, 4),
(144, 5),
(144, 11),
(145, 4),
(145, 5),
(145, 11),
(146, 4),
(146, 5),
(146, 6),
(146, 11),
(147, 4),
(147, 5),
(147, 11),
(148, 4),
(148, 5),
(148, 11),
(149, 4),
(149, 5),
(149, 11),
(149, 12),
(150, 4),
(150, 5),
(150, 6),
(150, 11),
(150, 12),
(151, 4),
(151, 5),
(151, 11),
(151, 12),
(152, 4),
(152, 5),
(152, 11),
(152, 12),
(153, 4),
(153, 5),
(153, 11),
(153, 12),
(154, 4),
(154, 5),
(154, 11),
(154, 12),
(155, 4),
(155, 5),
(155, 6),
(155, 11),
(155, 12),
(156, 4),
(156, 5),
(156, 11),
(156, 12),
(157, 4),
(157, 5),
(157, 11),
(157, 12),
(158, 4),
(158, 5),
(158, 11),
(158, 12),
(159, 4),
(159, 6),
(160, 4),
(161, 4),
(162, 4),
(163, 4),
(164, 4),
(165, 4),
(166, 4),
(166, 5),
(166, 6),
(167, 4),
(167, 5),
(168, 4),
(169, 4),
(170, 4),
(170, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'super admin', 'administrator', '$2y$12$XwugayWOB.LjhYH.ITVpBuFu7LGTbcwmePP8/2VjA9fn8UTxeSfzG', 4, NULL, 1, '2025-06-30 21:49:00', '2025-07-12 04:12:13'),
(6, 'Perencanaan', 'admin01', '$2y$12$ZU14p0l2BfiaT0PA4SCW2.mrhPCwyqTBm3GVzrT42sBRgJMwiGUhu', 12, NULL, 1, '2025-07-20 10:19:14', '2025-07-28 01:44:40'),
(7, 'GIS', 'admin02', '$2y$12$qesT.LWOkT10bxVppPp.4.iZVVaRHs7IkbeyJXpLrztNauGYjKMkG', 11, NULL, 1, '2025-07-20 10:21:12', '2025-07-28 01:44:48'),
(9, 'user01', 'admin', '$2y$12$ZlxskYdzcX2l96T5CYjkgOwKNbqwcyyf0nBOFlNROP9PCNBYs0Cqa', 6, NULL, 1, '2025-07-27 13:38:28', '2025-07-27 13:38:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_diameters`
--
ALTER TABLE `data_diameters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_divisis`
--
ALTER TABLE `data_divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jaringan_barus`
--
ALTER TABLE `data_jaringan_barus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_jaringan_barus_divisi_foreign` (`divisi`),
  ADD KEY `data_jaringan_barus_jenis_pipa_foreign` (`jenis_pipa`),
  ADD KEY `data_jaringan_barus_diameter_foreign` (`diameter`);

--
-- Indeks untuk tabel `data_penggantian_pipas`
--
ALTER TABLE `data_penggantian_pipas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_penggantian_pipas_divisi_foreign` (`divisi`),
  ADD KEY `data_penggantian_pipas_pipa_lama_foreign` (`pipa_lama`),
  ADD KEY `data_penggantian_pipas_pipa_baru_foreign` (`pipa_baru`),
  ADD KEY `data_penggantian_pipas_dn_lama_foreign` (`dn_lama`),
  ADD KEY `data_penggantian_pipas_dn_baru_foreign` (`dn_baru`);

--
-- Indeks untuk tabel `data_pipas`
--
ALTER TABLE `data_pipas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_rabs`
--
ALTER TABLE `data_rabs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_update_gis`
--
ALTER TABLE `data_update_gis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_update_gis_divisi_id_foreign` (`divisi_id`),
  ADD KEY `data_update_gis_gate_valve_gis_foreign` (`gate_valve_gis`),
  ADD KEY `data_update_gis_gate_valve_lap_foreign` (`gate_valve_lap`),
  ADD KEY `data_update_gis_pipa_gis_foreign` (`pipa_gis`),
  ADD KEY `data_update_gis_pipa_lap_foreign` (`pipa_lap`),
  ADD KEY `data_update_gis_air_valve_gis_foreign` (`air_valve_gis`),
  ADD KEY `data_update_gis_air_valve_lap_foreign` (`air_valve_lap`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `laporangis`
--
ALTER TABLE `laporangis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_diameters`
--
ALTER TABLE `data_diameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_divisis`
--
ALTER TABLE `data_divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `data_jaringan_barus`
--
ALTER TABLE `data_jaringan_barus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `data_penggantian_pipas`
--
ALTER TABLE `data_penggantian_pipas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_pipas`
--
ALTER TABLE `data_pipas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_rabs`
--
ALTER TABLE `data_rabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `data_update_gis`
--
ALTER TABLE `data_update_gis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporangis`
--
ALTER TABLE `laporangis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_jaringan_barus`
--
ALTER TABLE `data_jaringan_barus`
  ADD CONSTRAINT `data_jaringan_barus_diameter_foreign` FOREIGN KEY (`diameter`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_jaringan_barus_divisi_foreign` FOREIGN KEY (`divisi`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_jaringan_barus_jenis_pipa_foreign` FOREIGN KEY (`jenis_pipa`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_penggantian_pipas`
--
ALTER TABLE `data_penggantian_pipas`
  ADD CONSTRAINT `data_penggantian_pipas_divisi_foreign` FOREIGN KEY (`divisi`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_penggantian_pipas_dn_baru_foreign` FOREIGN KEY (`dn_baru`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_penggantian_pipas_dn_lama_foreign` FOREIGN KEY (`dn_lama`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_penggantian_pipas_pipa_baru_foreign` FOREIGN KEY (`pipa_baru`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_penggantian_pipas_pipa_lama_foreign` FOREIGN KEY (`pipa_lama`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_update_gis`
--
ALTER TABLE `data_update_gis`
  ADD CONSTRAINT `data_update_gis_air_valve_gis_foreign` FOREIGN KEY (`air_valve_gis`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_air_valve_lap_foreign` FOREIGN KEY (`air_valve_lap`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `data_divisis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_gate_valve_gis_foreign` FOREIGN KEY (`gate_valve_gis`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_gate_valve_lap_foreign` FOREIGN KEY (`gate_valve_lap`) REFERENCES `data_diameters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_pipa_gis_foreign` FOREIGN KEY (`pipa_gis`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_update_gis_pipa_lap_foreign` FOREIGN KEY (`pipa_lap`) REFERENCES `data_pipas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
