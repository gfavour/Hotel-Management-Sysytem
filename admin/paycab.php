<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Pay Cab</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pay Cab</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addcab WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-cabs.php?m=Cab details not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
		<div class="box box-primary" style="margin-top:10px;" id="jqdiv1">
<div class="box-header">

<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="paycab" />
<input type="hidden" name="cabid" value="<?php echo $rs["id"]; ?>" />

<div class="col-md-12">
<label>Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="lastname" readonly class="form-control" placeholder="Name" value="<?php echo $rs["lastname"].' '.$rs["firstname"]; ?>">
</div>
</div>

<div class="col-md-12">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" readonly class="form-control" placeholder="Phone Number" value="<?php echo $rs["phone"]; ?>">
</div>
</div>

<div class="col-md-12">
<label>Car Plate Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" readonly name="carno" placeholder="Car Plate Number" value="<?php echo $rs["carno"]; ?>">  
</div>  
</div>


<div class="col-md-12">
<label>Amount:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="amount" placeholder="Amount" value="">  
</div>  
</div> 

<div class="col-md-12" style="margin-top:10px;">
<a href="manage-cabs.php" class="btn btn-md btn-default">Go Back</a> <button class="btn btn-warning btn-md" style="margin-left:10px;">Pay Now</button> 
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