<?php include_once 'inc/head.php'; 
getAllOrderRoomArrays();
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>General Transactions</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">General Transactions</li>
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
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY orders.id DESC");
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ORDER BY orders.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped"><tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Guest</th>
					  <th>Service Rendered</th>
					  <th>Date</th>
					  <th>Total Amount</th>
                      <th>Payment Status</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = '<span class="label label-success">Paid</span>';}else{$ispaid = '<span class="label label-warning">Unpaid</span>';}
						//getRoomDetails($rs["invoiceid"])
							if ($rs["isroom"] == '1'){$services = ' Room ('.$AllOrderRoomArray[$rs["invoiceid"]].'), ';}
							if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
							if ($rs["isbar2"] == '1'){$services .= ' Bar2, ';}
							if ($rs["isbar3"] == '1'){$services .= ' Bar3, ';}
							if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
							if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
							if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
							if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
							if ($rs["issport"] == '1'){$services .= ' Sport ';}
							//<a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">
							echo '<tr>
							  <td>'.$c++.'</td>
							  <td>'.$rs["invoiceid"].'</td>
							  <td>'.$rs["lastname"].' '.$rs["firstname"].'</td>
							  <td>'.$services.'</td>
							  <td>'.$rs["orderdate"].'</td>
							  <td>'.$sign.number_format($rs["total"],2).'</td>
							  <td>'.$ispaid.'</td>
							</tr>';
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