<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
if(isset($_GET["room"]) && $_GET["room"] != ''){
$qry = mysqli_query($conn4as,"SELECT roomType FROM addroom WHERE id = ".mysqli_escape_string($conn4as,$_GET["room"]));
$rs = mysqli_fetch_assoc($qry);
$rmname = ' in '.$rs["roomType"];
}else{ $rmname = ''; }
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Customers' Invoices<strong><?php echo $rmname; ?></strong></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customers' Invoices<strong><?php echo $rmname; ?></strong></li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
		
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname..." style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('order-list.php');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
				  <?php 
if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ 
	$showall = "";
	
}elseif ($globalrole == 'bar'){ 
	$showall = " AND (orders.isbar = '1' OR orders.isswimpool = '1') ";
	$showall2 = " WHERE (orders.isbar = '1' OR orders.isswimpool = '1') ";

}elseif ($globalrole == 'restaurant'){ 
	$showall = " AND orders.isrestaurant = '1' ";
	$showall2 = " WHERE orders.isrestaurant = '1' ";
	
}elseif ($globalrole == 'laundary'){ 
	$showall = " AND orders.islaundary = '1' ";
	$showall2 = " WHERE orders.islaundary = '1' ";
	
}elseif ($globalrole == 'sport'){ 
	$showall = " AND orders.issport = '1' ";
	$showall2 = " WHERE orders.issport = '1' ";
	
}elseif ($globalrole == 'spa'){ 
	$showall = " AND orders.isspa = '1' ";
	$showall2 = " WHERE orders.isspa = '1' ";
	
}elseif ($globalrole == 'swimpool'){ 
	$showall = " AND (orders.isbar = '1' OR orders.isswimpool = '1') ";
	$showall2 = " WHERE (orders.isbar = '1' OR orders.isswimpool = '1') ";
}
?>
					<?php					
					if(isset($_GET["room"]) && $_GET["room"] != ''){ 					
						$roomid = $_GET["room"]; 
						
						if ($_POST["dwat"] == 'search'){
							$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id INNER JOIN order_room ON orders.invoiceid = order_room.invoiceid WHERE (addclient.lastname LIKE '%".$_POST["q"]."%') AND order_room.roomid = '".mysqli_escape_string($conn4as,$roomid)."' ".$showall." ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname,order_room.roomid FROM orders INNER JOIN addclient ON orders.guestid = addclient.id INNER JOIN order_room ON orders.invoiceid = order_room.invoiceid WHERE (addclient.lastname LIKE '%".$_POST["q"]."%') AND order_room.roomid = '".mysqli_escape_string($conn4as,$roomid)."' ".$showall." ORDER BY orders.id DESC");
					
						}else{
							$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id INNER JOIN order_room ON orders.invoiceid = order_room.invoiceid WHERE order_room.roomid = '".mysqli_escape_string($conn4as,$roomid)."' ".$showall." ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname,order_room.roomid FROM orders INNER JOIN addclient ON orders.guestid = addclient.id INNER JOIN order_room ON orders.invoiceid = order_room.invoiceid WHERE order_room.roomid = '".mysqli_escape_string($conn4as,$roomid)."' ".$showall." ORDER BY orders.id DESC");
						}
						
					}else{
					
						if ($_POST["dwat"] == 'search'){
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%') ".$showall." ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%') ".$showall." ORDER BY orders.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ".$showall2." ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ".$showall2." ORDER BY orders.id DESC");
					}
						
					}
					
					
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Guest</th>
					  <th nowrap>Service Rendered</th>
					  <th>Date</th> 
					  <th>Total ('.$cursign.')</th> 
					  <th>Status</th>                      
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$services = '';
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
					}
					
					    if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["isroom"] == '1'){$services = ' Room ('.getRoomDetails($rs["invoiceid"]).'), ';}
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["isswimpool"] == '1'){$services .= ' Swimming Pool, ';}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						//if ($rs["ispaid"] == '1'){$ispaid = '<a href="javascript:;" onclick="dopay(\'Unpaid\',\'id='.$rs["id"].'&tbl=orders&dwat=dounpaid\',\'../fxn/process1.php\',\'\')">Paid</a>';}else{$ispaid = '<a href="javascript:;" onclick="dopay(\'Paid\',\'id='.$rs["id"].'&tbl=orders&dwat=dopaid\',\'../fxn/process1.php\',\'\')">Unpaid</a>';}
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						//echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].' '.$rs["firstname"].'</a></td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">Receipt</a></td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
						$services = '';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
				?>
				</form>
                </div><!-- /.box-body -->
				<?php echo $nav; ?>
              </div><!-- /.box -->
            </div>
          </div>
</section>
<!-- End Main content -->


</div>
<?php include_once 'inc/footer.php'; ?>