<?php
session_start();
if(isset($_SESSION['agency_uname']))
{
    header('Location:home.php');
}
include 'includes/connection.php';
?>
<?php  
include 'includes/connection.php';
?>
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
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to GetMyBus.</p>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="username" placeholder="Enter Email" name="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary btn-block w-md waves-effect waves-light" type="submit" name="login-btn">Log In</button>
                                </div>
                            </div>

                            <!-- <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="forgot_password.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>
            <?php  
            if(isset($_POST['login-btn']))
            {
                $email=$_POST['email'];
                $password=$_POST['password'];
                if(empty($email))
                {
                    ?>
                    <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Oops!',
                             text: 'Please Enter Email!!'
                        }).then((result) => {
                            window.location='index.php';
                        });
                    </script>
                    <?php     
                }
                elseif(empty($password)){
                    ?>
                   <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Oops!',
                             text: 'Please Enter Password!!'
                        }).then((result) => {
                            window.location='index.php';
                        });
                    </script>
                    <?php  
                    }   
                    else
                    {


                $sql="SELECT agency_email,agency_password,agency_id FROM travel_agency WHERE agency_email='$email' AND agency_password='$password'";
                $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                if(mysqli_num_rows($query)){
                    $fetch_agecy=mysqli_fetch_array($query);
                     $_SESSION['agency_uname']=$email;
                     $_SESSION['agency_id']=$fetch_agecy['agency_id'];

                     ?>
                   <script src="jquery-3.4.1.min.js"></script>
                    <script src="sweetalert2.all.min.js"></script> 
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'You successfully Logged in'
                        }).then((result) => {
                            window.location='home.php';
                        });
                    </script>
                    <?php          
                }else
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
                            window.location='index.php';
                        });
                    </script>
                    <?php      
                }
                    }
            }
            
            ?>
            <div class="m-t-40 text-center">
                <p>Don't have an account ? <a href="register.php" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p>
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i> Complete your trip</p>
            </div>

        </div>

<?php include_once('includes/footer_account.php'); ?>