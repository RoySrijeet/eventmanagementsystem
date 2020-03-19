<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$title =$_POST["title"];
$artist =$_POST["artist"];
$year =$_POST["year"];
$type =$_POST["type"];
$price =$_POST["price"];

$sql_2="SELECT artist_id FROM artist WHERE name= '$artist'";

$result2=$conn->query($sql_2);
if ($result2->num_rows>0)
{
	$row=$result2->fetch_array(MYSQLI_ASSOC);
	$artist_id=$row['artist_id'];

	$sql_3="SELECT artgroup_id FROM artgroup WHERE name= '$type'";
	$result3=$conn->query($sql_3);
	if ($result3->num_rows>0)
	{
		$row2=$result3->fetch_array(MYSQLI_ASSOC);
		$artgroup_id=$row2['artgroup_id'];
		$sql_1="SELECT * FROM artwork WHERE title= '$title'";

		$result=$conn->query($sql_1);

		if ($result->num_rows>0)
		{
			echo "Title already exists";
		}

		else
		{
			
			$sql = "INSERT INTO artwork(title,artist,year,type,price,artist_id,artgroup_id) VALUES ( '$title', '$artist', '$year', '$type', '$price', '$artist_id', '$artgroup_id')";
			

			if($conn->query($sql)===TRUE)
			{
				echo "Inserted";
				header("Location:insertartwork.html");
			}
			else
			{
				echo " Not Inserted". $conn->error;
			}
		}
	}
	else
	{
		echo "artgroup_id does not exists. Insert Artgroup first.";
		header("refresh:5; url=insertartgroup.html");
	}
}
else
{
	echo "artist_id does not exists. Insert Artist first.";
		header("refresh:5; url=insertartist.html");
}



$conn->close();
?>