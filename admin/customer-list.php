<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
		<?php
		$sql = select("SELECT lastname,firstname FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["guestid"])." ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
		?>
        <section class="content-header">
          <h1><?php echo $rs["lastname"]." ".$rs["firstname"]." Order List"; ?></h1>
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
			  			  
		<!-- Includes for add rooms and facilities -->
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
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.guestid = '".mysqli_real_escape_string($conn4as,$_GET["guestid"])."' ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname,addclient.phone FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.guestid = '".mysqli_real_escape_string($conn4as,$_GET["guestid"])."' ORDER BY orders.id DESC");
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
											
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
					}
					
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["isroom"] == '1'){$services = ' Room, ';}
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$services.'</td>';
						/*echo ($rs["isroom"] == '1')?'<td>Yes</td>':'<td>No</td>';
						echo ($rs["isbar"] == '1')?'<td>Yes</td>':'<td>No</td>';
						echo ($rs["isrestaurant"] == '1')?'<td>Yes</td>':'<td>No</td>';
						echo ($rs["islaundary"] == '1')?'<td>Yes</td>':'<td>No</td>';
						echo ($rs["isspa"] == '1')?'<td>Yes</td>':'<td>No</td>';
						echo ($rs["issport"] == '1')?'<td>Yes</td>':'<td>No</td>';*/
						echo '<td>'.date("d/m/Y h:i A",$rs["orderdate"]).'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">Receipt</a></td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
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