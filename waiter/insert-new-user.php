<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">New User</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="users" />

<div class="col-sm-4">
<label>Username</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username">
</div>
</div>

<div class="col-sm-4">
<label>Last Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name">
</div>
</div>


<div class="col-sm-4">
<label>First Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name">
</div>
</div>

<div class="col-sm-4">
<label>Password</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="password" name="password" class="form-control" placeholder="Password">
</div>
</div>

<div class="col-sm-4">
<label>Email</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="email" name="email" class="form-control" placeholder="Email">
</div>
</div>

<div class="col-sm-4">
<label>Choose Users Role</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="usersrole" id="role" class="form-control">
<option value="">Choose Users Role</option>
<?php if($globalrole == 'admin'){ ?>
<option value="admin">Administrator</option>
<?php } ?>
<option value="manager">Manager</option>
<option value="receptionist">Receptionist</option>
<!--<option value="staff">Staff</option>-->
<option value="bar">Bar (Lounge)</option>
<option value="bar2">Bar 2 (Swimming Pool Bar)</option>
<option value="restaurant">Restaurant</option>
<option value="laundary">Laundary</option>
<option value="sport">Sport</option>
<option value="spa">Spa</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Staff Salary</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-money-o"></i></span>
<input type="text" name="salary" class="form-control" placeholder="Staff Salary">
</div>
</div>

<div class="col-sm-4">
<label>Staff Hiring Date</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="text" name="hire_date" class="form-control" placeholder="Hiring Date">
</div>
</div>


<div class="col-sm-4">
<label>Photo</label>
<div class="form-group input-group">
<input type="file" name="file1">
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>