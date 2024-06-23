<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
		
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><select name="q" class="form-control input-sm pull-left" style="width:250px;"><?php echo getAllCompanyOpt($_REQUEST["q"]);?></select><input type="date" name="datefrom" placeholder="Date From:" class="form-control input-sm pull-left" style="width:200px" /><input type="date" name="dateto" placeholder="Date To:" class="form-control input-sm pull-left" style="width:200px" /><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">VIEW All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_REQUEST["dwat"] == 'search'){
					
					if($_REQUEST["q"] != ''){
						$thecompany = " addclient.company = '".$_REQUEST["q"]."' AND ";
					}
					
					if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){
					 $dateft = " AND (orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ";
					}elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){
						$today = date("Y-m-d");
						$dateft = " AND (orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$today)."') ";
					}
					
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (".$thecompany." addclient.company <> '') ".$dateft." GROUP BY orders.guestid ORDER BY orders.id DESC","SELECT orders.id,orders.guestid,SUM(orders.total) AS total,addclient.lastname,addclient.firstname,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (".$thecompany." addclient.company <> '') ".$dateft." GROUP BY orders.guestid ORDER BY orders.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE addclient.company <> '' GROUP BY orders.guestid ORDER BY orders.id DESC","SELECT orders.id,orders.guestid,SUM(orders.total) AS total,addclient.lastname,addclient.firstname,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE addclient.company <> '' GROUP BY orders.guestid ORDER BY orders.id DESC"); //1545476651
					}
					
					if($sql){
				    echo '<table class="table table-striped">
                    <tr><th>SN</th>
					  <th>Company</th>
                      <th>Guest Name</th>
					  <th>Total ('.$cursign.')</th>  
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.strtoupper($allCompanyArray[$rs["company"]]["name"]).'</td>';
						echo '<td>'.strtoupper($rs["lastname"].' '.$rs["firstname"]).'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td><a href="order-company-list1.php?guestid='.$rs["guestid"].'" class="label label-md label-primary">Guest Invoices</a></td>';
						//echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
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