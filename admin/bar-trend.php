<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Bar Trend Analysis <?php if($_GET["month"] != ''){ echo '('.getMonth($_GET["month"]).', '.$_GET["year"].')'; } ?></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar Trend Analysis</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
      			 
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php //include("insert-new-bar.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" />
			  <select name="month" class="form-control input-sm pull-left" style="width:100px;"><?php echo getMonthOptions(); ?></select><select name="year" class="form-control input-sm pull-left" style="width:80px;"><?php echo getYearOptions(); ?></select>
			  <div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">View All</button><a href="printchart.php?type=bar&<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank" class="btn btn-sm btn-primary">Print</a></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<div style="width:90%;margin:10px auto 30px auto;"><canvas id="myChart"></canvas></div>
				<script>
			 
			    </script>
			 
                  <form name="reservation" id="reservation">
					<?php
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (order_bar.orderdate LIKE '".mysqli_real_escape_string($conn4as,$odate)."-%') GROUP BY order_bar.itemid ORDER BY order_bar.id ASC ","SELECT addbar.name,addbar.measure,order_bar.itemid,SUM(order_bar.qty) AS qty,SUM(order_bar.total) AS total,order_bar.orderdate FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (order_bar.orderdate LIKE '".mysqli_real_escape_string($conn4as,$odate)."-%') GROUP BY order_bar.itemid ORDER BY order_bar.id ASC");
					
					}else{
					$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.itemid ORDER BY order_bar.id ASC ","SELECT addbar.name,addbar.measure,order_bar.itemid,SUM(order_bar.qty) AS qty,SUM(order_bar.total) AS total,order_bar.orderdate FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.itemid ORDER BY order_bar.id ASC");
					}
					if($sql){
				  	$table1 = '<table class="table table-striped"><tr>
					  <th>SN</th>
                      <th>Name</th>
					  <th>Quantity</th>
					  <th>Measure</th>
                      <th>Total Amount</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						ChartDataUpdater($rs["qty"],$rs["name"]);
																	
						$table2 .= '<tr>';
						$table2 .= '<td>'.$c++.'</td>';
						$table2 .= '<td>'.$rs["name"].'</td>';
						$table2 .= '<td>'.$rs["qty"].'</td>';
						$table2 .= '<td>'.$rs["measure"].'</td>';
						$table2 .= '<td>'.$rs["total"].'</td>';
						$table2 .= '</tr>';
					}
						$table3 .= '</table>';
						$table = $table1.$table2.$table3;
					}else{
						$table = '<div align="center">No record found.</div>';
					}
					
					//display chart....
					$xds = ChartDataLoader("x");
					$yds = ChartDataLoader("y");
					$cds = ChartDataLoader("c");
					$dds = ChartDataLoader("d");
					if($odate != ''){ $clbl = 'Bar Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Bar Trend Analysis'; }
					echo '<script>var canvasid = "myChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					echo '<script src="../fxn/chartjsdisplay.js"></script>';
					echo $table;
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