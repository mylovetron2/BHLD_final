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
-- Table structure for table `bhld_dmuc`
--

CREATE TABLE IF NOT EXISTS `bhld_dmuc` (
  `madm` varchar(11) NOT NULL,
  `mota` varchar(50) NOT NULL,
  `ghichu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhld_dmuc`
--

INSERT INTO `bhld_dmuc` (`madm`, `mota`, `ghichu`) VALUES
('M1', 'Ban giám đốc', '-'),
('M10', 'Thợ bắn mìn, thợ tời, thợ carota', '-'),
('M11', 'Thợ điện, kỹ thuật viên', '-'),
('M12', 'Tạp vụ', '-'),
('M13', 'Phòng phân tích, VT, AT', '-'),
('M14', 'Chủ nhiệm kho', NULL),
('M2', 'Phòng kỹ thuật sản xuất', '-'),
('M3', 'Kỹ thuật viên định lượng (0)', '-'),
('M4', 'Các đội đi biển KS', '-'),
('M5', 'Xưởng điện tử. Xưởng cơ khí KS', '-'),
('M6', 'Kỹ sư điện (0)', '-'),
('M7', 'Thợ tiện, thợ nguội', '-'),
('M8', 'Thợ hàn', '-'),
('M9', 'Thợ chống ăn mòn', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhld_dmuc`
--
ALTER TABLE `bhld_dmuc`
  ADD PRIMARY KEY (`madm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
