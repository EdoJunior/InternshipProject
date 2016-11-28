-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2016 at 02:44 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bankclient`
--

-- --------------------------------------------------------

--
-- Table structure for table `beleggen`
--

CREATE TABLE IF NOT EXISTS `beleggen` (
  `beleg_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `investment_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beleggen`
--

INSERT INTO `beleggen` (`beleg_id`, `users_user_id`, `investment_name`) VALUES
(1, 1, 'Shares'),
(2, 3, 'Bonds'),
(3, 1, 'Stocks'),
(4, 4, 'Low-risk '),
(5, 6, 'Real Estate');

-- --------------------------------------------------------

--
-- Table structure for table `betalen`
--

CREATE TABLE IF NOT EXISTS `betalen` (
  `idbetalen` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `product_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `betalen`
--

INSERT INTO `betalen` (`idbetalen`, `users_user_id`, `payment_type`, `product_name`) VALUES
(1, 1, 'Cash', 'insurance');

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE IF NOT EXISTS `creditcard` (
  `creditcard_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`creditcard_id`, `users_user_id`, `type`) VALUES
(2, 1, 'ABNA'),
(3, 2, 'ING'),
(4, 4, 'Rabobank'),
(6, 5, 'ANWB'),
(7, 3, 'Visa'),
(8, 6, 'American Express'),
(9, 6, 'American Express'),
(10, 7, 'ABNA'),
(11, 8, 'ING');

-- --------------------------------------------------------

--
-- Table structure for table `krediet`
--

