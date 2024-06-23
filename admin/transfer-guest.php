<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; 
SetRoomsandPrices();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Transfer Guest to Another Room</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transfer Guest</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT order_room.*,addroom.roomType,addroom.categoryid,addroom.roomrate FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' AND order_room.id = '".mysqli_real_escape_string($conn4as,$_GET["id"])."' ORDER BY order_room.id DESC")){
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
<input type="hidden" name="dwat" value="transferguest" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidinvoiceid" value="<?php echo $rs["invoiceid"]; ?>" />
<input type="hidden" name="hidroomid" value="<?php echo $rs["roomid"]; ?>" />
<input type="hidden" name="hidroomname" value="<?php echo $rs["roomType"]; ?>" />
<input type="hidden" name="hidroomrate" value="<?php echo $rs["roomrate"]; ?>" />
<input type="hidden" name="hidtotal" value="<?php echo $rs["total"]; ?>" />
<input type="hidden" name="hidispaid" value="<?php echo $rs["ispaid"]; ?>" />
<input type="hidden" name="hiddiscount" value="<?php echo $rs["discount"]; ?>" />
<input type="hidden" name="hidduration" value="<?php echo $rs["duration"]; ?>" />
<input type="hidden" name="hidvat" value="<?php echo $rs["vat"]; ?>" />

<div class="col-sm-5" style="background:#E4F0F3; border-radius:5px; display:block; padding:20px; margin-right:20px;">
<h4 style="margin:0 0 10px 0;text-decoration:underline;"><strong>Current Room Details:</strong></h4>
<?php
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
?>
</div>


<div class="col-sm-6" style="background:#f5f5f5; border-radius:5px; display:block; padding:20px;">
<strong style="color:#f00;">Very Important:</strong> Select "<strong>Change Room Only</strong>" from <strong>Transfer Type</strong> dropdown if you only want to move the customer above to a new room and still maintain the price charged above. Select "<strong>Upgrade</strong>" to move above customer to another room with the same/different price charge.<br /><br /> 

<label>Transfer Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="transfertype" id="transfertype" onchange="if(this.value == 'ur'){document.getElementById('showdiscount').style.display = 'block';}else{document.getElementById('showdiscount').style.display = 'none';}" class="form-control" required x-moz-errormessage="Select a room type.">
<option value="">Select...</option>
<option value="cr">Change Room Only</option>
<option value="ur">Upgrade</option>    
</select>
</div>

<label>Select New Room:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="roomname" id="roomname" class="form-control" required x-moz-errormessage="Select a room type." onchange="">
  <option value="">Select...</option>
    <?php
              $sql= "SELECT id,roomType,categoryid,currentinv,roomrate FROM addroom";
              $query = mysqli_query($conn4as,$sql);
			  while($addroom = mysqli_fetch_assoc($query)){
                echo ($oldroomid == $addroom["id"] ||$addroom["currentinv"] != '')?'<option value="'.$addroom['id'].'" disabled style="background:#eee;"><strong>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$addroom["categoryid"]),"catname").' ('.$addroom['roomType'].')&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$cursign.number_format($addroom["roomrate"]).'</strong></option>':'<option value="'.$addroom['id'].'">'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$addroom["categoryid"]),"catname").' ('.$addroom['roomType'].')&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$cursign.number_format($addroom["roomrate"]).'</option>';
			  }
			  ?>
  </select>
</div>
<!--var dis = (parseFloat(document.getElementById(&quot;deductamt&quot;).value)/parseFloat(document.getElementById(&quot;totalamt&quot;).value))*100;document.getElementById(&quot;disval&quot;).innerHTML = dis;-->
<div id="showdiscount" style="display:none;">
<label>Discount (%):</label>
<div class="form-group input-group">
<input type="text" step="1" name="discount" id="discount" class="form-control" value="<?php echo $rs["discount"]; ?>">
<span class="input-group-addon styledc"<?php echo DiscountConversion(); ?>><i class="fa fa-building-o"></i></span>
</div>
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