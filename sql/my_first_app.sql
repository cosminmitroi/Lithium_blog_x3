-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
-- Cosmin Mitroi
-- Host: localhost
-- Generation Time: Aug 31, 2012 at 09:52 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_first_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `user_id`, `body`, `created`, `modified`) VALUES
(1, 'First Post', 18, 'This is post number 1', '2012-08-27 15:49:05', NULL),
(2, 'Second Post2', 18, 'This is post number two.\r\n\r\nSome content for this post', '2012-08-27 15:49:05', NULL),
(3, 'Third post3', 20, 'This is my third post.1', '2012-08-27 15:49:05', NULL),
(4, 'Forth Post4', 18, 'This is the forth post.', '2012-08-27 15:49:05', NULL),
(5, 'Fifth Post5', 16, 'This is post number 5.', '2012-08-27 15:49:05', NULL),
(6, 'Sixth Post', 18, 'My post number 6.', '2012-08-27 15:49:05', NULL),
(9, 'New post2', 20, 'new post2 for test', NULL, NULL),
(12, 'new test post', 14, 'new test post', NULL, NULL),
(13, 'new test post1', 14, 'new test post1', NULL, NULL),
(14, 'test post10', 17, 'test post10 date', NULL, NULL),
(22, 'new user post', 17, 'post for new user', NULL, NULL),
(23, 'post made by cipi', 14, 'post test,change', NULL, '2012-08-30 12:43:53'),
(25, 'cosmin''s post', 18, 'test post, new change', NULL, '2012-08-30 11:22:48'),
(27, 'Test Post by Ciprian', 19, 'Long long post changedte', NULL, '2012-08-29 11:12:08'),
(28, 'second post by ciprian', 19, 'test', NULL, NULL),
(29, 'test', 19, 'test', NULL, NULL),
(31, 'new post, cosmin', 18, 'Lorem Ipsum este pur si simplu o machet pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei înca din secolul al XVI-lea, când un tipograf anonim a luat o planeta de litere si le-a amestecat pentru a crea o carte demonstrativa pentru literele respective. Nu doar ca a supravietuit timp de cinci secole, dar si a facut saltul în tipografia electronic practic neschimbat. A fost popularizata în anii ''60 odata cu iesirea colilor Letraset care contineau pasaje Lorem Ipsum, iar mai recent, prin programele de publicare pentru calculator, ca Aldus PageMaker care includeau versiuni de Lorem Ipsum.asdasdasd', '2012-08-30 12:20:53', '2012-08-30 18:10:50'),
(33, 'cipi''s post', 14, 'test post body', '2012-08-30 12:43:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(14, 'cipi', '$2a$10$tSXXJG6qmoTPXp/rQB3eJeoV8UZz7LQ9jMleHll6sDDTz7KPQ7GuW', 'Cipi', 'Cipi', 'ciprian@wearex3.com'),
(16, 'user', '$2a$10$t5RbL7I6X9dmHArZKGSMc.3mybYiBru/z8IJXsEM9VIEuYPkZGp7q', 'User', 'UserLastName', 'email@email.com'),
(17, 'usertest', '$2a$10$V.7kXbFCujb8FVgjTFkFrOWonlEk3VAemhwdGmACr//eIUZw.qD.O', 'FirstName', 'LastName', 'email@email.com'),
(18, 'cosmin', '$2a$10$ovQUhGrju90.toJhRiF1iOFRXhS.TutN3sakmeJoq0CABzLeC08by', 'Cosmin', 'Mitroi', 'cosmin@wearex3.com'),
(19, 'ciprian', '$2a$10$G.4x8bjPahlTDyStNz3tcuK1.ApbBLw37Vsv5vMTsdx/YpzB9s.fG', 'Ciprian', 'Ionescu', 'silviuciprian@gmail.com'),
(20, 'user1', '$2a$10$C7f9ATg/OfGohWNFDqWgmOPJwPZ1Oo8gIy1kzEPh9A7rU1HEZ9VM6', 'UserName', 'LastName', 'user@emai.com');
