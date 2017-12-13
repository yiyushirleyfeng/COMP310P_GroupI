<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
		echo "You are logged in as $username";
	}
	else {
		echo "<script>document.location='login_page.php';</script>";
		exit;
	}
	
	$event_id = $_GET['event_id'];
	
	$con = connectServer();
	$query = "select * from ticket where event_id=$event_id and user_id is null";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$ticket_id = $row['ticket_id'];
	mysqli_query($con,"insert into booking (ticket_id, user_id) values ($ticket_id,$user_id)");
	mysqli_query($con,"update ticket set user_id=$user_id where ticket_id=$ticket_id");
	mysqli_query($con,"update event set tickets_available=tickets_available-1 where event_id=$event_id");
	mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<?php createToolbar(); ?>
<div>
	<h1>Your booking is successful</h1>
</div>

</body>
</html>