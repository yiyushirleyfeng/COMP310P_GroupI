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
	
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	//Generating past events attended by the user
	$query = "select * from booking join ticket on booking.ticket_id=ticket.ticket_id join event on event.event_id=ticket.event_id join venue on event.venue_id = venue.venue_id where booking.user_id=$user_id and curdate()>date";
	$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Booking History</title>
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
        <a href="booking_page.php"><h6 id="yevent">Current Bookings</h6></a>
        <a href="bookinghistory_page.php"><h6 id="createevent">|Past Bookings</h6></a>
    </div>
	<br>
</div>
</div>
		<h1>BOOKING HISTORY</h1>
		<?php
			while ($row = mysqli_fetch_array($result)) {
				createEventMakeRating($row); 
			}
		?>
	</body>
</html>