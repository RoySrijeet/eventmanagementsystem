<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$offer_name =$_POST["offer_name"];
$amount =$_POST["amount"];
$description=$_POST["description"];

$sql = "INSERT INTO offer(offer_name,amount,description) VALUES ( '$offer_name', '$amount', '$description')";
	

if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	header("Location:insertoffer.html");
}
else
{
	echo " Not Inserted". $conn->error;
}

$conn->close();
?>