<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM bookingtable";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedbacktable"));
    $moviesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM movietable"));
    $userNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM admin"));
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
               
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Recent Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Booking ID</th>
                                <th>Movie ID</th>
                                <th>First Name</th>

                                <th>Email</th>
                                <th>Date</th>
                                <th>Theatre</th>
                                <th>Type</th>
                                <th>Order ID</th>
                            </tr>
                            <tbody>
                                <?php

                                $select = "SELECT * FROM `bookingtable`";
                                $run = mysqli_query($con, $select);
                                while ($row = mysqli_fetch_array($run)) {
                                    $sql = "SELECT * From users where id =".$row['fk_user'];
                                    $result = mysqli_query($con, $sql);
                                    $row1 = mysqli_fetch_assoc($result);
                                    $bookingFName = $row1['username'];
                                    $bookingid = $row['bookingID'];
                                    $movieID = $row['movieID'];
                                    $email = $row1['email'];
                                    $date = $row['bookingDate'];
                                    $theatre = $row['bookingTheatre'];
                                    $type = $row['bookingType'];
                                    $ORDERID = $row['ORDERID'];
                                ?>
                                    <tr align="center">
                                        <td><?php echo $bookingid; ?></td>
                                        <td><?php echo $movieID; ?></td>
                                        <td><?php echo $bookingFName; ?></td>

                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $theatre; ?></td>
                                        <td><?php echo $type; ?></td>
                                        <td><?php echo $ORDERID; ?></td>
                                    </tr>

                                <?php }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>