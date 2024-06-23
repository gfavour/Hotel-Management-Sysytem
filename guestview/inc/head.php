<?php 
include('../fxn/connection.php'); 

$globalid = $_SESSION["amyi15"];
$globalname = $_SESSION["amyn15"];
$globalemail = $_SESSION["amyem15"];
$globalrole = $_SESSION["role15"];
$globalpic = $_SESSION["photo15"];
if ($globalpic == '' || !file_exists('../archives/'.$globalpic)){$globalpic = '../resources/img/avatar1.png';}else{$globalpic = '../archives/'.$globalpic;}
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
	body{background:#ECF0F5;}
	.touchbox{border-radius:5px; margin:10px 10px 10px 0; padding:5px; background:#fff; border:#ddd solid 1px; text-align:center; min-height:200px;}
	.touchbox img{border-radius:5px 5px 0 0;}
	.col-sm-4{ width:32%!important;}
	.red{color:#f00;}.green{color:#00CC00;}
	.width-div-3{margin-left:0px !important; padding-left:0px !important; margin-bottom:5px; padding-bottom:5px; border-bottom:#ccc dotted 1px;}
	.container{padding:0px;}
	#restockbox{display:inline-block; padding:2px 10px; margin:5px 5px 5px 0; border:#ccc solid 1px; background:#f5f5f5; font-size:11px; border-radius:5px;}
	.styledc{ background:#99CC00 !important; border:solid 1px #99CC00 !important; color:#fff;}
	.grandbox{width:280px; border:1px #ddd solid; border-radius:5px; padding:10px; text-align:center; margin:10px;display:inline-block; font-size:18px; color:#0066FF; height:80px;}
	
	@media (max-width: 767px) {
	.col-sm-4{ width:100%!important;}
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