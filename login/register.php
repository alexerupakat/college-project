<?php
session_start();
if(isset($_SESSION['c_email']))
{
    header('Location:../index.php');
}
include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GetMyBus - Complete your trip.</title>

    <!-- Font Icon -->
    <link rel="shortcut icon" href="images/Titlelogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/pw_strenght.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" data-parsley-validate>
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="cname" id="cname" placeholder="Your Name"/ data-parsley-pattern="/^[a-z ,.'-]+$/i" autofocus required> 
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="cemail" id="cemail" placeholder="Your Email"/ required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="cphoneno" id="cphoneno" placeholder="Your Phone Number"/ data-parsley-pattern="^[6-9]\d{9}$" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password1" id="password1" placeholder="Password"/  data-parsley-pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="cpassword" id="cpassword" placeholder="Repeat your password"/ required>
                        </div>
                        <div class="form-group">
                            <textarea name="caddress" rows="4" class="form-input" placeholder="Your Address"></textarea required>
                        </div>
                        <div class="form-group">
                            <select class="form-input"  name="cstate" required>
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
                            <input type="text" class="form-input" name="ccity" id="ccity" placeholder="Your City"/ data-parsley-pattern="/^[a-z ,.'-]+$/i" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="cpincode" id="cpincode" placeholder="Your Pincode"/ data-parsley-pattern="^[1-9][0-9]{5}$" required>
                        </div>
                        <div class="form-group">
                            
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                    
                </div>
                <?php  
                                if(isset($_POST['submit'])){
                                    if(empty($cname) || empty($cemail) || empty($cphoneno) || empty($cpassword) || empty($caddress) || empty($cstate) || empty($ccity) || empty($cpincode))
                                    {
                                         ?>
                     <script>
                        Swal.fire(
                         {
                              icon: 'warning',
                              title: 'Warning!',
                              text: 'Please Enter all details!!'
                         }).then((result) => {
                             window.location='register.php';
                         });
                     </script>
                     <?php
                                     }
                                $cname=mysqli_real_escape_string($con,$_POST['cname']);
                                $cemail=mysqli_real_escape_string($con,$_POST['cemail']);
                                $cphoneno=mysqli_real_escape_string($con,$_POST['cphoneno']);
                                $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
                                $caddress=mysqli_real_escape_string($con,$_POST['caddress']);
                                $cstate=mysqli_real_escape_string($con,$_POST['cstate']);
                                $ccity=mysqli_real_escape_string($con,$_POST['ccity']);
                                $cpincode=mysqli_real_escape_string($con,$_POST['cpincode']);

                                

                                    $sql="INSERT INTO customer (customer_name,customer_email,customer_phone,customer_password,customer_address,customer_state,customer_city,customer_pincode) VALUES ('$cname','$cemail','$cphoneno','$cpassword','$caddress','$cstate','$ccity',$cpincode)";
                                   echo $sql;
                                    $insert_customer=mysqli_query($con,$sql);
                                    if($insert_customer){
                                        // send_sms($cphoneno,$cname);
                                        // $_SESSION['c_email']=$cemail;
                                        $uname=$cname;
                                        $mobile=$cphoneno;
                                        include '../sms.php';
                                        sendSMS($uname,$mobile);
                                        ?>
                                       
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'You successfully Registered'
                        }).then((result) => {
                            window.location='login.php';
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
                            window.location='register.php';
                        });
                    </script>
                    <?php      
                                        }
                            }
                            ?>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script> 
    <script type="text/javascript">$('form').parsley();</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>