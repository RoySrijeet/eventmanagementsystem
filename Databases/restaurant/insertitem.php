<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$item_name =$_POST["item_name"];
$quantity =$_POST["quantity"];

$sql_4="SELECT price 
		FROM stock
		WHERE food_name='$item_name'";

$result=$conn->query($sql_4);
$row= mysqli_fetch_array($result);

$price_unit = $row["price"];
$total_price =$quantity*$price_unit;

$sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
$result = $conn->query($sql);
if(!empty($result))
	{

		$row = mysqli_fetch_array($result);
		$order_id = $row["order_id"];

		$sql2 = "INSERT INTO item(order_id,item_name,quantity,price_unit,total_price) VALUES ( '$order_id', '$item_name','$quantity','$price_unit','$total_price')";
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