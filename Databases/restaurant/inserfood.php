<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$description=$_POST["description"];

$sql = "INSERT INTO stock(food_name,food_type,price) VALUES ( '$food_name', '$food_type','$price')";
if($conn->query($sql)===TRUE)
	{

	
		$last_id=$conn->insert_id;
		$food_id= $last_id;

		$sql2 = "INSERT INTO food(food_id) VALUES ( '$food_id')";
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

$conn->close();
?>