-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 02:43 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `bookPublishDate` varchar(50) NOT NULL,
  `bookQuantity` int(11) DEFAULT NULL,
  `genreId` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookTitle`, `bookDescription`, `bookPrice`, `bookAuthor`, `bookPublisher`, `bookPublishDate`, `bookQuantity`, `genreId`) VALUES
('B001', 'Milk and Honey', 'It is about the experience of violence, abuse, love, loss, and femininity.', 29, 'Rupi Kaur', 'Createspace', '', -5, 'G001'),
('B002', 'Pride and Prejudice', 'ï¿½It is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife.ï¿½ So begins Pride and Prejudice, Jane Austenï¿½s witty comedy of manners', 30, ' Jane Austen', 'Modern Library', '', 13, 'G001'),
('B003', 'Memories of Geisha', 'A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite', 15, 'Arthur Golden', 'Random House Large Print Publishing ', '', -8, 'G001'),
('B004', 'Idiot Genius', '"From its engaging drawings to its powerful message, Idiot Genius will leave readers musing about Willa Snap\'s adventures long after the winding story concludes.', 70, 'Richard Due', 'Gibbering Gnome Press', '', 7, 'G002'),
('B005', 'The Riddle in Stone Trilogy', 'In the world of fantasy novels, Robert Evert is a supernova talent, and the RIDDLE IN STONE series brings twisting suspense and an unforgettable protagonist into the pantheon of great books.', 67, 'Robert Evert', 'Diversion Books', '', 17, 'G002'),
('B006', 'Undone', 'USA Today and New York Times bestselling author, Wendy Higgins, brings you the gripping, sensual conclusion to her apocalyptic trilogy.\r\n', 45, 'Wendy Higgins ', 'A Division of Ingenious Inventions Run Amok, Ink', '', 42, 'G002'),
('B007', 'The Hunger Game', 'The nation of Panem, formed from a post-apocalyptic North America, is a country that consists of a wealthy Capitol region surrounded by 12 poorer districts.', 87, 'Suzanne Collins', 'Scholastic Press', '', 60, 'G003'),
('B008', 'The Maze Runner', 'When Thomas wakes up in the lift, the only thing he can remember is his name. ', 67, ' James Dashner', 'Delacorte Press', '', -4, 'G003'),
('B009', 'The Lightning Thief ', 'Percy Jackson is a good kid, but he can\'t seem to focus on his schoolwork or control his temper.', 56, ' Rick Riordan', 'Disney Hyperion Books', '', 36, 'G003'),
('B010', 'IT', 'vgfdchjsdnkjvf vnkdfjbvkhjbfd jk', 67, 'John', 'Warner Bros. Pictures', '1995-03-15', NULL, 'G004');

-- --------------------------------------------------------

--
-- Table structure for table `bookpurchase`
--

CREATE TABLE `bookpurchase` (
  `paymentId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `purchaseQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookpurchase`
--

INSERT INTO `bookpurchase` (`paymentId`, `bookId`, `purchaseQuantity`) VALUES
('P001', 'B005', 2),
('P002', 'B004', 10),
('P002', 'B007', 10),
('P003', 'B003', 7),
('P004', 'B001', 8),
('P004', 'B004', 3),
('P004', 'B008', 6),
('P005', 'B003', 9),
('P005', 'B005', 8),
('P006', 'B008', 8),
('P007', 'B001', 7);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` varchar(10) NOT NULL,
  `bookRating` int(11) NOT NULL,
  `bookComment` varchar(255) NOT NULL,
  `feedbackDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `bookRating`, `bookComment`, `feedbackDateTime`, `memberId`, `bookId`) VALUES
('F001', 8, 'Nice', '2018-02-22 12:57:19', 'M001', 'B005'),
('F002', 10, 'I love it!', '2018-02-22 13:07:57', 'M002', 'B005'),
('F003', 9, 'ghj', '2018-02-22 13:10:13', 'M002', 'B008'),
('F004', 6, 'sdfghjk', '2018-02-22 13:10:28', 'M002', 'B009'),
('F005', 7, 'sdfghjkl', '2018-02-23 02:17:35', 'M003', 'B003');

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

--
-- Dumping data for table `feedbackrating`
--

