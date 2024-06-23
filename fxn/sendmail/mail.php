<?php
$smart_smtp = "mail.elhassanhotels.com";
$smart_port = "465";
$smart_username = "noreply@elhassanhotels.com";
$smart_password = "P@#55w0rD";
$smart_receiver = "elhassanihotel2019@gmail.com";

function sendEmail($to,$subject,$message){
global $smart_smtp,$smart_port,$smart_username,$smart_receiver,$smart_password;

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isHTML(true);		
$mail->setFrom($smart_username, 'ElHassan Hotel');
$mail->addReplyTo($smart_username, 'ElHassan Hotel');
$mail->addAddress($smart_receiver, 'ElHassan Hotel');
$mail->Subject = $subject;
$mail->Body = $message;
$mail->send();

}
sendEmail($smart_receiver,"ElHassan Hotel Notifier 3","Room booked");
echo 'Mail sent email....';
?>