-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 09:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch_planet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pass` longtext NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `last_name`, `email`, `pass`, `status`) VALUES
(1, 'Omar', 'Gonzalez', 'omargonzalez@gmail.com', '$2y$10$oUQWtdPZaBA7E.BtcKPvPO91De534GRZQA6q1uvqSVNwhqRptN6Ye', 'active'),
(2, 'Alan', 'Rivera', 'alanrivera@gmail.com', '$2y$10$s5ss4hi759MWxJzM7pQCFetzSt5LQJ9LL3Wnq3Zos7NQ9wfBDCZAu', 'active'),
(3, 'Christian', 'Tirado', 'christian.tirado2@upr.edu', '$2y$10$ouCGE4qapNS/Z1mlkqLx.O1tqj6.P1PZAnieSJOhZL7dX1wolYtIS', 'active'),
(4, 'Aixa', 'Ramirez', 'aixa.ramirez@upr.edu', '$2y$10$ftNnAw8yfWuBfsTvpxQqH.LNFbR5yLlmvqZprjogc2.77d8DcQUZ2', 'active'),
(5, 'Eliana', 'Valenzuela', 'eliana.valenzuela@upr.edu', '$2y$10$2cgj2GDy5IFSojCrkvE8AuKrhjVLYPT17JcMzeMTADSOKy14QAOce', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address_line1` varchar(40) DEFAULT NULL,
  `address_line2` varchar(40) DEFAULT NULL,
  `city` tinytext NOT NULL,
  `country` tinytext NOT NULL,
  `zip` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `user_id`, `phone_number`, `address_line1`, `address_line2`, `city`, `country`, `zip`) VALUES
