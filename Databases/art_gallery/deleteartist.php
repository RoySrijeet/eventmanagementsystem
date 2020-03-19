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

$sql_1="SELECT * FROM artist WHERE artist_id= '$artist_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM artist WHERE artist_id='$artist_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " artist deleted";
		header("Location:deleteartist.html");
	}
	else
	{
		echo " artist deletion failed". $conn->error;
	}
}
else
{
	echo "artist does not exists.";
}



$conn->close();


?>