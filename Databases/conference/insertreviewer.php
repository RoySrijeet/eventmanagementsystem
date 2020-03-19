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
$affiliation =$_POST["affiliation"];
$phone =$_POST["phone"];
$submission_date =$_POST["submission_date"];

$sql_1="SELECT * FROM reviewer WHERE email= '$email'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Email already exists";
	header("refresh:5; url=reviewedr_insert.html");
}

else
{
	
	$sql = "INSERT INTO reviewer(email,affiliation,name,phone,submission_date) VALUES ('$email','$affiliation', '$name', '$phone', '$submission_date')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:add_topic.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>