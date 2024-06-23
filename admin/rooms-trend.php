<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Rooms Trend Analysis <?php if($_GET["month"] != ''){ echo '('.getMonth($_GET["month"]).', '.$_GET["year"].')'; } ?></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Rooms Trend Analysis</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
			 
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" />
			  <select name="month" class="form-control input-sm pull-left" style="width:100px;"><?php echo getMonthOptions(); ?></select><select name="year" class="form-control input-sm pull-left" style="width:80px;"><?php echo getYearOptions(); ?></select>
			  <div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button><a href="printchart.php?type=room&<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank" class="btn btn-sm btn-primary">Print</a></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<div style="width:90%;margin:10px auto 30px auto;"><canvas id="myChart"></canvas></div>		 
                  <form name="reservation" id="reservation">
					<?php
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE (order_room.orderdate LIKE '".$odate."-%') GROUP BY order_room.roomid ORDER BY order_room.id ASC ","SELECT addroom.roomType AS name,order_room.roomid,SUM(order_room.noofroom) AS noofroom,SUM(order_room.duration) AS duration,order_room.orderdate FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE (order_room.orderdate LIKE '".$odate."-%') GROUP BY order_room.roomid ORDER BY order_room.id ASC");
					
					}else{
					$sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id GROUP BY order_room.roomid ORDER BY order_room.id ASC ","SELECT addroom.roomType AS name,order_room.roomid,SUM(order_room.noofroom) AS noofroom,SUM(order_room.duration) AS duration,order_room.orderdate FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id GROUP BY order_room.roomid ORDER BY order_room.id ASC");
					}
					if($sql){
				  	$table1 = '<table class="table table-striped"><tr>
					  <th>SN</th>
                      <th>Room Type</th>
					  <th>No of time checked In</th>
					  <th>Total No of days Used</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						ChartDataUpdater($rs["noofroom"],$rs["name"]);
																	
						$table2 .= '<tr>';
						$table2 .= '<td>'.$c++.'</td>';
						$table2 .= '<td>'.$rs["name"].'</td>';
						$table2 .= '<td>'.$rs["noofroom"].'</td>';
						$table2 .= '<td>'.$rs["duration"].'</td>';
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
					if($odate != ''){ $clbl = 'Room Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Room Trend Analysis'; }
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