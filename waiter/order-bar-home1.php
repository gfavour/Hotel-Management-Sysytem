<?php include_once 'inc/head.php'; ?>
<?php //include_once 'inc/header.php'; ?>
<?php //include_once 'inc/sidebar.php'; ?>
<style>
body{ padding:0; margin:0;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#8fe81b+0,39f9a9+100 */
background: rgb(143,232,27); /* Old browsers */
background: -moz-linear-gradient(top, rgba(143,232,27,1) 0%, rgba(57,249,169,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(143,232,27,1) 0%,rgba(57,249,169,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(143,232,27,1) 0%,rgba(57,249,169,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fe81b', endColorstr='#39f9a9',GradientType=0 ); /* IE6-9 */}
span.gaplabel1{ display:inline-block !important;width:100px !important; font-weight:bold; line-height:20px;}
.itemlabel{width:220px;border:#ddd solid 1px;border-radius:5px;padding:10px 10px;margin:10px 10px 10px 0; border:#ffc solid 1px;
background: rgb(255,255,242);
background: -moz-linear-gradient(top, rgb(255,255,242) 0%, rgb(252,245,191) 100%);
background: -webkit-linear-gradient(top, rgb(255,255,242) 0%,rgb(252,245,191) 100%);
background: linear-gradient(to bottom, rgb(255,255,242) 0%,rgb(252,245,191) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fffff2', endColorstr='#fcf5bf',GradientType=0 );
}
.isselected{
background: rgb(255,244,163);
background: -moz-linear-gradient(top, rgb(255,244,163) 0%, rgb(247,219,64) 100%);
background: -webkit-linear-gradient(top, rgb(255,244,163) 0%,rgb(247,219,64) 100%);
background: linear-gradient(to bottom, rgb(255,244,163) 0%,rgb(247,219,64) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff4a3', endColorstr='#f7db40',GradientType=0 );

/*background: rgb(255,224,249);
background: -moz-linear-gradient(top, rgb(255,224,249) 0%, rgb(249,164,218) 100%);
background: -webkit-linear-gradient(top, rgb(255,224,249) 0%,rgb(249,164,218) 100%);
background: linear-gradient(to bottom, rgb(255,224,249) 0%,rgb(249,164,218) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffe0f9', endColorstr='#f9a4da',GradientType=0 );
*/
}
.barbcsidebar{height:100vh !important; background:#fff !important; padding:20px 30px 20px 20px !important;}
</style>

<div class="row" style="padding:0px;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<div class="col-sm-9">
<div class="col-sm-12" style="padding:20px 20px;"> 
<h1 style="border-bottom:4px solid #333; margin:0 0 10px 0; width:220px;">Bar Items</h1>   
<div id="msgbox"></div>

  <div>              
  <?php
  $sql = "SELECT * FROM addbar ORDER BY name";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  while($rs = mysqli_fetch_assoc($qry)){ //width:235px;
  echo '<label for="barcheck-'.$rs["id"].'" id="'.$rs["barcode"].'" class="col-sm-2 itemlabel">';
  echo '<input type="checkbox" id="barcheck-'.$rs["id"].'" name="barcheck[]" value="'.$rs["id"].'" style="position:absolute; width:0px; height:0px;" onclick="calculatembar()">';
  echo '<div style="text-align:center; font-size:20px;">'.$rs["name"].'</div>';
  //echo '<div style="margin:0 0 10px 0;"></div>';
  echo '<div style="margin:0 0 10px 0;"><strong>Item Left:</strong> <span class="pull-right">'.$rs["itemleft"].'</span></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Quantity:</strong> <input type="number" name="barquantity'.$rs["id"].'" id="barquantity'.$rs["id"].'" value="1" class="pull-right" onchange="calculatembar()" onkeyup="calculatembar()" style="width:80px;padding-left:5px;"></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Unit Price:</strong> <input type="number" readonly name="barprice'.$rs["id"].'" id="barprice'.$rs["id"].'" value="'.$rs["price"].'" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '<div style="margin:0 0 0 0;"><strong>Total:</strong> <input type="number" name="bartotal'.$rs["id"].'" id="bartotal'.$rs["id"].'" readonly value="" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '</label>';
  }
  }
  ?>						 
  </div>
  
</div>
</div>
  
  
<div class="col-sm-3 barbcsidebar">
<?php
$sql= "SELECT promodiscount,minnoofroom,vat FROM settings";
$query = mysqli_query($conn4as,$sql);
$rss = mysqli_fetch_assoc($query);
$promodiscount = $rss['promodiscount'];
$minnoofroom = $rss['minnoofroom'];
$vat = $rss['vat'];
?>
<?php
$invoiceid = time();
echo '<span class="gaplabel1">Invoice ID:</span> '.$invoiceid;
echo '<br><span class="gaplabel1">Date/Time:</span> '.date("d M, Y h:i A");
?>
<input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
<input type="hidden" name="grandtotal" value="0">
<input type="hidden" name="dwat" value="ordermbar">
<div style="margin:5px 0; font-size:14px; color:#FF3300; text-align:left;"><span class="gaplabel1">Grand Total: </span> # <span id="grandtotal">0.00</span> </div>

<textarea name="barcodes" id="barcodes" style="height:1px; width:100%; border:#333 dotted 0px; background:#fff; color:#fff;"></textarea>

<div id="sidebarform" style="margin:10px 0; padding:0px 0; border-top:#ccc dotted 0px;">
<div class="col-sm-12" style="padding:0;">
    <div class="form-group input-group"><label>Client Name:</label>
	 
      <select name="clientid" id="clientid" title="client" class="form-control"  x-moz-errormessage="Select a client.">
        <?php
          OptionWithRoomCustomers();
		?>
        </select>
      </div>
  </div>
  
<div class="col-sm-5" style="padding:0 10px 0 0;">
    <div class="form-group input-group"><label>Discount (%):</label>
    <input type="text" class="form-control" placeholder="" value="0" name="bardiscount" id="discount" onchange="calculatembar()" onkeyup="calculatembar()">
    </div>
  </div>
  
<div class="col-sm-5" style="padding:0;">
    <div class="form-group input-group"><label>Date:</label>
    <input type="text" class="form-control" placeholder="" name="barorderdate" value="<?php echo date("m/d/Y"); ?>">
    </div>
  </div>
  
<button type="button" onclick="this.submit;" class="btn btn-warning btn-md" style="margin-left:0;"><i class="fa fa-send"></i> Order Now</button>

</div>

</div>

</form>
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
getDiscount(document.frm1.noofroom.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>');
getCheckInOutInterval();
</script>
<script src="../fxn/barcode-order.js"></script>