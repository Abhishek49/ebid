-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2016 at 05:32 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(7, 'admin1', 'admin@dmin.com', '$2y$10$xjgsSLlunBiS7fV/FwChr.Mgjo8AQYm/kxhsd1y9QA2SH6/jCLmuO', '2016-04-03 12:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `contestant` varchar(11) NOT NULL,
  `bider` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `sellto` text NOT NULL,
  `sell` text NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`, `balance`) VALUES
(1, 'akash', 'qwertyuiop@gmail.com', '$2y$10$ARLR4mdrQRLyUNvI.6OPv.qoBiPMfJO/JGeQDXIMeKBOsjcAcjRfu', '2016-03-29 13:50:53', 6000),
(2, 'akash1', 'akash@gmail.com', '$2y$10$xd9wxo7C4rc/ZoG6Qg4HNu55s1.Z66x0iLmct7HKvhHtIPnrJraK.', '2016-03-29 13:59:13', 6000),
(3, 'akash123', 'akash123@gmail.com', '$2y$10$z5vW0SmTDBvTEOiujCQwGuo38oNiL7Lr2UyT/MfXUGlQ./jc31qDK', '2016-03-29 14:18:03', 6000),
(4, 'abhishekraj', 'asnn@ajskdj.com', '$2y$10$A9mtViax2WdODdkZEiFeoOwAtua6fJ.eAcEEynpUr.97OrXzGewla', '2016-03-30 14:52:26', 6000),
(6, 'akash143', 'akash@an.com', '$2y$10$laN1MWBWgF/.dbMlPKJS0OabS9TNSKYXqoTZLJkGv.SsIeS.wXL1.', '2016-04-02 01:47:27', 6000),
(7, 'akash1234', 'akash@skd.com', '$2y$10$z03vAubYw9ry2Yi82rZjKes3HYkfi45DmD1wP19GIQzZ2Wrne2t2e', '2016-04-03 11:39:28', 3400),
(8, 'abhinabh', 'abh@qwert.com', '$2y$10$9mudeu2yOhFCrO276.dAX.BvRIDqLcDLba2Bs3eBrT1pf9k52VDnG', '2016-04-03 11:48:22', 6000),
(9, 'Ankit Sinha', 'anksinha95@yahoo.com', '$2y$10$DIQCIe4NuAQXNUWEkPFzGOS5KMY2esB3/1Yq.BX17qcYfqyrJKstG', '2016-04-03 13:21:46', 6000),
(10, 'dhiraj', 'dhiraj.kumar5325@gmail.com', '$2y$10$THeFkwua0m8i97D6nIIqduMpbDyRyQE5BV1m7vmplpwPqaPAE9uQ.', '2016-04-03 13:37:55', 6000),
(11, 'shubham', 'shubha@gmail.com', '$2y$10$sw0X1/kf6U4H1/giVKhGVeGHWqibbK.9owcdPTf008St8i11nXeLO', '2016-04-03 13:58:49', 6000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
