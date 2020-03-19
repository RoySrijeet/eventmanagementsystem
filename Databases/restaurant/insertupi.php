<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$app =$_POST["app"];

$sql_5="SELECT * FROM payment";
if($conn->query($sql)===TRUE)
{
	$last_id = $conn->insert_id;
}

$sql = "INSERT INTO upi(pid,app) VALUES ('$last_id' '$app')";

if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	header("refresh:5; url=insertpayment.html");
}
else
{
	echo " Not Inserted". $conn->error;
}



$conn->close();
?>