<div class="barbcsidebar box" style="padding:10px 10px !important;border:#ccc solid 1px;border-top:#d1d6b7 solid 3px; margin-top:10px;background: rgb(231,237,202) !important;background: linear-gradient(0deg, rgba(231,237,202,0.5) 0%, rgba(255,255,255,0.5) 100%) !important;">
<?php
$sql= "SELECT promodiscount,minnoofroom,vat,servicecharge FROM settings";
$query = mysqli_query($conn4as,$sql);
$rss = mysqli_fetch_assoc($query);
$promodiscount = $rss['promodiscount'];
$minnoofroom = $rss['minnoofroom'];
$vat = $rss['vat'];
$GlobalServicecharge = $rss['servicecharge'];
?>
<?php
$invoiceid = time();
?>
<input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
<input type="hidden" name="grandtotal" value="0">
<input type="hidden" name="dwat" value="wordermbarcode">
<input type="hidden" name="waiter" id="waiter" value="<?php echo $globalwname; ?>">
<input type="hidden" name="dvat" value="<?php echo $vat; ?>">
<div style="width:200px;float:left;">
<span class="gaplabel1" style="width:60px;font-size:16px !important;">Item #:</span> <span id="noitemsel">0</span> <?php echo ', <span class="gaplabel1" style="width:40px;font-size:16px !important;">VAT:</span> <span id="noitemsel">'.$vat.'%</span>'; ?> <br><span><span class="gaplabel1" style="width:60px;">Total: </span> <span id="nettotal">0.00</span></span><br><span style="color:#FF3300;"><span class="gaplabel1" style="width:100px;">Grand Total: </span> <span id="grandtotal">0.00</span></span>
</div>

<div style="width:250px;float:right; text-align:right;">
<button type="button" class="btn btn-default btn-lg" style="width:60px;" title="Back to dashboard" onclick="window.location.href='home.php'"><i class="fa fa-arrow-left"></i></button>
<button type="button" id="cmdclearcart" class="btn btn-default btn-lg" style="width:60px;margin-left:10px;" title="Clear cart.."><i class="fa fa-trash"></i></button>
<button type="button" class="btn btn-default btn-lg" style="width:60px;margin-left:10px;background:#00CC00;color:#fff;" title="Process to order.." id="caretme"><i class="fa fa-caret-down"></i></button>
</div>
<br clear="all" />
</div>


<div id="sidebarform" class="box" style=" padding:20px;margin:5px 0 0 0;display:none;border:#ccc solid 1px;border-top:#ccc solid 4px; margin-top:10px;background: rgb(238,238,238);
background: linear-gradient(0deg, rgba(238,238,238,1) 0%, rgba(255,255,255,1) 67%);">

    <div class="form-group input-group"><label>Customer Name: </label><textarea name="barcodes" id="barcodes" style="height:1px; width:1px; border:#333 dotted 0px; background:#fff; color:#fff;"></textarea><br />
	
      <div style="padding:0; z-index:1000; width:300px; float:left;">
	  <select name="clientid" id="clientid" required x-moz-errormessage="Select a client." class="selectpicker" data-live-search="true" onchange="showservicecharge(this.value,<?php echo $GlobalServicecharge; ?>)">
        <?php
          OptionWithRoomCustomers_RoomNoOnly();
		?>
        </select>
		</div><div style="padding:0; margin-left:10px; width:80px; float:left;"><a href="javascript:;" id="reloadclients" class="btn btn-sm btn-default" title="reload client names" style="padding:7px 10px;"><i class="fa fa-undo"></i></a></div>
		
      </div>
  
 
<div style="padding:0; margin-right:10px; width:200px;float:left;">
    <div class="form-group input-group"><label>Date:</label>
    <input type="text" class="form-control" placeholder="" name="barorderdate" value="<?php echo date("Y-m-d"); ?>">
    </div>
</div>  

<div style="padding:0; width:150px; margin-right:10px; float:left;">
<label>Discount(%):</label>
    <div class="form-group input-group">
    <input type="number" class="form-control" placeholder="" value="0" name="bardiscount" id="discount" onchange="calculatembar()" onkeyup="calculatembar()">
	<span class="input-group-addon styledc"<?php echo DiscountConversion4mBar(); ?>><i class="fa fa-building-o"></i></span>
    </div>
</div>
  
<div style="padding:0; width:150px;float:left;display:none;" id="servicechargediv">
    <div class="form-group input-group"><label>Service Charge:</label>
	<input type="number" name="servicecharge" id="servicecharge" class="form-control" readonly value="<?php echo $GlobalServicecharge; ?>">
    </div>
</div>

<br clear="all">
<div class="col-sm-12" style="padding:0; margin:0px; text-align:right;"> 
<label for="chkispaid" style="background:#eee !important; padding:10px 10px; margin:0 10px 0 0; border-radius:3px; cursor:pointer; display:none;"><input type="checkbox" name="chkispaid" id="chkispaid" value="1" style="margin:0;"> Mark this order as paid</label>
<button type="button" id="cmdbar" class="btn btn-warning btn-lg" style="margin-left:0px;margin-right:5px;background: #0c0;border:1px solid #0c0;">ORDER NOW</button>

</div>
<br clear="all">
</div>
