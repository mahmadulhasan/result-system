-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 11:29 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoixic_result`
--

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_1_A_subject`
--

CREATE TABLE `10_2024-2025_1_A_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `10_2024-2025_1_A_subject`
--

INSERT INTO `10_2024-2025_1_A_subject` (`id`, `subject_name`) VALUES
(1, 'BENGALI'),
(2, 'ENGLISH'),
(3, 'HINDI'),
(4, 'SCIENCE'),
(5, 'MATHS');

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_1_A_UNIT 1_result`
--

CREATE TABLE `10_2024-2025_1_A_UNIT 1_result` (
  `id` int(11) NOT NULL,
  `Roll_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BENGALI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENGLISH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINDI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SCIENCE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATHS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `10_2024-2025_1_A_UNIT 1_result`
--

INSERT INTO `10_2024-2025_1_A_UNIT 1_result` (`id`, `Roll_no`, `student_name`, `father_name`, `date_of_birth`, `remark`, `BENGALI`, `ENGLISH`, `HINDI`, `SCIENCE`, `MATHS`) VALUES
(1, '1', 'student name 1', 'gurdian name 1', '2004-12-20', 'Pass', '44', '33', '77', '55', '66'),
(2, '2', 'student name 2', 'gurdian name 2', '2004-12-21', 'Pass', '45', '34', '78', '56', '67'),
(3, '3', 'student name 3', 'gurdian name 3', '2004-12-22', 'Pass', '46', '35', '79', '57', '68'),
(4, '4', 'student name 4', 'gurdian name 4', '2004-12-23', 'Fail', '47', '30', '80', '58', '69'),
(5, '5', 'student name 5', 'gurdian name 5', '2004-12-24', 'Pass', '48', '37', '81', '59', '70'),
(6, '6', 'student name 6', 'gurdian name 6', '2004-02-06', 'Pass', '49', '38', '82', '60', '71'),
(7, '7', 'student name 7', 'gurdian name 7', '2004-02-07', 'Pass', '50', '39', '83', '61', '72'),
(8, '8', 'student name 8', 'gurdian name 8', '2004-02-08', 'Fail', '51', '40', 'A', '62', '73'),
(9, '9', 'student name 9', 'gurdian name 9', '2004-02-09', 'Pass', '52', '41', '85', '63', '74'),
(10, '10', 'student name 10', 'gurdian name 10', '2004-02-10', 'Pass', '53', '42', '86', '64', '75'),
(11, '11', 'student name 11', 'gurdian name 11', '2004-02-11', 'Fail', '54', '43', 'AB', '65', '76'),
(12, '12', 'student name 12', 'gurdian name 12', '2004-02-12', 'Fail', '55', '44', '33', '66', '31'),
(13, '13', 'student name 13', 'gurdian name 13', '2004-02-13', 'Pass', '56', '45', '34', '67', '78'),
(14, '14', 'student name 14', 'gurdian name 14', '2004-02-14', 'Pass', '57', '46', '35', '68', '79'),
(15, '15', 'student name 15', 'gurdian name 15', '2004-02-15', 'Pass', '58', '47', '36', '69', '80'),
(16, '16', 'student name 16', 'gurdian name 16', '2004-02-16', 'Pass', '59', '48', '37', '70', '81'),
(17, '17', 'student name 17', 'gurdian name 17', '2004-02-17', 'Pass', '60', '49', '38', '71', '82'),
(18, '18', 'student name 18', 'gurdian name 18', '2004-02-18', 'Pass', '61', '50', '39', '72', '83'),
(19, '19', 'student name 19', 'gurdian name 19', '2004-02-19', 'Pass', '62', '51', '40', '73', '84'),
(20, '20', 'student name 20', 'gurdian name 20', '2004-02-20', 'Pass', '63', '52', '41', '74', '85'),
(21, '21', 'student name 21', 'gurdian name 21', '2004-02-21', 'Pass', '64', '53', '42', '75', '86'),
(22, '22', 'student name 22', 'gurdian name 22', '2004-02-22', 'Pass', '65', '54', '43', '76', '87'),
(23, '23', 'student name 23', 'gurdian name 23', '2004-02-23', 'Pass', '66', '55', '44', '77', '88'),
(24, '24', 'student name 24', 'gurdian name 24', '2004-02-24', 'Pass', '67', '56', '45', '78', '89'),
(25, '25', 'student name 25', 'gurdian name 25', '2004-02-25', 'Pass', '68', '57', '46', '79', '90');

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_1_A_UNIT 1_subject`
--

CREATE TABLE `10_2024-2025_1_A_UNIT 1_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `10_2024-2025_1_A_UNIT 1_subject`
--

INSERT INTO `10_2024-2025_1_A_UNIT 1_subject` (`id`, `subject_name`, `full_mark`, `pass_mark`) VALUES
(1, 'BENGALI', 100, 33),
(2, 'ENGLISH', 100, 33),
(3, 'HINDI', 100, 33),
(4, 'SCIENCE', 100, 33),
(5, 'MATHS', 100, 33);

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_2_A_UNIT 1_result`
--

CREATE TABLE `10_2024-2025_2_A_UNIT 1_result` (
  `id` int(11) NOT NULL,
  `Roll_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BENGALI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENGLISH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINDI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SCIENCE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATHS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `10_2024-2025_2_A_UNIT 1_result`
--

INSERT INTO `10_2024-2025_2_A_UNIT 1_result` (`id`, `Roll_no`, `student_name`, `father_name`, `date_of_birth`, `remark`, `BENGALI`, `ENGLISH`, `HINDI`, `SCIENCE`, `MATHS`) VALUES
(1, '1', 'student name 1', 'gurdian name 1', '2004-12-20', 'Pass', '44', '33', '77', '55', '66'),
(2, '2', 'student name 2', 'gurdian name 2', '2004-12-21', 'Pass', '45', '34', '78', '56', '67'),
(3, '3', 'student name 3', 'gurdian name 3', '2004-12-22', 'Pass', '46', '35', '79', '57', '68'),
(4, '4', 'student name 4', 'gurdian name 4', '2004-12-23', 'Fail', '47', '30', '80', '58', '69'),
(5, '5', 'student name 5', 'gurdian name 5', '2004-12-24', 'Pass', '48', '37', '81', '59', '70'),
(6, '6', 'student name 6', 'gurdian name 6', '2004-02-06', 'Pass', '49', '38', '82', '60', '71'),
(7, '7', 'student name 7', 'gurdian name 7', '2004-02-07', 'Pass', '50', '39', '83', '61', '72'),
(8, '8', 'student name 8', 'gurdian name 8', '2004-02-08', 'Fail', '51', '40', 'A', '62', '73'),
(9, '9', 'student name 9', 'gurdian name 9', '2004-02-09', 'Pass', '52', '41', '85', '63', '74'),
(10, '10', 'student name 10', 'gurdian name 10', '2004-02-10', 'Pass', '53', '42', '86', '64', '75'),
(11, '11', 'student name 11', 'gurdian name 11', '2004-02-11', 'Fail', '54', '43', 'AB', '65', '76'),
(12, '12', 'student name 12', 'gurdian name 12', '2004-02-12', 'Fail', '55', '44', '33', '66', '31'),
(13, '13', 'student name 13', 'gurdian name 13', '2004-02-13', 'Pass', '56', '45', '34', '67', '78'),
(14, '14', 'student name 14', 'gurdian name 14', '2004-02-14', 'Pass', '57', '46', '35', '68', '79'),
(15, '15', 'student name 15', 'gurdian name 15', '2004-02-15', 'Pass', '58', '47', '36', '69', '80'),
(16, '16', 'student name 16', 'gurdian name 16', '2004-02-16', 'Pass', '59', '48', '37', '70', '81'),
(17, '17', 'student name 17', 'gurdian name 17', '2004-02-17', 'Pass', '60', '49', '38', '71', '82'),
(18, '18', 'student name 18', 'gurdian name 18', '2004-02-18', 'Pass', '61', '50', '39', '72', '83'),
(19, '19', 'student name 19', 'gurdian name 19', '2004-02-19', 'Pass', '62', '51', '40', '73', '84'),
(20, '20', 'student name 20', 'gurdian name 20', '2004-02-20', 'Pass', '63', '52', '41', '74', '85'),
(21, '21', 'student name 21', 'gurdian name 21', '2004-02-21', 'Pass', '64', '53', '42', '75', '86'),
(22, '22', 'student name 22', 'gurdian name 22', '2004-02-22', 'Pass', '65', '54', '43', '76', '87'),
(23, '23', 'student name 23', 'gurdian name 23', '2004-02-23', 'Pass', '66', '55', '44', '77', '88'),
(24, '24', 'student name 24', 'gurdian name 24', '2004-02-24', 'Pass', '67', '56', '45', '78', '89'),
(25, '25', 'student name 25', 'gurdian name 25', '2004-02-25', 'Pass', '68', '57', '46', '79', '90');

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_2_A_UNIT 1_subject`
--

CREATE TABLE `10_2024-2025_2_A_UNIT 1_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `10_2024-2025_2_A_UNIT 1_subject`
--

INSERT INTO `10_2024-2025_2_A_UNIT 1_subject` (`id`, `subject_name`, `full_mark`, `pass_mark`) VALUES
(1, 'BENGALI', 100, 33),
(2, 'ENGLISH', 100, 33),
(3, 'HINDI', 100, 33),
(4, 'SCIENCE', 100, 33),
(5, 'MATHS', 100, 33);

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_4_A_subject`
--

CREATE TABLE `10_2024-2025_4_A_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `10_2024-2025_4_A_subject`
--

INSERT INTO `10_2024-2025_4_A_subject` (`id`, `subject_name`) VALUES
(1, 'BENGALI'),
(2, 'ENGLISH'),
(3, 'HINDI'),
(4, 'SCIENCE'),
(5, 'MATHS');

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_4_A_UNIT 1_result`
--

CREATE TABLE `10_2024-2025_4_A_UNIT 1_result` (
  `id` int(11) NOT NULL,
  `Roll_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BENGALI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENGLISH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINDI` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SCIENCE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATHS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `10_2024-2025_4_A_UNIT 1_result`
--

INSERT INTO `10_2024-2025_4_A_UNIT 1_result` (`id`, `Roll_no`, `student_id`, `student_name`, `full_mark`, `pass_mark`, `remark`, `BENGALI`, `ENGLISH`, `HINDI`, `SCIENCE`, `MATHS`) VALUES
(1, '101', '15079', 'STUDENT NAME 1', '99', '33', 'Pass', '44', '33', '77', '55', '66'),
(2, '102', '15080', 'STUDENT NAME 2', '100', '33', 'Pass', '45', '34', '78', '56', '67'),
(3, '103', '15081', 'STUDENT NAME 3', '100', '33', 'Pass', '46', '35', '79', '57', '68'),
(4, '104', '15082', 'STUDENT NAME 4', '100', '33', 'Fail', '47', '30', '80', '58', '69'),
(5, '105', '15083', 'STUDENT NAME 5', '100', '33', 'Pass', '48', '37', '81', '59', '70'),
(6, '106', '15084', 'STUDENT NAME 6', '100', '33', 'Pass', '49', '38', '82', '60', '71'),
(7, '107', '15085', 'STUDENT NAME 7', '100', '33', 'Pass', '50', '39', '83', '61', '72'),
(8, '108', '15086', 'STUDENT NAME 8', '100', '33', 'Fail', '51', '40', 'A', '62', '73'),
(9, '109', '15087', 'STUDENT NAME 9', '100', '33', 'Pass', '52', '41', '85', '63', '74'),
(10, '110', '15088', 'STUDENT NAME 10', '100', '33', 'Pass', '53', '42', '86', '64', '75'),
(11, '111', '15089', 'STUDENT NAME 11', '100', '33', 'Fail', '54', '43', 'AB', '65', '76'),
(12, '112', '15090', 'STUDENT NAME 12', '100', '33', 'Fail', '55', '44', '33', '66', '31'),
(13, '113', '15091', 'STUDENT NAME 13', '100', '33', 'Pass', '56', '45', '34', '67', '78'),
(14, '114', '15092', 'STUDENT NAME 14', '100', '33', 'Pass', '57', '46', '35', '68', '79'),
(15, '115', '15093', 'STUDENT NAME 15', '100', '33', 'Pass', '58', '47', '36', '69', '80'),
(16, '116', '15094', 'STUDENT NAME 16', '100', '33', 'Pass', '59', '48', '37', '70', '81'),
(17, '117', '15095', 'STUDENT NAME 17', '100', '33', 'Pass', '60', '49', '38', '71', '82'),
(18, '118', '15096', 'STUDENT NAME 18', '100', '33', 'Pass', '61', '50', '39', '72', '83'),
(19, '119', '15097', 'STUDENT NAME 19', '100', '33', 'Pass', '62', '51', '40', '73', '84'),
(20, '120', '15098', 'STUDENT NAME 20', '100', '33', 'Pass', '63', '52', '41', '74', '85'),
(21, '121', '15099', 'STUDENT NAME 21', '100', '33', 'Pass', '64', '53', '42', '75', '86'),
(22, '122', '15100', 'STUDENT NAME 22', '100', '33', 'Pass', '65', '54', '43', '76', '87'),
(23, '123', '15101', 'STUDENT NAME 23', '100', '33', 'Pass', '66', '55', '44', '77', '88'),
(24, '124', '15102', 'STUDENT NAME 24', '100', '33', 'Pass', '67', '56', '45', '78', '89'),
(25, '125', '15103', 'STUDENT NAME 25', '100', '33', 'Pass', '67', '57', '46', '79', '90'),
(26, '126', '15104', 'STUDENT NAME 26', '100', '33', 'Pass', '67', '58', '46', '80', '91'),
(27, '127', '15105', 'STUDENT NAME 27', '100', '33', 'Pass', '67', '59', '46', '81', '92'),
(28, '128', '15106', 'STUDENT NAME 28', '100', '33', 'Pass', '67', '60', '46', '82', '93');

-- --------------------------------------------------------

--
-- Table structure for table `10_2024-2025_12_B_subject`
--

CREATE TABLE `10_2024-2025_12_B_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `10_2024-2025_12_B_subject`
--

INSERT INTO `10_2024-2025_12_B_subject` (`id`, `subject_name`) VALUES
(1, 'BENGALI'),
(2, 'HINDI'),
(3, 'SOCIOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `10_class_details`
--

CREATE TABLE `10_class_details` (
  `id` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `10_class_details`
--

INSERT INTO `10_class_details` (`id`, `class_no`, `section`, `session`) VALUES
(1, 1, 'A', '2024-2025'),
(2, 2, 'A', '2024-2025'),
(3, 3, 'A', '2024-2025'),
(4, 4, 'A', '2024-2025'),
(5, 12, 'B', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `10_resulttablename`
--

CREATE TABLE `10_resulttablename` (
  `id` int(11) NOT NULL,
  `result_table_name` varchar(255) NOT NULL,
  `subject_table_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `10_resulttablename`
--

INSERT INTO `10_resulttablename` (`id`, `result_table_name`, `subject_table_name`, `exam_name`, `class_id`) VALUES
(1, '10_2024-2025_1_A_UNIT 1_result', '10_2024-2025_1_A_UNIT 1_subject', 'UNIT 1', 1),
(2, '10_2024-2025_2_A_UNIT 1_result', '10_2024-2025_2_A_UNIT 1_subject', 'UNIT 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `11_2024-2025_1_A_subject`
--

CREATE TABLE `11_2024-2025_1_A_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `11_2024-2025_1_A_subject`
--

INSERT INTO `11_2024-2025_1_A_subject` (`id`, `subject_name`) VALUES
(1, 'BENGALI'),
(2, 'ENGLISH'),
(3, 'HINDI'),
(4, 'SCIENCE'),
(5, 'MATHS');

-- --------------------------------------------------------

--
-- Table structure for table `11_class_details`
--

CREATE TABLE `11_class_details` (
  `id` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `subject` text,
  `student_id` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `11_class_details`
--

INSERT INTO `11_class_details` (`id`, `class_no`, `section`, `session`, `subject`, `student_id`) VALUES
(1, 1, 'A', '2024-2025', '', ''),
(2, 2, 'A', '2024-2025', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `11_resulttablename`
--

CREATE TABLE `11_resulttablename` (
  `id` int(11) NOT NULL,
  `result_table_name` varchar(255) NOT NULL,
  `subject_table_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `12_class_details`
--

CREATE TABLE `12_class_details` (
  `id` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `12_class_details`
--

INSERT INTO `12_class_details` (`id`, `class_no`, `section`, `session`) VALUES
(1, 1, 'A', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `12_resulttablename`
--

CREATE TABLE `12_resulttablename` (
  `id` int(11) NOT NULL,
  `result_table_name` varchar(255) NOT NULL,
  `subject_table_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `13_class_details`
--

CREATE TABLE `13_class_details` (
  `id` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `13_resulttablename`
--

CREATE TABLE `13_resulttablename` (
  `id` int(11) NOT NULL,
  `result_table_name` varchar(255) NOT NULL,
  `subject_table_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `date` date NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reset_token` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `dob`, `date`, `position`, `password`, `reset_token`) VALUES
(1, 'AD10020241', 'Super Admin', 'admin@admin.com', '1234567890', 'Domkal,  Murshidabad, West Bengal', '2000-03-02', '0000-00-00', 'super_admin', '$2y$10$AZrZIJ/w5C/BE84DZ.C.1.wtk0Rr8dKvs9EJRbJxv/5yaZQ102GU6', ''),
(5, 'AD10020245', 'Mahmadul Hasan', 'mahmadulhasan@ikeworld.co.in', '1234567890', 'Domkal,  Murshidabad, West Bengal', '2000-03-02', '2024-11-12', 'admin', '$2y$10$AZrZIJ/w5C/BE84DZ.C.1.wtk0Rr8dKvs9EJRbJxv/5yaZQ102GU6', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `date`, `status`) VALUES
(1, 'mahmadul hasan', 'mahmadulhasan623@gmail.com', 'this is a test massage from result.demoikeworld.com for home page contact form\r\n\r\n', '2024-11-06', 'inactive'),
(2, 'mahmadul hasan', 'mahmadulhasan623@gmail.com', 'this is a test massage from result.demoikeworld.com for contact us page contact form\r\n\r\n', '2024-11-06', 'active'),
(3, 'mahmadul hasan', 'mahmadulhasan623@gmail.com', 'this is a test massage from result.demoikeworld.com \r\nhome page contact form\r\n', '2024-11-10', 'active'),
(4, 'mahmadul hasan', 'mahmadulhasan623@gmail.com', 'this is  a test message from result.demoikeworld.com contact-us page contact form', '2024-11-10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `disclaimer`
--

CREATE TABLE `disclaimer` (
  `id` int(255) NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disclaimer`
--

INSERT INTO `disclaimer` (`id`, `heading`, `body`) VALUES
(1, '1. Accuracy of Information', 'The results and data displayed on this website are submitted by users and are intended for educational purposes. We do not assume responsibility for any errors or omissions in the content or for any discrepancies in the results. It is the responsibility of the users to verify the accuracy of the data they upload or view.'),
(2, '2. External Links', 'Our website may contain links to third-party websites. These external links are provided for your convenience, but Result Demoikeworld has no control over the content of these sites and is not responsible for any information or services provided by them.'),
(3, '3. Use of Data', 'The use of the information on this website is at your own risk. Result Demoikeworld will not be held liable for any damages, losses, or consequences arising from the use or misuse of the information available on this site.\r\n\r\n'),
(4, '4. Service Availability', 'While we strive to keep the website up and running smoothly, Result Demoikeworld takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.\r\n\r\n'),
(5, '5. No Professional Advice', 'The content of this website is not intended to constitute legal, financial, or educational advice. Users should consult appropriate professionals for advice tailored to their specific needs.\r\n\r\n'),
(6, '6. Changes to the Disclaimer', 'We reserve the right to update or change this disclaimer at any time. Any changes will be posted on this page with the last update date.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `login_count`
--

CREATE TABLE `login_count` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `school_login` int(255) NOT NULL,
  `result_page` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_count`
--

INSERT INTO `login_count` (`id`, `date`, `school_login`, `result_page`) VALUES
(1, '2024-11-26', 20, 0),
(2, '2024-11-27', 1, 15),
(3, '2024-11-28', 4, 0),
(4, '2024-11-29', 1, 0),
(5, '2024-12-02', 2, 0),
(6, '2024-12-03', 1, 0),
(7, '2024-12-04', 5, 8),
(8, '2024-12-14', 2, 0),
(9, '2024-12-21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_pages`
--

CREATE TABLE `new_pages` (
  `id` int(255) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading1` text COLLATE utf8_unicode_ci NOT NULL,
  `body1` text COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading2` text COLLATE utf8_unicode_ci NOT NULL,
  `body2` text COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_pages`
--

INSERT INTO `new_pages` (`id`, `page_name`, `heading1`, `body1`, `image1`, `heading2`, `body2`, `image2`, `date`, `action`) VALUES
(2, 'New_Page', 'Welcome', 'Welcome to our Result Management System, a user-friendly platform for schools to efficiently upload and manage exam results. Administrators can easily upload results for different classes, sessions, and sections, while students can access and download their performance reports online. With secure access, bulk uploads via Excel, and dynamic search features, finding specific results by class, section, or exam name is simple and fast. Designed with data privacy in mind, our system ensures safe and convenient access for all users. Simplify your result management process with our reliable and efficient platform.', 'upload/image/67446511b0baf_1.png', 'Our Mission and Vision', 'Our highly skilled developer and socialmedia expert will help you to be a social media influencer and we will provide you Website, SEO, Application, and boost your socialmedia channel or profil and also we will provide support to set and active your affiliate marketing and connect with website.', 'upload/image/67446511b0baf_2.png', '2024-11-25', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(255) NOT NULL,
  `heading` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `heading`, `body`, `status`, `page`, `date`) VALUES
(7, 'test 3', 'This is the test notice 3', 'active', 'home', '2024-10-25'),
(8, 'test 4', 'This is the test notice 4', 'active', 'home', '2024-10-25'),
(9, 'test 5', 'This is the test notice 5', 'active', 'home', '2024-10-25'),
(10, 'test 1', 'this is test notice 1', 'active', 'school', '2024-10-26'),
(11, 'test 2', 'This is test notice 2', 'active', 'school', '2024-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(255) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_heading` text COLLATE utf8_unicode_ci NOT NULL,
  `home_body` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c1_heading` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c1_body` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c2_heading` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c2_body` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c3_heading` text COLLATE utf8_unicode_ci NOT NULL,
  `about_c3_body` text COLLATE utf8_unicode_ci NOT NULL,
  `slider1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_img_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_img_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_img_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copy_right` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `logo`, `home_heading`, `home_body`, `about_c1_heading`, `about_c1_body`, `about_c2_heading`, `about_c2_body`, `about_c3_heading`, `about_c3_body`, `slider1`, `slider2`, `slider3`, `home_img`, `about_img_1`, `about_img_2`, `about_img_3`, `facebook`, `instagram`, `linkedin`, `copy_right`) VALUES
(1, 'upload/image/logo.png', 'Welcome', 'Welcome to our Result Management System, a user-friendly platform for schools to efficiently upload and manage exam results. Administrators can easily upload results for different classes, sessions, and sections, while students can access and download their performance reports online. With secure access, bulk uploads via Excel, and dynamic search features, finding specific results by class, section, or exam name is simple and fast. Designed with data privacy in mind, our system ensures safe and convenient access for all users. Simplify your result management process with our reliable and efficient platform.', 'About Us', 'Welcome to Ikeworld Private Limited, a dynamic and forward-thinking IT company that has redefined the realms of web development, software solutions, and fintech innovation. Founded with a vision to revolutionize the digital landscape, Ikeworld has emerged as a trailblazer in delivering cutting-edge solutions that empower businesses and individuals alike.', 'Our Approach to Security & Prevention', 'All our work is highly secure and protected from malicious viruses. We believe in clean coding and well-maintained design. Our Highly qualified developer will make your website secure and user-friendly. We recommend the best quality hosting that will help your website and application secure and fast.', 'Our Mission and Vision', 'Our highly skilled developer and socialmedia expert will help you to be a social media influencer and we will provide you Website, SEO, Application, and boost your socialmedia channel or profil and also we will provide support to set and active your affiliate marketing and connect with website.\r\n\r\n', 'upload/image/slider1_6726563cc1a5f.jpg', 'upload/image/slider2_6726563cc2156.png', 'upload/image/slider3_6726563cc2d39.jpg', 'upload/image/home_image_1_6726563cc3296.webp', 'upload/image/about_image_1_6726563cc3439.png', 'upload/image/about_image_2_6726563cc363f.png', 'upload/image/about_image_3_6726563cc37e8.png', '', '', '', '2025 ©  Designed and maintained Mahmadul Hasan');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(255) NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `heading`, `body`) VALUES
(1, 'Privacy Policy', 'At Result Demoikeworld, we take your privacy seriously. This policy outlines how we collect, use, and protect your information when you use our services.'),
(2, 'Information We Collect', 'We may collect personal information such as your name, email address, school details, and exam data in order to provide our services. We also collect non-personal information like browser type, device used, and IP address for analytics and improving our website.'),
(3, 'How We Use Your Information', 'To provide result viewing and uploading services. \r\nTo improve the functionality and performance of our website.\r\nTo communicate with you regarding your account and services.\r\nTo comply with legal obligations if necessary.'),
(4, 'Data Security', 'We implement appropriate security measures to protect your personal information. However, please note that no method of online transmission is 100% secure.\r\n\r\nYour Rights'),
(5, 'Your Rights', 'You have the right to access, modify, or delete your personal information at any time. To do so, please contact us at info@ikeworld.co.in.'),
(6, 'Changes to This Privacy Policy', 'We may update our privacy policy from time to time. Any changes will be posted on this page with the last update date.');

-- --------------------------------------------------------

--
-- Table structure for table `published_result`
--

CREATE TABLE `published_result` (
  `id` int(255) NOT NULL,
  `school_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_add` varchar(255) NOT NULL,
  `school_state` varchar(255) NOT NULL,
  `school_pin` varchar(10) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `result_table_name` varchar(255) NOT NULL,
  `subject_table_name` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `publish_date` date NOT NULL,
  `publish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `published_result`
--

INSERT INTO `published_result` (`id`, `school_id`, `class_id`, `school_name`, `school_add`, `school_state`, `school_pin`, `class`, `section`, `session`, `exam_name`, `result_table_name`, `subject_table_name`, `upload_date`, `publish_date`, `publish_time`) VALUES
(1, 10, 0, 'TEST SCHOOL NAME 2', 'Kolkata', 'West Bengal', '700001', '1', 'A', '2024-2025', 'UNIT 1', '10_2024-2025_1_A_UNIT 1_result', '10_2024-2025_1_A_UNIT 1_subject', '2024-09-15', '2024-09-15', '22:14:00'),
(2, 10, 0, 'TEST SCHOOL NAME 2', 'Kolkata', 'West Bengal', '700001', '2', 'A', '2024-2025', 'UNIT 1', '10_2024-2025_2_A_UNIT 1_result', '10_2024-2025_2_A_UNIT 1_subject', '2024-09-17', '2024-09-19', '10:01:00'),
(3, 10, 0, 'TEST SCHOOL NAME 2', 'Kolkata', 'West Bengal', '700001', '4', 'A', '2024-2025', 'UNIT 1', '10_2024-2025_4_A_UNIT 1_result', '10_2024-2025_4_A_subject', '2024-09-26', '2024-09-25', '20:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_details`
--

CREATE TABLE `school_details` (
  `id` int(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reset_token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_details`
--

INSERT INTO `school_details` (`id`, `school_name`, `email`, `phone_no`, `state`, `pin_code`, `address`, `date`, `password`, `status`, `reset_token`) VALUES
(10, 'TEST SCHOOL NAME', 'school@gmail.com', '9564203713', 'West Bengal', 700001, 'Kolkata, West Bengal', '2024-09-12', '$2y$10$ygcoLn/CLtQdKKku5X5iEug9YmwgrDfH3kkADXmMj6mKg50nEX3Iq', 'active', ''),
(11, 'TEST SCHOOL NAME 1', 'mahmadulhasan1@gmail.com', '9564203713', 'West Bengal', 742303, 'Faridpur', '2024-09-13', '$2y$10$PFBgYFPWfsRHkJajNyWD.uSuirgkRA.3Og0XzBiiagpxSavX2/.rK', 'active', ''),
(12, 'TEST SCHOOL NAME 3', 'mahmadulhasan3@gmail.com', '9564203713', 'West Bengal', 742303, 'Faridpur', '2024-10-13', '$2y$10$xh8XcMoiEm4UBFx/ANyIv.yL0uC.h82nDckhKOWpu30QwbU2f1rsC', 'active', ''),
(13, 'TEST SCHOOL NAME 4', 'mahmadulhasan4@gmail.com', '9564203713', 'West Bengal', 742303, 'Domkal', '2024-11-13', '$2y$10$fVGrb8sATC4ODlXnWpvEAOI.vyp7iaeXlinIDRl46GoQkUFf9cZFC', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_login_counts`
--

CREATE TABLE `school_login_counts` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(255) NOT NULL,
  `result_id` int(255) NOT NULL,
  `roll_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gurdian_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `school_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `result_id`, `roll_no`, `name`, `gurdian_name`, `date_of_birth`, `school_id`, `class_id`, `session`, `class`, `section`) VALUES
(1, 15001, '', 'STUDENT NAME 1', 'GURDIAN NAME 1', '2004-12-20', 10, 1, '2024-2025', '1', 'A'),
(2, 15002, '', 'STUDENT NAME 2', 'GURDIAN NAME 2', '2004-12-21', 10, 1, '2024-2025', '1', 'A'),
(3, 15003, '', 'STUDENT NAME 3', 'GURDIAN NAME 3', '2004-12-22', 10, 1, '2024-2025', '1', 'A'),
(4, 15004, '', 'STUDENT NAME 4', 'GURDIAN NAME 4', '2004-12-23', 10, 1, '2024-2025', '1', 'A'),
(5, 15005, '', 'STUDENT NAME 5', 'GURDIAN NAME 5', '2004-12-24', 10, 1, '2024-2025', '1', 'A'),
(6, 15006, '', 'STUDENT NAME 6', 'GURDIAN NAME 6', '2004-02-06', 10, 1, '2024-2025', '1', 'A'),
(7, 15007, '', 'STUDENT NAME 7', 'GURDIAN NAME 7', '2004-02-07', 10, 1, '2024-2025', '1', 'A'),
(8, 15008, '', 'STUDENT NAME 8', 'GURDIAN NAME 8', '2004-02-08', 10, 1, '2024-2025', '1', 'A'),
(9, 15009, '', 'STUDENT NAME 9', 'GURDIAN NAME 9', '2004-02-09', 10, 1, '2024-2025', '1', 'A'),
(10, 15010, '', 'STUDENT NAME 10', 'GURDIAN NAME 10', '2004-02-10', 10, 1, '2024-2025', '1', 'A'),
(11, 15011, '', 'STUDENT NAME 11', 'GURDIAN NAME 11', '2004-02-11', 10, 1, '2024-2025', '1', 'A'),
(12, 15012, '', 'STUDENT NAME 12', 'GURDIAN NAME 12', '2004-02-12', 10, 1, '2024-2025', '1', 'A'),
(13, 15013, '', 'STUDENT NAME 13', 'GURDIAN NAME 13', '2004-02-13', 10, 1, '2024-2025', '1', 'A'),
(14, 15014, '', 'STUDENT NAME 14', 'GURDIAN NAME 14', '2004-02-14', 10, 1, '2024-2025', '1', 'A'),
(15, 15015, '', 'STUDENT NAME 15', 'GURDIAN NAME 15', '2004-02-15', 10, 1, '2024-2025', '1', 'A'),
(16, 15016, '', 'STUDENT NAME 16', 'GURDIAN NAME 16', '2004-02-16', 10, 1, '2024-2025', '1', 'A'),
(17, 15017, '', 'STUDENT NAME 17', 'GURDIAN NAME 17', '2004-02-17', 10, 1, '2024-2025', '1', 'A'),
(18, 15018, '', 'STUDENT NAME 18', 'GURDIAN NAME 18', '2004-02-18', 10, 1, '2024-2025', '1', 'A'),
(19, 15019, '', 'STUDENT NAME 19', 'GURDIAN NAME 19', '2004-02-19', 10, 1, '2024-2025', '1', 'A'),
(20, 15020, '', 'STUDENT NAME 20', 'GURDIAN NAME 20', '2004-02-20', 10, 1, '2024-2025', '1', 'A'),
(21, 15021, '', 'STUDENT NAME 21', 'GURDIAN NAME 21', '2004-02-21', 10, 1, '2024-2025', '1', 'A'),
(22, 15022, '', 'STUDENT NAME 22', 'GURDIAN NAME 22', '2004-02-22', 10, 1, '2024-2025', '1', 'A'),
(23, 15023, '', 'STUDENT NAME 23', 'GURDIAN NAME 23', '2004-02-23', 10, 1, '2024-2025', '1', 'A'),
(24, 15024, '', 'STUDENT NAME 24', 'GURDIAN NAME 24', '2004-02-24', 10, 1, '2024-2025', '1', 'A'),
(25, 15025, '', 'STUDENT NAME 25', 'GURDIAN NAME 25', '2004-02-25', 10, 1, '2024-2025', '1', 'A'),
(26, 15026, '', 'STUDENT NAME 26', 'GURDIAN NAME 26', '2024-09-25', 10, 1, '2024-2025', '1', 'A'),
(27, 15027, '', 'STUDENT NAME 27', 'GURDIAN NAME 27', '2024-09-25', 10, 1, '2024-2025', '1', 'A'),
(28, 15028, '', 'STUDENT NAME 28', 'GURDIAN NAME 28', '2024-09-25', 10, 1, '2024-2025', '1', 'A'),
(29, 15029, '', 'STUDENT NAME 1', 'GURDIAN NAME 1', '2004-12-20', 10, 2, '2024-2025', '2', 'A'),
(30, 15030, '', 'STUDENT NAME 2', 'GURDIAN NAME 2', '2004-12-21', 10, 2, '2024-2025', '2', 'A'),
(31, 15031, '', 'STUDENT NAME 3', 'GURDIAN NAME 3', '2004-12-22', 10, 2, '2024-2025', '2', 'A'),
(32, 15032, '', 'STUDENT NAME 4', 'GURDIAN NAME 4', '2004-12-23', 10, 2, '2024-2025', '2', 'A'),
(33, 15033, '', 'STUDENT NAME 5', 'GURDIAN NAME 5', '2004-12-24', 10, 2, '2024-2025', '2', 'A'),
(34, 15034, '', 'STUDENT NAME 6', 'GURDIAN NAME 6', '2004-02-06', 10, 2, '2024-2025', '2', 'A'),
(35, 15035, '', 'STUDENT NAME 7', 'GURDIAN NAME 7', '2004-02-07', 10, 2, '2024-2025', '2', 'A'),
(36, 15036, '', 'STUDENT NAME 8', 'GURDIAN NAME 8', '2004-02-08', 10, 2, '2024-2025', '2', 'A'),
(37, 15037, '', 'STUDENT NAME 9', 'GURDIAN NAME 9', '2004-02-09', 10, 2, '2024-2025', '2', 'A'),
(38, 15038, '', 'STUDENT NAME 10', 'GURDIAN NAME 10', '2004-02-10', 10, 2, '2024-2025', '2', 'A'),
(39, 15039, '', 'STUDENT NAME 11', 'GURDIAN NAME 11', '2004-02-11', 10, 2, '2024-2025', '2', 'A'),
(40, 15040, '', 'STUDENT NAME 12', 'GURDIAN NAME 12', '2004-02-12', 10, 2, '2024-2025', '2', 'A'),
(41, 15041, '', 'STUDENT NAME 13', 'GURDIAN NAME 13', '2004-02-13', 10, 2, '2024-2025', '2', 'A'),
(42, 15042, '', 'STUDENT NAME 14', 'GURDIAN NAME 14', '2004-02-14', 10, 2, '2024-2025', '2', 'A'),
(43, 15043, '', 'STUDENT NAME 15', 'GURDIAN NAME 15', '2004-02-15', 10, 2, '2024-2025', '2', 'A'),
(44, 15044, '', 'STUDENT NAME 16', 'GURDIAN NAME 16', '2004-02-16', 10, 2, '2024-2025', '2', 'A'),
(45, 15045, '', 'STUDENT NAME 17', 'GURDIAN NAME 17', '2004-02-17', 10, 2, '2024-2025', '2', 'A'),
(46, 15046, '', 'STUDENT NAME 18', 'GURDIAN NAME 18', '2004-02-18', 10, 2, '2024-2025', '2', 'A'),
(47, 15047, '', 'STUDENT NAME 19', 'GURDIAN NAME 19', '2004-02-19', 10, 2, '2024-2025', '2', 'A'),
(48, 15048, '', 'STUDENT NAME 20', 'GURDIAN NAME 20', '2004-02-20', 10, 2, '2024-2025', '2', 'A'),
(49, 15049, '', 'STUDENT NAME 21', 'GURDIAN NAME 21', '2004-02-21', 10, 2, '2024-2025', '2', 'A'),
(50, 15050, '', 'STUDENT NAME 22', 'GURDIAN NAME 22', '2004-02-22', 10, 2, '2024-2025', '2', 'A'),
(51, 15051, '', 'STUDENT NAME 23', 'GURDIAN NAME 23', '2004-02-23', 10, 2, '2024-2025', '2', 'A'),
(52, 15052, '', 'STUDENT NAME 24', 'GURDIAN NAME 24', '2004-02-24', 10, 2, '2024-2025', '2', 'A'),
(53, 15053, '', 'STUDENT NAME 25', 'GURDIAN NAME 25', '2004-02-25', 10, 2, '2024-2025', '2', 'A'),
(54, 15054, '', 'STUDENT NAME 1', 'GURDIAN NAME 1', '2004-12-20', 10, 3, '2024-2025', '3', 'A'),
(55, 15055, '', 'STUDENT NAME 2', 'GURDIAN NAME 2', '2004-12-21', 10, 3, '2024-2025', '3', 'A'),
(56, 15056, '', 'STUDENT NAME 3', 'GURDIAN NAME 3', '2004-12-22', 10, 3, '2024-2025', '3', 'A'),
(57, 15057, '', 'STUDENT NAME 4', 'GURDIAN NAME 4', '2004-12-23', 10, 3, '2024-2025', '3', 'A'),
(58, 15058, '', 'STUDENT NAME 5', 'GURDIAN NAME 5', '2004-12-24', 10, 3, '2024-2025', '3', 'A'),
(59, 15059, '', 'STUDENT NAME 6', 'GURDIAN NAME 6', '2004-02-06', 10, 3, '2024-2025', '3', 'A'),
(60, 15060, '', 'STUDENT NAME 7', 'GURDIAN NAME 7', '2004-02-07', 10, 3, '2024-2025', '3', 'A'),
(61, 15061, '', 'STUDENT NAME 8', 'GURDIAN NAME 8', '2004-02-08', 10, 3, '2024-2025', '3', 'A'),
(62, 15062, '', 'STUDENT NAME 9', 'GURDIAN NAME 9', '2004-02-09', 10, 3, '2024-2025', '3', 'A'),
(63, 15063, '', 'STUDENT NAME 10', 'GURDIAN NAME 10', '2004-02-10', 10, 3, '2024-2025', '3', 'A'),
(64, 15064, '', 'STUDENT NAME 11', 'GURDIAN NAME 11', '2004-02-11', 10, 3, '2024-2025', '3', 'A'),
(65, 15065, '', 'STUDENT NAME 12', 'GURDIAN NAME 12', '2004-02-12', 10, 3, '2024-2025', '3', 'A'),
(66, 15066, '', 'STUDENT NAME 13', 'GURDIAN NAME 13', '2004-02-13', 10, 3, '2024-2025', '3', 'A'),
(67, 15067, '', 'STUDENT NAME 14', 'GURDIAN NAME 14', '2004-02-14', 10, 3, '2024-2025', '3', 'A'),
(68, 15068, '', 'STUDENT NAME 15', 'GURDIAN NAME 15', '2004-02-15', 10, 3, '2024-2025', '3', 'A'),
(69, 15069, '', 'STUDENT NAME 16', 'GURDIAN NAME 16', '2004-02-16', 10, 3, '2024-2025', '3', 'A'),
(70, 15070, '', 'STUDENT NAME 17', 'GURDIAN NAME 17', '2004-02-17', 10, 3, '2024-2025', '3', 'A'),
(71, 15071, '', 'STUDENT NAME 18', 'GURDIAN NAME 18', '2004-02-18', 10, 3, '2024-2025', '3', 'A'),
(72, 15072, '', 'STUDENT NAME 19', 'GURDIAN NAME 19', '2004-02-19', 10, 3, '2024-2025', '3', 'A'),
(73, 15073, '', 'STUDENT NAME 20', 'GURDIAN NAME 20', '2004-02-20', 10, 3, '2024-2025', '3', 'A'),
(74, 15074, '', 'STUDENT NAME 21', 'GURDIAN NAME 21', '2004-02-21', 10, 3, '2024-2025', '3', 'A'),
(75, 15075, '', 'STUDENT NAME 22', 'GURDIAN NAME 22', '2004-02-22', 10, 3, '2024-2025', '3', 'A'),
(76, 15076, '', 'STUDENT NAME 23', 'GURDIAN NAME 23', '2004-02-23', 10, 3, '2024-2025', '3', 'A'),
(77, 15077, '', 'STUDENT NAME 24', 'GURDIAN NAME 24', '2004-02-24', 10, 3, '2024-2025', '3', 'A'),
(78, 15078, '', 'STUDENT NAME 25', 'GURDIAN NAME 25', '2004-02-25', 10, 3, '2024-2025', '3', 'A'),
(79, 15079, '101', 'STUDENT NAME 1', 'GURDIAN NAME 1', '2004-12-20', 10, 4, '2024-2025', '4', 'A'),
(80, 15080, '102', 'STUDENT NAME 2', 'GURDIAN NAME 2', '2004-12-21', 10, 4, '2024-2025', '4', 'A'),
(81, 15081, '103', 'STUDENT NAME 3', 'GURDIAN NAME 3', '2004-12-22', 10, 4, '2024-2025', '4', 'A'),
(82, 15082, '104', 'STUDENT NAME 4', 'GURDIAN NAME 4', '2004-12-23', 10, 4, '2024-2025', '4', 'A'),
(83, 15083, '105', 'STUDENT NAME 5', 'GURDIAN NAME 5', '2004-12-24', 10, 4, '2024-2025', '4', 'A'),
(84, 15084, '106', 'STUDENT NAME 6', 'GURDIAN NAME 6', '2004-02-06', 10, 4, '2024-2025', '4', 'A'),
(85, 15085, '107', 'STUDENT NAME 7', 'GURDIAN NAME 7', '2004-02-07', 10, 4, '2024-2025', '4', 'A'),
(86, 15086, '108', 'STUDENT NAME 8', 'GURDIAN NAME 8', '2004-02-08', 10, 4, '2024-2025', '4', 'A'),
(87, 15087, '109', 'STUDENT NAME 9', 'GURDIAN NAME 9', '2004-02-09', 10, 4, '2024-2025', '4', 'A'),
(88, 15088, '110', 'STUDENT NAME 10', 'GURDIAN NAME 10', '2004-02-10', 10, 4, '2024-2025', '4', 'A'),
(89, 15089, '111', 'STUDENT NAME 11', 'GURDIAN NAME 11', '2004-02-11', 10, 4, '2024-2025', '4', 'A'),
(90, 15090, '112', 'STUDENT NAME 12', 'GURDIAN NAME 12', '2004-02-12', 10, 4, '2024-2025', '4', 'A'),
(91, 15091, '113', 'STUDENT NAME 13', 'GURDIAN NAME 13', '2004-02-13', 10, 4, '2024-2025', '4', 'A'),
(92, 15092, '114', 'STUDENT NAME 14', 'GURDIAN NAME 14', '2004-02-14', 10, 4, '2024-2025', '4', 'A'),
(93, 15093, '115', 'STUDENT NAME 15', 'GURDIAN NAME 15', '2004-02-15', 10, 4, '2024-2025', '4', 'A'),
(94, 15094, '116', 'STUDENT NAME 16', 'GURDIAN NAME 16', '2004-02-16', 10, 4, '2024-2025', '4', 'A'),
(95, 15095, '117', 'STUDENT NAME 17', 'GURDIAN NAME 17', '2004-02-17', 10, 4, '2024-2025', '4', 'A'),
(96, 15096, '118', 'STUDENT NAME 18', 'GURDIAN NAME 18', '2004-02-18', 10, 4, '2024-2025', '4', 'A'),
(97, 15097, '119', 'STUDENT NAME 19', 'GURDIAN NAME 19', '2004-02-19', 10, 4, '2024-2025', '4', 'A'),
(98, 15098, '120', 'STUDENT NAME 20', 'GURDIAN NAME 20', '2004-02-20', 10, 4, '2024-2025', '4', 'A'),
(99, 15099, '121', 'STUDENT NAME 21', 'GURDIAN NAME 21', '2004-02-21', 10, 4, '2024-2025', '4', 'A'),
(100, 15100, '122', 'STUDENT NAME 22', 'GURDIAN NAME 22', '2004-02-22', 10, 4, '2024-2025', '4', 'A'),
(101, 15101, '123', 'STUDENT NAME 23', 'GURDIAN NAME 23', '2004-02-23', 10, 4, '2024-2025', '4', 'A'),
(102, 15102, '124', 'STUDENT NAME 24', 'GURDIAN NAME 24', '2004-02-24', 10, 4, '2024-2025', '4', 'A'),
(103, 15103, '125', 'STUDENT NAME 25', 'GURDIAN NAME 25', '2004-02-25', 10, 4, '2024-2025', '4', 'A'),
(104, 15104, 'Array', 'STUDENT NAME 26', 'GURDIAN NAME 26', '2024-09-26', 10, 4, '2024-2025', '4', 'A'),
(105, 15105, 'Array', 'STUDENT NAME 27', 'GURDIAN NAME 27', '2024-09-26', 10, 4, '2024-2025', '4', 'A'),
(106, 15106, '128', 'STUDENT NAME 28', 'GURDIAN NAME 28', '2024-09-26', 10, 4, '2024-2025', '4', 'A'),
(107, 15107, '101', 'STUDENT NAME 1', 'GURDIAN NAME 1', '2004-12-20', 10, 5, '2024-2025', '12', 'B'),
(108, 15108, '102', 'STUDENT NAME 2', 'GURDIAN NAME 2', '2004-12-21', 10, 5, '2024-2025', '12', 'B'),
(109, 15109, '103', 'STUDENT NAME 3', 'GURDIAN NAME 3', '2004-12-22', 10, 5, '2024-2025', '12', 'B'),
(110, 15110, '104', 'STUDENT NAME 4', 'GURDIAN NAME 4', '2004-12-23', 10, 5, '2024-2025', '12', 'B'),
(111, 15111, '105', 'STUDENT NAME 5', 'GURDIAN NAME 5', '2004-12-24', 10, 5, '2024-2025', '12', 'B'),
(112, 15112, '106', 'STUDENT NAME 6', 'GURDIAN NAME 6', '2004-02-06', 10, 5, '2024-2025', '12', 'B'),
(113, 15113, '107', 'STUDENT NAME 7', 'GURDIAN NAME 7', '2004-02-07', 10, 5, '2024-2025', '12', 'B'),
(114, 15114, '108', 'STUDENT NAME 8', 'GURDIAN NAME 8', '2004-02-08', 10, 5, '2024-2025', '12', 'B'),
(115, 15115, '109', 'STUDENT NAME 9', 'GURDIAN NAME 9', '2004-02-09', 10, 5, '2024-2025', '12', 'B'),
(116, 15116, '110', 'STUDENT NAME 10', 'GURDIAN NAME 10', '2004-02-10', 10, 5, '2024-2025', '12', 'B'),
(117, 15117, '111', 'STUDENT NAME 11', 'GURDIAN NAME 11', '2004-02-11', 10, 5, '2024-2025', '12', 'B'),
(118, 15118, '112', 'STUDENT NAME 12', 'GURDIAN NAME 12', '2004-02-12', 10, 5, '2024-2025', '12', 'B'),
(119, 15119, '113', 'STUDENT NAME 13', 'GURDIAN NAME 13', '2004-02-13', 10, 5, '2024-2025', '12', 'B'),
(120, 15120, '114', 'STUDENT NAME 14', 'GURDIAN NAME 14', '2004-02-14', 10, 5, '2024-2025', '12', 'B'),
(121, 15121, '115', 'STUDENT NAME 15', 'GURDIAN NAME 15', '2004-02-15', 10, 5, '2024-2025', '12', 'B'),
(122, 15122, '116', 'STUDENT NAME 16', 'GURDIAN NAME 16', '2004-02-16', 10, 5, '2024-2025', '12', 'B'),
(123, 15123, '117', 'STUDENT NAME 17', 'GURDIAN NAME 17', '2004-02-17', 10, 5, '2024-2025', '12', 'B'),
(124, 15124, '118', 'STUDENT NAME 18', 'GURDIAN NAME 18', '2004-02-18', 10, 5, '2024-2025', '12', 'B'),
(125, 15125, '119', 'STUDENT NAME 19', 'GURDIAN NAME 19', '2004-02-19', 10, 5, '2024-2025', '12', 'B'),
(126, 15126, '120', 'STUDENT NAME 20', 'GURDIAN NAME 20', '2004-02-20', 10, 5, '2024-2025', '12', 'B'),
(127, 15127, '121', 'STUDENT NAME 21', 'GURDIAN NAME 21', '2004-02-21', 10, 5, '2024-2025', '12', 'B'),
(128, 15128, '122', 'STUDENT NAME 22', 'GURDIAN NAME 22', '2004-02-22', 10, 5, '2024-2025', '12', 'B'),
(129, 15129, '123', 'STUDENT NAME 23', 'GURDIAN NAME 23', '2004-02-23', 10, 5, '2024-2025', '12', 'B'),
(130, 15130, '124', 'STUDENT NAME 24', 'GURDIAN NAME 24', '2004-02-24', 10, 5, '2024-2025', '12', 'B'),
(131, 15131, '125', 'STUDENT NAME 25', 'GURDIAN NAME 25', '2004-02-25', 10, 5, '2024-2025', '12', 'B'),
(133, 15133, '126', 'STUDENT NAME 29', 'GURDIAN NAME 29', '2004-01-01', 10, 1, '2024-2025', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_condition`
--

CREATE TABLE `terms_and_condition` (
  `id` int(255) NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terms_and_condition`
--

INSERT INTO `terms_and_condition` (`id`, `heading`, `body`) VALUES
(3, '1. Acceptance of Terms', 'By accessing this website, you acknowledge that you have read, understood, and agree to comply with these terms and conditions. If you do not agree with any part of these terms, please do not use our website.'),
(4, '2. Use of Services', 'Our website provides result viewing and uploading services. You agree to use these services only for lawful purposes. Misuse of the website, including uploading incorrect or false data, unauthorized access, or tampering with records, is strictly prohibited.'),
(5, '3. Account Responsibility', 'You are responsible for maintaining the confidentiality of your account information, including your username and password. You agree to notify us immediately if you suspect any unauthorized use of your account.'),
(6, '4. Data Accuracy', 'We strive to ensure the accuracy of the data on our website. However, we do not guarantee the correctness or completeness of any information. You are responsible for verifying the accuracy of the results and data you upload or view.'),
(7, '5. Intellectual Property', 'All content on this website, including text, graphics, logos, and software, is the property of Result Demoikeworld or its content suppliers and is protected by copyright and other intellectual property laws.'),
(8, '6. Termination', 'We reserve the right to suspend or terminate your access to the website if you violate any of these terms and conditions. We also reserve the right to modify or discontinue any part of the service without prior notice.'),
(9, '7. Limitation of Liability', 'Result Demoikeworld will not be liable for any damages resulting from the use of our website or services. This includes but is not limited to direct, indirect, incidental, or consequential damages.'),
(10, '8. Changes to Terms', 'We may update these terms and conditions at any time. Any changes will be posted on this page with the last update date. It is your responsibility to review these terms periodically for any updates.');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counts`
--

CREATE TABLE `visitor_counts` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `homepage_count` int(255) NOT NULL DEFAULT '0',
  `aboutpage_count` int(255) NOT NULL,
  `contactpage_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitor_counts`
--

INSERT INTO `visitor_counts` (`id`, `date`, `homepage_count`, `aboutpage_count`, `contactpage_count`) VALUES
(1, '2024-11-26', 61, 47, 47),
(2, '2024-11-25', 20, 12, 15),
(3, '2024-10-25', 45, 40, 35),
(4, '2024-09-25', 30, 12, 40),
(5, '2024-10-15', 100, 50, 70),
(6, '2024-11-27', 10, 5, 4),
(7, '2024-11-28', 11, 0, 0),
(8, '2024-11-29', 5, 0, 0),
(9, '2024-11-30', 2, 0, 0),
(10, '2024-12-01', 7, 3, 3),
(11, '2024-12-02', 5, 0, 0),
(12, '2024-12-03', 2, 0, 0),
(13, '2024-12-04', 17, 4, 5),
(14, '2024-12-05', 35, 1, 1),
(15, '2024-12-07', 4, 0, 0),
(16, '2024-12-08', 8, 3, 3),
(17, '2024-12-09', 2, 0, 0),
(18, '2024-12-10', 11, 1, 2),
(19, '2024-12-11', 4, 3, 1),
(20, '2024-12-12', 4, 3, 1),
(21, '2024-12-13', 3, 0, 0),
(22, '2024-12-14', 22, 0, 0),
(23, '2024-12-15', 5, 0, 0),
(24, '2024-12-16', 4, 0, 0),
(25, '2024-12-19', 3, 0, 0),
(26, '2024-12-21', 12, 0, 0),
(27, '2024-12-22', 1, 0, 0),
(28, '2024-12-24', 2, 1, 0),
(29, '2024-12-26', 2, 0, 0),
(30, '2024-12-27', 7, 0, 0),
(31, '2025-01-01', 3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `10_2024-2025_1_A_subject`
--
ALTER TABLE `10_2024-2025_1_A_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_1_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_1_A_UNIT 1_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_1_A_UNIT 1_subject`
--
ALTER TABLE `10_2024-2025_1_A_UNIT 1_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_2_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_2_A_UNIT 1_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_2_A_UNIT 1_subject`
--
ALTER TABLE `10_2024-2025_2_A_UNIT 1_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_4_A_subject`
--
ALTER TABLE `10_2024-2025_4_A_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_4_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_4_A_UNIT 1_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_2024-2025_12_B_subject`
--
ALTER TABLE `10_2024-2025_12_B_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_class_details`
--
ALTER TABLE `10_class_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_resulttablename`
--
ALTER TABLE `10_resulttablename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `11_2024-2025_1_A_subject`
--
ALTER TABLE `11_2024-2025_1_A_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `11_class_details`
--
ALTER TABLE `11_class_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `11_resulttablename`
--
ALTER TABLE `11_resulttablename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `12_class_details`
--
ALTER TABLE `12_class_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `12_resulttablename`
--
ALTER TABLE `12_resulttablename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `13_class_details`
--
ALTER TABLE `13_class_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `13_resulttablename`
--
ALTER TABLE `13_resulttablename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disclaimer`
--
ALTER TABLE `disclaimer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_count`
--
ALTER TABLE `login_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_pages`
--
ALTER TABLE `new_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `published_result`
--
ALTER TABLE `published_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_details`
--
ALTER TABLE `school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_login_counts`
--
ALTER TABLE `school_login_counts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_counts`
--
ALTER TABLE `visitor_counts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `10_2024-2025_1_A_subject`
--
ALTER TABLE `10_2024-2025_1_A_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_2024-2025_1_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_1_A_UNIT 1_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `10_2024-2025_1_A_UNIT 1_subject`
--
ALTER TABLE `10_2024-2025_1_A_UNIT 1_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_2024-2025_2_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_2_A_UNIT 1_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `10_2024-2025_2_A_UNIT 1_subject`
--
ALTER TABLE `10_2024-2025_2_A_UNIT 1_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_2024-2025_4_A_subject`
--
ALTER TABLE `10_2024-2025_4_A_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_2024-2025_4_A_UNIT 1_result`
--
ALTER TABLE `10_2024-2025_4_A_UNIT 1_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `10_2024-2025_12_B_subject`
--
ALTER TABLE `10_2024-2025_12_B_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `10_class_details`
--
ALTER TABLE `10_class_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_resulttablename`
--
ALTER TABLE `10_resulttablename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `11_2024-2025_1_A_subject`
--
ALTER TABLE `11_2024-2025_1_A_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `11_class_details`
--
ALTER TABLE `11_class_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `11_resulttablename`
--
ALTER TABLE `11_resulttablename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `12_class_details`
--
ALTER TABLE `12_class_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `12_resulttablename`
--
ALTER TABLE `12_resulttablename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `13_class_details`
--
ALTER TABLE `13_class_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `13_resulttablename`
--
ALTER TABLE `13_resulttablename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disclaimer`
--
ALTER TABLE `disclaimer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_count`
--
ALTER TABLE `login_count`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_pages`
--
ALTER TABLE `new_pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `published_result`
--
ALTER TABLE `published_result`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_details`
--
ALTER TABLE `school_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `school_login_counts`
--
ALTER TABLE `school_login_counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitor_counts`
--
ALTER TABLE `visitor_counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school_login_counts`
--
ALTER TABLE `school_login_counts`
  ADD CONSTRAINT `school_login_counts_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
