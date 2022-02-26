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
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo2.png" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Change Title</h4>
                        <p class="text-muted text-center"></p>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="form-group">
                                <label for="username">Old Title</label>
                                <input type="text" class="form-control" id="oldtitle" placeholder="Enter Old Title" name="oldtitle" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="username">New Title</label>
                                <input type="text" class="form-control" id="newtitle" placeholder="Enter New Title" name="newtitle" data-parsley-pattern="/^[a-z ,.'-]+$/i">
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
                $oldtitle=$_POST['oldtitle'];
                $newtitle=$_POST['newtitle'];
                
                if(empty($oldtitle) || empty($newtitle))
                {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Please enter All fields!!'
                        }).then((result) => {
                            window.location='Changetitle.php';
                        });
                    </script>
                    <?php
                }
                elseif ($oldtitle==$newtitle) {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Old title and New title are same!!'
                        }).then((result) => {
                            window.location='Changetitle.php';
                        });
                    </script>
                    <?php
                }
                else{
                $sql="UPDATE admin SET admin_username='$newtitle' WHERE admin_username='$oldtitle'";
                                    $update_admin=mysqli_query($con,$sql);
                                    if($update_admin){
                                        ?>
                    
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Done!',
                             text: 'Your title is updated!!'
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
                            window.location='Changetitle.php';
                        });
                    </script>
                    <?php
                }            }
            }
            ?>
            

        </div>

<?php include_once('includes/footer_account.php'); ?>