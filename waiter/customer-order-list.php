<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Guest Order List</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
           			  
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
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id GROUP BY orders.guestid ORDER BY orders.id  DESC","SELECT orders.guestid,sum(orders.total) as gtotal,addclient.lastname,addclient.firstname,addclient.phone FROM orders INNER JOIN addclient ON orders.guestid = addclient.id GROUP BY orders.guestid ORDER BY orders.id  DESC");
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
					  <th>Guest ID</th>
                      <th>Lastname</th>
					  <th>Firstname</th>
					  <th>Phone</th>
					  <th>Grand Total ('.$cursign.')</th>                
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["guestid"].'</td>';
						echo '<td>'.$rs["lastname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo ($rs["phone"] == '')?'<td>-</td>':'<td>'.$rs["phone"].'</td>';
						echo '<td>'.number_format($rs["gtotal"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'" class="label label-primary"><i class="fa fa-list"></i> Show List</a></td>';
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