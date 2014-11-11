-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 05:21 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

GRANT USAGE ON *.* TO 'inv_user'@'localhost';

DROP USER 'inv_user'@'localhost';

CREATE USER 'inv_user'@'localhost' IDENTIFIED BY 'inv123';

FLUSH PRIVILEGES;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invdemo`
--
CREATE DATABASE IF NOT EXISTS `invdemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `invdemo`;

GRANT ALL PRIVILEGES ON invdemo.* TO 'inv_user'@'localhost';

FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `item_name` varchar(128) DEFAULT NULL,
  `item_price` decimal(7,2) DEFAULT NULL,
  `item_color` varchar(64) DEFAULT NULL,
  `item_condition` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_name`, `item_price`, `item_color`, `item_condition`) VALUES
('Sweater', '150.00', 'Red', 'NEW'),
('Shirt', '230.00', 'Yellow', 'LIKE_NEW'),
('T-shirt', '15.25', 'Grey', 'MODERATE_WEAR'),
('Shorts', '47.00', 'Olive Drab', 'GENTLY_USED'),
('Sneakers', '53.75', 'Navy', 'NEW');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
