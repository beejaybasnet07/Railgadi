-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 11:02 AM
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
-- Database: `railgadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `berth` varchar(255) NOT NULL,
  `seat` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`tid`, `pid`, `class`, `berth`, `seat`, `date`) VALUES
(1, 71, 'ac2', 'upper berth', 12, '2021-05-15'),
(1, 71, 'ac2', 'upper berth', 18, '2021-05-15'),
(1, 77, 'ac2', 'upper berth', 13, '2021-05-15'),
(1, 82, 'ac2', 'upper berth', 14, '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `scity` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `pname`, `age`, `scity`, `country`, `station`, `phone`, `email`, `gender`) VALUES
(77, 'shetty', 234, 'aacham', 'Nepal', 'acsham station', 9889, 'sheety', 'Male'),
(78, 'shetty', 234, 'aacham', 'Nepal', 'acsham station', 9889, 'sheety', 'Male'),
(79, 'sujan', 34, 'aacham', 'Nepal', 'acsham station', 3638388, 'sujan@gmail.com', 'Male'),
(80, 'sujan', 34, 'aacham', 'Nepal', 'acsham station', 3638388, 'sujan@gmail.com', 'Male'),
(81, 'bijay', 23, 'aacham', 'Nepal', 'acsham station', 56262, 'b@gmail.com', 'Male'),
(82, 'shreesh', 23, 'aacham', 'Nepal', 'acsham station', 567675, 'b@gmail.com', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tnumber` varchar(225) NOT NULL,
  -- `date` date NOT NULL,
  `arrival_time` time(2) NOT NULL,
  `departure_time` time(2) NOT NULL,
  `_from` varchar(255) NOT NULL,
  `_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

-- INSERT INTO `train` (`id`, `name`, `tnumber`, `arrival`, `_from`, `_to`) VALUES
-- (1, 'Sagarmatha Express', 1010, '06:00:00.00', 'Biratnagar', 'Kathmandu'),
-- (2, 'Rajdhani Express', 2020, '12:00:00.00', 'janakpur', 'jainagar'),
-- (3, 'Himal Express ', 2021, '10:00:00.00', 'Biratnagar', 'Kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`tid`,`pid`,`seat`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
