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
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of names and phone numbers of all customers sorted by amount spent by them.

$sql = "SELECT s.paper_id,p.title,p.contact_author,s.technical_merit,s.readability,s.originality,s.relevance,
	s.technical_merit+s.readability+s.originality+s.relevance AS total_score

	FROM score s,paper p
	WHERE s.paper_id=p.p_id
	ORDER BY total_score DESC LIMIT 3";
$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Paper ID</th>
				<th scope='col'>Title</th>
				<th scope='col'>Contact Author</th>
				<th scope='col'>Technical Merit</th>
				<th scope='col'>Readability</th>
				<th scope='col'>Originality</th>
				<th scope='col'>Relevance</th>
				<th scope='col'>Total Score</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Paper ID</th><th>Title</th><th>Countact Author ID</th><th>Technical merit</th><th>Readability</th><th>Originality</th><th>Relevance</th><th>Total score</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 // echo "<tr><td>".$row["paper_id"]."</td><td>".$row["title"]."</td><td>".$row["contact_author"]."</td><td>".$row["technical_merit"]."</td><td>".$row["readability"]."</td><td>".$row["originality"]."</td><td>".$row["relevance"]."</td><td>".$row["total_score"]."</td></tr>";

		echo "<tr>
    	 			<td>".$row["paper_id"]."</td>
    	 			<td>".$row["title"]."</td>
    	 			<td>".$row["contact_author"]."</td>
    	 			<td>".$row["technical_merit"]."</td>
    	 			<td>".$row["readability"]."</td>
    	 			<td>".$row["originality"]."</td>
    	 			<td>".$row["relevance"]."</td>
    	 			<td>".$row["total_score"]."</td>
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