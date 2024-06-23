<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add New Cab</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addcab" />

<div class="col-sm-4">
<label>Last Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name">
</div>
</div>

<div class="col-sm-4">
<label>First Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name">
</div>
</div>

<div class="col-sm-4">
<label>Car Plate Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="carno" class="form-control" placeholder="Car Plate Number">
</div>
</div>

<!--row-->
<div class="col-sm-4">
<label>Email Address</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email Address">
</div>
</div>

<div class="col-sm-4">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone Number">
</div>
</div>


<div class="col-md-4">
<label>Address:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="address" placeholder="Address">  
</div>  
</div> 


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>