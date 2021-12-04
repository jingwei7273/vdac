-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 04:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfma`
--
CREATE DATABASE IF NOT EXISTS `cfma` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cfma`;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category` enum('food','transport','clothing','daily_supplies','groceries','entertainment','medical','bill','other') NOT NULL,
  `tag` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `tag`, `amount`, `time`) VALUES
(1, 'food', 'nasi lemak', 4.99, '2021-11-22 14:56:03'),
(2, 'clothing', 'nike', 299.99, '2021-11-22 14:56:24'),
(3, 'food', 'coke', 2, '2021-12-03 13:33:39'),
(4, 'food', 'mcchicken', 8.99, '2021-12-03 13:35:55'),
(5, 'food', 'nasi dagang', 20, '2021-12-03 13:53:43'),
(12, 'food', 'ice cream', 4.99, '2021-12-03 14:10:27'),
(14, 'transport', 'petrol', 55, '2021-12-03 16:52:21'),
(15, 'food', 'coke', 2.5, '2021-12-03 16:52:36'),
(17, 'transport', 'petrol', 55, '2021-12-03 17:19:52'),
(18, 'clothing', 'H&M', 59, '2021-12-03 19:33:12'),
(19, 'groceries', 'avocado', 4.5, '2021-12-03 19:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `category` enum('pocket_money','salary','allowance','bonus','side_hustle','earned_interest','investment_dividend') NOT NULL,
  `tag` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `category`, `tag`, `amount`, `time`) VALUES
(1, 'pocket_money', 'Dec pocket money', 400, '2021-11-22 15:14:32'),
(2, 'pocket_money', 'June pocket money', 50, '2021-12-03 19:58:24'),
(3, 'investment_dividend', 'Tesla', 299, '2021-12-03 20:04:16'),
(4, 'side_hustle', 'work at mcd', 700, '2021-12-03 20:04:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
