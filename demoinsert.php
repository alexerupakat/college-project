<!DOCTYPE html>
<html>
<head>
	<title>DEMO INSERTION</title>
</head>
<body>
<?php 
include 'includes/Connection.php';
 ?>
 <form method="post" action="demoadd.php">
 	<label for="bus_name">Bus Name</label>
 	<input type='Text' name='bus_name' placeholder="Enter Bus Name">
 	<br>
 	<label for="bus_name">seating</label>
 	<input type='Text' name='seating' placeholder="Enter seating capacity">
 	<label for="bus_name">price</label>
 	<input type='Text' name='price' placeholder="Enter price">
 	<label for="bus_name">ac_or_non_ac</label>
 	<input type='Text' name='ac_or_non_ac' placeholder="AC or Non AC">
 	<input type="Submit" name="addbtn" value="ADD">
 </form>
</body>
</html>