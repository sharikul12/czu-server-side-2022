-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 07:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kutnahora`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `cmessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `f_name`, `l_name`, `email`, `phone`, `cmessage`) VALUES
(1, '', '', '', '', ''),
(2, '', '', '', '', ''),
(3, '', '', 'wqwqw@gg.hh', '323242', ''),
(4, 'aaas', 'saas', 'sas@sas.gf', '8089765', ''),
(5, 'sasas', 'sasas', 'saASA@GG.CC', '32232', 'assasa'),
(6, 'sasas', 'sasas', 'saASA@GG.CC', '32232', 'assasa'),
(7, 'DZxxxxxxxx', 'xzzzzzzzzz', 'zxzx@ff.cc', '766676', 'ssasa'),
(8, 'DZxxxxxxxx', 'xzzzzzzzzz', 'zxzx@ff.cc', '766676', 'ssasa'),
(9, 'sasas', 'sasasas', 'saASA@GG.CC', '323232', 'dadsa'),
(10, 'sasas', 'saasddsf', 'dsdfsfs@co.cc', '323131', 'dwrrrwdzx'),
(11, 'asasas', 'saasas', 'saASA@GG.CC', '32231', 'wdfvfWDC');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `uid` int(20) NOT NULL,
  `uStatus` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uid`, `uStatus`, `time`) VALUES
(6, 8, 'sadsfsadfdhzfgdfsgdfgs dr', '2022-04-12 17:58:41'),
(7, 8, 'hello all whats up', '2022-04-12 20:23:54'),
(8, 8, 'sasasasasas', '2022-04-13 11:23:58'),
(9, 8, '', '2022-04-13 12:14:05'),
(11, 9, 'sssdasdvsadafadffff ', '2022-04-13 12:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `uemail`, `upassword`, `timestamp`) VALUES
(6, 'ww', 'sa@hh.cc', '47bce5c74f589f4867dbd57e9ca9f808', '2022-04-11 11:31:02'),
(7, 'wwsaasas', 'saaa@gg.ss', '47bce5c74f589f4867dbd57e9ca9f808', '2022-04-11 12:15:25'),
(8, 'wwsaasas', 'ssas@gga.xx', '47bce5c74f589f4867dbd57e9ca9f808', '2022-04-11 12:17:37'),
(9, 'sharik', 'sharik@gm.co', '68cf63c62bc68d71fc41c028375e2f6e', '2022-04-13 12:34:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
