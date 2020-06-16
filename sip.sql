-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 08:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `regno` varchar(50) NOT NULL,
  `sessionID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`regno`, `sessionID`) VALUES
('14482', '2020-06-10 - 1'),
('14482', '2020-06-10 - 2'),
('14482', '2020-06-11 - 1'),
('14482', '2020-06-11 - 2');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `sessionID` varchar(50) NOT NULL,
  `no` int(11) NOT NULL,
  `date` date NOT NULL,
  `feedback` longtext NOT NULL,
  `video` longtext NOT NULL,
  `currSess` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`sessionID`, `no`, `date`, `feedback`, `video`, `currSess`) VALUES
('2020-06-10 - 1', 1, '2020-06-10', 'https://docs.google.com/forms/d/e/1FAIpQLSd1aM-mhKjBSfG8S8pF6MhDFU1kgn0cs6o_pzyhj9mBDK-Nzw/viewform?usp=sf_link', 'abc.com', 0),
('2020-06-10 - 2', 2, '2020-06-10', 'https://docs.google.com/forms/d/e/1FAIpQLScCmf4Xj_3LxyBfoIYDz4RSxi1hOAWZFxilh0vNjd8v3d6clw/viewform?usp=sf_link', 'man.com', 0),
('2020-06-11 - 1', 1, '2020-06-11', 'https://docs.google.com/forms/d/e/1FAIpQLSc_GN6f8LhuBSb6C9NwWYKfPTSAZY_JpVOuiJ263AC1VWmQvQ/viewform?usp=sf_link', 'sample.com', 0),
('2020-06-11 - 2', 2, '2020-06-11', 'test.com', 'test.com', 1),
('2020-06-14 - 1', 1, '2020-06-14', '456.com', '', 0);

--
-- Triggers `timetable`
--
DELIMITER $$
CREATE TRIGGER `insert_trigger` BEFORE INSERT ON `timetable` FOR EACH ROW SET new.sessionID = CONCAT(new.date, ' - ', new.no)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_trigger` BEFORE UPDATE ON `timetable` FOR EACH ROW SET new.sessionID = CONCAT(new.date, ' - ', new.no)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `regno` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`regno`, `DOB`, `Fname`, `Lname`, `attendance`) VALUES
('14482', '2000-10-21', 'Manjunath', 'Naik', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`regno`,`sessionID`),
  ADD KEY `regno` (`regno`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`regno`) REFERENCES `users` (`regno`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`sessionID`) REFERENCES `timetable` (`sessionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
