<?php 
function sendSMS($uname,$mobile)
{
	// $otp=mt_rand(1000,9999);
	$new_mobile='91'.$mobile;
	$msg="Hello ".$uname." Your booking is cancelled";
	//Authorisation details.
	// setcookie('otp',$otp);
	setcookie('uname',$uname);
    setcookie('mble',$mobile);
	$username = "mokshithgowda2903@gmail.com";
	$hash = "c32690e08b62c8e1308342d7cdeaa81b27b88027042d2aa5734f3a75a43eb61f";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = false;
	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $new_mobile; // A single number or a comma-seperated list of numbers
	$message = $msg;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	$stat=json_decode($result);
    //setcookie('msg',$result);
	return $stat->status;
}
 ?>