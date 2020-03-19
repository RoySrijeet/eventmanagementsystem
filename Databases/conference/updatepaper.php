<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="conference";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$p_id = $_POST["p_id"];
$title = $_POST["title"];
$contact_author = $_POST["contact_author"];
$author = $_POST["author"];
$efile = $_POST["e-file"];
$abstract = $_POST["abstract"];
$date_of_submission = $_POST["date_of_submission"];

$sql = "SELECT * FROM paper WHERE p_id = '$p_id'";
$result = $conn->query($sql);

if($result->num_rows>0){

	if(!empty($_POST["title"])){
		$sql_1 = "UPDATE paper SET title = '$title' WHERE p_id = '$p_id'";
		if($conn->query($sql_1)===TRUE){
			echo "updated title";
		}
		else{
			echo "title not updated".$conn->error;
		}
	}
	if(!empty($_POST["e-file"])){
		$sql_1 = "UPDATE paper SET efile = '$efile' WHERE p_id = '$p_id'";
		if($conn->query($sql_1)===TRUE){
			echo "updated efile";
		}
		else{
			echo "efile not updated".$conn->error;
		}
	}
	if(!empty($_POST["abstract"])){
		$sql_1 = "UPDATE paper SET abstract = '$abstract' WHERE p_id = '$p_id'";
		if($conn->query($sql_1)===TRUE){
			echo "abstract updated";
		}
		else{
			echo "abstract not updated".$conn->error;
		}
	}
	if(!empty($_POST["contact_author"]))
	{
		$sql_2 = "SELECT * FROM author WHERE author_id = '$contact_author'";
		$result = $conn->query($sql_2);
		if($result->num_rows > 0){

			$sql_1 = "UPDATE paper SET contact_author = '$contact_author' WHERE p_id = '$p_id'";
			if($conn->query($sql_1)===TRUE){
				echo "contact_author updated";

				$sql_3 = "UPDATE writes SET author_id = '$contact_author' WHERE p_id = '$p_id' AND contact = 1";
				if($conn->query($sql_3)===TRUE){
					echo "updated contact_author in writes table";
				}
				else{
					echo "not updated contact_author in writes".$conn->error;
				}

			}
			else{
				echo "contact_author not updated".$conn->error;
			}
		}
		else{
			echo "author not registered. please enter your details in the form (available in 5 seconds)";
			header("refresh:5; url = author_insert.html");
		}
	}

	if(!empty($_POST["author"])){
		$sql_2 = "SELECT * FROM author WHERE author_id = '$author'";
		$result = $conn->query($sql_2);
		if($result->num_rows > 0){
				$sql_3 = "UPDATE writes SET author_id = '$author' WHERE p_id = '$p_id' AND contact = 0";
				if($conn->query($sql_3)===TRUE){
					echo "updated author in writes table";
				}
				else{
					echo "not updated author in writes".$conn->error;
				}
		}
		else{
			echo "author not registered. please enter your details in the form (available in 5 seconds)";
			header("refresh:5; url = author_insert.html");
		}
	}
	if(!empty($_POST["date_of_submission"]))
	{
		$sql_3 =  "UPDATE paper SET date_of_submission = '$date_of_submission' WHERE date_of_submission = '$date_of_submission'";
		if($conn->query($sql_3)===TRUE)
		{
			echo "updated date of date_of_submission in papers table";
		}
		else
		{
			echo "not updated date of date_of_submission in papers table".$conn->error;
		}
		
	}

	header("Location: paper_update.html");
}
else
{
	echo "Paper_id does not exists";
	header("refresh:2; url=paper_update.html");
}


$conn->close();

?>
