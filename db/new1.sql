-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
<<<<<<< HEAD
-- Время создания: Май 16 2014 г., 18:01
=======
-- Время создания: Май 15 2014 г., 19:04
>>>>>>> 828e841a16fc160afa42d01a440e08ce505aac4f
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `booking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `language` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `subject` varchar(250) NOT NULL,
  `treatment` varchar(250) NOT NULL,
<<<<<<< HEAD
  `ps` varchar(250) NOT NULL,
  UNIQUE KEY `language` (`language`)
=======
  `ps` varchar(250) NOT NULL
>>>>>>> 828e841a16fc160afa42d01a440e08ce505aac4f
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `outlet_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `general_settings`
--

CREATE TABLE IF NOT EXISTS `general_settings` (
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `message` text NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;
>>>>>>> 828e841a16fc160afa42d01a440e08ce505aac4f

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `concert_name` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `outlets`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

-- --------------------------------------------------------

--
-- Структура таблицы `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(50) NOT NULL,
  `guest_type` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `guest_number` int(10) NOT NULL,
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
<<<<<<< HEAD
  `comment` varchar(250) NOT NULL,
=======
  `commet` varchar(250) NOT NULL,
>>>>>>> 828e841a16fc160afa42d01a440e08ce505aac4f
  `provisional` tinyint(5) NOT NULL DEFAULT '0',
  `expiery_date` date NOT NULL,
  `WB` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=207 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=206 ;
>>>>>>> 828e841a16fc160afa42d01a440e08ce505aac4f

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` int(20) NOT NULL,
  `seats_standart_number` int(20) NOT NULL,
  `seats_max_number` int(20) NOT NULL,
  `combinable` tinyint(2) NOT NULL,
  `location` int(5) NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
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
  `avatar` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
