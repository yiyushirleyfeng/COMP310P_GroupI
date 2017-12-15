<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
		echo "<p>You are logged in as $username</p>";
	}
	else {
		header("Location: Page_11.php");
		exit;
	}
	
	$event_id = $_GET['event_id'];
	
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	//Generating all the tickets for the event that has not been booked yet
	$query = "select * from ticket where event_id=$event_id and user_id is null";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$ticket_id = $row['ticket_id'];
	//Booking one of the tickets that have not been booked
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
        <h6 id="yevent">Your event</h6>
        <h6 id="createevent">|Create new event</h6>
        <h6 id="eventhis">|Event history</h6>
    </div>
	<br>
</div>
</div>
<div>
	<h1>Your booking is successful</h1>
</div>

</body>
</html>