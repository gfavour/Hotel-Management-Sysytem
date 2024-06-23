<div style="margin-top:15px;">
<?php 
$currentinvid = $_GET["invoiceid"];
//just added isroom=1...to display room invoices only
$cqry = mysqli_query($conn4as,"SELECT invoiceid FROM orders WHERE guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND ispaid <> '1' AND invoiceid <> '".mysqli_real_escape_string($conn4as,$currentinvid)."'");
$ctotal = mysqli_num_rows($cqry);
if($ctotal > 0){
echo '<h2 style="width:350px;margin:40px 0 10px 0; font-size:22px; text-align:left;">Other Pending Invoice</h2>';
while($crs = mysqli_fetch_assoc($cqry)){
$cinvoiceid = $crs["invoiceid"];
?>

<div class="box box-default">
<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				    getPendingReceiptButtons($cinvoiceid); 
					$sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY orders.id DESC");
					if($sql){				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom = 1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isbar2"] == '1'){$services .= 'Bar2, ';$isbar2 = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Name: </strong>'.$rs["lastname"].' '.$rs["firstname"].'</div>';
						echo '<div><strong>Invoice ID: </strong>'.$rs["invoiceid"].'</div>';
						echo '<div><strong>Sub Total: </strong><span style="color:#F00;">'.$cursign.number_format($rs["total"],2).'</span></div>';
						echo '<div><strong>Payment Status: </strong><span style="color:#F00;">'.$ispaid.'</span></div>';
						echo '<div><strong>Service Rendered: </strong>'.$services.'</div>';
						echo '<div><strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
						$services = '';
						if ($rs["ispaid"] != '1'){ $overalldebt += $rs["total"]; }
					}
					}
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_room.*,addroom.roomType,addroom.categoryid FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Room Number: </strong>'.$rs["roomType"].'</div>';
						echo '<div><strong>Room Type: </strong>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$rs["categoryid"]),"catname").'</div>';
						echo '<div><strong>No of Room:</strong> '.$rs["noofroom"].'</div>';
						echo '<div><strong>No of Person: </strong>'.$rs["noofperson"].'</div>';
						echo '<div><strong>Check In: </strong>'.$rs["checkin"].'<br><strong>Check Out: </strong>'.$rs["checkout"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' <strong>Discount: </strong>'.$rs["discount"].'% <strong>VAT: </strong>'.$rs["vat"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Status: </strong>Checked '.$rs["checkstatus"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_bar.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Bar-1 (Lounge) Service</u></strong></div>';				  
					while($rs = mysqli_fetch_assoc($qry)){						
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }	
						
						if ($rs["vat"] > 0 && $rs["vat"] != ''){
						$vat = $rs["vat"]; $vatlabel = ', <strong>VAT:</strong> '.$vat.'%'; }else{ $vatlabel = ''; }
											
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].$vatlabel.', <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($isbar2 == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_bar2.*,addbar.name FROM order_bar2 inner join addbar on order_bar2.itemid = addbar.id WHERE order_bar2.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_bar2.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Bar-1 (Lounge) Service</u></strong></div>';				  
					while($rs = mysqli_fetch_assoc($qry)){						
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }				
						
						if ($rs["vat"] > 0 && $rs["vat"] != ''){
						$vat = $rs["vat"]; $vatlabel = ', <strong>VAT:</strong> '.$vat.'%'; }else{ $vatlabel = ''; }
								
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].$vatlabel.', <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($isrestaurant == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_restaurant.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }
						
						if ($rs["vat"] > 0 && $rs["vat"] != ''){
						$vat = $rs["vat"]; $vatlabel = ', <strong>VAT:</strong> '.$vat.'%'; }else{ $vatlabel = ''; }
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Food Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].$vatlabel.', <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($islaundary == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_laundary.id DESC");
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
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_spa.id DESC");
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
				
				
				<?php if ($isswimpool == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_swimpool.id DESC");
					if($sql){
				  echo '<div style="padding:10px; font-size:16px; text-align:left;"><strong><u>Swimming Pool Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Service: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' '.$rs["measure"].'(s), <strong>No of person: </strong>'.$rs["noofperson"].', <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($issport == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_real_escape_string($conn4as,$cinvoiceid)."' ORDER BY order_sportitem.id DESC");
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
<?php 
	}
}else{
	//echo '<div class="alert alert-info" style="padding:5px 10px; width:50%">No more pending invoice.</div>';
}
?>
</div>