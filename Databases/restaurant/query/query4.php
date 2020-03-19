<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query4_styles.css">
</head><body>
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

$sql = "SELECT f.food_id,s.food_name,s.price,f.description
		FROM food f,stock s
		WHERE f.food_id=s.food_id";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Food ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Price</th>
				<th scope='col'>Description</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Food ID</th><th>Food Name</th><th>Price</th><th>description</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["food_id"]."</td><td>".$row["food_name"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td></tr>";

		 echo "<tr>
    	 			<td>".$row["food_id"]."</td>
    	 			<td>".$row["food_name"]."</td>
    	 			<td>".$row["price"]."</td>
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