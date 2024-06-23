<div class="col-sm-12" style="margin-top:10px;margin-bottom:20px; background:#fff; padding:10px; border-radius:5px;"><canvas id="myroomChart"></canvas></div>
				
					<?php
					$xData = [];
					$yData = [];
					
					$sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id GROUP BY order_room.roomid ORDER BY order_room.id ASC ","SELECT addroom.roomType AS name,order_room.roomid,SUM(order_room.noofroom) AS noofroom,SUM(order_room.duration) AS duration,order_room.orderdate FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id GROUP BY order_room.roomid ORDER BY order_room.id ASC");
					
					if($sql){				  					  
						while($rs = mysqli_fetch_assoc($qry)){
							ChartDataUpdater($rs["noofroom"],$rs["name"]);
						}
					}
					
					//display chart....
					$xds = ChartDataLoader("x");
					$yds = ChartDataLoader("y");
					$cds = ChartDataLoader("c");
					$dds = ChartDataLoader("d");
					if($odate != ''){ $clbl = 'Room Trend Analysis ('.getMonth($_GET["month"]).', '.$_GET["year"].')'; }else{ $clbl = 'Room Trend Analysis'; }
					echo '<script>var canvasid = "myroomChart"; var xds = ['.$xds.']; var yds = ['.$yds.']; var cds = ['.$cds.']; var dds = ['.$dds.']; var chartlabel = "'.$clbl.'";</script>';
					echo '<script src="../fxn/chartjsdisplay.js"></script>';
					
				?>