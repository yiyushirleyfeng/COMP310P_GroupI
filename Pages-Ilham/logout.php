<?php
	include 'Methods.php';
	
	setcookie("username","",time()-3600);
	setcookie("user_id","",time()-3600);
?>

<!DOCTYPE html>

<html>
<head>
	<title>Logout Page</title>
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
	<h1>You are successfully logged out</h1>
	<a href="index.php">Home</a>
</body>
</html>