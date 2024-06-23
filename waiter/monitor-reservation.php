<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Monitor Online Orders</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Online Reservation</li>
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
			  
              <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					$sql = select2nav("SELECT count(id) as ctn FROM onlineorders WHERE status = '0' OR status = '1' ORDER BY id DESC","SELECT * FROM onlineorders WHERE status = '0' OR status = '1' ORDER BY id DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>LastName</th>
					  <th>Phone</th>
					  <th nowrap>Room Name</th>
					  <th>Adult</th>
					  <th>Children</th> 
					  <th>No of Room</th>   
					  <th>Check In</th>
					  <th>Check Out</th>      
					  <th>Date Ordered</th>   
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					
					if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
					
					$customerdetails .= '<span class=labelwidth><strong>Invoice ID: </strong>'.$rs["invoiceid"];
					$customerdetails .= '<br><strong>Last Name: </strong>'.$rs["customerlname"];
					$customerdetails .= '<br><strong>First Name: </strong>'.$rs["customerfname"];
					$customerdetails .= '<br><strong>Email: </strong>'.$rs["customeremail"];
					$customerdetails .= '<br><strong>Phone Number: </strong>'.$rs["customerphone"];
					$customerdetails .= '<br><strong>Room Name: </strong>'.$rs["roomname"];
					$customerdetails .= '<br><strong>No of Room: </strong>'.$rs["noofroom"];
					$customerdetails .= '<br><strong>No of Adult: </strong>'.$rs["adult"];
					$customerdetails .= '<br><strong>No of Children: </strong>'.$rs["children"];
					$customerdetails .= '<br><strong>Check In: </strong>'.$rs["checkin"];
					$customerdetails .= '<br><strong>Check Out: </strong>'.$rs["checkout"];
					$customerdetails .= '<br><strong>Date Ordered: </strong>'.$rs["dateorder"];
					$customerdetails .= '<br><strong>Amount: </strong>'.number_format($rs["amount"],2);
					$customerdetails .= '<br><strong>Payment Type: </strong>'.$rs["paymenttype"];
					$customerdetails .= '<br><strong>Payment Status: </strong>'.$ispaid;
					$customerdetails .= '<br><strong>Booking Site: </strong>'.$rs["bookingsite"].'</span>';
					
					
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmaction(\'Are you sure you want to cancel this order?\',\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=cancelorder\',\'../fxn/process1.php\',\'\')" title="Cancel online order">Cancel</a>';
					
					$viewBtn = '<a href="javascript:;" class="label label-primary" onclick="showmodal(\''.$customerdetails.'\',\'<strong style=color:#fff;>Order Detais</strong>\',\'#3C8DBC\')" title="Cancel online order">View order</a>';
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["customerlname"].'</td>';
						echo '<td>'.$rs["customerphone"].'</td>';
						echo '<td>'.$rs["roomname"].'</td>';
						echo '<td>'.$rs["adult"].'</td>';
						echo '<td>'.$rs["children"].'</td>';
						echo '<td>'.$rs["noofroom"].'</td>';
						echo '<td>'.$rs["checkin"].'</td>';
						echo '<td>'.$rs["checkout"].'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.$viewBtn.'</td>';
						echo '<td><a href="process-reservation.php?id='.$rs["id"].'" class="label label-primary">Process</a></td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
						$customerdetails = '';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No online order.</div>';
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