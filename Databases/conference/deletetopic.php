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

$sql_1="SELECT * FROM topic WHERE topic_id= '$topic_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	

	$sql = "DELETE FROM topic WHERE topic_id='$topic_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " Topic deleted";
		header("Location:topic_delete.html");
	}
	else
	{
		echo " topic deletion failed". $conn->error;
	}

}
else
{
	echo "topic does not exists.";
	header("refresh:5; url=topic_delete.html");
}



$conn->close();


?>