<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Check In/Out</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage in/out</li>
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
			  
              <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('manage-inout.php');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_GET["dwat"] == 'search'){
					$sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id INNER JOIN addroom ON order_room.roomid = addroom.id WHERE (addclient.lastname LIKE '%".$_GET["q"]."%') ORDER BY order_room.id DESC","SELECT order_room.*,addroom.roomType,addclient.lastname,addclient.firstname FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id INNER JOIN addroom ON order_room.roomid = addroom.id WHERE (addclient.lastname LIKE '%".$_GET["q"]."%') ORDER BY order_room.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id INNER JOIN addroom ON order_room.roomid = addroom.id ORDER BY order_room.id DESC","SELECT order_room.*,addroom.roomType, addclient.lastname,addclient.firstname FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id INNER JOIN addroom ON order_room.roomid = addroom.id ORDER BY order_room.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped"><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Guest</th>
					  <th>Room</th>
					  <th>Check In</th> 
					  <th>Check Out</th> 
					  <th>Check Status</th>
					  <th>Payment Status</th>
                      <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					
					   if ($rs["ispaid"] == '1'){$ispaid1 = 'Paid'; $ispaid = '<a href="javascript:;" class="btn btn-xs btn-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';}else{$ispaid1 = 'UnPaid'; $ispaid = '<a href="javascript:;" class="btn btn-xs btn-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';}
						
						if ($rs["checkstatus"] == 'in'){$checkedstatus = '<a href="javascript:;" class="btn btn-xs btn-warning" style="margin-right:10px;" onclick="docheck(\'out\',\'invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'&roomid='.$rs["roomid"].'&s=out&dwat=doinout\',\'../fxn/process1.php\',\'\')">Check Out</a>';}elseif($rs["checkstatus"] == ''){ $checkedstatus = '<a href="javascript:;" class="btn btn-xs btn-info" style="margin-right:10px;" onclick="docheck(\'in\',\'invoiceid='.$rs["invoiceid"].'&roomid='.$rs["roomid"].'&id='.$rs["id"].'&s=in&dwat=doinout\',\'../fxn/process1.php\',\'\')">Check In</a>';
						}
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						//echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						//echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].' '.$rs["firstname"].'</a></td>';
						echo '<td>'.$rs["roomType"].'</td>';
						echo '<td>'.$rs["checkin"].'</td>';
						echo '<td>'.$rs["checkout"].'</td>';
						echo '<td>'.$rs["checkstatus"].'</td>';
						
						echo '<td>'.$ispaid1.'</td>';
						echo '<td>'.$checkedstatus.'</td>';
						echo '<td><a href="printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">Receipt</a></td>';
						echo '</tr>';
						$checkedstatus = '';
						$ispaid1 = '';
						$ispaid = '';
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