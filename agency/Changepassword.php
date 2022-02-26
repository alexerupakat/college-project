<?php
session_start();
if(!isset($_SESSION['agency_uname']))
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
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo.png" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Change Password</h4>
                        <p class="text-muted text-center"></p>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="form-group">
                                <label for="username">Old Password</label>
                                <input type="text" class="form-control" id="oldpassword" placeholder="Enter Old password" name="oldpassword" autofocus>
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
                            

                         <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary btn-block w-md waves-effect waves-light" type="submit" name="login-btn">Submit</button>
                                </div>
                            </div>

                            
                        </form>
                    </div>

                </div>
            </div>
            <div class="m-t-40 text-center">
                
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i> Complete your trip</p>
            </div>
            <?php  
            if(isset($_POST['login-btn']))
            {
                $oldpassword=$_POST['oldpassword'];
                $password=$_POST['password'];
                
                if(empty($username) || empty($password))
                {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Please enter All fields!!'
                        }).then((result) => {
                            window.location='Changepassword.php';
                        });
                    </script>
                    <?php
                }
                elseif ($oldpassword==$password) {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Old password and New password are same!!'
                        }).then((result) => {
                            window.location='Changepassword.php';
                        });
                    </script>
                    <?php
                }
                else{
                $sql="UPDATE travel_agency SET agency_password='$password' WHERE agency_password='$oldpassword'";
                                    $update_agency=mysqli_query($con,$sql);
                                    if($update_agency){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Done!',
                             text: 'Your password is updated!!'
                        }).then((result) => {
                            window.location='includes/logout.php';
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
                             icon: 'error',
                             title: 'Oops!',
                             text: 'Something went wrong!!'
                        }).then((result) => {
                            window.location='Changepassword.php';
                        });
                    </script>
                    <?php
                }            }
            }
            ?>
            

        </div>

<?php include_once('includes/footer_account.php'); ?>