<?php
error_reporting(0);

$conn4as = mysqli_pconnect("localhost", "root", "") or trigger_error(mysqli_error(),E_USER_ERROR);
mysqli_select_db("bighms", $conn4as);

$qry1 = mysqli_query($conn4as,"SELECT id,email FROM settings");
$total1 = mysqli_num_rows($qry1);

if ($total1 > 0){
$rs1 = mysqli_fetch_assoc($qry1);
$smart_receiver = $rs1["email"];
}else{
$smart_receiver = "favoursdot@gmail.com";
}

$smart_smtp = "mail.elhassanhotels.com";
$smart_port = "465";
$smart_username = "noreply@elhassanhotels.com";
$smart_password = "P@#55w0rD";

function sendEmail($to,$subject,$message){
global $smart_smtp,$smart_port,$smart_username,$smart_receiver,$smart_password;

date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->IsSMTP(); //enable IsSMTP
//$mail->SMTPDebug = 2;
//$mail->Debugoutput = 'html';
$mail->Host = $smart_smtp;
$mail->Port = $smart_port;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = $smart_username;
$mail->Password = $smart_password;
$mail->isHTML(true);
			
$mail->setFrom($smart_username, 'ElHassan Hotels');
$mail->addReplyTo($smart_username, 'ElHassan Hotels');
$mail->addAddress($smart_receiver, 'ElHassan Hotels');
$mail->addAddress("saintvaldo@gmail.com", 'ElHassan Hotels');
$mail->Subject = $subject;
$mail->Body = $message;
if(!$mail->send()){
	$fpath = "../../logs/send-email-later.txt";
	file_put_contents($fpath, $message.PHP_EOL, FILE_APPEND);
}
}
if (isset($_REQUEST["emsubject"])){
sendEmail($smart_receiver,$_REQUEST["emsubject"],$_REQUEST["msg"]);
}
?>