<?php 
	include 'createEvent.php';
	include 'createToolbar.php';
	
	$username = "root";
	$password = "root";
	$dbhost = "localhost";
	$db = "football_management";
	
	$con = mysqli_connect($dbhost,$username,$password,$db);
	$query = " select * from event where event.category='5-a-side'; ";
	$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Search Events</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<?php
			createToolbar();
		?>
	<br>
	<?php
		while ($row = mysqli_fetch_array($result)) {
			createEvent($row);
		}
	?>
	</body>
</html>