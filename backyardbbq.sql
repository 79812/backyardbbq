-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2020 at 10:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backyardbbq`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `username`, `password`) VALUES
('admin@admin.com', 'admin', '$2y$10$6WyOOCqjQ2eZ4oklrxuN5u3KMhkR/CpklZ5cVdJd3UGFo6MY8rHSi'),
('admin1@admin.com', 'admin1', '$2y$10$iYnIbeOTgkgDNkK72Kz42eAUhb9ZfL1ls9DH3ORIWOoGCsX.DMsCe');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `clientFirstName` varchar(255) NOT NULL,
  `clientLastName` varchar(255) NOT NULL,
  `clientStreetName` varchar(255) NOT NULL,
  `clientHouseNumber` varchar(255) NOT NULL,
  `clientCity` varchar(255) NOT NULL,
  `clientZipcode` varchar(10) NOT NULL,
  `clientPhoneNumber` varchar(20) NOT NULL,
  `clientEmail` varchar(255) NOT NULL,
  `orderStartDate` date NOT NULL,
  `orderDuration` int(3) NOT NULL,
  `orderDelivery` tinyint(1) NOT NULL,
  `productId` int(5) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderPrice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `productCategoryId` int(3) NOT NULL,
  `productCategoryTitle` varchar(255) NOT NULL,
  `productCategoryImage` varchar(255) NOT NULL,
  `productCategoryDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`productCategoryId`, `productCategoryTitle`, `productCategoryImage`, `productCategoryDescription`) VALUES
(1, 'Big Green Egg', 'biggreenegg.png', ''),
(2, 'Kamado Joe', '', ''),
(3, 'The Bastard', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(5) NOT NULL,
  `productTitle` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `productWeight` decimal(5,2) NOT NULL,
  `productDimensions` varchar(20) NOT NULL,
  `productPricePerDay` decimal(5,2) NOT NULL,
  `productCategoryId` int(5) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productTitle`, `productDescription`, `productWeight`, `productDimensions`, `productPricePerDay`, `productCategoryId`, `productImage`) VALUES
(1, 'Big Green Egg Medium', 'aksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjk', '50.00', '120x50x50', '30.00', 1, 'biggreenegg.png'),
(2, 'Big Green Egg Large', 'aksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjk', '60.00', '150x60x60', '40.00', 1, 'biggreenegg.png'),
(3, 'Big Green Egg XtraLarge', 'aksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjk', '70.00', '180x70x60', '70.00', 1, 'biggreenegg.png'),
(4, 'Kamado Joe Medium', 'aksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjkaksjdaskdkasdhasjkdhasjkdhasdkjashdjkasdhasdhaskjdhsjk', '40.00', '120x70x60', '40.00', 2, 'kamadojoe.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`productCategoryId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productCategoryId` (`productCategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `productCategoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`productCategoryId`) REFERENCES `productcategories` (`productCategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
