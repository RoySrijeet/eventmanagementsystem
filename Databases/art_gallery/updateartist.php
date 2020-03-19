<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$artist_id =$_POST["artist_id"];
$name =$_POST["name"];
$birthplace =$_POST["birthplace"];
$dob =$_POST["dob"];
$style =$_POST["style"];

$sql_1="SELECT * FROM artist WHERE artist_id= '$artist_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['name']))
	{
		$sql = "UPDATE artist
			SET name='$name'
			WHERE artist_id ='$artist_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " name Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "name Updation not required";
	}
	if(!empty($_POST['birthplace']))
	{
		$sql = "UPDATE artist 
			SET birthplace= '$birthplace'
			WHERE artist_id ='$artist_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " birthplace Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "birthplace Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "birthplace Updation not required";
	}
	if(!empty($_POST['dob']))
	{
		$sql = "UPDATE artist 
			SET dob= '$dob'
			WHERE artist_id ='$artist_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " dob Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "dob Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "dob Updation not required";
	}
	if(!empty($_POST['style']))
	{
		$sql = "UPDATE artist 
			SET style= '$style'
			WHERE artist_id ='$artist_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " style Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "style Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "style Updation not required";
	}	
}
else
{
	echo "artist does not exists."
}


$conn->close();
?>