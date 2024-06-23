<?php include_once 'inc/head.php'; ?>
<?php //include_once 'reporthead.php'; ?>
<?php 
loadStaff2Array(); 
$dfrom = $_REQUEST["dfrom"];
$dto = $_REQUEST["dto"];
?>
<div style="text-align:left;">

<?php
echo '<h3 style="text-decoration:underline;margin:0 auto 20px auto;width:50%; text-align:center;">Expenses On Cab Between '.$dfrom.' To '.$dto.'</h3>'; 
if(isset($_REQUEST["dfrom"])){
$sql = select("SELECT paycab.*,addcab.carno,addcab.lastname,addcab.firstname,addcab.phone FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id WHERE (paycab.payrealdate BETWEEN '".$_GET["dfrom"]."' AND '".$_GET["dto"]."') ORDER BY paycab.id DESC");
$grandtotal = getGrandTotal("SELECT SUM(paycab.amount) AS grandtotal FROM paycab WHERE (payrealdate BETWEEN '".$_GET["dfrom"]."' AND '".$_GET["dto"]."') ORDER BY id");
}else{
$sql = select("SELECT paycab.*,addcab.carno,addcab.lastname,addcab.firstname,addcab.phone FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id ORDER BY paycab.id DESC");
$grandtotal = getGrandTotal("SELECT SUM(paycab.amount) AS grandtotal FROM paycab ORDER BY id");
}

if($sql){
echo '<table class="table table-border">
						<tr>
					  <th>SN</th>
                      <th>Car Number</th>
					  <th>Name</th>
                      <th>Phone No.</th>
                      <th>Amount Paid</th>
					  <th>Date/Time</th>
					  <th>Staff</th>
                    </tr>';
						
while($rs = mysqli_fetch_assoc($qry)){
if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = 'N/A'; }
if($rs["staffid"] != ''){ $placedby = $allstaffs[$rs["staffid"]]; }else{ $placeby = 'N/A';}
//if($rs["staffid"] != ''){ $placedby = $allstaffs[$rs["staffid"]]; }else{$placedby = $rs["waiter"];}

echo '<tr>';
echo '<td>'.++$c.'</td>';
echo '<td>'.$rs["carno"].'</td>';
echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
echo '<td>'.$phone.'</td>';
echo '<td>'.$rs["amount"].'</td>';
echo '<td>'.date("Y-m-d h:i A",$rs["paydate"]).'</td>';
echo '<td>'.$placedby.'</td>';
echo '</tr>';
}	
echo '</table>';
echo '<div style="text-align:right;font-size:18px;padding:10px 10px;"><strong>Grand Total:</strong> '.number_format($grandtotal,2).'</div>';
										
}else{
echo '<div style="text-align:center;padding:20px;font-size:20px;">No record found.</div>';
}


?>
</div>
<?php //include("obar-footer.php"); ?>
<style>
body{background:#fff; margin:10px;}
</style>
<script>window.print();</script>