<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$artwork_id =$_POST["artwork_id"];

$sql_1="SELECT * FROM artwork WHERE artwork_id= '$artwork_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM artwork WHERE artwork_id='$artwork_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " artwork deleted";
		header("Location:deleteartwork.html");
	}
	else
	{
		echo " artwork deletion failed". $conn->error;
	}
}
else
{
	echo "artwork does not exists.";
}



$conn->close();


?>