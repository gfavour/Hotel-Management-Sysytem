<?php include("ores-head.php"); ?>
<body>
<?php
loadWaiters2Array();
loadStaff2Array();

$nowdate = $_REQUEST["datefrom"];
$nextdate = $_REQUEST["dateto"];
if($_REQUEST["waiter"] != ''){ $waiter = ucwords(strtolower($_REQUEST["waiter"])); $sqlwaiter = $_REQUEST["waiter"]; }else{ $waiter = 'Waiters'; $sqlwaiter = ''; }
$rptdate = $waiter." Sales Report Between ".date("Y-m-d h:i A",strtotime($_REQUEST["timefrom"].' '.$_REQUEST["datefrom"])).' - '.date("Y-m-d h:i A",strtotime($_REQUEST["timeto"].' '.$_REQUEST["dateto"]));

?>
<div style="text-align:left;">

  <?php
  echo '<h3 style="text-decoration:underline;margin:0 auto 20px auto;width:50%; text-align:center;">'.$rptdate.'</h3>'; 
if(isset($_REQUEST["datefrom"])){
if($sqlwaiter != ''){ $sqlw = " LOWER(order_restaurant.waiter) = '".mysqli_real_escape_string($conn4as,strtolower($sqlwaiter))."' AND "; }else{ $sqlw = ""; }
$filter_qry = $sqlw." TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";

$sql = select("SELECT GROUP_CONCAT(addresturant.name) AS aggname,SUM(order_restaurant.qty) AS groupqty,SUM(order_restaurant.total) AS grouptotal, order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_qry." GROUP BY order_restaurant.invoiceid ORDER BY order_restaurant.id DESC");

$grandtotal = getGrandTotal("SELECT SUM(order_restaurant.total) AS grandtotal FROM order_restaurant WHERE ".$filter_qry." ORDER BY id");

if($sql){
echo '<table class="table table-border">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Product Name</th>
						  <th>Date/Time</th>
						  <th>Qty.</th>
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
echo '<td>'.$rs["orderdate"].' '.hr24to12($rs["ordertime"]).'</td>';
echo '<td>'.$rs["groupqty"].'</td>';
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
//echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.number_format($grandtotal,2).'</div>';
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
</div>
<?php //include("obar-footer.php"); ?>
<style>
body{background:#fff; margin:10px;}
</style>
<script>window.print();</script>
</body>
</html>