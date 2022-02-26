<?php 
//payment_mail('picostica@gmail.com','2323525',2200,'Jijo','Beginner');

function payment_mail($to,$orderid,$amount,$name,$date_txn){
$emailcontent='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EyeWebAlysis Invoice</title>
<link href="https://getmybus.picostica.com/dashboard/package/style.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="https://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap aligncenter">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<h1 class="aligncenter">Greeting From GetMyBus</h1>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<h2 class="aligncenter">Thanks for using GetMyBus Inc.</h2>
									</td>
								</tr>
								<tr>
									<td class="content-block aligncenter">
										<table class="invoice">
											<tr>
												<td>'.$name.'<br>Invoice #'.$orderid.'<br>'.$date_txn.'</td>
											</tr>
											<tr>
												<td>
													<table class="invoice-items" cellpadding="0" cellspacing="0">
														<tr>
															<td></td>
															<td class="alignright">&#8377; '.$amount.'</td>
														</tr>
														<tr class="total">
															<td class="alignright" width="80%">Total</td>
															<td class="alignright">&#8377;'.$amount.'</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="content-block aligncenter">
										<a href="https://getmybus.picostica.com">View in browser</a>
									</td>
								</tr>
								<tr>
									<td class="content-block aligncenter">
										GetMyBus Inc. Mangalore 575006
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block">Questions? Email <a href="mailto:info@getmybus.picostica.com">info@getmybus.picostica.com</a></td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>';
//echo $emailcontent;
$subject = 'GetMyBus Payment Invoice';

$headers = "From: " . strip_tags('info@getmybus.picostica.com') . "\r\n";
$headers .= "Reply-To: ". strip_tags('info@getmybus.picostica.com') . "\r\n";
$headers .= "CC: admin@getmybus.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   
    // $PHPMailer->From = $from;
    // $PHPMailer->FromName = $_POST["your_name"];
    // //change where to mail sent 
    // $PHPMailer->AddAddress('sharathrj143@gmail.com');
    // $PHPMailer->Subject = "SaaS Contact";
    // $PHPMailer->MsgHTML($emailcontent);
    if (mail($to, $subject, $emailcontent, $headers)) {
        return true;
    } else {
      //echo '';
       return false;
    }
}
?>