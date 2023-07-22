-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 12:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `deductions` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `balance`, `deductions`, `income`) VALUES
(1, '854000', '54000', '950000');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `photo`, `name`) VALUES
(1, 'admin', 'admin', 'admin.png', 'Administrator');

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
  `setnumber` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `ddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `contact`, `address`, `bus`, `transactionum`, `payable`, `status`, `setnumber`, `date`, `ddate`) VALUES
(9, 'Muhammad', 'Hamidu', '060254544512', 'Kuje Abuja', '1', 't0h3apkk', '30000', '', '1, 2, ', '2023-07-22', '2023-07-23'),
(10, 'Muhammad', 'Hamidu', '07069857485', 'Kuje Abuja', '2', '3oowqb6k', '30000', '', '1, 2, ', '2023-07-22', '2023-07-23'),
(11, 'Muhammad', 'Hamidu', '08103522200', 'Kuje Abuja', '2', 'kw6zn33h', '30000', '', '1, ', '2023-07-22', '2023-07-24'),
(12, 'Abbas Ibrahim', 'kaduna', '08056245896', 'OZALLA NKAW WEST LOCAL GOVERNMENT AREA ENUGU', '2', 'vhdbiocz', '30000', '', '2, ', '2023-07-22', '2023-07-24');

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
  `photo` varchar(255) NOT NULL,
  `dreg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driverinfo`
--

INSERT INTO `driverinfo` (`id`, `franchiseno`, `ownerId`, `name`, `address`, `phoneno`, `photo`, `dreg`, `status`) VALUES
(1, '1', 1, 'Oyindamola Peter', 'No 26. Sheikh Abdulazeez Olalere Street', '08103440491', 'istockphoto-1264589335-612x612.jpg', '2023-07-21 21:11:22', 1),
(2, '2', 2, 'Oyindamola', 'No 26. Sheikh Abdulazeez Olalere Street', '08980000000', 'istockphoto-1264589335-612x612.jpg', '2023-07-22 01:38:45', 1);

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
  `nphone` varchar(11) NOT NULL,
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

INSERT INTO `owner` (`id`, `franchiseno`, `ownername`, `plateno`, `email`, `password`, `vtype`, `phone`, `vmodel`, `address`, `chasisno`, `acctno`, `bankname`, `bvn`, `nname`, `nrel`, `nphone`, `documents`, `photo`, `fee`, `regdate`, `status`, `pay_status`) VALUES
(1, '1', 'Alh. Ibrahim Ismail', 'GWA-294NV', 'ibrahim@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '09060012212', 'SHARON 200', 'No 26. Sheikh Abdulazeez Olalere Street', 'SV30-0169266', '1235488200', 'UBA', '22403285950', 'Abba Ibrahim', 'Brother', '06032552222', 'upload/proposal.pdf', 'ibrahimismail.jpg', '300000', '2023-07-21 21:23:34', 1, 1),
(2, '2', 'Muhammad Hamidu', 'PLSHS4100', 'sani.muhammad38@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '6', '08103440497', 'SAXSAS55', 'Kuje Abuja', 'SAXASX55', '2116552144', 'UBA', '2558256555', 'Muhd', 'Brother', '08202522222', 'upload/download.jpg', 'download.jpg', '500000', '2023-07-22 01:43:51', 1, 1);

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
  `status` varchar(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ownerid`, `franchiseno`, `amount`, `description`, `paytype`, `status`, `date`) VALUES
