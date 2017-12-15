<?php 
	include 'Methods.php';
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
	echo "<p>You are logged in as $username<p>";
	}
	else {
		header("Location: index.php");
		exit;
	}
	
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Generate search query and performing the query
		$query = generateSearchQuery($_POST['category'], $_POST['ground'], $_POST['dateStart'], $_POST['dateEnd']);
		$result = mysqli_query($con,$query);
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Search Events</title>
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
</div>
<h1>SEARCH EVENTS</h1>
<div id="category">
    <p>CATEGORY:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="checkbox" name="category[]" value="5-a-side">5-A-SIDE<br>
        <input type="checkbox" name="category[]" value="11-a-side"> 11-A-SIDE<br>
        <p>GROUND TYPE:</p>
        <input type="checkbox" name="ground[]" value="Grass"> GRASS<br>
        <input type="checkbox" name="ground[]" value="Astroturf"> ASTROTURF<br>
        <input type="checkbox" name="ground[]" value="Indoor"> INDOOR<br>
        <input type="checkbox" name="ground[]" value="Concrete"> CONCRETE<br>
        <p>START DATE:</p>
        <input type="date" name="dateStart"><br/>
		<p>END DATE:</p>
		<input type="date" name="dateEnd"><br/>
        <input type="submit" value="Submit">
    </form>
</div>
<?php
	while ($row = mysqli_fetch_array($result)) {
		createEventBook($row);
	}
?>
	</body>
</html>