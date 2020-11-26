-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2020 at 10:28 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile_tuning`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` int(11) NOT NULL,
  `registration_num` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `mileage` int(9) NOT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` int(4) DEFAULT NULL,
  `mass` int(6) DEFAULT NULL,
  `braking_distance` int(3) DEFAULT NULL,
  `tire_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `registration_num`, `oem`, `model`, `type`, `age`, `mileage`, `color`, `power`, `mass`, `braking_distance`, `tire_type`) VALUES
(1, '1', 'Kawasaki', 'Ninja', 'sport bike', 0, 150, 'grey-yellow', 204, 164, 31, 'summer tires'),
(4, 'XH9T', 'Harley Davidson', 'Model1', 'cruiser', 0, 0, 'black', 89, 300, 45, 'summer tires'),
(5, 'PMF6', 'Ducati', 'dufhsdof', 'sports bike', 0, 0, 'Red', 10000, 0, 1, 'summer tires'),
(14, 'I2IW', 'item to delete', 'odsfodsf', 'scooter', 4, 4, 'joho', 5, 2, 2, 'summer tires');

-- --------------------------------------------------------

--
-- Table structure for table `bike_workshops`
--

CREATE TABLE `bike_workshops` (
  `id` int(11) NOT NULL,
  `type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employees_num` int(3) NOT NULL,
  `owner` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bike_workshops`
--

INSERT INTO `bike_workshops` (`id`, `type`, `name`, `address`, `employees_num`, `owner`) VALUES
(1, 'Bike Workshop', 'Craftwerk Berlin', 'Berlin', 10, 'Max Mustermann');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(9) NOT NULL,
  `registration_num` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats_num` int(2) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `mileage` int(9) DEFAULT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `power` int(4) DEFAULT NULL,
  `mass` int(6) DEFAULT NULL,
  `tire_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `registration_num`, `oem`, `model`, `type`, `seats_num`, `age`, `mileage`, `color`, `power`, `mass`, `tire_type`) VALUES
(49, 'RFG3XO', 'Audi', 'S5', 'coupe', 2, 3, 186030, 'deep ocean', 380, 1750, 'winter tires'),
(53, 'GQJVXQ', 'Nissan', 'Murano', 'SUV', 4, 2, 80000, 'bronze', 249, 2800, 'winter tires'),
(54, '5UPF4F', 'Nissan', 'Quashquai', 'SUV', 4, 2, 20000, 'metalic blue', 144, 2400, 'winter tires'),
(55, 'PDT2UP', 'Volvo', 'XC79', 'avant', 4, 13, 270000, 'black', 186, 2500, 'winter tires'),
(57, 'PT6I6W', 'Toyota', 'Camry', 'sedan', 4, 0, 0, 'silber', 249, 2200, 'summer tires'),
(94, '9SCA0R', 'test', 'test', 'sedan', 4, 5, 5, 'pink', 85, 5, 'winter tires'),
(95, '2KQMM5', 'item to delete', 'test', 'sedan', 4, 1, 1, 'test', 1, 1, 'summer tires');

-- --------------------------------------------------------

--
-- Table structure for table `car_workshops`
--

CREATE TABLE `car_workshops` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employees_num` int(2) NOT NULL,
  `owner` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_lift_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_workshops`
--

INSERT INTO `car_workshops` (`id`, `type`, `name`, `address`, `employees_num`, `owner`, `car_lift_num`) VALUES
(1, 'Sport Car Workshop', 'West Coast Customs', 'LA California', 15, 'Xzibit', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_workshops`
--
ALTER TABLE `bike_workshops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_workshops`
--
ALTER TABLE `car_workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bike_workshops`
--
ALTER TABLE `bike_workshops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `car_workshops`
--
ALTER TABLE `car_workshops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
