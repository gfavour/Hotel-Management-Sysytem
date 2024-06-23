<div class="barbcsidebar">
<?php
StoreHasRoomInArray();
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
echo '<span class="gaplabel1">Date/Time:</span> '.date("d M, Y h:i");
echo '<br><span class="gaplabel1">Item Selected:</span> <span id="noitemsel">0</span>';
echo '<br><span class="gaplabel1">VAT:</span> <span id="noitemsel">'.$vat.'%</span>';
?>
<input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
<input type="hidden" name="grandtotal" value="0">
<input type="hidden" name="dvat" value="<?php echo $vat; ?>">
<input type="hidden" name="dwat" value="ordermbar3code">
<div style="margin:0; font-size:14px; text-align:left;"><span class="gaplabel1">Total: </span> # <span id="nettotal">0.00</span> </div>
<div style="margin:0; font-size:14px; color:#FF3300; text-align:left;"><span class="gaplabel1">Grand Total: </span> # <span id="grandtotal">0.00</span> </div>

<div id="sidebarform" style="margin:10px 0 0 0; padding:10px 0 0 0; border-top:#ccc dotted 2px;">
<div class="col-sm-12" style="padding:0; margin:0;">
    <div class="form-group input-group">
	<div class="col-sm-12 no-padding">
	<label>Customer Name: </label> <textarea name="barcodes" id="barcodes" style="height:1px; width:1px; border:#333 dotted 0px; background:#fff; color:#fff;"></textarea>
	</div>
      <div class="col-sm-9 no-padding" style="z-index:1000;">
	  <select name="clientid" id="clientid" required x-moz-errormessage="Select a client." class="selectpicker" data-live-search="true" onchange="showservicecharge(this.value,<?php echo $GlobalServicecharge; ?>)">
        <?php
          OptionWithRoomCustomers_RoomNoOnly();
		?>
        </select>
		</div>
		
		<div class="col-sm-3"><a href="javascript:;" id="reloadclients" class="btn btn-sm btn-default" title="reload client names" style="padding:7px 10px;"><i class="fa fa-undo"></i></a></div>
		
      </div>
  </div>  
  
 
<div class="col-sm-5" style="padding:0 5px 0 0;">
    <div class="form-group input-group"><label>Date:</label>
    <input type="text" class="form-control" placeholder="" name="barorderdate" value="<?php echo date("Y-m-d"); ?>">
    </div>
</div>  

<div class="col-sm-7">
<label>Discount(%):</label>
    <div class="form-group input-group">
    <input type="number" class="form-control" placeholder="" value="0" name="bardiscount" id="discount" onchange="calculatembar()" onkeyup="calculatembar()">
	<span class="input-group-addon styledc"<?php echo DiscountConversion4mBar(); ?>><i class="fa fa-building-o"></i></span>
    </div>
  </div>
  
<div class="col-sm-12" style="padding:0 10px 0 0;">
    <div class="form-group input-group"><label>Select Waiter:</label>
	<select name="waiter" id="waiter" class="form-control" style="width:90%;">
    <option value="" selected="selected">Select...</option>
	<?php getWaiters($_REQUEST["waiter"]); ?>
    </select>
    </div>
</div>

<div class="col-sm-12" style="padding:0 10px 0 0;display:none;" id="servicechargediv">
    <div class="form-group input-group"><label>Service Charge:</label>
	<input type="number" name="servicecharge" id="servicecharge" class="form-control" readonly value="<?php echo $GlobalServicecharge; ?>">
    </div>
	
	<div class="form-group input-group"><label>Room Service Category:<?php //echo date('H'); ?></label>
	<select name="rmitemcategory" id="rmitemcategory" class="form-control" style="width:99%;">
	<?php echo getbarRoomGuestCatOpt($_REQUEST["rmitemcategory"]); ?>
	</select>
    </div>
	
</div>

  <div class="col-sm-12" style="padding:0; margin-bottom:10px;">
    <label for="chkispaid" style="background:#f5f5f5 !important; padding:2px 8px; margin-bottom:10px; border-radius:3px; cursor:pointer;"><input type="checkbox" name="chkispaid" id="chkispaid" value="1"> Mark this order as paid</label>
    </div>
  
<button type="button" id="cmdbar" class="btn btn-warning btn-sm" style="margin-left:0px;margin-right:5px;background: #00c292;border:1px solid #00c292;">ORDER NOW</button><button type="button" id="cmdclearcart" class="btn btn-default btn-sm" style="margin-left:0;">CLEAR CART</button>
</div>

</div>