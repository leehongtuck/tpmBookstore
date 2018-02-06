-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 01:39 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` varchar(10) NOT NULL,
  `bookTitle` varchar(255) NOT NULL,
  `bookDescription` varchar(255) NOT NULL,
  `bookPrice` double NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookPublisher` varchar(50) NOT NULL,
  `bookPublishDate` date NOT NULL,
  `bookQuantity` int(11) NOT NULL,
  `genreId` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookTitle`, `bookDescription`, `bookPrice`, `bookAuthor`, `bookPublisher`, `bookPublishDate`, `bookQuantity`, `genreId`) VALUES
('B001', 'Milk and Honey', 'It is about the experience of violence, abuse, love, loss, and femininity.', 20, 'Rupi Kaur', 'Createspace', '2014-07-09', 10, 'G001'),
('B002', 'Pride and Prejudice', 'It is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife.  So begins Pride and Prejudice, Jane Austenï¿½s witty comedy of manners', 30, ' Jane Austen', 'Modern Library', '2016-09-25', 13, 'G001'),
('B003', 'Memories of Geisha', 'A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite.', 15, 'Arthur Golden', 'Random House Large Print Publishing ', '2017-01-10', 9, 'G001'),
('B004', 'Idiot Genius', '\"From its engaging drawings to its powerful message, Idiot Genius will leave readers musing about Willa Snap', 70, 'Richard Due', 'Gibbering Gnome Press', '2017-12-01', 3, 'G002'),
('B005', 'The Riddle in Stone Trilogy', 'In the world of fantasy novels, Robert Evert is a supernova talent, and the RIDDLE IN STONE series brings twisting suspense and an unforgettable protagonist into the pantheon of great books.', 67, 'Robert Evert', 'Diversion Books', '2017-12-25', 22, 'G002'),
('B006', 'Undone', 'USA Today and New York Times bestselling author, Wendy Higgins, brings you the gripping, sensual conclusion to her apocalyptic trilogy.', 45, 'Wendy Higgins ', 'A Division of Ingenious Inventions Run Amok, Ink', '2018-01-01', 56, 'G002'),
('B007', 'The Hunger Game', 'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts.', 87, 'Suzanne Collins', 'Scholastic Press', '2018-01-05', 54, 'G003'),
('B008', 'The Maze Runner', 'When Thomas wakes up in the lift, the only thing he can remember is his name. ', 67, ' James Dashner', 'Delacorte Press', '2018-01-13', 25, 'G003'),
('B009', 'The Lightning Thief ', 'Percy Jackson is a good kid, but he can', 56, ' Rick Riordan', 'Disney Hyperion Books', '2018-01-20', 27, 'G003');

-- --------------------------------------------------------

--
-- Table structure for table `bookpurchase`
--

CREATE TABLE `bookpurchase` (
  `paymentId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `purchaseQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` varchar(10) NOT NULL,
  `bookRating` int(11) NOT NULL,
  `bookComment` varchar(255) NOT NULL,
  `feedbackStatus` tinyint(1) NOT NULL DEFAULT '1',
  `feedbackDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackrating`
--

CREATE TABLE `feedbackrating` (
  `memberId` varchar(10) NOT NULL,
  `feedbackId` varchar(10) NOT NULL,
  `feedbackRating` int(11) NOT NULL,
  `feedbackRatingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreId` varchar(4) NOT NULL,
  `genre` varchar(20) NOT NULL
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

CREATE TABLE `manager` (
  `managerId` varchar(10) NOT NULL,
  `managerEmail` varchar(255) NOT NULL,
  `managerName` varchar(100) NOT NULL,
  `managerPw` varchar(255) NOT NULL,
  `managerAddress` varchar(255) NOT NULL,
  `managerPhone` varchar(15) NOT NULL
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

CREATE TABLE `member` (
  `memberId` varchar(10) NOT NULL,
  `memberEmail` varchar(255) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `memberPw` varchar(255) NOT NULL,
  `memberAddress` varchar(255) NOT NULL,
  `memberPhone` varchar(15) NOT NULL,
  `memberCreditCard` varchar(255) NOT NULL,
  `memberTrust` tinyint(1) DEFAULT NULL,
  `memberPoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `memberEmail`, `memberName`, `memberPw`, `memberAddress`, `memberPhone`, `memberCreditCard`, `memberTrust`, `memberPoint`) VALUES
('M001', 'abc@gmail.com', 'Tuck', '$2y$10$YswrBp1kku27Cx4aUc5TwOt96XWBlCBCURXSgWvG9NUTtpaEPMvoe', 'Subang', '0123456789', '123123141224', 0, 0),
('M002', 'tan@gmail.com', 'Tan', '$2y$10$j7xx0zs.bwv6uuCE0OyMLetOtxEJmNdwy5zt4tlMchjhA2pPHd7O2', 'Puchong', '1234214', '121213132', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberreward`
--

CREATE TABLE `memberreward` (
  `memberId` varchar(10) NOT NULL,
  `rewardId` varchar(10) NOT NULL,
  `claimDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `claimQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` varchar(10) NOT NULL,
  `paymentDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `rewardId` varchar(10) NOT NULL,
  `rewardName` varchar(255) NOT NULL,
  `rewardDescription` varchar(255) NOT NULL,
  `rewardPoint` int(11) NOT NULL,
  `rewardQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`rewardId`, `rewardName`, `rewardDescription`, `rewardPoint`, `rewardQuantity`) VALUES
('R001', 'RM10 Book Voucher', 'RM10 discount of books purchase ', 250, 10),
('R002', 'RM20 Book Voucher', 'RM20 discount of books purchase', 400, 25);

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

CREATE TABLE `stockorder` (
  `orderId` varchar(10) NOT NULL,
  `orderDate` date NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  `arrivalDate` date NOT NULL,
  `managerId` varchar(10) NOT NULL,
  `supplierId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockorderinfo`
--

CREATE TABLE `stockorderinfo` (
  `orderId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `orderQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierId` varchar(10) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `supplierAddress` varchar(255) NOT NULL,
  `suplierPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierId`, `supplierName`, `supplierAddress`, `suplierPhone`) VALUES
('S001', 'Adrian Wong', 'Shah Alam', '03-89765678'),
('S002', 'Emeline Cheah', 'Serdang', '012-7768790'),
('S003', 'Aaron', 'Kajang', '03-89764544');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `book_ibfk_1` (`genreId`);

--
-- Indexes for table `bookpurchase`
--
ALTER TABLE `bookpurchase`
  ADD PRIMARY KEY (`paymentId`,`bookId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `feedbackrating`
--
ALTER TABLE `feedbackrating`
  ADD PRIMARY KEY (`memberId`,`feedbackId`),
  ADD KEY `feedbackId` (`feedbackId`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreId`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `memberreward`
--
ALTER TABLE `memberreward`
  ADD PRIMARY KEY (`memberId`,`rewardId`),
  ADD KEY `rewardId` (`rewardId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `memberId` (`memberId`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`rewardId`);

--
-- Indexes for table `stockorder`
--
ALTER TABLE `stockorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `managerId` (`managerId`),
  ADD KEY `supplierId` (`supplierId`);

--
-- Indexes for table `stockorderinfo`
--
ALTER TABLE `stockorderinfo`
  ADD PRIMARY KEY (`orderId`,`bookId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`);

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
