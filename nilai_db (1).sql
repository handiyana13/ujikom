-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 10:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', '$2y$10$kQ1qiNtci7kxKdNx34qYteY26x4epWUtFZLTrRk3PJ/J8wQPuW.sa', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nm_guru` varchar(100) NOT NULL,
  `tmp_lahir_guru` varchar(50) NOT NULL,
  `tgl_lahir_guru` date NOT NULL,
  `kel_guru` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kd_matpel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nm_guru`, `tmp_lahir_guru`, `tgl_lahir_guru`, `kel_guru`, `alamat`, `telp`, `kd_matpel`) VALUES
(1, 'Cecep', 'Depok', '1999-12-12', 'L', 'Jl. Margonda', '089555333444', 2),
(2, 'Ucup', 'Jakarta', '2000-02-22', 'L', 'Jl. Kebangsaan', '08944112233', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` varchar(20) NOT NULL,
  `nm_kelas` varchar(50) NOT NULL,
  `jml_siswa` int(11) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nm_kelas`, `jml_siswa`, `thn_ajaran`, `nip`) VALUES
('001', 'Kelas Inggris', 30, '2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `nomor_hp`, `status`) VALUES
(2, 'asdasd', 'asdasd', 'sadasd');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `kd_matpel` int(11) NOT NULL,
  `nm_matpel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`kd_matpel`, `nm_matpel`) VALUES
(1, 'B. Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Matematika'),
(4, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nm_wali` varchar(100) NOT NULL,
  `kd_kelas` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nm_siswa`, `tmp_lahir`, `tgl_lahir`, `jkel`, `alamat`, `telp`, `nm_wali`, `kd_kelas`, `username`, `password`) VALUES
('25001', 'Kizaru Borsalino', 'Wano', '2005-12-12', 'L', 'Jl. Harapan', '08944422113', 'Pak Vegapunk', '001', 'kizaru', '$2y$10$pD93tK2ioVz5nZwXSmTT3.c9cXen83KEj5vhZTrexRomsksidsiDK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_matpel` (`kd_matpel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`kd_matpel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `kd_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kd_matpel`) REFERENCES `matpel` (`kd_matpel`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
