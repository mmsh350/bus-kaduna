-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `bus` varchar(30) NOT NULL,
  `transactionum` varchar(10) NOT NULL,
  `payable` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `setnumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `contact`, `address`, `bus`, `transactionum`, `payable`, `status`, `setnumber`) VALUES
(2, 'j', 'kjk', 'kjkj', 'kjk', '1', 'kd77mzfy', '400', 'Onboard', ''),
(3, 'p', 'p', 'p', 'p', '1', 'nidsyeyg', '400', 'Not Void', ''),
(4, 'k', 'k', 'k', 'k', '1', 'v53zohwk', '400', '', ''),
(5, 'k', 'k', 'k', 'k', '1', 's4xf7qkq', '400', '', '1, 2, 3, 4, 5, 6, 7, 8, 9, '),
(6, 'k', 'k', 'k', 'k', '1', 'fhk7qarc', '1600', '', '1, 2, 3, 4, '),
(7, 'John', 'Smith', '2345678', 'Saple Address', '1', 'h68u6ksu', '1200', 'Onboard', '1, 2, 3, '),
(8, 'John', 'Smith', '2345678', 'Saple Address', '5', 'vsuucxgy', '174', '', '1, 2, 3, '),
(9, 'bhnb', 'qfgvb', 'cvcvcv', 'cvcvc', '1', 'une5puyz', '400', 'Not Void', '1, ');

-- --------------------------------------------------------

--
-- Table structure for table `driverinfo`
--

CREATE TABLE `driverinfo` (
  `id` int(7) NOT NULL,
  `franchiseno` varchar(255) NOT NULL,
  `ownerId` int(7) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneno` varchar(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `franchiseno` varchar(255) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `plateno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vtype` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `vmodel` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `chasisno` varchar(255) NOT NULL,
  `acctno` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bvn` varchar(255) NOT NULL,
  `nname` varchar(255) NOT NULL,
  `nrel` varchar(255) NOT NULL,
  `documents` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `pay_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `franchiseno`, `ownername`, `plateno`, `email`, `password`, `vtype`, `phone`, `vmodel`, `address`, `chasisno`, `acctno`, `bankname`, `bvn`, `nname`, `nrel`, `documents`, `photo`, `fee`, `regdate`, `status`, `pay_status`) VALUES
(2, '1', 'Muhammad Sani Hamidu', 'KPL090999', 'sani.muhammad38@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '08103440497', 'K2010', 'Nigeria Immgration HQ', '3333JJKKNJJ333', '214408134', 'GTbank', '93888888888', 'Lukman Ibrahim', 'Friend', 'upload/0616187747.pdf', 'Nigerian_Defence_Academy_logo (1).png', '200000', '2023-05-14 13:24:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `franchiseno` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ownerid`, `franchiseno`, `amount`, `description`, `paytype`, `date`) VALUES
(17, 2, '1', '20000', 'Registration fee of 200,000.00 for Franchise Number:##KLT/00001', '(outward Card Payment)', '2023-05-14 13:32:20'),
(18, 2, '1', '200000', 'Registration fee of 200,000.00 for Franchise Number:##KLT/00001', '(inward Card Payment)', '2023-05-14 14:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `bus` varchar(11) NOT NULL,
  `seat_reserve` varchar(11) NOT NULL,
  `transactionnum` varchar(10) NOT NULL,
  `seat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `date`, `bus`, `seat_reserve`, `transactionnum`, `seat`) VALUES
(1, '2013-01-01', '1', '1', 'o8ey8p40', '1'),
(2, '2013-01-13', '1', '1', 'kd77mzfy', '1'),
(3, '2013-01-15', '1', '5', 'nidsyeyg', '1'),
(4, '2013-01-17', '1', '4', 'v53zohwk', '1'),
(5, '2013-01-16', '1', '9', 's4xf7qkq', '1, 2, 3, 4, 5, 6, 7, 8, 9, '),
(6, '2013-01-21', '1', '4', 'fhk7qarc', '1, 2, 3, 4, '),
(7, '10/12/2020', '1', '3', 'h68u6ksu', '1, 2, 3, '),
(8, '18/12/2020', '5', '3', 'vsuucxgy', '1, 2, 3, '),
(9, '30/04/2023', '1', '1', 'une5puyz', '1, ');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `route` varchar(300) NOT NULL,
  `price` varchar(30) NOT NULL,
  `numseats` int(30) NOT NULL,
  `type` varchar(300) NOT NULL,
  `time` time NOT NULL,
  `zone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route`, `price`, `numseats`, `type`, `time`, `zone`) VALUES
(1, 'Ilocos - Manila', '400', 5, 'Deluxe', '10:30:00', 'NC'),
(3, 'Manila Ilocos', '400', 50, 'Air Con', '12:30:00', 'NE'),
(4, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'NW'),
(6, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SS'),
(7, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SE'),
(8, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SW'),
(9, 'Ilocos - Manila', '400', 5, 'Deluxe', '10:30:00', 'NC'),
(10, 'Manila Ilocos', '400', 50, 'Air Con', '12:30:00', 'NE'),
(11, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'NW'),
(12, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SS'),
(13, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SE'),
(14, 'Manila-Alabang', '55', 20, 'Economy', '10:00:00', 'SW');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `registrationFee` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `name`, `registrationFee`) VALUES
(1, 'Sharon', '200000'),
(2, 'Hummer Bus 1', '300000'),
(3, 'Hummer Bus 2', '400000'),
(4, 'Hummer Bus 3', '400000'),
(5, 'Coaster Bus', '500000'),
(6, 'Luxurious 1', '500000'),
(7, 'Luxious Bus 2', '700000'),
(8, 'Luxious Bus 3', '700000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
