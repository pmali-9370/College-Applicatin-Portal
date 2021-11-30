-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 11:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_clg_master`
--

CREATE TABLE `add_clg_master` (
  `clg_id` int(11) NOT NULL,
  `clg_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `clg_adderess` varchar(100) COLLATE utf16_bin NOT NULL,
  `clg_number` varchar(100) COLLATE utf16_bin NOT NULL,
  `clg_email` varchar(100) COLLATE utf16_bin NOT NULL,
  `clg_cource` varchar(100) COLLATE utf16_bin NOT NULL,
  `photo` varchar(200) COLLATE utf16_bin NOT NULL,
  `clg_code` varchar(50) COLLATE utf16_bin NOT NULL,
  `status` varchar(1) COLLATE utf16_bin NOT NULL DEFAULT 'Y',
  `inser_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `add_clg_master`
--

INSERT INTO `add_clg_master` (`clg_id`, `clg_name`, `clg_adderess`, `clg_number`, `clg_email`, `clg_cource`, `photo`, `clg_code`, `status`, `inser_date`, `update_date`) VALUES
(27, 'VVIT Pune', 'Aakurdi', '5476756', 'nutan@gmail.com', 'mca', 'Allotment back page.jpg', '65446', 'Y', '2021-09-29 08:29:09', NULL),
(28, 'nutan maratha', 'Jalgaon', '33322', 'vfgdhune@gmail.com', '33322', '10th Marksheet.jpg', '2222', 'Y', '2021-09-29 10:20:17', '2021-09-29 10:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `college_id` int(11) NOT NULL,
  `student_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `college_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `college_code` int(11) NOT NULL,
  `admission_date` varchar(100) COLLATE utf16_bin NOT NULL,
  `subject_code` varchar(50) COLLATE utf16_bin NOT NULL,
  `marksheet` varchar(200) COLLATE utf16_bin NOT NULL,
  `semester` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`college_id`, `student_name`, `college_name`, `college_code`, `admission_date`, `subject_code`, `marksheet`, `semester`) VALUES
(12, 'Spandan mahajan', 'Modern college pune', 222, '1122-03-21', '43342', '10th Marksheet.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `exam_clg_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `exam_clg_code` varchar(100) COLLATE utf16_bin NOT NULL,
  `exam_date` varchar(100) COLLATE utf16_bin NOT NULL,
  `exam_sub_code` varchar(100) COLLATE utf16_bin NOT NULL,
  `result_photo` varchar(200) COLLATE utf16_bin NOT NULL,
  `exam_semester` varchar(50) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_id`, `exam_name`, `exam_clg_name`, `exam_clg_code`, `exam_date`, `exam_sub_code`, `result_photo`, `exam_semester`) VALUES
(14, 'Bsc Sem-2', 'Nutan maratha college', '4434', '3322-04-04', '5454', '10th Marksheet.jpg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `std_admissions_master`
--

CREATE TABLE `std_admissions_master` (
  `std_id` int(11) NOT NULL,
  `std_rno` int(11) NOT NULL,
  `std_name` varchar(200) COLLATE utf16_bin NOT NULL,
  `std_sub` varchar(100) COLLATE utf16_bin NOT NULL,
  `std_cource` varchar(30) COLLATE utf16_bin NOT NULL,
  `std_marks` varchar(40) COLLATE utf16_bin NOT NULL,
  `std_result` varchar(40) COLLATE utf16_bin NOT NULL,
  `std_college` varchar(100) COLLATE utf16_bin NOT NULL,
  `std_number` varchar(50) COLLATE utf16_bin NOT NULL,
  `std_email` varchar(100) COLLATE utf16_bin NOT NULL,
  `std_birthdate` varchar(50) COLLATE utf16_bin NOT NULL,
  `std_gender` varchar(20) COLLATE utf16_bin NOT NULL,
  `tenthmarksheet` varchar(100) COLLATE utf16_bin NOT NULL,
  `twelth_marksheet` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `std_admissions_master`
--

INSERT INTO `std_admissions_master` (`std_id`, `std_rno`, `std_name`, `std_sub`, `std_cource`, `std_marks`, `std_result`, `std_college`, `std_number`, `std_email`, `std_birthdate`, `std_gender`, `tenthmarksheet`, `twelth_marksheet`) VALUES
(37, 56, 'yogesh santosh Mali', 'Python', 'BCA', '77', 'pass', 'MIT Pune', '76777666666', 'atish@gmail.com', '', 'Male', '10th Marksheet.jpg', '12th Marksheet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_master`
--

CREATE TABLE `teacher_master` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_college` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_course` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_subject` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_phone` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_email` varchar(100) COLLATE utf16_bin NOT NULL,
  `teacher_address` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `teacher_master`
--

INSERT INTO `teacher_master` (`teacher_id`, `teacher_name`, `teacher_college`, `teacher_course`, `teacher_subject`, `teacher_phone`, `teacher_email`, `teacher_address`) VALUES
(11, 'Pramod mahajan', 'Nilweb technologioes', 'BSC', 'PHP', '43534434', 'dikshant@gmail.com', 'Ahmedabad'),
(12, 'Nilesh patil', 'Nilweb technologioes', 'Mca', 'python', '234432423', 'shinkarp@gmail.com', 'Ganesh colony jalgaon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_clg_master`
--
ALTER TABLE `add_clg_master`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `std_admissions_master`
--
ALTER TABLE `std_admissions_master`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `teacher_master`
--
ALTER TABLE `teacher_master`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_clg_master`
--
ALTER TABLE `add_clg_master`
  MODIFY `clg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `std_admissions_master`
--
ALTER TABLE `std_admissions_master`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `teacher_master`
--
ALTER TABLE `teacher_master`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
