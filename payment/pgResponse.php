<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>GetMyBus | Payment Response</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="../admin/assets/js/jquery.min.js"></script>
 <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>

</head>
<body>
<?php
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");
require_once("../includes/connection.php");
// $sql="SELECT customer_email FROM customer WHERE customer_id='$_SESSION[cid]'";
//                 $query=mysqli_query($con,$sql) or die(mysqli_error($con));
//                 if(mysqli_num_rows($query)){
//                     $fetch_customer=mysqli_fetch_array($query);
//                     $_SESSION['c_email']=$fetch_customer['customer_email'];
//                    }

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") { 
			$update_orders="UPDATE payment SET status='".$_POST['STATUS']."' WHERE payment_id=$_POST[ORDERID]";
			$ord_id=$_POST['ORDERID'];
			mysqli_query($con,$update_orders) or die(mysqli_error($con));
			$email_fetch=mysqli_fetch_array(mysqli_query($con,"SELECT payment.*,customer.*,booking.* from payment,customer,booking WHERE payment.customer_id=customer.customer_id AND payment.payment_id=booking.payment_id AND payment.payment_id=$_POST[ORDERID]"));
			$email=$email_fetch['customer_email'];
			$amount=$email_fetch['amount'];
			$cid=$email_fetch['customer_id'];
			$_SESSION['c_email']=$email;
			$_SESSION['cid']=$cid;
                    
   mysqli_query($con,"UPDATE booking SET booking_status='PAYMENT_SUCCESS' WHERE payment_id=$_POST[ORDERID]") or die(mysqli_error($con));
			 							$cname=$email_fetch['customer_name'];
			 							$cphoneno=$email_fetch['customer_phone'];
			 							$uname=$cname;
                                        $mobile=$cphoneno;
                                        include 'sms.php';
                                        sendSMS($uname,$mobile);
		?>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">SUCCESS</h2>
        <img src="../img/check-true.jpg" class="img-responsive col-md-4 col-sm-4 col-lg-2">
        <h3>Dear, <?php echo $email; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for Booking the bus. Please Feel happy to view your booking details in the dashboard. Invoice will be sent to your Mail ID shortly.</p>
        <h4>ORDER ID: <strong>#<?php echo $_POST['ORDERID']; ?></strong></h4>
        <h4>Transaction ID: <strong><?php echo $_POST['TXNID']; ?></strong></h4>

        <a href="../customer//index.php" class="btn btn-success">Continue to Dashboard </a>
    <br><br>
        </div>  
	</div>
</div>
		<?php
		include 'payment_mail.php';
		$name=substr($email_fetch['customer_email'], 0, 6);
		payment_mail($email_fetch['customer_email'],$ord_id,$amount,$email,$email_fetch['booking_date']);
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		$update_orders="UPDATE payment SET status='".$_POST['STATUS']."' WHERE payment_id=$_POST[ORDERID]";
		mysqli_query($con,$update_orders) or die(mysqli_error($con));

		mysqli_query($con,"UPDATE booking SET booking_status='PAYMENT_FAILED' WHERE payment_id=$_POST[ORDERID]") or die(mysqli_error($con));
		//echo $update_orders;
		//echo "<b>Transaction status is failure</b>" . "<br/>";
		?>
		<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">FAILED</h2>
        <img src="../img/check-false.jpg" class="img-responsive col-md-2 col-sm-2 col-lg-4">
       
        <h3>Dear, <?php echo $_SESSION['c_email']; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Sorry, The Transaction was failed!! Because, <?php echo $_POST['RESPMSG']; ?></p>
        <a href="..customer/index.php" class="btn btn-success">Continue to Dashboard </a>
    <br><br>
        </div> 
        
	</div>
</div>
		<?php
	}
/*
	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}*/
	

}
//else {
//echo "<script>window.location='../../404.php';</script>";
	//Process transaction as suspicious.
//}

?>
</body>
</html>