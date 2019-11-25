-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 07:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'java script'),
(2, 1, 1, 'php'),
(3, 1, 0, 'c++'),
(4, 1, 0, 'html'),
(5, 2, 0, 'jomla'),
(6, 2, 1, 'wordpress'),
(7, 2, 0, 'open cart'),
(8, 2, 0, 'one pager'),
(9, 3, 0, 'book'),
(10, 3, 0, 'khata'),
(11, 3, 1, 'editor apps'),
(12, 3, 0, 'nothing all'),
(13, 4, 0, 'two'),
(14, 4, 0, 'three'),
(15, 4, 0, 'five'),
(16, 4, 1, 'four'),
(21, 5, 0, 'Teacher'),
(22, 5, 0, 'Worker'),
(23, 5, 1, 'Coder'),
(24, 5, 0, 'Nothing all'),
(25, 6, 1, 'yes'),
(26, 6, 0, 'no'),
(27, 6, 0, 'noting'),
(28, 6, 0, 'none'),
(49, 7, 0, 'Teacher'),
(50, 7, 0, 'Worker'),
(51, 7, 1, 'Coder'),
(52, 7, 0, 'Nothing all');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
