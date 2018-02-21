-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2018 at 02:33 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpmbookstore`
--
CREATE DATABASE IF NOT EXISTS `tpmbookstore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tpmbookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bookId` varchar(10) NOT NULL,
  `bookTitle` varchar(255) NOT NULL,
  `bookDescription` varchar(255) NOT NULL,
  `bookPrice` double NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookPublisher` varchar(50) NOT NULL,
  `bookPublishDate` varchar(50) NOT NULL,
  `bookQuantity` int(11) DEFAULT NULL,
  `genreId` varchar(4) NOT NULL,
  PRIMARY KEY (`bookId`),
  KEY `book_ibfk_1` (`genreId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookTitle`, `bookDescription`, `bookPrice`, `bookAuthor`, `bookPublisher`, `bookPublishDate`, `bookQuantity`, `genreId`) VALUES
('B001', 'Milk and Honey', 'It is about the experience of violence, abuse, love, loss, and femininity.', 20, 'Rupi Kaur', 'Createspace', '4th November 2014 ', 10, 'G001'),
('B002', 'Pride and Prejudice', '“It is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife.” So begins Pride and Prejudice, Jane Austen’s witty comedy of manners', 30, ' Jane Austen', 'Modern Library', '10th October 2000', 13, 'G001'),
('B003', 'Memories of Geisha', 'A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite', 15, 'Arthur Golden', 'Random House Large Print Publishing ', '15th November 2005', 8, 'G001'),
('B004', 'Idiot Genius', '\"From its engaging drawings to its powerful message, Idiot Genius will leave readers musing about Willa Snap\'s adventures long after the winding story concludes.', 70, 'Richard Due', 'Gibbering Gnome Press', '22nd December 2017', 20, 'G002'),
('B005', 'The Riddle in Stone Trilogy', 'In the world of fantasy novels, Robert Evert is a supernova talent, and the RIDDLE IN STONE series brings twisting suspense and an unforgettable protagonist into the pantheon of great books.', 67, 'Robert Evert', 'Diversion Books', '7th December 2014', 27, 'G002'),
('B006', 'Undone', 'USA Today and New York Times bestselling author, Wendy Higgins, brings you the gripping, sensual conclusion to her apocalyptic trilogy.\r\n', 45, 'Wendy Higgins ', 'A Division of Ingenious Inventions Run Amok, Ink', '5th December 2017', 42, 'G002'),
('B007', 'The Hunger Game', 'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts.', 87, 'Suzanne Collins', 'Scholastic Press', '14th September 2008', 70, 'G003'),
('B008', 'The Maze Runner', 'When Thomas wakes up in the lift, the only thing he can remember is his name. ', 67, ' James Dashner', 'Delacorte Press', '6th October 2009', 10, 'G003'),
('B009', 'The Lightning Thief ', 'Percy Jackson is a good kid, but he can\'t seem to focus on his schoolwork or control his temper.', 56, ' Rick Riordan', 'Disney Hyperion Books', '1st March 2006', 36, 'G003');

-- --------------------------------------------------------

--
-- Table structure for table `bookpurchase`
--

