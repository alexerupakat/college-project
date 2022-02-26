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
                                    <h3 class="page-title">Add Customer</h3>
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
            
                                            <h4 class="mt-0 header-title">Add Customer</h4>
                                            <br>
            
                                            <form class="" action="" method="POST">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Customer Name"name="customername" data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Email</label>
                                                    <input type="email" class="form-control" required placeholder="Enter Customer Email" name="customeremail">
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Phone Number</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Customer Phone Number" name="customerphoneno" data-parsley-pattern="^[6789]\d{9}$">
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div>
                                                        <input type="password" id="pass2" class="form-control" required
                                                               placeholder="Password"/ data-parsley-pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="password" class="form-control" required
                                                               data-parsley-equalto="#pass2"
                                                               placeholder="Re-Type Password" name="password">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Address</label>
                                                    <div>
                                                        <textarea required class="form-control" rows="5" name="customeraddress"></textarea>
                                                 </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer State</label>
                                                    <select class="form-control"  name="state" required>
                        <option>---SELECT STATE---</option>
                        <option value="Andhra Pradhesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradhesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                    </select>
                                                </div>

                                                <div class="form-group"> 
                                                    <label>Customer City</label>
                                                    <input type="text" class="form-control" required placeholder="Customer City" name="customercity" data-parsley-pattern="/^[a-z ,.'-]+$/i">
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Pincode</label>
                                                    <input type="number" class="form-control" required placeholder="Customer Pincode" name="customerpincode" data-parsley-pattern="^[1-9][0-9]{5}$">
                                                </div>

                                               
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-pink waves-effect waves-light" name="submit_customer">
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
            
                                 <!-- end col -->
                                 <?php  
                                if(isset($_POST['submit_customer'])){
                                $cname=mysqli_real_escape_string($con,$_POST['customername']);
                                $cemail=mysqli_real_escape_string($con,$_POST['customeremail']);
                                $cphone=mysqli_real_escape_string($con,$_POST['customerphoneno']);
                                $cpassword=mysqli_real_escape_string($con,$_POST['password']);
                                $caddress=mysqli_real_escape_string($con,$_POST['customeraddress']);
                                $cstate=mysqli_real_escape_string($con,$_POST['customerstate']);
                                $ccity=mysqli_real_escape_string($con,$_POST['customercity']);
                                $cpincode=mysqli_real_escape_string($con,$_POST['customerpincode']);
                                
                               
                                
                                    $sql="INSERT INTO customer(customer_name,customer_email,customer_phone,customer_password,customer_address,customer_state,customer_city,customer_pincode) VALUES ('$cname','$cemail','$cphone','$cpassword','$caddress','$cstate','$ccity','$cpincode')";
                                    
                                    $insert_bus=mysqli_query($con,$sql);
                                    if($insert_bus){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Insertion Successful!!'
                        }).then((result) => {
                            window.location='Addcustomer.php';
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
                            window.location='Addcustomer.php';
                        });
                    </script>
                    <?php      
                                        }
                                
                            }
                               ?>
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