<?php

    require 'class.phpmailer.php';

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $name = 'Sharath';
    $email = 'sharathrj143@gmail.com';
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; // Your SMTP PArameter
    $mail->Port = 587; // Your Outgoing Port
    $mail->SMTPAuth = true; // This Must Be True
    $mail->Username = "getmybuswebsite@gmail.com"; // Your Email Address
    $mail->Password = "Getmybuswebsite123"; // Your Password
    $mail->SMTPSecure = 'tls'; // Check Your Server's Connections for TLS or SSL

    $mail->From = "getmybuswebsite@gmail.com";
    $mail->FromName = $name;
    $mail->AddAddress("sharathrj143@gmail.com");

    $mail->IsHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $mail_body = "<html> <body>";
    $mail_body = "<b>Hello Admin,</b><br><br>You have got email from your website.<br><br>";
    $mail_body .= '<table style="" cellpadding="3">';
    $mail_body .= "
                    <tr>
                    <td width='50'> <strong> Name </strong> </td>
                    <td width='5'> : </td>
                    <td> $name </td>
                    </tr>
                    <tr>
                    <td> <strong> Email </strong> </td>
                    <td> : </td>
                    <td> $email </td>
                    </tr>
                    <tr>
                    <td> <strong> Message </strong> </td>
                    <td> : </td>
                    <td> $message </td>
                    </tr>
                    </table>
                    </body> </html>"; 

    if(!$mail->Send())
    {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else
    {
        echo 'success';
    }

    ?>