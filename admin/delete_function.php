<?php include 'includes/connection.php'; ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
  </head>
  <body>
    <?php 
if(isset($_GET['travel_agency_id']))
{
  
   $sql="DELETE from travel_agency WHERE agency_id=$_GET[travel_agency_id]";
   $delete_agency=mysqli_query($con,$sql);
   if($delete_agency){
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Delete Successful!!'
                        }).then((result) => {
                            window.location='Viewtravelagency.php';
                        });
                    </script>

<?php
}
else
{
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'error',
                             title: 'Oops',
                             text: 'Something Went wrong!!'
                        }).then((result) => {
                            window.location='Viewtravelagency.php';
                        });
                    </script>

<?php
}
}
?>

<?php 
if(isset($_GET['customer_id']))
{
  
   $sql="DELETE from customer WHERE customer_id=$_GET[customer_id]";
   $delete_customer=mysqli_query($con,$sql);
   if($delete_customer){
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Delete Successful!!'
                        }).then((result) => {
                            window.location='Viewcustomer.php';
                        });
                    </script>

<?php
}
else
{
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'error',
                             title: 'Oops',
                             text: 'Something Went wrong!!'
                        }).then((result) => {
                            window.location='Viewcustomer.php';
                        });
                    </script>

<?php
}
}
?>

 <?php 
if(isset($_GET['bus_id']))
{
	
	 $sql="DELETE from bus WHERE bus_id=$_GET[bus_id]";
   $delete_bus=mysqli_query($con,$sql);
   if($delete_bus){
	?>
    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Delete Successful!!'
                        }).then((result) => {
                            window.location='Viewbus.php';
                        });
                    </script>

<?php
}
else
{
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'error',
                             title: 'Oops',
                             text: 'Something Went wrong!!'
                        }).then((result) => {
                            window.location='Viewbus.php';
                        });
                    </script>

<?php
}
}
?>

<?php 
if(isset($_GET['route_id']))
{
  
   $sql="DELETE from route WHERE route_id=$_GET[route_id]";
   $delete_route=mysqli_query($con,$sql);
   if($delete_route){
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Delete Successful!!'
                        }).then((result) => {
                            window.location='Viewroute.php';
                        });
                    </script>

<?php
}
else
{
  ?>
    <script>
                        Swal.fire(
                        {
                             icon: 'error',
                             title: 'Oops',
                             text: 'Something Went wrong!!'
                        }).then((result) => {
                            window.location='Viewroute.php';
                        });
                    </script>

<?php
}
}
?>

 </body>
  </html>