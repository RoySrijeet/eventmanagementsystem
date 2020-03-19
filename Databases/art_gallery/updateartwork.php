<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$artwork_id =$_POST["artwork_id"];
$title =$_POST["title"];
$artist =$_POST["artist"];
$year =$_POST["year"];
$type =$_POST["type"];
$price =$_POST["price"];

$sql_1="SELECT * FROM artwork WHERE artwork_id= '$artwork_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['title']))
	{
		$sql = "UPDATE artwork
			SET title='$title'
			WHERE artwork_id ='$artwork_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " title Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "title Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "title Updation not required";
	}
	if(!empty($_POST['artist']))
	{
		$sql = "UPDATE artwork 
			SET artist= '$artist'
			WHERE artwork_id ='$artwork_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "artist Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "artist Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "artist Updation not required";
	}
	if(!empty($_POST['year']))
	{
		$sql = "UPDATE artwork 
			SET year= '$year'
			WHERE artwork_id ='$artwork_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " year Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "year Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "year Updation not required";
	}
	if(!empty($_POST['type']))
	{
		$sql = "UPDATE artwork 
			SET type= '$type'
			WHERE artwork_id ='$artwork_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " type Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "type Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "type Updation not required";
	}
	if(!empty($_POST['price']))
	{
		$sql = "UPDATE artwork 
			SET price= '$price'
			WHERE artwork_id ='$artwork_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " price Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "price Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "price Updation not required";
	}	
}
else
{
	echo "artwork does not exists."
}


$conn->close();
?>