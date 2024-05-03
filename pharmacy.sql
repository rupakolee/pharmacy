-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 08:53 AM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill`
-- (See below for the actual view)
--
CREATE TABLE `bill` (
);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(52) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `category` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `expiry` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `f_name` varchar(128) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `sex`, `f_name`, `l_name`, `address`, `contact`, `medicine_id`) VALUES
(19, NULL, 'Bepin', 'Adk', NULL, NULL, 52),
(20, NULL, 'Bepin', 'Adk', NULL, NULL, 55),
(21, NULL, 'Rupak', 'Olee', NULL, NULL, 56),
(22, NULL, 'Rupak', 'Olee', NULL, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `selling_quantity` int(11) NOT NULL,
  `selling_rate` int(11) NOT NULL,
  `selling_total` int(11) NOT NULL,
  `selling_date` date NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_no`, `selling_quantity`, `selling_rate`, `selling_total`, `selling_date`, `customer_id`, `medicine_id`) VALUES
(72, 947630, 10, 10, 100, '2024-04-29', 21, 56),
(73, 947630, 10, 1, 10, '2024-04-29', 21, 52);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `medicine_quantity` int(8) NOT NULL,
  `medicine_price` int(11) NOT NULL,
  `medicine_total` int(11) NOT NULL,
  `expiry` date NOT NULL,
  `purchase_date` date NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `category`, `medicine_quantity`, `medicine_price`, `medicine_total`, `expiry`, `purchase_date`, `vendor_id`) VALUES
(52, 'abc', 'Tablet', 180, 10, 4000, '2024-04-26', '2024-04-26', 1),
(54, 'abc', 'Tablet', 270, 10, 4000, '2024-04-28', '2024-04-27', 3),
(55, 'Efg', 'Syrup', 390, 10, 4000, '2024-05-04', '2024-04-28', 3),
(56, 'bcd', 'Syrup', 380, 10, 4000, '2024-05-11', '2024-04-29', 1),
(57, 'paracetamol', 'Tablet', 40, 10, 400, '2024-05-05', '2024-05-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `order_no` varchar(4) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `order_no`, `customer_name`, `medicine_name`, `quantity`, `date`, `status`) VALUES
(18, '5395', 'rupak', 'para', 99, '2024-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(8) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `pharmacyName` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(52) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `verification_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullName`, `pharmacyName`, `pass`, `email`, `phone`, `address`, `date`, `status`, `verification_code`) VALUES
(3, 'Rupak Olee', 'Rupak\'s Pharmacy', '1111', 'rupak@gmail.com', '9878987678', 'Basundhara, Kathmandu', '2024-03-14', 1, 0),
(12, 'Rupak Olee', 'Rock', '2222', 'oleerupak11@gmail.com', '9869585858', 'Kathmandu, Basundhara', '2024-03-27', 1, 463119),
(14, 'Rupak Olee', 'Nature Pharmacy', '2222', 'rupakolee@gmail.com', '9877687676', 'Kathmandu, Dhapasi', '2024-04-04', 1, 919415);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `address`, `contact`) VALUES
(1, 'ABC distributors', 'CHhetrapati', '9888888888'),
(3, 'Rupak Distributors', 'Basundhara', '9875421036');

-- --------------------------------------------------------

--
-- Structure for view `bill`
--
DROP TABLE IF EXISTS `bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill`  AS SELECT `invoice`.`id` AS `id`, `invoice`.`invoice_no` AS `invoice_no`, `invoice`.`customer_name` AS `customer_name`, `invoice`.`medicine_name` AS `medicine_name`, `invoice`.`quantity` AS `quantity`, `invoice`.`rate` AS `rate`, `invoice`.`total` AS `total`, `invoice`.`date` AS `date` FROM `invoice` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `medicine_id` (`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `medicine_id_2` (`medicine_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
