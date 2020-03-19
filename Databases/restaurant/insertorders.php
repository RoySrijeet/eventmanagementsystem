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
$order_type =$_POST["order_type"];



$sql = "INSERT INTO orders(cid,order_type) VALUES ( '$cid', '$order_type')";


if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	if($order_type=="dine_in")
	{
		echo "Please insert the table details in the next page(Available in 5 seconds)";
		header("refresh:5; url=insertdine_in.html");
	}
	if($order_type=="phone")
	{
		echo "Please insert the phone details in the next page(Available in 5 seconds)";
		header("refresh:5; url=insertphone.html");
	}
	if($order_type=="online")
	{
		echo "Please insert the app details in the next page(Available in 5 seconds)";
		header("refresh:5; url=insertonline.html");
	}
}
else
{
	echo " Not Inserted". $conn->error;
}



$conn->close();
?>