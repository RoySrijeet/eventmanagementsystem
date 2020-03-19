<?php

$servername = "localhost";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}


$sql = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"';
$conn->query($sql);

$sql = "SET AUTOCOMMIT = 0";
$conn->query($sql);

$sql = "START TRANSACTION";
$conn->query($sql);

$sql = 'SET time_zone = "+00:00"';
$conn->query($sql);

$sql = "CREATE DATABASE IF NOT EXISTS 'restaurant'";
$conn->query($sql);

$sql = "USE DATABASE 'restaurant'";
$conn->query($sql);


// Structure of tables

$sql = "CREATE TABLE `address` (
  `cid` int(10) NOT NULL,
  `house_no` int(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `address` (`cid`, `house_no`, `street`, `city`, `zip`) VALUES
// (26, 100, 'some street', 'some city', 700016),
// (27, 16, 'Winterfell', 'Kolkata', 700081),
// (28, 5, 'Kings Road', 'Westeros', 476567),
// (29, 90, 'Bare Islands', 'Delhi', 647884),
// (30, 17, 'Dragonstone', 'Kolakata', 700090)";
// $conn->query($sql);


$sql = "CREATE TABLE `benefitted` (
  `premium_id` int(10) NOT NULL,
  `offer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


$sql = "CREATE TABLE `beverage` (
  `beverage_id` int(10) NOT NULL,
  `quantity_in_ml` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `beverage` (`beverage_id`, `quantity_in_ml`) VALUES
// (4, 10000),
// (6, 10000)";
// $conn->query($sql);



$sql = "CREATE TABLE `card` (
  `pid` int(10) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `card_no` int(25) NOT NULL,
  `cardholder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


$sql = "CREATE TABLE `customer` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `customer` (`cid`, `name`, `ctype`, `phone`, `dob`) VALUES
// (26, 'Lyanna Mormont', 'premium', '9073822913', '1999-01-08'),
// (27, 'Sansa Stark', 'general', '4567819657', '1992-06-15'),
// (28, 'Cersei Lannister', 'premium', '4756726557', '1972-01-03'),
// (29, 'Jorah Mormont', 'general', '5764785764', '1960-02-01'),
// (30, 'Daenerys Targaryen', 'premium', '2847563785', '1980-03-09')";
// $conn->query($sql);


$sql = "CREATE TABLE `delivery` (
  `cid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


$sql = "CREATE TABLE `delivery_person` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `dp_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(10) NOT NULL,
  `area_code` int(10) NOT NULL,
  `rating` double NOT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


$sql = "CREATE TABLE `dine_in` (
  `order_id` int(10) NOT NULL,
  `table_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);

// $sql = "INSERT INTO `dine_in` (`order_id`, `table_no`) VALUES
// (3, 0),
// (3, 5)";
// $conn->query($sql);


$sql = "CREATE TABLE `food` (
  `food_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);

// $sql = "INSERT INTO `food` (`food_id`, `description`) VALUES
// (3, 'Palak paneer desc'),
// (5, 'drums of heaven desc'),
// (7, 'beef steak desc')";
// $conn->query($sql);


$sql = "CREATE TABLE `item` (
  `order_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price_unit` int(10) NOT NULL,
  `total_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `item` (`order_id`, `item_name`, `quantity`, `price_unit`, `total_price`) VALUES
// (3, 'Palak Paneer', 2, 150, 300),
// (3, 'Virgin mojito', 1, 110, 110),
// (4, 'Drums of Heaven', 3, 250, 750),
// (4, 'Fresh lime Soda', 4, 90, 360),
// (5, 'Beef Steak', 2, 350, 700),
// (5, 'Fresh lime Soda', 2, 90, 180),
// (6, 'Palak Paneer', 4, 150, 600)";
// $conn->query($sql);


$sql = "CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `login` (`username`, `password`, `status`, `login_time`) VALUES
// ('jonsnow', 'jonsnow', 1, '2020-01-01 23:03:01')";
// $conn->query($sql);

$sql = "CREATE TABLE `offer` (
  `offer_id` int(10) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(100) NOT NULL,
  `amount` int(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `offer` (`offer_id`, `offer_name`, `amount`, `description`) VALUES
// (1, 'Diwali', 100, 'Diwali Offer'),
// (2, 'Christmas', 500, 'Christmas description'),
// (3, 'New Year', 200, 'New year description'),
// (4, 'Durga Puja', 1000, 'Durga Pujo description'),
// (5, 'Holi', 300, 'Holi description')";
// $conn->query($sql);


$sql = "CREATE TABLE `online` (
  `order_id` int(10) NOT NULL,
  `app` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `online` (`order_id`, `app`) VALUES
// (5, 'zomato')";
// $conn->query($sql);


$sql = "CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `orders` (`order_id`, `cid`, `order_type`, `date`, `time`) VALUES
// (3, 27, 'dine_in', '2020-01-02', '13:08:03'),
// (4, 26, 'phone', '2020-01-02', '13:25:49'),
// (5, 30, 'online', '2020-01-02', '13:30:17'),
// (6, 29, 'phone', '2020-01-02', '13:31:54')";
// $conn->query($sql);


$sql = "CREATE TABLE `payment` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `mode` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `cid` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `payment` (`pid`, `mode`, `amount`, `cid`, `date`, `time`) VALUES
// (13, 'cash', 0, 26, '2020-01-02', '13:44:51')";
// $conn->query($sql);


$sql = "CREATE TABLE `phone` (
  `order_id` int(10) NOT NULL,
  `phone_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `phone` (`order_id`, `phone_no`) VALUES
