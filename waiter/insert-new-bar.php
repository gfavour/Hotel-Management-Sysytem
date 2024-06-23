<div class="col-sm-12" style="padding-left:0; margin-bottom:10px;">
<strong style="color:#FF3300;">Note:</strong> Kindly make sure cursor is inside the barcode field before scanning.
</div>

<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addbar" />

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

<div class="col-sm-12">
<label>Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="name" id="name" class="form-control" placeholder="Item Name">
</div>
</div>


<div class="col-sm-12">
<label>Number of Item</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="instock" class="form-control" placeholder="Number of item to add">
</div>
</div>

<div class="col-sm-12">
<label>Unit Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="price" class="form-control" placeholder="Price">
</div>
</div>


<div class="col-sm-12">
<label>Quantity (Per Unit Price)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" value="1" placeholder="Quantity">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>

</div>
</div>
</div>


<div class="col-sm-6">
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">

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
<option value="Bottle">Bottle</option>
</select> 
</div>
</div>


<div class="col-sm-12">
<label>Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<textarea name="description" class="form-control" placeholder="Description"></textarea>
</div>
</div>

</div></div></div>
</form>