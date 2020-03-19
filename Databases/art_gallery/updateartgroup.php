<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$artgroup_id =$_POST["artgroup_id"];
$name =$_POST["name"];
$description =$_POST["description"];

$sql_1="SELECT * FROM artgroup WHERE artgroup_id= '$artgroup_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['name']))
	{
		$sql = "UPDATE artgroup 
			SET name='$name'
			WHERE artgroup_id ='$artgroup_id' ";
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
	if(!empty($_POST['description']))
	{
		$sql = "UPDATE artgroup 
			SET description= '$description'
			WHERE artgroup_id ='$artgroup_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " description Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "description Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "description Updation not required";
	}
	
}
else
{
	echo "artgroup does not exists."
}


$conn->close();
?>