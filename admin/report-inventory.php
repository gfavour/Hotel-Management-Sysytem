<?php 
include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
loadStaff2Array(); 
getBarsItemArrays();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Bar Stock Report</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar Stock Report</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <!-- /.box-header -->
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<form name="frm" action="" method="get">
				<input type="hidden" name="dwat" value="searchreport" />
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="" style="width:55%;"><input type="time" name="timefrom" id="timefrom" value="00:00" class="form-control" required style="width:45%;">
				</div>
				</div>
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="" style="width:55%;"><input type="time" name="timeto" id="timeto" value="23:59" class="form-control" required style="width:45%;">
				</div>
				</div>
								
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-list"></i></span>
				<select name="service" id="service" class="form-control" onchange="getBarItems2Opt(this.value)">
				<option value="bar">Bar 1</option>
				<option value="bar2">Bar 2</option>
				<option value="bar3">Bar 3</option>
				<!-- -->
				</select>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Item Name</strong></i></span>
				<select name="itemname" id="itemname" class="form-control">
				</select>
				</div>
				</div>
								
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate Report</button></div>
				</form>
				</div>
				
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title"><?php 
			  if($_GET["service"] == 'bar'){
				  echo 'Bar-1';
			  }elseif($_GET["service"] == 'bar2'){
			  	  echo 'Bar-2';
			  }elseif($_GET["service"] == 'bar3'){
			  	  echo 'Bar-3';
			  }
			  ?> Report Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></h3>
              <div class="box-tools pull-right">
			  <a href="printinvreport.php?<?php echo 'datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&timeto='.$_REQUEST["timeto"].'&dateto='.$_REQUEST["dateto"].'&service='.$_REQUEST["service"].'&itemname='.$_REQUEST["itemname"]; ?>" class="label label-info" target="_blank">Print report</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
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
					  $services = 'Bar-1';
				  }elseif ($_REQUEST["service"] == 'bar2'){
					  if($_REQUEST["itemname"] != ''){
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])." ORDER BY id");
					  }else{
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar2 ORDER BY id");
					  }
					  $services = 'Bar-2';				  				  
				  }elseif ($_REQUEST["service"] == 'bar3'){
					  if($_REQUEST["itemname"] != ''){
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar3 WHERE id = ".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])." ORDER BY id");
					  }else{
					  		$sql = select("SELECT id,name,itemleft,price,costprice FROM addbar3 ORDER BY id");
					  }
					  $services = 'Bar-3';				  				  
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
							
						}elseif ($_GET["service"] == 'bar2' || $_GET["service"] == 'bar3'){
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
			  
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<script type="text/javascript">
var allBAR1items = <?php echo json_encode($allBAR1items); ?>;
var allBAR2items = <?php echo json_encode($allBAR2items); ?>;
function getBarItems2Opt(v){ //alert(allBAR1items[12])
	var opts = '';
	if(v == 'bar'){
		for (let key in allBAR1items){
			opts += '<option value="'+key+'">'+allBAR1items[key]+'</option>';
		}
	}else if(v == 'bar2'){
		for (let k in allBAR2items){
			opts += '<option value="'+k+'">'+allBAR2items[k]+'</option>';
		}
	}
	//alert(opts);
	document.getElementById('itemname').innerHTML = '<option value="">All</option>'+opts;
}
getBarItems2Opt(document.frm.service.value);
</script>
<?php include_once 'inc/footer.php'; ?>