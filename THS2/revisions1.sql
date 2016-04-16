-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 01:08 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `revisions1`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_category`
--

CREATE TABLE IF NOT EXISTS `1_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `1_category`
--

INSERT INTO `1_category` (`id`, `category`, `code`) VALUES
(2, 'Mens Accessories', 'MA11'),
(3, 'Womens Accessories', 'WO11'),
(4, 'Others', 'OT11');

-- --------------------------------------------------------

--
-- Table structure for table `1_ma11`
--

CREATE TABLE IF NOT EXISTS `1_ma11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `1_ot11`
--

CREATE TABLE IF NOT EXISTS `1_ot11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `1_wo11`
--

CREATE TABLE IF NOT EXISTS `1_wo11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `1_wo11`
--

INSERT INTO `1_wo11` (`id`, `category`) VALUES
(1, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `2_ot11`
--

CREATE TABLE IF NOT EXISTS `2_ot11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `39_ma11`
--

CREATE TABLE IF NOT EXISTS `39_ma11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `138_category`
--

CREATE TABLE IF NOT EXISTS `138_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `138_category`
--

INSERT INTO `138_category` (`id`, `category`, `code`) VALUES
(1, 'Mens Accessories', 'MA22');

-- --------------------------------------------------------

--
-- Table structure for table `138_ma22`
--

CREATE TABLE IF NOT EXISTS `138_ma22` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `398_ba912`
--

CREATE TABLE IF NOT EXISTS `398_ba912` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `398_category`
--

CREATE TABLE IF NOT EXISTS `398_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `398_category`
--

INSERT INTO `398_category` (`id`, `category`, `code`) VALUES
(1, 'Basketball Accessories ', 'BA912'),
(3, 'Hiking Gear', 'HG123');

-- --------------------------------------------------------

--
-- Table structure for table `398_hg123`
--

CREATE TABLE IF NOT EXISTS `398_hg123` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `client2_history`
--

CREATE TABLE IF NOT EXISTS `client2_history` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `prod_name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `unit` varchar(35) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `lead_time` varchar(50) DEFAULT NULL,
  `terms` varchar(50) NOT NULL,
  `date_ordered` date NOT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client2_history`
--

INSERT INTO `client2_history` (`id`, `client_name`, `location`, `prod_id`, `dept`, `prod_name`, `price`, `unit`, `quantity`, `lead_time`, `terms`, `date_ordered`) VALUES
(0, 'Gio Del Rosario', '123 Cainta Street', 40, 'Womens Accessories', 'Necklace', 125000, 'Box', 250, '30', '60', '2013-09-19'),
(0, 'Gio Del Rosario', '123 Cainta Street', 41, 'Mens Accessories', 'Shoes', 210000, 'Box', 300, '30', '60', '2013-09-19'),
(0, 'Gio Del Rosario', '123 Cainta Street', 42, 'Mens Accessories', 'Bracelet', 112500, 'Box', 375, '30', '60', '2013-09-19'),
(0, 'Jeric Teng', '943 Sampaloc Manila', 43, 'Basketball Accessories', 'Jersey', 250000, 'Box', 2500, '30', '60', '2013-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `client2_pending`
--

CREATE TABLE IF NOT EXISTS `client2_pending` (
  `client_name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `prod_name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `unit` varchar(25) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_ordered` date NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `branches` varchar(100) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `username`, `password`, `client_name`, `branches`, `phone_number`, `email`) VALUES
(2, 'client2', '123456', 'Last, First Middle', 'SM Marikina', 911, 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `damaged_items`
--

CREATE TABLE IF NOT EXISTS `damaged_items` (
  `itemcode` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `numberofdamaged` int(11) NOT NULL,
  `part_damaged` varchar(100) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damaged_items`
--

INSERT INTO `damaged_items` (`itemcode`, `itemname`, `quantity`, `numberofdamaged`, `part_damaged`, `remarks`) VALUES
(42, 'Bracelet', 505, 210, 'Balls', 'Repair ASAP'),
(41, 'Shoes', 600, 10, '', ''),
(40, 'Necklace', -2450, 10, '', ''),
(40, 'Necklace', 550, 10, '', ''),
(43, 'Jersey', 200, 100, '', ''),
(43, 'Jersey', 200, 180, 'Neckline', 'Fix sewing Machine');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`username`, `password`) VALUES
('employee', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemcode` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `unit` varchar(50) NOT NULL,
  `category` varchar(75) NOT NULL,
  `unitprice` float NOT NULL,
  `sellingprice` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(150) NOT NULL,
  `damaged` varchar(30) NOT NULL,
  `numberofdamaged` int(11) NOT NULL,
  `date_recieved` date NOT NULL,
  PRIMARY KEY (`itemcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemcode`, `itemname`, `desc`, `unit`, `category`, `unitprice`, `sellingprice`, `quantity`, `supplier`, `damaged`, `numberofdamaged`, `date_recieved`) VALUES
(40, 'Necklace', 'Clean', 'Pieces', 'Womens Accessories', 500, 500, 550, 'Gio Del Rosario', 'on', 10, '2013-09-18'),
(41, 'Shoes', 'Clean', 'Pieces', 'Mens Accessories', 700, 700, 600, 'Gio Del Rosario', 'on', 10, '2013-09-18'),
(42, 'Bracelet', 'Good', 'Pieces', 'Mens Accessories', 300, 300, 505, 'Gio Del Rosario', 'on', 210, '2013-09-19'),
(43, 'Jersey', 'Red', 'Pieces', 'Basketball Accessories', 100, 100, 200, 'Jeric Teng', 'on', 180, '2013-09-19'),
(44, 'Backpack', 'Large', 'Pieces', 'Hiking Gear', 1200, 1200, 500, 'Jeric Teng', 'on', 100, '2013-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `items_history`
--

CREATE TABLE IF NOT EXISTS `items_history` (
  `itemcode` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `numberofdamaged` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_history`
--

INSERT INTO `items_history` (`itemcode`, `itemname`, `quantity`, `numberofdamaged`) VALUES
(42, 'Bracelet', 505, 210),
(41, 'Shoes', 600, 10),
(40, 'Necklace', -2450, 10),
(40, 'Necklace', 550, 10),
(43, 'Jersey', 200, 100),
(43, 'Jersey', 200, 180);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
  `product_id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `product_name` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `terms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `contact` int(11) NOT NULL,
  `company_name` varchar(70) NOT NULL,
  `person_contact` int(11) NOT NULL,
  `person_contact2` varchar(75) NOT NULL,
  `another_num` int(11) NOT NULL,
  `inter` varchar(25) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `contact`, `company_name`, `person_contact`, `person_contact2`, `another_num`, `inter`, `supplier_id`) VALUES
(5, 'Gio Del Rosario', '123 Cainta Street', 909123, 'Anything', 1232123, 'Mom', 8192932, 'international', 1),
(16, 'Juan Dela Cruz', '123 UST Street', 9111111, '123 Inc.', 912321, 'Juana Dela Cruz', 2147483647, 'International', 138),
(17, 'Jeric Teng', '943 Sampaloc Manila', 123456, 'Maynilad Co.', 901232312, 'Ally De Guzman', 2147483647, 'Local', 398);

-- --------------------------------------------------------

--
-- Table structure for table `_ma11`
--

CREATE TABLE IF NOT EXISTS `_ma11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `_ot11`
--

CREATE TABLE IF NOT EXISTS `_ot11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
