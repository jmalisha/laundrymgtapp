-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 11:02 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundrydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `email`, `phone`, `password`) VALUES
(1, 'malisha', 'jmalisha22@gmail.com', 712345678, '$2y$10$SEVk5m1VJeazHVOqj9UQKezNSiWdVOdJSr7su.CP/B0qspingOBDK'),
(2, 'admin', 'admin@gmail.com', 762630576, '$2y$10$hzRMNn4nJSvDoBILUDxZY.XE71Xcydy.7wWevSEXshJ304UhaD/Q2'),
(3, 'superadmin', 'admin@admin.com', 714216057, '$2y$10$a8wfmVpm6V/U18mtG/eRHO75b85IAWt.WA/iLZ6JVvbyHepBs5GF6');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `laundrycompleted` int(20) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `username`, `email`, `phone`, `password`, `laundrycompleted`, `user_level`) VALUES
(3, 'malisha', 'jmalisha22@gmail.com', 712345678, '$2y$10$L5rGmzNu5dorbatZhqtsqO/l4cOda7ej.OqBxxnEPhXODvUH/1QfW', 0, 0),
(4, 'rob', 'rob@rob.com', 745328976, '$2y$10$490hVA8jynYEDSvTt1BRj.3pvMpNwLcjn/hw/rX/0rkTrdOccMGcy', 3, 0),
(5, 'joyce', 'jmalisha22@gmail.com', 712345678, '$2y$10$zjOIvDRZct55CfJXyPF/6e/BLj6k72b6B5BjxMiTkgYTV/bo3G8KG', 0, 0),
(6, 'guyo', 'guyo@gmail.com', 712345678, '$2y$10$RQ4dpz0hFwXeSJTUW6IH7OQzbq6A6SLO9MdVYxM10gUBdJdewnEZa', 2, 0),
(7, 'jose', 'jose@gmail.com', 712345678, '$2y$10$AITMfraXfc.2KqMLGWSPCeFztZ6YO1/bSXWtFls5IT58DhydyeYb6', 0, 0),
(8, 'shukure', 'shuks@gmail.com', 723457689, '$2y$10$a6YS0FuCnXXrWpxBDfS63OxjKJ8EqotxAnow8QiSclPbv0ymKB18.', 1, 0),
(9, 'admin', 'admin@gmail.com', 712345678, '$2y$10$L5rGmzNu5dorbatZhqtsqO/l4cOda7ej.OqBxxnEPhXODvUH/1QfW', 0, 1),
(10, 'johnalex', 'jalex@gmail.com', 714216057, '$2y$10$C8pFlfyPH1hLp8NadqRvPu6Gy8Bhcm2hiy7s4hTMHHo8G03tRCDOy', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `laundryID` int(11) NOT NULL,
  `laundrystatus` varchar(20) NOT NULL,
  `clientID` varchar(20) NOT NULL,
  `adminID` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`laundryID`, `laundrystatus`, `clientID`, `adminID`, `description`, `date`, `quantity`) VALUES
(1, 'complete', '4', '1', 'shirt', '2020-05-31 07:36:29', 0),
(2, 'complete', '4', '1', 'blanket, duvet, sheets, trousers, bedcover', '2020-05-31 07:40:44', 0),
(3, 'in progress', '3', '1', 'dira 50, duvet 5, bedsheet 100', '2020-05-31 07:43:46', 0),
(4, 'complete', '6', '1', 'shirts, trousers, bed sheets.', '2020-05-31 14:03:32', 0),
(5, 'complete', '8', '1', 'shirts 30, trousers 10', '2020-06-04 10:09:12', 0),
(6, 'in progress', '4', '1', 'jnscmwl,d', '2020-07-27 04:07:32', 0),
(7, 'in progress', '8', '1', 'hjb', '2020-07-27 04:29:36', 0),
(8, 'complete', '4', '1', '3shirts, 2 trousers, 1 duvet, 2 bedsheets.', '2020-08-11 06:08:12', 0),
(9, 'complete', '4', '1', '3shirts, 2 trousers, 1 duvet, 2 bedsheets.', '2020-08-27 14:41:05', 0),
(10, 'complete', '6', '2', 'duvet', '2020-08-24 07:30:02', 0),
(11, 'complete', '10', '3', 'shirt 2', '2020-08-27 14:41:01', 0),
(12, 'in progress', '10', '3', 'JEANS', '2020-08-29 02:23:29', 0),
(25, 'in progress', '10', '3', 'shirt', '2020-08-30 02:36:39', 1),
(26, 'in progress', '10', '3', 'jeans', '2020-08-30 02:39:25', 2),
(27, 'in progress', '5', '3', 'shirt', '2020-09-01 07:06:55', 1),
(28, 'in progress', '10', '3', 'jeans', '2020-09-02 07:58:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `Shotcode` int(7) NOT NULL,
  `amount` int(11) NOT NULL,
  `username` varchar(26) NOT NULL,
  `TransID` int(10) NOT NULL,
  `Transdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Shotcode`, `amount`, `username`, `TransID`, `Transdate`) VALUES
(1, 600754, 100, 'superadmin', 0, '0000-00-00 00:00:00'),
(2, 600754, 100, 'superadmin', 0, '0000-00-00 00:00:00'),
(3, 600754, 100, 'superadmin', 0, '0000-00-00 00:00:00'),
(4, 600754, 100, 'alecoa', 0, '0000-00-00 00:00:00'),
(5, 600754, 10, 'superadmin', 0, '0000-00-00 00:00:00'),
(6, 600754, 10, 'superadmin', 0, '0000-00-00 00:00:00'),
(7, 600754, 10, 'superadmin', 0, '0000-00-00 00:00:00'),
(8, 600754, 100, 'superadmin', 10, '0000-00-00 00:00:00'),
(9, 600754, 100, 'superadmin', 0, '0000-00-00 00:00:00'),
(10, 600754, 10, 'superadmin', 10, '0000-00-00 00:00:00'),
(11, 600754, 10, 'superadmin', 0, '0000-00-00 00:00:00'),
(12, 600754, 100, 'superadmin', 0, '0000-00-00 00:00:00'),
(13, 600754, 100, 'alecoa', 0, '0000-00-00 00:00:00'),
(14, 600754, 10, 'alecoa', 0, '0000-00-00 00:00:00'),
(15, 600754, 10, 'superadmin', 0, '2020-09-02 15:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(10) NOT NULL,
  `description` varchar(60) NOT NULL,
  `quantity` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `adminID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `description`, `quantity`, `Price`, `adminID`) VALUES
(1, 'Bed sheets', 2, 150, 0),
(2, 'Shirt', 1, 100, 0),
(3, 'jeans', 1, 100, 0),
(9, 'duvet', 1, 400, 3),
(12, 't shirt', 1, 70, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`laundryID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `laundryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
