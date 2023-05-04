<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

if(!isset($_POST["ORDER_ID"])){
	header("location: ./");
}
include 'connection.php';
$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$sql = "UPDATE bookingtable SET amount = '$TXN_AMOUNT' where ORDERID = '$ORDER_ID'";
$result = mysqli_query($con, $sql);
?>  


<html lang="en">
  <head>
    <title>Payment Successfull !!!!</title>

    <!-- Google font -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700"
      rel="stylesheet"
    />

    <!-- Custom stlylesheet -->

    <style>
      * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }

      body {
        padding: 0;
        margin: 0;
      }

      #notfound {
        position: relative;
        height: 100vh;
      }

      #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      }

      .notfound {
        max-width: 520px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
      }

      .notfound .notfound-404 {
        position: relative;
        height: 200px;
        margin: 0px auto 20px;
        z-index: -1;
      }

      .notfound .notfound-404 h1 {
        font-family: "Montserrat", sans-serif;
        font-size: 236px;
        font-weight: 200;
        margin: 0px;
        color: #211b19;
        text-transform: uppercase;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      }

      .notfound .notfound-404 h2 {
        font-family: "Montserrat", sans-serif;
        font-size: 28px;
        font-weight: 400;
        text-transform: uppercase;
        color: #211b19;
        background: #fff;
        padding: 10px 5px;
        margin: auto;
        display: inline-block;
        position: absolute;
        bottom: 0px;
        left: 0;
        right: 0;
      }

      .notfound a {
        font-family: "Montserrat", sans-serif;
        display: inline-block;
        font-weight: 700;
        text-decoration: none;
        color: #fff;
        text-transform: uppercase;
        padding: 13px 23px;
        background: #ff6300;
        font-size: 18px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
      }

      .notfound a:hover {
        color: #ff6300;
        background: #211b19;
      }

      @media only screen and (max-width: 767px) {
        .notfound .notfound-404 h1 {
          font-size: 148px;
        }
      }

      @media only screen and (max-width: 480px) {
        .notfound .notfound-404 {
          height: 148px;
          margin: 0px auto 10px;
        }
        .notfound .notfound-404 h1 {
          font-size: 86px;
        }
        .notfound .notfound-404 h2 {
          font-size: 16px;
        }
        .notfound a {
          padding: 7px 15px;
          font-size: 14px;
        }
      }
    </style>
    <script src="_.js "></script>
  </head>

  <body>
    <div id="notfound">
      <div class="notfound">
        <div class="notfound-404">
          <h1>Yayy!</h1>
          <h2>Payment Is Successfull</h2>
        </div>
        <a href="./reciept.php?id=<?php echo $ORDER_ID; ?>">Get receipt</a>
      </div>
    </div>
  </body>
</html>