INSERT INTO `feedbackrating` (`memberId`, `feedbackId`, `feedbackRating`, `feedbackRatingDateTime`) VALUES
('M001', 'F003', 3, '2018-02-22 13:10:52'),
('M001', 'F004', 3, '2018-02-22 13:38:24'),
('M002', 'F001', 3, '2018-02-22 13:07:42');

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
('G003', 'Action'),
('G004', 'Horror');

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
  `memberTrust` tinyint(1) NOT NULL DEFAULT '0',
  `memberPoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `memberEmail`, `memberName`, `memberPw`, `memberAddress`, `memberPhone`, `memberCreditCard`, `memberTrust`, `memberPoint`) VALUES
('M001', 'lizwei98@gmail.com', 'Liz Wei', '$2y$10$IUYHEKYvylSPloFnR3voHeD99pJG46wGeMErpL4iqn2mJj5v1BgL6', 'Ampang', '567', '456789', 0, 90),
('M002', 'dfghj@jkl.com', 'HK', '$2y$10$bOMtHitiCbK2hqdXWmLaT.2CzcQBIcrKd8pq71W0wJis7RZGeIZAe', 'fgh', '4567', '7654', 0, 170),
('M003', 'leehongtuck@gmail.com', 'HT', '$2y$10$kcGR43eR1TpbwuRGa5vXfecDhmHsFd9RaW.n5QWA2x9Ke0uezryWa', 'puchong', '2345678', '34567890', 0, 70);

-- --------------------------------------------------------

--
-- Table structure for table `memberlogin`
--

CREATE TABLE `memberlogin` (
  `memberId` varchar(10) NOT NULL,
  `loginDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberlogin`
--

INSERT INTO `memberlogin` (`memberId`, `loginDateTime`) VALUES
('M001', '2018-02-22 12:54:00'),
('M001', '2018-02-22 13:08:29'),
('M001', '2018-02-22 13:10:42'),
('M001', '2018-02-23 01:41:52'),
('M001', '2018-02-23 01:45:42'),
('M001', '2018-02-23 01:47:17'),
('M001', '2018-02-23 02:18:38'),
('M001', '2018-02-23 02:42:17'),
('M002', '2018-02-22 13:06:46'),
('M002', '2018-02-22 13:10:04'),
('M003', '2018-02-23 02:13:04'),
('M003', '2018-02-23 02:17:16');

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

--
-- Dumping data for table `memberreward`
--

INSERT INTO `memberreward` (`memberId`, `rewardId`, `claimDateTime`, `claimQuantity`) VALUES
('M001', 'R001', '2018-02-22 13:05:02', 1),
('M001', 'R001', '2018-02-23 02:27:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` varchar(10) NOT NULL,
  `paymentDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memberId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `paymentDateTime`, `memberId`) VALUES
('P001', '2018-02-22 12:56:41', 'M001'),
('P002', '2018-02-22 13:03:39', 'M001'),
('P003', '2018-02-22 13:04:37', 'M001'),
('P004', '2018-02-22 13:07:16', 'M002'),
('P005', '2018-02-22 13:36:41', 'M001'),
('P006', '2018-02-23 01:42:00', 'M001'),
('P007', '2018-02-23 02:13:29', 'M003');

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
('R001', 'RM10 llaollao Voucher', 'RM10 discount with purchase in llaollao ', 200, 8),
('R002', 'RM20 Zalora Voucher', 'RM20 discount with minimum RM 100 purchase in Zalora', 300, 4),
('R003', '50% discount of Domino Pizza', '50% discount when puchase in Domino Pizza', 400, 7);

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

CREATE TABLE `stockorder` (
  `orderId` varchar(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderStatus` varchar(20) DEFAULT '0',
  `arrivalDate` timestamp NULL DEFAULT NULL,
  `managerId` varchar(10) NOT NULL,
  `supplierId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockorder`
--

INSERT INTO `stockorder` (`orderId`, `orderDate`, `orderStatus`, `arrivalDate`, `managerId`, `supplierId`) VALUES
('O001', '2018-02-22 14:22:35', '1', '2018-02-22 14:24:00', 'A001', 'S001'),
('O002', '2018-02-22 14:23:01', '1', '2018-02-22 14:24:00', 'A001', 'S001'),
('O003', '2018-02-22 14:23:11', '0', '2018-02-22 14:24:00', 'A001', 'S003');

-- --------------------------------------------------------

--
-- Table structure for table `stockorderinfo`
--

CREATE TABLE `stockorderinfo` (
  `orderId` varchar(10) NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `orderQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockorderinfo`
--

INSERT INTO `stockorderinfo` (`orderId`, `bookId`, `orderQuantity`) VALUES
('O001', 'B001', 70),
('O001', 'B004', 70),
('O001', 'B006', 20),
('O002', 'B002', 50),
('O003', 'B005', 20);

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
-- Indexes for table `memberlogin`
--
ALTER TABLE `memberlogin`
  ADD PRIMARY KEY (`memberId`,`loginDateTime`);

--
-- Indexes for table `memberreward`
--
ALTER TABLE `memberreward`
  ADD PRIMARY KEY (`memberId`,`rewardId`,`claimDateTime`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
