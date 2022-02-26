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

<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Add Route</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->
                    <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Add Route</h4>
                                            <br>
            
                                            <form class="" action="" method="POST">
                                                

                                                <div class="form-group">
                                                    <label>Route Source</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Route Source" name="routesource" data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Route Destination</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Route Destination" name="routedestination" data-parsley-pattern="/^[a-z ,.'-]+$/i">
                                                </div>

                                                <div class="form-group">
                                                    <label>Route KM</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Route KM"name="routekm" min=30>
                                                </div>

                                                
            
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-pink waves-effect waves-light" name="submit_route">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <?php  
                                if(isset($_POST['submit_route'])){
                                $rsource=mysqli_real_escape_string($con,$_POST['routesource']);
                                $rdestination=mysqli_real_escape_string($con,$_POST['routedestination']);
                                $rkm=mysqli_real_escape_string($con,$_POST['routekm']);
                                
                                    $sql="INSERT INTO route(route_source,route_destination,route_km) VALUES ('$rsource','$rdestination','$rkm')";
                                    $insert_route=mysqli_query($con,$sql);
                                    if($insert_route){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Insertion Successful!!'
                        }).then((result) => {
                            window.location='Addroute.php';
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
                            window.location='Addroute.php';
                        });
                    </script>
                    <?php      
                                        }
                            }
                        

                               ?>
                                 <!-- end col -->
                            </div> <!-- end row -->
            

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

<?php include_once('includes/footer_start.php'); ?>

        <!-- Parsley js -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

<?php include_once('includes/footer_end.php'); ?>