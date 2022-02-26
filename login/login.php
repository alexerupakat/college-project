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
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login </h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Enter Your Email"/ autofocus required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Enter your password"/ required>
                        </div>
                        <div class="form-group">
                            
                            <label for="forgot-password" class="label-agree-term"><span><span></span></span><a href="forgot_password.php" class="term-service">Forgot Password</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign In"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Create a new Account ? <a href="register.php" class="loginhere-link">Register here</a>
                    </p>
                </div>
                <?php  
            if(isset($_POST['submit']))
            {
                $email=$_POST['email'];
                $password=$_POST['password'];
                if(empty($email))
                {
                     ?>

                    <script>
                        Swal.fire(
                        {
                             icon: 'warning',
                             title: 'Warning!',
                             text: 'Please Enter Email!!'
                        }).then((result) => {
                            window.location='login.php';
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
                            window.location='login.php';
                        });
                    </script>
                    <?php     
                }else{
                $sql="SELECT customer_email,customer_password,customer_id FROM customer WHERE customer_email='$email' AND customer_password='$password'";
                $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                if(mysqli_num_rows($query)){
                    $fetch_customer=mysqli_fetch_array($query);
                    $_SESSION['cid']=$fetch_customer['customer_id'];
                    $_SESSION['c_email']=$email;
                    if(isset($_SESSION['previous_page']) && !empty($_SESSION['previous_page']))
                    {
                        echo $_SESSION['previous_page'];
                        ?>
                        <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'You successfully Logged in'
                        }).then((result) => {
                            window.location='<?php echo $_SESSION['previous_page'] ?>';
                        });
                    </script>
                    <?php
                       // header('Location:'.$_SESSION['previous_page']);
                    }else
                    {
                    ?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'You successfully Logged in'
                        }).then((result) => {
                            window.location='../customer/index.php';
                        });
                    </script>
                    <?php  
                    }                 
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
                            window.location='login.php';
                        });
                    </script>
                    <?php            
                }

            }
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