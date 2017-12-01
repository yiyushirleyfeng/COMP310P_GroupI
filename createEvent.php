<?php
	function createEvent($row) {
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
		echo "</div>";
		echo "</div>";
	}
?>