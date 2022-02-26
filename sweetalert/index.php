<!DOCTYPE html>
<html>
<head>
	<title>Sweetalert</title>
</head>
<body>
<button id="btn">Click me</button>

<script src="jquery-3.4.1.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script >
	$('#btn').on('click', function()
	{
		Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
	})

</script>
</body>
</html>