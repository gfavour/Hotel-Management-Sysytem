<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include("inc/sidebar.php");
$thismonth = date("Y-m");
?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DASHBOARD (<?php echo $thismonth; ?>)
            </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content"  >
 <!-- Small boxes (Stat box) -->
          
<section class="content"  >
 <!-- Small boxes (Stat box) -->
          
<div class="row">
            <div class="col-lg-3 col-xs-6" onclick="window.location.href='<?php echo ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receiptionist')?'manage-inout-grid.php':'#'; ?>';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo returnField("select count(id) AS ctn from order_room where checkstatus = 'in'","ctn"); ?></h3>
                  <p>Checked In </p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus"></i>
                </div>
                <!--<a href="manage-inout.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6" onclick="window.location.href='<?php echo ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receiptionist')?'manage-guests.php':'#'; ?>';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo returnField("SELECT count(id) AS ctn FROM addclient","ctn"); ?></h3>
                  <p>Registered Customer</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <!--<a href="manage-guests.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6" onclick="window.location.href='<?php echo ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receiptionist')?'manage-inout-grid.php':'#'; ?>';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo returnField("SELECT count(id) AS ctn FROM addroom","ctn"); ?></h3>
                  <p>Room</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
                <!--<a href="manage-rooms.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6" onclick="window.location.href='<?php echo ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receiptionist')?'manage-inout-grid.php':'#'; ?>';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php 
				  echo returnField("SELECT count(id) AS ctn FROM addroom WHERE currentinv <> ''","ctn");
				  //select("SELECT sum(roomQuantity) AS rmqty, sum(roomleft) AS rmleft FROM addroom");$rs = mysqli_fetch_assoc($qry); $rmqty = $rs["rmqty"]; $rmleft = $rs["rmleft"]; echo ($rmqty > $rmleft)?$rmqty - $rmleft:'0'; ?></h3>
                  <p>Room Booked</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
                <!--<a href="manage-rooms.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div>
			<?php if($globalrole == 'admin' || $globalrole == 'manager'){ ?>
 			<div class="col-lg-3 col-xs-6" onclick="window.location.href='bar-trend.php';" style="cursor:pointer;">
              <div class="small-box bg-orange">
                <div class="inner">
                   <h3><sup style="font-size: 20px"><?php echo $sign; ?></sup><?php echo number_format(returnField("select sum(total) as bartotal from order_bar where DATE_FORMAT(orderdate,'%Y-%m' ) = '".mysqli_escape_string($conn4as,$thismonth)."'","bartotal"),2); ?></h3>
                  <p>Bar Revenue</p>
                </div>
                <div class="icon">
                  <i class="fa fa-glass"></i>
                </div>
              </div>
            </div>
            
			<div class="col-lg-3 col-xs-6" onclick="window.location.href='bar2-trend.php';" style="cursor:pointer;">
              <div class="small-box bg-purple">
                <div class="inner">
                   <h3><sup style="font-size: 20px"><?php echo $sign; ?></sup><?php echo number_format(returnField("select sum(total) as bar2total from order_bar2 where DATE_FORMAT(orderdate,'%Y-%m') = '".mysqli_escape_string($conn4as,$thismonth)."'","bar2total"),2); ?></h3>
                  <p>Pool Bar Revenue</p>
                </div>
                <div class="icon">
                  <i class="fa fa-glass"></i>
                </div>
              </div>
            </div>
			
			<div class="col-lg-3 col-xs-6" onclick="window.location.href='restaurant-trend.php';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><sup style="font-size: 20px"><?php echo $sign; ?></sup><?php echo number_format(returnField("select sum(total) as restotal from order_restaurant where DATE_FORMAT(orderdate,'%Y-%m') = '".mysqli_escape_string($conn4as,$thismonth)."'","restotal"),2);?></h3>
				  <p>Restaurant Revenue</p>
                </div>
                <div class="icon">
                  <i class="fa fa-table"></i>
                </div>
               <!-- <a href="manage-resturant.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
            </div>
			
			<!-- ./col -->
            <div class="col-lg-3 col-xs-6" onclick="window.location.href='rooms-trend.php';" style="cursor:pointer;">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><sup style="font-size: 20px"><?php echo $sign; ?></sup><?php echo number_format(returnField("SELECT SUM(total) AS rmtotal FROM order_room WHERE DATE_FORMAT(orderdate,'%Y-%m') = '".mysqli_escape_string($conn4as,$thismonth)."'","rmtotal"),2); ?></h3>
                  <p>Room Revenue</p>
                </div>
                <div class="icon">
                  <i class="fa fa-table"></i>
                </div>
                </div>
            </div><!-- ./col -->
			<?php } ?>
			
            
          </div>
          <div class="row">
             

         <!--Start Trending--->
         <div class="col-lg-12">
		 <div class="col-sm-4" style="padding-left:0px;"><?php include("dashboard-room-trend.php"); ?></div>
		 <div class="col-sm-4" style="padding-left:0px;"><?php include("dashboard-bar-trend.php"); ?></div>
		 <div class="col-sm-4" style="padding-left:0px;"><?php include("dashboard-bar2-trend.php"); ?></div>
		 </div>
		 <!--End Trending--->
                         
                 <div class="col-lg-12">
              <div class="box box-info" >
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Invoice ID</th>
                          <th>Guest</th>
						  <th>Service Rendered</th>
						  <th>Date</th>
                          <th>Total Amount<?php echo ' ('.$cursign.')'; ?></th>
                          <th>Status</th>
                           </tr>
                      </thead>
					  <?php
					  if ($globalrole == 'admin' || $globalrole == 'manager'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ORDER BY orders.id DESC LIMIT 10");$isall = '1';
					  
					  }else if ($globalrole == 'receptionist'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isroom = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'bar'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isbar = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'bar2'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isbar2 = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'restaurant'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isrestaurant = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'laundary'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.islaundary = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'sport'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.issport = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }else if ($globalrole == 'spa'){
					  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isspa = '1' ORDER BY orders.id DESC LIMIT 10");
					  
					  }
					  
					  if ($sql){
						  while($rs = mysqli_fetch_assoc($qry)){
						  if ($rs["ispaid"] == '1'){$ispaid = '<span class="label label-success">Paid</span>';}else{$ispaid = '<span class="label label-warning">Unpaid</span>';}
						  if ($rs["isroom"] == '1'){$services = ' Room ('.getRoomDetails($rs["invoiceid"]).'), ';}
						
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isbar2"] == '1'){$services .= ' Bar2, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
						
						  echo '<tr>
                          <td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>
                          <td>'.$rs["lastname"].' '.$rs["firstname"].'</td>
                          <td>'.$services.'</td>
						  <td>'.$rs["orderdate"].'</td>
						  <td>'.$sign.number_format($rs["total"],2).'</td>
                          <td>'.$ispaid.'</td>
                        </tr>';
						$services = '';
						  }
					  }
					  ?>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
              </div>
			  </div>
      </div><!-- /.content-wrapper -->
<!-- Main Footer -->
<?php include_once 'inc/footer.php'; ?>
