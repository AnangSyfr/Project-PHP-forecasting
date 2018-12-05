-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 05:10 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_201751011`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmb_201751011`
--

CREATE TABLE `pmb_201751011` (
  `kode_pmb` int(11) NOT NULL,
  `periode_pmb` varchar(5) DEFAULT NULL,
  `jumlah_pmb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_201751011`
--

INSERT INTO `pmb_201751011` (`kode_pmb`, `periode_pmb`, `jumlah_pmb`) VALUES
(13, '2018', 100),
(14, '2019', 200),
(15, '2020', 300),
(16, '2021', 400),
(17, '2022', 500),
(18, '2023', 600),
(19, '2024', 100),
(20, '2025', 200),
(21, '2026', 300),
(22, '2027', 400),
(23, '2028', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pmb_201751011`
--
ALTER TABLE `pmb_201751011`
  ADD PRIMARY KEY (`kode_pmb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pmb_201751011`
--
ALTER TABLE `pmb_201751011`
  MODIFY `kode_pmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
