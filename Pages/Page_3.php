<?php 

	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
	echo "You are logged in as $username";
	}
	
	$con = connectServer();
	$query = "select * from event join venue on event.venue_id=venue.venue_id where host_id=$user_id and curtime()>deadline_purchase";
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
			createEventHost($row);
		}
	?>
</body>

</html>