<?php
	
$servername = "localhost";
$username="root";
$password="";
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$sql = "SELECT * FROM score WHERE paper_id = 3";

if($conn->query($sql) === TRUE){
	$result = $conn->query($sql);
	// Process all rows
	while($row = mysql_fetch_array($result)) {
    	//echo $row['column_name']; // Print a single column data
    	echo print_r($row);       // Print the entire row data
	}
}

$conn->close();

?>