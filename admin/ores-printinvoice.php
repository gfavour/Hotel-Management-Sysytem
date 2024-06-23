<?php include("ores-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("ores-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("ores-menus.php"); ?>
    <!-- Start Status area -->
    <div>
        <div class="container" style="padding:0;">
				
		<div class="col-xs-12" style="padding:0;">
        <?php
		$invoiceid = $_GET["invoiceid"];
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,guestid,ispaid FROM order_restaurant WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
		
		if($rs["ispaid"] <> '1'){
			$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" title="mark invoice '.$invoiceid.' as paid" onclick="dopay(\'paid\',\'invoiceid='.$invoiceid.'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
		}
			  ?>
			 <div style="border:#eee solid 1px; background:#fff; padding:10px 15px; width:65%; margin:10px 0;">
					 <a href="ores-invoice-pos.php?printer=pos&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to POS Printer</a><!-- <a href="invoice.php?printer=desktop&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to Desktop Printer</a> --><?php echo $ispaid; ?>
					 </div>
			  
		<div id="msgbox"></div>
			  
			  <!-- box-body -->
			  <div class="box box-primary">
			        <?php
					$sql = select2nav("SELECT count(id) as ctn FROM order_restaurant WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
					if($sql){
					echo '<div class="box-body table-responsive no-padding" style="margin-top:10px;">';
				    echo '<div style="padding:10px 10px; font-size:16px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){
						$ispaid = 'Paid'; 
						$ispaidbtn = ($globalrole != 'admin')?'':'<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=respaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';
						}else{
						$ispaid = 'UnPaid'; 
						$ispaidbtn = '<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=respaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
						}
						
						if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
							$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
						}else{ $sclabel = ''; }
					
						echo '<div class="width-div-2">';
						echo '<div><strong>Food Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.'<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date/Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).'</div>';echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
						echo '</div>';
					}
					echo '</div>';
					}
				?>
				
              </div><!-- /.box -->
            </div>
		
		
		 </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("ores-footer.php"); ?>
</body>
</html>