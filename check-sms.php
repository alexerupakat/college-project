
<?php
function sendSMS($mobile_no,$text)
{

	// Authorisation details.
	$username = "mokshithgowda2903@gmail.com";
	$hash = "c32690e08b62c8e1308342d7cdeaa81b27b88027042d2aa5734f3a75a43eb61f";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "1";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "91".$mobile_no; // A single number or a comma-seperated list of numbers
	$message = $text;
	$message.=" Thank you";
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
	$array=json_encode($result);
	$r=json_decode($array);
	// echo $array['status'];
	// echo $numbers;

}
// sendSMS('7026396908',"HEllo Mokshith,,,,,");
?>