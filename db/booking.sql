-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2014 г., 17:48
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
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource`) VALUES
(61, 'Event', '2014-04-11 22:00:00', '2014-04-11 22:15:00', 'A');

-- --------------------------------------------------------

--
-- Структура таблицы `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `message` text NOT NULL,
  `outlet-id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seats-number` int(20) NOT NULL,
  `tables-number` int(20) NOT NULL,
  `default-not-bookable-table-lunch` int(5) NOT NULL,
  `default-not-bookable-table-dinner` int(5) NOT NULL,
  `default-not-bookable-table-pre-concert` int(5) NOT NULL,
  `default-not-bookable-table-concert` int(5) NOT NULL,
  `default-not-bookable-table-post-concert` int(5) NOT NULL,
  `open-time` time NOT NULL,
  `close-time` time NOT NULL,
  `break-start-time` time NOT NULL,
  `break-end-time` time NOT NULL,
  `day-off` int(5) NOT NULL,
  `no-show-limit` int(20) NOT NULL,
  `staying-time-lunch` time NOT NULL,
  `staying-time-dinner` time NOT NULL,
  `staying-time-pre-concert` time NOT NULL,
  `staying-time-concert` time NOT NULL,
  `staying-time-post-concert` time NOT NULL,
  `open-time-1` time NOT NULL,
  `close-time-1` time NOT NULL,
  `break-start-time-1` time NOT NULL,
  `break-end-time-1` time NOT NULL,
  `open-time-2` time NOT NULL,
  `close-time-2` time NOT NULL,
  `break-start-time-2` time NOT NULL,
  `break-end-time-2` time NOT NULL,
  `open-time-3` time NOT NULL,
  `close-time-3` time NOT NULL,
  `break-start-time-3` time NOT NULL,
  `break-end-time-3` time NOT NULL,
  `open-time-4` time NOT NULL,
  `close-time-4` time NOT NULL,
  `break-start-time-4` time NOT NULL,
  `break-end-time-4` time NOT NULL,
  `open-time-5` time NOT NULL,
  `close-time-5` time NOT NULL,
  `break-start-time-5` time NOT NULL,
  `break-end-time-5` time NOT NULL,
  `open-time-6` time NOT NULL,
  `close-time-6` time NOT NULL,
  `break-start-time-6` time NOT NULL,
  `break-end-time-6` time NOT NULL,
  `open-time-7` time NOT NULL,
  `close-time-7` time NOT NULL,
  `break-start-time-7` time NOT NULL,
  `break-end-time-7` time NOT NULL,
  `online-bookable` tinyint(2) NOT NULL,
  `deleted` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `email`, `description`, `seats-number`, `tables-number`, `default-not-bookable-table-lunch`, `default-not-bookable-table-dinner`, `default-not-bookable-table-pre-concert`, `default-not-bookable-table-concert`, `default-not-bookable-table-post-concert`, `open-time`, `close-time`, `break-start-time`, `break-end-time`, `day-off`, `no-show-limit`, `staying-time-lunch`, `staying-time-dinner`, `staying-time-pre-concert`, `staying-time-concert`, `staying-time-post-concert`, `open-time-1`, `close-time-1`, `break-start-time-1`, `break-end-time-1`, `open-time-2`, `close-time-2`, `break-start-time-2`, `break-end-time-2`, `open-time-3`, `close-time-3`, `break-start-time-3`, `break-end-time-3`, `open-time-4`, `close-time-4`, `break-start-time-4`, `break-end-time-4`, `open-time-5`, `close-time-5`, `break-start-time-5`, `break-end-time-5`, `open-time-6`, `close-time-6`, `break-start-time-6`, `break-end-time-6`, `open-time-7`, `close-time-7`, `break-start-time-7`, `break-end-time-7`, `online-bookable`, `deleted`) VALUES
(35, '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(36, '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(37, '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(38, 'gdsgtdsa', '', '', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(39, 'gdsgtdsa', '', '', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(40, '', '', '', 0, 2, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(41, '', '', '', 0, 2, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(42, '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(43, '', '', '', 0, 2, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0),
(44, '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0),
(45, '', '', '', 0, 2, 0, 0, 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `seats-standart-number` int(20) NOT NULL,
  `seats-max-number` int(20) NOT NULL,
  `combinable` tinyint(2) NOT NULL,
  `location` int(5) NOT NULL,
  `outlet-id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `seats-standart-number`, `seats-max-number`, `combinable`, `location`, `outlet-id`) VALUES
(17, 2, 3, 1, 2, 0),
(18, 2, 3, 0, 1, 0),
(19, 2, 3, 1, 3, 45),
(20, 1, 4, 0, 1, 45);

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
