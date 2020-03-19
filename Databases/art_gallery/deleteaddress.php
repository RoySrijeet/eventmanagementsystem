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

$sql_1="SELECT * FROM address WHERE cid= '$cid'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM address WHERE cid='$cid' ";
	if($conn->query($sql)===TRUE)
	{
		echo " address deleted";
		header("Location:deleteaddress.html");
	}
	else
	{
		echo " address deletion failed". $conn->error;
	}
}
else
{
	echo "address does not exists.";
}



$conn->close();


?>