<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Sport</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sport</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addsport WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-sport.php?m=record not found');
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
<input type="hidden" name="dwat" value="editsport" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />


<div class="col-sm-4">
<label>Item Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Item Name" value="<?php echo $rs["name"]; ?>">
</div>
</div>


<div class="col-sm-4">
<label>Item For</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<option value="Sale" <?php echo ($rs["measure"] == 'Sale')?'selected':''; ?>>Sale</option>
<option value="Rent" <?php echo ($rs["measure"] == 'Rent')?'selected':''; ?>>Rent</option>
<option value="Free" <?php echo ($rs["measure"] == 'Free')?'selected':''; ?>>Free Gift</option>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>Unit (Per Price)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $rs["quantity"]; ?>">
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
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-sport.php">Back to Manage Sport</a>
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