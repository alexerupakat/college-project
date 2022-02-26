<?php  
session_start();
unset($_SESSION['c_email']);
//session_destroy();
?><!DOCTYPE html>
<html>
<head>
	<title>GetMyBus - Complete your trip.</title>
     <script src="jquery-3.4.1.min.js"></script>
      <script src="sweetalert2.all.min.js"></script>
</head>
<body>



					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'success',
							 title: 'Success',
							 text: 'You successfully Logged out'
                    	}).then((result) => {
                    		window.location='../../index.php';
                    	});
                    </script>

</body>
</html>
<!-- // header('Location:../index.php'); -->
<?php
?>