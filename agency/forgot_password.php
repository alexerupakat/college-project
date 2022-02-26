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
                        <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
                        <div class="alert alert-info" role="alert">
                            Enter your Email and instructions will be sent to you!
                        </div>

                        <form class="form-horizontal m-t-30" action="" method="POST">

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <?php  
if(isset($_POST['submit']))
{
    include 'send_invitation.php';
    $email=$_POST['email'];
    if(empty($email))
    {

    }
    else if(!mysqli_num_rows(mysqli_query($con,"SELECT agency_email FROM travel_agency WHERE agency_email='$email'")))
    {

    }
    else
    {
        $verification_code=uniqid();
        $link='http://getmybus/agency/changepassword.php?code='.$verification_code;
        mysqli_query($con,"UPDATE travel_agency SET verification_code='$verification_code' WHERE agency_email='$email'");
        if(send_email($email,$link)){
            
        }
        else
        {

        }

    }
}
?>

            <div class="m-t-40 text-center">
                <p>Remember It ? <a href="index.php" class="font-500 font-14 text-primary font-secondary"> Sign In Here </a> </p>
                <p>© <?php echo date('Y'); ?> GetMyBus <i class="mdi mdi-heart text-danger"></i> Complete your trip</p>
            </div>

        </div>

<?php include_once('includes/footer_account.php'); ?>