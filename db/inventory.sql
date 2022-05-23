-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 05:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(40) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('liliane', '123');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `i_desc` varchar(50) NOT NULL,
  `i_qty` int(11) NOT NULL,
  `i_price` varchar(50) NOT NULL,
  `i_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_desc`, `i_qty`, `i_price`, `i_sold`) VALUES
(7, 'Alcohol', 3, '39.35', 5),
(9, 'Digital Calculator', 7, '165.40', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `i_id`, `qty`, `date`, `amount`) VALUES
(5, 7, 2, '01/14/2014', '78.7'),
(6, 7, 5, '01/14/2014', '196.75'),
(7, 9, 3, '01/15/2014', '496.2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `password`) VALUES
('liliane', 'igihozo', 'liliane@gmail.com', '123'),
('uwera', 'alice', 'alice@gmail.com', '234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
