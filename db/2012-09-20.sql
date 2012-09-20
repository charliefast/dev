-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2012 at 02:00 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `160593-bytarna`
--
CREATE DATABASE `160593-bytarna` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `160593-bytarna`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`) VALUES
(1, 'klader-accessoarer', 'Kläder & Accessoarer'),
(2, 'hem-design-inredning', 'Hem, Design & Inredning'),
(3, 'sport-fritid-biljetter', 'Sport, Fritid & Biljetter'),
(4, 'hobby-samlarsaker', 'Hobby & Samlarsaker'),
(5, 'hemelektronik', 'Hemelektronik'),
(6, 'musik-bocker-spel-film', 'Musik, Böcker, Spel & Film'),
(7, 'motor', 'Motor'),
(8, 'ovrigt', 'Övrigt');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `headline`, `description`, `date_added`, `end_date`, `category_id`, `user_id`) VALUES
(1, 'Converse', 'Helt nya, oanvända Converse. Lila. Storlek 39, men är ju stora i storlekarna så passar bättre till en 40. Jag har normalt stl 39, de är för stora till mej.', '2012-09-13 09:49:37', '0000-00-00 00:00:00', 1, 0),
(2, '5 st gamla virkade grytlappar', 'hel och fin\r\nbet till mitt konto i swedbank\r\njag samfraktar\r\nskickar även med schenker vid vikt över 1 kg', '2012-09-05 09:45:00', '0000-00-00 00:00:00', 2, 0),
(3, 'FORD AEROSTAR', 'Något för den händiga eller som reservdelsbil!\r\nBilen funkar bra i motorn och växellåda !\r\nBilen är avställd , ej skattad eller besiktad!', '2012-09-12 16:32:49', '2012-10-12 16:32:49', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sign_up_date` date DEFAULT NULL,
  `last_active` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` int(11) DEFAULT '0',
  `activation_key` varchar(255) NOT NULL,
  `email_activated` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `firstname`, `lastname`, `country`, `city`, `zip`, `phone`, `email`, `password`, `sign_up_date`, `last_active`, `account_type`, `activation_key`, `email_activated`) VALUES
(23, 'Albino', 'alf', 'olofsson', '', '', '', '', 'albin@hotmail.com', 'ead6c09483683d7f0e9d77331e379424bbb50073', NULL, '2012-09-14 13:01:25', 0, '2BULpMlfkWIxrSUQjDtNbav7LMHpXF4MnEIJnIkOxUdz00CTni', '0'),
(25, 'assdasdasda', 'sdaasdsadsad', 'sdadsasaddsadsa', '', '', '', '', 'adsadassa@dfdfs.sad', '58b0b3b8860156c19848de4495d0a53916987fba', NULL, '2012-09-14 13:10:54', 0, 'JWtX3kMN8UAaXZ5f8PacCpy9MeWpBlRCWnAea4SfaU4WM5EtKW', '0'),
(26, 'fsggfsdas', 'hjgdhdj', 'sgfhdjhjd', '', '', '', '', 'hjgdhdj@haj.se', 'bb910d1e6d22999144057c490de5863d43006316', NULL, '2012-09-14 13:13:29', 0, 'fBgsPMtUk3xlACiYX2OVTNzzhFNtxqV0lSR1dakdyY136qQ9x8', '0'),
(27, 'sdfhgffdg', 'sdfhgdh', 'safghjghgdf', '', '', '', '', 'sdfhgffdg@hej.se', '9a7f85bad42824e069e8c0c1647bae1fc5b08fab', NULL, '2012-09-14 13:16:38', 0, '36yLwBC3ZaFwrbo2eFcWk0c2l2UjYLzNW59C8XP55Xwo8Ek4ZI', '0'),
(28, 'sdasfddsf', 'sdfdsffdsdfs', 'dsffdsfsdfds', '', '', '', '', 'fdsdfssdfdsfdsf@le.se', '2c3330c288dfad9a1a742e7168b114b5dc80afea', NULL, '2012-09-14 13:22:19', 0, '2NnIbSRXDWVtVUbQTqBD4FoS8fJ4fm2RHhlYexKsehE9GSlQLO', '0'),
(29, 'sdffds', 'sdffsd', 'sdffdsdsfsdf', '', '', '', '', 'sdfhgfssfdg@hej.se', 'a4081bf6de43c8cf7be5b6bff73db3213a9fbd83', NULL, '2012-09-14 13:28:10', 0, '8G4AQu2AZeQtIUfZwjEHbSaOrwBl0IGGAEdFKcQQENQWNmzz9v', '0'),
(30, 'fdghdfsfgsddefsa', 'fhdgfgffgr', 'dsadsadefasfesdsadsae', '', '', '', '', 'dsasdadsadsads2@hej.se', '525ffb6f039cedeb1fd72590c2f36848f580e90e', NULL, '2012-09-14 13:48:51', 0, '37QM1tIcBHzDqDpVjQ0e7RF7s0KqYdEibbkkA9oIdeedeJbFXf', '0'),
(31, 'fdsgfsg', 'fdgfdgdsff', 'fdsgfhjghgf', '', '', '', '', 'asdfghjkhgfds@gfl.com', 'd6d890645a9bedfc1714fdcf80d363329eedf24f', NULL, '2012-09-20 07:55:36', 0, 'VjsJsrMcMIXsrTiRiwLOGAXl7v0Q7dTelyyP2CvurWDXOXkg5K', '1'),
(32, 'dsgfdgf', 'dfgfdddddghgf', 'sdffffffffffgf', '', '', '', '', 'fdsfdsfsdds@hghg.sed', '2e74e916c993c7a4aeb1c14b7cbf4ae7984b651a', NULL, '2012-09-17 08:13:51', 0, '0QIQdP1Mj07QCTC95QOSm9NbeSGaJMCqymLHpbMD0rJbciYCMX', '0'),
(33, 'erghtrjh', 'dgjhgjg', 'erghtrjh', '', '', '', '', 'erghtrjh@hotmail.com', 'b29f13dc51b9a7c9cadd626432f112a1664fe957', NULL, '2012-09-17 08:15:26', 0, '1gbdlz4Ya22sBgywLBIEpUcdeaPm8Ms3yGXElERzH6Ldx4t38U', '0'),
(34, 'dfghfjj', 'hgggjkjh', 'fghjgjkjh', '', 'fdhgjkjjh', '', '', 'fghjgjkjh@jhgkfh.se', 'aedeb9f49245c900ccc7365a82daf35673543876', NULL, '2012-09-17 08:16:14', 0, 'ncgnInDUaQJbBlHSNTw2URVd3KbrEWBhhmXrJJmLsKr6wUcg4E', '0'),
(35, 'carinas', 'DFASD', 'DSGFD', '', '', '', '', 'afds@hfjs.se', 'd54fec2f9170862070da5a9c0447870be8905451', NULL, '2012-09-18 07:54:12', 0, '4XDnzwZIrChrv7Aw8ZNp1B4DJvnikl53FeC3bt6Tgxe4KQYl7p', '0'),
(37, '', 'fdsfds', 'sdfsfd', '', '', '', '', 'bla@email.se', 'c62d8081e53b9f9ddc26e14a34555630068e1451', NULL, '2012-09-20 07:27:29', 0, 'hYPMh6q8pyLA76d28GhJ8lUYl4yNwmyQRiOqqLuof5RneGLXui', '1'),
(39, NULL, 'fgdf', 'sfdghgf', '', '', '', '', 'gfafd@hf.se', 'c62d8081e53b9f9ddc26e14a34555630068e1451', NULL, '2012-09-20 08:09:55', 0, 'c8mS6LtgPRBHJafbGbk6w0ln1nlwp54apSGc8WZ6ieRdW5AHkf', '0'),
(40, NULL, 'dsffds', 'ghdfd', '', '', '', '', 'asdgffhj@jh.se', 'c62d8081e53b9f9ddc26e14a34555630068e1451', NULL, '2012-09-20 08:12:31', 0, 'QbaOznq4kEW7JZqvVbSobFbnEXwXlI77TqfwEsMdD1335qK7Wn', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
