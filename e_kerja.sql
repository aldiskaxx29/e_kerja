-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 06:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_kerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_kegiatan` varchar(10) DEFAULT NULL,
  `nama_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `kode_kegiatan`, `nama_kegiatan`) VALUES
(1, 'KGN00001', 'Musawara'),
(2, 'KGN00002', 'Rapat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kode_lokasi` varchar(10) DEFAULT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `kode_lokasi`, `nama_lokasi`) VALUES
(1, 'KLS00001', 'sepatan'),
(2, 'KLS00002', 'pakuhaji'),
(4, 'KLK00003', 'sepatan timur 1'),
(5, 'KLK00003', 'ada'),
(6, 'KLK00003', 'sepatan timur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE `tb_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `progres` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`id_monitoring`, `pekerjaan_id`, `team_id`, `progres`, `tanggal`, `keterangan`) VALUES
(1, 1, 3, 'seo', '2021-08-26', 'sedang masa pembelajaran'),
(2, 3, 5, 'sem', '2021-08-26', 'sedang masa aktif mengajar'),
(3, 1, 1, 'Upload', '2021-08-26', 'belajar'),
(4, 1, 1, 'Upload1', '2021-08-26', 'tahapan'),
(6, 3, 2, 'dua', '2021-08-02', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `kode_pekerjaan` varchar(10) DEFAULT NULL,
  `lokasi_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `kode_pekerjaan`, `lokasi_id`, `kegiatan_id`) VALUES
(1, 'PKR0001', 1, 2),
(3, 'PKR0002', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id_team` int(11) NOT NULL,
  `kode_team` varchar(10) DEFAULT NULL,
  `nama_team` varchar(50) NOT NULL,
  `no_telpon` char(13) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`id_team`, `kode_team`, `nama_team`, `no_telpon`, `status`) VALUES
(1, 'TM00001', 'Bonex', '089533493031', 1),
(2, 'TM00002', 'Artam', '089533493035', 2),
(3, 'TM00003', 'adadonkk', '0893663817', 1),
(5, 'TM00004', 'kas', '0893663817', 0),
(6, 'TM00005', 'adalah', '89366381700', 0),
(7, 'TM00006', 'verdian', '89366381700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role_id` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `role_id`, `created`) VALUES
(1, 'muhamad aldi setaiwan', 'aldi@gmail.com', '$2y$10$ScidOvzGL9w42ogrYMyUn.o7p02DzkoZhemClUqqw2Tsc7f5yYzRW', 2, '2021-08-25 22:34:56'),
(2, 'aldo', 'aldo@gmail.com', '$2y$10$9zDbqajrBNhTxcyD8rUZEuCoYOC7yO1FZM/IShZABlji1dAy9GgDW', 1, '2021-08-25 22:39:18'),
(3, 'alda', 'alda@gmail.com', '$2y$10$S/O7/9jzZytOUY24ags8tugRKFHJmneS1RtPDtFGLYLU62OCVInrG', 3, '2021-08-25 22:39:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `pekerjaan_id` (`pekerjaan_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `lokasi_id` (`lokasi_id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD CONSTRAINT `tb_monitoring_ibfk_1` FOREIGN KEY (`pekerjaan_id`) REFERENCES `tb_pekerjaan` (`id_pekerjaan`),
  ADD CONSTRAINT `tb_monitoring_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `tb_team` (`id_team`);

--
-- Constraints for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD CONSTRAINT `tb_pekerjaan_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `tb_kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `tb_pekerjaan_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `tb_lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
