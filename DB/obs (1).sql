-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 06:30 AM
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
-- Database: `obs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `name`) VALUES
(1, 'jame@gmail.com', 12345, 'jame'),
(0, '', 0, 'jame');

-- --------------------------------------------------------

--
-- Table structure for table `book_post`
--

CREATE TABLE `book_post` (
  `post_id` int(11) NOT NULL,
  `b_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `b_image` varchar(10000) NOT NULL,
  `new_price` int(11) NOT NULL,
  `descrip` text NOT NULL,
  `curr_price` int(11) NOT NULL,
  `s_address` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date2` date NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_post`
--

INSERT INTO `book_post` (`post_id`, `b_name`, `email`, `b_image`, `new_price`, `descrip`, `curr_price`, `s_address`, `pincode`, `date2`, `mob_no`, `status`) VALUES
(3, 'Let us C', 'Abhi@gmail.com', 'b_image/images.jpeg', 300, 'This is the c programming refference book for the absolute beginners.\r\nThis is useful for the all people which want to learn c programming....', 150, 'Aurangabad', 343823, '2020-02-25', 9874236876, 'unbooked'),
(4, 'Shivaji. the great m', 'pratapgava@gmail.com', 'b_image/images (1).jpeg', 500, 'This book is all about history of chattrapati shivaji maharaj.', 250, 'Nagamthan', 423701, '2020-02-25', 9874236876, 'unbooked');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `feed` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `feed`, `email`, `date1`) VALUES
(1, 'This is very useful site', 'pratapgava@gmail.com', '2020-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `email`, `post_id`, `pincode`, `status`, `mob_no`, `addr`, `payment`) VALUES
(3, 'Pratap', 'pratapgava@gmail.com', 1, 1231122, 'pending', 7020289340, 'Aurangabad', 103),
(4, 'chetan', 'Ghayawatc@gmail.com ', 1, 423701, 'pending', 7020289340, 'Aurangabad', 103),
(6, 'abhijit', 'Abhi@gmail.com', 1, 1231122, 'pending', 2342342332, 'at.vaijapur', 103);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `passwd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `mob_no`, `passwd`) VALUES
(1, 'Chetan', 'Ghayawat', 'chetan@gmail.com', 9823472348, 12345),
(2, 'pratap', 'Gavali', 'pratapgava@gmail.com', 234234233, 123456),
(4, 'chetan', 'Ghayawat', 'Ghayawatc@gmail.com', 234234233, 12345676),
(5, 'Abhijit', 'harde', 'Abhi@gmail.com', 9883472332, 54321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_post`
--
ALTER TABLE `book_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_post`
--
ALTER TABLE `book_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
