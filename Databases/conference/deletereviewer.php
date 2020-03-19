<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$reviewer_id =$_POST["reviewer_id"];

$sql_1="SELECT * FROM reviewer WHERE reviewer_id= '$reviewer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM reviewer WHERE reviewer_id='$reviewer_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " reviewer deleted";
		header("Location:reviewer_delete.html");
	}
	else
	{
		echo " reviewer deletion failed". $conn->error;
	}
}
else
{
	echo "reviewer does not exists.";
	header("refresh:5; url=reviewer_delete.html");
}



$conn->close();


?>