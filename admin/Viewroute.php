<?php
session_start();
if(!isset($_SESSION['admin_uname']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<?php include 'includes/connection.php'; ?>
<?php include_once('includes/header_start.php'); ?>

        <!-- DataTables -->
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
                                    <h3 class="page-title">View Route</h3>
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

 <!-- end row -->
            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">View Route</h4>
                                            <p class="text-muted m-b-30 font-14"> </p>
                                                <br>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Route ID</th>
                                                    <th>Route Source</th>
                                                    <th>Route Destination</th>
                                                    <th>Route KM</th>
                                                    <th>Action</th>
                                                    
                                                   
                                                </tr>
                                                </thead>
            
             
                                                <tbody>
                                                <?php  
                                                                $query=mysqli_query($con,"SELECT * from route") or die(mysqli_error($con));
                                                                if(mysqli_num_rows($query)){
                                                                    while($row=mysqli_fetch_array($query)){
                                                                        ?>
                                                                        <tr>
                                                                            <td> <?php echo $row['route_id']; ?></td>
                                                                            <td> <?php echo $row['route_source']; ?></td>
                                                                            <td> <?php echo $row['route_destination']; ?></td>
                                                                            <td> <?php echo $row['route_km']; ?></td>
                                                                            <td><a href="update_route.php?route_id=<?php echo $row['route_id']; ?>" class="btn btn-success">Update</a><button  class="btn btn-danger" onclick="var r=confirm('Are you sure to delete?'); if(r){window.location='delete_function.php?route_id=<?php echo $row['route_id']; ?>';}">Delete</button></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                        
                                                                        <?php
                                                                    }
                                                                }
                                                        ?>
                                                
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

<?php include_once('includes/footer_start.php'); ?>

        <!-- Required datatable js -->
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

<?php include_once('includes/footer_end.php'); ?>