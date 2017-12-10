<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new event</title>
    <link href="MainHeadCSS.css" type="text/css" rel="stylesheet"/>
</head>

<body>

<div class=logo>
    <div class="transbox">
        <img src="http://www.stirlingalbionfc.co.uk/wp-content/uploads/2017/07/football-game.png" alt="Logo" height="150" width="150"/>
        <h1>Social Football</h1>
        <p>Arrange your next social match here!</p>
    </div>

    <div class="searchbar">
        <input type="text" placeholder="Search">
        <button>Search</button>
    </div>
</div>

<div class="user">
    <p>Hi User! | Logout</p>
</div>
<div id="toolbarButtons">
    <div id="yourEventButton">
        <h5>YOUR EVENT</h5>
    </div>
    <div id="yourBookingButton">
        <h5>YOUR BOOKING</h5>
    </div>
    <div id="profileButton">
        <h5>PROFILE</h5>
    </div>
</div>

<div class="yourevents">
    <div>
        <h6 id="yevent">Your event</h6>
        <h6 id="createevent">|Create new event</h6>
        <h6 id="eventhis">|Event history</h6>
    </div>
</div>

<?php
// define variables and set to empty values
$eventname = $date = $stime = $etime= $category = $venuename = $contact = $extra =
$deadline = $notickets = $ticketprice ="";
$eventnameErr = $dateErr = $stimeErr =$etimeErr = $categoryErr = $venuenameErr = $contactErr = $extraErr =
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

    if (empty($_POST["venuename"])){
        $venuenameErr ="Choose venue";
    }
    else {
        $venuename=test_input($_POST["venuename"]);
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

    /* Attemptng to set cookies*/

    setcookie("eventname", "$eventname");
    setcookie("date", "$date");


    /* Attempting date validation where date should be after purchase deadline
     *
     * $date= $_POST['date'];
    $deadline= $_POST['deadline'];

    $date = strtotime($date);
    $deadline = strtotime($deadline);
    if($date < $deadline){
        echo "Invalid dates";
    }
        //show error
    }*/

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<div class="createevent">
    <h1>CREATE NEW EVENTS</h1>
    <p><span class="error">* required </span></p>
    <form method="post" action="page_4processor.php">
    <!--action="<?/*php echo htmlspecialchars($_SERVER["PHP_SELF"]);*/?>">-->

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
            <input type="stime" name="stime" placeholder="">
            <span class="error">* <?php echo $stimeErr;?></span>
        </p>

        <p>
            END TIME:
            <input type="etime" name="etime" placeholder="">
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
            <select name="venuename">
                <option value="Choose">Choose</option>
                <option value="Warren Sports Pitch">Warren Sports Pitch</option>
                <option value="Somers Town Community Centre">Somers Town Community Centre</option>
                <option value="Calthorpe Project Sports Facilities">Calthorpe Project Sports Facilities</option>
                <option value="St. James Gardens Multi-use Games Area">St. James Gardens Multi-use Games Area</option>
                <option value="St Mary and St Pancras school facilities">St Mary and St Pancras school facilities</option>
                <option value="Cumberland Market multi-use games area">Cumberland Market multi-use games area</option>
                <option value="Coram's Fields">Coram's Fields</option>
                <option value="Camden Rhino Turf">Camden Rhino Turf</option>
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
            <?php echo $extra;?>
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>


<?/*php

$con = new mysqli("localhost","root","root","football_management");


// Check connection
if ($con->connect_error) {
    die("Connection failed".$con->connect_error);
}

else {
    echo "Connected to database";
}

echo "<p style='color:white;'>".$eventname."</p>";
echo "<p style='color:white;'>".$date."</p>";
echo "<p style='color:white;'>".$stime."</p>";
echo "<p style='color:white;'>".$etime."</p>";
echo "<p style='color:white;'>".$category."</p>";
echo "<p style='color:white;'>".$venuename."</p>";
echo "<p style='color:white;'>".$contact."</p>";
echo "<p style='color:white;'>".$extra."</p>";
echo "<p style='color:white;'>".$deadline."</p>";
echo "<p style='color:white;'>".$notickets."</p>";
echo "<p style='color:white;'>".$ticketprice."</p>";

$sql = "INSERT INTO event (event_id, venue_id, event_name, category, date, start_time, end_time, 
contact_information, extra_information, number_of_tickets, tickets_available)
VALUES ('$eventname','$date', '$time','$category','$venuename', '$contact','$extra',
'$deadline','$notickets','$ticketprice')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

*/?>

</body>
</html>
