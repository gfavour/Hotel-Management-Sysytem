<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
		<?php
		$sql = select("SELECT orders.invoiceid,orders.ispaid,addclient.lastname,addclient.firstname FROM orders inner join addclient on orders.guestid = addclient.id WHERE orders.invoiceid = ".mysqli_escape_string($conn4as,$_GET["invoiceid"])." ORDER BY orders.id DESC");
		$rs = mysqli_fetch_assoc($qry);
		if ($rs["ispaid"] == '1'){$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';}else{$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';}
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
					 <a href="printinvoice.php?invoiceid=<?php echo $_GET["invoiceid"]; ?>" class="btn btn-sm btn-primary" style="margin-right:10px;">Print Receipt</a> <?php echo $ispaid; ?> 
					 <?php 
					 if ($globalrole == 'admin'){
					 ?>
					 <a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmdel('invoiceid=<?php echo $_GET["invoiceid"]; ?>&dwat=delorder','../fxn/process1.php','')">Delete</a>
					 <?php
					}else{
						//echo '<span class="label label-grey">Delete</span>';
					}
					 ?>
					 
					 </div>
                     <!--<input type="text" name="searchrow" class="form-control input-sm pull-right" placeholder="Search" s5tyle="width: 60%; ">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>-->
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
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
						if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
						if ($rs["isbar2"] == '1'){$services .= 'Bar2, ';$isbar2 = 1;}
						if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
						if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
						if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
						if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						
						echo '<div class="width-div-1">';
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
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_room WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_room.*,addroom.roomType FROM order_room inner join addroom on order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_room.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Room Booking</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Room</th>
					  <th>No of Room</th>
					  <th>No of Person</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Duration</th>
					  <th>Discount (%)</th>
					  <th>VAT (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th> 
					  <th>Status</th>   
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["roomType"].'</td>';
						echo '<td>'.$rs["noofroom"].'</td>';
						echo '<td>'.$rs["noofperson"].'</td>';
						echo '<td>'.$rs["checkin"].'</td>';
						echo '<td>'.$rs["checkout"].'</td>';
						echo '<td>'.$rs["duration"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["vat"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["checkstatus"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_bar WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Bar Service</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Item</th>
					  <th>Quantity</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($isbar2 == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_bar2 WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_bar2.*,addbar2.name FROM order_bar2 inner join addbar2 on order_bar2.itemid = addbar2.id WHERE order_bar2.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar2.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Pool Bar Service</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Item</th>
					  <th>Quantity</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($isrestaurant == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_restaurant WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Restaurant Service</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Item</th>
					  <th>Quantity</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				
				<?php if ($islaundary == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_laundary WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_laundary.*,addlaundary.title FROM order_laundary inner join addlaundary on order_laundary.itemid = addlaundary.id WHERE order_laundary.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_laundary.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Laundary Service</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Service</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["title"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				
				
				<?php if ($isspa == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_spa WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_spa.*,addspa.name FROM order_spa inner join addspa on order_spa.itemid = addspa.id WHERE order_spa.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_spa.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Spa Service</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Service</th>
					  <th>No of Person</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["noofperson"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}
				?>
			    </div>		
				<?php } ?>
				
				<?php if ($issport == '1'){ ?>
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_sportitem WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_sportitem.*,addsport.name FROM order_sportitem inner join addsport on order_sportitem.itemid = addsport.id WHERE order_sportitem.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_sportitem.id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <div style=" background:#ffd; padding:10px; font-size:16px; text-align:center;"><strong>Sport Item</strong></div><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Item</th>
					  <th>Quantity</th>
					  <th>Discount (%)</th>
					  <th>Price ('.$cursign.')</th>
					  <th>Total ('.$cursign.')</th>
					  <th>Date</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$rs["discount"].'</td>';
						echo '<td>'.$rs["unitprice"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
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