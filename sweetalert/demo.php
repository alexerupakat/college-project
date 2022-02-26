<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<script src="jquery-3.4.1.min.js"></script>
					<script src="sweetalert2.all.min.js"></script>
					<script>
                    	Swal.fire(
                    	{
                    		 icon: 'success',
							 title: 'Success.',
							 text: 'You successfully Logged in',
                    	}).then({
                    		window.location='index.php';
                    	});
                    </script>

</body>
</html>