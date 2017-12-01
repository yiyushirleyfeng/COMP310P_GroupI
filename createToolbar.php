<?php
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
		echo "	<p>Hi User! | Logout</p>";
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
?>