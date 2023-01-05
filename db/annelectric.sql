-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 10:04 AM
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
-- Database: `annelectric`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `categoriesbysubcategory`
-- (See below for the actual view)
--
CREATE TABLE `categoriesbysubcategory` (
`Category` varchar(255),
`SubCategory` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `Parent_Id` int(10) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CreatedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(10) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `CreatedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(10) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ContactNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(10) NOT NULL,
  `PartNo` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Category` int(10) NOT NULL,
  `subCategory` int(10) NOT NULL,
  `Brand` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Pack` varchar(255) NOT NULL,
  `Image1` varchar(255) NOT NULL,
  `Image2` varchar(255) NOT NULL,
  `Image3` varchar(255) NOT NULL,
  `DetImage` varchar(255) NOT NULL,
  `CreatedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `categoriesbysubcategory`
--
DROP TABLE IF EXISTS `categoriesbysubcategory`;

CREATE ALGORITHM=UNDEFINED 
DEFINER=`root`@`localhost` 
SQL SECURITY DEFINER VIEW `categoriesbysubcategory`  AS 
  SELECT `c`.`CategoryName` AS `Category`, 
  `s`.`CategoryName` AS `SubCategory` 
  FROM (`category` `s` 
  JOIN `category` `c` 
  ON (`c`.`id` = `s`.`Parent_Id`)) 
  ORDER BY `c`.`CategoryName` ASC 
;


-- Indexes for dumped tables --

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`),
  ADD KEY `parent_id` (`Parent_Id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PartNo` (`PartNo`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Brand` (`Brand`);



-- Constraints for dumped tables--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Parent_Id`) REFERENCES `category` (`id`);

--
-- Constraints for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD CONSTRAINT `tblproducts_ibfk_2` FOREIGN KEY (`Brand`) REFERENCES `tblbrand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblproducts_ibfk_3` FOREIGN KEY (`Category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
