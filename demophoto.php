<!DOCTYPE html>
<html>
<head>
	<title>Demo Photo</title>
</head>
<body>
<form method="POST" action="" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="upload">
</form>
<?php 

if(isset($_POST['upload'])){
	//print_r($_FILES);
	$target_name=basename($_FILES['file']['name']);
	$target_name='img/images/'.rand(0,999999).$target_name;
	//print($target_name);
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target_name)){
		
	}
} 
?>
</body>
</html>