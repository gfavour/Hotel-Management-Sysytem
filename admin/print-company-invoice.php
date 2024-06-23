<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<?php 
loadStaff2Array(); 
loadAllCompany2Array();
?>
<div>
<div>
			               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
					<h3 style="text-align:center;"><u>Company Invoice</u></h3>
				  <?php
				  $sql = select("SELECT orders.*,addclient.lastname,addclient.firstname,addclient.company FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE (addclient.id = '".$_REQUEST["guestid"]."' AND addclient.company <> '') ORDER BY orders.id DESC");
				  
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
							</tr>';
					
				    $c = 1;
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						if ($rs["isroom"] == '1'){$services = ' Room ('.getRoomDetails($rs["invoiceid"]).'), ';}
						if ($rs["isbar"] == '1'){$services .= ' Bar, ';}
						if ($rs["isbar2"] == '1'){$services .= ' Bar2, ';}
						if ($rs["isrestaurant"] == '1'){$services .= ' Restaurant, ';}
						if ($rs["islaundary"] == '1'){$services .= ' Laundary, ';}
						if ($rs["isspa"] == '1'){$services .= ' Spa, ';}
						if ($rs["isswimpool"] == '1'){$services .= ' Swimming Pool, ';}
						if ($rs["issport"] == '1'){$services .= ' Sport ';}
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
						echo '</tr>';						
						$grandtotal += $rs["total"];
					}
						echo '</table>';
						echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.$sign.number_format($grandtotal,2).'</div>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
				?>
			    </div>
				
				<?php if ($_GET["service"] == 'room'){ ?>
						
				<?php } ?>
				
				
				<?php if ($_GET["service"] == 'bar'){ ?>
						
				<?php } ?>
				
				
				
				<?php if ($_GET["service"] == 'restaurant'){ ?>
						
				<?php } ?>
				
				
				<?php if ($_GET["service"] == 'laundary'){ ?>
						
				<?php } ?>
				
				
				
				<?php if ($_GET["service"] == 'spa'){ ?>
						
				<?php } ?>
				
				<?php if ($_GET["service"] == 'swimpool'){ ?>
						
				<?php } ?>
				
				<?php if ($_GET["service"] == 'sport'){ ?>
						
				<?php } ?>
				<!-- /.box-body -->
              </div>
</div>
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>