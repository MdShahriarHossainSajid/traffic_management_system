-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 09:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `violation_details` text DEFAULT NULL,
  `fine` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `vehicle_number`, `vehicle_name`, `address`, `violation_details`, `fine`) VALUES
(12, '123123442', 'rjwf', 'rangpur', 'Running Red Light, No Parking', 20000.00),
(13, '4568789', 'rjwf', 'rangpur', 'No Parking, Reckless Driving, Driving Without License', 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `rank`) VALUES
(1, 'Sajid', 'sib7254313@gmail.com', '$2y$10$zMDiv1fXm06wvx2xxNPGP.vnYnssY/6tjxS/quFaQ8rH2yO/XkBwi', '01719707390', 'Sergeant'),
(4, 'Tanvir', 'jgeidjkl@gmail.com', '$2y$10$KC7SOx5GcKPy5wFoLDqVxuH00KniB1h/LW1i5mWuErMLUaN.9Gb5.', '043289409', 'Constable'),
(5, 'Shahiar Hossain Sajid', 'si725432569@gmail.com', '$2y$10$9smcV0WxGfoy2t9WlBQyIO1KQIeiGFh57uaIwxvCBnpDWSxny9Wri', '01719707390', 'Inspector'),
(6, 'Shahiar', 'sajid@gmail.com', '$2y$10$O5LBMBvDM0L.UH4S1VDiyectB61fQf1dQ/UIB.nva5.Y8PS/kNrOi', '01719707390', 'Inspector'),
(7, '429874', '3492@gmail.com', '$2y$10$/2ja3J9B6rApj0Uji1cctOT8FCfHZ7ufYXVsbiqhJshNXjb6GlvHO', 'vnsfdjgn', 'Constable'),
(8, 'test', 'test@gmail.com', '$2y$10$g.qqqlmX.0FAcdNOHqejWOcw0FnIL26n..a4ETw.df6xYAALcw9Hu', '343244', 'Sergeant');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_number`, `owner_name`, `model`) VALUES
(1, '12345', 'akash', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(11) NOT NULL,
  `violation_type` varchar(100) DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
