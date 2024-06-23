<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv2">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add Room Facility</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">

<form name="frm2" id="frm2" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="addroomfacility" />
<!--row-->
<div class="col-sm-8">
<label>Name of Facility:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" required title="Name of facility is required"> 
</div>
</div>

<div class="col-md-12">
<em>(To add multiple room facility at a time, seperate each by comma)</em>
<input type="hidden" name="description" value="">  
</div>  

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Submit</button>
<a href="manage-room-facilities.php" style="text-decoration:underline;">Manage Room Facilities</a>
</div>

</form>
</div>
</div>