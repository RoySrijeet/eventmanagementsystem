<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$dp_name =$_POST["dp_name"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$phone =$_POST["phone"];
$area_code =$_POST["area_code"];
$rating =$_POST["rating"];
$salary =$_POST["salary"];


$sql_1 = "INSERT INTO delivery_person(dp_name, gender, dob, phone_no, area_code, rating, salary) VALUES('$dp_name', '$gender', '$dob', '$phone', '$area_code', 'rating', 'salary')";
if($conn->query($sql_1) === TRUE){
	echo "Inserted";
	header("refresh:5; url = insertdelivery_person.html");
}
else{
		echo "Not inserted". $conn->error;		
}

$conn->close();
?>