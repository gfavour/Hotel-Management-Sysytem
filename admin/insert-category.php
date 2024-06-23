<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add New Category</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addcategory" />
<!--row-->
<div class="col-sm-4">
<label>Type of Category</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="cattype" id="cattype" title="Category type" class="form-control">
<option value="" selected="selected">Select</option>
<option value="room">Room</option>
<option value="bar">Bar</option>
<option value="restaurant">Restaurant</option>
<option value="laundary">Laundary</option>
<option value="sport">Sport</option>
<option value="spa">Spa</option>
</select> 
</div>

<label>Category</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="catname" class="form-control" placeholder="Category">
</div>

</div>

<div class="col-md-12" style="margin-top:5px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>