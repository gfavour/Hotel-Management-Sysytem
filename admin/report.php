<?php 
include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
loadStaff2Array(); 
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>General Report</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Report</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <!-- /.box-header -->
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<form name="frm" action="" method="get">
				<?php //echo $allstaffs['13']; ?>
				<input type="hidden" name="dwat" value="searchreport" />
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="" style="width:55%;"><input type="time" name="timefrom" id="timefrom" value="00:00" class="form-control" required style="width:45%;">
				</div>
				</div>
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="" style="width:55%;"><input type="time" name="timeto" id="timeto" value="23:59" class="form-control" required style="width:45%;">
				</div>
				</div>
				
				<!--
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Time From:</strong></i></span>
				<!--<select name="timefrom" id="timefrom" class="form-control">
				<option value="" selected>&nbsp;</option>
				<?php
				foreach($timesArray as $k=>$v){
					echo '<option value="'.$k.'">'.$v.'</option>';
				}
				?>
				</select>-- >
				<input type="time" name="timefrom" id="timefrom" value="10:00" class="form-control">
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Time To:</strong></i></span>
				<input type="time" name="timeto" id="timeto" value="18:00" class="form-control">
				</div>
				</div>
				-->
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-list"></i></span>
				<select name="service" id="service" class="form-control">
				<!--<option value="all" selected>All Services</option>-->
				<option value="room">Room</option>
				<option value="bar">Bar 1</option>
				<option value="bar2">Bar 2</option>
				<option value="bar3">Bar 3</option>
				<option value="swimpool">Swimming Pool</option>
				<option value="restaurant">Restaurant</option>
				<option value="spa">Spa</option>
				<option value="laundary">Laundary</option>
				<option value="sport">Sport Material</option>
				<!-- -->
				</select>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Payment Status</strong></i></span>
				<select name="ispaid" id="ispaid" class="form-control">
				<option value="0" selected>Unpaid</option>
				<option value="1">Paid</option>
				<option value="2">Both</option>
				</select>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Staff (Optional)</strong></i></span>
				<select name="staffid" id="staffid" class="form-control">
				<option value="" selected>...</option>
				<?php
				foreach($allstaffs as $k=>$v){
					echo '<option value="'.$k.'">'.$v.'</option>';
				}
				?>
				</select>
				</div>
				</div>
				
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate Report</button></div>
				</form>
				</div>
				
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title"><?php 
			  if($_GET["service"] == 'bar2'){ $Service = 'Bar-2'; }elseif($_GET["service"] == 'bar3'){ $Service = 'Bar-3'; }else{ $Service = $_GET["service"]; }
			  if ($_REQUEST["ispaid"] == '0'){echo 'Unpaid';}else if ($_REQUEST["ispaid"] == '1'){echo 'Paid';} echo ucwords($Service).' Service'; ?> Financial Report Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></h3>
              <div class="box-tools pull-right">
			  <a href="printreport.php?<?php echo 'datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&timeto='.$_REQUEST["timeto"].'&dateto='.$_REQUEST["dateto"].'&service='.$_REQUEST["service"].'&ispaid='.$_REQUEST["ispaid"]; ?>" class="label label-info" target="_blank">Print report</a>
			  
			  
			  <a href="javascript:;" class="label label-primary" data-toggle="tooltip" data-placement="top" title="Export to excel" onclick="iframeExporter('../fxn/exportexcel.php?<?php echo 'datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&timeto='.$_REQUEST["timeto"].'&dateto='.$_REQUEST["dateto"].'&service='.$_REQUEST["service"].'&ispaid='.$_REQUEST["ispaid"]; ?>&dwat=1');">Export To Excel</a>
			  
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  if ($_REQUEST["ispaid"] == '2'){$filter_ispaid = " ";}
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
				  
				  
				  if ($_REQUEST["service"] == 'all'){
				  $sql = select2nav("SELECT count(id) as ctn FROM orders WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC","SELECT * FROM orders WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM orders WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  
				  }elseif ($_REQUEST["service"] == 'room'){
				  $sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_room.id DESC","SELECT order_room.*,addroom.roomType FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_room.id DESC");
				  
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_room WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Room';
				  
				  }elseif ($_REQUEST["service"] == 'bar'){
				  $sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar.id DESC","SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar.id DESC");
				  				   
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_bar WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Bar-1';
				  
				  }elseif ($_REQUEST["service"] == 'bar2'){
				  $sql = select2nav("SELECT count(order_bar2.id) as ctn FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar2.id DESC","SELECT order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar2.id DESC");
				  				   
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_bar2 WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Bar-3';
				  				  
				   }elseif ($_REQUEST["service"] == 'bar3'){
				  $sql = select2nav("SELECT count(order_bar3.id) as ctn FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar3.id DESC","SELECT order_bar3.*,addbar3.name FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar3.id DESC");
				  				   
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_bar3 WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Bar-3';
				  				  
				  }elseif ($_REQUEST["service"] == 'restaurant'){
				  $sql = select2nav("SELECT count(order_restaurant.id) as ctn FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_restaurant.id DESC","SELECT order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_restaurant.id DESC");
				 
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_restaurant WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Restaurant';
				  
				  }elseif ($_REQUEST["service"] == 'spa'){
				  $sql = select2nav("SELECT count(id) as ctn FROM order_spa WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC","SELECT * FROM order_spa WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_spa WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Spa';
				  
				  }elseif ($_REQUEST["service"] == 'swimpool'){
				  $sql = select2nav("SELECT count(id) as ctn FROM order_swimpool WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC","SELECT * FROM order_swimpool WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_swimpool WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Swimming Pool';
				  
				  }elseif ($_REQUEST["service"] == 'laundary'){
				  $sql = select2nav("SELECT count(id) as ctn FROM order_laundary WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC","SELECT * FROM order_laundary WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_laundary WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Laundary';
				  
				  }elseif ($_REQUEST["service"] == 'sport'){
				  $sql = select2nav("SELECT count(id) as ctn FROM order_sportitem WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC","SELECT * FROM order_sportitem WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  $grandtotal = getGrandTotal("SELECT SUM(total) AS grandtotal FROM order_sportitem WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Sport Materials';
				  
				  }
				  
				  
				  if($sql){
				  
				  if ($_GET["service"] == 'bar'){
					  echo '<table class="table table-striped" id="exptable">
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
					//$c = 1;
					while($rs = mysqli_fetch_assoc($qry)){
						if ($_REQUEST["service"] == 'all'){
							$services = '';
							if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
							if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
							if ($rs["isbar2"] == '1'){$services .= 'Pool Bar, ';$isbar2 = 1;}
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
							echo '<td>'.number_format($rs["discount"],4).'%</td>';
						
						}elseif ($_GET["service"] == 'bar2' || $_GET["service"] == 'bar3'){
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["waiter"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.number_format($rs["discount"],4).'%</td>';
						
						}elseif ($_GET["service"] == 'restaurant'){
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["tableno"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.number_format($rs["discount"],4).'%</td>';
							
						}elseif ($_GET["service"] == 'room'){
							echo '<td>'.$rs["roomType"].'</td>';
							echo '<td>'.$rs["checkin"].'</td>';
							echo '<td>'.$rs["checkout"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.number_format($rs["discount"],4).'%</td>';
							
						}else{
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.number_format($rs["discount"],4).'%</td>';
						}
						
						echo ($rs["ispaid"] == '1')?'<td>Paid</td>':'<td>UnPaid</td>';
						echo '<td>'.$sign.number_format($rs["total"],2).'</td>';
						echo '<td>'.$allstaffs[$rs["staffid"]].'</td>';
						echo '</tr>';
						
					}
					echo '</table>';
					echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.$sign.number_format($grandtotal,2).'</div>';
						
					}else{
						echo '<div align="center">No record found.</div>';
					}
					
					
				?>
			    </div>
				<?php echo $nav; ?>
              </div>			  
			  
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>