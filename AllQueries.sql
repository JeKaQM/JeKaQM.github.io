-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: remotemysql.com
-- Generation Time: Mar 15, 2022 at 10:28 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `Beverages`
--

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

CREATE TABLE `Menu` (
  `item` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `item_ID` int(11) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`item`, `desc`, `item_ID`, `price`) VALUES
('CHEESE & BACON BURGER', 'A grilled 6oz Aberdeen Angus beef burger, topped with smoked streaky bacon and Emmental cheese', 3, 8.75),
('CLASSICO BURGER', 'Smashed Gourmet beef patty Melt in the middle cheese, topped with special burger sauce, pickles, lettuce, tomato & onion', 1, 5.49),
('COCA COLA 1.25L', 'The most iconic drink in the world in one of the most iconic bottles. Did you know that every bottle of Coca Cola, when opened forms over 12,500 bubbles? Best served chilled of course', 5, 3.99),
('COCA COLA 300ml', 'The most iconic drink in the world in one of the most iconic bottles. Did you know that every bottle of Coca Cola, when opened forms over 12,500 bubbles? Best served chilled of course', 6, 1.29),
('DOUBLE BARREL BURGER', '2 X Smashed Gourmet beef patties, 2x slices of cheese, topped with special burger sauce, pickles, lettuce, tomato & onion', 2, 8.49),
('RED BULL 250ML', 'Full of energy boosting taurine and caffeine blended with vitamins and sugar; Red Bull - the energy drink that \"gives you wings\". Try it today', 4, 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `TableOrders`
--

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

CREATE TABLE `Tables` (
  `Table_Number` int(255) NOT NULL,
  `Customer_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Order_Amount` float NOT NULL,
  `Payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tables`
--

INSERT INTO `Tables` (`Table_Number`, `Customer_Name`, `Order_Amount`, `Payment`) VALUES
(1, 'Jeno', 23.99, 'Yes'),
(2, 'Donats', 12.99, 'Yes'),
(3, 'Fin', 6.78, 'No'),
(4, 'Aleks', 30, 'Yes'),
(5, 'Toby', 5.99, 'Yes');

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
