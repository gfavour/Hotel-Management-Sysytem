<div class="col-sm-12" style="padding-left:0; margin-bottom:10px;">
<strong style="color:#FF3300;">Note:</strong> Kindly make sure cursor is inside the barcode field before scanning.
</div>

<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="add2store" />
<!--<input type="hidden" name="itemnewname" id="itemnewname" value="" />-->
<input type="hidden" name="costprice" class="form-control" placeholder="Cost Price" value="0">
<input type="hidden" name="price" class="form-control" placeholder="Selling Price" value="0">
<input type="hidden" name="quantity" value="1" placeholder="Quantity">
<input type="hidden" name="description" placeholder="Description" value="">

<div class="col-sm-6" style="padding-left:0;">
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">

<div class="col-sm-10">
<label>Barcode:</label>
<div class="form-group input-group" style="border:#f00 solid 2px;">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="text" name="barcode" id="barcode" class="form-control" />
<!--
<textarea name="barcode" id="barcode" class="form-control" rows="1"></textarea>
-->
</div>
</div>

<div class="col-sm-12">(if item name not found, click this toggle button to <a href="javascript:;" class="label label-info" id="tItemByObjs"><i class="fa fa-plus"></i> Add New Name</a>)</div>
 
<div class="col-sm-12" id="itemnamebydd" style="margin-top:8px;">
<label>Item Name</label>
<div class="form-group input-group">
<select name="name" id="name" class="selectpicker" data-live-search="true">
<option value="" selected="selected"></option>
<?php 
echo getBarsItemsWithValues($_REQUEST["name"]);
?>
</select>
</div>
</div>

<div class="col-sm-12" id="itemnamebytxt" style="display:none;margin-top:8px;">
<label>Item Name</label><!-- (Click this button to <a href="javascript:;" class="label label-info" id="tItemByObjs2"><i class="fa fa-arrow-up"></i> Select Existing Item Name</a>)-->
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="itemnewname" id="itemnewname" class="form-control" placeholder="Enter Item Name">
</div>
</div>


<div class="col-sm-12">
<label>Quantity of Item</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="itemqty" class="form-control" placeholder="Number of item to add">
</div>
</div>

<!--<div class="col-sm-12">
<label>Cost Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

</div>
</div>

<div class="col-sm-12">
<label>Selling Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

</div>
</div>-->

<div class="col-sm-12">
<label>Item Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Room type is required">
<?php
$sql = select("SELECT * FROM tblcategory WHERE cattype = 'bar' ORDER BY catname");
if ($sql){
while($rs = mysqli_fetch_assoc($qry)){
echo '<option value="'.$rs["id"].'">'.$rs["catname"].'</option>';
}
}
?>
</select>
</div>
</div>


<div class="col-sm-12">
<label>Measurement</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<?php echo getBarMeasureOptions($rs["measure"]); ?>
</select> 
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<a href="store.php" class="btn btn-default btn-md">BACK TO STORE</a>
<button class="btn btn-warning btn-md" style="margin-left:10px;"><i class="fa fa-send"></i> ADD TO STORE</button>
</div>

</div>
</div>
</div>

</form>