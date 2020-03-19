<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$author_id =$_POST["author_id"];
$name =$_POST["name"];
$email =$_POST["email"];
$city =$_POST["city"];
$country =$_POST["country"];
$phone_number =$_POST["phone"];

$sql_1="SELECT * FROM author WHERE author_id= '$author_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['name']))
	{
		$sql = "UPDATE author
			SET name='$name'
			WHERE author_id ='$author_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " Name Updated";
				
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
	if(!empty($_POST['email']))
	{
		$sql = "UPDATE author
			SET email= '$email'
			WHERE author_id ='$author_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " Email Updated";
				
			}
			else
			{
				echo " Email Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "Email Updation not required";
	}
	if(!empty($_POST['city']))
	{
		$sql = "UPDATE author
			SET city ='$city'
			WHERE author_id ='$author_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " City Updated";

			}
			else
			{
				echo "City Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "City Updation not required";
	}
	if(!empty($_POST['country']))
	{
		$sql = "UPDATE author
			SET country ='$country'
			WHERE author_id ='$author_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " country Updated";
				
			}
			else
			{
				echo " Country Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "country Updation not required";
	}
	if(!empty($_POST['phone']))
	{
		$sql = "UPDATE author
			SET phone_number= '$phone_number'
			WHERE author_id ='$author_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " phone number Updated";
			}
			else
			{
				echo "phone_number Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "phone_number Updation not required";
	}
	header("refresh:5; url=author_update.html");
}
else
{
	echo "Author does not exists."
	header("refresh:5; url=author_update.html");
}



$conn->close();


?>