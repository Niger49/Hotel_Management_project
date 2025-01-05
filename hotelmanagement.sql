-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 01:47 PM
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
-- Database: `hotelmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `username`, `password`) VALUES
(10, 'Ania', '$2y$10$iCcD/TmVgp3tOTmet8kSauw64Ijf4hVzOO2EVSe61/6'),
(11, 'test', '$2y$10$W1d48mYZBDRsbV25Ukb5TO/Gm3TxpJegLRQgw3duG0u'),
(14, 'testagain', '$2y$10$.sLL/Ati7ptirQ0IT0.azOtvVBTriCk9P1EXJXgEDkI'),
(15, 't', '$2y$10$5AW7TQaNS8E3..1GqfLl7.MyLUwJfPHcSxf71gWHGjNcwnOMBp6ua'),
(16, 'Niger', '$2y$10$ajnF15zFWeSSrKlBSm2yX.6s/X4qEkWbEn8lws3v1voKMRF70fblS'),
(17, 'Niger', '$2y$10$VtopN.uHsgUFDH3m8X1Pfefh1t/Wws6HJJk.L4CSAfvtUBpzYLQrO');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type`, `price`, `status`) VALUES
(3, 'single', 2000, 'Available'),
(4, 'double', 4500, 'Available'),
(5, 'single', 5000, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
