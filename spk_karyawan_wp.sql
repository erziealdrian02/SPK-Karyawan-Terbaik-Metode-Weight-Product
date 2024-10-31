-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 07:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_karyawan_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absen_id` varchar(40) NOT NULL,
  `sd` decimal(3,1) DEFAULT NULL,
  `pc` decimal(3,1) DEFAULT NULL,
  `dt` decimal(3,1) DEFAULT NULL,
  `i` decimal(3,1) DEFAULT NULL,
  `s` decimal(3,1) DEFAULT NULL,
  `a` decimal(4,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absen_id`, `sd`, `pc`, `dt`, `i`, `s`, `a`) VALUES
('ABS01', '0.5', '0.5', '0.5', '2.0', '1.5', '25.0');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_karyawan` varchar(244) NOT NULL,
  `tgl_karyawan` date NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `tlp_karyawan` varchar(15) NOT NULL,
  `jabatan_karyawan` varchar(50) NOT NULL,
  `status_karyawan` varchar(30) NOT NULL,
  `kehadiran_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nik`, `nama_karyawan`, `tgl_karyawan`, `alamat_karyawan`, `tlp_karyawan`, `jabatan_karyawan`, `status_karyawan`, `kehadiran_karyawan`) VALUES
('KAR11', '1234567890111213', 'Karyawan Dua', '0222-02-22', 'Kab. Bogor', '0812374121333', 'Naek Haji', 'Outsourcing', 123),
('KAR22', '12312312', 'Karyawan Tiga', '2222-02-22', 'Kota Bogor', '0812374121333', 'Angkatan Laut', 'Tetap', NULL),
('KAR23', '1231231231231231', 'Test Add', '2024-07-17', 'Kota Bogor', '0812818181818', 'Angkatan Laut', 'Outsourcing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` varchar(50) NOT NULL,
  `kj` int(11) NOT NULL,
  `kl` int(11) NOT NULL,
  `kt` int(11) NOT NULL,
  `in` int(11) NOT NULL,
  `ly` int(11) NOT NULL,
  `ks` int(11) NOT NULL,
  `kte` int(11) NOT NULL,
  `mm` int(11) NOT NULL,
  `tj` int(11) NOT NULL,
  `kjin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kj`, `kl`, `kt`, `in`, `ly`, `ks`, `kte`, `mm`, `tj`, `kjin`) VALUES
('K01', 40, 20, 10, 30, 10, 10, 10, 10, 10, 50);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` varchar(50) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `nama_pengguna`, `username`, `password`, `level`) VALUES
('PE01', 'Nama Satu Edit', 'Admin', '123456', 'Admin'),
('PE27', 'TEst Nama', 'Karyawan', '123123123', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_absen`
--

CREATE TABLE `perhitungan_absen` (
  `pera_id` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pera` varchar(100) NOT NULL,
  `kehadiran_pera` int(11) DEFAULT NULL,
  `jabatan_pera` varchar(50) NOT NULL,
  `sd` int(11) DEFAULT NULL,
  `pc` int(11) DEFAULT NULL,
  `dt` int(11) DEFAULT NULL,
  `i` int(11) DEFAULT NULL,
  `s` int(11) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `kj` int(11) DEFAULT 0,
  `kl` int(11) DEFAULT 0,
  `kt` int(11) DEFAULT 0,
  `in` int(11) DEFAULT 0,
  `ly` int(11) DEFAULT 0,
  `ks` int(11) DEFAULT 0,
  `kte` int(11) DEFAULT 0,
  `mm` int(11) NOT NULL DEFAULT 0,
  `tj` int(11) NOT NULL DEFAULT 0,
  `kjin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perhitungan_absen`
--

INSERT INTO `perhitungan_absen` (`pera_id`, `nik`, `nama_pera`, `kehadiran_pera`, `jabatan_pera`, `sd`, `pc`, `dt`, `i`, `s`, `a`, `kj`, `kl`, `kt`, `in`, `ly`, `ks`, `kte`, `mm`, `tj`, `kjin`) VALUES
('PERA21', '1234567890111213', 'Karyawan Dua', 123, 'Product Specialist', 3, 3, 0, 0, 3, 0, 70, 100, 80, 85, 90, 40, 40, 40, 40, 70),
('PERA27', '12312312', 'Karyawan Satu', 111, 'Naek Haji', 3, 0, 29, 0, 3, 0, 95, 100, 70, 70, 90, 44, 20, 50, 80, 40),
('PERA47', '1231231231231231', 'Test Add', 0, 'Angkatan Laut', 0, 0, 0, 0, 0, 0, 80, 90, 40, 20, 10, 90, 80, 100, 40, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `perhitungan_absen`
--
ALTER TABLE `perhitungan_absen`
  ADD PRIMARY KEY (`pera_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
