<?php
	include 'Methods.php';
	
	$con=connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);
        $query = "select * from user where username = '$username' and password = password(SHA('$password'))";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		if ($row) {
			echo "<p>You are successfully logged in</p>";
			setcookie('username',$username);
			$user_id = $row['user_id'];
			setcookie('user_id',$user_id);
		}
		else {
			echo "<script>alert('Please enter a valid username and password');</script>";
		}
	}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Login Page</title>
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
</div>
</div>
	<div id="header">
		<h1>Welcome Back</h1>
	</div>
		<a href="search_page.php">Search Page</a>
	<div>
		<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			<h4>Username:</h4>
			<input type="text" name="username" size="30">
			<h4>Password:</h4>
			<input type="password" name ="password" size="30">
			<br>
			<br>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>