<?php include("obar-head.php"); ?>
<?php 
loadStaff2Array();
if(isset($_REQUEST["datefrom"])){
$nowdate = $_REQUEST["datefrom"];
$nextdate = $_REQUEST["dateto"];
$rptdate = date("Y-m-d h:i A",strtotime($_REQUEST["timefrom"].' '.$_REQUEST["datefrom"])).' - '.date("Y-m-d h:i A",strtotime($_REQUEST["timeto"].' '.$_REQUEST["dateto"]));
}else{
$nowdate = date("Y-m-d");
$prevdate = date('Y-m-d', strtotime($nowdate .' -1 day'));
$nextdate = date('Y-m-d', strtotime($nowdate .' +1 day'));
$rptdate = '0 records found';
}
?>
<body>
<div class="container" style="padding:0 5px;">
<form name="frm1x" id="frm1x" action="" method="get">
<input type="hidden" name="dwat" value="wdailysalessearch">
<input type="hidden" name="waiter" id="waiter" value="<?php echo $globalwname; ?>">
<div class="barbcsidebar box" style="padding:10px 10px !important;border:#ccc solid 1px;border-top:#d1d6b7 solid 3px; margin-top:10px;background: rgb(231,237,202) !important;background: linear-gradient(0deg, rgba(231,237,202,0.5) 0%, rgba(255,255,255,0.5) 100%) !important;">
<div style="width:280px;float:left; font-size:14px;">
<strong>Search Result:</strong><br>
<?php echo $rptdate; ?>
</div>
<div style="width:200px;float:right; text-align:right;">
<button type="button" class="btn btn-default btn-lg" style="width:60px;" title="Back to dashboard" onClick="window.location.href='home.php'"><i class="fa fa-arrow-left"></i></button>
<button type="button" class="btn btn-default btn-lg" style="width:60px;margin-left:10px;background:#890;color:#fff;" title="Process to order.." id="caretme"><i class="fa fa-caret-down"></i></button>
</div>
<br clear="all" />
</div>
<!-------------->
<div id="sidebarform" class="box" style=" padding:15px 20px 5px 20px;margin:5px 0 0 0;display:none;border:#ccc solid 1px;border-top:#ccc solid 4px; margin-top:10px;background: rgb(238,238,238);
background: linear-gradient(0deg, rgba(238,238,238,1) 0%, rgba(255,255,255,1) 67%);">

<div class="col-sm-5">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="<?php echo $nowdate; ?>" style="width:55%;padding:0 0 10px 0;"><input type="time" name="timefrom" id="timefrom" value="16:00:00" class="form-control" required style="width:45%;padding:0 0 10px 0;">
				</div>
				</div>
				
				<div class="col-sm-5">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="<?php echo $nextdate; ?>" style="width:55%;padding:0 0 10px 0;"><input type="time" name="timeto" id="timeto" value="04:00:00" class="form-control" required style="width:45%;padding:0 0 10px 0;">
				</div>
				</div>
				<div class="col-sm-2">
				<button class="btn btn-lg btn-success" style="padding:10px 25px;"><i class="fa fa-search"></i> Search</button>
				</div>
<br clear="all">
</div>
</form>


<!---------------->
<?php 
if(isset($_REQUEST["datefrom"])){
$filter_qry = " LOWER(order_bar2.waiter) = '".mysqli_escape_string(strtolower($globalwname))."' AND TIMESTAMP(order_bar2.orderdate, order_bar2.ordertime) BETWEEN TIMESTAMP('".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_escape_string($conn4as,$_REQUEST["timeto"])."') ";

$sql = select2nav("SELECT count(order_bar2.id) as ctn FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_qry." GROUP BY order_bar2.invoiceid ORDER BY order_bar2.id DESC","SELECT GROUP_CONCAT(addbar2.name) AS aggname,SUM(order_bar2.qty) AS groupqty,SUM(order_bar2.total) AS grouptotal, order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_qry." GROUP BY order_bar2.invoiceid ORDER BY order_bar2.id DESC");

$grandtotal = getGrandTotal("SELECT SUM(order_bar2.total) AS grandtotal FROM order_bar2 WHERE ".$filter_qry." ORDER BY id");

if($sql){
echo '<table class="table table-border">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Item</th>
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
echo '<td>'.$rs["aggname"].'</td>';
echo '<td>'.$rs["groupqty"].'</td>';
//echo '<td>'.$rs["orderdate"].'</td>';
//echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
echo '<td>'.$rs["vat"].'%</td>';
echo '<td>'.number_format($rs["discount"],2).'%</td>';
echo '<td>'.$sign.number_format($rs["grouptotal"],2).'</td>';
echo ($rs["ispaid"] == '1')?'<td>Paid</td>':'<td>UnPaid</td>';
echo '<td>'.$placedby.'</td>';
echo '</tr>';
if($rs["ispaid"] == '1'){
$paidtotal += $rs["grouptotal"];
}else{
$unpaidtotal += $rs["grouptotal"];
}
}	
echo '</table>';
echo '<div style="text-align:right;font-size:18px;padding:10px 10px;">';
echo '<strong>Total Paid:</strong> '.number_format($paidtotal,2).'<br>';
echo '<strong>Total Unpaid:</strong> '.number_format($unpaidtotal,2).'<br>';
echo '<strong>Grand Total:</strong> '.number_format($grandtotal,2);
echo '</div>';
										
}else{
echo '<div style="text-align:center;padding:20px;font-size:20px;">You do not have any sales record between '.date("Y-m-d h:i A",strtotime($_REQUEST["timefrom"].' '.$_REQUEST["datefrom"])).' - '.date("Y-m-d h:i A",strtotime($_REQUEST["timeto"].' '.$_REQUEST["dateto"])).'</div>';
}
}else{
echo '<div style="text-align:center;padding:20px;font-size:16px;">Click the green button above to search.</div>';
}
?>





</div>
<?php include("obar-footer.php"); ?>
<style>
table { border:1px solid #ddd; border-collapse: collapse; }
table td ,table th { border-left: 1px solid #ddd; }
table td:first-child,table th:first-child { border-left: none; }
</style>
</body>
</html>