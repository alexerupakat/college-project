<?php  
session_start();
include 'includes/connection.php';
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
			<h1>Media Gallery</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>

		<div class="container margin_60_35">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Here some pictures ...</h2>
				<p>Take a look at our buses.</p>
			</div>
			<div class="grid-gallery">
				<ul class="magnific-gallery">
			<?php  
				$query_bus=mysqli_query($con,"SELECT * from bus ") or die(mysqli_error($con));
				if(mysqli_num_rows($query_bus)){
					while($fetch_bus=mysqli_fetch_array($query_bus))
					{
						?>
			
					<li>
						<figure>
							<img src="admin/assets/images/bus/<?php echo $fetch_bus['img_loc']; ?>" alt="" width="25.4" height="16.9">
							<figcaption>
								<div class="caption-content">
									<a href="admin/assets/images/bus/<?php echo $fetch_bus['img_loc']; ?>" title="<?php echo $fetch_bus['bus_name'] ?>" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p><?php echo $fetch_bus['bus_name'] ?></p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
					
					

			<?php
					}
				}
				?>
								</ul>
			</div>
			<!-- /grid gallery -->
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Here some videos ...</h2>
					<p>Take a look at videos of our buses.</p>
				</div>
				
				<div class="grid-gallery">
					<ul class="magnific-gallery">

						<?php  
				$query_bus=mysqli_query($con,"SELECT * from bus ") or die(mysqli_error($con));
				if(mysqli_num_rows($query_bus)){
					while($fetch_bus=mysqli_fetch_array($query_bus))
					{
						?>
				 
						<li>
							<figure>
								<img src="admin/assets/images/bus/<?php echo $fetch_bus['img_loc']; ?>" alt="">
								<figcaption>
								<div class="caption-content">
									 <a href="https://www.youtube.com/watch?v=lTkz-PCKmgE" class="video" title="Video">
										<i class="pe-7s-film"></i>
										<p><?php echo $fetch_bus['bus_name'] ?></p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
						<?php
					}
				}
				?>
					</ul>
				</div>
				
				<!-- /grid -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
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