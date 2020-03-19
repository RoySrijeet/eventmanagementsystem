<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname= "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$first_name =$_POST["firstname"];
$last_name =$_POST["lastname"];
$username =$_POST["username"];
$pw =$_POST["pw"];
$password =$_POST["confirm_pw"];


if($pw!=$password)
{
	echo "Password mismatch with confirm password.";
	header("refresh:2; url=register.html");
}
else
{
	$sql = "INSERT INTO registration(first_name,last_name,username,password,reg_time) VALUES ('$first_name', '$last_name',  '$username', '$password', DEFAULT)";

	if($conn->query($sql)===TRUE)
	{
		echo "Please login to continue";
		header("refresh:5; url=login.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();


?>