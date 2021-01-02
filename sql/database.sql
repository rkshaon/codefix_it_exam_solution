-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 04:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1= standard, 2= premium',
  `joining_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `type`, `joining_date`, `updated_at`) VALUES
(1, 'Batman', 2, '2018-10-01 13:48:13', '2020-12-30 13:48:13'),
(2, 'Super Man', 2, '2017-01-18 13:48:13', '2020-12-30 13:48:13'),
(3, 'Spider-Man', 2, '2020-12-01 13:51:03', '2020-12-12 13:51:03'),
(4, 'Hulk', 1, '2020-05-11 13:51:03', '2020-12-30 13:51:03'),
(5, 'Daredevil', 1, '2020-12-01 13:52:08', '2020-12-30 13:52:08'),
(6, 'Wonder Woman', 1, '2020-12-01 13:52:08', '2020-12-30 13:52:08'),
(7, 'Hal Jordan', 1, '2020-12-01 13:53:31', '2020-12-30 13:53:31'),
(8, 'Wally West', 1, '2020-12-01 13:53:31', '2020-12-30 13:53:31'),
(9, 'Magneto', 2, '2020-08-11 13:55:45', '2020-12-16 13:55:45'),
(10, 'Joker', 2, '2020-12-01 13:55:45', '2020-12-30 13:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `customerpurchasedproduct`
--

CREATE TABLE `customerpurchasedproduct` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerpurchasedproduct`
--

INSERT INTO `customerpurchasedproduct` (`id`, `customer_id`, `product_id`, `created_at`) VALUES
(17, 1, 1, '2020-04-02 21:55:07'),
(18, 1, 2, '2020-10-08 21:55:07'),
(19, 2, 1, '2020-11-11 21:55:53'),
(20, 2, 2, '2020-10-08 21:55:53'),
(21, 3, 1, '2020-10-14 21:56:29'),
(22, 3, 3, '2020-09-01 21:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `customersalesproduct`
--

CREATE TABLE `customersalesproduct` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customersalesproduct`
--

INSERT INTO `customersalesproduct` (`id`, `customer_id`, `product_id`, `created_at`) VALUES
(62, 1, 1, '2020-11-03 21:57:06'),
(63, 1, 4, '2020-11-04 21:57:06'),
(64, 2, 1, '2020-10-08 21:57:24'),
(65, 2, 4, '2020-09-03 21:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'Gun', '150'),
(2, 'Boom', '300'),
(3, 'Car', '800'),
(4, 'Mobile', '900'),
(5, 'Computer', '12000'),
(6, 'TV', '600'),
(7, 'Card', '900'),
(8, 'Sweet', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerpurchasedproduct`
--
ALTER TABLE `customerpurchasedproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customersalesproduct`
--
ALTER TABLE `customersalesproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customerpurchasedproduct`
--
ALTER TABLE `customerpurchasedproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customersalesproduct`
--
ALTER TABLE `customersalesproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
