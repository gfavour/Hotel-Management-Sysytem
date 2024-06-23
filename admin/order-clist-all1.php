<?php
$guestid = $_GET["guestid"];
?>
<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
		
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="hidden" name="guestid" value="<?php echo $guestid; ?>" /><input type="date" name="datefrom" placeholder="Date From:" class="form-control input-sm pull-left" style="width:200px" /><input type="date" name="dateto" placeholder="Date To:" class="form-control input-sm pull-left" style="width:200px" /><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF'].'?guestid='.$_REQUEST["guestid"]; ?>');" class="btn btn-sm btn-default">VIEW All</button> <a href="order-company-list.php" class="btn btn-sm btn-default">BACK</a> <a href="<?php echo 'print-company-invoice.php?'.$_SERVER['QUERY_STRING']; ?>" class="btn btn-sm btn-info" target="_blank">PRINT</a></div></form></div>
			  
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
					$dfrm = ($_REQUEST["datefrom"] != '')?$_REQUEST["datefrom"]:date("Y-m-d");
					$dto = ($_REQUEST["dateto"] != '')?$_REQUEST["dateto"]:date("Y-m-d");
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (orders.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$dfrm)."' AND '".mysqli_real_escape_string($conn4as,$dto)."') AND addclient.company <> '' AND orders.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (orders.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$dfrm)."' AND '".mysqli_real_escape_string($conn4as,$dto)."') AND addclient.company <> '' AND orders.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY orders.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(orders.id) as ctn FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE addclient.company <> '' AND orders.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY orders.id DESC","SELECT orders.*,addclient.lastname,addclient.firstname,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE addclient.company <> '' AND orders.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY orders.id DESC"); //1545476651
					}
					
					if($sql){
				    echo '<table class="table table-striped">
                    <tr><th>SN</th>
                      <th>Invoice ID</th>
					  <th>Company</th>
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
						
						if ($rs["isroom"] == '1'){$services = ' Room ('.$AllOrderRoomArray[$rs["invoiceid"]].'), ';}
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
							//$invlink = '<a href="invoice-company.php?printer=desktop&invoiceid='.$rs["invoiceid"].'" target="_Blank" class="label label-primary">Invoice</a>';
						}else{
							$invlink = '<a href="invoice-pos.php?printer=pos&invoiceid='.$rs["invoiceid"].'" target="_Blank" class="label label-primary"><i class="fa fa-print"></i> Receipt</a>';
						}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$allCompanyArray[$rs["company"]]["name"].'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
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