<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Withdraw Fund</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Withdraw Fund</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-6">
  <?php
  if (select("SELECT * FROM addclient WHERE id = ".mysqli_escape_string($conn4as,$_GET["clientid"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-ewallet.php?m=record not found');
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
<input type="hidden" name="dwat" value="doWithdraw" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />


<div class="col-sm-12">
<label>Lastname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="lastname" class="form-control" readonly value="<?php echo strtoupper($rs["lastname"]); ?>">
</div>
</div>

<div class="col-sm-12">
<label>Firstname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="firstname" class="form-control" readonly placeholder="firstname" value="<?php echo strtoupper($rs["firstname"]); ?>">
</div>
</div>


<div class="col-sm-12">
<label>Amount to Withdraw</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="amount" class="form-control" placeholder="Amount" value="">
<input type="hidden" name="hidamount" value="<?php echo $rs["amount"]; ?>">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<a href="manage-ewallet.php" class="btn btn-default btn-md">Back to e-Wallet</a>
<button class="btn btn-warning btn-md" style="margin-left:10px;">Withdraw</button>
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