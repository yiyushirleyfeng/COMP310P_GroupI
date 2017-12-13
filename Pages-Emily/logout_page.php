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
	<?php createToolbar(); ?>
	<h1>You are successfully logged out</h1>
	<a href="main_page.php">Back to main page</a>
</body>
</html>