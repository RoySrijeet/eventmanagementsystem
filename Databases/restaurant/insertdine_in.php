<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$table_no =$_POST["table_no"];

$sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
$result = $conn->query($sql);
if(!empty($result))
	{

		$row = mysqli_fetch_array($result);
		$order_id = $row["order_id"];

		$sql2 = "INSERT INTO dine_in VALUES ( '$order_id', '$table_no')";
					if($conn->query($sql2)===TRUE)
					{
						echo "Inserted";
						header("refresh:5; url=insertitem.html");
					}
					else
					{
						echo "not inserted".$conn->error;
					}
	}

else
{
	echo "error stock".$conn->error;
}



$conn->close();
?>