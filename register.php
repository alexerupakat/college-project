<?php
session_start();
if(isset($_SESSION['c_email']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<?php include 'includes/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>GetMyBus - Complete your trip</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
   

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	<!-- <script src="jquery-3.4.1.min.js"></script> -->
	<script src="js/pw_strenght.js"></script>
	<script src="sweetalert2.all.min.js"></script>
</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.html"><img src="img/logo.png" width="250" height="50" alt="" class="logo_sticky"></a>
			</figure>
			<div class="form-group">
			
		</div>
			<form class="" action="" method="POST" form-validation="on">
				<div class="form-group">
					<label>Your Name</label>
					<input class="form-control" type="text" name="cname" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Enter valid name between 2-20 letters" class="form-input">
					<i class="ti-user"></i>
				</div>
				
				<div class="form-group">
					<label>Your Email</label>
					<input class="form-control" type="email" name="cemail" class="form-input">
					<i class="icon_mail_alt"></i>
				</div>

				<div class="form-group">
					<label>Your Phone Number</label>
					<input class="form-control" type="number" name="cphoneno" pattern="[\+]\d{2}[\-]\d{10}" title="Enter valid Phone Number" minlength="10" maxlength="10">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your password</label>
					<input class="form-control" type="password" id="password1">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Confirm password</label>
					<input class="form-control" type="password" id="password2" name="cpassword">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Your Address</label>
					<input class="form-control" type="textarea" name="caddress">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your State</label>
					<input class="form-control" type="text" name="cstate">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your City</label>
					<input class="form-control" type="text" name="ccity">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Your Pincode</label>
					<input class="form-control" type="number" name="cpincode" minlength="6" maxlength="6">
					<i class="ti-user"></i>
				</div>
				<div class="form-group row ">
					<div class="col-lg-6">
					<button type="submit" class="btn btn-pink waves-effect waves-light" name="register">
                                                            Register
                                                        </button>
                                                        </div>
                                                        <div class="col-lg-6">
					<button type="reset" class="btn btn-pink waves-effect waves-light" name="cancel">
                                                            Cancel
                                                        </button>
                                                        </div>
                                                       
				</div> 
				<?php  
                                if(isset($_POST['register'])){
                                $cname=mysqli_real_escape_string($con,$_POST['cname']);
                                $cemail=mysqli_real_escape_string($con,$_POST['cemail']);
                                $cphoneno=mysqli_real_escape_string($con,$_POST['cphoneno']);
                                $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
                                $caddress=mysqli_real_escape_string($con,$_POST['caddress']);
                                $cstate=mysqli_real_escape_string($con,$_POST['cstate']);
                                $ccity=mysqli_real_escape_string($con,$_POST['ccity']);
                                $cpincode=mysqli_real_escape_string($con,$_POST['cpincode']);

                                

                                    $sql="INSERT INTO customer (customer_name,customer_email,customer_phone,customer_password,customer_address,customer_state,customer_city,customer_pincode) VALUES ('$cname','$cemail','$cphoneno','$cpassword','$caddress','$cstate','$ccity',$cpincode)";
                                   
                                    $insert_customer=mysqli_query($con,$sql);
                                    if($insert_customer){
                                    	$_SESSION['c_email']=$cemail;
                                    	include 'check-sms.php';
                                    	sendSMS($cphoneno,$cname." You are successfully registered to GetMyBus");
                                        ?>
					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'success',
							 title: 'Success!',
							 text: 'You successfully Registered'
                    	}).then((result) => {
                    		window.location='index.php';
                    	});
                    </script>
                    <?php          
                                                   
                                    }
                                    else
                                        {   
                                            ?>
					
					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'warning',
							 title: 'Oops!',
							 text: 'Something went wrong!!'
                    	}).then((result) => {
                    		window.location='register.php';
                    	});
                    </script>
                    <?php      
                                        }
                            }
                            ?>

				<!-- <div id="pass-info" class="clearfix"></div>
				<a href="#0" class="btn_1 rounded full-width add_top_30">Register Now!</a> -->
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
			</form>
			<div class="copy">© <?php echo date('Y'); ?> GetMyBus</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	
	
  
</body>
</html>