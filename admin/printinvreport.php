<?php include_once 'inc/head.php'; ?>
<?php 
loadStaff2Array(); 
getBarsItemArrays();
?>
<div>
<div style="text-align:center;">
<h3 class="box-title"><?php echo ($_GET["service"] == 'bar')?'Bar (Lounge)':'Pool Bar'; ?> Report Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></h3>
</div>  
  
  <div>
				  <?php
				 				  
				  if ($_REQUEST["itemname"] != ''){
				  		$filter_staff = " itemid = '".mysqli_real_escape_string($conn4as,$_GET["itemname"])."' AND ";
				  }else{
				  		$filter_staff = " ";
				  }
				  
				  
				  if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  		$filter_dt = " TIMESTAMP(orderdate, ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
				  }else{
				  		$filter_dt = " orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
				  }
				  				  
				  if ($_REQUEST["service"] == 'bar'){
				  	  if($_REQUEST["itemname"] != ''){
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar WHERE id = ".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])." ORDER BY id");
					  }else{
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar ORDER BY id");
					  }
					  $services = 'Bar';
				  }elseif ($_REQUEST["service"] == 'bar2'){
					  if($_REQUEST["itemname"] != ''){
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])." ORDER BY id");
					  }else{
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar2 ORDER BY id");
					  }
					  $services = 'Pool Bar';				  				  
				  }
				  
				  
				  if($sql){
				  while($rs = mysqli_fetch_assoc($qry)){
						if ($_GET["service"] == 'bar'){
							$theQTY = 0; $TOTALSALES = 0;
							$theItemName = $rs["name"];
							$theItemLeft = $rs["itemleft"]; 
							$theSPrice = $rs["price"];
							$theCPrice = $rs["costprice"];
							$itemid = $rs["id"];
							
							getTotalSales('bar',$itemid,$_REQUEST["datefrom"],$_REQUEST["timefrom"],$_REQUEST["dateto"],$_REQUEST["timeto"]);
							
							$theTS = $theQTY + $theItemLeft;
							$theICP = $theTS * $theCPrice;
							$theTFS = $theItemLeft * $theSPrice;
							
							$NETPL = ($TOTALSALES + $theTFS) - $theICP;
							echo '<div style="font-size:12px;padding:5px;border-bottom:#ccc dotted 1px;">';
							echo '<strong>Date/Time:</strong> '.$_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]);
							echo '<br><strong>Item Name:</strong> '.$theItemName;
							echo '<br><strong>Total Stock:</strong> '.$theTS;
							echo '<br><strong>Investment Cost Price:</strong> '.$theICP;
							echo '<br><strong>Total Sales:</strong> '.$TOTALSALES;
							echo '<br><strong>Remaining Stock:</strong> '.$theItemLeft;
							echo '<br><strong>Total Future Sales:</strong> '.$theTFS;
							echo '<br><strong>Net Profit/Loss:</strong> '.$NETPL;
							echo '</div>';
							
						}elseif ($_GET["service"] == 'bar2'){
							$theQTY = 0; $TOTALSALES = 0;
							$theItemName = $rs["name"];
							$theItemLeft = $rs["itemleft"]; 
							$theSPrice = $rs["price"];
							$theCPrice = $rs["costprice"];
							$itemid = $_REQUEST["itemname"];
							
							getTotalSales('bar2',$itemid,$_REQUEST["datefrom"],$_REQUEST["timefrom"],$_REQUEST["dateto"],$_REQUEST["timeto"]);
							
							$theTS = $theQTY + $theItemLeft;
							$theICP = $theTS * $theCPrice;
							$theTFS = $theItemLeft * $theSPrice;
							
							$NETPL = ($TOTALSALES + $theTFS) - $theICP;
							echo '<div style="font-size:12px;padding:5px;border-bottom:#ccc dotted 1px;">';
							echo '<strong>Date/Time:</strong> '.$_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]);
							echo '<br><strong>Item Name:</strong> '.$theItemName;
							echo '<br><strong>Total Stock:</strong> '.$theTS;
							echo '<br><strong>Investment Cost Price:</strong> '.$theICP;
							echo '<br><strong>Total Sales:</strong> '.$TOTALSALES;
							echo '<br><strong>Remaining Stock:</strong> '.$theItemLeft;
							echo '<br><strong>Total Future Sales:</strong> '.$theTFS;
							echo '<br><strong>Net Profit/Loss:</strong> '.$NETPL;
							echo '</div>';
						}
						$GRANDtheICP += $theICP;
						$GRANDTOTALSALES += $TOTALSALES;
						$GRANDtheTFS += $theTFS;
					}
					$GRANDNETPROFIT = ($GRANDTOTALSALES + $GRANDtheTFS) - $GRANDtheICP;
					echo '<div class="col-sm-3 grandbox"><strong>Grand Total Sales:</strong><br>'.$GRANDTOTALSALES.'</div><div class="col-sm-3 grandbox"><strong>Grand Total Future Sales:</strong><br>'.$GRANDtheTFS.'</div><div class="col-sm-3 grandbox"><strong>Grand Total Investment Cost:</strong><br>'.$GRANDtheICP.'</div><div class="col-sm-3 grandbox"><strong>Grand Net Profit/Loss:</strong><br>'.$GRANDNETPROFIT.'</div>';
					}else{
						echo '<div align="center">No record found.</div>';
					}
					
					
				?>
			    </div>
  
</div>
<script>window.print();</script>