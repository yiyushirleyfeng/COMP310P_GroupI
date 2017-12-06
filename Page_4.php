<?php
	include 'Methods.php';
	
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['password'];
	
	if ($username) {
		echo "You are logged in as $username";
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "Post success";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new event</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<?php createToolbar(); ?>
<div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p>
        EVENT NAME:
        <input type="text" name="name">
    </p>

    <p>
        DATE:
        <input type="date" name="date">
    </p>

    <p>
        TIME:
        <input type="time" name="time">
    </p>

    <p>
        CATEGORY:
        <input type="text" name="category">
    </p>

    <p>
        ADDRESS:
        <input type="text" name="address">
    </p>

    <p>
        CONTACT INFORMATION:
        <input type="text" name="contact">
    </p>

    <p>
        EXTRA INFORMATION:
        <input type="text" name="info">
    </p>

    <p>
        PURCHASE DEADLINE:
        <input type="date" name="deadline">
    </p>

    <p>
        NO. OF TICKETS:
        <input type="text" name="tickets">
    </p>

    <p>
        TICKET PRICE:
        <input type="text" name="price">
    </p>
	
	<input type="submit">
	</form>
</div>

</body>
</html>