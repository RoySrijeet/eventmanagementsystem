<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query4_styles.css">
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
		    FROM customer 
		    ORDER BY amount_spent DESC LIMIT 3";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Phone No.</th>
				<th scope='col'>Amount Spent</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>CID</th><th>Name</th><th>Phone</th><th>amount_spent</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 echo "<tr>
    	 		<td>".$row["cid"]."</td>
    	 		<td>".$row["name"]."</td>
    	 		<td>".$row["phn"]."</td>
    	 		<td>".$row["amount_spent"]."</td>
    	 	</tr>";
	}
	// echo "</table>";
}
else {
    echo "0 results";
}
echo "</tbody></table>";
$conn->close();

?>