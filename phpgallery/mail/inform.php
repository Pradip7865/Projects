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
$mail->Username = 'private24112003@gmail.com';       // SMTP username
$mail->Password = 'ihgqsjokrjauwbsh';         // SMTP password
// $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true, 'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT));
$mail->Port = 25;                          // TCP port to connect to

// Sender info
$mail->setFrom('private24112003@gmail.com', 'Neel Patel');
// $mail->addReplyTo($_SESSION['mail'], 'Contact Team');

// Add a recipient
$mail->addAddress($_POST['email']);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
// $mail->addAttachment('<Filename along with source path>', '<Optional, name of the file>');
// Set email format to HTML
$mail->isHTML(true);

// Mail subject
$mail->Subject = 'Hey, '.$_POST['fname']." ".$_POST['lname']." your ticket number is here.";

// Mail body content
$bodyContent = '<h1>Ticket Number is below</h1>';
$bodyContent .= '<p>'.$ticketNumber.'</p>';
$mail->Body    = $bodyContent;


// Send email
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "An email has been sent to your email.";
}
