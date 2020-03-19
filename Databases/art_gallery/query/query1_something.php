<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
	
$servername = "localhost";
$username="root";
$password="";
$dbname="art_gallery";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT * 
		FROM artist
		ORDER BY dob";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table><tr><th>Artist ID</th><th>Name</th><th>Birthplace</th><th>DOB</th><th>Style</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 echo "<tr><td>".$row["artist_id"]."</td><td>".$row["name"]."</td><td>".$row["birthplace"]."</td><td>".$row["dob"]."</td><td>".$row["style"]."</td></tr>";
	}
	echo "</table>";
}
else {
    echo "0 results";
}

$conn->close();

?>