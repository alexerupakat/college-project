<?php 
session_start();
if(!isset($_SESSION['c_email']))
{
	header('login.php');
}
else
{
	include 'includes/connection.php';
	$ORDER_ID="ORDRID" . rand(10000,99999999);
	$CUST_ID=$_SESSION['uid'];
	$INDUSTRY_TYPE_ID='Retail';
	$CHANNEL_ID='WEB';
	$TXN_AMOUNT=0;
	$email_id='';
	$PACKAGE_TYPE='';
	$STUDIES=0;
	$PROJECTS=0;
	$TESTERS=0;
	$error='<div class="alert alert-primary" role="alert">
  This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>';
	if(isset($_REQUEST['pack_id']) && $_REQUEST['pack_id']!='')
	{
		$pack_id=mysqli_real_escape_string($con,$_REQUEST['pack_id']);
		if($pack_id==1 || $pack_id==2 || $pack_id==3)
		{
			switch($pack_id)
			{
				case 1: $TXN_AMOUNT=100;
						$PACKAGE_TYPE='BEGINNER';
						$STUDIES=10;
						$TESTERS=5;
						$PROJECTS=20;
						break;
				case 2: $TXN_AMOUNT=1200;
						$PACKAGE_TYPE='GROWTH';
						$STUDIES=50;
						$TESTERS=15;
						$PROJECTS=100;
						break;

				case 3:$TXN_AMOUNT=2200;
						$PACKAGE_TYPE='MASSIVE';
						$STUDIES='UNLIMITED';
						$TESTERS='UNLIMITED';
						$PROJECTS='UNLIMITED';
						break;
				default: exit();
			}
			//The url you wish to send the POST request to
			//header('Location:pgRedirect.php?ORDER_ID='.$ORDER_ID.'&CUST_ID='.$CUST_ID.'&INDUSTRY_TYPE_ID='.$INDUSTRY_TYPE_ID.'&CHANNEL_ID='.$CHANNEL_ID.'&TXN_AMOUNT='.$TXN_AMOUNT.'&EMAIL='.$EMAIL);
/*
			//The data you want to send via POST
			$fields = [
    'ORDER_ID' => $ORDER_ID,
    'CUST_ID' => $CUST_ID,
    'INDUSTRY_TYPE_ID'=>$INDUSTRY_TYPE_ID,
    'CHANNEL_ID'=>$CHANNEL_ID,
    'TXN_AMOUNT'=>$TXN_AMOUNT,
    'EMAIL'=>$email_id,
];*/
//HTTPPOST($url,$fields);
?>

 <link href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/tester/assets/icons/font-awesome/css/font-awesome.min.css">
<div class="container mt-5">
    <h2 class="text-center"><a href="../../index.php" style="text-decoration: none;">EyeWebAlysis</a> Checkout Confirmation</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-20 pt-20">


                    <!--Form with header-->

                    <form action="pgRedirect.php" method="POST">
                    	<input type="hidden" class="form-control" name="ORDER_ID" value="<?php echo $ORDER_ID; ?>">
                    	<input type="hidden" class="form-control" name="CUST_ID" value="<?php echo $CUST_ID; ?>">
                    	<input type="hidden" class="form-control" name="INDUSTRY_TYPE_ID" value="<?php echo $INDUSTRY_TYPE_ID; ?>">
                    	<input type="hidden" class="form-control" name="CHANNEL_ID" value="<?php echo $CHANNEL_ID; ?>">
                    	<input type="hidden" class="form-control" name="TXN_AMOUNT" value="<?php echo $TXN_AMOUNT; ?>">
                        <input type="hidden" class="form-control" name="PACK_TYPE" value="<?php echo $pack_id; ?>">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-success text-white text-center py-2">
                                    
                                    <p class="m-2">Please Check Your Package Details</p>
                                </div>
                            </div>
                            <div class="card-body p-3 text-center">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-danger"></i></div>
                                        </div>
                                        <p class="m-2">PACKAGE TYPE : <strong><?php echo $PACKAGE_TYPE; ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-file text-success"></i></div>
                                        </div>
                                       <p class="m-2">NO. OF STUDIES : <strong><?php echo $STUDIES; ?></strong></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-images text-success"></i></div>
                                        </div>
                                        <p class="m-2">NO. OF PROJECTS : <strong><?php echo $PROJECTS; ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lightbulb text-success"></i></div>
                                        </div>
                                        <p class="m-2">VALIDITY : <strong>UNLIMITED</strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-rupee-sign text-danger"></i></div>
                                        </div>
                                        <p class="m-2">AMOUNT : <strong><?php echo $TXN_AMOUNT; ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-success"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="EMAIL" placeholder="abc@xyz.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-success"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="MSISDN" placeholder="ENTER MOBILE NUMBER" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Checkout" class="btn btn-success px-4">
                                    <input type="button" value="Change Package" class="btn btn-warning px-4" onclick="window.location='../../pricing.php';">
                                    <input type="button" value="Cancel" class="btn btn-danger px-4" onclick="window.location='../../index.php';">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
<?php
		}else
		{
			header('Location:../../404.php');
		}
	}
	else
	{
		header('Location:../../404.php');
	}
}
 ?>
