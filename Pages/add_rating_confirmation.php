<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	$event_id = $_GET['event_id'];
	
	$rating = $_POST['cc'];
	$comment = $_POST['comment'];
	
	if ($username) {
	echo "<p>You are logged in as $username</p>";
	}
	else {
		header("Location: index.php");
		exit;
	}
	
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	//Adding the rating
	$query = "insert into rating (user_id, event_id, rating, date, comment) values ($user_id,$event_id,$rating,curdate(),'$comment')";
	
	if (mysqli_query($con,$query)) {
		echo "<p>Rating has been successfully added</p>";
	}
	else {
		echo "<p>An Error has occured, please return to a different page</p>";
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Current Booking</title>
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
	<a href="search_page.php"><p>Return to search page</p></a>
	</body>
</html>