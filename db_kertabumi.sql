-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2019 at 02:22 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kertabumi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstoks`
--

CREATE TABLE IF NOT EXISTS `adminstoks` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminstoks`
--

INSERT INTO `adminstoks` (`id`, `username`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'adm', 'adm@gmail.com', 0, '$2y$10$vLk78oP.5cLyDQraznU3H.rsgw/iwMc6nPRlVzTYBu5Xk1ZtOsC/a', 'B462bdyDLUZtmJhsXMe7xmXwBJRjAFo6zr1qAJaAZRMiAzwYRA9QV9jtVGDg', '2018-11-26 02:44:03', '2018-11-26 02:44:03'),
(4, 'Septina Eka Wati', 'spt@gmail.com', 1, '$2y$10$EwrkZZ9BaY3Shw0i/OFrMu3qW1jQqW2wasIY9LoRI6gh/L8uP4v6W', 'CAawblDhmeyAbrrNq1FO1oWPl2urpOZQFwzCNGCutc4UH4BlaJQsKQt6TqLG', '2018-11-26 02:45:33', '2018-12-04 04:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` int(11) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `email`, `telp`, `jk`, `alamat`, `kodepos`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'jn', 'jn@gmail.com', '08989090', 1, 'kaliagung', '55664', '$2y$10$FpCCy3/0KuUWsIRvFLaQE.6GRSqkfUIM5qSGtHW35sC8CvvaAaURi', 'zjzjB2UOQohqiRWLfsC2eiyafL4bLhpohp84IOKls1Gz68d3SvO3SYQCgX7U', '2018-11-12 03:52:52', '2018-12-04 04:20:40'),
(8, 'Septi EW', 'spt@gmail.com', '085786997739', 1, 'Kemiri, RT 01 RW 01, Kaliagung, Sentolo, Kulon Progo', '55664', '$2y$10$fe38TaPUoZPORopZqOh3jeZkcWle/1nwtL82u5HfdUwzr6TZXOXLO', 'sOFwEwu8aLgLGr1mKCPZkXfvywg0AYEKZfBjSQbTL29f8hYnmFUHQ6NhlrGz', '2018-11-12 09:01:41', '2018-12-05 09:22:40'),
(12, 'cb', 'cb@gmail.com', '034567', 0, 'cbcbcb', '34567', '$2y$10$ic7EXCwCqUirWKUCmj8KPubUQXwapa7LP/q0MiOp8F4poQrUzN9NO', 'x4mMg098Cgi4gGdzz3zpWgOjeUXnagl5hn6DhsFPiGeO9spfNG9UOXJQWNeQ', '2018-11-12 21:39:52', '2018-11-12 21:39:52'),
(13, 'tes', 'tes@gmail.com', '087777', 1, 'testse', '5676567', '$2y$10$jRncdTjIHqs5wlFCyBXin.v2gvmy89V2Z5LwJ4e.YoNYlpBasBxnq', NULL, '2018-11-12 22:11:10', '2018-11-12 22:11:10'),
(15, 'tri', 'tri@gmail.com', '045678', 1, 'klb', '4567', '$2y$10$CVDKXQ52Ybl0FeVsf.rVpux4AAv2ACzZJMB0iVuq6vihg.oElZyn2', 'PYtc30IvvIPxBxyi3RkIx0wSRKPBLUBSTSSEoMYie7MPk8Af5bGBGxATpUtF', '2018-11-15 20:34:43', '2018-11-15 20:34:43'),
(18, 'ami', 'ami@gmail.com', '04567', 1, 'Kaliagung, Sentolo', '55664', '$2y$10$EQQkvMIWss2foJgKkfGAXOY0K/lyifUlJ8PHw8H2UkL0JMbPWeT5.', 'Uhw9PJ8MTCWNFwshZSAm2suPQGVBWgDRN2aYTAgFs8veWOe0dG7aHmvoBgHN', '2018-12-16 06:02:11', '2018-12-16 06:02:11'),
(20, 'Harish', 'abdurrohmanharish@gmail.com', '085743257778', 0, 'Kaliagung, Sentolo', '55664', '$2y$10$KGkwk6/hkni23s2o./6g1eTtANRYcXw/Vah4tD6fEPeUesXJvnvYi', NULL, '2018-12-29 21:21:07', '2018-12-29 21:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `detailkemejas`
--

CREATE TABLE IF NOT EXISTS `detailkemejas` (
  `id` int(10) unsigned NOT NULL,
  `id_kemeja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kains`
--

CREATE TABLE IF NOT EXISTS `detail_kains` (
  `id` int(10) unsigned NOT NULL,
  `id_kain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `awal` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_kains`
--

INSERT INTO `detail_kains` (`id`, `id_kain`, `tipe`, `awal`, `masuk`, `keluar`, `akhir`, `created_at`, `updated_at`) VALUES
(1, '3', 2, 2, 5, 0, 7, '2018-11-23 23:19:33', '2018-11-23 23:19:33'),
(2, '2', 0, 15, 0, 5, 10, '2018-11-23 23:21:22', '2018-11-23 23:21:22'),
(3, '4', 2, 10, 0, 5, 5, '2018-11-23 23:29:07', '2018-11-23 23:29:07'),
(4, '10', 2, 3, 0, 3, 0, '2018-11-23 23:30:29', '2018-11-23 23:30:29'),
(5, '2', 0, 10, 0, 5, 5, '2018-11-24 03:49:41', '2018-11-24 03:49:41'),
(6, '7', 2, 8, 0, 5, 3, '2018-11-24 03:58:09', '2018-11-24 03:58:09'),
(7, '2', 0, 5, 90, 0, 95, '2018-12-12 05:03:27', '2018-12-12 05:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kemejas`
--

CREATE TABLE IF NOT EXISTS `detail_kemejas` (
  `id` int(10) unsigned NOT NULL,
  `id_kemeja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_kemejas`
--

INSERT INTO `detail_kemejas` (`id`, `id_kemeja`, `ukuran`, `awal`, `masuk`, `keluar`, `akhir`, `created_at`, `updated_at`) VALUES
(1, '43', 'XL', 0, 2, 0, 2, '2018-11-24 02:53:00', '2018-11-24 02:53:00'),
(2, '44', 'M', 0, 5, 0, 5, '2018-11-24 02:53:43', '2018-11-24 02:53:43'),
(3, '44', 'L', 0, 2, 0, 2, '2018-11-24 03:54:41', '2018-11-24 03:54:41'),
(4, '45', 'S', 0, 10, 0, 10, '2018-12-16 06:15:39', '2018-12-16 06:15:39'),
(5, '45', 'M', 0, 5, 0, 5, '2018-12-16 06:15:46', '2018-12-16 06:15:46'),
(6, '45', 'L', 0, 50, 0, 50, '2018-12-16 06:15:53', '2018-12-16 06:15:53'),
(7, '37', 'M', 0, 5, 0, 5, '2018-12-23 21:27:18', '2018-12-23 21:27:18'),
(8, '39', 'M', 0, 5, 0, 5, '2018-12-23 21:27:25', '2018-12-23 21:27:25'),
(9, '43', 'M', 1, 5, 0, 6, '2018-12-23 21:27:34', '2018-12-23 21:27:34'),
(10, '44', 'M', 0, 5, 0, 5, '2018-12-23 21:27:41', '2018-12-23 21:27:41'),
(11, '45', 'M', 0, 5, 0, 5, '2018-12-23 21:27:46', '2018-12-23 21:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `kains`
--

CREATE TABLE IF NOT EXISTS `kains` (
  `id` int(10) unsigned NOT NULL,
  `tipe` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(10) unsigned NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kains`
--

INSERT INTO `kains` (`id`, `tipe`, `nama_kain`, `supplier`, `stok`, `file`, `created_at`, `updated_at`) VALUES
(14, '0', 'Semenron Coklat', '0', 0, 'RootElite.jpg', '2018-12-24 10:30:17', '2018-12-24 10:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `kemejas`
--

CREATE TABLE IF NOT EXISTS `kemejas` (
  `id` int(10) unsigned NOT NULL,
  `nama_kemeja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) unsigned NOT NULL,
  `kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uk_s` int(10) unsigned NOT NULL,
  `uk_m` int(10) unsigned NOT NULL,
  `uk_l` int(10) unsigned NOT NULL,
  `uk_xl` int(10) unsigned NOT NULL,
  `bahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kemejas`
--

INSERT INTO `kemejas` (`id`, `nama_kemeja`, `harga`, `kategori`, `uk_s`, `uk_m`, `uk_l`, `uk_xl`, `bahan`, `keterangan`, `file`, `created_at`, `updated_at`) VALUES
(47, 'Apple Seed', 310000, '1', 2, 5, 5, 1, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.310.000 size S,M,dan L\r\n* Rp.325.000 size XL\r\n* Rp.340.000 size XXL\r\n* Rp.355.000 size XXXL\r\n* Rp.360.000 size XXXXL\r\n\r\n* Ukuran Diluar Stok/Custom bisa pre order.', 'AppleSeed.jpg', '2018-12-24 10:33:02', '2018-12-29 21:23:59'),
(48, 'White Exorcist', 315000, '1', 2, 5, 5, 3, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.315.000 size S,M,dan L\r\n* Rp.330.000 size XL\r\n* Rp.345.000 size XXL\r\n* Rp.360.000 size XXXL\r\n* Rp.375.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'WhiteExorcist.jpg', '2018-12-24 10:44:04', '2018-12-24 10:44:04'),
(49, 'Indigo Brave', 340000, '2', 3, 4, 4, 2, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.340.000 size S,M,dan L\r\n* Rp.355.000 size XL\r\n* Rp.370.000 size XXL\r\n* Rp.385.000 size XXXL\r\n* Rp.400.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'IndigoBrave.jpg', '2018-12-24 10:47:57', '2018-12-24 10:47:57'),
(50, 'Blood Kingnogo', 350000, '2', 3, 5, 5, 2, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BloodKingnogo.jpg', '2018-12-24 10:52:48', '2018-12-24 10:52:48'),
(51, 'Nogo Goldenjeff #2', 350000, '2', 2, 5, 5, 3, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'NogoGoldenjeff2.jpg', '2018-12-24 10:57:16', '2018-12-24 10:58:07'),
(52, 'Red Nogososro', 325000, '0', 2, 10, 10, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.325.000 size S,M,dan L\r\n* Rp.340.000 size XL\r\n* Rp.555.000 size XXL\r\n* Rp.370.000 size XXXL\r\n* Rp.385.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RedNogososro.jpg', '2018-12-24 11:03:35', '2018-12-24 11:03:35'),
(53, 'Morin Black', 330, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.330.000 size S,M,dan L\r\n* Rp.345.000 size XL\r\n* Rp.360.000 size XXL\r\n* Rp.375.000 size XXXL\r\n* Rp.390.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'MorinBlack.jpg', '2018-12-24 11:06:50', '2018-12-24 11:06:50'),
(54, 'Blue Elite', 350000, '0', 2, 5, 5, 3, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BlueElite.jpg', '2018-12-24 17:08:46', '2018-12-24 17:08:46'),
(55, 'Red Liv', 330000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik Printing(100% original jogjakarta handmade batik)', '* Rp.330.000 size S,M,dan L\r\n* Rp.345.000 size XL\r\n* Rp.360.000 size XXL\r\n* Rp.375.000 size XXXL\r\n* Rp.390.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RedLiv.jpg', '2018-12-24 17:12:30', '2018-12-24 17:12:30'),
(56, 'White Levito', 340000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.340.000 size S,M,dan L\r\n* Rp.355.000 size XL\r\n* Rp.370.000 size XXL\r\n* Rp.385.000 size XXXL\r\n* Rp.400.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'WhiteLevito.jpg', '2018-12-24 17:15:19', '2018-12-24 17:15:19'),
(57, 'Brown Elite', 350000, '0', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BrownElite.jpg', '2018-12-24 17:18:43', '2018-12-24 17:18:43'),
(58, 'White Phyton', 350000, '1', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'WhitePhyton.jpg', '2018-12-24 17:21:23', '2018-12-24 17:21:23'),
(59, 'Blood Jeff', 310000, '0', 3, 5, 5, 2, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.310.000 size S,M,dan L\r\n* Rp.325.000 size XL\r\n* Rp.340.000 size XXL\r\n* Rp.355.000 size XXXL\r\n* Rp.370.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BloodJeff.jpg', '2018-12-24 17:26:24', '2018-12-24 17:26:24'),
(60, 'Nogo Biru', 325000, '1', 5, 10, 10, 5, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.325.000 size S,M,dan L\r\n* Rp.340.000 size XL\r\n* Rp.355.000 size XXL\r\n* Rp.370.000 size XXXL\r\n* Rp.385.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'NogoBiru.jpg', '2018-12-24 17:30:02', '2018-12-24 17:30:02'),
(61, 'Brown Nogososro', 340000, '0', 1, 2, 1, 1, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.340.000 size S,M,dan L\r\n* Rp.355.000 size XL\r\n* Rp.370.000 size XXL\r\n* Rp.385.000 size XXXL\r\n* Rp.400.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BrownNogososro.jpg', '2018-12-24 17:33:13', '2018-12-24 17:33:13'),
(62, 'Black Exorcist', 315000, '1', 3, 5, 5, 2, 'Katun jepang supersoft grade A, & batik printing (100% original jogjakarta handmade batik)', '* Rp.315.000 size S,M,dan L\r\n* Rp.330.000 size XL\r\n* Rp.345.000 size XXL\r\n* Rp.360.000 size XXXL\r\n* Rp.375.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BlackExorcist.jpg', '2018-12-24 17:35:00', '2018-12-24 17:35:00'),
(63, 'Red Vic', 320000, '0', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RedVic.jpg', '2018-12-24 17:38:08', '2018-12-24 17:38:08'),
(64, 'Blue Angerfish', 350000, '2', 2, 5, 5, 3, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BlueAngerfish.jpg', '2018-12-24 17:41:22', '2018-12-24 17:41:22'),
(65, 'Light Knight', 340000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.340.000 size S,M,dan L\r\n* Rp.355.000 size XL\r\n* Rp.370.000 size XXL\r\n* Rp.385.000 size XXXL\r\n* Rp.400.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'LightKnight.jpg', '2018-12-24 17:44:04', '2018-12-24 17:44:04'),
(66, 'Sand Phyton', 350000, '0', 2, 5, 5, 3, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'SandPhyton.jpg', '2018-12-24 17:47:42', '2018-12-24 17:47:42'),
(67, 'Lucid Black', 280000, '1', 5, 8, 8, 4, 'Katun jepang supersoft grade A, & batik printing (100% original jogjakarta handmade batik)', '* Rp.280.000 size S,M,dan L\r\n* Rp.395.000 size XL\r\n* Rp.310.000 size XXL\r\n* Rp.325.000 size XXXL\r\n* Rp.340.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'LucidBlack.jpg', '2018-12-24 17:54:44', '2018-12-24 17:54:44'),
(68, 'Imperial Green Topaz', 320000, '1', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik Tulis (100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'ImperialGreenTopaz.jpg', '2018-12-24 18:00:38', '2018-12-24 18:00:38'),
(69, 'Nogo Goldenjeff', 350000, '2', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik Tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'NogoGoldenJeff.jpg', '2018-12-24 18:04:39', '2018-12-24 18:04:39'),
(70, 'Nogo Red Jeff', 350000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik Tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'NogoRedJeff.jpg', '2018-12-24 18:08:52', '2018-12-24 18:08:52'),
(71, 'Sand Nogososro', 325000, '2', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.325.000 size S,M,dan L\r\n* Rp.340.000 size XL\r\n* Rp.355.000 size XXL\r\n* Rp.370.000 size XXXL\r\n* Rp.385.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'SandNogososro.jpg', '2018-12-24 18:12:07', '2018-12-24 18:12:07'),
(72, 'Red King Nogo', 350000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RedKingNogo.jpg', '2018-12-24 18:14:24', '2018-12-24 18:14:24'),
(73, 'Grey Jeff #2', 310000, '1', 4, 5, 5, 6, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.310.000 size S,M,dan L\r\n* Rp.325.000 size XL\r\n* Rp.340.000 size XXL\r\n* Rp.355.000 size XXXL\r\n* Rp.370.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'GreyJeff2.jpg', '2018-12-24 18:17:24', '2018-12-24 18:17:24'),
(74, 'Root Elite #2', 350000, '1', 3, 5, 5, 2, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RootElite2.jpg', '2018-12-24 18:21:18', '2018-12-24 18:21:18'),
(75, 'Imperial Blood Topaz', 320000, '0', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'ImperialBloodTopaz.jpg', '2018-12-24 18:26:52', '2018-12-24 18:26:52'),
(76, 'Green Cloude Rider', 350000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'GreenCloudRider.jpg', '2018-12-24 18:30:38', '2018-12-24 18:30:38'),
(77, 'IgnoGrey', 330000, '2', 2, 4, 4, 5, 'Katun jepang supersoft grade A, jacguard, & batik Printing(100% original jogjakarta handmade batik)', '* Rp.330.000 size S,M,dan L\r\n* Rp.345.000 size XL\r\n* Rp.360.000 size XXL\r\n* Rp.375.000 size XXXL\r\n* Rp.390.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'IgnoGrey.jpg', '2018-12-24 18:34:30', '2018-12-24 18:34:30'),
(78, 'White Jackbit', 310000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.310.000 size S,M,dan L\r\n* Rp.325.000 size XL\r\n* Rp.340.000 size XXL\r\n* Rp.355.000 size XXXL\r\n* Rp.370.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'WhiteJackbit.jpg', '2018-12-24 18:39:58', '2018-12-24 18:39:58'),
(79, 'Root Angerfish', 350000, '2', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik tulis (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'RootAngerfish.jpg', '2018-12-24 18:41:47', '2018-12-24 18:41:47'),
(80, 'Grey Swordfish', 320000, '0', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'Grey Swordfish.jpg', '2018-12-24 18:44:46', '2018-12-24 18:44:46'),
(81, 'Infurious', 320000, '0', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'Infurious.jpg', '2018-12-24 18:48:11', '2018-12-24 18:48:11'),
(82, 'LuxElite', 350000, '0', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik cap (100% original jogjakarta handmade batik)', '* Rp.350.000 size S,M,dan L\r\n* Rp.365.000 size XL\r\n* Rp.380.000 size XXL\r\n* Rp.395.000 size XXXL\r\n* Rp.410.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'LuxElite.jpg', '2018-12-24 18:52:27', '2018-12-24 18:52:27'),
(83, 'Blood Half Claw', 320000, '0', 2, 3, 3, 2, 'Katun jepang supersoft grade A, jacguard, & batik Printing(100% original jogjakarta handmade batik)', '* Rp.320.000 size S,M,dan L\r\n* Rp.335.000 size XL\r\n* Rp.350.000 size XXL\r\n* Rp.365.000 size XXXL\r\n* Rp.380.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'BloodHalfClaw.jpg', '2018-12-24 18:56:33', '2018-12-24 18:56:33'),
(84, 'Apple Grey', 310000, '1', 3, 5, 5, 2, 'Katun jepang supersoft grade A, jacguard, & batik printing (100% original jogjakarta handmade batik)', '* Rp.310.000 size S,M,dan L\r\n* Rp.325.000 size XL\r\n* Rp.340.000 size XXL\r\n* Rp.355.000 size XXXL\r\n* Rp.370.000 size XXXXL\r\n\r\n* Untuk Ukuran Diluar Stok/Custom Bisa Pre Order', 'AppleGrey.jpg', '2018-12-24 18:59:58', '2018-12-24 18:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE IF NOT EXISTS `keranjangs` (
  `id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `kemeja_id` int(10) unsigned NOT NULL,
  `nama_kemeja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `kodeunik` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `customer_id`, `kemeja_id`, `nama_kemeja`, `uk`, `harga`, `qty`, `total_harga`, `status`, `kodeunik`, `created_at`, `updated_at`) VALUES
(31, 20, 47, 'Apple Seed', 'S', 310000, 1, 310000, 1, 835, '2018-12-29 21:23:59', '2018-12-30 00:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_23_101423_create_table_kemeja', 1),
(5, '2018_09_30_182141_create_table_kain', 3),
(9, '2018_10_01_133630_create_table_user', 4),
(10, '2018_10_01_133849_create_table_user', 5),
(11, '2018_10_01_170321_create_table_pelanggan', 6),
(12, '2018_10_01_170847_create_table_pelanggan', 7),
(13, '2018_10_02_125546_create_table_customer', 8),
(14, '2018_10_21_115758_create_table_pesan', 9),
(15, '2018_10_22_141018_create_table_keranjang', 10),
(16, '2018_11_01_112811_create_table_detailkemeja', 11),
(17, '2018_11_04_140451_create_table_detailkain', 12),
(18, '2018_11_12_092010_create_table_adminstok', 13),
(19, '2018_11_24_061311_create_table_detailkain', 14),
(20, '2018_11_24_061743_create_table_detailkain', 15),
(21, '2018_11_24_095037_create_table_detailkemeja', 16),
(22, '2018_11_25_002226_create_table_pesan', 17),
(23, '2018_11_25_005056_create_table_keranjang', 18),
(24, '2018_11_25_012340_create_table_keranjang', 19),
(25, '2018_11_25_121007_create_table_keranjang', 20),
(26, '2018_11_26_092146_create_table_user', 21),
(27, '2018_11_26_092330_create_table_adminstok', 21),
(28, '2018_12_02_171912_create_table_keranjang', 22),
(29, '2018_12_07_134541_create_table_transaksi', 23),
(30, '2018_12_07_134756_create_table_pembayaran', 23),
(31, '2018_12_13_011921_create_table_transaksi', 24),
(32, '2018_12_13_013343_create_table_transaksi', 25),
(33, '2018_12_13_014410_create_table_transaksi', 26),
(34, '2018_12_13_015502_create_table_transaksi', 27),
(35, '2018_12_13_054656_create_table_transaksi', 28),
(36, '2018_12_13_071429_create_table_keranjang', 29),
(37, '2018_12_16_135527_create_table_keranjang', 30),
(38, '2018_12_16_135831_create_table_keranjang', 31),
(39, '2018_12_19_064644_create_table_testimoni', 32);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ami@gmail.com', '$2y$10$hoIIszLpXP.UquKWv.v08eNEOyuAUjQQ/sya9jC7nQyg5ODPMgfUi', '2018-11-09 10:45:10'),
('jn@gmail.com', '$2y$10$Zmq3QQFhRF9kMcBX8yxH9ecYjteVAju8Ha/LOFMOB2vSRIm/.ETXO', '2018-12-05 04:48:45'),
('adm@gmail.com', '$2y$10$Tk1i9BWdzEd3ICkLkxOjiuxDmEim/XRHjpMo0/jCkvqR7Nhr282D2', '2018-12-20 08:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE IF NOT EXISTS `pesans` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `nama`, `email`, `telp`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'spt', 'spt@gmail.com', '085', 'tes 1', '2018-11-24 17:25:18', '2018-11-24 17:25:18'),
(2, 'spt', 'spt@gmail.com', '085', 'tes 2', '2018-11-24 17:25:25', '2018-11-24 17:25:25'),
(3, 'jn', 'jn@gmail.com', '08989090', 'Saya sudah order', '2018-12-18 06:06:30', '2018-12-18 06:06:30'),
(4, 'Septi EW', 'spt@gmail.com', '085786997739', 'testes', '2018-12-23 21:19:16', '2018-12-23 21:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE IF NOT EXISTS `testimonis` (
  `id` int(10) unsigned NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '2018-12-19 20:47:09', '2018-12-19 20:47:09'),
(4, '3.jpg', '2018-12-19 23:26:10', '2018-12-19 23:26:10'),
(5, '2.jpg', '2018-12-19 23:53:08', '2018-12-19 23:53:08'),
(6, '16.jpg', '2018-12-19 23:53:20', '2018-12-19 23:53:20'),
(7, '18.jpg', '2018-12-19 23:53:39', '2018-12-19 23:53:39'),
(8, '8.jpg', '2018-12-19 23:53:52', '2018-12-19 23:53:52'),
(9, '10.jpg', '2018-12-19 23:55:11', '2018-12-19 23:55:11'),
(10, '11.jpg', '2018-12-19 23:55:28', '2018-12-19 23:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE IF NOT EXISTS `transaksis` (
  `id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `noresi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeunik` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `customer_id`, `noresi`, `kodeunik`, `total_bayar`, `status`, `created_at`, `updated_at`) VALUES
(72, 20, '181230075310677', 835, 310835, 1, '2018-12-30 00:46:10', '2019-01-04 23:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'adm', 'adm@gmail.com', 0, '$2y$10$lbZdHoalTQ8HXl/nV9Vi6enqvfAwdi2nNNzLcbfHR3vz5qlAXDpVy', 'tiXfbn9smWAuRKXtdDPxdyZd4yk8N63PXjV4RsWyfcbCiCKrvoleLgnaIxBM', '2018-11-26 02:44:03', '2018-11-26 02:44:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstoks`
--
ALTER TABLE `adminstoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `detailkemejas`
--
ALTER TABLE `detailkemejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kains`
--
ALTER TABLE `detail_kains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kemejas`
--
ALTER TABLE `detail_kemejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kains`
--
ALTER TABLE `kains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemejas`
--
ALTER TABLE `kemejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_customer_id_foreign` (`customer_id`),
  ADD KEY `keranjangs_kemeja_id_foreign` (`kemeja_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminstoks`
--
ALTER TABLE `adminstoks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `detailkemejas`
--
ALTER TABLE `detailkemejas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_kains`
--
ALTER TABLE `detail_kains`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_kemejas`
--
ALTER TABLE `detail_kemejas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kains`
--
ALTER TABLE `kains`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kemejas`
--
ALTER TABLE `kemejas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_kemeja_id_foreign` FOREIGN KEY (`kemeja_id`) REFERENCES `kemejas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
