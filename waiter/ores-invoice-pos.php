<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead-pos.php'; ?>
<div>
<div style="font-size:10px !important;">
			               		
					<div style="margin-top:1px;">
				  <?php
					$ReceiptTitle = getReceiptRoomTitle($_GET["invoiceid"]);
					echo $ReceiptTitle;
				?>
			    </div>
				
								
				<div style="margin-top:1px;">
				  <?php
					$sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
					if($sql){
				    echo '<div style="padding:10px 0; font-size:14px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){						
						if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
						$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }
						
						echo '<div class="width-div-3">';
						echo '<strong>Food: </strong>'.$rs["name"].', ';
						echo '<strong>Qty: </strong>'.$rs["qty"].', <strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.'<br><strong>Discount: </strong>'.$rs["discount"].'%<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2);
						echo '<br><strong>Payment Status: </strong>'.$ispaid.', ';
						echo '<br><strong>Date / Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).', ';
						if($rs["tableno"] != ''){ echo '<strong>Table: </strong>'.$rs["tableno"].', '; }
						echo '</div>';
						$grandtotal_res += $rs["total"];
					}
					}
				  ?>
			    </div>
						
				<?php 
					echo '<div><strong>GRAND TOTAL: </strong>'.$cursign.number_format($grandtotal_res,2).'</div>'; 
				?>
				
              </div>
</div>

<?php include_once 'reportfooter-pos.php'; ?>
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>