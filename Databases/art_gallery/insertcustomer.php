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
$phn =$_POST["phn"];
$amount_spent =$_POST["amount_spent"];

$sql_1="SELECT * FROM customer WHERE phn= '$phn'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Phone number already exists";
}

else
{
	
	$sql = "INSERT INTO customer(name,phn,amount_spent) VALUES ( '$name', '$phn','amount_spent')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertaddress.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>