
       <?php
       include 'method.php';
       ?>
        
        <?php
$conn=connect();
//print_r($conn);
$query = mysqli_query($conn, "SELECT DISTINCT(rating_ID),Comment, rating as RID FROM Rating");
$row = mysqli_fetch_array($query);
if ($row) {
 echo "yay";   
}
else
    echo "no";
//die (mysqli_error($dbconnect));


/*while ($row = mysqli_fetch_array($query)) {
  $html .=
          
   "<table border=1 align='center'>;
    <tr>
    <th>Rating ID =".$row['rating_id']."</th>
    <th>Comment=".$row['comment']."</th>
    <th>Rating =".$row['rating']."</th>
    <th><a href='addrating.php?EID=".$row['RID']."'> submit </a></th>
   </tr>
   </table>\n";
}*/

?>
<p>View Comment</p>
        <?php
echo $html;
?>

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
            margin-top: -40px;
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
        
        table,th,tr{
            border: 1px solid black;
            margin-left: 600px;
            margin-top: -380px;
        }
    </style>
</head>

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

<table>  
<tr>
    <th>Name</th>
    <th>Rating</th>
    <th>Comment</th>
  </tr>
</table>