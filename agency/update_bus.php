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

<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Update Bus</h3>
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
                                            <?php  
                                                if(isset($_GET['bus_id']))
                                                {
                                                    if(empty($_GET['bus_id']))
                                                    {
                                                        echo "<script>window.location='Viewbus.php';</script>";
                                                    }
                                                    else if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM bus WHERE bus_id=$_GET[bus_id]")))
                                                    {
                                                        $bus_idnew=mysqli_real_escape_string($con,$_GET['bus_id']);
                                                        $query_bus=mysqli_query($con,"SELECT * FROM bus WHERE bus_id=$bus_idnew");
                                                        if(mysqli_num_rows($query_bus))
                                                        {
                                                            $fetch_bus=mysqli_fetch_array($query_bus);
                                                        }
                                                    }
                                                }
                                            ?>
                                            <h4 class="mt-0 header-title">Update Bus</h4>
                                            <br>
            
                                            <form class="" action="" method="POST">
                                                

                                                <div class="form-group">
                                                    <label>Bus Name</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Bus Name" name="busname" value="<?php echo $fetch_bus['bus_name'] ?>" data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bus Number</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Bus Number" name="busno" value="<?php echo $fetch_bus['bus_no'] ?>" data-parsley-pattern="^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$">
                                                </div>

                                                <div class="form-group">
                                                    <label>Chasis Number</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Chasis Number"name="chasisno" value="<?php echo $fetch_bus['chasis_no'] ?>" data-parsley-pattern="/^([A-Za-z]{2}[A-z0-9]{5,16})$/">
                                                </div>

                                                <div class="form-group">
                                                    <label>Seating Capacity</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Seating Capacity" name="seating" value="<?php echo $fetch_bus['seating'] ?>" min=35 max=65>
                                                </div>

                                                <div class="form-group">
                                                    <label>Fare</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Fare" name="fare" value="<?php echo $fetch_bus['price'] ?>" min=1>
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

                                               <!--  <div class="form-group">
                                                    <label>Bus Images</label>
                                                    <br>
                                                    <?php include 'demophoto.php'; ?>
                                                </div> -->
            
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
                                $image_loc='';
                                // if(isset($_FILE['file']['temp']))
                                // {
                                //     $image_loc=$_FILE['file']['name'];
                                //     move_uploaded_file($image_loc, 'bus/rand.png');
                                // }

                                    $sql="UPDATE bus SET bus_name='$busname',bus_no='$busno',chasis_no='$chasisno',seating=$seating,price=$fare,ac_or_non_ac=$acornon,sleeper_or_non=$sleeperornon WHERE bus_id=$bus_idnew";
                                    $update_bus=mysqli_query($con,$sql);
                                    if($update_bus){
                                       ?>
                   
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Update Successful!!'
                        }).then((result) => {
                            window.location='Viewbus.php';
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
                            window.location='Viewbus.php';
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