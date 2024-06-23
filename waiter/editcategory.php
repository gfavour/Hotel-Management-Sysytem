<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Category</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">category</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              <div id="msgbox"></div>
			  <!--Top Buttons + Search Box -->
			  <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
			  <div class="box box-primary" style="margin-top:10px;">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Edit Category</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>
<?php
$sql = select("SELECT * FROM tblcategory WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
}else{
redirect("manage-category.php");
}
?>
<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="editcategory" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<!--row-->
<div class="col-sm-4">
<label>Type of Category</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="cattype" id="cattype" title="Category type" class="form-control">
<option value="" selected="selected">Select</option>
<option value="room" <?php echo ($rs["cattype"] == 'room')?'selected':''; ?>>Room</option>
<option value="bar" <?php echo ($rs["cattype"] == 'bar')?'selected':''; ?>>Bar</option>
<option value="restaurant" <?php echo ($rs["cattype"] == 'restaurant')?'selected':''; ?>>Restaurant</option>
<option value="laundary" <?php echo ($rs["cattype"] == 'laundary')?'selected':''; ?>>Laundary</option>
<option value="sport" <?php echo ($rs["cattype"] == 'sport')?'selected':''; ?>>Sport</option>
<option value="spa" <?php echo ($rs["cattype"] == 'spa')?'selected':''; ?>>Spa</option>
</select> 
</div>

<label>Category</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="catname" class="form-control" placeholder="Category" value="<?php echo $rs["catname"]; ?>">
</div>

</div>

<div class="col-md-12" style="margin-top:5px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Update</button>
</div>
</form>
</div>
</div>
			  <?php } ?>
				 
                
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>