-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2018 at 03:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `womdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id_invoice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_spk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_spk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_spk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_pengerjaan` datetime NOT NULL,
  `tgl_duedate_spk` datetime NOT NULL,
  `tid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_spk` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status_pengerjaan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_hotel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fasilitas` text COLLATE utf8_unicode_ci NOT NULL,
  `maps` text COLLATE utf8_unicode_ci NOT NULL,
  `foto_hotel` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_partner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_partner` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_partner` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_partner` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tlp_partner` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `kota_partner` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `npwp_partner` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `no_rekening` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `ppn` double NOT NULL,
  `tgl_invoice` datetime NOT NULL,
  `nik_karyawan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `duedate_invoice` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik_karyawan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_karyawan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_karyawan` text COLLATE utf8_unicode_ci NOT NULL,
  `kontak_karyawan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `flag_karyawan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2017_07_20_070920_create_hotel_table', 1),
(8, '2018_07_11_130811_create_deatail_invoice_tabel', 2),
(9, '2018_07_11_131835_create_invoice_table', 2),
(12, '2018_07_11_140409_create_ro_table', 2),
(14, '2018_07_11_135618_create_partner_table', 4),
(15, '2018_07_21_030148_create_mso_table', 4),
(20, '2018_07_11_133724_create_karyawan_table', 5),
(21, '2014_10_12_000000_create_users_table', 6),
(24, '2018_07_12_134749_create_spk_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mso`
--

