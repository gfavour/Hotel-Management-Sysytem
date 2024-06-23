<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Staff</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staff</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM users WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-staff.php?m=record not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
		<div class="box box-primary" style="margin-top:10px;" id="jqdiv1">
<div class="box-header">

</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="editusers" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidfile1" value="<?php echo $rs["photo"]; ?>" />
<input type="hidden" name="hidpwd" value="<?php echo $rs["password"]; ?>" />

<div class="col-sm-4">
<label>Username</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $rs["username"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Lastname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $rs["lastname"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Firstname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $rs["firstname"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>New Password</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="password" name="password" class="form-control" placeholder="Password" value="">
</div>
</div>

<div class="col-sm-4">
<label>Email</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $rs["email"]; ?>">
</div>
</div>


<div class="col-sm-4">
<label>Choose Users Role</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="usersrole" id="role" class="form-control">
<option value="">Choose Users Role</option>
<?php if($globalrole == 'admin'){ ?>
<option value="admin" <?php echo ($rs["users_role"] == 'admin')?'selected':'';?>>Administrator</option>
<?php } ?>
<option value="manager" <?php echo ($rs["users_role"] == 'manager')?'selected':'';?>>Manager</option>
<option value="store" <?php echo ($rs["users_role"] == 'store')?'selected':'';?>>Store Manager</option>
<option value="receptionist" <?php echo ($rs["users_role"] == 'receptionist')?'selected':'';?>>Receptionist</option>
<!--<option value="staff">Staff</option>-->
<option value="bar" <?php echo ($rs["users_role"] == 'bar')?'selected':'';?>>Bar 1</option>
<option value="bar2" <?php echo ($rs["users_role"] == 'bar2')?'selected':'';?>>Bar 2</option>
<option value="bar3" <?php echo ($rs["users_role"] == 'bar3')?'selected':'';?>>Bar 3</option>
<option value="restaurant" <?php echo ($rs["users_role"] == 'restaurant')?'selected':'';?>>Restaurant</option>
<option value="laundary" <?php echo ($rs["users_role"] == 'laundary')?'selected':'';?>>Laundary</option>
<option value="sport" <?php echo ($rs["users_role"] == 'sport')?'selected':'';?>>Sport</option>
<option value="spa" <?php echo ($rs["users_role"] == 'spa')?'selected':'';?>>Spa</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Staff Salary</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="salary" class="form-control" placeholder="Staff Salary" value="<?php echo $rs["staff_salary"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Staff Hiring Date</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="hiredate" class="form-control" placeholder="Staff_Hiring_Date" value="<?php echo $rs["staff_hiring_date"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Photo</label>
<div class="form-group input-group">
<input type="file" name="file1">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<a href="manage-staff.php" class="btn btn-default btn-sm" style="margin-right:10px;">Back to Manage Staff</a><button class="btn btn-warning btn-sm">Update</button>
</div>
</form>
</div>
</div>

		</div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>