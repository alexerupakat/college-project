<?php
session_start();
if(!isset($_SESSION['agency_uname']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<?php include_once('includes/header_start.php'); ?>

            <!--Morris Chart CSS -->
            <link rel="stylesheet" href="assets/plugins/morris/morris.css">

<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Dashboard</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                       
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info"><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from customer")); ?></h3>
                                           Customers
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple"><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from bus")); ?></h3>
                                            Buses
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary"><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from travel_agency")); ?></h3>
                                            Travel Agencies
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger"><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from booking")); ?></h3>
                                            Bus bookings
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
            
                           <div class="row">
                                <div class="col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Latest Bookings</h4>
            
                                           
                                        </div>
                                    </div>
                                </div>
            
                               
            
            
                            </div>
                            <!-- end row -->
            
                         </div>
            

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

<?php include_once('includes/footer_start.php'); ?>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/pages/dashboard.js"></script>
        <!-- <script src="assets/plugins/bootstrap-session-timeout/bootstrap-session-timeout.min.js"></script>

        <script>
            $.sessionTimeout({
                keepAliveUrl: 'pages-blank.php',
                logoutButton:'Logout',
                logoutUrl: 'includes/logout.php',
                redirUrl: 'pages-lock-screen.php',
                warnAfter: 3000,
                redirAfter: 10000,
                countdownMessage: 'Redirecting in {timer} seconds.'
            });
        </script> -->

<?php include_once('includes/footer_end.php'); ?>