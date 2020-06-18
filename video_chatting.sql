-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2013 at 01:20 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `video_chatting`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(127) NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `subject`, `contents`) VALUES
(1, ' literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virgi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'xx', 'atiq', 'trttteet', '2013-03-25 11:27:37', 1),
(2, 'atiq', 'xx', 'uyytuutu', '2013-03-25 11:27:41', 1),
(3, 'xx', 'atiq', '987979879', '2013-03-25 11:27:51', 1),
(4, 'atiq', 'xx', 'fsrtyrtytryt', '2013-03-25 11:28:35', 1),
(5, 'atiq', 'xx', 'tytrytytryr', '2013-03-25 11:28:36', 1),
(6, 'atiq', 'xx', 'yrtyryryrty', '2013-03-25 11:28:37', 1),
(7, 'atiq', 'xx', 'rtyyrtytry', '2013-03-25 11:28:38', 1),
(8, 'atiq', 'xx', 'rtyy', '2013-03-25 11:28:38', 1),
(9, 'atiq', 'xx', 'rytry', '2013-03-25 11:28:38', 1),
(10, 'atiq', 'xx', 'rty', '2013-03-25 11:28:39', 1),
(11, 'atiq', 'xx', 'ytrytr', '2013-03-25 11:28:39', 1),
(12, 'atiq', 'xx', 'ytytry', '2013-03-25 11:28:40', 1),
(13, 'atiq', 'xx', 'y', '2013-03-25 11:28:40', 1),
(14, 'atiq', 'xx', 'Hi    I am Atiq', '2013-03-25 11:29:33', 1),
(15, 'atiq', 'xx', 'ffshdfjdsffhjffffhsf', '2013-03-25 11:29:39', 1),
(16, 'xx', 'atiq', 'dfdsffsfdsf sfdsfdffdsfdsfdsfsff', '2013-03-25 11:29:56', 1),
(17, 'aa', 'xx', 'sdsdsdsd', '2013-03-25 11:36:16', 1),
(18, 'aa', 'xx', 'etrttrtrtrt', '2013-03-25 11:36:28', 1),
(19, 'xx', 'atiq', 'qqqqqqqqqqqqqq', '2013-03-25 11:52:17', 1),
(20, 'xx', 'atiq', 'gg', '2013-03-25 13:07:10', 1),
(21, 'xx', 'atiq', 'trtrrtrtrt', '2013-03-25 13:09:32', 1),
(22, 'atiq', 'xx', 'Hi xx', '2013-03-25 13:09:57', 1),
(23, 'xx', 'atiq', 'Hi xx', '2013-03-25 13:10:18', 1),
(24, 'atiq', 'xx', 'ggdfgfdggfdg gdgdfgfdgfdg', '2013-03-25 13:10:52', 1),
(25, 'xx', 'atiq', 'ioiuoiuoiuouoiuouioiuoiuo', '2013-03-25 13:11:10', 1),
(26, 'xx', 'atiq', 'uioiuoioiuoiuoiuoiuo yuytututyutyu', '2013-03-25 13:11:13', 1),
(27, 'atiq', 'xx', 'gggg', '2013-03-30 02:14:52', 1),
(28, 'atiq', 'xx', 'hi', '2013-03-30 05:12:02', 1),
(29, 'atiq', 'xx', 'hghh ghghhgfhf', '2013-03-30 05:12:32', 1),
(30, 'atiq', 'xx', 'oouioiuouio', '2013-03-30 05:12:36', 1),
(31, 'atiq', 'xx', 'ppoipoiopop fggfdgd ggdfgd', '2013-03-30 05:12:40', 1),
(32, 'xx', 'atiq', 'uyuy', '2013-03-30 05:45:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) NOT NULL,
  `tutorial_id` int(10) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `users_id`, `tutorial_id`, `comments`) VALUES
(1, 11, 12, 'ssssss'),
(2, 11, 12, 'tretrtetr'),
(3, 11, 12, 'tretrtetr'),
(4, 11, 12, 'tretrtetr'),
(5, 11, 12, 'tretrtetr'),
(6, 11, 12, 'tretrtetr');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(127) NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject`, `contents`) VALUES
(2, 'ghghgh', 'ghghgh'),
(3, 'ghhggh', ' hfghghgfh ghgfhfh');

-- --------------------------------------------------------

--
-- Table structure for table `plus_login`
--

CREATE TABLE IF NOT EXISTS `plus_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) NOT NULL,
  `email` varchar(127) NOT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tm` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(3) NOT NULL DEFAULT 'ON',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `plus_login`
--

INSERT INTO `plus_login` (`id`, `users_id`, `email`, `ip`, `tm`, `status`) VALUES
(10, 24, 'aa@aa.com', '', '2013-03-30 05:37:38', 'OFF'),
(9, 25, 'atiq@atiq.com', '', '2013-03-30 05:45:40', 'OFF'),
(8, 11, 'xx', '', '2013-03-30 13:19:56', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) NOT NULL,
  `youtube_video_link` varchar(255) NOT NULL,
  `file_video` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `description` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `users_id`, `youtube_video_link`, `file_video`, `title`, `description`, `date_time`, `status`) VALUES
(12, 11, 'http://www.youtube.com/watch?v=OrD2mvG9UEw', 'file_video/12_new_stories_(highway_blues).wma', '3434433333333333333333', '333333333333333', '2013-03-30 12:35:10', 'active'),
(13, 11, 'http://www.youtube.com/watch?v=XluovrUA6Bk', '', '343443333333333333333333333', '3333333333333', '2013-03-30 11:52:55', 'active'),
(14, 11, 'http://www.youtube.com/watch?v=OrD2mvG9UEw', '', '333333333333333333', '3333333333333333333 ', '2013-03-30 13:10:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `profile_image` varchar(127) NOT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `country` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` enum('super','consultant','sales','client') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `profile_image`, `company`, `address`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`, `type`, `status`) VALUES
(11, 'xx', 'xx', 'xx', 'xx', 'xx', '', 'xx', 'xx', 'xx', 'xx', '', '', '2012-04-07 16:47:21', '2012-04-07 16:47:25', 'super', 'active'),
(25, 'atiq@atiq.com', '123456', 'gg', 'gfgfdgdf', 'gfdgfgfdg', 'profile_image/25_capture.jpg', 'gfdgfd', 'dfgdfg', 'dgfdgdgfdgfdgfdgfd', 'ffdgf', 'gfdgfd', 'gfdgfdg', '2013-03-24 00:00:00', '2013-03-30 00:00:00', 'super', 'active'),
(24, 'aa@aa.com', '123456', '2232', '3232323', '32323', '', '2323232', '2323232', '32323', '232323', '232323', '232323', '2013-03-24 00:00:00', '2013-03-24 00:00:00', 'super', 'active'),
(27, 'fgg@err.com', '123456', '', '343424324', '432434', 'profile_image/_capture.jpg', '43434', '34343243', '32432434343', '2434324', '43434', '34343', '2013-03-30 00:00:00', '2013-03-30 00:00:00', 'super', 'active'),
(28, 'rerre@ryyy.com', '24234324324', '34324', '3434343', '3434', 'profile_image/27_capture.jpg', '324344', '343443', '4343434', '343434', '34344', '343434', '2013-03-30 00:00:00', '2013-03-30 00:00:00', 'super', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
