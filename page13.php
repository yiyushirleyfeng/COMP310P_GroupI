<?php
session_start();
require 'method.php';
if ($_SERVER["REQUEST_METHOD" == "POST"]){
rating();
}

//print_r($_SESSION);
function rating(){

$ratingerror = $reviewerror = '';

if(isset($_POST["submit"])){

$rating = $_POST["rating"];
$review = $_POST["review"];


if(empty($rating)){
$ratingerror = "You haven't rated the event";
}

elseif (empty($ratingerror) && empty($reviewerror) ) {
$conn = connect();
$insertQuery = "INSERT INTO rating(rating, comment) VALUES ('$rating', '$review') ";

mysqli_query($conn, $insertQuery);
mysqli_close($conn);
header("Location:http://localhost/football/viewrating.php");
exit();
}
}
}
?>

/*$row = mysqli_fetch_assoc($result2);
//$reviewid = $row['rating_id'];
//if(!empty($rating)&&!empty($review)){
//$insertreviewquery = "INSERT INTO rating(rating, comment) VALUES ('$rating', '$review') ";
//$resultcomp = mysqli_query($conn, $insertreviewquery);
}*/

<!doctype html>

<html>

    <head>
        <title>Booking History</title>
        <style>
            /*Toolbar*/
            #toolbar {
                width:1000px;
                height:100px;
                background: #4C4CFF;
                border-radius: 20px;
                position: relative;
            }
            #logo {
                color:white;
                font-family:Helvetica;
                position: absolute;
                top:0px;
                left:5px;
                font-size:130%;
            }
            #searchBar {
                position:absolute;
                bottom:10px;
                left:300px;
            }
            .searchBar input {
                width:400px;
                height:150px;
            }
            #user {
                position:absolute;
                right:10px;
                top:-10px;
                color:white;
            }
            #toolbarButtons {
                position:absolute;
                width:360px;
                height:50px;
                right:30px;
                bottom:10px;
                background:white;
                border-radius:20px;
            }
            #yourEventButton {
                width:120px;
                height:50px;
                position:absolute;
                left:20px;
                top:-5px;
            }
            #yourBookingButton {
                width:120px;
                height:50px;
                position:absolute;
                left:130px;
                top:-5px;
            }
            #profileButton {
                width:120px;
                height:50px;
                position:absolute;
                left: 270px;
                top:-5px;
            }
            /*Header*/
            #header {
                position:relative;
                left:20px;
            }
            /*Events*/
            #event {
                position: relative;
                left:20px;
                background: blue;
                width:300px;
                height:400px;
                border-radius:20px;
                margin-top: -70px;
            }
            #eventProperties p {
                color:white;
            }
            #eventProperties {
                position:absolute;
                left:20px;
            }
            h2{
                margin-left: 750px;
                top: -45px;
                font-size: 60%;
                position: relative;
            }
            h3{
                margin-left:500px;
                margin-bottom: 10px;
                font-size: 150%;
            }
            #label{
                margin-left: 540px;
                margin-top: 30px;
                margin-bottom: 20px;
            }
            #comment{
                margin-left: 400px;
                margin-top:-350px;
            }
            h4{
                margin-left: 640px;
            }
            textarea {
                width: 350px;
                height:150px;
            }
        </style>
    </head>

    <>
    <div id="toolbar">
        <div id="logo">
            <h1>LOGO</h1>
        </div>
        <div id="searchBar">
            <input type="text" placeholder="Search">
            <button id="searchButton">Search</button>
        </div>
        <div id="user">
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
    </div>
    <div id="header">
        <h1>BOOKING HISTORY</h1>
    </div>
    <h2> CURRENT BOOKING | BOOOKING HISTORY </h2>
    <h3> HOW WAS YOUR MATCH?</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" accpect-charset="utf-8">
        <div id="label">RATING:<input type="radio" name="rating" value="1"/>  1
            <input type="radio" name="cc" value="2" /> 2
            <input type="radio" name="cc" value="3" /> 3
            <input type="radio" name="cc" value="4"/>  4
            <input type="radio" name="cc" value="5" /> 5</div>

        <div id="event">
            <div id="eventProperties">
                <p>EVENT NAME</p>
                <p>ADDRESS:</p>
                <p>CATEGORY:</p>
                <p>TIME:</p>
                <p>DATE:</p>
                <p>TICKET PRICE:</p>
                <p>PURCHASE DEADLINE:</p>
                <p>NO OF TICKETS:</p>
                <p>TICKETS AVAILABLE:</p>
                <p>CONTACT INFO:</p>
                <p>EXTRA INFO:</p>
            </div>
        </div>

        <div id="comment"><form action="viewrating.php" method==POST">COMMENT:<textarea rows="20" cols="10" name="review">
Type your comments here.
                </textarea></form></div>

        <h4><input type="submit" name="submit" value="Submit"></h4>


    </body>

</html>

