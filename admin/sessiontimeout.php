<?php include_once('includes/header_start.php'); ?>

<?php include_once('includes/header_end.php'); ?>

                            <!-- Page title -->
                            

        <!-- Session timeout js -->
        <script src="assets/plugins/bootstrap-session-timeout/bootstrap-session-timeout.min.js"></script>

        <script>
            $.sessionTimeout({
                keepAliveUrl: 'pages-blank.php',
                logoutButton:'Logout',
                logoutUrl: 'includes/logout.php',
                redirUrl: 'pages-lock-screen.php',
                warnAfter: 3000,
                redirAfter: 30000,
                countdownMessage: 'Redirecting in {timer} seconds.'
            });
        </script>

<?php include_once('includes/footer_end.php'); ?>