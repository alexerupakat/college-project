<?php 
session_start();
if(!isset($_SESSION['c_email']))
{
	header('Location:../login/login.php');
}
else
{
	include '../includes/connection.php';
	$ORDER_ID=rand(10000,99999999);
	$CUST_ID=$_SESSION['cid'];
	$INDUSTRY_TYPE_ID='Retail';
	$CHANNEL_ID='WEB';
	$TXN_AMOUNT=$_GET['p'];
	$email_id=$_SESSION['c_email'];
	$error='<div class="alert alert-primary" role="alert">
  This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>';
	?>
    <script src="../admin/assets/js/jquery.min.js"></script>
 <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="../admin/assets/css/icons.css">
<div class="container mt-5">
    <h2 class="text-center"><a href="../index.php" style="text-decoration: none;">GetMyBus</a> Checkout Confirmation</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-20 pt-20">


                    <!--Form with header-->

                    <form action="pgRedirect.php" method="POST">
                    	<input type="hidden" class="form-control" name="ORDER_ID" value="<?php echo $ORDER_ID; ?>">
                    	<input type="hidden" class="form-control" name="CUST_ID" value="<?php echo $CUST_ID; ?>">
                    	<input type="hidden" class="form-control" name="INDUSTRY_TYPE_ID" value="<?php echo $INDUSTRY_TYPE_ID; ?>">
                    	<input type="hidden" class="form-control" name="CHANNEL_ID" value="<?php echo $CHANNEL_ID; ?>">
                    	<input type="hidden" class="form-control" name="TXN_AMOUNT" value="<?php echo $TXN_AMOUNT; ?>">
                        <input type="hidden" name="bus_id" value="<?php echo $_GET['bus_id']; ?>">
                        
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-success text-white text-center py-2">
                                    
                                    <p class="m-2">Please Check Your  Details</p>
                                </div>
                            </div>
                            <div class="card-body p-3 text-center">
                                    <?php  
                            
                $query_bus=mysqli_query($con,"SELECT * from bus WHERE bus_id=$_GET[bus_id]") or die(mysqli_error($con));
                if(mysqli_num_rows($query_bus)){

                    while($fetch_bus=mysqli_fetch_array($query_bus))
                    {
                       
                    ?>
                       <input type="hidden" name="route_id" value="<?php echo $fetch_bus['route_id']; ?>">         <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-danger"></i></div>
                                        </div>
                                        <p class="m-2">Bus ID : <strong><?php echo $fetch_bus['bus_id']; ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-file text-success"></i></div>
                                        </div>
                                       <p class="m-2">Bus Name : <strong><?php echo $fetch_bus['bus_name']; ?></strong></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-images text-success"></i></div>
                                        </div>
                                        <p class="m-2">Seating Capacity : <strong><?php echo $fetch_bus['seating']; ?></strong></p>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-rupee-sign text-danger"></i></div>
                                        </div>
                                        <p class="m-2">AMOUNT : <strong><?php echo number_format($TXN_AMOUNT) ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-success"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="EMAIL" placeholder="abc@xyz.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-success"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="MSISDN" placeholder="ENTER MOBILE NUMBER" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Checkout" class="btn btn-success px-4">
                                    
                                    <input type="button" value="Cancel" class="btn btn-danger px-4" onclick="window.location='../index.php';">
                                </div>
                            </div>
                            <?php
}
                }
                ?>
                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
<?php
}
 ?>
