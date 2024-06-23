<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<div>
<div>
				<div style="width:90%;margin:10px auto 30px auto;"><canvas id="myChart"></canvas></div>
				<?php
				if($_GET["type"] == 'room'){
					
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select("SELECT addroom.roomType AS name,order_room.roomid,SUM(order_room.noofroom) AS noofroom,SUM(order_room.duration) AS duration,order_room.orderdate FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE (order_room.orderdate LIKE '".$odate."-%') GROUP BY order_room.roomid ORDER BY order_room.id ASC");
					
					}else{
					$sql = select("SELECT addroom.roomType AS name,order_room.roomid,SUM(order_room.noofroom) AS noofroom,SUM(order_room.duration) AS duration,order_room.orderdate FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id GROUP BY order_room.roomid ORDER BY order_room.id ASC");
					}
					if($sql){
				  	$table1 = '<table class="table table-striped"><tr>
					  <th>SN</th>
                      <th>Room Type</th>
					  <th>Number of Room</th>
					  <th>Total Duration</th>
                    </tr>';
				   $c = 1;
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
					//echo '<script src="../fxn/chartjsdisplay.js"></ script>';
					//echo $table;
				
				}elseif($_GET["type"] == 'bar'){
				
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select("SELECT addbar.name,addbar.measure,order_bar.itemid,SUM(order_bar.qty) AS qty,SUM(order_bar.total) AS total,order_bar.orderdate FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (order_bar.orderdate LIKE '".$odate."-%') GROUP BY order_bar.itemid ORDER BY order_bar.id ASC");
					
					}else{
					$sql = select("SELECT addbar.name,addbar.measure,order_bar.itemid,SUM(order_bar.qty) AS qty,SUM(order_bar.total) AS total,order_bar.orderdate FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.itemid ORDER BY order_bar.id ASC");
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
					//echo '<script src="../fxn/chartjsdisplay.js"></ script>';
					//echo $table;
				
				}elseif($_GET["type"] == 'bar2'){
				
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select("SELECT addbar2.name,addbar2.measure,order_bar2.itemid,SUM(order_bar2.qty) AS qty,SUM(order_bar2.total) AS total,order_bar2.orderdate FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE (order_bar2.orderdate LIKE '".$odate."-%') GROUP BY order_bar2.itemid ORDER BY order_bar2.id ASC");
					
					}else{
					$sql = select("SELECT addbar2.name,addbar2.measure,order_bar2.itemid,SUM(order_bar2.qty) AS qty,SUM(order_bar2.total) AS total,order_bar2.orderdate FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id GROUP BY order_bar2.itemid ORDER BY order_bar2.id ASC");
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
					if($odate != ''){ $clbl = 'Pool Bar Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Pool Bar Trend Analysis'; }
					echo '<script>var canvasid = "myChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					//echo '<script src="../fxn/chartjsdisplay.js"></ script>';
					//echo $table;
				
				
				}elseif($_GET["type"] == 'restaurant'){
					
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select("SELECT addresturant.name,addresturant.measure,order_restaurant.itemid,SUM(order_restaurant.qty) AS qty,SUM(order_restaurant.total) AS total,order_restaurant.orderdate FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE (order_restaurant.orderdate LIKE '".$odate."-%') GROUP BY order_restaurant.itemid ORDER BY order_restaurant.id ASC");
					
					}else{
					$sql = select("SELECT addresturant.name,addresturant.measure,order_restaurant.itemid,SUM(order_restaurant.qty) AS qty,SUM(order_restaurant.total) AS total,order_restaurant.orderdate FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id GROUP BY order_restaurant.itemid ORDER BY order_restaurant.id ASC");
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
					if($odate != ''){ $clbl = 'Restaurant Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Restaurant Trend Analysis'; }
					echo '<script>var canvasid = "myChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					//echo '<script src="../fxn/chartjsdisplay.js"></ script>';
					//echo $table;
					
				}elseif($_GET["type"] == 'sport'){
					
					$xData = [];
					$yData = [];
					
					if ($_GET["dwat"] == 'search'){
					$odate = $_GET["year"].'-'.$_GET["month"];
					$sql = select("SELECT addsport.name,order_sportitem.itemid,SUM(order_sportitem.qty) AS qty,SUM(order_sportitem.total) AS total,order_sportitem.orderdate FROM order_sportitem INNER JOIN addsport ON order_sportitem.itemid = addsport.id WHERE (order_sportitem.orderdate LIKE '".$odate."-%') GROUP BY order_sportitem.itemid ORDER BY order_sportitem.id ASC");
					
					}else{
					$sql = select("SELECT addsport.name,order_sportitem.itemid,SUM(order_sportitem.qty) AS qty,SUM(order_sportitem.total) AS total,order_sportitem.orderdate FROM order_sportitem INNER JOIN addsport ON order_sportitem.itemid = addsport.id GROUP BY order_sportitem.itemid ORDER BY order_sportitem.id ASC");
					}
					if($sql){
				  	$table1 = '<table class="table table-striped"><tr>
					  <th>SN</th>
                      <th>Name</th>
					  <th>Quantity</th>
                      <th>Total Amount</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						ChartDataUpdater($rs["qty"],$rs["name"]);
																	
						$table2 .= '<tr>';
						$table2 .= '<td>'.$c++.'</td>';
						$table2 .= '<td>'.$rs["name"].'</td>';
						$table2 .= '<td>'.$rs["qty"].'</td>';
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
					if($odate != ''){ $clbl = 'Sport Materials Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Sport Materials Trend Analysis'; }
					echo '<script>var canvasid = "myChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					//echo '<script src="../fxn/chartjsdisplay.js"></ script>';
					//echo $table;
					
				}
				echo '<script src="../fxn/chartjsdisplay-print.js"></script>';
					echo $table;
				?>
    </div>
</div>
</div>

<?php //include_once 'reportfooter.php'; ?>
<?php include_once 'inc/footer.php'; ?>
<script>window.print();</script>