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
$dbname="art_gallery";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT c.cid,c.name,c.phn,a.house_no,a.street,a.city,a.zip 
		FROM customer c
		JOIN address a
		USING (cid)";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Phone</th>
				<th scope='col'>House No.</th>
				<th scope='col'>Street</th>
				<th scope='col'>City</th>
				<th scope='col'>ZIP</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>CID</th><th>Name</th><th>Phone</th><th>house_no</th><th>street</th><th>city</th><th>zip</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 echo "<tr>
    	 			<td>".$row["cid"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["phn"]."</td>
    	 			<td>".$row["house_no"]."</td>
    	 			<td>".$row["street"]."</td>
    	 			<td>".$row["city"]."</td>
    	 			<td>".$row["zip"]."</td>
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