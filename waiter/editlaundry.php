<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Laundry</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Laundry</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addlaundary WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-laundry.php?m=record not found');
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
<input type="hidden" name="dwat" value="editlaundary" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-4">
<label>Title</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="title" class="form-control" placeholder="Service Title" value="<?php echo $rs["title"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $rs["price"]; ?>">
</div>
</div>


<div class="col-sm-12">
<label>Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<textarea name="description" class="form-control" placeholder="Description"><?php echo $rs["description"]; ?></textarea>
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-laundry.php">Back to Manage Laundry</a>
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