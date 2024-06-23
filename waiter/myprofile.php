<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>My Profile</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM users WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
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
<input type="hidden" name="dwat" value="editprofile" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidfile1" value="<?php echo $rs["photo"]; ?>" />
<input type="hidden" name="hidpwd" value="<?php echo $rs["password"]; ?>" />

<div class="col-sm-3">
<label>Username</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $rs["username"]; ?>">
</div>
</div>

<div class="col-sm-3">
<label>Lastname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $rs["lastname"]; ?>">
</div>
</div>

<div class="col-sm-3">
<label>Firstname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $rs["firstname"]; ?>">
</div>
</div>

<div class="col-sm-3">
<label>Password</label>
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
<label>Photo</label>
<div class="form-group input-group">
<input type="file" name="file1">
</div>
</div>


<div class="col-md-11" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button>
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