<?php include_once 'inc/head.php'; 
loadAllCompany2Array();
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
<!-- Page Header -->
<?php		
$invoiceid = $_GET["invoiceid"];
$ispaid1 = '';
$guestid = getGuestIdByInvoiceId($invoiceid);
?>
<!-- Begin Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">

<div style="margin:10px 0;">
<h3><?php echo 'Invoice #'.$invoiceid; ?></h3>
</div>

<div class="row" style="margin-top:10px;">
<?php if($guestid != '1'){ ?>
<!--Deposit-->
<div class="col-lg-3 col-xs-6" style="cursor:pointer;">
<div class="small-box bg-green">
<div class="inner"><h3 style="font-size:3.5rem!important;" id="thedeposit"><?php $deposit = returnField("SELECT amount FROM addclient WHERE id = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY id","amount"); echo number_format($deposit,2);?></h3>
<p>Deposit</p>
</div></div></div>
<!--Grand Debt-->
<div class="col-lg-3 col-xs-6" style="cursor:pointer;">
<div class="small-box bg-red">
<div class="inner"><h3 style="font-size:3.5rem!important;" id="overalldebt">0.00</h3>
<p>Overall Debt</p>
</div></div></div>
<!--Net Debt-->
<div class="col-lg-3 col-xs-6" style="cursor:pointer;">
<div class="small-box bg-orange">
<div class="inner"><h3 style="font-size:3.5rem!important;" id="netdebt">0.00</h3>
<p>Outstanding Debt</p>
</div></div></div>
<br clear="all" />
<?php } ?>
</div>
	  
	  <div id="msgbox"></div>
	  
			  <!-- Start Loop Here -->
			  <div class="box">
			  <div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				    $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY orders.id DESC");
					if($sql){	
					getReceiptButtons($invoiceid);			  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom = 1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isbar2"] == '1'){$services .= 'Bar2, ';$isbar2 = 1;}
						if ($rs["isbar3"] == '1'){$services .= 'Bar3, ';$isbar3 = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["company"] != ''){$company = "<strong>Company: </strong>".$allCompanyArray[$rs["company"]]["name"].'<br>';}else{$company = '';}
						
						echo '<div class="width-div-2">';
						if($rs["guestid"] != '1'){
							echo '<div><strong>Name: </strong>'.$rs["lastname"].' '.$rs["firstname"].'</div>';
							echo $company;
						}
						echo '<div><strong>Invoice ID: </strong>'.$rs["invoiceid"].'</div>';
						echo '<div><strong>Sub Total: </strong><span style="color:#F00;">'.$cursign.number_format($rs["total"],2).'</span></div>';
						echo '<div><strong>Payment Status: </strong><span style="color:#F00;">'.$ispaid.'</span></div>';
						echo '<div><strong>Service Rendered: </strong>'.$services.'</div>';
						echo '<div><strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '</div>';
						$services = '';
						if ($rs["ispaid"] != '1'){ $overalldebt += $rs["total"]; }
					}
					}else{
						echo '<div style="padding:0 10px 10px 10px;">Invoice #'.$invoiceid.' does not exist.</div>';
					}
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT order_room.*,addroom.roomType,addroom.categoryid FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["checkout"] > date("Y-m-d")){$cancelbtn = ' <a href="cancel-order.php?invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'" class="label label-sm label-danger">Booking Cancellation</a> ';}else{$cancelbtn = '';}
						
						if(strtolower($rs["checkstatus"]) == 'in' || $rs["checkout"] > date("Y-m-d")){
							$transferbtn = ' <a href="transfer-guest.php?invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'" class="label label-sm label-warning">Transfer Guest</a> ';
						}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Room Number: </strong>'.$rs["roomType"].$transferbtn.$cancelbtn.'</div>';
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
					$sql = select("SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar.id DESC");
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
						echo '<div><strong>Qty: </strong>'.$rs["qty"].$vatlabel.', <strong>Discount: </strong>'.number_format($rs["discount"],2).'%</div>';
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
					$sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 inner join addbar2 on order_bar2.itemid = addbar2.id WHERE order_bar2.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar2.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Bar-2 Service</u></strong></div>';				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }
						
						if ($rs["vat"] > 0 && $rs["vat"] != ''){
						$vat = $rs["vat"]; $vatlabel = ', <strong>VAT:</strong> '.$vat.'%'; }else{ $vatlabel = ''; }
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].$vatlabel.', <strong>Discount: </strong>'.number_format($rs["discount"],2).'%</div>';
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
					$sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
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
					$sql = select("SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_laundary.id DESC");
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
					$sql = select("SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_spa.id DESC");
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
					$sql = select("SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
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
					$sql = select("SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_sportitem.id DESC");
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
              </div><!-- /.box -->
			  
			  <!--Next Here-->
			  <?php 
			  include("other-pending-invoices.php"); 
			  $netdebt = $deposit - $overalldebt;
			  if($netdebt > 0){ $netdebt = '0.00'; }
			  ?>
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
var overalldebt = '<?php echo number_format($overalldebt,2); ?>';
var netdebt = '<?php echo number_format($netdebt,2); ?>';
$("#overalldebt").html(overalldebt);
$("#netdebt").html(netdebt);
</script>