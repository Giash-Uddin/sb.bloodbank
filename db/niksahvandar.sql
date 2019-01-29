-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2016 at 12:55 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `niksahvandar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `user_name` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `login_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `logout_time` time DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `user_name`, `user_type`, `login_time`, `date`, `logout_time`) VALUES
(1, '1', 'rahimidb', '1', '17:01:06', '2016-01-10', NULL),
(2, '1', 'rahimidb', '1', '17:01:18', '2016-01-10', NULL),
(3, '1', 'rahimidb', '1', '17:01:17', '2016-01-10', NULL),
(4, '1', 'rahimidb', '1', '17:01:31', '2016-01-10', NULL),
(5, '1', 'rahimidb', '1', '17:01:47', '2016-01-10', NULL),
(6, '1', 'rahimidb', '1', '17:01:10', '2016-01-10', '17:01:12'),
(7, '1', 'rahimidb', '1', '19:01:23', '2016-01-10', NULL),
(8, '1', 'rahimidb', '1', '19:01:54', '2016-01-10', NULL),
(9, '1', 'rahimidb', '1', '03:01:18', '2016-01-13', NULL),
(10, '', 'rahimidb', '1', '18:01:42', '2016-01-13', '19:01:32'),
(11, '1', 'rahimidb', '1', '11:01:45', '2016-01-14', '11:01:27'),
(12, '6', 'admin', '1', '11:01:34', '2016-01-14', NULL),
(13, '6', 'admin', '1', '11:01:00', '2016-01-14', '11:01:07'),
(14, '6', 'admin', '1', '13:01:21', '2016-01-16', NULL),
(15, '6', 'admin', '1', '13:01:42', '2016-01-16', '13:01:03'),
(16, '1', 'rahimidb', '1', '14:01:52', '2016-01-20', '15:01:21'),
(17, '1', 'rahimidb', '1', '13:01:40', '2016-01-29', '13:01:23'),
(18, '1', 'rahimidb', '1', '15:01:03', '2016-01-29', NULL),
(19, '1', 'rahimidb', '1', '15:01:11', '2016-01-29', NULL),
(20, '1', 'rahimidb', '1', '17:01:54', '2016-01-29', NULL),
(21, '1', 'rahimidb', '1', '18:01:24', '2016-01-29', NULL),
(22, '', 'rahimidb', '1', '21:01:35', '2016-01-29', '22:01:47'),
(23, '1', 'rahimidb', '1', '23:01:36', '2016-01-29', '23:01:04'),
(24, '1', 'rahimidb', '1', '22:01:53', '2016-01-31', '00:02:05'),
(25, '1', 'rahimidb', '1', '12:02:43', '2016-02-01', NULL),
(26, '1', 'rahimidb', '1', '22:02:16', '2016-02-01', NULL),
(27, '1', 'rahimidb', '1', '11:02:55', '2016-02-02', '11:02:07'),
(28, '1', 'rahimidb', '1', '15:02:38', '2016-02-11', '15:02:03'),
(29, '', 'rahimidb', '1', '15:02:56', '2016-02-23', '23:02:59'),
(30, '1', 'rahimidb', '1', '12:02:53', '2016-02-25', NULL),
(31, '1', 'rahimidb', '1', '15:02:32', '2016-02-26', NULL),
(32, '', 'rahimidb', '1', '15:02:17', '2016-02-26', '02:02:57'),
(33, '1', 'rahimidb', '1', '02:02:30', '2016-02-27', NULL),
(34, '1', 'rahimidb', '1', '11:02:02', '2016-02-27', NULL),
(35, '', 'rahimidb', '1', '13:02:57', '2016-02-27', '22:02:49'),
(36, '1', 'rahimidb', '1', '11:03:54', '2016-03-16', NULL),
(37, '1', 'rahimidb', '1', '15:03:27', '2016-03-20', NULL),
(38, '1', 'rahimidb', '1', '21:03:20', '2016-03-21', NULL),
(39, '1', 'rahimidb', '1', '21:04:23', '2016-04-06', NULL),
(40, '1', 'rahimidb', '1', '21:04:29', '2016-04-06', NULL),
(41, '1', 'rahimidb', '1', '21:04:39', '2016-04-06', NULL),
(42, '1', 'rahimidb', '1', '20:05:26', '2016-05-07', NULL),
(43, '1', 'rahimidb', '1', '23:05:29', '2016-05-07', NULL),
(44, '1', 'rahimidb', '1', '02:05:06', '2016-05-08', NULL),
(45, '1', 'rahimidb', '1', '13:05:40', '2016-05-08', NULL),
(46, '1', 'rahimidb', '1', '20:05:23', '2016-05-08', NULL),
(47, '1', 'rahimidb', '1', '22:05:12', '2016-05-09', NULL),
(48, '1', 'rahimidb', '1', '12:05:10', '2016-05-11', NULL),
(49, '1', 'rahimidb', '1', '15:05:41', '2016-05-11', NULL),
(50, '1', 'rahimidb', '1', '02:05:37', '2016-05-13', NULL),
(51, '1', 'rahimidb', '1', '11:06:25', '2016-06-11', NULL),
(52, '1', 'rahimidb', '1', '12:06:35', '2016-06-16', NULL),
(53, '1', 'rahimidb', '1', '22:06:38', '2016-06-16', NULL),
(54, '1', 'rahimidb', '1', '12:06:14', '2016-06-17', NULL),
(55, '1', 'rahimidb', '1', '22:06:00', '2016-06-17', NULL),
(56, '1', 'rahimidb', '1', '11:06:47', '2016-06-18', NULL),
(57, '1', 'rahimidb', '1', '12:06:58', '2016-06-18', NULL),
(58, '6', 'admin', '1', '17:06:36', '2016-06-18', NULL),
(59, '9', 'admin', '2', '17:06:38', '2016-06-18', NULL),
(60, '9', 'admin', '2', '17:06:57', '2016-06-18', NULL),
(61, '1', 'rahimidb', '1', '12:06:28', '2016-06-19', NULL),
(62, '1', 'rahimidb', '1', '22:06:00', '2016-06-19', NULL),
(63, '1', 'rahimidb', '1', '23:06:16', '2016-06-19', NULL),
(64, '1', 'rahimidb', '1', '01:06:06', '2016-06-20', NULL),
(65, '1', 'rahimidb', '1', '14:06:52', '2016-06-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_name` varchar(100) DEFAULT NULL,
  `con_email` varchar(100) DEFAULT NULL,
  `con_mobile` varchar(100) DEFAULT NULL,
  `con_last_degree` varchar(100) DEFAULT NULL,
  `con_country` varchar(100) DEFAULT NULL,
  `con_program_type` varchar(50) DEFAULT NULL,
  `con_query` text,
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_address` text,
  `customer_contact_name` varchar(100) DEFAULT NULL,
  `customer_photo` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_cell` varchar(50) DEFAULT NULL,
  `customer_etin` varchar(50) DEFAULT NULL,
  `customer_trade_license` varchar(100) DEFAULT NULL,
  `customer_rjsc_incorporation_refernce` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `f_size` bigint(22) NOT NULL,
  `f_link` varchar(255) NOT NULL,
  `f_type` varchar(255) NOT NULL,
  `d_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`fid`, `f_name`, `f_size`, `f_link`, `f_type`, `d_date`, `category_id`) VALUES
(1, '1418165947-Game-Theory.jpg', 79, 'http://localhost/dragdrop%20file%20upload/myuploads/1418165947-Game-Theory.jpg', 'image/jpeg', '2014-12-09', 0),
(2, '1418166135-0.jpg', 16, 'http://localhost/dragdrop%20file%20upload/images/1418166135-0.jpg', 'image/jpeg', '2014-12-10', 0),
(3, '1418166135-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 166, 'http://localhost/dragdrop%20file%20upload/images/1418166135-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 'image/jpeg', '2014-12-10', 0),
(4, '1418166135-38630_Narendra Modi2.jpg', 112, 'http://localhost/dragdrop%20file%20upload/images/1418166135-38630_Narendra Modi2.jpg', 'image/jpeg', '2014-12-10', 0),
(5, '1418166179-0.jpg', 16, 'http://localhost/phpextension/multiple_pic/1418166179-0.jpg', 'image/jpeg', '2014-12-10', 0),
(6, '1418166179-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 166, 'http://localhost/phpextension/multiple_pic/1418166179-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 'image/jpeg', '2014-12-10', 0),
(7, '1418166179-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/phpextension/multiple_pic/1418166179-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(8, '1418166180-38630_Narendra Modi2.jpg', 112, 'http://localhost/phpextension/multiple_pic/1418166180-38630_Narendra Modi2.jpg', 'image/jpeg', '2014-12-10', 0),
(9, '1418166180-abc.jpg', 54, 'http://localhost/phpextension/multiple_pic/1418166180-abc.jpg', 'image/jpeg', '2014-12-10', 0),
(10, '1418166275-glober.jpg', 36, 'http://localhost/phpextension/multiple_pic/1418166275-glober.jpg', 'image/jpeg', '2014-12-10', 0),
(11, '1418166280-glober.jpg', 36, 'http://localhost/phpextension/multiple_pic/1418166280-glober.jpg', 'image/jpeg', '2014-12-10', 0),
(12, '1418166285-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/phpextension/multiple_pic/1418166285-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(13, '1418166428-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/phpextension/multiple_pic/1418166428-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(14, '1418166428-0.jpg', 16, 'http://localhost/phpextension/multiple_pic/1418166428-0.jpg', 'image/jpeg', '2014-12-10', 0),
(15, '1418166495-0.jpg', 16, 'http://localhost/phpextension/multiple_pic/images1418166495-0.jpg', 'image/jpeg', '2014-12-10', 0),
(16, '1418166495-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 166, 'http://localhost/phpextension/multiple_pic/images1418166495-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 'image/jpeg', '2014-12-10', 0),
(17, '1418166495-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/phpextension/multiple_pic/images1418166495-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(18, '1418166495-38630_Narendra Modi2.jpg', 112, 'http://localhost/phpextension/multiple_pic/images1418166495-38630_Narendra Modi2.jpg', 'image/jpeg', '2014-12-10', 0),
(19, '1418166546-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 166, 'http://localhost/phpextension/multiple_pic/images/1418166546-3f53c3b826f8bd5c8d7f67654c0d3438.jpg', 'image/jpeg', '2014-12-10', 0),
(20, '1418166574-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/phpextension/multiple_pic/upload/1418166574-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(21, '1418166613-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 180, 'http://localhost/dragdrop%20file%20upload/images/1418166613-2013-07-free-desktop-wallpapers-of-nature-64.jpg', 'image/jpeg', '2014-12-10', 0),
(22, '1418166934-glober.jpg', 36, 'http://localhost/dragdrop%20file%20upload/images/1418166934-glober.jpg', 'image/jpeg', '2014-12-10', 0),
(23, '1418169771-Hans_Morgenthau.jpg', 15, 'http://localhost/dragdrop%20file%20upload/images/1418169771-Hans_Morgenthau.jpg', 'image/jpeg', '2014-12-10', 0),
(24, '1418169844-abc.jpg', 54, '$root/images/1418169844-abc.jpg', 'image/jpeg', '2014-12-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `goods_dispatch_note`
--

CREATE TABLE IF NOT EXISTS `goods_dispatch_note` (
  `gdn_no` int(11) NOT NULL AUTO_INCREMENT,
  `gdn_date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`gdn_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `goods_dispatch_note`
--


-- --------------------------------------------------------

--
-- Table structure for table `goods_returned`
--

CREATE TABLE IF NOT EXISTS `goods_returned` (
  `gr_no` int(11) NOT NULL AUTO_INCREMENT,
  `returned_date` date DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gr_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `goods_returned`
--


-- --------------------------------------------------------

--
-- Table structure for table `good_dispatch_chalan`
--

CREATE TABLE IF NOT EXISTS `good_dispatch_chalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gdn_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `warrenty` date DEFAULT NULL,
  `batch_no` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `vat_percent` int(11) DEFAULT NULL,
  `vat_amount` decimal(10,2) DEFAULT NULL,
  `total_cost_with_vat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `good_dispatch_chalan`
--


-- --------------------------------------------------------

--
-- Table structure for table `good_recive_chalan`
--

CREATE TABLE IF NOT EXISTS `good_recive_chalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `warrenty` date DEFAULT NULL,
  `batch_no` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `vat_percent` int(11) DEFAULT NULL,
  `vat_amount` decimal(10,2) DEFAULT NULL,
  `total_cost_with_vat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `good_recive_chalan`
--


-- --------------------------------------------------------

--
-- Table structure for table `good_recive_note`
--

CREATE TABLE IF NOT EXISTS `good_recive_note` (
  `grn_no` int(11) NOT NULL AUTO_INCREMENT,
  `grn_date` date DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`grn_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `good_recive_note`
--


-- --------------------------------------------------------

--
-- Table structure for table `good_returned_chalan`
--

CREATE TABLE IF NOT EXISTS `good_returned_chalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `warrenty` date DEFAULT NULL,
  `batch_no` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `vat_percent` int(11) DEFAULT NULL,
  `vat_amount` decimal(10,2) DEFAULT NULL,
  `total_cost_with_vat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `good_returned_chalan`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_group`
--

CREATE TABLE IF NOT EXISTS `item_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `stock_type` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE IF NOT EXISTS `item_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_unit_cost` decimal(10,2) DEFAULT NULL,
  `item_vat_percent` int(11) DEFAULT NULL,
  `item_vat_amount` decimal(10,2) DEFAULT NULL,
  `item_total_cost` decimal(10,2) DEFAULT NULL,
  `item_total_cost_with_vat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_posting`
--

CREATE TABLE IF NOT EXISTS `item_posting` (
  `level_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sub_group_id` int(11) DEFAULT NULL,
  `posting_level` varchar(40) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `uom` varchar(100) DEFAULT NULL,
  `minimum_order_quantity` varchar(100) DEFAULT NULL,
  `lead_time` time DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_posting`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_sub_group`
--

CREATE TABLE IF NOT EXISTS `item_sub_group` (
  `sub_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `sub_group_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sub_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_sub_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `left_settings_table`
--

CREATE TABLE IF NOT EXISTS `left_settings_table` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `icon` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL COMMENT 'Active=1, Deactivate=0',
  `access_level` varchar(100) DEFAULT NULL COMMENT 'Super Admin=1, Admin=2, User=3, Students=4, Employee=5',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `left_settings_table`
--

INSERT INTO `left_settings_table` (`sid`, `name`, `parent_id`, `url`, `picture`, `icon`, `status`, `access_level`) VALUES
(1, 'Home', 0, 'home', '', '', '1', '1,2,3'),
(12, 'Student Info', 11, 'student', '', '', '', NULL),
(49, 'Settings', 0, '', NULL, '', '1', '1'),
(50, 'User Activity', 49, 'log', NULL, '', '1', '1'),
(51, 'User Account', 49, 'users', NULL, '', '1', '1'),
(52, 'Email', 49, 'email', NULL, '', '1', '1,2,3'),
(54, 'Left Settings', 49, 'left_setting', NULL, '', '1', '1'),
(32, 'Employee info Indivisually', 8, 'employee_info_indivisually', NULL, '', '1', '5'),
(69, 'Email', 0, 'view_contact', NULL, '', '1', '1,2'),
(80, 'Report Settings', 49, 'report_logo', NULL, '', '1', '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE IF NOT EXISTS `order_form` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `terms_of_purchase` text,
  `target_delivary_date` date DEFAULT NULL,
  `mode_of_transport` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order_form`
--


-- --------------------------------------------------------

--
-- Table structure for table `report_settings`
--

CREATE TABLE IF NOT EXISTS `report_settings` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rlogo` text,
  `raddress` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `report_settings`
--

INSERT INTO `report_settings` (`rid`, `rlogo`, `raddress`, `status`) VALUES
(1, 'images/cooltext189941490120752.png', '<p>17/4, Chamelibag, Shantinagar, Dhaka-1217</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `sid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `picture` text NOT NULL,
  `status` int(1) NOT NULL,
  `access_level` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sid`, `name`, `url`, `picture`, `status`, `access_level`) VALUES
(1, 'User Account', 'user', 'images/abcde.PNG', 0, '1'),
(2, 'Page Category', 'page_category', 'images/category.png', 0, '1,2,3'),
(3, 'Pages', 'pages', 'images/pages.png', 0, '1,2,3'),
(4, 'Searchs Pages', 'home/viewcostSearch', 'images/search.png', 0, '1,2,3'),
(5, 'Menu Manager', 'home/view_main_menu', 'images/menu.png', 0, '1,2,3'),
(6, 'Staff Info', 'staff', 'images/staff.png', 0, '1,2,3'),
(7, 'Logo', 'logo', 'images/ad.png', 0, '1,2,3'),
(8, 'Video', 'video', 'images/video.png', 0, '1,2,3'),
(9, 'Gallery Category', 'gallery_category', 'images/gallery_category_icon.png', 0, '1,2,3'),
(10, 'Gallery', 'gallery', 'images/photos.png', 0, '1,2,3'),
(11, 'Banner Slide Show', 'banner', 'images/slideshow.png', 0, '1,2'),
(12, 'Ticker', 'ticker', 'images/tik.png', 0, '1,2'),
(13, 'User Activity', 'log', 'images/log.png', 0, '1,2,3'),
(14, 'Email', 'email', 'images/mail.png', 0, '1,2,3'),
(15, 'Social Media', 'social', 'images/face1book.png', 0, '1,2,3'),
(16, 'Log Out', 'login/logOut', 'images/logout.png', 0, '1,2,3'),
(17, 'Job Portal', 'home/view_admin_career', 'images/abcde.PNG', 0, '1,2'),
(18, 'Module', 'home/view_breaking', 'images/module.png', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_address` text,
  `supplier_contact_name` varchar(100) DEFAULT NULL,
  `supplier_photo` text,
  `supplier_email` varchar(100) DEFAULT NULL,
  `supplier_cell` varchar(100) DEFAULT NULL,
  `supplier_etin` varchar(100) DEFAULT NULL,
  `supplier_trace_license` varchar(100) DEFAULT NULL,
  `supplier_rjsc_incorporation_reference` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `suppliers`
--


-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE IF NOT EXISTS `top_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL DEFAULT '',
  `newsid` int(11) NOT NULL,
  `external_link` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `menu_tbl_ibk_1` (`newsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `top_menu`
--

INSERT INTO `top_menu` (`menu_id`, `label`, `newsid`, `external_link`, `parent`, `sort`, `status`) VALUES
(1, 'about', 0, 'about', 0, 0, 1),
(2, 'Home', 0, 'Home', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `national_id` int(20) DEFAULT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL COMMENT 'superadmin=1,admin=2,user=3,students=4,employee=5',
  `user_picture` text,
  `date_of_birth` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`user_id`, `user_name`, `full_name`, `user_pass`, `email_address`, `national_id`, `mobile_phone`, `user_type`, `user_picture`, `date_of_birth`, `status`) VALUES
(1, 'rahimidb', 'Md. Abdur Rahim Bhuiyan', 'admin321#', 'rahimidb@gmail.com', 12222222, '01979966999', '1', 'images/DP1261_.jpg', '2016-01-07', 1),
(9, 'admin', 'Abdur Rahim Bhuiyan', 'admin321', 'rahim@pingbd.com', 1122222, '01739227722', '2', 'images/dilu.jpg', '2016-06-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`uid`, `user_type`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
