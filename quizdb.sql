-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 11:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `html_options`
--

CREATE TABLE `html_options` (
  `oid` int(100) NOT NULL,
  `options` varchar(255) NOT NULL,
  `qid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `html_options`
--

INSERT INTO `html_options` (`oid`, `options`, `qid`) VALUES
(1, 'Hyper Text Markup Language', 1),
(2, 'High Text Markup Language', 1),
(3, 'Hyper Tabular Markup Language', 1),
(4, 'None of these', 1),
(5, '<TD>', 2),
(6, '<br>', 2),
(7, '<P>', 2),
(8, '<TR>', 2),
(9, '<LL>', 3),
(10, '<DD>', 3),
(11, '<DL>', 3),
(12, '<DS>', 3),
(13, '<head>', 4),
(14, '<h6>', 4),
(15, '<heading>', 4),
(16, '<h1>', 4),
(17, 'Method', 5),
(18, 'Action', 5),
(19, 'Both (a)&(b)', 5),
(20, 'None of these', 5),
(21, 'How to organise the page\r\n', 6),
(22, 'How to display the page', 6),
(23, 'How to display message box on page\r\n', 6),
(24, 'None of these\r\n', 6),
(25, 'Local-server\r\n', 7),
(26, 'Client-server\r\n', 7),
(27, '3-tier\r\n', 7),
(28, 'None of these\r\n', 7),
(29, 'No, there is no such terms as Empty Element\r\n', 8),
(30, 'Empty elements are element with no data\r\n', 8),
(31, 'No, it is not valid to use Empty Element\r\n', 8),
(32, 'None of these\r\n', 8),
(33, 'size', 9),
(34, 'len', 9),
(35, 'maxlength', 9),
(36, 'all of these\r\n', 9),
(37, '<Body>\r\n', 10),
(38, '<Title>\r\n', 10),
(39, '<HTML>\r\n', 10),
(40, '<Form>\r\n', 10);

-- --------------------------------------------------------

--
-- Table structure for table `html_questions`
--

CREATE TABLE `html_questions` (
  `qid` int(20) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `aid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `html_questions`
--

INSERT INTO `html_questions` (`qid`, `questions`, `aid`) VALUES
(1, 'HTML stands for? \r\n', 1),
(2, 'which of the following tag is used to mark a begining of paragraph ?', 7),
(3, 'From which tag descriptive list starts ?\r\n', 11),
(4, 'Correct HTML tag for the largest heading is?\r\n', 16),
(5, 'The attribute of <form> tag?\r\n', 19),
(6, 'Markup tags tell the web browser?', 22),
(7, 'www is based on which model?', 26),
(8, 'What are Empty elements and is it valid?', 30),
(9, 'Which of the following attributes of text box control allow to limit the maximum character?', 35),
(10, 'Web pages starts with which ofthe following tag?', 39);

-- --------------------------------------------------------

--
-- Table structure for table `scoretable`
--

CREATE TABLE `scoretable` (
  `email` varchar(255) NOT NULL,
  `scor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--


/*INSERT INTO `users` (`email`, `password`, `status`, `id`) VALUES*/
/*('asha@gmail.com', 'saha', 1, 23);*/

--
-- Indexes for dumped tables
--

--
-- Indexes for table `html_options`
--
ALTER TABLE `html_options`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `html_questions`
--
ALTER TABLE `html_questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
