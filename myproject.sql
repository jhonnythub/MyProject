-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 03:27 PM
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
  `Gambar` varchar(100) NOT NULL,
  `Bintang1` int(11) NOT NULL,
  `Bintang2` int(11) NOT NULL,
  `Bintang3` int(11) NOT NULL,
  `Bintang4` int(11) NOT NULL,
  `Bintang5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`ID`, `Type`, `Kategori`, `Harga`, `Gambar`, `Bintang1`, `Bintang2`, `Bintang3`, `Bintang4`, `Bintang5`) VALUES
(1, 'REALME C15', 'Realme', '350000', '62f154ea6dcfe.jpg', 0, 0, 0, 0, 0),
(2, 'SM-A71 OLED', 'SAMSUNG', '1100000', '62f1553421059.jpg', 0, 0, 0, 0, 0),
(3, 'OPPO A1K', 'OPPO', '280000', '62f1559fbbdd0.jpg', 0, 0, 0, 0, 0),
(4, 'OPPO F1S', 'OPPO', '260000', '62f1563f9ae05.jpeg', 0, 0, 0, 0, 0),
(5, 'OPPO A39', 'OPPO', '320000', '62f156b4e8c12.jpg', 0, 0, 0, 0, 0),
(6, 'REDMI 4X', 'Xiaomi', '250000', '62f156f2a2622.jpg', 0, 0, 0, 0, 0),
(7, 'REALME 3 PRO', 'Realme', '470000', '62f1575802b0a.jpg', 0, 0, 0, 0, 0),
(8, 'REALME 5 PRO', 'Realme', '230000', '62f1577c90d1a.webp', 0, 0, 0, 0, 0);

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
(1, 'Jhonny Iskandar', 'Jhonny.Iskandar', 'dominictorretto501@gmail.com', '$2y$10$IZgxa0WwrNlcXdyGeGSc4Ohe0AHAms5oddmcYfNf8fu7/v.o/PHLC', '2022-08-11 20:15:37', '192.168.100.1', 'Berhasil', 815568, 'Admin'),
(2, 'Sofy Hilyah', 'Sofy.Hilyah', 'cheeatchip01@gmail.com', '$2y$10$w/ILoePnXoGe4/IMUPJDyeUiyIR4YejlFJYdC0Ky1R1Xlb2c9ULr6', '2022-08-02 01:51:20', '192.168.100.1', 'Berhasil', 127238, 'User');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
