<?php 
session_start();
include 'includes/connection.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>GetMyBus - Complete your trip.</title>
	<script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body>
<?php 
 $booking_id=mysqli_real_escape_string($con,$_GET['booking_id']);
 $payment_id=mysqli_real_escape_string($con,$_GET['payment_id']);
 $query=mysqli_query($con,"SELECT amount from payment WHERE payment_id=$payment_id") or die(mysqli_error($con));
        if(mysqli_num_rows($query)){
          if($fetch=mysqli_fetch_array($query))
          {
             $amount=$fetch['amount']; 
             $customer_id=$_SESSION['cid'];  
            }
          }
$charge=(10 * $amount) / 100;
$amount1=$amount-$charge;
$query1=mysqli_query($con,"SELECT * from customer WHERE customer_id=$customer_id") or die(mysqli_error($con));
        if(mysqli_num_rows($query1)){
          if($fetch1=mysqli_fetch_array($query1))
          {
             $cname=$fetch1['customer_name']; 
             $cphoneno=$fetch1['customer_phone'];  
            }
          }
  $sql="INSERT into refund (booking_id,customer_id,amount) VALUES ($booking_id,$customer_id,$amount1)";
  $insert_refund=mysqli_query($con,$sql);
  $sql1="UPDATE booking SET booking_status='BOOKING_CANCELLED' WHERE booking_id=$booking_id ";
  $insert_refund1=mysqli_query($con,$sql1);
  if($insert_refund && $insert_refund1)
  {
  	?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'success',
                             title: 'Success!',
                             text: 'Booking Cancelled!! Refund will be done'
                        }).then((result) => {
                            window.location='viewbookings.php';
                        });
                    </script>

                    <?php 
                    
                                        $uname=$cname;
                                        $mobile=$cphoneno;
                                        include 'sms.php';
                                        sendSMS($uname,$mobile);
  }
  else
  {
  	?>
                    <script>
                        Swal.fire(
                        {
                             icon: 'error',
                             title: 'Oops!',
                             text: 'Something went wrong'
                        }).then((result) => {
                            window.location='viewbookings.php';
                        });
                    </script>
                    <?php 
  }
 ?>
</body>
</html>