<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<div>
<?php
//SELECT RECORD FROM ONLINEORDERS TABLE
$sql = select("SELECT * FROM onlineorders WHERE id = ".mysqli_escape_string($conn4as,$_POST["orderid"])." ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
					
					$orderid = $rs["id"];
					$oinvoiceid = $rs["invoiceid"];
					$invoiceid = $_POST["invoiceid"];
					$customerlname = $rs["customerlname"];
					$customerfname = $rs["customerfname"];
					$customeremail = $rs["customeremail"];
					$customerphone = $rs["customerphone"];
					$roomname = $rs["roomname"];
					$roomID = $_POST["roomname"];
					$noofroom = $_POST["noofroom"];
					$adult = $rs["adult"];
					$children = $rs["children"];
					$noofperson = $adult + $children;
					
					$checkin = $rs["checkin"];
					$checkout = $rs["checkout"];
					$inoutstatus = $rs["checkinout"];
					$duration;
					
					$orderdate = $rs["orderdate"];
					$amount = $_POST["amount"];
					$discount = 0;
					$vat = 0;
					
					$paymenttype = $rs["paymenttype"];
					$bookingsite = $rs["bookingsite"];
					$ispaid2 = $rs["ispaid"];
					$services = 'room';
					
//create guest account........
$sql = "INSERT INTO addclient(lastname,firstname,email,password,phone) VALUES('".mysqli_escape_string($conn4as,$customerlname)."','".mysqli_escape_string($conn4as,$customerfname)."','".mysqli_escape_string($conn4as,$customeremail)."','password','".mysqli_escape_string($conn4as,$customerphone)."')";
mysqli_query($conn4as,$sql);
$newuserrid = mysqli_insert_id($conn4as);

//insert online order into offline order table wrt new-user-id
$r = 0;$b = 0;$spo = 0;$spa = 0;$res = 0;$l = 0;
if ($services == 'room'){
$sql = "INSERT INTO order_room(invoiceid, guestid, roomid, noofroom, noofperson, checkin, checkout, orderdate, duration, discount, vat, unitprice, total, checkstatus, ispaid) VALUES('".mysqli_escape_string($conn4as,$invoiceid)."','".mysqli_escape_string($conn4as,$newuserrid)."','".mysqli_escape_string($conn4as,$roomID)."','".mysqli_escape_string($conn4as,$noofroom)."','".mysqli_escape_string($conn4as,$noofperson)."','".mysqli_escape_string($conn4as,$checkin)."','".mysqli_escape_string($conn4as,$checkout)."','".mysqli_escape_string($conn4as,$time)."','".mysqli_escape_string($conn4as,$duration)."','".mysqli_escape_string($conn4as,$discount)."','".mysqli_escape_string($conn4as,$vat)."','".mysqli_escape_string($conn4as,$amount)."','".mysqli_escape_string($conn4as,$amount)."','".mysqli_escape_string($conn4as,$inoutstatus)."','".mysqli_escape_string($conn4as,$ispaid2)."')";
mysqli_query($conn4as,$sql);
uORd("UPDATE addroom SET roomleft = roomleft - ".mysqli_escape_string($conn4as,$noofroom)." WHERE id = ".mysqli_escape_string($conn4as,$roomID));
$r = '1'; $nooforderadded = 1;
}

if ($nooforderadded < 1){
			//echo 'No item ordered.';
}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, islaundary, isrestaurant, orderdate, total,ispaid) VALUES('".mysqli_escape_string($conn4as,$invoiceid)."','".mysqli_escape_string($conn4as,$newuserrid)."','".mysqli_escape_string($conn4as,$r)."','".mysqli_escape_string($conn4as,$b)."','".mysqli_escape_string($conn4as,$spo)."','".mysqli_escape_string($conn4as,$spa)."','".mysqli_escape_string($conn4as,$l)."','".mysqli_escape_string($conn4as,$res)."','".mysqli_escape_string($conn4as,$time)."','".mysqli_escape_string($conn4as,$amount)."','".mysqli_escape_string($conn4as,$ispaid2)."')";
		 mysqli_query($conn4as,$sql);
		 //echo 'OSA<->'.$newuserrid;
}

//Finally mark this online order as processed - 2
uORd("UPDATE onlineorders SET status = '2' WHERE id = ".mysqli_escape_string($conn4as,$orderid));		 	
?>
			               		
					<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY orders.id DESC");
					if($sql){				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Invoice ID: </strong>'.$rs["invoiceid"].'</div>';
						echo '<div><strong>Name: </strong>'.$rs["lastname"].' '.$rs["firstname"].'</div>';
						echo '<div><strong>Service Rendered: </strong>'.$services.'</div>';
						echo '<div><strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '<div><strong>Grand Total: </strong>'.number_format($rs["total"],2).'</div>';
						echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
						echo '</div>';
						$services = '';
					}
					}
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_room.*,addroom.roomType FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_room.id DESC");
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
				
				
				<?php if ($isbar == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_bar.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Bar Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				
				<?php if ($isrestaurant == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_restaurant.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Food Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($islaundary == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_laundary.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Laundary Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-2">';
						echo '<div><strong>Service: </strong>'.$rs["title"].'</div>';
						echo '<div><strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				
				<?php if ($isspa == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_spa.id DESC");
					if($sql){
				  echo '<div style="padding:10px; font-size:16px; text-align:left;"><strong><u>Spa Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Service: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>No of person: </strong>'.$rs["noofperson"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($issport == '1'){ ?>
				<div style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."' ORDER BY order_sportitem.id DESC");
					if($sql){
				  echo '<div style="padding:10px; font-size:16px; text-align:left;"><strong><u>Sport Item</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				<!-- /.box-body -->
              </div>
</div>

<?php include_once 'reportfooter.php'; ?>
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>