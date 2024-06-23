<?php include_once 'inc/head.php'; ?>
<?php //include_once 'inc/header.php'; ?>
<?php 
//include("inc/sidebar.php");
$thismonth = date("Y-m");
?>
<div class="wrapper">
<div class="container" style="text-align:center; padding:2% 10%;">

<div class="col-sm-6 col-sm-offset-3">
<h1 style="color:#333; font-weight:bold; margin-bottom:2px;"><?php echo strtoupper($globalwname); ?></h1>
<div id="msgbox"></div>
<?php
if($globalupermit == '1'){
echo '<div style="margin-bottom:25px; color:#666;">Welcome! Click any of the button below to gain access.</div>
<a href="order-bar-home.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Bar 1 (Lounge)</a><hr />
<a href="daily-sales-bar1.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Daily Sales Record (Bar 1)</a>';
}elseif($globalupermit == '2'){
echo '<div style="margin-bottom:25px; color:#666;">Welcome! Click any of the button below to gain access.</div>
<a href="order-bar2-home.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Bar 2 (Pool Bar)</a><hr />
<a href="daily-sales-bar2.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Daily Sales Record (Bar 2)</a>';
}elseif($globalupermit == '3'){
echo '<div style="margin-bottom:25px; color:#666;">Welcome! Click any of the button below to gain access.</div>
<a href="order-bar-home.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Bar 1 (Lounge)</a>
<a href="order-bar2-home.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Bar 2 (Pool Bar)</a><hr />
<a href="daily-sales-bar1.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Daily Sales Record (Bar 1)</a>
<a href="daily-sales-bar2.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Daily Sales Record (Bar 2)</a>';
}else{
echo '<div style="text-align:center;font-size:16px;">Oops! Access denied. Please contact the administrator for permission.<div>';
}
?>
<a href="waiterprofile.php?id=<?php echo $globalwid; ?>" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Change Password</a>
<a href="logout.php" class="btn btn-lg btn-lemon" style="display:block;margin:10px auto;">Log Out</a>
<div style="margin-top:50px; color:#666; font-size:12px;">&copy; Copyright 2019 BigHMS - Hotel Management System.<br>All rights reserved.</div>
</div>
</div>
</div>
<?php include_once 'inc/footer.php'; ?>
<style>
.btn-lemon{background-color: #52ffdc;background-image: linear-gradient(180deg, #52ffdc 22%, #FFE32C 100%); color:#333; padding:20px;}
.btn-lemon:hover{/*background-color: #52ffdc; background-image: linear-gradient(180deg, #52ffdc 1%, #FFE32C 100%);*/
background-color: #ffffff;background-image: linear-gradient(180deg, #ffffff 1%, #cccccc 100%); color:#333; padding:20px;}
body{font-size:14px;}
.wrapper{background-color: #21D4FD;background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%); height:100vh; margin:0; padding:0;}
</style>