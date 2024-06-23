<?php //getAllOrderRoomArrays();
getAllOrderRoomArraysCols();
?>
<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
		
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname, firstname, invoice id..." style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
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
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR orders.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR orders.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY orders.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname FROM orders INNER JOIN addclient ON orders.guestid = addclient.id ORDER BY orders.id DESC"); //1545476651
					}
					
					if($sql){
				    echo '<table class="table table-striped">
                    <tr><th>SN</th>
                      <th>Invoice ID</th>
                      <th>Guest</th>
					  <th nowrap>Service Rendered</th>
					  <th>Date</th>
					  <th>Time</th> 
					  <th>Total ('.$cursign.')</th> 
					  <th>Status</th>                     
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$services = '';
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
					}
					
					    if ($rs["ispaid"] == '1'){$ispaid = '<span class="label label-success">Paid</span>';}else{$ispaid = '<span class="label label-warning">Unpaid</span>';}
						
						if ($rs["isroom"] == '1'){$services = ' Room ('.$AllOrderRoomArray[$rs["invoiceid"]]["roomType"].'), ';}
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isbar2"] == '1'){$services .= ' Bar2, ';}
						if ($rs["isbar3"] == '1'){$services .= ' Bar3, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["isswimpool"] == '1'){$services .= ' Swimming Pool, ';}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
						
						if ($rs["isroom"] == '1'){
							if ($rs["ispaid"] == '1'){
							$invlink = '<a href="invoice-company.php?printer=desktop&invoiceid='.$rs["invoiceid"].'" target="_Blank" class="label label-primary"><i class="fa fa-print"></i> Receipt</a>';
							}else{
							$invlink = '<a href="clientdetails.php?roomid='.$AllOrderRoomArray[$rs["invoiceid"]]["roomid"].'&invoiceid='.$rs["invoiceid"].'" target="_Blank" class="label label-info"><i class="fa fa-edit"></i> Invoice</a>';
							}
						}else{
							if ($rs["ispaid"] == '1'){
								$invlink = '<a href="invoice-pos.php?printer=pos&invoiceid='.$rs["invoiceid"].'" target="_Blank" class="label label-primary"><i class="fa fa-print"></i> Receipt</a>';
							}else{
								$invlink = '<a href="printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary" target="_Blank">Mark As Pay</a>';
							}							
						}
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						//echo '<td><a href="invoice-list.php?invoiceid='.$rs["invoiceid"].'">'.$rs["invoiceid"].'</a></td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						//echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].' '.$rs["firstname"].'</a></td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						//echo '<td>'.$allstaffs[$rs["staffid"]].'</td>';
						echo '<td>'.$invlink.'</td>';
						echo '<td>'.$delBtn.'</td>';
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