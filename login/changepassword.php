<?php
session_start();
include '../includes/connection.php';
//echo $_SESSION['previous_page'];
if(isset($_GET['code']) && !empty($_GET['code']))
{
    $sql="SELECT * FROM customer WHERE verification_code='$_GET[code]'";
    $q=mysqli_query($con,$sql);
    if(mysqli_num_rows($q))
    {
        $f=mysqli_fetch_array($q);
        $user_id=$f['customer_id'];
        // echo $user_id;
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GetMyBus - Complete your trip.</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="shortcut icon" href="img/Titlelogo.ico" type="image/x-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
     <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Change Password </h2>
                         <div class="form-group">
                            <input type="password" class="form-input" name="oldpassword" id="oldpassword" placeholder="Old Password"/ autofocus>
                            
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-input" name="newpassword" id="newpassword" placeholder="New Password"/ data-parsley-pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign In"/>
                        </div>
                    </form>
                    
                </div>
                <?php   
            if(isset($_POST['submit']))
            {
                $oldpassword=$_POST['oldpassword'];
                $newpassword=$_POST['newpassword'];
                if(empty($oldpassword) || empty($newpassword))
                {
                    ?>
                    
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'warning',
                             title: 'Warning!',
                             text: 'Please enter All fields!!'
                        }).then((result) => {
                            window.location='changepassword.php';
                        });
                    </script>
                    <?php
                }
                elseif($oldpassword==$newpassword)
                {
                    ?>
                    
                    <script>
                        Swal.fire( 
                        {
                             icon: 'error',
                             title: 'Error!',
                             text: 'Try different password!!'
                        }).then((result) => {
                            window.location='changepassword.php';
                        });
                    </script>
                    <?php
                }
                else{
                $sql="UPDATE customer SET customer_password='$newpassword' WHERE customer_password='$oldpassword'";
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
                            window.location='../includes/logout.php';
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
                            window.location='changepassword.php';
                        });
                    </script>
                    <?php
                }            }
            }
            ?>
            </div>
        </section>

    </div>

    <!-- JS --> 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
                        
                    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>