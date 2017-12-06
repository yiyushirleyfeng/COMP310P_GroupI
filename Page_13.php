<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
	echo "You are logged in as $username";
	}
	else {
		header("Location: Page_11.php");
		exit;
	}
	
	$con = connectServer();
	$query = "select * from booking join event on booking.event_id=event.event_id where booking.user_id=$user_id;";
	$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Events History</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<?php
			createToolbar();
		?>
		<h1>EVENT HISTORY</h1>
		<?php
			while ($row = mysqli_fetch_array($result)) {
				createEvent($row); ?>
				<?php
			}
		?>
	</body>
</html>