-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2025 at 03:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(100) NOT NULL,
  `admin_lastname` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_date_loggedIn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_password`, `admin_date_loggedIn`) VALUES
(1, 'admin', 'admin', 'admin@motor.com', '$2y$10$PSdFnnNtmLMnFaD8pxVqCOxm29P8goHlf0iOLKarwvUNMYrQy5lke', '2024-11-29'),
(2, '', '', '', '', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_routeid` int(11) NOT NULL,
  `booking_custid` int(11) NOT NULL,
  `booking_busid` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_routeid`, `booking_custid`, `booking_busid`, `booking_date`) VALUES
(1, 2, 17, 2, '2025-01-07'),
(2, 1, 17, 4, '2025-01-07'),
(3, 1, 17, 4, '2025-01-07'),
(4, 3, 17, 1, '2025-01-07'),
(5, 3, 17, 1, '2025-01-07'),
(6, 4, 17, 3, '2025-01-07'),
(7, 4, 17, 3, '2025-01-07'),
(8, 4, 17, 3, '2025-01-07'),
(9, 4, 17, 3, '2025-01-07'),
(10, 4, 17, 3, '2025-01-07'),
(11, 4, 17, 3, '2025-01-07'),
(12, 4, 17, 3, '2025-01-07'),
(13, 4, 17, 3, '2025-01-07'),
(14, 4, 17, 3, '2025-01-07'),
(15, 4, 17, 3, '2025-01-07'),
(16, 4, 17, 3, '2025-01-07'),
(17, 4, 17, 3, '2025-01-07'),
(18, 4, 17, 3, '2025-01-07'),
(19, 4, 17, 3, '2025-01-07'),
(20, 4, 17, 3, '2025-01-07'),
(21, 1, 17, 4, '2025-01-07'),
(22, 5, 17, 5, '2025-01-07'),
(23, 1, 17, 4, '2025-01-07'),
(24, 1, 17, 4, '2025-01-07'),
(25, 2, 17, 2, '2025-01-07'),
(26, 1, 17, 4, '2025-01-09'),
(27, 1, 17, 4, '2025-01-10'),
(28, 1, 17, 4, '2025-01-09'),
(29, 1, 17, 4, '2025-01-18'),
(30, 3, 17, 1, '2025-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `bus_driver` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `bus_pic` varchar(255) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bus_state_id` int(11) NOT NULL,
  `date_avail` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`, `capacity`, `bus_driver`, `license`, `bus_pic`, `route_id`, `bus_state_id`, `date_avail`) VALUES
(1, 'Toyota (Business Class Executive) hiace | AC | Edo', 14, 'Dongo Ojo', 'ABC-1234', '67704bcef3351.png', 3, 12, '2024-12-28 20:04:46'),
(2, 'Toyota (Economy Class Executive) hiace | AC | Uyo', 14, 'Ladan Boso', 'EDF-2234', '6773e0b563021.png', 2, 9, '2024-12-31 13:16:53'),
(3, 'Toyota (Business Class Executive) hiace | Delta', 14, 'Adam Adam', 'ABC-235', '6773fb6560090.png', 4, 10, '2024-12-31 15:10:45'),
(4, 'Hiace (Economy) | Kogi | Yaba', 12, 'Mr Yusuf', 'KGH-120', '677694031295b.png', 5, 22, '2025-01-02 14:26:27'),
(5, 'Hiace (Business) | Kogi | Yaba', 14, 'Blessing Daju', 'KGH-124', '6776a8ca320e8.png', 5, 22, '2025-01-02 15:55:06'),
(8, 'Toyota (Business Class Executive) hiace | AC | Calabar', 14, 'Akpan Udoh', 'CRS-123', '6776af47d1654.png', 3, 9, '2025-01-02 16:22:47'),
(9, 'Toyota (Business Class Executive) hiace | AC | Kogi | Ajah', 14, 'Adamu Ejoh', 'KGH - 225', '677c20087a691.png', 1, 22, '2025-01-06 19:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_firstname` varchar(50) NOT NULL,
  `cust_lastname` varchar(50) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_dob` date DEFAULT NULL,
  `cust_phone` varchar(50) DEFAULT NULL,
  `cust_gender` enum('male','female') DEFAULT NULL,
  `cust_password` varchar(255) NOT NULL,
  `cust_next_of_kin` varchar(50) DEFAULT NULL,
  `cust_next_of_kin_phone` varchar(50) DEFAULT NULL,
  `cust_date_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_firstname`, `cust_lastname`, `cust_email`, `cust_dob`, `cust_phone`, `cust_gender`, `cust_password`, `cust_next_of_kin`, `cust_next_of_kin_phone`, `cust_date_reg`) VALUES
(3, 'Abacha', 'Sani', 'abacha@aol.com', '1998-01-07', '9837263', 'male', '$2y$10$sG5IBHTJkqulWmyL2skzTOQL/JPFe93sw7MbFF2NptnLm4jgFO7/2', 'Sanni Rabiu', '11111', '2024-12-14'),
(17, 'Sylvester', 'Mbudiche', 'sbelisconi@gmail.com', NULL, NULL, NULL, '$2y$10$y1eA2qngFGAmJSxmvvoIfuNaXyvJt86JacxUbCAGAc50MYgwtMkAm', NULL, NULL, '2025-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_cusid` int(11) NOT NULL,
  `payment_custemail` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_bookingid` int(11) NOT NULL,
  `payment_refno` varchar(255) NOT NULL,
  `payment_status` enum('pending','failed','completed') NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_cusid`, `payment_custemail`, `amount`, `payment_bookingid`, `payment_refno`, `payment_status`, `payment_date`) VALUES
