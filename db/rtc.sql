-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2017 at 02:35 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varbinary(100) NOT NULL,
  `pass` varbinary(100) NOT NULL,
  `forget` varbinary(100) NOT NULL,
  `dob` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`created`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `pass`, `forget`, `dob`, `created`) VALUES
(19, '633a612ae9cb31748e12a8369dcf2801', '6abc9eba853ea08dd0e97810f68194e7', '633a612ae9cb31748e12a8369dcf2801', '1996-06-06', '2016-11-26 06:42:17'),
(20, '68154466f81bfb532cd70f8c71426356', '68154466f81bfb532cd70f8c71426356', '633a612ae9cb31748e12a8369dcf2801', '2016-04-27', '2016-11-26 06:43:06'),
(21, 'ce01fbb06d578b8e73184bac41bcbd31', '202cb962ac59075b964b07152d234b70', '633a612ae9cb31748e12a8369dcf2801', '2016-11-28', '2016-11-28 16:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `block_id` int(5) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(50) NOT NULL,
  `state_id` int(5) NOT NULL,
  `district_id` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `block_name`, `state_id`, `district_id`, `created`) VALUES
(7, 'GIRIDIH', 10, 7, '2016-11-04 14:20:14'),
(8, 'BAGODAR', 10, 7, '2016-11-08 08:29:10'),
(9, 'BENGABAD', 10, 7, '2016-11-08 08:29:54'),
(10, 'BIRNI', 10, 7, '2016-11-08 08:30:13'),
(11, 'DEORI', 10, 7, '2016-11-08 08:30:30'),
(12, 'DHANWAR', 10, 7, '2016-11-08 08:30:51'),
(13, 'DUMRI', 10, 7, '2016-11-08 08:31:10'),
(14, 'GANDEY', 10, 7, '2016-11-08 08:31:30'),
(15, 'GAWAN', 10, 7, '2016-11-08 08:31:56'),
(16, 'JAMUA', 10, 7, '2016-11-08 08:32:18'),
(17, 'PIRTAND', 10, 7, '2016-11-08 08:32:45'),
(18, 'SURIYA', 10, 7, '2016-11-08 08:33:05'),
(19, 'TISRI', 10, 7, '2016-11-08 08:33:26'),
(20, 'CHANDWARA', 10, 8, '2016-11-08 08:35:02'),
(21, 'DOMCHANCH', 10, 8, '2016-11-08 08:35:22'),
(22, 'JAINAGAR', 10, 8, '2016-11-08 08:35:48'),
(23, 'MARKACHO', 10, 8, '2016-11-08 08:36:19'),
(24, 'SATGAWAN', 10, 8, '2016-11-08 08:36:42'),
(25, 'KODERMA', 10, 8, '2016-11-08 08:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(5) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(50) NOT NULL,
  `state_id` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `state_id`, `created`) VALUES
