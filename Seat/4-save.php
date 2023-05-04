<?php
// (A) LOAD LIBRARY
require "2-reserve-lib.php";
require "../connection.php";
// (B) SAVE
$_RSV->save($_POST["sessid"], $_POST["userid"], $_POST["seats"]);
$order = $_POST["order"];
$sql = "SELECT * FROM bookingtable WHERE ORDERID = '$order'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$movieid = $row['movieID'];
$theatre = $row['bookingTheatre'];
$sql = "SELECT * FROM movietable WHERE movieID = '$movieid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if($theatre == "main-hall"){
    $cost = $row['mainhall'];
}else if($theatre == "vip-hall"){
    $cost = $row['viphall'];
}else {
    $cost = $row['privatehall'];
}

echo "amount to be paid".$cost * count($_POST["seats"]);
?>
<form method="post" action="../pass.php">
    <input type="hidden" name="ORDERID" value="<?php echo $order; ?>">
    <input type="hidden" name="amount" value="<?php echo $cost * count($_POST["seats"]); ?>">
    <button type="submit">Pay</button>
</form>