DROP TABLE IF EXISTS `bookpurchase`;
CREATE TABLE IF NOT EXISTS `bookpurchase` (
  `paymentId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `purchaseQuantity` int(11) NOT NULL,
  PRIMARY KEY (`paymentId`,`bookId`),
  KEY `bookId` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackId` varchar(10) NOT NULL,
  `bookRating` int(11) NOT NULL,
  `bookComment` varchar(255) NOT NULL,
  `feedbackStatus` tinyint(1) NOT NULL DEFAULT '1',
  `feedbackDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  PRIMARY KEY (`feedbackId`),
  KEY `memberId` (`memberId`),
  KEY `bookId` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackrating`
--

DROP TABLE IF EXISTS `feedbackrating`;
CREATE TABLE IF NOT EXISTS `feedbackrating` (
  `memberId` varchar(10) NOT NULL,
  `feedbackId` varchar(10) NOT NULL,
  `feedbackRating` int(11) NOT NULL,
  `feedbackRatingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberId`,`feedbackId`),
  KEY `feedbackId` (`feedbackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genreId` varchar(4) NOT NULL,
  `genre` varchar(20) NOT NULL,
  PRIMARY KEY (`genreId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreId`, `genre`) VALUES
('G001', 'Romance'),
('G002', 'Sci-Fi'),
('G003', 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `managerId` varchar(10) NOT NULL,
  `managerEmail` varchar(255) NOT NULL,
  `managerName` varchar(100) NOT NULL,
  `managerPw` varchar(255) NOT NULL,
  `managerAddress` varchar(255) NOT NULL,
  `managerPhone` varchar(15) NOT NULL,
  PRIMARY KEY (`managerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerId`, `managerEmail`, `managerName`, `managerPw`, `managerAddress`, `managerPhone`) VALUES
('A001', 'admin', 'Admin', '$2y$10$uWiyFxhiY56211TPXyRuIOz8T.F7MVQBnkbN8xVbOfEWcuGUjCOMK', 'Bukit Jalil', '0122231233');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `memberId` varchar(10) NOT NULL,
  `memberEmail` varchar(255) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `memberPw` varchar(255) NOT NULL,
  `memberAddress` varchar(255) NOT NULL,
  `memberPhone` varchar(15) NOT NULL,
  `memberCreditCard` varchar(255) NOT NULL,
  `memberTrust` tinyint(1) NOT NULL DEFAULT '0',
  `memberPoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberlogin`
--

DROP TABLE IF EXISTS `memberlogin`;
CREATE TABLE IF NOT EXISTS `memberlogin` (
  `memberId` varchar(10) NOT NULL,
  `loginDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberId`,`loginDateTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberreward`
--

DROP TABLE IF EXISTS `memberreward`;
CREATE TABLE IF NOT EXISTS `memberreward` (
  `memberId` varchar(10) NOT NULL,
  `rewardId` varchar(10) NOT NULL,
  `claimDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `claimQuantity` int(11) NOT NULL,
  PRIMARY KEY (`memberId`,`rewardId`),
  KEY `rewardId` (`rewardId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` varchar(10) NOT NULL,
  `paymentDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `memberId` (`memberId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

DROP TABLE IF EXISTS `reward`;
CREATE TABLE IF NOT EXISTS `reward` (
  `rewardId` varchar(10) NOT NULL,
  `rewardName` varchar(255) NOT NULL,
  `rewardDescription` varchar(255) NOT NULL,
  `rewardPoint` int(11) NOT NULL,
  `rewardQuantity` int(11) NOT NULL,
  PRIMARY KEY (`rewardId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`rewardId`, `rewardName`, `rewardDescription`, `rewardPoint`, `rewardQuantity`) VALUES
('R001', 'RM10 Book Voucher', 'RM10 discount of books purchase ', 250, 10),
('R002', 'RM20 Book Voucher', 'RM20 discount of books purchase', 400, 4);

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

DROP TABLE IF EXISTS `stockorder`;
CREATE TABLE IF NOT EXISTS `stockorder` (
  `orderId` varchar(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderStatus` varchar(20) DEFAULT NULL,
  `arrivalDate` date DEFAULT NULL,
  `managerId` varchar(10) NOT NULL,
  `supplierId` varchar(10) NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `managerId` (`managerId`),
  KEY `supplierId` (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockorderinfo`
--

DROP TABLE IF EXISTS `stockorderinfo`;
CREATE TABLE IF NOT EXISTS `stockorderinfo` (
  `orderId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  PRIMARY KEY (`orderId`,`bookId`),
  KEY `bookId` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierId` varchar(10) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `supplierAddress` varchar(255) NOT NULL,
  `suplierPhone` varchar(15) NOT NULL,
  PRIMARY KEY (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierId`, `supplierName`, `supplierAddress`, `suplierPhone`) VALUES
('S001', 'Adrian Wong', 'Shah Alam', '03-89765678'),
('S002', 'Emeline Cheah', 'Serdang', '012-7768790'),
('S003', 'Aaron', 'Kajang', '03-89764544');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`genreId`) REFERENCES `genre` (`genreId`) ON UPDATE CASCADE;

--
-- Constraints for table `bookpurchase`
--
ALTER TABLE `bookpurchase`
  ADD CONSTRAINT `bookpurchase_ibfk_1` FOREIGN KEY (`paymentId`) REFERENCES `payment` (`paymentId`),
  ADD CONSTRAINT `bookpurchase_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`);

--
-- Constraints for table `feedbackrating`
--
ALTER TABLE `feedbackrating`
  ADD CONSTRAINT `feedbackrating_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`),
  ADD CONSTRAINT `feedbackrating_ibfk_2` FOREIGN KEY (`feedbackId`) REFERENCES `feedback` (`feedbackId`);

--
-- Constraints for table `memberlogin`
--
ALTER TABLE `memberlogin`
  ADD CONSTRAINT `memberlogin_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`);

--
-- Constraints for table `memberreward`
--
ALTER TABLE `memberreward`
  ADD CONSTRAINT `memberreward_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`),
  ADD CONSTRAINT `memberreward_ibfk_2` FOREIGN KEY (`rewardId`) REFERENCES `reward` (`rewardId`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`);

--
-- Constraints for table `stockorder`
--
ALTER TABLE `stockorder`
  ADD CONSTRAINT `stockorder_ibfk_1` FOREIGN KEY (`managerId`) REFERENCES `manager` (`managerId`),
  ADD CONSTRAINT `stockorder_ibfk_2` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`);

--
-- Constraints for table `stockorderinfo`
--
ALTER TABLE `stockorderinfo`
  ADD CONSTRAINT `stockorderinfo_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `stockorder` (`orderId`),
  ADD CONSTRAINT `stockorderinfo_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
