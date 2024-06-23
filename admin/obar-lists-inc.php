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
					$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (addbar.name LIKE '%".$_POST["q"]."%' OR order_bar.waiter LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_bar.id","SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (addbar.name LIKE '%".$_POST["q"]."%' OR order_bar.waiter LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_bar.id DESC");
					//$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (addbar.name LIKE '%".$_POST["q"]."%' OR order_bar.waiter LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') GROUP BY order_bar.invoiceid ORDER BY order_bar.id","SELECT GROUP_CONCAT(addbar.name) AS aggname,SUM(order_bar.qty) AS groupqty,SUM(order_bar.total) AS grouptotal, order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE (addbar.name LIKE '%".$_POST["q"]."%' OR order_bar.waiter LIKE '%".$_POST["q"]."%' OR order_bar.invoiceid LIKE '%".$_POST["q"]."%') GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC");
					}else{
					$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id ORDER BY order_bar.id","SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id ORDER BY order_bar.id DESC");
					//$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.invoiceid ORDER BY order_bar.id","SELECT GROUP_CONCAT(addbar.name) AS aggname,SUM(order_bar.qty) AS groupqty,SUM(order_bar.total) AS grouptotal, order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
					  <th>Item Description</th>
					  <th>Qty.</th>
					  <th>Waiter</th>
					  <th>Date</th>
					  <th>Time</th> 
					  <th>VAT</th>
					  <th>Discount</th> 
					  <th>Total ('.$cursign.')</th> 
					  <th>Status</th>                      
                      <th>&nbsp;</th>                   
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$services = '';
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delbarorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<a href="returnitems.php?invoiceid='.$rs["invoiceid"].'" class="label label-warning">Return Item</a>';
					}
					
					    if ($rs["ispaid"] == '1'){
							$ispaid = 'Paid';
							$paidbtn = '<a href="javascript:;" class="label label-grey">Mark As Paid</a>';
						}else{
							$ispaid = 'Unpaid';
							$paidbtn = '<a href="javascript:;" class="label label-warning" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
						}
						
						if ($rs["waiter"] != ''){$waiter = $rs["waiter"];}else{$waiter = '-';}
						if ($rs["discount"] != ''){$discount = number_format($rs["discount"],4).'%';}else{$discount = '0%';}
						
						$services = 'Bar';
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						//echo '<td>'.$services.'</td>';
						echo '<td><div style="font-size:11px;width:150px;height:50px;overflow-y:auto;overflow-x:hidden;">'.$rs["name"].'</div></td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$waiter.'</td>';
						echo '<td>'.$rs["orderdate"].'</td>';
						echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
						echo '<td>'.$rs["vat"].'%</td>';
						echo '<td>'.$discount.'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						//echo '<td><a href="obar-printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">RECEIPT</a></td>';
						echo '<td>'.$paidbtn.'</td>';
						echo '<td><a href="javascript:popupwin(\'obar-invoice-pos.php?printer=pos&invoiceid='.$rs["invoiceid"].'\',\'500\',\'300\');" class="label label-primary">Print Receipt</a></td>';
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