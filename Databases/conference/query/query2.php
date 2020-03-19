<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query2_styles.css">
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

$sql = "SELECT r.reviewer_id,r.name,r.submission_date,r.email,r.affiliation,s.paper_id,p.title
		FROM reviewer r,score s,paper p
		WHERE r.reviewer_id=s.reviewer_id AND p.p_id=s.paper_id
		ORDER BY r.reviewer_id";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Reviewer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Date of Submission</th>
				<th scope='col'>Reviewer Email</th>
				<th scope='col'>Affiliation</th>
				<th scope='col'>Paper ID</th>
				<th scope='col'>Title</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Reviewer_id</th><th>Name</th><th>Submission date</th><th>Email</th><th>affiliation</th><th>paper ID</th><th>title</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["reviewer_id"]."</td><td>".$row["name"]."</td><td>".$row["submission_date"]."</td><td>".$row["email"]."</td><td>".$row["affiliation"]."</td><td>".$row["paper_id"]."</td><td>".$row["title"]."</td></tr>";

    	 echo "<tr>
    	 			<td>".$row["reviewer_id"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["submission_date"]."</td>
    	 			<td>".$row["email"]."</td>
    	 			<td>".$row["affiliation"]."</td>
    	 			<td>".$row["paper_id"]."</td>
    	 			<td>".$row["title"]."</td>
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