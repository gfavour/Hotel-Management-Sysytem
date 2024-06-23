<?php 
include('../fxn/connection.php'); 
$globalwid = $_SESSION["wamyi15"];
if ($globalwid == ''){redirect("index.php");}
$globalwname = $_SESSION["wamyn15"];
$globalupermit = $_SESSION["wamyup15"];
include('../fxn/paginator-bootstrap.php');
$globalrole = 'waiter';
?>
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
    <link rel="stylesheet" href="../resources/css/skins/skin-blue.min.css">
	
  	<link rel="stylesheet" href="../fxn/paginator-bootstrap.css">
	<link rel="stylesheet" href="../resources/css/ps-css.css">
	<style>
	.floatmsg{z-index:1000; bottom:10px; right:10px; position:fixed; padding:10px 10px; background:rgba(255,255,153,0.8); border:rbga(255,255,153,1) solid 1px; width:300px; min-height:100px; border-radius:5px;}
	.floatmsg2{z-index:800; bottom:200px; right:10px; position:fixed; padding:10px 10px; background:rgba(215,215,215,0.8); border:rbga(215,215,215,1) solid 1px; width:300px; min-height:100px; border-radius:5px;}
	
	.touchbox{border-radius:5px; margin:10px 10px 10px 0; padding:20px; text-align:center; min-height:200px;}
	.red{color:#f00;}.green{color:#00CC00;}
	.width-div-3{margin-left:0px !important; padding-left:0px !important; margin-bottom:5px; padding-bottom:5px; border-bottom:#ccc dotted 1px;}
	.container{padding:0px;}
	#restockbox{display:inline-block; padding:2px 10px; margin:5px 5px 5px 0; border:#ccc solid 1px; background:#f5f5f5; font-size:11px; border-radius:5px;}
	.styledc{ background:#99CC00 !important; border:solid 1px #99CC00 !important; color:#fff;}
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