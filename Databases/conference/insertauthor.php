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
$email =$_POST["email"];
$city =$_POST["city"];
$country =$_POST["country"];
$phone_number =$_POST["phone"];

$sql_1="SELECT * FROM author WHERE email= '$email'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Email already exists";
	header("refresh:5; url=author_insert.html");
}

else
{
	
	$sql = "INSERT INTO author(email,name,city,country,phone_number) VALUES ('$email', '$name', '$city', '$country', '$phone_number')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:author_insert.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>