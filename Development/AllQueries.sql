-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: remotemysql.com
-- Generation Time: Mar 18, 2022 at 12:42 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ec8oH7E2bo`
--
CREATE DATABASE IF NOT EXISTS `Ec8oH7E2bo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Ec8oH7E2bo`;

-- --------------------------------------------------------

--
-- Table structure for table `Beverages`
--

DROP TABLE IF EXISTS `Beverages`;
CREATE TABLE `Beverages` (
  `Drinks` text COLLATE utf8_unicode_ci NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Beverages`
--

INSERT INTO `Beverages` (`Drinks`, `Price`) VALUES
('COCA COLA 1.25L', 3.99),
('COCA COLA 300ml', 1.29),
('RED BULL 250ML', 3.99);

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

DROP TABLE IF EXISTS `Food`;
CREATE TABLE `Food` (
  `Burgers` text COLLATE utf8_unicode_ci NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`Burgers`, `Price`) VALUES
('CLASSICO BURGER Smashed Gourmet beef patty Melt in the middle cheese, topped with special burger sauce, pickles, lettuce, tomato & onion.', 5.49),
('DOUBLE BARREL BURGER 2 X Smashed Gourmet beef patties, 2 x slices of cheese, topped with special burger sauce, pickles, lettuce, tomato & onion.', 8.49),
('CHEESE & BACON BURGER A grilled 6oz Aberdeen Angus beef burger, topped with smoked streaky bacon and Emmental cheese.', 8.75);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='login details';

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('staff', '1234'),
('Manager', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

DROP TABLE IF EXISTS `Menu`;
CREATE TABLE `Menu` (
  `item` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_ID` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Order_Time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`item`, `desc`, `type`, `item_ID`, `price`, `picture`, `Order_Time`) VALUES
('CHEESE & BACON BURGER', 'A grilled 6oz Aberdeen Angus beef burger, topped with smoked streaky bacon and Emmental cheese', '1500 kcal \r\nNVEG', 1, '8.75', 'premiumBurgers.jpg', 'Est time for order: 35 Minutes'),
('CHICKEN BURGER', 'A burger which has a deep fried chicken breast instead of a patty, with mayo and lettuce.', '1000 kcal\r\nNVEG', 2, '6.99', 'premiumBurgers.jpg', 'Est time for order: 25 Minutes'),
('CLASSICO BURGER', 'Smashed Gourmet beef patty Melt in the middle cheese, topped with special burger sauce, pickles, lettuce, tomato & onion', '1024 kcal\r\nNVEG', 3, '5.49', 'premiumBurgers.jpg', 'Est time for order: 35 Minutes'),
('COCA COLA 1.25L', 'The most iconic drink in the world. The current formula of Coca-Cola remains a trade secret;', '300 kcal\r\nVEG', 13, '3.99', 'softDrinks.jpg', 'Est time for order: 5 Minutes'),
('COCA COLA 300ml', 'The most iconic drink in the world. The current formula of Coca-Cola remains a trade secret.', '50 kcal\r\nVEG', 12, '1.29', 'softDrinks.jpg', 'Est time for order: 5 Minutes'),
('DOUBLE BARREL BURGER', '2 X Smashed Gourmet beef patties, 2x slices of cheese, topped with special burger sauce, pickles, lettuce, tomato & onion', '2000 kcal\r\nVEG', 4, '8.49', 'premiumBurgers.jpg', 'Est time for order: 45 Minutes'),
('MOUNTAIN DEW 300ml', 'Original Mountain Dew is a citrus-flavored soda. The soft drink is unique in that it includes a small amount of orange juice.', '300 kcal\r\nNVEG', 11, '1.50', 'softDrinks.jpg', 'Est time for order: 5 Minutes'),
('RED BULL 250ML', 'Full of energy boosting taurine and caffeine blended with vitamins and sugar; Red Bull - the energy drink that \"gives you wings\".', '700 kcal\r\nNVEG', 10, '2.99', 'softDrinks.jpg', 'Est time for order: 5 Minutes');

-- --------------------------------------------------------

--
-- Table structure for table `TableOrders`
--

DROP TABLE IF EXISTS `TableOrders`;
CREATE TABLE `TableOrders` (
  `ID` int(11) NOT NULL,
  `item` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TableOrders`
--

INSERT INTO `TableOrders` (`ID`, `item`) VALUES
(3, 'CLASSICO BURGER'),
(3, 'COCA COLA 300ml');

-- --------------------------------------------------------

--
-- Table structure for table `Tables`
--

DROP TABLE IF EXISTS `Tables`;
CREATE TABLE `Tables` (
  `Table_Number` int(255) NOT NULL,
  `Customer_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Order_Amount` float NOT NULL,
  `Payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `items` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tables`
--

INSERT INTO `Tables` (`Table_Number`, `Customer_Name`, `Order_Amount`, `Payment`, `items`) VALUES
(1, 'Jeno', 23.99, 'Yes', '2X CLASSICO BURGER, 2X COCA COLA 300ML'),
(2, 'Donats', 12.99, 'Yes', 'CHEESE & BACON BURGER, RED BULL 250ML'),
(3, 'Fin', 6.78, 'No', '2X REDBULL 250ML'),
(4, 'Aleks', 30, 'Yes', '3X CHEESE & BACON BURGER, 5X COCA COLA 300ML'),
(5, 'Toby', 5.99, 'Yes', 'DOUBLE BARREL BURGER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `TableOrders`
--
ALTER TABLE `TableOrders`
  ADD KEY `ID` (`ID`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `Tables`
--
ALTER TABLE `Tables`
  ADD PRIMARY KEY (`Table_Number`),
  ADD UNIQUE KEY `Table_Number` (`Table_Number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TableOrders`
--
ALTER TABLE `TableOrders`
  ADD CONSTRAINT `TableOrders_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Tables` (`table_number`),
  ADD CONSTRAINT `TableOrders_ibfk_2` FOREIGN KEY (`item`) REFERENCES `Menu` (`item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