// (4, '2147483647'),
// (6, '9073822913')";
// $conn->query($sql);


$sql = "CREATE TABLE `premium_customer` (
  `cid` int(11) NOT NULL,
  `premium_id` int(11) NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `premium_customer` (`cid`, `premium_id`) VALUES
// (26, 13),
// (28, 14),
// (30, 15)";
// $conn->query($sql);

$sql = "CREATE TABLE `registration` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `registration` (`first_name`, `last_name`, `username`, `password`, `reg_time`) VALUES
// ('Jon', 'Snow', 'jonsnow', 'jonsnow', '2020-01-01 23:02:51')";
// $conn->query($sql);


$sql = "CREATE TABLE `stock` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) NOT NULL,
  `food_type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// $sql = "INSERT INTO `stock` (`food_id`, `food_name`, `food_type`, `price`) VALUES
// (3, 'Palak Paneer', 'food', 150),
// (4, 'Virgin mojito', 'beverage', 110),
// (5, 'Drums of Heaven', 'food', 250),
// (6, 'Fresh lime Soda', 'beverage', 90),
// (7, 'Beef Steak', 'food', 350)";
// $conn->query($sql);


$sql = "CREATE TABLE `upi` (
  `pid` int(10) NOT NULL,
  `app` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$conn->query($sql);


// -- Indexes for tables


$sql = "ALTER TABLE `address`
  ADD PRIMARY KEY (`cid`)";
$conn->query($sql);

$sql = "ALTER TABLE `benefitted`
  ADD PRIMARY KEY (`premium_id`,`offer_id`),
  ADD KEY `offer_id` (`offer_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `beverage`
  ADD UNIQUE KEY `beverage_id` (`beverage_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `card`
  ADD PRIMARY KEY (`pid`)";
$conn->query($sql);

$sql = "ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`)";
$conn->query($sql);

$sql = "ALTER TABLE `delivery`
  ADD KEY `cid` (`cid`),
  ADD KEY `did` (`did`),
  ADD KEY `order_id` (`order_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `delivery_person`
  ADD PRIMARY KEY (`did`)";
$conn->query($sql);

$sql = "ALTER TABLE `dine_in`
  ADD KEY `order_id` (`order_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `food`
  ADD UNIQUE KEY `food_id` (`food_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `item`
  ADD KEY `order_id` (`order_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`login_time`)";
$conn->query($sql);

$sql = "ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `online`
  ADD KEY `order_id` (`order_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cid` (`cid`)";
$conn->query($sql);

$sql = "ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`)";
$conn->query($sql);

$sql = "ALTER TABLE `phone`
  ADD KEY `order_id` (`order_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `premium_customer`
  ADD PRIMARY KEY (`premium_id`),
  ADD UNIQUE KEY `cid` (`cid`)";
$conn->query($sql);

$sql = "ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`)";
$conn->query($sql);

$sql = "ALTER TABLE `stock`
  ADD PRIMARY KEY (`food_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `upi`
  ADD PRIMARY KEY (`pid`)";
$conn->query($sql);




// -- Constraints for tables

$sql = "ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `benefitted`
  ADD CONSTRAINT `benefitted_ibfk_1` FOREIGN KEY (`premium_id`) REFERENCES `premium_customer` (`premium_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `benefitted_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `beverage`
  ADD CONSTRAINT `beverage_ibfk_1` FOREIGN KEY (`beverage_id`) REFERENCES `stock` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `payment` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`did`) REFERENCES `delivery_person` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `dine_in`
  ADD CONSTRAINT `dine_in_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `stock` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `premium_customer`
  ADD CONSTRAINT `premium_customer_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "ALTER TABLE `upi`
  ADD CONSTRAINT `upi_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `payment` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE";
$conn->query($sql);

$sql = "COMMIT";
$conn->query($sql);

$conn->close();

?>



