<?php include("obar2-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar2-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar2-menus.php"); ?>
    <!-- Start Status area -->
    <div>
    <div class="container" style="padding:0;">
	<div class="col-xs-10" style="padding:0;">
    <div id="msgbox"></div>
	
	<div class="box box-primary">
			        <?php
					$sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 inner join addbar2 on order_bar2.itemid = addbar2.id WHERE order_bar2.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar2.id");
					if($sql){
					echo '<div class="box-body no-padding" style="margin-top:10px;">';
				    echo '<div style="padding:10px 10px; font-size:16px; text-align:center;"><strong><u>RETURN ITEM</u></strong></div>';
					echo '<table class="table table-striped">';
					echo '<tr>';
					echo '<td><strong>Item Name</strong></td>';
					echo '<td><strong>Invoice ID</strong></td>';
					echo '<td><strong title="Quantity initially ordered by customer">Quantity</strong></td>';
					echo '<td><strong>Unit Price</strong></td>';
					echo '<td><strong>Service Charge</strong></td>';
					echo '<td><strong>Total Amount</strong></td>';
					echo '<td><strong>Quantity to Return</strong></td>';
					echo '<td></td>';
					echo '</tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
							$sclabel = $cursign.number_format($rs["servicecharge"],0); 
						}else{ $sclabel = '-'; }
						
						echo '<tr>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$cursign.$rs["unitprice"].'</td>';
						echo '<td>'.$sclabel.'</td>';
						echo '<td>'.$cursign.number_format($rs["total"],0).'</td>';
						echo '<td><input type="number" name="rqty'.$rs["id"].'" id="rqty'.$rs["id"].'" value="0" class="form-control" style="width:100px;margin:0 10px 0 0;"></td>';
						echo '<td><button type="button" class="btn btn-sm btn-warning" onclick="var rq = document.getElementById(\'rqty'.$rs["id"].'\').value; SendByAjax(\'dwat=returnitem2&invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'&rqty=\'+rq,\'../fxn/process1.php\',\'\')">RETURN ITEM</button></td>';
						echo '</tr>';
					}
					echo '</table></div>';
					}
				?>
				
              </div>
	
    </div>
	</div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar2-footer.php"); ?>
</body>
</html>