<?php  
session_start();
?>
<?php include 'includes/connection.php'; ?>
<?php   
if(isset($_POST['search_bus']) && !empty($_POST['search_bus']))
{
	$from_route=mysqli_real_escape_string($con,$_POST['from_route']);
	$to_route=mysqli_real_escape_string($con,$_POST['to_route']);
	$date_of_book=mysqli_real_escape_string($con,$_POST['date_of_book']);
	$_SESSION['dateofbook']=$date_of_book;
	$query_bus="SELECT bus.*,route.* from bus,route where route.route_source='$from_route' AND route.route_destination='$to_route' AND bus.route_id=route.route_id";
	
}
else
{ 
	//echo"here";
	$query_bus="SELECT bus.*,route.* FROM bus,route WHERE route.route_id = bus.route_id";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GetMyBus - Complete your trip.</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
   <!--  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

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
	
	<main>
		<div id="results">
		   <div class="container">
			   <div class="row">
				   <div class="col-lg-3 col-md-4 col-10">
					   <h4><strong><?php echo mysqli_num_rows(mysqli_query($con,$query_bus)); ?></strong> result for All listing</h4>
				   </div>
				
			   </div>
			   <!-- /row -->
		   </div>
		   <!-- /container -->
	   </div>
		
	   	<!-- /results -->		
		
		<!-- /filters -->
		
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- /Map -->
		

		<!-- /Filters -->

		<div class="container margin_60_35">
			
			<div class="row">
				<?php  
				$query1_bus=mysqli_query($con,$query_bus) or die(mysqli_error($con));
				if(mysqli_num_rows($query1_bus)){
					while($fetch_bus=mysqli_fetch_array($query1_bus))
					{
						?>
				<div class="col-xl-4 col-lg-6 col-md-6"> 
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
							<!-- <li><a href="checkout.php?bus_id=<?php echo $fetch_bus['bus_id']; ?>" class="btn_add">BOOK</a></li> -->

							<li><div ><span><em></em></span><strong></strong></div></li>
						</ul>
					</div>
				</div>
				</div>
				<!-- /strip grid -->
				<?php
					}
				}
				else
				{
					?>
					<div class="col-md-12">
						<h4 class="text-center">No Buses Found!</h4>
					</div>
					<?php
				}
				?>
			</div>
			<!-- /row -->
			
			
			
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

	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/markerclusterer.js"></script>
	<script src="js/map.js"></script>
	<script src="js/infobox.js"></script>
  
</body>
</html>