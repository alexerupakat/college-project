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
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>

<body>
	
	<div id="page">
		
<?php include 'includes/header.php'; ?>
	<!-- /header -->
	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Contacts Sparker</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
		
	<main>
		
		<!-- /map -->
		<div class="container margin_60_35">
			<div class="row justify-content-center">
				
				<div class="col-xl-5 col-lg-6 pr-xl-5">
					<div class="main_title_3">
						<span></span>
						<h2>Send us a message</h2>
						<p>Send us the message.</p>
					</div>
					<div id="message-contact"></div>
						<form method="post" action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" id="name_contact" name="name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Last name</label>
										<input class="form-control" type="text" id="lastname_contact" name="lastname">
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="email" id="email_contact" name="email">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<input class="form-control" type="text" id="phone_contact" name="phone">
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" id="message_contact" name="message" style="height:150px;"></textarea>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Are you human? 3 + 1 =</label>
										<input class="form-control" type="text" id="verify_contact" name="verify_contact">
									</div>
								</div>
							</div>
							<p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" name="submit"></p>
						</form>
						<?php  
                                if(isset($_POST['submit'])){
                                $name=mysqli_real_escape_string($con,$_POST['name']);
                                $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
                                $email=mysqli_real_escape_string($con,$_POST['email']);
                                $phone=mysqli_real_escape_string($con,$_POST['phone']);
                                $message=mysqli_real_escape_string($con,$_POST['message']);
                                $number=mysqli_real_escape_string($con,$_POST['verify_contact']);
                                if(empty($name) || empty($lastname) || empty($email) || empty($phone) || empty($phone))
                                {
                                	?>
                                    <script>
                        				Swal.fire({
                             				icon: 'warning',
                             				title: 'Oops!',
                             				text: 'Please Enter all details!!'
                        				}).then((result) => {
                            				window.location='contacts.php';
                        				});
                    				</script>
                    				<?php  
                    				} 
                    				elseif($number!=4)
                    				{
                    					?>
                                    <script>
                        				Swal.fire({
                             				icon: 'error',
                             				title: 'Oops!',
                             				text: 'Invalid Answer!!'
                        				}).then((result) => {
                            				window.location='contacts.php';
                        				});
                    				</script>
                    				<?php  
                    				}
                    				else
                   					{ 
										$sql="INSERT INTO newsletter (name,last_name,email,phone,message) VALUES ('$name','$lastname','$email',$phone,'$message')";
										// echo $sql;
                                        $insert=mysqli_query($con,$sql);
                                    	if($insert)
                                    	{
                                         	?>
                                         	<script>
                        					Swal.fire(
											{
                             					icon: 'success',
                             					title: 'Success!',
					                            text: 'Message sent successfully!!'
					                        }).then((result) => {
					                            window.location='contacts.php';
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
                            window.location='contacts.php';
                        });
                    </script>
                    <?php     
                                        }
                            } }
                            ?>
				</div>
				<div class="col-xl-5 col-lg-6 pl-xl-5">
					<div class="box_contacts">
						<i class="ti-support"></i>
						<h2>Need Help?</h2>
						<a href="#0">+91 6363561765</a> - <a href="#0">getmybuswebsite@gmail.com</a>
					</div>
					<div class="box_contacts">
						<i class="ti-help-alt"></i>
						<h2>Questions?</h2>
						<a href="#0">+91 6363561765</a> - <a href="#0">getmybuswebsite@gmail.com</a>
					</div>
					<div class="box_contacts">
						<i class="ti-home"></i>
						<h2>Address</h2>
						<a href="#0">The Softbincoder<br>RK complex<br>Bolwar,Puttur.</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
<?php include 'includes/footer.php'; ?>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>

	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/mapmarker.jquery.js"></script>
	<script src="js/mapmarker_func.jquery.js"></script>
  
</body>
</html>