-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 14 2014 г., 01:31
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `booking`
--
CREATE DATABASE IF NOT EXISTS `booking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booking`;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource`) VALUES
(61, 'Event', '2014-04-11 22:00:00', '2014-04-11 22:15:00', 'A'),
(62, 'Event', '2014-04-13 20:00:00', '2014-04-13 20:45:00', 'K'),
(63, 'Event', '2014-04-13 19:45:00', '2014-04-13 20:45:00', 'M'),
(64, 'Event', '2014-04-13 20:45:00', '2014-04-13 21:30:00', 'K');

-- --------------------------------------------------------

--
-- Структура таблицы `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `message` text NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
  `open_time_7` time NOT NULL DEFAULT '00:00:00',
  `close_time_7` time NOT NULL DEFAULT '00:00:00',
  `break_start_time_7` time NOT NULL DEFAULT '00:00:00',
  `break_end_time_7` time NOT NULL DEFAULT '00:00:00',
  `online_bookable` tinyint(2) NOT NULL DEFAULT '1',
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Дамп данных таблицы `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `email`, `description`, `seats_number`, `tables_number`, `default_not_bookable_table_lunch`, `default_not_bookable_table_dinner`, `default_not_bookable_table_pre_concert`, `default_not_bookable_table_concert`, `default_not_bookable_table_post_concert`, `open_time`, `close_time`, `break_start_time`, `break_end_time`, `day_off`, `no_show_limit`, `staying_time_lunch`, `staying_time_dinner`, `staying_time_pre_concert`, `staying_time_concert`, `staying_time_post_concert`, `open_time_1`, `close_time_1`, `break_start_time_1`, `break_end_time_1`, `open_time_2`, `close_time_2`, `break_start_time_2`, `break_end_time_2`, `open_time_3`, `close_time_3`, `break_start_time_3`, `break_end_time_3`, `open_time_4`, `close_time_4`, `break_start_time_4`, `break_end_time_4`, `open_time_5`, `close_time_5`, `break_start_time_5`, `break_end_time_5`, `open_time_6`, `close_time_6`, `break_start_time_6`, `break_end_time_6`, `open_time_7`, `close_time_7`, `break_start_time_7`, `break_end_time_7`, `online_bookable`, `deleted`) VALUES
(65, 'Standart12', 'hovik.geodakyan@gmail.com', 'online-bookable', 2, 6, 3, 4, 4, 3, 3, '02:14:00', '23:16:00', '05:15:00', '10:03:00', 4, 11, '03:05:00', '04:01:00', '02:01:00', '00:01:00', '02:01:00', '03:02:00', '02:02:00', '02:02:00', '01:04:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(66, 'asd', 'asd@mail.ru', '', 2, 2, 0, 0, 0, 0, 0, '01:01:00', '00:01:00', '00:00:00', '00:00:00', 1, 3, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(67, 'iki', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:01:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(68, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(69, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(70, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(71, 'asd', 'asd@mail.ru', '', 2, 1, 0, 0, 0, 0, 0, '00:01:00', '01:02:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(72, 'asd', 'asd@mail.ru', '', 2, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1),
(73, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(74, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(75, 'asd', 'asd@mail.ru', '', 1, 4, 0, 0, 0, 0, 0, '22:22:00', '22:22:00', '00:00:00', '00:00:00', 1, 4, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(76, 'teb', 'asd@mail.ru', '', 3, 4, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 4, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(77, 'hello', 'hovik.geodakyan@gmail.com', 'asdasdasda', 2, 3, 3, 3, 3, 3, 3, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 2, 4, '03:33:00', '04:44:00', '03:33:00', '22:22:00', '11:11:00', '11:11:00', '22:02:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '03:33:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '04:44:00', '00:00:00', '00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `seats_standart_number` int(20) NOT NULL,
  `seats_max_number` int(20) NOT NULL,
  `combinable` tinyint(2) NOT NULL,
  `location` int(5) NOT NULL,
  `outlet_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `seats_standart_number`, `seats_max_number`, `combinable`, `location`, `outlet_id`) VALUES
(39, 0, 0, 1, 1, 75),
(40, 0, 0, 1, 1, 75),
(41, 0, 0, 1, 1, 75),
(42, 0, 0, 1, 1, 75),
(43, 2, 4, 1, 1, 76),
(44, 4, 4, 1, 3, 76),
(45, 4, 5, 0, 2, 76),
(46, 4, 3, 0, 2, 76),
(47, 0, 0, 1, 1, 77),
(48, 0, 0, 1, 1, 77),
(49, 0, 0, 1, 1, 77);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `realname`, `password`, `email`, `role`, `active`, `last-login`, `modified`, `autofill`, `deleted`, `created`, `confirmation_code`, `last_ip`, `language`) VALUES
(1, 'hovik', 'Hovik', 'qwe', 'qwe@qwe.qew', 1, 1, '2014-04-01 00:00:00', '2014-04-01 00:00:00', 1, 0, '0000-00-00 00:00:00', '', '', 'German'),
(2, 'valod88', 'Valod', 'qwe', 'qwe@qwe.qew', 6, 1, '2014-04-01 00:00:00', '2014-04-10 17:17:22', 1, 0, '0000-00-00 00:00:00', '', '', 'English'),
(3, 'Ara', 'Ara', 'qwe', 'qwe@qwe.qew', 2, 1, '2014-04-01 00:00:00', '2014-04-11 14:18:41', 1, 0, '0000-00-00 00:00:00', '', '', 'English'),
(6, 'bbb', 'Bbb', 'd41d8cd98f00b204e9800998ecf8427e', 'bbb@bbb.bbb', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '2014-04-11 14:35:47', '', '', 'German'),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1, 1, '0000-00-00 00:00:00', '2014-04-11 14:55:38', 0, 1, '2014-04-11 14:55:38', '', '', 'English'),
(8, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1, 1, '0000-00-00 00:00:00', '2014-04-11 14:58:39', 0, 1, '2014-04-11 14:58:39', '', '', 'English');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
