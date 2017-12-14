<?php

	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
	echo "<p>You are logged in as $username</p>";
	}
	else {
		header("Location: index.php");
		exit;
	}
	
	$event_id = $_GET['event_id'];
	
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
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
			border:1px solid white;
			color:white;
		}
	</style>
</head>

<body>
<div>
	<div class="logo">
    <div class="transbox">
        <img src="http://www.stirlingalbionfc.co.uk/wp-content/uploads/2017/07/football-game.png" alt="Logo" height="150" width="150"/>
        <h1>Social Football</h1>
        <p>Arrange your next social match here!</p>
    </div>

    <div class="searchbar">
        <a href="search_page.php"><button>Search</button></a>
    </div>
</div>

<div class="user">
    <p>Hi User! | <a href="logout.php">Logout</a></p>
</div>
<div id="toolbarButtons">
    <div id="yourEventButton">
        <a href="event_page.php"><h5>YOUR EVENT</h5></a>
    </div>
    <div id="yourBookingButton">
        <a href="booking_page.php"><h5>YOUR BOOKING</h5></a>
    </div>
</div>

<div class="yourevents">
    <div>
        <a href="event_page.php"><h6 id="yevent">Your event</h6></a>
        <a href="createnewevent_page.php"><h6 id="createevent">|Create new event</h6></a>
        <a href="eventhistory_page.php"><h6 id="eventhis">|Event history</h6></a>
    </div>
	<br>
</div>
</div>
	<h1>PARTICIPANTS</h1>
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
