-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 07:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_aplin`
--
CREATE DATABASE IF NOT EXISTS `proyek_aplin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyek_aplin`;

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

DROP TABLE IF EXISTS `bab`;
CREATE TABLE `bab` (
  `no` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `pengirim` int(11) NOT NULL COMMENT '0 = member,\r\n1 = CS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `thread` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `reply` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

DROP TABLE IF EXISTS `completion`;
CREATE TABLE `completion` (
  `bab` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `completion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

DROP TABLE IF EXISTS `data_member`;
CREATE TABLE `data_member` (
  `tanggal` date NOT NULL,
  `jumlah member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_vid`
--

DROP TABLE IF EXISTS `kategori_vid`;
CREATE TABLE `kategori_vid` (
  `id` int(11) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_vid`
--

INSERT INTO `kategori_vid` (`id`, `nama_kategori`) VALUES
(1, 'tesKategori'),
(2, 'tes'),
(3, 'pemula'),
(4, 'ivander cupu'),
(5, 'kategori baru');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

DROP TABLE IF EXISTS `rekomendasi`;
CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `name`, `keterangan`) VALUES
(5, 'AAPL', 'Apple'),
(6, 'TWTR', 'Twitter'),
(7, 'GOOG', 'Google'),
(8, 'TSLA', 'Tesla'),
(9, 'FB', 'Meta');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `member` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `video` text NOT NULL,
  `status_video` int(11) NOT NULL,
  `f_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `judul`, `video`, `status_video`, `f_kategori`) VALUES
(3, 'testing', 'HLLofrwRlBg', 1, 2),
(4, 'testing video', 'XqZsoesa55w', 1, 4),
(5, 'asdasd', 'pL8XPZp4-5c', 1, 5),
(6, '11asasdasdad', 'fDek6cYijxI', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thread_forum`
--

DROP TABLE IF EXISTS `thread_forum`;
CREATE TABLE `thread_forum` (
  `id` int(11) NOT NULL,
  `Judul` text NOT NULL,
  `Video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `bulan` datetime NOT NULL DEFAULT current_timestamp(),
  `subtotal` int(11) NOT NULL,
  `bukti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_member`, `bulan`, `subtotal`, `bukti`) VALUES
(5, 31, '2022-05-17 12:03:07', 120, 'uploads/31.png'),
(6, 31, '2022-05-17 12:04:42', 120, 'uploads/31.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `umur` int(100) NOT NULL,
  `role` int(15) NOT NULL COMMENT '0 = Member Biasa\r\n1 = Member VIP\r\n2 = CS\r\n3 = Admin',
  `status` int(15) NOT NULL,
  `expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `umur`, `role`, `status`, `expired`) VALUES
(1, 'ibw25', '123', 'Ivander', 19, 2, 1, NULL),
(2, 'admin', '000', 'Admin Bewe', 19, 3, 0, NULL),
(29, 'ivanderberwyn2002@gmail.com', '5677', 'CobaGambars', 17, 1, 1, NULL),
(31, 'ibewe25@gmail.com', '12345', 'qwe', 17, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`service`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`member`),
  ADD KEY `reply` (`reply`),
  ADD KEY `comment_ibfk_2` (`thread`);

--
-- Indexes for table `completion`
--
ALTER TABLE `completion`
  ADD KEY `bab` (`bab`),
  ADD KEY `member` (`member`);

--
-- Indexes for table `kategori_vid`
--
ALTER TABLE `kategori_vid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`member`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refkategori` (`f_kategori`);

--
-- Indexes for table `thread_forum`
--
ALTER TABLE `thread_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Video` (`Video`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_vid`
--
ALTER TABLE `kategori_vid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thread_forum`
--
ALTER TABLE `thread_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`member`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`thread`) REFERENCES `thread_forum` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`reply`) REFERENCES `comment` (`id`);

--
-- Constraints for table `completion`
--
ALTER TABLE `completion`
  ADD CONSTRAINT `completion_ibfk_1` FOREIGN KEY (`bab`) REFERENCES `bab` (`no`),
  ADD CONSTRAINT `completion_ibfk_2` FOREIGN KEY (`member`) REFERENCES `user` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`member`) REFERENCES `user` (`id`);

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `refkategori` FOREIGN KEY (`f_kategori`) REFERENCES `kategori_vid` (`id`);

--
-- Constraints for table `thread_forum`
--
ALTER TABLE `thread_forum`
  ADD CONSTRAINT `thread_forum_ibfk_1` FOREIGN KEY (`Video`) REFERENCES `thread` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
