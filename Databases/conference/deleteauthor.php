<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$author_id =$_POST["author_id"];

$sql_1="SELECT * FROM author WHERE author_id= '$author_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM author WHERE author_id='$author_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " Author deleted";
		header("Location:author_delete.html");
	}
	else
	{
		echo " Author deletion failed". $conn->error;
	}
}
else
{
	echo "Author does not exists.";
	header("refresh:5; url=author_delete.html");
}



$conn->close();


?>