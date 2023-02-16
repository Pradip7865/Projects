<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//namespace PHPMailer\PHPMailer
// Include library files
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


// Create an instance; Pass `true` to enable exceptions
$mail = new PHPMailer(true);

// Server settings
// $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;    //Enable verbose debug output
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = gethostbyname('smtp.gmail.com');           // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = '21amtics499@gmail.com';       // SMTP username
$mail->Password = 'xcytgiujazjfcnmf';         // SMTP password
// $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true, 'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT));
$mail->Port = 25;                          // TCP port to connect to

// Sender info
$mail->setFrom('21amtics@gmail.com', 'Pradip Kumar');
// $mail->addReplyTo($_SESSION['mail'], 'Contact Team');

// Add a recipient
$mail->addAddress($email);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
// $mail->addAttachment('<Filename along with source path>', '<Optional, name of the file>');
// Set email format to HTML
$mail->isHTML(true);

// Mail subject
$mail->Subject = 'Your OTP CODE IS.';

// Mail body content
$bodyContent = '<h1>OTP BELOW</h1>';
$bodyContent .= '<p>'.$code.'</p>';
$mail->Body    = $bodyContent;
