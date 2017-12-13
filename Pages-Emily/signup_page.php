<?php
	include 'Methods.php';
		
	$con = connectServer();
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
            $query = "INSERT INTO user (first_name,last_name,contact_number,email,username,password) VALUES ('$first_name', '$last_name', '$number', '$email', '$username', '$password')";
			if (mysqli_query($con, $query)) {
				setcookie("username",$username);
			}
			else
				echo "Error";
			}
			$query = "select user_id from user where username='$username'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_array($result);
			$user_id = $row['user_id'];
			if ($user_id) {
				setcookie("user_id",$user_id);
				$userid = $_COOKIE['user_id'];
			}
			else {
				echo "Failed to retrieve user id";
			}
			if ($username and $user_id) {
			echo "You are logged in as $username";
			}
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Football Event</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<?php
		createToolbar();
	?>
    <h1>SIGN UP WITH YOUR EMAIL ADDRESS!</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    EMAIL:<br/>
    <input type="text" name="email"><br/>

    FIRST NAME:<br/>
    <input type="text" name="first_name"><br/>

     LAST NAME:<br/>
    <input type="text" name="last_name"><br/>

     USER NAME:<br/>
    <input type="text" name="username"><br/>


     PASSWORD:<br/>
    <input type="password" name="password"><br/>


     CONTACT NUMBER:<br/>
    <input type="text" name="number"><br/>


    <input type="submit" name="submit" value="Submit">
    
</form>


</body>
</html>
