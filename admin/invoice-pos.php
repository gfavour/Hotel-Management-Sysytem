<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead-pos.php'; ?>
<div>
<div style="font-size:12px !important;">
			               		
					<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY orders.id DESC");
					if($sql){				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						//if ($rs["company"] != ''){$company = "<strong>Company: </strong>".$rs["company"].'<br>';}else{$company = '';}
						
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isbar2"] == '1'){$services .= 'Bar2, ';$isbar2 = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						echo '<div class="width-div-3">';
						echo '<strong>Invoice ID: </strong>'.$rs["invoiceid"].', ';
						if($rs["guestid"] != '1'){
							echo '<div><strong>Name: </strong>'.$rs["lastname"].' '.$rs["firstname"].'</div>';
							echo $company;
						}
						echo '<strong>Service Rendered: </strong>'.$services.' ';
						echo '<strong>Date: </strong>'.$rs["orderdate"].', ';
						echo '<br><strong>Grand Total: </strong>'.number_format($rs["total"],2).'';
						echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
						echo '</div>';
						$services = '';
					}
					}
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_room.*,addroom.roomType FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				    echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-3">';
						echo '<div><strong>Room Type: </strong>'.$rs["roomType"].', ';
						echo '<div>No of Room: '.$rs["noofroom"].'</div>';
						echo '<div><strong>No of Person: </strong>'.$rs["noofperson"].'</div>';
						echo '<div><strong>Check In: </strong>'.$rs["checkin"].' <strong>Check Out: </strong>'.$rs["checkout"].'</div>';
						echo '<div><strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
						echo '</div>';//.' <strong>Status: </strong>Checked '.$rs["checkstatus"].'
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar.id DESC");
					if($sql){
				  echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Bar Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-3">';
						echo '<strong>Item: </strong>'.$rs["name"].'<br>';
						echo '<strong>Qty: </strong>'.$rs["qty"].'<br>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar2 == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 inner join addbar2 on order_bar2.itemid = addbar2.id WHERE order_bar2.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar2.id DESC");
					if($sql){
				  echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Pool Bar Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-3">';
						echo '<strong>Item: </strong>'.$rs["name"].'<br>';
						echo '<strong>Qty: </strong>'.$rs["qty"].'<br>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isrestaurant == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
					if($sql){
				  echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-3">';
						echo '<strong>Food: </strong>'.$rs["name"].'<br>';
						echo '<strong>Qty: </strong>'.$rs["qty"].'<br>';
						echo '<strong>Price: </strong>'.$cursign.number_format($rs["unitprice"],0).'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],0).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($islaundary == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_laundary.id DESC");
					if($sql){
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-3">';
						echo '<strong>Service: </strong>'.$rs["title"].'<br>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				
				<?php if ($isspa == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_spa.id DESC");
					if($sql){
				  echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Spa Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						echo '<div class="width-div-3">';
						echo '<strong>Service: </strong>'.$rs["name"].'<br>';
						echo '<strong>No of person: </strong>'.$rs["noofperson"].'<br>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isswimpool == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_swimpool WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
					if($sql){
				    echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Swimming Pool Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						echo '<div class="width-div-3">';
						echo '<strong>Service: </strong>'.$rs["name"].'<br>';
						echo '<strong>Duration: </strong>'.$rs["duration"].' '.$rs["measure"].'(s)<br>';
						echo '<strong>No of person: </strong>'.$rs["noofperson"].'<br>';
						echo '<strong>Discount: </strong>'.$rs["discount"].'%<br>';
						echo '<strong>Price: </strong>'.$cursign.number_format($rs["unitprice"],0).'<br>';
						echo '<strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br>';
						echo '<strong>Date: </strong>'.$rs["orderdate"];
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($issport == '1'){ ?>
				<div style="margin-top:5px;">
				  <?php
					$sql = select("SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_sportitem.id DESC");
					if($sql){
				  echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Sport Item</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<div class="width-div-3">';
						echo '<strong>Item: </strong>'.$rs["name"].'<br><strong>Qty: </strong>'.$rs["qty"].'<br><strong>Discount: </strong>'.$rs["discount"].'%<br><strong>Price: </strong>'.$cursign.$rs["unitprice"].'<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				<!-- /.box-body -->
              </div>
</div>

<?php include_once 'reportfooter-pos.php'; ?>
<?php include_once 'inc/footer.php'; ?>
<script>window.print();</script>