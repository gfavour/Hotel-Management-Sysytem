<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>
<div class="content-wrapper">
<!-- Begin Main content -->
<section class="content">
<div class="row" style="text-align:center">
<div class="col-sm-8" style="margin: 10% auto!important; float:none; background:#fff; text-align:center; padding:25px;">
<?php
$m = $_GET["m"];
$clientid = $_GET["cid"];
$myinvoiceid = $_GET["invid"];
$sql = "SELECT order_room.id,order_room.invoiceid,order_room.checkin,order_room.checkout,order_room.duration,order_room.ordertime,order_room.roomid,order_room.guestid, (SELECT CONCAT(addclient.lastname,' ',addclient.firstname) FROM addclient WHERE addclient.id = order_room.guestid) AS name,addroom.roomType,addroom.rcardno FROM order_room INNER JOIN addroom ON addroom.id = order_room.roomid WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$myinvoiceid)."' ORDER BY order_room.id";

$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);
if($total > 0){
$rs = mysqli_fetch_assoc($qry);
$name = $rs["name"];
$roomno = $rs["roomType"];
$rcardno = $rs["rcardno"];
$invoiceid = $rs["invoiceid"];

echo '<h2 style="margin:0 0 10px 0;">Booking Confirmation</h2>';
echo '<div class="msgbox" id="msgbox"></div>';
echo 'Customer ('.$name.') has been successfully booked. Below is the booking details.<br>Use invoice id below to create room card.<br><br>';
echo '<div style="text-align:left; width:50%;margin:0 auto 20px auto;line-height:22px;">';
echo '<span class="gaplabel1"><strong>Invoice #: </strong></span>'.$invoiceid;
echo '<br><span class="gaplabel1"><strong>Room Number: </strong></span>'.$roomno;
echo '<br><span class="gaplabel1"><strong>Card Number: </strong></span>'.$rcardno;
echo '</div>';
echo '<a href="manage-inout-grid.php" class="btn btn-lg btn-default">Back to Room Booking</a>';
// <a href="javascript:void(0);" class="btn btn-lg btn-primary" onClick="SendByAjax(\'dwat=launchcw&invid='.$invoiceid.'&cardno='.$rcardno.'\',\'../fxn/launchcw.php\',\'\')">Write to Card</a>
//orderconfirm.php?dwat=launchcw&invid='.$invoiceid.'&cardno='.$rcardno.'
// onClick="SendByAjax(\'dwat=launchcw&invid='.$invoiceid.'&cardno='.$rcardno.'\',\'../fxn/launchcw.php\',\'\')"
file_put_contents("../backup/launchlog.txt",$invoiceid);
}else{
echo '<h2 style="margin:0!important;">Oops!</h2><br>No room booking record found.<br><br><a href="manage-inout-grid.php" class="btn btn-lg btn-primary">Go Back to Room Booking</a>';
}
if($_REQUEST["dwat"] = 'launchcw' && $_REQUEST["invid"] != '' && $_REQUEST["cardno"] != ''){ 
	//exec('"E:\vb60\BigHMSDoorLock\BigHMS.exe"');
	//pclose(popen('start /B E:\vb60\BigHMSDoorLock\BigHMS.exe',"rw"));
	//echo 'Done launching..'; 
}

?>
</div>
</div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
var invid = '<?php echo $_GET["invid"]; ?>';
if(invid != ''){ popupwin("invoice-company.php?invoiceid="+invid,"900","700"); }
</script>