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
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>

<body id="login_bg">
	 
	<nav id="menu" class="fake_menu"></nav>

	
	<div id="login" >

		<aside>
			<figure>
                <br>
        <br>
        <br>
        <br>
        <br>
				<a href="index.php"><img src="img/logo.png" width="200" height="50" alt="" class="logo_sticky"></a>
			</figure>
			<div class="login-wrap">
			
		
			  <form class="" action="" method="GET">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="form-group row ">
					<div class="col-lg-12">
					<center><button type="submit" class="btn btn-pink waves-effect waves-light" name="login">  Login</button></center>
                                                        </div>
                                                        
                                                       
				</div>
				<?php  
            if(isset($_GET['login']))
            {
                $email=$_GET['email'];
                $password=$_GET['password'];
                if(empty($email))
                {
                     ?>

                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Oops!',
                             text: 'Please Enter Email!!'
                        }).then((result) => {
                            window.location='login.php';
                        });
                    </script>
                    <?php     
                }
                elseif(empty($password)){
                    ?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Oops!',
                             text: 'Please Enter Password!!'
                        }).then((result) => {
                            window.location='login.php';
                        });
                    </script>
                    <?php     
                }else{
                $sql="SELECT customer_email,customer_password,customer_id FROM customer WHERE customer_email='$email' AND customer_password='$password'";
                $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                if(mysqli_num_rows($query)){
                    $fetch_customer=mysqli_fetch_array($query);
                    $_SESSION['cid']=$fetch_customer['customer_id'];
                    $_SESSION['c_email']=$email;
                    ?>
					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'success',
							 title: 'Success!',
							 text: 'You successfully Logged in'
                    	}).then((result) => {
                    		window.location='index.php';
                    	});
                    </script>
                    <?php                   
                }else
                {
                    ?>
					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'warning',
							 title: 'Oops!',
							 text: 'Something went wrong!!'
                    	}).then((result) => {
                    		window.location='login.php';
                    	});
                    </script>
                    <?php            
                }

            }
            }
            ?>
            </div>
				<div class="text-center add_top_10">New to getmybus? <strong><a href="register.php">Sign up!</a></strong></div>
				<div class="copy">© <?php echo date('Y'); ?> GetMyBus </div> 
			</form>
			
		</aside>
	</div>
	<!-- /login -->
    
		
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>
  
</body>
</html>