(3, 5, '787-787-7878', 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612'),
(4, 5, '787-787-7878', 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612'),
(5, 5, '787-787-7878', '	 Carr. 653 Km. 0.8 Sector Las Dunas, Ar', '', 'Arecibo', 'Puerto Rico', '00612'),
(6, 5, '787-787-7878', 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventory_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `watch_id`, `quantity`, `inventory_date`) VALUES
(1, 1, 5, '2020-02-14'),
(2, 2, 10, '2020-02-14'),
(3, 1, 5, '2020-02-15'),
(4, 2, 10, '2020-02-15'),
(5, 1, 5, '2020-02-16'),
(6, 2, 10, '2020-02-16'),
(7, 2, 20, '2020-02-17'),
(8, 2, 20, '2020-02-29'),
(9, 2, 20, '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `order_id`) VALUES
(15, 93),
(16, 94),
(17, 95),
(18, 96);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detailId` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_detailId`, `order_id`, `watch_id`, `quantity`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 5),
(3, 2, 1, 15),
(4, 3, 2, 2),
(5, 4, 1, 50),
(6, 4, 2, 30),
(7, 16, 2, 2),
(8, 17, 1, 50),
(9, 18, 2, 30),
(10, 13, 2, 2),
(11, 14, 1, 50),
(12, 15, 2, 30),
(13, 10, 2, 2),
(14, 11, 1, 50),
(15, 12, 2, 30),
(16, 7, 2, 2),
(17, 8, 1, 30),
(18, 9, 2, 60),
(19, 4, 2, 2),
(20, 5, 1, 50),
(21, 6, 2, 30),
(22, 1, 1, 10),
(23, 2, 2, 5),
(24, 3, 1, 15),
(25, 1, 1, 10),
(26, 2, 2, 5),
(27, 3, 1, 15),
(28, 23, 1, 10),
(29, 24, 2, 5),
(30, 25, 1, 15),
(103, 93, 2, 3),
(104, 93, 3, 2),
(105, 94, 3, 1),
(106, 95, 1, 1),
(107, 95, 2, 1),
(108, 96, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`) VALUES
(1, 1, '2020-02-14'),
(2, 1, '2020-02-14'),
(3, 1, '2020-02-14'),
(4, 2, '2020-02-18'),
(5, 3, '2020-03-13'),
(6, 4, '2020-03-20'),
(7, 5, '2020-03-26'),
(8, 1, '2020-06-14'),
(9, 2, '2020-06-15'),
(10, 1, '2020-06-16'),
(11, 1, '2020-05-14'),
(12, 2, '2020-05-15'),
(13, 1, '2020-05-16'),
(14, 1, '2020-04-14'),
(15, 2, '2020-04-15'),
(16, 1, '2020-04-16'),
(17, 4, '2020-03-20'),
(18, 5, '2020-03-26'),
(19, 1, '2020-02-14'),
(20, 1, '2020-02-14'),
(21, 1, '2020-02-14'),
(22, 2, '2020-02-18'),
(23, 1, '2020-01-14'),
(24, 2, '2020-01-15'),
(25, 1, '2020-01-16'),
(26, 1, '2020-01-14'),
(27, 2, '2020-01-15'),
(28, 1, '2020-01-16'),
(93, 5, '2020-03-25'),
(94, 5, '2020-03-26'),
(95, 5, '2020-03-27'),
(96, 5, '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `order_id`, `watch_id`, `quantity`, `return_date`) VALUES
(1, 3, 1, 2, '2020-02-14'),
(2, 2, 2, 4, '2020-02-14'),
(3, 4, 1, 6, '2020-02-18'),
(4, 1, 2, 8, '2020-02-20'),
(5, 6, 1, 10, '2020-03-10'),
(6, 7, 2, 12, '2020-03-26'),
(7, 2, 2, 4, '2020-02-15'),
(8, 2, 2, 4, '2020-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ship_address_line1` varchar(40) NOT NULL,
  `ship_address_line2` varchar(40) DEFAULT NULL,
  `ship_city` varchar(20) NOT NULL,
  `ship_country` varchar(20) NOT NULL,
  `ship_zip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `order_id`, `ship_address_line1`, `ship_address_line2`, `ship_city`, `ship_country`, `ship_zip`) VALUES
(3, 5, 93, 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612'),
(4, 5, 94, 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612'),
(5, 5, 95, '	 Carr. 653 Km. 0.8 Sector Las Dunas, Ar', '', 'Arecibo', 'Puerto Rico', '00612'),
(6, 5, 96, 'Carr. 653 Km. 0.8 Sector Las Dunas, Arec', '', 'Arecibo', 'Puerto Rico', '00612');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pass` longtext NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `pass`, `status`) VALUES
(1, 'Omar', 'Gonzalez', 'omargonzalez@gmail.com', '$2y$10$uPM7Lcr3xa4M/VQ6mFVE8.Z2mTnOlSCJuNOrZuNq5vDvqaucA0CcO', 'active'),
(2, 'Alan', 'Rivera', 'alanrivera@gmail.com', '$2y$10$O76Ujg5m02te0mdeZwEYMO1w917uosPEnFy3chiGACpl37xBRoX6C', 'suspended'),
(3, 'Christian', 'Tirado', 'christiantirado@gmail.com', '$2y$10$amYmhc0EixFMi3i8/oSvzuIH95CbFLRxMc5bD2EIGmSH3gX9G2foO', 'active'),
(4, 'Cristian', 'Fuentes', 'cristianfuentes@gmail.com', '$2y$10$qXNWA.a3H2aQZoa44O/Ux.4oDdp5KVx6k9xl9d1vxwm5Z2GzKV0eO', 'active'),
(5, 'Eliana', 'Valenzuela', 'eliana.valenzuela@upr.edu', '$2y$10$GBLDB4vhVexA3ib8vmrvquw861eXOIpIQAUoT7.P/nkQslyczNoJu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `ID` int(11) NOT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `material` varchar(30) DEFAULT NULL,
  `band` varchar(15) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` int(11) NOT NULL,
  `brand` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `type` tinytext NOT NULL,
  `material` tinytext NOT NULL,
  `band` tinytext NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` tinytext NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `brand`, `name`, `type`, `material`, `band`, `quantity`, `cost`, `price`, `status`, `description`, `image`) VALUES
(1, 'Omega', 'Speedmaster', 'Analog', 'Metal', 'Leather', 7, '6389.00', '8649.00', 'active', 'The OMEGA Speedmaster Professional Chronograph has a unique place in the history of space exploration as the only piece of equipment used in all of NASA’s piloted space missions from Gemini to the current International Space Station program. When Buzz Aldrin stepped on the lunar surface in 1969, he was wearing a Speedmaster Professional, the chronograph that has been known as the Moonwatch ever since.', 'img/watch-images/Men/Leather/omega_speedmaster.png'),
(2, 'Fossil', 'Townsman', 'Analog', 'Metal', 'Leather', 16, '150.00', '249.00', 'active', 'Grant your look a dashing accent with the Fossil® Townsman watch. Stainless steel case. Mesh-link stainless steel strap with fold-over push-button closure. Round face. Three-hand analog display with quartz movement. Dial features colorful hands and stainless steel hour markers, two subdials, minute track, and Fossil detailing. Chronograph functionality. Water resistant up to 5 ATM. Display case included. Imported. Measurements: Case Height: 44 mm Case Width: 44 mm Case Depth: 12 mm Band Width: 22 mm Band Circumference/Length: 9 1⁄4 in Weight: 4.5 oz', 'img/watch-images/Men/Leather/fossil_townsman.jfif'),
(3, 'Vincero', 'Chrono', 'Analog', 'Metal', 'Leather', 4, '130.00', '169.00', 'active', 'The Chrono S is our calling card and it will never let you down. Made for serious business this watch will make you feel like you’re in charge.', 'img/watch-images/Men/Leather/vincero_chrono.jpg'),
(4, 'Rolex', 'Karma', 'analog', 'metal', 'metal', 45, '6000.00', '24000.00', 'active', 'The Rolex Karma is our calling card and it will never let you down. Made for serious business this watch will make you feel like you’re in charge.', 'mg/watch-images/Men/Leather/rolex_karma.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detailId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
