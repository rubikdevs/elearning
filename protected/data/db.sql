n SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 07:13 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ckeditor`
--

CREATE TABLE `tbl_ckeditor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_ckeditor`
--

INSERT INTO `tbl_ckeditor` (`id`, `description`) VALUES
(1, 'hola'),
(2, '<p>ddfsdfdfsdf<strong>sdfsdfsdfsdfsdfsdfsdfsdsfd</strong></p>\r\n'),
(3, '<p>dfsdf<em><s>sdfsdf</s></em></p>\r\n'),
(4, '<p>fdfgdfgdfg</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `module_code` int(20) NOT NULL,
  `module_name` varchar(300) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`module_code`),
  UNIQUE KEY `module_code` (`module_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`module_code`, `module_name`, `creator`, `create_date`) VALUES
(123123, 'dfsfsd', 'asdasd', '0000-00-00'),
(123333, '2312', '1231', '0000-00-00'),
(223233, 'PAPAYA', 'ME', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `page_code` int(11) NOT NULL AUTO_INCREMENT,
  `page_number` int(11) NOT NULL,
  `module_code` int(20) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`page_code`),
  UNIQUE KEY `page_code` (`page_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_code`, `page_number`, `module_code`, `question`, `answer`) VALUES
(1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_images`
--

CREATE TABLE `tbl_post_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_uri` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_post_images`
--

INSERT INTO `tbl_post_images` (`id`, `image_uri`) VALUES
(17, 'dsfa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_level` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `user_level`) VALUES
(22, 'Bichi', 'Bichi', 0),
(23, 'nico', 'd659c10e27d52b00987b65e85d99bce5480adcae', 0),
(24, 'pepe', 'pepe', 0),
(25, 'nico1', 'nico2', 0),
(26, 'pepe', '265392dc2782778664cc9d56c8e3cd9956661bb0', 0),
(27, 'hash', '2346ad27d7568ba9896f1b7da6b5991251debdf2', 0),
(28, 'banana', '9ae01fbc9c3e989bc35e7c0308bd4a30d5a65e88', 0),
(29, 'test20', 'de7cabd865ea81f0af7b84d9da5ec5a2c0a0bf0b', 0),
(30, 'Pepe', '265392dc2782778664cc9d56c8e3cd9956661bb0', 1);
--
