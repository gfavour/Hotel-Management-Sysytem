<?php
$smart_smtp = "mail.elhassanhotels.com";
$smart_port = "465";
$smart_username = "noreply@elhassanhotels.com";
$smart_password = "P@#55w0rD";
$smart_receiver = "elhassanihotel2019@gmail.com"; //elhassanihotel2019

function sendEmail($to,$subject,$message){
global $smart_smtp,$smart_port,$smart_username,$smart_receiver,$smart_password;
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = $smart_smtp;
$mail->Port = $smart_port;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = $smart_username;
$mail->Password = $smart_password;
$mail->isHTML(true);
			
$mail->setFrom($smart_username, 'ElHassan Hotel');
$mail->addReplyTo($smart_username, 'ElHassan Hotel');
$mail->addAddress($smart_receiver, 'ElHassan Hotel');
$mail->addAddress("saintvaldo@gmail.com", 'ElHassan Hotel');
$mail->addAddress("favoursdot@gmail.com", 'ElHassan Hotel');
$mail->Subject = $subject;
$mail->Body = $message;
if(!$mail->send()){
	echo 'Sending email...Failed';
}else{
	echo 'Sending email...Successful. Check your email!';
}
}
sendEmail($smart_receiver,"ElHassan Notifier From Developer..","Room booked for 3 developers.");
?>