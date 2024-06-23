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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="../resources/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../resources/css/skins/skin-yellow.min.css">
	
  	<link rel="stylesheet" href="../fxn/paginator-bootstrap.css">
	<link rel="stylesheet" href="../resources/css/ps-css.css">
  	<script src="../plugins/chartjs/Chart.min.js"></script>
	<style>
	.floatmsg{z-index:2000; bottom:100px; right:10px; position:fixed; padding:10px 10px; background:rgba(255,255,153,0.8); border:rbga(255,255,153,1) solid 1px; width:300px; min-height:100px; border-radius:5px;}
	.floatmsg2{z-index:800; bottom:200px; right:10px; position:fixed; padding:10px 10px; background:rgba(215,215,215,0.8); border:rbga(215,215,215,1) solid 1px; width:300px; min-height:100px; border-radius:5px;}
	.floatalert{z-index:2000; top:10px; right:35%; position:fixed; padding:10px 10px; background:rgba(110,240,119,0.9); border:rbga(110,240,119,1) solid 1px; width:400px; min-height:20px; border-radius:5px; text-align:center; /*110,240,91*/}
	.touchbox{border-radius:5px; margin:10px 10px 10px 0; padding:20px; text-align:center; min-height:200px;}
	.red{color:#f00;}.green{color:#00CC00;}
	.width-div-3{margin-left:0px !important; padding-left:0px !important; margin-bottom:5px; padding-bottom:5px; border-bottom:#ccc dotted 1px;}
	.container{padding:0px;}
	#restockbox{display:inline-block; padding:2px 10px; margin:5px 5px 5px 0; border:#ccc solid 1px; background:#f5f5f5; font-size:11px; border-radius:5px;}
	.styledc{ background:#99CC00 !important; border:solid 1px #99CC00 !important; color:#fff;}
	.grandbox{width:280px; border:1px #ddd solid; border-radius:5px; padding:10px; text-align:center; margin:10px;display:inline-block; font-size:18px; color:#0066FF; height:80px;}
	
	@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: inherit;
    }
}
	</style>
  </head>