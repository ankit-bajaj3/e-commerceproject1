-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 10:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstorecreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(30) NOT NULL,
  `cust_fname` varchar(40) NOT NULL,
  `cust_lname` varchar(40) NOT NULL,
  `cust_address` varchar(80) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `insertbookinventory`
--

CREATE TABLE `insertbookinventory` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(20) NOT NULL,
  `author_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insertbookinventory`
--

INSERT INTO `insertbookinventory` (`book_id`, `book_name`, `quantity`, `price`, `image`, `author_name`) VALUES
(1, 'Letters to a Young Writer', 56, '$50', 'images/img1.png', 'Colum McCANN'),
(2, 'Apeirogon', 45, '$90', 'images/img2.png', 'Colum McCANN'),
(3, 'New Titles January - June 2020', 67, '$90', 'images/img3.png', 'Bloons Burry'),
(4, 'One Poem A Day', 56, '$78', 'images/img4.png', 'James Doe'),
(5, 'Dreyer\'s English', 20, '$67', 'images/img5.png', 'Benjamin Dreyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `insertbookinventory`
--
ALTER TABLE `insertbookinventory`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insertbookinventory`
--
ALTER TABLE `insertbookinventory`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
