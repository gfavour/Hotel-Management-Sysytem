<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Waiter/Waitress Details</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Waiter/Waitress Details</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
  <?php
  if (select("SELECT * FROM waiters WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('waiters.php?m=record not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
<div class="box box-primary" style="margin-top:10px;" id="jqdiv1x">

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="editwaiter" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidpwd" value="<?php echo $rs["password"]; ?>" />
<input type="hidden" name="hidname" value="<?php echo $rs["name"]; ?>" />

<div class="col-sm-12">
<label>Waiter Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Waiter Name/Number" value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Username:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username:" value="<?php echo $rs["username"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Password:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="password" class="form-control" placeholder="Password:" value="" autocomplete="off" onfocus="this.type='text';" onblur="this.type='password';">
</div>
</div>

<div class="col-sm-12">
<label>Set Permission:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="usagepermit" class="form-control">
<?php
echo getWaiterPermitOpt($rs["usagepermit"]);
?>
</select>
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="waiters.php" class="btn btn-md btn-default">Go Back</a>
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