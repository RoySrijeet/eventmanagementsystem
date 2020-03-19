-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 10:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `email` varchar(50) NOT NULL,
  `author_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`email`, `author_id`, `name`, `city`, `country`, `phone_number`) VALUES
('chetanbhagat@gmail.com', 6, 'Chetan Bhagat', 'Kolkata', 'India', '9876504321'),
('paulocoelho@gmail.com', 7, 'Paulo Coelho', 'Lisbon', 'Portugal', '4983227810'),
('amitavaghosh@gmail.com', 8, 'Amitava Ghosh', 'Kolkata', 'India', '8961502451'),
('chitrabanerjeedivakaruni@gmail.com', 9, 'Chitra Banerjee Divakaruni', 'Hoston', 'USA', '1164910284'),
('donaldknuth@gmail.com', 10, 'Donald Knuth', 'California', 'USA', '1894788250'),
('yannlecun@yahoo.in', 11, 'Yann LeCun', 'Munich', 'Germany', '4973467858'),
('danbrown@gmail.com', 12, 'Dan Brown', 'Boston', 'USA', '3846578465');

-- --------------------------------------------------------

--
-- Table structure for table `expertize`
--

CREATE TABLE `expertize` (
  `topic_id` int(10) NOT NULL,
  `reviewer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expertize`
--

INSERT INTO `expertize` (`topic_id`, `reviewer_id`) VALUES
(1, 5),
(2, 4),
(3, 2),
(4, 4),
(4, 5),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `status`, `login_time`) VALUES
('jonsnow', 'jonsnow', 1, '2020-01-01 19:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `p_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `abstract` varchar(1000) NOT NULL,
  `efile` varchar(2000) NOT NULL,
  `contact_author` int(10) NOT NULL,
  `date_of_submission` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`p_id`, `title`, `abstract`, `efile`, `contact_author`, `date_of_submission`) VALUES
(4, 'ML for kids', 'ML for kids abstract', 'ML for kids efile', 8, '2019-09-08'),
(5, 'LeNet', 'LeNet abstract', 'LeNet efile', 11, '2019-10-12'),
(6, 'Happy Life', 'Happy life abstract', 'Happy Life efile', 7, '2019-10-30'),
(7, 'Worst Paper Ever', 'Worst Paper Ever abstract', 'Worst Paper Ever efile', 6, '2019-09-13'),
(8, 'Intenet Of Things', 'Internet of Things abstract', 'Internet Of Things efile', 10, '2019-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`first_name`, `last_name`, `username`, `password`, `reg_time`) VALUES
('Jon', 'Snow', 'jonsnow', 'jonsnow', '2020-01-01 19:04:02.292742');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `email` varchar(50) NOT NULL,
  `reviewer_id` int(10) NOT NULL,
  `affiliation` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`email`, `reviewer_id`, `affiliation`, `name`, `phone`, `submission_date`) VALUES
('rabindranathtagore@gmail.com', 2, 'Viswa Bharati', 'Rabindranath Tagore', '', '2019-11-01'),
('issacnewton@gmail.com', 3, 'TU Munich', 'Issac Newton', '', '2019-11-15'),
('alberteinstein@yahoo.in', 4, 'ETH Zurich', 'Albert Einstein', '', '2019-11-10'),
('cormen@gmail.com', 5, 'MIT', 'Cormen', '', '2019-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `paper_id` int(10) NOT NULL,
  `reviewer_id` int(10) NOT NULL,
  `technical_merit` int(10) NOT NULL,
  `readability` int(10) NOT NULL,
  `originality` int(10) NOT NULL,
  `relevance` int(10) NOT NULL,
  `recommendation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`paper_id`, `reviewer_id`, `technical_merit`, `readability`, `originality`, `relevance`, `recommendation`) VALUES
(4, 4, 8, 10, 9, 7, 0),
(4, 5, 8, 9, 7, 6, 0),
(5, 2, 7, 8, 9, 5, 0),
(8, 4, 9, 9, 10, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `name`, `description`) VALUES
(1, 'Machine Learning', 'Machine Learning description'),
(2, 'Internet of Things', 'Internet of Things description'),
(3, 'Web Development', 'Web development description'),
(4, 'Algorithm', 'Algorithm description'),
(5, 'Wireless Network', 'Wireless Network description'),
(6, 'DBMS', 'dbms description');

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `author_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `contact` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writes`
--

INSERT INTO `writes` (`author_id`, `p_id`, `contact`) VALUES
(6, 7, 1),
(7, 6, 1),
(8, 4, 1),
(10, 8, 1),
(11, 5, 1),
(11, 8, 0),
(12, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `expertize`
--
ALTER TABLE `expertize`
  ADD PRIMARY KEY (`topic_id`,`reviewer_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`login_time`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `contact_author` (`contact_author`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`paper_id`,`reviewer_id`),
  ADD UNIQUE KEY `paper_id` (`paper_id`,`reviewer_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`author_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expertize`
--
ALTER TABLE `expertize`
  ADD CONSTRAINT `expertize_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expertize_ibfk_3` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`reviewer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `paper_ibfk_1` FOREIGN KEY (`contact_author`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_3` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_ibfk_4` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`reviewer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `writes_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `paper` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- <!-- // AUTO_INCREMENT for tables


-- $sql = "ALTER TABLE `author`
--   MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `paper`
--   MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `reviewer`
--   MODIFY `reviewer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `topic`
--   MODIFY `topic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7";
-- $conn->query($sql);
--  -->