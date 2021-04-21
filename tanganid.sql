-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 08:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanganid`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `alamat`, `email`, `password`, `foto`, `pekerjaan`, `status`) VALUES
(1, 'Joko widodo', 'Jakarta', 'adi@gmail.com', 'adi123', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC6Eyvbi88IM0FWnJo0rf4t8r8dupuFV6zJ1s7-US0fgkzy-3XnFx00BOwTQr8xwZq6rg&usqp=CAU', 'Karyawan', 'Admin'),
(2, 'Minions', 'Bandung', 'ikbal@gmail.com', '123', 'https://tataotak.com/wp-content/uploads/2019/10/CAA681-1-1.jpg', 'Karyawan', 'User'),
(4, 'coco', 'Yogyakarta', 'coco@gmail.com', '123', 'asset/img/profile.png', 'Mahasiswa', 'Staff Admin');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_akun`, `judul`, `tanggal`, `lokasi`, `isi`, `foto`, `status`) VALUES
(9, 1, 'Hujan', 'Friday, 02-04-2021', 'Bandung', '<p>Hujan adalah sebuah presipitasi berwujud cairan, berbeda dengan presipitasi non-cair seperti salju, batu es dan slit. Hujan memerlukan keberadaan lapisan atmosfer tebal agar dapat menemui suhu di atas titik leleh es di dekat dan di atas permukaan Bumi.&nbsp;</p>\r\n', 'https://asset.kompas.com/crops/tX1ued3p3uEhRmf1nHKw_HdwJ6Y=/110x0:680x380/750x500/data/photo/2020/08/13/5f34e78460282.jpg', 'acc'),
(16, 2, 'Hujan', 'Friday, 02-04-2021', 'Bandung', '<p>Hujan adalah sebuah presipitasi berwujud cairan, berbeda dengan presipitasi non-cair seperti salju, batu es dan slit. Hujan memerlukan keberadaan lapisan atmosfer tebal agar dapat menemui suhu di atas titik leleh es di dekat dan di atas permukaan Bumi.&nbsp;</p>\r\n', 'https://asset.kompas.com/crops/tX1ued3p3uEhRmf1nHKw_HdwJ6Y=/110x0:680x380/750x500/data/photo/2020/08/13/5f34e78460282.jpg', 'noacc');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `isi_komen` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
