<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<?php 
loadStaff2Array(); 
?>
<div>
<div>
			               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
					<h3 style="text-align:center;"><u><?php if ($_GET["ispaid"] == 0){echo 'Unpaid ';}elseif ($_GET["ispaid"] == 1){echo 'Paid ';} echo ucwords($_GET["service"]).' Service'; ?> Financial Report Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></u></h3>
				  <?php
				   if ($_GET["ispaid"] == '2'){$filter_ispaid = " ";}
				   else{
				  		if ($_GET["service"] == 'all'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'room'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'bar'){
							$filter_ispaid = " order_bar.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'bar2'){
							$filter_ispaid = " order_bar2.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'bar3'){
							$filter_ispaid = " order_bar3.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_ispaid = " order_restaurant.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'spa'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'laundary'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'sport'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}
				   }
				  
				   if ($_REQUEST["staffid"] != ''){
				  		if ($_GET["service"] == 'all'){
							$filter_staff = " ";
						}elseif ($_GET["service"] == 'room'){
							$filter_staff = " order_room.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";					
						}elseif ($_GET["service"] == 'bar'){
							$filter_staff = " order_bar.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'bar2'){
							$filter_staff = " order_bar2.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'bar3'){
							$filter_staff = " order_bar3.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_staff = " order_restaurant.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'spa'){
							$filter_staff = " order_spa.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_staff = " order_swimpool.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'laundary'){
							$filter_staff = " order_laundary.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'sport'){
							$filter_staff = " order_sportitem.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}
				  }else{
				  		$filter_staff = " ";
				  }
				  
				  
				   if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  		$fromInv = $_REQUEST["timefrom"];
						$toInv = $_REQUEST["timeto"];
						
						if ($_GET["service"] == 'all'){
				  		$filter_dt = " TIMESTAMP(orderdate, ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						
						}elseif ($_GET["service"] == 'room'){
							$filter_dt = " TIMESTAMP(order_room.orderdate, order_room.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
										
						}elseif ($_GET["service"] == 'bar'){
							$filter_dt = " TIMESTAMP(order_bar.orderdate, order_bar.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						
						}elseif ($_GET["service"] == 'bar2'){
							$filter_dt = " TIMESTAMP(order_bar2.orderdate, order_bar2.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'bar3'){
							$filter_dt = " TIMESTAMP(order_bar3.orderdate, order_bar3.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'spa'){
							$filter_dt = " TIMESTAMP(order_spa.orderdate, order_spa.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_dt = " TIMESTAMP(order_swimpool.orderdate, order_swimpool.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'laundary'){
							$filter_dt = " TIMESTAMP(order_laundary.orderdate, order_laundary.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'sport'){
							$filter_dt = " TIMESTAMP(order_sportitem.orderdate, order_sportitem.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						}
						
				  }else{
				  		$filter_dt = " orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
				  }
				  
				  
				  if ($_GET["service"] == 'all'){
				  $sql = select("SELECT * FROM orders WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  
				  }elseif ($_GET["service"] == 'room'){
				  $sql = select("SELECT order_room.*,addroom.roomType FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_room.id DESC");
				  $services = 'Room';
				  
				  }elseif ($_GET["service"] == 'bar'){
				  $sql = select("SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar.id DESC");
				  $services = 'Bar-1';
				  
				  }elseif ($_GET["service"] == 'bar2'){
				  $sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar2.id DESC");
				  $services = 'Bar-2';
				  
				  }elseif ($_GET["service"] == 'bar3'){
				  $sql = select("SELECT order_bar3.*,addbar3.name FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar2.id DESC");
				  $services = 'Bar-3';
				  
				  }elseif ($_GET["service"] == 'restaurant'){
				  $sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_restaurant.id");
				  $services = 'Restaurant';
				  
				  }elseif ($_GET["service"] == 'spa'){
				  $sql = select("SELECT * FROM order_spa WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Spa';
				  
				  }elseif ($_REQUEST["service"] == 'swimpool'){
				  $sql = select("SELECT * FROM order_swimpool WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Swimming Pool';
				  
				  }elseif ($_GET["service"] == 'laundary'){
				  $sql = select("SELECT * FROM order_laundary WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Laundary';
				  
				  }elseif ($_GET["service"] == 'sport'){
				  $sql = select("SELECT * FROM order_sportitem WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Sport Materials';
				  
				  }
				  
				  if($sql){
				  
				  if ($_GET["service"] == 'bar'){
					  echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Service Rendered:</th>
						  <th>Item Description</th>
						  <th>Qty.</th>
						  <th>Waiter</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Discount</th>
						  <th>Payment Status</th>
						  <th>Sub Total</th> 
						  <th>Staff</th>
						</tr>';
					
					}elseif ($_GET["service"] == 'bar2' || $_GET["service"] == 'bar3'){
					  echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Service Rendered:</th>
						  <th>Item Description</th>
						  <th>Qty.</th>
						  <th>Waiter</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Discount</th>
						  <th>Payment Status</th>
						  <th>Sub Total</th> 
						  <th>Staff</th>
						</tr>';
						
					}elseif ($_GET["service"] == 'restaurant'){
					  echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Service Rendered:</th>
						  <th>Item Description</th>
						  <th>Qty.</th>
						  <th>Table No.</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Discount</th>
						  <th>Payment Status</th>
						  <th>Sub Total</th> 
						  <th>Staff</th>
						</tr>';
					
					}elseif ($_GET["service"] == 'room'){
					   echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Service Rendered</th>
						  <th>Room Desc.</th>
						  <th>Check In</th>
						  <th>Check Out</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Discount</th>
						  <th>Payment Status</th>
						  <th>Sub Total</th> 
						  <th>Staff</th>
						</tr>';
					}else{
					   echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Service Rendered</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Discount</th>
						  <th>Payment Status</th>
						  <th>Sub Total</th> 
						  <th>Staff</th>
						</tr>';
					}
					
				    $c = 1;
					while($rs = mysqli_fetch_assoc($qry)){
						if ($_GET["service"] == 'all'){
							$services = '';
							if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
							if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
							if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
							if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
							if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
							if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
							if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						}
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$services.'</td>';
						
						if ($_GET["service"] == 'bar'){
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["waiter"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$rs["discount"].'%</td>';
						}elseif ($_GET["service"] == 'bar2' || $_GET["service"] == 'bar3'){
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["waiter"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$rs["discount"].'%</td>';
						}elseif ($_GET["service"] == 'restaurant'){
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["tableno"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$rs["discount"].'%</td>';
						}elseif ($_GET["service"] == 'room'){
							echo '<td>'.$rs["roomType"].'</td>';
							echo '<td>'.$rs["checkin"].'</td>';
							echo '<td>'.$rs["checkout"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$rs["discount"].'%</td>';
						}else{
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$rs["discount"].'%</td>';
						}
						
						echo ($rs["ispaid"] == '1')?'<td>Paid</td>':'<td>UnPaid</td>';
						echo '<td>'.$sign.number_format($rs["total"],2).'</td>';
						echo '<td>'.$allstaffs[$rs["staffid"]].'</td>';
						echo '</tr>';
						
						$grandtotal += $rs["total"];
					}
						echo '</table>';
						echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.$sign.number_format($grandtotal,2).'</div>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
				?>
			    </div>
				
				<?php if ($_GET["service"] == 'room'){ ?>
						
				<?php } ?>
				
				
				<?php if ($_GET["service"] == 'bar'){ ?>
						
				<?php } ?>
				
				
				
				<?php if ($_GET["service"] == 'restaurant'){ ?>
						
				<?php } ?>
				
				
				<?php if ($_GET["service"] == 'laundary'){ ?>
						
				<?php } ?>
				
				
				
				<?php if ($_GET["service"] == 'spa'){ ?>
						
				<?php } ?>
				
				<?php if ($_GET["service"] == 'swimpool'){ ?>
						
				<?php } ?>
				
				<?php if ($_GET["service"] == 'sport'){ ?>
						
				<?php } ?>
				<!-- /.box-body -->
              </div>
</div>
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>