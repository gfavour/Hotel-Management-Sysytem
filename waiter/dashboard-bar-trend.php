<div class="col-sm-12" style="margin-top:10px;margin-bottom:20px; background:#fff; padding:10px; border-radius:5px;"><canvas id="mybarChart"></canvas></div>
				
					<?php
					$xData = [];
					$yData = [];
					
					$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.itemid ORDER BY order_bar.id ASC ","SELECT addbar.name,addbar.measure,order_bar.itemid,SUM(order_bar.qty) AS qty,SUM(order_bar.total) AS total,order_bar.orderdate FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.itemid ORDER BY order_bar.id ASC");
					
					if($sql){				  					  
						while($rs = mysqli_fetch_assoc($qry)){
							ChartDataUpdater($rs["qty"],$rs["name"]);
						}
					}
					
					//display chart....
					$xds = ChartDataLoader("x");
					$yds = ChartDataLoader("y");
					$cds = ChartDataLoader("c");
					$dds = ChartDataLoader("d");
					if($odate != ''){ $clbl = 'Bar Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Bar Trend Analysis'; }
					echo '<script>var canvasid = "mybarChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					echo '<script src="../fxn/chartjsdisplay.js"></script>';
					
				?>