<?php include("obar-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar-menus.php"); ?>
    <!-- Start Status area -->
    <div>
        <div class="container" style="padding:0;">
		 
		 <?php
		 $invoiceid = $_GET["invoiceid"];
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,guestid,ispaid FROM order_bar WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
		
		if($rs["ispaid"] <> '1'){
			$ispaid = '<a href="javascript:;" class="btn btn-sm btn-warning" style="margin-right:10px;" title="mark invoice '.$invoiceid.' as paid" onclick="dopay(\'paid\',\'invoiceid='.$invoiceid.'&s=dopaid&dwat=paidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
		}
		
		/*
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,roomid,checkstatus FROM order_room WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC");
		$rs = mysqli_fetch_assoc($qry);
		$checkstatus = $rs["checkstatus"];
		if($checkstatus == 'in'){
		$checkstatusbtn = '<a href="javascript:;" onclick="docheck(\'out\',\'invoiceid='.$rs["invoiceid"].'&id='.$rs["id"].'&roomid='.$rs["roomid"].'&s=out&dwat=doinout\',\'../fxn/process1.php\',\'\')" class="btn btn-sm btn-primary" style="margin-right:10px;">Check Out</a>';
		}
		
		$sql = select("SELECT orders.invoiceid,orders.guestid,orders.ispaid,addclient.lastname,addclient.firstname FROM orders inner join addclient on orders.guestid = addclient.id WHERE orders.invoiceid = ".mysqli_escape_string($conn4as,$_GET["invoiceid"])." ORDER BY orders.id DESC");
		$rs = mysqli_fetch_assoc($qry);
		$myinvid = $rs["invoiceid"];
		$myguestid = $rs["guestid"];
		*/		
		?>
		
		
		
		
		
		<div class="col-xs-12" style="padding:0;">
              
			 <div style="border:#eee solid 1px; background:#fff; padding:10px 15px; width:65%; margin:10px 0;">
					 <a href="obar-invoice-pos.php?printer=pos&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to POS Printer</a><!-- <a href="invoice.php?printer=desktop&invoiceid=<?php echo $_GET["invoiceid"]; ?>" target="_blank" class="btn btn-sm btn-primary" style="margin-right:10px;">Send to Desktop Printer</a> --><?php echo $ispaid; ?>
					 </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
			  
			  <!-- box-body -->
			  <div class="box box-primary">
			        <?php
					$sql = select("SELECT order_bar.*,addbar.name FROM order_bar inner join addbar on order_bar.itemid = addbar.id WHERE order_bar.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_bar.id DESC");
					if($sql){
					echo '<div class="box-body table-responsive no-padding" style="margin-top:10px;">';
				    //echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Bar Service</u></strong></div>';
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
						echo '<div><strong>Qty: </strong>'.$rs["qty"].', <strong>VAT: </strong>'.$rs["vat"].'%, <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].$sclabel.'<br><strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date/Time: </strong>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).'</div>';
						echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
						echo '</div>';
					}
					echo '</div>';
					}
				?>
				
				
				
				<?php //if ($isrestaurant == '1'){ ?>
				<!--
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
					/*
					$sql = select2nav("SELECT count(id) as ctn FROM order_restaurant WHERE invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY id DESC","SELECT order_restaurant.*,addresturant.name FROM order_restaurant inner join addresturant on order_restaurant.itemid = addresturant.id WHERE order_restaurant.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_restaurant.id DESC");
					if($sql){
				  echo '<div style="text-decoration:underlined;padding:10px; font-size:16px; text-align:left;"><strong><u>Restaurant Service</u></strong></div>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if ($rs["ispaid"] == '1'){
						$ispaid = 'Paid'; 
						$ispaidbtn = ($globalrole != 'admin')?'':'<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'unpaid\',\'invoiceid='.$rs["invoiceid"].'&s=dounpaid&dwat=respaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As UnPaid</a>';
						}else{
						$ispaid = 'UnPaid'; 
						$ispaidbtn = '<a href="javascript:;" class="label label-sm label-warning" style="margin-right:10px;" onclick="dopay(\'paid\',\'invoiceid='.$rs["invoiceid"].'&s=dopaid&dwat=respaidunpaid\',\'../fxn/process1.php\',\'\')">Mark As Paid</a>';
						}
						
						echo '<div class="width-div-2">';
						echo '<div><strong>Food Item: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Qty: </strong>'.$rs["qty"].' <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date: </strong>'.$rs["orderdate"].'</div>';echo '<div><strong>Payment Status: </strong>'.$ispaid.' '.$ispaidbtn.'</div>';
						echo '</div>';
					}
					}
					*/
				?>
			    </div>
				-->		
				<?php //} ?>
				
				
				  <?php
					$sql = select("SELECT order_swimpool.*,addswimpool.name,addswimpool.measure FROM order_swimpool inner join addswimpool on order_swimpool.itemid = addswimpool.id WHERE order_swimpool.invoiceid = '".mysqli_escape_string($conn4as,$_GET["invoiceid"])."' ORDER BY order_swimpool.id DESC");
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
						echo '<div><strong>Service: </strong>'.$rs["name"].'</div>';
						echo '<div><strong>Duration: </strong>'.$rs["duration"].' '.$rs["measure"].'(s), <strong>No of person: </strong>'.$rs["noofperson"].', <strong>Discount: </strong>'.$rs["discount"].'%</div>';
						echo '<div><strong>Price: </strong>'.$cursign.$rs["unitprice"].' <strong>Total: </strong>'.$cursign.number_format($rs["total"],2).'<br><strong>Date: </strong>'.$rs["orderdate"].'</div>';echo '<div><strong>Payment Status: </strong>'.$ispaid.'</div>';
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