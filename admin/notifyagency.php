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
                                    <h3 class="page-title">Notify Travel Agency</h3>
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
            
                                            <h4 class="mt-0 header-title">Notify Travel Agency</h4>
                                            <br>
            
                                            <form class="" action="" method="POST">
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
                                                    <label>Subject</label>
                                                    <input type="text" class="form-control" required placeholder="Enter the Subject" name="subject">
                                                </div>

                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <div>
                                                        <textarea required class="form-control" rows="5" name="message"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-pink waves-effect waves-light" name="notify">
                                                            Notify
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
                                if(isset($_POST['notify'])){
                                    
                                $agencyid=mysqli_real_escape_string($con,$_POST['agencyid']);
                                $subject=mysqli_real_escape_string($con,$_POST['subject']);
                                $message=mysqli_real_escape_string($con,$_POST['message']);
                                
                                
                                $query1=mysqli_query($con,"SELECT * FROM travel_agency") or die(mysqli_error($con));
                                if(mysqli_num_rows($query1))
                                {
                                $row=mysqli_fetch_array($query1);
                                     }                               
                                $email=$row['agency_email']; 
                                
                                $admin=$_SESSION['admin_uname'];
                            
                                $sql="INSERT INTO notify (admin,email,subject,message,notify_to) VALUES ('$admin','$email','$subject','$message',$agencyid)";
                                    $insert_agency=mysqli_query($con,$sql);
                                    if($insert_agency){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Notification sent!!'
                        }).then((result) => {
                            window.location='notifyagency.php';
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
                            window.location='notifyagency.php';
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