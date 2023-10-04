-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2023 at 08:17 AM
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
-- Table structure for table `bhld_phongban`
--

CREATE TABLE IF NOT EXISTS `bhld_phongban` (
  `mapb` varchar(50) NOT NULL,
  `tenphong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhld_phongban`
--

INSERT INTO `bhld_phongban` (`mapb`, `tenphong`) VALUES
('P01', 'BP Hành chính'),
('P02', 'Phòng kỹ thuật sản xuất'),
('P03', 'Đội Carota tổng hợp'),
('P04', 'Xưởng SC và CC máy ĐVL'),
('P05', 'Xưởng SC cơ khí chuyên dụng'),
('P06', 'Đội thử vỉa'),
('P07', 'Đội Carota khí'),
('P08', 'Đội Công nghệ cao'),
('P09', 'Đội kiểm tra khai thác'),
('P10', 'Chuyên gia Nga'),
('P11', 'Đội MWD/LWD'),
('P12', 'Đội Coitubing'),
('P13', 'Trung tâm phân tích');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhld_phongban`
--
ALTER TABLE `bhld_phongban`
  ADD PRIMARY KEY (`mapb`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
