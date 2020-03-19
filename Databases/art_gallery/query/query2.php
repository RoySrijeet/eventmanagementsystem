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
$dbname="art_gallery";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 2: List of the available artwork sorted by artgroup.

$sql = "SELECT * 
		FROM artwork
		ORDER BY type";

$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Artwork ID</th>
				<th scope='col'>Title</th>
				<th scope='col'>Artist</th>
				<th scope='col'>Year</th>
				<th scope='col'>Artgroup</th>
				<th scope='col'>Price</th>
				<th scope='col'>Artist ID</th>
				<th scope='col'>Artgroup ID</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Artwork ID</th><th>Title</th><th>Artist</th><th>Year</th><th>Artgroup</th><th>Price</th><th>Artist ID</th><th>Artgroup ID</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 echo "<tr>
    	 			<td>".$row["artwork_id"]."</td>
    	 			<td>".$row["title"]."</td>
    	 			<td>".$row["artist"]."</td>
    	 			<td>".$row["year"]."</td>
    	 			<td>".$row["type"]."</td>
    	 			<td>".$row["price"]."</td>
    	 			<td>".$row["artist_id"]."</td>
    	 			<td>".$row["artgroup_id"]."</td>
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