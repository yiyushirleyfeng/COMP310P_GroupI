<?php 

	include 'createEvent.php';
	include 'createToolbar.php';

	$username = "root";
	$password = "root";
	$dbhost = "localhost";
	$db = "football_management";
	
	$con = mysqli_connect($dbhost,$username,$password,$db);
	$query = " select * from event join venue on venue.venue_id=event.venue_id join booking on event.event_id=booking.event_id where user_id = 1;";
	$result = mysqli_query($con,$query);
?>

<!doctype html>

<html>

<head>
	<title>Current Events</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<?php
		createToolbar();
		?>
	<div id="header">
		<h1>CURRENT EVENTS</h1>
	</div>
	<?php
		while ($row = mysqli_fetch_array($result)) {
			createEvent($row);
		}
	?>
</body>

</html>