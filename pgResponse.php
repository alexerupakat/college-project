
<?php
session_start();
if (!isset($_SESSION['username'])) {
	echo "<script>window.location='../../login.php';</script>";
}
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>EyeWebAlysis| Payment Response</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");
require_once("../../dbconnect.php");

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
			$update_orders="UPDATE eyeweb_orders SET txn_id='".$_POST['TXNID']."',payment_mode='".$_POST['PAYMENTMODE']."',currency='".$_POST['CURRENCY']."',txn_date='".$_POST['TXNDATE']."',status='".$_POST['STATUS']."',resp_code=".$_POST['RESPCODE'].",resp_message='".$_POST['RESPMSG']."',gateway_name='".$_POST['GATEWAYNAME']."',banktxnid='".$_POST['BANKTXNID']."',bank_name='".$_POST['BANKNAME']."' WHERE order_id='".$_POST['ORDERID']."'";
			$ord_id=$_POST['ORDERID'];
			mysqli_query($con,$update_orders) or die(mysqli_error($con));
			$email_fetch=mysqli_fetch_array(mysqli_query($con,"SELECT email,user_id,txn_amount,txn_date from eyeweb_orders WHERE order_id='$ord_id'"));
			$uid=$email_fetch['user_id'];
			$date_txn=$email_fetch['txn_date'];
                    switch($email_fetch['txn_amount'])
                    {
                        case 100:$projects=20;
                        		$studies=10;
                        		$testers=5;
                               break;
                        case 1200: $projects=100;
                        		$studies=50;
                        		$testers=20;
                                break;
                        case 2200:$projects=1000;
                        		$studies=1000;
                        		$testers=50;
                                break;
                    }
                    mysqli_query($con,"UPDATE eyeweb_users SET studies=studies+$studies,projects=projects+$projects,testers=testers+$testers WHERE user_id=$uid") or die(mysqli_error($con));
			//echo $update_orders;
			//mysqli_query($con,$update_orders) or die(mysqli_error($con));
		?>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">SUCCESS</h2>
        <img src="../../assets/images/check-true.png" class="img-responsive col-md-4 col-sm-4 col-lg-2">
        <h3>Dear, <?php echo $_SESSION['name']; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for Purchasing the package. Please Feel happy to upload as much as designs and create new studies. Invoice will be sent to your Mail ID shortly.</p>
        <h4>ORDER ID: <strong>#<?php echo $_POST['ORDERID']; ?></strong></h4>
        <h4>Transaction ID: <strong><?php echo $_POST['TXNID']; ?></strong></h4>
        <a href="../dashboard.php" class="btn btn-success">Continue to Dashboard </a>
    <br><br>
        </div>  
	</div>
</div>
		<?php
		include 'payment_mail.php';
		$name=substr($email_fetch['email'], 0, 6);
		payment_mail($email_fetch['email'],$ord_id,$email_fetch['txn_amount'],$name,$date_txn);
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		$update_orders="UPDATE eyeweb_orders SET txn_id='".$_POST['TXNID']."',payment_mode='FAILED',currency='".$_POST['CURRENCY']."',txn_date='".date('Y-m-d H:i:s')."',status='".$_POST['STATUS']."',resp_code=".$_POST['RESPCODE'].",resp_message='".$_POST['RESPMSG']."',gateway_name='FAILED',banktxnid='FAILED',bank_name='FAILED' WHERE order_id='".$_POST['ORDERID']."'";
		mysqli_query($con,$update_orders) or die(mysqli_error($con));
		//echo $update_orders;
		//echo "<b>Transaction status is failure</b>" . "<br/>";
		?>
		<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">FAILED</h2>
        <img src="../../assets/images/check-false.png" class="img-responsive col-md-2 col-sm-2 col-lg-4">
        <h3>Dear, <?php echo $_SESSION['name']; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Sorry, The Transaction was failed!! Because, <?php echo $_POST['RESPMSG']; ?></p>
        <a href="../../index.php" class="btn btn-success">Continue to Dashboard </a>
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
else {
echo "<script>window.location='../../404.php';</script>";
	//Process transaction as suspicious.
}

?>
</body>
</html>