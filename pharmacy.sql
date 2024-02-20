-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:46 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `dob`, `sex`, `name`, `address`, `contact`) VALUES
(1, '2024-02-17', 'M', 'Rupak', 'Basundhara', '9888');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `medicine_name` varchar(128) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_name`, `medicine_name`, `quantity`, `rate`, `total`, `date`) VALUES
(1, 'Rupak', 'Paracetamol', 12, 100, 1200, '2024-02-16'),
(28, 'Bipin', 'Ascoril', 5, 10, 50, '2024-02-19'),
(33, 'Bipin', 'Ascoril-D', 10, 120, 1200, '2024-02-19'),
(34, 'Rupak', 'Ascoril', 10, 120, 1200, '2024-02-19'),
(35, 'Nishan', 'Petanfast', 10, 10, 100, '2024-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `quantity`, `price`, `date`) VALUES
(22, 'Paracetamol', 'Tablet', 10, 10, '2024-02-19');

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
  `phone` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullName`, `pharmacyName`, `pass`, `email`, `phone`) VALUES
(3, 'Rupak Olee', 'Rupak\'s P', '1111', 'rupak@gmail.com', '9878987678'),
(6, 'Bipin Adks', 'BA', '1234', 'ba@gmail.com', '1987987789');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `address`, `contact`) VALUES
(1, 'ABC distributors', 'CHhetrapati', '9888888888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
