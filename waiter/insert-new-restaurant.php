<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">New Restaurant</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addresturant" />
<!--row-->

<div class="col-sm-4">
<label>Food Title (Name)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Food Name">
</div>
</div>

<div class="col-sm-4">
<label>Food Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Room type is required">
<option value="" selected>**Select**</option>
<?php
$sql = select("SELECT * FROM tblcategory WHERE cattype = 'restaurant' ORDER BY catname");
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
<label>Measurement</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<option value="">**Select**</option>
<option value="Plate">Plate</option>
<option value="Bottle">Bottle</option>
<option value="Cup">Cup</option>
<option value="Bowl">Bowl</option>
<option value="Unit">Unit</option>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="price" class="form-control" placeholder="Price">
</div>
</div>


<div class="col-sm-4">
<label>Quantity</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" placeholder="Quantity">
</div>
</div>


<div class="col-sm-12">
<label>Food Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<textarea name="description" class="form-control" placeholder="Food Description"></textarea>
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>