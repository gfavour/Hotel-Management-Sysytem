<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Bar</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar</li>
          </ol>
        </section>

<?php
  if (select("SELECT * FROM addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-bar2.php?m=record not found');
  }  
  ?>
<section class="content">
<div style="padding-left:0; margin-bottom:10px;">
<strong style="color:#FF3300;">Note:</strong> Kindly make sure cursor is inside the barcode field before scanning.
</div>
<div id="msgbox"></div>
<div class="col-sm-12" style="padding-left:0;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="editbar2" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidqty" value="<?php echo $rs["instock"]; ?>" />
<input type="hidden" name="instock" class="form-control" placeholder="In Stock" value="<?php echo $rs["instock"]; ?>">

<div class="col-sm-6" style="padding-left:0;">
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">

<div class="col-sm-10">
<label>Barcode:</label>
<div class="form-group input-group" style="border:#f00 solid 2px;">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<input type="text" name="barcode" id="barcode" class="form-control" value="<?php echo $rs["barcode"]; ?>" />
</div>
</div>

<div class="col-sm-12">
<label>Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
<input type="text" name="name" id="name" class="form-control" placeholder="Item Name" value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Cost Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="costprice" class="form-control" placeholder="Cost Price" value="<?php echo $rs["costprice"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Selling Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $rs["price"]; ?>">
</div>
</div>


<div class="col-sm-12">
<label>Quantity (per selling price)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $rs["quantity"]; ?>">
</div>
</div>


<div class="col-sm-12">
<label>Item Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Item type is required">
<option value="" selected>**Select**</option>
<?php
$categoryid = $rs["categoryid"];
$qry1 = mysqli_query($conn4as,"SELECT * FROM tblcategory WHERE cattype = 'bar' ORDER BY catname");
while($rs1 = mysqli_fetch_assoc($qry1)){
echo ($categoryid == $rs1["id"])?'<option value="'.$rs1["id"].'" selected>'.$rs1["catname"].'</option>':'<option value="'.$rs1["id"].'">'.$rs1["catname"].'</option>';
}
?>
</select>
</div>
</div>


<div class="col-md-12" style="margin-top:20px;">
<a href="manage-bar2.php" class="btn btn-sm btn-default" style="margin-right:10px;">Go Back</a><button class="btn btn-warning btn-sm">Update</button>
</div>

</div>
</div>
</div>


<div class="col-sm-6">
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">


<div class="col-sm-12">
<label>Measurement</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<option value="Bottle" <?php echo ($rs["measure"] == 'Bottle')?'selected':''; ?>>Bottle</option>
</select> 
</div>
</div>


<div class="col-sm-12">
<label>Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comment"></i></span>
<textarea name="description" class="form-control" placeholder="Description"><?php echo $rs["description"]; ?></textarea>
</div>
</div>

</div></div>

<?php
if($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){
?>
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">
<div class="col-sm-12">
<label><?php echo 'Adjust Quantity of '.$rs["name"].' Stocked:'; ?></label><small style="margin:0 0 10px 0; display:block;"><strong style="color:#FF6600;">Please Note:</strong> any amount you enter below will be deducted from overall stocked quantity of <strong>"<?php echo $rs["name"]; ?>"</strong>. <span style="color:#FF3300;">Leave it empty if no deduction is required.</span></small>

<div style="margin:10px 0;">
<?php 
echo '<strong>Item Left In Store: </strong>'.$rs["itemleft"];
?>
</div>

<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="deductqty" id="deductqty" class="form-control" value="">
</div>
</div>
</div></div>
<?php } ?>

</div>
</form>
</div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<script src="../fxn/barcode.js">
/*$('#barcode').focus();
$('#barcode').keypress(function(e){
	var barc = $(this);
	if ( e.which == 13 ) return false;
    if ( e.which == 13 ) e.preventDefault();
	setTimeout(function(){ barc.select(); },300);
	
});*/
</script>