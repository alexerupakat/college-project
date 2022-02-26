<?php
session_start();
if(!isset($_SESSION['admin_uname']))
{
    header('Location:index.php');
}
include 'includes/connection.php';

?>
<?php include_once('includes/header_start.php'); ?>

            <!--Morris Chart CSS -->
            <link rel="stylesheet" href="assets/plugins/morris/morris.css">
            <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Admin Dashboard</h3>
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
            
                            
                            <!-- end row -->
            
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Refund</h4>
            
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                 <thead>
                                                <tr>
                                                    <th>Refund ID</th>
                                                    <th>Booking ID</th>
                                                    <th>Customer ID</th>
                                                    <th>Amount</th>
                                                    
                                                    
                                                    
                                                </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php  
                                                                $query=mysqli_query($con,"SELECT * FROM refund ") or die(mysqli_error($con));
                                                                if(mysqli_num_rows($query)){
                                                                    while($row=mysqli_fetch_array($query)){
                                                                        ?>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/users/1.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                            <?php echo $row['refund_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['booking_id']; ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $row['customer_id']; ?>
                                                            
                                                        </td>
                                                        <td>
                                                            &#8377;<?php echo number_format($row['amount']); ?>
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        
                                                        
                                                    </tr>
            
                                                    
            
                                                    </tbody>
                                                    <?php
                                                                    }
                                                                }
                                                        ?>
                                                </table>
                                            </div>
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
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
        <script src="assets/plugins/bootstrap-session-timeout/bootstrap-session-timeout.min.js"></script>

        <script>
            $.sessionTimeout({
                keepAliveUrl: 'pages-blank.php',
                logoutButton:'Logout',
                logoutUrl: 'includes/logout.php',
                redirUrl: 'pages-lock-screen.php',
                warnAfter: 10000,
                redirAfter: 10000,
                countdownMessage: 'Redirecting in {timer} seconds.'
            });
        </script>
<?php include_once('includes/footer_end.php'); ?>
