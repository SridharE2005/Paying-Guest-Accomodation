<html>
<?php
	$conn = new mysqli("localhost","root","", "iwp");
	if($conn->connect_error)
	{
		die("Connection failed: ".$conn->connect_error);
	}
	$num = $_POST["noorooms"];
	$r = $_POST["room"];
	$sql = "UPDATE rooms_count SET available_rooms = available_rooms-$num WHERE room_type='$r'";
	if(mysqli_query($conn,$sql))
	{
		header("Location: admin_room_removed1.php");
	}
?>
</html>