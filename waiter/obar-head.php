<?php 
include_once 'inc/head.php'; 
$pagelnk = basename($_SERVER['PHP_SELF'],".php");
if($pagelnk == 'order-bar-home' || $pagelnk == 'order-res-home'){
  $active1 = 'active';
}elseif($pagelnk == 'order-bar-lists' || $pagelnk == 'order-res-lists'){
  $active2 = 'active';
}elseif($pagelnk == 'order-bar-spool' || $pagelnk == 'order-swimpool-lists'){
  $active3 = 'active';
}
if ($globalrole != 'waiter'){
	redirect("index.php?m=access denied");
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hotel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/font-awesome.min.css">
	<link rel="stylesheet" href="resource/css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="resource/css/main.css">
    <link rel="stylesheet" href="resource/css/style.css">
    <link rel="stylesheet" href="resource/css/responsive.css">
    <script src="resource/js/vendor/modernizr-2.8.3.min.js"></script>
	
<style>
body{ background:#fff;}
.container{width:95%; margin:auto !important;}
#containeritems_x{height:500px; overflow-y:auto; padding-left:0;}

span.gaplabel1{ display:inline-block !important;width:100px; font-weight:bold; line-height:20px;}
.itemlabel{ width:270px; height:180px; overflow:hidden; border:#ddd solid 1px;border-radius:5px;padding:10px 10px;margin:10px 5px 0 5px; border:#ccc solid 1px; background:#fff;}
.isselected{
background: rgb(255,244,163);
background: -moz-linear-gradient(top, rgb(255,244,163) 0%, rgb(247,219,64) 100%);
background: -webkit-linear-gradient(top, rgb(255,244,163) 0%,rgb(247,219,64) 100%);
background: linear-gradient(to bottom, rgb(255,244,163) 0%,rgb(247,219,64) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff4a3', endColorstr='#f7db40',GradientType=0 );

}
.barbcsidebar{background:#fff !important; padding:20px 30px 20px 20px !important; margin-bottom:10px;}
.active{background:#ffc !important;}
.styledc{ background:#00CC00 !important; border:solid 1px #00CC00 !important; color:#fff;}
.labely{display:inline-block;width:60px;}
</style>

</head>