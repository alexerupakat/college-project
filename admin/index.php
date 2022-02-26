<?php
// error_reporting(0);
session_start();
if(isset($_SESSION['admin_uname']))
{
    header('Location:home.php');
}
include 'includes/connection.php';
?>
<?php include_once('includes/header_account.php'); ?>

        <!-- Begin page -->
        <script src="jquery-3.4.1.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo2.png" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to GetMyBus.</p>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" autofocus>
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
                                    <a href="pages-recoverpw.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>
            <?php  
            if(isset($_POST['login-btn']))
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                if(empty($username))
                {
                    ?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Warning!',
                             text: 'Please Enter Username!!'
                        }).then((result) => {
                            window.location='index.php';
                        });
                    </script>
                    <?php
                }
                elseif(empty($password)){
                    ?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Warning!',
                             text: 'Please Enter Password!!'
                        }).then((result) => {
                            window.location='index.php';
                        });
                    </script>
                    <?php
                }else{
                $sql="SELECT admin_username,admin_password FROM admin WHERE admin_username='$username' AND admin_password='$password'";
                $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                if(mysqli_num_rows($query)){
                    $_SESSION['admin_uname']=$username;
                    ?>
                    
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
                
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i> Complete your trip</p>
            </div>

        </div>

<?php include_once('includes/footer_account.php'); ?>