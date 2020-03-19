<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Login (
username VARCHAR(50) NOT NULL PRIMARY KEY,
password VARCHAR(30) NOT NULL,
status BOOLEAN NOT NULL,
login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>