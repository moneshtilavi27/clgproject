-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 04:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcaclg`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(50) NOT NULL,
  `fid` int(50) NOT NULL,
  `adhar` varchar(2000) NOT NULL,
  `bank_doc` varchar(2000) NOT NULL,
  `pan` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `fid`, `adhar`, `bank_doc`, `pan`) VALUES
(2, 1, 'http://localhost/clgproject/content/aadhar1.png', 'http://localhost/clgproject/content/passbook.jpg', 'http://localhost/clgproject/content/pancard.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(50) NOT NULL,
  `faculty_id` int(50) NOT NULL,
  `fimage` varchar(5000) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` int(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `workdur` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankbranch` varchar(100) NOT NULL,
  `bankacc` int(25) NOT NULL,
  `bankifsc` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `facultytype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `faculty_id`, `fimage`, `name`, `mobile`, `email`, `address`, `workdur`, `department`, `bankname`, `bankbranch`, `bankacc`, `bankifsc`, `username`, `password`, `facultytype`) VALUES
(1, 1, 'http://localhost/clgproject/content/about.jpg', 'ABC XYZ', 2147483647, 'xyz@gmail.com', 'A/P Belagavi', 'on', 'MCA', 'HDFC', 'Belagavi', 789945562, '1234', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `facultywork`
--

CREATE TABLE `facultywork` (
  `wid` int(50) NOT NULL,
  `fid` int(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `modeOfExam` varchar(50) NOT NULL,
  `roleid` int(50) NOT NULL,
  `sub_id` int(50) NOT NULL,
  `scriptDate` date NOT NULL,
  `given_script` varchar(50) NOT NULL,
  `scheme` varchar(50) NOT NULL,
  `question_paper` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `add_comment` varchar(50) NOT NULL,
  `evaluvated_script` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultywork`
--

INSERT INTO `facultywork` (`wid`, `fid`, `department`, `year`, `modeOfExam`, `roleid`, `sub_id`, `scriptDate`, `given_script`, `scheme`, `question_paper`, `rate`, `add_comment`, `evaluvated_script`) VALUES
(4, 1, 'MCA', '2018', 'Regular', 1, 3, '2022-01-25', '30', 'scheme', 'question_paper', 30, 'mjhj', '15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` bigint(50) NOT NULL,
  `me_id` bigint(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `me_id`, `username`, `password`, `user`) VALUES
(1, 0, 'Admin', 'Pass', 'Admin'),
(8, 1, 'Kittu', 'Kittu', 'Faculty'),
(9, 4, 'monesh', 'monesh', 'faculty'),
(10, 5, 'Monesh', 'Monesh123', 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notiId` int(50) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `mode` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notiId`, `msg`, `mode`) VALUES
(1, 'it new notification for faculty', 1),
(2, 'helo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pricerate`
--

CREATE TABLE `pricerate` (
  `pid` int(50) NOT NULL,
  `roleid` int(50) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricerate`
--

INSERT INTO `pricerate` (`pid`, `roleid`, `rate`) VALUES
(1, 1, 130);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(50) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'Evaluation'),
(2, 'Question Paper Set And Scheme');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(50) NOT NULL,
  `sem` int(50) NOT NULL,
  `sub_code` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sem`, `sub_code`, `subject`) VALUES
(3, 5, '18MCA51\r\n', 'Mobile Application'),
(4, 5, '18MCA52', '.Net Programming using c#'),
(5, 5, '18MCA53', 'Machine Learning'),
(6, 5, '18MCA542', 'Cyber Security and Cyber Laws'),
(7, 5, '18MCA543', 'Block Chain'),
(8, 5, '18MCA551', 'Web 3.0 and Rich Internate Application'),
(9, 5, '18MCA553', 'No SQL'),
(10, 3, '20MCA31', 'Design and Analysis of Algorithm'),
(11, 3, '20MCA32', 'Big Data Paradigm'),
(12, 3, '20MCA33', 'C# Programming with .NET'),
(13, 3, '20MCA34', 'Machine Learning'),
(14, 3, '20MCA352', 'R-Programming'),
(15, 3, '20MCA353', 'Cloud Computting'),
(16, 3, '20MCA362', 'Full Stack Development'),
(17, 3, '20MCA363', 'Artificial Intelligence'),
(18, 3, '20MCA364', 'Block Chain Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `facultywork`
--
ALTER TABLE `facultywork`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `roleid` (`roleid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notiId`);

--
-- Indexes for table `pricerate`
--
ALTER TABLE `pricerate`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `roleid` (`roleid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facultywork`
--
ALTER TABLE `facultywork`
  MODIFY `wid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notiId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricerate`
--
ALTER TABLE `pricerate`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultywork`
--
ALTER TABLE `facultywork`
  ADD CONSTRAINT `facultywork_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultywork_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultywork_ibfk_3` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pricerate`
--
ALTER TABLE `pricerate`
  ADD CONSTRAINT `roleid` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
