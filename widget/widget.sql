-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 04 2014 г., 19:17
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `widget`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `start`, `end`, `resource`) VALUES
(1, 'Event 1', '2013-05-09 00:00:00', '2013-05-09 10:00:00', 'B'),
(2, 'Event', '2014-04-04 00:00:00', '2014-04-04 08:00:00', 'B'),
(3, 'Event', '2014-04-04 10:00:00', '2014-04-04 14:15:00', 'C'),
(4, 'Event', '2014-04-04 16:00:00', '2014-04-04 21:15:00', 'C'),
(5, 'Event', '2014-04-04 10:15:00', '2014-04-04 18:30:00', 'C'),
(6, 'Event', '2014-04-04 02:00:00', '2014-04-04 07:30:00', 'C'),
(7, 'Event', '2014-04-04 05:00:00', '2014-04-04 08:30:00', 'C');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
