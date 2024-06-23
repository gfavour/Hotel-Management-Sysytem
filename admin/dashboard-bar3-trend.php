
				
					<?php
					$xData = [];
					$yData = [];
					
					$sql = select2nav("SELECT count(order_bar3.id) as ctn FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id GROUP BY order_bar3.itemid ORDER BY order_bar3.id ASC ","SELECT addbar3.name,addbar3.measure,order_bar3.itemid,SUM(order_bar3.qty) AS qty,SUM(order_bar3.total) AS total,order_bar3.orderdate FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id GROUP BY order_bar3.itemid ORDER BY order_bar3.id ASC");
					
					if($sql){			
						echo '<div class="col-sm-12" style="margin-top:10px;margin-bottom:20px; background:#fff; padding:10px; border-radius:5px;"><canvas id="mybar3Chart"></canvas></div>';	  					  
						while($rs = mysqli_fetch_assoc($qry)){
							ChartDataUpdater($rs["qty"],$rs["name"]);
						}
						$xds = ChartDataLoader("x");
						$yds = ChartDataLoader("y");
						$cds = ChartDataLoader("c");
						$dds = ChartDataLoader("d");
						if($odate != ''){ $clbl = 'Bar-3 Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Bar-3 Trend Analysis'; }
						echo '<script>var canvasid = "mybar3Chart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
						echo '<script src="../fxn/chartjsdisplay.js"></script>';
					}else{
						echo '<div class="col-sm-12" style="margin-top:10px;margin-bottom:20px; background:#fff; padding:10px; border-radius:5px;text-align:center;min-height:200px;color:#ccc;font-size:18px;font-weight:500;line-height:180px;">No Data From Bar-3</div>';
					}
				?>