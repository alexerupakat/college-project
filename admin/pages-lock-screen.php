<?php
session_start();
if(!isset($_SESSION['admin_uname']))
{
    header('Location:index.php');
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
                        <h4 class="text-muted font-18 m-b-5 text-center">Locked</h4>
                        <p class="text-muted text-center">Hello Mokshith, Enter your password to unlock the screen!</p>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="user-thumb text-center m-b-30">
                                <img src="assets/images/Mokshith.png" class="rounded-circle img-thumbnail" alt="thumbnail">
                                <h6>Mokshith Gowda</h6>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Unlock</button>
                                </div>
                            </div>

                        </form>
                        <?php 
                            if(isset($_POST['submit']))
                            {
                                $password=$_POST['password'];
                                if(empty($password))
                                {
                                    ?>
                                    <script>
                                     Swal.fire(
                                    {
                                    icon: 'warning',
                                    title: 'Warning!',
                                    text: 'Please Enter Password!!'
                                    }).then((result) => {
                                    window.location='pages-lock-screen.php';
                                    });
                                    </script>
                                    <?php
                                }
                                else
                                {
                                    $sql="SELECT admin_password FROM admin WHERE admin_password='$password'";
                                    $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($query))
                                    {
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Welcome Back'
                        }).then((result) => {
                            window.location='home.php';
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
                            window.location='pages-lock-screen.php';
                        });
                    </script>
                    <?php      
                }

                                }
                            }
                         ?>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <!-- <p>Not you ? return <a href="index.php" class="font-500 font-14 text-primary font-secondary"> Sign In </a> </p> -->
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i> Complete your trip</p>
            </div>

        </div>

<?php include_once('includes/footer_account.php'); ?>