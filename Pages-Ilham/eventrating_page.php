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

<!doctype html>

<html>

<head>
    <title>Event Ratings</title>
	<link rel="stylesheet" type="text/css" href="main.css">
    <style>
        h2{
            margin-left: 750px;
            top: -45px;
            font-size: 60%;
            position: relative;
        }
        h3{
            margin-left:500px;
            margin-bottom: 10px;
            font-size: 150%;
        }
        table,th,tr,td {
            border: 1px solid white;
			color:white;
        }
		table {
			float:left;
			margin-left:50px;
		}
    </style>
	<link rel="stylesheet" type="text/css" href="mainShirley.css">
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
    <h1>EVENT RATINGS</h1>
</div>

<?php
	$eventQuery = "select * from event join venue on event.venue_id=venue.venue_id where event_id=$event_id";
	$eventResult = mysqli_query($con,$eventQuery);
	$eventRow = mysqli_fetch_array($eventResult);
	createEvent($eventRow);
?>

<table>  
<tr>
	<th>No</th>
    <th>Name</th>
    <th>Rating</th>
    <th>Comment</th>
</tr>
<?php
	$query = "select * from rating join user on rating.user_id = user.user_id where event_id=$event_id";
	$result = mysqli_query($con,$query);
	$i=1;
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['rating']."</td>";
		echo "<td>".$row['comment']."</td>";
		echo "</tr>";
		$i++;
	}
?>
</table>

</body>
</html>