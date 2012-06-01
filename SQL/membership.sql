-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2012 at 10:17 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `membership`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_services`
--

CREATE TABLE IF NOT EXISTS `additional_services` (
  `additional_services_id` int(11) NOT NULL AUTO_INCREMENT,
  `aMember_id` tinyint(5) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_amount` double(11,2) DEFAULT '0.00',
  `period` tinyint(5) DEFAULT NULL,
  `period_type` varchar(255) NOT NULL,
  `is_child_care` tinyint(1) DEFAULT '0',
  `order_by` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`additional_services_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `additional_services`
--

INSERT INTO `additional_services` (`additional_services_id`, `aMember_id`, `service_name`, `service_amount`, `period`, `period_type`, `is_child_care`, `order_by`) VALUES
(1, 7, 'Tanning', 25.00, 1, 'Month', 0, 1),
(2, 8, 'Towel Service', 10.00, 1, 'Month', 0, 2),
(3, 13, 'Child #1', 25.00, 1, 'Month', 1, 3),
(4, 14, 'Child #2', 15.00, 1, 'Month', 1, 4),
(5, 15, 'Child #3', 10.00, 1, 'Month', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `primary_member`
--

CREATE TABLE IF NOT EXISTS `primary_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_first_name` varchar(255) NOT NULL,
  `member_last_name` varchar(255) NOT NULL,
  `club_membership_status` int(3) NOT NULL,
  `member_birth_date` date DEFAULT NULL,
  `member_gender` enum('Male','Female') DEFAULT 'Male',
  `member_address1` varchar(255) DEFAULT NULL,
  `member_address2` varchar(255) DEFAULT NULL,
  `member_city` varchar(255) DEFAULT NULL,
  `member_state` varchar(255) DEFAULT NULL,
  `member_zip` varchar(255) DEFAULT NULL,
  `member_phone` varchar(255) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `primary_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `primary_member_services`
--

CREATE TABLE IF NOT EXISTS `primary_member_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_amount` double(11,2) DEFAULT '0.00',
  `period` tinyint(5) DEFAULT NULL,
  `period_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `primary_member_services`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` double(11,2) DEFAULT '0.00',
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trasaction_status` enum('P','D','S') DEFAULT 'P',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `primary_member_services`
--
ALTER TABLE `primary_member_services`
  ADD CONSTRAINT `primary_member_services_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `primary_member` (`member_id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `primary_member` (`member_id`) ON DELETE CASCADE;
