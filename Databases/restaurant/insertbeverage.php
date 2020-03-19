<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$quantity_in_ml=$_POST["quantity_in_ml"];

$sql = "SELECT * FROM stock ORDER BY food_id DESC LIMIT 1";
$result = $conn->query($sql);
if(!empty($result))
	{

		$row = mysqli_fetch_array($result);
		$beverage_id = $row["food_id"];

		$sql2 = "INSERT INTO beverage VALUES ( '$beverage_id', '$quantity_in_ml')";
					if($conn->query($sql2)===TRUE)
					{
						echo "Inserted";
						header("refresh:5; url=insertstock.html");
					}
					else
					{
						echo "not inserted".$conn->error;
					}
	}

else
{
	echo "error stock".$conn->error;
}

$conn->close();
?>