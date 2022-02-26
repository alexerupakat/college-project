<?php  
session_start();
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
<?php include 'includes/header-2.php'; ?>
	
	<main>
		<section class="hero_single version_4">
			<div class="wrapper">
				<div class="container">
					<h3>Find what you need!</h3>
					<p>Discover your desired buses and complete your trip</p>
					<form method="post" action="listing.php">
						<div class="row no-gutters custom-search-input-2">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">

									<select class="form-control wide" name="from_route" required="">
										<option>---From---</option>
										<?php 
											$query=mysqli_query($con,"SELECT * FROM route") or die(mysqli_error($con));
                                            if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['route_source']; ?>"><?php echo $row['route_source']; ?></option>
                                            <?php
                                            }
                                            }
										 ?>
									</select>
									
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<select class="form-control wide" required="" name="to_route">
										<option>---To---</option>
										<?php 
											$query=mysqli_query($con,"SELECT * FROM route") or die(mysqli_error($con));
                                            if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['route_destination']; ?>"><?php echo $row['route_destination']; ?></option>
                                            <?php
                                            }
                                            }
										 ?>
									</select>
									
								</div>
							</div>
							<?php include 'includes/connection.php'; ?>
							<div class="col-lg-3">
								<input type="date" class="wide form-control" id="datefield" name="date_of_book"> 
							</div>
							<div class="col-lg-2">
								<input type="submit" value="Search" name="search_bus">
							</div>
							
						</div>
						<!-- /row -->
					</form>
					<ul class="counter">
					
						<li><strong><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from route")); ?></strong> Routes</li>
						<li><strong><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from customer")); ?></strong> Customer</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- /hero_single -->	

		<div class="container-fluid margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular listings</h2>
				<p>Most popular buses</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php  
				$query_bus=mysqli_query($con,"SELECT bus.*,route.* from bus,route where bus.route_id=route.route_id limit 1,10") or die(mysqli_error($con));
				if(mysqli_num_rows($query_bus)){
					while($fetch_bus=mysqli_fetch_array($query_bus))
					{
						?>
						<div class="item"> 
					<div class="strip grid">
						<figure>
							
							<img src="admin/assets/images/bus/<?php echo $fetch_bus['img_loc']; ?>" class="img-fluid" alt="" width="400" height="266">
							<small><?php echo $fetch_bus['bus_name']; ?></small>
						</figure>
						<div class="wrapper">
							<h3><b><?php echo $fetch_bus['bus_name']; ?></b></h3>
							<p>Seating Capacity:  <span class="float-right"><b><?php echo $fetch_bus['seating']; ?> </b></span><br>
							Price: <span class="float-right"><b>&#8377;<?php echo $fetch_bus['price']; ?> per KM</b></span>
							<br>AC/NON AC: <?php if($fetch_bus['ac_or_non_ac']) { ?><span class="float-right"><b>AC</b></span>  <?php } else { ?> <span class="float-right"><b> NON AC</b></span> <?php }
							 ?><br>Sleeper/Non: <?php if($fetch_bus['sleeper_or_non']) { ?><span class="float-right"><b>SLEEPER</b></span>  <?php } else { ?> <span class="float-right"><b> NON SLEEPER</b></span> <?php }
							 ?>
							<br>From:<span class="float-right"><b><?php echo $fetch_bus['route_source']; ?> </b></span>
							 <br>To:<span class="float-right"><b><?php echo $fetch_bus['route_destination']; ?> </b></span><br></p></p>
						</div>
						<ul>
							<li><span class="loc_open">Now Open</span></li>
							<li><div ><span><em></em></span><strong></strong></div></li>
						</ul>
					</div>
				</div>
						<?php
					}
				}
				?>
				
				<!-- /item -->
				
			</div>
			<!-- /carousel -->
			<div class="container">
				<div class="btn_home_align"><a href="listing1.php" class="btn_1 rounded">View all</a></div>
			</div>
			<!-- /container -->
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Popular Categories</h2>
					<p>Our categories.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-6">
						<a  class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="img/icon_home_1.svg" width="65" height="65" alt="">
							<h3>Travel Agency</h3>
							<ul>
								<li><strong><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from travel_agency")); ?></strong>Travel Agency</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a  class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="img/icon_home_2.svg" width="65" height="65" alt="">
							<h3>Buses</h3>
							<ul class="clearfix">
								<li><strong><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from bus")); ?></strong>Buses</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a  class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="img/icon_home_3.svg" width="65" height="65" alt="">
							<h3>Routes</h3>
							<ul class="clearfix">
								<li><strong><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from route")); ?></strong>Buses</li>
							</ul>
						</a>
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->	
		</div>
		<!-- /bg_color_1 -->
		
		
					<!-- /row -->
					
				</div>
			</div>
			<!-- /wrapper -->
		</div>
		<!--/call_section-->
	</main>
	<!-- /main -->

	<?php include 'includes/footer.php'; ?>
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>
	<script type="text/javascript">
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
 		if(dd<10){
        		dd='0'+dd
    		} 
    		if(mm<10){
        		mm='0'+mm
    		} 

			today = yyyy+'-'+mm+'-'+dd;
			document.getElementById("datefield").setAttribute("value", today);
document.getElementById("datefield").setAttribute("min", today);

	</script>
</body>
</html>