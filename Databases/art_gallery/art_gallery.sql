-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 10:10 AM
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
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `cid` int(10) NOT NULL,
  `house_no` int(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`cid`, `house_no`, `street`, `city`, `zip`) VALUES
(1, 1, 'Stark Road', 'Winterfell', 100098),
(2, 12, 'The Wall', 'Nights Watch', 256451),
(3, 65, 'Dragonstone', 'Volantis', 675325),
(4, 3, 'Stag Strasse', 'Dungeon', 700081),
(5, 14, 'The Sea', 'The Iron ISland', 948865),
(6, 51, 'Reed Keep', 'Kings Landing', 788436),
(7, 16, 'House Mormont', 'Bear Islands', 600521),
(8, 23, 'Sunspear', 'Dorne', 499710),
(9, 18, 'Kings Road', 'Castle Black', 495474),
(10, 18, 'Kings Road', 'Castle Black', 495474);

-- --------------------------------------------------------

--
-- Table structure for table `artgroup`
--

CREATE TABLE `artgroup` (
  `artgroup_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artgroup`
--

INSERT INTO `artgroup` (`artgroup_id`, `name`, `description`) VALUES
(1, 'Symbolism', 'Symbolism description'),
(2, 'Potrait', 'Potrait description'),
(3, 'Traditional', 'Traditional description'),
(4, 'Surrealism', 'Surrealism description'),
(5, 'Sculpture', 'Sculpture description'),
(6, 'Impressionism', 'Impressionism description'),
(7, 'Painting', 'Painting description');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `name`, `birthplace`, `dob`, `style`) VALUES
(1, 'Pablo Picasso', 'Spain', '1881-10-25', 'Symbolism'),
(2, 'Vincent van Gogh', 'Netherlands', '1853-10-30', 'Imperssionism'),
(3, 'Leonardo da Vinci', 'Italy', '1452-04-15', 'Potrait'),
(4, 'Edvard Munch', 'Norway', '1863-12-12', 'Symbolism'),
(5, 'Gustav Kilmt', 'Austria', '1862-07-14', 'Symbolism'),
(6, 'Frida Kahlo', 'Mexico', '1907-07-06', 'Symbolism'),
(7, 'Michaelangelo', 'Italy', '1475-03-06', 'Sculpture'),
(8, 'Raphael ', 'Italy', '1483-04-06', 'Potrait'),
(9, 'Max Ernst', 'Germany', '1891-04-02', 'Surrealism'),
(10, 'Abonindranath Tagore', 'Kolkata', '1871-08-07', 'Traditional'),
(11, 'Jamini Roy', 'Bankura', '1925-06-15', 'Traditional');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `artwork_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(15) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `artgroup_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`artwork_id`, `title`, `artist`, `year`, `type`, `price`, `artist_id`, `artgroup_id`) VALUES
(2, 'Mona Lisa', 'Leonardo da Vinci', 1503, 'Potrait', 90000, 3, 2),
(3, 'The Starry Night', 'Vincent van Gogh', 1889, 'Impressionism', 50000, 2, 6),
(4, 'The Last Supper', 'Leonardo da Vinci', 1498, 'Painting', 80000, 3, 7),
(5, 'Transfiguration', 'Raphael', 1520, 'Painting', 12000, 8, 7),
(6, 'David', 'Michaelangelo', 1504, 'Sculpture', 150000, 7, 5),
(7, 'The Creation of Adam', 'Michaelangelo', 1512, 'Painting', 40000, 7, 7),
(8, 'The Two Fridas', 'Frida Kahlo', 1939, 'Potrait', 10000, 6, 2),
(9, 'Vampire', 'Edvard Munch', 1893, 'Painting', 15000, 4, 7),
(10, 'Irisef', 'Vincent van Gogh', 1889, 'Impressionism', 18000, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phn` varchar(15) NOT NULL,
  `amount_spent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `phn`, `amount_spent`) VALUES
(1, 'Jon Snow', '8463563890', 10000),
(2, 'Lord Commander', '7458919736', 12000),
(3, 'Daenerys Targaryen', '9876558341', 15600),
(4, 'Shireen Baratheon', '7895641076', 8000),
(5, 'Meera Reed', '2796068090', 7800),
(6, 'Cersei Lannister', '9876026548', 19800),
(7, 'Lyanna Mormont', '8961502451', 14700),
(8, 'Myrcella', '9736410663', 11300),
(9, 'Jamie Lannister', '9575537971', 25000),
(10, 'Tyrin Lannister', '8574362920', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `status`, `login_time`) VALUES
('jonsnow', 'jonsnow', 1, '2019-12-31 13:09:32.983844'),
('jonsnow', 'jonsnow', 1, '2020-01-01 19:00:29.796962'),
('srijeet', 'srijeet123', 0, '2020-01-02 09:03:10.476402');

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `preference_id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `artgroup_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`first_name`, `last_name`, `username`, `password`, `reg_time`) VALUES
('Jon', 'Snow', 'jonsnow', 'jonsnow', '2019-12-31 13:09:03.715406'),
('Sansa', 'Stark', 'sansastark', 'sansastark', '2020-01-01 19:01:01.994024'),
('Srijeet', 'Roy', 'srijeet', 'srijeet123', '2020-01-02 08:59:40.293087');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_no` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `artwork_id` int(10) NOT NULL,
  `amount` int(15) NOT NULL,
  `date` date NOT NULL,
  `payment_mode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_no`, `cid`, `artwork_id`, `amount`, `date`, `payment_mode`) VALUES
(1, 9, 10, 18000, '2018-10-05', 'Debit Card'),
(2, 8, 8, 10000, '2019-04-04', 'Credit Card'),
(3, 2, 5, 12000, '2019-07-06', 'Debit Card'),
(4, 5, 4, 80000, '2019-05-02', 'Cash'),
(5, 3, 6, 150000, '2019-01-08', 'Credit Card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `artgroup`
--
ALTER TABLE `artgroup`
  ADD PRIMARY KEY (`artgroup_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`artwork_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `artgroup_id` (`artgroup_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `phn` (`phn`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`login_time`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`preference_id`),
  ADD UNIQUE KEY `cid` (`cid`,`artgroup_id`),
  ADD KEY `artgroup_id` (`artgroup_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_no`),
  ADD UNIQUE KEY `cid` (`cid`,`artwork_id`),
  ADD KEY `artwork_id` (`artwork_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artgroup`
--
ALTER TABLE `artgroup`
  MODIFY `artgroup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `artwork_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preference`
--
ALTER TABLE `preference`
  MODIFY `preference_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artwork_ibfk_2` FOREIGN KEY (`artgroup_id`) REFERENCES `artgroup` (`artgroup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preference`
--
ALTER TABLE `preference`
  ADD CONSTRAINT `preference_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preference_ibfk_2` FOREIGN KEY (`artgroup_id`) REFERENCES `artgroup` (`artgroup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`artwork_id`) REFERENCES `artwork` (`artwork_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- // -- AUTO_INCREMENT for tables

-- $sql = "ALTER TABLE `address`
--   MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `artgroup`
--   MODIFY `artgroup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `artist`
--   MODIFY `artist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `artwork`
--   MODIFY `artwork_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `customer`
--   MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `preference`
--   MODIFY `preference_id` int(10) NOT NULL AUTO_INCREMENT";
-- $conn->query($sql);

-- $sql = "ALTER TABLE `transaction`
--   MODIFY `trans_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6";
-- $conn->query($sql);
