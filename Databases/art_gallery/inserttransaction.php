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
$artwork_id =$_POST["artwork_id"];
$date =$_POST["date"];
$payment_mode =$_POST["payment_mode"];

$sql_2="SELECT * FROM customer WHERE cid= '$cid'";

$result2=$conn->query($sql_2);
if ($result2->num_rows>0)
{
	$sql_3="SELECT price FROM artwork WHERE artwork_id= '$artwork_id'";

	$result3=$conn->query($sql_3);
	$row=$result3->fetch_array(MYSQLI_ASSOC);
	$amount=$row['price'];
	if ($result3->num_rows>0)
	{
		$sql_1="SELECT * FROM transaction WHERE cid= '$cid' AND artwork_id='$artwork_id";

		$result=$conn->query($sql_1);

		if ($result->num_rows>0)
		{
			echo "transaction exists already exists";
		}

		else
		{
			
			$sql = "INSERT INTO transaction(cid,artwork_id,amount,date,payment_mode) VALUES ( '$cid', '$artwork_id', '$amount', '$date', '$payment_mode')";
			

			if($conn->query($sql)===TRUE)
			{
				echo "Inserted";
				header("Location:inserttransaction.html");
			}
			else
			{
				echo " Not Inserted". $conn->error;
			}
		}

	}
	else
	{
		echo "artwork_id does not exists. Insert Artwork first.";
	}
}
else
{
	echo "cid does not exists. Insert customer first.";
	header("refresh:5; url=insertcustomer.html");
}





$conn->close();
?>