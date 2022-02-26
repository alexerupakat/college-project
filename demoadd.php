<?php 
include 'includes/Connection.php';
if(isset($_REQUEST['addbtn'])){
$bname=$_REQUEST['bus_name'];
$seating=$_REQUEST['seating'];
$price=$_REQUEST['price'];
$ac_or_non=$_REQUEST['ac_or_non_ac'];

$sql="insert into bus(bus_name,seating,price,ac_or_non_ac) values('$bname',$seating,$price,'$ac_or_non')";
$query=mysqli_query($con,$sql);
if($query)
{
	echo "Insertion successful";
}else
{
	echo "Insertion not done";
}
}
?>