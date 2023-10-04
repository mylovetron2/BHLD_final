-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2023 at 08:16 AM
-- Server version: 5.6.49
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diavatly_ltd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bhld_dmvattu`
--

CREATE TABLE IF NOT EXISTS `bhld_dmvattu` (
  `mavt` int(11) NOT NULL,
  `tenvt` varchar(50) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `ghichu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhld_dmvattu`
--

INSERT INTO `bhld_dmvattu` (`mavt`, `tenvt`, `dvt`, `ghichu`) VALUES
(10000, 'Nút tai chống ồn', 'đôi', 'new'),
(20000, 'Phin lọc khí độc', 'cái', 'new'),
(500120, 'Giày bảo hộ', 'Đôi', NULL),
(500500, 'Mũ bảo hộ', 'Chiếc', NULL),
(500860, 'Áo quần bảo hộ', 'Bộ', NULL),
(501545, 'Kính bảo hộ', 'Cặp', NULL),
(501660, 'Áo bạt đi mưa', 'Chiếc', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhld_dmvattu`
--
ALTER TABLE `bhld_dmvattu`
  ADD PRIMARY KEY (`mavt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
