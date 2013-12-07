-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Време на генериране: 
-- Версия на сървъра: 5.5.32
-- Версия на PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `auction`
--
CREATE DATABASE IF NOT EXISTS `auction` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auction`;

-- --------------------------------------------------------

--
-- Структура на таблица `auctions`
--

CREATE TABLE IF NOT EXISTS `auctions` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `minimum_price` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `action_title` varchar(250) NOT NULL,
  `auction_desc` text NOT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Схема на данните от таблица `auctions`
--

INSERT INTO `auctions` (`auction_id`, `user_id`, `date_created`, `minimum_price`, `date_end`, `action_title`, `auction_desc`) VALUES
(1, 2, 1386169758, 5, 1381006345, 'title1', 'description 1 fsdfsfsdfsf'),
(2, 2, 1386169758, 5, 1386766345, 'title2', 'description 2 fsdfsfsdfsf'),
(3, 2, 1386184568, 5, 1388736345, 'title3', 'description 3 fsdfsfsdfsf'),
(7, 2, 1386179277, 123, 1386802800, 'wewewewe', 'qweqweqw qweqw eqwe q wqe qweqwe'),
(8, 3, 1386179379, 12, 1386630000, 'user title', 'sadas sad asd asd asdad asd asd asdasd asd asd as dasd asd asdas dasdas dasdas d as das d');

-- --------------------------------------------------------

--
-- Структура на таблица `auction_prices`
--

CREATE TABLE IF NOT EXISTS `auction_prices` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` int(11) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `auction_prices`
--

INSERT INTO `auction_prices` (`price_id`, `auction_id`, `user_id`, `price`, `date_added`) VALUES
(1, 1, 2, 5, 1381200758),
(2, 2, 2, 21, 1386182066),
(3, 3, 2, 5, 1386184568),
(4, 7, 2, 123, 1386802800),
(5, 8, 3, 12, 1386630000);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_registered` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `date_registered`) VALUES
(1, 'test@test.com', '9a24af1877c13e14e90999ec27141ac6abcdefgh', 1386144335),
(2, 'marabata@abv.bg', '26869ee64ae487afa1e36ebbd631f844abcdefgh', 1386167935),
(3, 'username@abv.bg', '8f502189445dfebb8a313d233b0c328aabcdefgh', 1386175936);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
