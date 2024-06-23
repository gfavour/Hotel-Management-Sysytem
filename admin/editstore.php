<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'inc/sidebar.php'; 
setStoreItems();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Item</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Item</li>
          </ol>
        </section>

<?php
  if (select("SELECT * FROM tblstore WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('store.php?m=record not found');
  }  
  ?>
<section class="content">
<div style="padding-left:0; margin-bottom:10px;">
<strong style="color:#FF3300;">Note:</strong> Kindly make sure cursor is inside the barcode field before scanning.
</div>
<div id="msgbox"></div>
<div class="col-sm-12" style="padding-left:0;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="edit2store" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidqty" value="<?php echo $rs["qtyinstore"]; ?>" />
<input type="hidden" name="instock" class="form-control" placeholder="In Stock" value="<?php echo $rs["qtyinstore"]; ?>">
<input type="hidden" name="costprice" class="form-control" placeholder="Cost Price" value="<?php echo $rs["costprice"]; ?>">
<input type="hidden" name="price" class="form-control" placeholder="Selling Price" value="<?php echo $rs["price"]; ?>">
<input type="hidden" name="quantity" placeholder="Quantity" value="<?php echo $rs["quantity"]; ?>">
<input type="hidden" name="description" placeholder="Description" value="">

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
<label>Item Name</label> (Double click to edit the item name)
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" id="name" class="form-control" readonly value="<?php echo $rs["name"]; ?>" ondblclick="this.readOnly = false;" onblur="this.readOnly = true;" />
</div>
</div>

<div class="col-sm-12">
<label>Quantity In Store:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="itemqty" readonly class="form-control" placeholder="0" value="<?php echo $rs["qtyinstore"]; ?>">
</div>
</div>


<div class="col-sm-12">
<label>Increase Quantity By:</label>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="label label-danger" data-toggle="tooltip" data-placement="top" title="Enter number to add to the quantity (in store) above."><i class="fa fa-info"></i></a>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="itemaqty" class="form-control" placeholder="" value="0">
</div>
</div>

<div class="col-sm-12">
<label>Decrease Quantity By:</label>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="label label-danger" data-toggle="tooltip" data-placement="top" title="Enter number to remove/decrease from the quantity (in store) above."><i class="fa fa-info"></i></a>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="itemdqty" class="form-control" placeholder="" value="0">
</div>
</div>


<!--
<div class="col-sm-12">
<label>Cost Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

</div>
</div>


<div class="col-sm-12">
<label>Selling Price</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

</div>
</div>
-->

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


<div class="col-sm-12">
<label>Measurement</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="measure" id="measure" class="form-control">
<?php echo getBarMeasureOptions($rs["measure"]); ?>
</select> 
<input type="hidden" name="description"  value="<?php echo $rs["description"]; ?>">
</div>
</div>

<div class="col-md-12" style="margin-top:20px;">
<a href="store.php" class="btn btn-sm btn-default" style="margin-right:10px;">Go Back</a><button class="btn btn-warning btn-sm">Update</button>
</div>

</div>
</div>
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