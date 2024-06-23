<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
		<?php
		$sql = select("SELECT * FROM onlineorders WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"])." ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
					
					$orderid = $rs["id"];
					$oinvoiceid = $rs["invoiceid"];
					$invoiceid = time();
					$customerlname = $rs["customerlname"];
					$customerfname = $rs["customerfname"];
					$customeremail = $rs["customeremail"];
					$customerphone = $rs["customerphone"];
					$roomname = $rs["roomname"];
					$noofroom = $rs["noofroom"];
					$adult = $rs["adult"];
					$children = $rs["children"];
					$checkin = $rs["checkin"];
					$checkout = $rs["checkout"];
					$orderdate = $rs["orderdate"];
					$amount = $rs["amount"];
					$paymenttype = $rs["paymenttype"];
					$bookingsite = $rs["bookingsite"];
					$ispaid2 = $rs["ispaid"];
					$services = 'Room';
					
		if ($rs["ispaid"] == '1'){$ispaid1 = 'Paid';}else{$ispaid1 = 'UnPaid';}
		?>
		
<form name="frm1x" id="frm1x" action="invoice-reservation.php" method="post">
<input type="hidden" name="dwat" value="processreservation" />
<input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
<input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>" />
<section class="content-header">
 <h1><?php echo 'Online Order <small>(From '.$bookingsite.')</small>'; ?></h1>
          <ol class="breadcrumb">
            <li><button class="btn btn-sm btn-warning" style="color:#fff;">Process Order & Print Receipt</button></li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row" style="margin-top:10px;">
            <div class="col-xs-12">
              
		<div id="msgbox"></div>
			  
			  <!-- box-body -->
			 
			  <div class="box box-primary">
			               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					echo '<div class="width-div-2 labelwidth">';
						echo '<div><strong>New Invoice ID: </strong>'.$invoiceid.'</div>';
						echo '<div><strong>Online Invoice ID: </strong>'.$oinvoiceid.'</div>';
						
						echo '<div><strong>Last Name: </strong>'.$customerlname.'</div>';
						echo '<div><strong>First Name: </strong>'.$customerfname.'</div>';
						echo '<div><strong>Service Rendered: </strong>'.$services.'</div>';
						
						echo '<div style="color:#f30;"><strong>Room Name: </strong>'.getRoomOptions($roomname).'</div>';
						echo '<div style="color:#f30;"><strong>Number of Room: </strong><input type="text" name="noofroom" value="'.$noofroom.'" style="color:#333;border:#ccc solid 1px;margin:5px 0; padding:3px 5px;"></div>';
						echo '<div><strong>No of adult: </strong>'.$adult.'</div>';
						echo '<div><strong>No of children: </strong>'.$children.'</div>';
						
						echo '<div style="color:#f30;"><strong>Check In: </strong>'.$checkin.'</div>';
						echo '<div style="color:#f30;"><strong>Check Out: </strong>'.$checkout.'</div>';
						
						echo '<div><strong>Date Ordered: </strong>'.$orderdate.'</div>';
						echo '<div><strong>Amount: </strong><input type="text" name="amount" value="'.$amount.'" style="color:#333;border:#ccc solid 1px;margin:5px 0; padding:3px 5px;"></div>';
						echo '<div><strong>Payment Type: </strong>'.$paymenttype.'</div>';
						
						echo '<div><strong>Payment Status: </strong><select name="ispaid" style="border:#ccc solid 1px;margin:5px 0; padding:3px 5px;">';
						if ($ispaid2 == '1'){ echo '<option value="1" selected>Paid</option><option value="0">UnPaid</option>';}
						elseif ($ispaid2 != '1'){ echo '<option value="1">Paid</option><option value="0" selected>UnPaid</option>';}echo '</select>';
						echo '</div>';
						
						echo '<div><strong>In/Out Status: </strong><select name="checkinout" style="border:#ccc solid 1px;margin:5px 0; padding:3px 5px;"><option value="out">Check Out</option><option value="in" selected>Check In</option></select>';
						echo '</div>';
						
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_room WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_room.*,addroom.roomType FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Room Type: </strong>'.$rs["roomType"].'</div>';
						echo '<div>No of Room: '.$rs["noofroom"].'</div>';
						echo '<div><strong>No of Person: </strong>'.$rs["noofperson"].'</div>';
						echo '<div><strong>Check In: </strong>'.$rs["checkin"].' <strong>Check Out: </strong>'.$rs["checkout"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' <strong>Discount: </strong>'.$rs["discount"].'% <strong>VAT: </strong>'.$rs["vat"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Status</strong>Checked '.$rs["checkstatus"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
              </div>
            </div>
          </div>
</section>
</form>
</div>
<?php include_once 'inc/footer.php'; ?>