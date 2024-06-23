<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead-pos.php'; ?>
<div>
<div style="font-size:10px !important;">
			               		
					<div style="margin-top:1px;">
				  <?php
					$ReceiptTitle = getReceiptRoomTitle($_GET["invoiceid"]);
					echo $ReceiptTitle;
				?>
			    </div>
				
				<div style="margin-top:1px;">
				  <?php
					/*
					$sql = select("SELECT order_room.*,addroom.roomType FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-3">';
						echo '<div><strong>Room Type: </strong>'.$rs["roomType"].', ';
						//echo '<div>No of Room: '.$rs["noofroom"].'</div>';
						//echo '<div><strong>No of Person: </strong>'.$rs["noofperson"].'</div>';
						//echo '<div><strong>Check In: </strong>'.$rs["checkin"].' <strong>Check Out: </strong>'.$rs["checkout"].'</div>';
						//echo '<div><strong>Duration: </strong>'.$rs["duration"].' <strong>Discount: </strong>'.$rs["discount"].'% <strong>VAT: </strong>'.$rs["vat"].'%</div>';
						echo '<strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'</div>';
						echo '</div>';//.' <strong>Status: </strong>Checked '.$rs["checkstatus"].'
					}
					}
					*/
				?>
			    </div>		
				
				<?php //if ($isbar == '1'){ ?>
				<div style="margin-top:1px;">
				  <?php
					$sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 inner join addbar2 on order_bar2.itemid = addbar2.id WHERE order_bar2.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar2.id DESC");
					if($sql){
				 	echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Bar Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }
						
						if ($rs["guestid"] <> '1'){
							echo '<div class="width-div-3">';
							echo '<strong>Qty: </strong>'.$rs["qty"].'<br><strong>Amount: </strong>'.$cursign.number_format($rs["total"],2);
							echo '<br><strong>Payment Status: </strong>'.$ispaid.', ';
							echo '<br><strong>Date / Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).', ';
							echo '</div>';
						}else{	
							echo '<div class="width-div-3">';
							echo '<strong>Item: </strong>'.$rs["name"].', ';
							echo '<strong>Qty: </strong>'.$rs["qty"].', ';
							echo '<br><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.'<br><strong>Sub Total: </strong>'.$cursign.number_format($rs["total"],2);
							echo '<br><strong>Payment Status: </strong>'.$ispaid;
							echo '<br><strong>Date / Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).', ';
							if($rs["waiter"] != ''){ echo '<br><strong>Waiter: </strong>'.$rs["waiter"]; }
							echo '</div>';
						}
						$grandtotal_bar += $rs["total"]; 
						$totaldiscount += $rs["discount"];
						$totalvat += $rs["vat"]; 
					}
					}
				?>
			    </div>		
				<?php //} ?>
								
								
				<?php //if ($isswimpool == '1'){  ?>
				<div style="margin-top:1px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_swimpool WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
					if($sql){
				    echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Swimming Pool Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						echo '<div class="width-div-3">';
						echo '<div><strong>Swimming Pool: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' '.$rs["measure"].'(s), <strong>No of person: </strong>'.$rs["noofperson"].'</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].', <strong>Sub Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Date/Time: </strong>'.$rs["orderdate"].' '.$rs["ordertime"].'</div>';echo '<strong>Payment Status: </strong>'.$ispaid;
						echo '<br><strong>Date / Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).', ';
						echo '</div>';
						$grandtotal_bar += $rs["total"];
						$totaldiscount += $rs["discount"];
					}
					}
				?>
			    </div>		
				<?php 
				//}
				echo '<div><strong>Discount: </strong>'.$totaldiscount.'%, <strong>VAT: </strong>'.$totalvat.'%<br><strong>GRAND TOTAL: </strong>'.$cursign.number_format($grandtotal_bar,2).'</div>'; 
				?>
				
              </div>
</div>

<?php include_once 'reportfooter-pos.php'; ?>
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>