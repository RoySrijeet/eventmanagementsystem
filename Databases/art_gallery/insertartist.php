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
$birthplace =$_POST["birthplace"];
$dob =$_POST["dob"];
$style =$_POST["style"];


$sql_1="SELECT * FROM artist WHERE name= '$name'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Name already exists";
}

else
{
	
	$sql = "INSERT INTO artist(name,birthplace,dob,style) VALUES ( '$name', '$birthplace', '$dob', '$style')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertartist.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>