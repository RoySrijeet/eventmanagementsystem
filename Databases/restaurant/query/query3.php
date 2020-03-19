<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query3_styles.css">
</head>
<body>
<?php
	
$servername = "localhost";
$username="root";
$password="";
$dbname="restaurant";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT c.cid,c.name,c.ctype,c.phone,a.house_no,a.street,a.city,a.zip
FROM customer c, address a
WHERE c.ctype='premium' AND c.cid=a.cid";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Type</th>
				<th scope='col'>Phone</th>
				<th scope='col'>House No</th>
				<th scope='col'>Street</th>
				<th scope='col'>City</th>
				<th scope='col'>ZIP</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["cid"]."</td><td>".$row["name"]."</td><td>".$row["ctype"]."</td><td>".$row["phone"]."</td><td>".$row["house_no"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["zip"]."</td></tr>";
		 echo "<tr>
    	 			<td>".$row["cid"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["ctype"]."</td>
    	 			<td>".$row["phone"]."</td>
    	 			<td>".$row["house_no"]."</td>
    	 			<td>".$row["street"]."</td>
    	 			<td>".$row["city"]."</td>
    	 			<td>".$row["zip"]."</td>
    	 		</tr>";

	}
	// echo "</table>";
}
else {
    // echo "0 results";
}
echo "</tbody></table>";
$conn->close();

?>