-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 05:15 PM
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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `pengirim` int(11) NOT NULL COMMENT '0 = member,\r\n1 = CS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `service`, `isi`, `tanggal`, `pengirim`) VALUES
(17, 5, 'Benarkah saham itu judi?', '2022-05-29 00:00:00', 0),
(18, 5, 'Bukan dong dengan analisa yang baik kamu pasti bisa!', '2022-05-29 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `thread` int(11) NOT NULL,
  `namamember` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `reply` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `thread`, `namamember`, `isi`, `tanggal`, `reply`) VALUES
(23, 16, 'Ibewe', 'mosok', '2022-05-29 00:00:00', -1),
(24, 16, 'Ivander KW', 'Iya Beneran', '2022-05-29 00:00:00', 23),
(25, 16, 'Ivander KW', 'mosok', '2022-05-30 00:00:00', -1);

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

DROP TABLE IF EXISTS `completion`;
CREATE TABLE `completion` (
  `kategori` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `completion` float NOT NULL
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
(5, 'kategori baru'),
(7, 'Saham');

-- --------------------------------------------------------

--
-- Table structure for table `progressbar`
--

DROP TABLE IF EXISTS `progressbar`;
CREATE TABLE `progressbar` (
  `id` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `refkategori` int(11) NOT NULL,
  `refthread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progressbar`
--

INSERT INTO `progressbar` (`id`, `refuser`, `refkategori`, `refthread`) VALUES
(1, 35, 2, 3),
(2, 36, 2, 3),
(3, 37, 2, 3),
(4, 37, 4, 4);

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
(1, 'ASII', 'qwe'),
(5, 'AAPL', 'Apple'),
(6, 'TWTR', 'Twitter'),
(7, 'GOOG', 'Google'),
(8, 'TSLA', 'Tesla'),
(9, 'FB', 'Meta'),
(11, 'BBRI', 'Bisa');

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

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `judul`, `member`, `rate`) VALUES
(3, 'Aku bisa makan', 36, 4),
(4, 'Langit bisakah', 36, 5),
(5, 'Saham Itu Judi?', 37, 5),
(6, 'Saham', 37, NULL);

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
(1, 'Bisa', '-w7KOoMWlNo', 1, 6),
(3, 'testing', 'HLLofrwRlBg', 1, 2),
(4, 'testing video', 'XqZsoesa55w', 1, 4),
(5, 'asdasd', 'pL8XPZp4-5c', 1, 5),
(6, '11asasdasdad', 'fDek6cYijxI', 1, 2),
(7, 'tutor saham', 'NjsUrZ1NL0k', 1, 4),
(8, 'cara beli saham', 'IzsYTb2WdGs', 1, 4),
(9, 'Luna nglawak', 'Eg35QIxiRg8', 1, 4),
(10, 'Bisa', '_BjLo-BYtjg', 1, 6),
(11, 'Streaming saham', 'jj9CbhJ2byg', 1, 7),
(12, 'streaminmg', 'vd15S0opLmY', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `thread_forum`
--

DROP TABLE IF EXISTS `thread_forum`;
CREATE TABLE `thread_forum` (
  `id` int(11) NOT NULL,
  `Judul` text NOT NULL,
  `isi` text NOT NULL,
  `namamember` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `Kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread_forum`
--

INSERT INTO `thread_forum` (`id`, `Judul`, `isi`, `namamember`, `tanggal`, `Kategori`) VALUES
(16, 'Saham Gorengan', 'bagus', 'Ibewe', '2022-05-30 22:13:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bulan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `bukti` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '-1 = Rejected,\r\n0 = Belum dikonfirmasi,\r\n1 = Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_member`, `tgl`, `bulan`, `subtotal`, `bukti`, `status`) VALUES
(4, 37, '2022-05-29', 1, 120000, 'uploads/37.png', 1),
(5, 36, '2022-05-30', 5, 120000, 'uploads/37.png', 1),
(6, 37, '2022-05-30', 1, 120000, 'uploads/37.png', 1);

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
(33, 'csKITAKAYA@gmail.com', '123', 'Customer Service', 25, 2, 1, NULL),
(36, 'ibewe25@gmail.com', '$2y$10$4oSMnD.s7BHxvmUjwMIQr.9H2DSUh.5uNpzFmiLU6vmrmz8MKSVyu', 'Ibewe', 17, 0, 1, NULL),
(37, 'ivanderkw2@gmail.com', '$2y$10$on6opiI7NfFrZHQJSWRlguoj5y..GsPWXIN/3gbXimq6msMJfauyO', 'Ivander KW', 21, 1, 1, '2022-06-30');

--
-- Indexes for dumped tables
--

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
  ADD KEY `reply` (`reply`),
  ADD KEY `comment_ibfk_2` (`thread`);

--
-- Indexes for table `completion`
--
ALTER TABLE `completion`
  ADD KEY `member` (`member`),
  ADD KEY `completion_ibfk_1` (`kategori`);

--
-- Indexes for table `kategori_vid`
--
ALTER TABLE `kategori_vid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progressbar`
--
ALTER TABLE `progressbar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refuserid` (`refuser`),
  ADD KEY `refkategoriid` (`refkategori`),
  ADD KEY `refthreadid` (`refthread`);

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
  ADD KEY `Video` (`Kategori`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori_vid`
--
ALTER TABLE `kategori_vid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `progressbar`
--
ALTER TABLE `progressbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `thread_forum`
--
ALTER TABLE `thread_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
