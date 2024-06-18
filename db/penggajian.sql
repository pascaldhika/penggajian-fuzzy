-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 07:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Kepala sekolah ', '1500000', '0', '0'),
(2, 'Bendahara', '1350000', '0', '0'),
(3, 'Tatausaha', '1200000', '0', '0'),
(4, 'Guru', '750000', '0', '0'),
(6, 'Guru kelas', '1200000', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `izin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`, `izin`) VALUES
(1, '012021', '0987654321', 'Dodi', 'Laki-Laki', 'Staff Marketing', 24, 0, 0, NULL),
(2, '012021', '123456789', 'Fauzi', 'Laki-Laki', 'Admin', 22, 0, 1, NULL),
(3, '052024', '123456789', 'anis', 'Laki-Laki', 'Admin', 15, 4, 3, NULL),
(4, '052024', '0987654321', 'Dodi', 'Laki-Laki', 'Staff Marketing', 18, 2, 2, NULL),
(5, '052024', '8886969000', 'Vika', 'Perempuan', 'HRD', 20, 1, 1, NULL),
(6, '052024', '011', 'Berliana Riska Faulia ', 'Perempuan', 'Guru', 14, 4, 4, NULL),
(7, '052024', '007', 'Candy Pradana Satya Fauzi', 'Laki-Laki', 'Guru', 21, 1, 0, NULL),
(8, '052024', '004', 'Fitri Zuliyah Ningsih', 'Perempuan', 'Guru', 22, 0, 0, NULL),
(9, '052024', '012', 'M Abdulloh', 'Laki-Laki', 'Guru', 11, 5, 6, NULL),
(10, '052024', '003', 'M Fajar Abdulloh', 'Laki-Laki', 'Guru', 18, 2, 2, NULL),
(11, '052024', '009', 'M Reza Khoiru Mahfidz ', 'Laki-Laki', 'Guru', 18, 3, 1, NULL),
(12, '052024', '010', 'Ngabdul Malik Addemokrasi', 'Laki-Laki', 'Guru', 16, 3, 3, NULL),
(13, '052024', '001', 'Nur Abidah', 'Perempuan', 'Kepala sekolah ', 22, 0, 0, NULL),
(14, '052024', '002', 'Nur Saadah', 'Perempuan', 'Bendahara', 21, 1, 0, NULL),
(15, '052024', '005', 'Riski Dwi Wahyu Anjarsari', 'Perempuan', 'Guru', 22, 0, 0, NULL),
(16, '052024', '006', 'Rohmatul Ummah ', 'Perempuan', 'Guru', 21, 1, 0, NULL),
(17, '052024', '008', 'Vika muminatus', 'Perempuan', 'Tatausaha', 22, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `pendidikan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`, `pendidikan`) VALUES
(1, '002', 'Nur Saadah', 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'Perempuan', 'Bendahara', '2019-10-01', 'Karyawan Tetap', 'pegawai-210101-a7ca89f5fc.png', 1, 'S1'),
(2, '008', 'Vika muminatus', 'tatausaha', '40941a14982f0a4cd10ab99592f4d04e', 'Perempuan', 'Tatausaha', '2023-08-01', 'Karyawan Tetap', 'pegawai-210101-9847084dc8.png', 1, 'S1'),
(3, '001', 'Nur Abidah', 'nurabidah', '355011752a95bc896a7ce948499e743f', 'Perempuan', 'Kepala sekolah ', '2017-01-01', 'Karyawan Tetap', '', 2, 'S2'),
(4, '003', 'M Fajar Abdulloh', 'fajar', '974d24f591794acca5bbbeab26785251', 'Laki-Laki', 'Guru kelas', '2022-07-01', 'Karyawan Tetap', '', 2, 'SMA'),
(5, '004', 'Fitri Zuliyah Ningsih', 'fitri', 'd415846907c643dbc6801375875beb7f', 'Perempuan', 'Guru kelas', '2022-11-01', 'Karyawan Tetap', '', 2, 'S1'),
(6, '005', 'Riski Dwi Wahyu Anjarsari', 'riski', '3ba2b012b75c05624182cdc118c23ea9', 'Perempuan', 'Guru kelas', '2022-11-01', 'Karyawan Tetap', '', 2, 'S1'),
(7, '006', 'Rohmatul Ummah ', 'ummah', '830145461d5d45186187d999e34f0ca2', 'Perempuan', 'Guru kelas', '2022-12-01', 'Karyawan Tetap', '', 2, 'S1'),
(8, '007', 'Candy Pradana Satya Fauzi', 'candy', 'c48ba993d35c3abe0380f91738fe2a34', 'Laki-Laki', 'Guru', '2023-01-01', 'Karyawan Tetap', '', 2, 'S1'),
(9, '009', 'M Reza Khoiru Mahfidz ', 'reza', 'e06a9ba8e9dd26a82146c80efd475c70', 'Laki-Laki', 'Guru', '2024-01-01', 'Karyawan Tidak Tetap', '', 2, 'S1'),
(10, '010', 'Ngabdul Malik Addemokrasi', 'ngabdul', 'cc595ef98ab96301524387ee4d8eb5d9', 'Laki-Laki', 'Guru', '2024-01-01', 'Karyawan Tidak Tetap', '', 2, 'S1'),
(11, '011', 'Berliana Riska Faulia ', 'berliana', '63dd91cae65d12cba5b40e9cc6c5b9b6', 'Perempuan', 'Guru', '2024-01-01', 'Karyawan Tidak Tetap', '', 2, 'S1'),
(12, '012', 'M Abdulloh', 'abdulloh', '26d264686fbe788b52cae3aee501d2e9', 'Laki-Laki', 'Guru', '2024-01-01', 'Karyawan Tidak Tetap', '', 2, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `data_predikat`
--

CREATE TABLE `data_predikat` (
  `No` int(11) NOT NULL,
  `A1` float DEFAULT NULL,
  `A2` float DEFAULT NULL,
  `A3` float DEFAULT NULL,
  `Predikat` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_predikat`
--

INSERT INTO `data_predikat` (`No`, `A1`, `A2`, `A3`, `Predikat`) VALUES
(1, 1.6, 0.75, 1.46, 0.75),
(2, 1.6, 0.75, 2.75, 0.75),
(3, 1.6, 0.75, 0.46, 0.46),
(4, 1.6, 0.25, 1.46, 0.25),
(5, 1.6, 0.25, 2.75, 0.25),
(6, 1.6, 0.25, 0.46, 0.25),
(7, 1.6, 0, 1.46, 0),
(8, 1.6, 0, 2.75, 0),
(9, 1.6, 0, 0.46, 0),
(10, 5, 0.75, 1.46, 0.75),
(11, 5, 0.75, 2.75, 0.75),
(12, 5, 0.75, 0.46, 0.46),
(13, 5, 0.25, 1.46, 0.25),
(14, 5, 0.25, 2.75, 0.25),
(15, 5, 0.25, 0.46, 0.25),
(16, 5, 0, 1.46, 0),
(17, 5, 0, 2.75, 0),
(18, 5, 0, 0.46, 0),
(19, 0.6, 0.75, 1.46, 0.6),
(20, 0.6, 0.75, 2.75, 0.6),
(21, 0.6, 0.75, 0.46, 0.6),
(22, 0.6, 0.25, 1.46, 0.6),
(23, 0.6, 0.25, 2.75, 0.6),
(24, 0.6, 0.25, 0.46, 0.6),
(25, 0.6, 0, 1.46, 0),
(26, 0.6, 0, 2.75, 0),
(27, 0.6, 0, 0.46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_rules`
--

CREATE TABLE `data_rules` (
  `No` int(11) NOT NULL,
  `A1` varchar(255) DEFAULT NULL,
  `A2` varchar(255) DEFAULT NULL,
  `A3` varchar(255) DEFAULT NULL,
  `Kesimpulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rules`
--

INSERT INTO `data_rules` (`No`, `A1`, `A2`, `A3`, `Kesimpulan`) VALUES
(1, 'Baru', 'SMA', 'Kurang', 'Sedikit'),
(2, 'Baru', 'SMA', 'Cukup', 'Sedikit'),
(3, 'Baru', 'SMA', 'Baik', 'Sedikit'),
(4, 'Baru', 'S1', 'Kurang', 'Sedikit'),
(5, 'Baru', 'S1', 'Cukup', 'Sedikit'),
(6, 'Baru', 'S1', 'Baik', 'Lumayan'),
(7, 'Baru', 'S2', 'Kurang', 'Sedikit'),
(8, 'Baru', 'S2', 'Cukup', 'Sedikit'),
(9, 'Baru', 'S2', 'Baik', 'Lumayan'),
(10, 'Sedang', 'SMA', 'Kurang', 'Sedikit'),
(11, 'Sedang', 'SMA', 'Cukup', 'Sedikit'),
(12, 'Sedang', 'SMA', 'Baik', 'Lumayan'),
(13, 'Sedang', 'S1', 'Kurang', 'Sedikit'),
(14, 'Sedang', 'S1', 'Cukup', 'Lumayan'),
(15, 'Sedang', 'S1', 'Baik', 'Banyak'),
(16, 'Sedang', 'S2', 'Kurang', 'Sedikit'),
(17, 'Sedang', 'S2', 'Cukup', 'Lumayan'),
(18, 'Sedang', 'S2', 'Baik', 'Banyak'),
(19, 'Lama', 'SMA', 'Kurang', 'Sedikit'),
(20, 'Lama', 'SMA', 'Cukup', 'Lumayan'),
(21, 'Lama', 'SMA', 'Baik', 'Banyak'),
(22, 'Lama', 'S1', 'Kurang', 'Sedikit'),
(23, 'Lama', 'S1', 'Cukup', 'Lumayan'),
(24, 'Lama', 'S1', 'Baik', 'Banyak'),
(25, 'Lama', 'S2', 'Kurang', 'Lumayan'),
(26, 'Lama', 'S2', 'Cukup', 'Lumayan'),
(27, 'Lama', 'S2', 'Baik', 'Banyak');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 50000),
(2, 'Sakit', 0),
(4, 'Izin', 35000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `data_predikat`
--
ALTER TABLE `data_predikat`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `data_rules`
--
ALTER TABLE `data_rules`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
