<?php
	function connectDatabase() {
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
		echo "	<a href='event_page.php'><h5>YOUR EVENTS</h5></a>";
		echo "	</div>";
		echo "	<div id=\"toolbar_yourBookingButton\">";
		echo "	<a href='booking_page.php'><h5>YOUR BOOKINGS</h5></a>";
		echo "	</div>";
		echo "	<div id=\"toolbar_profileButton\">";
		echo "	<h5>PROFILE</h5>";
		echo "	</div>";
		echo "</div>";
		echo "</div>";
	}
	function createEventBook($row) {
		$event_id = $row['event_id'];
		echo "<div class=\"event\">";
		echo "<div class=\"event_properties\">";
		echo "<br>";
		echo "<p>EVENT NAME: ".$row['event_name']."</p>";
		echo "<p>ADDRESS: ". $row['address']."</p>";
		echo "<p>CATEGORY: ". $row['category']."</p>";
		echo "<p>TIME: ". $row['start_time']." - ". $row['end_time'] ." </p>";
		echo "<p>DATE: ". $row['date']."</p>";
		echo "<p>TICKET PRICE: ".$row['ticket_price']."</p>";
		echo "<p>PURCHASE DEADLINE: ".$row['deadline_purchase']."</p>";
		echo "<p>NO OF TICKETS: ".$row['number_of_tickets']."</p>";
		echo "<p>TICKETS AVAILABLE: ".$row['tickets_available']."</p>";
		echo "<p>CONTACT INFO: ". $row['contact_information']."</p>";
		echo "<p>EXTRA INFO: ". $row['extra_information']."</p>";
		echo "<a href='booking.php?event_id=$event_id'><h2>Book now</h2></a>";
		echo "</div>";
		echo "</div>";
	}
	function createEventHost($row) {
		$event_id = $row['event_id'];
		echo "<div class=\"event\">";
		echo "<div class=\"event_properties\">";
		echo "<br>";
		echo "<p>EVENT NAME: ".$row['event_name']."</p>";
		echo "<p>ADDRESS: ". $row['address']."</p>";
		echo "<p>CATEGORY: ". $row['category']."</p>";
		echo "<p>TIME: ". $row['start_time']." - ". $row['end_time'] ." </p>";
		echo "<p>DATE: ". $row['date']."</p>";
		echo "<p>TICKET PRICE: ".$row['ticket_price']."</p>";
		echo "<p>PURCHASE DEADLINE: ".$row['deadline_purchase']."</p>";
		echo "<p>NO OF TICKETS: ".$row['number_of_tickets']."</p>";
		echo "<p>TICKETS AVAILABLE: ".$row['tickets_available']."</p>";
		echo "<p>CONTACT INFO: ". $row['contact_information']."</p>";
		echo "<p>EXTRA INFO: ". $row['extra_information']."</p>";
		echo "<a href='participants_page.php?event_id=$event_id'><h2>View Participants</h2></a>";
		echo "<a href='eventrating_page.php?event_id=$event_id'><h2>View Ratings</h2></a>";
		echo "</div>";
		echo "</div>";
	}
	function createEvent($row) {
		$event_id = $row['event_id'];
		echo "<div class=\"event\">";
		echo "<div class=\"event_properties\">";
		echo "<br>";
		echo "<p>EVENT NAME: ".$row['event_name']."</p>";
		echo "<p>ADDRESS: ". $row['address']."</p>";
		echo "<p>CATEGORY: ". $row['category']."</p>";
		echo "<p>TIME: ". $row['start_time']." - ". $row['end_time'] ." </p>";
		echo "<p>DATE: ". $row['date']."</p>";
		echo "<p>TICKET PRICE: ". $row['ticket_price'] ."</p>";
		echo "<p>PURCHASE DEADLINE: ". $row['deadline_purchase']."</p>";
		echo "<p>NO OF TICKETS: ".$row['number_of_tickets']."</p>";
		echo "<p>TICKETS AVAILABLE: ".$row['tickets_available']."</p>";
		echo "<p>CONTACT INFO: ". $row['contact_information']."</p>";
		echo "<p>EXTRA INFO: ". $row['extra_information']."</p>";
		echo "</div>";
		echo "</div>";
	}
	function createEventMakeRating($row) {
		$event_id = $row['event_id'];
		echo "<div class=\"event\">";
		echo "<div class=\"event_properties\">";
		echo "<br>";
		echo "<p>EVENT NAME: ".$row['event_name']."</p>";
		echo "<p>ADDRESS: ". $row['address']."</p>";
		echo "<p>CATEGORY: ". $row['category']."</p>";
		echo "<p>TIME: ". $row['start_time']." - ". $row['end_time'] ." </p>";
		echo "<p>DATE: ". $row['date']."</p>";
		echo "<p>TICKET PRICE: ".$row['ticket_price']."</p>";
		echo "<p>PURCHASE DEADLINE: ".$row['deadline_purchase']."</p>";
		echo "<p>NO OF TICKETS: ".$row['number_of_tickets']."</p>";
		echo "<p>TICKETS AVAILABLE: ".$row['tickets_available']."</p>";
		echo "<p>CONTACT INFO: ". $row['contact_information']."</p>";
		echo "<p>EXTRA INFO: ". $row['extra_information']."</p>";
		echo "<a href='addrating_page.php?event_id=$event_id'><h2>Add Ratings</h2></a>";
		echo "<a href='eventrating_page.php?event_id=$event_id'><h2>View Ratings</h2></a>";
		echo "</div>";
		echo "</div>";
	}
	function generateSearchQuery($category, $ground, $dateStart, $dateEnd) {
		$query = "";
		$categoryString = "";
		$groundString = "";
		$dateString = "";
		
		if (sizeof($category) == 1) {
			$categoryString = "event.category = '$category[0]'";
		}
		elseif (sizeof($category) > 1) {
			$categoryString = "event.category = '$category[0]'";
			for ($i = 1; $i < sizeof($category); $i++) {
				$categoryString .= " or event.category = '$category[$i]'";
			}
		}
		else;
		
		//Generating string for ground type
		if (sizeof($ground) == 1) {
			$groundString = "venue.ground_type = '$ground[0]'";
		}
		elseif (sizeof($ground) > 1) {
			$groundString = "venue.ground_type = '$ground[0]'";
			for ($i = 1; $i < sizeof($ground); $i++) {
				$groundString .= " or venue.ground_type = '$ground[$i]'";
			}
		}
		else;
		
		//Generating string for date
		if ($dateStart) {
			if ($dateEnd) {
				$dateString = "event.date > '$dateStart' and event.date < '$dateEnd'";
			}
			else {
				$dateString = "event.date > '$dateStart'";
			}
		}
		else {
			$dateString = "event.date < '$dateEnd'";
		}
		
		$query = "";
		if ($category and $ground and ($dateStart or $dateEnd)) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($categoryString) and ($groundString) and ($dateString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($category and $ground) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($categoryString) and ($groundString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($category and ($dateStart or $dateEnd)) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($categoryString) and ($dateString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($ground and ($dateStart or $dateEnd)) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($groundString) and ($dateString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($category) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($categoryString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($ground) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($groundString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		elseif ($dateStart or $dateEnd) {
			$query = "select * from event join venue on event.venue_id=venue.venue_id where ($dateString) and (tickets_available>0) and (curdate()<=deadline_purchase)";
		}
		else;
		return $query;
	}
?>