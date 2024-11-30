<html>
<body>
<?php
		$conn = new mysqli("localhost","root","", "iwp");
		if($conn->connect_error)
		{
			die("Connection failed: ".$conn->connect_error);
		}
		$bid = $_POST["book_id"];
		$sql = "SELECT * from user_room_book";
		$result=mysqli_query($conn,$sql);
		while ($row=mysqli_fetch_row($result))
	   	{
			if($bid==$row[15])
			{
				$room = $row[3];
				$sql1 = "SELECT * FROM rooms_count WHERE room_type='$room'";
				$result1 = mysqli_query($conn,$sql1);
				$r = mysqli_fetch_row($result1);
				if($r[1]>0)
				{
					
					$sql2 = "UPDATE user_room_book SET status='Cancelled' WHERE book_id='$bid'";
					mysqli_query($conn, $sql2);
					$sql2 = "UPDATE booked_hist SET status='Cancelled' WHERE book_id='$bid'";
					mysqli_query($conn, $sql2);
					header("Location: cancel_room1.php");
				}
				
			}
		}
	?>
</body>
</html>