CREATE TABLE `mso` (
  `id_mso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kota_mso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mso`
--

INSERT INTO `mso` (`id_mso`, `nama_ro`, `kota_mso`, `created_at`, `updated_at`) VALUES
('5b52d21d959ef', 'BALI', 'KUTA', '2018-07-20 23:26:37', NULL),
('5b52d21d95a4d', 'BALI', 'KARANGASEM', '2018-07-20 23:26:37', NULL),
('5b52d21d95a9c', 'BALI', 'BULELENG', '2018-07-20 23:26:37', NULL),
('5b52d21d95ab9', 'BALIKPAPAN', 'PENAJAM PASER UTARA', '2018-07-20 23:26:37', NULL),
('5b52d21d95ad7', 'BALIKPAPAN', 'PASER', '2018-07-20 23:26:37', NULL),
('5b52d21d95af3', 'BALIKPAPAN', 'HULU SUNGAI SELATAN', '2018-07-20 23:26:37', NULL),
('5b52d21d95b0e', 'BANDAR LAMPUNG', 'MESUJI', '2018-07-20 23:26:37', NULL),
('5b52d21d95b31', 'BANDAR LAMPUNG', 'LAMPUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d95b4b', 'BANDAR LAMPUNG', 'METRO', '2018-07-20 23:26:37', NULL),
('5b52d21d95b65', 'BANDUNG', 'BANDUNG BARAT', '2018-07-20 23:26:37', NULL),
('5b52d21d95b80', 'BANDUNG', 'PADALARANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95b9b', 'BANDUNG', 'MAJALAYA', '2018-07-20 23:26:37', NULL),
('5b52d21d95bbe', 'BANDUNG', 'SUMEDANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95bd8', 'BANDUNG', 'SUBANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95bf2', 'BANDUNG', 'BANDUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d95c08', 'BANDUNG', 'CIMAHI', '2018-07-20 23:26:37', NULL),
('5b52d21d95c20', 'BANJARMASIN', 'KOTABARU', '2018-07-20 23:26:37', NULL),
('5b52d21d95c4d', 'BANJARMASIN', 'TABALONG', '2018-07-20 23:26:37', NULL),
('5b52d21d95c69', 'BANJARMASIN', 'BANJARBARU', '2018-07-20 23:26:37', NULL),
('5b52d21d95c7f', 'BANJARMASIN', 'BARITO', '2018-07-20 23:26:37', NULL),
('5b52d21d95c91', 'BATAM', 'KARIMUN', '2018-07-20 23:26:37', NULL),
('5b52d21d95ca3', 'BATAM', 'TANJUNG PINANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95cbc', 'BATAM', 'BINTAN', '2018-07-20 23:26:37', NULL),
('5b52d21d95cce', 'BOGOR', 'CIBINONG', '2018-07-20 23:26:37', NULL),
('5b52d21d95ce0', 'BOGOR', 'BOGOR', '2018-07-20 23:26:37', NULL),
('5b52d21d95d04', 'BOGOR', 'BOJONG', '2018-07-20 23:26:37', NULL),
('5b52d21d95d3d', 'CIREBON', 'JATIBARANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95d54', 'CIREBON', 'MAJALENGKA', '2018-07-20 23:26:37', NULL),
('5b52d21d95d66', 'CIREBON', 'KUNINGAN', '2018-07-20 23:26:37', NULL),
('5b52d21d95d78', 'CIREBON', 'INDRAMAYU', '2018-07-20 23:26:37', NULL),
('5b52d21d95da2', 'GURU MUGHNI', 'JAKARTA UTARA', '2018-07-20 23:26:37', NULL),
('5b52d21d95dc0', 'GURU MUGHNI', 'JAKARTA PUSAT', '2018-07-20 23:26:37', NULL),
('5b52d21d95dda', 'GURU MUGHNI', 'JAKARTA BARAT', '2018-07-20 23:26:37', NULL),
('5b52d21d95dec', 'JAMBI', 'TEBO', '2018-07-20 23:26:37', NULL),
('5b52d21d95dfc', 'JAMBI', 'TANJUNG JABUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d95e0c', 'JAMBI', 'MUARA BUNGO', '2018-07-20 23:26:37', NULL),
('5b52d21d95e1c', 'JAYAPURA', 'BIAK NUMFOR', '2018-07-20 23:26:37', NULL),
('5b52d21d95e31', 'JAYAPURA', 'KEPULAUAN YAPEN', '2018-07-20 23:26:37', NULL),
('5b52d21d95e44', 'JAYAPURA', 'KOTARAJA', '2018-07-20 23:26:37', NULL),
('5b52d21d95e76', 'JEMBER', 'SITUBONDO', '2018-07-20 23:26:37', NULL),
('5b52d21d95ea1', 'JEMBER', 'PROBOLINGGO', '2018-07-20 23:26:37', NULL),
('5b52d21d95ecb', 'JEMBER', 'LUMAJANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95f01', 'KARAWANG', 'PURWAKARTA', '2018-07-20 23:26:37', NULL),
('5b52d21d95f2c', 'KARAWANG', 'KARAWANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95f57', 'KARAWANG', 'CIKARANG', '2018-07-20 23:26:37', NULL),
('5b52d21d95f82', 'KARAWANG', 'CIKAMPEK', '2018-07-20 23:26:37', NULL),
('5b52d21d95fac', 'MAKASSAR', 'MAROS', '2018-07-20 23:26:37', NULL),
('5b52d21d95fe1', 'MAKASSAR', 'LUWU', '2018-07-20 23:26:37', NULL),
('5b52d21d9600b', 'MAKASSAR', 'DONGGALA', '2018-07-20 23:26:37', NULL),
('5b52d21d96036', 'MALANG', 'BATU', '2018-07-20 23:26:37', NULL),
('5b52d21d96060', 'MALANG', 'TRENGGALEK', '2018-07-20 23:26:37', NULL),
('5b52d21d9608a', 'MALANG', 'PASURUAN', '2018-07-20 23:26:37', NULL),
('5b52d21d960bf', 'MANADO', 'MINAHASA', '2018-07-20 23:26:37', NULL),
('5b52d21d960ea', 'MANADO', 'TERNATE', '2018-07-20 23:26:37', NULL),
('5b52d21d96114', 'MANADO', 'KOTAMOBAGU', '2018-07-20 23:26:37', NULL),
('5b52d21d9613f', 'MATARAM', 'LOMBOK', '2018-07-20 23:26:37', NULL),
('5b52d21d9616a', 'MATARAM', 'SUMBAWA', '2018-07-20 23:26:37', NULL),
('5b52d21d961bf', 'MATARAM', 'BUGIS', '2018-07-20 23:26:37', NULL),
('5b52d21d961f5', 'MEDAN', 'SAMOSIR', '2018-07-20 23:26:37', NULL),
('5b52d21d96215', 'MEDAN', 'TAPANULI', '2018-07-20 23:26:37', NULL),
('5b52d21d96235', 'MEDAN', 'LABUHAN BATU', '2018-07-20 23:26:37', NULL),
('5b52d21d96254', 'PADANG', 'TANAH DATAR', '2018-07-20 23:26:37', NULL),
('5b52d21d9627b', 'PADANG', 'PARIAMAN', '2018-07-20 23:26:37', NULL),
('5b52d21d9629b', 'PADANG', 'PADANG PANJANG', '2018-07-20 23:26:37', NULL),
('5b52d21d962ba', 'PALANGKARAYA', 'KOTAWARINGIN', '2018-07-20 23:26:37', NULL),
('5b52d21d962db', 'PALANGKARAYA', 'SERUYAN', '2018-07-20 23:26:37', NULL),
('5b52d21d962fb', 'PALANGKARAYA', 'SAMPIT', '2018-07-20 23:26:37', NULL),
('5b52d21d9631b', 'PALEMBANG', 'LAHAT', '2018-07-20 23:26:37', NULL),
('5b52d21d9633a', 'PALEMBANG', 'OGAN KOMERING ULU', '2018-07-20 23:26:37', NULL),
('5b52d21d96359', 'PALEMBANG', 'OGAN ILIR', '2018-07-20 23:26:37', NULL),
('5b52d21d96378', 'PALU', 'TOLI-TOLI', '2018-07-20 23:26:37', NULL),
('5b52d21d963b7', 'PALU', 'POSO', '2018-07-20 23:26:37', NULL),
('5b52d21d963d6', 'PALU', 'PARIGI MOUTONG', '2018-07-20 23:26:37', NULL),
('5b52d21d963f6', 'PANGKAL PINANG', 'BELITUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d96415', 'PANGKAL PINANG', 'BANGKA', '2018-07-20 23:26:37', NULL),
('5b52d21d96434', 'PANGKAL PINANG', 'TANJUNG PANDAN', '2018-07-20 23:26:37', NULL),
('5b52d21d9645b', 'PASAR REBO', 'CILEDUG', '2018-07-20 23:26:37', NULL),
('5b52d21d9647a', 'PASAR REBO', 'PAMULANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96499', 'PASAR REBO', 'CIPUTAT', '2018-07-20 23:26:37', NULL),
('5b52d21d964b9', 'PASAR REBO', 'BINTARO', '2018-07-20 23:26:37', NULL),
('5b52d21d964e0', 'PASAR REBO', 'JAKARTA SELATAN', '2018-07-20 23:26:37', NULL),
('5b52d21d964ff', 'PASAR REBO', 'TANGERANG SELATAN', '2018-07-20 23:26:37', NULL),
('5b52d21d9651f', 'PASAR REBO', 'DEPOK', '2018-07-20 23:26:37', NULL),
('5b52d21d9653e', 'PASAR REBO', 'BEKASI', '2018-07-20 23:26:37', NULL),
('5b52d21d96565', 'PASAR REBO', 'JAKARTA TIMUR', '2018-07-20 23:26:37', NULL),
('5b52d21d96584', 'PEKANBARU', 'RIAU', '2018-07-20 23:26:37', NULL),
('5b52d21d965a3', 'PEKANBARU', 'ROKAN HULU', '2018-07-20 23:26:37', NULL),
('5b52d21d965c2', 'PEKANBARU', 'ROKAN HILIR', '2018-07-20 23:26:37', NULL),
('5b52d21d965e9', 'PONTIANAK', 'SAMBAS', '2018-07-20 23:26:37', NULL),
('5b52d21d96609', 'PONTIANAK', 'SINGKAWANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96628', 'PONTIANAK', 'SANGGAU', '2018-07-20 23:26:37', NULL),
('5b52d21d96647', 'PURWOKERTO', 'PURBALINGGA', '2018-07-20 23:26:37', NULL),
('5b52d21d96666', 'PURWOKERTO', 'CILACAP', '2018-07-20 23:26:37', NULL),
('5b52d21d9668c', 'PURWOKERTO', 'BANYUMAS', '2018-07-20 23:26:37', NULL),
('5b52d21d966ab', 'SAMARINDA', 'KUTAI', '2018-07-20 23:26:37', NULL),
('5b52d21d966ca', 'SAMARINDA', 'BONTANG', '2018-07-20 23:26:37', NULL),
('5b52d21d966e8', 'SAMARINDA', 'TENGGARONG', '2018-07-20 23:26:37', NULL),
('5b52d21d9670f', 'SEMARANG', 'SALATIGA', '2018-07-20 23:26:37', NULL),
('5b52d21d9672e', 'SEMARANG', 'PURWODADI', '2018-07-20 23:26:37', NULL),
('5b52d21d9674d', 'SEMARANG', 'PATI', '2018-07-20 23:26:37', NULL),
('5b52d21d9676c', 'SEMARANG', 'KUDUS', '2018-07-20 23:26:37', NULL),
('5b52d21d96793', 'SEMARANG', 'JEPARA', '2018-07-20 23:26:37', NULL),
('5b52d21d967b2', 'SEMARANG', 'BATANG', '2018-07-20 23:26:37', NULL),
('5b52d21d967d1', 'SEMARANG', 'BLORA', '2018-07-20 23:26:37', NULL),
('5b52d21d967f0', 'SEMARANG', 'AMBARAWA', '2018-07-20 23:26:37', NULL),
('5b52d21d96816', 'SERANG', 'PANDEGLANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96835', 'SERANG', 'RANGKAS BITUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d96855', 'SERANG', 'LEBAK', '2018-07-20 23:26:37', NULL),
('5b52d21d96874', 'SERANG', 'CILEGON', '2018-07-20 23:26:37', NULL),
('5b52d21d96899', 'SERANG', 'BANTEN', '2018-07-20 23:26:37', NULL),
('5b52d21d968b9', 'SOLO', 'SURAKARTA', '2018-07-20 23:26:37', NULL),
('5b52d21d968ed', 'SOLO', 'WONOGIRI', '2018-07-20 23:26:37', NULL),
('5b52d21d9690d', 'SOLO', 'SUKOHARJO', '2018-07-20 23:26:37', NULL),
('5b52d21d96934', 'SOLO', 'SRAGEN', '2018-07-20 23:26:37', NULL),
('5b52d21d96953', 'SOLO', 'KARANGANYAR', '2018-07-20 23:26:37', NULL),
('5b52d21d96972', 'SUKABUMI', 'CIMACAN', '2018-07-20 23:26:37', NULL),
('5b52d21d96991', 'SUKABUMI', 'CIANJUR', '2018-07-20 23:26:37', NULL),
('5b52d21d969b8', 'SUKABUMI', 'SUKABUMI', '2018-07-20 23:26:37', NULL),
('5b52d21d969d7', 'SURABAYA', 'MADURA', '2018-07-20 23:26:37', NULL),
('5b52d21d969f6', 'SURABAYA', 'TULUNGAGUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d96a15', 'SURABAYA', 'TUBAN', '2018-07-20 23:26:37', NULL),
('5b52d21d96a3b', 'SURABAYA', 'SURABAYA', '2018-07-20 23:26:37', NULL),
('5b52d21d96a5b', 'SURABAYA', 'SUMENEP', '2018-07-20 23:26:37', NULL),
('5b52d21d96a7a', 'SURABAYA', 'SIDOARJO', '2018-07-20 23:26:37', NULL),
('5b52d21d96a99', 'SURABAYA', 'PONOROGO', '2018-07-20 23:26:37', NULL),
('5b52d21d96ab7', 'SURABAYA', 'NGAWI', '2018-07-20 23:26:37', NULL),
('5b52d21d96add', 'SURABAYA', 'MOJOKERTO', '2018-07-20 23:26:37', NULL),
('5b52d21d96afc', 'SURABAYA', 'MADIUN', '2018-07-20 23:26:37', NULL),
('5b52d21d96b1b', 'SURABAYA', 'MAGETAN', '2018-07-20 23:26:37', NULL),
('5b52d21d96b45', 'SURABAYA', 'KEDIRI', '2018-07-20 23:26:37', NULL),
('5b52d21d96b65', 'SURABAYA', 'JOMBANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96b84', 'SURABAYA', 'GRESIK', '2018-07-20 23:26:37', NULL),
('5b52d21d96ba3', 'SURABAYA', 'BOJONEGORO', '2018-07-20 23:26:37', NULL),
('5b52d21d96bca', 'TANGERANG', 'TANGERANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96be9', 'TANGERANG', 'CENGKARENG', '2018-07-20 23:26:37', NULL),
('5b52d21d96c09', 'TARAKAN', 'BULUNGAN', '2018-07-20 23:26:37', NULL),
('5b52d21d96c28', 'TARAKAN', 'BERAU', '2018-07-20 23:26:37', NULL),
('5b52d21d96c4f', 'TARAKAN', 'TANJUNG SELOR', '2018-07-20 23:26:37', NULL),
('5b52d21d96c6e', 'TASIKMALAYA', 'CIAMIS', '2018-07-20 23:26:37', NULL),
('5b52d21d96c8e', 'TASIKMALAYA', 'GARUT', '2018-07-20 23:26:37', NULL),
('5b52d21d96cac', 'TASIKMALAYA', 'TASIKMALAYA', '2018-07-20 23:26:37', NULL),
('5b52d21d96cd3', 'YOGYAKARTA', 'SLEMAN', '2018-07-20 23:26:37', NULL),
('5b52d21d96cf2', 'YOGYAKARTA', 'GUNUNG KIDUL', '2018-07-20 23:26:37', NULL),
('5b52d21d96d12', 'YOGYAKARTA', 'YOGYAKARTA', '2018-07-20 23:26:37', NULL),
('5b52d21d96d30', 'YOGYAKARTA', 'WONOSOBO', '2018-07-20 23:26:37', NULL),
('5b52d21d96d57', 'YOGYAKARTA', 'WONOSARI', '2018-07-20 23:26:37', NULL),
('5b52d21d96d76', 'YOGYAKARTA', 'TEMANGGUNG', '2018-07-20 23:26:37', NULL),
('5b52d21d96d95', 'YOGYAKARTA', 'PURWOREJO', '2018-07-20 23:26:37', NULL),
('5b52d21d96db4', 'YOGYAKARTA', 'MAGELANG', '2018-07-20 23:26:37', NULL),
('5b52d21d96dda', 'YOGYAKARTA', 'KLATEN', '2018-07-20 23:26:37', NULL),
('5b52d21d96dfa', 'YOGYAKARTA', 'KEBUMEN', '2018-07-20 23:26:37', NULL),
('5b52d21d96e19', 'YOGYAKARTA', 'BANTUL', '2018-07-20 23:26:37', NULL),
('5b52d21d96e38', 'PURWOKERTO', 'BANJARNEGARA', '2018-07-20 23:26:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_partner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_partner` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_partner` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tlp_partner` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `kota_partner` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `npwp_partner` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `no_rekening` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `foto_partner` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id_partner`, `nama_partner`, `alamat_partner`, `pic_partner`, `tlp_partner`, `kota_partner`, `npwp_partner`, `no_rekening`, `foto_partner`, `created_at`, `updated_at`) VALUES
('5b52b0958db2c', 'BRI', 'Jakarta Selatan', 'Udin BRI', '08123456789', 'DKI Jakarta', '1122334455', '13568986432', '2018-07-21_ImgPartner_bank_bri.png', '2018-07-20 21:03:33', '2018-07-20 21:03:33'),
('5b52b0c78e609', 'BNI', 'Jakarta Barat', 'Udin BCA', '081987654321', 'DKI Jakarta', '12345678', '1234567', '2018-07-21_ImgPartner_bank_bni.png', '2018-07-20 21:04:23', '2018-07-20 21:04:23'),
('5b52b0ef58e00', 'BCA', 'Jakarta Pusat', 'Udin BCA', '08512346789', 'DKI Jakarta', '112233445', '929183734', '2018-07-21_ImgPartner_bank_bca.png', '2018-07-20 21:05:03', '2018-07-20 21:05:03'),
('5b52b121a03e9', 'MANDIRI', 'Jakarta Utara', 'Udin Mandiri', '08897654321', 'DKI Jakarta', '112233445', '9846236558', '2018-07-21_ImgPartner_bank_mandiri.png', '2018-07-20 21:05:53', '2018-07-20 21:05:53'),
('5b52b141c5f6a', 'DANAMON', 'Jakarta Selatan', 'Udin Danamon', '08897654321', 'DKI Jakarta', '12983487465', '9846236558', '2018-07-21_ImgPartner_bank_danamon.png', '2018-07-20 21:06:25', '2018-07-20 21:06:25'),
('5b52b16e80e30', 'SINARMAS', 'Jakarta Barat', 'Udin Simas', '0897612534', 'DKI Jakarta', '9816375869', '929183734', '2018-07-21_ImgPartner_bank_sinarmas.png', '2018-07-20 21:07:10', '2018-07-20 21:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `ro`
--

CREATE TABLE `ro` (
  `id_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kota_ro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ro`
--

INSERT INTO `ro` (`id_ro`, `nama_ro`, `kota_ro`, `created_at`, `updated_at`) VALUES
('5b528760c9f47', 'RO - BALI', 'BALI', '2018-07-20 18:07:44', NULL),
('5b528760c9f68', 'RO - BALIKPAPAN', 'BALIKPAPAN', '2018-07-20 18:07:44', NULL),
('5b528760c9f7a', 'RO - BANDAR LAMPUNG', 'BANDAR LAMPUNG', '2018-07-20 18:07:44', NULL),
('5b528760c9f8b', 'RO - BANDUNG', 'BANDUNG', '2018-07-20 18:07:44', NULL),
('5b528760c9f9c', 'RO - BANJARMASIN', 'BANJARMASIN', '2018-07-20 18:07:44', NULL),
('5b528760c9fac', 'RO - BATAM', 'BATAM', '2018-07-20 18:07:44', NULL),
('5b528760c9fc3', 'RO - BOGOR', 'BOGOR', '2018-07-20 18:07:44', NULL),
('5b528760c9fd3', 'RO - CIREBON', 'CIREBON', '2018-07-20 18:07:44', NULL),
('5b528760c9fe4', 'RO - GURU MUGHNI', 'GURU MUGHNI', '2018-07-20 18:07:44', NULL),
('5b528760c9ff5', 'RO - JAMBI', 'JAMBI', '2018-07-20 18:07:44', NULL),
('5b528760ca005', 'RO - JAYAPURA', 'JAYAPURA', '2018-07-20 18:07:44', NULL),
('5b528760ca016', 'RO - JEMBER', 'JEMBER', '2018-07-20 18:07:44', NULL),
('5b528760ca02b', 'RO - KARAWANG', 'KARAWANG', '2018-07-20 18:07:44', NULL),
('5b528760ca03c', 'RO - MAKASSAR', 'MAKASSAR', '2018-07-20 18:07:44', NULL),
('5b528760ca04d', 'RO - MALANG', 'MALANG', '2018-07-20 18:07:44', NULL),
('5b528760ca05d', 'RO - MANADO', 'MANADO', '2018-07-20 18:07:44', NULL),
('5b528760ca06d', 'RO - MATARAM', 'MATARAM', '2018-07-20 18:07:44', NULL),
('5b528760ca082', 'RO - MEDAN', 'MEDAN', '2018-07-20 18:07:44', NULL),
('5b528760ca093', 'RO - PADANG', 'PADANG', '2018-07-20 18:07:44', NULL),
('5b528760ca0a3', 'RO - PALANGKARAYA', 'PALANGKARAYA', '2018-07-20 18:07:44', NULL),
('5b528760ca0b4', 'RO - PALEMBANG', 'PALEMBANG', '2018-07-20 18:07:44', NULL),
('5b528760ca0c4', 'RO - PALU', 'PALU', '2018-07-20 18:07:44', NULL),
('5b528760ca0d5', 'RO - PANGKAL PINANG', 'PANGKAL PINANG', '2018-07-20 18:07:44', NULL),
('5b528760ca0ea', 'RO - PASAR REBO', 'PASAR REBO', '2018-07-20 18:07:44', NULL),
('5b528760ca0fb', 'RO - PEKANBARU', 'PEKANBARU', '2018-07-20 18:07:44', NULL),
('5b528760ca10b', 'RO - PONTIANAK', 'PONTIANAK', '2018-07-20 18:07:44', NULL),
('5b528760ca11b', 'RO - PURWOKERTO', 'PURWOKERTO', '2018-07-20 18:07:44', NULL),
('5b528760ca131', 'RO - SAMARINDA', 'SAMARINDA', '2018-07-20 18:07:44', NULL),
('5b528760ca141', 'RO - SEMARANG', 'SEMARANG', '2018-07-20 18:07:44', NULL),
('5b528760ca152', 'RO - SERANG', 'SERANG', '2018-07-20 18:07:44', NULL),
('5b528760ca162', 'RO - SOLO', 'SOLO', '2018-07-20 18:07:44', NULL),
('5b528760ca177', 'RO - SUKABUMI', 'SUKABUMI', '2018-07-20 18:07:44', NULL),
('5b528760ca188', 'RO - SURABAYA', 'SURABAYA', '2018-07-20 18:07:44', NULL),
('5b528760ca199', 'RO - TANGERANG', 'TANGERANG', '2018-07-20 18:07:44', NULL),
('5b528760ca1aa', 'RO - TARAKAN', 'TARAKAN', '2018-07-20 18:07:44', NULL),
('5b528760ca1bf', 'RO - TASIKMALAYA', 'TASIKMALAYA', '2018-07-20 18:07:44', NULL),
('5b528760ca1cf', 'RO - YOGYAKARTA', 'YOGYAKARTA', '2018-07-20 18:07:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_spk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_spk` datetime NOT NULL,
  `tgl_pengerjaan` timestamp NULL DEFAULT NULL,
  `tgl_duedate_spk` timestamp NULL DEFAULT NULL,
  `tid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nama_merchant` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_merchant` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_merchant` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kontak_merchant` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_spk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `perintah_spk` text COLLATE utf8_unicode_ci NOT NULL,
  `foto_1` text COLLATE utf8_unicode_ci NOT NULL,
  `foto_2` text COLLATE utf8_unicode_ci NOT NULL,
  `status_spk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_pengerjaan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_edc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sn_edc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_komunikasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nmr_simcard` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sn_simcard` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adaptor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `edc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stiker` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_sesuai_lokasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_sesuai_lokasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tid_mid_sesuai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `test_debit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `test_kredit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `test_prepaid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thermal_awal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thermal_drop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thermal_akhir` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan_spk` text COLLATE utf8_unicode_ci NOT NULL,
  `nik_karyawan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_mso` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kota_mso` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_partner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status_invoicing` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_invoice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `no_spk`, `tgl_spk`, `tgl_pengerjaan`, `tgl_duedate_spk`, `tid`, `mid`, `nama_merchant`, `alamat_merchant`, `pic_merchant`, `kontak_merchant`, `jenis_spk`, `perintah_spk`, `foto_1`, `foto_2`, `status_spk`, `status_pengerjaan`, `jenis_edc`, `sn_edc`, `tipe_komunikasi`, `provider`, `nmr_simcard`, `sn_simcard`, `adaptor`, `edc`, `stiker`, `nama_sesuai_lokasi`, `alamat_sesuai_lokasi`, `tid_mid_sesuai`, `test_debit`, `test_kredit`, `test_prepaid`, `thermal_awal`, `thermal_drop`, `thermal_akhir`, `keterangan_spk`, `nik_karyawan`, `nama_mso`, `id_ro`, `nama_ro`, `kota_mso`, `id_partner`, `status_invoicing`, `id_invoice`, `created_at`, `updated_at`) VALUES
('3ff1b6ac-b761-494d-a117-9364668cfd7b', '010203', '2018-08-05 20:38:45', NULL, '2018-10-07 17:00:00', '4546436456', '6767657357', 'udin shop', 'meikarta', 'udin', '81234567', 'Pasang', 'pasang cuk', 'no_image.jpg', 'no_image.jpg', '-', '-', 'ingenico', '43245325235', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'PURWOKERTO', 'CILACAP', '5b52b121a03e9', '-', '-', '2018-08-05 13:38:45', NULL),
('494ffa40-5641-476a-86ab-f62cf20ced0e', '-', '2018-08-06 08:44:39', NULL, NULL, '6765765765', '454545465', 'minimarket', 'cikarang', 'udin', '8123456', 'PM', 'urgent', 'no_image.jpg', 'no_image.jpg', '-', '-', 'verifone', '54765865', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'KARAWANG', 'CIKARANG', '5b52b141c5f6a', '-', '-', '2018-08-06 01:44:39', NULL),
('6dda99b1-0782-463f-bc7c-da78303cea80', '010203', '2018-08-05 20:38:45', '2018-08-05 01:15:00', '2018-09-07 17:00:00', '6765765765', '454545465', 'minimarket', 'cikarang', 'udin', '8123456', 'PM', 'PM Dong', 'ImgSpk1_050818_6765765765.jpg', 'ImgSpk2_050818_6765765765.jpg', 'On Progress', 'Visit', 'verifone', '54765865', 'gprs', 'telkomsel', '54654365754', '765776576786', 'BAIK', 'RUSAK', 'BAIK', 'TIDAK', 'YA', 'TIDAK', '3', '1', '3', '0', '1', '1', 'cek edc ok', '2018.07.0050', 'Squidword MSO', '5b52d21d95f57', 'KARAWANG', 'CIKARANG', '5b52b121a03e9', '-', '-', '2018-08-05 13:38:45', '2018-08-05 14:33:29'),
('738106e4-6fbd-4e4f-94a2-cbb567317840', 'spk/08/002', '2018-08-05 20:38:45', NULL, NULL, '67654757', '565763556', 'udin cell', 'cibitung', 'udin cell', '8123456', 'CM', 'urgent', 'no_image.jpg', 'no_image.jpg', '-', '-', 'verifone', '534553454', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'KARAWANG', 'PURWAKARTA', '5b52b121a03e9', '-', '-', '2018-08-05 13:38:45', NULL),
('8c133be3-2e7f-48a9-aff3-101a00b87055', '-', '2018-08-06 08:44:39', NULL, NULL, '6765765736', '56565656', 'warung smart', 'tambun', 'udin', '81234567', 'CM', 'urgent', 'no_image.jpg', 'no_image.jpg', '-', '-', 'ingenico', '5355353325', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'KARAWANG', 'CIKAMPEK', '5b52b141c5f6a', '-', '-', '2018-08-06 01:44:39', NULL),
('8f3bb3b4-4ab7-4c5e-96af-a58d199145df', '-', '2018-08-06 08:44:39', NULL, NULL, '4546436456', '6767657357', 'udin shop', 'meikarta', 'udin', '81234567', 'PM', 'urgent', 'no_image.jpg', 'no_image.jpg', '-', '-', 'ingenico', '43245325235', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'PURWOKERTO', 'CILACAP', '5b52b141c5f6a', '-', '-', '2018-08-06 01:44:39', NULL),
('90958663-4d61-4f60-98e3-b7200a185f7b', '2121212', '2018-08-06 08:44:39', NULL, '2018-09-07 17:00:00', '67654757', '565763556', 'udin cell', 'cibitung', 'udin cell', '8123456', 'PM', 'PM Gan!', 'no_image.jpg', 'no_image.jpg', 'On Progress', '-', 'verifone', '534553454', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '2018.08.0047', 'udin mso', '5b52d21d95f01', 'KARAWANG', 'PURWAKARTA', '5b52b141c5f6a', '-', '-', '2018-08-06 01:44:39', NULL),
('cfcbd6fd-abf6-4dd7-b610-6b44084518e7', '11223344', '2018-08-05 20:38:45', '2018-08-05 02:15:00', '2018-09-07 17:00:00', '6765765736', '56565656', 'warung smart', 'tambun', 'udin', '81234567', 'CM', 'CM cuy', 'ImgSpk1_050818_6765765736.jpg', 'ImgSpk2_050818_6765765736.jpg', 'Selesai', 'Visit', 'ingenico', '5355353325', 'gprs', 'telkomsel', '6437357547', '76576578', 'RUSAK', 'RUSAK', 'RUSAK', 'TIDAK', 'TIDAK', 'TIDAK', '1', '3', '2', '0', '2', '2', 'cek ok ya', '2018.08.0047', 'udin mso', '5b52d21d95f82', 'KARAWANG', 'CIKAMPEK', '5b52b121a03e9', '-', '-', '2018-08-05 13:38:45', '2018-08-05 14:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nik_karyawan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_karyawan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_karyawan` text COLLATE utf8_unicode_ci NOT NULL,
  `kontak_karyawan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `flag_karyawan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik_karyawan`, `nama_karyawan`, `alamat_karyawan`, `kontak_karyawan`, `nama_ro`, `jabatan`, `flag_karyawan`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
('5b542965f1e13', '2018.07.0045', 'Udin Awesome', 'Meikarta', '085228053623', 'GURU MUGHNI', 'Super Admin', 'Super Admin', '$2y$10$g1/bjzKABXK2xqHD6dLTsO0GqOwMyGZim46qS61ybsSWk2S9s6T9m', '5b542965f1e13_update.png', 'FalgS7mgtZ9wZ65h6NVOXLLG5C6qbn1GEsQbNx3bvfNapxOcUKMyVYFjNRmn', '2018-07-21 23:51:18', '2018-08-05 04:35:11'),
('5b547cd388db0', '2018.07.0095', 'Patrick RO', 'Bikini Bottom', '08123456789', 'KARAWANG', 'Admin RO', 'Admin RO', '$2y$10$Ydg7lDIkO4j9t5StBBjNY.wxaOwWmzxa1F6Y60N.zKpeDXvGOHzbi', '5b547cd388db0.jpg', 'UfVQUQiPmnUCvXc54BVKRwbaDke88b5m4L7ZKoQYFvuMDzgspSAO1wwPL64g', '2018-07-22 05:47:15', '2018-08-06 01:48:33'),
('5b547cfe4d03a', '2018.07.0011', 'Spongebob HO', 'Jakarta', '081987654321', 'GURU MUGHNI', 'Admin HO', 'Admin HO', '$2y$10$xY./mmlh3p9ehV5M1qEwpOWJRfoZI2BmcqLnjo4srMKagK8/atVAa', '5b547cfe4d03a.jpg', 'GMgEBPBNuaLgjaIiJ37GJ5dWkifafk61houeeE5e4QplBj1IQjP3TNMiVQgG', '2018-07-22 05:47:58', '2018-08-06 01:47:16'),
('5b547d265d373', '2018.07.0050', 'Squidword MSO', 'purworejo', '081987654321', 'KARAWANG', 'Admin MSO', 'Admin MSO', '$2y$10$D43749slg1EC1R285K8e4eSwV76H1nQAWGtDyjhqOwUJdr5t9.gBC', '5b547d265d373.jpg', 'VseNbqkIYJjnpQ5ighNjEpd3AnhRpyIxbnMbP0U4luvRNSij3YJtFupvfvDt', '2018-07-22 05:48:38', '2018-08-05 14:33:51'),
('5b548da32b038', '2018.07.0096', 'Snowden Finance', 'Babelan', '08543217890', 'GURU MUGHNI', 'Admin Finance', 'Admin Finance', '$2y$10$/AFYBmOJRYDpjugVyh.upOJoq9BGIZ5KIH9jB/ewbNdQ4fBk0qSpG', '5b548da32b038.jpg', 'rlnjX3c0BL0jNXwyhfmyciFY7hnjcRE6MKwfbVDDAk7jwKdTpq0hT3I5CKj3', '2018-07-22 06:58:59', '2018-08-02 20:16:46'),
('5b548df5ed443', '2018.07.0058', 'Tamvan Berani Partner', 'Bikini Bottom', '0876543211', 'PURWOKERTO', 'Admin Partner', 'Admin Partner', '$2y$10$UTJ39wS7VfSOOIofuG5mCOF7onrXyD1mw0otsDCHGvrpDEBZshBWO', '5b548df5ed443.jpg', 'xGspkM9DwRVwuScLVBBH0M4f2ZlqrdU04jA6gAyKpAREYMJcSVzrfi0xejHp', '2018-07-22 07:00:22', '2018-08-06 01:45:11'),
('5b63cce64335a', '2018.08.0047', 'udin mso', 'karawang', '2144342', 'KARAWANG', 'Admin MSO', 'Admin MSO', '$2y$10$1XNopdJQX7JCygsxLuvRjOfdKPkbuctGS6XvsDDUbd/YyN5E4cl7W', '5b63cce64335a.jpg', 'qXZxbwmVv1smo1O2adL2oOvmTjmS7FNvrzg1OyEqiD8RXvlE9yIyxVXGYqN1', '2018-08-02 20:32:54', '2018-08-05 14:41:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik_karyawan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mso`
--
ALTER TABLE `mso`
  ADD PRIMARY KEY (`id_mso`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `ro`
--
ALTER TABLE `ro`
  ADD PRIMARY KEY (`id_ro`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
