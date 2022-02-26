<?php include_once('includes/header_account.php'); ?>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <!-- <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a>
                    </h3> -->

                    <div class="p-3">
                        <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
                        <div class="alert alert-info" role="alert">
                            Enter your Email and instructions will be sent to you!
                        </div>

                        <form class="form-horizontal m-t-30" action="index.php">

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Remember It ? <a href="index.php" class="font-500 font-14 text-primary font-secondary"> Sign In Here </a> </p>
                <p>© <?php echo date('Y'); ?> Crafted with <i class="mdi mdi-heart text-danger"></i> </p>
            </div>

        </div>

<?php include_once('includes/footer_account.php'); ?>