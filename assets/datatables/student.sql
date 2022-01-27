-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 02:04 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbatch`
--

CREATE TABLE `addbatch` (
  `b_id` bigint(50) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addbatch`
--

INSERT INTO `addbatch` (`b_id`, `batch_name`, `class_name`) VALUES
(14, 'A', 'PUC I'),
(15, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `addclass`
--

CREATE TABLE `addclass` (
  `cl_id` bigint(50) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addclass`
--

INSERT INTO `addclass` (`cl_id`, `class_name`) VALUES
(38, 'PUC I');

-- --------------------------------------------------------

--
-- Table structure for table `admin_remark`
--

CREATE TABLE `admin_remark` (
  `id` int(11) NOT NULL,
  `descr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_remark`
--

INSERT INTO `admin_remark` (`id`, `descr`) VALUES
(1, 'aaa'),
(2, 'abc'),
(3, 'hello'),
(4, 'oo'),
(5, 'fff');

-- --------------------------------------------------------

--
-- Table structure for table `atte_stud`
--

CREATE TABLE `atte_stud` (
  `a_id` bigint(50) NOT NULL,
  `id` bigint(50) NOT NULL,
  `teach_id` bigint(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `division` varchar(30) NOT NULL,
  `date` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atte_stud`
--

INSERT INTO `atte_stud` (`a_id`, `id`, `teach_id`, `class`, `section`, `division`, `date`, `sub`, `status`) VALUES
(157, 37, 1, 'PUC I', 'Science', 'A', '2019-12-22', 'Marathi', 'Absent'),
(158, 37, 4, 'PUC I', 'Science', 'A', '2019-12-25', 'Chemestry', 'present'),
(159, 37, 40, 'PUC I', 'Science', 'A', '2019-12-28', 'Physics', 'present'),
(160, 38, 40, 'PUC I', 'Science', 'A', '2019-12-28', 'Physics', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` bigint(30) NOT NULL,
  `id` bigint(50) NOT NULL,
  `adhar` varchar(500) NOT NULL,
  `income_cast` varchar(500) NOT NULL,
  `tc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `id`, `adhar`, `income_cast`, `tc`) VALUES
(17, 37, '../../images/document/adhar/81524.0.jpg', '../../images/document/ic/81524.0.jpg', '../../images/document/transefer/81524.0.jpg'),
(18, 38, '../../images/document/adhar/81524.0.jpg', '../../images/document/ic/81524.0.jpg', '../../images/document/transefer/81524.0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `just_see`
--

CREATE TABLE `just_see` (
  `id` bigint(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `just_see`
--

INSERT INTO `just_see` (`id`, `name`) VALUES
(1, 'monesh'),
(1, '2'),
(1, 'prasad');

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `stateid` int(11) NOT NULL,
  `id` bigint(50) NOT NULL,
  `parents_id` bigint(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`stateid`, `id`, `parents_id`, `status`) VALUES
(7, 28, 38, 'Approved'),
(10, 32, 42, 'Approved'),
(11, 32, 42, 'Approved'),
(28, 32, 42, 'Rejected'),
(29, 32, 42, 'Approved'),
(30, 32, 42, 'Approved'),
(31, 32, 42, 'Rejected'),
(32, 32, 42, 'Approved'),
(33, 32, 42, 'Approved'),
(34, 32, 42, 'Approved'),
(35, 32, 42, 'Rejected'),
(36, 32, 42, 'Approved'),
(37, 32, 42, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` bigint(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_id` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `username`, `pass`, `user`, `user_id`) VALUES
(1, 'admin', 'pass', 'admin', 1),
(2, 'kabir', 'singh', 'teacher', 1),
(4, 'prasad', 'prasad', 'student', 33),
(10, 'prasad', 'prasad123', 'parents', 53),
(23, 'monesh', 'Teddy', 'student', 37),
(55, 'sachin', 'pass', 'teacher', 0),
(56, 'varsha', 'patil', 'teacher', 39),
(57, 'moneshtilavi', 'sanjutilavi', 'student', 39),
(58, 'sanjutilavi', 'moneshtilavi', 'parent', 57),
(59, 'varsha123', 'varsha123', 'teacher', 40),
(60, 'sachin409', 'pass749', 'teacher', 41),
(61, 'sachin350', 'pass422', 'teacher', 42),
(62, 'radhika', 'pass', 'teacher', 43);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` bigint(50) NOT NULL,
  `teach_id` bigint(50) NOT NULL,
  `Topic` varchar(500) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `size` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `teach_id`, `Topic`, `class`, `section`, `subject`, `file`, `size`, `date`) VALUES
(7, 1, 'test', 'PUC I', 'Science', 'Physics', 'notes/stockzone_Reveiws.docx', '0.74', '21-11-2019'),
(8, 1, 'INDUCTION MOTAR', 'PUC I', 'Science', 'Physics', 'notes/report.docx', '0.01', '09-12-2019'),
(9, 43, 'asasa', 'PUC I', 'Science', 'Physics', '../../notes/ONLINE PAINT CHOOSING  MANAGEMENT SYSTEM.docx', '0.02', '29-12-2019'),
(10, 43, 'asas', 'PUC I', 'Science', 'Physics', '../../notes/ONLINE PAINT CHOOSING  MANAGEMENT SYSTEM.docx', '0.02', '29-12-2019'),
(11, 43, 'maths', 'PUC I', 'Science', 'Mathematics', '../../notes/ONLINE PAINT CHOOSING  MANAGEMENT SYSTEM.docx', '0.02', '29-12-2019');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `select_notice` varchar(20) NOT NULL,
  `send_notice` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `file` varchar(20) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `select_notice`, `send_notice`, `date`, `file`, `msg`) VALUES
(25, 'Exam', 'Student', '2019-12-20', 'study time', 'This Is study time so plese study'),
(27, 'Exam', 'Student', '2019-12-29', 'Study Time', 'In Comming 30 th Jan We have organized farewell Party For Your Senior. '),
(28, 'Farewell', 'Teacher', '2019-12-29', 'Kabir', 'Singh');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `off_id` bigint(50) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `reservation` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`off_id`, `medium`, `reservation`, `lang`) VALUES
(63, 'English Medium', '147852', 'pcmb'),
(64, 'Kannada Medium', '', ''),
(65, 'Kannada Medium', 'general', 'kannada'),
(66, 'Kannada Medium', 'general', 'kannada'),
(67, 'Kannada Medium', 'general', 'kannada'),
(68, 'Kannada Medium', 'general', 'kannada'),
(69, 'Kannada Medium', 'general', 'kannada'),
(70, 'English Medium', 'general', 'kannada'),
(71, 'English Medium', 'general', 'kannada'),
(72, 'English Medium', '123', 'pcmb'),
(73, 'English Medium', 'fds', 'gdg'),
(74, 'English Medium', '434', 'feesf'),
(75, 'Kannada Medium', 'obc', 'S1'),
(76, 'English Medium', '24423', 'pcmb'),
(77, 'English Medium', '43243', 'dsf'),
(78, 'English Medium', '43243', 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parents_id` bigint(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `gaurdinian_name` varchar(50) NOT NULL,
  `gauardian_address` varchar(1000) NOT NULL,
  `mob` bigint(40) NOT NULL,
  `income` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parents_id`, `father`, `mother`, `gaurdinian_name`, `gauardian_address`, `mob`, `income`) VALUES
(42, 'sanju', 'Shubhangi', 'Sanju', 'Da Colony', 8884135864, 8884135864),
(43, '', '', '', '', 0, 0),
(44, 'Arjun', 'Geeta', 'vishal', 'belgaum', 8147670932, 8147670932),
(45, 'Arjun', 'Geeta', 'vishal', 'Belgaum', 8147670932, 8147670932),
(46, 'Arjun', 'Geeta', 'vishal', 'Belgaum', 8147670932, 8147670932),
(47, 'Arjun', 'Geeta', 'vishal', 'Belgaum', 8147670932, 8147670932),
(48, 'Arjun', 'Geeta', 'vishal', 'Belgaum', 8147670932, 8147670932),
(49, 'Arjun', 'Geeta', 'vishal', 'bgm', 8147670932, 8147670932),
(50, 'Arjun', 'Geeta', 'vishal', 'bgm', 8147670932, 8147670932),
(51, 'sanju', 'Shubhangi', 'Sanju', 'Belgaum', 98765432, 98765432),
(52, 'fdfd', 'gfdggf', 'gdfg', 'gfgfd', 987654321, 987654321),
(53, 'vdsv', 'vdsv', 'vbdsfv', 'vsdv', 987654, 987654),
(54, 'Chandrakant', 'Malu', 'chandrakant', 'blg', 7418529635, 7418529635),
(55, 'M', 'm', 'm', 'm', 0, 0),
(56, 'sasa', 'dwsdwd', 'sasa', 'wdwdwe', 98765432, 98765432),
(57, 'sasa', 'dwsdwd', 'sasa', 'wdwdwe', 98765432, 98765432);

-- --------------------------------------------------------

--
-- Table structure for table `previous`
--

CREATE TABLE `previous` (
  `prev_id` bigint(50) NOT NULL,
  `id` bigint(50) NOT NULL,
  `sch_name` varchar(500) NOT NULL,
  `sch_add` varchar(1000) NOT NULL,
  `sch_reg` varchar(100) NOT NULL,
  `sch_year` varchar(50) NOT NULL,
  `sch_month` varchar(50) NOT NULL,
  `prevsub1` varchar(50) NOT NULL,
  `marks1` bigint(50) NOT NULL,
  `prevsub2` varchar(50) NOT NULL,
  `marks2` bigint(50) NOT NULL,
  `prevsub3` varchar(50) NOT NULL,
  `marks3` bigint(50) NOT NULL,
  `prevsub4` varchar(50) NOT NULL,
  `marks4` bigint(50) NOT NULL,
  `prevsub5` varchar(50) NOT NULL,
  `marks5` bigint(50) NOT NULL,
  `prevsub6` varchar(50) NOT NULL,
  `marks6` bigint(50) NOT NULL,
  `total` bigint(100) NOT NULL,
  `percentage` bigint(100) NOT NULL,
  `result` varchar(50) NOT NULL,
  `medium` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previous`
--

INSERT INTO `previous` (`prev_id`, `id`, `sch_name`, `sch_add`, `sch_reg`, `sch_year`, `sch_month`, `prevsub1`, `marks1`, `prevsub2`, `marks2`, `prevsub3`, `marks3`, `prevsub4`, `marks4`, `prevsub5`, `marks5`, `prevsub6`, `marks6`, `total`, `percentage`, `result`, `medium`) VALUES
(12, 37, 'svc', 'svc', 'sdc', 'csc', 'csedc', 'fs', 54, 'fsf', 54, 'fsf', 45, 'fes', 54, 'fs', 54, 'ffes', 5, 3424, 34, 'gfd', 'vd'),
(13, 38, 'mmm', 'mmm', '467', '3543', '33', 'ewf', 575, 'ef', 57, 'fesff', 57, 'fef', 25, 'fef', 55, 'fe', 55, 555, 35, 'fe', 'fe');

-- --------------------------------------------------------

--
-- Table structure for table `stud_leave`
--

CREATE TABLE `stud_leave` (
  `Leave_ID` bigint(50) NOT NULL,
  `id` bigint(50) NOT NULL,
  `parents_id` bigint(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `fromdate` varchar(50) NOT NULL,
  `todate` varchar(50) NOT NULL,
  `totalnoofdays` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `document` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_leave`
--

INSERT INTO `stud_leave` (`Leave_ID`, `id`, `parents_id`, `Date`, `fromdate`, `todate`, `totalnoofdays`, `description`, `document`, `status`) VALUES
(17, 37, 53, '2019-12-26', '2019-12-10', '2019-12-17', 0, 'fsfsdgdfh', 'leave/', 'Approved'),
(18, 37, 53, '2019-12-26', '2019-12-10', '2019-12-17', 0, 'holiday', 'leave/gallery.sql', 'Request'),
(21, 39, 56, '2019-12-28', '2019-12-28', '2019-12-30', 0, 'I am not well I am not coming.', '../../leave/81524.0.jpg', 'Approved'),
(22, 37, 53, '2019-12-29', '2019-12-29', '2019-12-30', 0, 'Hello  iam busy with some work', '../../leave/k1.jpg', 'Request');

-- --------------------------------------------------------

--
-- Table structure for table `stud_resister`
--

CREATE TABLE `stud_resister` (
  `id` bigint(50) NOT NULL,
  `off_id` bigint(50) NOT NULL,
  `parents_id` bigint(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `section` varchar(30) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `corre_address` varchar(500) NOT NULL,
  `perm_address` varchar(500) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `dob_place` varchar(500) NOT NULL,
  `dob_state` varchar(100) NOT NULL,
  `dob_dist` varchar(100) NOT NULL,
  `dob_taluka` varchar(120) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `adhar` bigint(25) NOT NULL,
  `rilision` varchar(30) NOT NULL,
  `cast` varchar(30) NOT NULL,
  `sub_cast` varchar(30) NOT NULL,
  `subject1` varchar(30) NOT NULL,
  `subject2` varchar(30) NOT NULL,
  `subject3` varchar(30) NOT NULL,
  `subject4` varchar(30) NOT NULL,
  `subject5` varchar(30) NOT NULL,
  `subject6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_resister`
--

INSERT INTO `stud_resister` (`id`, `off_id`, `parents_id`, `class`, `batch`, `section`, `profile`, `name`, `gender`, `corre_address`, `perm_address`, `dob`, `dob_place`, `dob_state`, `dob_dist`, `dob_taluka`, `mobile`, `adhar`, `rilision`, `cast`, `sub_cast`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`) VALUES
(37, 74, 53, 'PUC I', 'A', 'Science', '../images/profile/student/81524.0.jpg', 'monu', 'male', 'afds', 'fds', '1998-02-10', 'belgaum', 'belgaum', 'Belgaum', 'Belgaum', 9876543456, 98765432456, 'Hindu', 'maratha', 'vfd', 'Marathi', 'English', 'Physics', 'Chemestry', 'Mathematics', 'Biology'),
(38, 76, 55, 'PUC I', 'A', 'Science', '../../images/profile/student/81524.0.jpg', 'Teddy', 'female', 'Belgaum', 'Belgaum', '2000-06-03', 'belgaum', 'belgaum', 'belgaum', 'belgaum', 987654321243, 9876543223456, 'hindhgu', 'maratha', 'IIB', 'Hindi', 'English', 'Physics', 'Chemestry', 'Mathematics', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teach_id` bigint(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `document` varchar(500) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `emp_num` varchar(100) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `wages` bigint(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teach_id`, `fname`, `mname`, `lname`, `class`, `section`, `profile`, `document`, `dob`, `mob`, `emp_num`, `sub`, `date`, `wages`, `address`, `gender`) VALUES
(1, 'kabir', '', 'sing', 'PUC I', 'Science', 'images/profile/teacher/108832.0.jpg', '', '1998-09-18', 7483302414, '12345', 'Physics', '2019-11-14', 50000, 'Dacolony', ''),
(2, 'sneha', 'mm', 'jshac', 'PUC II', 'science', 'hjvv', '', '12/5/1985', 8596874563, '12354', 'maths', '05-12-2019', 500, 'da colony bgm', ''),
(3, 'Pramod', 'Suresh', 'Chougule', 'PUC I', 'Commerce', '../images/profile/teacher/2.jpg', '', '2019-12-03', 4875968745, '45', '45', '2019-12-05', 500, 'maharastra', ''),
(4, 'maya', 'm', 'patil', 'PUC I', 'Science', '../images/profile/teacher/81524.0.jpg', '', '2019-01-07', 7418529635, '45', '45', '2019-12-09', 500, 'blg', ''),
(5, 'monesh', 'sanju', 'Tilavi', 'PUC I', 'Science', '../images/profile/teacher/81524.0.jpg', '', '1998-06-10', 987654321, '27', '27', '2019-12-19', 50000, '', ''),
(37, 'monesh', 'c', 'chougule', 'PUC II', 'Science', '../images/profile/teacher/', '', '2014-05-15', 7418529634, '145', '145', '2019-12-25', 40000, 'blg', ''),
(38, 'sachin', 'c', 'chougule', 'PUC II', 'Science', '../images/profile/teacher/\'\'.payment (3).xls', '', '2019-12-09', 7418529635, '44', '44', '2019-12-28', 40000, 'blg', ''),
(40, 'varsha', 'varsha', 'varsha', 'PUC I', 'Science', '../images/profile/teacher/81524.0.jpg', '', '2019-12-05', 9087654321, '12', '12', '2019-12-28', 8765, 'gsfsd', ''),
(41, 'pooja', 's', 'chougule', 'PUC I', 'Commerce', '../images/profile/teacher/gouri1.jpg', '', '2019-12-03', 9967543245, '41', 'Accountancy', '2019-12-29', 1200, 'blg', ''),
(43, 'Radhika', 's', 'chougule', 'Select', 'Science', '../images/profile/teacher/jyostna.jpg', '../../images/document/teacher/jyostna.jpg', '2019-12-02', 8970725544, '43', 'Physics', '2019-12-29', 12500, 'blg', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_leave`
--

CREATE TABLE `teacher_leave` (
  `leave_id` bigint(50) NOT NULL,
  `teach_id` bigint(50) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `fromdate` varchar(20) NOT NULL,
  `todate` varchar(20) NOT NULL,
  `totalnoofdays` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `document` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_leave`
--

INSERT INTO `teacher_leave` (`leave_id`, `teach_id`, `Date`, `fromdate`, `todate`, `totalnoofdays`, `description`, `document`, `status`) VALUES
(12, 1, '2019-12-22', '2019-12-22', '2019-12-23', 'Holiday', 'Holiday', 'leave/B.C.A 1.jpg', 'Approved'),
(13, 1, '2019-12-23', '2019-12-24', '2019-12-25', 'Sick', 'iam too sick so i am not comming on 25-12-2019.', 'leave/B.C.A 2.jpg', 'Rejected'),
(14, 1, '2019-12-26', '2019-12-26', '2019-12-24', 'Feeling so weak', 'I am seeking so my family dr recognize to take rest so I am not coming today.', '../../leave/', 'Requested');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_remark`
--

CREATE TABLE `teacher_remark` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `descr` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_remark`
--

INSERT INTO `teacher_remark` (`id`, `reg_no`, `class`, `section`, `subject`, `remark`, `descr`) VALUES
(1, '1', 'PUC I', 'Commerce', 'Chemistry', 'a', 'qwer'),
(2, '2', 'PUC II', 'Commerce', 'Chemistry', 'B', 'gqyhwuuw');

-- --------------------------------------------------------

--
-- Table structure for table `time table`
--

CREATE TABLE `time table` (
  `tbl_id` bigint(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time table`
--

INSERT INTO `time table` (`tbl_id`, `time`, `day`, `subject`, `teacher`, `class`, `section`, `division`) VALUES
(18, '10-11', 'Monday', 'Mathematics', 'kabir sing', 'PUC I', 'Science', 'A'),
(19, '10-11', 'Wednesday', 'Marathi', 'sneha jshac', 'PUC I', 'Science', 'A'),
(20, '11-12', 'Monday', 'Hindi', 'Pramod Chougule', 'PUC I', 'Science', 'A'),
(21, '10-11', 'Tuesday', 'Mathematics', 'sachin chougule', 'PUC I', 'Science', 'A'),
(22, '10-11', 'Monday', 'Hindi', 'varsha patil', 'PUC I', 'Science', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `track_sms`
--

CREATE TABLE `track_sms` (
  `track_id` bigint(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_sms`
--

INSERT INTO `track_sms` (`track_id`, `name`, `mob`, `class`, `section`, `user`, `date`, `message`) VALUES
(1, 'MONESG', 'SAS', 'SASSA', 'S', 'SA', '12-12-12', 'CSDCDS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbatch`
--
ALTER TABLE `addbatch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `addclass`
--
ALTER TABLE `addclass`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `admin_remark`
--
ALTER TABLE `admin_remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atte_stud`
--
ALTER TABLE `atte_stud`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `id` (`id`),
  ADD KEY `teach_id` (`teach_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`stateid`),
  ADD KEY `id` (`id`),
  ADD KEY `parents_id` (`parents_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `teach_id` (`teach_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parents_id`);

--
-- Indexes for table `previous`
--
ALTER TABLE `previous`
  ADD PRIMARY KEY (`prev_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `stud_leave`
--
ALTER TABLE `stud_leave`
  ADD PRIMARY KEY (`Leave_ID`),
  ADD KEY `stud_leave_ibfk_1` (`id`),
  ADD KEY `parents_id` (`parents_id`);

--
-- Indexes for table `stud_resister`
--
ALTER TABLE `stud_resister`
  ADD PRIMARY KEY (`id`),
  ADD KEY `off_id` (`off_id`),
  ADD KEY `stud_resister_ibfk_2` (`parents_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teach_id`);

--
-- Indexes for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `teach_id` (`teach_id`);

--
-- Indexes for table `teacher_remark`
--
ALTER TABLE `teacher_remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time table`
--
ALTER TABLE `time table`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `track_sms`
--
ALTER TABLE `track_sms`
  ADD PRIMARY KEY (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbatch`
--
ALTER TABLE `addbatch`
  MODIFY `b_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `addclass`
--
ALTER TABLE `addclass`
  MODIFY `cl_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `admin_remark`
--
ALTER TABLE `admin_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `atte_stud`
--
ALTER TABLE `atte_stud`
  MODIFY `a_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `off_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parents_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `previous`
--
ALTER TABLE `previous`
  MODIFY `prev_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stud_leave`
--
ALTER TABLE `stud_leave`
  MODIFY `Leave_ID` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stud_resister`
--
ALTER TABLE `stud_resister`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teach_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  MODIFY `leave_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher_remark`
--
ALTER TABLE `teacher_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time table`
--
ALTER TABLE `time table`
  MODIFY `tbl_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `track_sms`
--
ALTER TABLE `track_sms`
  MODIFY `track_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atte_stud`
--
ALTER TABLE `atte_stud`
  ADD CONSTRAINT `atte_stud_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stud_resister` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atte_stud_ibfk_2` FOREIGN KEY (`teach_id`) REFERENCES `teacher` (`teach_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stud_resister` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`teach_id`) REFERENCES `teacher` (`teach_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `previous`
--
ALTER TABLE `previous`
  ADD CONSTRAINT `previous_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stud_resister` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_resister`
--
ALTER TABLE `stud_resister`
  ADD CONSTRAINT `stud_resister_ibfk_1` FOREIGN KEY (`off_id`) REFERENCES `office` (`off_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stud_resister_ibfk_2` FOREIGN KEY (`parents_id`) REFERENCES `parents` (`parents_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
