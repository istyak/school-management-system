-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 03:02 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(10) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPass` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminPass`) VALUES
(1, 'admin', 'admin@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `attend` int(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `class`, `course_code`, `teacher`) VALUES
(12, 'CSE', '1', 'CSE1', 'najmul'),
(13, 'EEE', '2', 'EEE2', 'Tuhin'),
(14, 'SWE', '3', 'SWE3', 'Tuhin'),
(15, 'PHP', '1', 'PHP1', 'Tuhin'),
(16, 'LAW', '1', 'LAW1', 'Najmul');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `student_id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `student_id`, `description`, `date`) VALUES
(9, 'Tuhin Talukder', 11, 'hi my name is tuhin talukder this is awesome website.', '2018-04-07'),
(10, 'najmul', 11, 'hello this is najmul amin and i am happy to say that this website is cool,', '2018-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `quiz` int(10) NOT NULL,
  `mid_term` int(10) NOT NULL,
  `final` int(10) NOT NULL,
  `year` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `quiz`, `mid_term`, `final`, `year`, `date`, `course_name`) VALUES
(20, 123, 4, 5, 6, '', '09-04-2018', 'CSE'),
(21, 123, 5, 6, 7, '', '10-04-2018', 'LAW');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `notice` longtext CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `dept`, `notice`, `date`) VALUES
(12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Class One', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words', '2018-04-01'),
(13, 'Contrary to popular belief, Lorem Ipsum', 'Contrary', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up', '2018-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  `money` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `student_id`, `month`, `year`, `money`, `date`) VALUES
(1, 'Najmul', '111', 'January', 2018, 12000, '23-2-18'),
(2, 'DAFDA', '55', '1', 1, 35, '2018-04-07'),
(3, 'Tuhin', '757', '5', 4, 5000, '07-04-2018'),
(4, 'Najmul Amin', '43535', 'April', 2018, 777, '07-04-2018'),
(5, 'Tuhin', '11', 'April', 2018, 5000, '07-04-2018'),
(6, 'najmul', '11', 'April', 2020, 5000, '07-04-2018'),
(7, 'Tuhin', '757', 'April', 2019, 555, '08-04-2018'),
(8, 'najmul', '1234', 'May', 2020, 5000, '08-04-2018'),
(9, 'najmul', '1234', 'February', 2021, 50000, '08-04-2018'),
(10, 'edsef', '33', 'January', 2018, 5000, '08-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `student_id` text NOT NULL,
  `dob` text NOT NULL,
  `class` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `addreess` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `student_id`, `dob`, `class`, `phone`, `addreess`, `pass`) VALUES
(1, 'student1', '123', '3535', '1', 123, 'Ghoraghat\r\nDinajpur', ''),
(2, 'student2', '1234', '233', '2', 1234, 'Ghoraghat\r\nDinajpur', ''),
(3, 'student3', '111', '3535', '1', 111, 'Ghoraghat Dinajpur', ''),
(4, 'student4', '444', '233', '4', 444, 'Ghoraghat\r\nDinajpur', ''),
(5, 'Tuhin', '111111', '424', '1', 5353, 'Ghoraghat\r\nDinajpur', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `dob` text NOT NULL,
  `addreess` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `name`, `email`, `dept`, `phone`, `dob`, `addreess`, `pass`) VALUES
(8, 123, 'Najmul', 'admin@gmail.com', 'CSE', 17163274, '1223', 'Ghoraghat Dinajpur', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(9, 333, 'Najmul', 'tuhin@gmail.com', 'CSE', 1716327400, '233', 'Ghoraghat\r\nDinajpur', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(10, 123456, 'Najmul', '', 'MATH', 1716327400, '233', 'Ghoraghat\r\nDinajpur', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(11, 12344, 'Najmul', 'najmulamin123@gmail.com', 'MATH', 1711347404, '233', 'Ghoraghat\r\nDinajpur', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(12, 12345, 'Najmul', 'tuhin@ggmail.com', 'ENGLISH', 1716327400, '233', 'Ghoraghat\r\nDinajpur', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(13, 34324, 'Najmul', 'Johnx@gmail.com', 'CSE', 1716327400, '535', 'Ghoraghat\r\nDinajpur', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(14, 43453, 'Najmul', 'John@xgmail.com', 'MATH', 535, '5454', 'Ghoraghat\r\nDinajpur', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
