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
-- БД: `books`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
