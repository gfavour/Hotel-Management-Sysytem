<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Table Name/Number</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Table Name/Number</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-5">
  <?php
  if (select("SELECT * FROM tablenos WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-tablenos.php?m=record not found');
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
<input type="hidden" name="dwat" value="edittableno" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-12">
<label>Table Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Table Name/Number" value="<?php echo $rs["name"]; ?>">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-tablenos.php">Go Back</a>
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