-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 07:52 AM
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
-- Database: `mobilesales`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `BannerID` int(11) NOT NULL,
  `Link` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Image` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BannerID`, `Link`, `Image`, `Status`) VALUES
(1, 'avc.com', '1592115059.jpg', b'1'),
(2, 'avc.com', '1592115651.jpg', b'1'),
(3, 'avc.com', '1592115658.jpg', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Status`) VALUES
(2, 'Tablet', b'1'),
(9, 'Phone', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Phone` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Phone` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `BasicSalary` decimal(18,0) DEFAULT NULL,
  `Coefficient` float DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `ManufacturerID` int(11) NOT NULL,
  `ManufacturerName` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `ShipName` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ShipAddress` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Note` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Status` varchar(128) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderItem` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Price` decimal(18,0) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Image0` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Image1` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Image2` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Image3` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Price` decimal(18,0) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `InStock` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  `ManufacturerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CategoryID`, `Image0`, `Image1`, `Image2`, `Image3`, `ModifiedDate`, `CreatedDate`, `Price`, `Discount`, `InStock`, `Status`, `ManufacturerID`) VALUES
(27, 'Iphone 11', 9, NULL, NULL, NULL, NULL, NULL, NULL, '350', 1, 123123, b'0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `ProductDetailID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `RAM` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ROM` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ScreenType` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ScreenSize` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Simslot` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `FrontCamera` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `DisplayResolution` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Camera` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `OS` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `ChargingPort` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `CPU` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `GPU` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Battery` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `Color` varchar(128) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(128) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BannerID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `FK_Employee_Role` (`RoleID`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`ManufacturerID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_Order_Customer1` (`CustomerID`),
  ADD KEY `FK_Order_Employee1` (`EmployeeID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderItem`,`OrderID`),
  ADD KEY `FK_OrderDetail_Order1` (`OrderID`),
  ADD KEY `FK_OrderDetail_Product` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_Product_Category` (`CategoryID`),
  ADD KEY `FK_Product_Manufacturer` (`ManufacturerID`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`ProductDetailID`),
  ADD KEY `FK_ProductDetail_Product` (`ProductID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `BannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `ManufacturerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `ProductDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_Employee_Role` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_Order_Customer1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `FK_Order_Employee1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Order1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `FK_OrderDetail_Product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `FK_Product_Manufacturer` FOREIGN KEY (`ManufacturerID`) REFERENCES `manufacturer` (`ManufacturerID`);

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `FK_ProductDetail_Product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
