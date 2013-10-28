-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 02:14 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `module_code` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(60) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `module_name` varchar(60) NOT NULL,
  PRIMARY KEY (`module_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`module_code`, `creator`, `create_date`, `module_name`) VALUES
(1, 'admin', '2013-10-26 03:48:32', 'Marian'),
(2, 'admin', '2013-10-28 05:51:30', 'module 2'),
(3, 'admin', '2013-10-28 05:51:37', 'module 3');

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
  `description` longtext NOT NULL,
  `image_uri` varchar(256) NOT NULL,
  PRIMARY KEY (`page_code`),
  UNIQUE KEY `page_code` (`page_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_code`, `page_number`, `module_code`, `question`, `answer`, `description`, `image_uri`) VALUES
(1, 1, 1, 'Puto', 'Puto', '', 'images/images.png'),
(2, 2323, 1, 'asdfadsf', 'asdfasdfasf', '<blockquote>\r\n<ol>\r\n	<li>asdfaasdfadsfasdfa<img alt="" src="images/images.png" style="height:320px; width:298px" />asadfadfssdfadasadsfasdfafsdf</li>\r\n</ol>\r\n\r\n<p>adfasdfasdfaf</p>\r\n</blockquote>\r\n', 'images/images.png'),
(3, 2323, 1, 'asdfadsf', 'asdfasdfasf', '<blockquote>\r\n<ol>\r\n	<li>asdfaasdfadsfasdfa<img alt="" src="images/images.png" style="height:320px; width:298px" />asadfadfssdfadasadsfasdfafsdf</li>\r\n</ol>\r\n\r\n<p>adfasdfasdfaf</p>\r\n</blockquote>\r\n\r\n<p> </p>\r\n\r\n<ol>\r\n	<li>dsfasdfasd</li>\r\n	<li>fasdfasdfasdf</li>\r\n	<li>asdfasdfasdf</li>\r\n	<li>asdfadsfadsf</li>\r\n	<li>asdfasdfasdf</li>\r\n	<li>\r\n	<h2 style="font-style:italic;"><span class="marker">asdfasdfasfasdfafsd</span></h2>\r\n	</li>\r\n</ol>\r\n\r\n<p><span class="marker">asdfadsfasdfasfdsafdafda</span></p>\r\n', 'images/images.png'),
(4, 1, 1, 'zxczxcz', 'zxczxc', '<p>axczxczxczxczxczxc</p>\r\n\r\n<p>zxcz</p>\r\n\r\n<p>xczxc</p>\r\n\r\n<p>zxc</p>\r\n\r\n<p>zxczx</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_images`
--

CREATE TABLE `tbl_post_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_uri` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_post_images`
--

INSERT INTO `tbl_post_images` (`id`, `image_uri`) VALUES
(17, 'dsfa.jpg'),
(18, 'Screen Shot 2013-10-25 at 3.53.56 PM.png'),
(19, 'Screen Shot 2013-10-25 at 3.53.56 PM.png'),
(20, 'Screen Shot 2013-10-25 at 3.53.56 PM.png'),
(21, 'Screen Shot 2013-10-25 at 3.53.51 PM.png'),
(22, 'Screen Shot 2013-10-25 at 3.53.56 PM.png'),
(23, 'Screen Shot 2013-10-25 at 3.53.56 PM.png'),
(24, 'Screen Shot 2013-10-25 at 3.53.51 PM.png'),
(25, 'Screen Shot 2013-10-25 at 3.53.51 PM.png'),
(26, 'images.png'),
(27, 'images.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `user_level`) VALUES
(34, 'user', '12dea96fec20593566ab75692c9949596833adc9', 0),
(35, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(36, 'sadmin', '1a37e5eb4ea24b24b0d287e0df00f91715ca2e04', 9),
(37, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 0),
(38, 'user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 0),
(39, 'user3', '0b7f849446d3383546d15a480966084442cd2193', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_module_assignment`
--

CREATE TABLE `tbl_user_module_assignment` (
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`module_id`,`user_id`),
  KEY `FK_user_module` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_module_assignment`
--

INSERT INTO `tbl_user_module_assignment` (`module_id`, `user_id`) VALUES
(1, 34),
(2, 34),
(3, 34),
(3, 36),
(1, 37),
(3, 37),
(2, 38),
(3, 38),
(1, 39),
(2, 39);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user_module_assignment`
--
ALTER TABLE `tbl_user_module_assignment`
  ADD CONSTRAINT `FK_modules_user` FOREIGN KEY (`module_id`) REFERENCES `tbl_modules` (`module_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_module_user` FOREIGN KEY (`module_id`) REFERENCES `tbl_modules` (`module_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_module` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;
