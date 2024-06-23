<?php include("obar-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar-menus.php"); ?>
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container" style="padding:0;">
<?php
loadWaiters2Array();
?>
<?php 
loadStaff2Array();
if(isset($_REQUEST["datefrom"])){
$nowdate = $_REQUEST["datefrom"];
$nextdate = $_REQUEST["dateto"];
if($_REQUEST["waiter"] != ''){ $waiter = ucwords(strtolower($_REQUEST["waiter"])); $sqlwaiter = $_REQUEST["waiter"]; }else{ $waiter = 'Waiters'; $sqlwaiter = ''; }
$rptdate = $waiter." Sales Report Between ".date("Y-m-d h:i A",strtotime($_REQUEST["timefrom"].' '.$_REQUEST["datefrom"])).' - '.date("Y-m-d h:i A",strtotime($_REQUEST["timeto"].' '.$_REQUEST["dateto"]));
}else{
$nowdate = date("Y-m-d");
$prevdate = date('Y-m-d', strtotime($nowdate .' -1 day'));
$nextdate = date('Y-m-d', strtotime($nowdate .' +1 day'));
$rptdate = 'Sales Report';
}
?>
<div class="row">
<div class="col-sm-12" style="padding:0px;">  
<div id="msgbox"></div>

<div>
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><div class="col-sm-4" style="padding:0;width:355px;"><strong>From:</strong><input type="date" name="datefrom" class="form-control" required title="date from is required" value="<?php echo $nowdate; ?>" style="width:155px;display:inline-block; margin:0 5px;"><input type="time" name="timefrom" id="timefrom" value="16:00:00" class="form-control" required style="width:135px;display:inline-block;"></div>
			  <div class="col-sm-5" style="padding:0;width:345px;"><strong>To:</strong><input type="date" name="dateto" class="form-control" required title="date to is required" value="<?php echo $nextdate; ?>" style="width:155px;display:inline-block; margin:0 5px;"><input type="time" name="timeto" id="timeto" value="16:00:00" class="form-control" required style="width:135px;display:inline-block;"></div>
			  <div class="col-sm-3" style="padding:0;width:400px;"><strong>Waiter:</strong><select name="waiter" class="form-control" style="width:150px;display:inline-block; margin:0 5px;"><?php echo getWaitersOpt($_REQUEST["waiter"]); ?></select><button class="btn btn-sm btn-success" style="padding:7px 10px; vertical-align:top;"><i class="fa fa-search"></i> Search</button><?php echo (isset($_REQUEST["datefrom"]))?'<a href="printbarreport.php?stype=bar1&waiter='.$_REQUEST["waiter"].'&datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&dateto='.$_REQUEST["dateto"].'&timeto='.$_REQUEST["timeto"].'" class="btn btn-sm btn-info" style="padding:7px 10px;margin-left:5px; vertical-align:top;" target="_Blank">Print</a>':''; ?></div> </form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
<?php 
if(isset($_REQUEST["datefrom"])){
if($sqlwaiter != ''){ $sqlw = " LOWER(order_bar.waiter) = '".mysqli_real_escape_string($conn4as,strtolower($sqlwaiter))."' AND "; }else{ $sqlw = ""; }
$filter_qry = $sqlw." TIMESTAMP(order_bar.orderdate, order_bar.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";

//$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_qry." GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC","SELECT GROUP_CONCAT(addbar.name) AS aggname,SUM(order_bar.qty) AS groupqty,SUM(order_bar.total) AS grouptotal, order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_qry." GROUP BY order_bar.invoiceid ORDER BY order_bar.id DESC");

$sql = select2nav("SELECT count(order_bar.id) as ctn FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_qry." ORDER BY order_bar.id DESC","SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_qry." ORDER BY order_bar.id DESC");

$grandtotal = getGrandTotal("SELECT SUM(order_bar.total) AS grandtotal FROM order_bar WHERE ".$filter_qry." ORDER BY id");
$paidtotal = getGrandTotal("SELECT SUM(order_bar.total) AS grandtotal FROM order_bar WHERE order_bar.ispaid = '1' AND ".$filter_qry." ORDER BY id");
$unpaidtotal = getGrandTotal("SELECT SUM(order_bar.total) AS grandtotal FROM order_bar WHERE order_bar.ispaid <> '1' AND ".$filter_qry." ORDER BY id");

if($sql){
echo '<table class="table table-border">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Product Name</th>
						  <th>Date/Time</th>
						  <th>Qty.</th>
						  <th>VAT</th>
						  <th>Discount</th>
						  <th>Total</th>
						  <th>Status</th>
						  <th>Placed By</th>
						</tr>';
						
while($rs = mysqli_fetch_assoc($qry)){

if($rs["staffid"] != ''){ $placedby = $allstaffs[$rs["staffid"]]; }else{$placedby = $rs["waiter"];}

echo '<tr>';
echo '<td>'.$c++.'</td>';
echo '<td>'.$rs["invoiceid"].'</td>';
echo '<td>'.$rs["name"].'</td>';
echo '<td>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).'</td>';
echo '<td>'.$rs["qty"].'</td>';
echo '<td>'.$rs["vat"].'%</td>';
echo '<td>'.number_format($rs["discount"],2).'%</td>';
echo '<td>'.$sign.number_format($rs["total"],2).'</td>';
echo ($rs["ispaid"] == '1')?'<td>Paid</td>':'<td>UnPaid</td>';
echo '<td>'.$placedby.'</td>';
echo '</tr>';
}	
echo '</table>';
// echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.number_format($grandtotal,2).'</div>';
echo '<div style="text-align:right;font-size:18px;padding:10px 10px;">';
echo '<strong>Total Paid:</strong> '.number_format($paidtotal,2).'<br>';
echo '<strong>Total Unpaid:</strong> '.number_format($unpaidtotal,2).'<br>';
echo '<strong>Grand Total:</strong> '.number_format($grandtotal,2);
echo '</div>';
								
}else{
echo '<div style="text-align:center;padding:20px;font-size:20px;">'.$waiter.' do not have any sales record between '.date("Y-m-d h:i A",strtotime($_REQUEST["timefrom"].' '.$_REQUEST["datefrom"])).' - '.date("Y-m-d h:i A",strtotime($_REQUEST["timeto"].' '.$_REQUEST["dateto"])).'</div>';
}
}else{
echo '<div style="text-align:center;padding:20px;font-size:16px;">Use the form above to search your daily sales report.</div>';
}
?>
                </div><!-- /.box-body -->
				<?php echo $nav; ?>
              </div><!-- /.box -->
            </div>
			
</div>
</div>

</div>
</div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar-footer.php"); ?>
</body>
</html>