CREATE TABLE IF NOT EXISTS `krediet` (
  `krediet_id` int(11) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `creditcard_creditcard_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krediet`
--

INSERT INTO `krediet` (`krediet_id`, `amount`, `creditcard_creditcard_id`) VALUES
(1, '5453.89', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE IF NOT EXISTS `lease` (
  `lease_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `Item` varchar(45) NOT NULL,
  `years_leased` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`lease_id`, `users_user_id`, `Item`, `years_leased`) VALUES
(1, 3, 'Office Equipment', 3),
(2, 1, 'Moving van', 2),
(3, 5, '3 Home computers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lenen`
--

CREATE TABLE IF NOT EXISTS `lenen` (
  `lenen_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `outstanding` float NOT NULL,
  `interest_rate` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lenen`
--

INSERT INTO `lenen` (`lenen_id`, `users_user_id`, `amount`, `outstanding`, `interest_rate`, `start_date`, `end_date`) VALUES
(1, 1, 5000, 3500, 0.3, '2016-08-01', '2016-09-15'),
(2, 8, 1000, 100, 0.01, '2016-08-17', '2016-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `mortgage`
--

CREATE TABLE IF NOT EXISTS `mortgage` (
  `mortgage_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` float(5,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mortgage`
--

INSERT INTO `mortgage` (`mortgage_id`, `type`, `amount`) VALUES
(1, 'house', 200.50);

-- --------------------------------------------------------

--
-- Table structure for table `sparen`
--

CREATE TABLE IF NOT EXISTS `sparen` (
  `sparen_id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `interest_rate` int(11) DEFAULT NULL,
  `balance` decimal(15,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparen`
--

INSERT INTO `sparen` (`sparen_id`, `type`, `users_user_id`, `interest_rate`, `balance`) VALUES
(1, 'Debit', 1, NULL, '1000.55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `fn` varchar(25) DEFAULT NULL,
  `ln` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fn`, `ln`, `address`, `phone`) VALUES
(1, 'john', 'grey', 'st.james str 29', 5555),
(2, 'Ellena', 'Brown', 'Genip Rd. #45', 5993628),
(3, 'James', 'Glen', 'Watermelon 23 Av', 559386),
(4, 'Jeniffer', 'Van Jin', 'Watermelon 23 Av', 528943),
(5, 'Creg', 'Nevil', 'Watermelon 23 Av', 550000),
(6, 'Billy', 'Hennis', 'Watermelon 23 Av', 578696),
(7, 'Sandra', 'Blacks', 'Watermelon 23 Av', 55639),
(8, 'Ashlee', 'Galvon', 'Watermelon 23 Av', 554533),
(9, 'Ben', 'Trump', 'Watermelon 23 Av', 5563900);

-- --------------------------------------------------------

--
-- Table structure for table `verzekeren`
--

CREATE TABLE IF NOT EXISTS `verzekeren` (
  `verz_id` int(11) NOT NULL,
  `users_user_id` int(11) NOT NULL,
  `Items` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verzekeren`
--

INSERT INTO `verzekeren` (`verz_id`, `users_user_id`, `Items`) VALUES
(1, 1, 'Personal '),
(2, 1, 'Home'),
(3, 1, 'Car'),
(4, 2, 'Personal'),
(5, 3, 'Personal'),
(6, 4, 'Personal'),
(7, 5, 'Personal'),
(8, 6, 'Personal'),
(9, 7, 'Personal'),
(10, 8, 'Personal'),
(11, 9, 'Personal'),
(12, 5, 'Car'),
(13, 8, 'Car'),
(14, 7, 'Home'),
(15, 3, 'Home');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beleggen`
--
ALTER TABLE `beleggen`
  ADD PRIMARY KEY (`beleg_id`), ADD KEY `fk_beleggen_users1_idx` (`users_user_id`);

--
-- Indexes for table `betalen`
--
ALTER TABLE `betalen`
  ADD PRIMARY KEY (`idbetalen`), ADD KEY `fk_betalen_users1_idx` (`users_user_id`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`creditcard_id`), ADD KEY `fk_creditcard_users_idx` (`users_user_id`);

--
-- Indexes for table `krediet`
--
ALTER TABLE `krediet`
  ADD PRIMARY KEY (`krediet_id`), ADD KEY `fk_krediet_creditcard1_idx` (`creditcard_creditcard_id`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`lease_id`), ADD KEY `fk_lease_users1_idx` (`users_user_id`);

--
-- Indexes for table `lenen`
--
ALTER TABLE `lenen`
  ADD PRIMARY KEY (`lenen_id`), ADD KEY `fk_lenen_users1_idx` (`users_user_id`);

--
-- Indexes for table `mortgage`
--
ALTER TABLE `mortgage`
  ADD PRIMARY KEY (`mortgage_id`);

--
-- Indexes for table `sparen`
--
ALTER TABLE `sparen`
  ADD PRIMARY KEY (`sparen_id`), ADD KEY `fk_sparen_users1_idx` (`users_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verzekeren`
--
ALTER TABLE `verzekeren`
  ADD PRIMARY KEY (`verz_id`), ADD KEY `fk_verzekeren_users1_idx` (`users_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beleggen`
--
ALTER TABLE `beleggen`
  MODIFY `beleg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `betalen`
--
ALTER TABLE `betalen`
  MODIFY `idbetalen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `creditcard_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `krediet`
--
ALTER TABLE `krediet`
  MODIFY `krediet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lease`
--
ALTER TABLE `lease`
  MODIFY `lease_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lenen`
--
ALTER TABLE `lenen`
  MODIFY `lenen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mortgage`
--
ALTER TABLE `mortgage`
  MODIFY `mortgage_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sparen`
--
ALTER TABLE `sparen`
  MODIFY `sparen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `verzekeren`
--
ALTER TABLE `verzekeren`
  MODIFY `verz_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `beleggen`
--
ALTER TABLE `beleggen`
ADD CONSTRAINT `fk_beleggen_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `betalen`
--
ALTER TABLE `betalen`
ADD CONSTRAINT `fk_betalen_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
ADD CONSTRAINT `fk_creditcard_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `krediet`
--
ALTER TABLE `krediet`
ADD CONSTRAINT `fk_krediet_creditcard1` FOREIGN KEY (`creditcard_creditcard_id`) REFERENCES `creditcard` (`creditcard_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lease`
--
ALTER TABLE `lease`
ADD CONSTRAINT `fk_lease_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lenen`
--
ALTER TABLE `lenen`
ADD CONSTRAINT `fk_lenen_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sparen`
--
ALTER TABLE `sparen`
ADD CONSTRAINT `fk_sparen_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `verzekeren`
--
ALTER TABLE `verzekeren`
ADD CONSTRAINT `fk_verzekeren_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
