<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/query1_styles.css">
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

$sql = "SELECT p.p_id,p.title,r.reviewer_id,r.name,r.submission_date
		FROM paper p, score s, reviewer r
		WHERE p.p_id=s.paper_id AND s.reviewer_id=r.reviewer_id
		ORDER BY r.name";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Paper ID</th>
				<th scope='col'>Title</th>
				<th scope='col'>Reviewer ID</th>
				<th scope='col'>Reviewer Name</th>
				<th scope='col'>Date of Submission</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Paper ID</th><th>Title</th><th>Reviewer ID</th><th>REviewer Name</th><th>submission date</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["p_id"]."</td><td>".$row["title"]."</td><td>".$row["reviewer_id"]."</td><td>".$row["name"]."</td><td>".$row["submission_date"]."</td></tr>";

    	 echo "<tr>
    	 			<td>".$row["p_id"]."</td>
    	 			<td>".$row["title"]."</td>
    	 			<td>".$row["reviewer_id"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["submission_date"]."</td>
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