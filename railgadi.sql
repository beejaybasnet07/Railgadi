-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 05:41 PM
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
  `uid` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `berth` varchar(255) NOT NULL,
  `seat` int(11) NOT NULL,
  `date` date NOT NULL,
  `code` varchar(255) NOT NULL,
  `flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tnumber` int(11) NOT NULL,
  `arrival_time` time(2) NOT NULL,
  `departure_time` time(2) NOT NULL,
  `date` date NOT NULL,
  `time` time(2) NOT NULL,
  `_from` varchar(255) NOT NULL,
  `_to` varchar(255) NOT NULL,
  `ac2price` int(11) NOT NULL,
  `ac3price` int(11) NOT NULL,
  `sprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `tnumber`, `arrival_time`, `departure_time`, `date`, `time`, `_from`, `_to`, `ac2price`, `ac3price`, `sprice`) VALUES
(1, 'Sagarmatha Express', 1010, '01:00:00.00', '03:04:00.00', '2021-06-30', '06:00:00.00', 'Biratnagar', 'Kathmandu', 750, 1000, 400),
(2, 'Rajdhani Express', 2020, '00:00:00.00', '00:00:00.00', '2021-05-16', '12:00:00.00', 'janakpur', 'jainagar', 1000, 1500, 700),
(3, 'Himal Express ', 2021, '00:00:00.00', '00:00:00.00', '2021-06-30', '10:00:00.00', 'Biratnagar', 'Kathmandu', 800, 1200, 500),
(4, 'Nepal  Express', 24432, '22:32:00.00', '22:32:00.00', '0000-00-00', '00:00:00.00', 'jayanagar', 'janakpur', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
