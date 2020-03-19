<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$bank =$_POST["bank"];
$card_no =$_POST["card_no"];
$cardholder =$_POST["cardholder"];

$sql_5="SELECT * FROM payment";
if($conn->query($sql)===TRUE)
{
	$last_id = $conn->insert_id;
}

$sql = "INSERT INTO card(pid,bank,card_no,cardholder) VALUES ('$last_id' '$bank', '$card_no','$cardholder')";

if($conn->query($sql)===TRUE)
{
	echo "Inserted";
	header("refresh:5; url=insertpayment.html");
}
else
{
	echo " Not Inserted". $conn->error;
}



$conn->close();
?>