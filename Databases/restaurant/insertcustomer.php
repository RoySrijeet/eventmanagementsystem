<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

//$cid =$_POST["cid"];
$name =$_POST["name"];
$ctype =$_POST["ctype"];
$phone =$_POST["phone"];
$dob =$_POST["dob"];

$sql_1="SELECT * FROM customer WHERE phone= '$phone'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Phone number already exists";
}

else
{
	
	$sql = "INSERT INTO customer(name,ctype,phone,dob) VALUES ( '$name', '$ctype','$phone', '$dob')";

	if($conn->query($sql)===TRUE)
	{

	
		$last_id=$conn->insert_id;
		$cid= $last_id;
		if($ctype=="premium")
		{
			$sql2 = "INSERT INTO premium_customer(cid) VALUES ( '$cid')";
			if($conn->query($sql2)===TRUE)
			{
				echo "Inserted";
				header("refresh:5; url=insertaddress.html");
			}
			else
			{
				echo "not inserted".$conn->error;
			}
		}
		else
		{
			echo "Inserted";
			header("Location:insertaddress.html");
		}
			
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>