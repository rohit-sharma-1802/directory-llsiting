-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 01:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(8) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `num_rooms` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `name`, `address`, `city`, `state`, `pincode`, `phone`, `email`, `website`, `description`, `rating`, `num_rooms`, `created_date`) VALUES
(2, 'The lalit Jaipur', 'Agarwal farm mansarovar', 'jaipur', 'rajasthan', '302020', '7691094380', 'rohitsharmatech9@gmail.com', 'thelalitjaipur.com', 'All the workers at the hotel were very nice and kind to me and my family. Unfortunately I accidentally left behind some of my belongings.', 4, 50, '2023-04-01 13:57:37'),
(3, 'taj hotel', 'mumbai', 'mumbai', 'maharastra', '5002102', '123456789', 'rohitsharmatech9@gmail.com', 'taj.com', NULL, 5, 6000, '2023-04-01 14:45:44'),
(4, 'fsdfs', 'sdfsd', 'sf', 'dsfsd', '302020', '1234567890', 'dfsdf@dsf.cd', 'vdfdsfsd.ssdd', 'vxdvvx', 2, 22, '2023-04-01 16:23:20'),
(5, 'sdfsdfs', 'sdaf', 'dfsfk', 'sdcsd', '302020', '1234567890', 'sdsdf@dfs.cs', 'xvdfd.csfd', 'zcnjzdvndnjdfgsg s', 5, 30, '2023-04-01 16:24:32'),
(6, 'sdfsdfs', 'sdaf', 'dfsfk', 'sdcsd', '302020', '1234567890', 'sdsdf@dfs.cs', 'xvdfd.csfd', 'zcnjzdvndnjdfgsg s', 5, 30, '2023-04-01 16:24:54'),
(7, 'sfsfkk', 'dfsfk', 'sdfsk', 'dfnk', '302020', '1234567890', 'sdfksf@sdfsa.casd', 'sdfsdf.comsdf', 'dsfnsfsdmf', 2, 2, '2023-04-01 16:32:02'),
(8, 'Citi Club', '84/79, G.T. Road', 'Kanpur', 'U.P.', '208012', '7691094380', 'citiclub@gmail.com', 'citiclub.com', 'Situated in Kānpur, 2.5 km from Kānpur Central Station, Citi Club features accommodation with a garden, free private parking, a terrace and a restaurant. Boasting an ATM, this property also provides guests with a children\'s playground.', 3.5, 20, '2023-04-01 16:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pincode` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `name`, `address`, `city`, `state`, `pincode`, `phone`, `email`, `website`, `description`, `rating`, `date`) VALUES
(1, 'Machali', 'Sharada Vidhyalaya Road Behind Ocean Pearl', 'Mangalore', 'Kannada', '575003', '+91 77959 57575', 'govind@gmail.com', NULL, 'Serves simple plate meals with choice of sides you want to \"add on\". Ambience is nothing great but food is nothing less than \"Tasty\". ', 3.8, '2023-04-01 14:31:02'),
(2, 'Govindam Retreat', 'First Floor, All Rajasthan Shilp Gram Udyog Kanwar Nagar, Near Govind Dev Ji Temple, ', 'Jaipur', 'Rajasthan', '302002', '+91 99299 49258', 'rohitsharmatech9@gmail.com', 'govindamretreat.com', 'Rajasthani thali was grate and staff was god polite bhevair service by aafrin good located near to city palace chef vijendra suggest me thali', 5, '2023-04-01 14:33:47'),
(3, 'first', 'maharaja', 'jaipur', 'rajasthan', '302020', '1234567890', 'first@first.com', 'slickitsolutions.com', 'ddfsdgd', 4, '2023-04-01 16:37:15'),
(4, 'Rominus', 'Mansarovar', 'Jaipur', 'Rajasthan', '302020', '7737999112', 'rominus@gmail.com', 'rominus.com', 'Rominus Pizza And Burger Jaipur, Mansarovar; View reviews, menu, contact, location, and more for Rominus Pizza And Burger Restaurant.', 4.5, '2023-04-01 16:45:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
