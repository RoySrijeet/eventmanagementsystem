<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "conference";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$p_id =$_POST["p_id"];
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

$sql_1="SELECT * FROM score WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	
	if(!empty($_POST['technical_merit']))
	{
		$sql = "UPDATE score
			SET technical_merit='$technical_merit'
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " technical_merit Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo " technical_merit Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "technical_merit Updation not required";
	}
	if(!empty($_POST['readability']))
	{
		$sql = "UPDATE score
			SET readability= '$readability'
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " readability Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo " readability Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "readability Updation not required";
	}
	if(!empty($_POST['originality']))
	{
		$sql = "UPDATE score
			SET originality ='$originality'
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " originality Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "originality Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "originality Updation not required";
	}
	if(!empty($_POST['relevance']))
	{
		$sql = "UPDATE score
			SET relevance= '$relevance'
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " relevance Updated";
				//header("Location:author_update.html");
			}
			else
			{
				echo "relevance Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "relevance Updation not required";
	}

	if(!empty($_POST['recommendation']))
	{
		$sql = "UPDATE score
			SET recommendation= 1;
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " recommendation Updated to 1";
				//header("Location:author_update.html");
			}
			else
			{
				echo "recommendation Updation failed". $conn->error;
			}
			
	}
	else
	{
		$sql = "UPDATE score
			SET recommendation= 0;
			WHERE p_id= '$p_id' AND reviewer_id='$reviewer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " recommendation Updated to 0";
				//header("Location:author_update.html");
			}
			else
			{
				echo "recommendation Updation failed". $conn->error;
			}
	}
}
else
{
	echo "score does not exists."
}



$conn->close();
?>