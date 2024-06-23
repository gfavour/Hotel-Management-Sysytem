<?php include("obar3-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar3-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar3-menus.php"); ?>
    <!-- Start Status area -->
<div class="notika-status-area" style="padding:0px;">
<div class="container" style="padding:0px;">
<div class="row" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="msgbox"></div>

<div class="box box-primary">
<div class="box-header with-border"><h3 style="margin:0;">Update Profile</h3></div>
<div class="box-body table-responsive no-padding" style="margin-top:10px;">
<div class="col-sm-6" style="padding:0 0 20px 0;">

  <?php
  if (select("SELECT * FROM users WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('../index.php?m=record not found');
  }
  ?>
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="editprofile" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidfile1" value="<?php echo $rs["photo"]; ?>" />
<input type="hidden" name="hidpwd" value="<?php echo $rs["password"]; ?>" />

<div class="col-sm-6">
<label>Username</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $rs["username"]; ?>">
</div>
</div>

<div class="col-sm-6">
<label>Lastname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $rs["lastname"]; ?>">
</div>
</div>

<div class="col-sm-6">
<label>Firstname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $rs["firstname"]; ?>">
</div>
</div>

<div class="col-sm-6">
<label>Password</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="password" name="password" class="form-control" placeholder="Password" value="">
</div>
</div>

<div class="col-sm-6">
<label>Email</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $rs["email"]; ?>">
</div>
</div>


<div class="col-sm-6">
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

<div>
</div>
			
</div>
</div>
		 
		 
		 </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar3-footer.php"); ?>
</body>
</html>