<?php
include "../connection.php";
session_start();

$user = $_SESSION['userid'];
$theatre = $_POST['theatre'];
$type = $_POST['type'];
$date = $_POST['date'];
$time = $_POST['hour'];
$movieid = $_POST['movie_id'];
$order = "GMS" . rand(10000, 99999999);
$cust  = "CUST" . rand(1000, 999999);

//sessions

// $_SESSION['ORDERID'] = $order;


//conditions
if ((!$_POST['submit'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}

if (isset($_POST['submit'])) {
    $qry = "INSERT INTO bookingtable(`movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `amount`, `ORDERID`, `fk_user`) VALUES ('$movieid','$theatre','$type','$date','$time','Not Paid','$order','$user')";
    $result = mysqli_query($con, $qry);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Seat Reservation</title>
    <meta charset="utf-8">
    <script src="3b-reservation.js"></script>
    <link rel="stylesheet" href="3c-reservation.css">
  </head>
  <body>
    <?php
    // (A) FIXED IDS FOR THIS DEMO
    $sessid = $movieid;
    $userid = $user;
  echo $sessid;
    // (B) GET SESSION SEATS
    require "2-reserve-lib.php";
    $seats = $_RSV->get($sessid);
    ?>
    <div class="screen"></div>

    <!-- (C) DRAW SEATS LAYOUT -->
    <div id="layout"><?php
    foreach ($seats as $s) {
      $taken = is_numeric($s["user_id"]);
      printf("<div class='seat%s'%s>%s</div>",
        $taken ? " taken" : "",
        $taken ? "" : " onclick='reserve.toggle(this)'",
        $s["seat_id"]
      );
    }
    ?></div>

    <!-- (D) LEGEND -->
    <div id="legend">
      <div class="seat"></div> <div class="txt">Open</div>
      <div class="seat taken"></div> <div class="txt">Taken</div>
      <div class="seat selected"></div> <div class="txt">Your Selected Seats</div>
    </div>

    <!-- (E) SAVE SELECTION -->
    <form id="ninja" method="post" action="4-save.php">
      <input type="hidden" name="sessid" value="<?=$sessid?>">
      <input type="hidden" name="userid" value="<?=$userid?>">
      <input type="hidden" name="order" value="<?php echo $order; ?>">
    </form>
    <button id="go" onclick="reserve.save()">Reserve Seats</button>
  </body>
</html>