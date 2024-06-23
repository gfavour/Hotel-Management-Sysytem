<section class="content">
<div class="row">
            <div class="col-xs-12">
            <div id="msgbox"></div>
						  		  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname..." style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('append-list.php');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_POST["dwat"] == 'search'){
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (orders.isbar = '1' AND addclient.lastname LIKE '%".$_POST["q"]."%') AND orders.ispaid <> '1' ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (orders.isbar = '1' AND addclient.lastname LIKE '%".$_POST["q"]."%') AND orders.ispaid <> '1' ORDER BY orders.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isbar = '1' AND  orders.ispaid <> '1' ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.isbar = '1' AND orders.ispaid <> '1' ORDER BY orders.id DESC");
					}
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
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$services = '';
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="btn btn-xs btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="btn btn-xs btn-grey">Delete</span>';
					}
					
					    if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["isroom"] == '1'){$services = ' Room, ';}
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						//if ($rs["ispaid"] == '1'){$ispaid = '<a href="javascript:;" onclick="dopay(\'Unpaid\',\'id='.$rs["id"].'&tbl=orders&dwat=dounpaid\',\'../fxn/process1.php\',\'\')">Paid</a>';}else{$ispaid = '<a href="javascript:;" onclick="dopay(\'Paid\',\'id='.$rs["id"].'&tbl=orders&dwat=dopaid\',\'../fxn/process1.php\',\'\')">Unpaid</a>';}
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].' '.$rs["firstname"].'</a></td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="append-order.php?clientid='.$rs["guestid"].'&invoiceid='.$rs["invoiceid"].'" class="btn btn-xs btn-primary">Append</a></td>';
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