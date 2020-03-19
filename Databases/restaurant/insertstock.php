<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

//$cid =$_POST["cid"];
$food_name =$_POST["food_name"];
$food_type =$_POST["food_type"];
$price =$_POST["price"];

$sql_1="SELECT * FROM stock WHERE food_name= '$food_name'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Food already exists";
}

else
{
	
	$sql = "INSERT INTO stock(food_name,food_type,price) VALUES ( '$food_name', '$food_type','$price')";

	if($conn->query($sql)===TRUE)
	{

	
		$last_id=$conn->insert_id;
		$food_id= $last_id;
		if($food_type=="food")
		{
			echo "Inserted";
				header("refresh:5; url=insertfood.html");
		}
		else if($food_type=="beverage")
		{
			echo "Inserted";
				header("refresh:5; url=insertbeverage.html");
		}
			
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>