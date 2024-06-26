-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `jenis_surat` int(11) NOT NULL,
  `nama_jenis_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`jenis_surat`, `nama_jenis_surat`) VALUES
(1, 'Surat permohonan KTP');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ktp`
--

CREATE TABLE `pengajuan_ktp` (
  `id_pengajuan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_surat` int(11) NOT NULL,
  `status_verifikasi` varchar(64) DEFAULT 'belum verifikasi',
  `status_permohonan` enum('di tolak','setuju') DEFAULT NULL,
  `proses_pengajuan` enum('sedang diproses', 'selesai diproses') DEFAULT 'sedang diproses',
  `alasan` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_ktp`
--

CREATE TABLE `permohonan_ktp` (
  `id` int(11) NOT NULL,
  `jenis_surat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `agama` enum('islam','kristen','katholik','budha','hindu','konghucu') NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `kewarganegaraan` varchar(128) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sistem`
--

CREATE TABLE `sistem` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `flags` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sistem`
--

INSERT INTO `sistem` (`id`, `nama_desa`, `nama_website`, `logo`, `gambar`, `flags`) VALUES
(1, 'Desa Suka Maju Bersama', 'Sistem Informasi Pelayanan  Surat Pengantar KTP', 'logo_pemkab.png', '2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `repassword` varchar(200) NOT NULL,
  `role` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_akun`, `username`, `password`, `repassword`, `role`) VALUES
(1, 'administrasi', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`jenis_surat`);

--
-- Indexes for table `pengajuan_ktp`
--
ALTER TABLE `pengajuan_ktp`
  ADD PRIMARY KEY (`id_pengajuan`) USING BTREE;

--
-- Indexes for table `permohonan_ktp`
--
ALTER TABLE `permohonan_ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_akun`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan_ktp`
--
ALTER TABLE `pengajuan_ktp`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonan_ktp`
--
ALTER TABLE `permohonan_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sistem`
--
ALTER TABLE `sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
