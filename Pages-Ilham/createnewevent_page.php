<!DOCTYPE html>
<?php
	$username = $_COOKIE['username'];
	$user_id = $_COOKIE['user_id'];
	
	if ($username) {
	echo "<p>You are logged in as $username</p>";
	}
	else {
		header("Location: index.php");
		exit;
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventname = $date = $stime = $etime= $category = $venue_id = $contact = $extra =
	$deadline = $notickets = $ticketprice ="";
	$eventnameErr = $dateErr = $stimeErr =$etimeErr = $categoryErr = $venue_idErr = $contactErr = $extraErr =
	$deadlineErr = $noticketsErr = $ticketpriceErr ="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["eventname"])){
        $eventnameErr ="Insert event name";
    }
    else {
        $eventname=test_input($_POST["eventname"]);
    }
    if (empty($_POST["date"])){
        $dateErr ="Select date";
    }
    else {
        $date=test_input($_POST["date"]);
    }
    if (empty($_POST["stime"])){
        $stimeErr ="Select start time";
    }
    else {
        $stime=test_input($_POST["stime"]);
    }
    if (empty($_POST["etime"])){
        $etimeErr ="Select end time after start time";
    }
    else {
        $etime= test_input($_POST["etime"]);
    }
    if (empty($_POST["category"])){
        $categoryErr ="Choose category";
    }
    else {
        $category=test_input($_POST["category"]);
    }
    if (empty($_POST["venue_id"])){
        $venue_idErr ="Choose venue";
    }
    else {
        $venue_id=test_input($_POST["venue_id"]);
    }
    if (empty($_POST["contact"])){
        $contactErr ="Insert contact number";
    }
    else {
        $contact=test_input($_POST["contact"]);
    }
    if (empty($_POST["deadline"])){
        $deadlineErr ="Insert event name";
    }
    else {
        $deadline=test_input($_POST["deadline"]);
    }
    if (empty($_POST["notickets"])){
        $noticketsErr ="Insert event name";
    }
    else {
        $notickets=test_input($_POST["notickets"]);
    }
    if (empty($_POST["ticketprice"])){
        $ticketpriceErr ="Insert event name";
    }
    else {
        $ticketprice=test_input($_POST["ticketprice"]);
    }
	$extra = test_input($_POST['extra']);
	
	$con = mysqli_connect("localhost","root","root","football_management");
	if ($con->connect_error) {
		die("Connection failed".$con->connect_error);
	}
	else {
	}
	$query = "insert into event (venue_id,event_name,category,date,start_time,end_time,contact_information,extra_information,number_of_tickets,tickets_available,host_id,deadline_purchase,ticket_price) values ($venue_id,'$eventname','$category','$date','$stime','$etime','$contact','$extra',$notickets,$notickets,$user_id,'$deadline',$ticketprice)";
	if (mysqli_query($con,$query)) {
		$result = mysqli_query($con,"select * from event where event_id=(select max(event_id) from event)");
		$event_id = mysqli_fetch_array($result)['event_id'];
		for ($i=0; $i<$notickets;$i++) {
			mysqli_query($con,"insert into ticket (event_id,ticket_price,user_id) values ($event_id,$ticketprice,NULL)");
		}
		echo "<p>Your event has been created</p>";
	}
	else {
		echo "<p>Error, event not created</p>";
	}
	}
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new event</title>
    <link href="main.css" type="text/css" rel="stylesheet"/>
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
<div class="yourevents">
    <div>
        <a href="event_page.php"><h6 id="yevent">Your event</h6></a>
        <a href="createnewevent_page.php"><h6 id="createevent">|Create new event</h6></a>
        <a href="eventhistory_page.php"><h6 id="eventhis">|Event history</h6></a>
    </div>
	<br>
</div>
</div>

<div class="createevent">
    <h1>CREATE NEW EVENTS</h1>
    <p><span class="error">* required </span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <p>
            EVENT NAME:
            <input type="text" id="eventname" name="eventname" placeholder="">
            <span class="error">* <?php echo $eventnameErr;?></span>
        </p>

       <p>
            DATE:
            <input type="date" name="date" placeholder="">
           <span class="error">* <?php echo $dateErr;?></span>
        </p>

        <p>
            START TIME:
            <input type="time" name="stime" placeholder="">
            <span class="error">* <?php echo $stimeErr;?></span>
        </p>

        <p>
            END TIME:
            <input type="time" name="etime" placeholder="">
            <span class="error">* <?php echo $etimeErr;?></span>
        </p>

        <p>
            CATEGORY:
            <select name="category">
                <option value="Choose">Choose</option>
                <option value="5-a-side">5-a-side</option>
                <option value="11-a-side">11-a-side</option>

            </select>
            <span class="error">* <?php echo $categoryErr;?></span>
        </p>
        <p>
            VENUE NAME:
            <select name="venue_id">
                <option value="Choose">Choose</option>
		<?php
			$con = mysqli_connect("localhost","root","root","football_management");
			$result = mysqli_query($con,"select * from venue");
			while ($row = mysqli_fetch_array($result)) {
			echo "<option value=\"".$row['venue_id']."\">".$row['venue_name']."</option>";
			}
			mysqli_close($con);
		?>
            </select>
            <span class="error">* <?php echo $venuenameErr;?></span>
        </p>

        <p>
            CONTACT NUMBER:
            <input type="number" name="contact" placeholder="">
            <span class="error">* <?php echo $contactErr;?></span>
        </p>

        <p>
            PURCHASE DEADLINE:
            <input type="date" name="deadline" placeholder="">
            <span class="error">* <?php echo $deadlineErr;?></span>
        </p>

        <p>
            NO. OF TICKETS:
            <input type="number" name="notickets" placeholder="">
            <span class="error">* <?php echo $noticketsErr;?></span>
        </p>

        <p>
            TICKET PRICE:
            <input type="number" name="ticketprice" placeholder="">
            <span class="error">* <?php echo $ticketpriceErr;?></span>
        </p>

        <p>
            EXTRA INFORMATION:
            <input type="text" name="extra" placeholder="">
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>