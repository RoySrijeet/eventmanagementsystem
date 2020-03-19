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
$dbname="art_gallery";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 2: List of the available artwork sorted by artgroup.

$sql = "SELECT t.trans_no,t.amount,t.date,t.payment_mode,t.cid,c.name,c.phn,a.house_no,a.street,a.city,a.zip,t.artwork_id,aw.title,		aw.artist,aw.type
		FROM customer c,address a,artwork aw, transaction t
		WHERE c.cid=a.cid AND t.cid=c.cid AND t.artwork_id=aw.artwork_id AND t.date BETWEEN '2019-01-01' AND '2019-12-31'
		ORDER BY aw.artist";

$result = $conn->query($sql);
echo "<table>
			<caption>REPORT</caption>
			<thead>
			<tr>
				<th scope='col'>Transaction No.</th>
				<th scope='col'>Amount</th>
				<th scope='col'>Date</th>
				<th scope='col'>Payment Mode</th>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Phone</th>
				<th scope='col'>House No.</th>
				<th scope='col'>Street</th>
				<th scope='col'>City</th>
				<th scope='col'>ZIP</th>
				<th scope='col'>Artwork ID</th>
				<th scope='col'>Title</th>
				<th scope='col'>Artist</th>
				<th scope='col'>Type</th>
			</tr>
		</thead>
		<tbody>";
if($result->num_rows > 0){

	// echo "<table><tr><th>Transaction no.</th><th>Amount</th><th>date</th><th>payment_mode</th><th>Customer ID</th><th>Name</th><th>Phone</th><th>house_no</th><th>street</th><th>city</th><th>zip</th><th>Artwork ID</th><th>Title</th><th>Artist</th><th>Type</th></tr>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {
    	//echo $row['column_name']; 
    	// echo print_r($row);       
    	 echo "<tr>
    	 			<td>".$row["trans_no"]."</td>
    	 			<td>".$row["amount"]."</td>
    	 			<td>".$row["date"]."</td>
    	 			<td>".$row["payment_mode"]."</td>
    	 			<td>".$row["cid"]."</td>
    	 			<td>".$row["name"]."</td>
    	 			<td>".$row["phn"]."</td>
    	 			<td>".$row["house_no"]."</td>
    	 			<td>".$row["street"]."</td>
    	 			<td>".$row["city"]."</td>
    	 			<td>".$row["zip"]."</td>
    	 			<td>".$row["artwork_id"]."</td>
    	 			<td>".$row["title"]."</td>
    	 			<td>".$row["artist"]."</td>
    	 			<td>".$row["type"]."</td>
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