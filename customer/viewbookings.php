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
      <?php include 'includes/slidebar.php'; ?>
              <!-- sidebar menu end-->

          </div>

      </aside>

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
              <br>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                              Payments
                          </header>
                          <br>
                          <div class="card-body">
                              <section id="flip-scroll">
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          
                                          <th class="numeric">Booking ID</th>
                                          <th class="numeric">Booking Date</th>
                                          <th class="numeric">Customer ID</th>
                                          <th class="numeric">Bus ID</th>
                                          <th class="numeric">Payment ID</th>
                                          <th class="numeric">Route ID</th>
                                          <th class="numeric">Booking Status</th>
                                          <!-- <th class="numeric">Booking Time</th> --> 
                                          <th class="numeric">Action</th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php  
                                                                $query=mysqli_query($con,"SELECT * from booking WHERE customer_id=$_SESSION[cid] AND booking_status!='BOOKING_CANCELLED'") or die(mysqli_error($con));
                                                                if(mysqli_num_rows($query)){
                                                                    while($row=mysqli_fetch_array($query)){
                                                                        ?>
                                                                        <tr>
                                                                            <td> <?php echo $row['booking_id']; ?></td>
                                                                            <td> <?php echo $row['booking_date']; ?></td>
                                                                            <td> <?php echo $row['customer_id']; ?></td>
                                                                            <td> <?php echo $row['bus_id']; ?></td>
                                                                            <td> <?php echo $row['payment_id']; ?></td>
                                                                            <td> <?php echo $row['route_id']; ?></td>
                                                                            <td> <?php echo $row['booking_status']; ?></td>
                                                                            <!-- <td> <?php echo $row['book_time']; ?></td> -->
                                                                            
                                                                            <td><a href="cancel_function.php?booking_id=<?php echo $row['booking_id']; ?>&payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-danger">Cancel</a></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        
                                                                        <?php
                                                                    }
                                                                }
                                                        ?>
                                                
                                      </tbody>
                                  </table>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
      <!--main content end-->

      <!-- Right Slidebar start -->
      
      <!-- Right Slidebar end -->

      <!--footer start-->
      <?php include 'includes/footer.php'; ?>
      <!--footer end-->
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
