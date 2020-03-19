<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$paper_id =$_POST["paper_id"];
$reviewer_id =$_POST["reviewer_id"];

$sql_1="SELECT * FROM score WHERE paper_id= '$paper_id' AND reviewer_id='$reviewer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	

	$sql = "DELETE FROM score WHERE paper_id= '$paper_id' AND reviewer_id='$reviewer_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " score deleted";
		header("Location:score_delete.html");
	}
	else
	{
		echo " score deletion failed". $conn->error;
	}
}
else
{
	echo "score does not exists.";
	header("refresh:5; url=score_delete.html");
}



$conn->close();


?>