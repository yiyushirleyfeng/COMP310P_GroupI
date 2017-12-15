<?php 

	//EVENT HOSTING PAGE

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
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	//Generating events to be hosted by the user in the future
	$query = "select * from event join venue on event.venue_id=venue.venue_id where host_id=$user_id and curdate()<=date";
?>

<!doctype html>

<html>

<head>
	<title>Your Events</title>
	<link rel="stylesheet" type="text/css" href="main.css">
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
	<div id="header">
		<h1>YOUR EVENTS</h1>
	</div>
	<?php
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			createEventHost($row);
		}
	?>
</body>

</html>