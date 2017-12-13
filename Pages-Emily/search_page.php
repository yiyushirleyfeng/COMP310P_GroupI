<?php 
	include 'Methods.php';
	
	$con = connectServer();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$query = generateSearchQuery($_POST['category'], $_POST['ground'], $_POST['dateStart'], $_POST['dateEnd']);
		echo $query;
		$result = mysqli_query($con,$query);
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Search Events</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<style>
			#category {
				float:left;
			}
		</style>
	</head>
	<body>
		<?php
			createToolbar();
		?>
	<br>
	<div id="category">
    <p>CATEGORY:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="checkbox" name="category[]" value="5-a-side"> 5-A-SIDE<br>
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