<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add New Room</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addroom" />
<!--row-->
<div class="col-sm-4">
<label>Room Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="roomtype" class="form-control" placeholder="Room Number" required title="Room nmber is required">
</div>
</div>

<div class="col-sm-4">
<label>Room Card Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="rcardno" class="form-control" placeholder="Room Card Number" required title="Room card number is required">
</div>
</div>

<div class="col-sm-4">
<label>Room Lock Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="rlockno" class="form-control" placeholder="Room Lock Number" required title="Room lock number is required">
</div>
</div>

<div class="col-sm-4">
<label>Room Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Room type is required">
<option value="" selected>**Select**</option>
<?php
$sql = select("SELECT * FROM tblcategory WHERE cattype = 'room' ORDER BY catname");
if ($sql){
while($rs = mysqli_fetch_assoc($qry)){
echo '<option value="'.$rs["id"].'">'.$rs["catname"].'</option>';
}
}
?>
</select>
</div>
</div>


<div class="col-sm-4">
<label>Rate (per night)</label>
<div class="form-group input-group">
<span class="input-group-addon">&#8358;</span>
<input type="text" name="roomrate" class="form-control" placeholder="0.00" required title="Rate is required">
</div>
</div>

<input type="hidden" name="quantity" class="form-control" value="1" placeholder="e.g 1,2,3...">
<!--
<div class="col-sm-4">
<label>Quantity</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>

</div>
</div>
-->

<!--row-->
<div class="col-sm-4">
<label>Adult Per Room</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-users"></i></span>
<select name="maxadult" id="maxadult" title="Ensure you enter the Maximum Number of Adult per Room" class=" form-control" required x-moz-errormessage="You must ensure you enter the Maximum Number of Adult per Room.">
<option value="0">**Select**</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>
</div>

<div class="col-sm-4">
<label>Children Per Room</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-users"></i></span>
<select name="maxchild" id="maxchild" title="Ensure you enter the Maximum Number of children per Room" class=" form-control" required x-moz-errormessage="You must ensure you enter the Maximum Number of Adult per Room.">
<option value="0">**Select**</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>
</div>

<div class="col-md-12">
<label>Room Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comments"></i></span>
<textarea class=" form-control" name="roomDescription" Placeholder="e.g: Air Conditioned, Tv, Wireless Network etc."></textarea>  
</div>  
</div> 
		
<!--Images-->	
<fieldset class="col-md-12"><legend>Attach Picture(s)</legend>
<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">01</span>
<input type="file" class="form-control" name="ufile1">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">02</span>
<input type="file" class="form-control" name="ufile2" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">03</span>
<input type="file" class="form-control" name="ufile3">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">04</span>
<input type="file" class="form-control" name="ufile4" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">05</span>
<input type="file" class="form-control" name="ufile5" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">06</span>
<input type="file" class="form-control" name="ufile6" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">07</span>
<input type="file" class="form-control" name="ufile7" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">08</span>
<input type="file" class="form-control" name="ufile8" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">09</span>
<input type="file" class="form-control" name="ufile9" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">10</span>
<input type="file" class="form-control" name="ufile10" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">11</span>
<input type="file" class="form-control" name="ufile11" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon">12</span>
<input type="file" class="form-control" name="ufile12" placeholder="">
</div>
</div>
</fieldset>

<!--Facilities-->	
<fieldset class="col-md-12"><legend>Room Facilities</legend>
<p><strong>NOTE:</strong> Ensure you select appropriately according to the room facilities attributed to a room type.</p>
<?php
if (select("select * from addroomfacility order by name")){
while($rs = mysqli_fetch_assoc($qry)){
?>
<div class="col-md-3">
<div id="image_container"> 
<label><input type="checkbox" name="facility[]" style="margin-top:10px; margin-left:-10px;" value="<?php echo $rs["id"]; ?>" ><i> </i><small style="font-size:13px; padding-left:8px;"><?php echo ucwords($rs["name"]); ?></small></label>
</div>
</div>
<?php
}
}else{
echo 'No facility found. Click "<strong>Add Room Facility</strong>" button to add new facilities.';
}
?>
</fieldset>
<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Submit</button>
</div>
</form>
</div>
</div>