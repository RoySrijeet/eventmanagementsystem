<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$reviewer_id =$_POST["reviewer_id"];
$name =$_POST["name"];
$email =$_POST["email"];
$affiliation =$_POST["affiliation"];
$phone =$_POST["phone"];
$submission_date =$_POST["submission_date"];

$sql_1="SELECT * FROM reviewer WHERE reviewer_id= '$reviewer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['name']))
	{
		$sql = "UPDATE reviewer
			SET name='$name'
			WHERE reviewer_id ='$reviewer_id' ";
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
	if(!empty($_POST['email']))
	{
		$sql = "UPDATE reviewer
			SET email= '$email'
			WHERE reviewer_id ='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " Email Updated";
				//header("Location:author_update.html");
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
	if(!empty($_POST['affiliation']))
	{
		$sql = "UPDATE reviewer
			SET affiliation ='$affiliation'
			WHERE reviewer_id ='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " affiliation Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "affiliation Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "affiliation Updation not required";
	}
	if(!empty($_POST['phone']))
	{
		$sql = "UPDATE reviewer
			SET phone= '$phone'
			WHERE reviewer_id ='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " phone number Updated";
				//header("Location:author_update.html");
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
	if(!empty($_POST['submission_date']))
	{
		$sql = "UPDATE reviewer
			SET submission_date= '$submission_date'
			WHERE reviewer_id ='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " submission_date Updated";
			}
			else
			{
				echo "submission Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "submission_date Updation not required";
	}
	header("refresh:2; url=reviewer_update.html");
}
else
{
	echo "reviewer does not exists.";
	header("refresh:2; url=reviewer_update.html");
}




$conn->close();


?>