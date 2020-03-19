<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query5_styles.css">
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

$sql = "SELECT offer_id,offer_name,amount,description
		FROM offer";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Offer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Amount</th>
				<th scope='col'>Description</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Offer ID</th><th>Offer Name</th><th>Amount</th><th>description</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["offer_id"]."</td><td>".$row["offer_name"]."</td><td>".$row["amount"]."</td><td>".$row["description"]."</td></tr>";


		 echo "<tr>
    	 			<td>".$row["offer_id"]."</td>
    	 			<td>".$row["offer_name"]."</td>
    	 			<td>".$row["amount"]."</td>
    	 			<td>".$row["description"]."</td>
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