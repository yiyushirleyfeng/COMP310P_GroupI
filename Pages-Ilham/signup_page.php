<?php
	include 'Methods.php';
		
	$con = connectDatabase() or die('Error connecting to MySQL server.'. mysql_error());
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);
		$username = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);
		$number = test_input($_POST["number"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
			echo "<script type='text/javascript'>alert('$emailErr');</script>";
        }
        else {
			$query = "select * from user where username='$username' or email='$email'";
			if (mysqli_num_rows(mysqli_query($con,$query)) > 0) {
				echo "<p>Either username or email are taken, please enter different inputs</p>";
			}
			else {
				$query = "INSERT INTO user (first_name,last_name,contact_number,email,username,password) VALUES ('$first_name', '$last_name', '$number', '$email', '$username', password(SHA('$password')))";
			if (mysqli_query($con, $query)) {
				setcookie("username",$username);
				$query = "select user_id from user where username='$username'";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_array($result);
				$user_id = $row['user_id'];
				if ($user_id) {
					setcookie("user_id",$user_id);
					$userid = $_COOKIE['user_id'];
				}
				else {
					echo "<p>Failed to retrieve user id</p>";
				}
				if ($username and $user_id) {
				echo "<p>You are logged in as $username</p>";
				header("Location: search_page.php");
				exit;
			}
			else
				echo "Error";
			}
			}
		}
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up Page</title>
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
    <h1>SIGN UP WITH YOUR EMAIL ADDRESS!</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>EMAIL: <input type="text" name="email"></p>
    <p>FIRST NAME: <input type="text" name="first_name"></p>
    <p>LAST NAME: <input type="text" name="last_name"></p>
    <p>USER NAME: <input type="text" name="username"></p>
	<p>PASSWORD: <input type="password" name="password"></p>
	<p>CONTACT NUMBER: <input type="number" name="number"></p>
	<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>