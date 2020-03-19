<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$p_id =$_POST["p_id"];

$sql_1="SELECT * FROM paper WHERE p_id= '$p_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM paper WHERE p_id='$p_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " paper deleted";
		header("Location:paper_delete.html");
	}
	else
	{
		echo " paper deletion failed". $conn->error;
	}
}
else
{
	echo "paper does not exists.";
	header("refresh:5; url=paper_delete.html");
}


$conn->close();


?>