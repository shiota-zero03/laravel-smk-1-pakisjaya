-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 11:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smk_imam`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id_absen` bigint(20) UNSIGNED NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `tangal_absen` date NOT NULL,
  `jam_absen` time DEFAULT NULL,
  `status_absen` varchar(255) NOT NULL,
  `file_absen` varchar(255) DEFAULT NULL,
  `laporan_absen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id_absen`, `id_member`, `tangal_absen`, `jam_absen`, `status_absen`, `file_absen`, `laporan_absen`, `created_at`, `updated_at`) VALUES
(4, 5, '2023-07-03', '11:59:35', 'Hadir', NULL, NULL, '2023-07-03 04:59:35', '2023-07-03 04:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `tanggal_berita` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id_berita`, `feature_image`, `judul_berita`, `tanggal_berita`, `author`, `isi_berita`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'news-1.png', 'Maureen Ziemann', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(2, 'news-2.png', 'Karson Reinger V', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(3, 'news-1.png', 'John Borer', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(4, 'news-2.png', 'Mr. Arvid Kiehn', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(5, 'news-1.png', 'Hillard DuBuque', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(6, 'news-1.png', 'Bobby Feil', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(7, 'news-2.png', 'Prof. Sibyl Berge', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(8, 'news-1.png', 'Mark Hudson', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(9, 'news-2.png', 'Gilberto Cremin', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17'),
(10, 'news-1.png', 'Miss Juliana Frami Jr.', '2023-04-16 02:49:17', 'Admin', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, '2023-04-15 12:49:17', '2023-04-15 12:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `ekskuls`
--

CREATE TABLE `ekskuls` (
  `id_ekskul` bigint(20) UNSIGNED NOT NULL,
  `nama_ekskul` varchar(255) NOT NULL,
  `icon_ekskul` varchar(255) NOT NULL,
  `foto_ekskul` varchar(255) NOT NULL,
  `keterangan_ekskul` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekskuls`
--

INSERT INTO `ekskuls` (`id_ekskul`, `nama_ekskul`, `icon_ekskul`, `foto_ekskul`, `keterangan_ekskul`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka', 'pramuka.png', 'ekskul.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(2, 'Futsal', 'futsal.png', 'ekskul.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(3, 'Sepakbola', 'sepakbola.png', 'ekskul.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(4, 'Paskibra', 'paskibra.png', 'ekskul.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip_guru` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL,
  `jabatan_guru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id_guru`, `nama_guru`, `nip_guru`, `password`, `foto_guru`, `jabatan_guru`, `created_at`, `updated_at`) VALUES
(1, 'Guru a', '1111111111111111', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 120.png', 'Staff Pengajar', NULL, '2023-04-18 23:04:02'),
(2, 'Guru b', '1111111111111112', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 124.png', 'Staff Pengajar', NULL, NULL),
(3, 'Guru c', '1111111111111113', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 132.png', 'Staff Pengajar', NULL, NULL),
(4, 'Guru d', '1111111111111114', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 121.png', 'Staff Pengajar', NULL, NULL),
(5, 'Guru e', '1111111111111115', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 125.png', 'Staff Pengajar', NULL, NULL),
(6, 'Guru f', '1111111111111116', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 116.png', 'Staff Pengajar', NULL, NULL),
(7, 'dra. Deti Windarti', '1966052819', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 114.png', 'Staff Pengajar', NULL, '2023-04-18 23:13:51'),
(8, 'dra. Asni Fitriyanti, m.pd.', '1967011319', '$2y$10$khUb8hp8yOvCn8Q./bn3LuFXi35MgqVUVFsvgfTiJL9RhSLqd3B4y', 'Rectangle 126.png', 'Staff Pengajar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademiks`
--

CREATE TABLE `kalender_akademiks` (
  `id_akademik` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `mulai_kegiatan` date NOT NULL,
  `akhir_kegiatan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kalender_akademiks`
--

INSERT INTO `kalender_akademiks` (`id_akademik`, `judul_kegiatan`, `mulai_kegiatan`, `akhir_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Libur Hari Raya Idul Fitri', '2023-04-19', '2023-05-07', NULL, NULL),
(2, 'Ujian Sekolah', '2023-05-22', '2023-05-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_member` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `status_akun` varchar(255) NOT NULL,
  `status_pkl` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama_orangtua` varchar(255) DEFAULT NULL,
  `no_telepon_orangtua` varchar(255) DEFAULT NULL,
  `alamat_orangtua` varchar(255) DEFAULT NULL,
  `mulai_pkl` date DEFAULT NULL,
  `selesai_pkl` date DEFAULT NULL,
  `pembimbing_sekolah` varchar(255) DEFAULT NULL,
  `pembimbing_industri` varchar(255) DEFAULT NULL,
  `lokasi_pkl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `nama`, `username`, `email`, `password`, `foto_profil`, `no_identitas`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `alamat`, `keahlian`, `status_akun`, `status_pkl`, `role`, `nama_orangtua`, `no_telepon_orangtua`, `alamat_orangtua`, `mulai_pkl`, `selesai_pkl`, `pembimbing_sekolah`, `pembimbing_industri`, `lokasi_pkl`, `created_at`, `updated_at`) VALUES
(3, 'Chaerul Imam', 'Imam123', 'chaerulimam@gmail.com', '$2y$10$iyITcghFSlEKhPjPJuW2V.4Q5B2wPVkGdfVys7WRxDIVLAKKdnmqi', NULL, '1234567890', 'Indonesia', '2006-06-06', 'Laki - Laki', '87831839810', 'Indonesia', 'Teknik Informatika', 'Active', 'Sedang PKL', 'siswa', 'Ayah aya', '00198218', 'Indonesia', '2023-01-01', '2023-04-30', 'dra. Deti Windarti', NULL, 'Purwakarta', '2023-04-18 21:37:31', '2023-04-18 23:13:51'),
(4, 'Shiota Zero', 'shiota03', 'shiozero03@gmail.com', '$2y$10$FekQ1rQb1NJQ03Wj3DOUG.tcjOCsSR.JjcArre.RtcTFRky/AJIkW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 'Sedang PKL', 'siswa', NULL, NULL, NULL, '2023-06-11', '2023-06-30', 'dra. Deti Windarti', NULL, 'Purwakarta', '2023-06-10 22:53:55', '2023-07-02 21:58:06'),
(5, 'Akademik', 'Siswa', 'academic@gmail.com', '$2y$10$D4VqBPIW6mwqVdpEgvzzFOAqHeEFZKT010ogCuiK0eE12PAkZSSHq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 'Sedang PKL', 'siswa', NULL, NULL, NULL, '2023-07-01', '2023-07-31', 'dra. Asni Fitriyanti, m.pd.', NULL, 'Purwakarta', '2023-06-14 18:51:50', '2023-07-02 21:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_16_193007_create_prestasis_table', 1),
(6, '2023_04_16_201739_create_ekskuls_table', 2),
(7, '2023_04_16_204622_create_gurus_table', 3),
(8, '2023_04_17_002324_create_beritas_table', 4),
(9, '2023_04_18_010930_create_members_table', 5),
(11, '2023_04_18_235916_create_absensis_table', 6),
(12, '2023_04_19_025110_create_penilaians_table', 7),
(13, '2023_04_19_033005_create_admins_table', 8),
(14, '2023_04_19_052040_create_pembimbings_table', 9),
(15, '2023_04_19_075029_create_pictures_table', 10),
(16, '2023_04_19_082420_create_kalender_akademiks_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbings`
--

CREATE TABLE `pembimbings` (
  `id_pembimbing` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbings`
--

INSERT INTO `pembimbings` (`id_pembimbing`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Purwakarta', 'purwakarta', '$2y$10$D4VqBPIW6mwqVdpEgvzzFOAqHeEFZKT010ogCuiK0eE12PAkZSSHq', '2023-06-10 23:06:27', '2023-06-14 07:37:26'),
(3, 'IT Suupport 2', 'admin', '$2y$10$D4VqBPIW6mwqVdpEgvzzFOAqHeEFZKT010ogCuiK0eE12PAkZSSHq', '2023-06-10 23:55:23', '2023-06-10 23:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `jenis_penilaian` varchar(255) NOT NULL,
  `aspek` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians`
--

INSERT INTO `penilaians` (`id_nilai`, `id_member`, `jenis_penilaian`, `aspek`, `nilai`, `created_at`, `updated_at`) VALUES
(4, 3, 'pelaksanaan', 'Kedisiplinan', 100, '2023-04-18 23:34:33', '2023-06-11 00:29:48'),
(5, 3, 'pelaksanaan', 'Tanggung Jawab', 100, '2023-04-18 23:41:26', '2023-04-18 23:41:26'),
(6, 3, 'pelaksanaan', 'Inisiatif', 30, '2023-04-18 23:43:21', '2023-04-18 23:43:21'),
(7, 3, 'pelaksanaan', 'Kerajinan', 80, '2023-04-18 23:43:29', '2023-04-18 23:43:29'),
(8, 3, 'pelaksanaan', 'Kerjasama', 100, '2023-04-18 23:43:36', '2023-04-18 23:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id_picture` bigint(20) UNSIGNED NOT NULL,
  `jenis_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id_picture`, `jenis_foto`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Osis', 'headphone.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id_prestasi` bigint(20) UNSIGNED NOT NULL,
  `foto_prestasi` varchar(255) NOT NULL,
  `tanggal_prestasi` date NOT NULL,
  `nama_prestasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id_prestasi`, `foto_prestasi`, `tanggal_prestasi`, `nama_prestasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'pres-3.png', '2021-06-21', 'Juara 2 Tilawah Qur\'an', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(2, 'pres-2.png', '2021-08-21', 'Juara 2 Sepakbola', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(3, 'pres-1.png', '2021-10-21', 'Juara 3 Lomba Adzan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(4, 'pres-3.png', '2022-06-21', 'Juara 1 Tilawah Qur\'an', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(5, 'pres-2.png', '2022-08-21', 'Juara 1 Sepakbola', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL),
(6, 'pres-1.png', '2022-10-21', 'Juara 2 Lomba Adzan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2b$10$MU/yWsSeAiwK5KftTl7Lge6fSYYVlz7iqh1s4JBZPE1rwQpTd.w8G', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ekskuls`
--
ALTER TABLE `ekskuls`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `members_emali_unique` (`email`),
  ADD UNIQUE KEY `members_no_identias_unique` (`no_identitas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembimbings`
--
ALTER TABLE `pembimbings`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_picture`);

--
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id_absen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekskuls`
--
ALTER TABLE `ekskuls`
  MODIFY `id_ekskul` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  MODIFY `id_akademik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembimbings`
--
ALTER TABLE `pembimbings`
  MODIFY `id_pembimbing` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_picture` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id_prestasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
