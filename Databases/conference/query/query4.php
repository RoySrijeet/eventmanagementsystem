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
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT r.reviewer_id,r.name,r.email,r.affiliation,r.phone,t.topic_id,t.name,t.description
		FROM reviewer r,expertize e,topic t
		WHERE r.reviewer_id=e.reviewer_id AND e.topic_id=t.topic_id";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Reviewer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Reviewer Email</th>
				<th scope='col'>Affiliation</th>
				<th scope='col'>Phone No.</th>
				<th scope='col'>Topic of Interest</th>
				<th scope='col'>Topic ID</th>		
				<th scope='col'>Description</th>		
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Reviewer ID</th><th>Reviewer Name</th><th>Reviewer email</th><th>Reviewer affiliation</th><th>Phone</th><th>Topic ID</th><th>Name</th><th>Description</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["reviewer_id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["affiliation"]."</td><td>".$row["phone"]."</td><td>".$row["topic_id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";

		echo "<tr>
    	 			<td>".$row["reviewer_id"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["email"]."</td>
    	 			<td>".$row["affiliation"]."</td>
    	 			<td>".$row["phone"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["topic_id"]."</td>
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

</body>
</html>