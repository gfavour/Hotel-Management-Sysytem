<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
		<?php
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,roomid,checkstatus FROM order_room WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
		$checkstatus = $rs["checkstatus"];
		if($checkstatus == 'in'){
		$checkstatusbtn = '<a href="javascript:;" onclick="docheck(\'out\',\'invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'&roomid='.$rs["roomid"].'&s=out&dwat=doinout\',\'../fxn/process1.php\',\'\')" class="btn btn-sm btn-primary" style="margin-right:10px;">Check Out</a>';
		}
		
		$sql = select("SELECT orders.invoiceid,orders.guestid,orders.ispaid,addclient.lastname,addclient.firstname FROM orders inner join addclient on orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY orders.id DESC");
		$rs = mysqli_fetch_assoc($qry);
		$myinvid = $rs["invoiceid"];
		$myguestid = $rs["guestid"];
		
		if ($rs["ispaid"] == '1'){
		$ispaid1 = 'Paid'; $ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';
		}else{
		$ispaid1 = 'UnPaid'; $ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a> <a href="append-order.php?clientid='.$myguestid.'&invoiceid='.$myinvid.'" class="btn btn-sm btn-info" style="margin-right:10px;">Append Order</a>';
		}
		if ($rs["ispaid"] == '1' && $globalrole != 'admin'){$ispaid = '';}
		?>
        <section class="content-header">
          <h1>Invoice #<?php echo $rs["invoiceid"].' <small>Order List for '.$rs["lastname"].' '.$rs["firstname"].'</small>'; ?></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
					 <a href="invoice-pos.php?printer=pos&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to POS Printer</a> <?php echo $ispaid.$checkstatusbtn; ?>
					 </div>
                     
                    </div>
                  </div>
                </div><!-- /.box-header -->
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
			  
			  <!-- box-body -->
			  <div class="box box-primary">
			               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY orders.id DESC");
					if($sql){				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom = 1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Invoice ID: </strong>'.$rs["invoiceid"].'</div>';
						echo '<div><strong>Name: </strong>'.$rs["lastname"].' '.$rs["firstname"].'</div>';
						echo '<div><strong>Service Rendered: </strong>'.$services.'</div>';
						echo '<div><strong>Date: </strong>'.$rs["orderdate"].'</div>';
						echo '<div><strong>Grand Total: </strong>'.number_format($rs["total"],2).'</div>';
						echo '<div><strong>Payment Status: </strong>'.$ispaid1.'</div>';
						echo '</div>';
						$services = '';
					}
					}
				?>
			    </div>
				
				<?php if ($isroom == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_room WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_room.*,addroom.roomType,addroom.categoryid FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Room Booking</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Room Number: </strong>'.$rs["roomType"].'</div>';
						echo '<div><strong>Room Type: </strong>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_escape_string($conn4as,$rs["categoryid"]),"catname").'</div>';
						echo '<div><strong>No of Room:</strong> '.$rs["noofroom"].'</div>';
						echo '<div><strong>No of Person: </strong>'.$rs["noofperson"].'</div>';
						echo '<div><strong>Check In: </strong>'.$rs["checkin"].' <strong>Check Out: </strong>'.$rs["checkout"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' <strong>Discount: </strong>'.$rs["discount"].'% <strong>VAT: </strong>'.$rs["vat"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).' <strong>Status: </strong>Checked '.$rs["checkstatus"].'</div>';
						echo '</div>';
					}
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_bar WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar.id DESC");
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
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_restaurant WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
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
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_laundary WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_laundary.id DESC");
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
					$sql = select2nav("SELECT count(id) as ctn FROM order_spa WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_spa.id DESC");
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
					$sql = select2nav("SELECT count(id) as ctn FROM order_swimpool WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
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
					$sql = select2nav("SELECT count(id) as ctn FROM order_sportitem WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_sportitem.id DESC");
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
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>