-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 10:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipikaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Kepala Sekolah'),
(3, 'Wakil Kepala Sekolah'),
(4, 'Kesiswaan'),
(5, 'Kepala Tata Usaha'),
(6, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip_nuptk` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghuchu') NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip_nuptk`, `nama_pegawai`, `id_jabatan`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `alamat`, `no_telp`, `foto`) VALUES
(3, '-', 'Saeful Insani', 2, '-', '2023-08-01', 'Islam', 'Laki-Laki', 'Purwakarta', '08', '1719838022.png'),
(4, '-', 'Asep Saepudin', 4, '-', '2024-07-20', 'Islam', 'Laki-Laki', 'Purwakarta', '089', '1719839181.jpg'),
(5, '-', 'Nina Marlina', 5, 'Purwakarta', '2024-07-12', 'Islam', 'Perempuan', 'Purwakarta', '0897', '1720263625.png'),
(6, '-', 'Poppy Yatmikasari', 6, 'Purwakarta', '2024-07-04', 'Islam', 'Perempuan', 'Purwakarta', '0899', 'default.jpg'),
(9, '-', 'Yoga', 3, 'Purwakarta', '2024-07-12', 'Islam', 'Laki-Laki', 'Purwakarta', '08976', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Pimpinan','Pegawai') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `role`, `id_pegawai`) VALUES
(3, 'lvth', '$2y$12$kZajMUcVb0r1bnOx0iGL2eD8AiXfKO6x3uDaK51V7/WxwQBXpYQJO', 'Pimpinan', 3),
(6, 'admin', '$2y$12$Bqfap32qyZ/9U6gfrDMMCu7x8bi2HTGdY2HsZtTkvust6TelvFpv6', 'Admin', 3),
(7, 'pgw', '$2y$12$HdO0MFPK0yJKtRRmcaomCehuIGXy8/flAj1zuapzL3ZPmUYMb0z7C', 'Pegawai', 4),
(8, 'pgw2', '$2y$12$xjWt9vHEeodKYBPCh6PAvudzwUEAqicgStakRucn47T5JyNiByjvW', 'Pegawai', 5),
(9, 'pgw3', '$2y$12$6302wzjWSqtVmNk5E.Av8.f1482Ryyt.6OcAiEuj38.yIZTJjuYVW', 'Pegawai', 6),
(10, 'pgw4', '$2y$12$eu8DdtIJlpr1XilsLUPJIe/WaprYI1q6MxGYyKJghNzcknE5CrT/C', 'Pegawai', 9),
(11, 'pgw5', '$2y$12$8OdI9g9PH6A4pipqYvKVVe6L7vOA2P/PtnDpCCD0nNFUqSbqxqbEq', 'Pegawai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `presensi_masuk` datetime DEFAULT NULL,
  `presensi_pulang` datetime DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_pegawai`, `presensi_masuk`, `presensi_pulang`, `keterangan`) VALUES
(1, 4, '2024-07-05 08:54:12', '2024-07-05 09:27:13', 'Terlambat'),
(2, 4, '2024-07-06 01:13:45', '2024-07-06 08:21:56', 'Tepat Waktu'),
(3, 5, '2024-07-06 18:01:54', '2024-07-06 18:02:01', 'Terlambat'),
(4, 6, '2024-07-06 20:08:40', '2024-07-06 20:09:03', 'Terlambat'),
(5, 4, '2024-07-07 15:13:16', '2024-07-07 15:34:04', 'Terlambat'),
(6, 6, '2024-07-07 15:36:45', '2024-07-07 15:37:49', 'Terlambat'),
(7, 5, '2024-07-07 16:14:11', NULL, 'Terlambat'),
(8, 9, '2024-07-07 16:46:03', '2024-07-07 16:51:20', 'Terlambat'),
(9, 3, '2024-07-07 17:07:19', '2024-07-07 17:07:33', 'Terlambat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_tb_pegawai_id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `fk_tb_pegawai_id_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);

--
-- Constraints for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
