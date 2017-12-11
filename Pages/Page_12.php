<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
		echo "You are logged in as $username";
	}
	
	$event_id = $_GET['event_id'];
	
	$con = connectServer();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Participants for event</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style>
		table {
			float:left;
			margin:30px;
		}
		th, td {
			border:1px solid black;
		}
	</style>
</head>

<body>
<?php createToolbar(); ?>
	<h1>YOUR EVENT</h1>
<?php
	$query = "select * from event join venue on event.venue_id = venue.venue_id where event_id=$event_id";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	createEvent($row);
	$totalTickets = $row['number_of_tickets'];
?>
<?php
	$query = "select * from user join booking on user.user_id = booking.user_id join ticket on booking.ticket_id = ticket.ticket_id where event_id=$event_id";
	$result = mysqli_query($con, $query);
	
	echo "<table>";
		echo "<tr>";
		echo "<th>Number</th>";
		echo "<th>First Name</th>";
		echo "<th>Username</th>";
		echo "<th>Email</th>";
		echo "</tr>";
		$i=1;
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "</tr>";
		$i+=1;
	}
	echo "</table>";
		$i-=1;
	echo "<h3>You have $i participants out of $totalTickets</h3>";
	mysqli_close($con);
?>
</body>

</html>
