<?php
loadGuests2Array();
?>
<div class="row" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="msgbox"></div>

<div>
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by invoice id, lastname, firstname" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
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
					//$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addclient ON order_bar.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC","SELECT order_bar.*,SUM(order_bar.total) AS gtotal, addclient.lastname,addclient.firstname FROM order_bar INNER JOIN addclient ON order_bar.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC");
					$sql = select2nav("SELECT count(order_bar2.id) as ctn FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE (addbar2.name LIKE '%".$_POST["q"]."%' OR order_bar2.waiter LIKE '%".$_POST["q"]."%' OR order_bar2.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_bar2.id","SELECT order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE (addbar2.name LIKE '%".$_POST["q"]."%' OR order_bar2.waiter LIKE '%".$_POST["q"]."%' OR order_bar2.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_bar2.id DESC");
					}else{
					//$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addclient ON order_bar.guestid = addclient.id GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC","SELECT order_bar.*,SUM(order_bar.total) AS gtotal, addclient.lastname,addclient.firstname FROM order_bar INNER JOIN addclient ON order_bar.guestid = addclient.id GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC");
					$sql = select2nav("SELECT count(order_bar2.id) as ctn FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id ORDER BY order_bar2.id","SELECT order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id ORDER BY order_bar2.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
					  <th nowrap>Service</th>
					  <th>Item Description</th>
					  <th>Qty.</th>
					  <th>Waiter</th>
					  <th>Date</th>
					  <th>Time</th> 
					  <th>Discount</th> 
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
						$delBtn = '<a href="returnitems2.php?invoiceid='.$rs["invoiceid"].'" class="label label-warning">RETURN ITEM</a>';
					}
					
					    if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["waiter"] != ''){$waiter = $rs["waiter"];}else{$waiter = '-';}
						if ($rs["discount"] != ''){$discount = $rs["discount"].'%';}else{$discount = '0%';}
						
						$services = 'Bar';
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						//echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$waiter.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
						echo '<td>'.$discount.'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="obar2-printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">RECEIPT</a></td>';
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
</div>