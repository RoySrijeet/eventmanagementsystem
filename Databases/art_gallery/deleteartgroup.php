<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$artgroup_id =$_POST["artgroup_id"];

$sql_1="SELECT * FROM artgroup WHERE artgroup_id= '$artgroup_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM artgroup WHERE artgroup_id='$artgroup_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " artgroup deleted";
		header("Location:deleteartgroup.html");
	}
	else
	{
		echo " artgroup deletion failed". $conn->error;
	}
}
else
{
	echo "artgroup does not exists.";
}



$conn->close();


?>