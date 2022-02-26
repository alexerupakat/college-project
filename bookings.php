
<?php
session_start();
if(!isset($_SESSION['c_email']))
{
    header('Location:customer/login/login.php');
}
include 'includes/connection.php';
//include 'check-sms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>GetMyBus - Complete your trip.</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
   
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
	
	<div id="page">
		
<?php include 'includes/header.php'; ?>
	<!-- /header -->
		
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Bookings</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60_35">
			<div class="box_booking">
				<?php  
					$query_bus=mysqli_query($con,)
				?>
				<div class="strip_booking">
					<div class="row">
						<div class="col-lg-2 col-md-2">
							<div class="date">
								<span class="month">Dec</span>
								<span class="day"><strong>23</strong>Sat</span>
							</div>
						</div>
						<div class="col-lg-6 col-md-5">
							<h3 class="hotel_booking">Hotel Mariott Paris<span>2 Adults / 2 Nights</span></h3>
						</div>
						<div class="col-lg-2 col-md-3">
							<ul class="info_booking">
								<li><strong>Booking id</strong> 23442</li>
								<li><strong>Booked on</strong> Sat. 23 Dec. 2018</li>
							</ul>
						</div>
						<div class="col-lg-2 col-md-2">
							<div class="booking_buttons">
								<a href="#0" class="btn_2">Edit</a>
								<a href="#0" class="btn_3">Cancel</a>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /strip booking -->


				<!-- /strip booking -->


				<!-- /strip booking -->


				<!-- /strip booking -->
			</div>
			<!-- /box_booking -->
			<p class="text-right"><a href="checkout.html" class="btn_1">Checkout</a></p>
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
<?php include 'includes/footer.php'; ?>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->

	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>
	
  
</body>
</html>