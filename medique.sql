-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 10:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medique`
--

-- --------------------------------------------------------

--
-- Table structure for table `bp`
--

CREATE TABLE `bp` (
  `id` int(11) NOT NULL,
  `diastolic` int(20) DEFAULT NULL,
  `systolic` int(20) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bp`
--

INSERT INTO `bp` (`id`, `diastolic`, `systolic`, `student`, `date`) VALUES
(1, 80, 120, '19/1306', '2024-03-23 14:11:47'),
(2, 60, 130, '19/1306', '2024-03-23 14:14:08'),
(3, 90, 120, '19/1306', '2024-03-23 14:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `Fname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `Fname`, `phone`, `email`, `password`, `user_type`) VALUES
(1, 'Victor Efidi okechukwu', '08109495127', 'vefidi135@gmail.com', '$2y$10$Jd4wcVo//9UhUO6e1M7D9OLLrPKReNROF2er7Mb6wr5Yggy2g0UtS', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `test` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `medication`, `problem`, `test`, `cost`, `date`, `student`) VALUES
(1, ' vitamin c', ' malaria', ' ', ' 1000', '2024-03-23 19:39:46', '19/1306');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Fname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `matric_no` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Fname`, `phone`, `email`, `user_type`, `nationality`, `dob`, `gender`, `matric_no`, `department`, `blood_group`, `blood_type`, `password`) VALUES
(1, 'wilson ayoola', '08109495127', 'vefidi135@gmail.com', 'student', 'Nigerian', '2003-03-01', 'male', '19/1306', 'computer science', 'A+', 'AA', '$2y$10$Nt5HDZmiIfdxLcdRMvySkOfG71CXv0djPm7tDghDOoAMAEuV.HzQy'),
(2, 'test', '08109495127', 'test@test.com', 'student', 'french', '2004-06-08', 'female', '19/2548', 'CT', 'A+', 'AA', '$2y$10$RigAPXBleSDXRv/AXhPnLODc3588hVBoKRe4qrspwwMUx7.10Sc7W');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `student` varchar(255) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `student`, `temperature`, `date`) VALUES
(1, '19/1306', 45.3, '2024-03-23 17:02:34'),
(2, '19/1306', 36, '2024-03-23 17:02:55'),
(3, '19/1306', 40, '2024-03-23 17:03:02'),
(4, '19/1306', 38, '2024-03-23 17:03:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bp`
--
ALTER TABLE `bp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bp`
--
ALTER TABLE `bp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
