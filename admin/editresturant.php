<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Restaurant</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Restaurant</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addresturant WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-resturant.php?m=record not found');
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
<input type="hidden" name="dwat" value="editresturant" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-4">
<label>Food Title (Name)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Food Name" value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Food Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Food type is required">
<option value="" selected>**Select**</option>
<?php
$categoryid = $rs["categoryid"];
$qry1 = mysqli_query($conn4as,"SELECT * FROM tblcategory WHERE cattype = 'restaurant' ORDER BY catname");
while($rs1 = mysqli_fetch_assoc($qry1)){
echo ($categoryid == $rs1["id"])?'<option value="'.$rs1["id"].'" selected>'.$rs1["catname"].'</option>':'<option value="'.$rs1["id"].'">'.$rs1["catname"].'</option>';
}
?>
</select>
</div>
</div>


<div class="col-sm-4">
<label>Measurement</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<option value="">**Select**</option>
<option value="Plate" <?php echo ($rs["measure"] == 'Plate')?'selected':''; ?>>Plate</option>
<option value="Bottle" <?php echo ($rs["measure"] == 'Bottle')?'selected':''; ?>>Bottle</option>
<option value="Cup" <?php echo ($rs["measure"] == 'Cup')?'selected':''; ?>>Cup</option>
<option value="Bowl" <?php echo ($rs["measure"] == 'Bowl')?'selected':''; ?>>Bowl</option>
<option value="Unit" <?php echo ($rs["measure"] == 'Unit')?'selected':''; ?>>Unit</option>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $rs["price"]; ?>">
</div>
</div>


<div class="col-sm-4">
<label>Quantity</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $rs["quantity"]; ?>">
</div>
</div>


<div class="col-sm-4">
<label>Food Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="description" class="form-control" placeholder="Food Description" value="<?php echo $rs["description"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Food Ingredient</label>
<div class="form-group input-group">
<?php 
echo SetIngredientsChks2Edit($rs["ingredients"]);
?>
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-resturant.php" class="btn btn-default btn-md">Back to Restuarant</a>
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