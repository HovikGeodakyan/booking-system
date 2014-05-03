-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2014 at 01:30 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(50) NOT NULL,
  `title_german` varchar(50) NOT NULL,
  `text_english` varchar(255) NOT NULL,
  `text_german` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `message` text NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `concert_name` varchar(50) NOT NULL,
  `concert_start` time DEFAULT NULL,
  `concert_end` time DEFAULT NULL,
  `not_bookable_table_lunch` int(10) NOT NULL,
  `not_bookable_table_dinner` int(10) NOT NULL,
  `not_bookable_table_pre_concert` int(10) NOT NULL,
  `not_bookable_table_concert` int(10) NOT NULL,
  `not_bookable_table_post_concert` int(10) NOT NULL,
  `outlet_id` int(10) NOT NULL,
  `concert_date` date DEFAULT NULL,
  `concert_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  `seats_number` int(20) NOT NULL,
  `tables_number` int(20) NOT NULL,
  `default_not_bookable_table_lunch` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_dinner` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_pre_concert` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_concert` int(5) NOT NULL DEFAULT '0',
  `default_not_bookable_table_post_concert` int(5) NOT NULL DEFAULT '0',
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `break_start_time` time NOT NULL DEFAULT '00:00:00',
  `break_end_time` time NOT NULL DEFAULT '00:00:00',
  `day_off` int(5) NOT NULL,
  `no_show_limit` int(20) NOT NULL DEFAULT '0',
  `staying_time_lunch` time NOT NULL DEFAULT '00:00:00',
  `staying_time_dinner` time NOT NULL DEFAULT '00:00:00',
  `staying_time_pre_concert` time NOT NULL DEFAULT '00:00:00',
  `staying_time_concert` time NOT NULL DEFAULT '00:00:00',
  `staying_time_post_concert` time NOT NULL DEFAULT '00:00:00',
  `open_time_1` time NOT NULL DEFAULT '00:00:00',
  `close_time_1` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_1` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_1` time NOT NULL DEFAULT '00:00:00',
  `open_time_2` time NOT NULL DEFAULT '00:00:00',
  `close_time_2` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_2` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_2` time NOT NULL DEFAULT '00:00:00',
  `open_time_3` time NOT NULL DEFAULT '00:00:00',
  `close_time_3` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_3` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_3` time NOT NULL DEFAULT '00:00:00',
  `open_time_4` time NOT NULL DEFAULT '00:00:00',
  `close_time_4` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_4` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_4` time NOT NULL DEFAULT '00:00:00',
  `open_time_5` time NOT NULL DEFAULT '00:00:00',
  `close_time_5` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_5` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_5` time NOT NULL DEFAULT '00:00:00',
  `open_time_6` time NOT NULL DEFAULT '00:00:00',
  `close_time_6` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_6` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_6` time NOT NULL DEFAULT '00:00:00',
  `open_time_0` time NOT NULL DEFAULT '00:00:00',
  `close_time_0` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_0` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_0` time NOT NULL DEFAULT '00:00:00',
  `online_bookable` tinyint(2) NOT NULL DEFAULT '1',
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  `active` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `guest_number` int(10) NOT NULL,
  `guest_type` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `confirm_via_email` tinyint(2) NOT NULL,
  `resource` varchar(30) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `outlet_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `seats_standart_number` int(20) NOT NULL,
  `seats_max_number` int(20) NOT NULL,
  `combinable` tinyint(2) NOT NULL,
  `location` int(5) NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` int(10) NOT NULL,
  `active` int(2) NOT NULL,
  `last-login` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `autofill` int(2) NOT NULL,
  `deleted` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `confirmation_code` varchar(255) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `language` varchar(50) NOT NULL,
  `avatar` varchar(250) NOT NULL DEFAULT 'a0.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
