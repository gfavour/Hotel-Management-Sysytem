<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; 
SetRoomsandPrices();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Booking Cancellation</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Booking Cancellation</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT orders.paystatus,order_room.*,addroom.roomType,addroom.categoryid,addroom.roomrate FROM order_room inner join addroom on order_room.roomid = addroom.id INNER JOIN orders ON orders.invoiceid = order_room.invoiceid WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' AND order_room.id = '".mysqli_real_escape_string($conn4as,$_GET["id"])."' ORDER BY order_room.id DESC")){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-guests.php?m=record not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
<div class="box box-primary" style="margin-top:10px;" id="jqdiv1">

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="cancelbooking" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidinvoiceid" value="<?php echo $rs["invoiceid"]; ?>" />
<input type="hidden" name="hidroomid" value="<?php echo $rs["roomid"]; ?>" />
<input type="hidden" name="hidroomname" value="<?php echo $rs["roomType"]; ?>" />
<input type="hidden" name="hidroomrate" value="<?php echo $rs["roomrate"]; ?>" />
<input type="hidden" name="hidtotal" value="<?php echo $rs["total"]; ?>" />
<input type="hidden" name="hidispaid" value="<?php echo $rs["ispaid"]; ?>" />
<input type="hidden" name="hiddiscount" value="<?php echo $rs["discount"]; ?>" />
<input type="hidden" name="hidduration" value="<?php echo $rs["duration"]; ?>" />
<input type="hidden" name="hidpaystatus" value="<?php echo $rs["paystatus"]; ?>" />
<input type="hidden" name="hidvat" value="<?php echo $rs["vat"]; ?>" />

<div class="col-sm-5" style="background:#E4F0F3; border-radius:5px; display:block; padding:20px; margin-right:20px;">
<h4 style="margin:0 0 10px 0;text-decoration:underline;"><strong>Current Room Details:</strong></h4>
<?php
$paystatus = $rs["paystatus"];
$oldroomid = $rs["roomid"];
$qr = mysqli_query($conn4as,"SELECT title,lastname,firstname FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$rs["guestid"]));
$r = mysqli_fetch_assoc($qr);
$fullname = $r["title"].' '.$r["lastname"].' '.$r["firstname"];
echo '<strong>Name: </strong>'.$fullname.'<br>';
echo '<strong>Invoice ID: </strong>'.$rs["invoiceid"].'<br>';
echo '<strong>Room Name/Type: </strong>'.$rs["roomType"].'<br>';
echo '<strong>Number of Person: </strong>'.$rs["noofperson"].'<br>';
echo '<strong>Check-in Date: </strong>'.$rs["checkin"].'<br>';
echo '<strong>Check-out Date: </strong>'.$rs["checkout"].'<br>';
echo '<strong>Duration: </strong>'.$rs["duration"].' day(s)<br>';
echo '<strong>Room Rate: </strong>'.$cursign.' '.number_format($rs["roomrate"]).'<br>';
echo '<strong>Amount Charged: </strong>'.$cursign.' '.number_format($rs["total"]).'<br>';
echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
if($rs["ispaid"] == '1'){$ispaid = 'Paid'; }else{ $ispaid = 'Unpaid'; }
echo '<strong>Payment Status: </strong>'.$ispaid.'<br>';
echo ($paystatus == 'dw')?'<strong>Payment Method: </strong>Deposit From Wallet<br>':'';
?>
</div>


<div class="col-sm-6" style="background:#f5f5f5; border-radius:5px; display:block; padding:20px;">
<strong style="color:#f00;">Important:</strong> Enter the number of days to remove or enter maximum duration to set order to zero.<br /><br /> 

<label>Number of Day(s) to Remove:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="remduration" id="remduration" class="form-control" required x-moz-errormessage="Enter number of days to remove.">
</div>

<label>Admin or Manager Password:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="password" name="adminpwd" id="adminpwd" class="form-control" required x-moz-errormessage="Administrator or manager password is required.">
</div>


<div class="col-md-12" style="margin-top:10px; margin-left:0; padding-left:0;">
<a href="manage-inout-grid.php" class="btn btn-sm btn-default" style="margin-right:10px;">Back to Manage Guests</a><button class="btn btn-warning btn-sm">Update</button>
</div></div>
</form>
</div>
</div>

		</div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>