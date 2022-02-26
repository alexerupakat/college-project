<?php
session_start();
if(isset($_SESSION['c_email'])) 
{
    header('Location:../index.php');
}
include '../includes/connection.php';
//echo $_SESSION['previous_page'];
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
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="">
                        <h2 class="form-title">Forgot Password </h2>
                        <h4>Enter Your Email and instructions will be sent to you!</h4>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Enter Your Email"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="SUBMIT"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Remember it? <a href="login.php" class="loginhere-link">Sign In</a>
                    </p>
                </div>
                
            </div>
        </section>

    </div>
<?php  
if(isset($_POST['submit']))
{
    include 'send_invitation.php';
    $email=$_POST['email'];
    if(empty($email))
    {

    }
    else if(!mysqli_num_rows(mysqli_query($con,"SELECT customer_email FROM customer WHERE customer_email='$email'")))
    {

    }
    else
    {
        $verification_code=uniqid();
        $link='http://getmybus/login/changepassword.php?code='.$verification_code;
        mysqli_query($con,"UPDATE customer SET verification_code='$verification_code' WHERE customer_email='$email'");
        if(send_email($email,$link)){
            
        }
        else
        {

        }

    }
}
?>
    <!-- JS --> 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
                        
                    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>