(7, 'GIRIDIH', 10, '2016-11-04 13:56:55'),
(8, 'KODERMA', 10, '2016-11-04 13:57:16'),
(9, 'DHANBAD', 10, '2016-11-04 13:57:38'),
(10, 'BOKARO', 10, '2016-11-04 13:57:48'),
(11, 'DUMKA', 10, '2016-11-04 13:59:15'),
(12, 'RANCHI', 10, '2016-11-04 13:59:38'),
(13, 'HAZARIBAG', 10, '2016-11-04 13:59:53'),
(14, 'PATNA', 11, '2016-11-04 14:00:40'),
(15, 'CHATRA', 10, '2016-11-07 18:19:50'),
(16, 'DEOGHAR', 10, '2016-11-07 18:20:16'),
(17, 'EAST SINGHBHUM', 10, '2016-11-07 18:20:54'),
(18, 'GARHWA', 10, '2016-11-07 18:21:07'),
(19, 'GODDA', 10, '2016-11-07 18:21:21'),
(20, 'GUMLA', 10, '2016-11-07 18:21:33'),
(21, 'JAMTARA', 10, '2016-11-07 18:21:57'),
(22, 'KHUNTI', 10, '2016-11-07 18:22:09'),
(23, 'LATEHAR', 10, '2016-11-07 18:22:44'),
(24, 'LOHARDAGA', 10, '2016-11-07 18:22:55'),
(25, 'PAKUR', 10, '2016-11-07 18:23:08'),
(26, 'PALAMU', 10, '2016-11-07 18:23:19'),
(27, 'RAMGARH', 10, '2016-11-07 18:23:31'),
(28, 'SAHIBGANJ', 10, '2016-11-07 18:24:01'),
(29, 'SERAIKELA KHARSAWAN', 10, '2016-11-07 18:24:27'),
(30, 'SIMDEGA', 10, '2016-11-07 18:24:39'),
(31, 'WEST SINGHBHUM', 10, '2016-11-07 18:25:03'),
(32, 'ARARIA', 11, '2016-11-07 18:28:22'),
(33, 'ARWAL', 11, '2016-11-07 18:28:32'),
(34, 'AURANGABAD', 11, '2016-11-07 18:28:43'),
(35, 'BANKA', 11, '2016-11-07 18:28:53'),
(36, 'BEGUSARAI', 11, '2016-11-07 18:29:03'),
(37, 'BHAGALPUR', 11, '2016-11-07 18:29:13'),
(38, 'BHOJPUR', 11, '2016-11-07 18:29:22'),
(39, 'BUXAR', 11, '2016-11-07 18:29:32'),
(40, 'DARBHANGA', 11, '2016-11-07 18:29:43'),
(41, 'EAST CHAMPARAN', 11, '2016-11-07 18:29:58'),
(42, 'GAYA', 11, '2016-11-07 18:30:08'),
(43, 'GOPALGANJ', 11, '2016-11-07 18:30:18'),
(44, 'JAMUI', 11, '2016-11-07 18:30:29'),
(45, 'JEHANABAD', 11, '2016-11-07 18:30:46'),
(46, 'KAIMUR', 11, '2016-11-07 18:30:57'),
(47, 'KATIHAR', 11, '2016-11-07 18:31:07'),
(48, 'KHAGARIA', 11, '2016-11-07 18:31:19'),
(49, 'KISHANGANJ', 11, '2016-11-07 18:31:30'),
(50, 'LAKHISARAI', 11, '2016-11-07 18:31:42'),
(51, 'MADHEPURA', 11, '2016-11-07 18:31:53'),
(52, 'MADHUBANI', 11, '2016-11-07 18:32:02'),
(53, 'MUNGER', 11, '2016-11-07 18:32:12'),
(54, 'MUZAFFARPUR', 11, '2016-11-07 18:32:23'),
(55, 'NALANDA', 11, '2016-11-07 18:32:38'),
(56, 'NAWADA', 11, '2016-11-07 18:32:48'),
(57, 'PURNIA', 11, '2016-11-07 18:33:19'),
(58, 'ROHTAS', 11, '2016-11-07 18:33:31'),
(59, 'SAHARSA', 11, '2016-11-07 18:33:42'),
(60, 'SAMASTIPUR', 11, '2016-11-07 18:33:53'),
(61, 'SARAN', 11, '2016-11-07 18:34:02'),
(62, 'SHEIKHPURA', 11, '2016-11-07 18:34:13'),
(63, 'SHEOHAR', 11, '2016-11-07 18:34:22'),
(64, 'SITAMARHI', 11, '2016-11-07 18:34:38'),
(65, 'SIWAN', 11, '2016-11-07 18:34:47'),
(66, 'SUPAUL', 11, '2016-11-07 18:34:58'),
(67, 'VAISHALI', 11, '2016-11-07 18:35:10'),
(68, 'WEST CHAMPARAN', 11, '2016-11-07 18:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `doc_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `path` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `title`, `doc_name`, `path`) VALUES
(25, 'This website is Launched on 09-01-2017 in Rozgar Training Center Koderma.', 'Skill development and livelihood.pdf', '9eauE7a2017');

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE IF NOT EXISTS `emp_master` (
  `emp_id` int(6) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `emp_type` int(2) NOT NULL,
  `emp_fname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_gender` int(2) NOT NULL,
  `emp_aadhar` varchar(12) CHARACTER SET utf8 NOT NULL,
  `emp_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emp_mob` varchar(10) CHARACTER SET utf8 NOT NULL,
  `state` int(3) NOT NULL,
  `district` int(5) NOT NULL,
  `block` int(8) NOT NULL,
  `village` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pin` int(6) NOT NULL,
  `photo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `join_date` date NOT NULL,
  `sallary` int(6) NOT NULL,
  `reg_code` varchar(15) CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `reg_code` (`reg_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE IF NOT EXISTS `emp_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emp_type`
--

INSERT INTO `emp_type` (`id`, `type`) VALUES
(1, 'Teacher'),
(2, 'Clerk'),
(3, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `path` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `photo`, `path`) VALUES
(32, 'group', '20160716_180854.jpg', '213Iiai2016'),
(33, 'Ranjit Sir', '[000849].jpg', '9a57a422017');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `gender_type` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_type`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE IF NOT EXISTS `marital` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`id`, `type`) VALUES
(1, 'Married'),
(2, 'Unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `type`) VALUES
(1, 'Matric'),
(2, 'Inter'),
(3, 'Graduation'),
(4, 'Post Graduation'),
(5, 'Polytechnic'),
(6, 'B-Tech');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int(5) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `created`) VALUES
(10, 'JHARKHAND', '2016-11-04 13:53:53'),
(11, 'BIHAR', '2016-11-04 13:54:04'),
(13, 'ANDHRA PRADESH', '2016-11-07 18:06:33'),
(14, 'ARUNACHAL PRADESH', '2016-11-07 18:06:45'),
(15, 'ASSAM', '2016-11-07 18:06:53'),
(16, 'CHHATTISGARH', '2016-11-07 18:07:13'),
(17, 'GOA', '2016-11-07 18:07:43'),
(18, 'GUJARAT', '2016-11-07 18:07:53'),
(19, 'HARYANA', '2016-11-07 18:08:09'),
(20, 'HIMACHAL PRADESH', '2016-11-07 18:08:18'),
(21, 'JAMMU AND KASHMIR', '2016-11-07 18:08:29'),
(22, 'KARNATAKA', '2016-11-07 18:08:50'),
(23, 'KERALA', '2016-11-07 18:09:04'),
(24, 'MADHYA PRADESH', '2016-11-07 18:09:13'),
(25, 'MAHARASHTRA', '2016-11-07 18:09:20'),
(26, 'MANIPUR', '2016-11-07 18:09:31'),
(27, 'MEGHALAYA', '2016-11-07 18:09:40'),
(28, 'MIZORAM', '2016-11-07 18:09:51'),
(29, 'NAGALAND', '2016-11-07 18:09:59'),
(30, 'ODISHA', '2016-11-07 18:10:06'),
(31, 'PUNJAB', '2016-11-07 18:10:16'),
(32, 'RAJASTHAN', '2016-11-07 18:10:25'),
(33, 'SIKKIM', '2016-11-07 18:10:33'),
(34, 'TAMIL NADU', '2016-11-07 18:10:46'),
(35, 'TRIPURA', '2016-11-07 18:10:53'),
(36, 'UTTAR PRADESH', '2016-11-07 18:10:59'),
(37, 'UTTARAKHAND', '2016-11-07 18:11:06'),
(38, 'WEST BENGAL', '2016-11-07 18:11:14'),
(39, 'TELANGANA', '2016-11-07 18:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `reg_id` int(10) NOT NULL,
  `qualification` int(2) NOT NULL,
  `marital` int(2) NOT NULL,
  `state_id` int(2) NOT NULL,
  `district_id` int(2) NOT NULL,
  `block_id` int(3) NOT NULL,
  `village` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pin` int(6) NOT NULL,
  `bank_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bank_account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `branch` varchar(30) CHARACTER SET utf8 NOT NULL,
  `trade` varchar(50) CHARACTER SET utf8 NOT NULL,
  `batch_period` varchar(24) CHARACTER SET utf8 NOT NULL,
  `fee` int(6) NOT NULL,
  `admission_date` date NOT NULL,
  `company_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `job_status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sallary` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE IF NOT EXISTS `student_master` (
  `reg_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8 NOT NULL,
  `aadhar` varchar(12) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mob` varchar(10) CHARACTER SET utf8 NOT NULL,
  `image` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sign` varchar(30) CHARACTER SET utf8 NOT NULL,
  `reg_code` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reg_id`,`created`),
  UNIQUE KEY `reg_code` (`reg_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
