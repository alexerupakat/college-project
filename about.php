<?php  
session_start();
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
			<h1>About GetMyBus Directory</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Why Choose GetMyBus</h2>
				<p>Some of the Features of GetMyBus</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-medal"></i>
						<h3>+<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from customer")); ?> Customers</h3>
						<p>GetMyBus has more than +<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from customer")); ?> customers, who gained the advantage from us.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-help2"></i>
						<h3>H24 Support</h3>
						<p>GetMyBus has provides 24*7 support to customers. </p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-culture"></i>
						<h3>+ <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from route")); ?> Routes</h3>
						<p>GetMyBus contains <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from route")); ?>+ Routes, from where the customers can book bus from their locations.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-headphones"></i>
						<h3>Help Direct Line</h3>
						<p>GetMyBus provides good helpline service where the customers can easily get solutions for their problems.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-credit"></i>
						<h3>Secure Payments</h3>
						<p>GetMyBus has payment methods like Paytm which provides secure payments to the customers.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-chat"></i>
						<h3>Support via Chat</h3>
						<p>GetMyBus provides via chat to the customers from that they can chat with our customer service members.</p>
					</a>
				</div>
			</div>
			<!--/row-->
		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Our Origins and Story</h2>
					<p>Reasons for the development of our project</p>
				</div>
				<div class="row justify-content-between">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="img/Titlelogo.png" class="img-fluid" alt="">
						</figure>
					</div>
					<div class="col-lg-5">
						<p>Today we might find many applications and websites that will help us to book only a <strong>number of seats in a bus,</strong> GetMyBus is dedicated to booking buses for <strong>trips and other events.</strong> Users will be able to know the complete details about the bus including the images, seating capacity, tripping routes. This would ease the booking process and gives the complete details about the <strong>bus being booked remotely.</strong></p>
						<p>GetMyBus also acts as a platform for <strong>travel agencies and Private Bus owners</strong> to reach out to more people and grow their business. GetMyBus will be a boon to many colleges, organization and other groups.
						</p>
						<p><em>CEO</em></p>
					</div>
				</div>
				<!--/row-->
			</div>
			<!--/container-->
		</div>
		<!--/bg_color_1-->

		<div class="container margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Our teammates</h2>
				<p>Persons behind our successful project</p>
			</div>
			<div id="carousel" class="owl-carousel owl-theme">
				
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4>Mokshith Gowda</h4>
						</div><img src="img/Mokshith.png"  alt="">
					</a>
				</div>
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4>Mathew M G</h4>
						</div><img src="img/Mathew.jpg" alt="">
					</a>
				</div>
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4>Alex Thomas</h4>
						</div><img src="img/4_carousel.jpg" alt="">
					</a>
				</div>
				
			</div>
			<!-- /carousel -->
		</div>
		<!--/container-->
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