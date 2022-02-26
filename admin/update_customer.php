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
                                    <h3 class="page-title">Update Customer</h3>
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
                                                if(isset($_GET['customer_id']))
                                                {
                                                    if(empty($_GET['customer_id']))
                                                    {
                                                        echo "<script>window.location='Viewcustomer.php';</script>";
                                                    }
                                                    else if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM customer WHERE customer_id=$_GET[customer_id]")))
                                                    {
                                                        $customer_idnew=mysqli_real_escape_string($con,$_GET['customer_id']);
                                                        $query_customer=mysqli_query($con,"SELECT * FROM customer WHERE customer_id=$customer_idnew");
                                                        if(mysqli_num_rows($query_customer))
                                                        {
                                                            $fetch_customer=mysqli_fetch_array($query_customer);
                                                        }
                                                    }
                                                }
                                            ?>
                                            <h4 class="mt-0 header-title">Update Customer</h4>
                                            <br>
            
                                            <form class="" action="" method="POST">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Customer Name"name="customername" value="<?php echo $fetch_customer['customer_name'] ?>" data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Email</label>
                                                    <input type="email" class="form-control" required placeholder="Enter Customer Email" name="customeremail" value="<?php echo $fetch_customer['customer_email'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Phone Number</label>
                                                    <input type="number" class="form-control" required placeholder="Enter Customer Phone Number" name="customerphoneno" value="<?php echo $fetch_customer['customer_phone'] ?>" data-parsley-pattern="^[6789]\d{9}$">
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div>
                                                        <input type="password" id="pass2" class="form-control" required
                                                               placeholder="Password"/ value="<?php echo $fetch_customer['customer_password'] ?>" data-parsley-pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
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
                                                        <textarea required class="form-control" rows="5" name="customeraddress"><?php echo $fetch_customer['customer_address'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer State</label>
                                                    <select class="form-control"  name="state">
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
                                                    <input type="text" class="form-control" required placeholder="Customer City" name="customercity" value="<?php echo $fetch_customer['customer_city'] ?>" data-parsley-pattern="/^[a-z ,.'-]+$/i">
                                                </div>

                                                <div class="form-group">
                                                    <label>Customer Pincode</label>
                                                    <input type="number" class="form-control" required placeholder="Customer Pincode" name="customerpincode" value="<?php echo $fetch_customer['customer_pincode'] ?>" data-parsley-pattern="^[1-9][0-9]{5}$">
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
                               
                               
                                
                                    $sql="UPDATE customer SET customer_name='$cname',customer_email='$cemail',customer_phone='$cphone',customer_password='$cpassword',customer_address='$caddress',customer_state='$cstate',customer_city='$ccity',customer_pincode='$cpincode' WHERE customer_id=$customer_idnew";
                                    
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
                            window.location='Viewcustomer.php';
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
                            window.location='Viewcustomer.php';
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