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
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT p.p_id,p.title,p.abstract,p.efile,p.date_of_submission,a.author_id,a.email,a.name,a.city,a.phone_number
		FROM paper p,author a
		WHERE p.contact_author=a.author_id";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Paper ID</th>
				<th scope='col'>Title</th>
				<th scope='col'>E-file</th>
				<th scope='col'>Date of Submission</th>
				<th scope='col'>Author ID</th>
				<th scope='col'>Author Email</th>
				<th scope='col'>Author Name</th>
				<th scope='col'>City</th>
				<th scope='col'>Phone no.</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Paper ID</th><th>Title</th><th>Abstract</th><th>Efile</th><th>date_of_submission</th><th>author ID</th><th>author email</th><th>author name</th><th>author city</th><th>author phone no.</th></tr>";
	// // Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["p_id"]."</td><td>".$row["title"]."</td><td>".$row["abstract"]."</td><td>".$row["efile"]."</td><td>".$row["date_of_submission"]."</td><td>".$row["author_id"]."</td><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["city"]."</td><td>".$row["phone_number"]."</td></tr>";
		 echo "<tr>
    	 			<td>".$row["p_id"]."</td>
    	 			<td>".$row["title"]."</td>
    	 			<td>".$row["efile"]."</td>
    	 			<td>".$row["date_of_submission"]."</td>
    	 			<td>".$row["author_id"]."</td>
    	 			<td>".$row["email"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["city"]."</td>
    	 			<td>".$row["phone_number"]."</td>
    	 		</tr>";
	}
	// echo "</table>";
}
else {
    echo "0 results";
}

$conn->close();
echo "</tbody></table>";
?>

</body>
</html>