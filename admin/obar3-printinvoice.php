<?php include("obar3-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar3-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar3-menus.php"); ?>
    <!-- Start Status area -->
    <div class="row" style="padding:0px;">
        <div class="container" style="padding:0;">
		 
		<?php
		$invoiceid = $_GET["invoiceid"];
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,guestid,ispaid FROM order_bar3 WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$totalinv = mysqli_num_rows($qry);
		
		if($totalinv > 0){
			$rs = mysqli_fetch_assoc($qry);
			if($rs["ispaid"] <> '1'){
				$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" title="mark invoice '.$invoiceid.' as paid" onclick="dopay(\'paid\',\'invoiceid='.$invoiceid.'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
			}
		}else{
		
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,guestid,ispaid FROM order_swimpool WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$totalinv = mysqli_num_rows($qry);
		if($totalinv > 0){
			$rs = mysqli_fetch_assoc($qry);
			if($rs["ispaid"] <> '1'){
				$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" title="mark invoice '.$invoiceid.' as paid" onclick="dopay(\'paid\',\'invoiceid='.$invoiceid.'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
			}
		}
		
		}
		?>
		
		<div class="col-sm-12" style="padding:0px;">  
              
			 <div style="border:#eee solid 1px; background:#fff; padding:10px 15px; width:65%; margin:10px 0;">
					 <a href="obar3-invoice-pos.php?printer=pos&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to POS Printer</a><!-- <a href="invoice.php?printer=desktop&invoiceid=<?php //echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to Desktop Printer</a> --><?php echo $ispaid; ?>
					 </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
			  
			  <!-- box-body -->
			  <div class="box box-primary">
			        <?php
					$sql = select("SELECT order_bar3.*,addbar3.name FROM order_bar3 inner join addbar3 on order_bar3.itemid = addbar3.id WHERE order_bar3.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar3.id DESC");
					if($sql){
					echo '<div class="box-body table-responsive no-padding" style="margin-top:10px;">';
				    echo '<div style="padding:10px 0; font-size:16px; text-align:left;"><strong><u>Bar Service</u></strong></div>';
					
					while($rs = mysqli_fetch_assoc($qry)){
					
					if ($rs["ispaid"] == '1'){
					$ispaid = 'Paid'; 
					$ispaidbtn = ($globalrole != 'admin')?'':'<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=barpaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';
					}else{
					$ispaid = 'UnPaid'; 
					$ispaidbtn = '<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=barpaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
					}
					
					if ($rs["servicecharge"] > 0 && $rs["servicecharge"] != ''){
					$servicecharge = $rs["servicecharge"]; $sclabel = ', <strong>Service Charge:</strong> '.$cursign.$servicecharge; 
					}else{ $sclabel = ''; }
					
						echo '<div class="width-div-2">';
						echo '<div><strong>Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.number_format($rs["discount"],4).'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.'<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date/Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).'</div>';
						echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
						echo '</div>';
					}
					echo '</div>';
					}
				?>
				
								
				  <?php
					$sql = select("SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_real_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
					if($sql){
				    echo '<div class="box-body table-responsive no-padding" style="margin-top:10px;">';
					echo '<div style="padding:10px 0; font-size:16px; text-align:left;"><strong><u>Swimming Pool Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						if ($rs["ispaid"] == '1'){
						$ispaid = 'Paid'; 
						$ispaidbtn = ($globalrole != 'admin')?'':'<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=barpaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';
						}else{
						$ispaid = 'UnPaid'; 
						$ispaidbtn = '<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=barpaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
						}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Swimming Pool: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' '.$rs["measure"].'(s), <strong>No of person: </strong>'.$rs["noofperson"].', <strong>Discount: </strong>'.number_format($rs["discount"],4).'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date/Time: </strong>'.$rs["orderdate"].' '.$rs["ordertime"].'</div>';echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
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
 
<?php include("obar-footer.php"); ?>
</body>
</html>