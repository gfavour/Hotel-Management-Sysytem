<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //CheckBarStockLimit("bar"); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Room Reservation</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Room Reservation</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			  <div style="margin-bottom:10px"><a href="javascript:;" class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-plus"></i> New Room Reservation</a></div>
			  <?php } ?>
		<div id="msgbox"></div>
		
		<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add New Reservation</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addschedule" />

<div class="col-sm-12">
<label>Name *</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="hidden" name="name" id="clientname" value="">
 <select name="clientid" id="clientid" title="Name of client" class="form-control selectpicker" data-live-search="true" x-moz-errormessage="Select a client." onchange="document.getElementById('clientname').value = $('#clientid option:selected').text();">
   <?php
              $sql= "SELECT id,title,lastname,firstname FROM addclient";
              $query = mysqli_query($conn4as,$sql);
			  while($rsclient = mysqli_fetch_assoc($query)){
			  echo ($rsclient["id"] != '1')?'<option value="'.$rsclient['id'].'">'.ucwords(strtolower($rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"])).'</option>':'';
			  }
			  ?>
  </select>
</div>
</div>

<div class="col-sm-12">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone">
</div>
</div>


<div class="col-sm-12">
  <label>Room *</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <select name="roomname" id="roomname" class="form-control">
  <?php
  echo getRoom4ScheduleOpts($_GET["roomid"]);
  ?>
  </select>
  </div>
</div>


<div class="col-sm-12">
  <label>Check-in Date <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" id="checkin" class="form-control" name="checkin"  title="Check in date required" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-12">
  <label>Check-out Date <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" id="checkout" class="form-control" name="checkout"  title="Check out date required" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-12">
  <label>Choose Payment Status</em></label>
  <div>
  <label for="paystatus1"><input type="radio" id="paystatus1" name="paystatus"  title="Payment status is required" value="0"> Unpaid</label><br />
  <label for="paystatus2"><input type="radio" id="paystatus2" name="paystatus"  title="Payment status is required" value="1"> Mark As Paid (From Deposit)</label><br />
  <label for="paystatus3"><input type="radio" id="paystatus3" name="paystatus"  title="Payment status is required" value="2"> Mark As Paid (Cash By Hand)</label>
  
  </div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>	  
			  
			  <div class="box box-primary">
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by name, phone, check-in date" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('roomschedule.php');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding">
                  <form name="reservation" id="reservation">
					<?php
					if ($_GET["dwat"] == 'search'){
					$sql = select2nav("SELECT count(tblschedule.id) as ctn FROM tblschedule INNER JOIN addroom ON tblschedule.roomid = addroom.id WHERE (tblschedule.name LIKE '%".$_GET["q"]."%' OR tblschedule.phone LIKE '%".$_GET["q"]."%' OR tblschedule.checkindate LIKE '%".$_GET["q"]."%') ORDER BY tblschedule.id DESC","SELECT tblschedule.*,addroom.roomType FROM tblschedule INNER JOIN addroom ON tblschedule.roomid = addroom.id WHERE (tblschedule.name LIKE '%".$_GET["q"]."%' OR tblschedule.phone LIKE '%".$_GET["q"]."%' OR tblschedule.checkindate LIKE '%".$_GET["q"]."%') ORDER BY tblschedule.id DESC");
					}else{
					$sql = select2nav("SELECT count(tblschedule.id) as ctn FROM tblschedule INNER JOIN addroom ON tblschedule.roomid = addroom.id ORDER BY tblschedule.id","SELECT tblschedule.*,addroom.roomType FROM tblschedule INNER JOIN addroom ON tblschedule.roomid = addroom.id ORDER BY tblschedule.id DESC");
					}
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Name</th>   
                      <th>Phone Number</th>
					  <th>Room Number</th>
					  <th>Check-in Date</th>
					  <th>Expected Check-out Date</th>
                      <th>Payment Method</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
					if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){
						$delBtn = '<a href="javascript:;" class="label label-lg label-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=tblschedule&dwat=delschedule\',\'../fxn/process1.php\',\'\')">CANCEL</a>';
					}else{
						$delBtn = '<span class="label label-lg label-grey">CANCEL</span>';
					}
					
					$today = date("Y-m-d");
					$bookBtn = ($rs["checkindate"] <= $today)?'<a href="order-noclient.php?roomid='.$rs["roomid"].'&custid='.$rs["userid"].'&reserveid='.$rs["id"].'&chkindate='.$rs["checkindate"].'&chkoutdate='.$rs["checkoutdate"].'&pays='.$rs["paystatus"].'" class="label label-lg label-info">BOOK NOW</a>':'<a href="javascript:;" class="label label-lg label-default">BOOK NOW</a>';
						
						if($rs["paystatus"] == '0'){ $paystatus = 'Unpaid'; }
						elseif($rs["paystatus"] == '1'){ $paystatus = 'Pay From Deposit'; }
						elseif($rs["paystatus"] == '2'){ $paystatus = 'Cash By Hand'; }
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo ($rs["name"] != '')?'<td>'.$rs["name"].'</td>':'<td>N/A</td>';
						echo ($rs["phone"] != '')?'<td>'.$rs["phone"].'</td>':'<td>N/A</td>';
						echo '<td>'.$rs["roomType"].'</td>';
						echo '<td>'.$rs["checkindate"].'</td>';
						echo '<td>'.$rs["checkoutdate"].'</td>';
						echo '<td>'.$paystatus.'</td>';
						echo '<td>'.$bookBtn.'</td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No room reservation.</div>';
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
