<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$trans_no =$_POST["trans_no"];

$sql_1="SELECT * FROM transaction WHERE trans_no= '$trans_no'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM transaction WHERE trans_no='$trans_no' ";
	if($conn->query($sql)===TRUE)
	{
		echo " transaction deleted";
		header("Location:deletetransaction.html");
	}
	else
	{
		echo " transaction deletion failed". $conn->error;
	}
}
else
{
	echo "transaction does not exists.";
}



$conn->close();


?>