<?php
session_start();
if(isset($_SESSION['c_email']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>GetMyBus - Complete your trip</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="index.html">
        <h2 class="form-signin-heading">registration now</h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <input type="text" class="form-control" placeholder="Full Name" autofocus>
            <input type="text" class="form-control" placeholder="Address" >
            <input type="text" class="form-control" placeholder="Email" >
            <input type="text" class="form-control" placeholder="City/Town" >
            <input type="text" class="form-control" placeholder="User Name" >
            <input type="password" class="form-control" placeholder="Password">
            <input type="password" class="form-control" placeholder="Re-type Password">
           
            <button class="btn" type="submit">Submit</button>
            <button class="btn btn-lg btn-login btn-block" type="cancel">Cancel</button>
            <div class="registration">
                Already Registered.
                <a class="" href="login.html">
                    Login
                </a>
            </div>

        </div>

      </form>

    </div>


  </body>
</html>
