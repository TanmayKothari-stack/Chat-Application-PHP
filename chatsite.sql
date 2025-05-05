-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 05:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `conformpassword` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `device_name` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `password`, `conformpassword`, `mobile`, `email`, `device_name`, `photo`) VALUES
(1, 'ABC', '123', '123', '1000000000', 'abc@gmail.com', 'ABC', 'profiles/features.png'),
(2, 'XYZ', '456', '456', '2000000000', 'xyz@gmail.com', 'XYZ', ''),
(3, 'PQR', '789', '789', '3000000000', 'pqr@gmail.com', 'LAPTOP-JH106GME', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatid`
--

CREATE TABLE `chatid` (
  `id` int(11) NOT NULL,
  `chatid` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE `contact_list` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `uemail` text NOT NULL,
  `umobile` text NOT NULL,
  `cname` text NOT NULL,
  `cemail` text NOT NULL,
  `cmobile` text NOT NULL,
  `chatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_list`
--

INSERT INTO `contact_list` (`id`, `uname`, `uemail`, `umobile`, `cname`, `cemail`, `cmobile`, `chatid`) VALUES
(30, 'ABC', 'abc@gmail.com', '1000000000', 'XYZ', 'xyz@gmail.com', '2000000000', 462871828),
(31, 'XYZ', 'xyz@gmail.com', '2000000000', 'ABC', 'abc@gmail.com', '1000000000', 462871828),
(32, 'PQR', 'pqr@gmail.com', '3000000000', 'XYZ', 'xyz@gmail.com', '2000000000', 579249010),
(33, 'XYZ', 'xyz@gmail.com', '2000000000', 'PQR', 'pqr@gmail.com', '3000000000', 579249010),
(40, 'ABC', 'abc@gmail.com', '1000000000', 'PQR', 'pqr@gmail.com', '3000000000', 379382361),
(41, 'PQR', 'pqr@gmail.com', '3000000000', 'ABC', 'abc@gmail.com', '1000000000', 379382361);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `uemail` text NOT NULL,
  `umobile` text NOT NULL,
  `cname` text NOT NULL,
  `cemail` text NOT NULL,
  `cmobile` text NOT NULL,
  `chatid` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `uname`, `uemail`, `umobile`, `cname`, `cemail`, `cmobile`, `chatid`, `message`) VALUES
(98, 'ABC', 'abc@gmail.com', '1000000000', 'XYZ', 'xyz@gmail.com', '2000000000', 379382361, 'hi'),
(99, 'PQR', 'pqr@gmail.com', '3000000000', 'XYZ', 'xyz@gmail.com', '2000000000', 579249010, 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatid`
--
ALTER TABLE `chatid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chatid`
--
ALTER TABLE `chatid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
