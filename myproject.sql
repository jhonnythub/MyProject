-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 10:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `ID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `Harga` varchar(100) NOT NULL,
  `Gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`ID`, `Type`, `Kategori`, `Harga`, `Gambar`) VALUES
(1, 'REALME C15', 'Realme', '350000', '62f154ea6dcfe.jpg'),
(2, 'SM-A71 OLED', 'SAMSUNG', '1100000', '62f1553421059.jpg'),
(3, 'OPPO A1K', 'OPPO', '280000', '62f1559fbbdd0.jpg'),
(4, 'OPPO F1S', 'OPPO', '260000', '62f1563f9ae05.jpeg'),
(5, 'OPPO A39', 'OPPO', '320000', '62f156b4e8c12.jpg'),
(6, 'REDMI 4X', 'Xiaomi', '250000', '62f156f2a2622.jpg'),
(7, 'REALME 3 PRO', 'Realme', '470000', '62f1575802b0a.jpg'),
(8, 'REALME 5 PRO', 'Realme', '230000', '62f1577c90d1a.webp');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `lastLog` datetime NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Aktivasi` varchar(100) NOT NULL,
  `kode_OTP` int(100) NOT NULL,
  `setAs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`ID`, `Nama`, `Username`, `Email`, `Password`, `lastLog`, `IP`, `Aktivasi`, `kode_OTP`, `setAs`) VALUES
(1, 'Jhonny Iskandar', 'Jhonny.Iskandar', 'dominictorretto501@gmail.com', '$2y$10$IZgxa0WwrNlcXdyGeGSc4Ohe0AHAms5oddmcYfNf8fu7/v.o/PHLC', '2022-08-16 22:50:13', '192.168.100.1', 'Berhasil', 268575, 'Admin'),
(2, 'Sofy Hilyah', 'Sofy.Hilyah', 'cheeatchip01@gmail.com', '$2y$10$w/ILoePnXoGe4/IMUPJDyeUiyIR4YejlFJYdC0Ky1R1Xlb2c9ULr6', '2022-08-16 23:06:15', '192.168.100.1', 'Berhasil', 912203, 'User'),
(4, 'Muhtar Ngabalin', 'Muhtar.Ngabalin', 'muhtarngabalin47@gmail.com', '$2y$10$qPlUTG7egwIuo9Hhd1.iWOR0L/JlWgDNd3KMxAc0B.vL.uAf20dOS', '2022-08-19 09:26:11', '192.168.100.1', 'Berhasil', 268015, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Akun` varchar(100) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID`, `Type`, `Akun`, `Rating`, `Tanggal`) VALUES
(1, 'REALME 3 PRO', '', 0, '0000-00-00 00:00:00'),
(2, 'OPPO A39', 'Jhonny.Iskandar', 5, '0000-00-00 00:00:00'),
(3, 'OPPO A39', 'Jhonny.Iskandar', 5, '0000-00-00 00:00:00'),
(4, 'SM-A71 OLED', 'Jhonny.Iskandar', 5, '0000-00-00 00:00:00'),
(5, 'SM-A71 OLED', 'Jhonny.Iskandar', 5, '2022-08-16 22:55:56'),
(6, 'OPPO A1K', 'Jhonny.Iskandar', 5, '2022-08-16 22:55:59'),
(7, 'OPPO A1K', 'Jhonny.Iskandar', 5, '2022-08-16 22:58:32'),
(8, 'REALME C15', 'Jhonny.Iskandar', 2, '2022-08-16 23:03:28'),
(9, 'OPPO A39', 'Sofy.Hilyah', 5, '2022-08-16 23:06:22'),
(10, 'REALME C15', 'Sofy.Hilyah', 5, '2022-08-16 23:07:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
