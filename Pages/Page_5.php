<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
		echo "You are logged in as $username";
	}
	
	$con = connectServer();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Current Booking</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
<?php createToolbar(); ?>
	<h1>CURRENT BOOKING</h1>
<?php
	$result = mysqli_query($con,"select * from booking join ticket on booking.ticket_id=ticket.ticket_id join event on event.event_id=ticket.ticket_id join venue on venue.venue_id=event.venue_id where booking.user_Id=3");
	
	while ($row = mysqli_fetch_array($result)) {
		createEvent($row);
	}
?>
	</body>
</html>