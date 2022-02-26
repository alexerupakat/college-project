<?php 
session_start();
include 'includes/connection.php'; 


if(!isset($_SESSION['c_email']))
{
    header('Location:login/login.php');
}
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
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
<link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
<script src="jquery-3.4.1.min.js"></script>
      <script src="sweetalert2.all.min.js"></script>
  </head>

  <body class="light-sidebar-nav">

  <section id="container">
      <!--header start-->
      <?php include 'includes/header.php'; ?>
      <!--header end-->
      <!--sidebar start-->
      <?php include 'includes/slidebar.php'; ?>
              <!-- sidebar menu end-->

          </div>

      </aside>

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
                           <div class="row">
                            
                            <?php
              $query=mysqli_query($con,"SELECT * from customer where customer_id=$_SESSION[cid]") or die(mysqli_error($con));
        if(mysqli_num_rows($query)){
          if($fetch=mysqli_fetch_array($query))
          {
              
               
               ?>
                  <aside class="profile-nav col-lg-3">
                      <section class="card">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/profile-avatar1.png" alt="" >
                              </a>
                              
               <h1><?php echo $fetch['customer_name']; ?></h1>
                              <p><?php echo $fetch['customer_email']; ?></p>
               
                              
                          </div>
                        <?php } }?>

                          <ul class="nav nav-pills nav-stacked">
                              <li class=" nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              
                              <li class="active nav-item"><a class="nav-link" href="profile-edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>

                  <aside class="profile-info col-lg-9">
                      
                      <section class="card">
                          
                          <div class="card-body bio-graph-info">
                              
                        <div class="row">
                  
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                            
                          <div class="panel-body bio-graph-info">
                              <h1> Profile Info</h1>

                              <?php 
                                $query=mysqli_query($con,"SELECT * FROM customer WHERE customer_id=$_SESSION[cid]");
                                                        if(mysqli_num_rows($query))
                                                        {
                                                            $fetch_customer=mysqli_fetch_array($query);
                                                        }
                               ?>
                              <form class=""  method="POST">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Name</label>
                                      <div class="col-lg-10">
                                          <input type="text" class="form-control" name="name" value="<?php echo $fetch_customer['customer_name'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="email" class="form-control" name="email" value="<?php echo $fetch_customer['customer_email'] ?>">
                                      </div>
                                  </div> 
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Phone No</label>
                                      <div class="col-lg-6">
                                          <input type="number" class="form-control" name="phoneno" value="<?php echo $fetch_customer['customer_phone'] ?>" maxlength="10" minlength="10">
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Address</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="address" value="<?php echo $fetch_customer['customer_address'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">State</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="state" value="<?php echo $fetch_customer['customer_state'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">City</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" name="city" value="<?php echo $fetch_customer['customer_city'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Pincode</label>
                                      <div class="col-lg-6">
                                          <input type="number" class="form-control" name="pincode" value="<?php echo $fetch_customer['customer_pincode'] ?>">
                                      </div>
                                  </div>
                                 

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" name="btn" class="btn btn-success">Save</button>
                                          
                                      </div>
                                  </div>
                              </form>
                              <?php
                              if(isset($_POST['btn'])){
                                    
                                $name=mysqli_real_escape_string($con,$_POST['name']);
                                $email=mysqli_real_escape_string($con,$_POST['email']);
                                $phoneno=mysqli_real_escape_string($con,$_POST['phoneno']);
                                $address=mysqli_real_escape_string($con,$_POST['address']);
                                $state=mysqli_real_escape_string($con,$_POST['state']);
                                $city=mysqli_real_escape_string($con,$_POST['city']);
                                $pincode=mysqli_real_escape_string($con,$_POST['pincode']);

                                

                                    $sql="UPDATE customer SET customer_name='$name',customer_email='$email',customer_phone=$phoneno,customer_address='$address',customer_state='$state',customer_city='$city',customer_pincode='$pincode' WHERE customer_id=$_SESSION[cid]";
                                   
                                    $update_customer=mysqli_query($con,$sql);
                                    if($update_customer){
                                        
                                        include '../check-sms.php';
                                        sendSMS($cphoneno,$cname." You are successfully registered to GetMyBus");
                                        ?>
                                       
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Update Successfull'
                        }).then((result) => {
                            window.location='profile-edit.php';
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
                            window.location='profile-edit.php';
                        });
                    </script>
                    <?php      
                                        }
                            }
                            ?>
                          </div>
                      </section>
                      
                  </aside>
              </div>
      <!--main content end-->

      <!-- Right Slidebar start -->
      
      <!-- Right Slidebar end -->

      <!--footer start-->
      <?php include 'includes/footer.php'; ?>
      <!--footer end-->
  </section>
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
        autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>
</html>
