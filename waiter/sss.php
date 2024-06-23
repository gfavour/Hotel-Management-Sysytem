<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>SSS Report on Accommodation</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SSS Report</li>
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
				<input type="hidden" name="dwat" value="searchreport" />
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="">
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="">
				</div>
				</div>

				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate SSS</button></div>
				</form>
				</div>
				
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title">List of Accommodation <?php echo ($_REQUEST["datefrom"] != '')?' Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]:''; ?></h3>
              <div class="box-tools pull-right">
			  <a href="printsss.php?<?php echo 'datefrom='.$_REQUEST["datefrom"].'&dateto='.$_REQUEST["dateto"]; ?>" class="label label-info" target="_blank">Print</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  
				  if ($_REQUEST["datefrom"] != ''){
				  //$sql = select2nav("SELECT count(id) as ctn FROM order_room WHERE (orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY id","SELECT * FROM order_room WHERE (orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY id");
				  $sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id WHERE (order_room.orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY order_room.id DESC","SELECT order_room.*,addclient.lastname,addclient.firstname,addclient.phone FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id WHERE (order_room.orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY order_room.id DESC");	  
				  }else{
				  $sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id ORDER BY order_room.id DESC","SELECT order_room.*,addclient.lastname,addclient.firstname,addclient.phone FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id ORDER BY order_room.id DESC");
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Lastname</th>
					  <th>Firstname</th>
					  <th>Phone</th>
					  <th nowrap>Room Type</th>
					  <th>Check In</th> 
					  <th>Check Out</th>
					  <th>Total ('.$cursign.')</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
												
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].'</a></td>';
						echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["firstname"].'</a></td>';
						echo '<td>'.$rs["phone"].'</td>';
						echo '<td>'.getRoomDetails($rs["invoiceid"]).'</td>';
						echo '<td>'.$rs["checkin"].'</td>';
						echo '<td>'.$rs["checkout"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '</tr>';
					}
						echo '</table>';
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