(1, 17, 'sbelisconi@gmail.com', 38000.00, 1, 'IMP1736128662966435558', 'completed', '2025-01-06 01:57:49'),
(2, 17, 'sbelisconi@gmail.com', 28000.00, 3, 'IMP17361289101661526310', 'completed', '2025-01-06 02:01:58'),
(3, 17, 'sbelisconi@gmail.com', 28000.00, 21, 'IMP17361845372054947592', 'completed', '2025-01-06 17:29:03'),
(4, 17, 'sbelisconi@gmail.com', 28000.00, 24, 'IMP17361880331760750790', 'completed', '2025-01-06 18:27:16'),
(5, 17, 'sbelisconi@gmail.com', 28000.00, 29, 'IMP1736302469931670213', 'completed', '2025-01-08 02:14:31'),
(6, 17, 'sbelisconi@gmail.com', 30000.00, 30, 'IMP17363027771649892483', 'completed', '2025-01-08 02:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `route_busid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`, `terminal_id`, `to_state_id`, `price`, `route_busid`) VALUES
(1, 'Ajah to Kogi', 1, 22, 28000, 4),
(2, 'Yaba to Uyo', 1, 3, 38000, 2),
(3, 'Ajah to Calabar', 1, 9, 30000, 1),
(4, 'Ajah to Delta', 1, 10, 20000, 3),
(5, 'Yaba to Kogi', 2, 22, 25000, 5),
(6, 'Yaba to Benin', 2, 12, 24000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(80) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nassarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'Abuje (FCT)'),
(38, 'Foreign');

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `terminal_id` int(11) NOT NULL,
  `terminal_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`terminal_id`, `terminal_name`) VALUES
(1, 'Lagos (Ajah)'),
(2, 'Lagos (Yaba)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_routeId` (`booking_routeid`,`booking_custid`,`booking_busid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pay_bis` (`payment_cusid`),
  ADD KEY `payment_cusid` (`payment_cusid`),
  ADD KEY `payment_bookingid` (`payment_bookingid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `to_state_id` (`to_state_id`) USING BTREE,
  ADD KEY `route_busid` (`route_busid`),
  ADD KEY `terminal_id` (`terminal_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`terminal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `terminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
