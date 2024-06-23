<?php include("obar-head.php"); ?>
<?php
  if (select("SELECT * FROM waiters WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('index.php?m=record not found');
  }
  
  ?>
<body style="padding-top:20px; background:#eee;background-color: #21D4FD;background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%);">
<div class="container" style="padding:0 5px;">
<h1>Change Password</h1>
<div id="msgbox"></div>
<div class="box box-primary" style="margin-top:10px;">

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process2.php" method="post">
<input type="hidden" name="dwat" value="editwaiterdetails" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidpwd" value="<?php echo $rs["password"]; ?>" />

<div class="col-sm-12">
<label>Waiter Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" readonly value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Username:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="username" class="form-control" readonly value="<?php echo $rs["username"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Password:</label> <em>(Enter new password or leave it blank)</em>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="password" name="password" class="form-control" value="" autocomplete="off">
</div>
</div>

<div class="col-sm-12">
<label>Confirm Password:</label> <em>(Enter new password or leave it blank)</em>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="password" name="cpassword" class="form-control" value="" autocomplete="off">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="home.php" class="btn btn-md btn-default">Go Back</a>
</div>
</form>
</div>
</div>

</div>
<?php include("obar-footer.php"); ?>
<style>
body{overflow:auto;}
.wrapper{background-color: #21D4FD;background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%); height:100vh; margin:0; padding:0;}
table { border:1px solid #ddd; border-collapse: collapse; }
table td ,table th { border-left: 1px solid #ddd; }
table td:first-child,table th:first-child { border-left: none; }
</style>

</body>
</html>