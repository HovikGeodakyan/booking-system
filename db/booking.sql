-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 16 2014 г., 19:18
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(50) NOT NULL,
  `title_german` varchar(50) NOT NULL,
  `text_english` varchar(255) NOT NULL,
  `text_german` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource`, `outlet_id`) VALUES
(61, 'Event', '2014-04-11 22:00:00', '2014-04-11 22:15:00', 'A', 0),
(62, 'Event', '2014-04-13 20:00:00', '2014-04-13 20:45:00', 'K', 0),
(63, 'Event', '2014-04-13 19:45:00', '2014-04-13 20:45:00', 'M', 0),
(64, 'Event', '2014-04-13 20:45:00', '2014-04-13 21:30:00', 'K', 0),
(65, 'Event', '2014-04-16 20:45:00', '2014-04-16 21:00:00', 't2', 0),
(66, 'Event', '2014-04-16 19:00:00', '2014-04-16 19:15:00', 'K', 0),
(67, 'Event', '2014-04-16 20:00:00', '2014-04-16 20:15:00', 't3', 0),
(68, 'Event', '2014-04-16 19:45:00', '2014-04-16 20:45:00', 't2', 0),
(69, 'Event', '2014-04-16 19:30:00', '2014-04-16 19:45:00', 't3', 0),
(70, 'Event', '2014-04-16 19:30:00', '2014-04-16 19:45:00', 't4', 0),
(71, 'Event', '2014-04-16 20:00:00', '2014-04-16 20:15:00', 't4', 0),
(72, 'Event', '2014-04-16 20:45:00', '2014-04-16 21:00:00', 't1', 0),
(73, 'Event', '2014-04-16 19:45:00', '2014-04-16 20:00:00', 't4', 0),
(74, 'Event', '2014-04-16 19:00:00', '2014-04-16 20:15:00', 'ee', 0),
(75, 'Event', '2014-04-16 19:15:00', '2014-04-16 19:30:00', 'na1', 65),
(76, 'Event', '2014-04-16 21:00:00', '2014-04-16 22:45:00', 'na3', 65),
(77, 'Event', '2014-04-16 19:45:00', '2014-04-16 21:30:00', 'na2', 0),
(78, 'Event', '2014-04-16 20:45:00', '2014-04-16 21:30:00', '61', 65),
(79, 'Event', '2014-04-16 20:00:00', '2014-04-16 20:15:00', '60', 65),
(80, 'Event', '2014-04-16 20:15:00', '2014-04-16 21:00:00', 'na1', 65),
(81, 'Event', '2014-04-16 21:30:00', '2014-04-16 21:45:00', 'na2', 65);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `start`, `end`, `message`, `outlet_id`) VALUES
(14, 'qwe', '2014-04-16', '2014-04-27', 'wqeqw', 0),
(16, 'rerere', '0000-00-00', '0000-00-00', 'deleted', 65),
(17, 'dssddsds', '0000-00-00', '0000-00-00', 'deleted', 65),
(18, 'asdfghgh', '2014-04-16', '2014-04-18', 'asdfdsfsd', 65),
(23, 'Hellowin', '2014-04-16', '2014-04-18', 'asdfdsfsd', 0),
(24, 'New Year', '2014-03-31', '2014-05-04', 'sdghfjg', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Дамп данных таблицы `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `email`, `description`, `seats_number`, `tables_number`, `default_not_bookable_table_lunch`, `default_not_bookable_table_dinner`, `default_not_bookable_table_pre_concert`, `default_not_bookable_table_concert`, `default_not_bookable_table_post_concert`, `open_time`, `close_time`, `break_start_time`, `break_end_time`, `day_off`, `no_show_limit`, `staying_time_lunch`, `staying_time_dinner`, `staying_time_pre_concert`, `staying_time_concert`, `staying_time_post_concert`, `open_time_1`, `close_time_1`, `break_start_time_1`, `break_end_time_1`, `open_time_2`, `close_time_2`, `break_start_time_2`, `break_end_time_2`, `open_time_3`, `close_time_3`, `break_start_time_3`, `break_end_time_3`, `open_time_4`, `close_time_4`, `break_start_time_4`, `break_end_time_4`, `open_time_5`, `close_time_5`, `break_start_time_5`, `break_end_time_5`, `open_time_6`, `close_time_6`, `break_start_time_6`, `break_end_time_6`, `open_time_0`, `close_time_0`, `break_start_time_0`, `break_end_time_0`, `online_bookable`, `deleted`, `active`) VALUES
(65, 'Standart12', 'hovik.geodakyan@gmail.com', 'online-bookable', 2, 2, 3, 4, 4, 3, 3, '10:00:00', '23:16:00', '14:15:00', '17:03:00', 4, 11, '03:05:00', '04:01:00', '02:01:00', '00:01:00', '02:01:00', '03:02:00', '02:02:00', '02:02:00', '01:04:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '08:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '08:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 1),
(66, 'asd', 'asd@mail.ru', '', 2, 2, 0, 0, 0, 0, 0, '01:01:00', '00:01:00', '00:00:00', '00:00:00', 1, 3, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(67, 'iki', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:01:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(68, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(69, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(70, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(71, 'asd', 'asd@mail.ru', '', 2, 1, 0, 0, 0, 0, 0, '00:01:00', '01:02:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(72, 'asd', 'asd@mail.ru', '', 2, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 1, 0),
(73, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(74, 'asd', 'asd@mail.ru', '', 1, 1, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(75, 'asd', 'asd@mail.ru', '', 1, 4, 0, 0, 0, 0, 0, '22:22:00', '22:22:00', '00:00:00', '00:00:00', 1, 4, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(76, 'teb', 'asd@mail.ru', '', 3, 4, 0, 0, 0, 0, 0, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 1, 4, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(77, 'hello', 'hovik.geodakyan@gmail.com', 'asdasdasda', 2, 3, 3, 3, 3, 3, 3, '11:11:00', '11:11:00', '00:00:00', '00:00:00', 2, 4, '03:33:00', '04:44:00', '03:33:00', '22:22:00', '11:11:00', '11:11:00', '22:02:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '03:33:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '04:44:00', '00:00:00', '00:00:00', 1, 0, 0),
(78, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(79, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(80, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(81, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(82, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(83, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(84, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(85, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(86, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(87, 'qwe', 'qwe@qwe.qwe', '', 2, 3, 0, 0, 0, 0, 0, '03:01:00', '15:24:00', '00:00:00', '00:00:00', 1, 11, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(88, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(89, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(90, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(91, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(92, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(93, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '00:14:00', '11:13:00', '03:14:00', '20:20:00', 1, 17, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(94, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '15:18:00', '08:40:00', '00:00:00', '00:00:00', 1, 12, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(95, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 1, 0, 0, 0, 0, 0, '15:18:00', '08:40:00', '00:00:00', '00:00:00', 1, 12, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(96, 'gdsgtdsa', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '00:15:00', '13:16:00', '00:00:00', '00:00:00', 1, 6, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(97, 'gdsgtdsa', 'aaaa@aaas.aaaa', '', 2, 3, 0, 0, 0, 0, 0, '00:15:00', '13:16:00', '00:00:00', '00:00:00', 1, 6, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(98, 'gdsgtdsa', 'aaaa@aaas.aaaa', '', 2, 3, 0, 0, 0, 0, 0, '00:15:00', '13:16:00', '00:00:00', '00:00:00', 1, 6, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(99, 'Extrordinary', 'hovik.geodakyan@gmail.com', '', 2, 3, 0, 0, 0, 0, 0, '00:18:00', '11:22:00', '00:00:00', '00:00:00', 1, 15, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(100, 'a', 'qwe@qwe.qwe', '', 3, 5, 0, 0, 0, 0, 0, '21:16:00', '14:14:00', '00:00:00', '00:00:00', 1, 7, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(101, 'a', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '00:12:00', '16:20:00', '15:19:00', '10:19:00', 1, 14, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(102, 'Extrordinary', 'hovik.geodakyan@gmail.com', '', 2, 3, 0, 0, 0, 0, 0, '09:20:00', '22:19:00', '10:17:00', '20:34:00', 1, 16, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(103, 'Extrordinary', 'hovik.geodakyan@gmail.com', '', 2, 3, 0, 0, 0, 0, 0, '09:20:00', '22:19:00', '10:17:00', '20:34:00', 1, 16, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(104, 'Extrordinary', 'hovik.geodakyan@gmail.com', '', 2, 3, 0, 0, 0, 0, 0, '09:20:00', '22:19:00', '10:17:00', '20:34:00', 1, 16, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(105, 'Extrordinary', 'hovik.geodakyan@gmail.com', '', 2, 3, 0, 0, 0, 0, 0, '09:20:00', '22:19:00', '10:17:00', '20:34:00', 1, 16, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(106, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '00:08:00', '01:02:00', '01:02:00', '01:01:00', 1, 2, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(107, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '00:08:00', '01:02:00', '01:02:00', '01:01:00', 1, 2, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(108, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '00:08:00', '01:02:00', '01:02:00', '01:01:00', 1, 2, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(109, 'Extrordinary', 'aaaa@aaas.aaaa', '', 2, 2, 0, 0, 0, 0, 0, '02:15:00', '16:16:00', '17:10:00', '07:18:00', 1, 2, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0),
(110, 'Extrordinary', 'aaaa@aaas.aaaa', '', 1, 3, 0, 0, 0, 0, 0, '18:00:00', '19:17:00', '18:10:00', '05:15:00', 1, 6, '00:11:00', '10:21:00', '00:14:00', '05:12:00', '04:10:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `seats_standart_number`, `seats_max_number`, `combinable`, `location`, `outlet_id`) VALUES
(55, 2, 3, 1, 1, 109),
(56, 2, 4, 1, 1, 109),
(57, 111, 111, 1, 1, 110),
(58, 555, 555, 0, 2, 110),
(59, 333, 333, 0, 3, 110),
(60, 4, 5, 1, 1, 65),
(61, 2, 4, 1, 1, 65);

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
