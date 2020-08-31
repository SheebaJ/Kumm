-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2020 at 04:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placemt`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

DROP TABLE IF EXISTS `applied`;
CREATE TABLE IF NOT EXISTS `applied` (
  `aid` varchar(5) NOT NULL,
  `stdid` varchar(5) NOT NULL,
  `profile` varchar(40) NOT NULL,
  `jobid` varchar(5) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `cid` varchar(5) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`aid`, `stdid`, `profile`, `jobid`, `resume`, `cid`) VALUES
('P2C98', '0DUMX', 'SOFTWARE DEVELOPER', '03GNC', 'az.pdf', 'T326Y'),
('Q26N2', 'DD7JE', 'MANAGER', 'GY31Z', 'C graphics.pdf', 'U1GE3'),
('IOEJX', 'DD7JE', 'SOFTWARE TESTER', '3B4TY', 'C_aptitude.pdf', 'T326Y'),
('PK5SX', 'DD7JE', 'SOFTWARE DEVELOPER', '03GNC', 'az.pdf', 'T326Y'),
('MZ5SP', 'I6TIZ', 'SOFTWARE DEVELOPER', '03GNC', '1.pdf', 'T326Y'),
('N8SDE', 'DD7JE', 'DATA ANALYST', '82AAC', 'C graphics.pdf', 'T326Y'),
('25CAB', 'NF2UN', 'DATA ANALYST', 'E3GKB', 'az.pdf', 'T326Y');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `cid` varchar(6) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cphoneno` int(10) NOT NULL,
  `cmail` varchar(30) NOT NULL,
  `caddress` varchar(300) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `cname`, `cphoneno`, `cmail`, `caddress`, `cpassword`) VALUES
('U1GE3', 'abc', 4356, 'wdsfghjmm', 'dfghjk,merthgjkdgfhj\ncfghjbk', 'abc'),
('T326Y', '123', 1234567890, 'sdfghj', 'dftghjkdzfgchjdrfghj\nfyghjkesrdtfyghjk\ndrftgyhjdftghjk\ndrtfgyhjkdfgyhjk\ndrftghj-67', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stdid` varchar(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `aggrperc` int(3) NOT NULL,
  `address` varchar(200) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `spassword` varchar(30) NOT NULL,
  PRIMARY KEY (`stdid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdid`, `name`, `dob`, `mobilenumber`, `gender`, `emailid`, `aggrperc`, `address`, `branch`, `spassword`) VALUES
('LC4L3', 'abc1', '54678', '4567866', 'MALE', 'jhfdghvj', 72, 'gfchvjkfghnm', 'BCA', 'abc'),
('0DUMX', 'abc2', '4554', '789957791', 'MALE', 'jvkgfhjfghjk', 54, 'dfghjkdgfhj', 'BE', 'abc'),
('DD7JE', 'abc', '12/10/2018', '7899577910', 'MALE', 'viveksaravanan06@gmail.com', 80, 'Banglore-57', 'BBA', 'abc'),
('I6TIZ', 'aaa', '1996-02-01', '9876789763', 'female', 'aaa@gmail.com', 80, 'chennai,india', 'BSc', 'aaa'),
('Y03GX', 'qqqq', '1994-02-28', '9876545678', 'female', 'qqq@gmail.com', 90, 'chennai', 'BBA', 'qqqq'),
('KPXXG', 'sss', '1996-02-04', '9876478975', 'male', 'sss@gmail.com', 789, 'Bangalore', 'BBA', 'sss'),
('NF2UN', 'yyyy', '2020-08-09', '9876789879', 'male', 'yyyy@gmail.com', 90, 'hjh', 'BCA', 'yyyy');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
CREATE TABLE IF NOT EXISTS `vacancy` (
  `cid` varchar(10) NOT NULL,
  `profile` varchar(30) NOT NULL,
  `salary` varchar(15) NOT NULL,
  `location` varchar(25) NOT NULL,
  `bond` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `fresher` varchar(15) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `backlogs` int(10) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `jobid` varchar(5) NOT NULL,
  PRIMARY KEY (`jobid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`cid`, `profile`, `salary`, `location`, `bond`, `experience`, `fresher`, `percentage`, `backlogs`, `stream`, `skills`, `jobid`) VALUES
('T326Y', 'SOFTWARE TESTER', '56789', 'MUMBAI', '3', '3', 'YES', '90', 1, 'ANY', 'ajsdhad ajd, akskadhajkd , jashkadh  ', '6GJ1K'),
('T326Y', 'DATA ANALYST', '90005', 'BANGLORE', '4', '3', 'NO', '70', 0, 'MCA', 'Analytical ability , fast learner', 'E3GKB'),
('T326Y', 'WEB DESIGNER', '343', 'PUNE', '2', '3', 'NO', '60', 0, 'afafag', 'yukyuo', '7H30P'),
('U1GE3', 'HR', '48000', 'MUMBAI', 'NO', 'NO', 'YES', '75', 0, 'MBA,Mcom,MCA,BCA', '	1. Communication is Must\n2. Programming Skills Required.', 'PPF9T');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
