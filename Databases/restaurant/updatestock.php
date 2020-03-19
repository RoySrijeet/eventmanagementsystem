<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$food_id =$_POST["food_id"];
$food_name =$_POST["food_name"];
$price =$_POST["price"];

$sql="SELECT * FROM stock WHERE food_id= '$food_id'";

$result=$conn->query($sql);

if($result->num_rows > 0){
	if(!empty($_POST['food_name']))
	{
		$sql = "UPDATE stock
			SET food_name='$food_name'
			WHERE food_id ='$food_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "Food name Updated";
			}
			else
			{
				echo "Food name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "food name Updation not required";
	}
	if(!empty($_POST['price']))
	{
		$sql = "UPDATE stock 
			SET price = '$price'
			WHERE food_id ='$food_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " Price Updated";
			}
			else
			{
				echo "Price Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "Price Updation not required";
	}
	
}
else
{
	echo "food with given food_id does not exist."
}
// header("Location:updatestock.html");
$conn->close();

?>