-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 05:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tblproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `brownie`
--

CREATE TABLE `brownie` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brownie`
--

INSERT INTO `brownie` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Fudgy', 'fudb', 'images/Brownies/fudgy.jpg', 55.00),
(2, 'Chocochip', 'chocob', 'images/Brownies/chocochip.jpg', 60.00),
(3, 'Oreo', 'oreob', 'images/Brownies/oreo.jpg', 65.00),
(4, 'Nuts', 'ntb', 'images/Brownies/nuts.jpg', 65.00),
(5, 'Walnut', 'walntb', 'images/Brownies/walnut.jpg', 65.00),
(6, 'Nuttela', 'nutlb', 'images/Brownies/nuttela.jpg', 70.00),
(7, 'Carmel Fudge', 'carfb', 'images/Brownies/caramelfudge.jpg', 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `celebrationcakes`
--

CREATE TABLE `celebrationcakes` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebrationcakes`
--

INSERT INTO `celebrationcakes` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Black Forest', 'blkfor', 'images/Celebration/blackforest.jpg', 800.00),
(2, 'Choco Truffle', 'choctuf', 'images/Celebration/chocotuffle.jpeg', 800.00),
(3, 'Red Velvet', 'redvel', 'images/Celebration/redvelvet.jpg', 800.00),
(4, 'White Forest', 'whtfor', 'images/Celebration/whiteforest.jpeg', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `exoticcakes`
--

CREATE TABLE `exoticcakes` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exoticcakes`
--

INSERT INTO `exoticcakes` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Chocochip truffle', 'cctexo', 'images/Exotic/chocochiptruffle.jpg', 800.00),
(2, 'Lemon blueberry', 'lbexo', 'images/Exotic/lemonblueberry.jpg', 800.00),
(3, 'Pinacoloda layer', 'plexo', 'images/Exotic/pinacolodalayer.jpg', 800.00),
(4, 'Rainbow cake', 'rainexo', 'images/Exotic/rainbowcake.jpg', 1000.00),
(5, 'Chocolate overloaded', 'coexo', 'images/Exotic/chocolateoverloaded.jpg', 1000.00),
(6, 'Brownie cake', 'browexo', 'images/Exotic/browniecake.jpg', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `placedorder`
--

CREATE TABLE `placedorder` (
  `id` int(8) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` double(10,2) NOT NULL,
  `code` varchar(255) NOT NULL,
  `totalprice` double(10,2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placedorder`
--

INSERT INTO `placedorder` (`id`, `quantity`, `price`, `code`, `totalprice`, `username`, `mobile`, `address`, `payment`) VALUES
(1, 5, 800.00, 'lbexo', 4000.00, 'Davidjayan', '9940224600', 'No17, East Mada Street, Thiruneermalai, Chrompet, Chennai 44', 'Notpaid'),
(2, 2, 1000.00, 'rainexo', 2000.00, 'Davidjayan', '9940224600', 'No17, East Mada Street, Thiruneermalai, Chrompet, Chennai 44', 'Notpaid'),
(3, 2, 1000.00, 'coexo', 2000.00, 'Davidjayan', '9940224600', 'No17, East Mada Street, Thiruneermalai, Chrompet, Chennai 44', 'Paid'),
(4, 2, 1000.00, 'coexo', 2000.00, 'Davidjayan', '9940224600', 'No17, East Mada Street, Thiruneermalai, Chrompet, Chennai 44', 'Notpaid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Davidjayan', '$2y$10$hsmc.gjSYX8Ui.KANsjs9O49YghLO/3qBe.5QEz.xykyZIq8Q0kLe', '2021-03-17 18:21:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brownie`
--
ALTER TABLE `brownie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `celebrationcakes`
--
ALTER TABLE `celebrationcakes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `exoticcakes`
--
ALTER TABLE `exoticcakes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `placedorder`
--
ALTER TABLE `placedorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brownie`
--
ALTER TABLE `brownie`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `celebrationcakes`
--
ALTER TABLE `celebrationcakes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exoticcakes`
--
ALTER TABLE `exoticcakes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `placedorder`
--
ALTER TABLE `placedorder`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
