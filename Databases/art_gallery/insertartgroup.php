<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$name =$_POST["name"];
$description =$_POST["description"];

$sql_1="SELECT * FROM artgroup WHERE name= '$name'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Name already exists";
}

else
{
	
	$sql = "INSERT INTO artgroup(name,description) VALUES ( '$name', '$description')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertartgroup.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>