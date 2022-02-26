<?php
session_start();
if(isset($_SESSION['agency_uname']))
{
    header('Location:home.php');
}
include 'includes/connection.php';
?>
<?php include 'includes/connection.php'; ?>
<?php include_once('includes/header_account.php'); ?>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page"> 
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo.png" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
                        <p class="text-muted text-center">Get your free GetMyBus account now.</p>

                         <form class="" action="" method="POST">
                                                <div class="form-group">
                                                    <label>Travel Agency Name</label>
                                                    <input type="text" class="form-control" required placeholder="Enter Travel Agency Name" name="aname" data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Travel Agency Address</label>
                                                    <div>
                                                        <textarea required class="form-control" rows="3" name="aaddress"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Travel Agency State</label>
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
                                                    <!-- <select class="form-control" name="astate">
                                                        <option>---SELECT STATE---</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Tamilnadu">Tamilnadu</option>
                                                        <option value="Maharastra">Maharastra</option>
                                                        <option value="Andra Pradesh">Andra Pradesh</option>
                                                    </select> -->
                                                </div>

                                                <div class="form-group">
                                                    <label>Travel Agency City</label>
                                                    <input type="text" class="form-control" required placeholder="Travel Agency City" name="acity" data-parsley-pattern="/^[a-z ,.'-]+$/i">
                                                </div>

                                                <div class="form-group">
                                                    <label>Travel Agency Pincode</label>
                                                    <input type="number" class="form-control" required placeholder="Travel Agency Pincode" name="apincode" data-parsley-pattern="^[1-9][0-9]{5}$">
                                                </div>

                                                <div class="form-group">
                                                    <label>Travel Agency Email</label>
                                                    <input type="email" class="form-control" required placeholder="Enter Travel Agency Email" name="aemail">
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
                                                               placeholder="Re-Type Password" name="apassword">
                                                    </div>
                                                </div>

                                                

                                                

                                               
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-pink waves-effect waves-light" name="submit_agency">
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
            </div>
            <?php  
                                if(isset($_POST['submit_agency'])){
                                $aname=mysqli_real_escape_string($con,$_POST['aname']);
                                $aaddress=mysqli_real_escape_string($con,$_POST['aaddress']);
                                $astate=mysqli_real_escape_string($con,$_POST['astate']);
                                $acity=mysqli_real_escape_string($con,$_POST['acity']);
                                $apincode=mysqli_real_escape_string($con,$_POST['apincode']);
                                $aemail=mysqli_real_escape_string($con,$_POST['aemail']);
                                $apassword=mysqli_real_escape_string($con,$_POST['apassword']);

                                

                                    $sql="INSERT INTO travel_agency (agency_name,agency_address,agency_state,agency_city,agency_pincode,agency_email,agency_password) VALUES ('$aname','$aaddress','$astate','$acity','$apincode','$aemail','$apassword')";
                                    $insert_agency=mysqli_query($con,$sql);
                                    if($insert_agency){
                                        ?>
                    <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'You successfully Registered'
                        }).then((result) => {
                            window.location='index.php';
                        });
                    </script>
                    <?php          
                                                   
                                    }
                                    else
                                        {   
                                            ?>
                    <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Oops!',
                             text: 'Something went wrong!!'
                        }).then((result) => {
                            window.location='register.php';
                        });
                    </script>
                    <?php      
                                        }
                            }
                            ?>
            <div class="m-t-40 text-center">
                <p>Already have an account ? <a href="index.php" class="font-500 font-14 text-primary font-secondary"> Login </a> </p>
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i>Complete your trip</p>
            </div>
        </div>

<?php include_once('includes/footer_account.php'); ?>