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
  </head>

  <body class="light-sidebar-nav">

  <section id="container">
      <!--header start-->
      <?php include 'includes/header.php'; ?>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
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

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                              <!-- <li class="nav-item"><a class="nav-link" href="profile-activity.php"> <i class="fa fa-calendar"></i> Recent Activity <span class="badge badge-danger pull-right r-activity">9</span></a></li> -->
                              <li class="nav-item"><a class="nav-link" href="profile-edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>

                  <aside class="profile-info col-lg-9">
                      
                      <section class="card">
                          
                          <div class="card-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                <div class="bio-row">
                                      <p><span>Customer ID</span>: <b><?php echo $fetch['customer_id']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer Name </span>: <b><?php echo $fetch['customer_name']; ?>  </b></p>                                  </div>
                                  
                                  <div class="bio-row">
                                      <p><span>Customer Email </span>: <b><?php echo $fetch['customer_email']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer Phone </span>: <b><?php echo $fetch['customer_phone']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer Address </span>: <b><?php echo $fetch['customer_address']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer State </span>: <b><?php echo $fetch['customer_state']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer City </span>: <b><?php echo $fetch['customer_city']; ?>  </b></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Customer Pincode </span>: <b><?php echo $fetch['customer_pincode']; ?>  </b></p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section>
                          
                      </section>
                  </aside>
                  <?php
            }
          }
          ?>
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
