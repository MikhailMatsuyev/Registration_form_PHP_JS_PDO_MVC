-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Фев 14 2017 г., 12:15
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cp192012_registration`
--

-- --------------------------------------------------------

--
-- Структура таблицы `table_users`
--

CREATE TABLE IF NOT EXISTS `table_users` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name_user` varchar(40) NOT NULL,
  `surname_user` varchar(40) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `psw` varchar(60) NOT NULL,
  `avatar` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `login_2` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

--
-- Дамп данных таблицы `table_users`
--

INSERT INTO `table_users` (`id`, `name_user`, `surname_user`, `birth_date`, `phone_number`, `login`, `psw`, `avatar`) VALUES
(135, 'uuu', 'ooo', '0000-00-00', '7999999999', '-===', 'b0baee9d279d34fa1dfd', '4987ff02a45a82ee17767a18a6cb0d6a.jpeg'),
(165, 'dsf', 'sdf', '0000-00-00', '7434555555', '6678', '$2y$10$Fekg9d9LXnAxbpToUXtG2u2oE', ''),
(166, 'dsgf', 'df', '2005-03-01', '7444444444', '5667', '$2y$10$FotfTslOixm3QO8WClfzDOcEV', 'dba8e4b1c9b1ae7a1abfc977bc4986ee.jpeg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
