<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$cid =$_POST["cid"];
$house_no =$_POST["house_no"];
$street =$_POST["street"];
$city =$_POST["city"];
$zip =$_POST["zip"];

$sql = "INSERT INTO address(cid,house_no,street,city,zip) VALUES ( '$cid', '$house_no', '$street', '$city', '$zip')";
	

if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	header("Location:insertcustomer.html");
}
else
{
	echo " Not Inserted". $conn->error;
}

$conn->close();
?>