(8, 1, '1', '300000', 'Registration fee of 300,000.00 for Franchise Number:##KLT/00001', '(outward Payment - Card )', 'out', '2023-07-22 02:36:36'),
(9, 2, '2', '500000', 'Registration fee of 500,000.00 for Franchise Number:##KLT/00002', '(outward Payment - Card )', 'out', '2023-07-22 02:37:07'),
(11, 1, '1', '22000', 'Payment for Trip from #Kaduna - Sokoto : Deluxe  on 23-07-2023', '(inward Payment - Transfer )', 'in', '2023-07-22 03:11:25'),
(12, 2, '2', '23000', 'Payment for Trip from #Kaduna - Sokoto : Deluxe  on 23-07-2023', '(inward Payment - Transfer )', 'in', '2023-07-22 03:11:37'),
(13, 2, '2', '33000', 'Payment for Trip from #Kaduna - Gumel : Economy  on 24-07-2023', '(inward Payment - POS/Others )', 'in', '2023-07-22 03:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_flow`
--

CREATE TABLE `payment_flow` (
  `id` int(11) NOT NULL,
  `rfrom` varchar(255) NOT NULL,
  `ddescription` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pmethod` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ddate` date NOT NULL DEFAULT current_timestamp(),
  `tfare` varchar(255) NOT NULL,
  `ddeductions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_flow`
--

INSERT INTO `payment_flow` (`id`, `rfrom`, `ddescription`, `amount`, `pmethod`, `status`, `ddate`, `tfare`, `ddeductions`) VALUES
(12, 'Alh. Ibrahim Ismail FRNO:KLT/00001', 'Registration fee of 300,000.00 for Franchise Number:##KLT/00001', '300000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(13, 'Muhammad Hamidu FRNO:KLT/00002', 'Registration fee of 500,000.00 for Franchise Number:##KLT/00002', '500000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(14, 'Received from::(Muhammad Hamidu)', 'Payment for ticket Fee from Kaduna - Sokoto Bus No:KLT/00001', '15000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(15, 'Received from::(Muhammad Hamidu)', 'Payment for ticket Fee from Kaduna - Sokoto Bus No:KLT/00001', '15000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(16, 'Paid to Alh. Ibrahim Ismail #KLT/00001', 'Payment for Trip from #Kaduna - Sokoto : Deluxe  on 23-07-2023', '18000', '(outward Payment - Cash )', 'out', '2023-07-22', '30000', '12000'),
(17, 'Received from::(Muhammad Hamidu)', 'Payment for ticket Fee from Kaduna - Sokoto Bus No:KLT/00001', '30000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(18, 'Received from::(Muhammad Hamidu)', 'Payment for ticket Fee from Kaduna - Sokoto Bus No:KLT/00002', '30000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(19, 'Received from::(Muhammad Hamidu)', 'Payment for ticket Fee from Kaduna - Gumel Bus No:KLT/00002', '30000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(20, 'Received from::(Abbas Ibrahim kaduna)', 'Payment for ticket Fee from Kaduna - Gumel Bus No:KLT/00002', '30000', '(inward Payment - Card )', 'in', '2023-07-22', '', ''),
(21, 'Paid to Alh. Ibrahim Ismail #KLT/00001', 'Payment for Trip from #Kaduna - Sokoto : Deluxe  on 23-07-2023', '22000', '(outward Payment - Transfer )', 'out', '2023-07-22', '30000', '8000'),
(22, 'Paid to Muhammad Hamidu #KLT/00002', 'Payment for Trip from #Kaduna - Sokoto : Deluxe  on 23-07-2023', '23000', '(outward Payment - Transfer )', 'out', '2023-07-22', '30000', '7000'),
(23, 'Paid to Muhammad Hamidu #KLT/00002', 'Payment for Trip from #Kaduna - Gumel : Economy  on 24-07-2023', '33000', '(outward Payment - POS/Others )', 'out', '2023-07-22', '60000', '27000');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bus` varchar(11) NOT NULL,
  `seat_reserve` varchar(11) NOT NULL,
  `transactionnum` varchar(10) NOT NULL,
  `seat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `date`, `bus`, `seat_reserve`, `transactionnum`, `seat`) VALUES
(9, '2023-07-23', '1', '2', 't0h3apkk', '1, 2, '),
(10, '2023-07-23', '2', '2', '3oowqb6k', '1, 2, '),
(11, '2023-07-24', '2', '1', 'kw6zn33h', '1, '),
(12, '2023-07-24', '2', '1', 'vhdbiocz', '2, ');

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
  `zone` varchar(15) NOT NULL,
  `dreg` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route`, `price`, `numseats`, `type`, `time`, `zone`, `dreg`, `status`) VALUES
(5, 'Kaduna - Sokoto', '15000', 2, 'Deluxe', '08:00:00', 'NW', '2023-07-22', 1),
(6, 'Kaduna - Gumel', '30000', 2, 'Economy', '08:00:00', 'NW', '2023-07-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `routeid` int(11) NOT NULL,
  `routeinfo` varchar(255) NOT NULL,
  `frno` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `ddate` date NOT NULL,
  `driverinfo` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `seats` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `routeid`, `routeinfo`, `frno`, `price`, `ddate`, `driverinfo`, `amount`, `seats`, `status`, `time`, `regdate`) VALUES
(1, 5, 'Kaduna - Sokoto : Deluxe ', 1, '15000', '2023-07-23', 'Oyindamola Peter - 08103440491', '30000', '2', 3, '08:40 am', '2023-07-22 02:41:01'),
(3, 5, 'Kaduna - Sokoto : Deluxe ', 2, '15000', '2023-07-23', 'Oyindamola - 08980000000', '30000', '2', 3, '08:00 am', '2023-07-22 02:48:25'),
(4, 6, 'Kaduna - Gumel : Economy ', 2, '30000', '2023-07-24', 'Oyindamola - 08980000000', '60000', '2', 3, '03:13 am', '2023-07-22 03:10:05');

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
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `driverinfo`
--
ALTER TABLE `driverinfo`
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
-- Indexes for table `payment_flow`
--
ALTER TABLE `payment_flow`
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
-- Indexes for table `trips`
--
ALTER TABLE `trips`
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
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `driverinfo`
--
ALTER TABLE `driverinfo`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_flow`
--
ALTER TABLE `payment_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
