<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$title = $_POST["title"];
$contact_author = $_POST["contact_author"];
$author = $_POST["author"];
$efile = $_POST["e-file"];
$abstract = $_POST["abstract"];
$date_of_submission = $_POST["date_of_submission"];

$sql_5="SELECT * FROM paper WHERE title= '$title'";

$result5=$conn->query($sql_5);


if ($result5->num_rows==0)
{
	$sql_3 = "SELECT * FROM author WHERE author_id = '$contact_author'";

	$result=$conn->query($sql_3);

	if($result->num_rows>0)
	{
		$sql = "INSERT INTO paper(title,abstract,efile,contact_author, date_of_submission) VALUES('$title', '$abstract', '$efile', '$contact_author', '$date_of_submission')";
		if($conn->query($sql)===TRUE){
			$last_id = $conn->insert_id;
			echo "inserted";
			$sql_1 = "INSERT INTO writes VALUES('$contact_author','$last_id',1)";
			if($conn->query($sql_1)===TRUE){
				echo "inserted contact_author into writes table";
			}
			else
			{
				echo "not inserted contact_author into writes".$conn->error;
			}


			if(!empty($_POST["author"]))
			{
				$sql_4 = "SELECT * FROM author WHERE author_id = '$author'";

				$result2=$conn->query($sql_4);

				if($result2->num_rows>0)
				{

					$sql_2 = "INSERT INTO writes VALUES('$author','$last_id',0)";
					if($conn->query($sql_2)===TRUE)
					{
					echo "inserted contact_author into writes table";
					}
					else
					{
						echo "not inserted contact_author into writes".$conn->error;
					}
				}
				
			}
		}

		else{
			echo "paper not inserted".$conn->error;
		}
	}
	else
	{
		echo "Author not registered.Please enter your details in the form(Available in 5 seconds).";
		//header("refresh:5; url = author_insert.html");
	}
}
else
{
	echo "Title already exists.";
	header("refresh:5; url=paper_insert.html");
}





header("Location: paper_insert.html");

$conn->close();

?>
