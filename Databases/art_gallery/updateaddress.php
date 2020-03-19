<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$cid =$_POST["cid"];
$house_no =$_POST["house_no"];
$street =$_POST["street"];
$city =$_POST["city"];
$zip =$_POST["zip"];

$sql_1="SELECT * FROM address WHERE cid= '$cid'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['house_no']))
	{
		$sql = "UPDATE address
			SET house_no='$house_no'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " house_no Updated";
			}
			else
			{
				echo "house_no Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "house_no Updation not required";
	}
	if(!empty($_POST['street']))
	{
		$sql = "UPDATE address
			SET street= '$street'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " street Updated";
			}
			else
			{
				echo "street Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "street Updation not required";
	}
	if(!empty($_POST['city']))
	{
		$sql = "UPDATE address
			SET city ='$city'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " city Updated";
			}
			else
			{
				echo "city Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "city Updation not required";
	}
	if(!empty($_POST['zip']))
	{
		$sql = "UPDATE address
			SET zip ='$zip'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " zip Updated";
			}
			else
			{
				echo "zip Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "zip Updation not required";
	}
	
}
else
{
	echo "address does not exists."
}

header("refresh:5; url=updatecustomer.html");

$conn->close();
?>