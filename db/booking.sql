-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 10 2014 г., 17:53
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource`) VALUES
(36, 'Event', '2014-04-05 01:30:00', '2014-04-05 02:30:00', 'O'),
(37, 'Event', '2014-04-05 03:15:00', '2014-04-05 06:45:00', 'O'),
(38, 'Event', '2014-04-05 03:30:00', '2014-04-05 06:45:00', 'L'),
(39, 'Event', '2014-04-05 17:00:00', '2014-04-05 20:00:00', 'R'),
(40, 'Event', '2014-04-05 16:00:00', '2014-04-05 19:00:00', 'L'),
(41, 'ms Smith', '2014-04-05 19:00:00', '2014-04-05 21:45:00', 'L'),
(42, 'Event', '2014-04-05 19:00:00', '2014-04-05 21:45:00', 'O'),
(43, 'Event', '2014-02-05 12:30:00', '2014-02-05 14:30:00', 'L'),
(44, 'Event', '2014-02-05 12:30:00', '2014-02-05 14:30:00', 'M'),
(45, 'Event', '2014-02-05 14:45:00', '2014-02-05 17:30:00', 'M'),
(46, 'Event', '2014-02-05 14:45:00', '2014-02-05 17:30:00', 'L'),
(47, 'Event', '2014-02-05 11:30:00', '2014-02-05 13:15:00', 'O'),
(48, 'Event', '2014-04-06 06:30:00', '2014-04-06 09:00:00', 'P'),
(49, 'Event', '2014-04-07 11:30:00', '2014-04-07 12:30:00', 'N'),
(50, 'Event', '2014-04-07 20:15:00', '2014-04-07 22:30:00', 'O'),
(51, 'Event', '2014-04-08 02:00:00', '2014-04-08 10:30:00', 'P'),
(52, 'Event', '2014-04-07 11:00:00', '2014-04-07 12:30:00', 'P'),
(53, 'Event', '2014-04-08 17:45:00', '2014-04-08 19:15:00', 'K'),
(54, 'Event', '2014-04-08 20:00:00', '2014-04-08 21:30:00', 'O'),
(55, 'Event', '2014-04-08 20:00:00', '2014-04-08 21:45:00', 'M'),
(56, 'Event', '2014-04-08 21:00:00', '2014-04-08 21:15:00', 'B'),
(57, 'Event', '2014-04-09 17:45:00', '2014-04-09 21:30:00', 'P'),
(58, 'Event', '2014-04-10 18:15:00', '2014-04-10 18:45:00', 'M');

-- --------------------------------------------------------

--
-- Структура таблицы `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `capacity` int(5) NOT NULL,
  `tables` int(5) NOT NULL,
  `open-time` time NOT NULL,
  `close-time` time NOT NULL,
  `break-start-time` time NOT NULL,
  `break-end-time` time NOT NULL,
  `day-off` varchar(10) NOT NULL,
  `season-start` varchar(20) NOT NULL,
  `season-end` varchar(20) NOT NULL,
  `avg-duration` time NOT NULL,
  `online-booking` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleted` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `description`, `capacity`, `tables`, `open-time`, `close-time`, `break-start-time`, `break-end-time`, `day-off`, `season-start`, `season-end`, `avg-duration`, `online-booking`, `email`, `deleted`) VALUES
(1, 'a', 'bsadgasdgdsagdsagfdagafdgfdagaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 600, 13, '11:00:00', '23:00:00', '10:00:00', '14:00:00', '5', '01.06', '30.08', '00:30:00', 1, 'aaaa@aaas.aaaa', 0),
(2, 'Extrordinary', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 50, 19, '09:00:00', '23:00:00', '14:00:00', '17:00:00', '1', '01.06', '30.08', '03:40:00', 0, 'aaaa@aaas.aaaa', 1),
(3, 'b', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 50, 19, '09:00:00', '23:00:00', '14:00:00', '17:00:00', '5', '01.06', '30.08', '03:40:00', 1, 'aaaa@aaas.aaaa', 1),
(4, 'Extrordinary', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 50, 19, '09:00:00', '23:00:00', '14:00:00', '17:00:00', '2', '01.06', '30.08', '03:40:00', 1, 'aaaa@aaas.aaaa', 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `realname`, `password`, `email`, `role`, `active`, `last-login`, `modified`, `autofill`, `deleted`) VALUES
(1, 'hovik', 'Hovik', 'qwe', 'qwe@qwe.qew', 1, 1, '2014-04-01 00:00:00', '2014-04-01 00:00:00', 1, 1),
(2, 'valod88', 'Valod', 'qwe', 'qwe@qwe.qew', 6, 1, '2014-04-01 00:00:00', '2014-04-10 17:17:22', 1, 1),
(3, 'sffaasf', 'Ara', 'qwe', 'qwe@qwe.qew', 2, 1, '2014-04-01 00:00:00', '2014-04-10 17:48:21', 1, 0),
(4, 'qwe', 'Qwe', '', 'qwe@qwe.qew', 4, 1, '0000-00-00 00:00:00', '2014-04-10 17:51:47', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
