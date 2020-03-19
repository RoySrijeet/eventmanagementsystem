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
$name =$_POST["name"];
$phn =$_POST["phn"];
$amount_spent =$_POST["amount_spent"];

$sql_1="SELECT * FROM customer WHERE cid= '$cid'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['name']))
	{
		$sql = "UPDATE customer
			SET name='$name'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " Name Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo " Name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "Name Updation not required";
	}
	if(!empty($_POST['phn']))
	{
		$sql = "UPDATE customer
			SET phn= '$phn'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " phn Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo " phn Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "phn Updation not required";
	}
	if(!empty($_POST['amount_spent']))
	{
		$sql = "UPDATE customer
			SET amount_spent ='$amount_spent'
			WHERE cid ='$cid' ";
			if($conn->query($sql)===TRUE)
			{
				echo " amount_spent Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "amount_spent Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "amount_spent Updation not required";
	}
	
}
else
{
	echo "customer does not exists."
}

header("refresh:5; url=updatecustomer.html");


$conn->close();
?>