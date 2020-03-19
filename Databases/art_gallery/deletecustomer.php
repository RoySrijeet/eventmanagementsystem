<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$cid =$_POST["cid"];

$sql_1="SELECT * FROM customer WHERE cid= '$cid'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM customer WHERE cid='$cid' ";
	if($conn->query($sql)===TRUE)
	{
		echo " customer deleted";
		header("Location:deletecustomer.html");
	}
	else
	{
		echo " customer deletion failed". $conn->error;
	}
}
else
{
	echo "customer does not exists.";
}



$conn->close();


?>