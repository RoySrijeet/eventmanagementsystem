<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$pid =$_POST["pid"];
$mode =$_POST["mode"];

$sql="SELECT * FROM payment WHERE pid= '$pid'";

$result=$conn->query($sql);

if($result->num_rows > 0){
	if(!empty($_POST['mode']))
	{
		$sql = "UPDATE payment
			SET mode='$mode'
			WHERE pid ='$pid' ";
			if($conn->query($sql)===TRUE)
			{
				echo "Payment Mode Updated";
			}
			else
			{
				echo "Payment Mode Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "Payment Mode Updation not required";
	}
	
}
else
{
	echo "Payment ID does not exist."
}
// header("Location:updatepayment.html");
$conn->close();

?>