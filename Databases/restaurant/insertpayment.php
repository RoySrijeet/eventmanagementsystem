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
$mode =$_POST["mode"];

$sql_4="SELECT i.total_price 
		FROM item i,orders o
		WHERE i.order_id=o.order_id AND o.cid='$cid' ";

if($conn->query($sql_4) === TRUE){
	echo "true";
$result = $conn->query($sql_4);
$row = mysqli_fetch_array($result);

$amount =$row["total_price"];


$sql = "INSERT INTO payment(mode,amount,cid) VALUES ( '$mode', '$amount','$cid')";


if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	if($mode=="card")
	{
		echo "Please insert the card details in the next page(Available in 5 seconds)";
		header("refresh:5; url=insertcard.html");
	}
	if($mode=="upi")
	{
		echo "Please insert the upi details in the next page(Available in 5 seconds)";
		header("refresh:5; url=insertupi.html");
	}
}
else
{
	echo " Not Inserted". $conn->error;
}
}
else{
	echo "false";
}


$conn->close();
?>