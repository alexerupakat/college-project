<?php
//echo $_SERVER['REQUEST_URI'];
session_start();
if(!isset($_SESSION['c_email']))
{
	$_SESSION['previous_page']=$_SERVER['REQUEST_URI'];
    header('Location:login/login.php');
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
			<h1>Chekout - Booking</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. Bus Details</h3>
					
					
					<div class="box_general summary">
						<?php  
							
				$query_bus=mysqli_query($con,"SELECT * from bus WHERE bus_id=$_GET[bus_id]") or die(mysqli_error($con));
				if(mysqli_num_rows($query_bus)){

					while($fetch_bus=mysqli_fetch_array($query_bus))
					{
						$routeid=$fetch_bus['route_id'];
						$price=$fetch_bus['price'];
						$bus_id=$fetch_bus['bus_id']; 
						?>
						<ul>
							<li>Bus ID:<span class="float-right"><b><?php echo $fetch_bus['bus_id']; ?></b></span></li>
							<li>Bus Name:<span class="float-right"><b><?php echo $fetch_bus['bus_name']; ?></b></span></li>
							<li>Bus No: <span class="float-right"><b><?php echo $fetch_bus['bus_no']; ?></b></span></li>
							<li>Seating: <span class="float-right"><b><?php echo $fetch_bus['bus_no']; ?></b></span></li>
							<li>Price: <span class="float-right"><b>&#8377;<?php echo $fetch_bus['price']; ?> per KM</b></span></li>
							<li>AC/NON AC: <span class="float-right"><b><?php 
																			if($fetch_bus['ac_or_non_ac'])
																			{
																				echo "AC";
																			}else {
																				echo "Non AC";
																			} ?></b></span></li>
							<li>Sleeper/NON: <span class="float-right"><b><?php 
																			if($fetch_bus['sleeper_or_non'])
																			{
																				echo "Sleeper";
																			}else {
																				echo "Non Sleeper";
																			} ?></b></span></li>
																			<li></li>
						</ul>
<?php
					}
				}
				?>
						
					</div>	
						<!-- /tab_1 -->
					  
						<!-- /tab_2 -->
				
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle">
						<h3>2. Route Details</h3>
						<div class="box_general summary">
						<?php  
							
				$query_route=mysqli_query($con,"SELECT * from route WHERE route_id=$routeid") or die(mysqli_error($con));
				if(mysqli_num_rows($query_route)){
					while($fetch_route=mysqli_fetch_array($query_route))
					{
						$km=$fetch_route['route_km'];
						?>
						<ul>
							<li>Source <span class="float-right"><b><?php echo $fetch_route['route_source']; ?></b></span></li>
							<li>Destination <span class="float-right"><b><?php echo $fetch_route['route_destination']; ?></b></span></li>
							<li>Total KM <span class="float-right"><b><?php echo $fetch_route['route_km']; ?></b></span></li>
							<li></li>
						</ul>
<?php
					}
				}
				?>
						
					</div>	
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
					<div class="box_general summary">
						<ul>
							<?php
							$query=mysqli_query($con,"SELECT * from customer where customer_id=$_SESSION[cid]") or die(mysqli_error($con));
				if(mysqli_num_rows($query)){
					if($fetch=mysqli_fetch_array($query))
					{
						?>
							<li>Name <span class="float-right"><b><?php echo $fetch['customer_name']; ?></b></span></li>
							<?php 
						}
					}
					?>
							<li>Date <span class="float-right"><b><?php echo $_SESSION['dateofbook']; ?></b></span></li>
							<li>Price <span class="float-right"><b>&#8377;<?php echo $price; ?></b></span></li>
							<li>Total KM <span class="float-right"><b><?php echo $km; ?></b></span></li>
							<li>Trip Days <span class="float-right"><input type="number" name="noofdays" min="1" id="days"></span></li>
							<input type="hidden" name="" id="price" value="<?php echo $price*$km; ?>">
							<li>TOTAL COST <span class="float-right" id="total"><b></b></span></li>

						</ul>
						<!-- <textarea class="form-control add_bottom_15" placeholder="Additional notes.." style="height: 100px;"></textarea>
						<div class="form-group">
								<label class="container_check">Please accepts <a target="_blank" href="#0">Terms and conditions</a>.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div> -->
						
						<button onclick="var l=$('#total').text(); window.location='payment/buy.php?bus_id=<?php echo $bus_id ?>&p='+l" class="btn_1 full-width cart">CONFIRM AND PAY</button>
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
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

  <script type="text/javascript">
  	// var a=500;
  	// var b=$('#price').val();
  	jQuery(document).ready(function($){
  	$('#total').html($('#price').val());
  	$('#days').on('keyup',function(){
    var tot = $('#price').val() * 1 + (this.value * 500 );
    $('#total').html(tot);
    console.log(tot);
});
  });
  </script>
</body>
</html>