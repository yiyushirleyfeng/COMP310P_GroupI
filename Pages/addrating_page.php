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
	//Fetching the event concerned
	$query = "select * from event join venue on event.venue_id = venue.venue_id where event.event_id = $event_id";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
?>

<!doctype html>

<html>

<head>
    <title>Current Events</title>
	<link rel="stylesheet" type="text/css" href="main.css">
    <style>
        h2{
            margin-left: 750px;
            top: -45px;
            font-size: 60%;
            position: relative;
        }
        h4{
            margin-left: 640px;
        }
        textarea {
            width: 350px;
            height:150px;
        }
		#main {
			float:left;
			margin-left: 100px;
		}
		#submit_button {
			float:left;
		}
		textarea {
			margin-left:20px;
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
        <h6 id="yevent">Your event</h6>
        <h6 id="createevent">|Create new event</h6>
        <h6 id="eventhis">|Event history</h6>
    </div>
	<br>
</div>
</div>
<div id="header">
    <h1>BOOKING HISTORY</h1>
</div>
<?php
	createEvent($row);
?>
<h2> CURRENT BOOKING | BOOOKING HISTORY </h2>
<div id="main">
<h3>HOW WAS YOUR MATCH?</h3>
<form method="post" action="add_rating_confirmation.php?event_id=<?=$event_id?>">
<div id="label"><p>RATING:
<input type="radio" name="cc" value="1"/>  1
<input type="radio" name="cc" value="2" /> 2
<input type="radio" name="cc" value="3" /> 3
<input type="radio" name="cc" value="4"/>  4
<input type="radio" name="cc" value="5" /> 5
</p>
</div>
<br>
<div id="comment"><p>COMMENT:<textarea rows="20" cols="10" name="comment">
</textarea></p></div>
<br>
<input type="submit" name="submit" value="Submit" id="submit_button">
</div>
</form>

</body>

</html>