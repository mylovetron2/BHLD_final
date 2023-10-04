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
-- Table structure for table `bhld_ctdmuc`
--

CREATE TABLE IF NOT EXISTS `bhld_ctdmuc` (
  `madm` varchar(50) NOT NULL,
  `mavt` int(11) NOT NULL,
  `dmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhld_ctdmuc`
--

INSERT INTO `bhld_ctdmuc` (`madm`, `mavt`, `dmuc`) VALUES
('M1', 500120, 24),
('M1', 500500, 24),
('M1', 500860, 24),
('M1', 501545, 12),
('M10', 10000, 1),
('M10', 20000, 12),
('M10', 500120, 9),
('M10', 500500, 18),
('M10', 500860, 6),
('M10', 501545, 4),
('M10', 501660, 12),
('M11', 500120, 9),
('M11', 500500, 18),
('M11', 500860, 9),
('M11', 501545, 4),
('M11', 501660, 12),
('M12', 500120, 9),
('M12', 500860, 6),
('M12', 501545, 3),
('M12', 501660, 12),
('M13', 500120, 18),
('M13', 500500, 24),
('M13', 500860, 18),
('M13', 501545, 12),
('M13', 501660, 12),
('M14', 10000, 1),
('M14', 500120, 9),
('M14', 500500, 18),
('M14', 500860, 9),
('M14', 501545, 4),
('M14', 501660, 12),
('M2', 500120, 18),
('M2', 500500, 24),
('M2', 500860, 18),
('M2', 501545, 12),
('M2', 501660, 12),
('M3', 500120, 9),
('M3', 500500, 18),
('M3', 500860, 6),
('M3', 501545, 6),
('M4', 500120, 9),
('M4', 500500, 18),
('M4', 500860, 6),
('M4', 501545, 6),
('M4', 501660, 12),
('M5', 10000, 1),
('M5', 500120, 12),
('M5', 500500, 18),
('M5', 500860, 9),
('M5', 501545, 4),
('M5', 501660, 12),
('M6', 10000, 1),
('M6', 500120, 9),
('M6', 500500, 18),
('M6', 500860, 6),
('M6', 501545, 4),
('M6', 501660, 12),
('M7', 500120, 9),
('M7', 500500, 18),
('M7', 500860, 6),
('M7', 501545, 2),
('M7', 501660, 12),
('M8', 10000, 1),
('M8', 500120, 9),
('M8', 500500, 18),
('M8', 500860, 9),
('M8', 501545, 3),
('M8', 501660, 12),
('M9', 10000, 1),
('M9', 500120, 9),
('M9', 500500, 18),
('M9', 500860, 4),
('M9', 501545, 2),
('M9', 501660, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhld_ctdmuc`
--
ALTER TABLE `bhld_ctdmuc`
  ADD PRIMARY KEY (`madm`,`mavt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
