<?php 
include('../fxn/connection.php'); 
?>

<?php
$globalid = $_SESSION["amyi15"];
if ($globalid == ''){redirect("../index.php");}
$globalname = $_SESSION["amyn15"];
$globalemail = $_SESSION["amyem15"];
$globalrole = $_SESSION["role15"];
$globalpic = $_SESSION["photo15"];
if ($globalpic == '' || !file_exists('../archives/'.$globalpic)){$globalpic = '../resources/img/avatar1.png';}else{$globalpic = '../archives/'.$globalpic;}
?>
<?php
$selfile = "../logs/send-email-later.txt";
if ($sock = @fsockopen('www.google.com', 80, $num, $error, 5)){
	if(file_exists($selfile)){
	//readfile...
	$logs = file_get_contents($selfile);
	//send email......
	$params = "emsubject=Offline Transaction(s)";
	$params .= "&msg=".$logs;
	sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
	//delete file
	unlink($selfile);
	}
}
?>
<?php include('../fxn/paginator-bootstrap.php'); ?>