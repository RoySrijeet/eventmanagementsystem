<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}


$topic_id = $_POST["topic_id"];
$reviewer_id = $_POST["reviewer_id"];

$sql = "INSERT INTO expertize VALUES ('$topic_id', '$reviewer_id')";

if($conn->query($sql)){
	echo "Inserted";
	header("refresh:5; url=add_topic.html");
}
else{
	echo "Not inserted".$conn->error;	
}

$conn->close();

?>