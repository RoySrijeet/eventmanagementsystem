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
$cid =$_POST["cid"];
$artwork_id =$_POST["artwork_id"];
$date =$_POST["date"];
$payment_mode =$_POST["payment_mode"];

$sql_1="SELECT * FROM transaction WHERE trans_no= '$trans_no'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['cid']))
	{
		$sql = "UPDATE transaction
			SET cid='$cid'
			WHERE trans_no ='$trans_no' ";
			if($conn->query($sql)===TRUE)
			{
				echo " cid Updated";
				header("Location:updatetransaction.html");
			}
			else
			{
				echo "cid Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "cid Updation not required";
	}
	if(!empty($_POST['artwork_id']))
	{
		$sql = "UPDATE transaction 
			SET artwork_id= '$artwork_id'
			WHERE trans_no ='$trans_no' ";
			if($conn->query($sql)===TRUE)
			{
				echo "artwork_id Updated";
			}
			else
			{
				echo "artwork_id Updation failed". $conn->error;
			}

			$sql_5="SELECT price FROM artwork WHERE artwork_id= '$artwork_id'";
			$result5=$conn->query($sql_5);
			$row5=$result5->fetch_array(MYSQLI_ASSOC);
			$amount=$row['price'];
			$sql6 = "UPDATE transaction 
				SET amount= '$amount'
				WHERE trans_no ='$trans_no' ";
				if($conn->query($sql6)===TRUE)
				{
					echo "amount Updated";
					header("Location:updatetransaction.html");
				}
				else
				{
					echo "amount Updation failed". $conn->error;
				}
			
	}
	else
	{
		echo "artwork_id Updation not required";
	}
	if(!empty($_POST['date']))
	{
		$sql = "UPDATE transaction 
			SET date= '$date'
			WHERE trans_no ='$trans_no' ";
			if($conn->query($sql)===TRUE)
			{
				echo "date Updated";
				header("updatetransaction.html");
			}
			else
			{
				echo "date Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "date Updation not required";
	}
	if(!empty($_POST['payment_mode']))
	{
		$sql = "UPDATE transaction
			SET payment_mode= '$payment_mode'
			WHERE trans_no ='$trans_no' ";
			if($conn->query($sql)===TRUE)
			{
				echo "payment_mode Updated";
				header("Location:updatetransaction.html");
			}
			else
			{
				echo "payment_mode Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "payment_mode Updation not required";
	}	
}
else
{
	echo "transaction does not exists."
}


$conn->close();
?>