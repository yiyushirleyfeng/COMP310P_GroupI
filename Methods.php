<?php
	function connectServer() {
		$username = "root";
		$password = "root";
		$dbhost = "localhost";
		$db = "football_management";
		
		return mysqli_connect($dbhost,$username,$password,$db);
	}
	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	function createToolbar() {
		echo "<div id=\"toolbar\">";
		echo "<div id=\"toolbar_logo\">";
		echo "	<h1>LOGO</h1>";
		echo "</div>";
		echo "<div id=\"toolbar_searchBar\">";
		echo "<input type=\"text\" placeholder=\"Search\">";
		echo "<button id=\"searchButton\">Search</button>";
		echo "</div>";
		echo "<div id=\"toolbar_user\">";
		echo "	<p>Hi User! | <a href='logout.php'>Logout</a></p>";
		echo "</div>";
		echo "<div id=\"toolbar_buttons\">";
		echo "	<div id=\"toolbar_yourEventButton\">";
		echo "	<h5>YOUR EVENT</h5>";
		echo "	</div>";
		echo "	<div id=\"toolbar_yourBookingButton\">";
		echo "	<h5>YOUR BOOKING</h5>";
		echo "	</div>";
		echo "	<div id=\"toolbar_profileButton\">";
		echo "	<h5>PROFILE</h5>";
		echo "	</div>";
		echo "</div>";
		echo "</div>";
	}
	function createEvent($row) {
		$event_id = $row['event_id'];
		echo "<div class=\"event\">";
		echo "<div class=\"event_properties\">";
		echo "<br>";
		echo "<p>EVENT NAME:".$row['event_name']."</p>";
		echo "<p>ADDRESS:". $row['address']."</p>";
		echo "<p>CATEGORY:". $row['category']."</p>";
		echo "<p>TIME:". $row['start_time']." - ". $row['end_time'] ." </p>";
		echo "<p>DATE:". $row['date']."</p>";
		echo "<p>TICKET PRICE:</p>";
		echo "<p>PURCHASE DEADLINE:</p>";
		echo "<p>NO OF TICKETS:".$row['number_of_tickets']."</p>";
		echo "<p>TICKETS AVAILABLE:".$row['tickets_available']."</p>";
		echo "<p>CONTACT INFO:". $row['contact_information']."</p>";
		echo "<p>EXTRA INFO:". $row['extra_information']."</p>";
		echo "<a href='booking.php?event_id=$event_id'><h2>Book now</h2></a>";
		echo "</div>";
		echo "</div>";
	}
?>