<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Ingredient</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">ingredient</li>
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
<h3 class="box-title" style="margin-left:15px;">Edit Ingedient</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>
<?php
$sql = select("SELECT * FROM tblingredients WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
}else{
redirect("store-restaurant.php");
}
?>
<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="editingredient" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<!--row-->
<div class="col-sm-6">
<label>Ingredient</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" value="<?php echo $rs["name"]; ?>" class="form-control" placeholder="Ingredient">
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