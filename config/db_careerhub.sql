-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 04:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_careerhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('L', 'Teknik Listrik'),
('M', 'Mesin'),
('RPL', 'Rekayasa perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `karir`
--

CREATE TABLE `karir` (
  `id_karir` int(11) NOT NULL,
  `tujuan_karir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karir`
--

INSERT INTO `karir` (`id_karir`, `tujuan_karir`) VALUES
(3, 'Bekerja'),
(4, 'Kuliah'),
(5, 'Wirausaha');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XI RPL 2'),
(3, 'XI Listrik 2'),
(4, 'XI MESIN 3'),
(5, 'X RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_semester`
--

CREATE TABLE `nilai_semester` (
  `id_nilai_semester` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nilai_semester_1` double DEFAULT NULL,
  `nilai_semester_2` double DEFAULT NULL,
  `nilai_semester_3` double DEFAULT NULL,
  `nilai_semester_4` double DEFAULT NULL,
  `nilai_semester_5` double DEFAULT NULL,
  `nilai_semester_6` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_semester`
--

INSERT INTO `nilai_semester` (`id_nilai_semester`, `nisn`, `nilai_semester_1`, `nilai_semester_2`, `nilai_semester_3`, `nilai_semester_4`, `nilai_semester_5`, `nilai_semester_6`) VALUES
(2, '909', 74.9, 78.9, 85, 87.67, 76.43, 93.56),
(7, '191', 78, 79, 88.9, 65.8, 90.8, 99.2),
(8, '92', 90, 88, 79.8, 90.4, 86.7, 90),
(9, '85191', 78, 89, 77, 90, 67, 98.6),
(10, '0098912', 90, 88, 78, 28, 78, 66.9),
(11, '112', 78, 80.67, 98, 70, 80, 76.8);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_karir` int(11) NOT NULL,
  `status_persetujuan` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `kode_jurusan`, `id_kelas`, `id_karir`, `status_persetujuan`) VALUES
('0098912', 'Vitor Serundeng', '2024-05-06', 'Laki Laki', 'jalan', '099282', 'M', 4, 3, 0),
('112', 'Boy', '2024-05-28', 'Laki Laki', 'Jl Veter', '90923013', 'L', 3, 5, 0),
('191', 'Wisnu', '2024-05-19', 'Laki-Laki', 'jl merdeka', '827828711', 'RPL', 1, 3, 0),
('85191', 'baloy', '2024-03-31', 'Laki Laki', 'jl aj', '71626', 'M', 1, 4, 0),
('909', 'Bayu', '2024-03-20', 'Laki Laki', 'Jl', '91882900', 'L', 3, 4, 0),
('92', 'Algi', '2006-10-25', 'Laki Laki', 'jl merdeka', '0982661', 'M', 3, 5, 1),
('97', 'kabdul', '2024-05-02', 'perempuan', 'jl kali', '089677987654', 'RPL', 5, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nisn`, `password`, `id_role`) VALUES
(1, 'Admin', 'admin', 1),
(2, '85191', 'user', 2),
(4, '909', 'test', 2),
(5, '191', 'uhuy', 2),
(10, '92', '40', 2),
(12, '112', '123', 2),
(14, '97', 'aku', 2),
(15, '0098912', '221', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `karir`
--
ALTER TABLE `karir`
  ADD PRIMARY KEY (`id_karir`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
  ADD PRIMARY KEY (`id_nilai_semester`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_karir` (`id_karir`),
  ADD KEY `kode_jurusan` (`kode_jurusan`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karir`
--
ALTER TABLE `karir`
  MODIFY `id_karir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
  MODIFY `id_nilai_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
