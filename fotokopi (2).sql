-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotokopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) UNSIGNED NOT NULL,
  `orderID` int(10) UNSIGNED NOT NULL,
  `foodID` int(10) UNSIGNED NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `orderID`, `foodID`, `foodName`, `quantity`, `totalPrice`) VALUES
(1, 1, 2, 'Original Crispy Chicken', 1, 6.00),
(2, 1, 3, 'Original Crispy Chicken', 1, 6.00),
(3, 2, 4, 'Spicy Crispy Chicken', 1, 4.00),
(4, 3, 1, 'Original Crispy Chicken', 1, 5.00),
(5, 3, 1, 'Original Crispy Chicken', 1, 5.00),
(6, 3, 2, 'Spicy Crispy Chicken', 1, 6.00),
(7, 4, 2, 'Spicy Crispy Chicken', 1, 6.00),
(8, 4, 3, 'Cheesy Crispy Chicken', 1, 6.00),
(9, 4, 10, 'Cheese Sauce', 1, 2.00),
(10, 5, 1, 'Original Crispy Chicken', 1, 5.00),
(11, 5, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(12, 6, 1, 'Original Crispy Chicken', 1, 5.00),
(13, 6, 2, 'Spicy Crispy Chicken', 1, 6.00),
(14, 6, 3, 'Cheesy Crispy Chicken', 1, 6.00),
(15, 6, 4, 'Original Crispy Chicken Popcorn', 1, 4.00),
(16, 6, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(17, 6, 6, 'Cheesy Crispy Chicken Popcorn', 1, 4.00),
(18, 6, 7, 'Original Crispy Chicken Satay', 1, 3.00),
(19, 6, 8, 'Spicy Crispy Chicken Satay', 1, 3.00),
(20, 6, 9, 'Cheesy Crispy Chicken Satay', 1, 4.00),
(21, 6, 10, 'Cheese Sauce', 1, 2.00),
(22, 6, 11, 'Spicy Sauce', 1, 2.00),
(23, 6, 12, 'BBQ Sauce', 1, 3.00),
(24, 7, 2, 'Spicy Crispy Chicken', 1, 6.00),
(25, 7, 5, 'Spicy Crispy Chicken Popcorn', 1, 4.00),
(26, 8, 4, 'Original Crispy Chicken Popcorn', 1, 4.00),
(27, 8, 8, 'Spicy Crispy Chicken Satay', 1, 3.00),
(28, 9, 1, 'Mocha', 2, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(10) UNSIGNED NOT NULL,
  `custName` varchar(100) NOT NULL,
  `custPhoneNumber` varchar(20) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `custPhoneNumber`, `custEmail`, `custPassword`) VALUES
(1, 'Admin', '0164105210', 'fotokopi@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc'),
(7, 'Admin2', '0164105210', 'Abc@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `foodDetails` varchar(255) NOT NULL,
  `foodPrice` decimal(10,2) NOT NULL,
  `menuPic` text DEFAULT NULL,
  `updateTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`foodID`, `foodName`, `foodDetails`, `foodPrice`, `menuPic`, `updateTime`) VALUES
(1, 'Mocha', 'Air mocha milo', 5.00, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Cappuccino_at_Sightglass_Coffee.jpg/640px-Cappuccino_at_Sightglass_Coffee.jpg', NULL),
(2, 'Spicy Crispy Chicken', 'Ignite your taste buds with Spicy Crispy Chicken: Fiery, flavorful perfection. Hand-selected, seasoned, and fried to crispy satisfaction. Experience bold, spicy bliss. Try it today and savor the heat.', 6.00, 'https://www.vegrecipesofindia.com/wp-content/uploads/2018/02/cafe-style-hot-coffee-recipe-1.jpg', NULL),
(3, 'Cheesy Crispy Chicken', 'Savor Cheesy Crispy Chicken: Crispy, golden perfection meets gooey, melted cheese. Indulge in the irresistible blend of flavors. Try it today and experience cheesy delight.', 6.00, NULL, NULL),
(4, 'Original Crispy Chicken Popcorn', 'Original Crispy Chicken Popcorn: Bite-sized flavor bombs. Crispy, juicy, and oh-so-addictive. Experience the ultimate snacking sensation. Try it today and indulge in popcorn perfection.', 4.00, NULL, NULL),
(5, 'Spicy Crispy Chicken Popcorn', 'Spicy Crispy Chicken Popcorn: Explosive flavor in every bite. Fiery, crispy perfection. Try it today and ignite your taste buds.', 4.00, NULL, NULL),
(6, 'Cheesy Crispy Chicken Popcorn', 'Cheesy Crispy Chicken Popcorn: Irresistible cheesy bites. Crispy, gooey perfection. Try it today and indulge in cheesy delight.', 4.00, NULL, NULL),
(7, 'Original Crispy Chicken Satay', 'Original Crispy Chicken Satay: Irresistible skewered delight. Crispy perfection meets savory satay flavor. Try it today and savor the original goodness.', 3.00, NULL, NULL),
(8, 'Spicy Crispy Chicken Satay', 'Spicy Crispy Chicken Satay: Fiery, flavorful skewers. Perfectly spiced and irresistibly crispy. Try it today and ignite your taste buds.', 3.00, NULL, NULL),
(9, 'Cheesy Crispy Chicken Satay', 'Cheesy Crispy Chicken Satay: Melty, savory skewered delight. Crispy perfection meets cheesy goodness. Try it today and indulge in cheesy bliss.\r\n', 4.00, NULL, NULL),
(10, 'Cheese Sauce', 'Creamy and flavorful sauce made primarily from cheese', 2.00, NULL, NULL),
(11, 'Spicy Sauce', 'Crafted with carefully selected chili peppers, this sauce brings the perfect amount of heat to tantalize your taste buds', 2.00, NULL, NULL),
(12, 'BBQ Sauce', 'BBQ sauce, short for barbecue sauce, is a mouthwatering condiment that brings a delightful combination of smoky, sweet, and tangy flavors', 3.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordermenu`
--

CREATE TABLE `ordermenu` (
  `orderID` int(10) UNSIGNED NOT NULL,
  `custID` int(10) UNSIGNED NOT NULL,
  `orderAddress` varchar(255) DEFAULT NULL,
  `orderDate` varchar(20) NOT NULL,
  `eatOption` varchar(30) NOT NULL,
  `paymentMethod` varchar(30) NOT NULL,
  `orderStatus` varchar(40) NOT NULL,
  `grandTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordermenu`
--

INSERT INTO `ordermenu` (`orderID`, `custID`, `orderAddress`, `orderDate`, `eatOption`, `paymentMethod`, `orderStatus`, `grandTotal`) VALUES
(1, 1, 'Kolej Kerawang UiTM Kuala Terengganu', '23-07-2023', 'Delivery', 'Cash', 'Order Received', 20.70),
(2, 1, 'LCK Restaurant', '23-07-2023', 'Dine in', 'Cash', 'Order Cancelled', 4.20),
(3, 1, 'LCK Restaurant', '23-07-2023', 'Dine in', 'Cash', 'Order Cancelled', 17.00),
(4, 2, 'Kolej Kerawang UiTM Kuala Terengganu', '23-07-2023', 'Delivery', 'Cash', 'Order Received', 22.80),
(5, 2, 'LCK Restaurant', '23-07-2023', 'Takeaway', 'Cash', 'In Process', 9.50),
(6, 3, 'LCK Restaurant', '24-07-2023', 'Takeaway', 'Online Transaction (FPX)', 'Order Received', 48.80),
(7, 3, 'Kolej Kerawang UiTM Kuala Terengganu ', '24-07-2023', 'Delivery', 'Cash', 'Delivering', 18.60),
(8, 1, 'LCK Restaurant', '24-07-2023', 'Takeaway', 'Debit/Credit Card', 'Order Received', 7.40),
(9, 7, 'LCK Restaurant', '09-07-2024', 'Takeaway', 'Online Transaction (FPX)', 'Order Received', 10.60);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(10) UNSIGNED NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `staffGender` varchar(8) NOT NULL,
  `staffPhoneNum` varchar(20) NOT NULL,
  `staffEmail` varchar(255) NOT NULL,
  `staffPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffGender`, `staffPhoneNum`, `staffEmail`, `staffPassword`) VALUES
(5, 'hu tao', 'female', '0113905010', 'Abcd@gmail.com', '3e0cd7dbf477f6da9831acd7c1d617bc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `ordermenu`
--
ALTER TABLE `ordermenu`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ordermenu`
--
ALTER TABLE `ordermenu`
  MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
