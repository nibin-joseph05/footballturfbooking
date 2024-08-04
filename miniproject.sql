-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `ref_code` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'ON UPDATE CURRENT_TIMESTAMP()',
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `ref_code`, `user_id`, `facility_id`, `date_from`, `payment_status`, `status`, `date_created`, `date_updated`, `amount`) VALUES
(131, '', 13, 39, '2024-01-01', 'pending', 0, '2023-12-12 19:21:41', '2023-12-12 19:21:41', 3000),
(132, '', 13, 41, '2024-01-02', 'pending', 0, '2023-12-12 19:26:37', '2023-12-12 19:26:37', 3200),
(133, '', 14, 39, '2023-12-20', 'pending', 0, '2023-12-13 10:17:35', '2023-12-13 10:17:35', 3000),
(134, '', 13, 39, '2023-12-14', 'pending', 0, '2023-12-13 11:41:02', '2023-12-13 11:41:02', 3000),
(135, '', 13, 41, '2023-12-29', 'pending', 0, '2023-12-13 11:44:02', '2023-12-13 11:44:02', 3200);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `confirm_password` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'user',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'ON UPDATE CURRENT_TIMESTAMP()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `confirm_password`, `image_path`, `status`, `date_created`, `date_added`) VALUES
(12, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '2023-12-12 17:39:48', '2023-12-13 13:02:16'),
(13, 'Nibin', '', 'Joseph', 'male', '9778234876', 'kanayankavayal (p.o) kanayankavayal', 'nibinjoseph2019@gmail.com', '123', '123', 'img/aboo.jpg', 'user', '2023-12-12 18:46:44', '2023-12-12 20:27:13'),
(14, 'Aboo', '', 'Thahir', 'male', '9526817951', 'Kuzhikattu Parambil House Ponkunnam P O', 'aboothahir456@gmail.com', '123', '123', 'img/aboo.jpg', 'user', '2023-12-13 10:16:56', NULL),
(15, 'Cyril', '', 'Mathew', 'male', '8590571092', 'Entheyar po yenthayar', 'cyrilmathew162@gmail.com', '123', '123', 'img/kuttu.jpg', 'user', '2023-12-13 13:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facility_list`
--

CREATE TABLE `facility_list` (
  `facility_id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'ON UPDATE CURRENT_TIMESTAMP()',
  `name` text NOT NULL,
  `place` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility_list`
--

INSERT INTO `facility_list` (`facility_id`, `image_path`, `status`, `date_created`, `date_updated`, `name`, `place`, `description`, `rate`) VALUES
(39, 'img/img6.jpg', 1, '2023-12-12 18:09:55', NULL, 'Alabaster Park', 'Podimattam', '*good ambiance *rest room available', 3000),
(40, 'img/img1.jpg', 1, '2023-12-12 18:16:31', NULL, 'Fortune Centre', 'kanjirappally', '*good ambiance *rest room available', 3100),
(41, 'img/turf4.jpg', 1, '2023-12-12 18:23:25', '2023-12-12 18:23:43', 'Delight Ring', 'Mundakkayam ', '*good ambiance *rest room available', 3200),
(42, 'img/img6.jpg', 1, '2023-12-12 18:37:06', NULL, 'Animus Arena', 'kuttikanam', '*good ambiance *rest room available', 3000),
(43, 'img/img2.jpg', 1, '2023-12-12 18:38:33', NULL, 'Supreme Field Stadium', 'Mundakkayam', '*good ambiance *rest room available', 2800),
(44, 'img/img3.jpg', 1, '2023-12-12 18:39:17', NULL, 'Orchard Arena', 'kanjirappally', '*good ambiance *rest room available', 2700),
(45, 'img/img4.jpg', 1, '2023-12-12 18:40:12', NULL, 'Horoscope Arena', 'peermade', '*good ambiance *rest room available', 1500),
(46, 'img/img5.jpg', 1, '2023-12-12 18:40:49', '2023-12-12 18:44:25', 'Melody Field', 'peermade', '*good ambiance *rest room available', 1600),
(47, 'img/img7.jpg', 1, '2023-12-12 18:41:25', NULL, 'Vista Ring', 'kuttikanam', '*good ambiance *rest room available', 1850),
(48, 'img/img8.jpg', 1, '2023-12-12 18:42:08', NULL, 'Liberty Stadium', 'Panchalimedu', '*good ambiance *rest room available', 1900),
(49, 'img/img10.jpg', 0, '2023-12-12 18:43:05', NULL, 'Snowflake Field', 'Mannadishala', '*good ambiance *rest room available', 0),
(50, 'img/img9.jpg', 1, '2023-12-12 18:43:49', NULL, 'Emerald Park', 'Mundakkayam', '*good ambiance *rest room available', 2210);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `user_id`, `feedback`, `username`) VALUES
(1, 13, 'very good services\r\n', 'nibin'),
(3, 13, 'very good cervices', 'nibin'),
(4, 13, 'good', 'nibin'),
(5, 15, 'very good feedback', 'Cyril');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `facility_list`
--
ALTER TABLE `facility_list`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT';

--
-- AUTO_INCREMENT for table `facility_list`
--
ALTER TABLE `facility_list`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
