<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$topic_id =$_POST["topic_id"];
$name =$_POST["name"];
$description =$_POST["description"];

$sql_1="SELECT * FROM topic WHERE topic_id= '$topic_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	

	if(!empty($_POST['name']))
	{
		$sql = "UPDATE topic
			SET name='$name'
			WHERE topic_id ='$topic_id' ";
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
	if(!empty($_POST['description']))
	{
		$sql = "UPDATE topic
			SET description= '$description'
			WHERE topic_id ='$topic_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " description Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo " description Updation failed". $conn->error;
			}
			
	}

}
else
{
	echo "topic does not exists."
}





$conn->close();
?>