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
$technical_merit =$_POST["technical_merit"];
$readability =$_POST["readability"];
$originality =$_POST["originality"];
$relevance =$_POST["relevance"];
//$recommendation =$_POST["recommendation"];

if(!empty($_POST['recommendation']))
{
	$recommendation=1;
}
else
{
	$recommendation=0;
}

$sql_1="SELECT * 
		FROM score 
		WHERE paper_id= '$paper_id' AND reviewer_id='$reviewer_id' ";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	echo "Score already exists";
	header("refresh:5; url=score_insert.html");
}

else
{
	
	$sql = "INSERT INTO score(paper_id,reviewer_id,technical_merit,readability,originality,relevance,recommendation) VALUES ('$paper_id','$reviewer_id', '$technical_merit', '$readability', '$originality', '$relevance', '$recommendation')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:score_insert.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();
?>