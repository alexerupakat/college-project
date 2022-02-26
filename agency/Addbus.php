<?php
session_start();
if(!isset($_SESSION['agency_uname']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<?php include 'includes/connection.php'; ?> 
<?php include_once('includes/header_start.php'); ?> 
<script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Add Bus</h3>
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
                                <div class="col-lg-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Add Bus</h4>
                                            <br>
            
                                            <form class="" action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Select Agency</label>
                                                    <select class="form-control" name="agencyid" autofocus>
                                                        <option>---SELECT AGENCY---</option>
                                                        <?php  
                                                                $query=mysqli_query($con,"SELECT * FROM travel_agency") or die(mysqli_error($con));
                                                                if(mysqli_num_rows($query)){
                                                                    while($row=mysqli_fetch_array($query)){
                                                                        ?>
                                                                        <option value="<?php echo $row['agency_id']; ?>"><?php echo $row['agency_name'].','.$row['agency_city']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Select Route</label>
                                                    <select class="form-control" name="routeid">
                                                        <option>---SELECT ROUTE---</option>
                                                        <?php  
                                                                $query=mysqli_query($con,"SELECT * FROM route") or die(mysqli_error($con));
                                                                if(mysqli_num_rows($query)){
                                                                    while($row=mysqli_fetch_array($query)){
                                                                        ?>
                                                                        <option value="<?php echo $row['route_id']; ?>"><?php echo $row['route_source'].','.$row['route_destination']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bus Name</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Bus Name" name="busname" data-parsley-pattern="/^[a-z ,.'-]+$/i">
                                                </div>

                                                <div class="form-group">
                                                    <label>Bus Number</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Bus Number" name="busno" data-parsley-pattern="^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$">
                                                </div>

                                                <div class="form-group">
                                                    <label>Chasis Number</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Chasis Number"name="chasisno" data-parsley-pattern="/^([A-Za-z]{2}[A-z0-9]{5,16})$/">
                                                </div>

                                                <div class="form-group">
                                                    <label>Seating Capacity</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Seating Capacity" name="seating" min=35 max=65>
                                                </div>

                                                <div class="form-group">
                                                    <label>Fare</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Fare" name="fare" min=1>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Bus Type</label>
                                                    <select class="form-control" name="acornon">
                                                        <option>----SELECT BUS TYPE----</option>
                                                        <option value="0">----AC----</option>
                                                        <option value="1">---NON AC---</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bus Type</label>
                                                    <select class="form-control" name="sleeperornon">
                                                        <option>----SELECT BUS TYPE----</option>
                                                        <option value="0">----Sleeper----</option>
                                                        <option value="1">---NON Sleeper---</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bus Images</label>
                                                    <br>
                                                   <input type="file" class="form-control" name="bus_img">
                                                </div>
            
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-pink waves-effect waves-light" name="submit_bus">
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
                                if(isset($_POST['submit_bus'])){
                                $agencyid=mysqli_real_escape_string($con,$_POST['agencyid']);
                                $routeid=mysqli_real_escape_string($con,$_POST['routeid']);
                                $busname=mysqli_real_escape_string($con,$_POST['busname']);
                                $busno=mysqli_real_escape_string($con,$_POST['busno']);
                                $chasisno=mysqli_real_escape_string($con,$_POST['chasisno']);
                                $seating=mysqli_real_escape_string($con,$_POST['seating']);
                                $fare=mysqli_real_escape_string($con,$_POST['fare']);
                                $acornon=mysqli_real_escape_string($con,$_POST['acornon']);
                                $sleeperornon=mysqli_real_escape_string($con,$_POST['sleeperornon']);
                                $bus_img='default.jpg';
                                $target_folder='../admin/assets/images/bus/';
                                $target_file=uniqid().$_FILES['bus_img']['name'];



                                    $sql="INSERT INTO bus(agency_id,route_id,bus_name,bus_no,img_loc,chasis_no,seating,price,ac_or_non_ac,sleeper_or_non) VALUES ($agencyid,$routeid,'$busname','$busno','$target_file','$chasisno',$seating,$fare,$acornon,$sleeperornon)";
                                    $insert_bus=mysqli_query($con,$sql);
                                    if($insert_bus){
                                        if(move_uploaded_file($_FILES['bus_img']['tmp_name'], $target_folder.$target_file))
                                        {

                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Insertion Successful!!'
                        }).then((result) => {
                            window.location='Addbus.php';
                        });
                    </script>
                    <?php 
                                    }
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
                            window.location='Addbus.php';
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