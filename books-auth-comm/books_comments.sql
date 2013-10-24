-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 
-- Версия на сървъра: 5.5.24-log
-- Версия на PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `new_books`
--

-- --------------------------------------------------------

--
-- Структура на таблица `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Ссхема на данните от таблица `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Scott Kelby'),
(2, 'Svetlin Nakov'),
(3, 'Test Author 1'),
(4, 'Test Author 2'),
(5, 'Nikolay Kostov'),
(6, 'Adobe Creative Team'),
(7, 'Test Author 3');

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(250) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Ссхема на данните от таблица `books`
--

INSERT INTO `books` (`book_id`, `book_title`) VALUES
(1, 'Digital Photography Killer Tips'),
(2, 'The Digital Photography Book: Part 1 (2nd Edition)'),
(3, 'Introduction to Programming with C#'),
(4, 'Introduction to Programming with Java'),
(11, 'Adobe Flash CS4 Professional Classroom in a Book');

-- --------------------------------------------------------

--
-- Структура на таблица `books_authors`
--

CREATE TABLE IF NOT EXISTS `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Ссхема на данните от таблица `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(3, 3),
(4, 2),
(4, 4),
(1, 4),
(3, 5),
(6, 1),
(7, 1),
(11, 6),
(11, 7);

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_date` datetime NOT NULL,
  `comm_text` tinytext NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Ссхема на данните от таблица `comments`
--

INSERT INTO `comments` (`comm_id`, `comm_date`, `comm_text`, `user_id`, `book_id`) VALUES
(1, '2013-10-08 21:37:21', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 45, 2),
(2, '2013-10-08 22:02:26', 'kj'';lmlkn;klnkjn', 47, 3),
(3, '2013-10-08 21:49:59', 'jjjjj', 45, 1),
(4, '2013-10-07 23:47:33', 'some comment', 47, 4),
(5, '2013-10-07 23:46:36', 'hnksjbhdkgihg', 45, 1),
(66, '2013-10-24 01:07:07', 'врверррррррррррррррр веррррррррррррррррррррррррррррррр еврррррррррррррррррррррр веррррррррррррррррр еврррррррррррр 3244444444444 fsdfsdf &lt;scri', 46, 3),
(65, '2013-10-24 01:06:14', 'asasa 3423 23 садфсдфсд \r\n\r\nгфхфгхфгхфгхфг', 46, 3),
(64, '2013-10-24 01:04:11', 'test', 46, 2),
(63, '2013-10-24 01:04:06', 'test', 46, 2),
(67, '2013-10-24 01:10:07', 'y', 46, 11);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Ссхема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(50, 'testuser2', 'b2f1910921e9325b7afd2fe2d0d59aa4'),
(47, 'testuser', '6b0b8a746f9c39d9db7ec99b9a797449'),
(45, 'user', '353aec20c15edfc5c0a06c9af30a40a7'),
(46, '123456', '2df594b9710111099edbdb7edaa43301');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
