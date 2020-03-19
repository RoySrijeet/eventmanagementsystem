<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$name =$_POST["name"];
$description =$_POST["description"];

$sql_1="SELECT * FROM topic WHERE name= '$name'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Topic already exists";
	header("refresh:5; url=topic_insert.html");
}

else
{
	
	$sql = "INSERT INTO topic(name,description) VALUES ('$name', '$description')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:topic_insert.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>