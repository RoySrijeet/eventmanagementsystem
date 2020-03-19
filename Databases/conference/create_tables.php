<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conference";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Author (
email VARCHAR(50) NOT NULL PRIMARY KEY,
author_id INTEGER(10) NOT NULL,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
city VARCHAR(30) NOT NULL,
country VARCHAR(30) NOT NULL,
phone_number INTEGER(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Author created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Paper (
p_id INTEGER(10) NOT NULL PRIMARY KEY,
title VARCHAR(200) NOT NULL,
abstract VARCHAR(1000) NOT NULL,
efile VARCHAR(2000) NOT NULL,
contact_author_email VARCHAR(50) NOT NULL,
FOREIGN KEY (contact_author_email) REFERENCES Author(email) ON DELETE CASCADE ON UPDATE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Paper created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Writes (
email VARCHAR(50) NOT NULL,
p_id INTEGER(10) NOT NULL,
PRIMARY KEY(email,p_id),
FOREIGN KEY (p_id) REFERENCES Paper(p_id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (email) REFERENCES Author(email) ON DELETE CASCADE ON UPDATE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Writes created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Reviewer (
email VARCHAR(50) NOT NULL PRIMARY KEY,
reviewer_id INTEGER(10) NOT NULL,
affiliation VARCHAR(50) NOT NULL,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
phone INTEGER(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Reviewer created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Reviews (
email VARCHAR(50) NOT NULL ,
p_id INTEGER(10) NOT NULL ,
PRIMARY KEY(email,p_id),
FOREIGN KEY (p_id) REFERENCES Paper(p_id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (email) REFERENCES Reviewer(email) ON DELETE CASCADE ON UPDATE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Reviews created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Topic (
name VARCHAR(200) NOT NULL,
description VARCHAR(1000) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Topic created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Score (
technical_merit INTEGER(10) NOT NULL,
readability INTEGER(10) NOT NULL,
originality INTEGER(10) NOT NULL,
relevance INTEGER(10) NOT NULL,
recommendation INTEGER(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Score created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>