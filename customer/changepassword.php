<?php 
session_start();
include 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>GetMyBus - Complete your trip.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

<script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
</head>

  <body class="login-body">

    <div class="container"> 

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Change Password</h2>
        <div class="login-wrap">
          <h6>Old Password</h6>
            <input type="password" class="form-control" placeholder="Enter Old Password" autofocus name="oldpassword" autofocus>
        </div>
                  <div class="login-wrap">
                     <h6>New Password</h6>
                    <div>
                                                        <input type="password" id="pass2" class="form-control" required
                                                               placeholder="Password"/ >
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="password" class="form-control" required
                                                               data-parsley-equalto="#pass2"
                                                               placeholder="Re-Type Password" name="password">
                                                    </div>
            
            
                  </div>
                  <div><button class="btn btn-lg btn-login btn-block" type="submit" name="btn">Submit</button></div>
              </div>
          </div>
          <!-- modal -->

      </form>
<?php  
            if(isset($_POST['btn']))
            {
                $oldpassword=$_POST['oldpassword'];
                $password=$_POST['password'];
                
                
                if ($oldpassword==$password) {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Old password and New password are same!!'
                        }).then((result) => {
                            window.location='changepassword.php';
                        });
                    </script>
                    <?php
                }
                else{
                $sql="UPDATE customer SET customer_password='$password' WHERE customer_id=$_SESSION[cid]";
                                    $update_password=mysqli_query($con,$sql);
                                    if($update_password){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Done!',
                             text: 'Your password is updated!!'
                        }).then((result) => {
                            window.location='includes/logout.php';
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
                             icon: 'error',
                             title: 'Oops!',
                             text: 'Something went wrong!!'
                        }).then((result) => {
                            window.location='changepassword.php';
                        });
                    </script>
                    <?php
                }            }
            }
            ?>
    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


  </body>
</html>
